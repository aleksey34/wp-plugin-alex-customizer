<?php

namespace AlexCustomizer\App;

use AlexCustomizer\App\FooterSection\FooterSection;
use AlexCustomizer\App\SocialSection\SocialSection;

use WP_Customize_Color_Control;
use WP_Customize_Image_Control;
use WP_Customize_Manager;





class AppCore {

	private static $instance;

	public function __construct (){
		/**
		 * add require file
		 */
		$this->addRequire();


		$this->init();
	}

	private function addRequire(){
		require_once plugin_dir_path(__DIR__) . 'App/include.php';
	}



	public function init(){
		/**
		 * js script
		 */
		$this->jsScriptInit();


		/**
		 * init sections
		 */
		add_action( 'customize_register',function (WP_Customize_Manager $wp_customize){

			// init footer section
			FooterSection::instance($wp_customize);

			SocialSection::instance($wp_customize);



		});


		//----------------------------- example code
		$this->customizerInit();

		$this->customizerStyleTag();
		//==========================
	}

	function jsScriptInit(){
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */

		add_action( 'customize_preview_init' , function (){

			wp_enqueue_script( 'alex_theme-customizer', plugin_dir_url(__DIR__) . 'assets/js/alex-customizer.js', array( 'jquery','customize-preview' ), _S_VERSION, true );

		});

	}


	//--- example code
	function customizerInit(){
		add_action( 'customize_register',function (WP_Customize_Manager $wp_customize){
			// как обновлять превью сайта:
			// 'refresh'     - перезагрузкой фрейма (можно полностью отказаться от JavaScript)
			// 'postMessage' - отправкой AJAX запроса
			$transport = 'postMessage';

			// Секция
			if ( 'базовая - colors' ) {

				// настройка
				$setting = 'link_color';

				$wp_customize->add_setting( $setting, [
					'default'   => '#000000',
					'transport' => $transport
				] );

				$wp_customize->add_control(
					new WP_Customize_Color_Control( $wp_customize, $setting, [
						'label'    => 'Цвет ссылок',
						'section'  => 'colors',
						'settings' => $setting
					] )
				);

			}

			// Секция
			if ( $section = 'display_options' ) {

				$wp_customize->add_section( $section, [
					'title'       => 'Отображение',
					'priority'    => 290,                   // приоритет расположения
					'description' => 'Внешний вид сайта', // описание не обязательное
				] );

				// настройка
				$setting = 'display_header';

				$wp_customize->add_setting( $setting, [
					'default'   => 'true',
					'transport' => $transport
				] );

				$wp_customize->add_control( $setting, [
					'section' => $section,
					'label'   => 'Отобразить заголовок?',
					'type'    => 'checkbox',
				] );

				// настройка
				$setting = 'color_scheme';

				$wp_customize->add_setting( $setting, [
					'default'   => 'normal',
					'transport' => $transport
				] );

				$wp_customize->add_control( $setting, [
					'section' => $section,
					'label'   => 'Цветовая схема',
					'type'    => 'radio',
					'choices' => [
						'normal'  => 'Светлая',
						'inverse' => 'Темная',
					]
				] );

				// настройка
				$setting = 'font';

				$wp_customize->add_setting( $setting, [
					'default'   => 'arial',
					// этот шрифт будет задействован по умолчанию
					'type'      => 'theme_mod',
					// использовать get_theme_mod() для получения настроек, если указать 'option', то нужно будет использовать функцию get_option()
					'transport' => $transport
				] );

				$wp_customize->add_control( $setting, [
					'section' => 'display_options', // секция
					'label'   => 'Шрифт',
					'type'    => 'select', // выпадающий список select
					'choices' => [ // список значений и лейблов выпадающего списка в виде ассоциативного массива
						'arial'   => 'Arial',
						'courier' => 'Courier New'
					]
				] );

				// настройка
				$setting = 'footer_copyright_text';

				$wp_customize->add_setting( $setting, [
					'default'           => 'Все права защищены',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => $transport
				] );

				$wp_customize->add_control( $setting, [
					'section' => 'display_options', // id секции
					'label'   => 'Копирайт',
					'type'    => 'text' // текстовое поле
				] );

			}

			// секция
			if ( $section = 'advanced_options' ) {

				// Добавляем ещё одну секцию - Настройки фона
				$wp_customize->add_section( $section, [
					'title'    => 'Настройки фона',
					'priority' => 295,
				] );

				// настройка
				$setting = 'bg_image';

				$wp_customize->add_setting( $setting, [
						'default'   => '', // по умолчанию - фоновое изображение не установлено
						'transport' => $transport
					]
				);

				$wp_customize->add_control(
					new WP_Customize_Image_Control( $wp_customize, $setting, [
						'label'    => 'Фон сайта',
						'settings' => 'bg_image',
						'section'  => 'advanced_options'
					] )
				);

				// Добавим кнопку в дизайн сайта в кастомайзере для быстрого перехода к текущей настройке
				// при transport = postMessage здесь можно указать функцию,
				// которая будет заменять часть дизайна (таким образом можно не писать JS код)
				if ( isset( $wp_customize->selective_refresh ) ) {

					$wp_customize->selective_refresh->add_partial( $setting, [
						'selector'            => '.site-footer .inner',
						'container_inclusive' => false,
						'render_callback'     => 'footer_inner_dh5theme',
						'fallback_refresh'    => false,
						// Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
					] );

					// поправим стиль, чтобы кнопку было видно
					add_action( 'wp_head', function () {
						echo '<style>.site-footer .inner .customize-partial-edit-shortcut{ margin: 10px 0 0 38px; }</style>';
					} );

				}

			}

		} );
	}

	function customizerStyleTag (){
		add_action( 'wp_head', function (){
			$style = [];

			$body_styles = [];

			switch ( get_theme_mod( 'font' ) ) {
				case 'arial':
					$body_styles[] = 'font-family: Arial, Helvetica, sans-serif;';
					break;
				case 'courier':
					$body_styles[] = 'font-family: "Courier New", Courier;';
					break;
				default:
					$body_styles[] = 'font-family: Arial, Helvetica, sans-serif;';
					break;
			}

			if ( 'inverse' === get_theme_mod( 'color_scheme' ) ) {
				$body_styles[] = 'background-color:#000; color:#fff;';
			} else {
				$body_styles[] = 'background-color:#fff; color:#000;';
			}

			if ( $bg_image = get_theme_mod( 'bg_image' ) ) {
				$body_styles[] = "background-image: url( '$bg_image' );";
			}

			$style[] = 'body { ' . implode( ' ', $body_styles ) . ' }';

			$style[] = 'a { color: ' . get_theme_mod( 'link_color' ) . '; }';

			if ( ! get_theme_mod( 'display_header' ) ) {
				$style[] = '#header { display: none; }';
			}

			echo "<style>\n" . implode( "\n", $style ) . "\n</style>\n";


		} );
	}
	//======



	public static function instance(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}

		return static::$instance;

	}

}
