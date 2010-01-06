<div id="desktop-container">
	<div id="nimbusbar">
		<div class="inner">
			<div id="nimbusbar-user"><a href="javascript:;" title="<?php __('nimbusbar_usermenu'); ?>"><?php __('username'); ?></a></div>
			<div id="nimbusbar-menu">
				<a href="javascript:;" title="<?php __('nimbusbar_thebutton'); ?>" id="thebutton"></a>
				<div id="nimbusbar-menu-container">
					<div class="inner">
						<div class="items">
							<div class="item menu-search">
								<h1><?php __('search'); ?></h1>
								<input type="text" value="<?php __('search_more'); ?>" id="quicksearch_from_menu" onfocus="if(this.value == '<?php __('search_more'); ?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php __('search_more'); ?>';}"/>
								<p><a href="javascript:;" id="">Advanced Search</a></p>
								<div class="clear"></div>
							</div>
							<div class="item columns">
								<div class="menus">
									<h1>Quick Apps</h1>
									<div class="collection">
										<div class="item">
											<div class="icon-inner"><a href="javascript:;" title="Application"><img src="http://thesis/public/resources/images/icons/Tango/32/apps/help-browser.png" border="0" alt="" /></a><a href="javascript:;" title="Application">User Documentation</a></div>
										</div>
										<div class="item">
											<div class="icon-inner"><a href="javascript:;" title="Application"><img src="http://thesis/public/resources/images/icons/Tango/32/apps/help-browser.png" border="0" alt="" /></a><a href="javascript:;" title="Application">User Documentation</a></div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="searchresults"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="nimbusbar-taskbar-div"></div>
			<div id="nimbusbar-taskbar">
				<div id="nimbusbar-taskbar-controllall"><a href="javascript:;" title="<?php __('run_applications'); ?>"></a></div>
				<div id="nimbusbar-taskbar-noinstances"><?php __('run_applications'); ?></div>
				<div class="items">
					<!--div class="item focused active"><a href="javascript:;"><span class="instance-name">Application</span></a></div>
					<div class="item"><a href="javascript:;"><span class="instance-name">Application</span></a></div>
					<div class="item"><a href="javascript:;"><span class="instance-name">Application</span></a></div>
					<div class="item"><a href="javascript:;"><span class="instance-name">Application</span></a></div-->
				</div>
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
		<div class="items">
			<!--div class="item"><a href="javascript:;" title="Application Tray Icon"></a></div-->
		</div>
		<div class="clear"></div>
	</div>
</div>