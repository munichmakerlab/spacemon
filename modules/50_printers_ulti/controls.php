<?php
	if (!isset($_GET['lang'])) {
		$lang = "de";
	} else {
		$lang = $_GET['lang'];
	}
	include("module.conf.php");
	$json=file_get_contents($moduleconfig["octoprintpath"] . "/api/job");
	$obj = json_decode($json);
	//echo $obj->state;
	$state["de"] = "Unbekannter Status";
	$state["en"] = "unknown status";
	$state["icon"] = "bomb";
	if ($obj->state == "Operational") {
		$state["de"] = "Bereit";
		$state["en"] = "ready";
		$state["icon"] = "smile-o";
	}
	if ($obj->state == "Printing") {
		$state["de"] = "" . round($obj->progress->completion) . "%";
		$state["en"] = "" . round($obj->progress->completion) . "%";
		$state["icon"] = "gears";
	}

	echo "<li class=\"fa fa-" . $state["icon"] . "\"><span> ". $state["$lang"] . "</span></li>";

?>
