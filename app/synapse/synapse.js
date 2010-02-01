var Synapse = {
	init: function(){
		//Add the config container
		Nimbus.Desktop.load(Synapse_view, 'view_' + Synapse_window.id, Synapse_window);
		var win = new Window(Synapse_window);
		win.fix();
		
		$('#synapse-container tr td input').live('click', function(){
			var html = $(this).parents('tr').find('.hidden').html();
			var title = $(this).parents('tr').find('.title').html();
			$('#synapse-container .frame h4').html(title);
			$('#synapse-container .frame p').html(html);
		});
		Nimbus.Connect.post(SERVER_URL + '?app=synapse&action=fetchupdates', {}, function(result){
			$('#synapse-container .table tbody').html('');
			$.each(result, function(i, r){
				var odd = (i % 2 == 0) ? ' class="odd"': '';
				$('#synapse-container .table tbody').append('<tr' + odd + '><td style="text-align:center"><input type="radio" name="updateto" value="' + r.handle + '" /></td><td class="title"><span>' + r.name + '</span></td><td style="text-align:center;"><span>' + r.version + '</span></td><td><span>' + r.released + '</span></td><td class="hidden"><span>' + r.description + '</span></td></tr>');
			});
		});
	},
	update: function(){
		alert($('#synapse-container tr td input:checked').val());
	},
	close: function(){
		Nimbus.Application.close(Synapse_window.id);
	}
}