<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_control_dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_control_dosen_model');
    }

    public function index()
    {
        $data['title'] = "Daftar Dosen";
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-dosen/dosen', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_dosen()
    {
        $fatch_data = $this->admin_control_dosen_model->get_all_data_dosen();
        $data = array();
        $no = 1;
        foreach ($fatch_data as $row) {
            $mhs = array();
            $mhs[] = $no . '.';
            $mhs[] = $row['nim_dosen'];
            $mhs[] = $row['nama_dosen'];
            $mhs[] = $row['kode_matkul'];
            $mhs[] = $row['jenis_kelamin'];
            $mhs[] = $row['level'];
            $mhs[] = '<div class="text-center">
            <button class="badge badge-warning mr-2" data-nim="' . $row['nim_dosen'] . '" id="get-data" data-target="#modal-update" data-toggle="modal">
                 <i class="fas fa-fw fa-user-edit"></i>
            </button>
            <a href=" ' . base_url('admin_control_mahasiswa/detail/') . $row['nim_dosen'] .  ' " class="badge badge-primary" id="info-mhs">
                <i class="fas fa-fw fa-info"></i>
            </a>
            <button class="badge badge-danger ml-2" data-nim="' . $row['nim_dosen'] . '" id="delete-data">
                <i class="fas fa-fw fa-trash"></i>
            </button>
            </div>';
            $data[] = $mhs;
            $no++;
        }

        $output = array(
            'draw' => $_POST["draw"],
            'recordsTotal' => $this->admin_control_dosen_model->count_all_data(),
            'recordsFiltered' => $this->admin_control_dosen_model->get_filtered_data(),
            'data' => $data
        );

        echo json_encode($output);
    }

    function insert_data()
    {
        $this->_validate();

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'nim' => form_error('nim_dosen'),
                'nama' => form_error('nama'),
                'kode' => form_error('kode_matkul')
            );
        } else {
            $nim = htmlspecialchars($this->input->post('nim_dosen'), true);
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'), true);

            // cek nim apakah sudah terdaftar
            $cek_dosen = $this->admin_control_dosen_model->get_data_dosen($nim);

            if ($cek_dosen) {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'maaf data dosen sudah terdaftar'
                );
            } else {
                if ($jenis_kelamin == "0") {
                    $output = array(
                        'invalid' => true,
                        'pesan' => 'jenis kelamin harus di isi'
                    );
                } else {
                    $data = array(
                        'nim_dosen' => $nim,
                        'nama_dosen' => htmlspecialchars($this->input->post('nama'), true),
                        'kode_matkul' => htmlspecialchars($this->input->post('kode_matkul'), true),
                        'jenis_kelamin' => $jenis_kelamin
                    );
                    $this->admin_control_dosen_model->insert_data($data);
                    $output = array(
                        'success' => true,
                        'pesan' => 'insert data dosen berhasil'
                    );
                }
            }
        }
        echo json_encode($output);
    }

    function get_data_dosen()
    {
        $nim  = $this->input->post('nim_dosen');
        $output = $this->admin_control_dosen_model->get_data_dosen($nim);
        echo json_encode($output);
    }

    function update_data()
    {
        $this->_validate();

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'nim' => form_error('nim_dosen'),
                'nama' => form_error('nama'),
                'kode' => form_error('kode_matkul')
            );
        } else {
            $nim = htmlspecialchars($this->input->post('nim_dosen'), true);
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'), true);

            // cek nim apakah sudah terdaftar
            $cek_dosen = $this->admin_control_dosen_model->get_data_dosen($nim);

            if ($cek_dosen == 0) {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'maaf data dosen belum terdaftar'
                );
            } else {
                if ($jenis_kelamin == "0") {
                    $output = array(
                        'invalid' => true,
                        'pesan' => 'jenis kelamin harus di isi'
                    );
                } else {
                    $data = array(
                        'nama_dosen' => htmlspecialchars($this->input->post('nama'), true),
                        'kode_matkul' => htmlspecialchars($this->input->post('kode_matkul'), true),
                        'jenis_kelamin' => $jenis_kelamin
                    );
                    $this->admin_control_dosen_model->update_data($nim, $data);
                    $output = array(
                        'success' => true,
                        'pesan' => 'update data dosen berhasil'
                    );
                }
            }
        }
        echo json_encode($output);
    }

    private function _validate()
    {
        $this->form_validation->set_rules('nim_dosen', 'nim dosen', 'required|trim|numeric');
        $this->form_validation->set_rules('nama', 'nama dosen', 'required|trim');
        $this->form_validation->set_rules('kode_matkul', 'kode mata kuliah', 'required|trim');
    }

    function delete_data()
    {
        $nim = $this->input->post('nim_dosen');
        $this->admin_control_dosen_model->delete_data($nim);
    }
}
