<?php
include("module.conf.php");
require("phpmqtt.php");

if (!isset($_GET["command"])) {
	$command="";
} else {
	$command = $_GET["command"];
}

$mqtt = new phpMQTT($moduleconfig["mqtt"]["server"], 1883, $moduleconfig["mqtt"]["client"]); //Change client name to something unique

if ($mqtt->connect($clean = true, $will = NULL, $username = $moduleconfig["mqtt"]["user"], $password = $moduleconfig["mqtt"]["pass"])) {
	if ($command != "") {
		echo "publishing " . $command;
		$mqtt->publish("mumalab/audio/x32/command",$command,0);

	}

	$mqtt->close();
}

?>
