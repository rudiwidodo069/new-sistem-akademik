<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_control_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek user login
        $this->load->model('admin_control_mahasiswa_model');
        $this->load->helper('univ_helper');
    }

    public function index()
    {
        $data['title'] = "Daftar Mahasiswa";
        $data['daftar_kelas'] = kelas();
        $data['daftar_perkuliahan'] = perkuliahan();
        $data['daftar_jurusan'] = $this->admin_control_mahasiswa_model->get_all_data_akademik();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-mahasiswa/mahasiswa', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_mahasiswa()
    {
        $fatch_data = $this->admin_control_mahasiswa_model->get_all_data_mahasiswa();
        $data = array();
        $no = 1;
        foreach ($fatch_data as $row) {
            $mhs = array();
            $mhs[] = $no . '.';
            $mhs[] = $row['npm_mhs'];
            $mhs[] = $row['nama_mhs'];
            $mhs[] = $row['kelas'];
            $mhs[] = $row['perkuliahan'];
            $mhs[] = $row['kode_prodi'];
            $mhs[] = $row['prodi'];
            $mhs[] = $row['tahun_masuk'];
            $mhs[] = '<div class="text-center">
            <button class="badge badge-warning mr-2" data-npm="' . $row['npm_mhs'] . '" id="update-data" data-target="#modal-update" data-toggle="modal">
                 <i class="fas fa-fw fa-user-edit"></i>
            </button>
            <a href=" ' . base_url('admin_control_mahasiswa/detail/') . $row['npm_mhs'] .  ' " class="badge badge-primary" id="info-mhs">
                <i class="fas fa-fw fa-info"></i>
            </a>
            <button class="badge badge-danger ml-2" data-npm="' . $row['npm_mhs'] . '" id="delete-mahasiswa">
                <i class="fas fa-fw fa-trash"></i>
            </button>
            </div>';
            $data[] = $mhs;
            $no++;
        }

        $output = array(
            'draw' => $_POST["draw"],
            'recordsTotal' => $this->admin_control_mahasiswa_model->count_all_data(),
            'recordsFiltered' => $this->admin_control_mahasiswa_model->get_filtered_data(),
            'data' => $data
        );

        echo json_encode($output);
    }

    function insert_data_mahasiswa()
    {
        $this->_validation();

        $npm = htmlspecialchars($this->input->post('npm'), true);

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'npm' => form_error('npm'),
                'nama' => form_error('nama'),
                'tahun_masuk' => form_error('tahun_masuk'),
                'tempat_lahir' => form_error('tempat_lahir'),
                'tgl_lahir' => form_error('tgl_lahir'),
                'alamat' => form_error('alamat')
            );
        } else {
            // cek npm apakah sudah terdaftar apa belum
            $mhs = $this->admin_control_mahasiswa_model->get_data_mahasiswa($npm);

            if ($mhs == 0) {

                $data_mhs = array(
                    'npm_mhs' => $npm,
                    'nama_mhs' => htmlspecialchars($this->input->post('nama'), true),
                    'kelas' => htmlspecialchars($this->input->post('kelas'), true),
                    'id_akademik' => htmlspecialchars($this->input->post('jurusan'), true),
                    'perkuliahan' => htmlspecialchars($this->input->post('perkuliahan'), true),
                    'tahun_masuk' => htmlspecialchars($this->input->post('tahun_masuk'), true),
                    'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir'), true),
                    'tanggal_lahir' => htmlspecialchars($this->input->post('tgl_lahir'), true),
                    'alamat' => htmlspecialchars($this->input->post('alamat'), true),
                    'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin'), true)
                );

                $this->admin_control_mahasiswa_model->insert_data_mahasiswa($data_mhs);

                $output = array(
                    'success' => true,
                    'mahasiswa' => 'insert data  mahasiswa'
                );
            } else {
                $output = array(
                    'invalid' => true,
                    'mahasiswa' => 'mahasiswa sudah terdaftar'
                );
            }
        }
        echo json_encode($output);
    }

    function get_data_mahasiswa()
    {
        $npm = $this->input->post('npm');
        $output = $this->admin_control_mahasiswa_model->get_data_mahasiswa($npm);
        echo json_encode($output);
    }

    function update_data_mahasiswa()
    {
        $this->_validation();

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'npm' => form_error('npm'),
                'nama' => form_error('nama'),
                'tahun_masuk' => form_error('tahun_masuk'),
                'tempat_lahir' => form_error('tempat_lahir'),
                'tgl_lahir' => form_error('tgl_lahir'),
                'alamat' => form_error('alamat')
            );
        } else {
            $npm = htmlspecialchars($this->input->post('npm'), true);
            $data_mhs = array(
                'nama_mhs' => htmlspecialchars($this->input->post('nama'), true),
                'kelas' => htmlspecialchars($this->input->post('kelas'), true),
                'id_akademik' => htmlspecialchars($this->input->post('jurusan'), true),
                'perkuliahan' => htmlspecialchars($this->input->post('perkuliahan'), true),
                'tahun_masuk' => htmlspecialchars($this->input->post('tahun_masuk'), true),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir'), true),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tgl_lahir'), true),
                'alamat' => htmlspecialchars($this->input->post('alamat'), true),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin'), true)
            );

            $this->admin_control_mahasiswa_model->update_data_mahasiswa($npm, $data_mhs);

            $output = array(
                'success' => true,
                'mahasiswa' => 'update data mahasiswa berhasil'
            );
        }
        echo json_encode($output);
    }

    private function _validation()
    {
        $this->form_validation->set_rules('npm', 'npm', 'required|trim|numeric|max_length[12]|min_length[12]');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('kelas', 'kelas', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('perkuliahan', 'perkuliahan', 'required|trim');
        $this->form_validation->set_rules('tahun_masuk', 'tahun masuk', 'required|trim|numeric|max_length[4]|min_length[4]');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required|trim');
    }

    function delete_data_mahasiswa()
    {
        $npm = $this->input->post('npm');
        $this->admin_control_mahasiswa_model->delete_data_mahasiswa($npm);
        $output = array(
            'success' => true,
            'pesan' => 'delete mahasiswa berhasil !'
        );
        echo json_encode($output);
    }

    public function detail($npm)
    {
        $data['title'] = "Detail Mahasiswa";
        $data['daftar_mahasiswa'] = $this->admin_control_mahasiswa_model->get_data_mahasiswa($npm);
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-mahasiswa/detail', $data);
        $this->load->view('templeates/footer');
    }
}
