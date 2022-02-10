<?php
defined('BASEPATH') or exit('No direct script access allowed');
function setTableRecordsBack($redirect)
{
    $CI = &get_instance();
    if ($CI->session->userdata('lang') != 'pl') {
        if ($CI->db->table_exists($CI->session->userdata('lang') . '_' . $redirect[1])) {
            $table_records = $CI->back_m->get_all($CI->session->userdata('lang') . '_' . $redirect[1]);
        } else {
            $table_records = [];
        }
    } else {
        if ($CI->db->table_exists($redirect[1])) {
            $table_records = $CI->back_m->get_all($redirect[1]);
        } else $table_records = [];
    }
    return $table_records;
}
function redirectAfterLangChangeBack($redirect)
{
    $CI = &get_instance();
    $redirect = explode('_', $redirect);
    $url = '';
    $table_records = setTableRecordsBack($redirect);


    for ($i = 0; $i < count($redirect) - 1; $i++) {
        $url = $url . '/' . $redirect[$i];
    }
    if ($redirect[3] == 'update') {
        if ($redirect[4] > count($table_records)) {
            redirect('panel/' . $redirect[1]);
        } else {
            redirect($url);
        }
    } else {
        if ($redirect[1] != 'dashboard') redirect($url);
        else redirect('panel/' . $redirect[1]);
    }
}
function redirectAfterLangChange($redirect)
{
    $CI = &get_instance();
    $redirect = explode('_', $redirect);
    if ($redirect[0] != '' && $redirect[0] != 'kontakt') {
        $current_page = $CI->back_m->get_subpage_by_table_name($redirect[0]);
        $table_records = getCurrentRecords($current_page);
        $url = createRedirectUrl($redirect);

        if ($current_page->table_name == $redirect[0]) {
            if ($redirect[1] > count($table_records)) {
                redirect($current_page->table_name);
            } else {
                redirect($url);
            }
        } else {
            redirect($url);
        }
    } else {
        redirect($redirect[0]);
    }
}

function getCurrentRecords($current_page)
{
    $CI = &get_instance();
    $table_records = '';
    if ($CI->session->userdata('lang') != 'pl') {
        $table_records = $CI->back_m->get_all($CI->session->userdata('lang') . '_' . strtolower($current_page->table_name));
    } else {
        $table_records = $CI->back_m->get_all(strtolower($current_page->table_name));
    }
    return $table_records;
}

function getCurrentTable($redirect)
{
    $CI = &get_instance();
    if ($redirect[0] != '') {
        $table = $CI->back_m->get_subpage($redirect[0]);
        return $table->table_name;
    } else {
        return false;
    }
}

function createRedirectUrl($redirect)
{
    $CI = &get_instance();
    $url = '';
    if (getCurrentTable($redirect)) {
        $record = $CI->back_m->get_one(getCurrentTable($redirect), $redirect[1]);
        for ($i = 0; $i < count($redirect) - 1; $i++) {
            if ($i == 2) {
                $url = $url . '/' . slug($record->title);
            } else {
                $url = $url . '/' . $redirect[$i];
            }
        }
    } else {
        $url = '';
    }
    return $url;
}

function getTable(string $table): string
{
    $CI = &get_instance();

    if ($CI->session->userdata('lang') != 'pl' && !in_array($table, getForbiddenTables())) $table =  $CI->session->userdata('lang') . '_' . $table;
    return $table;
}


function getPrefixes()
{
    $CI = &get_instance();
    $jezyki = $CI->back_m->get_all('jezyki');
    $prefixes = [];
    foreach ($jezyki as $jezyk) $prefixes[] = $jezyk->prefix;

    return $prefixes;
}

function getForbiddenTables(): array
{
    return ['gallery', 'users', 'mails', 'media', 'jezyki', 'glowna', 'gallery_page', 'Gallery_page', 'example', 'logs'];
}

function getTranslatableTables(): array
{
    $CI = &get_instance();
    $tables = $CI->db->list_tables();
    $prefixes = getPrefixes();
    $validTables = [];
    for ($i = 0; $i < count($tables); $i++) {
        $table = $tables[$i];

        if (!in_array(explode('_', $table)[0], $prefixes)) {
            $forbiddenTables = getForbiddenTables();
            if (!in_array($table, $forbiddenTables)) {
                array_push($validTables, $table);
            }
        }
    }

    return $validTables;
}
