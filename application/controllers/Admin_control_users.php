<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_control_users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek session user level

        $this->load->model('admin_control_users_model');
    }

    function aktivasi_update()
    {
        $data = array(
            'active', 'non-active'
        );
        return $data;
    }

    public function index()
    {
        $data['title'] = "Daftar User";
        $data['aktivasi_update'] = $this->aktivasi_update();
        $this->load->view('templeates/header', $data);
        $this->load->view('templeates/sidebar');
        $this->load->view('admin/admin-control-users/users', $data);
        $this->load->view('templeates/footer');
    }

    function get_all_data_user()
    {
        $user_data = $this->admin_control_users_model->get_all_user();
        $data = array();
        $no = 1;
        foreach ($user_data as $user) {
            $list_user = array();
            $list_user[] = $no . '.';
            $list_user[] = $user['user_name'];
            $list_user[] = $user['id_akses'];
            $list_user[] = $user['level'];
            $list_user[] = $user['email'];
            $list_user[] = $user['password'];
            $list_user[] = $user['is_active'];
            $list_user[] = '<button type="button" class="badge badge-warning" 
                                    data-id=" ' . $user['id'] . ' " 
                                    data-target="#update" data-toggle="modal" id="get-update">
                                        <i class="fas fa-fw fa-user-edit"></i>
                                    </button>
                                    <button type="button" class="badge badge-danger" data-id=" ' . $user['id'] . '" id="delete">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </button>';
            $data[] = $list_user;
            $no++;
        }

        $output = array(
            'draw' => $_POST["draw"],
            'recordsTotal' => $this->admin_control_users_model->get_count_data(),
            'recordsFiltered' => $this->admin_control_users_model->get_filter_data(),
            'data' => $data
        );
        echo json_encode($output);
    }

    function get_data_user()
    {
        $id_user = $this->input->post('id_user');
        $data = $this->admin_control_users_model->get_data_user($id_user);
        $output = array(
            'id' => $data['id'],
            'user_name' => $data['user_name'],
            'id_akses' => $data['id_akses'],
            'level' => $data['level'],
            'email' => $data['email'],
            'password' => $data['password'],
            'is_active' => $data['is_active']
        );
        echo json_encode($output);
    }

    function update_data_user()
    {
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('user_name');
        $id_akses = $this->input->post('id_akses');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $level = $this->input->post('level');
        $is_active = $this->input->post('is_active');
        $data  = array(
            'user_name' => $username,
            'id_akses' => $id_akses,
            'password' => $password,
            'email' => $email,
            'level' => $level,
            'is_active' => $is_active
        );
        $output = $this->admin_control_users_model->update_data_user($id_user, $data);
        echo json_encode($output);
    }

    function delete_data_user()
    {
        $id_user = $this->input->post('id_user');
        $output = $this->admin_control_users_model->delete_data_user($id_user);
        echo json_encode($output);
    }
}
