-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 09:49 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama_paket`, `harga`) VALUES
(1, 'cuci kering setrika', '25000'),
(3, 'cuci kilat exprtess', '25000'),
(4, 'cuci basah', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telepon` decimal(13,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `name`, `address`, `telepon`) VALUES
(1, 'Kekeyi R', 'Madiun', '895377255183'),
(7, 'Cahaya Putri A', 'sby', '811010020'),
(8, 'alibaba 1', 'gresik', '811010020');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `berat` decimal(3,0) NOT NULL,
  `subtotal` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_paket`, `harga`, `nama_pelanggan`, `telepon`, `tgl_transaksi`, `tgl_ambil`, `berat`, `subtotal`) VALUES
(24, 1, '25000', 'alibaba 1', '0811010020', '2020-06-01', '2020-07-10', '2', '50000'),
(33, 4, '2000', 'alibaba 1', '0811010020', '2020-06-01', '2020-07-10', '2', '4000'),
(34, 1, '25000', 'alibaba 1', '0811010020', '2020-06-01', '2020-07-10', '2', '50000'),
(37, 4, '2000', 'CAhaya agusttika', '0811010020', '2020-06-01', '2020-06-25', '2', '4000'),
(38, 4, '2000', 'yusmi', '0811010020', '2020-06-02', '2020-06-27', '3', '6000'),
(39, 4, '2000', 'Yusmi N', '11111', '2020-06-02', '2020-06-04', '4', '8000'),
(40, 1, '25000', 'Yusmi Nuraini', '0811010020', '2020-06-02', '2020-07-02', '6', '150000'),
(41, 3, '25000', 'CAhaya putri agusttika', '0811010020', '2020-06-02', '2020-06-15', '7', '175000'),
(42, 0, '0', 'Yusmi Nuraini', '0811010020', '2020-06-02', '2020-07-02', '6', '0'),
(43, 1, '25000', 'CAhaya agusttika putri', '0811010020', '2020-06-02', '2020-06-25', '6', '150000'),
(44, 1, '25000', 'aini rahma', '0811010020', '2020-06-02', '2020-06-19', '4', '100000'),
(45, 3, '25000', 'alibaba', '0811010020', '2020-06-02', '2020-06-09', '2', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(225) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `level` varchar(1) NOT NULL COMMENT '1 admin 2 kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `address`, `telepon`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'cahaya', 'larangan', '081236', '1'),
(2, 'pegawai1', 'fbcfd87f23a8aecde01db4edbff835a03957e997', 'willi', 'gresik', '0927828', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
