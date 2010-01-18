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
					<span>Change Avatar</span>
					<img src="<?php echo personal('avatar'); ?>" width="132" border="0" alt="" />
					<div class="clear"></div>
					<div style="width:132px;">
						<p><a href="#">Change Avatar</a></p>
						<p><a href="#">Edit Bridged Accounts</a></p>
						<?php if (config('multiuser') == '1' && personal('is_admin') == '1') { ?>
							<p><a href="#">Administrate Users</a></p>
						<?php } ?>
						<p>You can change your Personal Profile here and attach certain accounts to the Nimbus Bridge dashboard. In the future, you can also attach your installation to the Atmosphere platform.</p>
					</div>
				</div>
				<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td valign="top">Username</td>
						<td><input type="text" value="<?php echo personal('username'); ?>" class="text" disabled="disabled" style="width:200px;" /></td>
					</tr>
					<tr>
						<td valign="top">Password</td>
						<td><input type="button" value="Change Password"/></td>
					</tr>
					<tr>
						<td valign="top">First Name</td>
						<td><input type="text" value="<?php echo personal('first_name'); ?>" class="text" style="width:180px;" /></td>
					</tr>
					<tr>
						<td valign="top">Last Name</td>
						<td><input type="text" value="<?php echo personal('last_name'); ?>" class="text" style="width:180px;" /></td>
					</tr>
					<tr>
						<td valign="top">Nice Name</td>
						<td><input type="text" value="<?php echo personal('nick_name'); ?>" class="text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">About Me</td>
						<td><textarea class="small textarea" style="width:200px;"><?php echo personal('first_name'); ?></textarea></td>
					</tr>
					<tr>
						<td valign="top">Edit User Settings</td>
						<td><input type="button" value="Change Password"/></td>
					</tr>
					<tr>
						<td valign="top">Email</td>
						<td><input type="text" value="<?php echo personal('email'); ?>" class="text" style="width:140px;" /></td>
					</tr>
					<tr>
						<td valign="top">Website</td>
						<td><input type="text" value="<?php echo personal('website'); ?>" class="text" style="width:170px;" /></td>
					</tr>
					<tr>
						<td valign="top">Yahoo!</td>
						<td><input type="text" value="<?php echo personal('yahoo'); ?>" class="text" style="width:100px;" /><br/><input type="button" value="Attach as External Account"/></td>
					</tr>
					<tr>
						<td valign="top">Gtalk</td>
						<td><input type="text" value="<?php echo personal('gtalk'); ?>" class="text" style="width:100px;" /><br/><input type="button" value="Attach as External Account"/></td>
					</tr>
					<tr>
						<td valign="top">AIM</td>
						<td><input type="text" value="<?php echo personal('AIM'); ?>" class="text" style="width:100px;" /><br/><input type="button" value="Attach as External Account"/></td>
					</tr>
					<tr>
						<td valign="top">Skype</td>
						<td><input type="text" value="<?php echo personal('skype'); ?>" class="text" style="width:100px;" /><br/><input type="button" value="Attach as External Account"/></td>
					</tr>
				</table>
				<div class="clear"></div>
			</div>
		</div>
		<div class="tab-content" id="externalaccounts">
			<div class="frame">
				<h3>Edit external accounts attached to your installation profile</h3>
				<p><a href="#"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /> Add New Bridged Account</a></p>
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
							<tr<?php echo ($i % 2 == 0) ? ' class="odd"': ''; ?>>
								<td><a href="#"><span><?php echo ucfirst($r['handle']); ?></span></a></td>
								<td><a href="#"><span><?php echo $r['username']; ?></span></a></td>
								<td><a href="#"><span>
								<?php
									$strlen = strlen($r['password']);
									while ($strlen--) {echo '*';}
								?>
								</span></a></td>
								<td><a href="#"><span><?php echo ($r['allow'] == 1) ? 'Yes': 'No'; ?></span></a></td>
								<td>
									<div class="block">
										<a href="#"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /></a>
										<a href="#"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/delete.png" alt="" border="0" /></a>
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
				<p><a href="#"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /> Add New Account</a></p>
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
								<td><a href="#"><span><?php echo $r['username']; ?></span></a></td>
								<td><a href="#"><span><?php echo date(config('date_format'), $r['created']); ?></span></a></td>
								<td>
									<div class="block">
										<a href="#"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /></a>
										<a href="#"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/delete.png" alt="" border="0" /></a>
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
				<p><a href="#"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /> Add New Permission</a></p>
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
								<td><a href="#"><span><?php echo $r['accessor_id']; ?></span></a></td>
								<td><a href="#"><span><?php echo $r['resource_handle']; ?></span></a></td>
								<td><a href="#"><span><?php echo ($r['allow']) ? 'Yes': 'No'; ?></span></a></td>
								<td>
									<div class="block">
										<a href="#"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/pencil.png" alt="" border="0" /></a>
										<a href="#"><img src="<?php config('appurl'); ?>?res=img://icons/Silk/delete.png" alt="" border="0" /></a>
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
		<?php } ?>
	</div>
</div>