<?php
/**
 * alex-theme Theme Customizer
 *
 * @package alex-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
//function alex_theme_customize_register( $wp_customize ) {
//	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
//	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
//	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
//
//	if ( isset( $wp_customize->selective_refresh ) ) {
//		$wp_customize->selective_refresh->add_partial(
//			'blogname',
//			array(
//				'selector'        => '.site-title a',
//				'render_callback' => 'alex_theme_customize_partial_blogname',
//			)
//		);
//		$wp_customize->selective_refresh->add_partial(
//			'blogdescription',
//			array(
//				'selector'        => '.site-description',
//				'render_callback' => 'alex_theme_customize_partial_blogdescription',
//			)
//		);
//	}
//}
//add_action( 'customize_register', 'alex_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
//function alex_theme_customize_partial_blogname() {
//	bloginfo( 'name' );
//}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
//function alex_theme_customize_partial_blogdescription() {
//	bloginfo( 'description' );
//}

///**
// * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
// */
//function alex_theme_customize_preview_js() {
//	wp_enqueue_script( 'alex_theme-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
//}
//add_action( 'customize_preview_init', 'alex_theme_customize_preview_js' );


/**
 * Custom theme
 */
//add_action( 'customize_register', 'my_theme_customize_register' );

//function my_theme_customize_register( WP_Customize_Manager $wp_customize ) {
	// Здесь делаем что-либо с $wp_customize - объектом класса WP_Customize_Manager, например

	// Действия с панелями
//	$wp_customize->add_panel();     // добавить панель
//	$wp_customize->get_panel();     // получить панель
//	$wp_customize->remove_panel();  // удалить панель

	// Действия с секциями
//	$wp_customize->add_section();    // добавить секцию
//	$wp_customize->get_section();    // получить секцию
//	$wp_customize->remove_section(); // удалить секцию

	// Действия с настройками
//	$wp_customize->add_setting();    // добавить настройку
//	$wp_customize->get_setting();    // получить настройку
//	$wp_customize->remove_setting(); // удалить настройку

	// Действия с элементами управления
//	$wp_customize->add_control();    // добавить элемент управления
//	$wp_customize->get_control();    // получить элемент управления
//	$wp_customize->remove_control(); // удалить элемент управления
//}


//add_action( 'customize_register', 'alex_customizer_init' );
//add_action( 'wp_head', 'alex_customizer_style_tag' );
////add_action( 'customize_preview_init', 'customizer_js_file' );
//
//
//function alex_customizer_init( WP_Customize_Manager $wp_customize ) {
//
//	// как обновлять превью сайта:
//	// 'refresh'     - перезагрузкой фрейма (можно полностью отказаться от JavaScript)
//	// 'postMessage' - отправкой AJAX запроса
//	$transport = 'postMessage';
//
//	// Секция
//	if ( 'базовая - colors' ) {
//
//		// настройка
//		$setting = 'link_color';
//
//		$wp_customize->add_setting( $setting, [
//			'default'   => '#000000',
//			'transport' => $transport
//		] );
//
//		$wp_customize->add_control(
//			new WP_Customize_Color_Control( $wp_customize, $setting, [
//				'label'    => 'Цвет ссылок',
//				'section'  => 'colors',
//				'settings' => $setting
//			] )
//		);
//
//	}
//
//	// Секция
//	if ( $section = 'display_options' ) {
//
//		$wp_customize->add_section( $section, [
//			'title'       => 'Отображение',
//			'priority'    => 200,                   // приоритет расположения
//			'description' => 'Внешний вид сайта', // описание не обязательное
//		] );
//
//		// настройка
//		$setting = 'display_header';
//
//		$wp_customize->add_setting( $setting, [
//			'default'   => 'true',
//			'transport' => $transport
//		] );
//
//		$wp_customize->add_control( $setting, [
//			'section' => $section,
//			'label'   => 'Отобразить заголовок?',
//			'type'    => 'checkbox',
//		] );
//
//		// настройка
//		$setting = 'color_scheme';
//
//		$wp_customize->add_setting( $setting, [
//			'default'   => 'normal',
//			'transport' => $transport
//		] );
//
//		$wp_customize->add_control( $setting, [
//			'section' => $section,
//			'label'   => 'Цветовая схема',
//			'type'    => 'radio',
//			'choices' => [
//				'normal'  => 'Светлая',
//				'inverse' => 'Темная',
//			]
//		] );
//
//		// настройка
//		$setting = 'font';
//
//		$wp_customize->add_setting( $setting, [
//			'default'   => 'arial',
//			// этот шрифт будет задействован по умолчанию
//			'type'      => 'theme_mod',
//			// использовать get_theme_mod() для получения настроек, если указать 'option', то нужно будет использовать функцию get_option()
//			'transport' => $transport
//		] );
//
//		$wp_customize->add_control( $setting, [
//			'section' => 'display_options', // секция
//			'label'   => 'Шрифт',
//			'type'    => 'select', // выпадающий список select
//			'choices' => [ // список значений и лейблов выпадающего списка в виде ассоциативного массива
//				'arial'   => 'Arial',
//				'courier' => 'Courier New'
//			]
//		] );
//
//		// настройка
//		$setting = 'footer_copyright_text';
//
//		$wp_customize->add_setting( $setting, [
//			'default'           => 'Все права защищены',
//			'sanitize_callback' => 'sanitize_text_field',
//			'transport'         => $transport
//		] );
//
//		$wp_customize->add_control( $setting, [
//			'section' => 'display_options', // id секции
//			'label'   => 'Копирайт',
//			'type'    => 'text' // текстовое поле
//		] );
//
//	}
//
//	// секция
//	if ( $section = 'advanced_options' ) {
//
//		// Добавляем ещё одну секцию - Настройки фона
//		$wp_customize->add_section( $section, [
//			'title'    => 'Настройки фона',
//			'priority' => 201,
//		] );
//
//		// настройка
//		$setting = 'bg_image';
//
//		$wp_customize->add_setting( $setting, [
//				'default'   => '', // по умолчанию - фоновое изображение не установлено
//				'transport' => $transport
//			]
//		);
//
//		$wp_customize->add_control(
//			new WP_Customize_Image_Control( $wp_customize, $setting, [
//				'label'    => 'Фон сайта',
//				'settings' => 'bg_image',
//				'section'  => 'advanced_options'
//			] )
//		);
//
//		// Добавим кнопку в дизайн сайта в кастомайзере для быстрого перехода к текущей настройке
//		// при transport = postMessage здесь можно указать функцию,
//		// которая будет заменять часть дизайна (таким образом можно не писать JS код)
//		if ( isset( $wp_customize->selective_refresh ) ) {
//
//			$wp_customize->selective_refresh->add_partial( $setting, [
//				'selector'            => '.site-footer .inner',
//				'container_inclusive' => false,
//				'render_callback'     => 'footer_inner_dh5theme',
//				'fallback_refresh'    => false,
//				// Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
//			] );
//
//			// поправим стиль, чтобы кнопку было видно
//			add_action( 'wp_head', function () {
//				echo '<style>.site-footer .inner .customize-partial-edit-shortcut{ margin: 10px 0 0 38px; }</style>';
//			} );
//
//		}
//
//	}
//
//}
//
//function alex_customizer_style_tag() {
//
//	$style = [];
//
//	$body_styles = [];
//
//	switch ( get_theme_mod( 'font' ) ) {
//		case 'arial':
//			$body_styles[] = 'font-family: Arial, Helvetica, sans-serif;';
//			break;
//		case 'courier':
//			$body_styles[] = 'font-family: "Courier New", Courier;';
//			break;
//		default:
//			$body_styles[] = 'font-family: Arial, Helvetica, sans-serif;';
//			break;
//	}
//
//	if ( 'inverse' === get_theme_mod( 'color_scheme' ) ) {
//		$body_styles[] = 'background-color:#000; color:#fff;';
//	} else {
//		$body_styles[] = 'background-color:#fff; color:#000;';
//	}
//
//	if ( $bg_image = get_theme_mod( 'bg_image' ) ) {
//		$body_styles[] = "background-image: url( '$bg_image' );";
//	}
//
//	$style[] = 'body { ' . implode( ' ', $body_styles ) . ' }';
//
//	$style[] = 'a { color: ' . get_theme_mod( 'link_color' ) . '; }';
//
//	if ( ! get_theme_mod( 'display_header' ) ) {
//		$style[] = '#header { display: none; }';
//	}
//
//	echo "<style>\n" . implode( "\n", $style ) . "\n</style>\n";
//}

//function customizer_js_file() {
//	wp_enqueue_script( 'theme-customizer', get_stylesheet_directory_uri() . '/js/theme-customizer.js', [
//		'jquery',
//		'customize-preview'
//	], null, true );
//}