<?php
/**
 * @package zaramon-form-builder
 */
namespace Inc\Base;
//require_once plugin_dir_path(__FILE__).'plugin-db.php';
class Activate{
	
	public static function activate(){			
		flush_rewrite_rules();
		Activate::create_table();
		
	}
	//table generating code
	public static function create_table(){
		require_once (ABSPATH.'wp-admin/includes/upgrade.php');
		global $wpdb;
		if(count($wpdb->get_var('SHOW TABLES LIKE "wp_zaramon_form_builder"'))==0){
			$sql_query_to_create_table="CREATE TABLE `wp_zaramon_form_builder` (
							 `id` int(11) NOT NULL AUTO_INCREMENT,
							 `form_name` varchar(150) DEFAULT NULL,
							 `form_title` varchar(150) DEFAULT NULL,
							 `form_element` text DEFAULT NULL,
							 `short_code` varchar(150) DEFAULT NULL,
							 `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
							 PRIMARY KEY (`id`)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8";
			dbDelta($sql_query_to_create_table);
		}		
	}
		
}
