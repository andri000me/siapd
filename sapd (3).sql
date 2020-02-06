-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 08:11 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sapd`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `kode_desa` varchar(128) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `nama_desa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `kode_desa`, `id_kab`, `id_kec`, `nama_desa`) VALUES
(11, '20000', 6, 5, 'kupah'),
(13, '008', 6, 5, 'kari'),
(16, '10', 3, 1, 'pulau palas');

--
-- Triggers `desa`
--
DELIMITER $$
CREATE TRIGGER `USER_INSERT` AFTER INSERT ON `desa` FOR EACH ROW INSERT INTO user SET username=NEW.kode_desa, password=NEW.nama_desa, role_id='2', id_kab=NEW.id_kab, id_desa=NEW.id_desa, id_kec=NEW.id_kec
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `history_aparatur`
--

CREATE TABLE `history_aparatur` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `pendidikan` varchar(128) NOT NULL,
  `tgl_pelantikan` date NOT NULL,
  `akhir_jabatan` date NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(128) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_aparatur`
--

INSERT INTO `history_aparatur` (`id`, `jabatan`, `nip`, `nama`, `pendidikan`, `tgl_pelantikan`, `akhir_jabatan`, `tempat_lahir`, `tgl_lahir`, `jk`, `id_desa`, `id_kel`) VALUES
(1, 'Kepala Desa', '19961021008001', 'rio arnopalindo st mt', 'S2', '1998-10-10', '1992-10-10', 'pekanbaru', '1998-01-10', 'L', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kab` int(11) NOT NULL,
  `kode_kab` varchar(128) NOT NULL,
  `nama_kab` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `kode_kab`, `nama_kab`) VALUES
(3, '006', 'KAB.INDRAGIRI HILIR'),
(4, '001', 'KAB.INDRAGIRI HULU'),
(5, '005', 'KAB.ROKAN HULU'),
(6, '002', 'KAB.KUANTAN SINGINGI'),
(7, '003', 'KOTA DUMAI'),
(8, '004', 'KAB.ROKAN HILIR'),
(9, '007', 'KOTA PEKANBARU'),
(10, '008', 'KAB.SIAK'),
(11, '009', 'KAB.KAMPAR'),
(12, '010', 'KAB.KEPULAUAN MERANTI'),
(13, '011', 'KAB.BENGKALIS'),
(14, '012', 'KAB.PELALAWAN');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `kode_kec` varchar(128) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `nama_kec` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kel` int(11) NOT NULL,
  `kode_kelurahan` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `nama_kelurahan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kel`, `kode_kelurahan`, `id_kab`, `id_kec`, `nama_kelurahan`) VALUES
(8, 0, 3, 1, 'tembilahan kota'),
(9, 1, 3, 1, 'sungai beringin'),
(10, 101, 6, 5, 'taluk');

--
-- Triggers `kelurahan`
--
DELIMITER $$
CREATE TRIGGER `insert` AFTER INSERT ON `kelurahan` FOR EACH ROW INSERT INTO user SET username=NEW.kode_kelurahan, password=NEW.nama_kelurahan, role_id='3', id_kab=NEW.id_kab, id_desa=NEW.id_kel, id_kec=NEW.id_kec
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_desa`
--

CREATE TABLE `perangkat_desa` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `pendidikan` varchar(128) NOT NULL,
  `tanggal_pelantikan` date NOT NULL,
  `masa_akhir_jabatan` date NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perangkat_desa`
--

INSERT INTO `perangkat_desa` (`id`, `jabatan`, `nip`, `nama`, `pendidikan`, `tanggal_pelantikan`, `masa_akhir_jabatan`, `tempat_lahir`, `tanggal_lahir`, `jk`, `no_hp`, `id_kab`, `id_kec`, `id_desa`, `id_kel`) VALUES
(17, 'Kepala Desa', '1997654321001', 'rio arnopalindo st mt', 'S2', '2019-10-10', '2023-10-10', 'kari', '1997-10-10', 'L', '0909090909', 6, 5, 13, 0),
(18, 'Sekretaris Desa', '909009012121', 'arnopalindo', 'S1', '2019-10-10', '2030-10-10', 'kari', '1992-10-10', 'P', '09090909021', 6, 5, 13, 0),
(21, 'Lurah', '90909090909', 'ridho darmawan st mt', 'S2', '2019-10-10', '2019-10-10', 'tembilahan', '1996-10-10', 'L', '02930293029', 6, 5, 0, 5),
(22, 'Lurah', '991919199191', 'ridho darmawan st mt', 'S2', '2019-10-10', '2021-10-10', 'tembilahan', '1996-10-10', 'L', '090923029302', 3, 1, 0, 8),
(23, 'Kepala Desa', '90101092', 'steve jobs', 'S2', '1997-10-10', '2070-10-19', 'amerika', '1992-10-10', 'L', '09090', 3, 1, 16, 0),
(24, 'Lurah', '909090909', 'rio arnopalindo st mt', 'S2', '2012-10-10', '2020-10-10', 'uiuiuiuiu', '1998-10-10', 'L', '0909090', 3, 1, 0, 9);

--
-- Triggers `perangkat_desa`
--
DELIMITER $$
CREATE TRIGGER `add_histori_aparatur` AFTER DELETE ON `perangkat_desa` FOR EACH ROW INSERT INTO history_aparatur SET jabatan=OLD.jabatan, nip=OLD.nip, nama=OLD.nama, pendidikan=OLD.pendidikan, tgl_pelantikan=OLD.tanggal_pelantikan, akhir_jabatan=OLD.masa_akhir_jabatan,tempat_lahir=OLD.tempat_lahir, tgl_lahir=OLD.tanggal_lahir, jk=OLD.jk, id_desa=OLD.id_desa
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `perihal` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(256) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `tanggal` datetime NOT NULL,
  `balas` text NOT NULL,
  `tanggal_balas` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `perihal`, `isi`, `file`, `id_desa`, `id_kec`, `id_kab`, `status`, `tanggal`, `balas`, `tanggal_balas`) VALUES
(3, 'undangan', 'undangan bla bla', 'default.jpg', 11, 5, 6, '1', '2019-04-11 08:00:00', 'jdhjfadf', '2019-07-29 23:37:33'),
(4, 'afhh', 'ydabb', '11.jpg', 11, 5, 6, '1', '2019-04-10 07:53:00', 'thank you', '2019-04-10 23:02:23'),
(8, 'ridho', 'rihdo', 'default.jpg', 11, 5, 6, '1', '2019-04-10 20:01:13', 'thank you', '2019-04-10 23:06:35'),
(9, 'q', 'q', 'default.jpg', 11, 5, 6, '1', '2019-04-11 01:02:58', 'terima kasihkasih', '2019-04-11 04:07:39'),
(10, 'jjjj', 'undangan', 'default.jpg', 13, 5, 6, '1', '2019-04-15 11:09:26', 'oke', '2019-04-15 11:09:56'),
(11, 'UNDANGAN', 'PENTING', 'default.jpg', 13, 5, 6, '1', '2019-04-15 11:38:13', '', NULL),
(12, 'isi', 'isi', '13.jpg', 13, 5, 6, '1', '2019-04-15 11:40:09', '', NULL),
(13, 'jjjj', 'undangan kades', 'default.jpg', 14, 5, 6, '1', '2019-05-10 01:36:28', 'yes', '2019-05-10 01:56:43'),
(14, 'UNDANGAN', 'assalamualaikum', 'default.jpg', 5, 5, 6, '1', '2019-05-11 21:49:39', 'walaikumsalam', '2019-05-11 22:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `role_id` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `username`, `id_desa`, `id_kec`, `id_kab`, `role_id`) VALUES
(1, 'admin', 'admin', 0, 0, 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `history_aparatur`
--
ALTER TABLE `history_aparatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`),
  ADD UNIQUE KEY `kode_kab` (`kode_kab`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`),
  ADD UNIQUE KEY `kode_kec` (`kode_kec`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indexes for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
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
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `history_aparatur`
--
ALTER TABLE `history_aparatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
