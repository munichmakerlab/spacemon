<?php
	if (!isset($_GET['lang'])) {
		$lang = "de";
	} else {
		$lang = $_GET['lang'];
	}
	
	$message["de"] = "in Arbeit";
	$message["en"] = "Work in progress";
	echo "<li class=\"fa fa-exclamation-triangle\"><span> " . $message[$lang] . "</span></li>";

?>
