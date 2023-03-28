<?php

namespace LogicalSystem\HttpCalls;

class AsyncHttpCalls {

    public static function get($url, $header = []) {
        popen("php ".realpath(dirname(__FILE__))."/curl.php -pget -p".$url." -p'{}' -papplication/json -p".json_encode($header)."", "w");
    }
    
    public static function post($url,$postField = "{}", $contentType = "application/json", $header = []) {
        if(is_array($postField)) $postField = json_encode($postField);
        popen("php ".realpath(dirname(__FILE__))."/curl.php -ppost -p".$url." -p'".$postField."' -p".$contentType." -p".json_encode($header)."", "w");
    }
    
    public static function delete($url,$postField = "{}", $contentType = "application/json", $header = []) {
        if(is_array($postField)) $postField = json_encode($postField);
        popen("php ".realpath(dirname(__FILE__))."/curl.php -pdelete -p".$url." -p'".$postField."' -p".$contentType." -p".json_encode($header)."", "w");
    }
    
    public static function put($url,$postField = "{}", $contentType = "application/json", $header = []) {
        if(is_array($postField)) $postField = json_encode($postField);
        popen("php ".realpath(dirname(__FILE__))."/curl.php -pput -p".$url." -p'".$postField."' -p".$contentType." -p".json_encode($header)."", "w");
    }

}