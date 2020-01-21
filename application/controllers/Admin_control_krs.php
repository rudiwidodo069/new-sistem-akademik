<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_control_krs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_control_krs_model');
        $this->load->helper('univ_helper');
    }

    public function index()
    {
        $data['title'] = "Krs Mahasiswa";
        $data['semester_akademik'] = semeter_akademik();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-krs/krs', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_krs()
    {
        $fatch_data = $this->admin_control_krs_model->get_all_data_krs();
        $data = array();
        $no = 1;
        foreach ($fatch_data as $row) {
            $krs = array();
            $krs[] = $no . '.';
            $krs[] = $row['nama_mhs'];
            $krs[] = $row['npm_mhs'];
            $krs[] = $row['kelas'];
            $krs[] = $row['prodi'];
            $krs[] = $row['semester'];
            $krs[] = $row['total_biaya'];
            $krs[] = $row['daftar_ulang'];
            $krs[] = $row['spp'];
            $krs[] = $row['lain_lain'];
            $krs[] = '<center><button class="badge badge-warning " data-npm="' . $row['npm_mhs'] . '" data-target="#update-krs" data-toggle="modal" id="update">
                            <i class="fas fa-fw fa-edit"></i>
                        </button>
                        <a href="' . base_url('admin_control_krs/detail/') . $row['npm_mhs'] . '" class="badge badge-primary ml-2">
                            <i class="fas fa-fw fa-info"></i>
                        </a></center>';
            $data[] = $krs;
            $no++;
        }
        $output = array(
            'draw' => $_POST["draw"],
            'recordsTotal' => $this->admin_control_krs_model->get_filtered_data(),
            'recordsFiltered' => $this->admin_control_krs_model->get_count_data(),
            'data' => $data
        );

        echo json_encode($output);
    }

    public function krs()
    {
        $data['title'] = "Form Pengisian Krs Mahasiswa";
        $data['semester_akademik'] = semeter_akademik();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-krs/insert_krs', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_mhs()
    {
        $output =  $this->admin_control_krs_model->get_all_data_mahasiswa();
        echo json_encode($output);
    }

    function get_data_mhs()
    {
        $npm = $this->input->post('npm');
        $data = $this->admin_control_krs_model->get_data_mahasiswa($npm);
        $output = array(
            'npm_mhs' => $data['npm_mhs'],
            'nama_mhs' => $data['nama_mhs'],
            'perkuliahan' => $data['perkuliahan'],
            'prodi' => $data['prodi'],
            'id_akademik' => $data['id_akademik']
        );
        echo json_encode($output);
    }

    function insert_krs()
    {
        if ($this->input->post('semester') == 0) {
            $output = array(
                'invalid' => true,
                'pesan' => 'data semester harus diisi !'
            );
        } else {
            $data = array(
                'npm_mhs' => htmlspecialchars($this->input->post('npm'), true),
                'id_akademik' => htmlspecialchars($this->input->post('id_akademik'), true),
                'semester' => htmlspecialchars($this->input->post('semester'), true),
                'total_biaya' => htmlspecialchars($this->input->post('pembayaran'), true),
                'daftar_ulang' =>  htmlspecialchars($this->input->post('daftar_ulang'), true),
                'spp' =>  htmlspecialchars($this->input->post('spp'), true),
                'lain_lain' =>  htmlspecialchars($this->input->post('lain_lain'), true)
            );

            $data_pembayaran = array(
                'id_akademik' => htmlspecialchars($this->input->post('id_akademik'), true),
                'npm_mhs' => htmlspecialchars($this->input->post('npm'), true),
                'status_pembayaran' => 'BELUM BAYAR'
            );

            $this->admin_control_krs_model->insert_krs($data);
            $this->admin_control_krs_model->insert_pembayaran($data_pembayaran);

            $output = array(
                'success' => true,
                'pesan' => 'data berhasil ditambahkan'
            );
        }
        echo json_encode($output);
    }

    function update_krs()
    {
        if ($this->input->post('semester') == 0) {
            $output = array(
                'invalid' => true,
                'pesan' => 'data semester harus diisi !'
            );
        } else {
            $npm = htmlspecialchars($this->input->post('npm'), true);
            $data = array(
                'id_akademik' => htmlspecialchars($this->input->post('id_akademik'), true),
                'semester' => htmlspecialchars($this->input->post('semester'), true),
                'total_biaya' => htmlspecialchars($this->input->post('pembayaran'), true),
                'daftar_ulang' =>  htmlspecialchars($this->input->post('daftar_ulang'), true),
                'spp' =>  htmlspecialchars($this->input->post('spp'), true),
                'lain_lain' =>  htmlspecialchars($this->input->post('lain_lain'), true)
            );
            $this->admin_control_krs_model->update_krs($npm, $data);
            $output = array(
                'success' => true,
                'pesan' => 'data berhasil diupdate'
            );
        }
        echo json_encode($output);
    }

    public function detail($npm)
    {
        $data['title'] = "Detail Krs Mahasiswa";
        $data['get_info'] = $this->admin_control_krs_model->get_info_krs($npm);
        $data['get_matkul'] = $this->admin_control_krs_model->get_data_matkul($npm);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-krs/detail', $data);
        $this->load->view('templeates/footer');
    }
}
