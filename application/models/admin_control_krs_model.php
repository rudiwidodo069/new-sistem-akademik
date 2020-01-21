<?php


defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_krs_model extends CI_Model
{
    var $cloumn_order = array('id_krs', null, null, null, null, null, null);

    function get_data_datatable()
    {
        $this->db->select('*');
        $this->db->from('krs');
        $this->db->join('mahasiswa', 'mahasiswa.npm_mhs = krs.npm_mhs');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        if (isset($_POST["search"]["value"])) {
            $this->db->like('nama_mhs', $_POST["search"]["value"]);
            $this->db->or_like('krs.npm_mhs', $_POST["search"]["value"]);
            $this->db->or_like('akademik.prodi', $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->cloumn_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
        } else {
            $this->db->order_by('id_krs', 'DESC');
        }
    }

    function get_all_data_krs()
    {
        $this->get_data_datatable();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        return $this->db->get()->result_array();
    }

    function get_filtered_data()
    {
        $this->get_data_datatable();
        return $this->db->get()->num_rows();
    }

    function get_count_data()
    {
        $this->get_data_datatable();
        $this->db->get();
        return $this->db->count_all_results();
    }

    function get_all_data_mahasiswa()
    {
        $this->db->select('nama_mhs, mahasiswa.npm_mhs, akademik.id_akademik, akademik.prodi');
        $this->db->from('mahasiswa');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        $this->db->join('krs', 'krs.npm_mhs = mahasiswa.npm_mhs', 'left outer');
        $this->db->where('krs.npm_mhs', null);
        return $this->db->get()->result_array();
    }

    function get_data_mahasiswa($npm)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        $this->db->where('mahasiswa.npm_mhs', $npm);
        return $this->db->get()->row_array();
    }

    function insert_krs($data)
    {
        $this->db->insert('krs', $data);
    }

    function insert_pembayaran($data)
    {
        $this->db->insert('pembayaran', $data);
    }

    function update_krs($npm, $data)
    {
        $this->db->set($data);
        $this->db->where('npm_mhs', $npm);
        $this->db->update('krs', $data);
    }

    function get_info_krs($npm)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        $this->db->join('krs', 'krs.npm_mhs = mahasiswa.npm_mhs');
        $this->db->where('mahasiswa.npm_mhs', $npm);
        return $this->db->get()->row_array();
    }

    function get_data_matkul($npm)
    {
        $this->db->select('*');
        $this->db->from('krs');
        $this->db->join('akademik', 'akademik.id_akademik = krs.id_akademik');
        $this->db->join('matkul', 'matkul.semester = krs.semester');
        $this->db->where('npm_mhs', $npm);
        return $this->db->get()->result_array();
    }
}
