<div class=" card-body">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table cellpadding="8">
                    <tr>
                        <th>nama mahasiswa</th>
                        <td>: <?= $get_info['nama_mhs']; ?></td>
                    </tr>
                    <tr>
                        <th>npm mahasiswa</th>
                        <td>: <?= $get_info['npm_mhs']; ?></td>
                    </tr>
                    <tr>
                        <th>kelas mahasiswa</th>
                        <td>: <?= $get_info['kelas']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <table cellpadding="8">
                    <tr>
                        <th>kode prodi</th>
                        <td>: <?= $get_info['kode_prodi']; ?></td>
                    </tr>
                    <tr>
                        <th>prodi</th>
                        <td>: <?= $get_info['prodi']; ?></td>
                    </tr>
                    <tr>
                        <th>semester akademik</th>
                        <td>: <?= $get_info['semester']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="table">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center">prodi</th>
                            <th class="text-center">kode mata kuliah</th>
                            <th class="text-center">mata kuliah</th>
                            <th class="text-center">sks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $jumlah_sks = 0; ?>
                        <?php foreach ($get_matkul as $matul) : ?>
                            <?php if ($get_info['semester'] == $matul['semester'] && $get_info['id_akademik'] == $matul['id_akademik']) : ?>
                                <tr class="text-center">
                                    <td><?= $matul['prodi']; ?></td>
                                    <td><?= $matul['kode_matkul']; ?></td>
                                    <td><?= $matul['matkul']; ?></td>
                                    <td><?= $matul['sks']; ?></td>
                                </tr>
                                <?php $jumlah_sks += $matul['sks'] ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <th colspan="3">jumlah sks</th>
                            <td><?= $jumlah_sks; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>