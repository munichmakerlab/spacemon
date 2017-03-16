<?php
$moduleconfig["name"]["de"] = "Licht";
$moduleconfig["name"]["en"] = "Light";
$moduleconfig["icon"] = "lightbulb-o";
$moduleconfig["refresh"] = "60";

$moduleconfig["mqtt"]["server"] = $_ENV["MQTT-SERVER"];
$moduleconfig["mqtt"]["user"] = $_ENV["MQTT-USERNAME"];
$moduleconfig["mqtt"]["pass"] = $_ENV["MQTT-PASSWORD"];
$moduleconfig["mqtt"]["client"] = "Space Monitor";



$fixturecount=0;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 1;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Licht HuS";
$fixturecount++;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 2;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Licht Beamer";
$fixturecount++;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 3;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Licht Konferenz";
$fixturecount++;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 4;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Licht Lab";
$fixturecount++;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 13;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Laser Pattern";
$fixturecount++;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 14;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Laser 1";
$fixturecount++;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 15;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Laser 2";
$fixturecount++;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 16;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Laser 3";
$fixturecount++;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 17;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Laser 4";
$fixturecount++;
$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
$moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 18;
$moduleconfig["fixtures"]["$fixturecount"]["description"] = "Laser 5";
$fixturecount++;
// $moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
// $moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 19;
// $moduleconfig["fixtures"]["$fixturecount"]["description"] = "Strobe Speed";
// $fixturecount++;
// $moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
// $moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = 20;
// $moduleconfig["fixtures"]["$fixturecount"]["description"] = "Strobe Intensity";
// $fixturecount++;

$ledstripcount = 12;
$startdmxid = 20;
for ($i=0; $i < $ledstripcount; $i++) {
  for ($j=0; $j < 3; $j++) {
  	$moduleconfig["fixtures"]["$fixturecount"]["type"] = "dmx";
    $moduleconfig["fixtures"]["$fixturecount"]["dmxid"] = $i*3+$j+$startdmxid;
    $moduleconfig["fixtures"]["$fixturecount"]["description"] = "LED Strip " . $i . "; color " . $j;
    $fixturecount++;
  }
}



$schemecount=0;

$jsonfiles = glob("schemes/*.json");
foreach ($jsonfiles as $file) {
	$filecontent = file_get_contents($file);
	$json = json_decode($filecontent, true);

	$moduleconfig["schemes"]["$schemecount"]["name"]["de"] = $json["de"];
	$moduleconfig["schemes"]["$schemecount"]["name"]["en"] = $json["en"];
	$moduleconfig["schemes"]["$schemecount"]["icon"] = $json["icon"];
	$moduleconfig["schemes"]["$schemecount"]["prominent"] = $json["prominent"];

	$dmxstring="";
	foreach($json["dmx"] as $dmxentry) {
		$dmxstring .= $dmxentry["id"] . ":" . $dmxentry["value"] . ",";
	}
	$dmxstring = substr($dmxstring,0,-1);

	$moduleconfig["schemes"]["$schemecount"]["dmx"] = $dmxstring;

$schemecount++;

}
/*
$moduleconfig["schemes"]["$schemecount"]["name"]["de"] = "Entspannen";
$moduleconfig["schemes"]["$schemecount"]["name"]["en"] = "Chillout";
$moduleconfig["schemes"]["$schemecount"]["icon"] = "hand-peace-o";
$moduleconfig["schemes"]["$schemecount"]["prominent"] = true;
$moduleconfig["schemes"]["$schemecount"]["elements"] = Array(40=>0,41=>255,42=>255);
$schemecount++;

$moduleconfig["schemes"]["$schemecount"]["name"]["de"] = "Film";
$moduleconfig["schemes"]["$schemecount"]["name"]["en"] = "Movie";
$moduleconfig["schemes"]["$schemecount"]["icon"] = "video-camera";
$moduleconfig["schemes"]["$schemecount"]["prominent"] = true;
$moduleconfig["schemes"]["$schemecount"]["elements"] = Array(2=>0);
$schemecount++;

$moduleconfig["schemes"]["$schemecount"]["name"]["de"] = "Aus";
$moduleconfig["schemes"]["$schemecount"]["name"]["en"] = "Off";
$moduleconfig["schemes"]["$schemecount"]["icon"] = "power-off";
$moduleconfig["schemes"]["$schemecount"]["prominent"] = true;
$moduleconfig["schemes"]["$schemecount"]["elements"] = Array(2=>0,3=>0,4=>0,3=>0);
$schemecount++;

*/
