<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lang extends CI_Controller
{
    public function set_lang($lang)
    {
        $oldLang = $this->session->userdata('lang');

        $this->session->set_userdata('lang', $lang);

        $referer = $_SERVER['HTTP_REFERER'];
        if ($lang == 'pl') $referer = str_replace("$oldLang/", '', $referer);
        redirect($referer);
    }
}
