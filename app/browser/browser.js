Browser[Browser_instance] = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Browser_view, 'view_' + Browser_window.id, Browser_window);
		Nimbus.Desktop.window.redraw(Browser_window.id);
		
		$('#' + Browser_window.id + ' .src').keypress(function(e){
			var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) {
				$('#' + Browser_window.id + ' .framewindow').attr('src', $(this).val());
			}
		});
	}
}