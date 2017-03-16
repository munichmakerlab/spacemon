<?php
$moduleconfig["name"]["de"] = "Trambahn";
$moduleconfig["name"]["en"] = "Tramway";
$moduleconfig["icon"] = "train";
$moduleconfig["refresh"] = "20";
if (@$css == "lcars.css") {
	$moduleconfig["name"]["de"] = "Teleporter";
	$moduleconfig["name"]["en"] = "Teleporter";
}
//$moduleconfig["dev"] = true;

$moduleconfig["stationid"] = "11";
$moduleconfig["line"]["0"]["num"] = "20";
$moduleconfig["line"]["0"]["dests"] = array("Karlsplatz (Stachus)", "Karlsplatz Nord", "Hauptbahnhof", "Hauptbahnhof Nord", "Einsteinstraße");
$moduleconfig["line"]["1"]["num"] = "21";
$moduleconfig["line"]["1"]["dests"] = array("Karlsplatz (Stachus)", "Karlsplatz Nord", "Hauptbahnhof", "Hauptbahnhof Nord", "Einsteinstraße");
$moduleconfig["line"]["2"]["num"] = "12";
$moduleconfig["line"]["2"]["dests"] = array("Scheidplatz");
$moduleconfig["line"]["3"]["num"] = "N20";
$moduleconfig["line"]["3"]["dests"] = array("Karlsplatz (Stachus)", "Karlsplatz Nord", "Hauptbahnhof", "Hauptbahnhof Nord", "Einsteinstraße");
