-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 11:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `jam_agenda` time NOT NULL,
  `tgl` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `nama_agenda` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `id_masjid`, `jam_agenda`, `tgl`, `status`, `nama_agenda`, `created_at`, `updated_at`) VALUES
(154, 343787, '13:22:49', '2024-07-15', '', 'Lomba MTQ', '2024-07-20 08:29:50', '2024-07-20 08:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `beras_zakat`
--

CREATE TABLE `beras_zakat` (
  `id_beras` int(11) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `jenis_beras` varchar(200) NOT NULL,
  `harga` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beras_zakat`
--

INSERT INTO `beras_zakat` (`id_beras`, `id_masjid`, `jenis_beras`, `harga`) VALUES
(123, 343787, 'Premium Solok', 36000),
(126, 343787, 'Bunlog', 20000),
(127, 343787, 'Kuriak Solok', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `db_data_masjid`
--

CREATE TABLE `db_data_masjid` (
  `id` int(9) NOT NULL,
  `id_user` int(9) DEFAULT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `nama_masjid` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `jenis_tipologi` varchar(9) DEFAULT NULL,
  `kota_kab` varchar(255) NOT NULL,
  `alamat_masjid` varchar(255) NOT NULL,
  `tahun_berdiri` int(4) DEFAULT NULL,
  `luas_bangunan` int(9) DEFAULT NULL,
  `surat_takmir` varchar(100) DEFAULT NULL,
  `sertifikat` varchar(100) DEFAULT NULL,
  `luas_tanah` int(9) DEFAULT NULL,
  `no_rekening` int(16) DEFAULT NULL,
  `nama_bank` varchar(100) DEFAULT NULL,
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_data_masjid`
--

INSERT INTO `db_data_masjid` (`id`, `id_user`, `sampul`, `nama_masjid`, `provinsi`, `deskripsi`, `jenis_tipologi`, `kota_kab`, `alamat_masjid`, `tahun_berdiri`, `luas_bangunan`, `surat_takmir`, `sertifikat`, `luas_tanah`, `no_rekening`, `nama_bank`, `gambar1`, `gambar2`, `gambar3`, `created_at`, `updated_at`) VALUES
(343787, 12356, '1721217518_283444daf1daaa4d16f5.jpg', 'Masjid Ada', 'Sumatera Barat', 'Video penembakan dari lokasi kejadian menunjukkan orang-orang melarikan diri di dekat Masjid Imam Ali di Oman, menaranya terlihat, ', 'masjid', 'Bukittinggi', 'Jalan Muh Yamin NO 70', 1988, 60, '1721217518_8b2ba297302d9543304d.docx', '1721217518_d7868aa7479ff50acc66.docx', 100, 2147483647, 'BRI Syariah', '1721217518_e9392d5e3977463cfebe.jpg', '1721217518_31008f97e1a5c505f296.jpg', NULL, '2024-07-17 11:58:38', '2024-07-17 11:58:38'),
(343788, 12358, '1721381260_4630a8455aae431526ed.jpg', 'Masjid Al Bahri', 'DKI Jakarta', NULL, 'masjid', 'Jakarta', 'Jalan Mali boeo no 100', 1961, 144, '1721381260_1bef6448d35ad64a009e.pdf', '1721381260_dffcf6d55928707dc02c.docx', 101, NULL, NULL, '1721381260_55bd8c43f18c19eac06b.jpg', '1721381260_17d615f2b1d9671846c8.jpeg', NULL, '2024-07-19 09:27:40', '2024-07-19 09:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(9) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `nama_donatur` varchar(15) NOT NULL,
  `ho_telp` char(12) NOT NULL,
  `jenis_donasi` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `nominal` int(16) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infak_anak_yatim`
--

CREATE TABLE `infak_anak_yatim` (
  `id_infak` int(9) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nominal` int(16) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infak_anak_yatim`
--

INSERT INTO `infak_anak_yatim` (`id_infak`, `id_masjid`, `tgl`, `keterangan`, `nominal`, `created_at`, `updated_at`) VALUES
(4, 343787, '2024-07-16', 'Hamba ke 10', 23000, '2024-07-20 04:04:13', '2024-07-20 04:04:13'),
(5, 343787, '2024-07-17', 'Hamba ke 5', 26000, '2024-07-20 08:28:18', '2024-07-20 08:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `kas_masjid`
--

CREATE TABLE `kas_masjid` (
  `id_transaksi` int(9) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jenis_kas` enum('masuk','keluar') NOT NULL,
  `nominal` int(16) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kas_masjid`
--

INSERT INTO `kas_masjid` (`id_transaksi`, `id_masjid`, `tgl`, `keterangan`, `jenis_kas`, `nominal`, `created_at`, `updated_at`) VALUES
(12051, 343787, '2024-07-14', 'Infak Subuh', 'masuk', 350000, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_perubahan`
--

CREATE TABLE `pengajuan_perubahan` (
  `id_ajuan` int(11) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nama_pengurus` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gambar_ktp` blob DEFAULT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat_pengurus` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_perubahan`
--

INSERT INTO `pengajuan_perubahan` (`id_ajuan`, `id_masjid`, `status`, `nama_pengurus`, `email`, `username`, `gambar_ktp`, `no_telp`, `alamat_pengurus`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 343787, 'diterima', 'Ridwan', 'ok@ok.com', 'ada', 0x313732313332313730315f39646338373235333564333261376435336133662e6a7067, '0844114848', 'Jalan Itu', '', '123', '2024-07-18 16:55:01', '2024-07-18 16:55:01'),
(2, 343787, 'ditolak', 'Imam', 'imam@imam.com', 'imam', '', '0852645646', 'jalan aje', '', 'imam', '2024-07-18 16:56:08', '2024-07-18 16:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(9) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `tipe_postingan` varchar(9) NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `gambar_kegiatan` varchar(100) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `id_masjid`, `tgl`, `tipe_postingan`, `judul_kegiatan`, `gambar_kegiatan`, `deskripsi_kegiatan`, `created_at`, `updated_at`) VALUES
(36373, 343787, '2024-07-15', 'Berita', 'Test Berita', '1721307313_59a1970a6c09c820956a.jpg', 'Masjid Fatimah Umar di Makassar, Sulawesi Selatan (Sulsel), viral di media sosial lantaran hendak dijual oleh pemiliknya dengan harga Rp 2,5 miliar. Kementerian Agama (Kemenag) RI mengatakan masjid tidak boleh dijual jika berada di atas tanah wakaf.\r\n\"Saya belum dapat informasinya, tetapi kalau itu tanah wakaf dipastikan tidak boleh. Kalau dibangun di atas tanah wakaf, kami jamin itu tidak boleh,\" kata Dirjen Bimbingan Masyarakat Islam Kemenag RI Komaruddin Amin di kantor Kemenag, Selasa (16/7/2024).\r\n\r\n\"Badan Wakaf Indonesia bersama Kementerian Agama memastikan bahwa tanah-tanah wakaf yang ada di Indonesia harus terjamin, harus aman, tidak boleh hilang,\" sambungnya.\r\n\r\nBaca artikel detiknews, \"Viral Masjid Dijual di Makassar, Kemenag: Kalau Tanah Wakaf Tak Boleh\" selengkapnya https://news.detik.com/berita/d-7442081/viral-masjid-dijual-di-makassar-kemenag-kalau-tanah-wakaf-tak-boleh.\r\n\r\nDownload Apps Detikcom Sekarang https://apps.detik.com/detik/', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(9) NOT NULL,
  `status` varchar(100) NOT NULL,
  `status_password` varchar(100) NOT NULL,
  `nama_pengurus` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `gambar_ktp` varchar(200) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `alamat_pengurus` varchar(200) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `status`, `status_password`, `nama_pengurus`, `email`, `username`, `gambar_ktp`, `no_telp`, `alamat_pengurus`, `role`, `password`, `created_at`, `updated_at`) VALUES
(12356, 'diterima', '', 'Ridwan', 'ok@ok.com', 'ada', '1721321701_9dc872535d32a7d53a3f.jpg', '0844114848', 'Jalan Itu', 'pengurus', '123', '2024-07-17 11:58:38', '2024-07-17 11:58:38'),
(12357, 'superAdmin', '', 'admin', 'admin@gmail.min', 'admin', '', '', '', 'superAdmin', 'admin', '2024-07-17 13:59:48', '2024-07-17 13:59:48'),
(12358, 'block', 'done', 'Imam Adli', 'albarhi@gmail.com', 'pengurus', '1721381260_db1d8482d132eab2f7d1.jpg', '08654165465', 'Jalan lubuk Lintah No 39', 'pengurus', 'ok', '2024-07-19 09:27:40', '2024-07-19 09:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `zakat`
--

CREATE TABLE `zakat` (
  `id_zakat` int(9) NOT NULL,
  `tgl` date NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nominal` int(16) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zakat`
--

INSERT INTO `zakat` (`id_zakat`, `tgl`, `id_masjid`, `keterangan`, `nominal`, `created_at`, `updated_at`) VALUES
(21322, '2024-07-16', 343787, 'Hamba ke 7', 35000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21323, '2024-07-16', 343787, 'Hamba ke 15', 20000, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_masjid` (`id_masjid`);

--
-- Indexes for table `beras_zakat`
--
ALTER TABLE `beras_zakat`
  ADD PRIMARY KEY (`id_beras`),
  ADD KEY `id_masjid` (`id_masjid`);

--
-- Indexes for table `db_data_masjid`
--
ALTER TABLE `db_data_masjid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `id_masjid` (`id_masjid`);

--
-- Indexes for table `infak_anak_yatim`
--
ALTER TABLE `infak_anak_yatim`
  ADD PRIMARY KEY (`id_infak`),
  ADD KEY `id_masjid` (`id_masjid`);

--
-- Indexes for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_masjid` (`id_masjid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_perubahan`
--
ALTER TABLE `pengajuan_perubahan`
  ADD PRIMARY KEY (`id_ajuan`),
  ADD KEY `id_masjid` (`id_masjid`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_masjid` (`id_masjid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `zakat`
--
ALTER TABLE `zakat`
  ADD PRIMARY KEY (`id_zakat`),
  ADD KEY `id_masjid` (`id_masjid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `beras_zakat`
--
ALTER TABLE `beras_zakat`
  MODIFY `id_beras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `db_data_masjid`
--
ALTER TABLE `db_data_masjid`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343789;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `infak_anak_yatim`
--
ALTER TABLE `infak_anak_yatim`
  MODIFY `id_infak` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12052;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_perubahan`
--
ALTER TABLE `pengajuan_perubahan`
  MODIFY `id_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36374;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12359;

--
-- AUTO_INCREMENT for table `zakat`
--
ALTER TABLE `zakat`
  MODIFY `id_zakat` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21324;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `db_data_masjid` (`id`);

--
-- Constraints for table `beras_zakat`
--
ALTER TABLE `beras_zakat`
  ADD CONSTRAINT `beras_zakat_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `db_data_masjid` (`id`);

--
-- Constraints for table `db_data_masjid`
--
ALTER TABLE `db_data_masjid`
  ADD CONSTRAINT `db_data_masjid_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `db_data_masjid` (`id`);

--
-- Constraints for table `infak_anak_yatim`
--
ALTER TABLE `infak_anak_yatim`
  ADD CONSTRAINT `infak_anak_yatim_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `db_data_masjid` (`id`);

--
-- Constraints for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD CONSTRAINT `kas_masjid_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `db_data_masjid` (`id`);

--
-- Constraints for table `pengajuan_perubahan`
--
ALTER TABLE `pengajuan_perubahan`
  ADD CONSTRAINT `pengajuan_perubahan_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `db_data_masjid` (`id`);

--
-- Constraints for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD CONSTRAINT `tb_kegiatan_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `db_data_masjid` (`id`);

--
-- Constraints for table `zakat`
--
ALTER TABLE `zakat`
  ADD CONSTRAINT `zakat_ibfk_1` FOREIGN KEY (`id_masjid`) REFERENCES `db_data_masjid` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
