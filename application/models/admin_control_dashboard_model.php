<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_dashboard_model extends CI_Model
{
    function get_all_prodi()
    {
        return $this->db->get('akademik')->result_array();
    }

    function get_all_mhs_prodi()
    {
        $this->db->select('id_akademik');
        $this->db->from('mahasiswa');
        $this->db->group_by('id_akademik');
        return $this->db->get()->result_array();
    }

    function get_all_count_mhs()
    {
        $this->db->select('count(mahasiswa.id_akademik) as prodi');
        $this->db->from('mahasiswa');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        return $this->db->get()->row_array();
    }
}
