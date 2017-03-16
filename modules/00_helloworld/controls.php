<?php
	if (!isset($_GET['lang'])) {
		$lang = "de";
	} else {
		$lang = $_GET['lang'];
	}
	$status = file_get_contents("http://status.munichmakerlab.de/simple.php");
	echo "<li class=\"fa fa-plug\"><span> ". $status . "</span></li>";

?>
