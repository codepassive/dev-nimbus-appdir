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
	public function init(){
		/*echo "<pre>";
		$arr = unserialize('a:10:{i:0;O:8:"stdClass":5:{s:2:"id";s:9:"470068dcc";s:4:"name";s:8:"Textedit";s:5:"title";s:29:"Textedit - Nimbus Text Editor";s:6:"handle";s:8:"Textedit";s:4:"path";s:85:"http://thesis/public/resources/images/icons/Tango/32/apps/accessories-text-editor.png";}i:1;O:8:"stdClass":5:{s:2:"id";s:9:"ded161d95";s:4:"name";s:10:"Calculator";s:5:"title";s:17:"Nimbus Calculator";s:6:"handle";s:10:"Calculator";s:4:"path";s:84:"http://thesis/public/resources/images/icons/Tango/32/apps/accessories-calculator.png";}i:2;O:8:"stdClass":5:{s:2:"id";s:9:"7dd438c8a";s:4:"name";s:8:"Calendar";s:5:"title";s:15:"Nimbus Calendar";s:6:"handle";s:8:"Calendar";s:4:"path";s:77:"http://thesis/public/resources/images/icons/Tango/32/apps/office-calendar.png";}i:3;O:8:"stdClass":5:{s:2:"id";s:9:"7f049ad1c";s:4:"name";s:8:"Terminal";s:5:"title";s:15:"Nimbus Terminal";s:6:"handle";s:8:"Terminal";s:4:"path";s:80:"http://thesis/public/resources/images/icons/Tango/32/apps/utilities-terminal.png";}i:4;O:8:"stdClass":5:{s:2:"id";s:9:"edc882029";s:4:"name";s:16:"Config Dashboard";s:5:"title";s:30:"Nimbus Configuration Dashboard";s:6:"handle";s:6:"Config";s:4:"path";s:87:"http://thesis/public/resources/images/icons/Tango/32/categories/applications-system.png";}i:5;O:8:"stdClass":5:{s:2:"id";s:9:"ae62557a5";s:4:"name";s:14:"User Dashbaord";s:5:"title";s:21:"Nimbus User Dashboard";s:6:"handle";s:11:"Usermanager";s:4:"path";s:74:"http://thesis/public/resources/images/icons/Tango/32/apps/system-users.png";}i:6;O:8:"stdClass":5:{s:2:"id";s:9:"53af57c09";s:4:"name";s:17:"Network Dashboard";s:5:"title";s:22:"Nimbus Network Manager";s:6:"handle";s:7:"Network";s:4:"path";s:81:"http://thesis/public/resources/images/icons/Tango/32/places/network-workgroup.png";}i:7;O:8:"stdClass":5:{s:2:"id";s:9:"b41e7e5da";s:4:"name";s:12:"File Manager";s:5:"title";s:19:"Nimbus File Manager";s:6:"handle";s:4:"File";s:4:"path";s:73:"http://thesis/public/resources/images/icons/Tango/32/places/user-home.png";}i:8;O:8:"stdClass":5:{s:2:"id";s:9:"0e3488fd1";s:4:"name";s:16:"Instance Manager";s:5:"title";s:31:"Application and Process Manager";s:6:"handle";s:8:"Instance";s:4:"path";s:86:"http://thesis/public/resources/images/icons/Tango/32/apps/utilities-system-monitor.png";}i:9;O:8:"stdClass":5:{s:2:"id";s:9:"fded4883d";s:4:"name";s:14:"Update Manager";s:5:"title";s:21:"Nimbus Update Synapse";s:6:"handle";s:6:"Update";s:4:"path";s:84:"http://thesis/public/resources/images/icons/Tango/32/apps/system-software-update.png";}}');
		unset($arr[1], $arr[2], $arr[3], $arr[6], $arr[7], $arr[8], $arr[9]);
		//print_r($arr);
		echo serialize($arr);
		die();*/
	}
	
	public function main(){
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => 'usermanager-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('usermanager', 'static'),
				'title' => 'Nimbus User Management Dashboard',
				'x' => 'center',
				'y' => 'center',
				'width' => '500px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/apps/system-users.png',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/usermanager')
							),
				'buttons' => array(
								array('Apply', 'apply'),
								array('Cancel', 'cancel'),
								array('OK', 'submit')
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