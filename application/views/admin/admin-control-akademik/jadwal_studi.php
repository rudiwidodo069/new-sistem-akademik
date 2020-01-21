<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><?= $title; ?></h1>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">pengelolaan akademik universitas</h3>
                <div class="add">
                    <a href="<?= base_url('admin_control_jadwal_studi/form_insert_jadwal_studi') ?>" class="btn btn-success btn-sm float-right">tambah jawal studi akademik</a>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <?php foreach ($data_akademik as $prodi) : ?>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa fa-fw fa-align-left"></i>
                                <p class="text-dark">
                                    <?= $prodi['prodi'] ?>
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-pills nav-sidebar flex-column nav-treeview" data-widget="treeview" role="menu" data-accordion="false">
                                <?php foreach ($data_semester as $semester) : ?>
                                    <li class="nav-item has-treeview ml-5">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-fw fa-align-left"></i>
                                            <p class="text-dark"><?= $prodi['prodi'] . ' SEMESTER ' . $semester; ?></p>
                                            <i class="fas fa-angle-left right"></i>
                                        </a>
                                        <ul class="nav nav-pills nav-sidebar flex-column">
                                            <div class="row">
                                                <?php foreach ($data_kelas as $kelas) : ?>
                                                    <div class="col-sm-2">
                                                        <li class="nav-item has-treeview ml-5">
                                                            <a href="<?= site_url('admin_control_jadwal_studi/detail_jadwal_studi') . '?id_akademik=' . $prodi['id_akademik'] . '&semester=' . $semester . '&kelas=' . $kelas ?>" class="nav-link">
                                                                <i class="far fa-circle nav-icon"></i>
                                                                <p>KELAS <?= $kelas; ?></p>
                                                            </a>
                                                        </li>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </ul>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>