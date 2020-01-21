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
                <h3 class="card-title">pengelolaan data mata kuliah universitas</h3>
            </div>
            <div class="card-body">
                <div class="add">
                    <button type="button" class="btn btn-success btn-sm float-right ml-3" data-target="#modal-insert" data-toggle="modal">
                        <i class="fa fa-fw fa-user-plus"></i>
                    </button>
                </div>
                <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>prodi</th>
                            <th>semester</th>
                            <th>kode matkul</th>
                            <th>mata kuliah</th>
                            <th>sks</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <!-- modal insert -->
                <div class="modal" id="modal-insert">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title">
                                    <h3>form insert mata kuliah</h3>
                                </div>
                                <button type="button" data-dismiss="modal" class="close">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="form-insert">
                                    <div class="form-group">
                                        <select name="id_akademik" id="id_akademik" class="form-control">
                                            <option value="0">-- pilih prodi --</option>
                                            <?php foreach ($data_akademik as $akademik) : ?>
                                                <option value="<?= $akademik['id_akademik'] ?>"><?= $akademik['prodi'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="semester" id="semester" class="form-control">
                                            <option value="0">-- semester akademik --</option>
                                            <?php foreach ($data_semester as $semester) : ?>
                                                <option value="<?= $semester ?>"><?= $semester ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="kode_prodi">kode mata kuliah</label>
                                        </div>
                                        <input type="text" name="kode_matkul" id="kode_matkul" class="form-control">
                                        <span id="kode_matkul_err" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="matkul">mata kuliah</label>
                                        </div>
                                        <input type="text" name="matkul" id="matkul" class="form-control">
                                        <span id="matkul_err" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="sks">sks</label>
                                        </div>
                                        <input type="text" name="sks" id="sks" class="form-control">
                                        <span id="sks_err" class="text-danger"></span>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-insert">insert akademik</button>
                                </form>
                            </div>
                            <div class="modal-footer text-center text-muted d-block">
                                <p>isi data dengan benar !</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  end modal insert-->

                <!-- modal update -->
                <div class="modal" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title">
                                    <h3>form update mata kuliah</h3>
                                </div>
                                <button type="button" data-dismiss="modal" class="close">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="form-update">
                                    <div class="form-group">
                                        <input type="hidden" name="matkul_id" id="matkul_id" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <select name="id_akademik_update" id="id_akademik_update" class="form-control">
                                            <option value="0">-- pilih prodi --</option>
                                            <?php foreach ($data_akademik as $akademik) : ?>
                                                <option value="<?= $akademik['id_akademik'] ?>"><?= $akademik['prodi'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="semester_update" id="semester_update" class="form-control">
                                            <option value="0">-- semester akademik --</option>
                                            <?php foreach ($data_semester as $semester) : ?>
                                                <option value="<?= $semester ?>"><?= $semester ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="kode_matkul_update">kode mata kuliah</label>
                                        </div>
                                        <input type="text" name="kode_matkul_update" id="kode_matkul_update" class="form-control">
                                        <span id="kode_matkul_update_err" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="matkul_update">mata kuliah</label>
                                        </div>
                                        <input type="text" name="matkul_update" id="matkul_update" class="form-control">
                                        <span id="matkul_update_err" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="sks_update">sks</label>
                                        </div>
                                        <input type="text" name="sks_update" id="sks_update" class="form-control">
                                        <span id="sks_update_err" class="text-danger"></span>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-update">update akademik</button>
                                </form>
                            </div>
                            <div class="modal-footer text-center text-muted d-block">
                                <p>isi data dengan benar !</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  end modal update-->
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
                    url: "<?= site_url('admin_control_matkul/get_all_matkul') ?>",
                    type: "post",
                },
                "columnDefs": [{
                    "targets": [0, 1, 2, 3, 4, 5],
                    "orderable": false
                }]
            });

            function ReloadTable() {
                table.ajax.reload(null, false);
            }

            // insert data matkul
            $('#btn-insert').on('click', function(e) {
                e.preventDefault();
                let id_akademik = $('#id_akademik').val();
                let semester = $('#semester').val();
                let kode_matkul = $('#kode_matkul').val();
                let matkul = $('#matkul').val();
                let sks = $('#sks').val();
                $.ajax({
                    url: "<?= site_url('admin_control_matkul/insert_matkul') ?>",
                    type: "post",
                    data: {
                        id_akademik: id_akademik,
                        semester: semester,
                        kode_matkul: kode_matkul,
                        matkul: matkul,
                        sks: sks
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            $('#form-insert')[0].reset();
                            $('#kode_matkul_err').html('');
                            $('#matkul_err').html('');
                            $('#sks_err').html('');
                            ReloadTable();
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "success"
                            });
                        }
                        if (data.error) {
                            if (data.kode_matkul) {
                                $('#kode_matkul_err').html(data.kode_matkul);
                            } else {
                                $('#kode_matkul_err').html('');
                            }
                            if (data.matkul) {
                                $('#matkul_err').html(data.matkul);
                            } else {
                                $('#matkul_err').html('');
                            }
                            if (data.sks) {
                                $('#sks_err').html(data.sks);
                            } else {
                                $('#sks_err').html('');
                            }
                        }
                        if (data.invalid) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "error"
                            });
                        }
                    }
                });
            });

            // get data matkul
            $(document).on('click', '#update', function() {
                let matkul_id = $(this).data('id');
                $.ajax({
                    url: "<?= site_url('admin_control_matkul/get_data_matkul') ?>",
                    type: "post",
                    data: {
                        matkul_id: matkul_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#matkul_id').val(data.matkul_id);
                        $('#id_akademik_update').val(data.id_akademik);
                        $('#semester_update').val(data.semester);
                        $('#kode_matkul_update').val(data.kode_matkul);
                        $('#matkul_update').val(data.matkul);
                        $('#sks_update').val(data.sks);
                    }
                });
            });

            // update data matkul
            $('#btn-update').on('click', function(e) {
                e.preventDefault();
                let matkul_id = $('#matkul_id').val();
                let id_akademik = $('#id_akademik_update').val();
                let semester = $('#semester_update').val();
                let kode_matkul = $('#kode_matkul_update').val();
                let matkul = $('#matkul_update').val();
                let sks = $('#sks_update').val();
                $.ajax({
                    url: "<?= site_url('admin_control_matkul/update_matkul') ?>",
                    type: "post",
                    data: {
                        matkul_id: matkul_id,
                        id_akademik: id_akademik,
                        semester: semester,
                        kode_matkul: kode_matkul,
                        matkul: matkul,
                        sks: sks
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            $('#form-update')[0].reset();
                            $('#kode_matkul_update_err').html('');
                            $('#matkul_update_err').html('');
                            $('#sks_update_err').html('');
                            ReloadTable();
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "success"
                            });
                            $('#modal-update').modal('hide');
                        }
                        if (data.error) {
                            if (data.kode_matkul) {
                                $('#kode_matkul_update_err').html(data.kode_matkul);
                            } else {
                                $('#kode_matkul_update_err').html('');
                            }
                            if (data.matkul) {
                                $('#matkul_update_err').html(data.matkul);
                            } else {
                                $('#matkul_update_err').html('');
                            }
                            if (data.sks) {
                                $('#sks_update_err').html(data.sks);
                            } else {
                                $('#sks_update_err').html('');
                            }
                        }
                        if (data.invalid) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "error"
                            });
                        }
                    }
                });
            });

            // delete data matkul
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
                        var matkul_id = $(this).data('id');
                        $.ajax({
                            url: "<?= site_url('admin_control_matkul/delete_matkul') ?>",
                            type: "post",
                            data: {
                                matkul_id: matkul_id
                            },
                            success: function(data) {
                                ReloadTable();
                            }
                        });
                        Swal.fire({
                            title: 'success!',
                            text: 'data mata kuliah dihapus.',
                            type: 'success'
                        });
                    }
                });
            });
        });
    </script>