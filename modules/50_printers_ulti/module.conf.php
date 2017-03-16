<?php
$moduleconfig["name"]["de"] = "3D Drucker (Ultimaker)";
$moduleconfig["name"]["en"] = "3D Printer (Ultimaker)";
if (@$css == "lcars.css") {
	$moduleconfig["name"]["de"] = "Replikator (Ultimaker)";
	$moduleconfig["name"]["en"] = "Replicator (Ultimaker)";
}
$moduleconfig["icon"] = "filter";
$moduleconfig["refresh"] = "10";

$moduleconfig["octoprintapikey"] = $_ENV["OCTOPRINT-ULTI1-APIKEY"];
$moduleconfig["octoprintpath"] = $_ENV["OCTOPRINT-ULTI1-URL"];
