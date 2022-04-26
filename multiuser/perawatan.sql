-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 03:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perawatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id` int(11) NOT NULL,
  `aktivitas` varchar(191) NOT NULL,
  `operator` varchar(191) NOT NULL,
  `kode_alat` int(11) NOT NULL,
  `id_sup` int(11) NOT NULL,
  `id_ppr` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hasil` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id`, `aktivitas`, `operator`, `kode_alat`, `id_sup`, `id_ppr`, `tanggal`, `hasil`) VALUES
(12, 'pengoperasian', 'wtwgfgr', 2, 3, 4, '2018-03-01', 'ffhjhfgh'),
(13, 'perawatan', 'thrthr', 3, 1, 4, '2018-03-07', 'ghsgfd'),
(14, 'pengoperasian', 'hrehtr', 1, 1, 5, '2018-03-03', 'ghrfh'),
(16, 'pengoperasian', 'hgudsfig', 2, 4, 5, '2018-03-05', 'gfjfdghgf'),
(17, 'pengoperasian', 'fggreew', 4, 4, 4, '2018-03-04', 'fefgwer'),
(20, 'perawatan', 'sabil', 3, 1, 4, '2018-03-08', 'dnung9id'),
(21, 'perawatan', 'nfubisd', 3, 1, 4, '2018-03-09', 'jnifgd'),
(22, 'perawatan', 'hbud', 2, 1, 6, '2018-03-10', 'hbu'),
(23, 'pengoperasian', 'ugi', 2, 1, 4, '2018-03-11', 'nbiu'),
(24, 'pengoperasian', 'ugi', 2, 1, 4, '2018-03-11', 'nbiu'),
(25, 'perawatan', 'yf', 1, 1, 6, '2018-03-06', 'cvuk'),
(27, 'perawatan', 'fu', 1, 1, 4, '2018-03-12', 'uii');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alat`
--

CREATE TABLE `tb_alat` (
  `kode_alat` int(11) NOT NULL,
  `nama_alat` varchar(191) NOT NULL,
  `ruang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alat`
--

INSERT INTO `tb_alat` (`kode_alat`, `nama_alat`, `ruang_id`, `user_id`) VALUES
(1, 'komputer', 1, 1001),
(2, 'mouse', 1, 1003),
(3, 'lemari', 3, 1003),
(4, 'fas bunga', 3, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppr`
--

CREATE TABLE `tb_ppr` (
  `id` int(11) NOT NULL,
  `nama_ppr` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ppr`
--

INSERT INTO `tb_ppr` (`id`, `nama_ppr`) VALUES
(4, 'ppr 5'),
(5, 'ppr 2'),
(6, 'ppr 3'),
(7, 'dsvdh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id` int(11) NOT NULL,
  `nomor_ruang` varchar(200) NOT NULL,
  `nama_ruang` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id`, `nomor_ruang`, `nama_ruang`) VALUES
(1, '', 'laboratorium'),
(2, '', 'kelas'),
(3, '', 'rumah'),
(4, '', 'lapangan'),
(6, 'hr.34', 'masjid'),
(7, 'hr.55', 'musholah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sup`
--

CREATE TABLE `tb_sup` (
  `id` int(11) NOT NULL,
  `nama_sup` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sup`
--

INSERT INTO `tb_sup` (`id`, `nama_sup`) VALUES
(1, 'sup 1'),
(3, 'sup 2'),
(4, 'sup 3'),
(5, 'sup 4'),
(6, 'sup 8');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nip` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nip`, `username`, `password`, `role_id`) VALUES
(1001, 'User 1', '123123', 2),
(1003, 'admin', '12345', 1),
(1004, 'abing', 'bing', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sup` (`id_sup`),
  ADD KEY `id_ppr` (`id_ppr`),
  ADD KEY `kode_alat` (`kode_alat`);

--
-- Indexes for table `tb_alat`
--
ALTER TABLE `tb_alat`
  ADD PRIMARY KEY (`kode_alat`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `runag_id` (`ruang_id`);

--
-- Indexes for table `tb_ppr`
--
ALTER TABLE `tb_ppr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sup`
--
ALTER TABLE `tb_sup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_alat`
--
ALTER TABLE `tb_alat`
  MODIFY `kode_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_ppr`
--
ALTER TABLE `tb_ppr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_sup`
--
ALTER TABLE `tb_sup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD CONSTRAINT `tb_aktivitas_ibfk_1` FOREIGN KEY (`id_ppr`) REFERENCES `tb_ppr` (`id`),
  ADD CONSTRAINT `tb_aktivitas_ibfk_2` FOREIGN KEY (`id_sup`) REFERENCES `tb_sup` (`id`),
  ADD CONSTRAINT `tb_aktivitas_ibfk_3` FOREIGN KEY (`kode_alat`) REFERENCES `tb_alat` (`kode_alat`);

--
-- Constraints for table `tb_alat`
--
ALTER TABLE `tb_alat`
  ADD CONSTRAINT `tb_alat_ibfk_1` FOREIGN KEY (`ruang_id`) REFERENCES `tb_ruang` (`id`),
  ADD CONSTRAINT `tb_alat_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`nip`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
