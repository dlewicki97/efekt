<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function headers($subpage) {
    $headers = array(
        'about' => array(
            'title' => 'O nas - Historia', 
            'link' => '#'
        ),
        'brand_values' => array(
            'title' => 'Opis firmy - Strona główna', 
            'link' => '#'
        ),
        'dashboard' => array(
            'title' => 'Dashboard', 
            'link' => '#'
        ),
        'financing_tiles' => array(
            'title' => 'Finansowanie', 
            'link' => '#'
        ),
        'insurances' => array(
            'title' => 'Ubezpieczenia', 
            'link' => '#'
        ),
        
        'job_offers' => array(
            'title' => 'Oferty pracy', 
            'link' => '#'
        ),
        'mails' => array(
            'title' => 'Wiadomości', 
            'link' => '#'
        ),
        'media' => array(
            'title' => 'Media', 
            'link' => '#'
        ),
        'news' => array(
            'title' => 'Aktualności', 
            'link' => 'aktualnosci'
        ),
        'profile' => array(
            'title' => 'Profil', 
            'link' => '#'
        ),
        'service_branches' => array(
            'title' => 'Usługi', 
            'link' => '#'
        ),
        'service_stations_home' => array(
            'title' => 'Stanowiska serwisowe - Strona główna', 
            'link' => '#'
        ),
        'subpages' => array(
            'title' => 'Podstrony', 
            'link' => '#'
        ),
        'slider' => array(
            'title' => 'Slider', 
            'link' => '#'
        ),
    );
    if(array_key_exists($subpage, $headers))
        $result = $headers[$subpage];
       
    else
        $result = null;
    
    return $result;
}

function title($subpage){
    $result = headers($subpage);
    if($result != null && array_key_exists('title', $result))
        return $result['title'];
    else
        return $subpage;
    
}

function page_link($subpage){
    $result = headers($subpage);
    if($result != null && array_key_exists('link', $result))
        return $result['link'];

    else
        return '#';

}
