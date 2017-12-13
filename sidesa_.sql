-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2017 at 06:17 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidesa_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_masuk`
--

CREATE TABLE `arsip_masuk` (
  `id` int(11) NOT NULL,
  `klasifikasi_id` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `perihal` varchar(250) NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `tanggal_surat` varchar(100) NOT NULL,
  `scan_link` varchar(250) NOT NULL,
  `penerima_id` int(11) NOT NULL,
  `time` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `alamat_desa` text NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama_desa`, `kecamatan_id`, `alamat_desa`, `uid`) VALUES
(1, 'GANTUNG', 1, 'Jl. Jenderal Sudirman, Gantung, Kabupaten Belitung Timur 33562', 2);

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `dari_id` int(11) NOT NULL,
  `kepada_id` int(11) NOT NULL,
  `arsip_id` int(11) DEFAULT NULL,
  `isi_disposisi` text NOT NULL,
  `time` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `qr_link` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id` int(11) NOT NULL,
  `nama_dusun` varchar(100) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `alamat_dusun` text NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id`, `nama_dusun`, `desa_id`, `alamat_dusun`, `uid`) VALUES
(1, 'RASAU', 1, 'Dusun Rasau Desa Gantung', 2),
(2, 'BARU', 1, 'Dusun Baru Desa Gantung', 2),
(3, 'GANSE', 1, 'Dusun Ganse Desa Gantung', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history_surat`
--

CREATE TABLE `history_surat` (
  `id` int(11) NOT NULL,
  `type_surat` int(1) NOT NULL,
  `nomor_surat` int(11) NOT NULL,
  `keterangan_surat` text NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `dari` varchar(100) NOT NULL,
  `qr_link` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `arsip_link` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(1, 'KADES'),
(2, 'SEKDES'),
(3, 'KAUR'),
(4, 'KASI'),
(5, 'LAYANAN'),
(6, 'PERTANAHAN'),
(7, 'BPD'),
(8, 'KADUS'),
(9, 'RT');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `alamat_kabupaten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `nama_kabupaten`, `alamat_kabupaten`) VALUES
(1, 'BELITUNG TIMUR', 'Jalan Manggarawan, Padang, Manggar, Padang, Belitung Timur, Kabupaten Belitung Timur, Kepulauan Bangka Belitung 33512');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `alamat_kecamatan` text NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`, `kabupaten_id`, `alamat_kecamatan`, `uid`) VALUES
(1, 'GANTUNG', 1, 'Gantung, Kabupaten Belitung Timur, Kepulauan Bangka Belitung 33516', 0);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_surat`
--

CREATE TABLE `klasifikasi_surat` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `klasifikasi` varchar(250) NOT NULL,
  `tipe` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klasifikasi_surat`
--

INSERT INTO `klasifikasi_surat` (`id`, `kode`, `klasifikasi`, `tipe`) VALUES
(1, '000', 'UMUM', 0),
(2, '001', 'LAMBANG', 0),
(3, '002', 'Tanda Kehormatan/ Penghargaan untuk Pegawai', 0),
(4, '003', 'Hari Raya/ Besar', 0),
(5, '004', 'Ucapan', 0),
(6, '005', 'Undangan', 0),
(7, '006', 'Tanda Jabatan', 0),
(11, '010', 'Urusan Dalam', 0),
(12, '011', 'Gedung Kantor /Termasuk Instalasi Prasarana Fisik Pamong /Kantor Dinas ', 0),
(13, '012', 'Rumah Dinas', 0),
(14, '013', 'Mess/ Guest House', 0),
(15, '014', 'Rumah Susun /Apartemen', 0),
(16, '015', 'Penerangan Listrik/ Jasa Listrik', 0),
(17, '016', 'Telepon/ Faximile /Internet', 0),
(18, '017', 'Keamanan /Ketertiban Kantor', 0),
(19, '018', 'Kebersihan Kantor', 0),
(20, '019', 'Protokol', 0),
(21, '020', 'Peralatan', 0),
(22, '021', 'Alat Tulis', 0),
(23, '022', 'Mesin Kantor', 0),
(24, '023', 'Perabot Kantor', 0),
(25, '024', 'Alat Angkutan', 0),
(26, '025', 'Pakaian Dinas', 0),
(27, '026', 'Senjata', 0),
(28, '027', 'Pengadaan', 0),
(29, '028', 'Inventaris', 0),
(30, '029', '-', 0),
(31, '030', 'Kekayaan Daerah', 0),
(32, '031', 'Sumber Daya Alam', 0),
(33, '032', 'Asset Daerah', 0),
(34, '033', '-', 0),
(35, '034', '-', 0),
(36, '035', '-', 0),
(37, '036', '-', 0),
(38, '037', '-', 0),
(39, '038', '-', 0),
(40, '039', '-', 0),
(41, '040', 'Perpustakaan Dokumentasi/Kearsipan/Arsip', 0),
(42, '041', 'Perpustakaan', 0),
(43, '042', 'Dokumentasi', 0),
(44, '043', '-', 0),
(45, '044', '-', 0),
(46, '045', 'Kearsipan', 0),
(47, '046', 'Sandi', 0),
(48, '047', 'Website', 0),
(49, '048', 'Pengelolaan Data', 0),
(50, '049', 'Jaringan Komunikasi Data-', 0),
(51, '050', 'Perencanaan', 0),
(52, '051', 'Proyek Bidang Pemerintahan', 0),
(53, '052', 'Bidang Politik', 0),
(54, '053', 'Bidang Keamanan dan Ketertiban', 0),
(55, '054', 'Bidang Kesejahteraan Rakyat', 0),
(56, '055', 'Bidang Perekonomian', 0),
(57, '056', 'Bidang Pekerjaan Umum', 0),
(58, '057', 'Bidang Pengawasan', 0),
(59, '058', 'Bidang Kepegawaian', 0),
(60, '059', 'Bidang Keuangan', 0),
(61, '060', 'Organisasi/ Ketatalaksanaan', 0),
(62, '061', 'Organisasi Instansi Pemerintah (struktur organisasi)', 0),
(63, '062', 'Organisasi Badan Non Pemerintah', 0),
(64, '063', 'Organisasi Badan Internasional', 0),
(65, '064', 'Organisasi Semi Pemerintah, BKS-AKSI', 0),
(66, '065', 'Ketatalaksanaan/ Tata Naskah/ Sistem', 0),
(67, '066', 'Stempel Dinas', 0),
(68, '067', 'Pelayanan Umum/ Pelayanan Publik/ Analisis', 0),
(69, '068', 'Komputerisasi/ Siskomdagri', 0),
(70, '069', 'Standar Pelayanan Minimal', 0),
(71, '070', 'Penelitian', 0),
(72, '071', 'Riset', 0),
(73, '072', 'Survey', 0),
(74, '073', 'Kajian', 0),
(75, '074', 'Kerjasama Penelitian Dengan Perguruan Tinggi', 0),
(76, '075', 'Kementrian Lainnya', 0),
(77, '076', 'Non Kementrian', 0),
(78, '077', 'Provinsi', 0),
(79, '078', 'Kabupaten/ Kota', 0),
(80, '079', 'Kecamatan/ Desa', 0),
(81, '080', 'Konferensi/ Rapat/ Seminar', 0),
(82, '081', 'Organisasi Instansi Pemerintah (struktur organisasi)', 0),
(83, '090', 'Perjalanan Dinas', 0),
(84, '100', 'Pemerintahan', 0),
(85, '130', 'Pemerintahan Kabupaten / Kota', 0),
(86, '140', 'Pemerintahan Desa/ Kelurahan', 0),
(87, '141', 'Pamong Desa, Meliputi: Pencalonan, Pemilihan, Meninggal, Pengangkatan, Pemberhentian, dan Sebagainya', 0),
(88, '142', 'Penghasilan Pamong Desa', 0),
(89, '143', 'Kekayaan Desa', 0),
(90, '144', 'Dewan Tingkat Desa, Dewan Marga, Rembung Desa', 0),
(91, '145', 'Administrasi Desa', 0),
(92, '146', 'Kewilayahan', 0),
(93, '147', 'Lembaga - Lembaga Tingkat Desa', 0),
(94, '148', 'Perangkat Kelurahan', 0),
(95, '149', 'Dewan Kelurahan/ Desa (Rukun Tetangga/ Rukun Warga/ Rukun Kampung)', 0),
(96, '170', 'DPRD Kabupaten', 0),
(97, '180', 'Hukum', 0),
(98, '200', 'Politik', 0),
(99, '210', 'Kepartaian', 0),
(100, '220', 'Organisasi Kemasyarakatan', 0),
(101, '240', 'Organisasi Kepemudaan', 0),
(102, '250', 'Organisasi Buruh, Tani, Nelayan, dan Angkutan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_sessions`
--

CREATE TABLE `log_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_data_penduduk`
--

CREATE TABLE `master_data_penduduk` (
  `id` bigint(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `no_nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `shdk` varchar(50) NOT NULL,
  `shdrt` varchar(10) NOT NULL,
  `pddk_akhir` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `alamat` varchar(160) NOT NULL,
  `no_rt` varchar(5) NOT NULL,
  `dusun` varchar(20) NOT NULL,
  `id_dusun` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_data_penduduk_`
--

CREATE TABLE `master_data_penduduk_` (
  `id` bigint(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `no_nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `shdk` varchar(50) NOT NULL,
  `shdrt` varchar(10) NOT NULL,
  `pddk_akhir` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `alamat` varchar(160) NOT NULL,
  `no_rt` varchar(5) NOT NULL,
  `dusun` varchar(20) NOT NULL,
  `id_dusun` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `kepada_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` varchar(100) NOT NULL,
  `time_read` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_pertanahan`
--

CREATE TABLE `permohonan_pertanahan` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `kependudukan_id` int(11) NOT NULL,
  `lokasi` text NOT NULL,
  `luas` varchar(20) NOT NULL,
  `status_tanah` varchar(50) NOT NULL,
  `peruntukan_tanah` varchar(50) NOT NULL,
  `tahun_kelola` varchar(10) NOT NULL,
  `utara` varchar(50) NOT NULL,
  `selatan` varchar(50) NOT NULL,
  `barat` varchar(50) NOT NULL,
  `timur` varchar(50) NOT NULL,
  `scan_link` varchar(100) NOT NULL,
  `qr_link` varchar(100) NOT NULL,
  `pbb` varchar(100) NOT NULL,
  `dusun_id` int(11) NOT NULL,
  `time` varchar(100) NOT NULL,
  `status_proses` int(11) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pernyataan_pertanahan`
--

CREATE TABLE `pernyataan_pertanahan` (
  `id` int(11) NOT NULL,
  `permohonan_id` int(11) NOT NULL,
  `saksi1_nama` varchar(50) NOT NULL,
  `saksi1_umur` varchar(5) NOT NULL,
  `saksi1_pekerjaan` varchar(50) NOT NULL,
  `saksi2_nama` varchar(50) NOT NULL,
  `saksi2_umur` varchar(5) NOT NULL,
  `saksi2_pekerjaan` varchar(50) NOT NULL,
  `saksi3_nama` varchar(50) NOT NULL,
  `saksi3_umur` varchar(5) NOT NULL,
  `saksi3_pekerjaan` varchar(50) NOT NULL,
  `saksi4_nama` varchar(50) NOT NULL,
  `saksi4_umur` varchar(5) NOT NULL,
  `saksi4_pekerjaan` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `qr_link` varchar(100) NOT NULL,
  `status_proses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `id` int(11) NOT NULL,
  `nama_rt` varchar(10) NOT NULL,
  `dusun_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`id`, `nama_rt`, `dusun_id`, `uid`) VALUES
(1, '1', 1, 1),
(2, '2', 1, 1),
(3, '3', 1, 1),
(4, '4', 1, 1),
(5, '5', 1, 1),
(6, '6', 1, 1),
(7, '7', 1, 1),
(8, '8', 1, 1),
(9, '9', 2, 1),
(10, '10', 2, 1),
(11, '11', 2, 1),
(12, '12', 2, 1),
(13, '13', 2, 1),
(14, '14', 2, 1),
(15, '15', 2, 1),
(16, '16', 2, 1),
(17, '17', 3, 1),
(18, '18', 3, 1),
(19, '19', 3, 1),
(20, '20', 3, 1),
(21, '21', 3, 1),
(22, '22', 3, 1),
(23, '23', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_setting`
--

CREATE TABLE `sms_setting` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_setting`
--

INSERT INTO `sms_setting` (`id`, `url`, `user`, `pass`, `status`) VALUES
(1, 'https://reguler.zenziva.net', 'cmtiad', 'v3r15juniard1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeline_data_penduduk_`
--

CREATE TABLE `timeline_data_penduduk_` (
  `id` bigint(20) NOT NULL,
  `nik_id` bigint(20) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `time` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `pass`, `fullname`, `jabatan_id`, `hp`, `avatar`, `time`, `desa_id`, `type`) VALUES
(1, 'LayananUmum', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Veris Juniardi', 5, '082281469926', '', '1513141615', 1, 0),
(2, 'kades_gantung', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'SISWADI USMAN', 1, '082281469926', '', '1513141358', 1, 0),
(3, 'sekdes_gantung', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bang Unden', 2, '082281469926', '', '1513142812', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_masuk`
--
ALTER TABLE `arsip_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_surat`
--
ALTER TABLE `history_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_sessions`
--
ALTER TABLE `log_sessions`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `master_data_penduduk`
--
ALTER TABLE `master_data_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_data_penduduk_`
--
ALTER TABLE `master_data_penduduk_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_pertanahan`
--
ALTER TABLE `permohonan_pertanahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pernyataan_pertanahan`
--
ALTER TABLE `pernyataan_pertanahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_setting`
--
ALTER TABLE `sms_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline_data_penduduk_`
--
ALTER TABLE `timeline_data_penduduk_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_masuk`
--
ALTER TABLE `arsip_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_surat`
--
ALTER TABLE `history_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `master_data_penduduk`
--
ALTER TABLE `master_data_penduduk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_data_penduduk_`
--
ALTER TABLE `master_data_penduduk_`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permohonan_pertanahan`
--
ALTER TABLE `permohonan_pertanahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pernyataan_pertanahan`
--
ALTER TABLE `pernyataan_pertanahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sms_setting`
--
ALTER TABLE `sms_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timeline_data_penduduk_`
--
ALTER TABLE `timeline_data_penduduk_`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
