<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_control_pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_control_pembayaran_model');
    }

    public function index()
    {
        $data['title'] = "daftar pembayaran";
        $data['pembayaran_lunas'] = $this->admin_control_pembayaran_model->get_all_data_pembayaran_lunas();
        $data['pembayaran_cicilan'] = $this->admin_control_pembayaran_model->get_all_data_pembayaran_cicilan();
        $data['pembayaran_belumBayar'] = $this->admin_control_pembayaran_model->get_all_data_pembayaran_belum_bayar();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-pembayaran/pembayaran', $data);
        $this->load->view('templeates/footer');
    }

    public function insert_pembayaran()
    {
        $id_pembayaran = $this->input->get('id_pembayaran');
        $data['data_mhs'] =  $this->admin_control_pembayaran_model->get_data_mahasiswa($id_pembayaran);
        $data['title'] = "insert data pembayaran";
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-pembayaran/insert_pembayaran', $data);
        $this->load->view('templeates/footer');
    }

    function update_pembayaran()
    {
        $id_pembayaran = htmlspecialchars($this->input->post('id_pembayaran'), true);
        $cicilan_pertama = $this->input->post('cicilan_pertama');
        $cicilan_kedua = $this->input->post('cicilan_kedua');
        $cicilan_ketiga = $this->input->post('cicilan_ketiga');
        $lunas = $this->input->post('lunas');
        $total = $cicilan_pertama + $cicilan_kedua + $cicilan_ketiga + $lunas;
        $status_pembayaran = $this->input->post('status_pembayaran');
        if ($status_pembayaran != "0") {
            $data = array(
                'id_akademik' => htmlspecialchars($this->input->post('id_akademik'), true),
                'npm_mhs' => htmlspecialchars($this->input->post('npm_mhs'), true),
                'lunas' => htmlspecialchars($this->input->post('lunas'), true),
                'cicilan_pertama' => htmlspecialchars($this->input->post('cicilan_pertama'), true),
                'cicilan_kedua' => htmlspecialchars($this->input->post('cicilan_kedua'), true),
                'cicilan_ketiga' => htmlspecialchars($this->input->post('cicilan_ketiga'), true),
                'tgl_lunas' => htmlspecialchars($this->input->post('tgl_lunas'), true),
                'tgl_cicilan_pertama' => htmlspecialchars($this->input->post('tgl_cicilan_pertama'), true),
                'tgl_cicilan_kedua' => htmlspecialchars($this->input->post('tgl_cicilan_kedua'), true),
                'tgl_cicilan_ketiga' => htmlspecialchars($this->input->post('tgl_cicilan_ketiga'), true),
                'total_pembayaran' => $total,
                'status_pembayaran' => $status_pembayaran
            );

            $this->admin_control_pembayaran_model->update_pembayaran($id_pembayaran, $data);

            $output = array(
                'success' => true,
                'pesan' => 'pembayaran berhasil !'
            );
        } else {
            $output = array(
                'invalid' => true,
                'pesan' => 'maaf status pembayaran harap diisi'
            );
        }

        echo json_encode($output);
    }

    public function detail_pembayaran()
    {
        $id_pembayaran = $this->input->get('id_pembayaran');
        $data['data_mhs'] =  $this->admin_control_pembayaran_model->get_data_mahasiswa($id_pembayaran);
        $data['title'] = "detail data pembayaran";
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-pembayaran/detail_pembayaran', $data);
        $this->load->view('templeates/footer');
    }
}
