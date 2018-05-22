-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2018 at 06:15 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anam`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(3) NOT NULL,
  `nm_customer` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nm_customer`, `alamat`, `no_telp`) VALUES
(1, 'PT alam asri sejahtera', 'jl raya serang km 21', '08787777771');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` int(3) NOT NULL,
  `no_mesin` varchar(12) NOT NULL,
  `kapasitas` varchar(15) NOT NULL,
  `jenis_mesin` varchar(15) NOT NULL,
  `line` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `no_mesin`, `kapasitas`, `jenis_mesin`, `line`) VALUES
(1, 'P99', '2450', 'Auto', 'Element'),
(2, 'P90', '2300', 'Auto', 'Element'),
(3, 'P91', '2200', 'Auto', 'Element');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(3) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nm_operator` varchar(45) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `bagian` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `nik`, `nm_operator`, `no_telp`, `bagian`) VALUES
(1, '2018050001', 'Abdulah', '08787777771', 'Produksi'),
(2, '2018050002', 'Arif Sarifudin', '08787777111', 'Finishing'),
(3, '2018050003', 'anam', '098888888888', 'Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id_plan` int(3) NOT NULL,
  `no_wco` varchar(15) NOT NULL,
  `no_dies` varchar(15) NOT NULL,
  `no_produk` varchar(12) NOT NULL,
  `qty` varchar(7) NOT NULL,
  `kapasitas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id_plan`, `no_wco`, `no_dies`, `no_produk`, `qty`, `kapasitas`) VALUES
(1, 'REQ-2018050001', '223344555555', 'F-10001', '2300', ''),
(2, 'REQ-2018050002', '223344555551', 'F-10002', '2200', ''),
(3, 'REQ-2018050003', '223344555552', 'F-10003', '2100', ''),
(4, 'REQ-2018050004', '223344555551', 'F-10004', '2300', '');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(3) NOT NULL,
  `no_wco` varchar(15) NOT NULL,
  `no_dies` varchar(15) NOT NULL,
  `no_produk` varchar(12) NOT NULL,
  `qty` varchar(7) NOT NULL,
  `id_mesin` int(3) NOT NULL,
  `id_operator` int(3) NOT NULL,
  `target` varchar(7) NOT NULL,
  `waktu` varchar(3) NOT NULL,
  `downtime` varchar(3) NOT NULL,
  `waktu_pakai` varchar(3) NOT NULL,
  `qty_hasil` varchar(4) NOT NULL,
  `efektifitas` varchar(5) NOT NULL,
  `efesiensi` varchar(5) NOT NULL,
  `tgl_produksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `no_wco`, `no_dies`, `no_produk`, `qty`, `id_mesin`, `id_operator`, `target`, `waktu`, `downtime`, `waktu_pakai`, `qty_hasil`, `efektifitas`, `efesiensi`, `tgl_produksi`) VALUES
(1, 'REQ-2018050001', '223344555555', 'F-10001', '2300', 1, 1, '2500', '220', '100', '120', '2400', '54.54', '96', '2018-05-20'),
(2, 'REQ-2018050002', '223344555551', 'F-10002', '2200', 2, 2, '2200', '500', '30', '470', '2200', '94', '100', '2018-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `reject`
--

CREATE TABLE `reject` (
  `id_reject` int(5) NOT NULL,
  `no_wco` varchar(15) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `jenis_reject` varchar(25) NOT NULL,
  `qty` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reject`
--

INSERT INTO `reject` (`id_reject`, `no_wco`, `tgl_produksi`, `jenis_reject`, `qty`) VALUES
(1, 'REQ-2018050001', '2018-05-08', 'Penyok', '10'),
(2, 'REQ-2018050001', '2018-05-10', 'Pecah', '12'),
(3, 'REQ-2018050001', '2018-05-10', 'Penyok', '20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `level` varchar(17) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `no_telp`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Staff Admin', '082111945719', 'admin'),
(2, 'staff', '21232f297a57a5a743894a0e4a801fc3', 'Staff Produksi', '08787777111', 'staff'),
(3, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'Kep Departemen', '08787111211', 'kepala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `reject`
--
ALTER TABLE `reject`
  ADD PRIMARY KEY (`id_reject`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id_mesin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id_plan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reject`
--
ALTER TABLE `reject`
  MODIFY `id_reject` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
