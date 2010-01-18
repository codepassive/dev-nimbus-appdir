var Instance = {
	init: function(){
		//Add the config container
		Nimbus.Desktop.load(Instance_view, 'view_' + Instance_window.id, Instance_window);
		
		//Bind the events
		$('.instance .icon').draggable({delay:200, stack:{group:'.desktop-icons .item', min: 520}});
		$('.instance .icon').each(function(){
			$(this).dblclick(function(){
				Nimbus.Application.load($(this).attr('title'));
			});
		});
		$('.instance #instance_openapp').keypress(function(e){
			var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) {
				Instance.open($(this).val());
			}
		});
		$('.active_instance .table tbody').html('');
		$('.window').each(function(){
			var id = $(this).attr('id');
			$('.active_instance .table tbody').prepend('<tr><td>' + id.replace("container-", "") + '</td><td style="text-align:center;"><input type="button" value="Close" title="' + id + '"/></td></tr>');
		});
		$('.active_instance .table input').live('click', function(){
			$(this).parents('tr').remove();
			Nimbus.Application.close($(this).attr('title'));
		});
	},
	open: function(name){
		Nimbus.Application.load(name);
		$('.instance #instance_openapp').val('')
	}
}