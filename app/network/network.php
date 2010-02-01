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
 * The Network Manager view for the application
 *
 * @category:   		Applications
 */
class network extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'network';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The Network Manager for Nimbus';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/network/';

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
	public $update_url = 'http://thesis/apps/network/';

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
	public $api_handle = 'Network';

	/**
	 * The javascript handle of the application
	 *
	 * @access	Public
	 */
	public $multiple = false;

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://network/shell/style.css');

	/**
	 * The initial method that instantiates the application
	 *
	 * @access	Public
	 */
	public function init(){
		//Include the language list
		$language = 'shell' . DS . 'languages' . DS . personal('language') . '.php';
		if (!file_exists($language)) {
			$language = 'shell' . DS . 'languages' . DS . 'en-us.php';
		}
		include $language;
	}
	
	public function main(){
		global $language;
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => 'network-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('network'),
				'title' => '',
				'x' => 'center',
				'y' => 'center',
				'width' => '600px',
				'title' => 'Nimbus Network Manager',
				'toolbars' => array(
								'top' => array(
										'<a href="javascript:;"><span><img src="public/resources/images/icons/Tango/32/actions/go-down.png" border="0" title="' . $language['network']['setdefault'] . '" /></span></a>
										<a href="javascript:;"><span><img src="public/resources/images/icons/Tango/32/actions/folder-new.png" border="0" title="' . $language['network']['newconnection'] . '" /></span></a>
										<a href="javascript:;"><span><img src="public/resources/images/icons/Tango/32/actions/view-refresh.png" border="0" title="' . $language['network']['refresh'] . '" /></span></a>
										<div class="clear"></div>',
										'<input type="text" class="text fill-vertical" value="/home/" id="networkpath" />'
									),
							),
				'content' => array(
								$this->useTemplate('shell/network')
							),
				'hasIcon' => true,
				'showInTaskbar' => true,
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
	
	public function responds($url){
		return ($url) ? 'Available': 'Cannot be reached';
	}

}
?>