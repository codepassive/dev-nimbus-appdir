Zohosheet[Zohosheet_instance] = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Zohosheet_view, 'view_' + Zohosheet_window.id, Zohosheet_window);
		Nimbus.Desktop.window.redraw(Zohosheet_window.id);
	}
}