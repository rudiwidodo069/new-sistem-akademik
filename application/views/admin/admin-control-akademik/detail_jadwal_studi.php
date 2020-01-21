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
                <div id="print-data">
                    <a href="<?= base_url('laporan_report/jadwal_studi_pdf/') . $_GET['id_akademik'] . '/' . $_GET['semester'] . '/' . $_GET['kelas'] ?>" class="btn btn-danger btn-sm float-right ml-3">
                        <i class="fas fa-fw fa-file-pdf"></i>
                    </a>
                    <a href="<?= base_url('laporan_report/jadwal_studi_excel/')  . $_GET['id_akademik'] . '/' . $_GET['semester'] . '/' . $_GET['kelas'] ?>" class="btn btn-success btn-sm float-right ml-3">
                        <i class="fas fa-fw fa-file-excel"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>prodi</th>
                            <th>semester</th>
                            <th>nama dosen</th>
                            <th>kode matakuliah</th>
                            <th>mata kuliah</th>
                            <th>hari</th>
                            <th>kelas</th>
                            <th>jam</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <!-- modal update -->
                <div class="modal" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">form update jadwal studi</h3>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="form-update">

                                    <div class="form-group">
                                        <input type="hidden" name="id_jadwal" id="id_jadwal" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="id_akademik" id="id_akademik" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <div class="label">
                                            <label for="prodi">prodi</label>
                                        </div>
                                        <input type="text" name="prodi" id="prodi" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <div class="label">
                                            <label for="semester">semester akademik</label>
                                        </div>
                                        <input type="text" name="semester" id="semester" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="kode_matkul" id="kode_matkul" class="form-control">
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
                                        <span id="ruangan_err" class="text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                        <select name="kelas" id="kelas" class="form-control">
                                            <?php foreach ($data_kelas as $kelas) : ?>
                                                <option value="<?= $kelas ?>"><?= $kelas ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select name="hari" id="hari" class="form-control">
                                            <?php foreach ($data_hari as $hari) : ?>
                                                <option value="<?= $hari ?>"><?= $hari ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select name="jam" id="jam" class="form-control">
                                            <?php foreach ($data_jam as $jam) : ?>
                                                <option value="<?= $jam ?>"><?= $jam ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-update">update jadwal studi</button>

                                </form>
                            </div>
                            <div class="modal-footer text-center text-muted d-block">
                                <p>isi data dengan benar !</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal update -->
            </div>
        </div>
    </section>

    <!-- myscript -->
    <script>
        $(document).ready(function() {
            show_table();

            function show_table() {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                var id_akademik = urlParams.get('id_akademik');
                var semester = urlParams.get('semester');
                var kelas = urlParams.get('kelas');
                $.ajax({
                    url: "<?= site_url('admin_control_jadwal_studi/get_detail_jadwal') ?>",
                    type: "post",
                    data: {
                        id_akademik: id_akademik,
                        semester: semester,
                        kelas: kelas
                    },
                    dataType: "json",
                    success: function(data) {
                        let html = '';
                        for (let i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].prodi + '</td>' +
                                '<td>' + data[i].semester + '</td>' +
                                '<td>' + data[i].nama_dosen + '</td>' +
                                '<td>' + data[i].kode_matkul + '</td>' +
                                '<td>' + data[i].matkul + '</td>' +
                                '<td>' + data[i].hari + '</td>' +
                                '<td>' + data[i].kelas + '</td>' +
                                '<td>' + data[i].jam + '</td>' +
                                '<td><center><button type="button" class="badge badge-warning" data-target="#modal-update" data-toggle="modal" data-id="' + data[i].id_jadwal + '" id="update-jadwal"> <i class = "fas fa-fw fa-edit"> </i> </button ><button type = "button" class = "badge badge-danger ml-2" data-id="' + data[i].id_jadwal + '"  id="delete"><i class = "fas fa-fw fa-trash"> </i> </ button ></center></td >' +
                                '</tr>';
                        }
                        $('#dataTable tbody').html(html);
                    }
                });
            }

            $(document).on('click', '#update-jadwal', function() {
                let id_jadwal = $(this).data('id');
                $.ajax({
                    url: "<?= site_url('admin_control_jadwal_studi/get_update_jadwal_studi') ?>",
                    type: "post",
                    data: {
                        id_jadwal: id_jadwal
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id_jadwal').val(data.id_jadwal);
                        $('#id_akademik').val(data.id_akademik);
                        $('#prodi').val(data.prodi);
                        $('#semester').val(data.semester);
                        $('#kode_matkul').val(data.kode_matkul);
                        $('#matkul').val(data.matkul);
                        $('#ruangan').val(data.ruangan);
                        $('#kelas').val(data.kelas);
                        $('#hari').val(data.hari);
                        $('#jam').val(data.jam);
                    }
                });
            });

            $('#btn-update').on('click', function(e) {
                e.preventDefault();
                let id_jadwal = $('#id_jadwal').val();
                let id_akademk = $('#id_akademik').val();
                let semester = $('#semester').val();
                let kode_matkul = $('#kode_matkul').val();
                let ruangan = $('#ruangan').val();
                let kelas = $('#kelas').val();
                let hari = $('#hari').val();
                let jam = $('#jam').val();

                $.ajax({
                    url: "<?= site_url('admin_control_jadwal_studi/update_jadwal_studi') ?>",
                    type: "post",
                    data: {
                        id_jadwal: id_jadwal,
                        semester: semester,
                        id_akademik: id_akademk,
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
                            $('#modal-update').modal('hide');
                            show_table();
                        }
                        if (data.invalid) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "error"
                            });
                            $('#modal-update').modal('hide');
                        }
                        if (data.error) {
                            if (data.ruangan) {
                                $('#ruangan_err').html(data.ruangan);
                            } else {
                                $('#ruangan_err').html('');
                            }
                        }
                    }
                });
            });

            $(document).on('click', '#delete', function() {
                Swal.fire({
                    title: 'anda yakin ?',
                    text: "data mata kuliah akan di hapus permanen",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        var id_jadwal = $(this).data('id');
                        $.ajax({
                            url: "<?= site_url('admin_control_jadwal_studi/delete_jadwal_studi') ?>",
                            type: "post",
                            data: {
                                id_jadwal: id_jadwal
                            },
                            success: function(data) {
                                show_table();
                            }
                        });
                        Swal.fire({
                            title: 'success!',
                            text: 'data jadwal studi berhasil dihapus.',
                            type: 'success'
                        });
                    }
                });
            });
        });
    </script>