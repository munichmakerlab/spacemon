<?php
include("module.conf.php");
require("phpmqtt.php");


$mqtt = new phpMQTT($moduleconfig["mqtt"]["server"], 1883, "get_volume"); //Change client name to something unique

$volume_topic = "mumalab/audio/x32/get/main/st/mix/fader";

$ret = false;
$tries = 0;

if ($mqtt->connect($clean = true, $will = NULL, $username = $moduleconfig["mqtt"]["user"], $password = $moduleconfig["mqtt"]["pass"])) {
	$topics[$volume_topic] = array("qos"=>0, "function"=>"recieve");
	$mqtt->subscribe($topics,0);
	$mqtt->publish($volume_topic, "get", 0);

	global $ret;
	global $tries;
	while ($ret == false and $tries < 10){
		usleep(50000);
		$mqtt->proc($loop=false);
		$tries++;
	}


	$mqtt->close();
}

function recieve($topic,$msg){
		global $ret;
		if ($msg != "get") {
			$ret = true;
			// We cap the fader percentage at .75 because that's 0db. We apply *0.3 to make 100% = 0d
			$val = round(json_decode($msg)[0]*133);
			echo "$val%";
		}
}
//

?>
