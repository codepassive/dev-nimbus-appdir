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
class Terminal extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'terminal';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The native Terminal for nimbus.';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/terminal/';

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
	public $update_url = 'http://thesis/apps/terminal/';

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
	public $api_handle = 'Terminal';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://terminal/shell/style.css');

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
	public function init(){
		//Include the language list
		$language = 'shell' . DS . 'languages' . DS . config('language') . '.php';
		if (!file_exists($language)) {
			$language = 'shell' . DS . 'languages' . DS . 'en-us.php';
		}
		include $language;
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
				'id' => 'terminal-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('terminal'),
				'title' => 'Nimbus Terminal',
				'x' => 'center',
				'y' => 'center',
				'width' => '600px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/apps/utilities-terminal.png',
				'height' => '300px',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/terminal')
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
	
	public function submit(){
		//Include the functions available for the terminal
		include 'functions.php';
		//Do the execution
		$command = explode(" ", $this->request->post['command']);
		$func = $command[0];
		unset($command[0]);
		$result = false;
		if (function_exists($func)) {
			$result = call_user_func_array($func, $command);
		}
		$this->json($result);
	}

}

?>