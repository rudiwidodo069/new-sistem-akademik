-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2020 pada 13.26
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_akademi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akademik`
--

CREATE TABLE `akademik` (
  `id_akademik` int(11) NOT NULL,
  `kode_prodi` enum('FIPPS','FMIPA','FTIK','FBS','FP') NOT NULL,
  `prodi` enum('PEND. SEJARAH','PEND. EKONOMI','BIMBINGAN DAN KONSELING','PEND. FISIKA','PEND. BIOLOGI','PEND. MATEMATIKA','ARSITEKTUR','TEKNIK INDUSTRI','TEKNIK INFORMATIKA','DESAIN KOMUNIKASI VISUAL','PEND. BAHASA INDONESIA','PEND. BAHASA INGGRIS','MAGISTER PEND. IPS','MAGISTER PEND. MATEMATIKA DAN IPA','MAGISTER PEND. BAHASA INDONESIA','MAGISTER PEND. BAHASA INGGRIS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akademik`
--

INSERT INTO `akademik` (`id_akademik`, `kode_prodi`, `prodi`) VALUES
(1, 'FIPPS', 'PEND. SEJARAH'),
(2, 'FIPPS', 'PEND. EKONOMI'),
(3, 'FIPPS', 'BIMBINGAN DAN KONSELING'),
(4, 'FMIPA', 'PEND. FISIKA'),
(5, 'FMIPA', 'PEND. BIOLOGI'),
(6, 'FMIPA', 'PEND. MATEMATIKA'),
(7, 'FTIK', 'ARSITEKTUR'),
(8, 'FTIK', 'TEKNIK INDUSTRI'),
(9, 'FTIK', 'TEKNIK INFORMATIKA'),
(10, 'FBS', 'DESAIN KOMUNIKASI VISUAL'),
(11, 'FBS', 'PEND. BAHASA INDONESIA'),
(12, 'FBS', 'PEND. BAHASA INGGRIS'),
(13, 'FP', 'MAGISTER PEND. IPS'),
(14, 'FP', 'MAGISTER PEND. MATEMATIKA DAN IPA'),
(15, 'FP', 'MAGISTER PEND. BAHASA INDONESIA'),
(16, 'FP', 'MAGISTER PEND. BAHASA INGGRIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nim_dosen` varchar(13) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `kode_matkul` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'dosen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nim_dosen`, `nama_dosen`, `kode_matkul`, `jenis_kelamin`, `level`) VALUES
('002', 'dos. b. indo', 'PK43F107', 'Laki - Laki', 'dosen'),
('003', 'dos. b. inggris', 'KK43F108', 'Laki - Laki', 'dosen'),
('004', 'dos. pti', 'KK43F110', 'Laki - Laki', 'dosen'),
('005', 'dos. algoritma', 'kK43F111', 'Perempuan', 'dosen'),
('006', 'dos. fisika dasar 1', 'KK43F126', 'Laki - Laki', 'dosen'),
('007', 'dos. pemrograman 1', 'KK43F128', 'Laki - Laki', 'dosen'),
('008', 'dos. kalkulus 1', 'KK43F137', 'Laki - Laki', 'dosen'),
('009', 'dos. statistika dasar', 'KK43F319', 'Perempuan', 'dosen'),
('010', 'dos. struktur data', 'KK43F321', 'Perempuan', 'dosen'),
('011', 'dos. praktik struktur data', 'KK43F322', 'Laki - Laki', 'dosen'),
('012', 'dos. sistem informasi', 'KK43F324', 'Laki - Laki', 'dosen'),
('013', 'dos. pemrograman 3', 'KK43F330', 'Laki - Laki', 'dosen'),
('014', 'dos. fisika gerak', 'KK43F339', 'Laki - Laki', 'dosen'),
('015', 'dos. jaringan komputer', 'KK43F346', 'Laki - Laki', 'dosen'),
('016', 'dos. matematika diskrit', 'KK43F347', 'Perempuan', 'dosen'),
('017', 'dos. algoritma 2', 'KK43F212', 'Laki - Laki', 'dosen'),
('018', 'dos. logika matematika', 'KK43F213', 'Perempuan', 'dosen'),
('019', 'dos. sistem digital', 'KB43F215', 'Laki - Laki', 'dosen'),
('020', 'dos. bhs. inggris informatika', 'KK43F216', 'Perempuan', 'dosen'),
('021', 'dos. kapita selekta pendidikan agama', 'PK43F217', 'Laki - Laki', 'dosen'),
('022', 'dos. fisika dasar 2', 'KK43F227', 'Perempuan', 'dosen'),
('023', 'dos. pemrograman 2', 'KK43F229', 'Laki - Laki', 'dosen'),
('024', 'dos. kalkulus 2', 'KK43F238', 'Perempuan', 'dosen'),
('025', 'dos. prodi bimbingan konseling 1 smt 3', 'qwerty001', 'Laki - Laki', 'dosen'),
('026', 'dos. prodi bimbingan konseling 2 smt 3', 'qwerty002', 'Laki - Laki', 'dosen'),
('027', 'dos. prodi bimbingan konseling 3 smt 3', 'qwerty003', 'Laki - Laki', 'dosen'),
('028', 'dos. prodi bimbingan konseling 4 smt 3', 'qwerty004', 'Laki - Laki', 'dosen'),
('029', 'dos. prodi bimbingan konseling 5 smt 3', 'qwerty005', 'Laki - Laki', 'dosen'),
('030', 'dos. prodi bimbingan konseling 6 smt 3', 'qwerty006', 'Perempuan', 'dosen'),
('031', 'dos. prodi bimbingan konseling 7 smt 3', 'qwerty007', 'Laki - Laki', 'dosen'),
('032', 'dos. prodi bimbingan konseling 8 smt 3', 'qwerty008', 'Perempuan', 'dosen'),
('033', 'dos. teknik industri 1 smt 2', 'qwerty009', 'Perempuan', 'dosen'),
('034', 'dos. teknik industri 2 smt 2', 'qwerty010', 'Perempuan', 'dosen'),
('035', 'dos. teknik industri 3 smt 2', 'qwerty011', 'Laki - Laki', 'dosen'),
('036', 'dos. teknik industri 4 smt 2', 'qwerty012', 'Laki - Laki', 'dosen'),
('037', 'dos. teknik industri 5 smt 2', 'qwerty013', 'Perempuan', 'dosen'),
('038', 'dos. teknik industri 6 smt 2', 'qwerty014', 'Perempuan', 'dosen'),
('039', 'dos. teknik industri 7 smt 2', 'qwerty015', 'Perempuan', 'dosen'),
('040', 'dos. teknik industri 8 smt 2', 'qwerty016', 'Laki - Laki', 'dosen'),
('041', 'dos. pancasila dan kewarganegaaan', 'PK43F402', 'Laki - Laki', 'dosen'),
('042', 'dos. sejarah perjuangan dan jati diri PGRI', 'PK43F406', 'Laki - Laki', 'dosen'),
('043', 'dos. arsitektur dan organisasi komputer', 'KB43F425', 'Perempuan', 'dosen'),
('044', 'dos. aljabar linear dan matrik', 'KK43F433', 'Laki - Laki', 'dosen'),
('045', 'dos. manajemen proyek', 'KK43F434', 'Laki - Laki', 'dosen'),
('046', 'dos. sistem basis data', 'KB43F435', 'Laki - Laki', 'dosen'),
('047', 'dos. praktikum sistem basis data', 'KB43F436', 'Perempuan', 'dosen'),
('048', 'dos. metode numerik', 'KK43F448', 'Perempuan', 'dosen'),
('049', 'dos. pend sejarah 1 smt 1', 'A001', 'Laki - Laki', 'dosen'),
('050', 'dos. pend sejarah 2 smt 1', 'A002', 'Laki - Laki', 'dosen'),
('051', 'dos. pend sejarah 3 smt 1', 'A003', 'Perempuan', 'dosen'),
('052', 'dos. pend sejarah 4 smt 1', 'A004', 'Laki - Laki', 'dosen'),
('123456789012', 'dos. agama', 'PK43F101', 'Laki - Laki', 'dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_studi`
--

CREATE TABLE `jadwal_studi` (
  `id_jadwal` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_studi`
--

INSERT INTO `jadwal_studi` (`id_jadwal`, `semester`, `id_akademik`, `kelas`, `ruangan`, `kode_matkul`, `hari`, `jam`) VALUES
(5, 3, 9, 'SF', '4.5.2', 'KK43F339', 'SENIN', '18 : 30 - 20 : 00'),
(7, 3, 9, 'SE', '4.5.1', 'KK43F339', 'SENIN', '20 : 00 - 21 : 30'),
(8, 3, 9, 'SF', '4.5.2', 'KK43F321', 'SENIN', '20 : 00 - 21 : 30'),
(9, 3, 9, 'SE', '4.5.1', 'KK43F321', 'SENIN', '18 : 30 - 20 : 00'),
(10, 3, 9, 'SF', '4.5.2', 'KK43F319', 'SELASA', '18 : 30 - 20 : 00'),
(14, 3, 9, 'SF', '4.5.2', 'KK43F324', 'SELASA', '20 : 00 - 21 : 30'),
(15, 3, 9, 'SE', '4.5.1', 'KK43F324', 'SELASA', '18 : 30 - 20 : 00'),
(16, 3, 9, 'SF', '4.5.2', 'KK43F330', 'RABU', '18 : 30 - 20 : 00'),
(18, 3, 9, 'SE', '4.5.1', 'KK43F319', 'SELASA', '20 : 00 - 21 : 30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `npm_mhs` varchar(13) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `daftar_ulang` int(11) NOT NULL,
  `spp` int(11) NOT NULL,
  `lain_lain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `npm_mhs`, `id_akademik`, `semester`, `total_biaya`, `daftar_ulang`, `spp`, `lain_lain`) VALUES
(13, '201843500571', 9, 4, 5000000, 1000000, 3000000, 1000000),
(31, '201843500572', 9, 3, 5000000, 1000000, 3000000, 1000000),
(32, '201843500573', 9, 3, 5000000, 1000000, 3000000, 1000000),
(33, '201843500574', 9, 3, 4500000, 1000000, 2500000, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm_mhs` varchar(12) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `kelas` varchar(4) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `perkuliahan` enum('REGULER PAGI','REGULER SORE','EKSTENSI') NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm_mhs`, `nama_mhs`, `kelas`, `id_akademik`, `perkuliahan`, `tahun_masuk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `level`) VALUES
('201843500571', 'Rudi Widodo', 'SF', 9, 'REGULER SORE', 2018, 'karanganyar', '2020-01-03', 'JL.Kelingkit', 'Laki - Laki', 'mahasiswa'),
('201843500572', 'Rina Amelia', 'SA', 9, 'REGULER SORE', 2018, 'Jakarta', '2020-01-18', 'Depok', 'Perempuan', 'mahasiswa'),
('201843500573', 'Rizky Febiani', 'SB', 9, 'REGULER SORE', 2018, 'Jakarta', '2020-01-18', 'sudirman tamrin', 'Perempuan', 'mahasiswa'),
('201843500574', 'Aulia Bela Maulani', 'RH', 9, 'REGULER PAGI', 2020, 'Jakarta', '2020-01-19', 'Depok', 'Perempuan', 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `matkul_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `kode_matkul` varchar(50) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`matkul_id`, `semester`, `id_akademik`, `kode_matkul`, `matkul`, `sks`) VALUES
(1, 3, 9, 'KK43F339', 'FISIKA GERAK', 3),
(2, 3, 9, 'KK43F321', 'STRUKTUR DATA', 2),
(3, 3, 9, 'KK43F319', 'STATISTIKA DASAR', 1),
(4, 3, 9, 'KK43F324', 'SISTEM INFORMASI', 3),
(5, 3, 9, 'KK43F330', 'PEMROGRAMAN 3', 3),
(6, 3, 9, 'KK43F347', 'MATEMATIKA DISKRIT', 2),
(7, 3, 9, 'KK43F322', 'PRAKTIKUM STRUKTUR DATA', 3),
(8, 3, 9, 'KK43F346', 'JARINGAN KOMPUTER', 3),
(9, 1, 9, 'PK43F101', 'PENDIDIKAN AGAMA', 2),
(10, 1, 9, 'PK43F107', 'BAHASA INDONESIA', 2),
(11, 1, 9, 'kK43F108', 'BAHASA INGGRIS', 2),
(12, 1, 9, 'kK43F110', 'PENGANTAR TEKNOLOGI INFORMASI', 2),
(13, 1, 9, 'kK43F111', 'ALGORITMA 1', 2),
(14, 1, 9, 'kK43F126', 'FISIKA DASAR 1', 2),
(15, 1, 9, 'kK43F128', 'PEMROGRAMAN 1', 2),
(16, 1, 9, 'kK43F137', 'KALKULUS 1', 2),
(18, 2, 9, 'KK43F212', 'ALGORITMA 2', 3),
(19, 2, 9, 'KK43F213', 'LOGIKA MATEMATIKA', 2),
(20, 2, 9, 'KB43F215', 'SISTEM DIGITAL', 3),
(21, 2, 9, 'KK43F216', 'BAHASA INGGRIS INFORMATIKA', 2),
(22, 2, 9, 'PK43F217', 'KAPITA SELEKTA PENDIDIKAN AGAMA', 2),
(23, 2, 9, 'KK43F227', 'FISIKA DASAR 2', 3),
(24, 2, 9, 'KK43F229', 'PEMROGRAMAN 2', 3),
(25, 2, 9, 'KK43F238', 'KALKULUS 2', 2),
(26, 3, 3, 'qwerty001', 'prodi bimbingan konseling 1 smt 3', 2),
(28, 3, 3, 'qwerty002', 'prodi bimbingan konseling 2 smt 3', 2),
(29, 3, 3, 'qwerty003', 'prodi bimbingan konseling 3 smt 3', 3),
(30, 3, 3, 'qwerty004', 'prodi bimbingan konseling 4 smt 3', 2),
(31, 3, 3, 'qwerty005', 'prodi bimbingan konseling 5 smt 3', 2),
(32, 3, 3, 'qwerty006', 'prodi bimbingan konseling 6 smt 3', 3),
(33, 3, 3, 'qwerty007', 'prodi bimbingan konseling 7 smt 3', 2),
(34, 3, 3, 'qwerty008', 'prodi bimbingan konseling 8 smt 3', 3),
(35, 2, 8, 'qwerty009', 'prodi teknik industri 1 smt 2', 3),
(36, 2, 8, 'qwerty010', 'prodi teknik industri 2 smt 2', 3),
(37, 2, 8, 'qwerty011', 'prodi teknik industri 3 smt 2', 3),
(38, 2, 8, 'qwerty012', 'prodi teknik industri 4 smt 2', 3),
(39, 2, 8, 'qwerty013', 'prodi teknik industri 5 smt 2', 3),
(40, 2, 8, 'qwerty014', 'prodi teknik industri 6 smt 2', 3),
(41, 2, 8, 'qwerty015', 'prodi teknik industri 7 smt 2', 3),
(42, 2, 8, 'qwerty016', 'prodi teknik industri 8 smt 2', 3),
(43, 4, 9, 'PK43F402', 'PANCASILA DAN KEWARGANEGARAAN', 3),
(44, 4, 9, 'PK43F406', 'SEJARAH PERJUANGAN DAN JATI DIRI PGRI', 2),
(45, 4, 9, 'KB43F425', 'ARSITEKTUR DAN ORGANISASI KOMPUTER', 3),
(46, 4, 9, 'KK43F433', 'ALJABAR LINEAR DAN MATRIK', 3),
(47, 4, 9, 'KK43F434', 'MANAJEMEN PROYEK', 3),
(48, 4, 9, 'KB43F435', 'SISTEM BASIS DATA', 2),
(49, 4, 9, 'KB43F436', 'PRAKTIKUM SISTEM BASIS DATA', 1),
(50, 4, 9, 'KK43F448', 'METODE NUMERIK', 3),
(51, 1, 1, 'A001', 'PEND. SEJARAH 1 SMT 1', 2),
(52, 1, 1, 'A002', 'PEND. SEJARAH 2 SMT 1', 3),
(53, 1, 1, 'A003', 'PEND. SEJARAH 3 SMT 1', 3),
(54, 1, 1, 'A004', 'PEND. SEJARAH 4 SMT 1', 2),
(55, 5, 9, 'BB43F503', 'ILMU SOSIAL DAN BUDAYA DASAR', 3),
(56, 5, 9, 'PB43F509', 'KEWIRAUSAHAAN', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `npm_mhs` varchar(13) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `nilai_1` int(3) NOT NULL DEFAULT '0',
  `nilai_2` int(3) NOT NULL DEFAULT '0',
  `nilai_3` int(3) NOT NULL DEFAULT '0',
  `nilai_4` int(3) NOT NULL DEFAULT '0',
  `nilai_5` int(3) NOT NULL DEFAULT '0',
  `nilai_6` int(3) NOT NULL DEFAULT '0',
  `nilai_7` int(3) NOT NULL DEFAULT '0',
  `nilai_8` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `npm_mhs` varchar(13) NOT NULL,
  `lunas` int(11) NOT NULL DEFAULT '0',
  `cicilan_pertama` int(11) NOT NULL DEFAULT '0',
  `cicilan_kedua` int(11) NOT NULL DEFAULT '0',
  `cicilan_ketiga` int(11) NOT NULL DEFAULT '0',
  `tgl_lunas` date NOT NULL,
  `tgl_cicilan_pertama` date NOT NULL,
  `tgl_cicilan_kedua` date NOT NULL,
  `tgl_cicilan_ketiga` date NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_akademik`, `npm_mhs`, `lunas`, `cicilan_pertama`, `cicilan_kedua`, `cicilan_ketiga`, `tgl_lunas`, `tgl_cicilan_pertama`, `tgl_cicilan_kedua`, `tgl_cicilan_ketiga`, `total_pembayaran`, `status_pembayaran`) VALUES
(9, 9, '201843500571', 5000000, 0, 0, 0, '2020-01-18', '0000-00-00', '0000-00-00', '0000-00-00', 5000000, 'LUNAS'),
(10, 9, '201843500572', 0, 1000000, 0, 0, '0000-00-00', '2020-01-20', '0000-00-00', '0000-00-00', 1000000, 'CICILAN'),
(11, 9, '201843500573', 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 'BELUM BAYAR'),
(12, 9, '201843500574', 0, 2000000, 1500000, 0, '0000-00-00', '2020-01-01', '2020-01-20', '0000-00-00', 3500000, 'CICILAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `smt_akademik`
--

CREATE TABLE `smt_akademik` (
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `smt_akademik`
--

INSERT INTO `smt_akademik` (`semester`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `id_akses` varchar(13) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `level` enum('admin','mahasiswa','dosen') NOT NULL,
  `is_active` enum('active','non-active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `user_name`, `id_akses`, `password`, `email`, `level`, `is_active`) VALUES
(1, 'admin', '001admin', '$2y$10$eWW1LuTk8LaWTnrw5SlHVuJ6CHqEssi0vQLMD02l3tlwI2kBCQOKW', 'admin@gmail.com', 'admin', 'active'),
(3, 'Rudi widodo', '201843500571', '$2y$10$6w/VqtGWjZU9Z2uvjUK4juWTe4gBH5uN2FiqgXjiSkn4yfvNKcB/2', 'rudiwidodo069@gmail.com', 'mahasiswa', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(150) NOT NULL,
  `time_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nim_dosen`);

--
-- Indeks untuk tabel `jadwal_studi`
--
ALTER TABLE `jadwal_studi`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm_mhs`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`matkul_id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `smt_akademik`
--
ALTER TABLE `smt_akademik`
  ADD PRIMARY KEY (`semester`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `jadwal_studi`
--
ALTER TABLE `jadwal_studi`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `matkul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
