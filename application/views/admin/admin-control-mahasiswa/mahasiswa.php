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
                        <h3 class="card-title">Daftar Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="add">
                            <button class="btn btn-success btn-sm float-right ml-3" data-target="#modal-insert" data-toggle="modal" id="insert-data">
                                <i class="fas fa-fw fa-user-plus"></i>
                            </button>
                        </div>
                        <div class="is-aktive float-right ml-3">
                            <div class="form-group">
                                <select name="is_aktive" id="is-aktive" class="form-control form-control-sm">
                                    <option value="0">-- pilih disini --</option>
                                    <option value="active">-- 2018 --</option>
                                    <option value="non-active">-- 2020 --</option>
                                </select>
                            </div>
                        </div>
                        <table id="dataTable" class="table table-bordered table-hover table-sm" width="120%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>npm</th>
                                    <th>nama</th>
                                    <th>kelas</th>
                                    <th>perkuliahan</th>
                                    <th>kode prodi</th>
                                    <th>prodi</th>
                                    <th>tahun masuk</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                        <!-- modal  insert data-->
                        <div class="modal fade" id="modal-insert">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3><strong>Insert Data Mahasiswa</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mt-n2">
                                        <form action="" method="post" id="form-insert">

                                            <div class="form-group">
                                                <input type="text" name="npm" class="form-control" id="npm" value="<?= set_value('npm') ?>" placeholder="npm mahasiswa">
                                                <span class="npm_error text-danger mt-1"></span>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama') ?>" placeholder="nama mahasiswa">
                                                <span class="nama_error text-danger mt-1"></span>
                                            </div>

                                            <div class="form-group">
                                                <select name="kelas" id="kelas" class="form-control">
                                                    <?php foreach ($daftar_kelas as $kelas) : ?>
                                                        <option value="<?= $kelas; ?>"><?= $kelas; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select name="perkuliahan" id="perkuliahan" class="form-control">
                                                    <?php foreach ($daftar_perkuliahan as $perkuliahan) : ?>
                                                        <option value="<?= $perkuliahan; ?>"><?= $perkuliahan; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select name="jurusan" id="jurusan" class="form-control">
                                                    <?php foreach ($daftar_jurusan as $jurusan) : ?>
                                                        <option value="<?= $jurusan['id_akademik']; ?>"><?= $jurusan['prodi']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="tahun_masuk" class="form-control" id="tahun_masuk" value="<?= set_value('tahun_masuk') ?>" placeholder="tahun masuk | <?= date('Y'); ?>">
                                                <span class="tahun_masuk_error text-danger mt-1"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?= set_value('tempat_lahir') ?>" placeholder="tempat lahir">
                                                <span class="tempat_lahir_error text-danger mt-1"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="<?= set_value('tgl_lahir') ?>" placeholder="tanggal lahir">
                                                <span class="tgl_lahir_error text-danger mt-1"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat') ?>" placeholder="alamat mahasiswa">
                                                <div class="alamat_error text-danger mt-1"></div>
                                            </div>
                                            <div class="form-group">
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">cancle</button>
                                            <button type="submit" class="btn btn-success float-right">insert data mahasiswa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal insert -->

                        <!-- modal  edit data-->
                        <div class="modal fade" id="modal-update">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3><strong>Update Data Mahasiswa</strong></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mt-n2">
                                        <form action="" method="post" id="form-update">

                                            <div class="form-group">
                                                <input type="text" name="npm" class="form-control" id="npm_update" value="<?= set_value('npm') ?>" placeholder="npm mahasiswa">
                                                <span class="npm_error text-danger mt-1"></span>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="nama" class="form-control" id="nama_update" value="<?= set_value('nama') ?>" placeholder="nama mahasiswa">
                                                <span class="nama_error text-danger mt-1"></span>
                                            </div>

                                            <div class="form-group">
                                                <select name="kelas" id="kelas_update" class="form-control">
                                                    <?php foreach ($daftar_kelas as $kelas) : ?>
                                                        <option value="<?= $kelas; ?>"><?= $kelas; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select name="perkuliahan_update" id="perkuliahan_update" class="form-control">
                                                    <?php foreach ($daftar_perkuliahan as $perkuliahan) : ?>
                                                        <option value="<?= $perkuliahan; ?>"><?= $perkuliahan; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select name="jurusan" id="jurusan_update" class="form-control">
                                                    <?php foreach ($daftar_jurusan as $jurusan) : ?>
                                                        <option value="<?= $jurusan['id_akademik']; ?>"><?= $jurusan['prodi']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="tahun_masuk" class="form-control" id="tahun_masuk_update" value="<?= set_value('tahun_masuk') ?>" placeholder="tahun masuk | <?= date('Y'); ?>">
                                                <span class="tahun_masuk_error text-danger mt-1"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir_update" value="<?= set_value('tempat_lahir') ?>" placeholder="tempat lahir">
                                                <span class="tempat_lahir_error text-danger mt-1"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir_update" value="<?= set_value('tgl_lahir') ?>" placeholder="tanggal lahir">
                                                <span class="tgl_lahir_error text-danger mt-1"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="alamat" class="form-control" id="alamat_update" value="<?= set_value('alamat') ?>" placeholder="alamat mahasiswa">
                                                <div class="alamat_error text-danger mt-1"></div>
                                            </div>
                                            <div class="form-group">
                                                <select name="jenis_kelamin" id="jenis_kelamin_update" class="form-control">
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">cancle</button>
                                            <button type="submit" class="btn btn-success float-right">update data mahasiswa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal edit -->

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
                    url: "<?= site_url('admin_control_mahasiswa/get_all_data_mahasiswa') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [1, 2, 7, 8],
                    "orderable": false
                }]
            });

            function reloadTable() {
                table.ajax.reload(null, false);
            }

            $('#myModal').on('shown.bs.modal', function() {
                $('#npm').trigger('focus')
            })

            // insert data mahasiswa
            $(document).on('click', '#insert-data', function() {
                $('#form-insert').on('submit', function(e) {
                    e.preventDefault();
                    let npm = $('#npm').val();
                    let nama = $('#nama').val();
                    let kelas = $('#kelas').val();
                    let perkuliahan = $('#perkuliahan').val();
                    let jurusan = $('#jurusan').val();
                    let tahun_masuk = $('#tahun_masuk').val();
                    let tempat_lahir = $('#tempat_lahir').val();
                    let tgl_lahir = $('#tgl_lahir').val();
                    let alamat = $('#alamat').val();
                    let jenis_kelamin = $('#jenis_kelamin').val();
                    $.ajax({
                        url: "<?= site_url('admin_control_mahasiswa/insert_data_mahasiswa') ?>",
                        type: "post",
                        data: {
                            npm: npm,
                            nama: nama,
                            kelas: kelas,
                            perkuliahan: perkuliahan,
                            jurusan: jurusan,
                            tahun_masuk: tahun_masuk,
                            tempat_lahir: tempat_lahir,
                            tgl_lahir: tgl_lahir,
                            alamat: alamat,
                            jenis_kelamin: jenis_kelamin,
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.success) {
                                swal.fire({
                                    title: "" + data.mahasiswa + "",
                                    type: "success"
                                });
                                $('#form-insert')[0].reset();
                                $('#npm').focus();
                                reloadTable();
                            }
                            if (data.error) {
                                // npm error
                                if (data.npm) {
                                    $('.npm_error').html(data.npm);
                                    $('.npm_error').show();
                                } else {
                                    $('.npm_error').hide();
                                }
                                // nama error
                                if (data.nama) {
                                    $('.nama_error').html(data.nama);
                                    $('.nama_error').show();
                                } else {
                                    $('.nama_error').hide();
                                }
                                // tahun error
                                if (data.tahun_masuk) {
                                    $('.tahun_masuk_error').html(data.tahun_masuk);
                                    $('.tahun_masuk_error').show();
                                } else {
                                    $('.tahun_masuk_error').hide();
                                }
                                // tempat lahir
                                if (data.tempat_lahir) {
                                    $('.tempat_lahir_error').html(data.tempat_lahir);
                                    $('.tempat_lahir_error').show();
                                } else {
                                    $('.tempat_lahir_error').hide();
                                }
                                // tanggal lahir
                                if (data.tgl_lahir) {
                                    $('.tgl_lahir_error').html(data.tgl_lahir);
                                    $('.tgl_lahir_error').show();
                                } else {
                                    $('.tgl_lahir_error').hide();
                                }
                                // alamat
                                if (data.alamat) {
                                    $('.alamat_error').html(data.alamat);
                                    $('.alamat_error').show();
                                } else {
                                    $('.alamat_error').hide();
                                }
                            }
                            if (data.invalid) {
                                swal.fire({
                                    title: "" + data.mahasiswa + "",
                                    type: "error"
                                })
                            }
                        }
                    });
                });
            });

            // get update data mahasiswa
            $(document).on('click', '#update-data', function() {
                let npm = $(this).data('npm');
                $.ajax({
                    type: "post",
                    url: "<?= site_url('admin_control_mahasiswa/get_data_mahasiswa') ?>",
                    data: {
                        npm: npm
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#npm_update').val(data.npm_mhs);
                        $('#nama_update').val(data.nama_mhs);
                        $('#kelas_update').val(data.kelas);
                        $('#perkuliahan_update').val(data.perkuliahan);
                        $('#jurusan_update').val(data.id_akademik);
                        $('#tahun_masuk_update').val(data.tahun_masuk);
                        $('#tempat_lahir_update').val(data.tempat_lahir);
                        $('#tgl_lahir_update').val(data.tanggal_lahir);
                        $('#alamat_update').val(data.alamat);
                        $('#jenis_kelamin_update').val(data.jenis_kelamin);
                    }
                });
            });

            // update data
            $('#form-update').on('submit', function(e) {
                e.preventDefault();
                let npm = $('#npm_update').val();
                let nama = $('#nama_update').val();
                let kelas = $('#kelas_update').val();
                let perkuliahan = $('#perkuliahan_update').val();
                let jurusan = $('#jurusan_update').val();
                let tahun_masuk = $('#tahun_masuk_update').val();
                let tempat_lahir = $('#tempat_lahir_update').val();
                let tgl_lahir = $('#tgl_lahir_update').val();
                let alamat = $('#alamat_update').val();
                let jenis_kelamin = $('#jenis_kelamin_update').val();
                $.ajax({
                    url: "<?= site_url('admin_control_mahasiswa/update_data_mahasiswa') ?>",
                    type: "post",
                    data: {
                        npm: npm,
                        nama: nama,
                        kelas: kelas,
                        perkuliahan: perkuliahan,
                        jurusan: jurusan,
                        tahun_masuk: tahun_masuk,
                        tempat_lahir: tempat_lahir,
                        tgl_lahir: tgl_lahir,
                        alamat: alamat,
                        jenis_kelamin: jenis_kelamin,
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            swal.fire({
                                title: "" + data.mahasiswa + "",
                                type: "success"
                            });
                            $('#modal-update').modal('hide');
                            reloadTable();
                        }
                        if (data.error) {
                            // npm error
                            if (data.npm) {
                                $('.npm_error').html(data.npm);
                                $('.npm_error').show();
                            } else {
                                $('.npm_error').hide();
                            }
                            // nama error
                            if (data.nama) {
                                $('.nama_error').html(data.nama);
                                $('.nama_error').show();
                            } else {
                                $('.nama_error').hide();
                            }
                            // tahun error
                            if (data.tahun_masuk) {
                                $('.tahun_masuk_error').html(data.tahun_masuk);
                                $('.tahun_masuk_error').show();
                            } else {
                                $('.tahun_masuk_error').hide();
                            }
                            // tempat lahir
                            if (data.tempat_lahir) {
                                $('.tempat_lahir_error').html(data.tempat_lahir);
                                $('.tempat_lahir_error').show();
                            } else {
                                $('.tempat_lahir_error').hide();
                            }
                            // tanggal lahir
                            if (data.tgl_lahir) {
                                $('.tgl_lahir_error').html(data.tgl_lahir);
                                $('.tgl_lahir_error').show();
                            } else {
                                $('.tgl_lahir_error').hide();
                            }
                            // alamat
                            if (data.alamat) {
                                $('.alamat_error').html(data.alamat);
                                $('.alamat_error').show();
                            } else {
                                $('.alamat_error').hide();
                            }
                        }
                    }
                });
            });

            // hapus data mahasiswa
            $(document).on('click', '#delete-mahasiswa', function() {
                Swal.fire({
                    title: 'anda yakin ?',
                    text: "data mahasiswa akan di hapus permanen",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        var npm = $(this).data('npm');
                        $.ajax({
                            url: "<?= site_url('admin_control_mahasiswa/delete_data_mahasiswa') ?>",
                            type: "post",
                            data: {
                                npm: npm
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.success) {
                                    reloadTable();
                                    Swal.fire({
                                        title: "" + data.pesan + "",
                                        type: "success"
                                    });
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>