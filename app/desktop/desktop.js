var Desktop = {
	init: function(){
		//Add the desktop container
		Nimbus.Desktop.load(Desktop_view, "desktop-container");
		
		//Set the user data to the desktop
		document.title = Desktop_data.title;
		$('#nimbusbar-user a').html(Desktop_data.username);

		//Bind the events
		Desktop.events();
	},
	events: function(){
		$('#nimbusbar-user a').click(function(){/*launch the nimbusbar user shortmenu*/Nimbus.Application.load('user', function(){nUser.shortmenu()})});
		$('#nimbusbar-menu a#thebutton').click(function(){Desktop.nimbusmenu();});		
		//Instances
		$('#nimbusbar-taskbar-controllall').click(function(){/*launch the nimbusbar user shortmenu*/Nimbus.Application.load('instancemanager', function(){Instance.controllAll();})});
		//Icons
		$('.desktop-icons .item').draggable().click(function(){
			$('.desktop-icons .item').removeClass('active');
			$(this).addClass('selected');
		});
	},
	nimbusmenu: function(){
		$('#nimbusbar-menu-container').toggle(0);
	}
}