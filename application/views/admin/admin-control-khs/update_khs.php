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
                        <h3 class="text-center">Form Update Khs Mahasiswa</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <table cellpadding="8">
                                    <tr>
                                        <th>nama mahasiswa</th>
                                        <td>: <?= $data_nilai['nama_mhs'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>npm mahasiswa</th>
                                        <td>: <?= $data_nilai['npm_mhs'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>kelas mahasiswa</th>
                                        <td>: <?= $data_nilai['kelas'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table cellpadding="8">
                                    <tr>
                                        <th>kode prodi</th>
                                        <td>: <?= $data_nilai['kode_prodi'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>prodi</th>
                                        <td>: <?= $data_nilai['prodi'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>semester</th>
                                        <td>: <?= $data_nilai['semester'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <form method="post" id="form-khs">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_nilai" id="id_nilai" value="<?= $data_nilai['id_nilai'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="npm" id="npm" value="<?= $data_nilai['npm_mhs'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_akademik" id="id_akademik" value="<?= $data_nilai['id_akademik'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="semester" id="semester" value="<?= $data_nilai['semester'] ?>">
                            </div>
                            <?php $i = 1; ?>
                            <?php foreach ($data_matkul as $matkul) : ?>
                                <?php if ($matkul['semester'] == $data_nilai['semester'] && $matkul['id_akademik'] == $data_nilai['id_akademik']) : ?>
                                    <div class="form-group">
                                        <div class="label">
                                            <label><strong><?= $matkul['matkul'] ?></strong></label>
                                        </div>
                                        <input type="text" class="form-control" name="nilai<?= $i; ?>" id="nilai<?= $i; ?>" value="<?= $data_nilai['nilai_' . $i] ?>">
                                        <span id="error_nilai<?= $i ?>" class="text-danger"></span>
                                    </div>
                                    <?php $i++; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <a href="<?= base_url('admin_control_khs') ?>" class="btn btn-primary">kemabli</a>
                            <button type="submit" class="btn btn-success float-right" id="update-data">update data khs</button>
                        </form>

                    </div>
                    <div class="card-footer">
                        <p class="text-center text-muted"><strong>isi data dengan benar !</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- myscript -->
    <script>
        $(document).ready(function() {

            $('#nilai1').focus();

            $(document).on('click', '#update-data', function(e) {
                e.preventDefault();
                let id_nilai = $('#id_nilai').val();
                let npm = $('#npm').val();
                let id_akademik = $('#id_akademik').val();
                let semester = $('#semester').val();
                var nilai1 = $('#nilai1').val();
                let nilai2 = $('#nilai2').val();
                let nilai3 = $('#nilai3').val();
                let nilai4 = $('#nilai4').val();
                let nilai5 = $('#nilai5').val();
                let nilai6 = $('#nilai6').val();
                let nilai7 = $('#nilai7').val();
                let nilai8 = $('#nilai8').val();
                $.ajax({
                    url: "<?= site_url('admin_control_khs/update_khs') ?>",
                    type: "post",
                    data: {
                        id_nilai: id_nilai,
                        npm: npm,
                        id_akademik: id_akademik,
                        semester: semester,
                        nilai1: nilai1,
                        nilai2: nilai2,
                        nilai3: nilai3,
                        nilai4: nilai4,
                        nilai5: nilai5,
                        nilai6: nilai6,
                        nilai7: nilai7,
                        nilai8: nilai8,
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            $('#form-khs')[0].reset();
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "success"
                            });
                            setInterval(function() {
                                location.href = "<?= base_url('admin_control_khs') ?>";
                            }, 1000);
                        }
                        if (data.error) {
                            if (data.nilai1) {
                                $('#error_nilai1').html(data.nilai1);
                            } else {
                                $('#error_nilai1').html('');
                            }
                            if (data.nilai2) {
                                $('#error_nilai2').html(data.nilai2);
                            } else {
                                $('#error_nilai2').html('');
                            }
                            if (data.nilai3) {
                                $('#error_nilai3').html(data.nilai3);
                            } else {
                                $('#error_nilai3').html('');
                            }
                            if (data.nilai4) {
                                $('#error_nilai4').html(data.nilai4);
                            } else {
                                $('#error_nilai4').html('');
                            }
                            if (data.nilai5) {
                                $('#error_nilai5').html(data.nilai5);
                            } else {
                                $('#error_nilai5').html('');
                            }
                            if (data.nilai6) {
                                $('#error_nilai6').html(data.nilai6);
                            } else {
                                $('#error_nilai6').html('');
                            }
                            if (data.nilai7) {
                                $('#error_nilai7').html(data.nilai7);
                            } else {
                                $('#error_nilai7').html('');
                            }
                            if (data.nilai8) {
                                $('#error_nilai8').html(data.nilai8);
                            } else {
                                $('#error_nilai8').html('');
                            }
                            swal.fire({
                                title: "" + data.pesan + "",
                                type: "error"
                            });
                        }
                    }
                });
            });
        });
    </script>