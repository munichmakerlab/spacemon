<?php
include "mvg.php";
include "module.conf.php";

$deps = get_deps_for_station_id($moduleconfig["stationid"]);

if ($deps === null){
  echo "No more trains :'(";
} else {
  echo "<table>";
  foreach ($deps as $dept) {
    if ($dept["product"] != "t") {
      continue;
    }
    $next_secs = $dept['departureTime'] / 1000 - time();
    $next = round($next_secs / 60);
    $next .= " min";
    echo "<tr>";
      echo "<td>" . strtoupper($dept["product"]) . $dept["label"] . "</td>";
      echo "<td>" . $dept["destination"] . "</td>";
      echo "<td>" . $next . "</td>";
    echo "</tr>";
  }
}
 ?>
