<div id="network-container" class="fill-all" style="height:400px;">
	<div class="sidebar">
		<div class="sidebar_inner">
			<h2>Actions</h2>
			<ul>
				<li><a href="javascript:;">Add a Network</a></li>
				<li><a href="javascript:;">Configure Connections</a></li>
				<li><a href="javascript:;">Need Help?</a></li>
			</ul>
		</div>
	</div>
	<div>
	<?php
		$networks = $this->db->query("SELECT * FROM networks");
		if ($networks) {
			echo '<div class="grid">';
			foreach ($networks as $network) {
				echo '<div class="item icon"><div class="icon-inner"><a href="javascript:;" title="' . $network['host'] . '"><span><img src="' . config('appurl') . 'public/resources/images/icons/Tango/32/places/folder-remote.png" border="0" alt="" />' . $network['name'] . '</span></a></div></div>';
			}
			echo '</div>';
		}
	?>
	</div>
</div>