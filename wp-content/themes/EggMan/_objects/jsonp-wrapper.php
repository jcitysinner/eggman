<?php

header("Content-Type:text/javascript"); // avoid browser warnings
$url = 'http://data.streetfoodapp.com/1.1/vendors/egg-man';
$json_data = file_get_contents($url);
//$request = new HttpRequest("http://data.streetfoodapp.com/1.1/vendors/egg-man", HttpRequest::METH_GET);
// $request->send();
// $json_data = $request->getResponseBody();

// wrap the data as with the callback
$callback = isset($_GET["callback"]) ? $_GET["callback"] : "alert";
echo $callback."(".$json_data.");"; ?>