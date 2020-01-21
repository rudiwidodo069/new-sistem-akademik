<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><?= $title; ?></h1>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Mahasiswa Krs</h3>
                        <div id="print-data">
                            <a href="<?= base_url('laporan_report/krs_pdf/') . $get_info['npm_mhs'] ?>" class="btn btn-danger btn-sm float-right ml-3">
                                <i class="fas fa-fw fa-file-pdf"></i>
                            </a>
                            <a href="<?= base_url('laporan_report/krs_excel/') . $get_info['npm_mhs'] ?>" class="btn btn-success btn-sm float-right ml-3">
                                <i class="fas fa-fw fa-file-excel"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class=" card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <table cellpadding="8">
                                        <tr>
                                            <th>nama mahasiswa</th>
                                            <td>: <?= $get_info['nama_mhs']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>npm mahasiswa</th>
                                            <td>: <?= $get_info['npm_mhs']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>kelas mahasiswa</th>
                                            <td>: <?= $get_info['kelas']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <table cellpadding="8">
                                        <tr>
                                            <th>kode prodi</th>
                                            <td>: <?= $get_info['kode_prodi']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>prodi</th>
                                            <td>: <?= $get_info['prodi']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>semester akademik</th>
                                            <td>: <?= $get_info['semester']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="table mt-4">
                                    <table class="table table-bordered table-sm">
                                        <thead class="text-center">
                                            <tr>
                                                <th>prodi</th>
                                                <th>kode mata kuliah</th>
                                                <th>mata kuliah</th>
                                                <th>sks</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php $jumlah_sks = 0; ?>
                                            <?php foreach ($get_matkul as $matul) : ?>
                                                <?php if ($get_info['semester'] == $matul['semester'] && $get_info['id_akademik'] == $matul['id_akademik']) : ?>
                                                    <tr>
                                                        <td><?= $matul['prodi']; ?></td>
                                                        <td><?= $matul['kode_matkul']; ?></td>
                                                        <td><?= $matul['matkul']; ?></td>
                                                        <td><?= $matul['sks']; ?></td>
                                                    </tr>
                                                    <?php $jumlah_sks += $matul['sks'] ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-center">
                                                <th colspan="3">jumlah sks</th>
                                                <td><?= $jumlah_sks; ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>