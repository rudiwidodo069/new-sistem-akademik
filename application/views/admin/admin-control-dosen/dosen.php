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
                        <h3 class="card-title">Daftar Dosen</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="add">
                            <button type="button" class="btn btn-success ml-3 float-right btn-sm" data-target="#modal-insert" data-toggle="modal">
                                <i class="fas fa-fw fa-user-plus"></i>
                            </button>
                        </div>
                        <table id="dataTable" class="table table-bordered table-hover table-sm" width="100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>nim dosen</th>
                                    <th>nama dosen</th>
                                    <th>kode mata kuliah</th>
                                    <th>jenis kelamin</th>
                                    <th>level</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                        <!-- modal-insert -->
                        <div class="modal" id="modal-insert">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            <h3>form insert data dosen</h3>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" id="form-insert">
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="nim_dosen">nim dosen</label>
                                                    <input type="text" name="nim_dosen" id="nim_dosen" class="form-control">
                                                </div>
                                                <span id="nim_err" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="nama">nama dosen</label>
                                                    <input type="text" name="nama" id="nama" class="form-control">
                                                </div>
                                                <span id="nama_err" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="kode_matkul">kode mata kuliah</label>
                                                    <input type="text" name="kode_matkul" id="kode_matkul" class="form-control">
                                                </div>
                                                <span id="kode_matkul_err" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                    <option value="0">-- jenis kelamin --</option>
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="button">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                                <button type="submit" class="btn btn-success float-right" id="insert-data">insert data</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer d-block text-center text-muted">
                                        <p>isi data dengan benar !</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal-insert -->

                        <!-- modal-update -->
                        <div class="modal" id="modal-update">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            <h3>form insert data dosen</h3>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" id="form-update">
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="nim_dosen">nim dosen</label>
                                                    <input type="text" name="nim_dosen" id="nim_dosen_update" class="form-control">
                                                </div>
                                                <span id="nim_update_err" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="nama">nama dosen</label>
                                                    <input type="text" name="nama" id="nama_update" class="form-control">
                                                </div>
                                                <span id="nama_update_err" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="kode_matkul">kode mata kuliah</label>
                                                    <input type="text" name="kode_matkul" id="kode_matkul_update" class="form-control">
                                                </div>
                                                <span id="kode_matkul_update_err" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <select name="jenis_kelamin" id="jenis_kelamin_update" class="form-control">
                                                    <option value="0">-- jenis kelamin --</option>
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="button">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                                <button type="submit" class="btn btn-success float-right" id="update-data">update data</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer d-block text-center text-muted">
                                        <p>isi data dengan benar !</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal-update -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- myscript -->
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?= site_url('admin_control_dosen/get_all_data_dosen') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [0, 1, 2, 3, 4, 5, 6],
                    "orderable": false
                }]
            });

            function ReloadTable() {
                table.ajax.reload();
            }

            // insert data dosen
            $('#insert-data').on('click', function(e) {
                e.preventDefault();
                let nim = $('#nim_dosen').val();
                let nama = $('#nama').val();
                let kode_matkul = $('#kode_matkul').val();
                let jenis_kelamin = $('#jenis_kelamin').val();
                $.ajax({
                    url: "<?= site_url('admin_control_dosen/insert_data') ?>",
                    type: "post",
                    data: {
                        nim_dosen: nim,
                        nama: nama,
                        kode_matkul: kode_matkul,
                        jenis_kelamin: jenis_kelamin
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            $('#form-insert')[0].reset();
                            $('#nim_dosen').focus();
                            $('#nim_err').html('');
                            $('#nama_err').html('');
                            $('#kode_matkul_err').html('');
                            ReloadTable();
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "success"
                            });
                        }
                        if (data.invalid) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "error"
                            });
                        }
                        if (data.error) {
                            if (data.nim) {
                                $('#nim_err').html(data.nim);
                            } else {
                                $('#nim_err').html('');
                            }
                            if (data.nama) {
                                $('#nama_err').html(data.nama);
                            } else {
                                $('#nama_err').html('');
                            }
                            if (data.kode) {
                                $('#kode_matkul_err').html(data.kode);
                            } else {
                                $('#kode_matkul_err').html('');
                            }
                        }
                    }
                });
            });

            // get data dosen
            $(document).on('click', '#get-data', function() {
                let nim_dosen = $(this).data('nim');
                $.ajax({
                    url: "<?= site_url('admin_control_dosen/get_data_dosen') ?>",
                    type: "post",
                    data: {
                        nim_dosen: nim_dosen
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#nim_dosen_update').val(data.nim_dosen);
                        $('#nama_update').val(data.nama_dosen);
                        $('#kode_matkul_update').val(data.kode_matkul);
                        $('#jenis_kelamin_update').val(data.jenis_kelamin);
                    }
                });
            });

            // update data dosen
            $('#update-data').on('click', function(e) {
                e.preventDefault();
                let nim = $('#nim_dosen_update').val();
                let nama = $('#nama_update').val();
                let kode_matkul = $('#kode_matkul_update').val();
                let jenis_kelamin = $('#jenis_kelamin_update').val();
                $.ajax({
                    url: "<?= site_url('admin_control_dosen/update_data') ?>",
                    type: "post",
                    data: {
                        nim_dosen: nim,
                        nama: nama,
                        kode_matkul: kode_matkul,
                        jenis_kelamin: jenis_kelamin
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            $('#form-update')[0].reset();
                            $('#nim_update_err').html('');
                            $('#nama_update_err').html('');
                            $('#kode_matkul_update_err').html('');
                            ReloadTable();
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "success"
                            });
                            $('#modal-update').modal('hide');
                        }
                        if (data.invalid) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "error"
                            });
                        }
                        if (data.error) {
                            if (data.nim) {
                                $('#nim_err').html(data.nim);
                            } else {
                                $('#nim_err').html('');
                            }
                            if (data.nama) {
                                $('#nama_err').html(data.nama);
                            } else {
                                $('#nama_err').html('');
                            }
                            if (data.kode) {
                                $('#kode_matkul_err').html(data.kode);
                            } else {
                                $('#kode_matkul_err').html('');
                            }
                        }
                    }
                });
            });

            // delete data  dosen
            $(document).on('click', '#delete-data', function() {
                Swal.fire({
                    title: 'anda yakin ?',
                    text: "data dosen akan di hapus permanen",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        var nim_dosen = $(this).data('nim');
                        $.ajax({
                            url: "<?= site_url('admin_control_dosen/delete_data') ?>",
                            type: "post",
                            data: {
                                nim_dosen: nim_dosen
                            },
                            success: function(data) {
                                ReloadTable();
                            }
                        });
                        Swal.fire(
                            'success!',
                            'data dosen berhasil dihapus.',
                            'success'
                        )
                    }
                });
            });
        });
    </script>