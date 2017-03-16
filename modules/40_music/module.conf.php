<?php
$moduleconfig["name"]["de"] = "Musik";
$moduleconfig["name"]["en"] = "Music";
$moduleconfig["icon"] = "music";
$moduleconfig["refresh"] = "0";

$moduleconfig["mpd"] = $_ENV["MPD-SERVER"];
$moduleconfig["mpdweburl"] = $_ENV["MPD-WEB-URL"];

$moduleconfig["mqtt"]["server"] = $_ENV["MQTT-SERVER"];
$moduleconfig["mqtt"]["user"] = $_ENV["MQTT-USERNAME"];
$moduleconfig["mqtt"]["pass"] = $_ENV["MQTT-PASSWORD"];
$moduleconfig["mqtt"]["client"] = "Space Monitor";


$stationcount = 0;

$moduleconfig["stations"]["$stationcount"]["name"] = "Bayern 3";
$moduleconfig["stations"]["$stationcount"]["file"] = "bayern3";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "Antenne Bayern";
$moduleconfig["stations"]["$stationcount"]["file"] = "Antenne Bayern";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "Rock Antenne";
$moduleconfig["stations"]["$stationcount"]["file"] = "Rock Antenne";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "95.5 Charivari";
$moduleconfig["stations"]["$stationcount"]["file"] = "charivari";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "M94.5";
$moduleconfig["stations"]["$stationcount"]["file"] = "m945";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "Energy";
$moduleconfig["stations"]["$stationcount"]["file"] = "Energy";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "Rockabilly Radio";
$moduleconfig["stations"]["$stationcount"]["file"] = "Rockabilly Radio";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "GrooveSalad";
$moduleconfig["stations"]["$stationcount"]["file"] = "SomaFM GrooveSalad";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "SceneSat";
$moduleconfig["stations"]["$stationcount"]["file"] = "SceneSat";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "Sunshine Live";
$moduleconfig["stations"]["$stationcount"]["file"] = "Sunshine Live";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "Uzic";
$moduleconfig["stations"]["$stationcount"]["file"] = "uzic";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "Eurodance";
$moduleconfig["stations"]["$stationcount"]["file"] = "Eurodance";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "HouseTime.fm";
$moduleconfig["stations"]["$stationcount"]["file"] = "housetime";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "Secret Agent";
$moduleconfig["stations"]["$stationcount"]["file"] = "Secret Agent";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "Suburbs of Goa";
$moduleconfig["stations"]["$stationcount"]["file"] = "suburbs of goa";
$stationcount++;
$moduleconfig["stations"]["$stationcount"]["name"] = "GET SCHWIFTY!";
$moduleconfig["stations"]["$stationcount"]["file"] = "Show Me What You Got!";
$stationcount++;

$inputcount = 0;
$moduleconfig["inputs"]["$inputcount"]["name"] = "Pi";
$moduleconfig["inputs"]["$inputcount"]["id"] = "pi";
$moduleconfig["inputs"]["$inputcount"]["icon"] = "birthday-cake";
$inputcount++;
$moduleconfig["inputs"]["$inputcount"]["name"] = "Line in";
$moduleconfig["inputs"]["$inputcount"]["id"] = "line_in";
$moduleconfig["inputs"]["$inputcount"]["icon"] = "plug";
$inputcount++;
