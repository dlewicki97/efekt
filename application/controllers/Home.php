<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	// function test()
	// {
	// 	$rows = $this->back_m->get_all('vademecums');
	// 	foreach ($rows as $row) {

	// 		$this->back_m->update('vademecums', ['title' => 'Lorem Ipsum'], $row->id);
	// 	}
	// }

	function __construct()
	{
		parent::__construct();
		if (!$this->db->table_exists('users')) {
			$this->base_m->create_base();
		}
		if ($this->session->userdata('lang') == '') {
			$this->session->set_userdata('lang', 'pl');
		}
		$prefix = $this->session->userdata('lang');
		if ($prefix != 'pl') {
			if ($this->uri->segment(1) != $prefix) {
				$baseUrl = base_url();
				$actualLink = $this->config->item('actual_link');
				$uri = substr($_SERVER['REQUEST_URI'], 1);
				$newLink = $actualLink . $uri;
				$newLink = str_replace($baseUrl, "", $newLink);

				$newLink = explode('/', $newLink);

				if ($newLink[0] != $prefix) array_splice($newLink, 0, 0, $prefix);
				$newLink = implode('/', $newLink);
				redirect($newLink);
			}
		}
	}



	public function index()
	{
		$data = loadDefaultDataFront();
		$data['slider'] = $this->back_m->get_all('slider');
		$data['links_under_slider'] = $this->back_m->get_all('links_under_slider');
		$data['job_offers_desc'] = $this->back_m->get_one('job_offers_desc', 1);
		$data['job_offers'] = $this->back_m->get_where('job_offers', ['active' => 1, 'home' => 1]);
		$data['trusted_company'] = $this->back_m->get_all('trusted_company');
		$data['opinions_desc'] = $this->back_m->get_one('opinions_desc', 1);
		$data['opinions'] = $this->back_m->get_all('opinions');
		$data['german_employment'] = $this->back_m->get_one('german_employment', 1);
		$data['attributes'] = $this->back_m->get_all('attributes');
		$data['recruitment_steps'] = $this->back_m->get_all('recruitment_steps');
		$data['recruitment_desc'] = $this->back_m->get_one('recruitment_desc', 1);
		$data['coordinator_support_desc'] = $this->back_m->get_one('coordinator_support_desc', 1);
		$data['coordinator_support_tiles'] = $this->back_m->get_all('coordinator_support_tiles');
		$data['checked_offers'] = $this->back_m->get_one('checked_offers', 1);
		$data['hard_job_desc'] = $this->back_m->get_one('hard_job_desc', 1);
		$data['hard_job_dots'] = $this->back_m->get_all('hard_job_dots');
		$data['talk_with_coordinator'] = $this->back_m->get_one('talk_with_coordinator', 1);
		$data['our_social_media'] = $this->back_m->get_one('our_social_media', 1);
		$data['owl'] = true;

		$data['stylesheet'] = 'style';

		echo loadViewsFront('index', $data);
	}
	public function about()
	{
		$data = loadDefaultDataFront();
		$data['abouts'] = $this->back_m->get_all('abouts');
		$data['our_team_employee_groups'] = $this->back_m->get_all('our_team_employee_groups');
		$data['our_team_employees'] = $this->back_m->get_all('our_team_employees');
		$data['our_team_desc'] = $this->back_m->get_one('our_team_desc', 1);
		$data['references_list'] = $this->back_m->get_all('references_list');
		$data['references_desc'] = $this->back_m->get_one('references_desc', 1);
		$data['about_articles_desc'] = $this->back_m->get_one('about_articles_desc', 1);
		$data['articles'] = $this->back_m->get_all('articles');
		$data['contests_desc'] = $this->back_m->get_one('contests_desc', 1);
		$data['contests'] = $this->back_m->get_all('contests');

		$data['stylesheet'] = 'about';
		$data['owl'] = true;

		echo loadViewsFront('about', $data);
	}
	public function contest($id)
	{
		$data = loadDefaultDataFront();
		$data['contest'] = $this->back_m->get_one('contests', $id);
		$data['contests_desc'] = $this->back_m->get_one('contests_desc', 1);


		$data['banner_photo'] = $data['contest']->photo2;
		$data['banner_photo_alt'] = $data['contest']->alt2;
		$data['banner_title'] = $data['contest']->title;
		$data['meta_title'] = $data['contest']->title ?? "";
		$data['meta_description'] = $data['contest']->meta_description ?? "";
		$data['banner_mask_color'] = $data['contests_desc']->banner_mask_color ?? null;
		$data['banner_position'] = $data['contest']->banner_position ?? null;

		$data['stylesheet'] = 'contest';

		echo loadViewsFront('contest', $data);
	}
	public function article($id)
	{
		$data = loadDefaultDataFront();
		$data['article'] = $this->back_m->get_one('articles', $id);
		$data['about_articles_desc'] = $this->back_m->get_one('about_articles_desc', 1);

		$data['banner_photo'] = $data['article']->photo2;
		$data['banner_photo_alt'] = $data['article']->alt2;
		$data['banner_title'] = $data['article']->title;
		$data['meta_title'] = $data['article']->title ?? "";
		$data['meta_description'] = $data['article']->meta_description ?? "";
		$data['banner_mask_color'] = $data['about_articles_desc']->banner_mask_color ?? null;
		$data['banner_position'] = $data['article']->banner_position ?? null;

		$data['stylesheet'] = 'article';
		$data['back_button_name'] = $data['article']->back_button_name;

		echo loadViewsFront('article', $data);
	}
	public function job_offers($page = 0)
	{
		$perPage = 6;
		$data = loadDefaultDataFront();
		$data['job_offers'] = $this->back_m->get_pagination('job_offers', (($page = ($page - 1)) < 0 ? 0 : $page) * ($perPage), $perPage, ['field' => 'created', 'type' => 'desc'], ['active' => 1]);

		$data['job_offers_desc'] = $this->back_m->get_one('job_offers_desc', 1);

		$data['stylesheet'] = 'job_offers';

		$data['total_rows'] = $this->db->count_all('job_offers');

		paginate($perPage, $data['total_rows'], 'oferty');

		echo loadViewsFront('job_offers', $data);
	}
	public function blogs($page = 0)
	{
		$perPage = 6;
		$data = loadDefaultDataFront();
		$data['blogs'] = $this->back_m->get_pagination('blogs', (($page = ($page - 1)) < 0 ? 0 : $page) * ($perPage), $perPage, ['field' => 'created', 'type' => 'desc']);

		$data['blogs_desc'] = $this->back_m->get_one('blogs_desc', 1);

		$data['stylesheet'] = 'blogs';

		$data['total_rows'] = $this->db->count_all('blogs');

		paginate($perPage, $data['total_rows'], 'blog');

		echo loadViewsFront('blogs', $data);
	}

	public function job_offer($id)
	{
		$data = loadDefaultDataFront();
		$data['job_offer'] = $this->back_m->get_one('job_offers', $id);
		$data['job_offers_desc'] = $this->back_m->get_one('job_offers_desc', 1);

		$subpage = $this->back_m->get_where_row('subpages', ['page' => 'oferty']);

		$data['banner_photo'] = $subpage->photo;
		$data['banner_photo_alt'] = $subpage->alt;
		$data['banner_title'] = $subpage->title;
		$data['meta_title'] = $data['job_offer']->city ?? "";
		$data['meta_description'] = $data['job_offer']->meta_description ?? "";
		$data['banner_mask_color'] = $data['job_offers_desc']->banner_mask_color ?? null;
		$data['banner_position'] = $subpage->banner_position ?? null;

		$data['stylesheet'] = 'job_offers';

		echo loadViewsFront('job_offer', $data);
	}
	public function blog($id)
	{
		$data = loadDefaultDataFront();
		$data['blog'] = $this->back_m->get_one('blogs', $id);
		$data['blogs_desc'] = $this->back_m->get_one('blogs_desc', 1);

		$data['banner_photo'] = $data['blog']->photo2;
		$data['banner_photo_alt'] = $data['blog']->alt2;
		$data['banner_title'] = $data['blog']->title;
		$data['meta_title'] = $data['blog']->title ?? "";
		$data['meta_description'] = $data['blog']->meta_description ?? "";
		$data['banner_mask_color'] = $data['blogs_desc']->banner_mask_color ?? null;
		$data['banner_position'] = $data['blog']->banner_position ?? null;

		$data['stylesheet'] = 'blog';
		$data['created'] = $data['blog']->created;

		echo loadViewsFront('blog', $data);
	}
	public function bonus($id)
	{
		$data = loadDefaultDataFront();
		$data['bonus'] = $this->back_m->get_one('bonuses', $id);
		$data['bonuses_desc'] = $this->back_m->get_one('bonuses_desc', 1);


		$data['banner_photo'] = $data['bonus']->photo2;
		$data['banner_photo_alt'] = $data['bonus']->alt2;
		$data['banner_title'] = $data['bonus']->title;
		$data['meta_title'] = $data['bonus']->title ?? "";
		$data['meta_description'] = $data['bonus']->meta_description ?? "";
		$data['banner_mask_color'] = $data['bonuses_desc']->banner_mask_color ?? null;
		$data['banner_position'] = $data['bonus']->banner_position ?? null;

		$data['stylesheet'] = 'bonus';

		echo loadViewsFront('bonus', $data);
	}

	public function working_conditions()
	{
		$data = loadDefaultDataFront();
		$data['working_conditions'] = $this->back_m->get_all('working_conditions');
		$data['attributes'] = $this->back_m->get_all('attributes');
		$data['recruitment_steps'] = $this->back_m->get_all('recruitment_steps');
		$data['recruitment_desc'] = $this->back_m->get_one('recruitment_desc', 1);
		$data['bonuses_desc'] = $this->back_m->get_one('bonuses_desc', 1);
		$data['bonuses'] = $this->back_m->get_all('bonuses');

		$data['stylesheet'] = 'working-conditions';
		$data['owl'] = true;

		echo loadViewsFront('working_conditions', $data);
	}
	public function rodo()
	{
		$data = loadDefaultDataFront();
		$data['stylesheet'] = 'rodo';

		echo loadViewsFront('rodo', $data);
	}
	public function opinions()
	{
		$data = loadDefaultDataFront();
		$data['opinions'] = $this->back_m->get_all('opinions');
		$data['opinions_desc'] = $this->back_m->get_one('opinions_desc', 1);


		$data['stylesheet'] = 'opinions';
		$data['owl'] = true;

		echo loadViewsFront('opinions', $data);
	}
	public function vademecum()
	{
		$data = loadDefaultDataFront();
		$data['vademecums'] = $this->back_m->get_all('vademecums');
		$data['phrases'] = $this->back_m->get_all('phrases');
		$data['phrases_desc'] = $this->back_m->get_one('phrases_desc', 1);

		$data['stylesheet'] = 'vademecum';

		echo loadViewsFront('vademecum', $data);
	}

	public function contact()
	{
		$data = loadDefaultDataFront();
		$data['contact_desc'] = $this->back_m->get_one('contact_desc', 1);
		$data['our_team_employee_groups'] = $this->back_m->get_all('our_team_employee_groups');
		$data['our_team_employees'] = $this->back_m->get_all('our_team_employees');
		$data['our_team_desc'] = $this->back_m->get_one('our_team_desc', 1);
		$data['coordinator_support_desc'] = $this->back_m->get_one('coordinator_support_desc', 1);
		$data['coordinator_support_tiles'] = $this->back_m->get_all('coordinator_support_tiles');

		$data['stylesheet'] = 'contact';
		$data['owl'] = true;

		echo loadViewsFront('contact', $data);
	}
}
