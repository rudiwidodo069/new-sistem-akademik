<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_control_akademik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_control_akademik_model');
    }

    public function index()
    {
        $data['title'] = "daftar akademik";
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-akademik/akademik', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_akademik()
    {
        $fatch_data = $this->admin_control_akademik_model->get_all_data_akademik();
        $data = array();
        $no = 1;
        foreach ($fatch_data as $row) {
            $akademik = array();
            $akademik[] = $no . '.';
            $akademik[] = $row['id_akademik'];
            $akademik[] = $row['kode_prodi'];
            $akademik[] = $row['prodi'];
            $data[] = $akademik;
            $no++;
        }
        $output = array(
            'draw' => $_POST["draw"],
            'recordsFiltered' => $this->admin_control_akademik_model->filtered_data_akademik(),
            'recordsTotal' => $this->admin_control_akademik_model->count_data_akademik(),
            'data' => $data
        );
        echo json_encode($output);
    }
}
