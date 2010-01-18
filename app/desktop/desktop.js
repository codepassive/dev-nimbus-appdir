var Desktop = {
	init: function(){
		//Add the desktop container
		Nimbus.Desktop.load(Desktop_view, "desktop-container");
		
		//Set the user data to the desktop
		document.title = Desktop_data.title;
		$('#nimbusbar-user a.userbutton').html(Desktop_data.username);

		$.each(Desktop_data.desktop_icons, function(i, e){
			Nimbus.Desktop.addIcon(e);
		});
		
		//Bind the events
		Desktop.events();
	},
	events: function(){
		$('#nimbusbar-user a.userbutton').toggle(function(){
			/*launch the nimbusbar user shortmenu*/
			$('#nimbusbar-menu-container').click();
			$('#nimbusbar-user-container').show();
			$('#nimbusbar-user a.userbutton').addClass('active');
			$('.window.instance').fadeOut(500);
			setTimeout("$('.window.instance').remove()", 500);
		}, function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-user-container').hide();
		});
		$('#nimbusbar-menu a#thebutton').toggle(function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-user-container').click();
			$('#nimbusbar-menu-container').show();
			$('.window.instance').fadeOut(500);
			setTimeout("$('.window.instance').remove()", 500);
		}, function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-menu-container').hide();
		});
		$('body').click(function(e){if ($(e.target).parents('.menu-container').length == 0) {
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('.menu-container').hide();
		}});
		//Usermenu
		$('#usermenusetstatus').click(function(){alert('Not yet implemented. Will attach to the Bridge application.');});
		$('#usermenulockscreen').click(function(){alert('Not yet implemented. Should Lock the screen on idle sessions');});
		$('#usermenulogoff').click(function(){alert('Not yet implemented. Should log a user out of their session');});
		$('#usermenupersonalize').click(function(){
			Nimbus.Application.load('config', function(){
				$('#config-container .tab-button:eq(0)').click();
			});
			$('#config-container .tab-button:eq(0)').click();
		});
		$('#usermenupersonal').click(function(){
			Nimbus.Application.load('usermanager', function(){
				$('#usermanager-container .tab-button:eq(0)').click();
			});
			$('#usermanager-container .tab-button:eq(0)').click();
		});
		$('#usermenuconfiguserpermissions').click(function(){
			Nimbus.Application.load('usermanager', function(){
				$('#usermanager-container .tab-button:eq(2)').click();
			});
			$('#usermanager-container .tab-button:eq(2)').click();
		});
		$('#usermenuattachexternal').click(function(){
			Nimbus.Application.load('usermanager', function(){
				$('#usermanager-container .tab-button:eq(1)').click();
			});
			$('#usermanager-container .tab-button:eq(1)').click();
		});
		$('#usermenulogintomessenger').click(function(){alert('Not yet implemented. Will attach to the Messenger application.');});
		$('#usermenucheckmail').click(function(){alert('Not yet implemented. Will attach to the Email application.');});
		
		//Startmenu
		$('#nimbusbar-menu-container .item a').click(function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-menu-container').hide();
			Nimbus.Application.load($(this).attr('title'));
		});
		
		//Instances
		$('#nimbusbar-taskbar-controllall').click(function(){
			/*launch the nimbusbar user shortmenu*/
			$('.menu-container').hide();
			if ($('.window.instance').length) {
				$('.window.instance').fadeOut(500);
				setTimeout("$('.window.instance').remove()", 500);
			} else {
				Nimbus.Application.load('instance', function(){Instance.init();});
			}
		});
	}
}