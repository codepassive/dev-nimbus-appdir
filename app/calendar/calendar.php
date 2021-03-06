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
class Calendar extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'calendar';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The native Calendar for nimbus.';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/calendar/';

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
	public $update_url = 'http://thesis/apps/calendar/';

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
	public $api_handle = 'Calendar';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://calendar/shell/style.css');

	/**
	 * Determine whether an Application uses multiple instances
	 *
	 * @access	Public
	 */
	public $multiple = false;

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
		$this->id = 'calendar-container-' . generateHash();
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => $this->id,
				'type' => 0,
				'classes' => array('calendar'),
				'title' => '',
				'width' => '370px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/apps/office-calendar.png',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/calendar')
							),
				'hasIcon' => false,
				'showInTaskbar' => false,
				'minimizable' => false,
				'closable' => false,
				'toggable' => false,
				'resizable' => false,
				'draggable' => false,
			));
		$events = $this->db->query("SELECT * FROM app_calendar WHERE account_id={$this->user->id}");
		$ev = array();
		foreach ($events as $event) {
			$obj = new stdClass();
			$obj->id = $event['id'];
			$obj->title = $event['short_description'];
			$obj->start = $event['time_start'];
			$obj->end = $event['time_end'];
			$obj->className = $event['class'];
			$ev[] = $obj;
		}
		$e = array('events' => $ev);
		//Return the window flags
		$this->json(array_merge($window->flag(), $e), 'window');
		//Return the Window? - Think of a better way for this
		return $window;
	}
	
	public function add(){
		if ($this->user->isAllowed('calendar')){
			$request = array(
				'short_description' => $this->request->post['short_description'],
				'time_start' => date("Y-m-d", strtotime($this->request->post['time_start'])),
				'time_end' => date("Y-m-d", strtotime($this->request->post['time_end'])),
				'type' => $this->request->post['type'],
				'class' => $this->request->post['class'],
				'account_id' => $this->user->id
			);
			if ($this->db->insert($request, "app_calendar")) {
				$id = $this->db->insertID;
				$query = $this->db->query("SELECT * FROM app_calendar WHERE id=$id");
				echo json_encode(array('response'=>true,'message'=>'Event Added successfully','event'=>$query[0]));
			} else {
				echo json_encode(array('response'=>false,'message'=>'Could not recognize the request. Please try again.'));
			}
		}
	}
	
	public function update(){
		if ($this->user->isAllowed('calendar')){
			$id = $this->request->post['id'];
			$request = array(
				'short_description' => $this->request->post['short_description'],
				'time_start' => date("Y-m-d", strtotime($this->request->post['time_start'])),
				'time_end' => date("Y-m-d", strtotime($this->request->post['time_end'])),
				'class' => $this->request->post['class'],
			);
			if ($this->db->update($request, "id=$id", "app_calendar")) {
				$query = $this->db->query("SELECT * FROM app_calendar WHERE id=$id");
				echo json_encode(array('response'=>true,'message'=>'Event Updated successfully','event'=>$query[0]));
			} else {
				echo json_encode(array('response'=>false,'message'=>'Could not recognize the request. Please try again.'));
			}
		}
	}
	
	public function delete(){
		if ($this->user->isAllowed('calendar')){
			$id = $this->request->post['id'];
			if ($this->db->delete("id=$id", "app_calendar")) {
				echo json_encode(array('response'=>true,'message'=>'Event Deleted successfully'));
			} else {
				echo json_encode(array('response'=>false,'message'=>'Could not recognize the request. Please try again.'));
			}
		}
	}

}
?>