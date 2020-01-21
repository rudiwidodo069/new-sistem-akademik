<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_control_jadwal_studi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('univ_helper');
        $this->load->model('admin_control_jadwal_studi_model');
    }

    public function index()
    {
        $data['title'] = "daftar jadwal akademik";
        $data['data_akademik'] = $this->admin_control_jadwal_studi_model->get_all_prodi();
        $data['data_semester'] = semeter_akademik();
        $data['data_kelas'] = kelas();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-akademik/jadwal_studi', $data);
        $this->load->view('templeates/footer');
    }

    public function form_insert_jadwal_studi()
    {
        $data['title'] = "form jadwal akademik";
        $data['data_akademik'] = $this->admin_control_jadwal_studi_model->get_all_prodi();
        $data['data_semester'] = semeter_akademik();
        $data['data_kelas'] = kelas();
        $data['data_hari'] = hari();
        $data['data_jam'] = jam();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-akademik/insert_jadwal_studi', $data);
        $this->load->view('templeates/footer');
    }

    function get_data_prodi()
    {
        $id_akademik = $this->input->post('id_akademik');
        $output = $this->admin_control_jadwal_studi_model->get_data_prodi($id_akademik);
        echo json_encode($output);
    }

    function get_all_data_matkul()
    {
        $id = $this->input->post('id_akademik');
        $smt = $this->input->post('semester');
        if ($smt == "0") {
            $output = array(
                'error' => true,
                'pesan' => 'semester harap di isi'
            );
        } else {
            $data = $this->admin_control_jadwal_studi_model->get_all_data_matkul($id, $smt);
            if ($data) {
                $output = $data;
            } else {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'maaf data mata kuliah belum tersedia'
                );
            }
        }
        echo json_encode($output);
    }

    function get_data_matkul()
    {
        $id = $this->input->post('matkul_id');
        $output = $this->admin_control_jadwal_studi_model->get_data_matkul($id);
        echo json_encode($output);
    }

    function insert_jadwal_studi()
    {
        $this->form_validation->set_rules('ruangan', 'daftar ruangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'ruangan_err' => form_error('ruangan')
            );
        } else {
            $kelas = htmlspecialchars($this->input->post('kelas'), true);
            $hari = htmlspecialchars($this->input->post('hari'), true);
            $jam = htmlspecialchars($this->input->post('jam'), true);
            $kode_matkul = htmlspecialchars($this->input->post('kode_matkul'), true);

            $get_info_jadwal = $this->admin_control_jadwal_studi_model->get_info_jadwal($kode_matkul, $hari, $jam);

            $smt = htmlspecialchars($this->input->post('semester'), true);
            if ($get_info_jadwal) {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'maaf jadwal bentrok dengan kelas ' . $get_info_jadwal['kelas'] . ' hari ' . $get_info_jadwal['hari'] . ' jam ' . $get_info_jadwal['jam']
                );
            } else {

                if ($smt != "0") {

                    if ($kelas != "0") {

                        if ($hari != "0") {

                            if ($jam != "0") {

                                $data = array(
                                    'semester' => $smt,
                                    'id_akademik' => htmlspecialchars($this->input->post('id_akademik'), true),
                                    'kelas' => $kelas,
                                    'ruangan' => htmlspecialchars($this->input->post('ruangan'), true),
                                    'kode_matkul' => $kode_matkul,
                                    'hari' => $hari,
                                    'jam' => $jam
                                );
                                $this->admin_control_jadwal_studi_model->insert_jadwal_studi($data);
                                $output = array(
                                    'success' => true,
                                    'pesan' => 'insert jadwal studi berhasil !'
                                );
                            } else {
                                $output = array(
                                    'invalid' => true,
                                    'pesan' => 'data jam harap diisi'
                                );
                            }
                        } else {
                            $output = array(
                                'invalid' => true,
                                'pesan' => 'data hari harap diisi'
                            );
                        }
                    } else {
                        $output = array(
                            'invalid' => true,
                            'pesan' => 'data kelas harap diisi'
                        );
                    }
                } else {
                    $output = array(
                        'invalid' => true,
                        'pesan' => 'data semester harap diisi'
                    );
                }
            }
        }

        echo json_encode($output);
    }

    function get_update_jadwal_studi()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $output  = $this->admin_control_jadwal_studi_model->get_update_jadwal_studi($id_jadwal);
        echo json_encode($output);
    }

    function update_jadwal_studi()
    {
        $id_jadwal = $this->input->post('id_jadwal');

        $this->form_validation->set_rules('ruangan', 'ruangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $output = array(
                'error' => true,
                'ruangan_err' => form_error('ruangan')
            );
        } else {
            $kode_matkul = $this->input->post('kode_matkul');
            $hari = $this->input->post('hari');
            $jam = $this->input->post('jam');
            $kelas = $this->input->post('kelas');

            // cek data jadwal perkode matkul
            $get_info_jadwal = $this->admin_control_jadwal_studi_model->get_info_jadwal($kode_matkul, $hari, $jam);
            // cek hari da jam pada kelas
            $get_info_jam = $this->admin_control_jadwal_studi_model->get_info_jam($kelas, $hari, $jam);

            if ($get_info_jadwal) {
                $output = array(
                    'invalid' => true,
                    'pesan' => 'maaf jadwal bentrok dengan kelas ' . $get_info_jadwal['kelas'] . ' hari ' . $get_info_jadwal['hari'] . ' jam ' . $get_info_jadwal['jam']
                );
            } else {
                if ($get_info_jam) {
                    $output = array(
                        'invalid' => true,
                        'pesan' => 'maaf jam bentrok pada hari ' . $get_info_jam['hari'] . ' jam ' . $get_info_jam['jam']
                    );
                } else {
                    $data = array(
                        'semester' => $this->input->post('semester'),
                        'id_akademik' => $this->input->post('id_akademik'),
                        'kelas' => $kelas,
                        'ruangan' => $this->input->post('ruangan'),
                        'kode_matkul' => $kode_matkul,
                        'hari' => $hari,
                        'jam' => $jam
                    );

                    $this->admin_control_jadwal_studi_model->update_jadwal_studi($id_jadwal, $data);
                    $output = array(
                        'success' => true,
                        'pesan' => 'update jadwal studi berhasil !'
                    );
                }
            }
        }
        echo json_encode($output);
    }

    function delete_jadwal_studi()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $this->admin_control_jadwal_studi_model->delete_jadwal_studi($id_jadwal);
    }

    public function detail_jadwal_studi()
    {
        $data['title'] = "detail jadwa akademik";
        $data['data_kelas'] = kelas();
        $data['data_hari'] = hari();
        $data['data_jam'] = jam();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-akademik/detail_jadwal_studi', $data);
        $this->load->view('templeates/footer');
    }

    function get_detail_jadwal()
    {
        $id_akademik = $this->input->post('id_akademik');
        $semester = $this->input->post('semester');
        $kelas = $this->input->post('kelas');

        $output = $this->admin_control_jadwal_studi_model->get_data_jadwal_studi($id_akademik, $semester, $kelas);

        echo json_encode($output);
    }
}
