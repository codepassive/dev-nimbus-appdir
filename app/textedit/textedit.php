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
class textedit extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'textedit';

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
	public $app_url = 'http://apps.nimbusdesktop.com/textedit/';

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
	public $update_url = 'http://thesis/apps/textedit/';

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
	public $api_handle = 'Textedit';

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://textedit/shell/style.css');

	/**
	 * Determine whether an Application uses multiple instances
	 *
	 * @access	Public
	 */
	public $multiple = true;

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
				'handle' => $this->api_handle,
				'id' => 'textedit-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('textedit'),
				'title' => 'Textedit - Nimbus Text Editor',
				'x' => 'center',
				'y' => 'center',
				'width' => '400px',
				'height' => '200px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/apps/accessories-text-editor.png',
				'height' => '300px',
				'toolbars' => array(
								'top' => array(
									//Text, JS Function, Shortcut, PHP Function
									$this->toolbar(array(
										'handle' => $this->api_handle,
										'standard', 
										'File' => array(array('New', 'New', 'Ctrl+N'), array('Open', 'Open', 'Ctrl+O', 'Open'), array('Save', 'Save', 'Ctrl+S', 'Save'), null, array('Close', 'Close', 'Alt+F4', 'Close')),
										'Actions' => array(array('Insert Time/Date', 'Time', 'F5')),
										'Information' => array(array('About', 'About', null, 'About')),
									))
								)
							),
				'content' => array(
								$this->useTemplate('shell/textedit')
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

	public function save(){
		if ($this->user->isAllowed('textedit')) {
			$content = $this->request->post['content'];
			$filename = $this->request->post['filename'];
			$path = $this->request->post['path'];
			$result = false;
			if ($file = new File(DATA_DIR . 'usr' . DS . $this->user->username . DS . $path . DS . $filename, true)) {
				$result = true;
				$file->write($content);
				echo json_encode(array('response'=>true,'message'=>'Successfully saved ' . $filename . ' to "' . $path . '".'));
			} else {
				echo json_encode(array('response'=>false,'message'=>'The system could not save this file. Please try again'));
			}
		}
	}
	
	public function read(){
		if ($this->user->isAllowed('textedit')) {
			$path = $this->request->post['path'];
			$result = false;
			if ($file = new File(DATA_DIR . 'usr' . DS . $this->user->username . DS . $path)) {
				$result = true;
				echo json_encode(array('response'=>true,'message'=>'','content'=>$file->read()));
			} else {
				echo json_encode(array('response'=>false,'message'=>'The system could not read this file. Please try again'));
			}
		}
	}

}
?>