<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_control_khs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_control_khs_model');
        $this->load->helper('univ_helper');
    }

    public function index()
    {
        $data['title'] = "Daftar Khs";
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-khs/khs', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_khs()
    {
        $fatch_data_nilai = $this->admin_control_khs_model->get_all_data_nilai();
        $fetch_data = $this->admin_control_khs_model->get_all_data_khs();
        $data = array();
        $no = 1;

        foreach ($fetch_data as $row) {
            $khs = array();
            $khs[] = $no . '.';
            $khs[] = $row['nama_mhs'];
            $khs[] = $row['npm_mhs'];
            $khs[] = $row['kelas'];
            $khs[] = $row['prodi'];
            $khs[] = $row['semester'];
            foreach ($fatch_data_nilai as $nilai) {
                if ($row['npm_mhs'] == $nilai['npm_mhs']) {
                    $khs[] = '<center>
                                        <button type="button" class="badge badge-success">DONE</button>
                                        <a href="' . base_url('admin_control_khs/khs_update/') . $row['npm_mhs'] . '" class="badge badge-warning">
                                            UPDATE NILAI
                                        </a>
                                        <button type="button" class="badge badge-danger" id="delete" data-npm="' . $row['npm_mhs'] . '">DELETE NILAI</button>
                                        <a href="' . base_url('admin_control_khs/khs_detail/') . $row['npm_mhs'] . '" class="badge badge-primary">
                                            <i class="fas fa-fw fa-info"></i>
                                        </a>
                                    </center>';
                }
            }
            $khs[] = '<center>
                               <a href="' . base_url('admin_control_khs/khs_insert/') . $row['npm_mhs'] . '" class="badge badge-primary">INSERT NILAI</a>
                            </center>';
            $no++;
            $data[] = $khs;
        }

        $output = array(
            'draw' => $_POST["draw"],
            'recordsTotal' => $this->admin_control_khs_model->count_data(),
            'recordsFiltered' => $this->admin_control_khs_model->filtered_data(),
            'data' => $data
        );

        echo json_encode($output);
    }

    public function khs_insert($npm)
    {
        $data['title'] = "Form Pengisian Khs Mahasiswa";
        $data['data_mhs'] = $this->admin_control_khs_model->get_data_krs($npm);
        $data['data_matkul'] = $this->admin_control_khs_model->get_all_data_matkul();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-khs/insert_khs', $data);
        $this->load->view('templeates/footer');
    }

    function insert_khs()
    {
        $this->_validation();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'pesan' => 'insert data khs gagal',
                'nilai1' => form_error('nilai1'),
                'nilai2' => form_error('nilai2'),
                'nilai3' => form_error('nilai3'),
                'nilai4' => form_error('nilai4'),
                'nilai5' => form_error('nilai5'),
                'nilai6' => form_error('nilai6'),
                'nilai7' => form_error('nilai7'),
                'nilai8' => form_error('nilai8')
            );
        } else {
            $data = array(
                'npm_mhs' => htmlspecialchars($this->input->post('npm'), true),
                'id_akademik' => htmlspecialchars($this->input->post('id_akademik'), true),
                'semester' => htmlspecialchars($this->input->post('semester'), true),
                'nilai_1' => htmlspecialchars($this->input->post('nilai1'), true),
                'nilai_2' => htmlspecialchars($this->input->post('nilai2'), true),
                'nilai_3' => htmlspecialchars($this->input->post('nilai3'), true),
                'nilai_4' => htmlspecialchars($this->input->post('nilai4'), true),
                'nilai_5' => htmlspecialchars($this->input->post('nilai5'), true),
                'nilai_6' =>  htmlspecialchars($this->input->post('nilai6'), true),
                'nilai_7' => htmlspecialchars($this->input->post('nilai7'), true),
                'nilai_8' =>  htmlspecialchars($this->input->post('nilai8'), true),
            );
            $this->admin_control_khs_model->insert_khs($data);
            $output = array(
                'success' => true,
                'pesan' => 'insert data khs berhasil'
            );
        }
        echo json_encode($output);
    }

    public function khs_update($npm)
    {
        $data['title'] = "Form Pengisian Khs Mahasiswa";
        $data['data_nilai'] = $this->admin_control_khs_model->get_data_nilai($npm);
        $data['data_matkul'] = $this->admin_control_khs_model->get_all_data_matkul();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-khs/update_khs', $data);
        $this->load->view('templeates/footer');
    }

    function update_khs()
    {
        $this->_validation();
        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'pesan' => 'update data khs gagal',
                'nilai1' => form_error('nilai1'),
                'nilai2' => form_error('nilai2'),
                'nilai3' => form_error('nilai3'),
                'nilai4' => form_error('nilai4'),
                'nilai5' => form_error('nilai5'),
                'nilai6' => form_error('nilai6'),
                'nilai7' => form_error('nilai7'),
                'nilai8' => form_error('nilai8')
            );
        } else {
            $id_khs = $this->input->post('id_nilai');
            $data = array(
                'npm_mhs' => htmlspecialchars($this->input->post('npm'), true),
                'id_akademik' => htmlspecialchars($this->input->post('id_akademik'), true),
                'semester' => htmlspecialchars($this->input->post('semester'), true),
                'nilai_1' => htmlspecialchars($this->input->post('nilai1'), true),
                'nilai_2' => htmlspecialchars($this->input->post('nilai2'), true),
                'nilai_3' => htmlspecialchars($this->input->post('nilai3'), true),
                'nilai_4' => htmlspecialchars($this->input->post('nilai4'), true),
                'nilai_5' => htmlspecialchars($this->input->post('nilai5'), true),
                'nilai_6' =>  htmlspecialchars($this->input->post('nilai6'), true),
                'nilai_7' => htmlspecialchars($this->input->post('nilai7'), true),
                'nilai_8' =>  htmlspecialchars($this->input->post('nilai8'), true),
            );
            $this->admin_control_khs_model->update_khs($id_khs, $data);
            $output = array(
                'success' => true,
                'pesan' => 'update data khs berhasil'
            );
        }
        echo json_encode($output);
    }

    function delete_khs()
    {
        $npm = $this->input->post('npm');
        $this->admin_control_khs_model->delete_khs($npm);
        $output = array(
            'success' => true,
            'pesan' => 'delete data khs berhasil'
        );
        echo json_encode($output);
    }

    function _validation()
    {
        $this->form_validation->set_rules('nilai1', 'nilai', 'numeric|max_length[2]');
        $this->form_validation->set_rules('nilai2', 'nilai', 'numeric|max_length[2]');
        $this->form_validation->set_rules('nilai3', 'nilai', 'numeric|max_length[2]');
        $this->form_validation->set_rules('nilai4', 'nilai', 'numeric|max_length[2]');
        $this->form_validation->set_rules('nilai5', 'nilai', 'numeric|max_length[2]');
        $this->form_validation->set_rules('nilai6', 'nilai', 'numeric|max_length[2]');
        $this->form_validation->set_rules('nilai7', 'nilai', 'numeric|max_length[2]');
        $this->form_validation->set_rules('nilai8', 'nilai', 'numeric|max_length[2]');
    }

    public function khs_detail($npm)
    {
        $data['title'] = "Detail Khs Mahasiswa";
        $data['data_nilai'] = $this->admin_control_khs_model->get_data_nilai($npm);
        $data['data_matkul'] = $this->admin_control_khs_model->get_data_matkul($npm);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-khs/detail', $data);
        $this->load->view('templeates/footer');
    }
}
