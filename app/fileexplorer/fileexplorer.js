var Fileexplorer = {
	init: function(){
		//Add the config container
		Nimbus.Desktop.load(Fileexplorer_view, 'view_' + Fileexplorer_window.id, Fileexplorer_window);
		Nimbus.Desktop.window.redraw(Fileexplorer_window.id);
		
		$('.fileexplorer .grid .item').dblclick(function(){
			var p = $(this).parents('.window').attr('id');
			var q = $(this).attr('title');
		});
	}
}