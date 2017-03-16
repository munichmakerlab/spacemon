<?php
$moduleconfig["name"]["de"] = "Bus";
$moduleconfig["name"]["en"] = "Bus";
$moduleconfig["icon"] = "bus";
$moduleconfig["refresh"] = "20";
if (@$css == "lcars.css") {
	$moduleconfig["name"]["de"] = "Turbolift";
	$moduleconfig["name"]["en"] = "Turbolift";
}
//$moduleconfig["dev"] = true;

$moduleconfig["stationid"] = "11";
$moduleconfig["line"]["0"]["num"] = 53;
$moduleconfig["line"]["0"]["dests"] = array("Aidenbachstraße");
