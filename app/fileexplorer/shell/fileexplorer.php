<div id="fileexplorer-container" class="fill-all" style="overflow:auto;">
	<div class="tree" style="margin:8px 0;">
	<?php
		$this->grid();
	?>
	</div>
</div>
<div id="newfile_dialog_content" class="dialog_content">
	<div style="margin:8px 8px 12px;">
		<h3 style="font-size:16px;padding:8px;">Create a new File</h3>
		<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
			<tr>
				<td valign="top">Path&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="path" id="path" class="newfile_fields text" style="width:180px;" value="root/Documents/Documents" /></td>
			</tr>
			<tr>
				<td valign="top">Filename&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="filename" id="filename" class="newfile_fields text" style="width:180px;" value="newFile.txt" /></td>
			</tr>
		</table>
	</div>	
</div>
<div id="newdirectory_dialog_content" class="dialog_content">
	<div style="margin:8px 8px 12px;">
		<h3 style="font-size:16px;padding:8px;">Create a new Directory</h3>
		<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
			<tr>
				<td valign="top">Path&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="path" id="path" class="newdirectory_fields text" style="width:180px;" value="root" /></td>
			</tr>
			<tr>
				<td valign="top">Directory Name&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="directory_name" id="directory_name" class="newdirectory_fields text" style="width:180px;" value="newDirectory" /></td>
			</tr>
		</table>
	</div>	
</div>
<div id="move_dialog_content" class="dialog_content">
	<div style="margin:8px 8px 12px;">
		<h3 style="font-size:16px;padding:8px;">Move to...</h3>
		<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
			<tr>
				<td valign="top">Path&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="path" id="move_field" class="move_fields text" style="width:180px;" value="root" /></td>
			</tr>
		</table>
	</div>	
</div>
<div id="copy_dialog_content" class="dialog_content">
	<div style="margin:8px 8px 12px;">
		<h3 style="font-size:16px;padding:8px;">Copy to...</h3>
		<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
			<tr>
				<td valign="top">Path&nbsp;</td>
				<td style="padding:4px 0;"><input type="text" name="path" id="copy_field" class="copy_fields text" style="width:180px;" value="root" /></td>
			</tr>
		</table>
	</div>	
</div>