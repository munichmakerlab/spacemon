<?php include("module.conf.php");

	if (!isset($_GET['lang'])) {
		$lang = "de";
	} else {
		$lang = $_GET['lang'];
	}
	if (!isset($_GET['dev'])) {
		$dev = false;
	} else {
		$dev = $_GET['dev'];
	}
	?>
<div class="contentbox_2 tiles">
	<ul>
	<?php
	foreach ($moduleconfig["schemes"] as $scheme => $value) {
		if (!$value["prominent"]) {


			$params = "";
			if (isset($value["dmx"]))
			{
				$params .= "dmx=" . $value["dmx"] . "&";
			}
			if (isset($value["name"]["en"]))
			{
				$params .= "name=" . $value["name"]["$lang"] . "&";
			}
			echo '<li><a onclick="light_settheme(\'' . $params . '\');"><span class="fa fa-' . $value["icon"] . '"></span> ' . $value["name"]["$lang"] . '</a></li>';
		}
	}
	?>
	</ul>
</div>
<div class="contentbox_1 tiles">
	<ul>
	<?php
	foreach ($moduleconfig["schemes"] as $scheme => $value) {
		if ($value["prominent"]) {


			$params = "";
			if (isset($value["dmx"]))
			{
				$params .= "dmx=" . $value["dmx"] . "&";
			}
			if (isset($value["name"]["en"]))
			{
				$params .= "name=" . $value["name"]["$lang"] . "&";
			}
			echo '<li><a onclick="light_settheme(\'' . $params . '\');"><span class="fa fa-' . $value["icon"] . '"></span> ' . $value["name"]["$lang"] . '</a></li>';
		}
	}
	if ($dev == true) {
		echo "<li>";
		echo "R<input type=\"text\" size=\"3\" id=\"debug_r\" value=\"0\" />";
		echo "G<input type=\"text\" size=\"3\" id=\"debug_g\" value=\"0\" />";
		echo "B<input type=\"text\" size=\"3\" id=\"debug_b\" value=\"0\" />";
		echo "<input type=\"button\" onclick=\"light_settheme('dmx=21:' + $('#debug_r').val() + ',22:' + $('#debug_g').val() + ',23:' + $('#debug_b').val() + '&name=custom');\" value=\"set\" />";
		echo "</li>";
	}
	?>
	</ul>
</div>
