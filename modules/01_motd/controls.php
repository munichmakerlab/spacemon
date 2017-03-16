<?php
	if (!isset($_GET['lang'])) {
		$lang = "de";
	} else {
		$lang = $_GET['lang'];
	}
	
	$message["de"] = "Radiosenderwahl implementiert. Sendervorschläge an Jan";
	$message["en"] = "Radio station picker now implemented. To get your station added, talk to Jan";
	echo "<li class=\"fa fa-info\"><span> " . $message[$lang] . "</span></li>";

?>
