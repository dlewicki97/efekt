<?php
defined('BASEPATH') or exit('No direct script access allowed');

function fillRecords($insert)
{
    $tables = getTranslatableTables();
    foreach ($tables as $table) {
        fill($insert, $table);
    }
    fillGalleries($insert);
}

function fill($insert, $table)
{
    $CI = &get_instance();
    if (!$CI->db->table_exists($table)) return;

    if (isset($insert['tables'])) {
        $data = $CI->back_m->get_all($table);
        $columns = $CI->db->list_fields($table);
        foreach ($data as $row) {
            $row = get_object_vars($row);
            foreach ($columns as $column) {
                $data_insert[$column] = $row[$column];
            }
            if (count($CI->back_m->get_all($insert['prefix'] . '_' . $table)) < count($data)) {
                $CI->back_m->insert($insert['prefix'] . '_' . $table, $data_insert);
            }
        }
    }
}

function fillGalleries($insert)
{
    $CI = &get_instance();
    $gallery = $CI->back_m->get_all('gallery');
    foreach ($gallery as $photo) {
        if ($photo->table_name !== 'gallery_page') {
            $CI->back_m->insert('gallery', ['item_id' => $photo->item_id, 'table_name' => $insert['prefix'] . '_' . $photo->table_name, 'photo' => $photo->photo, 'alt' => $photo->alt]);
        }
    }
}
