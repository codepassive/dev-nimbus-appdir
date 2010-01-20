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
 * The Update view for the application
 *
 * @category:   		Applications
 */
class synapse extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'synapse';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The Update manager for Nimbus';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/synapse/';

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
	public $update_url = 'http://thesis/apps/synapse/';

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
	public $api_handle = 'Synapse';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://synapse/shell/style.css');

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
				'id' => 'synapse-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('synapse'),
				'title' => '',
				'x' => 'center',
				'y' => 'center',
				'width' => '400px',
				'title' => 'Nimbus Synapse Update Manager',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/synapse')
							),
				'buttons' => array(
								array('Update', 'update'),
								array('Close', 'close')
							),
				'hasIcon' => true,
				'showInTaskbar' => true,
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
	
	public function fetchupdates(){
		$apps = unserialize(config('applications'));
		$needupdate = array();
		foreach ($apps as $app => $obj) {
			$ap = file_get_contents(config('appurl') . '?app=' . $obj->handle . '&action=info&serialize=1');
			if (!strstr($ap, "404")) {
				$ap = unserialize($ap);
				$version = file_get_contents($ap['update_url'] . 'VERSION');
				if (!strstr($version, "404")) {
					$version = unserialize($version);
					if (version_compare($version['version'], $ap['version'], '>')) {
						$needupdate[] = array(
								'handle' => $obj->handle,
								'name' => $obj->name,
								'version' => $version['version'],
								'released' => $version['released'],
								'description' => $version['description'],
								'priority' => $version['priority']
							);
					}
				}
			}
		}
		//Add the core update
		$version = file_get_contents(config('updateserver') . 'core/VERSION');
		if (!strstr($version, "404")) {
			$version = unserialize($version);
			if (version_compare($version['version'], SYS_MAJOR_VERSION . '.' . SYS_MINOR_VERSION, '>')) {
				$needupdate[] = array(
						'handle' => 'core',
						'name' => 'Nimbus ' . $version['version'],
						'version' => $version['version'],
						'released' => $version['released'],
						'description' => $version['description'],
						'priority' => $version['priority']
					);
			}
		}
		echo json_encode($needupdate);
	}
	
}
?>