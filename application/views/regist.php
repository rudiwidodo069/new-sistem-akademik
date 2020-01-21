<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url('auth/regist') ?>"><b>Sistem Informasi Akadmik</b> Unindra</a>
        </div>
        <div class="pesan mt-3 mb-2">
            <strong><?= $this->session->flashdata('pesan') ?></strong>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Silakan Daftarkan Akun Anda</p>

                <form action="<?= base_url('auth/regist') ?>" method="post" id="form-regist">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="user_name" value="<?= set_value('user_name') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <span id="user_name" class="text-danger"><?= form_error('user_name') ?></span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="NPM / NID" name="id_akses" value="<?= set_value('id_akses') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas  fa-sort-numeric-up"></span>
                            </div>
                        </div>
                    </div>
                    <span id="id_akses" class="text-danger"><?= form_error('id_akses') ?></span>
                    <div class="input-group mb-3">
                        <select name="level" id="level" class="form-control">
                            <option value="0" class="text-black-50"> -- SilahKan PIlih --</option>
                            <option value="mahasiswa" class="text-black-50">Mahasiswa</option>
                            <option value="dosen" class="text-black-50">Dosen</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-level-up-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span id="email" class="text-danger"><?= form_error('email') ?></span>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password1">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span id="password" class="text-danger"><?= form_error('password1') ?></span>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="password2">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block" name="regist">Register</button>
                    </div>
                </form>

                <p class="mt-3 mb-0">
                    <a href="<?= site_url('auth') ?>" class="text-center ">Sudah punya Akun ? Silahkan Login</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- set time out alert -->
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.pesan').hide();
            }, 3000);
        });
    </script>
</body>

</html>