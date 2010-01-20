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
 * The Instance view for the application
 *
 * @category:   		Applications
 */
class instance extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'instance';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The Instance/Process manager for Nimbus';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/instance/';

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
	public $update_url = 'http://synapse.nimbusdesktop.org/latest/instance/';

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
	public $api_handle = 'Instance';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://instance/shell/style.css');

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
				'id' => 'instance-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('instance'),
				'title' => '',
				'x' => 'center',
				'y' => 'center',
				'width' => '240px',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/instance')
							),
				'hasIcon' => false,
				'showInTaskbar' => false,
				'minimizable' => false,
				'closable' => false,
				'toggable' => false,
				'resizable' => false,
				'draggable' => false,
			));
		//Return the window flags
		$this->json($window->flag(), 'window');
		//Return the Window? - Think of a better way for this
		return $window;
	}
	
}
?>