Textedit[Textedit_instance] = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Textedit_view, 'view_' + Textedit_window.id, Textedit_window);
		Textedit[Textedit_instance].redraw();
	},
	redraw: function(){
		//Fix the textarea height
		var height = $('.textedit .inner').height();
		var width = $('.textedit .inner').width();
		$('.textedit-inner textarea').height((height - 2) + 'px');
	}
}