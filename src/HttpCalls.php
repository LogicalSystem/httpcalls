<?php

namespace LogicalSystem\HttpCalls;

class HttpCalls {

    public static function get($url, $header = []) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if(!empty($header)) {$headers = [];
            if(!empty($header)) {
                foreach ($header as $value) {
                    $headers[] = $value;
                }
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $data = curl_exec($ch);
        curl_close($ch); 
        return $data;
    }



    public static function post($url,$postField = "{}", $contentType = "application/json", $header = [], $full = false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = [];
        if(!empty($header)) {
            foreach ($header as $value) {
                $headers[] = $value;
            }
        }

        if(is_null($contentType)) $contentType = "application/json";

        switch ($contentType) {
            case 'application/json':
                $headers[] = "Content-Type: application/json";
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                if($postField == "") $postField = "{}";
                if(is_array($postField)) $postField = json_encode($postField);
                break;

            case 'multipart/form-data':
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                break;
            
            default:
                $headers[] = "Content-Type: ".$contentType;
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                break;
        }
        if(json_last_error() === JSON_ERROR_NONE) {
            curl_setopt($ch, CURLOPT_POSTFIELDS,$postField);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            if($full) curl_setopt($ch, CURLOPT_HEADER, 1);
            $data = curl_exec($ch);
            if($full) {
                // Then, after your curl_exec call:
                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $header = substr($data, 0, $header_size);
                $body = substr($data, $header_size);
            }
            curl_close($ch); 
            if($full) {
                return ["header" => $header, "body" => $body];
            } else {
                return $data;
            }
        } else {
            return false;
        }    
    }







    public static function delete($url, $postField = "{}", $contentType = "application/json", $header = [], $full = false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

        $headers = [];
        if(!empty($header)) {
            foreach ($header as $value) {
                $headers[] = $value;
            }
        }

        if(is_null($contentType)) $contentType = "application/json";

        switch ($contentType) {
            case 'application/json':
                $headers[] = "Content-Type: application/json";
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                if($postField == "") $postField = "{}";
                if(is_array($postField)) $postField = json_encode($postField);
                break;
            
            default:
                $headers[] = "Content-Type: ".$contentType;
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                break;
        }

        if(json_last_error() === JSON_ERROR_NONE) {
            curl_setopt($ch, CURLOPT_POSTFIELDS,$postField);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            if($full) curl_setopt($ch, CURLOPT_HEADER, 1);
            $data = curl_exec($ch);
            if($full) {
                // Then, after your curl_exec call:
                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $header = substr($data, 0, $header_size);
                $body = substr($data, $header_size);
            }
            curl_close($ch); 
            if($full) {
                return ["header" => $header, "body" => $body];
            }else return $data;
        } else { 
            return false;
        }
    }


    public static function put($url, $postField = "{}", $contentType = "application/json", $header = [], $full = false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        $headers = [];
        if(!empty($header)) {
            foreach ($header as $value) {
                $headers[] = $value;
            }
        }

        if(is_null($contentType)) $contentType = "application/json";

        switch ($contentType) {
            case 'application/json':
                $headers[] = "Content-Type: application/json";
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                if($postField == "") $postField = "{}";
                if(is_array($postField)) $postField = json_encode($postField);
                break;
            
            default:
                $headers[] = "Content-Type: ".$contentType;
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                break;
        }

        if(json_last_error() === JSON_ERROR_NONE) {
            curl_setopt($ch, CURLOPT_POSTFIELDS,$postField);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            if($full) curl_setopt($ch, CURLOPT_HEADER, 1);
            $data = curl_exec($ch);
            if($full) {
                // Then, after your curl_exec call:
                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $header = substr($data, 0, $header_size);
                $body = substr($data, $header_size);
            }
            curl_close($ch); 
            if($full) {
                return ["header" => $header, "body" => $body];
            }else return $data;
        } else {
            return false;
        }
    }


}







?>