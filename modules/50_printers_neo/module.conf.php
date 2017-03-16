<?php
$moduleconfig["name"]["de"] = "3D Drucker (Neo)";
$moduleconfig["name"]["en"] = "3D Printer (Neo)";
if (@$css == "lcars.css") {
	$moduleconfig["name"]["de"] = "Replikator (Neo)";
	$moduleconfig["name"]["en"] = "Replicator (Neo)";
}
$moduleconfig["icon"] = "filter";
$moduleconfig["refresh"] = "10";

$moduleconfig["octoprintapikey"] = $_ENV["OCTOPRINT-NEO-APIKEY"];
$moduleconfig["octoprintpath"] = $_ENV["OCTOPRINT-NEO-URL"];
