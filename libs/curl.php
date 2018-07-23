<?php 
class Curl { 
    var $headers; 
    var $user_agent;
    function __construct() { 
        $this->headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg'; 
        $this->headers[] = 'Connection: Keep-Alive'; 
        $this->headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
        $this->user_agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36';
    }
    function getCurl($url) { 
        $process = curl_init($url); 
        curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers); 
        curl_setopt($process, CURLOPT_HEADER, 0); 
        curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($process, CURLOPT_TIMEOUT, 30); 
        curl_setopt($process, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($process, CURLOPT_FOLLOWLOCATION, true); 
        curl_setopt($process, CURLOPT_ENCODING , ''); 
        $return = curl_exec($process); 
        curl_close($process); 
        return $return; 
    } 
    function postCrul($url, $data) { 
        $process = curl_init($url); 
        curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers); 
        curl_setopt($process, CURLOPT_HEADER, 1); 
        curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($process, CURLOPT_TIMEOUT, 30); 
        curl_setopt($process, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($process, CURLOPT_POST, 1);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($process, CURLOPT_FOLLOWLOCATION, true); 
        curl_setopt($process, CURLOPT_ENCODING , ''); 
        $return = curl_exec($process); 
        curl_close($process); 
        return $return; 
    }
}
?> 