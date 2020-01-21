<div class=" card-body">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table cellpadding="8">
                    <tr>
                        <th>nama mahasiswa</th>
                        <td>: <?= $data_nilai['nama_mhs']; ?></td>
                    </tr>
                    <tr>
                        <th>npm mahasiswa</th>
                        <td>: <?= $data_nilai['npm_mhs']; ?></td>
                    </tr>
                    <tr>
                        <th>kelas mahasiswa</th>
                        <td>: <?= $data_nilai['kelas']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <table cellpadding="8">
                    <tr>
                        <th>kode prodi</th>
                        <td>: <?= $data_nilai['kode_prodi']; ?></td>
                    </tr>
                    <tr>
                        <th>prodi</th>
                        <td>: <?= $data_nilai['prodi']; ?></td>
                    </tr>
                    <tr>
                        <th>semester akademik</th>
                        <td>: <?= $data_nilai['semester']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="table mt-4">
                <table class="table table-bordered table-sm">
                    <thead class="text-center">
                        <tr>
                            <th>prodi</th>
                            <th>kode mata kuliah</th>
                            <th>mata kuliah</th>
                            <th>nilai</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i = 1;
                        $nilai = 0;
                        $sks = 0; ?>
                        <?php foreach ($data_matkul as $matkul) : ?>
                            <?php if ($data_nilai['id_akademik'] == $matkul['id_akademik'] && $data_nilai['semester'] == $matkul['semester']) : ?>
                                <tr>
                                    <td><?= $matkul['prodi'] ?></td>
                                    <td><?= $matkul['kode_matkul'] ?></td>
                                    <td><?= $matkul['matkul'] ?></td>
                                    <td><?= $matkul['nilai_' . $i] ?></td>
                                </tr>
                                <?php $nilai += $matkul['nilai_' . $i];
                                $sks += $matkul['sks']; ?>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <th colspan="3">indeks prestasi</th>
                            <td>
                                <?php
                                $hasil = $nilai / $sks;
                                if ($hasil > 3.5 && $hasil < 4) {
                                    echo number_format($hasil, 1);
                                } else if ($hasil > 3 && $hasil < 3.5) {
                                    echo number_format($hasil, 1);
                                } else if ($hasil > 2.5 && $hasil < 3) {
                                    echo number_format($hasil, 1);
                                } elseif ($hasil < 1.5 && $hasil < 2.5) {
                                    echo number_format($hasil, 1);
                                } else {
                                    echo  number_format($hasil, 1);
                                }
                                ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>