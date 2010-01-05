var Login = {
	init: function(){
		//Add the Login Container
		Nimbus.Desktop.load(Login_view, "login-container");
		//Add some effects that changes the background of the desktop every 30 seconds
		Nimbus.Desktop.background([SERVER_URL + "public/resources/images/wallpapers/aurora1.jpg", SERVER_URL + "public/resources/images/wallpapers/aurora2.jpg", SERVER_URL + "public/resources/images/wallpapers/aurora3.jpg"], 30);
	},
	submit: function(button){
		var username = $('#login-text1').val();
		var password = $('#login-password1').val();
		var language = $('#login-select1').val();
		if (username && password) {
			$(button).attr('disabled', 'disabled').val('Please Wait...');
			Nimbus.Connect.post(SERVER_URL + '?app=login&action=submit', {username:username, password:password, language:language}, function(result){
				if (result.response == true) {
					$(button).val('Logging you in...');
					Nimbus.Application.load('desktop', function(){
						Nimbus.Desktop.unload("login-container");
					});
				} else {
					$(button).removeAttr('disabled').val('Proceed');
					$("#login-notice").remove();
					$("#login-text1").after('<p id="login-notice">' + Nimbus.language.login_incorrect + '</p>');
					$('#login-text1, #login-password1').keypress(function(){$("#login-notice").fadeOut(500);setTimeout("$('#login-notice').remove();",500);});
				}
			}, "json")
		} else {
			$("#login-notice").remove();
			$("#login-text1").after('<p id="login-notice">' + Nimbus.language.login_missing + '</p>');
			$('#login-text1, #login-password1').keypress(function(){$("#login-notice").fadeOut(500);setTimeout("$('#login-notice').remove();",500);});
		}
	}
}