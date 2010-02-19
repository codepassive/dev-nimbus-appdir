Fileexplorer[Fileexplorer_instance] = {
	init: function(){
		//Add the config container
		Nimbus.Desktop.load(Fileexplorer_view, 'view_' + Fileexplorer_window.id, Fileexplorer_window);
		Nimbus.Desktop.window.redraw(Fileexplorer_window.id);
		
		$('.fileexplorer .grid .item').dblclick(function(){
			var p = $(this).parents('.window').attr('id');
			var q = $(this).attr('title');
		});
		
		$.getScript(SERVER_URL + 'public/resources/scripts/jquery/plugins/tree/jquery.tree.js', function(){
			Nimbus.HTML.head('link', 'text/css', SERVER_URL + 'public/resources/scripts/jquery/plugins/tree/themes/default/style.css', 'stylesheet');
			$('.fileexplorer .tree').tree({
				type: {
					renameable: false,
					deletable: false,
					creatable: false,
					draggable: false
				},
				rules: {
					multiple: false
				}
			});
		});
	},
	//Launch: function(){},
	NewFile: function(){
		Nimbus.Dialog.custom({width:'270px',height:'160px',title:'Create a New Blank File',content_id:'newfile_dialog_content',id:'dialog_' + Fileexplorer_window.id,parent: Fileexplorer_window.id,
			save: function(){
				var path = $('#dialog_' + Fileexplorer_window.id + ' #path').val();
				var filename = $('#dialog_' + Fileexplorer_window.id + ' #filename').val();
				Nimbus.Connect.post(SERVER_URL + '?app=fileexplorer&action=newfile', {path:path,filename:filename}, function(result){
					Nimbus.msgbox2({id:'closedialog-sharefile_dialog_content',title:'New File', content: result.message});	
				});
			},
			cancel: function(){}
		})
	},
	NewDirectory: function(){
		Nimbus.Dialog.custom({width:'270px',height:'160px',title:'Create a New Blank File',content_id:'newdirectory_dialog_content',id:'dialog_' + Fileexplorer_window.id,parent: Fileexplorer_window.id,
			save: function(){
				var path = $('#dialog_' + Fileexplorer_window.id + ' #path').val();
				var dir = $('#dialog_' + Fileexplorer_window.id + ' #directory_name').val();
				Nimbus.Connect.post(SERVER_URL + '?app=fileexplorer&action=newdirectory', {path:path,directory:dir}, function(result){
					Nimbus.msgbox2({id:'closedialog-sharefile_dialog_content',title:'New Directory', content: result.message});	
				});
			},
			cancel: function(){}
		})
	},
	Close: function(){
		Nimbus.Application.close(Fileexplorer_window.id);
	},
	Move: function(){
		Nimbus.Dialog.custom({width:'270px',height:'120px',title:'Create a New Blank File',content_id:'move_dialog_content',id:'dialog_' + Fileexplorer_window.id,parent: Fileexplorer_window.id,
			save: function(){
				ref = $.tree.reference('.fileexplorer .tree').selected;
				var node = ref;
				var title =  $.tree.reference('.fileexplorer .tree').get_node(node).find('a').attr("title");
				var newitem = $('#dialog_' + Fileexplorer_window.id + ' #move_field').val();
				Nimbus.Connect.post(SERVER_URL + '?app=fileexplorer&action=move', {path:newitem,old:title}, function(result){
					Nimbus.msgbox2({id:'closedialog-sharefile_dialog_content',title:'File Moved', content: result.message});	
				});
			},
			cancel: function(){}
		})
	},
	Copy: function(){
		Nimbus.Dialog.custom({width:'270px',height:'120px',title:'Create a New Blank File',content_id:'copy_dialog_content',id:'dialog_' + Fileexplorer_window.id,parent: Fileexplorer_window.id,
			save: function(){
				ref = $.tree.reference('.fileexplorer .tree').selected;
				var node = ref;
				var title =  $.tree.reference('.fileexplorer .tree').get_node(node).find('a').attr("title");
				var newitem = $('#dialog_' + Fileexplorer_window.id + ' #copy_field').val();
				Nimbus.Connect.post(SERVER_URL + '?app=fileexplorer&action=copy', {path:newitem,old:title}, function(result){
					Nimbus.msgbox2({id:'closedialog-sharefile_dialog_content',title:'File Copied', content: result.message});	
				});
			},
			cancel: function(){}
		})
	},
	Share: function(){
		Nimbus.confirm({title:'Share an Item?',id:'sharefile_dialog_content',content:'Are you sure you want to share this Item?'},
			function(){
				ref = $.tree.reference('.fileexplorer .tree').selected;
				var node = ref;
				var title =  $.tree.reference('.fileexplorer .tree').get_node(node).find('a').attr("title");
				Nimbus.Connect.post(SERVER_URL + '?app=fileexplorer&action=share', {path:title}, function(result){
					Nimbus.msgbox2({id:'closedialog-sharefile_dialog_content',title:'Share File', content: result.message});	
				});
			}
		);
	},
	Delete: function(){
		Nimbus.confirm({title:'Deleted Selected Item?',id:'deletefile_dialog_content',content:'Are you sure you want to delete this Item?'},
			function(){
				ref = $.tree.reference('.fileexplorer .tree').selected;
				var node = ref;
				var title =  $.tree.reference('.fileexplorer .tree').get_node(node).find('a').attr("title");
				$.post(SERVER_URL + '?app=fileexplorer&action=delete', {path:title}, function(result){
					Nimbus.msgbox2({id:'closedialog-delete_dialog_content',title:'Delete File', content: result.message});	
				});
			}
		);
	}
}