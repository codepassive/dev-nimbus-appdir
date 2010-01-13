<?php
/** 
 * Nimbus - Manage, Share & Collaborate
 *
 * Nimbus is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * see LICENSE for more Copyright goodness.
 *
 * @package:		Nimbus
 * @copyright:		2009-2010, Nimbus Dev Group, All rights reserved.
 * @license:		GNU/GPLv3, see LICENSE
 * @version:		1.0.0 Alpha
 */

/**
 * The Config view for the application
 *
 * @category:   		Applications
 */
class config extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'config';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The Configuration Panel for Nimbus';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/config/';

	/**
	 * The author of the application
	 *
	 * @access	Public
	 */
	public $author = 'John Rocela';

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $author_url = 'http://iamjamoy.com/';

	/**
	 * The url where the application could contact and get update packages
	 *
	 * @access	Public
	 */
	public $update_url = 'http://synapse.nimbusdesktop.org/latest/config/';

	/**
	 * The version of the application
	 *
	 * @access	Public
	 */
	public $version = '1.0';

	/**
	 * The javascript handle of the application
	 *
	 * @access	Public
	 */
	public $api_handle = 'Config';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://config/shell/style.css');

	/**
	 * The initial method that instantiates the application
	 *
	 * @access	Public
	 */
	public function init(){
		//Include the language list
		$language = 'shell' . DS . 'languages' . DS . config('language') . '.php';
		if (!file_exists($language)) {
			$language = 'shell' . DS . 'languages' . DS . 'en-us.php';
		}
		include $language;
	}
	
	public function main(){
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => 'config-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('config'),
				'title' => 'Nimbus Configuration Dashboard',
				'x' => 'center',
				'y' => 'center',
				'width' => '500px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/categories/applications-system.png',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/config')
							),
				'buttons' => array(
								array('Reset to Default', 'default'),
								array('Apply', 'apply'),
								array('Cancel', 'cancel'),
								array('OK', 'submit')
							),
				'hasIcon' => true,
				'minimizable' => true,
				'closable' => true,
				'toggable' => false,
				'resizable' => true,
				'draggable' => true,
			));
		//Return the window flags
		$this->json($window->flag(), 'window');
		//Return the Window? - Think of a better way for this
		return $window;
	}
	
}
?>