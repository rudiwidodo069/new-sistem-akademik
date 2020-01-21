<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_dosen_model extends CI_Model
{
    var $column_order = array('nim_dosen', null, null, null, null);

    function get_data_dosen_dataTable()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        if (isset($_POST["search"]["value"])) {
            $this->db->like('nim_dosen', $_POST["search"]["value"]);
            $this->db->or_like('nama_dosen', $_POST["search"]["value"]);
            $this->db->or_like('kode_matkul', $_POST["search"]["value"]);
            $this->db->or_like('jenis_kelamin', $_POST["search"]["value"]);
            $this->db->or_like('level', $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('nim_dosen', 'DESC');
        }
    }

    function get_all_data_dosen()
    {
        $this->get_data_dosen_dataTable();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function get_filtered_data()
    {
        $this->get_data_dosen_dataTable();
        return $this->db->get()->num_rows();
    }

    function count_all_data()
    {
        $this->get_data_dosen_dataTable();
        $this->db->get();
        return $this->db->count_all_results();
    }

    function get_data_dosen($nim)
    {
        return $this->db->get_where('dosen', ['nim_dosen' => $nim])->row_array();
    }

    function insert_data($data)
    {
        $this->db->insert('dosen', $data);
    }

    function update_data($nim, $data)
    {
        $this->db->set($data);
        $this->db->where('nim_dosen', $nim);
        $this->db->update('dosen', $data);
    }

    function delete_data($nim)
    {
        $this->db->delete('dosen', ['nim_dosen' => $nim]);
    }
}
