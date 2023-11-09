-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2023 at 06:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penperel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int NOT NULL,
  `kata` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `kata`) VALUES
(2, '$2y$10$V4JbJTloWVB9Iwy52eJ3OuruC3adkN./jyatgJ3ZwU8h86lF8kf8m');

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `idpelajar` int NOT NULL,
  `warden` varchar(80) NOT NULL,
  `namapelajar` varchar(80) NOT NULL,
  `nokppelajar` varchar(12) NOT NULL,
  `kata` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`idpelajar`, `warden`, `namapelajar`, `nokppelajar`, `kata`) VALUES
(12, 'zubir', 'fahmie', '031014030211', '$2y$10$S9BNPuhwrzCxBrGXbC4Q7.efSnB086a4wOKXOFPV5yZRQNBdXYaoK');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `idperalatan` int NOT NULL,
  `pelajar` int NOT NULL,
  `jenisperalatan` varchar(80) NOT NULL,
  `jenama` varchar(80) NOT NULL,
  `nosiri` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`idperalatan`, `pelajar`, `jenisperalatan`, `jenama`, `nosiri`) VALUES
(27, 12, 'Bola  Tampar', 'Makisa', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `idwarden` int NOT NULL,
  `namawarden` varchar(80) NOT NULL,
  `nokpwarden` varchar(12) NOT NULL,
  `kata` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`idwarden`, `namawarden`, `nokpwarden`, `kata`) VALUES
(15, 'En.Zubir', '031014030212', '$2y$10$FFJavOf3.DrjNjLBRYdY1uYeNRagtdOc8Cpv8JosEo23bUwSQ84kC'),
(16, 'zubir', '872957823', '$2y$10$E7RDf3LSWnAwj5rY7YQr3.g88FEpjizdmCdJAUWxOY8vzM2qDTEbG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`idpelajar`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`idperalatan`),
  ADD UNIQUE KEY `nosiri` (`nosiri`),
  ADD KEY `pelajar` (`pelajar`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`idwarden`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `idpelajar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `idperalatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `warden`
--
ALTER TABLE `warden`
  MODIFY `idwarden` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
