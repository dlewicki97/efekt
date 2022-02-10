<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'form_validation', 'ftp', 'upload', 'session', 'encryption', 'cart', 'logs/logs');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'file', 'form', 'html', 'views', 'session', 'login', 'media', 'variables', 'headers', 'action', 'slug', 'default', 'webp', 'apigallery', 'photos', 'links/cms_button_link', 'jezyki', 'lang', 'pagination', 'ip/get_client_address_ip', 'uri/get_uri_segment');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('back_m', 'login_m', 'base_m');
