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
class aviary extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'aviary';

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
	public $app_url = 'http://apps.nimbusdesktop.com/aviary/';

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
	public $update_url = 'http://synapse.nimbusdesktop.org/latest/aviary/';

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
	public $api_handle = 'Aviary';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://aviary/shell/style.css');

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
		//fetch every image from the remote handler
		$this->fetch();
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => 'aviary-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('aviary'),
				'title' => 'Aviary - Nimbus Image Editor',
				'x' => 'center',
				'y' => 'center',
				'width' => '400px',
				'icon' => 'http://aviary.com/images/eggs/16/phoenix.png',
				'height' => '300px',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/aviary')
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
	
	public function fetch(){
		if ($this->user->isAllowed('aviary')) {
			$uid = generateHash($this->user->id);
			$info = file_get_contents('http://iamjamoy.com/projects/remote/handler.php?userhash=' . $uid);
			$infos = explode("\n", $info);
			foreach ($infos as $inf) {
				$in = unserialize($inf);
				if (!file_exists(USER_DIR . $this->user->username . DS . "drives" . DS . "root" . DS . "Documents" . DS . "Pictures" . DS . "Aviary" . DS . $in['name'] . '.png')) {
					copy($in['imageurl'], USER_DIR . $this->user->username . DS . "drives" . DS . "root" . DS . "Documents" . DS . "Pictures" . DS . "Aviary" . DS . $in['name'] . '.png');
				}
			}
		}
	}

}
?>