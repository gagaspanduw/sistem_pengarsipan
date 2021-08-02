-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jan 2019 pada 08.15
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengarsipan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `nama_file` varchar(100) NOT NULL,
  `ukuran_file` int(10) NOT NULL,
  `tipe_file` varchar(20) NOT NULL,
  `kategori` enum('Musik','Video','Gambar','Dokumen') NOT NULL,
  `nama` varchar(20) NOT NULL,
  `dir` varchar(100) NOT NULL,
  `tanggal_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_upload`
--

INSERT INTO `tbl_upload` (`nama_file`, `ukuran_file`, `tipe_file`, `kategori`, `nama`, `dir`, `tanggal_upload`) VALUES
('test', 897042, 'application/pdf', 'Dokumen', 'admin', '181121100511am16613-16611-1-PB.pdf', '2018-11-21 00:00:00'),
('aaa', 7973209, 'audio/mp3', 'Musik', 'admin', '181208100932am5 Seconds Of Summer - Long Way Home.mp3', '2018-12-08 00:00:00'),
('test', 175334, 'application/pdf', 'Dokumen', 'admin', '181223034414pm36-Article Text-48-1-10-20140825.pdf', '2018-12-23 15:44:14'),
('test', 417193, 'application/pdf', 'Video', 'admin', '181223034606pm986-3057-1-PB.pdf', '2018-12-23 15:46:06'),
('test', 401057, 'application/pdf', 'Musik', 'admin', '181223094905pm45-220-1-PB (1).pdf', '2018-12-23 21:49:05'),
('Abstraksi', 3950928, 'audio/mp3', 'Musik', 'user', '181227051849pm03 Deen Assalam.mp3', '2018-12-27 00:00:00'),
('den', 4975966, 'application/octet-st', 'Gambar', 'admin', '181227104325pmambon2.rar', '2018-12-27 22:43:25'),
('testccnnnn', 1803767, 'image/jpeg', 'Gambar', 'admin', '181227104507pm1.jpg', '2018-12-27 22:45:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user', 'user'),
(3, '1', '2', '3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`dir`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
