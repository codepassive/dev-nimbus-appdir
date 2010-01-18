<div id="desktop-container">
	<div id="icon-screen">
		<div class="desktop-icons"></div>
	</div>
	<div id="nimbusbar">
		<div class="inner">
			<div id="nimbusbar-user">
				<a href="javascript:;" title="<?php __('nimbusbar_usermenu'); ?>" class="userbutton"><?php __('username'); ?></a>
				<div id="nimbusbar-user-container" class="menu-container">
					<div class="inner">
						<div class="items">
							<ul>
								<li class="item"><a href="javascript:;" id="usermenusetstatus"><span><?php __('usermenu/setstatus'); ?></span></a></li>
								<li class="separator"><span></span></li>
								<li class="item"><a href="javascript:;" id="usermenulockscreen"><span><?php __('usermenu/lockscreen'); ?></span></a></li>
								<li class="item"><a href="javascript:;" id="usermenulogoff"><span><?php __('usermenu/logoff'); ?></span></a></li>
								<li class="separator"><span></span></li>
								<li class="item"><a href="javascript:;" id="usermenupersonalize"><span><?php __('usermenu/personalize'); ?></span></a></li>
								<li class="item"><a href="javascript:;" id="usermenupersonal"><span><?php __('usermenu/personal'); ?></span></a></li>
								<li class="item"><a href="javascript:;" id="usermenuconfiguserpermissions"><span><?php __('usermenu/configuserpermissions'); ?></span></a></li>
								<li class="item"><a href="javascript:;" id="usermenuattachexternal"><span><?php __('usermenu/attachexternal'); ?></span></a></li>
								<li class="separator"><span></span></li>
								<li class="item"><a href="javascript:;" id="usermenulogintomessenger"><span><?php __('usermenu/logintomessenger'); ?></span></a></li>
								<li class="item"><a href="javascript:;" id="usermenucheckmail"><span><?php __('usermenu/checkmail'); ?></span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="nimbusbar-menu">
				<a href="javascript:;" title="<?php __('nimbusbar_thebutton'); ?>" id="thebutton"></a>
				<div id="nimbusbar-menu-container" class="menu-container">
					<div class="inner">
						<div class="items">
							<ul>
								<li class="item header"><span>Accessories<span></li>
								<li class="item"><a href="javascript:;" title="textedit" id="texteditor-icon"><span>Text Editor</span></a></li>
								<li class="item"><a href="javascript:;" title="calculator" id="calculator-icon"><span>Calculator</span></a></li>
								<li class="item"><a href="javascript:;" title="calendar" id="calendar-icon"><span>Calendar</span></a></li>
								<li class="item"><a href="javascript:;" title="terminal" id="terminal-icon"><span>Terminal</span></a></li>
								<li class="item header"><span>System<span></li>
								<li class="item"><a href="javascript:;" title="config" id="config-icon"><span>System Settings</span></a></li>
								<li class="item"><a href="javascript:;" title="usermanager" id="usermanager-icon"><span>User Dashboard</span></a></li>
								<li class="item"><a href="javascript:;" title="instance" id="instance-icon"><span>Instance/Process Manager</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="nimbusbar-taskbar-div"></div>
			<div id="nimbusbar-taskbar">
				<div id="nimbusbar-taskbar-controllall"><a href="javascript:;" title="<?php __('run_applications'); ?>"></a></div>
				<div id="nimbusbar-taskbar-noinstances"><?php __('run_applications'); ?></div>
				<div class="items"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="nimbus-watermark">
		<p><?php __('watermark_p1'); ?></p>
		<p><?php __('watermark_p2'); ?></p>
		<p><?php __('watermark_p3'); ?></p>
	</div>
	<div id="nimbus-tray">
		<div id="loading-container-desktop"><?php __('loading'); ?>...</div>
		<div class="items">
			<!--div class="item"><a href="javascript:;" title="Application Tray Icon"></a></div-->
		</div>
		<div class="clear"></div>
	</div>
</div>