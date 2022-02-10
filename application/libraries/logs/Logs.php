<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logs
{

    protected $table = "logs";
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('base_m');
        $this->CI->load->helper('ip/get_client_address_ip');
        if (!$this->CI->db->table_exists($this->table)) $this->CI->base_m->create_logs_table();
    }

    public function save(array $data = []): void
    {
        $data = $this->prepareData($data);

        $this->CI->db->insert($this->table, $data);
    }

    private function prepareData(array $data): array
    {
        return array_merge([
            "ip" => getClientAddressIp(),
            "browser" => json_encode(get_browser()),
            "link" => $_SERVER['HTTP_REFERER'],
            "user_data" => $this->getLoggedUserData(),
            'value_after' => "",
            'value_before' => "",
            "message" => "",
            "table_name" => "",
        ], $data);
    }

    private function getLoggedUserData(): string
    {
        return isset($_SESSION['id']) ? json_encode($this->CI->back_m->get_one('users', $_SESSION['id'])) : "unlogged_user";
    }
}
