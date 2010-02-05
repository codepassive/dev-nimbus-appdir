<div id="usermanager-container">
	<div class="tabs">
		<div class="tab-buttons">
			<a href="javascript:;" class="tab-button focus" title="personalprofile"><span>Edit Personal Profile</span></a>
			<a href="javascript:;" class="tab-button" title="externalaccounts"><span>External Accounts</span></a>
			<?php if (config('multiuser') == '1' && personal('is_admin') == '1') { ?>
				<a href="javascript:;" class="tab-button" title="profiles"><span>User Profiles</span></a>
				<a href="javascript:;" class="tab-button" title="permissions"><span>User Permissions</span></a>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<div class="tab-content focus" id="personalprofile">
			<div class="frame">
				<h3>Change your Personal Profile</h3>
				<div class="avatar">
					<span class="changeavatar">Change Avatar</span>
					<img src="<?php echo personal('avatar'); ?>" width="132" border="0" alt="" id="avatarimage" />
					<input type="hidden" value="<?php echo personal('avatar'); ?>" name="avatar" class="avatar_image personalprofile_fields" />
					<div class="clear"></div>
					<div style="width:132px;">
						<p><a href="javascript:;" class="changeavatar">Change Avatar</a></p>
						<p><a href="javascript:;" onclick="$('#' + Usermanager_window.id + ' .tab-button:eq(1)').click()">Edit Bridged Accounts</a></p>
						<?php if (config('multiuser') == '1' && personal('is_admin') == '1') { ?>
							<p><a href="javascript:;" onclick="$('#' + Usermanager_window.id + ' .tab-button:eq(2)').click()">Administrate Users</a></p>
						<?php } ?>
						<p>You can change your Personal Profile here and attach certain accounts to the Nimbus Bridge dashboard. In the future, you can also attach your installation to the Atmosphere platform.</p>
					</div>
				</div>
				<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td valign="top">Username</td>
						<td><input type="text" value="<?php echo personal('username'); ?>" name="username" class="text" disabled="disabled" style="width:200px;" /></td>
					</tr>
					<tr>
						<td valign="top">Password</td>
						<td><input type="button" id="changepassword" value="Change Password"/></td>
					</tr>
					<tr>
						<td valign="top">First Name</td>
						<td><input type="text" value="<?php echo personal('first_name'); ?>" name="first_name" class="text personalprofile_fields" style="width:180px;" /></td>
					</tr>
					<tr>
						<td valign="top">Last Name</td>
						<td><input type="text" value="<?php echo personal('last_name'); ?>" name="last_name" class="text personalprofile_fields" style="width:180px;" /></td>
					</tr>
					<tr>
						<td valign="top">Nice Name</td>
						<td><input type="text" value="<?php echo personal('nick_name'); ?>" name="nick_name" class="text personalprofile_fields" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">About Me</td>
						<td><textarea class="small textarea personalprofile_fields" style="width:200px;height:200px;" name="description"><?php echo personal('description'); ?></textarea></td>
					</tr>
					<tr>
						<td valign="top">Email</td>
						<td><input type="text" value="<?php echo personal('email'); ?>" name="email" class="text personalprofile_fields" style="width:140px;" /></td>
					</tr>
				</table>
				<div class="clear"></div>
			</div>
		</div>
		<div class="tab-content" id="externalaccounts">
			<div class="frame">
				<h3>Edit external accounts attached to your installation profile</h3>
				<p><a href="javascript:;" id="newexternalaccount"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /> Add New Bridged Account</a></p>
				<div class="table-container">
				<table cellspacing="1" cellpadding="1" border="0" class="table">
					<tr>
						<th><span>Bridged to</span></th>
						<th><span>Username</span></th>
						<th><span>Password</span></th>
						<th><span>Allow</span></th>
						<th width="80"><span style="text-align:center;">Actions</span></th>
					</tr>
					<?php
						$id = Session::get('user-information');
						$results = $this->db->query("SELECT * FROM externals WHERE account_id=" . $id->account_id);
						if ($results) {
							$i = 0;
							foreach ($results as $r) {
					?>
							<tr class="external_fields<?php echo ($i % 2 == 0) ? ' odd': ''; ?>">
								<td style="display:none;" class="identifier"><a href="#"><span name="id" title="<?php echo $r['external_id']; ?>"></span></a></td>
								<td><a href="javascript:;"><span title="<?php echo $r['url']; ?>" name="handle"><?php echo ucfirst($r['handle']); ?></span></a></td>
								<td><a href="javascript:;"><span name="username"><?php echo $r['username']; ?></span></a></td>
								<td><a href="javascript:;"><span>
								<?php
									$strlen = strlen($r['password']);
									while ($strlen--) {echo '*';}
								?>
								</span></a></td>
								<td><a href="javascript:;"><span name="allow"><?php echo ($r['allow'] == 1) ? 'Yes': 'No'; ?></span></a></td>
								<td>
									<div class="block">
										<a href="javascript:;" class="editexternal"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /></a>
										<a href="javascript:;" class="deleteexternal"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/delete.png" alt="" border="0" /></a>
									</div>
								</td>
							</tr>
					<?php 
							$i++;
							}
						}
					?>
				</table>
				</div>
			</div>
		</div>
		<?php if (config('multiuser') == '1' && personal('is_admin') == '1') {?>
		<div class="tab-content" id="profiles">
			<div class="frame">
				<h3>Edit User Profiles (Multi-user)</h3>
				<p><a href="javascript:;" id="newuser"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /> Add New Account</a></p>
				<div class="table-container">
				<table cellspacing="0" cellpadding="0" border="0" class="table">
					<tr>
						<th><span>Username</span></th>
						<th><span>Created</span></th>
						<th width="80"><span style="text-align:center;">Actions</span></th>
					</tr>
					<?php
						$results = $this->db->query("SELECT * FROM accounts");
						if ($results) {
							$i = 0;
							foreach ($results as $r) {
					?>
							<tr<?php echo ($i % 2 == 0) ? ' class="odd"': ''; ?>>
								<td style="display:none;" class="identifier"><a href="#"><span name="id" title="<?php echo $r['account_id']; ?>"></span></a></td>
								<td><a href="javascript:;"><span><?php echo $r['username']; ?></span></a></td>
								<td><a href="javascript:;"><span><?php echo date(config('date_format'), $r['created']); ?></span></a></td>
								<td>
									<div class="block">
										<a href="javascript:;" class="edituser"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /></a>
										<a href="javascript:;" class="deleteuser"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/delete.png" alt="" border="0" /></a>
									</div>
								</td>
							</tr>
					<?php 
							$i++;
							}
						}
					?>
				</table>
				</div>
			</div>
		</div>
		<div class="tab-content" id="permissions">
			<div class="frame">
				<h3>Edit User Permissions</h3>
				<p><a href="javascript:;" id="newpermission"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /> Add New Permission</a></p>
				<div class="table-container">
				<table cellspacing="0" cellpadding="0" border="0" class="table">
					<tr>
						<th width="24"><span>Object</span></th>
						<th><span>Accessor</span></th>
						<th><span>Allow</span></th>
						<th width="80"><span style="text-align:center;">Actions</span></th>
					</tr>
					<?php
						$results = $this->db->query("SELECT * FROM acl");
						if ($results) {
							$i = 0;
							foreach ($results as $r) {
					?>
							<tr<?php echo ($i % 2 == 0) ? ' class="odd"': ''; ?>>
								<td><a href="javascript:;"><span name="accessor_id"><?php echo $r['accessor_id']; ?></span></a></td>
								<td><a href="javascript:;"><span name="resource_handle"><?php echo $r['resource_handle']; ?></span></a></td>
								<td><a href="javascript:;"><span name="allow"><?php echo ($r['allow']) ? 'Yes': 'No'; ?></span></a></td>
								<td>
									<div class="block">
										<a href="javascript:;" class="editpermissions"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /></a>
										<a href="javascript:;" class="deletepermissions"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/delete.png" alt="" border="0" /></a>
									</div>
								</td>
							</tr>
					<?php 
							$i++;
							}
						}
					?>
				</table>
				</div>
			</div>
		</div>
		<!--DIALOGS-->
		<div class="dialog_content" id="password_dialog_content">
			<div style="margin:8px 8px 12px;">
				<h3 style="font-size:16px;padding:8px;">Change your Password</h3>
				<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
					<tr>
						<td valign="top">Old Password&nbsp;</td>
						<td style="padding:4px 0;"><input type="password" class="text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">New Password&nbsp;</td>
						<td style="padding:4px 0;"><input type="password" class="text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Repeat Password&nbsp;</td>
						<td style="padding:4px 0;"><input type="password" class="text" style="width:140px;" /></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="dialog_content" id="addexternal_dialog_content">
			<div style="margin:8px 8px 12px;">
				<h3 style="font-size:16px;padding:8px;">Add External Account</h3>
				<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
					<tr>
						<td valign="top">Handle&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="handle" class="addexternal_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">URL&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="url" class="addexternal_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Username&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="username" class="addexternal_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Password&nbsp;</td>
						<td style="padding:4px 0;"><input type="password" name="password" class="addexternal_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Auto Allow?&nbsp;</td>
						<td style="padding:4px 0;"><input type="checkbox" name="allow" class="addexternal_fields" value="1"  /></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="dialog_content" id="editexternal_dialog_content">
			<div style="margin:8px 8px 12px;">
				<h3 style="font-size:16px;padding:8px;">Edit External Account</h3>
				<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
					<tr>
						<td valign="top">Handle&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="handle" class="editexternal_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">URL&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="url" class="editexternal_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Username&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="username" class="editexternal_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Password&nbsp;</td>
						<td style="padding:4px 0;"><input type="password" name="password" class="editexternal_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Auto Allow?&nbsp;</td>
						<td style="padding:4px 0;"><input type="checkbox" name="allow" class="editexternal_fields" value="1"  /></td>
					</tr>
				</table>
				<input type="hidden" name="id" class="editexternal_fields" value=""/>
			</div>
		</div>
		<div class="dialog_content" id="adduser_dialog_content">
			<div style="margin:8px 8px 12px;">
				<h3 style="font-size:16px;padding:8px;">Add User Account</h3>
				<table cellspacing="0" cellpadding="0" border="0" style="margin:8px;">
					<tr>
						<td valign="top">Username&nbsp;</td>
						<td><input type="text" value="" name="username" title="username" class="adduser_fields text" style="width:200px;" /></td>
					</tr>
					<tr>
						<td valign="top">Password&nbsp;</td>
						<td><input type="password" value="" name="password" title="password" class="adduser_fields text" style="width:200px;" /><br/><input type="password" value="" class="text" style="width:200px;" /></td>
					</tr>
					<tr>
						<td valign="top">First Name&nbsp;</td>
						<td><input type="text" value="" name="first_name" title="meta_first_name" class="text adduser_fields" style="width:180px;" /></td>
					</tr>
					<tr>
						<td valign="top">Last Name&nbsp;</td>
						<td><input type="text" value="" name="last_name" title="meta_last_name" class="text adduser_fields" style="width:180px;" /></td>
					</tr>
					<tr>
						<td valign="top">Nice Name&nbsp;</td>
						<td><input type="text" value="" name="nick_name" title="meta_nick_name" class="text adduser_fields" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">About Me&nbsp;</td>
						<td><textarea class="small textarea adduser_fields" title="meta_description" style="width:200px;height:120px;" name="description"></textarea></td>
					</tr>
					<tr>
						<td valign="top">Email&nbsp;</td>
						<td><input type="text" value="" name="email" title="meta_email" class="text adduser_fields" style="width:140px;" /></td>
					</tr>
				</table>
				<div class="clear"></div>
			</div>
		</div>
		<div class="dialog_content" id="edituser_dialog_content">
			<div style="margin:8px 8px 12px;">
				<h3 style="font-size:16px;padding:8px;">Edit User Account</h3>
				<table cellspacing="0" cellpadding="0" border="0" style="margin:8px;">
					<tr>
						<td valign="top">Username&nbsp;</td>
						<td><input type="text" value="" name="username" title="username" class="edituser_fields text" style="width:200px;" /></td>
					</tr>
					<tr>
						<td valign="top">Password&nbsp;</td>
						<td><input type="password" value="" name="password" title="password" class="edituser_fields text" style="width:200px;" /><br/><input type="password" value="" class="text" style="width:200px;" /></td>
					</tr>
					<tr>
						<td valign="top">First Name&nbsp;</td>
						<td><input type="text" value="" name="first_name" title="meta_first_name" class="text edituser_fields" style="width:180px;" /></td>
					</tr>
					<tr>
						<td valign="top">Last Name&nbsp;</td>
						<td><input type="text" value="" name="last_name" title="meta_last_name" class="text edituser_fields" style="width:180px;" /></td>
					</tr>
					<tr>
						<td valign="top">Nice Name&nbsp;</td>
						<td><input type="text" value="" name="nick_name" title="meta_nick_name" class="text edituser_fields" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">About Me&nbsp;</td>
						<td><textarea class="small textarea edituser_fields" title="meta_description" style="width:200px;height:120px;" name="description"></textarea></td>
					</tr>
					<tr>
						<td valign="top">Email&nbsp;</td>
						<td><input type="text" value="" name="email" title="meta_email" class="text edituser_fields" style="width:140px;" /></td>
					</tr>
				</table>
				<div class="clear"></div>
				<input type="hidden" name="account_id" title="account_id" class="edituser_fields" value=""/>
			</div>
		</div>
		<div class="dialog_content" id="addpermission_dialog_content">
			<div style="margin:8px 8px 12px;">
				<h3 style="font-size:16px;padding:8px;">Add Permission</h3>
				<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
					<tr>
						<td valign="top">Object&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="resource_handle" class="addpermission_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Accessor&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="accessor_id" class="addpermission_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Allow?&nbsp;</td>
						<td style="padding:4px 0;"><input type="checkbox" name="allow" class="addpermission_fields" value="1" /></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="dialog_content" id="editpermission_dialog_content">
			<div style="margin:8px 8px 12px;">
				<h3 style="font-size:16px;padding:8px;">Edit Permission</h3>
				<table cellspacing="0" cellpadding="0" border="0" style="margin:0 8px;">
					<tr>
						<td valign="top">Object&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="resource_handle" class="editpermission_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Accessor&nbsp;</td>
						<td style="padding:4px 0;"><input type="text" name="accessor_id" class="editpermission_fields text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Allow?&nbsp;</td>
						<td style="padding:4px 0;"><input type="checkbox" name="allow" class="editpermission_fields" value="1" /></td>
					</tr>
				</table>
			</div>
		</div>

		<!--DIALOGS-->
		<?php } ?>
	</div>
</div>