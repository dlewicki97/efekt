<?php
defined('BASEPATH') or exit('No direct script access allowed');
function defaultFormAction($post, $table, $type, $id, bool $photo = FALSE)
{

    $CI = &get_instance();
    $settings = $CI->back_m->get_one('settings', 1);
    $now = date('Y-m-d');
    if ($photo  == TRUE) {
        initializeDefaultUpload();
    }

    $photos = $settings->modal_photos;

    for ($i = 1; $i < $photos + 1; $i++) {
        $photoKey = "photo" . ($i == 1 ? "" : $i);
        $photoWebpKey = "photo_webp" . ($i == 1 ? "" : $i);
        if (!$CI->db->field_exists($photoKey, getTable($table))) {
            $CI->base_m->create_column(getTable($table), $photoKey);
        }
        if (!$CI->db->field_exists($photoWebpKey, getTable($table))) {
            $CI->base_m->create_column(getTable($table), $photoWebpKey);
        }
        if (!$CI->db->field_exists('file_1', getTable($table))) {
            $CI->base_m->create_column(getTable($table), 'file_1');
        }
    }

    foreach ($post as $key => $value) {

        if (!$CI->db->field_exists($key, getTable($table))) {
            $CI->base_m->create_column(getTable($table), $key);
        }
        if ($key == 'name_file_1') {
            if ($CI->upload->do_upload('file_1')) {
                $data = $CI->upload->data();
                $str = $data['file_type'];
                $pattern = "/^image/i";
                $insert['file_1'] = $now . '/' . $data['file_name'];
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
                        $CI->session->set_flashdata('flashdata', 'Zdjęcie nie zostało poprawnie zoptymalizowane!');
                    }
                    //WebP Converter
                }
                addMedia($data);
            }
        }
        for ($i = 1; $i < $photos + 1; $i++) {
            $photoKey = "photo" . ($i == 1 ? "" : $i);
            $photoWebpKey = "photo_webp" . ($i == 1 ? "" : $i);



            if ($key == "name_photo_$i") {

                if ($CI->upload->do_upload("photo_$i")) {
                    $data = $CI->upload->data();
                    $insert[$photoKey] = $now . '/' . $data['file_name'];

                    if ($data['image_width'] > 1440) {
                        resizeImg($data['file_name'], $now, '1440');
                    }
                    if ($data['file_type'] != 'image/svg' && $data['file_type'] != 'image/svg+xml' && isOnWebp()) {
                        $photoWebP = convertImageToWebP($insert[$photoKey]);
                        $keyFieldPhotoWebP = $photoWebpKey;
                        if ($photoWebP[0] == true) {
                            $insert[$keyFieldPhotoWebP] = $now . '/' . $photoWebP[1];
                            $data[$keyFieldPhotoWebP] =   $insert[$keyFieldPhotoWebP];
                            createWebPField($table, $keyFieldPhotoWebP);
                        } else {
                            $CI->session->set_flashdata('flashdata', 'Zdjęcie nie zostało poprawnie zoptymalizowane!');
                        }
                    }
                    addMedia($data);
                } elseif ($value == 'usunięte') {
                    $insert[$photoKey] = '';
                    $insert[$photoWebpKey] = '';
                }
            }
            if ($key == "server_photo_$i") {
                if ($value != '') {
                    $insert[$photoKey] = $value;
                    $source =  __DIR__ . '/../../uploads/' . $value;
                    $ext = pathinfo($source);
                    $destination = str_replace($ext['extension'], 'webp', $value);
                    $insert[$photoWebpKey] = $destination;
                }
                if ($value == 'usunięte') {
                    $insert[$photoKey] = '';
                    $insert[$photoWebpKey] = '';
                }
            }
            if (!in_array($key, ["server_photo_$i", "name_photo_$i"])) $insert[$key] = $value;
        }
    }



    if ($type == 'insert') {
        $CI->back_m->insert($table, $insert);
        $CI->session->set_flashdata('flashdata', $message = 'Rekord został dodany!');
    } else {
        $CI->back_m->update($table, $insert, $id);
        $CI->session->set_flashdata('flashdata', $message = 'Rekord został zaktualizowany!');
    }
}

function initializeDefaultUpload()
{
    $CI = &get_instance();
    $now = date('Y-m-d');
    if (!is_dir('uploads/' . $now)) {
        mkdir('./uploads/' . $now, 0777, TRUE);
    }
    $config['upload_path'] = './uploads/' . $now;
    $config['allowed_types'] = '*';
    $config['max_size'] = 0;
    $config['max_width'] = 0;
    $config['max_height'] = 0;
    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);
}
