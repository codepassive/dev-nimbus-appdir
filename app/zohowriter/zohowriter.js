Zohowriter[Zohowriter_instance] = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Zohowriter_view, 'view_' + Zohowriter_window.id, Zohowriter_window);
		Nimbus.Desktop.window.redraw(Zohowriter_window.id);

		/*Nimbus.Dialog.open({where:'http://export.writer.zoho.com/remotedoc.im',multiple:false,allow:['docx','doc','odt','sxw','rtf','html','txt','pdf','latex'],id:'dialog_' + Zohowriter_window.id,parent: Zohowriter_window.id}, function(result){
			alert(result);
			var src = 'http://export.writer.zoho.com/editor.im';
			$('#' + Zohowriter_window.id + ' .editor').attr('src', src);
		});*/
	}
}