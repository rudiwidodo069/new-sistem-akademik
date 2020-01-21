<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    function get_npm_mhs_by_id($npm)
    {
        return $this->db->get_where('mahasiswa', ['npm_mhs' => $this->db->escape_str($npm)])->row_array();
    }

    function get_nid_dosen_by_id($nim)
    {
        return $this->db->get_where('dosen', ['nim_dosen' => $this->db->escape_str($nim)])->row_array();
    }

    function get_id_akses_user_by_id($id_akses)
    {
        return $this->db->get_where('users', ['id_akses' => $id_akses])->num_rows();
    }

    function insert_data_regist($data)
    {
        return $this->db->insert('users', $data);
    }

    function insert_data_token($data_token)
    {
        return $this->db->insert('user_token', $data_token);
    }

    function get_user_data_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    function get_user_data_token($token)
    {
        return $this->db->get_where('user_token', ['token' => $token])->row_array();
    }

    function update_data_user($email)
    {
        $this->db->set('is_active', 'active');
        $this->db->where('email', $email);
        return $this->db->update('users');
    }

    function delete_data_token($token)
    {
        return $this->db->delete('user_token', ['token' => $token]);
    }

    function delete_data_user($email)
    {
        return $this->db->delete('users', ['email' => $email]);
    }

    function change_password($email, $pass)
    {
        $this->db->set('password', $pass);
        $this->db->where('email', $email);
        $this->db->update('users');
    }

    function delete_data_token_change_pass($email)
    {
        $this->db->delete('user_token', ['token' => $email]);
    }
}
