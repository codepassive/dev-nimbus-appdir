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
class Calculator extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'calculator';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The native Calculator for nimbus.';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/calculator/';

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
	public $update_url = 'http://thesis/apps/calculator/';

	/**
	 * The version of the application
	 *
	 * @access	Public
	 */
	public $version = '1.0.0';

	/**
	 * The javascript handle of the application
	 *
	 * @access	Public
	 */
	public $api_handle = 'Calculator';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://calculator/shell/style.css');

	/**
	 * Determine whether an Application uses multiple instances
	 *
	 * @access	Public
	 */
	public $multiple = true;

	/**
	 * The initial method that instantiates the application
	 *
	 * @access	Public
	 */
	public function init(){}

	/**
	 * The method that contains the main interface for the application
	 *
	 * @access	Public
	 */
	public function main(){
		$this->id ='calculator-container-' . generateHash();
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => $this->id,
				'type' => 0,
				'classes' => array('calculator'),
				'title' => 'Nimbus Calculator',
				'x' => 'center',
				'y' => 'center',
				'width' => '240px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/apps/accessories-calculator.png',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/calculator')
							),
				'hasIcon' => true,
				'minimizable' => true,
				'closable' => true,
				'toggable' => false,
				'resizable' => false,
				'draggable' => true,
			));
		//Return the window flags
		$this->json($window->flag(), 'window');
		//Return the Window? - Think of a better way for this
		return $window;
	}

}
?>