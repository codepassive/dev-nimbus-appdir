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
		$('#nimbusbar-taskbar a').click(function(){});
	},
	nimbusmenu: function(){
	
	}
}