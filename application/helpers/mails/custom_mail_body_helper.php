<?php
defined('BASEPATH') or exit('No direct script access allowed');

function customMailBody(array $data, string $subject): string
{
    $CI = &get_instance();
    $inputs = $CI->back_m->get_where_order('inputs', ['active' => 1], ['field' => 'order_number', 'type' => 'asc']);

    $template = "<h3>$subject {$data['base_url']}</h3>
    <h3 style=\"font-weight: bold;\">Dane kontaktowe:</h3>
    <p>Imię i nazwisko: {$data['name']}</p>
    <p>Numer telefonu: {$data['phone']}</p>
    <p>Temat: {$data['subject']}</p>";
    $fields = json_decode($data['fields'], true);

    foreach (array_filter($fields, function ($value, $key) {
        return !in_array($key, ['base_url', 'token', 'rodo1', 'rodo2', 'message', 'email', 'first_name', 'last_name', 'phone', 'subject']);
    }, ARRAY_FILTER_USE_BOTH) as $key => $value) {
        $id = preg_replace('/(.*)-/i', '', $key);
        $input = array_values(array_filter($inputs, function ($i) use ($id) {
            return $i->id == $id;
        }));
        $input = end($input);

        $template .= "<p>$input->title: $value</p>";
    }

    return $template;
}
