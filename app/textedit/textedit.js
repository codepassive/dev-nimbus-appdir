Textedit[Textedit_instance] = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Textedit_view, 'view_' + Textedit_window.id, Textedit_window);
		Nimbus.Desktop.window.redraw(Textedit_window.id);
	},
	New: function(e){
		Nimbus.confirm({id:'new_' + Textedit_window.id,title:'Confirmation',content:'Are you sure you want to clear the focused textarea?'}, function(){
			var id = $(e).parents('.window').attr('id');
			$('#' + id + ' .textarea').val('');
			$(e).parents('.child').hide();
		});
	},
	Save: function(e, func){
		var id = $(e).parents('.window').attr('id');
		var content = $('#' + id + ' .textarea').val();
		Nimbus.Dialog.save({save:SERVER_URL + '?app=textedit&action=save',id:'save_' + Textedit_window.id,parent: Textedit_window.id, content: content}, function(result){
			$(e).parents('.window').find('.filename').val(result.filename);
			$(e).parents('.window').find('.path').val(result.path);
			$(e).parents('.window').find('.titlebar .title').html(result.path + '/' + result.filename + ' - ' + $(e).parents('.window').find('.titlebar .title').html());
		});
	},
	Close: function(e){
		Nimbus.confirm({id:'close_' + Textedit_window.id,title:'Confirmation',content:'Are you sure you want to close this application?'}, function(){
			var id = $(e).parents('.window').attr('id');
			Nimbus.Desktop.window.close(id, Textedit_window);
		});
	},
	Time: function(e){
		var id = $(e).parents('.window').attr('id');
		var date = new Date();
		$('#' + id + ' .textarea').val($('#' + id + ' .textarea').val() + date);
		$(e).parents('.child').hide();
	},
	About: function(){
		Nimbus.Dialog.justOk({width:'270px',height:'180px',title:'About',content_id:'textedit-dialog-about',id:'dialog_' + Textedit_window.id,parent: Textedit_window.id}, function(){});
	}
}