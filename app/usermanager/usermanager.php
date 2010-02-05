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
	public function init(){}
	
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
	
	public function apply(){
		$focused = $this->request->post['focused'];
		if ($focused) {
			unset($this->request->post['focused']);
			switch ($focused) {
				case "personalprofile":
					foreach ($this->request->post as $key => $value) {
						if ($value != '') {
							$this->db->query("UPDATE meta SET meta_value='$value' WHERE meta_name='$key' AND meta_table='accounts' AND meta_owner=" . $this->user->id);
						}
					}
				break;
			}
		}
		echo json_encode(true);
	}
	
	public function changePassword(){
		if ($this->user->isLoggedIn()) {
			if ($this->user->authenticate($this->user->username, $this->request->post['oldpassword'])) {
				if ($this->request->post['newpassword'] == $this->request->post['repeatpassword'] && ($this->request->post['newpassword'] != '' && $this->request->post['repeatpassword'] != '')) {
					$password = generatePassword($this->request->post['newpassword']);
					$this->db->query("UPDATE accounts SET password='$password' WHERE account_id=" . $this->user->id);
					echo json_encode(array('response'=>true,'message'=>'Password successfully updated.'));
					return;
				}
				else {
					echo json_encode(array('response'=>false,'message'=>'Please repeat the new passwords accordingly.'));
					return;
				}
				return;
			}
			echo json_encode(array('response'=>false,'message'=>'Please supply your current password.'));
		}
	}
	
	public function addUser(){
		
	}
	
	public function updateUser(){
		if ($this->user->isLoggedIn()) {
			$meta = array();
			$personal = array();
			$defaults = array(
					'username' => '',
					'password' => '',
					'created' => time(),
					'online' => 0,
					'email' => '',
					'first_name' => '',
					'last_name' => '',
					'nick_name' => '',
					'Description' => '',
					'theme' => 'default',
					'language' => 'en-us',
					'background' => 'a:0:{}',
					'desktop' => 'a:0:{}',
					'startup' => 'a:0:{}',
					'active_apps' => 'a:0:{}',
					'refresh_rate' => 5,
					'window' => 'a:0:{}',
					'shortcuts' => 1
				);
			//Insert the User
			$username = $this->request->post['username'];
			$password = generatePassword($this->request->post['password']);
			$created = time();
			$this->db->query("UPDATE accounts SET username='$username', password='$password' WHERE account_id={$this->request->post['account_id']})");
			$id = $this->request->post['account_id'];
			//updates
			$this->db->query("UPDATE meta SET meta_value='{$this->request->post['meta_nick_name']}' WHERE meta_owner='$id' AND meta_table='accounts' AND meta_name='nick_name'");
			$this->db->query("UPDATE meta SET meta_value='{$this->request->post['meta_first_name']}' WHERE meta_owner='$id' AND meta_table='accounts' AND meta_name='first_name'");
			$this->db->query("UPDATE meta SET meta_value='{$this->request->post['meta_last_name']}' WHERE meta_owner='$id' AND meta_table='accounts' AND meta_name='last_name'");
			$this->db->query("UPDATE meta SET meta_value='{$this->request->post['meta_description']}' WHERE meta_owner='$id' AND meta_table='accounts' AND meta_name='description'");
			$this->db->query("UPDATE meta SET meta_value='{$this->request->post['meta_email']}' WHERE meta_owner='$id' AND meta_table='accounts' AND meta_name='email'");
			//end
			echo json_encode(array('response'=>true,'message'=>'You have successfully updated an Account'));
		}
	}
	
	public function getUser(){
		if ($this->user->isLoggedIn()) {
			if (personal('is_admin')) {
				$id = $this->request->post['id'];
				$return = $this->db->query("SELECT * FROM accounts WHERE account_id=" . $id);
				$return = $return[0];
				$meta = $this->db->query("SELECT * FROM meta WHERE meta_table='accounts' AND meta_owner=" . $id);
				foreach ($meta as $m) {
					$return[$m['meta_name']] = $m['meta_value'];
				}
				unset($return['password']);
				echo json_encode($return);
			}
		}
	}
	
	public function addExternal(){
		if ($this->user->isLoggedIn()) {
			$this->request->post['account_id'] = $this->user->id;
			if ($this->db->insert($this->request->post, "externals")) {
				echo json_encode(array('response'=>true,'message'=>'You have successfully added an External Account'));
			} else {
				echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
			}
		}
	}
	
	public function addPermission(){
		if ($this->user->isLoggedIn()) {
			$this->request->post['accessor_type'] = '1';
			if ($this->db->insert($this->request->post, "`acl`")) {
				echo json_encode(array('response'=>true,'message'=>'You have successfully added a new Permission'));
			} else {
				echo json_encode(array('response'=>false,'message'=>$this->db->queryString));
			}
		}
	}

	public function updatePermission(){
		if ($this->user->isLoggedIn()) {
			$id = $this->request->post['defaults'];
			unset($this->request->post['defaults']);
			if ($this->db->update($this->request->post, $id, "acl")) {
				echo json_encode(array('response'=>true,'message'=>'You have successfully updated a Permission'));
			} else {
				echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
			}
		}
	}

	public function updateExternal(){
		if ($this->user->isLoggedIn()) {
			$id = $this->request->post['id'];
			unset($this->request->post['id']);
			if ($this->db->update($this->request->post, "external_id=$id", "externals")) {
				echo json_encode(array('response'=>true,'message'=>'You have successfully added an External Account'));
			} else {
				echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
			}
		}
	}

	public function deleteAccount(){
		if ($this->user->isLoggedIn()) {
			$id = $this->request->post['id'];
			if ($this->db->query("DELETE FROM accounts WHERE account_id=" . $id)) {
				echo json_encode(array('response'=>true,'message'=>'You have successfully deleted an External Account'));
			} else {
				echo json_encode(array('response'=>false,'message'=>$this->db->queryString));
			}
		}
	}

	public function deleteExternal(){
		if ($this->user->isLoggedIn()) {
			$id = $this->request->post['id'];
			if ($this->db->query("DELETE FROM externals WHERE external_id=" . $id)) {
				echo json_encode(array('response'=>true,'message'=>'You have successfully deleted an External Account'));
			} else {
				echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
			}
		}
	}

	public function deletePermission(){
		if ($this->user->isLoggedIn()) {
			$where = "accessor_id='{$this->request->post['accessor_id']}' AND resource_handle='{$this->request->post['resource_handle']}'";
			if ($this->db->query("DELETE FROM acl WHERE " . $where)) {
				echo json_encode(array('response'=>true,'message'=>'You have successfully deleted an External Account'));
			} else {
				echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
			}
		}
	}

}
?>