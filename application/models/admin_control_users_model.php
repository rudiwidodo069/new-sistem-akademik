<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_users_model extends CI_Model
{
    // data yang akan di order
    var $column_order = array('id', null, null, 'level', null, null);

    function get_all_data_dataTable()
    {
        $this->db->from('users');
        // cek apakah user search data
        if (isset($_POST["search"]["value"])) {
            $this->db->like('user_name', $_POST["search"]["value"]);
            $this->db->or_like('id_akses', $_POST["search"]["value"]);
            $this->db->or_like('level', $_POST["search"]["value"]);
        }
        // cek apakah user mensorting data
        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('id', 'DESC');
        }
    }

    function get_all_user()
    {
        $this->get_all_data_dataTable();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function get_filter_data()
    {
        $this->get_all_data_dataTable();
        return  $this->db->get()->num_rows();
    }

    function get_count_data()
    {
        $this->get_all_data_dataTable();
        return $this->db->count_all('users');
    }

    function get_data_user($id_usuer)
    {
        return $this->db->get_where('users', ['id' => $id_usuer])->row_array();
    }

    function update_data_user($id_user, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id_user);
        return $this->db->update('users', $data);
    }

    function delete_data_user($id_user)
    {
        return $this->db->delete('users', ['id' => $id_user]);
    }
}
