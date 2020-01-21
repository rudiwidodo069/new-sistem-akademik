<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_mahasiswa_model extends CI_Model
{
    var $column_order = array('npm_mhs', null, 'kelas', 'perkuliahan', 'kode_prodi', 'prodi', 'tahun_masuk');

    function get_data_mhasiswa_dataTable()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        if (isset($_POST["search"]["value"])) {
            $this->db->like('npm_mhs', $_POST["search"]["value"]);
            $this->db->or_like('nama_mhs', $_POST["search"]["value"]);
            $this->db->or_like('kelas', $_POST["search"]["value"]);
            $this->db->or_like('kode_prodi', $_POST["search"]["value"]);
            $this->db->or_like('prodi', $_POST["search"]["value"]);
            $this->db->or_like('tahun_masuk', $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->column_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('npm_mhs', 'DESC');
        }
    }

    function get_all_data_mahasiswa()
    {
        $this->get_data_mhasiswa_dataTable();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function get_filtered_data()
    {
        $this->get_data_mhasiswa_dataTable();
        return $this->db->get()->num_rows();
    }

    function count_all_data()
    {
        $this->get_data_mhasiswa_dataTable();
        $this->db->get();
        return $this->db->count_all_results();
    }

    function get_all_data_akademik()
    {
        return $this->db->get('akademik')->result_array();
    }

    function get_data_mahasiswa($npm)
    {
        return $this->db->get_where('mahasiswa', ['npm_mhs' => $npm])->row_array();
    }

    function insert_data_mahasiswa($data)
    {
        $this->db->insert('mahasiswa', $data);
    }

    function update_data_mahasiswa($npm, $data)
    {
        $this->db->set($data);
        $this->db->where('npm_mhs', $npm);
        $this->db->update('mahasiswa', $data);
    }

    function delete_data_mahasiswa($npm)
    {
        $this->db->delete('mahasiswa', ['npm_mhs' => $npm]);
        $this->db->delete('krs', ['npm_mhs' => $npm]);
        $this->db->delete('nilai', ['npm_mhs' => $npm]);
        $this->db->delete('pembayaran', ['npm_mhs' => $npm]);
        $this->db->delete('users', ['id_akses' => $npm]);
    }
}
