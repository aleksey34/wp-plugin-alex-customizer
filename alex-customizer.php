<?php
/**
 * Plugin Name:       Alex Customizer
 * Description:       Additional func for AlexTheme
 * Requires at least: 1.0
 * Requires PHP: 7.4
 * Version:           1.0
 * Author:            aleksey34
 * License:           GPL-2.0-or-later
 * Text Domain:       alex_theme
 /
 * @package          plugin core of alextheme
 */



if(!defined('ABSPATH')) exit;



require_once plugin_dir_path(__DIR__) . 'alex-customizer/App/AppCore.php';


function AlexCustomizerInit(){

	\AlexCustomizer\App\AppCore::instance();


}

AlexCustomizerInit();