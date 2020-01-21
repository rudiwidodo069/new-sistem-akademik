<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_akademik_model extends CI_Model
{
    // server side akademik
    function get_data_datatable_akademik()
    {
        $column_order = array(null, null, null);
        $this->db->select('*');
        $this->db->from('akademik');
        if (isset($_POST["search"]["value"])) {
            $this->db->like('id_akademik', $_POST["search"]["value"]);
            $this->db->or_like('kode_prodi', $_POST["search"]["value"]);
            $this->db->or_like('prodi', $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('id_akademik', 'ASC');
        }
    }

    function get_all_data_akademik()
    {
        $this->get_data_datatable_akademik();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function filtered_data_akademik()
    {
        $this->get_data_datatable_akademik();
        return $this->db->get()->num_rows();
    }

    function count_data_akademik()
    {
        $this->get_data_datatable_akademik();
        $this->db->get();
        return $this->db->count_all_results();
    }
}
