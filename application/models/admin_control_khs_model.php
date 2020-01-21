<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_khs_model extends CI_Model
{
    var $column_order = array('id_krs', null, null, null, null, null);

    function get_data_datatable()
    {
        $this->db->select('*');
        $this->db->from('krs');
        $this->db->join('mahasiswa', 'mahasiswa.npm_mhs = krs.npm_mhs');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        if ($_POST["search"]["value"]) {
            $this->db->like('mahasiswa.npm_mhs', $_POST["search"]["value"]);
            $this->db->or_like('nama_mhs', $_POST["search"]["value"]);
            $this->db->or_like('prodi', $_POST["search"]["value"]);
        }
        if ($_POST["order"]) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('id_krs', 'DESC');
        }
    }

    function get_all_data_khs()
    {
        $this->get_data_datatable();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function filtered_data()
    {
        $this->get_data_datatable();
        return $this->db->get()->num_rows();
    }

    function count_data()
    {
        $this->get_data_datatable();
        $this->db->get();
        return $this->db->count_all_results();
    }

    function get_all_data_nilai()
    {
        return  $this->db->get('nilai')->result_array();
    }

    function get_data_nilai($npm)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        $this->db->join('nilai', 'nilai.npm_mhs = mahasiswa.npm_mhs');
        $this->db->where('mahasiswa.npm_mhs', $npm);
        return $this->db->get()->row_array();
    }

    function get_data_krs($npm)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        $this->db->join('krs', 'krs.npm_mhs = mahasiswa.npm_mhs');
        $this->db->where('mahasiswa.npm_mhs', $npm);
        return $this->db->get()->row_array();
    }

    function get_all_data_matkul()
    {
        return $this->db->get('matkul')->result_array();
    }

    function get_data_matkul($npm)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('akademik', 'akademik.id_akademik = nilai.id_akademik');
        $this->db->join('matkul', 'matkul.semester = nilai.semester');
        $this->db->where('npm_mhs', $npm);
        return $this->db->get()->result_array();
    }

    function insert_khs($data)
    {
        $this->db->insert('nilai', $data);
    }

    function update_khs($id_nilai, $data)
    {
        $this->db->set($data);
        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai', $data);
    }

    function delete_khs($npm)
    {
        $this->db->delete('nilai', ['npm_mhs' => $npm]);
    }
}
