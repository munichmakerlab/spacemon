<?php
include("module.conf.php");
require("phpmqtt.php");

if (!isset($_GET["dmx"])) {
	$dmx="";
} else {
	$dmx = $_GET["dmx"];
}

$mqtt = new phpMQTT($moduleconfig["mqtt"]["server"], 1883, $moduleconfig["mqtt"]["client"]); //Change client name to something unique

if ($mqtt->connect($clean = true, $will = NULL, $username = $moduleconfig["mqtt"]["user"], $password = $moduleconfig["mqtt"]["pass"])) {
	if ($dmx != "") {

		foreach (explode(",",$dmx) as $row) {
			$values = explode(":",$row);
			if (!is_numeric($values[0]) || !is_numeric($values[1])) {
				die("no no");
			}
			echo $values[0] . " - " . $values[1] . "<br />";
		}
		$mqtt->publish("mumalab/DMX/1/set",$dmx,0);
		
	}
	$mqtt->publish("mumalab/room/ledpanel/set/once1","Mode set to",0);
	$mqtt->publish("mumalab/room/ledpanel/set/once2",$_GET["name"],0);


	$mqtt->close();
}

?>
