<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_matkul_model extends CI_Model
{
    function get_data_datatable_matkul()
    {
        $this->db->select('*');
        $this->db->from('matkul');
        $this->db->join('akademik', 'akademik.id_akademik = matkul.id_akademik');
        if (isset($_POST["search"]["value"])) {
            $this->db->like('semester', $_POST["search"]["value"]);
            $this->db->or_like('kode_matkul', $_POST["search"]["value"]);
            $this->db->or_like('matkul', $_POST["search"]["value"]);
            $this->db->or_like('prodi', $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('matkul_id', 'ASC');
        }
    }

    function get_all_data_matkul()
    {
        $this->get_data_datatable_matkul();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function filtered_data_matkul()
    {
        $this->get_data_datatable_matkul();
        return $this->db->get()->num_rows();
    }

    function count_data_matkul()
    {
        $this->get_data_datatable_matkul();
        $this->db->get();
        return $this->db->count_all_results();
    }

    function data_akademik()
    {
        return $this->db->get('akademik')->result_array();
    }

    function insert_matkul($data)
    {
        $this->db->insert('matkul', $data);
    }

    function get_data_matkul($matkul_id)
    {
        return $this->db->get_where('matkul', ['matkul_id' => $matkul_id])->row_array();
    }

    function update_matkul($matkul_id, $data)
    {
        $this->db->set($data);
        $this->db->where('matkul_id', $matkul_id);
        $this->db->update('matkul', $data);
    }

    function delete_matkul($matkul_id)
    {
        $this->db->delete('matkul', ['matkul_id' => $matkul_id]);
    }
}
