	<script>
	function light_settheme(params) {
			$("#lightloader").load('modules/20_light/publish.php?' + params);


	}
	
	</script>
	<div id="lightloader" style="display:none;"></div>
<?php
	include('module.conf.php');
	if (!isset($_GET['lang'])) {
		$lang = "de";
	} else {
		$lang = $_GET['lang'];
	}
	foreach ($moduleconfig["schemes"] as $scheme => $value) {
		if ($value["prominent"]){
			$params = "";
			if (isset($value["dmx"]))
			{
				$params .= "dmx=" . $value["dmx"] . "&";
			}
			if (isset($value["name"]["en"]))
			{
				$params .= "name=" . $value["name"]["$lang"] . "&";
			}
			echo '<li onclick="light_settheme(\'' . $params . '\');" class="fa fa-' . $value["icon"] . '"></li>' . "\n";
		}
	}
?>
