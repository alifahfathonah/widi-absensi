-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 12:24 PM
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
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_induk`
--

CREATE TABLE `buku_induk` (
  `id` int(11) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `no_panggil` int(11) NOT NULL,
  `no_register` varchar(11) NOT NULL,
  `nomor_induk` varchar(255) NOT NULL,
  `kode_ddc` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `judul_buku` text NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `penerbit` text NOT NULL,
  `kota_terbit` varchar(255) NOT NULL,
  `subjek` text NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `isbn` varchar(120) NOT NULL,
  `donatur` varchar(255) NOT NULL,
  `jumlah_eksemplar` int(30) NOT NULL,
  `halaman` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_induk`
--

INSERT INTO `buku_induk` (`id`, `tanggal_penerimaan`, `no_panggil`, `no_register`, `nomor_induk`, `kode_ddc`, `pengarang`, `judul_buku`, `tahun_terbit`, `penerbit`, `kota_terbit`, `subjek`, `kategori`, `isbn`, `donatur`, `jumlah_eksemplar`, `halaman`, `ukuran`, `harga`) VALUES
(1, '2020-09-14', 12, '134', 'asdasdasd', 'jkjhasd', 'Badar Wildanie', 'Membuat kopi pakai garbu', 2008, 'Wildanie', 'Poor City', 'Kopi', 'Kuliner', 'uu123-dd12334-12268', 'Mbak bidayah', 2000000, '200', '28x10', 800000),
(3, '2020-09-23', 13, '21', 'UVUV-123-WEVWEV-2', 'ONYEY123-882', 'Adi Surapno', 'Membuat candi dalam semalam', 1885, 'Matabari', 'Jepang', 'Eeh', 'Horor', 'asd-23991-sks-1232', 'Mbak bidayah', 200000, '887', '28x10', 150000),
(4, '2020-09-11', 112, '8871', '67982', '667-123A', 'Badar Wildanie', 'Pintar menggambar peta sambil tidur', 1997, 'Apix Media', 'Serbejeh', 'Umm..', 'Edukasi', 'hu8812-99bb123-7', 'Mbak Cahyo', 800000, '221', '28x10', 880000);

-- --------------------------------------------------------

--
-- Table structure for table `daftarpengunjung`
--

CREATE TABLE `daftarpengunjung` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datasiswa`
--

CREATE TABLE `datasiswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datasiswa`
--

INSERT INTO `datasiswa` (`nis`, `nama`, `alamat`) VALUES
(18871, 'Ahmad Budiarno', 'Malang'),
(18877, 'Beni Muhammad', 'Surabaya'),
(18878, 'Bunga Fahmia', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(120) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `password`) VALUES
(1, 'pustakawan', 'hanif', 'mtsshifa123'),
(2, 'pustakawan', 'pustakawan', 'mtsshifa123'),
(3, 'admin', 'admin', 'admin'),
(4, 'admin', 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL,
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `no_panggil` varchar(255) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tanggal`, `waktu`, `nis`, `nama_siswa`, `no_panggil`, `judul_buku`, `pengarang`, `isbn`, `kembali`) VALUES
(2, '2020-09-26', '12:09:03', '18871', 'Ahmad Budiarno', '12', 'Membuat kopi pakai garbu', 'Badar Wildanie', 'uu123-dd12334-12268', '2020-09-30'),
(3, '2020-09-26', '12:09:58', '18878', 'Bunga Fahmia', '13', 'Membuat candi dalam semalam', 'Adi Surapno', 'asd-23991-sks-1232', '2020-10-02'),
(4, '2020-09-26', '12:09:50', '18877', 'Beni Muhammad', '112', 'Pintar menggambar peta sambil tidur', 'Badar Wildanie', 'hu8812-99bb123-7', '2020-10-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_induk`
--
ALTER TABLE `buku_induk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftarpengunjung`
--
ALTER TABLE `daftarpengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datasiswa`
--
ALTER TABLE `datasiswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_induk`
--
ALTER TABLE `buku_induk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftarpengunjung`
--
ALTER TABLE `daftarpengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datasiswa`
--
ALTER TABLE `datasiswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18880;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
