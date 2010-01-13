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
			$('#nimbusbar-menu-container').hide();
			$('#nimbusbar-user-container').show();
			$('#nimbusbar-user a.userbutton').addClass('active');
		}, function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-user-container').hide();
		});
		$('#nimbusbar-menu a#thebutton').toggle(function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-user-container').hide();
			$('#nimbusbar-menu-container').show();
		}, function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-menu-container').hide();
		});
		$('body').click(function(e){if ($(e.target).parents('.menu-container').length == 0) {
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('.menu-container').hide();
		}});
		//Usermenu
		$('#usermenusetstatus').click(function(){});
		$('#usermenulockscreen').click(function(){});
		$('#usermenulogoff').click(function(){});
		$('#usermenupersonalize').click(function(){});
		$('#usermenupersonal').click(function(){});
		$('#usermenuconfiguserpermissions').click(function(){});
		$('#usermenuattachexternal').click(function(){});
		$('#usermenulogintomessenger').click(function(){});
		$('#usermenucheckmail').click(function(){});
		$('#usermenulivenews').click(function(){});
		
		//Instances
		$('#nimbusbar-taskbar-controllall').click(function(){/*launch the nimbusbar user shortmenu*/Nimbus.Application.load('instancemanager', function(){Instance.controllAll();})});
	}
}