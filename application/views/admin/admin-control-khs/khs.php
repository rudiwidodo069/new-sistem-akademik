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
                        <h3 class="card-title">Daftar Mahasiswa Khs</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-hover table-sm" width="100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>nama</th>
                                    <th>npm</th>
                                    <th>kelas</th>
                                    <th>prodi</th>
                                    <th>semeter akademik</th>
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
    </section>


    <!-- my script -->
    <script>
        $(document).ready(function() {

            var table = $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "orderr": [],
                "ajax": {
                    url: "<?= site_url('admin_control_khs/get_all_data_khs') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [1, 2, 3, 4, ],
                    "orderable": false
                }]
            });

            function ReloadTable() {
                table.ajax.reload(null, false);
            }

            $(document).on('click', '#delete', function() {
                Swal.fire({
                    title: 'anda yakin ?',
                    text: "data nilai mahasiswa akan di hapus permanen",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        var npm = $(this).data('npm');
                        $.ajax({
                            url: "<?= site_url('admin_control_khs/delete_khs') ?>",
                            type: "post",
                            data: {
                                npm: npm
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.success) {
                                    Swal.fire({
                                        title: "" + data.pesan + "",
                                        type: "success"
                                    });
                                    ReloadTable();
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>