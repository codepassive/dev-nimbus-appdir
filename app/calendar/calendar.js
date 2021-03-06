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
				events: Calendar_window.events,
				editable: true,
				dayClick: function(date, allDay, jsEvent, view) {
					//add an event
					Nimbus.Dialog.custom({width:'300px',height:'204px',title:'Add an Event',content_id:'addevent_dialog_content',id:'dialog_' + Calendar_window.id,parent: Calendar_window.id,
						load: function(){
							$('#dialog_' + Calendar_window.id + ' .addevent_fields[name=time_start]').val(date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate());
							$('#dialog_' + Calendar_window.id + ' .addevent_fields[name=time_end]').val(date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate());
						},
						save: function(){
							request = {};
							$('#dialog_' + Calendar_window.id + ' .addevent_fields').each(function(i, e) {
								eval("request." + $(this).attr('name') + " = '" + $(this).val() + "';");
							});
							request.type = (allDay) ? 0: 1;
							Nimbus.Connect.post(SERVER_URL + '?app=calendar&action=add', request, function(result){
								Nimbus.msgbox2({id:'closedialog-' + Calendar_window.id,title:'Event Action',content: result.message}, function(){
									if (result.response == true) {
										$('#dialog_' + Calendar_window.id).remove();
										Nimbus.Desktop.window.close(Calendar_window.id, 'Calendar');
										Nimbus.Application.load('Calendar');
									}
								});
							});
						},
						cancel: function(){}
					})
				},
				eventDrop: function(ev, day){
					var start = ev.start;
					var end = ev.end;
					if (!end) {
						end = start;
					}
					request = {};
					request.short_description = ev.title;
					request.time_start = start.getFullYear() + '-' + FormatNumberLength(start.getMonth()+1,2) + '-' + FormatNumberLength(start.getDate(),2);
					request.time_end = end.getFullYear() + '-' + FormatNumberLength(end.getMonth()+1,2) + '-' + FormatNumberLength(end.getDate(),2);
					request.id = ev.id;
					Nimbus.Connect.post(SERVER_URL + '?app=calendar&action=update', request, function(result){});
				},
				eventResize: function(ev, day){
					var start = ev.start;
					var end = ev.end;
					if (!end) {
						end = start;
					}
					request = {};
					request.short_description = ev.title;
					request.time_start = start.getFullYear() + '-' + FormatNumberLength(start.getMonth()+1,2) + '-' + FormatNumberLength(start.getDate(),2);
					request.time_end = end.getFullYear() + '-' + FormatNumberLength(end.getMonth()+1,2) + '-' + FormatNumberLength(end.getDate(),2);
					request.id = ev.id;
					Nimbus.Connect.post(SERVER_URL + '?app=calendar&action=update', request, function(result){});
				},
				eventClick: function(calEvent, jsEvent, view) {
					//on click
					//show details of event
					Nimbus.Dialog.custom({width:'300px',height:'248px',title:'Edit an Event',content_id:'editevent_dialog_content',id:'dialog_' + Calendar_window.id,parent: Calendar_window.id,
						load: function(){
							$('.editevent_fields[name=short_description]').val(calEvent.title);
							var start = calEvent.start;
							var end = calEvent.end;
							if (!end) {
								end = start;
							}
							$('.editevent_fields[name=time_start]').val(start.getFullYear() + '-' + FormatNumberLength(start.getMonth()+1,2) + '-' + FormatNumberLength(start.getDate(),2));
							$('.editevent_fields[name=time_end]').val(end.getFullYear() + '-' + FormatNumberLength(end.getMonth()+1,2) + '-' + FormatNumberLength(end.getDate(),2));
							$('.editevent_fields[name=class]').val(calEvent.className);
							$('.editevent_delete').click(function(){
								Calendar.eventDelete(calEvent.id);
							});
						},
						save: function(){
							request = {};
							$('#dialog_' + Calendar_window.id + ' .editevent_fields').each(function(i, e) {
								eval("request." + $(this).attr('name') + " = '" + $(this).val() + "';");
							});
							request.id = calEvent.id;
							Nimbus.Connect.post(SERVER_URL + '?app=calendar&action=update', request, function(result){
								Nimbus.msgbox2({id:'closedialog-' + Calendar_window.id,title:'Event Action',content: result.message}, function(){
									if (result.response == true) {
										$('#dialog_' + Calendar_window.id).remove();
										Nimbus.Desktop.window.close(Calendar_window.id, 'Calendar');
										Nimbus.Application.load('Calendar');
									}
								});
							});
						},
						cancel: function(){}
					})
				}
			});
		});
		Nimbus.Desktop.window.redraw(Calendar_window.id);
		$('#closecalendar').click(function(){
			Nimbus.Application.close(Calendar_window.id);
		});
	},
	eventDelete: function(id){
		Nimbus.confirm({id:'dialogclose_' + Calendar_window.id, title:'Delete an Event?',content:'Are you sure you want to delete this Event?'}, function(){
			Nimbus.Connect.post(SERVER_URL + '?app=calendar&action=delete', {id:id}, function(result){
				Nimbus.msgbox2({id:'closedialog-' + Calendar_window.id,title:'Event Action',content: result.message}, function(){
					if (result.response == true) {
						$('#dialog_' + Calendar_window.id).remove();
						Nimbus.Desktop.window.close(Calendar_window.id, 'Calendar');
						Nimbus.Application.load('Calendar');
					}
				});
			});
		});
	}
}
function FormatNumberLength(num, length) {
    var r = "" + num;
    while (r.length < length) {
        r = "0" + r;
    }
    return r;
}
