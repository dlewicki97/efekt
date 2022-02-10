<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


$route['o-nas'] = 'home/about';
$route['set_lang/(.*)'] = 'lang/set_lang/$1';

$route['kontakt'] = 'home/contact';
$route['rodo'] = 'home/rodo';
$route['opinie'] = 'home/opinions';
$route['vademecum-opiekunki'] = 'home/vademecum';
$route['warunki-pracy'] = 'home/working_conditions';
$route['blog/(.*)/(.*)'] = 'home/blog/$2';
$route['blog'] = 'home/blogs';
$route['blog/(.*)'] = 'home/blogs/$1';
$route['oferty'] = 'home/job_offers';
$route['oferty/(.*)'] = 'home/job_offers/$1';
$route['oferta/(.*)/(.*)'] = 'home/job_offer/$2';
$route['premia/(.*)/(.*)'] = 'home/bonus/$2';

$route['aktualnosci/(.*)/(.+)'] = 'home/article/$2';
$route['konkurs/(.*)/(.+)'] = 'home/contest/$2';
$route['wpis/(.*)/(.+)'] = 'home/article/$1/$2';

foreach (['de'] as $prefix) {
    $route[$prefix] = 'home/index';
    $prefix .= "/";

    $route[$prefix . 'o-nas'] = 'home/about';
    $route[$prefix . 'set_lang/(.*)'] = 'lang/set_lang/$1';

    $route[$prefix . 'kontakt'] = 'home/contact';
    $route[$prefix . 'rodo'] = 'home/rodo';
    $route[$prefix . 'opinie'] = 'home/opinions';
    $route[$prefix . 'vademecum-opiekunki'] = 'home/vademecum';
    $route[$prefix . 'warunki-pracy'] = 'home/working_conditions';
    $route[$prefix . 'blog/(.*)/(.*)'] = 'home/blog/$2';
    $route[$prefix . 'blog'] = 'home/blogs';
    $route[$prefix . 'blog/(.*)'] = 'home/blogs/$1';
    $route[$prefix . 'oferty'] = 'home/job_offers';
    $route[$prefix . 'oferty/(.*)'] = 'home/job_offers/$1';
    $route[$prefix . 'oferta/(.*)/(.*)'] = 'home/job_offer/$2';
    $route[$prefix . 'premia/(.*)/(.*)'] = 'home/bonus/$2';

    $route[$prefix . 'aktualnosci/(.*)/(.+)'] = 'home/article/$2';
    $route[$prefix . 'konkurs/(.*)/(.+)'] = 'home/contest/$2';
    $route[$prefix . 'wpis/(.*)/(.+)'] = 'home/article/$1/$2';
}


//SCIAGA
// $route['odziez/(.*)/(.+)'] = 'home/odziez/$1/$2';
// $route['obuwie/(.*)/(.+)'] = 'home/obuwie/$1/$2';
// $route['akcesoria/(.*)/(.+)'] = 'home/akcesoria/$1/$2';
// $route['kolekcje/(.*)/(.+)'] = 'home/kolekcje/$1/$2';
// $route['gazetka/(.*)/(.+)'] = 'home/gazetka/$1/$2';
// $route['produkt/(.*)/(.+)'] = 'home/produkt/$1/$2';
// $route['o_nas'] = 'home/o_nas';
// $route['wydarzenia'] = 'home/wydarzenia';
// $route['wpis'] = 'home/wpis';
// $route['aktualnosci'] = 'p/aktualnosci';
// $route['uzywane_podglad/(.*)/(.+)'] = 'p/uzywane_podglad/$1/$2';
// $route['promocje'] = 'p/promocje';
// $route['promocja/(.*)/(.+)'] = 'p/promocja/$1/$2';
// $route['uslugi'] = 'p/uslugi';
// $route['usluga/(.*)/(.+)'] = 'p/usluga/$1/$2';
// $route['o-nas/(.*)/(.+)'] = 'p/o_nas/$1/$2';
// $route['kontakt/(.*)/(.+)'] = 'p/kontakt/$1/$2';
// $route['media'] = 'p/media';
// $route['nowe/(.*)/(.+)'] = 'p/nowe/$1/$2';
// $route['nowe'] = 'p/nowe';
// $route['akcesoria/(.*)'] = 'p/akcesoria/$1';