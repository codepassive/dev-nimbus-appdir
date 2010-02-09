Aviary = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Aviary_view, 'view_' + Aviary_window.id, Aviary_window);
		Nimbus.Desktop.window.redraw(Aviary_window.id);
	}
}