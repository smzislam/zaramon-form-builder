<?php
/**
 * @package zaramon-form-builder
 */
namespace Inc;
final class Init{
	
	/**
	*Stores all the classes inside an array
	*@return array full list of classes
	*/
	public static function get_services(){
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class
		];
	}
	/**
	*Loop through the classes, initialize them,
	*and call the register() method if it exists
	*@return
	*/
	public static function register_services(){
		foreach(self::get_services() as $class){
			$service=self::instantiate($class);
			if(method_exists($service, 'register')){
				$service->register();
			}
		}
	}
	/**
	*Initialize the class
	*@return new instance of the class
	*/
	public static function instantiate($class){
		$service=new $class();
		return $service;
	}
}


