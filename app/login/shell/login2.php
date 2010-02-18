<div class="login" style="position:absolute;top:0;height:100%;right:0;width:240px;background:rgba(0,0,0,0.5);color:#ffffff;">
	<div id="login-form1" class="form" style="position:relative;top:50%;margin-top:-200px;">
		<div><label for="login-text1"><?php __('username'); ?></label> <input type="text" name="login-text1" id="login-text1" class="textbox" value="" /></div>
		<div><label for="login-password1"><?php __('password'); ?></label> <input type="password" name="login-password1" id="login-password1" class="textbox" value="" /></div>
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
		<div class="buttons"><input type="button" value="Login" id="login-button1"/>
	</div>
	<div class="clear"></div>
</div>