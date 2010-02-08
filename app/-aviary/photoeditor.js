Photoeditor = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Photoeditor_view, 'view_' + Photoeditor_window.id, Photoeditor_window);
		Nimbus.Desktop.window.redraw(Photoeditor_window.id);
	}
}