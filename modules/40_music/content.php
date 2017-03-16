<?php include("module.conf.php"); ?>

<script>

function switch_radio(url){
	console.log(url);
	send_command("input pi")
	mpd_sendcmd(url);
}

</script>

<div class="contentbox_1 tiles">
	<ul>
		<?php
		$inputs = $moduleconfig["inputs"];
		foreach ($inputs as $input) {
			echo '<li><a onclick="send_command(\'' . 'input ' . $input["id"] . '\');"><span class="fa fa-' . $input["icon"] . '"></span> '. $input["name"] . '</a></li>';
		}
		 ?>
	</ul>
</div>

<div class="contentbox_2 tiles">
	<ul>
	<?php
	$stations = $moduleconfig["stations"];
	foreach ($stations as $station) {
			// <li onclick="mpd_sendcmd('stop');" class="fa fa-stop"></li>

		echo "<li><a onclick=\"switch_radio('load&b=". urlencode($station["file"]) . "');\">". $station["name"] . "</a></li>\n";
	}
		?>
	</ul>
</div>
