<!-- CUSTOM -->
<style type="text/css">
.screen {
	font-size: <?php echo personal('font_size'); ?>;
}
</style>
<script type="text/javascript">
	<?php echo (personal('theme') != 'default') ? "$('#stylesheet-parent').attr('href','" . personal('theme') . "');": ''; ?>;	
	Nimbus.Desktop.refreshRate = <?php echo personal('refresh_rate'); ?>;
	Nimbus.Desktop.shortcuts = <?php echo personal('shortcuts'); ?>;
	<?php if (is_array(unserialize(personal('background')))) { ?>
		Nimbus.Desktop.background(<?php echo json_encode(unserialize(personal('background'))) ?>, 30);
	<?php } else { ?>
		Nimbus.Desktop.background('<?php echo unserialize(personal('background')); ?>');
	<?php } ?>
	$('.screen-background').css({backgroundPosition:'<?php echo personal('background_position'); ?>'});
</script>
<!-- /CUSTOM -->
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
								<!--li class="item"><a href="javascript:;" id="usermenulockscreen"><span><?php __('usermenu/lockscreen'); ?></span></a></li-->
								<li class="item"><a href="javascript:;" id="usermenulogoff"><span><?php __('usermenu/logoff'); ?></span></a></li>
								<li class="separator"><span></span></li>
								<li class="item"><a href="javascript:;" id="usermenupersonalize"><span><?php __('usermenu/personalize'); ?></span></a></li>
								<li class="item"><a href="javascript:;" id="usermenupersonal"><span><?php __('usermenu/personal'); ?></span></a></li>
								<li class="item"><a href="javascript:;" id="usermenuconfiguserpermissions"><span><?php __('usermenu/configuserpermissions'); ?></span></a></li>
								<li class="item"><a href="javascript:;" id="usermenuattachexternal"><span><?php __('usermenu/attachexternal'); ?></span></a></li>
								<li class="separator"><span></span></li>
								<li class="item"><a href="javascript:;" id="usermenulogintomessenger"><span>Internal Discussion</span></a></li>
								<!--li class="item"><a href="javascript:;" id="usermenucheckmail"><span><?php __('usermenu/checkmail'); ?></span></a></li-->
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
								<li class="item"><a href="javascript:;" title="browser" id="browser-icon"><span>Browser</span></a></li>
								<li class="item"><a href="javascript:;" title="aviary" id="aviary-icon"><span>Aviary</span></a></li>
								<li class="item"><a href="javascript:;" title="writer" id="writer-icon"><span>Zoho Writer</span></a></li>
								<li class="item"><a href="javascript:;" title="sheet" id="sheet-icon"><span>Zoho Sheet</span></a></li>
								<li class="item"><a href="javascript:;" title="show" id="show-icon"><span>Zoho Show</span></a></li>
								<li class="item header"><span>System<span></li>
								<li class="item"><a href="javascript:;" title="fileexplorer" id="fileexplorer-icon"><span>File Explorer</span></a></li>
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
<div id="setstatus" class="dialog_content">
	<div style="padding:8px;">
		<div><label for="status-text1">Set Status</label><br/><textarea name="status-text1" id="status-text1" class="textbox" style="width:238px;height:96px;color:#c0c0c0;font-family:arial;font-size:16px;">What are you doing?</textarea></div>
	</div>
</div>
<div id="facebookstatus" class="dialog_content">
	<div id="iframecontainer"><iframe src="" id="iframe" style="width:720px;height:507px;"></iframe></div>
</div>