<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function subtitle() {
    return  'Mały panel do robienia wielkich rzeczy';
}

// function isOnWebp() {
//     return  false;
// }

function setLang($lang)
{
    $CI = &get_instance();
    $CI->session->set_userdata('lang', $lang);
}

function titleLength()
{
    return 30;
}