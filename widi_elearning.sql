-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 07:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `widi_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `mahasiswa_ambil_kelas_id` int(11) NOT NULL,
  `absen` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `kelas_id`, `dosen_id`, `mahasiswa_ambil_kelas_id`, `absen`, `keterangan`, `tanggal`, `waktu`) VALUES
(1, 1, 1, 1, 'h', '', '2020-10-17', '11:38:52'),
(2, 1, 1, 2, 'i', 'Mau ke vanuatu selama 3 hari', '2020-10-17', '11:35:52'),
(3, 1, 1, 2, 'a', '', '2020-10-16', '07:39:18'),
(4, 1, 1, 1, 's', '', '2020-10-16', '07:39:33'),
(5, 1, 1, 2, 'h', '', '2020-10-15', '07:41:02'),
(6, 1, 1, 1, 'h', '', '2020-10-15', '07:41:03'),
(7, 1, 1, 2, 'h', '', '2020-10-14', '07:42:00'),
(8, 1, 1, 1, 'i', '', '2020-10-14', '07:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `gelar_depan` varchar(20) NOT NULL,
  `gelar_belakang` varchar(20) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `no_telepon` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nip`, `nama_lengkap`, `gelar_depan`, `gelar_belakang`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_ktp`, `no_telepon`, `no_hp`, `email`, `username`, `password`) VALUES
(1, '123456', '10', 'Budi Darno', 'H.', 'M.Sc', 'Malang', '2020-10-01', 'L', 'Islam', '350711204486323165', '021456793', '082456789314', 'budi@mail.com', '10', '10'),
(2, '654321', '11', 'Kartolo Ahmad', 'M.', 'P.hd', 'Malang', '2020-10-02', 'L', 'Islam', '350788546130002', '082131346577', '082131324685', 'KartolO@mail.com', '11', '11');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `program_studi_id` int(11) NOT NULL,
  `dosen_pengajar_id` int(11) NOT NULL,
  `mata_kuliah_id` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `waktu` time NOT NULL,
  `semester` int(11) NOT NULL,
  `status_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `program_studi_id`, `dosen_pengajar_id`, `mata_kuliah_id`, `hari`, `waktu`, `semester`, `status_kelas`) VALUES
(1, 'Basis Data 9 Pagi', 1, 1, 1, 'Senin', '10:00:00', 2, 'aktif'),
(2, 'Filsafat Sains', 2, 2, 2, 'Selasa', '08:00:00', 2, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(50) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `warga_negara` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `program_studi_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `warga_negara`, `telepon`, `no_hp`, `email`, `program_studi_id`, `username`, `password`) VALUES
('100', 'Adi Wijaya', 'Malang', '2020-10-01', 'L', 'Islam', 'Indonesia', '02152232555', '082225549782', 'Adi@mail.com', 1, '100', '100'),
('101', 'Jaka Anjayanto', 'Malang', '2020-10-14', 'L', 'Islam', 'Indonesia', '02148865654', '082222814547', 'Jaka@mail.com', 1, '101', '101'),
('201', 'Cahyo Aremania', 'Surabaya', '2020-07-14', 'L', 'Islam', 'Indonesia', '02152232555', '082132465798', 'badar.serpent@gmail.com', 2, '201', '201'),
('202', 'Xanana Injay', 'Barat Leste', '2020-07-01', 'L', 'Islam', 'Barat Leste', '0264646', '0865498746', 'xan@mail.com', 2, '202', '202');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(11) NOT NULL,
  `mata_kuliah` varchar(255) NOT NULL,
  `program_studi_id` int(11) NOT NULL,
  `rekomendasi_jumlah_sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `mata_kuliah`, `program_studi_id`, `rekomendasi_jumlah_sks`) VALUES
(1, 'Basis Data 9', 1, 3),
(2, 'Filsafat Sains', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id` int(11) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `gelar_akademik` varchar(20) NOT NULL,
  `sks_lulus` int(11) NOT NULL,
  `status_prodi` varchar(50) NOT NULL,
  `tanggal_berdiri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id`, `program_studi`, `gelar_akademik`, `sks_lulus`, `status_prodi`, `tanggal_berdiri`) VALUES
(1, 'Teknik Informatika', 'S.Sod', 808, 'aktif', '2020-10-16'),
(2, 'Filsafat', 'F.Faw', 8000, 'aktif', '2020-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `r_ambil_kelas`
--

CREATE TABLE `r_ambil_kelas` (
  `id` int(11) NOT NULL,
  `mahasiswa_nim` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `status_persetujuan` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_ambil_kelas`
--

INSERT INTO `r_ambil_kelas` (`id`, `mahasiswa_nim`, `kelas_id`, `tanggal_ambil`, `status_persetujuan`, `catatan`) VALUES
(1, 101, 1, '2020-05-06', 'diterima', NULL),
(2, 100, 1, '2020-04-15', 'diterima', NULL),
(3, 201, 2, '2020-05-12', 'diterima', NULL),
(4, 202, 2, '2020-05-06', 'diterima', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_ambil_kelas`
--
ALTER TABLE `r_ambil_kelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_ambil_kelas`
--
ALTER TABLE `r_ambil_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
