<?php

use LogicalSystem\HttpCalls\HttpCalls;

require_once("./HttpCalls.php");

if (isset($argc)) {

    $method = $argv[1];
    $url = $argv[2];
    $postField = $argv[3] ?? "{}";
    $contentType = $argv[4] ?? "application/json";
    $header = json_decode($argv[5] ?? "[]",true);

    switch ($method) {
        case 'get':
            $result = HttpCalls::get($url,$header);
            break;
        case 'post':
            $result = HttpCalls::post($url,$postField,$contentType,$header);
            break;
        case 'put':
            $result = HttpCalls::put($url,$postField,$contentType,$header);
            break;
        case 'delete':
            $result = HttpCalls::delete($url,$postField,$contentType,$header);
            break;
        
        default:
            $result = "";
            break;
    }
	
    echo($result);

}