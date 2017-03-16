<?php
include "mvg.php";
include "module.conf.php";

$lines = $moduleconfig["line"];

foreach ($lines as $line) {
	$dest = get_first_dept_for_station_id($moduleconfig["stationid"], $line["dests"], $line["num"]);
	if ($dest === null) {
	    $next = "--";
	} else {
	    $next_secs = $dest['departureTime'] / 1000 - time();
	    $next = round($next_secs / 60);
	    $next .= " min";


	}
	echo "<li class=\"fa\"><span class=\"subwaynum\">B" . $line["num"] . "</span></li><li class=\"fa\"><span>$next</span></li>";

}




?>
