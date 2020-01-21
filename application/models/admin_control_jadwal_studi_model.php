<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_jadwal_studi_model extends CI_Model
{
    function get_all_prodi()
    {
        $this->db->select('*');
        $this->db->from('akademik');
        return $this->db->get()->result_array();
    }

    function get_data_jadwal_studi($id_akademik, $semester, $kelas)
    {
        $this->db->select('*');
        $this->db->from('jadwal_studi');
        $this->db->join('akademik', 'akademik.id_akademik = jadwal_studi.id_akademik');
        $this->db->join('dosen', 'dosen.kode_matkul = jadwal_studi.kode_matkul');
        $this->db->join('matkul', 'matkul.kode_matkul = jadwal_studi.kode_matkul');
        $this->db->where('jadwal_studi.id_akademik', $id_akademik);
        $this->db->where('jadwal_studi.semester', $semester);
        $this->db->where('kelas', $kelas);
        return $this->db->get()->result_array();
    }

    function get_data_prodi($id_akademik)
    {
        return $this->db->get_where('akademik', ['id_akademik' => $id_akademik])->row_array();
    }

    function get_all_data_matkul($id_akademik, $semester)
    {
        $this->db->select('*');
        $this->db->from('matkul');
        $this->db->where('id_akademik', $id_akademik);
        $this->db->where('semester', $semester);
        return $this->db->get()->result_array();
    }

    function get_data_matkul($id)
    {
        return $this->db->get_where('matkul', ['matkul_id' => $id])->row_array();
    }

    function get_info_jadwal($kode_matkul, $hari, $jam)
    {
        $this->db->select('*');
        $this->db->from('jadwal_studi');
        $this->db->where('kode_matkul', $kode_matkul);
        $this->db->where('hari', $hari);
        $this->db->where('jam', $jam);
        return $this->db->get()->row_array();
    }

    function get_info_jam($kelas, $hari, $jam)
    {
        $this->db->select('*');
        $this->db->from('jadwal_studi');
        $this->db->where('kelas', $kelas);
        $this->db->where('hari', $hari);
        $this->db->where('jam', $jam);
        return $this->db->get()->row_array();
    }

    function insert_jadwal_studi($data)
    {
        $this->db->insert('jadwal_studi', $data);
    }

    function get_update_jadwal_studi($id_jadwal)
    {
        $this->db->select('*');
        $this->db->from('jadwal_studi');
        $this->db->join('akademik', 'akademik.id_akademik = jadwal_studi.id_akademik');
        $this->db->join('matkul', 'matkul.kode_matkul = jadwal_studi.kode_matkul');
        $this->db->where('id_jadwal', $id_jadwal);
        return $this->db->get()->row_array();
    }

    function update_jadwal_studi($id_jadwal, $data)
    {
        $this->db->set($data);
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->update('jadwal_studi', $data);
    }

    function delete_jadwal_studi($id_jadwal)
    {
        $this->db->delete('jadwal_studi', ['id_jadwal' => $id_jadwal]);
    }
}
