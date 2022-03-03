-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 06:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lionel_steam`
--
CREATE DATABASE IF NOT EXISTS `lionel_steam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lionel_steam`;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `foto_galeri` varchar(60) NOT NULL,
  `judul_galeri` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto_galeri`, `judul_galeri`) VALUES
(19, '609fe4634995c.jpg', 'coba edit 2'),
(23, '609fe45ae4565.jpg', 'coba tambah');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `jenis_kendaraan` enum('Mobil','Motor') NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_paket` varchar(60) NOT NULL,
  `ket_paket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `jenis_kendaraan`, `harga`, `foto_paket`, `ket_paket`) VALUES
(1, 'Paket Motor Biasa', 'Motor', 20000, 'default.png', 'Lorem 1 ipsum dolor sit amet consectetur, adipisicing elit. Hic officia voluptatum in quisquam at voluptates et, obcaecati nam quidem eveniet?'),
(2, 'Paket Motor Spesial', 'Motor', 50000, 'default.png', 'Lorem 2 ipsum dolor sit amet consectetur, adipisicing elit. Hic officia voluptatum in quisquam at voluptates et, obcaecati nam quidem eveniet?'),
(3, 'Paket Mobil Biasa', 'Mobil', 50000, 'default.png', 'Lorem 3 ipsum dolor sit amet consectetur, adipisicing elit. Hic officia voluptatum in quisquam at voluptates et, obcaecati nam quidem eveniet?'),
(4, 'Paket Mobil Spesial', 'Mobil', 100000, 'default.png', 'Lorem 4 ipsum dolor sit amet consectetur, adipisicing elit. Hic officia voluptatum in quisquam at voluptates et, obcaecati nam quidem eveniet?'),
(5, 'Paket Mobil Besar', 'Mobil', 25000, 'default.png', 'Lorem 5 ipsum dolor sit amet consectetur, adipisicing elit. Hic officia voluptatum in quisquam at voluptates et, obcaecati nam quidem eveniet?');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `no_plat_kendaraan` varchar(15) NOT NULL,
  `paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `nama_pelanggan`, `no_plat_kendaraan`, `paket`) VALUES
('TR-00001', '2021-04-12', 'elsa', '5TETRER', 2),
('TR-00002', '2021-04-13', 'ribka', 'RE343', 4),
('TR-00003', '2021-04-23', 'widya', '68921', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_user`, `hak_akses`) VALUES
(1, 'ribkaelsa', '571a05ad701d3afb2156d83b0ce29024', 'Widya Ribka Elsa', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `paket` (`paket`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
