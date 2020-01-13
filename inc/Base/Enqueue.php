<?php
/**
 * @package zaramon-form-builder
 */
namespace Inc\Base;

class Enqueue{
	
	public function register(){	
	
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
		
	}
	public function enqueue(){
			
		wp_enqueue_style( 'bootstrap_min_css', PLUGIN_URL.'assets/css/bootstrap.min.css');
		wp_enqueue_style( 'tether_min_css', PLUGIN_URL.'assets/css/tether.min.css');
		wp_enqueue_style( 'font_awesome_min_css', PLUGIN_URL.'assets/css/font-awesome/css/font-awesome.min.css');
		wp_enqueue_style( 'form_builder_css', PLUGIN_URL.'assets/css/form_builder.css');
			
		wp_enqueue_script( 'jquery_min_js', PLUGIN_URL.'assets/js/jquery.min.js');
		wp_enqueue_script( 'jquery-ui_min_js', PLUGIN_URL.'assets/js/jquery-ui.min.js');
		wp_enqueue_script( 'tether_min_js', PLUGIN_URL.'assets/js/tether.min.js');
		wp_enqueue_script( 'bootstrap_min_js', PLUGIN_URL.'assets/js/bootstrap.min.js');
		wp_enqueue_script( 'form_builder_js', PLUGIN_URL.'assets/js/form_builder.js');
	
	}
		
}
