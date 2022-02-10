<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opinions_desc extends CI_Controller
{
	protected $singleRow = true;
	protected $title = "Opinie opisy";

	public function index()
	{
		if (checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			if ($this->singleRow) redirect("panel/{$this->uri->segment(2)}/form/update/1");
			$table = $this->uri->segment(2);

			if (!$this->db->table_exists($table)) {
				$this->base_m->create_table($table);
			}
			// DEFAULT DATA
			$data = loadDefaultData();
			$data['title'] = $this->title;

			$data['rows'] = $this->back_m->get_all($table);

			echo loadSubViewsBack($table, 'index', $data);
		} else {
			redirect('panel');
		}
	}

	public function form($type, $id = '')
	{
		if (checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			$table = $this->uri->segment(2);

			// DEFAULT DATA
			$data = loadDefaultData();
			$data['title'] = $this->title;

			if ($id != '') {
				$data['value'] = $this->back_m->get_one($table, $id);
			}
			echo loadSubViewsBack($table, 'form', $data);
		} else {
			redirect('panel');
		}
	}

	public function action($type, $table, $id = '')
	{
		if (checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {

			defaultFormAction($_POST, $table, $type, $id, TRUE);

			redirect('panel/' . $table);
		} else {
			redirect('panel');
		}
	}
}
