<?php
	if (!isset($_GET['lang'])) {
		$lang = "de";
	} else {
		$lang = $_GET['lang'];
	}
	
	$message["de"] = "Zeit in Minuten: ";
	$message["en"] = "Time in minutes: ";
	echo "<li class=\"fa\"><span>" . $message["$lang"] . "</span></li>";
	echo "<li class=\"fa fa-exclamation-triangle\"><span></span></li>";

?>
