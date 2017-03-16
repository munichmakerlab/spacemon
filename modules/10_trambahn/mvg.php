<?php
$min_time_to_departure = 60;

/**
 * Logging levels:
 * 0: No logging
 * 1: Log Fuckups
 * 2: Log more
 *
 * @var int
 **/
$logging_level = 2;

/**
 * The API key (or something like that)
 * If they happen to change it, get a new one by running a "Next Departures"-request
 * at mvg.de (e.g. with chrome) and looking at the network traffic in the
 * debugger.
 * In the Request Headers, there'll be something like:
 * X-MVG-Authorization-Key:5af1beca494712ed38d313714d4caff6
 *
 * @var string Athorisation/Api-key for mvg.de
 **/
$api_key = "5af1beca494712ed38d313714d4caff6";


// Build Http query using params
// $query = http_build_query($params);

// Create Http context details
$contextData = array (
                'method' => 'GET',
                'header' => "Connection: close\r\n".
                            "X-MVG-Authorization-Key : ". $api_key ."\r\n" );
                // 'content'=> $query );

// Create context resource for our request
$context = stream_context_create (array ( 'http' => $contextData ));

// Read page rendered as result of your POST request

/**
 * Returns an array like:
 * {
 * {
 *  "departureTime" : 1454708280000,  // time as unix timestamp in milliseconds
 *  "product" : "s",                  // for S-Bahn, "u" for U-Bahn, etc.
 *  "label" : "7",                    // line Numer (like "7") as string
 *  "destination" : "Höhenkirchen-Siegertsbrunn", // Destination Station Name
 *  "live" : true                     // Nobody knows, seems to be true all the time
 * }, […]}
 *
 * Station IDs can be reverse-engineered by running a "Next Departures"-request
 * at mvg.de (e.g. with chrome) and looking at the network traffic in the
 * debugger.
 * There'll be a request something like:
 * https://www.mvg.de/fahrinfo/api/departure/5?footway=0
 * Where 5 is the Station ID and the rest can be safely ignored
 *
 * @param string $id The Station ID (like "1310")
 * @return array Contains all the departures for the requested station
 */

function my_log($msg, $log_level)
{
    global $logging_level;
    if ($log_level <= $logging_level){
        error_log($msg);
    }
}

function get_deps_for_station_id($id)
{
    global $context;
    $result =  file_get_contents (
                      'https://www.mvg.de/fahrinfo/api/departure/'. $id .'?footway=0',  // page url
                      false,
                      $context);
    if (! isset($result)){
      my_log("No response from mvg.de", 1);
    }
    $deps = json_decode($result, true)['departures'];
    foreach ($deps as $key => $dept) {
        // echo $dept["departureTime"] . " vs " . time() * 1000;
        if ($dept["departureTime"] < time() * 1000){
            unset($deps[$key]);
            // my_log("unset happened", 2);
        }
    }
    $deps = array_values($deps); // Because unset() just clears the depature, so the index is then undefined. This reindexes the array
    return $deps;
}

/**
 * Gets first entry for given Station ID, destinantion Array (to filter for
 * trains going in a certian direction but terminating at an earlier station)
 *
 * @param string $station_id The Station ID (like "1310")
 * @param array $dest Array with all wanted destinantions like array("Mittersendling", "Pasing")
 * @param int $line The wanted line number
 * @return array A single departure array like shown in get_deps_for_station_id()
 */
function get_first_dept_for_station_id($station_id, $dest, $line)
{
    global $min_time_to_departure;
    $deps = get_deps_for_station_id($station_id);
    if (empty($deps)){
        my_log("Empty array!", 1);
    }
    for ($i=0; $i < count($deps); $i++) {
      // echo $i;
      $d = $deps[$i];
      if (in_array($d['destination'], $dest) && $d['departureTime'] / 1000 - time() > $min_time_to_departure && $d['label'] == $line ) {
          return $deps[$i];
      }
    }
}

?>
