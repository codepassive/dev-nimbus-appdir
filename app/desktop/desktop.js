var Desktop = {
	init: function(){
		//Add the desktop container
		Nimbus.Desktop.load(Desktop_view, "desktop-container");
		
		//Set the user data to the desktop
		document.title = Desktop_data.username + ' @ nimbus';
		$('#nimbusbar-user a').html(Desktop_data.username);
	},
}