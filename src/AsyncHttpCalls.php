<?php

namespace LogicalSystem\HttpCalls;

class AsyncHttpCalls {

    public static function get($url, $header = []) {
        popen("php /curl.php 'get' '".$url."' '' '' ".json_encode($header)."", "w");
    }
    
    public static function post($url,$postField = "{}", $contentType = "application/json", $header = []) {
        if(is_array($postField)) $postField = json_encode($postField);
        popen("php /curl.php 'post' '".$url."' '".$postField."' '".$contentType."' ".json_encode($header)."", "w");
    }
    
    public static function delete($url,$postField = "{}", $contentType = "application/json", $header = []) {
        if(is_array($postField)) $postField = json_encode($postField);
        popen("php /curl.php 'delete' '".$url."' '".$postField."' '".$contentType."' ".json_encode($header)."", "w");
    }
    
    public static function put($url,$postField = "{}", $contentType = "application/json", $header = []) {
        if(is_array($postField)) $postField = json_encode($postField);
        popen("php /curl.php 'put' '".$url."' '".$postField."' '".$contentType."' ".json_encode($header)."", "w");
    }

}