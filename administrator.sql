-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 03:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administrator`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_user`, `username`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin1', 'admin satu', 'admin1@gmail.com', '12345', 'admin'),
(2, 'Yuli', 'Sukma Tri Yuliasari', '', 'koordinator123', 'koordinator'),
(3, 'junanto', 'Junanto', 'junanto@gmail.com', 'junanto_teknisi123', 'teknisi'),
(4, 'herawati', 'Herawati', 'herawati@gmail.com', 'herawati_teknisi123', 'teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id` int(10) NOT NULL,
  `alat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id`, `alat`) VALUES
(1, 'Runway 13'),
(2, 'Runway 31'),
(3, 'Runway 21'),
(4, 'Runway 03'),
(5, 'Middle Runway 13-31'),
(6, 'Middle Runway 03-21'),
(7, 'Client AWOS OBS'),
(8, 'Client AWOS FCT'),
(9, 'Client AWOS ATC'),
(10, 'Client AWOS AOCC'),
(11, 'Peralatan Observasi Konvensional'),
(12, 'Peralatan AWS-Digitalisasi'),
(13, 'AEROMET WEB (Pengganti WEDIS)'),
(14, 'SYNERGIE Primary'),
(15, 'Peralatan Aerologi'),
(16, 'WODS Runway 13'),
(17, 'WODS Runway 31 & 21'),
(18, 'WODS Runway 03'),
(19, 'WODS Client Observer/ FCT'),
(20, 'Internet MATSC'),
(21, 'Internet Aero'),
(22, 'Internet Staff'),
(23, 'CMSS Aero'),
(24, 'CMSS MATSC');

-- --------------------------------------------------------

--
-- Table structure for table `bmkg`
--

CREATE TABLE `bmkg` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `nama_pelapor` varchar(100) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `deskripsi_kerusakan` text NOT NULL,
  `gambar_alat` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `email`, `pesan`) VALUES
(1, '', 'farhanrahman0601@gmail.com', ''),
(2, 'Luffy', 'luffymugiwara@gmail.com', 'what a good feature!');

-- --------------------------------------------------------

--
-- Table structure for table `pelapor1`
--

CREATE TABLE `pelapor1` (
  `id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pelapor` varchar(100) NOT NULL,
  `nama_teknisi` varchar(1000) NOT NULL,
  `alat` varchar(100) NOT NULL,
  `deskripsi_kerusakan` varchar(300) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelapor1`
--

INSERT INTO `pelapor1` (`id`, `tanggal`, `nama_pelapor`, `nama_teknisi`, `alat`, `deskripsi_kerusakan`, `foto`, `status`, `action`) VALUES
(26, '2024-01-09', 'coba', 'Herawati', 'Client AWOS AOCC', 'Terdapat Kabel Yang Putus', '65b7ce4d851bf.jpeg', 'Sedang Diproses', ''),
(27, '2024-01-31', 'coba', '', 'Client AWOS OBS', 'aduh', '65b9accfb986f.png', 'Laporan Terkirim', ''),
(28, '2024-02-01', 'Frinst Yehezkiel', 'Herawati', 'Runway 31', 'abcd', '65baffc5d4895.png', 'Sedang Diproses', ''),
(29, '2024-02-01', 'Frinst Yehezkiel', 'Herawati', 'Peralatan Aerologi', 'zxcvbnm', '65bafff60a951.png', 'Sedang Diproses', ''),
(30, '2024-02-01', 'Frinst Yehezkiel', '', 'Landasan pacu 13', 'ujnbh', '65bb0017898b8.jpg', 'Laporan Terkirim', ''),
(31, '2024-02-01', 'Frinst Yehezkiel', 'Herawati', 'Internet MATSC', 'Tidak ada koneksi', '65bb02544c008.jpg', 'Selesai', ''),
(32, '0000-00-00', 'Frinst Yehezkiel', '', 'Peralatan Observasi Konvensional', '1. pc off', '', 'Laporan Terkirim', ''),
(33, '0000-00-00', 'Frinst Yehezkiel', '', 'Peralatan Observasi Konvensional', '1. pc off', '', 'Laporan Terkirim', ''),
(34, '0000-00-00', 'Kepala Stasiun Meteorologi', '', '', 'aaaaaaaaaaa', '', 'Laporan Terkirim', ''),
(35, '2024-02-03', 'Aerologi BMKG', '', '                                            Peralatan Aerologi                                      ', 'Peralatan rason hangus', '65bde907999a1.jpeg', 'Laporan Terkirim', ''),
(36, '2024-02-15', 'Aerologi BMKG', 'Herawati', '                                            Landasan pacu 13                                        ', 'aaa', '65bdf2737418d.jpeg', 'Sedang Diproses', ''),
(37, '2024-02-03', 'Aerologi BMKG', '', '', 'asasas', '65bdf4c3b06ad.jpeg', 'Laporan Terkirim', ''),
(38, '2024-02-03', 'coba', '', '                                            Peralatan Aerologi                                      ', 'rusak', '65be44cbcb28e.jpeg', 'Laporan Terkirim', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`) VALUES
(2, '', '', '', ''),
(3, '', '', '', ''),
(4, '', '', '', ''),
(5, 'farhan rahman', 'farhan1', 'farhanrahman0601@gmail.com', 'farhan123'),
(6, '', '', '', ''),
(7, '', '', '', ''),
(8, '', '', '', ''),
(9, '', 'jamesjames', 'james@gmail.com', 'james123'),
(10, 'bryan', 'bryan77', 'bryan@gmail.com', 'bryan123'),
(11, 'Erlich Bachman', 'erlich_bachman', 'bachmanity@gmail.com', 'bachman123'),
(12, 'coba', 'coba2', 'cobain@gmail.com', 'coba123'),
(13, 'Frinst Yehezkiel', 'frinst21', 'frinst', '12345'),
(14, 'Forecaster MASTC', 'forecaster', 'forecaster@bmkg.hasanuddin', 'forecaster_bmkg'),
(15, 'Observasi BMKG', 'observasi', 'obeservasi@bmkg.hasanuddin', 'observasi_bmkg'),
(16, 'Aerologi BMKG', 'aerologi', 'aerologi@bmkg.hasanuddin', 'aero_bmkg'),
(17, 'Admin Tata Usaha', 'admin', 'admintu@bmkg.hasanuddin', 'admin_bmkg'),
(18, 'PPK', 'ppk', 'ppk@bmkg.hasanuddin', 'ppk_bmkg'),
(19, 'Ruang Data dan Informasi', 'datin', 'datin@bmkg.hasanuddin', 'datin_bmkg'),
(20, 'KTU', 'ktu', 'ktu@bmkg.hasanuddin', 'ktu_bmkg'),
(21, 'Kepala Stasiun Meteorologi', 'kasmet', 'kasmet@bmkg.hasanuddin', 'kasmet_bmkg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bmkg`
--
ALTER TABLE `bmkg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelapor1`
--
ALTER TABLE `pelapor1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bmkg`
--
ALTER TABLE `bmkg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelapor1`
--
ALTER TABLE `pelapor1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
