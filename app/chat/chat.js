Chat = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Chat_view, 'view_chat');
		$('.chat').css({left:-290});
		$('.chat').animate({left:0},500);
		var interval = setInterval("Chat.check();", 500);
		$('#closechat').click(function(){$('.chat').remove();clearInterval(interval);});
		$('#chat-message').keypress(function(e){
			var code = (e.keyCode ? e.keyCode : e.which);
			if (code == 13) {
				Chat.send($('#chat-message').val());
			}
		});
		$('#chat-button').click(function(){Chat.send($('#chat-message').val());});
	},
	check: function(){
		$.get(SERVER_URL + '?app=chat&action=check', function(result){
			$('#chat-messages').html(result);
		});
	},
	send: function(val){
		$('#chat-message, #chat-button').attr('disabled',true);
		$.post(SERVER_URL + '?app=chat&action=send', {message:val},function(res){
			$('#chat-message').val('').focus();
			$('#chat-message, #chat-button').removeAttr('disabled');
		});
	}
}