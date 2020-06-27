-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 02:52 AM
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

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cekKota` (`vidkota` INT(11)) RETURNS VARCHAR(100) CHARSET utf8mb4 NO SQL
    DETERMINISTIC
BEGIN
declare nmkota varchar(100);
select kota.kota into nmkota from kota where id_kota=vidkota;
RETURN nmkota;
END$$

DELIMITER ;

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

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`) VALUES
(1, 'Palembang'),
(2, 'Jakarta');

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
('KL-REG', 'REG', 40000, 'REG'),
('KL-YES', 'YES', 50000, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `kd_penerima` int(5) NOT NULL,
  `nama_penerima` varchar(200) DEFAULT NULL,
  `kontak` int(11) DEFAULT NULL,
  `alamat` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`kd_penerima`, `nama_penerima`, `kontak`, `alamat`) VALUES
(123, 'Maha Dwi', 812, 'bumi putra');

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE `pengirim` (
  `kd_pengirim` int(5) NOT NULL,
  `nama_pengirim` varchar(200) DEFAULT NULL,
  `kontak` int(11) DEFAULT NULL,
  `alamat` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`kd_pengirim`, `nama_pengirim`, `kontak`, `alamat`) VALUES
(123, 'dwi', 812, 'palembang');

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

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kd_transaksi`, `kd_pengirim`, `kd_penerima`, `kd_barang`, `jumlah`, `harga`, `asal`, `tujuan`, `id_user`) VALUES
(123, 123, 123, 'BR23', 2, 50000, 2, 1, 1);

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
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '2019-07-17 10:51:09', '2020-06-13 02:37:46', '2020-05-09 11:58:26', 'Y', 1),
(73, 'mahadwi', 'mahadwiputra008@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2020-06-24 14:28:34', '2020-06-25 03:18:42', NULL, 'N', 4);

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
(1, 'Maha Dwi', 'Putra', '1992-08-08', 'Pria', 'palembang', '081271650453', '96-10.png', 1),
(53, 'mahadwi', 'putra', NULL, NULL, NULL, NULL, 'default.png', 59),
(56, 'dwi', 'putra', NULL, NULL, NULL, NULL, 'default.png', 60),
(57, 'dwi', 'putra', NULL, NULL, NULL, NULL, 'default.png', 61),
(58, '', '', NULL, NULL, NULL, NULL, 'default.png', 63),
(59, 'dwi', 'putra', NULL, NULL, NULL, NULL, 'default.png', 68),
(60, 'Maha Dwi', 'Putra', NULL, NULL, NULL, NULL, 'default.png', 71),
(61, 'Maha Dwi', 'Putra', NULL, NULL, NULL, NULL, 'default.png', 73),
(62, '', '', NULL, NULL, NULL, NULL, 'default.png', 74);

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
  MODIFY `id_kota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `kd_penerima` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `pengirim`
--
ALTER TABLE `pengirim`
  MODIFY `kd_pengirim` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`kd_pengirim`) REFERENCES `pengirim` (`kd_pengirim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`tujuan`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_6` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
