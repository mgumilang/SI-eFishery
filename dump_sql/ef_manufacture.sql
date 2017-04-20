-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2017 at 03:01 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ef_manufacture`
--

-- --------------------------------------------------------

--
-- Table structure for table `Barang`
--

CREATE TABLE `Barang` (
  `ID` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Nama` varchar(511) NOT NULL,
  `Tanggal_Masuk` date NOT NULL,
  `R_diperiksa_Hasil` text NOT NULL,
  `R_diperiksa_Tanggal` date NOT NULL,
  `R_diperiksa_Data_QC` varchar(511) NOT NULL,
  `R_diperiksa_Keterangan` text NOT NULL,
  `E_Pegawai_ID` int(11) NOT NULL,
  `E_Pengambilan_ID` int(11) NOT NULL,
  `E_Jenis_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Barang`
--

INSERT INTO `Barang` (`ID`, `Status`, `Nama`, `Tanggal_Masuk`, `R_diperiksa_Hasil`, `R_diperiksa_Tanggal`, `R_diperiksa_Data_QC`, `R_diperiksa_Keterangan`, `E_Pegawai_ID`, `E_Pengambilan_ID`, `E_Jenis_ID`) VALUES
(2, 'Lulus', 'John Smith', '2017-04-08', 'Lorem ipsum dolor sit amet consectetur adipiscing', '2017-04-08', 'contoh.jpg', 'Bla bla bla', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Jenis`
--

CREATE TABLE `Jenis` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(511) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Pegawai`
--

CREATE TABLE `Pegawai` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(511) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Pengambilan`
--

CREATE TABLE `Pengambilan` (
  `ID` int(11) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `E_Pegawai_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Barang`
--
ALTER TABLE `Barang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Jenis`
--
ALTER TABLE `Jenis`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Pegawai`
--
ALTER TABLE `Pegawai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Pengambilan`
--
ALTER TABLE `Pengambilan`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Barang`
--
ALTER TABLE `Barang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Pegawai`
--
ALTER TABLE `Pegawai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Pengambilan`
--
ALTER TABLE `Pengambilan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
