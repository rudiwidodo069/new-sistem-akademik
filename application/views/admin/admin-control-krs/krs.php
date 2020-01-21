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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="add">
                            <a href="<?= base_url('admin_control_krs/krs') ?>" class="btn btn-success btn-sm float-right ml-3">
                                <i class="fas fa-fw fa-user-plus"></i>
                            </a>
                        </div>
                        <table id="dataTable" class="table table-bordered table-hover table-sm" width="100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>nama</th>
                                    <th>npm</th>
                                    <th>kelas</th>
                                    <th>prodi</th>
                                    <th>semeter akademik</th>
                                    <th>total biaya semester</th>
                                    <th>daftar ulang</th>
                                    <th>spp</th>
                                    <th>lain - lain</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <!-- modal update krs -->
                    <div class="modal" id="update-krs">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title text-center">
                                        <h3>update data krs mhasiswa</h3>
                                    </div>
                                    <button type="button" data-dismiss="modal" class="close">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="id_krs" id="id_krs">
                                        </div>
                                        <div>
                                            <label for="id_krs"><strong>npm mahasiswa</strong></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="npm_mhs" id="npm_mhs" readonly>
                                            <span id="npm-error"></span>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="nama_mhs"><strong>nama mahasiswa</strong></label>
                                            </div>
                                            <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" readonly>
                                            <span id="nama-error"></span>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="perkuliahan"><strong>perkuliahan</strong></label>
                                            </div>
                                            <input type="text" class="form-control" name="perkuliahan" id="perkuliahan" readonly>
                                            <span id="perkuliahan-error"></span>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="prodi"><strong>prodi mahasiswa</strong></label>
                                            </div>
                                            <input type="text" class="form-control" name="prodi" id="prodi" readonly>
                                            <input type="hidden" name="id_akademik" id="id_akademik">
                                            <span id="prodi"></span>
                                        </div>

                                        <div class="form-group">
                                            <select name="semester" id="semester" class="form-control">
                                                <option value="0">-- semeter akademik --</option>
                                                <?php foreach ($semester_akademik as $semester) : ?>
                                                    <option value="<?= $semester; ?>"><?= $semester; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="pembayaran"><strong>total biaya semester</strong></label>
                                            </div>
                                            <input type="text" class="form-control" name="pembayaran" id="pembayaran" readonly>
                                            <span id="pembayaran-error"></span>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="daftar_ulang" id="daftar-ulang" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="spp" id="spp" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="lain_lain" id="lain-lain" class="form-control">
                                        </div>

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                        <button type="submit" class="btn btn-success float-right" id="update-data">update data krs</button>

                                    </form>
                                </div>
                                <div class="modal-footer text-muted text-center d-inline-block">
                                    <span><strong>isi data dengan benar !</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                </div>
            </div>
        </div>
    </section>

    <!-- myscript -->
    <script>
        $(document).ready(function() {
            // show data krs
            var table = $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?= site_url('admin_control_krs/get_all_data_krs') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [1, 2, 3, 4, 5, 6, 7,8,9,10],
                    "orderable": false
                }]
            });

            function reloadTable() {
                table.ajax.reload(null, false);
            }

            // get data krs mhasiswa
            $(document).on('click', '#update', function(e) {
                let npm = $(this).data('npm');
                $.ajax({
                    url: "<?= site_url('admin_control_krs/get_data_mhs') ?>",
                    type: "post",
                    data: {
                        npm: npm
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#npm_mhs').val(data.npm_mhs);
                        $('#nama_mhs').val(data.nama_mhs);
                        $('#perkuliahan').val(data.perkuliahan);
                        $('#prodi').val(data.prodi);
                        $('#id_akademik').val(data.id_akademik);
                        if (data.perkuliahan == 'REGULER PAGI') {
                            $('#pembayaran').val('4500000');
                            $('#daftar-ulang').val('1000000');
                            $('#spp').val('2500000');
                            $('#lain-lain').val('1000000');
                        } else if (data.perkuliahan == 'REGULER SORE') {
                            $('#pembayaran').val('5000000');
                            $('#daftar-ulang').val('1000000');
                            $('#spp').val('3000000');
                            $('#lain-lain').val('1000000');
                        } else {
                            $('#pembayaran').val('5500000');
                            $('#daftar-ulang').val('1000000');
                            $('#spp').val('3500000');
                            $('#lain-lain').val('1000000');
                        }
                    }
                });
            });

            // update data krs mahasiswa
            $('#update-data').on('click', function(e) {
                e.preventDefault();
                let npm = $('#npm_mhs').val();
                let id_akademik = $('#id_akademik').val();
                let semester = $('#semester').val();
                let pembayaran = $('#pembayaran').val();
                let daftar_ulang = $('#daftar-ulang').val();
                let spp = $('#spp').val();
                let lain_lain = $('#lain-lain').val();
                $.ajax({
                    url: "<?= site_url('admin_control_krs/update_krs') ?>",
                    type: "post",
                    data: {
                        npm: npm,
                        id_akademik: id_akademik,
                        semester: semester,
                        pembayaran: pembayaran,
                        daftar_ulang: daftar_ulang,
                        spp: spp,
                        lain_lain: lain_lain
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
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
                        $('#update-krs').modal('hide');
                        reloadTable();
                    }
                });
            });
        });
    </script>