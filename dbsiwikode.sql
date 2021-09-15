-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 11:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsiwikode`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_wisata`
--

CREATE TABLE `jenis_wisata` (
  `id` int(11) NOT NULL,
  `jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_wisata`
--

INSERT INTO `jenis_wisata` (`id`, `jenis`) VALUES
(1, 'Wisata Rekreasi'),
(2, 'Wisata Kuliner');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Argo Wisata'),
(2, 'Taman Wisata'),
(3, 'Museum'),
(4, 'Water Park'),
(5, 'Kedai/Cafe'),
(6, 'Restaurant'),
(7, 'Pasar');

-- --------------------------------------------------------

--
-- Table structure for table `profesi`
--

CREATE TABLE `profesi` (
  `id` int(11) NOT NULL,
  `nama_profesi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profesi`
--

INSERT INTO `profesi` (`id`, `nama_profesi`) VALUES
(1, 'Artist'),
(2, 'Pejabat'),
(3, 'Mahasiswa'),
(4, 'Pegawai Swasta'),
(5, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni_wisata`
--

CREATE TABLE `testimoni_wisata` (
  `id` int(11) NOT NULL,
  `nama_testimoni` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `wisata_depok_id` varchar(128) NOT NULL,
  `profesi_id` varchar(128) NOT NULL,
  `rating` smallint(6) NOT NULL,
  `komentar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni_wisata`
--

INSERT INTO `testimoni_wisata` (`id`, `nama_testimoni`, `email`, `wisata_depok_id`, `profesi_id`, `rating`, `komentar`) VALUES
(1, 'Sabiq Muhammad', 'sabiqmuhammad98@gmail.com', '2', '3', 5, 'Wah gila si innimah'),
(2, 'Riyandi', 'riyandi@gmail.com', '4', '3', 5, 'Enak parah makanan sundanya'),
(3, 'Julkarnain Lubis', 'sabiqmuhammad98@gmail.com', '4', '3', 5, 'Wah mantulll\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `profesi` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(80) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `image`, `profesi`, `deskripsi`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Dea Rhamanti', 'dearhamanti@gmail.com', 'Group_30_(2).jpg', 'pejabat', 'Sabiq keren', '$2y$10$scgzXs6eq4gJMfvC2VGwleXne1iykfKbhO1fG9.yGWZfE/TXy3IvC', 1, 1, 1625625421),
(2, 'Sabiq Muhammad', 'sabiqmuhammad98@gmail.com', 'Group_30_(2)2.jpg', 'Mahasiswa', 'Web Enthusiast, cssIsWonderful', '$2y$10$nnPHFkTMfFzyVZDx1HCrw.COWaR6zBLfpXKhOA/WYJuzIi4QPGP0e', 1, 1, 1625668257),
(3, 'Riyandi x Sabiq', 'riyandi@gmail.com', 'Group_30_(2)1.jpg', 'Pejabat', 'asdfhasdfdashfdasfasf', '$2y$10$Pq7wqzaHAJYUjazxpPzRBu.WHwNlisyM2EDaFpd2E5PWysqKcYtNW', 1, 1, 1626100343),
(4, 'Riyan', 'riyan@gmail.com', 'default.png', '', '', '$2y$10$KqG8gjsBIPr3baS.a0voFeN.xzRtKjABri4Sz6SUM3HvcijBInGku', 1, 1, 1626101353);

-- --------------------------------------------------------

--
-- Table structure for table `users_access_menu`
--

CREATE TABLE `users_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_access_menu`
--

INSERT INTO `users_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_menu`
--

CREATE TABLE `users_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_menu`
--

INSERT INTO `users_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `users_sub_menu`
--

CREATE TABLE `users_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_sub_menu`
--

INSERT INTO `users_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-user', 1),
(3, 1, 'Wisata', 'wisata', 'fas fa-map-marked-alt', 1),
(4, 1, 'Testimoni', 'testimoni', 'fas fa-star-half-alt', 1),
(6, 1, 'User Role', 'admin/user_role', 'fas fa-users-cog', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wisata_depok`
--

CREATE TABLE `wisata_depok` (
  `id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `nama_wisata` varchar(128) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `jenis_wisata_id` varchar(128) NOT NULL,
  `kategori_id` varchar(128) DEFAULT NULL,
  `fasilitas` varchar(128) NOT NULL,
  `rating` smallint(6) NOT NULL,
  `kontak` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `latlong` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisata_depok`
--

INSERT INTO `wisata_depok` (`id`, `image`, `nama_wisata`, `deskripsi`, `jenis_wisata_id`, `kategori_id`, `fasilitas`, `rating`, `kontak`, `alamat`, `latlong`, `email`, `url`) VALUES
(1, 'godongijo.jpg', 'Godong Ijo', 'empat wisata selanjutnya adalah GodongIjo Depok. Tak boleh dilewatkan begitu saja karena memang memiliki daya tarik tersendiri. Ada wahana dengan luas sekitar 2.5 HA dan menjadi tujuan wisata keluarga terutama yang masih berusia anak-anak.', '1', '2', 'Lapangan Bola, Lapangan Tenis', 0, '085776655218', 'Jl. Cinangka Raya No.KM 10 No. 60, Serua, Kec. Bojongsari, Kota Depok, Jawa Barat 16517.', '213123123123', 'godongijo@gmail.com', 'godongijo.com'),
(2, 'kubah-emas.jpg', 'Kubah Mas', 'Namanya adalah Masjid Kubah Emas atau Masjibg-d Dian Al Mahri yang menjadi masjid kebanggaan kota Depok. Diresmikan di tanggal 31 Desember 2006 dan menjadi yang termegah di kawasan Asia Tenggara.', '1', '3', 'Namanya adalah Masjid Kubah Emas atau Masjibg-d Dian Al Mahri yang menjadi masjid kebanggaan kota Depok. Diresmikan di tanggal 3', 0, '085776655218', 'Meruyung, Kec. Limo, Depok, Jawa Barat.', '-6.9447 107.7219', 'kubahma@gmail.com', 'kubahmas.com'),
(3, 'lembah_gurame.jpg', 'Lembah Gurame', 'Namanya unik yang disematkan pada cafe ini membuatnya cukup populer di kalangan anak muda. Selain dari namanya yang keren, cafe ini juga sangat cozy sehingga para penggemar kopi bisa nyaman menghabiskan waktu yang lama di cafe ini.', '1', '1', 'Lapangan Bola, Lapangan Tenis', 0, '085776655218', 'Jalan Margonda, 2 No.498 D, RW.004, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424', '1222223333111', 'lembahgurame@gmail.com', 'lembahgurame.com'),
(4, 'mangkabayan.jpg', 'Mang Kabayan', 'Menyediakan menu lengkap khas makanan Sunda dengan paduan ruang untuk duduk dan lesehan.', '2', '6', 'Menyediakan menu lengkap khas makanan Sunda dengan paduan ruang untuk duduk dan lesehan.', 0, '085776655218', 'Jalan Margonda Raya No.488, Pondok Cina, Depok, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424', '213123123123', 'mangkabayan@gmail.com', 'mangkabayan.com'),
(5, 'kopium.jpg', 'Kopium', 'Namanya unik yang disematkan pada cafe ini membuatnya cukup populer di kalangan anak muda. Selain dari namanya yang keren, cafe ini juga sangat cozy sehingga para penggemar kopi bisa nyaman menghabiskan waktu yang lama di cafe ini.', '2', '5', 'Ac dan Tempat yang nyaman', 0, '085776655218', 'Jalan Margonda, 2 No.498 D, RW.004, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424', '11111111222222233333', 'kopium@gmail.com', 'kopium.com'),
(6, 'pondok-laras.jpg', 'Pondok Laras', 'Pelayanan yang memuaskan serta tempat yang nyaman menjadi salah satu Pondok Laras selalu ramai, apalagi anda bisa menikmati kuliner disini di saung yang unik beralaskan tikar, diatas meja kayu memberikan kenikmatan sendiri\r\n', '1', '6', 'Pelayanan yang memuaskan serta tempat yang nyaman menjadi salah satu Pondok Laras selalu ramai, apalagi anda bisa menikmati kuli', 0, '085776655218', 'Jl. Akses UI No.2, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat 16451', '213123123123', 'pondoklaras@gmail.com', 'pondoklaras.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_wisata`
--
ALTER TABLE `jenis_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesi`
--
ALTER TABLE `profesi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni_wisata`
--
ALTER TABLE `testimoni_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_menu`
--
ALTER TABLE `users_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata_depok`
--
ALTER TABLE `wisata_depok`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_wisata`
--
ALTER TABLE `jenis_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profesi`
--
ALTER TABLE `profesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimoni_wisata`
--
ALTER TABLE `testimoni_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wisata_depok`
--
ALTER TABLE `wisata_depok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
