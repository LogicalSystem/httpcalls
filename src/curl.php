<?php

use LogicalSystem\HttpCalls\HttpCalls;

require_once(realpath(dirname(__FILE__))."/HttpCalls.php");

$val = getopt("p:");

if ($val !== false) {

    $method = $val["p"][0];
    $url = $val["p"][1];
    $postField = $val["p"][2] ?? "{}";
    $contentType = $val["p"][3] ?? "application/json";
    $header = json_decode($val["p"][4] ?? "[]",true);


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

}