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
 * The Native Texteditor for Nimbus
 *
 * @category:   		Applications
 */
class browser extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'browser';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The native Text editor for nimbus.';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/browser/';

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
	public $update_url = 'http://synapse.nimbusdesktop.org/latest/browser/';

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
	public $api_handle = 'Browser';
	
	public $multiple = true;

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://browser/shell/style.css');

	/**
	 * The initial method that instantiates the application
	 *
	 * @access	Public
	 */
	public function init(){
	}

	/**
	 * The method that contains the main interface for the application
	 *
	 * @access	Public
	 */
	public function main(){
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => 'browser-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('browser'),
				'title' => 'Nimbus Web Browser',
				'x' => 'center',
				'y' => 'center',
				'width' => '400px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/apps/internet-web-browser.png',
				'height' => '300px',
				'toolbars' => array(
								'top' => array('<div style="padding:2px;"><input type="text" class="text src" value="http://iamjamoy.com/projects/splash.html" style="width:97.8%;"/></div>')
							),
				'content' => array(
								$this->useTemplate('shell/browser')
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