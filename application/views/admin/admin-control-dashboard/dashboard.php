<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h1><?= $title; ?></h1>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-dark">
            <div class="card-header">
                <strong>dashboard jumlah data mahasiswa per prodi</strong>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($fatch_prodi as $prodi) : ?>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php foreach ($fatch_mhs_prodi as $mhs) : ?>
                                        <?php if ($mhs['id_akademik'] == $prodi['id_akademik']) : ?>
                                            <h3><?= $count_mhs['prodi'] ?></h3>
                                        <?php else : ?>
                                            <h3>0</h3>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <p><?= $prodi['prodi'] ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- my script -->