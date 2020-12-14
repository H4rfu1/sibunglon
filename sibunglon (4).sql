-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 06:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibunglon`
--

-- --------------------------------------------------------

--
-- Table structure for table `aksi_perawatan`
--

CREATE TABLE `aksi_perawatan` (
  `id_aksi_perawatan` int(11) NOT NULL,
  `id_perawat` int(11) UNSIGNED NOT NULL,
  `id_detail_perawatan` int(11) NOT NULL,
  `tanggal_aksi_perawatan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aksi_perawatan`
--

INSERT INTO `aksi_perawatan` (`id_aksi_perawatan`, `id_perawat`, `id_detail_perawatan`, `tanggal_aksi_perawatan`) VALUES
(2, 10, 1, '2020-12-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_perawatan`
--

CREATE TABLE `data_perawatan` (
  `id_dataperawatan` int(11) NOT NULL,
  `id_jenismelon` int(11) NOT NULL,
  `id_greenhouse` int(11) NOT NULL,
  `tanggal_tanam` date NOT NULL,
  `id_akun` int(11) UNSIGNED NOT NULL,
  `prediksi_tanggalpanen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_perawatan`
--

INSERT INTO `data_perawatan` (`id_dataperawatan`, `id_jenismelon`, `id_greenhouse`, `tanggal_tanam`, `id_akun`, `prediksi_tanggalpanen`) VALUES
(18, 1, 1, '2020-12-11', 10, '2021-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `detail_perawatan`
--

CREATE TABLE `detail_perawatan` (
  `id_detail_perawatan` int(11) NOT NULL,
  `id_data_perawatan` int(11) NOT NULL,
  `perawatan` varchar(50) NOT NULL,
  `tanggal_perawatan` date NOT NULL,
  `status` enum('Belum ada aksi','Terlambat','Tepat waktu','Terlalu cepat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_perawatan`
--

INSERT INTO `detail_perawatan` (`id_detail_perawatan`, `id_data_perawatan`, `perawatan`, `tanggal_perawatan`, `status`) VALUES
(1, 18, 'pemupukan', '2020-12-21', 'Terlalu cepat'),
(2, 18, 'pemupukan', '2020-12-31', 'Belum ada aksi'),
(3, 18, 'pemupukan', '2021-01-10', 'Belum ada aksi'),
(4, 18, 'pemupukan', '2021-01-20', 'Belum ada aksi'),
(5, 18, 'pemupukan', '2021-01-30', 'Belum ada aksi');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_panen`
--

CREATE TABLE `hasil_panen` (
  `id_hasilpanen` int(11) NOT NULL,
  `id_data_perawatan` int(11) NOT NULL,
  `persentase_panen` float NOT NULL,
  `status` enum('berhasil','gagal') NOT NULL,
  `jumlah_hasilpanen` int(11) NOT NULL,
  `tanggal_hasilpanen` date NOT NULL,
  `id_akun` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_panen`
--

INSERT INTO `hasil_panen` (`id_hasilpanen`, `id_data_perawatan`, `persentase_panen`, `status`, `jumlah_hasilpanen`, `tanggal_hasilpanen`, `id_akun`) VALUES
(4, 18, 80, 'berhasil', 1000, '2020-12-13', 6),
(5, 18, 80, 'berhasil', 2000, '2020-12-13', 10),
(6, 18, 70, 'gagal', 400, '2020-12-13', 10),
(7, 18, 50, 'gagal', 500, '2020-12-04', 10);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_melon`
--

CREATE TABLE `jenis_melon` (
  `id_jenismelon` int(8) NOT NULL,
  `jenismelon` varchar(50) NOT NULL,
  `masa_panen` int(11) NOT NULL,
  `masa_pupuk` int(11) NOT NULL,
  `keterangan` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_melon`
--

INSERT INTO `jenis_melon` (`id_jenismelon`, `jenismelon`, `masa_panen`, `masa_pupuk`, `keterangan`) VALUES
(1, 'golden', 60, 8, 'Setelah pembuatan lahan selesai, pupuk organik yang sudah difermentasi sebarkan ke lahan. Dosis yang disebar kami rekomendasi sebanyak 5-10 ton per hektar lahan. Selanjutnya menambahkan kapur pertanian(dolomit) dengan disebar sebanyak 2 ton per hektar. Selanjutnya tambahkan pupuk dasar sebanyak 60-100 gram per tanaman melon, pupuk dasar ini menggunakan pupuk NPK non subsidi dengan pupuk fosfat.'),
(2, 'dalmation', 70, 5, 'Setelah pembuatan lahan selesai, pupuk organik yang sudah difermentasi sebarkan ke lahan. Dosis yang disebar kami rekomendasi sebanyak 5-10 ton per hektar lahan. Selanjutnya menambahkan kapur pertanian(dolomit) dengan disebar sebanyak 2 ton per hektar. Selanjutnya tambahkan pupuk dasar sebanyak 60-100 gram per tanaman melon, pupuk dasar ini menggunakan pupuk NPK non subsidi dengan pupuk fosfat.'),
(3, 'hamiqua', 65, 6, 'Setelah pembuatan lahan selesai, pupuk organik yang sudah difermentasi sebarkan ke lahan. Dosis yang disebar kami rekomendasi sebanyak 5-10 ton per hektar lahan. Selanjutnya menambahkan kapur pertanian(dolomit) dengan disebar sebanyak 2 ton per hektar. Selanjutnya tambahkan pupuk dasar sebanyak 60-100 gram per tanaman melon, pupuk dasar ini menggunakan pupuk NPK non subsidi dengan pupuk fosfat.'),
(4, 'inthanon', 80, 6, 'Setelah pembuatan lahan selesai, pupuk organik yang sudah difermentasi sebarkan ke lahan. Dosis yang disebar kami rekomendasi sebanyak 5-10 ton per hektar lahan. Selanjutnya menambahkan kapur pertanian(dolomit) dengan disebar sebanyak 2 ton per hektar. Selanjutnya tambahkan pupuk dasar sebanyak 60-100 gram per tanaman melon, pupuk dasar ini menggunakan pupuk NPK non subsidi dengan pupuk fosfat.');

-- --------------------------------------------------------

--
-- Table structure for table `no_greenhouse`
--

CREATE TABLE `no_greenhouse` (
  `id_greenhouse` int(11) NOT NULL,
  `no_greenhouse` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no_greenhouse`
--

INSERT INTO `no_greenhouse` (`id_greenhouse`, `no_greenhouse`) VALUES
(1, '001'),
(2, '002'),
(3, '003'),
(4, '004');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(8) UNSIGNED NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'administrator'),
(2, 'pengawas'),
(3, 'pemimpin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_role` int(8) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `name`, `tempat_lahir`, `tanggal_lahir`, `email`, `alamat`, `jenis_kelamin`, `no_hp`, `password`) VALUES
(6, 1, 'Moh. Fahrul Hafidh', 'Banyuwangi', '2020-11-16 00:00:00', 'mohfahrulhafidh@gmail.com', 'asd', 'laki-laki', '083111712794', '$2y$10$1dgPHDm0a1B6Yo6S1QUgROF.bIiAJZFDFslep2yVcMvXoOpxOGbp.'),
(10, 2, 'Moh. Fahrul Hafidh', 'Banyuwangi', '2020-11-02 00:00:00', 'sakun915@gmail.com', 'asd', 'laki-laki', '083111712794', '$2y$10$DwDAAPXIUK842cKv0V8D8.kAU6GMivOSCt0sRu38/57GAZ.WNZG2S'),
(11, 3, 'father mother', 'Banyuwangi', '2020-11-02 00:00:00', 'takun917@gmail.com', 'asd', 'laki-laki', '083111712794', '$2y$10$szzjZOkRe0nfXEZi1sFG5uQEF.brM5EiBgK5IrIrIV1/B9AlLfqnC'),
(12, 2, 'Moh. Fahrul Hafidh', 'Banyuwangi', '2020-11-04 00:00:00', 'asd@asd.com', 'asd', 'laki-laki', '083111712794', '$2y$10$m4zz8yO46KPV/ooAo2zkTeFazaVsVNn16O1Yd0eYz7GIh/DKAKH4i'),
(13, 3, 'Moh. Fahrul Hafidh', 'Banyuwangi', '2020-11-03 00:00:00', 'pemimpin@gmail.com', 'asd', 'laki-laki', '083111712794', '$2y$10$My1cZ/NtST6axPBMD/LOd.HohXodA1xICHL2HDSzfD93c9Li3iLzm'),
(15, 2, 'Dimas', 'Blitar', '2020-11-19 00:00:00', 'rifriandi@gmail.com', 'Hahsjja', 'Laki lkai', '0488449494', '$2y$10$B2ugKWuRgaaVEX6rHGeDPeV6XLkV1WpKNn8IqLlKcEjBocjayUnfC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksi_perawatan`
--
ALTER TABLE `aksi_perawatan`
  ADD PRIMARY KEY (`id_aksi_perawatan`),
  ADD KEY `id_detail_perawatan` (`id_detail_perawatan`),
  ADD KEY `id_perawat` (`id_perawat`);

--
-- Indexes for table `data_perawatan`
--
ALTER TABLE `data_perawatan`
  ADD PRIMARY KEY (`id_dataperawatan`),
  ADD KEY `id_greenhouse` (`id_greenhouse`),
  ADD KEY `id_jenismelon` (`id_jenismelon`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `detail_perawatan`
--
ALTER TABLE `detail_perawatan`
  ADD PRIMARY KEY (`id_detail_perawatan`),
  ADD KEY `id_data_perawatan` (`id_data_perawatan`);

--
-- Indexes for table `hasil_panen`
--
ALTER TABLE `hasil_panen`
  ADD PRIMARY KEY (`id_hasilpanen`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_data_perawatan` (`id_data_perawatan`);

--
-- Indexes for table `jenis_melon`
--
ALTER TABLE `jenis_melon`
  ADD PRIMARY KEY (`id_jenismelon`);

--
-- Indexes for table `no_greenhouse`
--
ALTER TABLE `no_greenhouse`
  ADD PRIMARY KEY (`id_greenhouse`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aksi_perawatan`
--
ALTER TABLE `aksi_perawatan`
  MODIFY `id_aksi_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_perawatan`
--
ALTER TABLE `data_perawatan`
  MODIFY `id_dataperawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detail_perawatan`
--
ALTER TABLE `detail_perawatan`
  MODIFY `id_detail_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil_panen`
--
ALTER TABLE `hasil_panen`
  MODIFY `id_hasilpanen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_melon`
--
ALTER TABLE `jenis_melon`
  MODIFY `id_jenismelon` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `no_greenhouse`
--
ALTER TABLE `no_greenhouse`
  MODIFY `id_greenhouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aksi_perawatan`
--
ALTER TABLE `aksi_perawatan`
  ADD CONSTRAINT `aksi_perawatan_ibfk_1` FOREIGN KEY (`id_detail_perawatan`) REFERENCES `detail_perawatan` (`id_detail_perawatan`),
  ADD CONSTRAINT `aksi_perawatan_ibfk_2` FOREIGN KEY (`id_perawat`) REFERENCES `users` (`id`);

--
-- Constraints for table `data_perawatan`
--
ALTER TABLE `data_perawatan`
  ADD CONSTRAINT `data_perawatan_ibfk_1` FOREIGN KEY (`id_greenhouse`) REFERENCES `no_greenhouse` (`id_greenhouse`),
  ADD CONSTRAINT `data_perawatan_ibfk_2` FOREIGN KEY (`id_jenismelon`) REFERENCES `jenis_melon` (`id_jenismelon`),
  ADD CONSTRAINT `data_perawatan_ibfk_3` FOREIGN KEY (`id_akun`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_perawatan`
--
ALTER TABLE `detail_perawatan`
  ADD CONSTRAINT `detail_perawatan_ibfk_1` FOREIGN KEY (`id_data_perawatan`) REFERENCES `data_perawatan` (`id_dataperawatan`);

--
-- Constraints for table `hasil_panen`
--
ALTER TABLE `hasil_panen`
  ADD CONSTRAINT `hasil_panen_ibfk_3` FOREIGN KEY (`id_akun`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hasil_panen_ibfk_4` FOREIGN KEY (`id_data_perawatan`) REFERENCES `data_perawatan` (`id_dataperawatan`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
