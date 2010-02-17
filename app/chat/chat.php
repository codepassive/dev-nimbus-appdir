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
class chat extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'Chat';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The native chat for nimbus.';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/chat/';

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
	public $update_url = 'http://thesis/apps/chat/';

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
	public $api_handle = 'Chat';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://chat/shell/style.css');

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
		$this->view('shell/chat');
	}
	
	public function check(){
		if ($this->user->isAllowed('chat')) {
			$query = $this->db->query("SELECT * FROM app_chat WHERE toid=" . $this->user->id . " OR fromid=" . $this->user->id . " OR toid=0 ORDER BY timestamp DESC");

			if ($query) {
				foreach ($query as $r) {
					$fromname = $r['fromname'];
					if ($r['toid'] == $this->user->id) {
						$fromname = $r['toname'] . ' from ' . $r['fromname'];
					} elseif ($r['fromid'] == $this->user->id && $r['toid'] != 0) {
						$fromname = $r['toname'] . ' from ' . $r['fromname'];
					} elseif ($r['fromid'] == 0) {
						$fromname = $r['fromname'];
					}
					echo '<div class="message" id="chat-' . $r['timestamp'] . '"><strong>' . $fromname . ':</strong><br><p>' . strip_tags($r['message']) . '</p></div>';
				}
			}
		}
	}
	
	public function send(){
		if ($this->user->isAllowed('chat')) {
			$message = $this->request->post['message'];
			$this->db->query("INSERT INTO app_chat(message,timestamp,toid,fromid,toname,fromname) VALUES('" . $message . "','" . time() . "', 0, " . $this->user->id . ", '', '" . $this->user->username . "')");
		}
	}

}
?>