<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <table>
            <tr>
                <th>pengelolaan jadwal studi akademik</th>
            </tr>
        </table>
        <table class="table table-bordered table-sm" id="dataTable">
            <thead>
                <tr>
                    <th>no</th>
                    <th>prodi</th>
                    <th>semester</th>
                    <th>nama dosen</th>
                    <th>kode matakuliah</th>
                    <th>mata kuliah</th>
                    <th>hari</th>
                    <th>kelas</th>
                    <th>jam</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($daftar_jadwal as $jadwal) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $jadwal['prodi'] ?></td>
                        <td><?= $jadwal['semester'] ?></td>
                        <td><?= $jadwal['nama_dosen'] ?></td>
                        <td><?= $jadwal['kode_matkul'] ?></td>
                        <td><?= $jadwal['matkul'] ?></td>
                        <td><?= $jadwal['hari'] ?></td>
                        <td><?= $jadwal['kelas'] ?></td>
                        <td><?= $jadwal['jam'] ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>