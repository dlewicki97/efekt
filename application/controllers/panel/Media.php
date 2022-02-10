<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public function index() {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			if (!$this->db->table_exists($this->uri->segment(2))){
				$this->base_m->create_table($this->uri->segment(2));
			}
            // DEFAULT DATA
			$data = loadDefaultData();

			$data['rows'] = $this->back_m->get_all($this->uri->segment(2));
			echo loadSubViewsBack($this->uri->segment(2), 'index', $data);
		} else {
			redirect('panel');
		}
	}

	public function form($type, $id = '') {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
            // DEFAULT DATA
			$data = loadDefaultData();

            if($id != '') {
			    $data['value'] = $this->back_m->get_one($this->uri->segment(2), $id);
            }
			echo loadSubViewsBack($this->uri->segment(2), $type, $data);
		} else {
			redirect('panel');
		}
	} 

	public function action($type, $table, $id = '') {
		if(checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			$now = date('Y-m-d');
			initializeDefaultUpload();
			
			foreach ($_POST as $key => $value) {

				if (!$this->db->field_exists($key, $table)) {
					$this->base_m->create_column($table, $key);
				}

				if($key == 'name_file_1') {
					if ($this->upload->do_upload('file_1')) {
						$data = $this->upload->data();
						$str = $data['file_type'];
						$pattern = "/^image/i";
						$result = preg_match($pattern, $str);
						if ($result == 1 && $data['file_type'] != 'image/svg' && isOnWebp()) {
							//WebP Converter
							$photoWebP = convertImageToWebP($now . '/' . $data['file_name']);
							$keyFieldPhotoWebP = 'photo_webp';
							if ($photoWebP[0] == true) {
								$data[$keyFieldPhotoWebP] = $now . '/' . $photoWebP[1];
								createWebPField($table, $keyFieldPhotoWebP);

								// $path = './uploads/'.$now .'/'.$photoWebP[1];
								// $info = get_file_info($path);
								// $data['file_name'] = $info['name']; 
								// $data['file_type'] = get_mime_by_extension('.webp');   
								// $data['file_size'] = round($info['size']/1024, 2);   
							} else {
								$this->session->set_flashdata('flashdata', 'Zdjęcie nie zostało poprawnie zoptymalizowane!');
							}
							//WebP Converter
						}   
						addMedia($data);
					}
				}
            }
            
			redirect('panel/'.$table);
		} else {
			redirect('panel');
		}
    }
}