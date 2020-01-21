<?php

function cek_login_helper()
{
    $ci = get_instance();
    // ambil data user login
    $email = $ci->session->userdata('email');
    $user_level = $ci->db->get_where('users', ['email' => $email])->row_array();
    if (!$email) {
        redirect('auth');
    }
    $url = $ci->uri->segment(1);
    if ($url == $user_level['level']) {
        return true;
    } else {
        redirect('auth/blocked');
    }
}

function cek_session()
{
    $ci = get_instance();
    $user = $ci->session->userdata('email');
    $user_level = $ci->db->get_where('users', ['email' => $user])->row_array();
    $level = $user_level['level'];
    if ($user) {
        redirect($level);
    }
}
