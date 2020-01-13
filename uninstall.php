<?php
/*
* Trigger this file on plugin unstall
*
* @package zaramon-form-builder
*/

if(! defined('WP_UNINSTALL_PLUGIN')){
	die;
}
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
	require_once dirname(__FILE__).'/vendor/autoload.php';
}

class Uninstall{
	//uninstall db table
	function __construct(){
		
	}		
}
Inc\PluginDb::delete_table();