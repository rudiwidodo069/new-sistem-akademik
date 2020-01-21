<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><?= $title; ?></h1>
        </div>
    </section>


    <!-- DATA PEMBAYARAN LUNAS -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">detail pembayaran akademik mahasiswa</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card img-bordered">
                                        <div class="img text-center mt-2">
                                            <?php if ($data_mhs['jenis_kelamin'] == "Laki - Laki") : ?>
                                                <img src="<?= base_url() ?>assets/dist/img/avatar5.png" class="img-bordered img-thumbnail img-circle">
                                            <?php else : ?>
                                                <img src="<?= base_url() ?>assets/dist/img/avatar2.png" class="img-bordered img-thumbnail img-circle">
                                            <?php endif; ?>
                                        </div>
                                        <div class="user-detail ml-5 mt-3">
                                            <p><strong>nama mahasiswa : </strong><?= $data_mhs['nama_mhs'] ?></p>
                                            <p><strong>npm mahasiswa : </strong><?= $data_mhs['npm_mhs'] ?></p>
                                            <p><strong>kelas mahasiswa : </strong><?= $data_mhs['kelas'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card img-bordered">
                                        <table class="table table-sm">
                                            <tr>
                                                <th>kode prodi</th>
                                                <td colspan="3">: <?= $data_mhs['kode_prodi'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>prodi</th>
                                                <td colspan="3">: <?= $data_mhs['prodi'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>perkuliahan</th>
                                                <td colspan="3">: <?= $data_mhs['perkuliahan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>biaya akademik semster <?= $data_mhs['semester'] ?></th>
                                                <td colspan="3">: Rp. <?= number_format($data_mhs['total_biaya']) ?></td>
                                            </tr>
                                            <tr>
                                                <th>tanggal cicilan pertama</th>
                                                <td>: <?= $data_mhs['tgl_cicilan_pertama'] ?></td>
                                                <th>pembayaran cicilan pertama</th>
                                                <td>: Rp. <?= number_format($data_mhs['cicilan_pertama']) ?></td>
                                            </tr>
                                            <tr>
                                                <th>tanggal cicilan kedua</th>
                                                <td>: <?= $data_mhs['tgl_cicilan_kedua'] ?></td>
                                                <th>pembayaran cicilan kedua</th>
                                                <td>: Rp. <?= number_format($data_mhs['cicilan_kedua']) ?></td>
                                            </tr>
                                            <tr>
                                                <th>tanggal cicilan ketiga</th>
                                                <td>: <?= $data_mhs['tgl_cicilan_ketiga'] ?></td>
                                                <th>pembayaran cicilan ketiga</th>
                                                <td>: Rp. <?= number_format($data_mhs['cicilan_ketiga']) ?></td>
                                            </tr>
                                            <tr>
                                                <th>tanggal pelunasan pembayaran</th>
                                                <td>: <?= $data_mhs['tgl_lunas'] ?></td>
                                                <th>pembayaran lunas</th>
                                                <td>: Rp. <?= number_format($data_mhs['lunas']) ?></td>
                                            </tr>
                                            <tr>
                                                <th>total pembayaran </th>
                                                <td colspan="3">: Rp. <?= number_format($data_mhs['total_pembayaran']) ?></td>
                                            </tr>
                                            <tr>
                                                <th>status pembayaran akademik</th>
                                                <td colspan="3"><?= $data_mhs['status_pembayaran'] ?></td>
                                            </tr>
                                        </table>
                                        <div class="footer mt-n2">
                                            <a href="<?= base_url('laporan_report/detail_pembayaran_pdf') . '?id_pembayaran=' . $_GET['id_pembayaran'] ?>" class="btn btn-danger btn-sm float-right mr-3 ml-3"><i class="fas fa-fw fa-file-pdf"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>