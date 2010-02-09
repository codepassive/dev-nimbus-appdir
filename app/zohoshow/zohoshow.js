Zohoshow[Zohoshow_instance] = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Zohoshow_view, 'view_' + Zohoshow_window.id, Zohoshow_window);
		Nimbus.Desktop.window.redraw(Zohoshow_window.id);
	}
}