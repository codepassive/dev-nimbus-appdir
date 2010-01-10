Textedit[Textedit_instance] = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Textedit_view, 'view_' + Textedit_window.id, Textedit_window);
		Nimbus.Desktop.window.redraw(Textedit_window.id);
	},
	New: function(e){
		var id = $(e).parents('.window').attr('id');
		$('#' + id + ' .textarea').val('');
		$(e).parents('.child').hide();
	},
	Save: function(e, func){
		var id = $(e).parents('.window').attr('id');
		var content = $('#' + id + ' .textarea').val();
		var filename = 'test.txt';
		var path = 'drives/root/' + 'Documents';
		Nimbus.Connect.post(SERVER_URL + '?app=textedit&action=save', {filename: filename, content: content, path: path}, function(result){
			//do a Msgbox message
		});
		$(e).parents('.child').hide();
	},
	Close: function(e){
		var id = $(e).parents('.window').attr('id');
		Nimbus.Desktop.window.close(id, Textedit_window);
	},
	Time: function(e){
		var id = $(e).parents('.window').attr('id');
		var date = new Date();
		$('#' + id + ' .textarea').val($('#' + id + ' .textarea').val() + date);
		$(e).parents('.child').hide();
	},
	About: function(){alert('about');},
}