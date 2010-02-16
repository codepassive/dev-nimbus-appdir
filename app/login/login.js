var Login = {
	init: function(){
		//Add the Login Container
		Nimbus.Desktop.load(Login_view, "login-container");
		//Add some effects that changes the background of the desktop every 30 seconds
		Nimbus.Desktop.background([SERVER_URL + "public/resources/images/wallpapers/aurora1.jpg", SERVER_URL + "public/resources/images/wallpapers/aurora2.jpg", SERVER_URL + "public/resources/images/wallpapers/aurora3.jpg"], 30);
		//Login.submit($('#login-container .buttons .button').get());
	},
	submit: function(button){
		var username = $('#login-text1').val();
		var password = $('#login-password1').val();
		var endpoint = ($('#login-select1').val()) ? $('#login-select1').val(): 0;
		if (endpoint == 0) {
			if (username && password) {
				$(button).attr('disabled', 'disabled').val('Please Wait...');
				Nimbus.Connect.post(SERVER_URL + '?app=login&action=submit', {username:username, password:password, language:endpoint}, function(result){
					if (result.response == true) {
						$(button).val('Logging you in...');
						Nimbus.Application.load('desktop', function(){
							Nimbus.Desktop.unload("login-container");
						});
					} else {
						$(button).removeAttr('disabled').val('Proceed');
						$("#login-notice").remove();
						$('#login-container').animate({ marginLeft: -120 }, 75).animate({ marginLeft: -100 }, 75).animate({ marginLeft: -120 }, 75).animate({ marginLeft: -100 }, 75).animate({ marginLeft: -120 }, 150).animate({ marginLeft: -100 }, 150).animate({ marginLeft: -110 }, 200, function(){
							$("#login-text1").after('<p id="login-notice">' + Nimbus.language.login_incorrect + '</p>');
							$('#login-text1, #login-password1').keypress(function(){$("#login-notice").fadeOut(500);setTimeout("$('#login-notice').remove();",500);});
						});
					}
				})
			} else {
				$("#login-notice").remove();
				$("#login-text1").after('<p id="login-notice">' + Nimbus.language.login_missing + '</p>');
				$('#login-text1, #login-password1').keypress(function(){$("#login-notice").fadeOut(500);setTimeout("$('#login-notice').remove();",500);});
			}
		} else {
			Login.openPopupWindow(endpoint);
		}
	},
	openPopupWindow: function(openid) {
		if (openid == 'http://openid.aol.com/') {
			openid = 'http://openid.aol.com/' + $('#login-text1').val();
		}
		window.open(SERVER_URL + '?app=login&action=openid_begin&openid_identifier=' + encodeURIComponent(openid), 'openid_popup', 'width=790,height=580');
	},
	handleOpenIDResponse: function(openid_args) {
		/*$.get(SERVER_URL + '?app=login&action=openid_begin', {openid_args}, function(result){
			alert(result);
		});*/
	  /*YAHOO.util.Connect.asyncRequest('GET', '/openid_finish?'+openid_args,
		  {'success': function(r) {
				  document.getElementById('bucket').innerHTML = r.responseText; 
			 }}); */
	}
}