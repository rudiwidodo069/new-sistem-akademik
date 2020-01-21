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
                                    <option value="active">-- active --</option>
                                    <option value="non-active">-- non-active --</option>
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
                                    <th>prodi</th>
                                    <th>jurusan</th>
                                    <th>tahun masuk</th>
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
            $('#dataTable').DataTable({
                "searching": false,
                "order": false,
            });
        });
    </script>