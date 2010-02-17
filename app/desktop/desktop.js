var Desktop = {
	status: '',
	instanceInterval: false,
	init: function(){
		//Add the desktop container
		Nimbus.Desktop.load(Desktop_view, "desktop-container");
		
		//Set the user data to the desktop
		document.title = Desktop_data.title;
		$('#nimbusbar-user a.userbutton').html(Desktop_data.username);
		var height = $('#nimbusbar').height();
		$('#nimbusbar').css({top:(0 - height)})
		$('#nimbusbar').animate({top:0}, 1000, function(){
			var audioElement = document.createElement('audio');
			audioElement.setAttribute('src', SERVER_URL + 'public/resources/media/audio/bootup.wav');
			audioElement.play();
		});

		$.each(Desktop_data.desktop_icons, function(i, e){
			Nimbus.Desktop.addIcon(e);
		});

		Desktop.instanceInterval = setInterval("Desktop.checkInstance();", 1000);
		
		//Bind the events
		Desktop.events();
	},
	checkInstance: function(){
		$.getScript(SERVER_URL + '?app=desktop&action=checkInstance');
	},
	events: function(){
		$('#nimbusbar-user a.userbutton').toggle(function(){
			/*launch the nimbusbar user shortmenu*/
			$('#nimbusbar-menu-container').click();
			$('#nimbusbar-user-container').show();
			$('#nimbusbar-user a.userbutton').addClass('active');
			$('.window.instance').fadeOut(500);
			setTimeout("$('.window.instance').remove()", 500);
		}, function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-user-container').hide();
		});
		$('#nimbusbar-menu a#thebutton').toggle(function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-user-container').click();
			$('#nimbusbar-menu-container').show();
			$('.window.instance').fadeOut(500);
			setTimeout("$('.window.instance').remove()", 500);
		}, function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-menu-container').hide();
		});
		$('body').click(function(e){if ($(e.target).parents('.menu-container').length == 0) {
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('.menu-container').hide();
		}});
		//Usermenu
		$('#usermenusetstatus').click(function(){
			Nimbus.Dialog.custom({width:'260px',height:'140px',title:'What are you doing?',content_id:'setstatus',id:'dialog_' + Desktop_data.id,parent: Desktop_data.id, load: function(){
				var title = $('#nimbusbar-user a.userbutton').attr('title');
				$('#dialog_' + Desktop_data.id + ' #status-text1').val(title);
				//$('#dialog_' + Desktop_data.id + ' #iframecontainer').hide();
			}}, function(){
				var status = $('#dialog_' + Desktop_data.id + ' #status-text1').val();
				//$('#dialog_' + Desktop_data.id + ' #iframecontainer').show();
				Nimbus.Dialog.custom({width:'720px',height:'510px',title:'Facebook Status',content_id:'facebookstatus',id:'dialog2_' + Desktop_data.id,parent:'dialog_' + Desktop_data.id,
					load: function(){
						$('#dialog2_' + Desktop_data.id + ' #iframe').attr('src', SERVER_URL + '?app=desktop&action=facebook&status=' + escape(status));
					}}, function(){
						$('#dialog2_' + Desktop_data.id + ', #dialog_' + Desktop_data.id).remove();
					}
				);
				Nimbus.Connect.post(SERVER_URL + '?app=desktop&action=twitter', {status:status}, function(res){});
				$('#nimbusbar-user a.userbutton').attr('title', status);
				$('#nimbusbar-user a.userbutton').addClass('has');
				$('#dialog_' + Desktop_data.id).remove();
			});
		});
		$('#usermenulockscreen').click(function(){alert('Not yet implemented. Should Lock the screen on idle sessions');});
		$('#usermenulogoff').click(function(){
			Nimbus.modal(true);
			Nimbus.confirm({id:'new_' + Desktop_data.id,title:'Are you sure you want to Logout?',content:'You are going to end this session. Are you sure?'}, function(){
				var audioElement = document.createElement('audio');
				audioElement.setAttribute('src', SERVER_URL + 'public/resources/media/audio/bootdown.wav');
				audioElement.play();
				setTimeout("window.location = SERVER_URL;", 1000);
			}, function(){
				Nimbus.modal(false);
			});
		});
		$('#usermenupersonalize').click(function(){
			Nimbus.Application.load('config', function(){
				$('#config-container .tab-button:eq(0)').click();
			});
			$('#config-container .tab-button:eq(0)').click();
		});
		$('#usermenupersonal').click(function(){
			Nimbus.Application.load('usermanager', function(){
				$('#usermanager-container .tab-button:eq(0)').click();
			});
			$('#usermanager-container .tab-button:eq(0)').click();
		});
		$('#usermenuconfiguserpermissions').click(function(){
			Nimbus.Application.load('usermanager', function(){
				$('#usermanager-container .tab-button:eq(2)').click();
			});
			$('#usermanager-container .tab-button:eq(2)').click();
		});
		$('#usermenuattachexternal').click(function(){
			Nimbus.Application.load('usermanager', function(){
				$('#usermanager-container .tab-button:eq(1)').click();
			});
			$('#usermanager-container .tab-button:eq(1)').click();
		});
		$('#usermenulogintomessenger').click(function(){
			Nimbus.Application.load('chat');
		});
		$('#usermenulivenews').click(function(){
			Nimbus.Application.load('feed');
		});
		
		//Startmenu
		$('#nimbusbar-menu-container .item a').click(function(){
			$('#nimbusbar-user a.userbutton').removeClass('active');
			$('#nimbusbar-menu-container').hide();
			Nimbus.Application.load($(this).attr('title'));
		});
		
		//Instances
		$('#nimbusbar-taskbar-controllall').click(function(){
			/*launch the nimbusbar user shortmenu*/
			$('.menu-container').hide();
			if ($('.window.instance').length) {
				$('.window.instance').fadeOut(500);
				setTimeout("$('.window.instance').remove()", 500);
			} else {
				Nimbus.Application.load('instance');
			}
		});
	}
}