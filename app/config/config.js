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
		});
	}
}