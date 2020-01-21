<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <div class="logout ml-3 mr-1">
        <a href="<?= site_url('auth/logout') ?>" class="text-muted size-32 border">
          <i class="fas fa-fw fa-sign-out-alt"></i>
        </a>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Sistem Akademik by Er - We</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

          <?php
          // cek user login
          $user_login = $this->session->userdata('email');
          $user = $this->db->get_where('users', ['email' => $user_login])->row_array();

          // cek jenis kelamin user
          $id_akses = $this->session->userdata('id_akses');
          $mhs = $this->db->get_where('mahasiswa', ['npm_mhs' => $id_akses])->row_array();

          // jka admin
          if ($user['level'] == "admin") :
          ?>
            <div class="image">
              <img src="<?= base_url() ?>assets/dist/img/rw.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Admin</a>
            </div>

            <!-- jika mahasiswa -->
          <?php elseif ($user['level'] == "mahasiswa") : ?>
            <!-- cek jenis kelamin buat avatar -->
            <?php if ($mhs['jenis_kelamin'] == "Laki - Laki") : ?>

              <div class="image">
                <img src="<?= base_url() ?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block"><?= $user['user_name'] ?></a>
              </div>

            <?php else : ?>

              <div class="image">
                <img src="<?= base_url() ?>assets/dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block"><?= $user['user_name'] ?></a>
              </div>

            <?php endif; ?>
            <!-- end if  jenis kelamin -->
          <?php endif; ?>
          <!-- end if mahasiswa -->
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <?php
            $user_login = $this->session->userdata('email');
            $user = $this->db->get_where('users', ['email' => $user_login])->row_array();
            if ($user['level'] == "admin") :
            ?>
              <li class="nav-item has-treeview menu-open">
                <a href="<?= base_url('admin_dashboard') ?>" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Info Akademik
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_control_akademik') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>akademik</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_control_matkul') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>kelola mata kuliah</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin_control_jadwal_studi') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>jadwal studi akademik</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Dosen
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_control_dosen') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>daftar dosen</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Mahasiswa
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_control_mahasiswa') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>daftar mahasiswa</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    User Regist
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin_control_users') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daftar User</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin_control_krs') ?>" class="nav-link">
                  <i class="nav-icon fas fa-pen"></i>
                  <p>Krs Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin_control_khs') ?>" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Khs Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin_control_pembayaran') ?>" class="nav-link">
                  <i class="nav-icon fas fa-money-bill-alt"></i>
                  <p>pembayaran akademik</p>
                </a>
              </li>
            <?php elseif ($user['level'] == "mahasiswa") :  ?>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa') ?>" class="nav-link">
                  <i class="nav-icon fas fa-money-bill-alt"></i>
                  <p>info pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/krs') ?>" class="nav-link">
                  <i class="nav-icon fas fa-pen"></i>
                  <p>info krs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/khs') ?>" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Khs Mahasiswa</p>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>