-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jul 2018 pada 13.05
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibekam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_kriteria` varchar(4) NOT NULL,
  `kepentingan` varchar(20) NOT NULL,
  `ket_kepentingan` varchar(20) NOT NULL,
  `nilai_l` char(3) NOT NULL,
  `nilai_m` char(3) NOT NULL,
  `nilai_u` char(3) NOT NULL,
  `tfn_lmu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_kriteria`, `kepentingan`, `ket_kepentingan`, `nilai_l`, `nilai_m`, `nilai_u`, `tfn_lmu`) VALUES
('tfn1', 'VL', 'Very Low', '0.0', '0.1', '0.3', '(0.0,0.1,0.3)'),
('tfn2', 'L', 'Low', '0.1', '0.3', '0.5', '(0.1,0.3,0.5)'),
('tfn3', 'M', 'Medium', '0.3', '0.5', '0.7', '(0.3,0.5,0.7)'),
('tfn4', 'H', 'High', '0.5', '0.7', '0.9', '(0.5,0.7,0.9)'),
('tfn5', 'VH', 'Very High', '0.7', '0.9', '1.0', '(0.7,0.9,1.0)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `idpasien` int(4) NOT NULL,
  `id_gangguan_kesehatan` varchar(3) NOT NULL,
  `nilai_A1` varchar(255) NOT NULL,
  `nilai_A2` varchar(255) NOT NULL,
  `nilai_A3` varchar(255) NOT NULL,
  `nilai_A4` varchar(255) NOT NULL,
  `nilai_A5` varchar(255) NOT NULL,
  `nilai_A6` varchar(255) NOT NULL,
  `nilai_fsaw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`idpasien`, `id_gangguan_kesehatan`, `nilai_A1`, `nilai_A2`, `nilai_A3`, `nilai_A4`, `nilai_A5`, `nilai_A6`, `nilai_fsaw`) VALUES
(5, '305', '0.53448275862069', '0.59946949602122', '0.40848806366048', '0.55437665782493', '0.6790450928382', '0.4893899204244', '0.6790450928382'),
(6, '306', '0.4478021978022', '0.4271978021978', '0.56043956043956', '0.39423076923077', '0.47115384615385', '0.69093406593407', '0.69093406593407');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gangguan_kesehatan`
--

CREATE TABLE `gangguan_kesehatan` (
  `id_gangguan_kesehatan` int(3) NOT NULL,
  `alternatif` varchar(2) NOT NULL,
  `nama_gangguan_kesehatan` varchar(20) NOT NULL,
  `solusi_gangguan_kesehatan` varchar(255) NOT NULL,
  `titik_bekam` varchar(255) NOT NULL,
  `c1` varchar(5) NOT NULL,
  `c2` varchar(5) NOT NULL,
  `c3` varchar(5) NOT NULL,
  `c4` varchar(5) NOT NULL,
  `c5` varchar(5) NOT NULL,
  `c6` varchar(5) NOT NULL,
  `c7` varchar(5) NOT NULL,
  `c8` varchar(5) NOT NULL,
  `c9` varchar(5) NOT NULL,
  `c10` varchar(5) NOT NULL,
  `c11` varchar(5) NOT NULL,
  `c12` varchar(5) NOT NULL,
  `c13` varchar(5) NOT NULL,
  `c14` varchar(5) NOT NULL,
  `c15` varchar(5) NOT NULL,
  `c16` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gangguan_kesehatan`
--

INSERT INTO `gangguan_kesehatan` (`id_gangguan_kesehatan`, `alternatif`, `nama_gangguan_kesehatan`, `solusi_gangguan_kesehatan`, `titik_bekam`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `c12`, `c13`, `c14`, `c15`, `c16`) VALUES
(301, 'A1', 'kolesterol', 'makan-makan yang bergizi', '../gambar/23042018145510_20170414_084320.JPG', 'H', 'VH', 'VH', 'VH', 'VH', 'VH', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'L', 'M'),
(302, 'A2', 'pencernaan', 'minum jahe', '../gambar/pencernaan.jpg', 'VH', 'VH', 'VH', 'VL', 'L', 'M', 'VH', 'H', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VH'),
(303, 'A3', 'Hormon', 'jangan makan-makanan berminyak', '../gambar/hormon.jpg', 'VL', 'VL', 'VL', 'VH', 'VH', 'VL', 'VL', 'VH', 'VL', 'VL', 'L', 'M', 'VH', 'H', 'VH', 'VL'),
(304, 'A4', 'ginjal', 'minum vitamin', '../gambar/ginjal.jpg', 'VH', 'VH', 'VL', 'VL', 'VL', 'M', 'VL', 'VL', 'VL', 'VH', 'L', 'VL', 'VH', 'H', 'VL', 'VH'),
(305, 'A5', 'daya tahan tubuh', 'hirup udara segar', '../gambar/pencernaan.jpg', 'VH', 'VH', 'VH', 'VL', 'VL', 'VL', 'VL', 'H', 'VL', 'M', 'L', 'VH', 'VL', 'VL', 'VL', 'VH'),
(306, 'A6', 'jantung', 'jangan kebanyakan minum kopi', '../gambar/jantung.jpg', 'H', 'VL', 'VL', 'VH', 'VL', 'VL', 'VL', 'VH', 'VH', 'VL', 'VH', 'M', 'VL', 'VL', 'VH', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `no` int(13) NOT NULL,
  `umur` int(3) NOT NULL,
  `kelamin` varchar(2) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `keluhan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`idpasien`, `nama`, `no`, `umur`, `kelamin`, `alamat`, `keluhan`) VALUES
(5, 'sampel5', 21, 21, 'L', 'timoho', 'sakit perut'),
(6, 'sampel6', 21, 18, 'L', 'meteseh', 'sakit perut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `idtfn` varchar(7) NOT NULL,
  `kepentingan` varchar(20) NOT NULL,
  `ket_kepentingan` varchar(20) NOT NULL,
  `nilai_l` char(3) NOT NULL,
  `nilai_m` char(3) NOT NULL,
  `nilai_u` char(3) NOT NULL,
  `tfn_lmu` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`idtfn`, `kepentingan`, `ket_kepentingan`, `nilai_l`, `nilai_m`, `nilai_u`, `tfn_lmu`) VALUES
('tfn1', 'P', 'Poor', '0', '2.5', '5', '(0,2.5,5)'),
('tfn2', 'F', 'Fair', '2.5', '5', '7.5', '(2.5,5,7.5)'),
('tfn3', 'G', 'Good', '5', '7.5', '10', '(5,7.5,10)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_pasien`
--

CREATE TABLE `rating_pasien` (
  `id_rating_pasien` int(11) NOT NULL,
  `idpasien` int(4) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `idtfn` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating_pasien`
--

INSERT INTO `rating_pasien` (`id_rating_pasien`, `idpasien`, `nama`, `idtfn`) VALUES
(1117, 5, 'sampel5', 'tfn3'),
(1118, 5, 'sampel5', 'tfn3'),
(1119, 5, 'sampel5', 'tfn3'),
(1120, 5, 'sampel5', 'tfn1'),
(1121, 5, 'sampel5', 'tfn1'),
(1122, 5, 'sampel5', 'tfn1'),
(1123, 5, 'sampel5', 'tfn1'),
(1124, 5, 'sampel5', 'tfn2'),
(1125, 5, 'sampel5', 'tfn1'),
(1126, 5, 'sampel5', 'tfn2'),
(1127, 5, 'sampel5', 'tfn2'),
(1128, 5, 'sampel5', 'tfn3'),
(1129, 5, 'sampel5', 'tfn1'),
(1130, 5, 'sampel5', 'tfn1'),
(1131, 5, 'sampel5', 'tfn1'),
(1132, 5, 'sampel5', 'tfn3'),
(1133, 6, 'sampel6', 'tfn2'),
(1134, 6, 'sampel6', 'tfn1'),
(1135, 6, 'sampel6', 'tfn1'),
(1136, 6, 'sampel6', 'tfn3'),
(1137, 6, 'sampel6', 'tfn1'),
(1138, 6, 'sampel6', 'tfn1'),
(1139, 6, 'sampel6', 'tfn1'),
(1140, 6, 'sampel6', 'tfn3'),
(1141, 6, 'sampel6', 'tfn3'),
(1142, 6, 'sampel6', 'tfn1'),
(1143, 6, 'sampel6', 'tfn3'),
(1144, 6, 'sampel6', 'tfn2'),
(1145, 6, 'sampel6', 'tfn1'),
(1146, 6, 'sampel6', 'tfn1'),
(1147, 6, 'sampel6', 'tfn3'),
(1148, 6, 'sampel6', 'tfn1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(4) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `status` varchar(7) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `status`, `password`) VALUES
(103, 'dhimas', 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(105, 'nandi', 'user', '827ccb0eea8a706c4c34a16891f84e7b'),
(109, 'dian', 'user', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `gangguan_kesehatan`
--
ALTER TABLE `gangguan_kesehatan`
  ADD PRIMARY KEY (`id_gangguan_kesehatan`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`idtfn`);

--
-- Indexes for table `rating_pasien`
--
ALTER TABLE `rating_pasien`
  ADD PRIMARY KEY (`id_rating_pasien`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rating_pasien`
--
ALTER TABLE `rating_pasien`
  MODIFY `id_rating_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1149;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
