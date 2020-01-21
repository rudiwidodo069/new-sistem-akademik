<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_control_matkul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('univ_helper');
        $this->load->model('admin_control_matkul_model');
    }

    public function index()
    {
        $data['title'] = "daftar data mata kuliah";
        $data['data_akademik'] = $this->admin_control_matkul_model->data_akademik();
        $data['data_semester'] = semeter_akademik();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-akademik/matkul', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_matkul()
    {
        $fatch_data = $this->admin_control_matkul_model->get_all_data_matkul();
        $data = array();
        foreach ($fatch_data as $row) {
            $akademik = array();
            $akademik[] = $row['prodi'];
            $akademik[] = $row['semester'];
            $akademik[] = $row['kode_matkul'];
            $akademik[] = $row['matkul'];
            $akademik[] = $row['sks'];
            $akademik[] = '<center>
            <button type="button" class="badge badge-warning" data-target="#modal-update" data-toggle="modal" data-id="' . $row['matkul_id'] . '" id="update">
                <i class="fa fa-fw fa-edit"></i>
            </button>
            <button class="badge badge-danger ml-3" data-id="' . $row['matkul_id'] . '" id="delete">
                <i class="fa fa-fw fa-trash"></i>
            </button>
            </center>';
            $data[] = $akademik;
        }
        $output = array(
            'draw' => $_POST["draw"],
            'recordsFiltered' => $this->admin_control_matkul_model->filtered_data_matkul(),
            'recordsTotal' => $this->admin_control_matkul_model->count_data_matkul(),
            'data' => $data
        );
        echo json_encode($output);
    }

    function insert_matkul()
    {
        $this->_validation_matkul();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'kode_matkul' => form_error('kode_matkul'),
                'matkul' => form_error('matkul'),
                'sks' => form_error('sks')
            );
        } else {
            $id_akademik = htmlspecialchars($this->input->post('id_akademik'), true);
            $semester = htmlspecialchars($this->input->post('semester'), true);
            if ($id_akademik != 0 && $semester != 0) {
                $data = array(
                    'semester' => $semester,
                    'id_akademik' => $id_akademik,
                    'kode_matkul' => htmlspecialchars($this->input->post('kode_matkul'), true),
                    'matkul' => htmlspecialchars($this->input->post('matkul'), true),
                    'sks' =>  htmlspecialchars($this->input->post('sks'), true)
                );
                $this->admin_control_matkul_model->insert_matkul($data);
                $output = array(
                    'success' => true,
                    'pesan' => 'insert data matkul berhasil'
                );
            } else {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'semester dan prodi tidak boleh kosong'
                );
            }
        }

        echo json_encode($output);
    }

    function get_data_matkul()
    {
        $matkul_id = $this->input->post('matkul_id');
        $data = $this->admin_control_matkul_model->get_data_matkul($matkul_id);
        echo json_encode($data);
    }

    function update_matkul()
    {
        $this->_validation_matkul();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'kode_matkul' => form_error('kode_matkul'),
                'matkul' => form_error('matkul'),
                'sks' => form_error('sks')
            );
        } else {
            $matkul_id = $this->input->post('matkul_id');
            $id_akademik = htmlspecialchars($this->input->post('id_akademik'), true);
            $semester = htmlspecialchars($this->input->post('semester'), true);
            if ($id_akademik != 0 && $semester != 0) {
                $data = array(
                    'semester' => $semester,
                    'id_akademik' => $id_akademik,
                    'kode_matkul' => htmlspecialchars($this->input->post('kode_matkul'), true),
                    'matkul' => htmlspecialchars($this->input->post('matkul'), true),
                    'sks' =>  htmlspecialchars($this->input->post('sks'), true)
                );
                $this->admin_control_matkul_model->update_matkul($matkul_id, $data);
                $output = array(
                    'success' => true,
                    'pesan' => 'update data matkul berhasil'
                );
            } else {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'semester dan prodi tidak boleh kosong'
                );
            }
        }

        echo json_encode($output);
    }

    function _validation_matkul()
    {
        $this->form_validation->set_rules('kode_matkul', 'kode mata kuliah', 'required|trim|max_length[10]');
        $this->form_validation->set_rules('matkul', 'mata kuliah', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('sks', 'sks', 'required|trim|max_length[2]|numeric');
    }

    function delete_matkul()
    {
        $matkul_id = $this->input->post('matkul_id');
        $this->admin_control_matkul_model->delete_matkul($matkul_id);
    }
}
