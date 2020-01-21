<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><?= $title; ?></h1>
        </div>
    </section>


    <!-- DATA PEMBAYARAN LUNAS -->
    <section class="content mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Data Pembayaran lunas</strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="table-lunas" width="100%">
                            <thead>
                                <tr>
                                    <th>nama</th>
                                    <th>npm</th>
                                    <th>prodi</th>
                                    <th>semester</th>
                                    <th>status pembayaran</th>
                                    <th>total pembayaran</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pembayaran_lunas as $lunas) : ?>
                                    <tr>
                                        <td><?= $lunas['nama_mhs'] ?></td>
                                        <td><?= $lunas['npm_mhs'] ?></td>
                                        <td><?= $lunas['prodi'] ?></td>
                                        <td><?= $lunas['semester'] ?></td>
                                        <td><?= $lunas['status_pembayaran'] ?></td>
                                        <td><?= $lunas['total_pembayaran'] ?></td>
                                        <td class="text-center">
                                            <button type="button" class="badge badge-success">DONE</button>
                                            <a href="<?= base_url('admin_control_pembayaran/detail_pembayaran') . '?id_pembayaran=' . $lunas['id_pembayaran'] ?>" class="badge badge-primary">DETAIL</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DATA PEMBAYARAN CICILAN -->
    <section class="content mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Data Pembayaran Cicilan</strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="table-cicilan" width="100%">
                            <thead>
                                <tr>
                                    <th>nama</th>
                                    <th>npm</th>
                                    <th>prodi</th>
                                    <th>semester</th>
                                    <th>status pembayaran</th>
                                    <th>total pembayaran</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pembayaran_cicilan as $cicilan) : ?>
                                    <tr>
                                        <td><?= $cicilan['nama_mhs'] ?></td>
                                        <td><?= $cicilan['npm_mhs'] ?></td>
                                        <td><?= $cicilan['prodi'] ?></td>
                                        <td><?= $cicilan['semester'] ?></td>
                                        <td><?= $cicilan['status_pembayaran'] ?></td>
                                        <td><?= $cicilan['total_pembayaran'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin_control_pembayaran/insert_pembayaran') . '?id_pembayaran=' . $cicilan['id_pembayaran'] ?>" class="badge badge-warning">UPDATE</a>
                                            <a href="<?= base_url('admin_control_pembayaran/detail_pembayaran') . '?id_pembayaran=' . $cicilan['id_pembayaran'] ?>" class="badge badge-primary">DETAIL</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- DATA PEMBAYARAN BELUM BAYAR -->
    <section class="content mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Data Pembayaran Belum Bayar</strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="table-belum-bayar" width="100%">
                            <thead>
                                <tr>
                                    <th>nama</th>
                                    <th>npm</th>
                                    <th>prodi</th>
                                    <th>semester</th>
                                    <th>status pembayaran</th>
                                    <th>total pembayaran</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pembayaran_belumBayar as $belumBayar) : ?>
                                    <tr>
                                        <td><?= $belumBayar['nama_mhs'] ?></td>
                                        <td><?= $belumBayar['npm_mhs'] ?></td>
                                        <td><?= $belumBayar['prodi'] ?></td>
                                        <td><?= $belumBayar['semester'] ?></td>
                                        <td><?= $belumBayar['status_pembayaran'] ?></td>
                                        <td><?= $belumBayar['total_pembayaran'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin_control_pembayaran/insert_pembayaran') . '?id_pembayaran=' . $belumBayar['id_pembayaran'] ?>" class="badge badge-warning">INSERT</a>
                                            <a href="<?= base_url('admin_control_pembayaran/detail_pembayaran') . '?id_pembayaran=' . $belumBayar['id_pembayaran'] ?>" class="badge badge-primary">DETAIL</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- myscript -->
    <script>
        $(document).ready(function() {
            var tableLunas = $('#table-lunas').DataTable();
            var tableCicilan = $('#table-cicilan').DataTable();
            var tableBelumBayar = $('#table-belum-bayar').DataTable();
        });
    </script>