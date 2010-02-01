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
class config extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'config';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The Configuration Panel for Nimbus';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/config/';

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
	public $update_url = 'http://synapse.nimbusdesktop.org/latest/config/';

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
	public $api_handle = 'Config';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://config/shell/style.css');

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
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => 'config-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('config', 'static'),
				'title' => 'Nimbus Configuration Dashboard',
				'x' => 'center',
				'y' => 'center',
				'width' => '500px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/categories/applications-system.png',
				'height' => '454px',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/config')
							),
				'buttons' => array(
								array('Reset to Default', '_default'),
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
	
	public function _default(){
		if (isset($this->request->items['items'])) {
			$personals = array(
					'theme' => 'default',
					'language' => 'en-us',
					'refresh_rate' => 5,
					'shortcuts' => 1,
					'developer' => 1,
					'font_size' => 100,
					'timezone' => 'Asia/Manila',
					'datetime_format' => 'F j, Y H:i a'
				);
			foreach ($personals as $key => $value) {
				$this->db->query("UPDATE personalize SET option_value='$value' WHERE option_name='$key' AND user_id=" . $this->user->id);
			}
			$options = array(
					'language' => CONFIG_LANGUAGE,
					'timezone' => CONFIG_TIMEZONE,
					'autoupdate' => CONFIG_AUTOUPDATE,
					'updateserver' => CONFIG_UPDATESERVER,
					'namespace' => CONFIG_NAMESPACE,
					'appname' => CONFIG_APPNAME,
					'allowregistration' => CONFIG_ALLOWREGISTRATION,
					'smtp_url' => CONFIG_SMTP_URL,
					'smtp_login' => CONFIG_SMTP_LOGIN,
					'smtp_password' => CONFIG_SMTP_PASSWORD,
					'smtp_port' => CONFIG_SMTP_PORT,
					'root_user' => CONFIG_ROOT_USER,
					'date_format' => CONFIG_DATE_FORMAT,
					'time_format' => CONFIG_TIME_FORMAT,
					'pingserver' => CONFIG_PINGSERVER,
					'default_theme' => CONFIG_DEFAULT_THEME,
					'accountbridging' => CONFIG_ACCOUNTBRIDGING,
					'transport' => CONFIG_TRANSPORT,
					'partition' => CONFIG_PARTITION,
					'partition_per_user' => CONFIG_PARTITION_PER_USER,
					'refresh_rate' => CONFIG_REFRESH_RATE,
					'multiuser' => CONFIG_MULTIUSER,
					'security' => CONFIG_SECURITY,
					'font_size' => CONFIG_FONT_SIZE,
				);
			foreach ($options as $key => $value) {
				$this->db->query("UPDATE options SET option_value='$value' WHERE option_name='$key'");
			}
			echo json_encode(true);
		}
	}
	
	public function apply(){
		$focused = $this->request->post['focused'];
		if ($focused) {
			unset($this->request->post['focused']);
			switch ($focused) {
				case "regional":
				case "personalize":
					foreach ($this->request->post as $key => $value) {
						if ($key == 'background') {
							if (strstr($value, ",")) {
								$value = explode(",", $value);
							}
							$value = serialize($value);
						}
						if ($value != '') {
							$this->db->query("UPDATE personalize SET option_value='$value' WHERE option_name='$key' AND user_id=" . $this->user->id);
						}
					}
				break;
				case "administrative":
					foreach ($this->request->post as $key => $value) {
						$this->db->query("UPDATE options SET option_value='$value' WHERE option_name='$key'");
					}
				break;
			}
		}
		echo json_encode(true);
	}
	
}
?>