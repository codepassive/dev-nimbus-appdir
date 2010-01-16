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
class usermanager extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'usermanager';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The User Manager Panel for Nimbus';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/usermanager/';

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
	public $update_url = 'http://synapse.nimbusdesktop.org/latest/usermanager/';

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
	public $api_handle = 'Usermanager';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://usermanager/shell/style.css');

	/**
	 * The initial method that instantiates the application
	 *
	 * @access	Public
	 */
	public function init(){}
	
	public function main(){
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => 'usermanager-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('usermanager'),
				'title' => 'Nimbus User Management Dashboard',
				'x' => 'center',
				'y' => 'center',
				'width' => '800px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/categories/applications-system.png',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/usermanager')
							),
				'buttons' => array(
								array('Reset to Default', '_default'),
								array('Apply', 'apply'),
								array('Cancel', 'cancel'),
								array('OK', 'submit')
							),
				'hasIcon' => true,
				'minimizable' => true,
				'closable' => true,
				'toggable' => true,
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