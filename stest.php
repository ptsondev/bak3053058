<?php
echo '<pre>';
var_dump($_SERVER);die;





 function getPhoneNumber ()  {
     $arr=array(
        'X-MSISDN',
        'X_MSISDN',
        'HTTP-X-MSISDN',
        'HTTP_X_MSISDN',
        'X-UP-CALLING-LINE-ID',
        'X_UP_CALLING_LINE_ID',
        'HTTP_X_UP_CALLING_LINE_ID',
        'X_WAP_NETWORK_CLIENT_MSISDN',
        'X-Forwarded-For',
        'Proxy-Client-IP',
        'WL-Proxy-Client-IP',
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'x-real-ip',
        'HTTP_X_UP_CALLING_LINE_ID',
        'HTTP_MSISDN',
        'MSISDN',
        'User-Identity-Forward-msisdn',
        'HTTP_X_MSISDN',
        'HTTP_X_NOKIA_MSISDN',
        'HTTP_X_UP_SUBNO',
        'HTTP_X_NETWORK_INFO',
        'DEVICEID',    
    );
     
     foreach($arr as $item){
         if (isset($_SERVER[$item]) && !empty($_SERVER[$item])){
             return $_SERVER[$item];
         }
     }    
     return '';
}

$t = getPhoneNumber();
var_dump($t);