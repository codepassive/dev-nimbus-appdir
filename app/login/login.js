var Login = {
	init: function(){
		//Add the Login Container
		Nimbus.Desktop.load(Login_view, "login-container");
		//Add some effects that changes the background of the desktop every 30 seconds
		Nimbus.Desktop.background([SERVER_URL + "public/resources/images/wallpapers/aurora1.jpg", SERVER_URL + "public/resources/images/wallpapers/aurora2.jpg", SERVER_URL + "public/resources/images/wallpapers/aurora3.jpg"], 30);
		$('.login').css({right:-300});
		$('.login').animate({right:0}, 1000);
		//Login.submit($('#login-button1').get());
		$('#login-button1').click(function(){Login.submit()});
		$('.textbox').keypress(function(e){
			var button = $('#login-container .buttons .proceed').get(0);
			var code = (e.keyCode ? e.keyCode : e.which);
			if (code == 13) {
				Login.submit(button);
			}
		});
	},
	submit: function(button){
		var username = $('#login-text1').val();
		var password = $('#login-password1').val();
		var endpoint = ($('#login-select1').val()) ? $('#login-select1').val(): 0;
		if (endpoint == 0) {
			if (username && password) {
				//$(button).attr('disabled', 'disabled').val('Please Wait...');
				$('#login-button1').attr('disabled', 'disabled').val('Please Wait...');
				Nimbus.Connect.post(SERVER_URL + '?app=login&action=submit', {username:username, password:password, language:endpoint}, function(result){
					if (result.response == true) {
						//$(button).val('Logging you in...');
						$('#login-button1').val('Logging you in...');
						Nimbus.Application.load('desktop', function(){
							//Nimbus.Desktop.unload("login-container");
							$('.login').animate({right:-300}, 1000);
							setTimeout("$('.login').remove()",1500);
						});
					} else {
						//$(button).removeAttr('disabled').val('Proceed');
						$('#login-button1').removeAttr('disabled').val('Proceed');
						$("#message").remove();
						$('.login').animate({opacity:'0.4'}, 200).animate({opacity:'1'}, 200).animate({opacity:'0.4'}, 200).animate({opacity:'1'}, 200).animate({opacity:'0.4'}, 200).animate({opacity:'1'}, 200, function(){
							$('#login-form1').append('<div id="message">' + Nimbus.language.login_incorrect + '</div>');
							$('#login-text1, #login-password1').keypress(function(){$("#message").fadeOut(500);setTimeout("$('#message').remove();",500);});
						});
						//$('.login').animate({ marginLeft: -120 }, 75).animate({ marginLeft: -100 }, 75).animate({ marginLeft: -120 }, 75).animate({ marginLeft: -100 }, 75).animate({ marginLeft: -120 }, 150).animate({ marginLeft: -100 }, 150).animate({ marginLeft: -110 }, 200, function(){
							//$("#login-text1").after('<p id="login-notice">' + Nimbus.language.login_incorrect + '</p>');
							//$('#login-text1, #login-password1').keypress(function(){$("#login-notice").fadeOut(500);setTimeout("$('#login-notice').remove();",500);});
						//});
					}
				})
			} else {
				$("#message").remove();
				$('#login-form1').append('<div id="message">' + Nimbus.language.login_missing + '</div>');
				$('#login-text1, #login-password1').keypress(function(){$('#message').fadeOut(500);setTimeout("$('#message').remove();",500);});
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