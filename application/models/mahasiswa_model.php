<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{
    function get_data_mahasiswa($npm)
    {
        return $this->db->get_where('mahasiswa', ['npm_mhs' => $npm])->row_array();
    }

    function get_dashboard_mahasiswa($npm)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('mahasiswa', 'mahasiswa.npm_mhs = pembayaran.npm_mhs');
        $this->db->join('akademik', 'akademik.id_akademik = pembayaran.id_akademik');
        $this->db->join('krs', 'krs.npm_mhs = pembayaran.npm_mhs');
        $this->db->where('pembayaran.npm_mhs', $npm);
        return $this->db->get()->row_array();
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

    function get_data_nilai($npm)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('akademik', 'akademik.id_akademik = mahasiswa.id_akademik');
        $this->db->join('nilai', 'nilai.npm_mhs = mahasiswa.npm_mhs');
        $this->db->where('mahasiswa.npm_mhs', $npm);
        return $this->db->get()->row_array();
    }

    function get_data_matkul_khs($npm)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('akademik', 'akademik.id_akademik = nilai.id_akademik');
        $this->db->join('matkul', 'matkul.semester = nilai.semester');
        $this->db->where('npm_mhs', $npm);
        return $this->db->get()->result_array();
    }
}
