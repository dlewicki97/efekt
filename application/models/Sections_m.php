<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections_m extends CI_Model  
{
    public function get_all($table) {
        $query = $this->db->get(getTable($table));
        return $query->result();
    }
    // public function get_all_const($table) {
    //     $query = $this->db->get($table);
    //     return $query->result();
    // }
    public function get_active($table)
    {
        $this->db->where(['active' => 1]);
        $query = $this->db->get(getTable($table));
        return $query->result();
    }

    public function get_with_limit($table,$limit,$sort = null) {
        $this->db->limit($limit);
        if($sort != null){
            $this->db->order_by('created',$sort);
        }
        $query = $this->db->get(getTable($table));
        return $query->result();
    }

    public function get_active_limit($table,$limit,$sort = null) {
        $this->db->where(['active' => 1]);
        if($sort != null){
            $this->db->order_by('created',$sort);
        }
        $this->db->limit($limit);
        $query = $this->db->get(getTable($table));
        return $query->result();
    }
    public function get_slider() {
        $this->db->where(['active' => 1]);
        $this->db->where_not_in('photo', '');
        $query = $this->db->get(getTable('slider'));
        return $query->result();
    }

    public function get_one($table, $id) {
        $this->db->where(['id' => $id]);
        $query = $this->db->get(getTable($table));
        return $query->row();
    }

    public function get_section($name) {
        $this->db->where(['unique_name' => $name]);
        $query = $this->db->get(getTable('sections'));
        return $query->row();
    }

    // public function get_one_const($table, $id) {
    //     $this->db->where(['id' => $id]);
    //     $query = $this->db->get($table);
    //     return $query->row();
    // }

    public function get_api_photos(){
        $this->db->where(['is_photo' => 1]);
        $query = $this->db->get('media');
        return $query->result();
    }

    public function get_subpage($page) {
        $this->db->where(['page' => $page]);
        $query = $this->db->get(getTable('subpages'));
        return $query->row();
    }

    public function get_where($table, $where) {
        $this->db->where($where);
        $query = $this->db->get(getTable($table));
        return $query->result();
    }
    public function get_paginate_where($table, $where, $limit, $start, $sort = null) {
        $this->db->where($where);
        if($sort != null){
            $this->db->order_by('created',$sort);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get(getTable($table));
        return $query->result();
    }

    public function get_images($table, $table_name, $id) {
        $this->db->where([
            'item_id' => $id,
            'table_name' => $table_name,
            ]);
        $query = $this->db->get(getTable($table));
        return $query->result();
    }

    public function insert($table, $data) {
        //$data = $this->security->xss_clean($data);
        $query = $this->db->insert(getTable($table), $data);
        return $query;
    }

    public function update($table, $data, $id) {
        //$data = $this->security->xss_clean($data);
        $this->db->where(['id' => $id]);
        $query = $this->db->update(getTable($table), $data);
        return $query;
    }

    public function delete($table, $id) {
        $this->db->where(['id' => $id]);
        $query = $this->db->delete(getTable($table));
        return $query;
    }

    public function get_prefixes()
    {
        $query = $this->db->get('jezyki');
        $query = $query->result();
        $prefixes = [];
        $i = 0;
        foreach ($query as $q) {
            $prefixes[$i] = $q->prefix;
            $i++;
        }
        return $prefixes;
    }

}
