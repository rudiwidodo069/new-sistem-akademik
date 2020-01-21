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
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>id akademik</th>
                            <th>kode prodi</th>
                            <th>prodi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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
                    url: "<?= site_url('admin_control_akademik/get_all_akademik') ?>",
                    type: "post",
                },
                "columnDefs": [{
                    "targets": [0, 1, 2, 3],
                    "orderable": false
                }]
            });
        });
    </script>