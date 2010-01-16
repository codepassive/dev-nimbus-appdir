var Config = {
	init: function(){
		//Add the config container
		Nimbus.Desktop.load(Config_view, 'view_' + Config_window.id, Config_window);
		Nimbus.Desktop.window.redraw(Config_window.id);

		//Attach the events
		$('#' + Config_window.id + ' .tab-button').click(function(){
			var tab = $(this).attr('title');			
			$('#' + Config_window.id + ' .tab-button').removeClass('focus');
			$(this).addClass('focus');
			$('#' + Config_window.id + ' .tab-content').hide();
			$('#' + tab).show();
			if (tab == 'personalize') {
				$('#' + Config_window.id + ' .buttons .button:eq(0)').attr('disabled', 'disabled');
			} else {
				$('#' + Config_window.id + ' .buttons .button:eq(0)').removeAttr('disabled');
			}
		});
	},
	_default: function(){
		if (confirm('Are you sure you want to revert to default settings?')) {
			Nimbus.Connect.post(SERVER_URL + '?app=config&action=_default', {items:0}, function(result){
				alert('System reverted to Default Settings.');
				Config.cancel();
			});
		}
	},
	apply: function(elem, focused){
		var request = {};
		request.focused = (focused) ? focused: $('#' + Config_window.id + ' .tab-button.focus').attr('title');
		$('#' + request.focused + ' .' + request.focused + '_fields').each(function(){
			eval("request." + $(this).attr('name') + " = '" + $(this).val() + "';");
		});
		Nimbus.Connect.post(SERVER_URL + '?app=config&action=apply', request, function(result){
			alert('System Updated. Please restart your System for settings to take effect.');
		});
	},
	cancel: function(){
		Nimbus.Desktop.window.close(Config_window.id, Config_window.handle);
	},
	submit: function(){
		Config.apply(null, 'personalize');
		Config.apply(null, 'regional');
		Config.apply(null, 'administrative');
		Config.cancel();
	}
}