<?php
defined('BASEPATH') or exit('No direct script access allowed');

function paginate($perPage, $total_rows, $link)
{
    $CI = &get_instance();

    $CI->load->library('pagination');
    $config['base_url'] = base_url($link);
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $perPage;
    $config['use_page_numbers'] = TRUE;
    $config['cur_tag_open'] = '<div class="item active">';
    $config['cur_tag_close'] = '</div>';
    $config['num_tag_open'] = '<div class="item">';
    $config['num_tag_close'] = '</div>';
    $config['next_link'] = '<div class="item arrow">&gt;</div>';
    $config['prev_link'] = '<div class="item arrow">&lt;</div>';
    $config['first_link'] = '<div class="item arrow">&lt;&lt;</div>';
    $config['last_link'] = '<div class="item arrow">&gt;&gt;</div>';
    $CI->pagination->initialize($config);
}
