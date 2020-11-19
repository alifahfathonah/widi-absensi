-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 03:37 PM
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
(1, 2, 2, 54, 'h', '', '2020-11-19', '21:05:45'),
(2, 2, 2, 77, 'i', '', '2020-11-19', '21:05:46'),
(3, 2, 2, 66, 's', '', '2020-11-19', '21:05:47'),
(4, 2, 2, 40, 'h', '', '2020-11-19', '21:05:48'),
(5, 2, 2, 51, 'h', '', '2020-11-19', '21:05:48'),
(6, 2, 2, 60, 'h', '', '2020-11-19', '21:05:50'),
(7, 2, 2, 63, 'h', '', '2020-11-19', '21:05:52'),
(8, 2, 2, 52, 'h', '', '2020-11-19', '21:05:53'),
(9, 2, 2, 47, 'h', '', '2020-11-19', '21:05:54'),
(10, 2, 2, 65, 'i', '', '2020-11-19', '21:05:55'),
(11, 2, 2, 42, 'h', '', '2020-11-19', '21:05:57'),
(12, 2, 2, 62, 'h', '', '2020-11-19', '21:06:00'),
(13, 2, 2, 53, 's', '', '2020-11-19', '21:06:01'),
(14, 2, 2, 48, 'a', '', '2020-11-19', '21:06:02'),
(15, 2, 2, 59, 'i', '', '2020-11-19', '21:06:03'),
(16, 2, 2, 55, 's', '', '2020-11-19', '21:06:04'),
(17, 2, 2, 75, 'i', '', '2020-11-19', '21:06:06'),
(18, 2, 2, 64, 'i', '', '2020-11-19', '21:06:06'),
(19, 2, 2, 43, 's', '', '2020-11-19', '21:06:07'),
(20, 2, 2, 46, 'h', '', '2020-11-19', '21:06:09'),
(21, 2, 2, 56, 'i', '', '2020-11-19', '21:06:10'),
(22, 2, 2, 70, 'a', '', '2020-11-19', '21:06:10'),
(23, 2, 2, 68, 'i', '', '2020-11-19', '21:06:12'),
(24, 2, 2, 71, 'h', '', '2020-11-19', '21:06:13'),
(25, 2, 2, 74, 'h', '', '2020-11-19', '21:06:14'),
(26, 2, 2, 45, 'h', '', '2020-11-19', '21:06:15'),
(27, 2, 2, 50, 'h', '', '2020-11-19', '21:06:16'),
(28, 2, 2, 61, 'h', '', '2020-11-19', '21:06:16'),
(29, 2, 2, 73, 'h', '', '2020-11-19', '21:06:17'),
(30, 2, 2, 76, 'h', '', '2020-11-19', '21:06:19'),
(31, 2, 2, 78, 'h', '', '2020-11-19', '21:06:19'),
(32, 2, 2, 58, 'h', '', '2020-11-19', '21:06:21'),
(33, 2, 2, 57, 'h', '', '2020-11-19', '21:06:22'),
(34, 2, 2, 44, 'h', '', '2020-11-19', '21:06:23'),
(35, 2, 2, 72, 'h', '', '2020-11-19', '21:06:25'),
(36, 11, 2, 415, 'h', '', '2020-11-19', '21:08:11'),
(37, 11, 2, 402, 'i', '', '2020-11-19', '21:08:12'),
(38, 11, 2, 391, 'h', '', '2020-11-19', '21:08:13'),
(39, 11, 2, 411, 'h', '', '2020-11-19', '21:08:14'),
(40, 11, 2, 403, 'h', '', '2020-11-19', '21:08:15'),
(41, 11, 2, 410, 'h', '', '2020-11-19', '21:08:17'),
(42, 1, 1, 440, 'h', '', '2020-11-19', '21:20:41'),
(43, 1, 1, 441, 'h', '', '2020-11-19', '21:20:43'),
(44, 1, 1, 15, 'h', '', '2020-11-19', '21:20:43'),
(45, 1, 1, 38, 'h', '', '2020-11-19', '21:20:44'),
(46, 1, 1, 427, 'i', '', '2020-11-19', '21:20:45'),
(47, 1, 1, 27, 's', '', '2020-11-19', '21:20:46'),
(48, 1, 1, 1, 'i', '', '2020-11-19', '21:20:47'),
(49, 1, 1, 416, 's', '', '2020-11-19', '21:20:48'),
(50, 1, 1, 436, 'h', '', '2020-11-19', '21:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `blokir` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `blokir`, `keterangan`) VALUES
('admin', 'admin', 'Muhammad Admin', 'L', '1999-07-28', 0, '');

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
(1, '11', '1234', 'Sovia Rosalin', 'Mrs.', 'H. Mm.', 'Malang', '1999-07-28', '', 'Islam', '350710554321685', '0821321321', '08013216354', 'badar.serpent@gmail.com', 'sovia', 'sovia'),
(2, '3128123128', '3128212', 'Wildanie', 'Mr.', 'B.Rr.', 'Malang', '1999-07-28', '', 'Islam', '350710554321685', '981212412419u', '08013216354', 'badar.serpent@gmail.com', 'wildanie', 'qweqweqwe'),
(3, '', '', 'Dwiatmanto, Dr', '', '', '', '0000-00-00', '', '', '', '', '', '', '', ''),
(4, '', '', 'Rizki Himawan', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '');

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
  `hari` varchar(50) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `status_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `program_studi_id`, `dosen_pengajar_id`, `mata_kuliah_id`, `hari`, `waktu`, `semester`, `status_kelas`) VALUES
(1, 'Kewirausaahan SEMESTER GANJIL TA 2020/2021', 1, 1, 1, NULL, NULL, NULL, 'aktif'),
(2, 'Manajemen Sumber Daya Manusia SEMESTER GANJIL TA 2020/2021', 1, 1, 2, NULL, NULL, NULL, 'aktif'),
(3, 'Bahasa Mandarin SEMESTER GANJIL TA 2020/2021', 1, 1, 3, NULL, NULL, NULL, 'aktif'),
(4, 'Public Speaking SEMESTER GANJIL TA 2020/2021', 1, 1, 4, NULL, NULL, NULL, 'aktif'),
(5, 'Administrasi Ekspor dan Impor SEMESTER GANJIL TA 2020/2021', 1, 1, 5, NULL, NULL, NULL, 'aktif'),
(6, 'Integrated Marketing Communicat SEMESTER GANJIL TA 2020/2021', 1, 1, 6, NULL, NULL, NULL, 'aktif'),
(7, 'Manajemen Perjalanan Bisnis SEMESTER GANJIL TA 2020/2021', 1, 1, 7, NULL, NULL, NULL, 'aktif'),
(8, 'Administrasi Logistik SEMESTER GANJIL TA 2020/2021', 1, 1, 8, NULL, NULL, NULL, 'aktif'),
(9, 'Humas dan Keprotokolan SEMESTER GANJIL TA 2020/2021', 1, 1, 9, NULL, NULL, NULL, 'aktif'),
(10, 'Keselamatan Kerja Perkantoran SEMESTER GANJIL TA 2020/2021', 1, 1, 10, NULL, NULL, NULL, 'aktif'),
(11, 'Filsafat Alam SEMESTER GANJIL TA 2020/2021', 2, 2, 11, NULL, NULL, NULL, 'aktif'),
(12, 'Teknik Gambar 3D SEMESTER GANJIL TA 2020/2021', 2, 2, 12, NULL, NULL, NULL, 'aktif'),
(13, 'Antariksa Lanjutan SEMESTER GANJIL TA 2020/2021', 2, 4, 13, NULL, NULL, NULL, 'aktif');

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
('193114134131019', 'Zumrotul Fahmia', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193117151347021', 'Putri Ayu', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140511353016', 'Ika Rahayu', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140511515028', 'Ahmad Cahyo Aremania', '', '0000-00-00', 'L', '', '', '', '', '', 2, '', ''),
('193140512411015', 'Desi Rahmawati Indah', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140513223426', 'Nadhifatun Nurur Rohmah', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140514111001', 'Ananda Tria Budi Pertiwi', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111002', 'Yoga Aditya Putra', '', '0000-00-00', 'L', '', '', '', '', '', 1, '', ''),
('193140514111003', 'Cindy Dwi Antika', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111004', 'Karlina Dwi Nur Ramadhani', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111005', 'Tasya Dewi Asmarani Sanjaya', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111006', 'Muhamad Muchlis', '', '0000-00-00', 'L', '', '', '', '', '', 1, '', ''),
('193140514111007', 'Kennya Erdyana', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111008', 'Bernadheta Krisjayanti', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111009', 'Eka Febriyanti Susiloningsih', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111010', 'Veronica Michelle Aprilia Wardana', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111011', 'Muhammad Fahrizal', '', '0000-00-00', 'L', '', '', '', '', '', 1, '', ''),
('193140514111012', 'Anisa Dwi Ramadhani', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111014', 'Berliana Pratiwi', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111015', 'Devina Pratisara', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111016', 'Aida Cholifatul Ramadhania', 'Malang', '1999-08-28', 'P', 'Islam', 'Indonesia', '082132143532', '08013216354', 'Aida@mail.com', 1, 'aida', 'aida'),
('193140514111018', 'Irsalina Dian Ardiani', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111019', 'Lailatus Sa\'adah', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111020', 'Shella Safira', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111021', 'Tabita Triean Desita Putri', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111022', 'Fadilla Ayu Indicka', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111023', 'Anjeli Permata Sandri', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111024', 'Nabila Addina Putri Muslim', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111025', 'Destyana Khowatimi', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111026', 'Annisa Putri Wulandari', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111027', 'Jihan Adinda Exsanti', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111028', 'Cahyo Prayogo', '', '0000-00-00', 'L', '', '', '', '', '', 1, '', ''),
('193140514111029', 'Amara Amalia Haq', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111030', 'Zuyyina Yasmin', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111031', 'Moch.ricky Erbachtiar', '', '0000-00-00', 'L', '', '', '', '', '', 1, '', ''),
('193140514111032', 'Widya Tri Lestari', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111034', 'Mara Risqina Nur\'arti', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111035', 'Mochamad Hanif Pratama', '', '0000-00-00', 'L', '', '', '', '', '', 1, '', ''),
('193140514111036', 'Tionita Briliana', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111039', 'Novita Ervianti', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111040', 'Mohammad Prasetya Agus Gumelar', '', '0000-00-00', 'L', '', '', '', '', '', 1, '', ''),
('193140514111041', 'Isna Fairuz', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111042', 'Nur Fadlilatus Shiam', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111043', 'Ajeng Putri Nurhalysah', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514111044', 'Renanda Preity Cinta', '', '0000-00-00', 'P', '', '', '', '', '', 1, '', ''),
('193140514112011', 'Fahrizal Ali', '', '0000-00-00', 'L', '', '', '', '', '', 2, '', ''),
('193140514221001', 'Ananditta Nayla', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140514221002', 'Budi Himawan', '', '0000-00-00', 'L', '', '', '', '', '', 2, '', ''),
('193140514221003', 'Cindy Ranti', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140514221004', 'Siska Rahayu', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140514221005', 'Tina Bar', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140514221006', 'Makhfudz Lillah', '', '0000-00-00', 'L', '', '', '', '', '', 2, '', ''),
('193140514221007', 'Kartika Ayu Rahmawati', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140514221008', 'Berylla Siska Ayu', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140514221009', 'Etik Rahmandani', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140515135027', 'Agustina Rizki Nadhifa', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140534723422', 'Aulia Rahmawati', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140582458020', 'Shella Auliya Putri', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193140614523623', 'Angelina Rahmandani', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193141324111014', 'Anisatus Sholikhah', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193141351351027', 'Nutri Sari', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193141434311018', 'Dewi Masyitoh', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193141514111010', 'Michelle Normandy', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193144634634635', 'Citra Nadhifa', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193161346436424', 'Nabila Mustikarahmawati', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', ''),
('193412514111012', 'Almaidah Munawaroh', '', '0000-00-00', 'P', '', '', '', '', '', 2, '', '');

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
(1, 'Kewirausaahan', 1, 0),
(2, 'Manajemen Sumber Daya Manusia', 1, 0),
(3, 'Bahasa Mandarin', 1, 0),
(4, 'Public Speaking', 1, 0),
(5, 'Administrasi Ekspor dan Impor', 1, 0),
(6, 'Integrated Marketing Communicat', 1, 0),
(7, 'Manajemen Perjalanan Bisnis', 1, 0),
(8, 'Administrasi Logistik', 1, 0),
(9, 'Humas dan Keprotokolan', 1, 0),
(10, 'Keselamatan Kerja Perkantoran', 1, 0),
(11, 'Filsafat Alam', 2, 0),
(12, 'Teknik Gambar 3D', 2, 0),
(13, 'Antariksa Lanjutan', 2, 0);

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
(1, 'Program Pendidikan Vokasi', '', 0, '', '0000-00-00'),
(2, 'Program Pendidikan Islam', '', 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `r_ambil_kelas`
--

CREATE TABLE `r_ambil_kelas` (
  `id` int(11) NOT NULL,
  `mahasiswa_nim` varchar(50) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `status_persetujuan` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_ambil_kelas`
--

INSERT INTO `r_ambil_kelas` (`id`, `mahasiswa_nim`, `kelas_id`, `tanggal_ambil`, `status_persetujuan`, `catatan`) VALUES
(1, '193140514111001', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(2, '193140514111002', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(3, '193140514111003', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(4, '193140514111004', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(5, '193140514111005', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(6, '193140514111006', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(7, '193140514111007', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(8, '193140514111008', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(9, '193140514111009', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(10, '193140514111010', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(11, '193140514111011', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(12, '193140514111012', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(13, '193140514111014', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(14, '193140514111015', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(15, '193140514111016', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(16, '193140514111018', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(17, '193140514111019', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(18, '193140514111020', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(19, '193140514111021', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(20, '193140514111022', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(21, '193140514111023', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(22, '193140514111024', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(23, '193140514111025', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(24, '193140514111026', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(25, '193140514111027', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(26, '193140514111028', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(27, '193140514111029', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(28, '193140514111030', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(29, '193140514111031', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(30, '193140514111032', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(31, '193140514111034', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(32, '193140514111035', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(33, '193140514111036', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(34, '193140514111039', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(35, '193140514111040', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(36, '193140514111041', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(37, '193140514111042', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(38, '193140514111043', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(39, '193140514111044', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(40, '193140514111001', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(41, '193140514111002', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(42, '193140514111003', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(43, '193140514111004', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(44, '193140514111005', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(45, '193140514111006', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(46, '193140514111007', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(47, '193140514111008', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(48, '193140514111009', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(49, '193140514111010', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(50, '193140514111011', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(51, '193140514111012', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(52, '193140514111014', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(53, '193140514111015', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(54, '193140514111016', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(55, '193140514111018', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(56, '193140514111019', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(57, '193140514111020', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(58, '193140514111021', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(59, '193140514111022', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(60, '193140514111023', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(61, '193140514111024', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(62, '193140514111025', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(63, '193140514111026', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(64, '193140514111027', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(65, '193140514111028', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(66, '193140514111029', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(67, '193140514111030', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(68, '193140514111031', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(69, '193140514111032', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(70, '193140514111034', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(71, '193140514111035', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(72, '193140514111036', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(73, '193140514111039', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(74, '193140514111040', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(75, '193140514111041', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(76, '193140514111042', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(77, '193140514111043', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(78, '193140514111044', 2, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(79, '193140514111001', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(80, '193140514111002', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(81, '193140514111003', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(82, '193140514111004', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(83, '193140514111005', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(84, '193140514111006', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(85, '193140514111007', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(86, '193140514111008', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(87, '193140514111009', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(88, '193140514111010', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(89, '193140514111011', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(90, '193140514111012', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(91, '193140514111014', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(92, '193140514111015', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(93, '193140514111016', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(94, '193140514111018', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(95, '193140514111019', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(96, '193140514111020', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(97, '193140514111021', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(98, '193140514111022', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(99, '193140514111023', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(100, '193140514111024', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(101, '193140514111025', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(102, '193140514111026', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(103, '193140514111027', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(104, '193140514111028', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(105, '193140514111029', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(106, '193140514111030', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(107, '193140514111031', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(108, '193140514111032', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(109, '193140514111034', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(110, '193140514111035', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(111, '193140514111036', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(112, '193140514111039', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(113, '193140514111040', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(114, '193140514111041', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(115, '193140514111042', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(116, '193140514111043', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(117, '193140514111044', 3, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(118, '193140514111001', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(119, '193140514111002', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(120, '193140514111003', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(121, '193140514111004', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(122, '193140514111005', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(123, '193140514111006', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(124, '193140514111007', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(125, '193140514111008', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(126, '193140514111009', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(127, '193140514111010', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(128, '193140514111011', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(129, '193140514111012', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(130, '193140514111014', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(131, '193140514111015', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(132, '193140514111016', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(133, '193140514111018', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(134, '193140514111019', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(135, '193140514111020', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(136, '193140514111021', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(137, '193140514111022', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(138, '193140514111023', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(139, '193140514111024', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(140, '193140514111025', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(141, '193140514111026', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(142, '193140514111027', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(143, '193140514111028', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(144, '193140514111029', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(145, '193140514111030', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(146, '193140514111031', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(147, '193140514111032', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(148, '193140514111034', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(149, '193140514111035', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(150, '193140514111036', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(151, '193140514111039', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(152, '193140514111040', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(153, '193140514111041', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(154, '193140514111042', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(155, '193140514111043', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(156, '193140514111044', 4, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(157, '193140514111001', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(158, '193140514111002', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(159, '193140514111003', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(160, '193140514111004', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(161, '193140514111005', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(162, '193140514111006', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(163, '193140514111007', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(164, '193140514111008', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(165, '193140514111009', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(166, '193140514111010', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(167, '193140514111011', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(168, '193140514111012', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(169, '193140514111014', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(170, '193140514111015', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(171, '193140514111016', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(172, '193140514111018', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(173, '193140514111019', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(174, '193140514111020', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(175, '193140514111021', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(176, '193140514111022', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(177, '193140514111023', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(178, '193140514111024', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(179, '193140514111025', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(180, '193140514111026', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(181, '193140514111027', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(182, '193140514111028', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(183, '193140514111029', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(184, '193140514111030', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(185, '193140514111031', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(186, '193140514111032', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(187, '193140514111034', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(188, '193140514111035', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(189, '193140514111036', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(190, '193140514111039', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(191, '193140514111040', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(192, '193140514111041', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(193, '193140514111042', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(194, '193140514111043', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(195, '193140514111044', 5, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(196, '193140514111001', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(197, '193140514111002', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(198, '193140514111003', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(199, '193140514111004', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(200, '193140514111005', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(201, '193140514111006', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(202, '193140514111007', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(203, '193140514111008', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(204, '193140514111009', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(205, '193140514111010', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(206, '193140514111011', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(207, '193140514111012', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(208, '193140514111014', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(209, '193140514111015', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(210, '193140514111016', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(211, '193140514111018', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(212, '193140514111019', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(213, '193140514111020', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(214, '193140514111021', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(215, '193140514111022', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(216, '193140514111023', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(217, '193140514111024', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(218, '193140514111025', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(219, '193140514111026', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(220, '193140514111027', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(221, '193140514111028', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(222, '193140514111029', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(223, '193140514111030', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(224, '193140514111031', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(225, '193140514111032', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(226, '193140514111034', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(227, '193140514111035', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(228, '193140514111036', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(229, '193140514111039', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(230, '193140514111040', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(231, '193140514111041', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(232, '193140514111042', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(233, '193140514111043', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(234, '193140514111044', 6, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(235, '193140514111001', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(236, '193140514111002', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(237, '193140514111003', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(238, '193140514111004', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(239, '193140514111005', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(240, '193140514111006', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(241, '193140514111007', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(242, '193140514111008', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(243, '193140514111009', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(244, '193140514111010', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(245, '193140514111011', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(246, '193140514111012', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(247, '193140514111014', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(248, '193140514111015', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(249, '193140514111016', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(250, '193140514111018', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(251, '193140514111019', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(252, '193140514111020', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(253, '193140514111021', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(254, '193140514111022', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(255, '193140514111023', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(256, '193140514111024', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(257, '193140514111025', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(258, '193140514111026', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(259, '193140514111027', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(260, '193140514111028', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(261, '193140514111029', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(262, '193140514111030', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(263, '193140514111031', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(264, '193140514111032', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(265, '193140514111034', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(266, '193140514111035', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(267, '193140514111036', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(268, '193140514111039', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(269, '193140514111040', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(270, '193140514111041', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(271, '193140514111042', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(272, '193140514111043', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(273, '193140514111044', 7, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(274, '193140514111001', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(275, '193140514111002', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(276, '193140514111003', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(277, '193140514111004', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(278, '193140514111005', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(279, '193140514111006', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(280, '193140514111007', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(281, '193140514111008', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(282, '193140514111009', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(283, '193140514111010', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(284, '193140514111011', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(285, '193140514111012', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(286, '193140514111014', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(287, '193140514111015', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(288, '193140514111016', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(289, '193140514111018', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(290, '193140514111019', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(291, '193140514111020', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(292, '193140514111021', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(293, '193140514111022', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(294, '193140514111023', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(295, '193140514111024', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(296, '193140514111025', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(297, '193140514111026', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(298, '193140514111027', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(299, '193140514111028', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(300, '193140514111029', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(301, '193140514111030', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(302, '193140514111031', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(303, '193140514111032', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(304, '193140514111034', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(305, '193140514111035', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(306, '193140514111036', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(307, '193140514111039', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(308, '193140514111040', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(309, '193140514111041', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(310, '193140514111042', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(311, '193140514111043', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(312, '193140514111044', 8, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(313, '193140514111001', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(314, '193140514111002', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(315, '193140514111003', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(316, '193140514111004', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(317, '193140514111005', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(318, '193140514111006', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(319, '193140514111007', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(320, '193140514111008', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(321, '193140514111009', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(322, '193140514111010', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(323, '193140514111011', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(324, '193140514111012', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(325, '193140514111014', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(326, '193140514111015', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(327, '193140514111016', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(328, '193140514111018', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(329, '193140514111019', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(330, '193140514111020', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(331, '193140514111021', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(332, '193140514111022', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(333, '193140514111023', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(334, '193140514111024', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(335, '193140514111025', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(336, '193140514111026', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(337, '193140514111027', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(338, '193140514111028', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(339, '193140514111029', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(340, '193140514111030', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(341, '193140514111031', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(342, '193140514111032', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(343, '193140514111034', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(344, '193140514111035', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(345, '193140514111036', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(346, '193140514111039', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(347, '193140514111040', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(348, '193140514111041', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(349, '193140514111042', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(350, '193140514111043', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(351, '193140514111044', 9, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(352, '193140514111001', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(353, '193140514111002', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(354, '193140514111003', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(355, '193140514111004', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(356, '193140514111005', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(357, '193140514111006', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(358, '193140514111007', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(359, '193140514111008', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(360, '193140514111009', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(361, '193140514111010', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(362, '193140514111011', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(363, '193140514111012', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(364, '193140514111014', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(365, '193140514111015', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(366, '193140514111016', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(367, '193140514111018', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(368, '193140514111019', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(369, '193140514111020', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(370, '193140514111021', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(371, '193140514111022', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(372, '193140514111023', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(373, '193140514111024', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(374, '193140514111025', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(375, '193140514111026', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(376, '193140514111027', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(377, '193140514111028', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(378, '193140514111029', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(379, '193140514111030', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(380, '193140514111031', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(381, '193140514111032', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(382, '193140514111034', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(383, '193140514111035', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(384, '193140514111036', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(385, '193140514111039', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(386, '193140514111040', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(387, '193140514111041', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(388, '193140514111042', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(389, '193140514111043', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(390, '193140514111044', 10, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(391, '193140514221001', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(392, '193140514221002', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(393, '193140514221003', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(394, '193140514221004', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(395, '193140514221005', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(396, '193140514221006', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(397, '193140514221007', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(398, '193140514221008', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(399, '193140514221009', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(400, '193141514111010', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(401, '193140514112011', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(402, '193412514111012', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(403, '193141324111014', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(404, '193140512411015', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(405, '193140511353016', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(406, '193141434311018', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(407, '193114134131019', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(408, '193140582458020', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(409, '193117151347021', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(410, '193140534723422', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(411, '193140614523623', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(412, '193161346436424', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(413, '193144634634635', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(414, '193140513223426', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(415, '193140515135027', 11, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(416, '193140514221001', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(417, '193140514221002', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(418, '193140514221003', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(419, '193140514221004', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(420, '193140514221005', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(421, '193140514221006', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(422, '193140514221007', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(423, '193140514221008', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(424, '193140514221009', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(425, '193141514111010', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(426, '193140514112011', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(427, '193412514111012', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(428, '193141324111014', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(429, '193140512411015', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(430, '193140511353016', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(431, '193141434311018', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(432, '193114134131019', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(433, '193140582458020', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(434, '193117151347021', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(435, '193140534723422', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(436, '193140614523623', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(437, '193161346436424', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(438, '193144634634635', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(439, '193140513223426', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(440, '193140515135027', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(441, '193140511515028', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation');
INSERT INTO `r_ambil_kelas` (`id`, `mahasiswa_nim`, `kelas_id`, `tanggal_ambil`, `status_persetujuan`, `catatan`) VALUES
(442, '193141351351027', 1, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(443, '193140514221001', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(444, '193140514221002', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(445, '193140514221003', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(446, '193140514221004', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(447, '193140514221005', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(448, '193140514221006', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(449, '193140514221007', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(450, '193140514221008', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(451, '193140514221009', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(452, '193141514111010', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(453, '193140514112011', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(454, '193412514111012', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(455, '193141324111014', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(456, '193140512411015', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(457, '193140511353016', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(458, '193141434311018', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(459, '193114134131019', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(460, '193140582458020', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(461, '193117151347021', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(462, '193140534723422', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(463, '193140614523623', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(464, '193161346436424', 12, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(465, '193140514221001', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(466, '193140514221002', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(467, '193140514221003', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(468, '193140514221004', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(469, '193140514221005', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(470, '193140514221006', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(471, '193140514221007', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(472, '193140514221008', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(473, '193140514221009', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(474, '193141514111010', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(475, '193140514112011', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(476, '193412514111012', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(477, '193141324111014', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(478, '193140512411015', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(479, '193140511353016', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(480, '193141434311018', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(481, '193114134131019', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(482, '193140582458020', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(483, '193117151347021', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(484, '193140534723422', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(485, '193140614523623', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(486, '193161346436424', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(487, '193144634634635', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(488, '193140513223426', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(489, '193140515135027', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(490, '193140511515028', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation'),
(491, '193141351351027', 13, '0000-00-00', 'diterima', 'Entry ini menggunakan fitur input data excel translation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_ambil_kelas`
--
ALTER TABLE `r_ambil_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
