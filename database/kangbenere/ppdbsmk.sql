-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2024 at 06:22 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdbsmk`
--

-- --------------------------------------------------------

--
-- Table structure for table `asal_sekolah`
--

CREATE TABLE `asal_sekolah` (
  `npsn` int NOT NULL,
  `nisn` int NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nama_sekolah` varchar(250) NOT NULL,
  `alamat_sekolah` varchar(250) NOT NULL,
  `nama_kepsek` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `kode_jurusan` varchar(11) NOT NULL,
  `nisn` int NOT NULL,
  `nama_siswa` varchar(250) NOT NULL,
  `nama_jurusan` varchar(150) NOT NULL,
  `gambar_akta` varchar(255) NOT NULL,
  `gambar_kk` varchar(255) NOT NULL,
  `gambar_pasfoto` varchar(255) NOT NULL,
  `gambar_skl` varchar(225) NOT NULL,
  `gambar_ktpibu` varchar(255) NOT NULL,
  `gambar_ktpayah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(13) NOT NULL,
  `nisn` int NOT NULL,
  `nama_siswa` varchar(250) NOT NULL,
  `nama_jurusan` varchar(150) NOT NULL,
  `kouta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `nik` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(200) NOT NULL,
  `no_hp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `nisn` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L/P') NOT NULL,
  `alamat` text NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` enum('admin','guru','panitia','kepsek') COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `no_telepon`, `level`) VALUES
(14, 'Sofyan Swift', 'sof', '$2y$10$0Pv39PYwjnEQefRjM5A7v.di97rOufABLGO2JKwlCwTJJYus5a3g6', 'soft@gmail.com', '089656783452', 'admin'),
(15, 'kepsek', 'kep', '$2y$10$XyuZYVRV4MXGgcuo3sXZU.s0qAeuHfOJMQgPXaNgL72/CEUptpLXu', 'kepsek@gmail.com', '089656783452', 'guru'),
(16, 'yuyu', 'ayu', '$2y$10$GrhKBGk3w7n/zLjcHHuUPu4j5CgZVD7qm7XxCTg7fAQrVBozI9ThS', 'ay@gmail.com', '0878687', 'panitia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asal_sekolah`
--
ALTER TABLE `asal_sekolah`
  ADD PRIMARY KEY (`npsn`,`nisn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
