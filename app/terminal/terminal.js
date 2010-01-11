Terminal[Terminal_instance] = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Terminal_view, 'view_' + Terminal_window.id, Terminal_window);
		$('#' + Terminal_window.id + ' .terminal-input').focus().keypress(
			function(e){
				var code = (e.keyCode ? e.keyCode : e.which);
				if(code == 13) {
					var command = $(this).val();
					Terminal[Terminal_instance].submit(command);
					$(this).val('').focus();
				}
			});
	},
	submit: function(command, options){
		var title = $('#' + Terminal_window.id + ' .title').html();
		Nimbus.Desktop.window.title(Terminal_window.id, title + ' - Working...');
		Nimbus.Connect.post(SERVER_URL + '?app=terminal&action=submit', {command: command}, function(result){
			var t = $('#' + Terminal_window.id + ' textarea.terminal-screen');
			if (t.val().length > 300) {
				t.val(t.val()); //Clip the textarea
			}
			if (result != false) {
				t.val(t.val() + ' ' + command + "\n" + result + "\n\n$ ");
			} else {
				var cmd = command.split(" ");
				t.val(t.val() + ' ' + command + "\nCommand \"" + cmd[0] + "\" failed to execute.\n\n$ ");
			}
			var t = t.get(0);
			t.scrollTop = t.scrollHeight;
			Nimbus.Desktop.window.title(Terminal_window.id, title);
		});
	}
}