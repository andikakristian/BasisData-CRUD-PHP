-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2023 at 10:48 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataMahasiswa`
--

CREATE TABLE `dataMahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `programStudi` varchar(25) NOT NULL,
  `masuk` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `smt` int(2) NOT NULL,
  `sks` int(3) NOT NULL,
  `ipk` double(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataMahasiswa`
--

INSERT INTO `dataMahasiswa` (`id`, `nim`, `nama`, `jenjang`, `programStudi`, `masuk`, `status`, `smt`, `sks`, `ipk`) VALUES
(3, '2839883', 'Kristian', 'Strata-1', 'Arsitektur', '2021', 'Aktiv', 6, 104, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataMahasiswa`
--
ALTER TABLE `dataMahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataMahasiswa`
--
ALTER TABLE `dataMahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
