<?php
defined('BASEPATH') or exit('No direct script access allowed');

function verifyCaptcha($token)
{
    $ip = getClientAddressIp();
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => '6LcRKJkdAAAAAFiDMEPJSZYnQwVtVJ7AhImq0zQr',
        'response' => $token,
        'remoteip' => $ip,
    ];

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    $res = json_decode($response);

    return $res;
}
