var Usermanager = {
	init: function(){
		//Add the config container
		Nimbus.Desktop.load(Usermanager_view, 'view_' + Usermanager_window.id, Usermanager_window);

		//Attach the events
		$('#' + Usermanager_window.id + ' .tab-button').click(function(){
			var tab = $(this).attr('title');			
			$('#' + Usermanager_window.id + ' .tab-button').removeClass('focus');
			$(this).addClass('focus');
			$('#' + Usermanager_window.id + ' .tab-content').hide();
			$('#' + tab).show();
			if (tab != 'personalprofile') {
				$('#' + Usermanager_window.id + ' .buttons .button').attr('disabled', 'disabled');
			} else {
				$('#' + Usermanager_window.id + ' .buttons .button').removeAttr('disabled');
			}
		});
	}
}