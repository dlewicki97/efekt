<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="page-item active" aria-current="page">';
$config['cur_tag_close'] = '</li>';
$config['prev_link'] = '<i class="fas fa-chevron-left fa-xs"></i>';
$config['next_link'] = '<i class="fas fa-chevron-right fa-xs"></i>';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';
$config['num_links'] = 3;
$config['first_tag_open'] = '<li class="page-item">';
$config['first_link'] = '<i class="fas fa-angle-double-left fa-xs"></i>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_link'] = '<i class="fas fa-angle-double-right fa-xs"></i>';
$config['last_tag_close'] = '</li>';
$sort['column'] = 'created';
$sort['order'] = 'desc';
$config["base_url"] = base_url() . "aktualnosci";
$config["per_page"] = 10;

$config['use_page_numbers'] = TRUE;
