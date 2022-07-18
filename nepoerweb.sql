-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 04:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nepoerweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `updater` varchar(32) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_berita` varchar(20) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id_download` int(11) NOT NULL,
  `id_kategori_download` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_download` varchar(200) DEFAULT NULL,
  `jenis_download` varchar(20) NOT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_kategori_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_galeri` varchar(200) DEFAULT NULL,
  `jenis_galeri` varchar(20) NOT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `popup_status` enum('Publish','Draft','','') NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `status_text` enum('Ya','Tidak','','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_kategori_galeri`, `id_user`, `judul_galeri`, `jenis_galeri`, `isi`, `gambar`, `website`, `hits`, `popup_status`, `urutan`, `status_text`, `tanggal`) VALUES
(12, 4, 4, 'SMKN 1 Purwakarta - Kece Abis', 'Homepage', '<p>Knowledge, Competence, Active, Be Best, Inovative, Smart - \"Kece Abis\"</p>', 'gambar1-1645862107.jpg', NULL, NULL, 'Publish', 1, 'Ya', '2022-02-26 07:55:08'),
(13, 7, 15, 'TPM', 'Galeri', NULL, 'tpm1-1653112410.png', NULL, NULL, 'Publish', 28, 'Ya', '2022-05-21 05:53:31'),
(14, 7, 15, 'TPM', 'Galeri', NULL, 'tpm2-1653113941.png', NULL, NULL, 'Publish', 27, 'Ya', '2022-05-21 06:19:01'),
(15, 7, 15, 'TPM', 'Galeri', NULL, 'tpm3-1653114077.png', NULL, NULL, 'Publish', 26, 'Ya', '2022-05-21 06:21:18'),
(16, 7, 15, 'TPM', 'Galeri', NULL, 'tpm4-1653122336.png', NULL, NULL, 'Publish', 25, 'Ya', '2022-05-21 08:38:57'),
(17, 7, 15, 'TPM', 'Galeri', NULL, 'tpm5-1653123745.png', NULL, NULL, 'Publish', 24, 'Ya', '2022-05-21 09:02:25'),
(18, 8, 15, 'TKR', 'Galeri', NULL, 'tkr1-1653125726.png', NULL, NULL, 'Publish', 23, 'Ya', '2022-05-21 09:35:27'),
(19, 9, 15, 'TBSM', 'Galeri', NULL, 'tbm3-1653125805.png', NULL, NULL, 'Publish', 22, 'Ya', '2022-05-21 09:36:45'),
(20, 9, 15, 'TBSM', 'Galeri', NULL, 'tbm1-1653125827.png', NULL, NULL, 'Publish', NULL, 'Ya', '2022-05-21 09:37:07'),
(21, 9, 15, 'TBSM', 'Galeri', NULL, 'tbm2-1653125845.png', NULL, NULL, 'Publish', 21, 'Ya', '2022-05-21 09:37:26'),
(22, 7, 15, 'TAV', 'Galeri', NULL, 'tav4-1653125934.png', NULL, NULL, 'Publish', 20, 'Ya', '2022-05-21 09:38:54'),
(23, 7, 15, 'TAV', 'Galeri', NULL, 'tav3-1653125956.png', NULL, NULL, 'Publish', NULL, 'Ya', '2022-05-21 09:39:17'),
(24, 7, 15, 'TAV', 'Galeri', NULL, 'tav2-1653125975.png', NULL, NULL, 'Publish', 19, 'Ya', '2022-05-21 09:39:36'),
(25, 7, 15, 'TAV', 'Galeri', NULL, 'tav1-1653125991.png', NULL, NULL, 'Publish', 18, 'Ya', '2022-05-21 09:39:52'),
(26, 7, 15, 'ELIN', 'Galeri', NULL, 'elin1-1653126196.png', NULL, NULL, 'Publish', 17, 'Ya', '2022-05-21 09:43:17'),
(27, 7, 15, 'ELIN', 'Galeri', NULL, 'elin2-1653126212.png', NULL, NULL, 'Publish', 16, 'Ya', '2022-05-21 09:43:33'),
(28, 10, 15, 'DPIB', 'Galeri', NULL, 'dpib3-1653126334.png', NULL, NULL, 'Publish', 16, 'Ya', '2022-05-21 09:45:34'),
(29, 7, 15, 'DPIB', 'Galeri', NULL, 'dpib2-1653126365.png', NULL, NULL, 'Publish', 15, 'Ya', '2022-05-21 09:46:06'),
(31, 11, 15, 'DPIB', 'Galeri', NULL, 'dpib1-1653126629.png', NULL, NULL, 'Publish', 15, 'Ya', '2022-05-21 09:50:29'),
(32, 11, 15, 'DPIB', 'Galeri', NULL, 'dpib4-1653126650.png', NULL, NULL, 'Publish', 14, 'Ya', '2022-05-21 09:50:51'),
(33, 12, 15, 'TJKT', 'Galeri', NULL, 'tkj6-1653127175.png', NULL, NULL, 'Publish', 13, 'Ya', '2022-05-21 09:59:36'),
(34, 12, 15, 'TJKT', 'Galeri', NULL, 'tkj5-1653127198.png', NULL, NULL, 'Publish', 12, 'Ya', '2022-05-21 09:59:59'),
(35, 12, 15, 'TJKT', 'Galeri', NULL, 'tkj4-1653127223.png', NULL, NULL, 'Publish', 11, 'Ya', '2022-05-21 10:00:24'),
(36, 14, 15, 'TJKT', 'Galeri', NULL, 'tkj3-1653127246.png', NULL, NULL, 'Publish', 11, 'Ya', '2022-05-21 10:00:47'),
(37, 13, 15, 'TJKT', 'Galeri', NULL, 'tkj2-1653127284.png', NULL, NULL, 'Publish', NULL, 'Ya', '2022-05-21 10:01:25'),
(38, 13, 15, 'TJKT', 'Galeri', NULL, 'tkj1-1653127304.png', NULL, NULL, 'Publish', 10, 'Ya', '2022-05-21 10:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id_gambar_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_gambar_produk` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_produk`
--

INSERT INTO `gambar_produk` (`id_gambar_produk`, `id_user`, `id_produk`, `nama_gambar_produk`, `gambar`, `keterangan`, `urutan`, `tanggal`) VALUES
(2, 0, 1, '', 'NITRICO_Distributor_Ad_01_b2.jpg', '', 0, '2020-05-29 23:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `industri`
--

CREATE TABLE `industri` (
  `id_industri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategoriindustri` int(11) NOT NULL,
  `updater` varchar(32) NOT NULL,
  `slug_industri` varchar(255) NOT NULL,
  `judul_industri` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_industri` varchar(20) NOT NULL,
  `jenis_industri` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industri`
--

INSERT INTO `industri` (`id_industri`, `id_user`, `id_kategoriindustri`, `updater`, `slug_industri`, `judul_industri`, `isi`, `status_industri`, `jenis_industri`, `keywords`, `gambar`, `icon`, `hits`, `urutan`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_post`, `tanggal_publish`, `tanggal`) VALUES
(1, 15, 1, '', 'pt-hino-manufacturing-motors-indonesia', 'PT Hino Manufacturing Motors Indonesia', '<p>PT Hino Manufacturing Motors Indonesia</p>', 'Publish', 'Industri', 'hino smkn 1 purwakarta', 'hino-symbol-200-removebg-preview-1653281650.png', NULL, 0, NULL, NULL, NULL, '2022-05-23 04:39:34', '2022-05-23 04:39:17', '2022-05-23 04:39:34'),
(2, 15, 1, '', 'pt-mabito-karya', 'PT. Mabito Karya', '<p>Axioo Class Program SMKN 1 Purwakarta</p>', 'Publish', 'Industri', 'axioo smkn 1 purwakarta', 'axioobaru-removebg-preview-1653281797.png', NULL, 0, NULL, NULL, NULL, '2022-05-23 04:41:19', '2022-05-23 04:40:47', '2022-05-23 04:41:19'),
(3, 15, 1, '', 'pt-hitachi-power-system-indonesia', 'PT. Hitachi Power System Indonesia', '<p>PT. Hitachi Power System Indonesia</p>', 'Publish', 'Industri', 'hitachi smkn 1 purwakarta', 'hitachi-1653281634.png', NULL, 0, NULL, NULL, NULL, '2022-05-23 04:42:17', '2022-05-23 04:41:36', '2022-05-23 04:42:17'),
(4, 15, 1, '', 'pt-jiaec', 'PT. JIAEC', '<p>PT. JIAEC</p>', 'Publish', 'Industri', 'jiaec smkn 1 purwakarta', 'jiaec-1653281625.png', NULL, 0, NULL, NULL, NULL, '2022-05-23 04:42:55', '2022-05-23 04:42:36', '2022-05-23 04:42:55'),
(5, 15, 1, '', 'chien-hsin-university', 'Chien HSIN University', '<p>Chien HSIN University</p>', 'Publish', 'Industri', 'chien hsin university smkn 1 purwakarta', 'hsin-1653281618.png', NULL, 0, NULL, NULL, NULL, '2022-05-23 04:43:25', '2022-05-23 04:43:03', '2022-05-23 04:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategorijurusan` int(11) NOT NULL,
  `updater` varchar(32) NOT NULL,
  `slug_jurusan` varchar(255) NOT NULL,
  `judul_jurusan` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_jurusan` varchar(20) NOT NULL,
  `jenis_jurusan` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_user`, `id_kategorijurusan`, `updater`, `slug_jurusan`, `judul_jurusan`, `isi`, `status_jurusan`, `jenis_jurusan`, `keywords`, `gambar`, `icon`, `hits`, `urutan`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_post`, `tanggal_publish`, `tanggal`) VALUES
(1, 15, 1, '', 'teknik-jaringan-komputer-telekomunikasi', 'Teknik Jaringan Komputer & Telekomunikasi', '<p><strong><u>VISI :</u></strong></p>\r\n<p>Bertakwa, Berkarakter, Kompetitif &amp; Komprehensif.</p>\r\n<p>&nbsp;</p>\r\n<p><strong><u>MISI :</u></strong></p>\r\n<ol>\r\n<li>Melaksanakan pembelajaran sesuai dengan Kurikulum 2013 yang telah disempurnakan serta kurikulum nasional yang terbaru, serta menyelaraskan dengan kurikulum industri.</li>\r\n<li>Meningkatkan kualitas pendidik melalui sertifikasi kompetensi, pelatihan, serta pemagangan, baik yang diselenggarakan oleh pemerintah maupun swasta/industri.</li>\r\n<li>Mengembangkan potensi siswa melalui pelatihan kompetensi kejuruan.</li>\r\n<li>Mengembangkan potensi siswa melalui pembinaan mental, akhlak/karakter, keagamaan, dan kedisiplinan.</li>\r\n<li>Mengembangkan kreatifitas siswa melalui keikutsertaan dalam Lomba Kompetensi Siswa dan pengembangan wirausaha sesuai dengan kompetensi keahlian.</li>\r\n<li>Meningkatkan kerja sama dengan dunia usaha/industri guna menciptakan <em>Link &amp; Match</em> antara sekolah dengan industry.</li>\r\n<li>Melaksanakan layanan prima dalam pengelolaan program keahlian.</li>\r\n</ol>\r\n<p><strong><u>TUJUAN KOMPETENSI KEAHLIAN </u></strong></p>\r\n<ol>\r\n<li>Mampu membuat software menggunakan bahasa pemrograman C++ atau bahasa pemograman lainnya.</li>\r\n<li>Mampu merakit komputer/Laptop, memperbaiki, hingga menginstalasi sistem operasi dan aplikasi pada komputer.</li>\r\n<li>Mempunyai pengetahuan dasar yang kuat di bidang jaringan komputer.</li>\r\n<li>Mampu membangun jaringan telepon menggunakan teknologi PBX maupun VoIP.</li>\r\n<li>Mampu mengadministrasi perangkat-perangkat Switch dan Router ( MikroTik /Cisco ).</li>\r\n<li>Mampu mengadministrasi berbagai layanan server menggunakan sistem operasi Linux Debian atau distro Linux lainnya.</li>\r\n<li>Mampu mengadministrasi router menggunakan perangkat Mikrotik.</li>\r\n<li>Mampu merencanakan dan melaksanakan instalasi berbagai perangkat jaringan nirkabel.</li>\r\n<li>Mampu merencanakan dan mengadministrasi perangkat-perangkat yang digunakan dalam mengamankan jaringan komputer.</li>\r\n<li>Memahami proses bisnis di bidang teknik jaringan komputer dan telekomunikasi</li>\r\n<li>Memahami wawasan perkembangan bidang teknik jaringan komputer dan telekomunikasi</li>\r\n<li>Memahami profesi dan kewirausahan (<em>job-profile </em>dan <em>technopreneurship), </em>serta peluang usaha di bidang teknik jaringan komputer dan telekomunikasi</li>\r\n<li>Memahami lingkup kerja pada bidang teknik jaringan komputer dan telekomunikasi</li>\r\n<li>Menerapkan Keselamatan dan Kesehatan Kerja serta Lingkungan Hidup (K3LH) di lingkungan kerjanya</li>\r\n<li>Memahami penerapan media dan jaringan telekomunikasi.</li>\r\n<li>Memahami penggunaan Alat Ukur dalam teknik Jaringan Komputer dan Telekomunikasi.</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong><u>RUANG LINGKUP PEKERJAAN&nbsp; </u></strong></p>\r\n<ol>\r\n<li>Bekerja sebagai :</li>\r\n</ol>\r\n<ul>\r\n<li>Teknisi komputer</li>\r\n<li>Konsultan IT</li>\r\n<li>Teknisi Jaringan Komputer</li>\r\n<li>Network Operators</li>\r\n<li>Network Administrator</li>\r\n<li>Programmer</li>\r\n<li>Desainer Grafis</li>\r\n<li>System Analyst</li>\r\n<li>Web Designer</li>\r\n<li>Data Entry</li>\r\n<li>TNI, POLRI, PNS</li>\r\n</ul>\r\n<ol start=\"2\">\r\n<li>Wirausaha :</li>\r\n</ol>\r\n<ul>\r\n<li>Penyedia jasa pemasangan jaringan komputer/internet</li>\r\n<li>Penyedian jasa perakitan dan perbaikan perangkat computer/laptop</li>\r\n<li>Penyedia jasa instalasi perangkat lunak komputer</li>\r\n<li>Membuka toko computer</li>\r\n<li>Membuka warung internet/warnet</li>\r\n<li>Penyedia jasa pembuatan program aplikasi atau web</li>\r\n<li>Membuka percetakan spanduk, brosur, pamphlet</li>\r\n<li>Usaha lainnya sesuai minat bakat siswa</li>\r\n</ul>\r\n<ol start=\"3\">\r\n<li>Melanjutkan studi ke jenjang D3/D4, S1/S2/S3</li>\r\n</ol>\r\n<ul>\r\n<li>Jurusan Teknik Informatika</li>\r\n<li>Jurusan Teknik Komputer</li>\r\n<li>Jurusan Manajemen Informatika</li>\r\n<li>Jurusan Ilmu Telekomunikasi</li>\r\n<li>Jurusan Pendidikan Ilmu Komputer</li>\r\n<li>Jurusan Multimedia</li>\r\n<li>Jurusan Animasi</li>\r\n<li>Jurusan Teknik Elektronika</li>\r\n<li>Jurusan Komputer Akuntasi</li>\r\n<li>Atau jurusan lainnya sesuai minat dan bakat siswa</li>\r\n</ul>\r\n<p><u>&nbsp;</u></p>\r\n<p><strong><u>KOMPETENSI YANG DIAJARKAN</u></strong></p>\r\n<ol>\r\n<li>Dasar-dasar Teknik Jaringan Komputer dan Telekomunikasi</li>\r\n<li>Coding atau pemrograman dasar</li>\r\n<li>Keselamatan dan Kesehatan Kerja serta Lingkungan Hidup (K3LH) di lingkungan kerja</li>\r\n<li>Penerapan media dan jaringan telekomunikasi.</li>\r\n<li>Penggunaan Alat Ukur dalam teknik Jaringan Komputer dan Telekomunikasi.</li>\r\n<li>Proses bisnis di bidang teknik jaringan komputer dan telekomunikasi</li>\r\n<li>Perkembangan bidang teknik jaringan komputer dan telekomunikasi</li>\r\n<li>Profesi dan kewirausahan (job-profile dan technopreneurship), serta peluang usaha di bidang teknik jaringan komputer dan telekomunikasi</li>\r\n<li>Merakit komputer/Laptop, memperbaiki/troubleshooting perangkat keras dan perangkat lunak komputer, menginstalasi sistem operasi dan aplikasi pada komputer.</li>\r\n<li>Membangun jaringan telepon menggunakan teknologi PBX maupun VoIP.</li>\r\n<li>Mengadministrasi perangkat-perangkat Switch dan Router ( MikroTik /Cisco ).</li>\r\n<li>Mengadministrasi berbagai layanan server menggunakan sistem operasi Linux Debian atau distro Linux lainnya.</li>\r\n<li>Mengadministrasi router menggunakan perangkat Mikrotik.</li>\r\n<li>Merencanakan dan melaksanakan instalasi berbagai perangkat jaringan nirkabel.</li>\r\n<li>Merencanakan dan mengadministrasi perangkat-perangkat yang digunakan dalam mengamankan jaringan komputer.</li>\r\n<li>Memperbaiki/troubleshooting perangkat jaringan komputer</li>\r\n<li>Melaksanakan praktek kerja di industri</li>\r\n</ol>\r\n<p><strong><u>JUMLAH SISWA TKJ TAHUN PELAJARAN</u></strong> <strong><u>2021/2022</u></strong></p>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 24px;\">\r\n<td style=\"width: 50%; text-align: center; height: 24px;\"><strong>KELAS</strong></td>\r\n<td style=\"width: 50%; text-align: center; height: 24px;\"><strong>JUMLAH SISWA</strong></td>\r\n</tr>\r\n<tr style=\"height: 40px;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p style=\"text-align: center;\">X TKJ 1 ( AXIOO CLASS PROGRAM )</p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px; text-align: center;\" width=\"124\">\r\n<p style=\"text-align: center;\">36</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 40px; text-align: center;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p>X TKJ 2</p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px;\" width=\"124\">\r\n<p style=\"text-align: center;\">36</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 40px; text-align: center;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p>X TKJ 3</p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px;\" width=\"124\">\r\n<p style=\"text-align: center;\">36</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 40px; text-align: center;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p>XI TKJ 1 ( AXIOO CLASS PROGRAM)</p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px;\" width=\"124\">\r\n<p style=\"text-align: center;\">34</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 40px; text-align: center;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p>XI TKJ 2</p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px;\" width=\"124\">\r\n<p style=\"text-align: center;\">36</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 40px; text-align: center;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p>XI TKJ 3</p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px; text-align: center;\" width=\"124\">\r\n<p>35</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 40px; text-align: center;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p>XII TKJ 1&nbsp;( AXIOO CLASS PROGRAM )</p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px; text-align: center;\" width=\"124\">\r\n<p>36</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 40px; text-align: center;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p>XII TKJ 2</p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px; text-align: center;\" width=\"124\">\r\n<p>34</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 40px; text-align: center;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p>XII TKJ 3</p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px; text-align: center;\" width=\"124\">\r\n<p>34</p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 40px; text-align: center;\">\r\n<td style=\"width: 50%; height: 40px;\" width=\"301\">\r\n<p><strong>TOTAL&nbsp; SISWA TKJ </strong></p>\r\n</td>\r\n<td style=\"width: 50%; height: 40px; text-align: center;\" width=\"124\">\r\n<p><strong>317</strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>&nbsp;</p>', 'Publish', 'Jurusan', 'tkj smkn 1 purwakarta', 'tkj-1654281193.png', NULL, 0, 1, NULL, NULL, '2022-05-16 09:49:15', '2022-05-16 09:48:51', '2022-06-03 18:33:13'),
(2, 15, 1, '', 'desain-pemodelan-informasi-bangunan', 'Desain Pemodelan & Informasi Bangunan', '<p><em>&ldquo; Mewujudkan Program Keahlian Teknik Desain Pemodelan dan Informasi Bangunan SMK Negeri 1 Purwakarta yang mampu menghasilkan lulusan yang profesional, berakhlak mulia serta mampu memenuhi tuntutan dunia kerja dalam dan luar negeri maupun berwirausaha &nbsp;</em>&rdquo;</p>\r\n<p><strong>Misi :</strong></p>\r\n<ol>\r\n<li>Mengembangkan iklim belajar yang berlandaskan pada norma dan nilai budaya bangsa Indonesia.</li>\r\n<li>Meningkatkan kompetensi peserta didik di Bidang Teknik Gambar Bangunan agar dapat menjadi tenaga kerja profesional</li>\r\n<li>Menyiapkan tamatan Program keahlian Teknik Gambar Bangunan yang sigap, tanggap, terampil, berjiwa wirausaha berakhlaq mulia dan mampu mengembangkan diri sesuai dengan perkembangan jaman.</li>\r\n<li>Mencetak tamatan agar mampu memiliki karier dalam bidangnya, berwirausaha, dan melanjutkan studi ke jenjang yang lebih tinggi.</li>\r\n<li>Bekerja sama dengan instansi atau perusahaan yang terkait dalam meningkatkan kompetensi peserta didik.</li>\r\n</ol>\r\n<p><strong>Tujuan :</strong></p>\r\n<p>Membekali peserta didik dengan ketrampilan, pengetahuan dan sikap agar :</p>\r\n<ol>\r\n<li>Kompeten melakukan pekerjaan sebagai drafter/juru gambar dalam perencanaan bangunan.</li>\r\n<li>Kompeten melakukan pekerjaan membaca gambar dalam pekerjaan pelaksanaan bangunan.</li>\r\n<li>Kompeten melakukan pekerjaan jasa perencanaan penggambaran bangunan secara mandiri.</li>\r\n<li>Kompeten melakukan pekerjaan menghitung Rencana Anggaran Biaya (RAB) bangunan.</li>\r\n</ol>\r\n<p><strong>PROGRAM JURUSAN</strong></p>\r\n<ol>\r\n<li>Sertifikasi Uji Kompetensi Keahlian bekerja sama dengan PUPR</li>\r\n<li>Praktek Keja Lapangan (PKL)</li>\r\n<li>Kunjungan Industri</li>\r\n<li>Ekstrakurikuler bidang kejuruan</li>\r\n</ol>\r\n<p><strong>PROFIL KOMPETENSI LULUSAN</strong></p>\r\n<ol>\r\n<li><strong>BEKERJA</strong></li>\r\n</ol>\r\n<p><em>DRAFTER</em></p>\r\n<p>Bertanggung jawab membuat gambar bangunan, jika bekerja di konsultan perencana bertugas membuat gambar perencanaan, jika bekerja di kontraktor bertugas membuat gambar kerja atau shopdrawing dan asbuiltdrawing.</p>\r\n<p>&nbsp;</p>\r\n<p><em>QUANTITY SURVEYOR</em></p>\r\n<p>Kerjanya menghitung volume bangunan,kebutuhan material dan membuat laporan progres pekerjaan.</p>\r\n<p><em>UITZET / SURVEYOR</em><br />Bertugas dalam hal pengukuran seperti membuat data ukuran existing tanah atau bangunan, dan mengukur untuk penerapan gambar kerja ke lokasi pekerjaan.</p>\r\n<p><em>PELAKSANA</em> <br />Bertugas mengawal jalanya pekerjaan konstruksi bangunan agar sesuai apa yang sudah direncanakan, dilaksanakan secepat mungkin dan dengan hasil berkualitas maksimal. pada proyek besar seperti pembangunan gedung bertingkat tinggi, ada pembagian tugas pelaksana dari mulai pelaksana besi, bekisting, cor beton, nishing, listrik, dan yang lainya menyesuaikan kebutuhan.</p>\r\n<p><em>PEMBORONG / KONTRAKTOR</em></p>\r\n<p>Jika berani menjalani usaha secara mandiri, maka bisa bergerak dibidang pemborong atau kontraktor. jika memerlukan tenaga ahli maka bisa sambil melanjutkan kuliah S1, atau dengan cara merekrut sarjana sebagai karyawan.</p>\r\n<p>&nbsp;</p>\r\n<p><em>KONSULTAN&nbsp; PERENCANA</em></p>\r\n<p>Bisa juga membuka usaha di bidang perencanaan, seperti jasa desain rumah, pembuatan maket, gambar 3D dan sejenisnya. untuk lebih&nbsp;mendalami keilmuan dibidang ini maka bisa melanjutkan kuliah jurusan Arsitektur.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"2\">\r\n<li><strong>MELANJUTKAN KULIAH</strong></li>\r\n</ol>\r\n<p>Jurusan yang sesuai yaitu Arsitektur dan Teknik sipil, tapi kalau mau masuk ke jurusan lain juga tidak jadi masalah asal giat dalam berkuliah.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>KOMPETENSI YANG DIAJARKAN :</strong></p>\r\n<ol>\r\n<li>Gambar Teknik</li>\r\n<li>Dasar-dasar Konstruksi Bangunan dan Teknik Pengukuran Tanah</li>\r\n<li>Mekanika Teknik</li>\r\n<li>Aplikasi Perangkat Lunak dan Perencanaan Interior Gedung</li>\r\n<li>Konstruksi Jalan dan Jembatan</li>\r\n<li>Konstruksi Utilitas Gedung</li>\r\n<li>Estimasi Biaya Konstruksi</li>\r\n</ol>', 'Publish', 'Jurusan', 'dpib tgb smkn 1 purwakarta', 'dpib-1652872019.png', NULL, 0, NULL, NULL, NULL, '2022-05-16 13:37:25', '2022-05-16 13:35:51', '2022-05-18 11:06:59'),
(3, 15, 1, '', 'teknik-instalasi-tenaga-listrik', 'Teknik Instalasi Tenaga Listrik', '<p><strong>VISI</strong></p>\r\n<p>Mandiri berkarya aktif belajar dalam suasana nyaman yang beriman dan bertaqwa melalui teknologi dan informasi aktual serta sikap disiplin dan pikiran positif</p>\r\n<p><strong>MISI</strong></p>\r\n<ol>\r\n<li>Menyelenggarakan diklat kejuruan teknik menggunakan Standar Nasional Pendidikan</li>\r\n<li>Meningkatkan kualitas pembelajaran berbasis Informasi dan Teknologi sebagai dasar penguatan keterampilan</li>\r\n<li>Meningkatkan profesionalisme sebagai pusat pengembangan kompetensi</li>\r\n<li>Mengembangkan potensi lokal dan memberdayakannya menjadi jiwa mandiri dan kompetitif</li>\r\n<li>Meningkatkan pola pikir dan jiwa yang enterpreneur sehingga berani dan kreatif</li>\r\n<li>Mengembangkan kerjasama dengan Dunia Usaha dan Dunia Industri yang terkait</li>\r\n<li>Meningkatkan profesionalisme pendidik dengan penyelenggaraan pendidikan dan pelatihan</li>\r\n<li>Meningkatkan pendidikan teknik kejuruan yang berkarakter</li>\r\n</ol>\r\n<p>PROGRAM JURUSAN</p>\r\n<ol>\r\n<li>Sertifikasi Kelas Industri PJT II</li>\r\n<li>Uji Kompetensi Keahlian (UKK)</li>\r\n<li>Praktek Kerja Lapangan (PKL)</li>\r\n<li>Lomba Kompetensi Siswa</li>\r\n<li>Kunjungan Industri</li>\r\n<li>Ekstrakurikuler bidang kejuruan</li>\r\n</ol>\r\n<p><strong>RUANG LINGKUP KOMPETENSI KEAHLIAN TEKNIK INSTALASI TENAGA LISTRIK</strong></p>\r\n<p>Menjadikan siswa Teknik Instalasi Tenaga Listrik menjadi kompeten dalam bidang Pemasangan dan Pemeliharaan instalasi listrik, Pengoperasian sistem pengendali motor listrik yang berbasis elektronika ataupun PLC, Perawatan dan perbaikan ringan peralatan rumah tangga, serta pemeliharaan panel hubung bagi listrik</p>', 'Publish', 'Jurusan', 'titl smkn 1 purwakarta', 'titl-1652872333.png', NULL, 0, NULL, NULL, NULL, '2022-05-16 13:51:03', '2022-05-16 13:40:03', '2022-05-18 11:12:13'),
(4, 15, 1, '', 'teknik-kendaraan-ringan-otomotif', 'Teknik Kendaraan Ringan Otomotif', '<table class=\"tiny-table\" width=\"71\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>Profil :</strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" width=\"718\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>Teknik Kendaraan Ringan adalah ilmu yang mempelajari tentang alat-alat transportasi darat yang</p>\r\n<p>menggunakan mesin, terutama mobil yang mulai berkembang sebagai cabang ilmu seiring dengan</p>\r\n<p>diciptakannya mesin mobil. Dalam perkembangannya, mobil semakin menjadi alat transportasi yang</p>\r\n<p>kompleks yang terdiri dari ribuan komponen yang tergolong dalam puluhan system dan subsistem. Oleh</p>\r\n<p>karena itu, Teknik Kendaraan Ringan pun berkembang menjadi ilmu yang luas dan mencakup semua</p>\r\n<p>system dan subsistem.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" width=\"718\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>Teknik Kendaraan Ringan, membekali peserta didik dengan ilmu kendaraan ringan agar mampu</p>\r\n<p>melaksanakan perawatan dan perbaikan komponen &ndash; komponen mobil secara mandiri, merawat dan</p>\r\n<p>memperbaiki mobil sesuai dengan standar yang ditentukan oleh pabrik, merawat dan memperbaiki mobil</p>\r\n<p>pada bengkel atau perusahaan dimana tempat ia bekerja, serta menciptakan lapangan kerja baru bagi</p>\r\n<p>dirinya dan orang lain.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" width=\"65\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>VISI :</strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" width=\"717\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>Visi Kompetensi Keahlian Teknik Kendaraan Ringan Otomotif SMK Negeri 1 Purwakarta adalah</p>\r\n<p>menjadi penyelenggara pendidikan di bidang teknologi otomotif yang menghasilkan tenaga kerja</p>\r\n<p>siap pakai professional serta dipercaya oleh masyarakat dan dunia usaha/dunia industry.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" width=\"83\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>Tujuan :</strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" width=\"718\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>Tujuan Kompetensi keahlian Teknik Kendaraan Ringan SMK Negeri 1 Purwakarta yaitu membekali peserta</p>\r\n<p>didik dengan pengetahuan, sikap, prilaku dan keterampilan agar kompeten dalam :</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" width=\"717\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>Bidang kompetensi keahlian Teknik Kendaraan Ringan yang diberikan, sehingga mampu</p>\r\n<p>mengembangkan dan mengaplikasikan dalam pekerjaanya secara mandiri dan dapat mengisi</p>\r\n<p>lowongan pekerjaan yang ada di dunia usaha dan dunia industry sebagai tenaga kerja tingkat</p>\r\n<p>menengah yang handal.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" width=\"690\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>1. Memiliki karakter, mampu berkompetisi dan mengembangkan sikap professional dalam</p>\r\n<p>kompetensi keahlianTeknik Kendaraan Ringan.</p>\r\n<p>2. Menciptakan Lapangan Kerja sendiri atau bewirausaha dalam bidang kompetensi keahlian</p>\r\n<p>teknik Kendaraan Ringan.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" width=\"654\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>3. Melanjutkan ke jenjang Pendidikan yang lebih tinggi sesuai kompetensi yang dimiliki</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"tiny-table\" style=\"height: 39px;\" width=\"671\">\r\n<tbody>\r\n<tr style=\"height: 39px;\">\r\n<td style=\"height: 39px;\">\r\n<p>Kerjasama Dunia Usaha / Dunia Industri : PT. HINO Indonesia, AUTO 2000 Purwakarta,dll</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Publish', 'Jurusan', 'tkr otomotif smkn 1 purwakarta', 'tkro-1652872728.png', NULL, 0, NULL, NULL, NULL, '2022-05-16 14:35:20', '2022-05-16 14:34:08', '2022-05-18 11:18:48'),
(5, 15, 1, '', 'teknik-pemesinan', 'Teknik Pemesinan', '<p>Teknik Pemesinan adalah salah satu jurusan tertua di SMK Negeri 1 Purwakarta. Sejak berdiri pertama kali tahun 1965. Dalam perkembangnya jurusan sering kali berubah ubah dari jurusan, konsetrasi hingga berubah menjadi program keahlian dan sekarang dengan Kurikulum 2013 revisi menjadi Kompetensi Keahlian Teknik Pemesinan</p>\r\n<p>Program Keahlian Teknik Pemesinan di SMK Negeri 1 Purwakarta, saat ini telah berstatus terakreditasi A. Kurikulum demi kurikulum telah diperbaruhi, administrasi juga sering sekali di dirubah sehingga mendapatkan formulasi paling bagus untuk menopang semua kegiatan kependidikan di Program Keahlian Teknik Pemesinan.</p>\r\n<p>Adapun kompetensi yang dikembangkan di Kompetensi Keahlian Teknik Pemesinan dalah sebagai berikut :</p>\r\n<ol>\r\n<li>Menggunakan peralatan pembandingan dan/atau alat ukur dasar</li>\r\n<li>Mengukur dengan alat ukur mekanik presisi</li>\r\n<li>Menggunakan perkakas tangan</li>\r\n<li>Menggunakan perkakas bertenaga/operasi digenggam</li>\r\n<li>Menginterpretasikan sketsa</li>\r\n<li>Membaca gambar teknik</li>\r\n<li>Menggunakan mesin untuk operasi dasar</li>\r\n<li>Melakukan pekerjaan dengan mesin bubut</li>\r\n<li>Melakukan pekerjaan dengan mesin frais</li>\r\n<li>Melakukan pekerjaan dengan mesin gerinda</li>\r\n<li>Menggunakan mesin bubut (kompleks)</li>\r\n<li>Memfrais (kompleks)</li>\r\n<li>Menggerinda pahat dan alat potong</li>\r\n<li>Mengeset mesin dan program mesin NC/CNC (dasar)</li>\r\n<li>Memprogram mesin NC/CNC (dasar)</li>\r\n<li>Mengoperasikan mesin NC/CNC (Dasar).</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>Visi dan Misi </strong></p>\r\n<p><strong>Program Keahlian Teknik Pemesinan</strong></p>\r\n<p><strong>SMKN 1 Purwakarta</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>Visi</strong></p>\r\n<p>Menciptakan sumber daya manusia yang cerdas, mandiri, mampu menguasai dan mengembangkan&nbsp; Iptek (Ilmu Pengetahuan dan Teknologi). Dan&nbsp; menerapkan Imtaq ( Iman dan Taqwa), serta siap menghadapi era Revolusi Industri 4.0 menuju Industri Global pada tahun 2024.</p>\r\n<p><strong>Misi&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>\r\n<ol>\r\n<li><strong>M</strong>eningkatkan profesionalisme dan meningkatkan mutu layanan pendidikan dalam bidang praktik pemesinan.</li>\r\n<li><strong>E</strong>fektif dan disiplin dalam menjalankan semua kegiatan pembelajaran di jurusan Teknik Pemesinan</li>\r\n<li><strong>S</strong>ikap yang toleran dalam menjalankan semua aktifitas baik praktik maupun sosial</li>\r\n<li><strong>I</strong>novatif dalam pengembangan diri pada proses pembelajaran Praktik Pemesinan</li>\r\n<li><strong>N</strong>ilai Keberhasilan pembelajaran Kompetensi Pemesinan ditandai dengan banyaknya lulusan yang diserap oleh DU/DI, dengan diadakannya Sertifikasi Profesi</li>\r\n</ol>\r\n<p><strong>&nbsp; Tujuan </strong></p>\r\n<p>Tujuan Program Keahlian Teknik Pemesinan SMK Negeri 1 Purwakarta adalah sebagai penyelenggaraan pendidikan di SMK Negeri 1 Purwakarta di bawah naungan Dinas Pendidikan Provinsi Jawa Barta bertujuan untuk menghasilkan lulusan yang Yang berkarakter, cerdas, mandiri, berimtaq dan menguasai iptek serta mampu mengembangkan keunggulan lokal sehingga siap bersaing di pasar nasional seiring adanya revolusi industri 4.0 menuju Industri Global pada tahun 2024.</p>', 'Publish', 'Jurusan', 'teknik mesin smkn 1 purwakarta', 'tpm-1652877553.png', NULL, 0, NULL, NULL, NULL, '2022-05-17 03:13:37', '2022-05-17 03:03:38', '2022-05-18 12:39:13'),
(6, 15, 1, '', 'teknik-elektronika-industri', 'Teknik Elektronika Industri', '<p><strong>PROFIL KOMPETENSI KEAHLIAN TEKNIK ELEKTRONIKA INDUSTRI</strong></p>\r\n<p><strong>SMKN 1 PURWAKARTA</strong></p>\r\n<p><strong>Visi Kompetensi Keahlian Teknik Elektronika Industri</strong></p>\r\n<p>Program Keahlian Teknik Elektronika Industri memiliki visi :</p>\r\n<p>Terwujudnya Sumber Daya Manusia Yang Berkarakter, Cerdas, Mandiri, Berimtaq Dan Menguasai Ilmu Pengetahuan Elektrnika dalam Bidang Pabrikan Sistem Kontrol, Pemrograman Otomatisasi, Serta Mampu Mengembangkan Keunggulan Lokal Sehingga Siap Bersaing Di Pasar Nasional Seiring Adanya Revolusi Industri 4.0 Menuju Global Pada Tahun 2024</p>\r\n<p><strong>Misi Kompetensi Keahlian Teknik Elektronika Industri:</strong></p>\r\n<ol>\r\n<li>Meningkatkan Profesionalisme Dan <em>Good Governance</em> Sebagai Pusat Pembudayaan Kompetensi;</li>\r\n<li>Meningkatkan Mutu Layanan Pendidikan (8 SNP);</li>\r\n<li>Membangun Dan Memberdayakan Potensi Yang Ada Sehingga Menghasilkan Lulusan Yang Berkarakter, Cerdas, Mandiri, Berimtaq Dan Menguasai Ilmu Pengetahuan Elektronika dalam Bidang Pabrikan Sistem Kontrol, Pemrograman Otomatisasi Serta Mampu Mengembangkan Keunggulan Lokal Yang Kompetitif Di Pasar Nasional Dan Global;</li>\r\n<li>Memberdayakan Dan Mengembangkan Potensi Lokal Menjadi Keunggulan Komparatif;</li>\r\n<li>Mengembangkan Kerjasama Dengan Industri Dan Berbagai Lembaga Terkait;</li>\r\n<li>Meningkatkan Sistem Dan Tata Kelola Atau Manajemen Pendidikan Yang Maju;</li>\r\n<li>Mengembangkan Pendidikan Karakter Berbasis Ketarunaan;</li>\r\n<li>Meningkatkan Layanan Pendidikan Bermutu Yang Merata Dan Terjangkau Untuk Semua;</li>\r\n<li>Meningkatkan Layanan Pendidikan Berbasis Kewirausahaan Dan Produk Kreatif;</li>\r\n<li>Meningkatkan Layanan Pendidikan Untuk Pembiasaan Dan Penguasaan IPTEK Seiring Revolusi Industry 4.0;</li>\r\n<li>Mengembangkan Layanan Pendidikan Berbasis Kearifan Lokal;</li>\r\n<li>Mendirikan Dan Mengembangkan Kelas Industry untuk siwa yang terpilih dalam<strong> AXIOO CLASS PROGRAM</strong></li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>Tujuan Kompetensi Keahlian </strong><strong>Teknik Elektronika Industri:</strong></p>\r\n<p>Tujuan Kompetensi Keahlian Elektronika Industri adalah :</p>\r\n<ol>\r\n<li>Menyelenggarakan sistem pendidikan Teknik Elektronika Industri yang berkualitas dan beretos kerja tinggi.</li>\r\n<li>Mendidik tenaga kerja Teknik Industri yang disiplin dan mempunyai loyalitas tinggi.</li>\r\n<li>Mendidik tenaga kerja Teknik Elektronika Industri yang mampu bersaing baik tingkat nasional, regional maupun global.</li>\r\n<li>Menciptakan tenaga Teknik Elektronika Industri yang mampu berwirausaha</li>\r\n<li>Mendidik tenaga terampil di bidang Teknik Elektronika Industri yang mampu menciptakan lapangan kerja.</li>\r\n<li>Mengembangkan <strong>T</strong><strong>eaching </strong><strong>F</strong><strong>actory</strong><strong> / Kelas Industri</strong> untuk siswa yang terpilih bersama <strong>AXIOO CLASS PROGRAM</strong> dalam ketrampilan perangkat lunak, perangkat keras, robotic industrial berbasis internet, Elektronik Aplication berbasis pemrograman, Electronik Industrial berbasis PLC serta kamunikasi berstandar TOEIC/TOEFL</li>\r\n</ol>\r\n<p><strong>Ruang Lingkup Pekerjaan </strong></p>\r\n<p>Ruang lingkup pekerjaan bagi lulusan Program Keahlian Teknik Elektronika pada Kompetensi Keahlian Elektronika Industri antara lain adalah:</p>\r\n<ol>\r\n<li>Bekerja di perusahaan hp, computer, note book dll.</li>\r\n<li>Bekerja di perusahaan berbasis produksi masal.</li>\r\n<li>Bekerja di perusahaan control kelistrik</li>\r\n<li>Bekerja di perusahaan berbasis kendali jarak jauh.</li>\r\n<li>Bekerja di perusahaan spareparts mesin, motor, mobil dll.</li>\r\n<li>Bekerja di perusahaan yang produksinya berbasis robot</li>\r\n<li>Bekerja di perusahaan yang berbasis pemrograman elektronik.</li>\r\n<li>Bekerja di perusahaan yang berbasis Programeblel Logik Control (PLC)</li>\r\n<li>Bekerja di perusahaan yang berbasis internet.</li>\r\n<li>Bekerja berwirausaha di bidang control panel dll.</li>\r\n</ol>', 'Publish', 'Jurusan', 'elin elektro av audio video smkn 1 purwakarta', 'telin-1654281355.png', NULL, 0, NULL, NULL, NULL, '2022-05-17 04:46:28', '2022-05-17 04:43:53', '2022-06-03 18:35:55'),
(7, 15, 1, '', 'teknik-dan-bisnis-sepeda-motor', 'Teknik dan Bisnis Sepeda Motor', '<p style=\"text-align: center;\"><strong>Profil</strong></p>\r\n<p style=\"text-align: center;\">TSM (Teknik Sepeda Motor) adalah salah satu jurusan di program keahlian TEKNIK OTOMOTIF yang <br />berkecimpung dalam kendaraan roda dua / R2 ( sepeda motor), dimana siswa di bekali <br />dg keterampilan, pengetahuan dan sikap sebagai mechanik level dasar (mechanic junior) <br />yang kompeten, dan di siapkan untuk bekerja di bengkel resmi sepeda motor ataupun di <br />bengkel-bengkel sepeda motor secara umum. hingga mempersiapkan siswa untuk <br />menjadi wirausahawan di bidang perbengkelan sepeda motor.</p>\r\n<p style=\"text-align: center;\"><strong>VISI</strong><br />Menjadi lembaga pendidikan dan pelatihan yang mempunyai keunggulan dalam ilmu <br />pengetahuan teknologi dan kewirausahaan / Badan Layanan Usaha Daerah (BLUD)yang <br />peduli terhadap mahluk dan lingkungan.</p>\r\n<p style=\"text-align: center;\"><strong>MISI</strong><br />Mengembangkan sumber daya manusia untuk mengisi kebutuhan dunia usaha dan <br />industry dalam bidang teknik dan bisnis sepeda motor, mengembangkan sikap <br />professional, siap untuk melanjutkan pendidikan ke jenjang lebih tinggi serta mampu <br />berwirausaha.<br />Materi Pembelajaran : Perbaikan Sistem Injeksi Sepeda Motor, Over Houl Engine Sepeda <br />Motor, Tune Up Sepeda Motor, Perbaikan Mesin Sepeda Motor, Perbaikan Chasis Sepeda <br />Motor, Perbaikan Kelistrikan Sepeda Motor, Pendidikan Mekanik Senior, dan Pendidikan <br />Berbasis Teaching Factory.<br />Peluang Kerja : Bekerja di Perusahaan Berskala Internasional, bekerja sebagai mekanik <br />sepeda motor, staff Teknik Perusahaan Sepeda Motor, Berwirausaha bengkel sepeda <br />motor dan banyak lagi.<br />Kerjasama Dunia Usaha / Dunia Industri : PT.Permata Motor Dealer Yamaha Purwakarta<br />, AHASS Honda Motor Purwakarta dll.<br />Lomba/Event yang pernah diikuti siswa TBSM (2 tahun terakhir) :<br />Lomba Kompetensi Siswa (LKS) Wilayah Kerja 4 Bidang Lomba Teknik Sepeda Motor <br />Tahun 2021,<br />LKS SMK Tingkat Kab. Purwakarta Bidang Lomba Teknik Sepeda Motor Tahun 2018,<br />Lulusan (Alumni) siswa TSM : Melanjutkan studi di universitas negeri/swasta, <br />berwirausaha dan bekerja.</p>', 'Publish', 'Jurusan', 'tbsm smkn 1 purwakarta', 'tsm-1654281416.png', NULL, 0, NULL, NULL, NULL, '2022-05-18 05:46:40', '2022-05-18 05:43:42', '2022-06-03 18:36:56'),
(8, 15, 1, '', 'teknik-audio-video', 'Teknik Audio Video', '<p style=\"text-align: center;\"><strong>PROFIL KOMPETENSI KEAHLIAN TEKNIK ELEKTRONIKA AUDIO VIDEO</strong></p>\r\n<p style=\"text-align: center;\"><strong>SMKN 1 PURWAKARTA</strong></p>\r\n<p style=\"text-align: left;\"><strong>Visi Kompetensi Keahlian Teknik Elektronika Audio Video </strong></p>\r\n<p>Program Keahlian Teknik Elektronika Audio Video memiliki visi :</p>\r\n<p>Terwujudnya Sumber Daya Manusia Yang Berkarakter, Cerdas, Mandiri, Berimtaq Dan Menguasai Ilmu Pengetahuan Elektrnika dalam Bidang Pabrikan Audio Video, Pemrograman, Perangkat komunikasi, Pesawat Penerima Serta Mampu Mengembangkan Keunggulan Lokal Sehingga Siap Bersaing Di Pasar Nasional Seiring Adanya Revolusi Industri 4.0 Menuju Global Pada Tahun 2024</p>\r\n<p><strong>Misi Kompetensi Keahlian Teknik Elektronika Audio Video</strong></p>\r\n<ol>\r\n<li>Meningkatkan Profesionalisme Dan <em>Good Governance</em> Sebagai Pusat Pembudayaan Kompetensi;</li>\r\n<li>Meningkatkan Mutu Layanan Pendidikan (8 SNP);</li>\r\n<li>Membangun Dan Memberdayakan Potensi Yang Ada Sehingga Menghasilkan Lulusan Yang Berkarakter, Cerdas, Mandiri, Berimtaq Dan Menguasai Ilmu Pengetahuan Elektrnika dalam Bidang Pabrikan Audio Video, Pemrograman, Perangkat komunikasi, Pesawat Penerima Serta Mampu Mengembangkan Keunggulan Lokal Yang Kompetitif Di Pasar Nasional Dan Global;</li>\r\n<li>Memberdayakan Dan Mengembangkan Potensi Lokal Menjadi Keunggulan Komparatif;</li>\r\n<li>Mengembangkan Kerjasama Dengan Industri Dan Berbagai Lembaga Terkait;</li>\r\n<li>Meningkatkan Sistem Dan Tata Kelola Atau Manajemen Pendidikan Yang Maju;</li>\r\n<li>Mengembangkan Pendidikan Karakter Berbasis Ketarunaan;</li>\r\n<li>Meningkatkan Layanan Pendidikan Bermutu Yang Merata Dan Terjangkau Untuk Semua;</li>\r\n<li>Meningkatkan Layanan Pendidikan Berbasis Kewirausahaan Dan Produk Kreatif;</li>\r\n<li>Meningkatkan Layanan Pendidikan Untuk Pembiasaan Dan Penguasaan IPTEK Seiring Revolusi Industry 4.0;</li>\r\n<li>Mengembangkan Layanan Pendidikan Berbasis Kearifan Lokal;</li>\r\n<li>Mendirikan Dan Mengembangkan Kelas Industry untuk siwa yang terpilih dalam<strong> AXIOO CLASS PROGRAM</strong></li>\r\n</ol>\r\n<p><strong>Tujuan Kompetensi Keahlian </strong><strong>Teknik Elektronika Audio video:</strong></p>\r\n<p>Tujuan Kompetensi Keahlian Elektronika Audio Video adalah :</p>\r\n<ol>\r\n<li>Menyelenggarakan sistem pendidikan Teknik Audio Video yang berkualitas dan beretos kerja tinggi.</li>\r\n<li>Mendidik tenaga kerja Teknik Audio Video yang disiplin dan mempunyai loyalitas tinggi.</li>\r\n<li>Mendidik tenaga kerja Teknik Audio yang mampu bersaing baik tingkat nasional, regional maupun global.</li>\r\n<li>Menciptakan tenaga Teknik Audio Video yang mampu berwirausaha</li>\r\n<li>Mendidik tenaga terampil di bidang Teknik Audio Video yang mampu menciptakan lapangan kerja.</li>\r\n<li>Mengembangkan teaching factory / Kelas industri untuk siswa yang terpilih bersama AXIOO CLASS PROGRAM dalam ketrampilan perangkat lunak, perangkat keras, robotic industrial berbasis internet, Elektronik Aplication berbasis pemrograman, Electronik Industrial berbasis PLC serta kamunikasi berstandar TOEIC/TOEFL</li>\r\n</ol>\r\n<p><strong>Ruang Lingkup Pekerjaan </strong></p>\r\n<p>Ruang lingkup pekerjaan bagi lulusan Program Keahlian Teknik Elektronika pada Kompetensi Keahlian Audio Video antara lain adalah:</p>\r\n<ol>\r\n<li>Bekerja di perusahaan TV, sound system, piano, hp, computer, note book dll.</li>\r\n<li>Bekerja di perusahaan stasiun TV, radio, komunikasi bandara, komunikasi pelabuhan dll.</li>\r\n<li>Bekerja di perusahaan automotif bagian merakit sound system mobil.</li>\r\n<li>Bekerja di studio perekaman music.</li>\r\n<li>Bekerja sebagai operator sound system band.</li>\r\n<li>Bekerja di perusahaan yang produksinya berbasis robot</li>\r\n<li>Bekerja di perusahaan yang berbasis pemrograman elektronik.</li>\r\n<li>Bekerja di perusahaan yang berbasis Programeblel Logik Control (PLC)</li>\r\n<li>Bekerja di perusahaan yang berbasis internet.</li>\r\n</ol>', 'Publish', 'Jurusan', 'audio video av tav smkn 1 purwakarta', 'tav-1652878598.png', NULL, 0, NULL, NULL, NULL, '2022-05-18 05:51:30', '2022-05-18 05:49:32', '2022-05-18 12:56:38'),
(9, 15, 1, '', 'instrumentasi-dan-otomatisasi-proses', 'Instrumentasi dan Otomatisasi Proses', '<p><strong>Sekilas Pandang</strong></p>\r\n<p>Kompetensi Keahlian Instrumentasi dan Otomatisasi Proses merupakan progam keahlian 4 tahun satu-satunya yang ada di SMK Negeri 1 Purwakarta. Keunggulan dari program instrumentasi dan otomasisasi proses (4 tahun) adalah mencetak tenaga terampil&nbsp; (level 3) pada KKNI yang lebih matang secara kemampuan serta tanggung jawab, memiliki sertifikasi dan kualifikasi yang diperlukan oleh dunia usaha dan dunia industri di bidang instrumentasi.</p>\r\n<p><strong>Visi</strong></p>\r\n<p>&ldquo;Menghasilkan lulusan bidang instrumentasi industri yang trampil, produktif dan berakhlak mulia sesuai dengan tuntutan dunia industri dan dunia kerja&rdquo;.</p>\r\n<p><strong>Misi</strong></p>\r\n<ol>\r\n<li>Mendidik siswa pada kompetensi instrumentasi dan otomatisasi proses agar dapat bekerja dengan baik dan disiplin</li>\r\n<li>Menjalin kerja sama dengan dunia industri dan dunia kerja yang berguna dalam bidang instrumentasi industri</li>\r\n<li>Mengantarkan siswa agar mampu berwira-usaha</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>Tujuan Kompetensi Keahlian Instrumentasi Dan Otomatisasi Proses</strong></p>\r\n<ol>\r\n<li>Mendidik peserta didik agar mampu merancang dan menerapkan rangkaian listrik dan elektronika.</li>\r\n<li>Mendidik peserta didik agar mampu melakukan pengukuran besaran listrik dan elektronika</li>\r\n<li>Mendidik Peserta didik melakukan pekerjaan instrumentasi besaran fluida yang terdiri dari temperature, tekanan, aliran, ketinggian fluida</li>\r\n<li>Mendidik peserta didik&nbsp; agar mampu merancang dan menerapkan pengendalian sistem kontrol menggunakan mikrokontroller, PLC, dan Elektropneumatik.</li>\r\n<li>Mendidik peserta didik agar mampu menggambar rancangan sistem Instrumentasi dan Otomatisasi Proses menggunakan komputer.</li>\r\n<li>Mendidik siswa mampu melakukan perawatan dan perbaikan sistem Instrumentasi dan Otomatisasi Proses.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>Bidang Pekerjaan</strong></p>\r\n<ol>\r\n<li>Teknisi Instrumentasi Proses</li>\r\n<li>Teknisi Sistem Kontrol</li>\r\n<li>Operator produksi</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>Kompetensi</strong><strong> Kejuruan Yang </strong><strong>Dipelajari</strong></p>\r\n<ol>\r\n<li>Gambar teknik Instrumentasi</li>\r\n<li>Kelistrikan dan elektronika Instrumentasi</li>\r\n<li>Dasar instrumentasi</li>\r\n<li>Gambar dan Perencanaan Instrumentasi dan Otomatisasi</li>\r\n<li>Pengukuran Besaran Instrumentasi dan Otomatisasi Proses</li>\r\n<li>Sistem Kendali Instrumentasi dan Otomatisasi Proses</li>\r\n<li>Pemeliharaan Sistem Instrumentasi dan Otomatisasiproses</li>\r\n<li>Produk kreatif dan Kewirausahaan</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>Program Jurusan</strong></p>\r\n<ol>\r\n<li>Sertifikasi Kompetensi Siswa</li>\r\n<li>Magang Siswa</li>\r\n<li>Lomba Ketrampilan Siswa</li>\r\n<li>Kunjungan Industri</li>\r\n</ol>', 'Publish', 'Jurusan', 'iop smkn 1 purwakarta komek', 'iop-1652878723.png', NULL, 0, NULL, NULL, NULL, '2022-05-18 05:55:51', '2022-05-18 05:52:22', '2022-05-18 12:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_user`, `slug_kategori`, `nama_kategori`, `urutan`, `hits`, `tanggal`) VALUES
(4, 1, 'penelitian-internal', 'Penelitian Internal', 4, 0, '2020-06-10 22:08:23'),
(5, 1, 'kegiatan-organisasi', 'Kegiatan Organisasi', 5, 0, '2020-06-10 22:08:31'),
(6, 0, 'penelitian-internasional', 'Penelitian Internasional', 3, 0, '2020-06-10 21:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriindustri`
--

CREATE TABLE `kategoriindustri` (
  `id_kategoriindustri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kindustri` varchar(255) NOT NULL,
  `nama_kindustri` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoriindustri`
--

INSERT INTO `kategoriindustri` (`id_kategoriindustri`, `id_user`, `slug_kindustri`, `nama_kindustri`, `urutan`, `hits`, `tanggal`) VALUES
(1, 0, 'industri', 'industri', 1, 0, '2022-05-23 04:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `kategorijurusan`
--

CREATE TABLE `kategorijurusan` (
  `id_kategorijurusan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kjurusan` varchar(255) NOT NULL,
  `nama_kjurusan` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorijurusan`
--

INSERT INTO `kategorijurusan` (`id_kategorijurusan`, `id_user`, `slug_kjurusan`, `nama_kjurusan`, `urutan`, `hits`, `tanggal`) VALUES
(1, 0, 'jurusan', 'jurusan', 1, 0, '2022-05-16 09:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriprestasi`
--

CREATE TABLE `kategoriprestasi` (
  `id_kategoriprestasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kprestasi` varchar(255) NOT NULL,
  `nama_kprestasi` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoriprestasi`
--

INSERT INTO `kategoriprestasi` (`id_kategoriprestasi`, `id_user`, `slug_kprestasi`, `nama_kprestasi`, `urutan`, `hits`, `tanggal`) VALUES
(1, 0, 'perlombaan-akademis', 'Perlombaan Akademis', 1, 0, '2022-05-14 08:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriprofil`
--

CREATE TABLE `kategoriprofil` (
  `id_kategoriprofil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kprofil` varchar(255) NOT NULL,
  `nama_kprofil` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoriprofil`
--

INSERT INTO `kategoriprofil` (`id_kategoriprofil`, `id_user`, `slug_kprofil`, `nama_kprofil`, `urutan`, `hits`, `tanggal`) VALUES
(1, 0, 'profil', 'profil', 1, 0, '2022-05-18 08:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_download`
--

CREATE TABLE `kategori_download` (
  `id_kategori_download` int(11) NOT NULL,
  `slug_kategori_download` varchar(255) NOT NULL,
  `nama_kategori_download` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_download`
--

INSERT INTO `kategori_download` (`id_kategori_download`, `slug_kategori_download`, `nama_kategori_download`, `urutan`) VALUES
(1, 'product-pricelist', 'Product Pricelist', 1),
(2, 'informasi-nitrico', 'Informasi Nitrico', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_galeri`
--

CREATE TABLE `kategori_galeri` (
  `id_kategori_galeri` int(11) NOT NULL,
  `slug_kategori_galeri` varchar(255) NOT NULL,
  `nama_kategori_galeri` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_galeri`
--

INSERT INTO `kategori_galeri` (`id_kategori_galeri`, `slug_kategori_galeri`, `nama_kategori_galeri`, `urutan`) VALUES
(4, 'kegiatan', 'Kegiatan', 2),
(6, 'kegiatan-kampus', 'Kegiatan Kampus', 1),
(7, 'kbm-produktif', 'KBM Produktif', 3),
(8, 'pelatihan-guru', 'Pelatihan Guru', 4),
(9, 'perlombaan-lks', 'Perlombaan LKS', 5),
(10, 'uji-kompetensi', 'Uji Kompetensi', 6),
(11, 'hasil-produksi', 'Hasil Produksi', 7),
(12, 'kunjungan-industri', 'Kunjungan Industri', 8),
(13, 'kelas-industri', 'Kelas Industri', 9),
(14, 'kompetisi-internasional', 'Kompetisi Internasional', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori_produk` varchar(200) NOT NULL,
  `slug_kategori_produk` varchar(200) NOT NULL,
  `urutan` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori_produk`, `slug_kategori_produk`, `urutan`, `keterangan`, `gambar`, `tanggal`) VALUES
(1, 'Kursus Programming', 'kursus-programming', 1, '<p>Kursus Programming</p>', 'produk-javawebmedia-02-1592630261.jpg', '2020-06-20 05:17:41'),
(3, 'Kursus Desain', 'kursus-desain', 2, '<p>Kursus Desain dan UI/UX</p>', 'produk-javawebmedia-05-1592630467.jpg', '2020-06-20 05:21:07'),
(4, 'Kursus Statistik dan Manajemen Data', 'kursus-statistik-dan-manajemen-data', 3, '<p>Kursus Statistik dan Manajemen Data</p>', 'produk-javawebmedia-11-1592630490.jpg', '2020-06-20 05:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `nama_singkat` varchar(20) DEFAULT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `tagline2` varchar(255) DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_cadangan` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `keywords` varchar(400) DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `nama_facebook` varchar(255) NOT NULL,
  `nama_twitter` varchar(255) NOT NULL,
  `nama_instagram` varchar(255) NOT NULL,
  `nama_google_plus` varchar(255) NOT NULL,
  `singkatan` varchar(255) NOT NULL,
  `google_map` text DEFAULT NULL,
  `judul_1` varchar(200) DEFAULT NULL,
  `pesan_1` varchar(200) DEFAULT NULL,
  `judul_2` varchar(200) DEFAULT NULL,
  `pesan_2` varchar(200) DEFAULT NULL,
  `judul_3` varchar(200) DEFAULT NULL,
  `pesan_3` varchar(200) DEFAULT NULL,
  `judul_4` varchar(200) DEFAULT NULL,
  `pesan_4` varchar(200) DEFAULT NULL,
  `judul_5` varchar(200) DEFAULT NULL,
  `pesan_5` varchar(200) NOT NULL,
  `judul_6` varchar(200) DEFAULT NULL,
  `pesan_6` varchar(200) NOT NULL,
  `isi_1` varchar(500) DEFAULT NULL,
  `isi_2` varchar(500) DEFAULT NULL,
  `isi_3` varchar(500) DEFAULT NULL,
  `isi_4` varchar(500) DEFAULT NULL,
  `isi_5` varchar(500) DEFAULT NULL,
  `isi_6` varchar(500) DEFAULT NULL,
  `link_1` varchar(255) DEFAULT NULL,
  `link_2` varchar(255) DEFAULT NULL,
  `link_3` varchar(255) DEFAULT NULL,
  `link_4` varchar(255) DEFAULT NULL,
  `link_5` varchar(255) DEFAULT NULL,
  `link_6` varchar(255) DEFAULT NULL,
  `javawebmedia` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `rekening` text DEFAULT NULL,
  `prolog_topik` text DEFAULT NULL,
  `prolog_program` text DEFAULT NULL,
  `prolog_sekretariat` text DEFAULT NULL,
  `prolog_aksi` text DEFAULT NULL,
  `prolog_kolaborasi` text DEFAULT NULL,
  `prolog_sebaran` text DEFAULT NULL,
  `gambar_berita` varchar(255) DEFAULT NULL,
  `prolog_agenda` text DEFAULT NULL,
  `prolog_wawasan` text DEFAULT NULL,
  `protocol` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(255) DEFAULT NULL,
  `smtp_timeout` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `judul_pembayaran` varchar(255) DEFAULT NULL,
  `isi_pembayaran` text DEFAULT NULL,
  `gambar_pembayaran` varchar(255) DEFAULT NULL,
  `link_bawah_peta` varchar(255) DEFAULT NULL,
  `text_bawah_peta` varchar(255) NOT NULL,
  `cara_pesan` enum('Keranjang Belanja','Formulir Pemesanan') NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `nama_singkat`, `tagline`, `tagline2`, `tentang`, `deskripsi`, `website`, `email`, `email_cadangan`, `alamat`, `telepon`, `hp`, `fax`, `logo`, `icon`, `keywords`, `metatext`, `facebook`, `twitter`, `instagram`, `google_plus`, `nama_facebook`, `nama_twitter`, `nama_instagram`, `nama_google_plus`, `singkatan`, `google_map`, `judul_1`, `pesan_1`, `judul_2`, `pesan_2`, `judul_3`, `pesan_3`, `judul_4`, `pesan_4`, `judul_5`, `pesan_5`, `judul_6`, `pesan_6`, `isi_1`, `isi_2`, `isi_3`, `isi_4`, `isi_5`, `isi_6`, `link_1`, `link_2`, `link_3`, `link_4`, `link_5`, `link_6`, `javawebmedia`, `gambar`, `video`, `rekening`, `prolog_topik`, `prolog_program`, `prolog_sekretariat`, `prolog_aksi`, `prolog_kolaborasi`, `prolog_sebaran`, `gambar_berita`, `prolog_agenda`, `prolog_wawasan`, `protocol`, `smtp_host`, `smtp_port`, `smtp_timeout`, `smtp_user`, `smtp_pass`, `judul_pembayaran`, `isi_pembayaran`, `gambar_pembayaran`, `link_bawah_peta`, `text_bawah_peta`, `cara_pesan`, `id_user`, `tanggal`) VALUES
(1, 'SMKN 1 Purwakarta', 'Nepoer - Kece Abis', 'Kece Abis', NULL, '<p><strong>Assalamu\'alaikum Warahmatullahi Wabarakatuh&nbsp;</strong></p>\r\n<p>Puji syukur kepada Allah SWT, Tuhan Yang Maha Esa yang telah memberikan rahmat dan anugerah Nya sehingga website SMK Negeri 1 Purwakarta ini dapat terbit. Salah satu tujuan dari website ini adalah untuk menjawab akan setiap kebutuhan informasi dengan memanfaatkan sarana teknologi informasi yang ada. Kami sadar sepenuhnya dalam rangka memajukan pendidikan di era berkembangnya Teknologi Informasi yang begitu pesat, sangat diperlukan berbagai sarana prasarana yang kondusif, kebutuhan berbagai informasi siswa, guru, orangtua maupun masyarakat, sehingga kami berusaha mewujudkan hal tersebut semaksimal mungkin. Semoga dengan adanya website ini dapat membantu dan bermanfaat, terutama informasi yang berhubungan dengan pendidikan, ilmu pengetahuan dan informasi seputar SMK Negeri 1 Purwakarta.</p>\r\n<p>Besar harapan kami, sarana ini dapat memberi manfaat bagi semua pihak yang ada dilingkup pendidikan dan pemerhati pendidikan secara khusus bagi SMK Negeri 1 Purwakarta.</p>\r\n<p>Akhirnya kami mengharapkan masukan dari berbagai pihak untuk website ini agar kami terus belajar dan meng-update diri, sehingga tampilan, isi dan mutu website akan terus berkembang dan lebih baik nantinya. Terima kasih atas kerjasamanya, maju terus untuk mencapai SMK Negeri 1 Purwakarta yang lebih baik lagi.</p>\r\n<p><strong>Wassalamu\'alaikum wr.wb.</strong></p>', 'Knowledge, Competence, Active, Be Best, Inovative, Smart - \"Kece Abis\"', 'https://smkn1purwakarta.sch.id', 'mail@smkn1purwakarta.sch.id', 'mail@smkn1purwakarta.sch.id', 'Jln Industri KM 4, Babakan Cikao\r\nKabupaten Purwakarta, Jawa Barat 41151', '0264 200 163', NULL, '0264 766 444', 'nepoer-web-1652763827-1652850537.png', 'logo-nepoer-1645862415.png', 'smkn 1 purwakarta, nepoer', NULL, 'https://www.facebook.com/smkn1purwakarta.official/', 'https://www.youtube.com/channel/UCh1V4yy0wYeQezbXnC7nRCw', 'https://instagram.com/smkn1purwakarta.official?igshid=YmMyMTA2M2Y=', 'https://www.youtube.com/channel/UCmm6mFZXYQ3ZylUMa0Tmc2Q', 'SMKN 1 Purwakarra', 'Nepoer TV', 'SMKN 1 Purwakarta Official', '', 'Nepoer', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.0533812751387!2d107.4272229148688!3d-6.514927965504819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690c327409d4e3%3A0xe9bcc7dfdaa2d023!2sSMK%20Negeri%201%20Purwakarta!5e0!3m2!1sen!2sid!4v1652858955559!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Tempat belajar nyaman', 'fa fa-home', 'Materi Kursus Selalu Update', 'fa fa-laptop', 'Jadwal Flexibel', 'fa fa-thumbs-up', 'Menjaga Amanah', 'fa-check-square-o', 'Tempat belajar nyaman', 'fa-home', 'Online service', 'fa-laptop', 'Kami menyediakan tempat belajar yang nyaman dan menyenangkan serasa di rumah sendiri', 'Materi kursus kamu selalu uptodate, Anda bisa mengunduh apa yang dipelajari', 'Bagi Anda siswa yang ingin belajar, kami menerapkan jadwal flexibel', 'Kami senantiasa menjaga amanah yang diberikan kepada donatur agar sampai di tangan yang berhak.', 'Kami menyediakan tempat belajar yang nyaman dan menyenangkan', 'Website kamu selalu uptodate, Anda bisa mengunduh apa yang dipelajari', '', '', '', '', '', '', '<p>Berawal dari keinginan ibunda Hj.Masah Muhari diakhir hidupnya untuk mewakaan sebagian hartanya dijalan Allah, gayungpun bersambut pada bulan Mei 2011 saat kami akan melaksanakan ibadah umrah, Seorang rekan kami sesama Jamaah bernama ustadzah Hj. Zainur Fahmid memberikan informasi Tentang Anggota yang hendak mewakaan sebidang tanahnya di wilayah Beji Timur. Kami pun memanjatkan doa di kota suci dengan penuh rasa harap pertolongan Allah untuk menunjukan jalan terbaik-Nya, maka sepulang umroh kami mengadakan pertemuan di kediaman Ibu Dra Hj Ratna Mardjanah untuk membicarakan visi misi kami dalam wakaf tersebut dan sepakat untuk mendirikan Istana Yatim Riyadhul Jannah ini.</p>\r\n<p>Nama Riyadhul Jannah Sendiri diambil dari nama pengelola wakaf (H. Ahmad Riyadh Muchtar, Lc) dan pemberi wakaf (Dra Hj Ratna Mardjanah). Istana Yatim Riyadhul Jannah hadir untuk melayani dan memfasilitasi segala kebutuhan anak yatim, terutama pendidikan agama, akhlak dan kehidupan yang layak untuk bekal masa depan mereka yang cerah agar bisa memberi manfaat bagi umat. Harapan kami semoga dengan membangunkan istana untuk anak yatim, maka Allah akan berikan istana-Nya di surga kelak dan kita termasuk manusia yang bisa memberika manfaat bagi sesama sebagaimana sabda Rasulullah SAW yang artinya:&nbsp;</p>\r\n<p>&ldquo;Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia lainnya&rdquo;&nbsp;</p>\r\n<p>erimakasih atas segala bentuk bantuan yang dipercayakan kepada kami baik secara materi, tenaga dan kiran serta doa para muhsinin dan muhsinat Istana Yatim Riyadhul Jannah selama ini, mulai dari rencana pendirian hingga berkembang seperti saat ini. Semoga segala amal menjadi shadaqah jariyah disisi-Nya.&nbsp;</p>\r\n<p>&nbsp;</p>', 'icon-sekolah-1653209018.png', 'fsH_KhUWfho', '<table id=\"dataTables-example\" class=\"table table-bordered\" width=\"100%\">\r\n<thead>\r\n<tr>\r\n<th tabindex=\"0\" colspan=\"1\" rowspan=\"1\" width=\"19%\">Nama Bank</th>\r\n<th tabindex=\"0\" colspan=\"1\" rowspan=\"1\" width=\"21%\">Nomor Rekening</th>\r\n<th tabindex=\"0\" colspan=\"1\" rowspan=\"1\" width=\"7%\">Atas nama</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>BCA KCP Margo City</td>\r\n<td>4212548204</td>\r\n<td>Andoyo</td>\r\n</tr>\r\n<tr>\r\n<td>Bank Mandiri KCP Universitas Indonesia</td>\r\n<td>1570001807768</td>\r\n<td>Eflita Meiyetriani</td>\r\n</tr>\r\n<tr>\r\n<td>Bank BNI Syariah Kantor Cabang Jakarta Selatan</td>\r\n<td>0105301001</td>\r\n<td>Eflita Meiyetriani</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<p>Dalam mewujudkan pembangunan berkelanjutan, pemerintah kabupaten anggota LTKL telah mengidentifikasi dan memilih topik yang sesuai dengan kondisi di daerahnya. Ada 5 topik prioritas yang dipilih dengan penerapan yang disesuaikan kembali di masing-masing kabupaten.</p>', NULL, '<p>Setelah Lingkar Temu Kabupaten Lestari (LTKL) diinisiasi, kesekretariatan dibentuk untuk membantu para pemerintah kabupaten anggota bekerja dan berkolaborasi. Walaupun tidak memiliki mandat implementasi, Sekretariat LTKL menjadi vital dalam melancarkan koordinasi, pengumpulan basis data, hingga pelaporan perkembangan. Sekretariat LTKL juga diperkuat dengan kehadiran personil yang telah berpengalaman di bidang management pengetahuan, program pembangunan berkelanjutan hingga kebijakan.</p>', '', '<p>Lingkar Temu Kabupaten Lestari (LTKL) mengedepankan kolaborasi dalam mewududkan pembangunan berkelanjutan. Ada 10 kabupaten yang tersebar di 6 provinsi di Indonesia telah menjadi anggota LTKL.</p>\r\n<p>Hingga kini, berbagai pihak telah ikut berkolaborasi, mulai dari pemerintah kabupaten, sekeretariat LTKL, mitra pembangunan hingga pihak swasta.</p>', '', 'balairung-budiutomo-01.jpg', '<p>Acara yang ditampilkan merupakan kumpulan acara LTKL, mitra, maupun pemerintah kabupaten anggota LTKL, mulai dari acara seminar hingga festival.</p>', '<p>LTKL bukan satu-satunya yang bergerak dalam mewujudkan pembangunan berkelanjutan, serta upaya penanggulangan perubahan iklim. Ikuti terus perkembangan usaha LTKL serta rekan-rekan lain menuju bumi dan Indonesia yang lestari.</p>', 'smtp', 'ssl://mail.javawebmedia.com', '465', '12', 'pendaftaran@javawebmedia.com', 'rasulullah112233', 'Metode Pembayaran Produk', '<p>Anda dapat melakukan pembayaran dengan beberapa cara, yaitu:</p>\r\n<ol>\r\n<li><strong>Pembayaran Tunai</strong>, dapat Anda serahkan secara langsung ke salah satu staff Java Web Media</li>\r\n<li><strong>Pembayar Via Transfer Rekening</strong></li>\r\n</ol>\r\n<p>Lakukan transfer biaya atas layanan dan produk&nbsp;<strong>Java Web Media</strong>&nbsp;ke salah satu rekening di bawah ini.</p>\r\n<h3>Konfirmasi Pembayaran</h3>\r\n<p>Anda dapat melakukan konfirmasi pembayaran melalui:</p>\r\n<ul>\r\n<li><strong>Melalui Email</strong>, silakan kirim bukti pembayaran ke:&nbsp;<strong><a href=\"mailto:contact@javawebmedia.co.id?subject=Konfirmasi%20Pembayaran\">contact@javawebmedia.co.id</a></strong></li>\r\n<li><strong>Melalui Whatsapp</strong>, kirimkan bukti pembayaran Anda ke&nbsp;<strong>+6281210697841</strong></li>\r\n<li><strong>Melalui Formulir Konfirmasi Pembayaran</strong>, Anda dapat mengunggah bukti pembayaran Anda melalui form&nbsp;<strong><a title=\"Konfirmasi Pembayaran\" href=\"https://javawebmedia.com/konfirmasi\">&nbsp;Konfirmasi Pembayaran</a></strong></li>\r\n</ul>', 'payment.jpg', NULL, '', '', 15, '2022-06-03 18:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `token_transaksi` varchar(255) NOT NULL,
  `tanggal_order` date NOT NULL,
  `nomor_transaksi` int(11) NOT NULL,
  `status_pemesanan` varchar(255) NOT NULL DEFAULT 'Menunggu',
  `nama_pemesan` varchar(255) NOT NULL,
  `telepon_pemesan` varchar(255) NOT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `alamat` varchar(300) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_produk` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `ongkir` bigint(20) DEFAULT NULL,
  `total_biaya` bigint(20) DEFAULT NULL,
  `tanggal_pemesanan` datetime DEFAULT NULL,
  `cara_bayar` varchar(255) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `nama_bank_pengirim` varchar(255) DEFAULT NULL,
  `nomor_rekening_pengirim` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_produk`, `id_rekening`, `kode_transaksi`, `token_transaksi`, `tanggal_order`, `nomor_transaksi`, `status_pemesanan`, `nama_pemesan`, `telepon_pemesan`, `email_pemesan`, `alamat`, `jumlah_produk`, `harga_produk`, `total_harga`, `ongkir`, `total_biaya`, `tanggal_pemesanan`, `cara_bayar`, `tanggal_bayar`, `bukti`, `jumlah`, `pengirim`, `nama_bank_pengirim`, `nomor_rekening_pengirim`, `keterangan`, `tanggal_post`, `tanggal_update`) VALUES
(1, 4, 2, 0, 'JWM202006100001', 'kMpUQADBlGkeTQhR7439a6zsqX6dWmzK', '2020-06-10', 1, 'Dikirim', 'Andoyo', '085715100485', 'javawebmedia@gmail.com', 'adadada', 1, 12000, 12000, 0, 0, '2020-06-10 07:57:46', '', '0000-00-00', '', 0, '', '', '', '', '2020-06-10 07:57:46', '2020-06-12 13:53:42'),
(2, 4, 1, 0, 'JWM202006120002', 'wvFD60jruVx9vYJ1aFL4WLOZAeYQXkxx', '2020-06-12', 2, 'Menunggu', 'Eflita Meiyetriani', '085715100485', 'javawebmedia@gmail.com', 'ADADA ADADA ADADA AAFA', 1, 10000, 10000, 0, 0, '2020-06-12 12:12:56', '', '0000-00-00', '', 0, '', '', '', '', '2020-06-12 12:12:56', '2020-06-12 14:13:02'),
(3, 0, 1, 0, 'JWM202006120003', 'alN7qAzNj1lopbjwsWswvKecvWjxQUzv', '2020-06-12', 3, 'Menunggu', 'Rayyan Andoyo', '085715100485', 'lalu-kekah@bkkbn.go.id', 'Perumahan Ferrari', 1, 10000, 10000, 0, 0, '2020-06-12 17:57:42', '', '0000-00-00', '', 0, '', '', '', '', '2020-06-12 17:57:42', '2020-06-12 17:57:42'),
(4, 4, 1, 0, 'JWM202006120004', 'P3uAxeJ3TSvlfYzGRjwgMncwLBQdq3vb', '2020-06-12', 4, 'Konfirmasi', 'Rayyan Andoyo', '085715100485', 'lalu-kekah@bkkbn.go.id', 'Perumahan Ferrari', 1, 10000, 10000, 0, 0, '2020-06-12 17:58:15', '', '0000-00-00', '', 0, '', '', '', '', '2020-06-12 17:58:15', '2020-06-12 18:56:39'),
(5, 4, 1, 2, 'JWM202006120005', 'rrzHk1NcrkK3KvYnqse4XdudWGz3tiZL', '1970-01-01', 5, 'Selesai', 'UDIN SIMALAKAMA', '085715100485', 'javawebmedia@gmail.com', 'Desa Sumberejo', 1, 10000, 10000, 200000, 210000, '2020-06-12 18:19:57', 'Transfer', '2020-06-13', '357-1591985014.jpg', 200000, 'Andoyo', 'BCA', '2424242', NULL, '2020-06-12 18:03:35', '2020-06-12 18:54:33'),
(6, 0, 5, NULL, 'JWM202006180006', 'MxnOVRcARIiPe3vBI4O9YoVxJY0z3B2M', '2020-06-18', 6, 'Menunggu', 'Andoyo', '085715100485', 'javawebmedia@gmail.com', 'adadada adada', 1, 120000, 120000, NULL, NULL, '2020-06-18 07:57:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-18 07:57:03', '2020-06-18 07:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategoriprestasi` int(11) NOT NULL,
  `updater` varchar(32) NOT NULL,
  `slug_prestasi` varchar(255) NOT NULL,
  `judul_prestasi` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_prestasi` varchar(20) NOT NULL,
  `jenis_prestasi` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `status_produk` varchar(20) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `isi` text NOT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_terendah` int(11) DEFAULT NULL,
  `harga_tertinggi` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `mulai_diskon` date DEFAULT NULL,
  `selesai_diskon` date DEFAULT NULL,
  `besar_diskon` int(12) DEFAULT NULL,
  `jenis_diskon` enum('Potongan','Persentase') DEFAULT NULL,
  `jumlah_order_min` int(11) DEFAULT NULL,
  `jumlah_order_max` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `hits` bigint(20) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategoriprofil` int(11) NOT NULL,
  `updater` varchar(32) NOT NULL,
  `slug_profil` varchar(255) NOT NULL,
  `judul_profil` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_profil` varchar(20) NOT NULL,
  `jenis_profil` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_user`, `id_kategoriprofil`, `updater`, `slug_profil`, `judul_profil`, `isi`, `status_profil`, `jenis_profil`, `keywords`, `gambar`, `icon`, `hits`, `urutan`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_post`, `tanggal_publish`, `tanggal`) VALUES
(1, 15, 0, '', 'identitas', 'Identitas', '<table style=\"height: 446px; width: 100%; border-collapse: collapse; margin-left: auto; margin-right: auto;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 38px;\">\r\n<td style=\"width: 50%; height: 38px; text-align: center;\"><strong>Nama</strong> <strong>Sekolah</strong></td>\r\n<td style=\"width: 50%; height: 38px; text-align: center;\">\r\n<p><strong>SMK </strong><strong>Negeri</strong><strong> 1&nbsp; </strong><strong>Purwakarta</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>NSS</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>321022001001</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>NIS</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>40161</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>NPSN</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>20217367</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>ID Data </strong><strong>Pokok</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>0216140001</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>Nomor</strong><strong> / </strong><strong>Tgl</strong><strong>. SK </strong><strong>Pendirian</strong><strong>&nbsp;</strong></p>\r\n</td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>1) 117/Dirpt.B1/1965&nbsp; </strong><strong>tanggal</strong><strong>&nbsp; 03 &ndash; 08 &ndash; 1965</strong></p>\r\n<p><strong>2) 421/2733/DIKMEN </strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Alamat</strong> <strong>Sekolah</strong><strong>&nbsp; :</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- </strong><strong>Jalan</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>Jl. </strong><strong>Industri</strong><strong> Km 4 </strong><strong>Purwakarta</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- </strong><strong>Desa</strong><strong>&nbsp; </strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>Babakan</strong> <strong>Cikao</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- </strong><strong>Kecamatan</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>Babakan</strong> <strong>Cikao</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- </strong><strong>Kabupaten</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>Purwakarta</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- </strong><strong>Provinsi</strong><strong>&nbsp; </strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>Jawa</strong><strong> Barat</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- </strong><strong>Kode</strong> <strong>Pos</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>41151</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- </strong><strong>Telepon</strong><strong>&nbsp; </strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>(0264) 200163</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- Fax</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>(0264) 200163</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- E-Mail</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>contact@smkn1purwakarta.sch.id</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>- Website</strong></td>\r\n<td style=\"width: 50%; height: 24px;\">\r\n<p><strong>smkn1purwakarta.sch.id</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Akreditasi</strong><strong> &nbsp; </strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>A</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">&nbsp;</p>', 'Publish', 'Profil', 'smkn 1 purwakarta nepoer', 'profil-vector-1653139429.png', NULL, 0, NULL, NULL, NULL, '2022-05-18 08:51:54', '2022-05-18 08:43:15', '2022-05-18 08:51:54'),
(2, 15, 0, '', 'sarana-prasarana', 'Sarana & Prasarana', '<table style=\"border-collapse: collapse; width: 100%; height: 624px; margin-left: auto; margin-right: auto;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 24px;\">\r\n<td style=\"width: 50%; height: 24px; text-align: center;\"><strong>Jumlah Rombel</strong></td>\r\n<td style=\"width: 50%; height: 24px; text-align: center;\"><strong>72 Rombel&nbsp;</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Gedung Administrasi</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Gedung</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Ruang Belajar Teori</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>47 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Ruang Sanggar Seni</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Ruang Guru</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Ruang MGMP</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Ruang BP</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Gedung Bengkel Praktek</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>9 Gedung</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Gedung Aula</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Gedung</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Perpustakaan</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>2 Gedung</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Perpustakaan Berbasis IT</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Laboratorium SIMDIG</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>8 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Laboratorium Bahasa</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Gedung</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Laboratorium Fisika</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Laboratorium Kimia</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Kantin</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Bangunan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Ruang OSIS</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Gedung</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>WC/Toilet/Locker Bengkel</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>35 Unit</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Rumah Dinas / Jaga</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Bangunan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Masjid</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Bangunan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Ruang LSP</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Ruang Koperasi</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>1 Ruangan</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Luas Lahan</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>39.500 m2</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Luas Taman</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>11.905 m2</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Luas Bangunan</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>13.696 m2</strong></td>\r\n</tr>\r\n<tr style=\"height: 24px; text-align: center;\">\r\n<td style=\"width: 50%; height: 24px;\"><strong>Lapang Olahraga</strong></td>\r\n<td style=\"width: 50%; height: 24px;\"><strong>7.500 m2</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Publish', 'Profil', 'sarpras smkn 1 purwakarta profil', 'profil-vector-1653139414.png', NULL, 0, NULL, NULL, NULL, '2022-05-19 08:00:25', '2022-05-19 07:49:15', '2022-05-19 08:00:25'),
(6, 15, 0, '', 'kemitraan-dudi', 'Kemitraan DUDI', '<p><img src=\"../../public/upload/image/dudi.png\" alt=\"\" width=\"600\" height=\"337\" /></p>', 'Publish', 'Profil', 'kemitraan dudi smkn 1 purwakarta', 'profil-vector-1653139399.png', NULL, 0, NULL, NULL, NULL, '2022-05-21 12:01:51', '2022-05-21 12:00:18', '2022-05-21 12:01:51'),
(7, 15, 0, '', 'bursa-kerja-khusus', 'Bursa Kerja Khusus', '<ul>\r\n<li>PEMASARAN TENAGA KERJA DALAM NEGERI DAN LUAR NEGERI</li>\r\n<li>PENELUSURAN TAMATAN</li>\r\n<li>FGD</li>\r\n</ul>\r\n<p><img src=\"../../public/upload/image/bkk.png\" alt=\"\" width=\"377\" height=\"286\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'Publish', 'Profil', 'bkk smkn 1 purwakarta nepoer', 'profil-vector-1653139383.png', NULL, 0, NULL, NULL, NULL, '2022-05-21 13:13:52', '2022-05-21 13:11:41', '2022-05-21 13:13:52'),
(8, 15, 0, '', 'mou-recruitment-lulusan', 'MoU Recruitment Lulusan', '<ul>\r\n<li>PT Hino Manufacturing Motors Indonesia</li>\r\n<li>PT. Hitachi Power System Indonesia</li>\r\n<li>PT. JIAEC</li>\r\n<li>PT. Mabito Karya</li>\r\n<li>Chien HSIN University</li>\r\n</ul>', 'Publish', 'Profil', 'mou lulusan smkn 1 purwakarta', 'profil-vector-1653139368.png', NULL, 0, NULL, NULL, NULL, '2022-05-21 13:17:50', '2022-05-21 13:16:54', '2022-05-21 13:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `atas_nama`, `gambar`, `urutan`, `tanggal`) VALUES
(1, 'BCA KCP DEPOK', '4212-5482-04', 'ANDOYO', 'bca.jpg', 1, '2020-06-11 21:36:46'),
(2, 'BNI SYARIAH DEPOK', '0611-9927-06', 'CV JAVA WEB MEDIA', 'Logo_BNI_Syariah.png', 2, '2019-11-12 23:54:18'),
(4, 'BANK MANDIRI KCU DEPOK', '157-00-0180776-8', 'EFLITA MEIYETRIANI', 'mandiri.png', 4, '2019-11-12 23:58:42'),
(5, 'BANK BNI KCU DEPOK', '0105-3010-01', 'EFLITA MEIYETRIANI', 'bni.png', 5, '2019-11-13 00:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `kode_rahasia` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `kode_rahasia`, `gambar`, `tanggal`) VALUES
(15, 'Friedrich Engels', 'engels@gmail.com', 'engels', '7c222fb2927d828af22f592134e8932480637c0d', 'Admin', NULL, 'engels-1645902503-1648363280.png', '2022-04-12 03:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `video` text NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `bahasa` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id_gambar_produk`);

--
-- Indexes for table `industri`
--
ALTER TABLE `industri`
  ADD PRIMARY KEY (`id_industri`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `kategoriindustri`
--
ALTER TABLE `kategoriindustri`
  ADD PRIMARY KEY (`id_kategoriindustri`),
  ADD KEY `nama_kindustri` (`nama_kindustri`);

--
-- Indexes for table `kategorijurusan`
--
ALTER TABLE `kategorijurusan`
  ADD PRIMARY KEY (`id_kategorijurusan`),
  ADD KEY `nama_kjurusan` (`nama_kjurusan`);

--
-- Indexes for table `kategoriprestasi`
--
ALTER TABLE `kategoriprestasi`
  ADD PRIMARY KEY (`id_kategoriprestasi`),
  ADD KEY `nama_prestasi` (`nama_kprestasi`);

--
-- Indexes for table `kategoriprofil`
--
ALTER TABLE `kategoriprofil`
  ADD PRIMARY KEY (`id_kategoriprofil`),
  ADD KEY `nama_kprofil` (`nama_kprofil`);

--
-- Indexes for table `kategori_download`
--
ALTER TABLE `kategori_download`
  ADD PRIMARY KEY (`id_kategori_download`);

--
-- Indexes for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  ADD PRIMARY KEY (`id_kategori_galeri`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori_produk`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD UNIQUE KEY `token_transaksi` (`token_transaksi`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id_gambar_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industri`
--
ALTER TABLE `industri`
  MODIFY `id_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategoriindustri`
--
ALTER TABLE `kategoriindustri`
  MODIFY `id_kategoriindustri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategorijurusan`
--
ALTER TABLE `kategorijurusan`
  MODIFY `id_kategorijurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategoriprestasi`
--
ALTER TABLE `kategoriprestasi`
  MODIFY `id_kategoriprestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategoriprofil`
--
ALTER TABLE `kategoriprofil`
  MODIFY `id_kategoriprofil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_download`
--
ALTER TABLE `kategori_download`
  MODIFY `id_kategori_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  MODIFY `id_kategori_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
