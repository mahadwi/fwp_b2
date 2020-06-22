-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 02:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekspedisi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(4) NOT NULL,
  `nama_barang` varchar(200) DEFAULT NULL,
  `jenis_barang` enum('makanan','dokumen','pecahbelah','elektroni','fashion') DEFAULT NULL,
  `berat_barang` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `jenis_barang`, `berat_barang`, `created_at`, `updated_at`) VALUES
('BR23', 'Pempek Lenjer', 'makanan', 2, '2020-05-09 00:00:00', '2020-05-09 14:36:45'),
('KD21', 'Baju Panjang', 'fashion', 2, '2020-05-09 00:00:00', '2020-05-09 14:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(5) NOT NULL,
  `kota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `kd_layanan` varchar(6) NOT NULL,
  `layanan` enum('YES','REG','','') DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`kd_layanan`, `layanan`, `harga`, `keterangan`) VALUES
('KL-REG', 'REG', NULL, 'REG'),
('KL-YES', 'YES', NULL, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `kd_penerima` int(5) NOT NULL,
  `nama_penerima` varchar(200) DEFAULT NULL,
  `kontak` int(11) DEFAULT NULL,
  `alamat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE `pengirim` (
  `kd_pengirim` int(5) NOT NULL,
  `nama_pengirim` varchar(200) DEFAULT NULL,
  `kontak` int(11) DEFAULT NULL,
  `alamat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(11) NOT NULL,
  `kd_pengirim` int(5) DEFAULT NULL,
  `kd_penerima` int(5) DEFAULT NULL,
  `kd_barang` varchar(4) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `asal` int(5) DEFAULT NULL,
  `tujuan` int(5) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  `id_role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `created_at`, `updated_at`, `login_at`, `aktif`, `id_role`) VALUES
(1, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-07-17 10:51:09', '2020-06-13 02:37:46', '2020-05-09 11:58:26', 'Y', 1),
(59, 'mahadwiputra', 'mahadwiputra008@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-05-17 05:24:18', '2020-06-06 04:11:20', NULL, 'Y', 2),
(60, 'mahadwi', 'mahadwiputra@ymail.com', '6a58fff5a39a9a4dce4ac3c600d94ba2', '2020-06-12 11:52:12', '2020-06-12 11:52:38', NULL, 'Y', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `id_profil` int(11) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` enum('Pria','Wanita') DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `foto` varchar(100) DEFAULT 'default.png',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id_profil`, `nama_depan`, `nama_belakang`, `tgl_lahir`, `jk`, `alamat`, `kontak`, `foto`, `id_user`) VALUES
(1, 'Admin', 'maha', '2020-06-03', 'Pria', 'palembang', '081271', '96-10.png', 1),
(53, 'mahadwi', 'putra', NULL, NULL, NULL, NULL, 'default.png', 59),
(56, 'dwi', 'putra', NULL, NULL, NULL, NULL, 'default.png', 60),
(57, 'dwi', 'putra', NULL, NULL, NULL, NULL, 'default.png', 61);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int(1) NOT NULL,
  `role` enum('Admin','Kurir','Customer','Manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Kurir'),
(3, 'Customer'),
(4, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`kd_layanan`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`kd_penerima`);

--
-- Indexes for table `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`kd_pengirim`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `asal` (`asal`),
  ADD KEY `tujuan` (`tujuan`),
  ADD KEY `kd_penerima` (`kd_penerima`),
  ADD KEY `kd_pengirim` (`kd_pengirim`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `jumlah` (`jumlah`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`username`),
  ADD KEY `role_id` (`id_role`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `kd_penerima` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengirim`
--
ALTER TABLE `pengirim`
  MODIFY `kd_pengirim` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_profile` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`asal`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kd_penerima`) REFERENCES `penerima` (`kd_penerima`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`kd_pengirim`) REFERENCES `pengirim` (`kd_pengirim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
