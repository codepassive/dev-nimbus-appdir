var Network = {
	init: function(){
		//Add the config container
		Nimbus.Desktop.load(Network_view, 'view_' + Network_window.id, Network_window);
		Nimbus.Desktop.window.redraw(Network_window.id);
		
		//Bind the events
		$('.network .grid .icon').draggable({delay:200,stack:{group:'.network .grid .icon', min: 520}}).click(function(){
			$('.network .grid .icon').removeClass('active');
		});
		$('.network .grid .item').dblclick(function(){
			alert(1);			
		});
	},
	fillGrid: function(){
	
	}
}