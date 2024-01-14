<?php

namespace AlexCustomizer\App\FooterSection;


class FooterSection{

	private static $instance;

	private static $transport ;

	public function __construct ($wp_customize, $transport ='refresh'){
		// postmessage or refresh
		self::$transport = $transport;

		$this->init($wp_customize);

	}

	private function init($wp_customize){
		// settings
		$wp_customize->add_setting('alex_footer_social_title_settings',
			[
				'default'=>__('Share Your Favorite Mobile Apps With Your Friends', 'alex-theme'),
				'transport'=>self::$transport

			]);

		$wp_customize->add_setting('alex_footer_copyright_settings',
			[
				'default'=>__('<p> 2016 &copy; Copyright Applayers. All rights Reserved. Powered By Free <a href="http://www.pfind.com/goodies/applayers/">AppLayers</a> Template from <a href="http://www.pfind.com/goodies/">pFind Goodies</a>. </p>', 'alex-theme'),
				'transport'=>self::$transport

			]);

		// section
		$wp_customize->add_section('alex_footer_section',
			[
				'title'=>__('Footer settings', 'alex_theme'),
				'priority'=> 300,
//				'panel' =>'custom panel id require here'

			]);

		// control
		$wp_customize->add_control('alex_footer_social_title_control',
			[
				'section'=> 'alex_footer_section',
				'settings'=>'alex_footer_social_title_settings',
				'label'=>__('Footer social title', 'alex_theme'),
				'type'=>'text',

			]);

		$wp_customize->add_control('alex_footer_copyright_control',
			[
				'section'=> 'alex_footer_section',
				'settings'=>'alex_footer_copyright_settings',
				'label'=>__('Footer Copyright', 'alex_theme'),
				'type'=>'textarea',

			]);


	}


	public static function instance($wp_customize){
		if(is_null(self::$instance)){
			self::$instance = new self($wp_customize);
		}

		return static::$instance;

	}


}