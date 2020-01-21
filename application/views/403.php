<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akses Ditolak</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/custom.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper konten-error">
        <!-- Main content -->
        <section class="content konten-error">
            <div class="error-page">
                <h2 class="headline text-danger">403</h2>
                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Akses Forbidden.</h3>
                    <p>
                        mohon maaf akses anda ditolak silakan ikuti prosedur yang ada ! silakan klik <a href="../../index.html">kembali ke halaman utama</a> ikuti lah prosedur yang ada itu akan lebih balik.
                    </p>
                </div>
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
        <footer class="main-footer text-center error-footer">
            <strong>Er - We - Software Engineer &copy; <?= date('Y') ?> <p class="d-inline-block"> Admin Er - We</p>.</strong>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
</body>

</html>