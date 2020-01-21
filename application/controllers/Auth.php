<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        cek_session();
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[7]');
        if ($this->form_validation->run() == false) {
            $data['title'] = "login";
            $this->load->view('login', $data);
        } else {
            $this->login();
        }
    }

    function login()
    {
        $email = htmlspecialchars($this->input->post('email'), true);
        $password = htmlentities($this->input->post('password'), true);

        $user = $this->Auth_model->get_user_data_email($email);

        // cek user login
        if ($user == true) {
            // cek password
            if (password_verify($password, $user['password'])) {
                // cek akun aktif atau tidak
                if ($user['is_active'] == 'active') {
                    // buat session data dari user login
                    $data = array(
                        'user_name' => $user['user_name'],
                        'id_akses' => $user['id_akses'],
                        'email' => $user['email'],
                        'level' => $user['level']
                    );
                    // set session user
                    $this->session->set_userdata($data);

                    // cek user login admin
                    if ($user['level'] == 'admin') {
                        redirect('admin_dashboard');
                    } else if ($user['level'] == 'mahasiswa') {
                        redirect('mahasiswa');
                    } else {
                        redirect('dosen');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning text-center" role="alert">
                    <strong>silahkan aktivasi akun anda !</strong>
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                <strong>maaaf password salah !</strong>
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
            <strong>maaaf akun anda belum terdaftar !</strong>
            </div>');
            redirect('auth');
        }
    }

    public function regist()
    {
        cek_session();
        // set form validation 
        $this->form_validation->set_rules('user_name', 'username', 'required|trim');
        $this->form_validation->set_rules('id_akses', 'npm / nim', 'required|trim|numeric|min_length[12]|max_length[12]');
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[7]|matches[password2]');
        $this->form_validation->set_rules('password2', 'confirm password', 'required|trim|min_length[7]|matches[password1]');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[users.email]');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Registrasi";
            $this->load->view('regist', $data);
        } else {
            $this->insert_data_regist();
        }
    }

    function insert_data_regist()
    {
        // user input
        $user_name = htmlspecialchars($this->input->post('user_name'), true);
        $id_akses = htmlspecialchars($this->input->post('id_akses'), true);
        $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $email = htmlspecialchars($this->input->post('email'), true);
        $level = htmlspecialchars($this->input->post('level'), true);

        // memastikan bahwa user regist berasal dari universitas tersebut
        $cek_id_akses_mhs = $this->Auth_model->get_npm_mhs_by_id($id_akses);
        $cek_id_akses_dosen = $this->Auth_model->get_nid_dosen_by_id($id_akses);
        $cek_id_akses_user = $this->Auth_model->get_id_akses_user_by_id($id_akses);

        // user token aktivasi
        $token = base64_encode(random_bytes(32));

        // cek apakah user regist via form regist
        if (isset($_POST['regist'])) {
            // cek apakah id akses user regist sudah ada
            if ($cek_id_akses_user == 0) {
                // cek id_akses valid atau tidak dengan data di table mahasiswa dan table dosen
                if ($cek_id_akses_mhs  || $cek_id_akses_dosen) {
                    // cek level user regist 
                    if ($cek_id_akses_mhs['level'] == $level || $cek_id_akses_dosen['level'] == $level) {
                        $data = array(
                            'user_name' => $user_name,
                            'id_akses' => $id_akses,
                            'password' => $password,
                            'email' => $email,
                            'level' => $level,
                            'is_active' => 'non-active'
                        );
                        $data_token = array(
                            'email' => $email,
                            'token' => $token,
                            'time_created' => time()
                        );
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                        <strong>akses level akses anda tidak sesuai</strong>
                        </div>');
                        redirect('auth/regist');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                    <strong>anda bukan dari universitas kami</strong>
                   </div>');
                    redirect('auth/regist');
                };
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                <strong>Npm atau Nid tersebut sudah terdaftar</strong>
               </div>');
                redirect('auth/regist');
            }
        } else {
            return false;
        }

        $this->Auth_model->insert_data_regist($data);
        $this->Auth_model->insert_data_token($data_token);

        // send email verifikasi
        $this->sendEmail($token, 'aktivasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary text-center" role="alert">
            <strong>Silahkan Cek email anda !</strong>
            </div>');
        redirect('auth');
    }

    function sendEmail($token, $type)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'rudiwid9@gmail.com',
            'smtp_pass' => 'Jancuklah098',
            'wordwrap' => true,
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('rudiwid9@gmail.com', 'Er - We Software Developer');
        $this->email->to($this->input->post('email'));

        if ($type == 'aktivasi') {
            $this->email->subject('confirmation your account');
            $msg = '<html>
                            <head>
                                <title>Konfirmasi email</title>
                            </head>
                            <body>
                                <center><h1><strong>Silahkan Aktivasi Akun Anda</strong></h1></center>
                                <center><p><strong>Nama : </strong> ' . $this->input->post('user_name') . '</p></center>
                                <center><p><strong>Akses Level : </strong>' . $this->input->post('level') . '</p></center>
                                <center><p><strong>Email : </strong>' . $this->input->post('email') . '</p></center>
                                <center><p><strong>Password : </strong>' . $this->input->post('password1') . '</p></center>
                                <center><h3><strong>klik link yang ada dibawah ini !</strong></h3></center>
                                <center><a href="' . base_url() . 'auth/aktivasi?email=' . $this->input->post('email') . '&token=' .  urlencode($token) . '">Aktivasi Skarang :)</a></center>
                            </body>
                         </html>';
            $this->email->message($msg);
        } else if ($type == 'lupaPassword') {
            $this->email->subject('change your password');
            $msg = '<html>
                            <head>
                                <title>change password</title>
                            </head>
                            <body>
                                <center><h1><strong>Silahkan Ganti Password Anda</strong></h1></center>
                                <center><p><strong>Email : </strong>' . $this->input->post('email') . '</p></center>
                                <center><h3><strong>klik link yang ada dibawah ini !</strong></h3></center>
                                <center><a href="' . base_url() . 'auth/change?email=' . $this->input->post('email') . '&token=' .  urlencode($token) . '">lanjutkan :)</a></center>
                            </body>
                         </html>';
        }
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return $this->email->print_debugger();
        }
    }

    public function aktivasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // cek email valid apa tidak
        $cek_email = $this->Auth_model->get_user_data_email($email);
        $user_email = $cek_email['email'];

        // cek user token aktif apa tidak
        $cek_user_token = $this->Auth_model->get_user_data_token($token);
        $user_token = $cek_user_token['token'];
        $user_token_created = $cek_user_token['time_created'];

        if ($cek_email) {
            if ($cek_user_token) {
                if (time() - $user_token_created < (60 * 180)) {

                    $this->Auth_model->update_data_user($user_email);
                    $this->Auth_model->delete_data_token($user_token);

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">
                    <strong>selamat akun anda sudah siap digunakan</strong>
                    </div>');
                    redirect('auth');
                } else {
                    $this->Auth_model->delete_data_user($user_email);
                    $this->Auth_model->delete_data_token($user_token);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                    <strong>token sudah kadaluarsa !</strong>
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                <strong>user token todak valid !</strong>
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
            <strong>email tidak valid !</strong>
            </div>');
            redirect('auth');
        }
    }

    public function change()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // cek email valid apa tidak
        $cek_email = $this->Auth_model->get_user_data_email($email);
        $user_email = $cek_email['email'];

        // cek user token aktif apa tidak
        $cek_user_token = $this->Auth_model->get_user_data_token($token);
        $user_token = $cek_user_token['token'];
        $user_token_created = $cek_user_token['time_created'];

        if ($cek_email) {
            if ($cek_user_token) {
                if (time() - $user_token_created < (60 * 180)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->change_password();
                } else {
                    $this->Auth_model->delete_data_token($user_token);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                    <strong>token sudah kadaluarsa !</strong>
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                <strong>user token todak valid !</strong>
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
            <strong>email tidak valid !</strong>
            </div>');
            redirect('auth');
        }
    }

    function change_password()
    {
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[7]|matches[password2]');
        $this->form_validation->set_rules('password2', 'confirm password', 'required|trim|min_length[7]|matches[password1]');
        $data['title'] = 'change password';
        if ($this->form_validation->run() == false) {
            $this->load->view('change_password', $data);
        } else {
            $email = $this->session->userdata('reset_email');
            $pass = htmlspecialchars(password_hash($this->input->post('password1'), true), PASSWORD_DEFAULT);

            $this->Auth_model->change_password($email, $pass);
            $this->Auth_model->delete_data_token_change_pass($email);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">
            <strong>silahkan login kembali !</strong>
            </div>');
            redirect('auth');
        }
    }

    public function lupa_password()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $data['title'] = 'lupa password';
        if ($this->form_validation->run() == false) {
            $this->load->view('lupa_password', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email'), true);
            $user = $this->Auth_model->get_user_data_email($email);

            if ($user) {

                $token = base64_encode(random_bytes(32));
                $data_token = array(
                    'email' => $email,
                    'token' => $token,
                    'time_created' => time()
                );
                $this->Auth_model->insert_data_token($data_token);
                $this->sendEmail($token, 'lupaPassword');
                $this->session->set_flashdata('pesan', '<div class="alert alert-primary text-center" role="alert">
                <strong>silahkan cek email anda !</strong>
                </div>');
                redirect('auth/lupa_password');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
                <strong>email belum terdaftar !</strong>
                </div>');
                redirect('auth/lupa_password');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('id_akses');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('pesan', '<div class="alert alert-primary text-center" role="alert">
        <strong>terima kasih sudah berkunjung !</strong>
        </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('403');
    }
}
