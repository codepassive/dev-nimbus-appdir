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
 * The Login view for the application
 *
 * @category:   		Applications
 */
class Login extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'login';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The Login view for Nimbus. This is the first application a user will see upon Initial page load.';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/login/';

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
	public $update_url = 'http://synapse.nimbusdesktop.org/latest/login/';

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
	public $api_handle = 'Login';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://login/shell/style.css');

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
		//Create a Window
		$window = $this->window(array(
				'handle' => 'Login',
				'id' => 'login-container',
				'type' => 1,
				'classes' => array('login'),
				'x' => 'center',
				'y' => 'center',
				'toolbars' => array(
								'top' => array('<div id="login-logo"></div>')
							),
				'content' => array(
								$this->useTemplate('shell/login')
							),
				'buttons' => array(
								array('Proceed', 'submit'),
								'<p id="login-needhelp"><a href="http://wiki.nimbusinitiative.org/Getting_Started" target="_blank">Need Help?</a></p>'
							),
				'hasIcon' => false,
				'title' => '',
				'minimizable' => false,
				'closable' => false,
				'toggable' => false,
				'resizable' => false,
				'draggable' => false,
			));

		//Return the Window? - Think of a better way for this
		return $window;
	}

	/**
	 * A function that handles a Javascript Call from the Client
	 *
	 * @access	Public
	 */
	public function submit(){
		$response = false;
		$token = null;
		//if (request('token')) {
			if (request('username') && request('password')) {
				if ($this->user->login(request('username'), request('password'))) {
					$response = true;
					$token = Token::create();
				}
			}
		//}
		$this->json(array('response' => $response));
	}
	
}
?>