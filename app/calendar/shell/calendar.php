<div class="calendar-inner">
	<p style="text-align:center;padding:8px;"><input type="button" value="Close Calendar" id="closecalendar"/></p>
	<!--iframe src="http://www.google.com/calendar/embed?src=php.hazard%40gmail.com&ctz=Asia/Manila" style="border: 0" width="100%" height="100%" frameborder="0" scrolling="no" class="fill-all"></iframe-->
	<div><div id="calendar-<?php echo $this->id; ?>" class="calendar-display"></div></div>
</div>
<div class="dialog_content" id="addevent_dialog_content">
	<div style="margin:8px 8px 12px;">
		<h3 style="font-size:16px;padding:8px;">Add an Event</h3>
		<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
			<tr>
				<td valign="top">Short Description&nbsp;</td>
				<td style="padding:4px 0;"><textarea name="short_description" class="addevent_fields text"></textarea></td>
			</tr>
			<tr>
				<td valign="top">Time Start&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="time_start" class="addevent_fields text" style="width:140px;" /></td>
			</tr>
			<tr>
				<td valign="top">Time Stop&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="time_end" class="addevent_fields text" style="width:140px;" /></td>
			</tr>
			<tr>
				<td valign="top">Time Stop&nbsp;</td>
				<td style="padding:4px 0;">
					<select name="class" class="addevent_fields text" style="width:140px;">
						<option value="red" selected="selected">Red</option>
						<option value="blue">Blue</option>
						<option value="green">Green</option>
						<option value="purple">Purple</option>
						<option value="yellow">Yellow</option>
						<option value="orange">Orange</option>
						<option value="gray">Gray</option>
						<option value="dark">Dark</option>
					</select>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="dialog_content" id="editevent_dialog_content">
	<div style="margin:8px 8px 12px;">
		<h3 style="font-size:16px;padding:8px;">Edit your Event</h3>
		<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
			<tr>
				<td valign="top">Short Description&nbsp;</td>
				<td style="padding:4px 0;"><textarea name="short_description" class="editevent_fields text"></textarea></td>
			</tr>
			<tr>
				<td valign="top">Time Start&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="time_start" class="editevent_fields text" style="width:140px;" /></td>
			</tr>
			<tr>
				<td valign="top">Time Stop&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="time_end" class="editevent_fields text" style="width:140px;" /></td>
			</tr>
			<tr>
				<td valign="top">Time Stop&nbsp;</td>
				<td style="padding:4px 0;">
					<select name="class" class="editevent_fields text" style="width:140px;">
						<option value="red" selected="selected">Red</option>
						<option value="blue">Blue</option>
						<option value="green">Green</option>
						<option value="purple">Purple</option>
						<option value="yellow">Yellow</option>
						<option value="orange">Orange</option>
						<option value="gray">Gray</option>
						<option value="dark">Dark</option>
					</select>
				</td>
			</tr>
		</table>
		<div style="padding:8px;"><input type="button" value="Delete" class="editevent_delete"/></div>
	</div>
</div>