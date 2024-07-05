-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 04:56 AM
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
-- Table structure for table `db_data_masjid`
--

CREATE TABLE `db_data_masjid` (
  `id` int(9) NOT NULL,
  `id_user` int(9) DEFAULT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `nama_masjid` varchar(255) NOT NULL,
  `nama_pengurus` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `jenis_tipologi` varchar(9) DEFAULT NULL,
  `kota_kab` varchar(255) NOT NULL,
  `alamat_masjid` varchar(255) NOT NULL,
  `tahun_berdiri` int(4) DEFAULT NULL,
  `luas_bangunan` int(9) DEFAULT NULL,
  `surat takmir` varchar(100) DEFAULT NULL,
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

INSERT INTO `db_data_masjid` (`id`, `id_user`, `sampul`, `nama_masjid`, `nama_pengurus`, `provinsi`, `deskripsi`, `jenis_tipologi`, `kota_kab`, `alamat_masjid`, `tahun_berdiri`, `luas_bangunan`, `surat takmir`, `sertifikat`, `luas_tanah`, `no_rekening`, `nama_bank`, `gambar1`, `gambar2`, `gambar3`, `created_at`, `updated_at`) VALUES
(13229, 12345, 'rayasumbar.jpg', 'Masjid Raya Sumbar', 'Pengurus oi', 'Sumatera Barat', 'Masjid Raya Sumatera Barat adalah masjid raya di provinsi Sumatera Barat yang terletak di Jalan Chatib Sulaiman, Kecamatan Padang Utara, Kota Padang yang memiliki luas sekitar 4.430 meter persegi.', '', 'Padang', 'Jl. Khatib Sulaiman, Alai Parak Kopi, Kec. Padang Utara, Kota Padang, Sumatera Barat', 0, 0, '', '', 0, 860608608, 'BCA', 'mesra1.jpg', 'mesra2.jpg', 'mesra3.jpg', '2024-06-23 10:21:39', '2024-06-23 10:21:39'),
(343780, 222, 'pangeran.jpg', 'Masjid Apalah', 'Reno Boy', 'Saranjana', 'agagagadg agedgvaeveag rhbrshfgftnxtjn gfnxgfnxfgnf bhrebraebfraebaebe tntrntdrndrtj ehhdxsbsrth synn ysrnjsr tssnxsnsrnr tssnbsnsrntrs stttttttttttttttttttttt sngtttttttttttttttttttttttt ztbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb tezzzzzzzzzzzzzzh\r\nrzbbbbbbbbbbbbbbbbbbbbbbbb rgggggggggggggggggggg fhbrrrrrrdbbbbbbbbbbbbbbbbbbbbbbbbbb fhzsrrrrrrrrrrrrr xdthhhhhhh', '', 'Saranjana', 'Saranjana No Sekian nkafaibfaibf afbaifia', 0, 0, '', '', 0, 0, '', 'ucup1.jpg', 'ucup2.jpg', 'ucup3.jpg', '2024-06-23 10:25:25', '2024-06-23 10:25:25'),
(343781, 12346, 'nurtaqwapjg.jpg', 'Masjid nur Taqwa', 'Reno Siuuu', 'Jawa Teng', 'pen 24 Hours, Ada Kajian Tiap Hari. Free Transit & Konsultasi Free Assorted Drinks Free Wifi & etc. _pen 24 Hours, Ada Kajian Tiap Hari. Free Transit & Konsultasi Free Assorted Drinks Free Wifi & etc. _. Sedekah & Infaq ⬇ · 939 posts · 1,859 followers . Sedekah & Infaq ⬇ · 939 posts · 1,859 followers \r\npen 24 Hours, Ada Kajian Tiap Hari. Free Transit & Konsultasi Free Assorted Drinks Free Wifi & etc. _. Sedekah & Infaq ⬇ · 939 posts · 1,859 followers \r\npen 24 Hours, Ada Kajian Tiap Hari. Free Transit & Konsultasi Free Assorted Drinks Free Wifi & etc. _. Sedekah & Infaq ⬇ · 939 posts · 1,859 followers \r\npen 24 Hours, Ada Kajian Tiap Hari. Free Transit & Konsultasi Free Assorted Drinks Free Wifi & etc. _. Sedekah & Infaq ⬇ · 939 posts · 1,859 followers ', '', 'JAea', 'Masjid Saka Tunggal ini dinobatkan sebagai masjid tertua di Indonesia karena didirikan 2', 0, 0, '', '', 0, 0, '', 'nurtaqwapjg.jpg', '', '', '2024-06-23 10:30:10', '2024-06-23 10:30:10'),
(343782, 12350, 'hakimprofile.jpg', 'Masjid Al-Hakim Padang', 'Susanto Julius', 'Sumatera barat', 'Masjid Al-Hakim Padang adalah sebuah masjid bergaya Taj Mahal di tepi Pantai Padang, Kota Padang, Sumatera Barat, Indonesia. Masjid ini mulai dibangun pada awal 2017. Biaya pembangunannya berasal dari seorang donatur, sementara lahannya disediakan oleh Pemerintah Kota Padang seiring penataan Pantai Padang yang dilakukan sejak 2014.[1]\r\n\r\nLahan masjid ini dulunya merupakan area permainan anak dan dipenuhi tenda-tenda pedagang kaki lima (PKL). Pada 2016, seorang donatur menyampaikan niatnya untuk membangun masjid di tepi pantai.[4] Berkat pendekatan yang dilakukan pemerintah setempat, PKL bersedia direlokasi ke tempat baru sehingga pembangunan masjid dapat dikerjakan.[2]', '', 'Padang', 'Jl. Samudera, Berok Nipah, Kec. Padang Bar., Kota Padang, Sumatera Barat', 0, 0, '', '', 0, 68465153, 'BCA', 'akim1.jpg', 'akim2.jpeg', 'akim3.jpg', '2024-06-28 15:46:52', '2024-06-28 15:46:52'),
(343783, 12349, 'sampulislamic.jpg', 'Masjid Islamic Centre', 'Anies Baswalu', 'Sumatera Barat', 'Masjid Islamic Centre yang didirikan mulai 2016 melalui anggaran tahun jamak sebesar Rp70 milliar itu, di era kepemimpinan Wali Kota Fadly Amran dan Wawako Asrul didapuk menjadi salah satu destinasi wisata halal di Sumbar. Seperti apa?\r\n\r\nKehadiran Islamic Centre melengkapi destinasi wisata religi yang menyandang predikat Kota Serambi Mekkah secara resmi sejak Maret 1999 silam dan sebagai daerah pencetak tokoh bangsa.\r\n\r\nKetua Umum Badan Pengelola Islamic Centre (BPIC) Padangpanjang, Nasrul Yahya mengatakan, keseriusan Pemko dalam mengembangkan Islamic Center ini menjadi pusat wisata religi, tidaklah main-main.', '', 'Padang Panjang', 'Unnamed Road, Padang Panjang Tim., Koto Katik, Kec. Padang Panjang Tim., Kota Padang Panjang, Sumatera Barat', 0, 0, '', '', 0, 654165465, 'nagari syariah', 'islamic1.jpg', 'islamic2.jpg', '', '2024-06-28 15:46:52', '2024-06-28 15:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(9) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `nama_donatur` varchar(15) NOT NULL,
  `ho_telp` char(12) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nominal` int(16) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_masjid`, `nama_donatur`, `ho_telp`, `alamat`, `nominal`, `create_at`, `update_at`) VALUES
(1, 13229, 'Cucok Broto', '099987788765', 'jalalnlanlanldandlandlandlankavevavave', 200000, '0000-00-00', '0000-00-00');

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
(1, 13229, '2024-06-18', 'Hamba Allah', 23000, '2024-06-23 10:50:16', '2024-06-23 10:50:16'),
(2, 13229, '2024-06-20', 'Hamba Allah Organisasi 2', 250000, '2024-06-23 10:50:16', '2024-06-23 10:50:16'),
(3, 343780, '2024-06-12', 'Hamba Ke ', 26000, '2024-06-23 10:50:16', '2024-06-23 10:50:16');

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
(12037, 13229, '2024-06-18', 'Infak Subuh', 'masuk', 200000, '2024-06-23 10:37:33', '2024-06-23 10:37:33'),
(12038, 13229, '2024-06-20', 'Infak Jummm', 'masuk', 35000, '2024-06-23 10:37:33', '2024-06-23 10:37:33'),
(12039, 13229, '2024-06-11', 'Beli Semen', 'keluar', 24300, '2024-06-23 10:37:33', '2024-06-23 10:37:33'),
(12040, 343780, '2024-06-11', 'Asssal Masuk', 'masuk', 4566600, '2024-06-23 10:37:33', '2024-06-23 10:37:33'),
(12041, 343780, '2024-06-23', 'Coba kas keluar', 'keluar', 24500, '2024-06-23 10:37:33', '2024-06-23 10:37:33'),
(12042, 13229, '2024-07-11', 'Infak subuh', 'masuk', 25000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12043, 13229, '2024-05-29', 'Beli pengharum ruangan', 'keluar', 25000, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(36367, 13229, '2024-06-19', 'Berita', 'Gotong royong', 'goroms.jpg', 'empat menanamkan nilai-nilai kebajikan dan kemaslahatan umat manusia. Selain itu, masjid juga dapat digunakan sebagai tempat untuk membangun ekonomi dan kesejahteraan umat. “Dari masjid dapat dikembangkan berbagai kegiatan yang mengarah pada terwujudnya masyarakat madani.', '2024-06-23 10:40:31', '2024-06-23 10:40:31'),
(36369, 13229, '2024-06-24', 'Acara', 'Lomba MTQ', 'lombaaaa.jpeg', 'Musabaqoh Tilawatil Qur\'an bukanlah sekedar lomba untuk mencari qori-qoriah dan hafid hafidzah terbaik, akan tetapi MTQ adalah suatu upaya konkrit umat Islam untuk menggali nilai-nilai luhur yang terkandung didalam Al qur\'an supaya dijadikan sebagai pedoman hidup.', '2024-06-23 10:40:31', '2024-06-23 10:40:31'),
(36371, 343781, '2024-06-24', 'Kegiatan', 'Lomba TPQ TQA Masjid', 'lom.jpg', 'Memeriahkan bulan Ramadhan 1444 H/2023 M biasanya diisi dengan berbagai lomba anak yang digelar di masjid. Berikut ini ide lomba anak yang cocok diselenggarakan saat Ramadhan.\r\nKegiatan lomba dalam rangka memeriahkan Ramadhan akan memberikan kesan indah bagi mereka di bulan ini, selain itu adanya lomba-lomba bagi anak-anak akan mengasah kemampuan bakat mereka.\r\n\r\nBukan hanya soal hadiah bagi pemenangnya, tetapi partisipasi anak-anak yang hadir bisa menambah tali silaturahmi antar mereka, bisa menumbuhkan rasa pertemanan, dan menambah keberanian.\r\n\r\nBaca artikel detikjateng, \"10 Ide Lomba Anak Meriahkan Bulan Ramadhan\" selengkapnya https://www.detik.com/jateng/berita/d-6648024/10-ide-lomba-anak-meriahkan-bulan-ramadhan.\r\n\r\nDownload Apps Detikcom Sekarang https://apps.detik.com/detik/', '2024-06-28 15:31:13', '2024-06-28 15:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(9) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(222, 'imam', 'imam', '', '2024-06-13 10:57:01', '2024-06-13 10:57:01'),
(12345, 'pengurus', '123123', '', '2024-06-11 10:36:55', '2024-06-11 10:36:55'),
(12346, 'reno', 'okokok', '', '2024-06-23 10:34:00', '2024-06-23 10:34:00'),
(12347, 'rani', 'reno', 'pengurus', '2024-06-28 15:35:37', '2024-06-28 15:35:37'),
(12348, 'jihan', 'jihan', 'pengurus', '2024-06-28 15:35:37', '2024-06-28 15:35:37'),
(12349, 'tukak', 'tukak', '', '2024-06-28 15:35:37', '2024-06-28 15:35:37'),
(12350, 'luka', 'luka', '', '2024-06-28 15:35:37', '2024-06-28 15:35:37');

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
(21315, '2024-06-11', 13229, 'Hamba Allah', 200000, '2024-06-23 10:46:17', '2024-06-23 10:46:17'),
(21316, '2024-06-19', 13229, 'Hamba ke2', 34000, '2024-06-23 10:46:17', '2024-06-23 10:46:17'),
(21317, '2024-06-11', 343780, 'Hamba aca', 243000, '2024-06-23 10:46:17', '2024-06-23 10:46:17'),
(21318, '2024-06-11', 343781, 'Hamba AAAAAA', 956600, '2024-06-23 10:46:17', '2024-06-23 10:46:17');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `db_data_masjid`
--
ALTER TABLE `db_data_masjid`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343784;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `infak_anak_yatim`
--
ALTER TABLE `infak_anak_yatim`
  MODIFY `id_infak` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12044;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36372;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12351;

--
-- AUTO_INCREMENT for table `zakat`
--
ALTER TABLE `zakat`
  MODIFY `id_zakat` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21319;

--
-- Constraints for dumped tables
--

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
