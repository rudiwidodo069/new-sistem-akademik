<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Form Pengisian Krs Mahasiswa</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" id="form-krs">

                            <div>
                                <label for="npm_mhs"><strong>npm mahasiswa</strong></label>
                            </div>
                            <div class="form-group input-group">
                                <input type="text" class="form-control" name="npm_mhs" id="npm_mhs" readonly>
                                <button type="button" class="btn btn-primary input-group-append" data-target="#search-mhs" data-toggle="modal" id="tampil-data">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
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
                                    <label for="pembayaran"><strong>total akademik</strong></label>
                                </div>
                                <input type="text" class="form-control" name="pembayaran" id="pembayaran" readonly>
                                <span id="pembayaran-error"></span>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="daftar-ulang"><strong>biaya daftar ulang</strong></label>
                                </div>
                                <input type="text" class="form-control" name="daftar_ulang" id="daftar-ulang" readonly>
                                <span id="daftar-ulang-error"></span>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="spp"><strong>biaya spp semester</strong></label>
                                </div>
                                <input type="text" class="form-control" name="spp" id="spp" readonly>
                                <span id="spp-error"></span>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="lain-lain"><strong>biaya lain-lain</strong></label>
                                </div>
                                <input type="text" class="form-control" name="lain_lain" id="lain-lain" readonly>
                                <span id="lain-lain-error"></span>
                            </div>

                            <a href="<?= base_url('admin_control_krs') ?>" class="btn btn-primary">kemabli</a>
                            <button type="submit" class="btn btn-success float-right" id="insert-data">insert data krs</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="text-center text-muted"><strong>isi data dengan benar</strong></p>
                    </div>

                    <!-- modal search mahasiswa -->
                    <div class="modal" id="search-mhs">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title text-center">
                                        <h3>search mahasiswa</h3>
                                    </div>
                                    <button type="button" data-dismiss="modal" class="close">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-sm table-bordered table-striped" id="dataTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th>npm mahasiswa</th>
                                                <th>nama mahasiswa</th>
                                                <th>prodi mahasiswa</th>
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
                    <!-- end modal search mahasiswa -->

                </div>
            </div>
        </div>
    </div>

    <!-- myscript -->
    <script>
        $(document).ready(function() {
            // show data on model
            show_data();

            // ajax get all data mahasiswa
            function show_data() {
                $('#dataTable').dataTable();
                $.ajax({
                    url: "<?= site_url('admin_control_krs/get_all_data_mhs') ?>",
                    dataType: "json",
                    success: function(data) {
                        var html = ' ';
                        for (let i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].nama_mhs + '</td>' +
                                '<td>' + data[i].npm_mhs + '</td>' +
                                '<td>' + data[i].prodi + ' </td>' +
                                '<td><button class="badge badge-primary" data-npm="' + data[i].npm_mhs + '" id="selected">selected<i class="fas fa-fw fa-check"></i></button></td>' +
                                '</tr>';
                        }
                        $('#dataTable tbody').html(html);
                    }
                });
            }

            // ajax get data mahasiswa 
            $(document).on('click', '#selected', function() {
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
                        $('#search-mhs').modal('hide');
                    }
                });
            });

            // ajax insert data to database
            $('#insert-data').on('click', function(e) {
                e.preventDefault();
                let npm = $('#npm_mhs').val();
                let id_akademik = $('#id_akademik').val();
                let semester = $('#semester').val();
                let pembayaran = $('#pembayaran').val();
                let daftar_ulang = $('#daftar-ulang').val();
                let spp = $('#spp').val();
                let lain_lain = $('#lain-lain').val();
                $.ajax({
                    url: "<?= site_url('admin_control_krs/insert_krs') ?>",
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
                        form_kosong();
                        show_data();
                    }
                });
            });

            function form_kosong() {
                $('#form-krs')[0].reset();
            }
        });
    </script>