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
 * The File Explorer view for the application
 *
 * @category:   		Applications
 */
class fileexplorer extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'fileexplorer';

	/**
	 * The public description of the application
	 *
	 * @access	Public
	 */
	public $description = 'The File Explorer for Nimbus';

	/**
	 * The public url of the application where more information
	 *
	 * @access	Public
	 */
	public $app_url = 'http://apps.nimbusdesktop.com/fileexplorer/';

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
	public $update_url = 'http://thesis/apps/fileexplorer/';

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
	public $api_handle = 'Fileexplorer';

	/**
	 * The javascript handle of the application
	 *
	 * @access	Public
	 */
	public $multiple = true;

	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://fileexplorer/shell/style.css');

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
				'id' => 'fileexplorer-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('fileexplorer'),
				'title' => '',
				'x' => 'center',
				'y' => 'center',
				'width' => '600px',
				'height' => '400px',
				'title' => 'Nimbus File Explorer',
				'toolbars' => array(
								'top' => array(
											//Text, JS Function, Shortcut, PHP Function
											$this->toolbar(array(
												'handle' => $this->api_handle,
												'standard', 
												'File' => /*array(array('Launch', 'Launch'),*/array(array('New File', 'NewFile'), array('New Directory', 'NewDirectory'), null, array('Close', 'Close', 'Alt+F4')),
												'Actions' => array(array('Move', 'Move'), array('Copy', 'Copy'), array('Share...', 'Share'), null, array('Delete', 'Delete'))
											))
										),
							),
				'content' => array(
								$this->useTemplate('shell/fileexplorer')
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
	
	public function newfile(){
		$new = new File($this->request->items['path'] . $this->request->items['filename']);
		if ($file->create()) {
			echo json_encode(array('response'=>true,'message'=>'File created successfully'));
		} else {
			echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
		}
	}
	
	public function newdirectory(){
		$folder = new Folder($this->request->items['path']);
		if ($folder->create()) {
			echo json_encode(array('response'=>true,'message'=>'Folder created successfully'));
		} else {
			echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
		}
	}
	
	public function move(){
		$new = $this->request->items['path'];
		$old = $this->request->items['old'];
		if (rename($old, $new)) {
			echo json_encode(array('response'=>true,'message'=>'Your file has been moved successfully.'));
		} else {
			echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
		}
	}
	
	public function copy(){
		$new = $this->request->items['path'];
		$old = $this->request->items['old'];
		if (copy($old, $new)) {
			echo json_encode(array('response'=>true,'message'=>'Your file has been copied successfully.'));
		} else {
			echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
		}
	}
	
	public function delete(){
		$file = new File(USER_DIR . $this->request->items['path']);
		if ($file->delete()) {
			echo json_encode(array('response'=>true,'message'=>'File successfully deleted'));
		} else {
			echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
		}
	}
	
	public function share(){
		$file = str_replace("\\", "/", $this->request->items['path']);
		$key = generateHash();
		$file = 'usr://' . $file;
		$this->db->query("INSERT INTO share('key', 'resource') VALUES('$key', '$file')");
		if ($this->db->insertID) {
			echo json_encode(array('response'=>true,'message'=>'You can share this file through this link <strong>' . config('appurl') . '?service=share&key=' . $key . '</strong>'));
		} else {
			echo json_encode(array('response'=>false,'message'=>'The system could not recognize the request. Please try again'));
		}
	}
	
	public function grid($allow = array()){
		if ($this->user->isLoggedIn()) {
			$folder = new Folder(USER_DIR . $this->user->username . DS . 'drives');
			$allow = (isset($this->request->items['allow'])) ? $this->request->items['allow']: array();
			$files = $folder->generate($allow);
			if (isset($this->request->items['serialize'])) {
				echo json_encode($files);
			} else {
				echo '<ul>';
				$this->_grid($files);
				echo '</ul>';
			}
		}
	}
	
	private function _grid($arr){
		foreach ($arr as $a) {
			echo '<li><ins>&nbsp;</ins><a href="javascript:;" class="' . $a['type'] . ' item" name="' . str_replace(" ", "", strtolower($a['name'])) . '" title="' . $a['path'] . '">' . $a['name'] . '</a>';
			if (isset($a['sub'])) {
				if (is_array($a['sub'])) {
					echo '<ul>';
					$this->_grid($a['sub']);
					echo '</ul>';
				}
			}
			echo '</li>';
		}
		/* foreach ($arr as $k => $v) {
			echo '<div class="fileexplorerparent grid">' . "\n";
				if (is_array($v)) {
					echo '<div class="item icon" title="' . strtolower(str_replace(" ", "", $k)) . '"><div class="icon-inner"><a href="javascript:;"><span><img src="' . config('appurl') . 'public/resources/images/icons/Tango/32/places/folder.png" border="0" alt="" />' . $k . '</span></a></div></div>' . "\n";
				} else {
					echo '<div class="item icon" title="' . strtolower(str_replace(" ", "", $k)) . '"><div class="icon-inner"><a href="javascript:;"><span><img src="' . config('appurl') . 'public/resources/images/icons/Tango/32/mimetypes/text-x-generic.png" border="0" alt="" />' . $v . '</span></a></div></div>' . "\n";
				}
			echo '</div>';
			echo '<div class="' . strtolower(str_replace(" ", "", $k)) . '-folder class="grid">' . "\n";
			if (is_array($v)) {
				$this->_grid($v);
			}
			echo '</div>' . "\n";
		} */
	}

}
?>