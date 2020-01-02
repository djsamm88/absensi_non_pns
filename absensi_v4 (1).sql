-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2020 at 06:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_v4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `id` int(11) NOT NULL,
  `departemen` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`id`, `departemen`) VALUES
(10, 'DINAS PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK DAN PEMERINTAHAN DESA'),
(11, 'DINAS SOSIAL'),
(12, 'DINAS KOMUNIKASI DAN INFORMATIKA'),
(13, 'DINAS PARIWISATA'),
(14, 'DINAS KESEHATAN'),
(15, 'BADAN PENGELOLA KEUANGAN, PENDAPATAN DAN ASSET DAERAH'),
(16, 'BADAN PERENCANAAN PEMBANGUNAN DAERAH'),
(17, 'BADAN PENANGGULANGAN BENCANA DAERAH'),
(18, 'INSPEKTORAT'),
(19, 'BADAN KEPEGAWAIAN DAERAH'),
(20, 'SATUAN POLISI PAMONG PRAJA'),
(21, 'KECAMATAN SALAK'),
(22, 'KECAMATAN STTU JEHE'),
(23, 'KECAMATAN KERAJAAN'),
(24, 'KECAMATAN SIEMPAT RUBE'),
(25, 'KECAMATAN TINADA'),
(26, 'KECAMATAN STTU JULU'),
(27, 'KECAMATAN PERGETTENG GETTENG SENGKUT'),
(28, 'KECAMATAN PAGINDAR'),
(29, 'RUMAH SAKIT UMUM DAERAH'),
(81, 'SEKRETARIAT DAERAH'),
(82, 'SEKRETARIAT DPRD'),
(83, 'DINAS PENDIDIKAN'),
(84, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL'),
(85, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG'),
(86, 'DINAS PERTANIAN DAN KETAHANAN PANGAN'),
(87, 'DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN'),
(88, 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU'),
(89, 'DINAS KOPERASI, USAHA MIKRO, KECIL DAN MENENGAH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ijin`
--

CREATE TABLE `tbl_ijin` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `jabatan`) VALUES
(1, 'Programmer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lat` char(55) NOT NULL,
  `lng` char(55) NOT NULL,
  `image` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `id_pegawai`, `tgl_log`, `lat`, `lng`, `image`) VALUES
(1, 1, '2020-01-02 04:41:06', '1.0760616', '101.2254194', 'bukti_absensi/_202001021121.jpg'),
(2, 1, '2020-01-02 04:41:09', '1.0761036', '101.2254156', 'bukti_absensi/_202001021123.jpg'),
(3, 1, '2020-01-02 04:26:51', '1.0684689', '101.2249294', 'bukti_absensi/sam_202001021126.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `password` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id`, `nama`, `username`, `id_jabatan`, `id_departemen`, `password`) VALUES
(1, 'samuel', 'sam', 1, 12, 'gultom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ijin`
--
ALTER TABLE `tbl_ijin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tbl_ijin`
--
ALTER TABLE `tbl_ijin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
