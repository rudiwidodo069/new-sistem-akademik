<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('laporan_pdf');
        $this->load->model('admin_control_krs_model');
        $this->load->model('admin_control_khs_model');
        $this->load->model('admin_control_jadwal_studi_model');
        $this->load->model('admin_control_pembayaran_model');
    }

    public function krs_pdf($npm)
    {
        $data['title'] = "krs report pdf";
        $data['get_info'] = $this->admin_control_krs_model->get_info_krs($npm);
        $data['get_matkul'] = $this->admin_control_krs_model->get_data_matkul($npm);
        $this->load->view('laporan/laporan-pdf/krs_pdf', $data);
    }

    public function krs_excel($npm)
    {
        $data['title'] = "krs report excel";
        header("content-type=application/vnd.ms-excel");
        header("content-disposition:attachment; filename=laporanDataKrsMahasiswa.xls");
        $data['get_info'] = $this->admin_control_krs_model->get_info_krs($npm);
        $data['get_matkul'] = $this->admin_control_krs_model->get_data_matkul($npm);
        $this->load->view('templeates/header', $data);
        $this->load->view('laporan/laporan-excel/krs_excel', $data);
    }

    public function khs_pdf($npm)
    {
        $data['title'] = "khs report pdf";
        $data['get_info'] = $this->admin_control_khs_model->get_data_nilai($npm);
        $data['get_matkul'] = $this->admin_control_khs_model->get_data_matkul($npm);
        $this->load->view('laporan/laporan-pdf/khs_pdf', $data);
    }

    public function khs_excel($npm)
    {
        $data['title'] = "khs report excel";
        header("content-type=application/vnd.ms-excel");
        header("content-disposition:attachment; filename=laporanDataKhsMahasiswa.xls");
        $data['data_nilai'] = $this->admin_control_khs_model->get_data_nilai($npm);
        $data['data_matkul'] = $this->admin_control_khs_model->get_data_matkul($npm);
        $this->load->view('templeates/header', $data);
        $this->load->view('laporan/laporan-excel/khs_excel', $data);
    }

    public function jadwal_studi_pdf($id_akademik, $semester, $kelas)
    {
        $data['title'] = "krs report pdf";
        $data['daftar_jadwal'] = $this->admin_control_jadwal_studi_model->get_data_jadwal_studi($id_akademik, $semester, $kelas);
        $this->load->view('laporan/laporan-pdf/jadwal_studi_pdf', $data);
    }

    public function jadwal_studi_excel($id_akademik, $semester, $kelas)
    {
        $data['title'] = "jadwal studi report excel";
        header("content-type=application/vnd.ms-excel");
        header("content-disposition:attachment; filename=laporanDataKhsMahasiswa.xls");
        $data['daftar_jadwal'] = $this->admin_control_jadwal_studi_model->get_data_jadwal_studi($id_akademik, $semester, $kelas);
        $this->load->view('templeates/header', $data);
        $this->load->view('laporan/laporan-excel/jadwal_studi_excel', $data);
    }

    public function detail_pembayaran_pdf()
    {
        $id_pembayaran = $this->input->get('id_pembayaran');
        $data['data_mhs'] =  $this->admin_control_pembayaran_model->get_data_mahasiswa($id_pembayaran);
        $data['title'] = "detail data pembayaran";
        $this->load->view('laporan/laporan-pdf/detail_pembayaran_pdf', $data);
    }
}
