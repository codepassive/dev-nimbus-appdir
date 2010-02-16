<div class="login-section">
	<div id="login-form1" class="form">
		<div><label for="login-text1"><?php __('username'); ?></label> <input type="text" name="login-text1" id="login-text1" class="textbox" value="admin" /></div>
		<div><label for="login-password1"><?php __('password'); ?></label> <input type="password" name="login-password1" id="login-password1" class="textbox" value="admin" /></div>
		<?php if (config('allow_openID')) {?>
			<select name="login-select1" id="login-select1" class="selectbox">
				<option value="0">Nimbus</option>
				<option value="https://www.google.com/accounts/o8/id">Google Accounts</option>
				<option value="http://open.login.yahoo.com">Yahoo! Accounts</option>
				<option value="http://openid.aol.com/">AOL</option>
				<option value="http://openid.myspace.com">MySpace</option>
			</select>
		<?php } ?>
		<!--div>
			<label for="login-select1"><?php __('language'); ?></label>
			<select name="login-select1" id="login-select1" class="selectbox">
				<option value="default" selected="selected">Default/User Preference</option>
				<?php
					$languages = unserialize(config('languages'));
					foreach ($languages as $k => $v) {
						echo '<option value="' . $k . '">' . $v . '</option>';
					}
				?>
			</select>
		</div-->
	</div>
	<div class="clear"></div>
</div>