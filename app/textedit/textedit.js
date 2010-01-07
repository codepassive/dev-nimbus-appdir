var Textedit = {
	init: function(){
		Nimbus.Desktop.load(Textedit_view, "textedit-container", Textedit_window);
		
		Textedit.redraw();
	},
	redraw: function(){
		//Fix the textarea height
		var height = $('.textedit .inner').height();
		var width = $('.textedit .inner').width();
		$('.textedit-inner textarea').height((height - 2) + 'px');
	}
}