<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jezyki extends CI_Controller
{

	public function index()
	{
		if (checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			if (!$this->db->table_exists($this->uri->segment(2))) {
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

	public function form($type, $id = '')
	{
		if (checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			// DEFAULT DATA
			$data = loadDefaultData();

			if ($id != '') {
				$data['value'] = $this->back_m->get_one($this->uri->segment(2), $id);
			}
			$data['tables'] = getTranslatableTables();
			echo loadSubViewsBack($this->uri->segment(2), 'form', $data);
		} else {
			redirect('panel');
		}
	}


	public function action($type, $table, $id = '')
	{
		if (checkAccess($access_group = ['administrator', 'redaktor'], $_SESSION['rola'])) {
			$now = date('Y-m-d');
			$CI = &get_instance();
			if (!is_dir('uploads/' . $now)) {
				mkdir('./uploads/' . $now, 0777, TRUE);
			}
			$config['upload_path'] = './uploads/' . $now;
			$config['allowed_types'] = '*';
			$config['max_size'] = 0;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			foreach ($_POST as $key => $value) {

				if (!$this->db->field_exists($key, $table)) {
					$this->base_m->create_column($table, $key);
				}

				if (!$this->db->field_exists('photo2', $table)) {
					$this->base_m->create_column($table, 'photo2');
				}

				if ($key == 'name_photo_1') {
					if ($this->upload->do_upload('photo_1')) {
						$data = $this->upload->data();
						$insert['photo'] = $now . '/' . $data['file_name'];
						if ($data['image_width'] > 1440) {
							resizeImg($data['file_name'], $now, '1440');
						}
						if ($data['file_type'] != 'image/svg+xml' && isOnWebp()) {
							//WebP Converter
							$photoWebP = convertImageToWebP($insert['photo']);
							$keyFieldPhotoWebP = 'photo_webp';
							if ($photoWebP[0] == true) {
								$insert[$keyFieldPhotoWebP] = $now . '/' . $photoWebP[1];
								createWebPField($table, $keyFieldPhotoWebP);
							} else {
								$CI->session->set_flashdata('flashdata', 'Zdjęcie nie zostało poprawnie zoptymalizowane!');
							}
							//WebP Converter
						}
						addMedia($data);
					} elseif ($value == 'usunięte') {
						$insert['photo'] = '';
					}
				} else if ($key == 'server_photo_1') {
					if ($value != '') {
						$insert['photo'] = $value;
					}
					if ($value == 'usunięte') {
						$insert['photo'] = '';
					}
				} else if ($key == 'server_photo_2') {
					if ($value != '') {
						$insert['photo2'] = $value;
					}
					if ($value == 'usunięte') {
						$insert['photo2'] = '';
					}
				} else {
					$insert[$key] = $value;
				}
			}
			foreach ($_POST as $key => $value) {
				if (in_array($key, $this->db->list_tables())) {
					$new_table = $insert['prefix'] . '_' . $key;
					if (!$this->db->table_exists($new_table)) {
						$this->base_m->copy_table($key, $new_table);
					}
					$insert[$key] = $value;

					if ($value != '') {
						if (!$this->db->field_exists('tables', $table)) {
							$this->base_m->create_column($table, 'tables');
						}
						$insert['tables'] = @$insert['tables'] . 'o|o' . $key . 'o|o';
					}
				}
			}

			fillRecords($insert);
			if ($type == 'insert') {

				$this->back_m->insert($table, $insert);
				$this->session->set_flashdata('flashdata', 'Rekord został dodany!');
			} else {
				$this->back_m->update($table, $insert, $id);
				$this->session->set_flashdata('flashdata', 'Rekord został zaktualizowany!');
			}
			redirect('panel/' . $table);
		} else {
			redirect('panel');
		}
	}
}
