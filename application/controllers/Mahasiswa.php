<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

    public function index()
    {
        $data['title'] = "dashboard mahasiswa";
        $user_login = $this->session->userdata('id_akses');
        $data['data_mhs'] =  $this->mahasiswa_model->get_dashboard_mahasiswa($user_login);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('mahasiswa/mahasiswa-dashboard/dashboard', $data);
        $this->load->view('templeates/footer');
    }

    public function krs()
    {
        $data['title'] = "krs mahasiswa";
        $user_login = $this->session->userdata('id_akses');
        $data['get_info'] = $this->mahasiswa_model->get_info_krs($user_login);
        $data['get_matkul'] = $this->mahasiswa_model->get_data_matkul($user_login);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('mahasiswa/mahasiswa-krs/krs', $data);
        $this->load->view('templeates/footer');
    }

    public function khs()
    {
        $data['title'] = "khs mahasiswa";
        $user_login = $this->session->userdata('id_akses');
        $data['data_nilai'] = $this->mahasiswa_model->get_data_nilai($user_login);
        $data['data_matkul'] = $this->mahasiswa_model->get_data_matkul_khs($user_login);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('mahasiswa/mahasiswa-khs/khs', $data);
        $this->load->view('templeates/footer');
    }
}
