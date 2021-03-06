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
class zohoshow extends Application implements ApplicationInterface {

	/**
	 * The public name of the application
	 *
	 * @access	Public
	 */
	public $name = 'zohoshow';

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
	public $app_url = 'http://apps.nimbusdesktop.com/zohoshow/';

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
	public $update_url = 'http://synapse.nimbusdesktop.org/latest/zohoshow/';

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
	public $api_handle = 'Zohoshow';

	public $multiple = true;
	
	/**
	 * Styles used by the application
	 *
	 * @access	Public
	 */
	public $styles = array('app://zohoshow/shell/style.css');

	/**
	 * The initial method that instantiates the application
	 *
	 * @access	Public
	 */
	public function init(){
		/*$arr = unserialize('a:9:{s:8:"textedit";O:8:"stdClass":4:{s:4:"name";s:15:"Nimbus Textedit";s:6:"handle";s:8:"textedit";s:4:"icon";s:85:"http://thesis/public/resources/images/icons/Tango/32/apps/accessories-text-editor.png";s:7:"version";s:5:"1.0.0";}s:10:"calculator";O:8:"stdClass":4:{s:4:"name";s:17:"Nimbus Calculator";s:6:"handle";s:10:"calculator";s:4:"icon";s:84:"http://thesis/public/resources/images/icons/Tango/32/apps/accessories-calculator.png";s:7:"version";s:5:"1.0.0";}s:8:"terminal";O:8:"stdClass":4:{s:4:"name";s:15:"Nimbus Terminal";s:6:"handle";s:8:"terminal";s:4:"icon";s:80:"http://thesis/public/resources/images/icons/Tango/32/apps/utilities-terminal.png";s:7:"version";s:5:"1.0.0";}s:8:"calendar";O:8:"stdClass":4:{s:4:"name";s:15:"Nimbus Calendar";s:6:"handle";s:8:"calendar";s:4:"icon";s:77:"http://thesis/public/resources/images/icons/Tango/32/apps/office-calendar.png";s:7:"version";s:5:"1.0.0";}s:6:"zohoshow";O:8:"stdClass":4:{s:4:"name";s:16:"zohoshow - Phoenix";s:6:"handle";s:6:"zohoshow";s:4:"icon";s:44:"http://zohoshow.com/images/eggs/32/phoenix.png";s:7:"version";s:5:"1.0.0";}s:10:"zohoshow";O:8:"stdClass":4:{s:4:"name";s:13:"Zoho - Writer";s:6:"handle";s:10:"zohoshow";s:4:"icon";s:70:"public/resources/images/icons/Tango/32/mimetypes/x-office-document.png";s:7:"version";s:5:"1.0.0";}s:9:"zohoshow";O:8:"stdClass":4:{s:4:"name";s:12:"Zoho - show";s:6:"handle";s:9:"Zohoshow";s:4:"icon";s:73:"public/resources/images/icons/Tango/32/mimetypes/x-office-spreadshow.png";s:7:"version";s:5:"1.0.0";}s:8:"zohoshow";O:8:"stdClass":4:{s:4:"name";s:11:"Zoho - Show";s:6:"handle";s:8:"Zohoshow";s:4:"icon";s:74:"public/resources/images/icons/Tango/32/mimetypes/x-office-presentation.png";s:7:"version";s:5:"1.0.0";}s:4:"chat";O:8:"stdClass":4:{s:4:"name";s:11:"Nimbus Chat";s:6:"handle";s:4:"Chat";s:4:"icon";s:67:"public/resources/images/icons/Tango/32/apps/internet-group-chat.png";s:7:"version";s:5:"1.0.0";}}a:8:{s:8:"fileguid";s:36:"f264d7a6-65c9-102d-92fe-0030488e168c";s:4:"name";s:8:"test.egg";s:8:"imageurl";s:62:"http://rookery5.zohoshow.com/storagev12/3039500/3039576_85e5.png";s:9:"thumbnail";s:66:"http://rookery5.zohoshow.com/storagev12/3039500/3039576_ea47_sqr.jpg";s:11:"description";s:0:"";s:4:"tags";s:0:"";s:8:"userhash";s:9:"0937afa17";s:4:"tool";s:7:"phoenix";}');
		$obj = new stdClass();
		$obj->name = 'Nimbus Browser';
        $obj->handle = 'Browser';
        $obj->icon = 'public/resources/images/icons/Tango/32/apps/internet-web-browser.png';
        $obj->version = '1.0.0';
		$arr['browser'] = $obj;
		echo serialize($arr);*/
	}

	/**
	 * The method that contains the main interface for the application
	 *
	 * @access	Public
	 */
	public function main(){
		//Create a Window
		$window = $this->window(array(
				'handle' => $this->api_handle,
				'id' => 'zohoshow-container-' . generateHash(microtime()),
				'type' => 0,
				'classes' => array('zohoshow'),
				'title' => 'Zoho - Show',
				'x' => 'center',
				'y' => 'center',
				'width' => '800px',
				'icon' => config('appurl') . 'public/resources/images/icons/Tango/16/mimetypes/x-office-presentation.png',
				'height' => '600px',
				'toolbars' => array(),
				'content' => array(
								$this->useTemplate('shell/zohoshow')
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

}
?>