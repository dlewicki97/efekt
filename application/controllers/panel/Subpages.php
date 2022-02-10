<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subpages extends CI_Controller {

	public function index() {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
            // DEFAULT DATA
			$data = loadDefaultData();

			$data['subpages'] = $this->back_m->get_all('subpages');
			echo loadSubViewsBack('subpages', 'index', $data);
		} else {
			redirect('panel');
		}
	}

	public function form($type, $id = '') {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
            // DEFAULT DATA
			$data = loadDefaultData();
            // DEFAULT DATA
            if($type === 'update') {
			    $data['value'] = $this->back_m->get_one('subpages', $id);
				echo loadSubViewsBack('subpages', 'form', $data);
            }
			else
				redirect('panel/subpages');

		} else {
			redirect('panel');
		}
	} 

	public function action($type, $table, $id = '') {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {

			defaultFormAction($_POST, $table, $type, $id, TRUE);

			redirect('panel/'.$table);
		} else {
			redirect('panel');
		}
    }
}