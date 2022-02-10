<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Back_m extends CI_Model
{
    public function get_all($table)
    {
        $query = $this->db->get(getTable($table));
        return $query->result();
    }

    public function get_active($table)
    {
        $this->db->where(['active' => 1]);
        $query = $this->db->get($table);
        return $query->result();
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

    public function get_with_limit($table, $limit, $sort = null)
    {
        $this->db->limit($limit);
        if ($sort != null) {
            $this->db->order_by('created', $sort);
        }
        $query = $this->db->get(getTable($table));
        return $query->result();
    }



    public function get_active_limit($table, $limit, $sort = null)
    {
        $this->db->where(['active' => 1]);
        if ($sort != null) {
            $this->db->order_by('created', $sort);
        }
        $this->db->limit($limit);
        $query = $this->db->get($table);
        return $query->result();
    }


    public function get_one($table, $id)
    {
        $this->db->where(['id' => $id]);
        $query = $this->db->get(getTable($table));
        return $query->row();
    }



    public function get_api_photos()
    {
        $this->db->where(['is_photo' => 1]);
        $query = $this->db->get('media');
        return $query->result();
    }

    public function get_subpage($page)
    {
        $this->db->where(['page' => $page]);
        $query = $this->db->get(getTable('subpages'));
        return $query->row();
    }

    public function get_where($table, $where)
    {
        $this->db->where($where);
        $query = $this->db->get(getTable($table));
        return $query->result();
    }
    public function get_where_order($table, $where, $order)
    {
        $this->db->where($where);
        $this->db->order_by($order['field'], $order['type']);
        $query = $this->db->get(getTable($table));
        return $query->result();
    }
    public function get_like($table, $field, $like)
    {
        $this->db->like($field, $like);
        $query = $this->db->get(getTable($table));
        return $query->result();
    }
    public function get_where_row($table, $where)
    {
        $this->db->where($where);
        $query = $this->db->get(getTable($table));
        return $query->row();
    }
    public function get_pagination($table, $page, $perPage, $sort = [], $where = [])
    {
        if (!empty($sort)) $this->db->order_by($sort['field'], $sort['type']);
        if (!empty($where)) $this->db->where($where);
        $this->db->limit($perPage, $page);
        return $this->db->get($table)->result();
    }
    public function get_paginate_where($table, $where, $limit, $start, $sort = null)
    {
        $this->db->where($where);
        if ($sort != null) {
            $this->db->order_by('created', $sort);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function get_images($table, $table_name, $id)
    {
        $this->db->where([
            'item_id' => $id,
            'table_name' => $table_name,
        ]);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function insert($table, $data)
    {
        $query = $this->db->insert(getTable($table), $data);
        $value_after = json_encode($this->back_m->get_one($table, $this->db->insert_id()));

        $this->logs->save(['message' => "Rekord został dodany!", 'value_after' => $value_after, 'table_name' => $table]);

        return $query;
    }

    public function update($table, $data, $id)
    {
        $value_before = json_encode($this->back_m->get_one($table, $id));
        $this->db->where(['id' => $id]);
        $query = $this->db->update(getTable($table), $data);
        $value_after = json_encode($this->back_m->get_one($table, $id));

        $this->logs->save(['message' => "Rekord został zaktualizowany!", 'value_before' => $value_before, 'value_after' => $value_after, 'table_name' => $table]);

        return $query;
    }

    public function delete($table, $id)
    {
        $value_before = json_encode($this->back_m->get_one($table, $id));
        $this->db->where(['id' => $id]);
        $query = $this->db->delete(getTable($table));

        $this->logs->save(['message' => "Rekord został usunięty!", 'value_before' => $value_before, 'table_name' => $table]);

        return $query;
    }
}
