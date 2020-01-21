<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_control_pembayaran_model extends CI_Model
{


    function get_all_data_pembayaran_lunas()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('mahasiswa', 'mahasiswa.npm_mhs = pembayaran.npm_mhs');
        $this->db->join('akademik', 'akademik.id_akademik = pembayaran.id_akademik');
        $this->db->join('krs', 'krs.npm_mhs = pembayaran.npm_mhs');
        $this->db->where('status_pembayaran', 'LUNAS');
        $this->db->order_by('tgl_lunas', 'DESC');
        return $this->db->get()->result_array();
    }

    function get_all_data_pembayaran_cicilan()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('mahasiswa', 'mahasiswa.npm_mhs = pembayaran.npm_mhs');
        $this->db->join('akademik', 'akademik.id_akademik = pembayaran.id_akademik');
        $this->db->join('krs', 'krs.npm_mhs = pembayaran.npm_mhs');
        $this->db->where('status_pembayaran', 'CICILAN');
        $this->db->order_by('tgl_lunas', 'DESC');
        return $this->db->get()->result_array();
    }

    function get_all_data_pembayaran_belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('mahasiswa', 'mahasiswa.npm_mhs = pembayaran.npm_mhs');
        $this->db->join('akademik', 'akademik.id_akademik = pembayaran.id_akademik');
        $this->db->join('krs', 'krs.npm_mhs = pembayaran.npm_mhs');
        $this->db->where('status_pembayaran', 'BELUM BAYAR');
        $this->db->order_by('tgl_lunas', 'DESC');
        return $this->db->get()->result_array();
    }

    function get_data_mahasiswa($id)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('mahasiswa', 'mahasiswa.npm_mhs = pembayaran.npm_mhs');
        $this->db->join('akademik', 'akademik.id_akademik = pembayaran.id_akademik');
        $this->db->join('krs', 'krs.npm_mhs = pembayaran.npm_mhs');
        $this->db->where('id_pembayaran', $id);
        return $this->db->get()->row_array();
    }

    function update_pembayaran($id_pembayaran, $data)
    {
        $this->db->set($data);
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran', $data);
    }
}
