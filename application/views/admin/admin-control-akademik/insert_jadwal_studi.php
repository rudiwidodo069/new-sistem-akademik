<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><?= $title; ?></h1>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Form Insert Data Jadwal Studi Akademik</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="form-insert">
                            <div class="form-group">
                                <input type="hidden" name="id_akademik" id="id_akademik">
                            </div>

                            <div class="label">
                                <label>kode prodi</label>
                            </div>
                            <div class="form-group input-group">
                                <input type="text" name="kode_prodi" id="kode_prodi" class="form-control input-group-append" placeholder="search prodi akademik" readonly>
                                <button type="button" id="search-prodi" class="btn btn-primary" data-target="#modal-prodi" data-toggle="modal">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="prodi">prodi</label>
                                </div>
                                <input type="text" name="prodi" id="prodi" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="semester">semester akadmeik</label>
                                </div>
                                <select name="semester" id="semester" class="form-control">
                                    <option value="0">-- semester akademik --</option>
                                    <?php foreach ($data_semester as $smt) : ?>
                                        <option value="<?= $smt ?>"><?= $smt ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="label">
                                <label>kode mata kuliah</label>
                            </div>
                            <div class="form-group input-group">
                                <input type="text" name="kode_matkul" id="kode_matkul" class="form-control input-group-append" placeholder="search mata kuliah" readonly>
                                <button type="button" id="search-matkul" class="btn btn-primary" data-target="#modal-matkul" data-toggle="modal">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="matkul">mata kuliah</label>
                                </div>
                                <input type="text" name="matkul" id="matkul" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="ruangan">ruangan</label>
                                </div>
                                <input type="text" name="ruangan" id="ruangan" class="form-control">
                            </div>
                            <span id="ruangan_err" class="text-danger"></span>

                            <div class="form-group">
                                <div class="label">
                                    <label for="kelas">data kelas</label>
                                </div>
                                <select name="kelas" id="kelas" class="form-control">
                                    <option value="0">-- daftar kales --</option>
                                    <?php foreach ($data_kelas as $kelas) : ?>
                                        <option value="<?= $kelas ?>"><?= $kelas ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="hari">data hari</label>
                                </div>
                                <select name="hari" id="hari" class="form-control">
                                    <option value="0">-- hari --</option>
                                    <?php foreach ($data_hari as $hari) : ?>
                                        <option value="<?= $hari ?>"><?= $hari ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="label">
                                    <label for="jam">data jam</label>
                                </div>
                                <select name="jam" id="jam" class="form-control">
                                    <option value="0">-- jam --</option>
                                    <?php foreach ($data_jam as $jam) : ?>
                                        <option value="<?= $jam ?>"><?= $jam ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <a href="<?= base_url('admin_control_jadwal_studi') ?>" class="btn btn-primary">kembali</a>
                            <button type="submit" class="btn btn-success float-right" id="btn-insert">insert jadwal studi</button>
                        </form>
                    </div>
                    <div class="card-footer text-center text-muted d-block">
                        <p>isi data dengan benar !</p>
                    </div>

                    <!-- modal search prodi -->
                    <div class="modal" id="modal-prodi">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>search prodi akademik</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-hover table-sm" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>kode prodi</th>
                                                <th>prodi</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_akademik as $akademik) : ?>
                                                <tr>
                                                    <td><?= $akademik['kode_prodi'] ?></td>
                                                    <td><?= $akademik['prodi'] ?></td>
                                                    <td>
                                                        <button type="button" class="badge badge-primary" data-id="<?= $akademik['id_akademik'] ?>" id="selected-prodi"> selected
                                                            <i class="fas fa-fw fa-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal prodi -->

                    <!-- modal search prodi -->
                    <div class="modal" id="modal-matkul">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>search prodi akademik</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-hover table-sm" id="table-matkul">
                                        <thead>
                                            <tr>
                                                <th>kode mata kuliah</th>
                                                <th>mata kuliah</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal prodi -->

                </div>
            </div>
        </div>
    </section>

    <!-- myscript -->
    <script>
        $(document).ready(function() {

            $(document).on('click', '#selected-prodi', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "<?= site_url('admin_control_jadwal_studi/get_data_prodi') ?>",
                    type: "post",
                    data: {
                        id_akademik: id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id_akademik').val(data.id_akademik);
                        $('#kode_prodi').val(data.kode_prodi);
                        $('#prodi').val(data.prodi);
                        $('#modal-prodi').modal('hide');
                    }
                })
            });

            $(document).on('click', '#search-matkul', function() {
                let id = $('#id_akademik').val();
                let smt = $('#semester').val();
                $.ajax({
                    url: "<?= site_url('admin_control_jadwal_studi/get_all_data_matkul') ?>",
                    type: "post",
                    data: {
                        id_akademik: id,
                        semester: smt
                    },
                    dataType: "json",
                    success: function(data) {
                        var html = ' ';
                        for (let i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].kode_matkul + '</td>' +
                                '<td>' + data[i].matkul + '</td>' +
                                '<td><button type="button" class="badge badge-primary" data-id="' + data[i].matkul_id + '" id="selected-matkul">selected <i class="fas fa-fw fa-check"></i></button></td>' +
                                '</tr>';
                        }
                        $('#table-matkul tbody').html(html);
                        if (data.error) {
                            $('#modal-matkul').modal('hide');
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "error"
                            });
                        }
                        if (data.invalid) {
                            $('#modal-matkul').modal('hide');
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "error"
                            });
                        }
                    }
                });
            });

            $(document).on('click', '#selected-matkul', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "<?= site_url('admin_control_jadwal_studi/get_data_matkul') ?>",
                    type: "post",
                    data: {
                        matkul_id: id,
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#kode_matkul').val(data.kode_matkul);
                        $('#matkul').val(data.matkul);
                        $('#modal-matkul').modal('hide');
                    }
                });
            });

            $('#btn-insert').on('click', function(e) {
                e.preventDefault();
                let smt = $('#semester').val();
                let id_akadmeik = $('#id_akademik').val();
                let kelas = $('#kelas').val();
                let ruangan = $('#ruangan').val();
                let kode_matkul = $('#kode_matkul').val();
                let hari = $('#hari').val();
                let jam = $('#jam').val();
                $.ajax({
                    url: "<?= site_url('admin_control_jadwal_studi/insert_jadwal_studi') ?>",
                    type: "post",
                    data: {
                        semester: smt,
                        id_akademik: id_akadmeik,
                        kelas: kelas,
                        ruangan: ruangan,
                        kode_matkul: kode_matkul,
                        hari: hari,
                        jam: jam
                    },
                    dataType: "json",
                    success: function(data) {

                        if (data.success) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "success"
                            });
                            $('#form-insert')[0].reset();
                            $('#ruangan_err').html('');
                        }

                        if (data.invalid) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "error"
                            });
                        }

                        if (data.error) {
                            if (data.ruangan_err) {
                                $('#ruangan_err').html(data.ruangan_err);
                            } else {
                                $('#ruangan_err').html('');
                            }
                        }
                    }
                });
            });
        });
    </script>