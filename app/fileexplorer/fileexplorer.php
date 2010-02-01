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
	public $multiple = false;

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
				'title' => 'Nimbus File Explorer',
				'toolbars' => array(
								'top' => array(
										$this->toolbar(array(
											'handle' => $this->api_handle,
											'standard', 
											'File' => array(array('New', 'New', 'Ctrl+N'), array('Save', 'Save', 'Ctrl+S', 'Save'), null, array('Close', 'Close', 'Alt+F4', 'Close')),
											'Edit' => array(array('Time/Date', 'Time', 'F5')),
											'Help' => array(array('About Textedit&#0153;', 'About'))
										)),
										'<input type="text" class="text fill-vertical" value="/" class="fileexplorerpath" />'
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