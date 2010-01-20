<div id="instance-container">
	<h3>Recently Opened Applications</h3>
	<p style="padding: 4px 8px;">Open an application you recently used</p>
	<div class="icons">
		<table cellpadding="0" cellspacing="0" border="0" style="margin-left:20px;">
		<?php
			$recents = unserialize(personal('recently_opened_applications'));
			$applications = unserialize(config('applications'));
			$i = 0;
			foreach ($recents as $recent) {
				if (isset($applications[$recent])) {
					if ($i == 0) {
						echo "<tr>";
					}
					if ($i < 2) {
						echo "<td>";
						echo '<div class="icon" title="' . $applications[$recent]->handle . '"><div class="item" id="' . $applications[$recent]->name . '-' . generateHash() . '"><div class="icon-inner"><a href="javascript:;" title="' . $applications[$recent]->name . '"><img src="' . $applications[$recent]->icon . '" border="0" alt="" /></a><a href="javascript:;" title="' . $applications[$recent]->name . '">' . $applications[$recent]->name . '</a></div></div></div>';
						echo "</td>";
						$i++;
					} else {
						echo "</tr>";
						$i = 0;
					}
				}
			}
		?>
		</table>
		<div class="clear"></div>
	</div>
	<div class="frame">
		Execute an Application
		<input type="text" style="width:94%;" id="instance_openapp" />
	</div>
	<div class="frame">
		<div class="active_instance">
			<table class="table" cellspacing="2" cellpadding="2" border="0">
				<thead>
					<tr>
						<th>Instance ID</th>
						<th style="text-align:center;">Actions</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>