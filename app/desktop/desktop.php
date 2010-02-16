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
 * The Desktop view for the application
 *
 * @category:   		Applications
 */
class desktop extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'desktop';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The Desktop view for Nimbus. This is the global wrapper and manager of every application in Nimbus.';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/desktop/';

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
	public $update_url = 'http://synapse.nimbusdesktop.org/latest/desktop/';

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
	public $api_handle = 'Desktop';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://desktop/shell/style.css');

	/**
	 * The initial method that instantiates the application
	 *
	 * @access	Public
	 */
	public function init(){
		$personal = array();
		if ($this->user->isLoggedIn()) {
			$personal = $this->session->get('user-information');
			//Do some system changes according to the user's configuration
			$personal->desktop_icons = unserialize($personal->desktop_icons);
			
			//Append some important desktop information
			global $language;
			$personal->title = sprintf($language['titlebar_inside'], $personal->username, config('appname'));			
			
			//Send out the output
			$this->json($personal, 'data');
			$this->view('shell/desktop');
		}
	}
	
	public function facebook(){
		if ($this->user->isLoggedIn()) {
			$this->module('facebook');
			$facebook = $this->modules->facebook->module;
			//$user_id = $facebook->require_frame();
			if (!isset($_GET['auth_token'])) {
				$facebook->require_login('publish_stream,status_update');
			} else {
				$sess = $facebook->do_get_session($_GET['auth_token']);
				$facebook->set_user($sess['uid'], $sess['session_key'], $sess['expires']);
				$user_id = $facebook->get_loggedin_user();
				$facebook->api_client->stream_publish($_REQUEST['status']);
				echo 'Status Update Successfully';
			}
		}
	}
	
	public function twitter(){
		if ($this->user->isLoggedIn()) {
			include 'twitter.php';
			//ITERATE THROUGH EVERY TWITTER ACCOUNT ON THE BRIDGE
			$twitter = new Twitter('jmrocela','forward');
			if ($twitter->update($_REQUEST['status'])) {
				echo json_encode(array('response'=>true,'message'=>'Your Status has been Updated'));
			} else {
				echo json_encode(array('response'=>false,'message'=>'Could not update your status. Please try again.'));
			}
		}
	}
	
}
?>