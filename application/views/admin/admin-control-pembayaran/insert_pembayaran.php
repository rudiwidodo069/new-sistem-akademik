<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><?= $title; ?></h1>
        </div>
    </section>


    <!-- DATA PEMBAYARAN LUNAS -->
    <section class="content">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">form insert data pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="id_pembayaran" id="id_pembayaran" class="form-control" value="<?= $data_mhs['id_pembayaran'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="npm">npm mahasiswa</label>
                                </div>
                                <input type="text" name="npm" id="npm" class=" form-control" value="<?= $data_mhs['npm_mhs'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="nama">nama mahasiswa</label>
                                </div>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $data_mhs['nama_mhs'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="prodi">prodi</label>
                                </div>
                                <input type="text" name="prodi" id="prodi" class="form-control" value="<?= $data_mhs['prodi'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id_akademik" id="id_akademik" class="form-control" value="<?= $data_mhs['id_akademik'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="tgl_cicilan_pertama">tanggal cicilan pertama</label>
                                </div>
                                <input type="date" name="tgl_cicilan_pertama" id="tgl_cicilan_pertama" class="form-control" value="<?= $data_mhs['tgl_cicilan_pertama'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="tgl_cicilan_kedua">tanggal cicilan kedua</label>
                                </div>
                                <input type="date" name="tgl_cicilan_kedua" id="tgl_cicilan_kedua" class="form-control" value="<?= $data_mhs['tgl_cicilan_kedua'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="tgl_cicilan_ketiga">tanggal cicilan ketiga</label>
                                </div>
                                <input type="date" name="tgl_cicilan_ketiga" id="tgl_cicilan_ketiga" class="form-control" value="<?= $data_mhs['tgl_cicilan_ketiga'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="tgl_lunas">tanggal pelunasan</label>
                                </div>
                                <input type="date" name="tgl_lunas" id="tgl_lunas" class="form-control" value="<?= $data_mhs['tgl_lunas'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="cicilan_pertama">jumlah cicilan pertama</label>
                                </div>
                                <input type="number" name="cicilan_pertama" id="cicilan_pertama" class="form-control" value="<?= $data_mhs['cicilan_pertama'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="cicilan_kedua">jumlah cicilan kedua</label>
                                </div>
                                <input type="number" name="cicilan_kedua" id="cicilan_kedua" class="form-control" value="<?= $data_mhs['cicilan_kedua'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="cicilan_ketiga">jumlah cicilan ketiga</label>
                                </div>
                                <input type="number" name="cicilan_ketiga" id="cicilan_ketiga" class="form-control" value="<?= $data_mhs['cicilan_ketiga'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="lunas">jumlah lunas</label>
                                </div>
                                <input type="number" name="lunas" id="lunas" class="form-control" value="<?= $data_mhs['lunas'] ?>">
                            </div>

                            <div class="form-group">
                                <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                    <option value="<?= $data_mhs['status_pembayaran'] ?>" selected><?= $data_mhs['status_pembayaran'] ?></option>
                                    <option value="LUNAS">LUNAS</option>
                                    <option value="CICILAN">CICILAN</option>
                                </select>
                            </div>

                            <a href="<?= base_url('admin_control_pembayaran') ?>" class="btn btn-primary">kembali</a>
                            <button type="submit" class="btn btn-success float-right" id="update-pembayaran">insert data pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- myscript -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '#update-pembayaran', function(e) {
                e.preventDefault();
                let id_pembayaran = $('#id_pembayaran').val();
                let npm = $('#npm').val();
                let id_akademik = $('#id_akademik').val();
                let tgl_cicilan_pertama = $('#tgl_cicilan_pertama').val();
                let tgl_cicilan_kedua = $('#tgl_cicilan_kedua').val();
                let tgl_cicilan_ketiga = $('#tgl_cicilan_ketiga').val();
                let tgl_lunas = $('#tgl_lunas').val();
                let cicilan_pertama = $('#cicilan_pertama').val();
                let cicilan_kedua = $('#cicilan_kedua').val();
                let cicilan_ketiga = $('#cicilan_ketiga').val();
                let lunas = $('#lunas').val();
                let status_pembayaran = $('#status_pembayaran').val();
                $.ajax({
                    url: "<?= site_url('admin_control_pembayaran/update_pembayaran') ?>",
                    type: "post",
                    data: {
                        id_pembayaran: id_pembayaran,
                        id_akademik: id_akademik,
                        npm_mhs: npm,
                        tgl_cicilan_pertama: tgl_cicilan_pertama,
                        tgl_cicilan_kedua: tgl_cicilan_kedua,
                        tgl_cicilan_ketiga: tgl_cicilan_ketiga,
                        tgl_lunas: tgl_lunas,
                        cicilan_pertama: cicilan_pertama,
                        cicilan_kedua: cicilan_kedua,
                        cicilan_ketiga: cicilan_ketiga,
                        lunas: lunas,
                        status_pembayaran: status_pembayaran
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "success"
                            });
                            location.href = "<?= base_url('admin_control_pembayaran') ?>";
                        }
                        if (data.invalid) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "warning"
                            });
                        }
                    }
                })
            });
        });
    </script>