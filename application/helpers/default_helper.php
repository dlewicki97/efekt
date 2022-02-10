<?php
defined('BASEPATH') or exit('No direct script access allowed');

function loadDefaultData()
{
	$CI = &get_instance();
	$data['mails'] = $CI->back_m->get_all('mails');
	$data['user'] = $CI->back_m->get_one('users', $_SESSION['id']);
	$data['media'] = $CI->back_m->get_all('media');
	$data['settings'] = $CI->back_m->get_one('settings', 1);
	$data['contact'] = $CI->back_m->get_one('contact_settings', 1);
	$data['api_gallery'] = apiGalleryRows();
	$data['title'] = title($CI->uri->segment(2));
	$data['page_link'] = page_link($CI->uri->segment(2));
	$data['tiny'] = $CI->config->item('tiny');
	$data['jezyki'] = $CI->back_m->get_all('jezyki');

	return $data;
}

function loadDefaultDataFront()
{
	$CI = &get_instance();
	$data['settings'] = $CI->back_m->get_one('settings', 1);
	$data['subpages'] = $CI->back_m->get_all('subpages');
	$data['colors'] = $CI->back_m->get_one('colors', 1);
	$data['footer_links'] = $CI->back_m->get_with_limit('subpages', 4);
	$data['current_subpage'] = getCurrentSubpage();
	$data['contact_settings'] = $CI->back_m->get_one('contact_settings', 1);
	$data['form_desc'] = $CI->back_m->get_one('form_desc', 1);
	$data['mails_today'] = count($CI->back_m->get_like('mails', 'created', date('Y-m-d'))) + 1;
	$data['header_desc'] = $CI->back_m->get_one('header_desc', 1);
	$data['call_box_desc'] = $CI->back_m->get_one('call_box_desc', 1);
	$data['footer_links_1'] = $CI->back_m->get_all('footer_links_1');
	$data['footer_links_2'] = $CI->back_m->get_all('footer_links_2');
	$data['footer_links_3'] = $CI->back_m->get_all('footer_links_3');
	$data['footer_buttons'] = $CI->back_m->get_all('footer_buttons');
	$data['inputs'] = $CI->back_m->get_where_order('inputs', ['active' => 1], ['field' => 'order_number', 'type' => 'asc']);

	$data['meta_title'] = $data['current_subpage']->title ?? "";
	$data['meta_description'] = $data['current_subpage']->meta_description ?? "";
	$data['banner_photo'] = $data['current_subpage']->photo ?? "";
	$data['banner_photo_alt'] = $data['current_subpage']->alt ?? "";
	$data['banner_title'] = $data['current_subpage']->title ?? "";
	$data['banner_mask_color'] = $data['current_subpage']->banner_mask_color ?? null;
	$data['banner_position'] = $data['current_subpage']->banner_position ?? null;

	$data['stylesheet'] = '';
	$data['back_button_name'] = "";
	$data['created'] = "";
	$data['owl'] = false;
	$data['captcha'] = '6LcRKJkdAAAAAFyP1TDdvEMI2jIzxbYVl5sWpF3O';


	return $data;
}

function assets($link = "")
{
	return base_url("assets/front/$link");
}


function uploads($file)
{
	return base_url("uploads/$file");
}

function getCurrentSubpage()
{
	$CI = &get_instance();

	if (getUriSegment(1) == '') {
		$current_subpage = $CI->back_m->get_one('subpages', 1);
	} else {
		$current_subpage = $CI->back_m->get_subpage(getUriSegment(1));
	}
	return $current_subpage;
}

function checkBanner($page)
{
	$CI = &get_instance();

	if (isset($page->is_banner) && $page->is_banner == 1) {
		$data[] = $page;
		changePhotoKey($data, 'photo', 'photo_webp');
		$banner = $data[0];
		// var_dump($banner);
		// die();
		return $banner;
	} else {
		return '';
	}
}

function checkIsRowActive(object $object, string $field = 'active', $expectedValue = 1)
{
	$CI = &get_instance();

	if ($object->$field === (string)$expectedValue) {
		return true;
	} else {
		show_404();
	}
}
