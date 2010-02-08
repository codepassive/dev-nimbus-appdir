Calendar = {
	init: function(){
		//Increment the Instance
		Nimbus.Desktop.load(Calendar_view, 'view_' + Calendar_window.id, Calendar_window);
		Nimbus.HTML.head('link', 'text/css', SERVER_URL + '?res=app://calendar/shell/js/fullcalendar.css', 'stylesheet');
		$.getScript(SERVER_URL + '?res=app://calendar/shell/js/fullcalendar.js', function(){
			$('#calendar-' + Calendar_window.id).fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				editable: true,
				dayClick: function(date, allDay, jsEvent, view) {
					//have a custom dialog box and save the event
				},
				eventClick: function(calEvent, jsEvent, view) {
					//on click
					//show details of event
				}
			});
		});
		Nimbus.Desktop.window.redraw(Calendar_window.id);
	}
}