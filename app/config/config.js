var Config = {
	init: function(){
		//Add the config container
		Nimbus.Desktop.load(Config_view, 'view_' + Config_window.id, Config_window);
		Nimbus.Desktop.window.redraw(Config_window.id);

		//Attach the events
		$('#' + Config_window.id + ' .buttons .button:eq(0)').attr('disabled', 'disabled');
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
		
		$('#personalbackground').click(function(){
			Nimbus.Dialog.open({multiple:true,allow:['jpg','gif','png','bmp'],id:'dialog_' + Config_window.id,parent: Config_window.id}, function(result){
				if (result.constructor == Array) {
					$('#backgroundimagelist').html(' ');
					$.each(result, function(i, e){
						$('#backgroundimagelist').append('<img src="' + e + '" alt="" border="0" width="90"/>&nbsp;');
					});
					result = result.join(",");
				} else {
					$('#backgroundimagelist').html('<img src="' + result + '" alt="" border="0" width="90"/>&nbsp;');
				}
				$('#personalbackground_hidden').val(result);
			});
		});
	},
	_default: function(){
		Nimbus.confirm({id:'dialog315125',title:'Are you sure?',content:'Are you sure you want to revert to default settings?'}, function(){
			Nimbus.Connect.post(SERVER_URL + '?app=config&action=_default', {items:0}, function(result){
				Nimbus.msgbox2({id:'closedialog-' + Config_window.id,title:'Nimbus Confirmation',content:'System reverted to Default Settings.'});
				Config.cancel();
			});
		});
	},
	apply: function(elem, focused){
		var request = {};
		request.focused = (focused) ? focused: $('#' + Config_window.id + ' .tab-button.focus').attr('title');
		$('#' + request.focused + ' .' + request.focused + '_fields').each(function(){
			eval("request." + $(this).attr('name') + " = '" + $(this).val() + "';");
		});
		Nimbus.Connect.post(SERVER_URL + '?app=config&action=apply', request, function(result){
			$('.screen').css('fontSize', request.font_size);
			if (request.theme != 'default') {
				$('#stylesheet-parent').attr('href', request.theme);
			}
			Nimbus.Desktop.refreshRate = request.refresh_rate;
			Nimbus.Desktop.shortcuts = request.shortcuts;
			var background = request.background;
			//BACKGROUND REFERENCE DISAPPEARS
			if (background.indexOf(",") > 0) {
				background = background.split(",");
				Nimbus.Desktop.background(background, 30);
			} else {
				Nimbus.Desktop.background(background);
			}
			$('.screen-background').css({backgroundPosition:request.background_position});
			Nimbus.msgbox2({id:'dialog315125',title:'Nimbus Confirmation',content:'System Updated. The system needs to restart for some settings to take effect.'});
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