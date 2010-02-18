var Usermanager = {
	init: function(){
		//Add the Usermanager container
		Nimbus.Desktop.load(Usermanager_view, 'view_' + Usermanager_window.id, Usermanager_window);

		//Attach the events
		$('#' + Usermanager_window.id + ' .tab-button').click(function(){
			var tab = $(this).attr('title');			
			$('#' + Usermanager_window.id + ' .tab-button').removeClass('focus');
			$(this).addClass('focus');
			$('#' + Usermanager_window.id + ' .tab-content').hide();
			$('#' + tab).show();
			if (tab != 'personalprofile') {
				$('#' + Usermanager_window.id + ' .buttons .button').attr('disabled', 'disabled');
			} else {
				$('#' + Usermanager_window.id + ' .buttons .button').removeAttr('disabled');
			}
		});
		$('.changeavatar').click(function(){
			Nimbus.Dialog.open({multiple:false,allow:['jpg','gif','png','bmp'],id:'dialog_' + Usermanager_window.id,parent: Usermanager_window.id}, function(result){
				$('#avatarimage').attr('src', result);
				$('.avatar_image').val(result);
			});
		});
		
		$('#changepassword').click(function(){
			Nimbus.Dialog.custom({width:'274px',height:'162px',title:'Change Password',content_id:'password_dialog_content',id:'dialog_' + Usermanager_window.id,parent: Usermanager_window.id,
				save: function(){
					var old = $('#dialog_' + Usermanager_window.id + ' .oldpassword').val();
					var newp = $('#dialog_' + Usermanager_window.id + ' .newpassword').val();
					var repeat = $('#dialog_' + Usermanager_window.id + ' .repeatpassword').val();
					Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=changePassword', {oldpassword:old,newpassword:newp,repeatpassword:repeat}, function(result){
						Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'User Update',content: result.message}, function(){
							if (result.response == true) {
								$('#dialog_' + Usermanager_window.id + ', .child-dialog_' + Usermanager_window.id).remove();
							}
						});						
					});
				},
				cancel: function(){
				
				}
			})
		});
		
		$('#newexternalaccount').click(function(){
			Nimbus.Dialog.custom({width:'300px',height:'240px',title:'Add an External Account',content_id:'addexternal_dialog_content',id:'dialog_' + Usermanager_window.id,parent: Usermanager_window.id,
				save: function(){
					var request = {}
					$('#dialog_' + Usermanager_window.id + ' .addexternal_fields').each(function(){
						if ($(this).attr('name') != 'allow') {
							eval("request." + $(this).attr('name') + " = '" + $(this).val() + "';");
						} else {
							var allow = ($(this).attr('checked') == true) ? 1: 0;
							eval("request." + $(this).attr('name') + " = '" + allow + "';");
						}
					});
					Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=addExternal', request, function(result){
						Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Added a new External Account',content: result.message}, function(){
							if (result.result == true) {
								$('#dialog_' + Usermanager_window.id + ', .child-dialog_' + Usermanager_window.id).remove();
							}
						});	
					});
				},
				cancel: function(){}
			})
		});
		$('#newuser').click(function(){
			Nimbus.Dialog.custom({width:'400px',height:'426px',title:'Add a New User',content_id:'adduser_dialog_content',id:'dialog_' + Usermanager_window.id,parent: Usermanager_window.id,
				save: function(){
					var request = {}
					$('#dialog_' + Usermanager_window.id + ' .adduser_fields').each(function(){
						eval("request." + $(this).attr('title') + " = '" + $(this).val() + "';");
					});
					Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=addUser', request, function(result){
						Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Added Account',content: result.message}, function(){
							if (result.result == true) {
								$('#dialog_' + Usermanager_window.id + ', .child-dialog_' + Usermanager_window.id).remove();
							}
						});	
					});
				},
				cancel: function(){}
			})
		});
		$('#newpermission').click(function(){
			Nimbus.Dialog.custom({width:'300px',height:'160px',title:'Add a Permission',content_id:'addpermission_dialog_content',id:'dialog_' + Usermanager_window.id,parent: Usermanager_window.id,
				save: function(){
					var request = {}
					$('#dialog_' + Usermanager_window.id + ' .addpermission_fields').each(function(){
						if ($(this).attr('name') != 'allow') {
							eval("request." + $(this).attr('name') + " = '" + $(this).val() + "';");
						} else {
							var allow = ($(this).attr('checked') == true) ? 1: 0;
							eval("request." + $(this).attr('name') + " = '" + allow + "';");
						}
					});
					Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=addPermission', request, function(result){
						Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Added a new Permission',content: result.message}, function(){
							if (result.result == true) {
								$('#dialog_' + Usermanager_window.id + ', .child-dialog_' + Usermanager_window.id).remove();
							}
						});	
					});
				},
				cancel: function(){}
			})
		});
		$('.editexternal').click(function(){
			var tis = $(this).parents('tr');
			Nimbus.Dialog.custom({width:'300px',height:'240px',title:'Edit External Account',content_id:'editexternal_dialog_content',id:'dialog_' + Usermanager_window.id,parent: Usermanager_window.id,
				load: function(){
					tis.find('td a span').each(function(i, e){
						var key = $(this).attr('name');
						var value = $(this).html();
						if (key == 'allow') {
							if (value == 'Yes') {
								$('#dialog_' + Usermanager_window.id + ' .content input[name=allow]').attr('checked', true);
							}
						} else if (key == 'id') {
							$('#dialog_' + Usermanager_window.id + ' .content input[name=id]').val($(this).attr('title'));
						} else {
							$('#dialog_' + Usermanager_window.id + ' .content input[name=' + key + ']').val(value);
							if (key == 'handle') {
								$('#dialog_' + Usermanager_window.id + ' .content input[name=url]').val($(this).attr('title'));
							}
						}
					});
				},
				save: function(){
					var request = {}
					$('#dialog_' + Usermanager_window.id + ' .editexternal_fields').each(function(){
						if ($(this).attr('name') != 'allow') {
							eval("request." + $(this).attr('name') + " = '" + $(this).val() + "';");
						} else {
							var allow = ($(this).attr('checked') == true) ? 1: 0;
							eval("request." + $(this).attr('name') + " = '" + allow + "';");
						}
					});
					Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=updateExternal', request, function(result){
						Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Update External Account',content: result.message}, function(){
							if (result.result == true) {
								$('#dialog_' + Usermanager_window.id + ', .child-dialog_' + Usermanager_window.id).remove();
							}
						});	
					});
				},
				cancel: function(){}
			})
		});
		$('.edituser').click(function(){
			var parent = $(this).parents('tr');
			var id = parent.find('.identifier a span').attr('title');
			Nimbus.Dialog.custom({width:'400px',height:'426px',title:'Edit a User',content_id:'edituser_dialog_content',id:'dialog_' + Usermanager_window.id,parent: Usermanager_window.id,
				load: function(){
					Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=getUser', {id:id}, function(res){
						$.each(res, function(i, e){
							$('#dialog_' + Usermanager_window.id + ' .edituser_fields[name=' + i + ']').val(e);
						});
					});
				},
				save: function(){
					var request = {}
					$('#dialog_' + Usermanager_window.id + ' .edituser_fields').each(function(){
						eval("request." + $(this).attr('title') + " = '" + $(this).val() + "';");
					});
					Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=updateUser', request, function(result){
						Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Updated Account',content: result.message}, function(){
							if (result.result == true) {
								$('#dialog_' + Usermanager_window.id + ', .child-dialog_' + Usermanager_window.id).remove();
							}
						});	
					});
				},
				cancel: function(){}
			});
		});
		$('.editpermissions').click(function(){
			var tis = $(this).parents('tr');
			var keys = [];
			var values = [];
			Nimbus.Dialog.custom({width:'300px',height:'160px',title:'Edit a Permission',content_id:'editpermission_dialog_content',id:'dialog_' + Usermanager_window.id,parent: Usermanager_window.id,
				load: function(){
					tis.find('td a span').each(function(i, e){
						keys[i] = $(this).attr('name');
						values[i] = $(this).html();
						if (keys[i] == 'allow') {
							if (values[i] == 'Yes') {
								$('#dialog_' + Usermanager_window.id + ' .content input[name=allow]').attr('checked', true);
							}
						} else {
							$('#dialog_' + Usermanager_window.id + ' .content input[name=' + keys[i] + ']').val(values[i]);
						}
					});
				},
				save: function(){
					var request = {}
					$('#dialog_' + Usermanager_window.id + ' .editpermission_fields').each(function(i, e){
						if ($(this).attr('name') != 'allow') {
							eval("request." + $(this).attr('name') + " = '" + $(this).val() + "';");
						} else {
							var allow = ($(this).attr('checked') == true) ? 1: 0;
							eval("request." + $(this).attr('name') + " = '" + allow + "';");
						}
					});
					request.defaults = "resource_handle='" + values[1] + "' AND accessor_id='" + values[0] + "'";
					Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=updatePermission', request, function(result){
						Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Update External Account',content: result.message}, function(){
							if (result.result == true) {
								$('#dialog_' + Usermanager_window.id + ', .child-dialog_' + Usermanager_window.id).remove();
							}
						});		
					});
				},
				cancel: function(){}
			})
		});
		
		$('.deleteexternal').click(function(){
			var parent = $(this).parents('tr');
			var id = parent.find('.identifier a span').attr('title');
			if (confirm('Are you sure you want to delete this external account? applications attached to this account might not work after this.')) {
				Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=deleteExternal', {id: id}, function(result){
					Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Deleted External Account',content: result.message}, function(){parent.fadeOut(500);});	
				});
			}
		});
		$('.deleteuser').click(function(){
			var parent = $(this).parents('tr');
			var id = parent.find('.identifier a span').attr('title');
			if (confirm('Are you sure you want to delete this account? everything that this user owns will be deleted from the root directory.')) {
				Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=deleteAccount', {id: id}, function(result){
					Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Deleted Account',content: result.message}, function(){parent.fadeOut(500);});	
				});
			}
		});
		$('.deletepermissions').click(function(){
			var parent = $(this).parents('tr');
			var object = parent.find('span[name=resource_handle]').html();
			var accessor = parent.find('span[name=accessor_id]').html();
			if (confirm('Are you sure you want to delete this permission? you may not access some applications after this.')) {
				Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=deletePermission', {resource_handle:object,accessor_id:accessor}, function(result){
					Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Deleted Permission',content: result.message}, function(){parent.fadeOut(500);});	
				});
			}
		});
	},
	apply: function(elem, focused, msgbox){
		var request = {};
		request.focused = (focused) ? focused: $('#' + Usermanager_window.id + ' .tab-button.focus').attr('title');
		$('#' + request.focused + ' .' + request.focused + '_fields').each(function(){
			eval("request." + $(this).attr('name') + " = '" + $(this).val() + "';");
		});
		Nimbus.Connect.post(SERVER_URL + '?app=usermanager&action=apply', request, function(result){
			Nimbus.msgbox2({id:'closedialog-' + Usermanager_window.id,title:'Nimbus Confirmation',content:'User Manager has updated your settings.'});
		});
	},
	cancel: function(elem, focused){
		Nimbus.Desktop.window.close(Usermanager_window.id, Usermanager_window.handle);
	},
	submit: function(elem, focused){
		Usermanager.apply(null, 'personalprofile');
		Usermanager.apply(null, 'externalaccounts');
		Usermanager.apply(null, 'profiles');
		Usermanager.apply(null, 'permissions', true);
		Usermanager.cancel();
	}
}