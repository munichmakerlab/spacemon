<?php
include("module.conf.php");
/*
POST /api/job HTTP/1.1
Host: example.com
Content-Type: application/json
X-Api-Key: abcdef...

{
  "command": "cancel"
}
*/

$url = $moduleconfig["octoprintpath"] . "/api/job";

$http = new HttpRequest($url, HttpRequest::METH_POST);
$http->setOptions(array(
    'timeout' => 10,
    'redirect' => 4
));
$http->addPostFields(array(
    'command' => 'cancel',
    'secondData' => 'myDataTwo'
));

$response = $http->send();
echo $response->getBody();

/*
X-Api-Key: " . $moduleconfig["octoprintapikey"] . "
*/