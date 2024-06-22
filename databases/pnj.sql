-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 04:02 AM
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
-- Database: `pnj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` bigint(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `no_telepon`, `email`) VALUES
('akhtarerror', '$2y$10$FCbsPeBpZ.SVbgPNVaWyoO4Qm8M1rxRdF6hPCpXCJTa1A.XvwlUMi', 'Akhtar Faizi Putra', 88212378975, 'akhtarerror@gmail.com'),
('jamal4321', '$2y$10$1Dx.0Ray1GaV6t2zzzrwsORpowY.biNnzm7iqrG.QGTCdu9.MMU/u', 'jamal', 819728787, 'jamal@gmail.com'),
('udin123', '$2y$10$xhqvQBfVy3k/.ZMqosEx/uKRgksR2XFlweL79xMoBojz1a3165ct2', 'udin', 8882771, 'udin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `Nama` varchar(100) NOT NULL,
  `NRP` bigint(25) NOT NULL,
  `No_Telepon` bigint(25) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`Nama`, `NRP`, `No_Telepon`, `Email`) VALUES
('Bu Mera', 2777817821, 82761767368, 'mera@gmail.com'),
('Pak Mauldy', 29019089892, 902898281, 'mauldy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nama` varchar(40) NOT NULL,
  `NIM` bigint(13) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nama`, `NIM`, `Email`, `Jurusan`) VALUES
('Akhtar Faizi', 2207411002, 'akhtar@gmail.com', 'TIK'),
('Novani Wulansari', 2330403044, 'vani@gmail.com', 'Akutansi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NRP`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
