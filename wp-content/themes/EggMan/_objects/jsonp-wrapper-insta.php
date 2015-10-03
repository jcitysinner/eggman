<?php

header("Content-Type:text/javascript"); // avoid browser warnings
$url = 'https://api.instagram.com/v1/tags/doyouknowtheeggman/media/recent?client_id=bd41ebe7f25e49eab9bf444cc316cd01&count=6';
$json_data = file_get_contents($url);
//$request = new HttpRequest("http://data.streetfoodapp.com/1.1/vendors/egg-man", HttpRequest::METH_GET);
// $request->send();
// $json_data = $request->getResponseBody();

// wrap the data as with the callback
$callback = isset($_GET["callback"]) ? $_GET["callback"] : "alert";
echo $callback."(".$json_data.");"; ?>