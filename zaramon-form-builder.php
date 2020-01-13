<?php
/**
 * @package zaramon-form-builder
 * @version 1.0.0
 */
/*
Plugin Name: Zaramon Form Builder
Plugin URI: http://www.xyz.com/plugin/zaramon-form-builder
Description: This plugin is made for Gain Solutions Limited for skill test purpose.
Author: Zahirul Islam
Version: 1.0.0
Author URI: http://www.smzislam.com
Licence : GPL2
Text Domain: zaramon-form-builder

*/

//if the file is called directly, abort!!!
defined('ABSPATH') or die("You have no access here");


//require once the composer autoload
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
	require_once dirname(__FILE__).'/vendor/autoload.php';
}


//define CONSTANTS
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));


//The code that runs during plugin activation 
function activate_zaramon_form_builder(){
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_zaramon_form_builder' );


//The code that runs during plugin deactivation 
function deactivate_zaramon_form_builder(){
	Inc\Base\Deactivate::deactivate();
}			
register_deactivation_hook( __FILE__, 'deactivate_zaramon_form_builder' );


//initialize all the core classes of the plugin
if(class_exists('Inc\\Init')){
	Inc\Init::register_services();
}