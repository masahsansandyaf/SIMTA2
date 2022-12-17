-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 02:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simtang`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` bigint(25) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `name`, `email`, `phone`, `address`) VALUES
(172028018201001, 'Ali', 'ali@g.com', '084762882911', 'jgdya'),
(172028018201002, 'asa', 'daad@ada.com', '12129931813', 'HFGHAKA');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` bigint(25) UNSIGNED NOT NULL,
  `name_MHS` varchar(255) NOT NULL,
  `email_MHS` varchar(100) NOT NULL,
  `phone_MHS` varchar(100) NOT NULL,
  `address_MHS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `name_MHS`, `email_MHS`, `phone_MHS`, `address_MHS`) VALUES
(220839101, 'Udin', 'udin@sch.id', '09829290112', 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(22, '2022-12-14-221158', 'App\\Database\\Migrations\\Dosen', 'default', 'App', 1671153915, 1),
(23, '2022-12-15-033736', 'App\\Database\\Migrations\\Mahasiswa', 'default', 'App', 1671153915, 1),
(24, '2022-12-16-041034', 'App\\Database\\Migrations\\TugasAkhir', 'default', 'App', 1671165519, 2),
(25, '2022-12-16-062554', 'App\\Database\\Migrations\\Revision', 'default', 'App', 1671172646, 3);

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE `revision` (
  `id_Revisi` bigint(25) UNSIGNED NOT NULL,
  `MHS_nrp` bigint(25) UNSIGNED NOT NULL,
  `dosen_nip` bigint(25) UNSIGNED NOT NULL,
  `TA_id` int(25) UNSIGNED NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Ket_revisi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugasakhir`
--

CREATE TABLE `tugasakhir` (
  `id_TA` int(25) UNSIGNED NOT NULL,
  `nrp_MHS` bigint(25) UNSIGNED NOT NULL,
  `nip_dosen` bigint(25) UNSIGNED NOT NULL,
  `Judul_TA` varchar(100) NOT NULL,
  `laboratorium` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id_Revisi`),
  ADD KEY `revision_MHS_nrp_foreign` (`MHS_nrp`),
  ADD KEY `revision_dosen_nip_foreign` (`dosen_nip`),
  ADD KEY `revision_TA_id_foreign` (`TA_id`);

--
-- Indexes for table `tugasakhir`
--
ALTER TABLE `tugasakhir`
  ADD PRIMARY KEY (`id_TA`),
  ADD KEY `tugasakhir_nrp_MHS_foreign` (`nrp_MHS`),
  ADD KEY `tugasakhir_nip_dosen_foreign` (`nip_dosen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `nip` bigint(25) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172028018201004;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `nrp` bigint(25) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220839102;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `revision`
--
ALTER TABLE `revision`
  MODIFY `id_Revisi` bigint(25) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugasakhir`
--
ALTER TABLE `tugasakhir`
  MODIFY `id_TA` int(25) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `revision_MHS_nrp_foreign` FOREIGN KEY (`MHS_nrp`) REFERENCES `mahasiswa` (`nrp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `revision_TA_id_foreign` FOREIGN KEY (`TA_id`) REFERENCES `tugasakhir` (`id_TA`) ON UPDATE CASCADE,
  ADD CONSTRAINT `revision_dosen_nip_foreign` FOREIGN KEY (`dosen_nip`) REFERENCES `dosen` (`nip`) ON UPDATE CASCADE;

--
-- Constraints for table `tugasakhir`
--
ALTER TABLE `tugasakhir`
  ADD CONSTRAINT `tugasakhir_nip_dosen_foreign` FOREIGN KEY (`nip_dosen`) REFERENCES `dosen` (`nip`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tugasakhir_nrp_MHS_foreign` FOREIGN KEY (`nrp_MHS`) REFERENCES `mahasiswa` (`nrp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
