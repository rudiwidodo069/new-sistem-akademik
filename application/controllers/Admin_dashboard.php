<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_control_dashboard_model');
        // function cek session user login
        // cek_login_helper();
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['fatch_prodi'] = $this->admin_control_dashboard_model->get_all_prodi();
        $data['fatch_mhs_prodi'] = $this->admin_control_dashboard_model->get_all_mhs_prodi();
        $data['count_mhs'] = $this->admin_control_dashboard_model->get_all_count_mhs();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-dashboard/dashboard', $data);
        $this->load->view('templeates/footer');
    }
}
