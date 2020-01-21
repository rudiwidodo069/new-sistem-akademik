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
                        <h3 class="card-title">Daftar User Registrasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="is-aktive float-right ml-3">
                            <div class="form-group">
                                <select name="is_aktive" id="is-aktive" class="form-control form-control-sm">
                                    <option value="0">-- pilih disini --</option>
                                    <option value="active">-- active --</option>
                                    <option value="non-active">-- non-active --</option>
                                </select>
                            </div>
                        </div>
                        <table id="dataTable" class="table table-bordered table-hover table-sm" width="114%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>user name</th>
                                    <th>id akses</th>
                                    <th>level</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>is_active</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                        <!-- update modal -->
                        <div id="update" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3><strong>update user</strong></h3>
                                    </div>
                                    <div class="modal-body mt-n2">
                                        <form action="" method="post" id="form-update">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="id_user" id="id">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="user name" name="user_name" value="" id="username" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="NPM / NID" name="id_akses" value="" id="id-akses" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas  fa-sort-numeric-up"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="level" name="level" value="" id="level" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-level-up-alt"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="" id="email" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" placeholder="Password" name="password" id="password" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select name="is_active" id="is-active" class="form-control">
                                                    <?php foreach ($aktivasi_update as $aktive) : ?>
                                                        <?php if ($aktive) : ?>
                                                            <option value="<?= $aktive ?>" selected><?= $aktive ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $aktive ?>"><?= $aktive ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-check"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">batal</button>
                                            <button type="submit" class="btn btn-success  float-right" id="update-user">simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- my script -->
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: " <?= base_url('admin_control_users/get_all_data_user') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [1, 2, 4, 5, 6, 7],
                    "orderable": false
                }]
            });

            function tableReload() {
                table.ajax.reload(null, false);
            }

            $(document).on('click', '#get-update', function() {
                var id_user = $(this).data('id');
                $.ajax({
                    url: "<?= site_url('admin_control_users/get_data_user') ?>",
                    type: "post",
                    data: {
                        id_user: id_user
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id').val(data.id);
                        $('#username').val(data.user_name);
                        $('#id-akses').val(data.id_akses);
                        $('#level').val(data.level);
                        $('#email').val(data.email);
                        $('#password').val(data.password);
                        $('#is-active').val(data.is_active);
                    }
                });
            });

            $('#update-user').on('click', function(e) {
                e.preventDefault();
                var id_user = $('#id').val();
                var user_name = $('#username').val();
                var id_akses = $('#id-akses').val();
                var level = $('#level').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var is_active = $('#is-active').val();
                $.ajax({
                    url: "<?= site_url('admin_control_users/update_data_user') ?>",
                    type: "post",
                    data: {
                        id_user: id_user,
                        user_name: user_name,
                        id_akses: id_akses,
                        level: level,
                        email: email,
                        password: password,
                        is_active: is_active
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#form-update')[0].reset();
                        $('#update').modal('hide');
                        swal.fire({
                            title: "success",
                            type: "success"
                        })
                        tableReload();
                    }
                });
            });

            $(document).on('click', '#delete', function() {
                var id_user = $(this).data('id');
                Swal.fire({
                    title: 'anda yakin ?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "<?= site_url('admin_control_users/delete_data_user') ?>",
                            type: "post",
                            data: {
                                id_user: id_user
                            },
                            dataType: "json",
                            success: function(data) {
                                tableReload();
                            }
                        })
                        Swal.fire(
                            'Deleted!',
                            'data user dihapus.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>