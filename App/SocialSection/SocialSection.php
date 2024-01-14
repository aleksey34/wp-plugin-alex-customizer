<?php

namespace AlexCustomizer\App\SocialSection;


class SocialSection{

	private static $instance;
	private static $transport ;

	public function __construct ($wp_customize, $transport ='refresh'){
// postmessage or refresh
		self::$transport = $transport;

		$this->init($wp_customize);

	}

	private function init($wp_customize){

		// settings
		$wp_customize->add_setting('alex_facebook_settings',
			[
				'default'=>__('https://facebook.com', 'alex-theme'),
				'transport'=>self::$transport,

			]);

		$wp_customize->add_setting('alex_twitter_settings',
			[
				'default'=>__('https://twitter.com', 'alex-theme'),
				'transport'=>self::$transport,

			]);
		$wp_customize->add_setting('alex_linkedin_settings',
			[
				'default'=>__('https://linkedin.com', 'alex-theme'),
				'transport'=>self::$transport,

			]);

		$wp_customize->add_setting('alex_google_settings',
			[
				'default'=>__('https://google.com', 'alex-theme'),
				'transport'=>self::$transport,

			]);

		$wp_customize->add_setting('alex_youtube_settings',
			[
				'default'=>__('https://youtube.com', 'alex-theme'),
				'transport'=>self::$transport,

			]);

		$wp_customize->add_setting('alex_insta_settings',
			[
				'default'=>__('https://instagramm.com', 'alex-theme'),
				'transport'=>self::$transport,

			]);



		//section
			$wp_customize->add_section('alex_social_section',
				[
					'title'=>__('Social settings'),
					'priority'=> 310,
//				    'panel' =>'custom panel id require here'

				]);

			// controls
			$wp_customize->add_control('alex_facebook_control',
			[
				'section'=> 'alex_social_section',
				'settings'=>'alex_facebook_settings',
				'label'=>__('Enter facebook profile url', 'alex_theme'),
				'type'=>'',

			]);
		$wp_customize->add_control('alex_twitter_control',
			[
				'section'=> 'alex_social_section',
				'settings'=>'alex_twitter_settings',
				'label'=>__('Enter twitter profile url', 'alex_theme'),
				'type'=>'',

			]);
		$wp_customize->add_control('alex_linkedin_control',
			[
				'section'=> 'alex_social_section',
				'settings'=>'alex_linkedin_settings',
				'label'=>__('Enter linkedin profile url', 'alex_theme'),
				'type'=>'',

			]);

		$wp_customize->add_control('alex_google_control',
			[
				'section'=> 'alex_social_section',
				'settings'=>'alex_google_settings',
				'label'=>__('Enter google profile url', 'alex_theme'),
				'type'=>'',

			]);

		$wp_customize->add_control('alex_youtube_control',
			[
				'section'=> 'alex_social_section',
				'settings'=>'alex_youtube_settings',
				'label'=>__('Enter youtube profile url', 'alex_theme'),
				'type'=>'',

			]);

		$wp_customize->add_control('alex_insta_control',
			[
				'section'=> 'alex_social_section',
				'settings'=>'alex_insta_settings',
				'label'=>__('Enter insta profile url', 'alex_theme'),
				'type'=>'',

			]);



	}


	public static function instance($wp_customize){
		if(is_null(self::$instance)){
			self::$instance = new self($wp_customize);
		}

		return static::$instance;

	}


}