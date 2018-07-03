-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jun 2018 pada 10.27
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
('tfn1', 'VL', 'Very Low', '0.0', '0.0', '0.2', '(0.0,0.0,0.2)'),
('tfn2', 'L', 'Low', '0.0', '0.2', '0.4', '(0.0,0.2,0.4)'),
('tfn3', 'M', 'Medium', '0.2', '0.4', '0.6', '(0.2,0.4,0.6)'),
('tfn4', 'H', 'High', '0.4', '0.6', '0.8', '(0.4,0.6,0.8)'),
('tfn5', 'VH', 'Very High', '0.6', '0.8', '1.0', '(0.6,0.8,1.0)');

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
(1, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(2, '305', '0.33333333333333', '0.39946018893387', '0.35042735042735', '0.17204301075269', '0.43369963369963', '0.21943947525343', '0.43369963369963'),
(3, '305', '0.36', '0.43789473684211', '0.32', '0.1858064516129', '0.47542857142857', '0.22325581395349', '0.47542857142857'),
(4, '302', '0.4', '0.55578947368421', '0.45333333333333', '0.20645161290323', '0.47542857142857', '0.20837209302326', '0.55578947368421'),
(5, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(6, '302', '0.44444444444444', '0.67836257309942', '0.46296296296296', '0.22939068100358', '0.48253968253968', '0.24806201550388', '0.67836257309942'),
(7, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(8, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(9, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(10, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(11, '305', '0.41176470588235', '0.4953560371517', '0.3921568627451', '0.21252371916509', '0.53781512605042', '0.24076607387141', '0.53781512605042'),
(12, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(13, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(14, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(15, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(16, '305', '0.5', '0.59649122807018', '0.52777777777778', '0.25806451612903', '0.64761904761905', '0.31007751937985', '0.64761904761905'),
(17, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(18, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(19, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(20, '305', '0.375', '0.44736842105263', '0.39583333333333', '0.19354838709677', '0.48571428571429', '0.23255813953488', '0.48571428571429'),
(21, '303', '0.5', '0.5933014354067', '0.60606060606061', '0.25806451612903', '0.54025974025974', '0.32135306553911', '0.60606060606061');

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
(301, 'A1', 'kolesterol', 'makan-makan yang bergizi', '../gambar/23042018145510_20170414_084320.JPG', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL'),
(302, 'A2', 'pencernaan', 'minum jahe', '../gambar/pencernaan.jpg', 'L', 'ML', 'ML', 'M', 'L', 'L', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'M', 'L', 'L', 'L'),
(303, 'A3', 'Hormon', 'jangan makan-makanan berminyak', '../gambar/hormon.jpg', 'L', 'L', 'L', 'L', 'M', 'ML', 'ML', 'M', 'VL', 'VL', 'VL', 'VL', 'L', 'M', 'M', 'L'),
(304, 'A4', 'ginjal', 'minum vitamin', '../gambar/ginjal.jpg', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'VL', 'ML', 'ML', 'M', 'L', 'L', 'L', 'L', 'L'),
(305, 'A5', 'daya tahan tubuh', 'hirup udara segar', '../gambar/pencernaan.jpg', 'L', 'L', 'M', 'ML', 'ML', 'L', 'L', 'L', 'VL', 'VL', 'VL', 'ML', 'VL', 'VL', 'L', 'L'),
(306, 'A6', 'jantung', 'jangan kebanyakan minum kopi', '../gambar/jantung.jpg', 'L', 'L', 'VL', 'VL', 'VL', 'ML', 'ML', 'M', 'M', 'L', 'L', 'VL', 'VL', 'L', 'M', 'L');

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
(1, 'Fany', 213467, 18, 'L', 'aaa', 'aaa'),
(2, 'Dita', 213467, 18, 'P', 'Sragen jawa tengah', 'Sakit perut dan mual'),
(3, 'rifany', 21, 17, 'L', 'peanndurung', 'sakit kepala'),
(4, 'miqdad', 2134567890, 18, 'L', 'mairin', 'sakit perut'),
(5, 'nandi', 2134567, 14, 'L', 'a', 'a'),
(6, 'andi', 2134567, 19, 'L', 'Makan', 'Ayam'),
(7, 'Rizal', 2147483647, 29, 'L', 'Mojopuro', 'Sumberlawang'),
(8, 'Devan', 213456789, 25, 'L', 'Makan ayam', 'tahu'),
(9, 'Andi', 213456789, 19, 'L', 'Makan', 'Ayam'),
(10, 'Dhimas', 89, 12, 'L', 'Makan', 'Ayam'),
(11, 'Dhimas', 213456789, 18, 'L', 'ayam', 'sakit'),
(12, 'Prasasti', 2134678910, 18, 'L', 'Makan', 'Ayam goreng'),
(13, 'yasir', 213467, 19, 'L', 'makan', 'sakit'),
(14, 'udin', 81314567, 21, 'L', 'ayam', 'gorengg'),
(15, 'Dinda', 21, 19, 'P', 'Padas', 'Sakit perut'),
(16, 'Astri', 2134567890, 30, 'L', 'makan', 'nasi padang'),
(17, 'aci', 2147483647, 31, 'L', 'makan', 'nasi padang'),
(18, 'Eko', 213467, 20, 'L', 'Makan', 'Ayam'),
(19, 'Dhimas', 213467, 18, 'L', 'Makan', 'ayam'),
(20, 'tuan guru', 2147483647, 28, 'L', 'makan', 'pake tahu'),
(21, 'ivan', 2147483647, 32, 'L', 'Makan', 'nasi uduk');

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
(1, 3, 'rifany', 'tfn2'),
(2, 3, 'rifany', 'tfn1'),
(3, 3, 'rifany', 'tfn1'),
(4, 3, 'rifany', 'tfn1'),
(5, 3, 'rifany', 'tfn1'),
(6, 3, 'rifany', 'tfn3'),
(7, 3, 'rifany', 'tfn2'),
(8, 3, 'rifany', 'tfn1'),
(9, 3, 'rifany', 'tfn1'),
(10, 3, 'rifany', 'tfn3'),
(11, 3, 'rifany', 'tfn1'),
(12, 3, 'rifany', 'tfn1'),
(13, 3, 'rifany', 'tfn2'),
(14, 3, 'rifany', 'tfn2'),
(15, 3, 'rifany', 'tfn1'),
(16, 3, 'rifany', 'tfn2'),
(18, 4, 'miqdad', 'tfn1'),
(19, 4, 'miqdad', 'tfn1'),
(20, 4, 'miqdad', 'tfn2'),
(21, 4, 'miqdad', 'tfn3'),
(22, 4, 'miqdad', 'tfn2'),
(23, 4, 'miqdad', 'tfn1'),
(24, 4, 'miqdad', 'tfn1'),
(25, 4, 'miqdad', 'tfn2'),
(26, 4, 'miqdad', 'tfn1'),
(27, 4, 'miqdad', 'tfn1'),
(28, 4, 'miqdad', 'tfn2'),
(29, 4, 'miqdad', 'tfn1'),
(30, 4, 'miqdad', 'tfn3'),
(31, 4, 'miqdad', 'tfn2'),
(32, 4, 'miqdad', 'tfn1'),
(33, 4, 'miqdad', 'tfn1'),
(88, 5, 'nandi', 'tfn1'),
(89, 5, 'nandi', 'tfn1'),
(90, 5, 'nandi', 'tfn1'),
(91, 5, 'nandi', 'tfn1'),
(92, 5, 'nandi', 'tfn1'),
(93, 5, 'nandi', 'tfn1'),
(94, 5, 'nandi', 'tfn1'),
(95, 5, 'nandi', 'tfn1'),
(96, 5, 'nandi', 'tfn1'),
(97, 5, 'nandi', 'tfn1'),
(98, 5, 'nandi', 'tfn1'),
(99, 5, 'nandi', 'tfn1'),
(100, 5, 'nandi', 'tfn1'),
(101, 5, 'nandi', 'tfn1'),
(102, 5, 'nandi', 'tfn1'),
(103, 5, 'nandi', 'tfn1'),
(121, 6, 'andi', 'tfn1'),
(122, 6, 'andi', 'tfn1'),
(123, 6, 'andi', 'tfn1'),
(124, 6, 'andi', 'tfn3'),
(125, 6, 'andi', 'tfn1'),
(126, 6, 'andi', 'tfn1'),
(127, 6, 'andi', 'tfn1'),
(128, 6, 'andi', 'tfn1'),
(129, 6, 'andi', 'tfn1'),
(130, 6, 'andi', 'tfn1'),
(131, 6, 'andi', 'tfn1'),
(132, 6, 'andi', 'tfn1'),
(133, 6, 'andi', 'tfn1'),
(134, 6, 'andi', 'tfn1'),
(135, 6, 'andi', 'tfn1'),
(136, 6, 'andi', 'tfn1'),
(137, 8, 'Devan', 'tfn1'),
(138, 8, 'Devan', 'tfn1'),
(139, 8, 'Devan', 'tfn1'),
(140, 8, 'Devan', 'tfn1'),
(141, 8, 'Devan', 'tfn1'),
(142, 8, 'Devan', 'tfn1'),
(143, 8, 'Devan', 'tfn1'),
(144, 8, 'Devan', 'tfn1'),
(145, 8, 'Devan', 'tfn1'),
(146, 8, 'Devan', 'tfn1'),
(147, 8, 'Devan', 'tfn1'),
(148, 8, 'Devan', 'tfn1'),
(149, 8, 'Devan', 'tfn1'),
(150, 8, 'Devan', 'tfn1'),
(151, 8, 'Devan', 'tfn1'),
(152, 8, 'Devan', 'tfn1'),
(153, 9, 'Andi', 'tfn1'),
(154, 9, 'Andi', 'tfn1'),
(155, 9, 'Andi', 'tfn1'),
(156, 9, 'Andi', 'tfn1'),
(157, 9, 'Andi', 'tfn1'),
(158, 9, 'Andi', 'tfn1'),
(159, 9, 'Andi', 'tfn1'),
(160, 9, 'Andi', 'tfn1'),
(161, 9, 'Andi', 'tfn1'),
(162, 9, 'Andi', 'tfn1'),
(163, 9, 'Andi', 'tfn1'),
(164, 9, 'Andi', 'tfn1'),
(165, 9, 'Andi', 'tfn1'),
(166, 9, 'Andi', 'tfn1'),
(167, 9, 'Andi', 'tfn1'),
(168, 9, 'Andi', 'tfn1'),
(173, 11, 'Dhimas', 'tfn1'),
(174, 11, 'Dhimas', 'tfn1'),
(175, 11, 'Dhimas', 'tfn1'),
(176, 11, 'Dhimas', 'tfn1'),
(177, 11, 'Dhimas', 'tfn1'),
(178, 11, 'Dhimas', 'tfn2'),
(179, 11, 'Dhimas', 'tfn1'),
(180, 11, 'Dhimas', 'tfn1'),
(181, 11, 'Dhimas', 'tfn1'),
(182, 11, 'Dhimas', 'tfn1'),
(183, 11, 'Dhimas', 'tfn1'),
(184, 11, 'Dhimas', 'tfn1'),
(185, 11, 'Dhimas', 'tfn1'),
(186, 11, 'Dhimas', 'tfn1'),
(187, 11, 'Dhimas', 'tfn1'),
(188, 11, 'Dhimas', 'tfn1'),
(205, 19, 'Dhimas', 'tfn1'),
(206, 19, 'Dhimas', 'tfn1'),
(207, 19, 'Dhimas', 'tfn1'),
(208, 19, 'Dhimas', 'tfn1'),
(209, 19, 'Dhimas', 'tfn1'),
(210, 19, 'Dhimas', 'tfn1'),
(211, 19, 'Dhimas', 'tfn1'),
(212, 19, 'Dhimas', 'tfn1'),
(213, 19, 'Dhimas', 'tfn1'),
(214, 19, 'Dhimas', 'tfn1'),
(215, 19, 'Dhimas', 'tfn1'),
(216, 19, 'Dhimas', 'tfn1'),
(218, 19, 'Dhimas', 'tfn1'),
(219, 19, 'Dhimas', 'tfn1'),
(220, 19, 'Dhimas', 'tfn1'),
(221, 10, 'Dhimas', 'tfn1'),
(222, 10, 'Dhimas', 'tfn1'),
(223, 10, 'Dhimas', 'tfn1'),
(224, 10, 'Dhimas', 'tfn1'),
(225, 10, 'Dhimas', 'tfn1'),
(226, 10, 'Dhimas', 'tfn1'),
(227, 10, 'Dhimas', 'tfn1'),
(228, 10, 'Dhimas', 'tfn1'),
(229, 10, 'Dhimas', 'tfn1'),
(230, 10, 'Dhimas', 'tfn1'),
(231, 10, 'Dhimas', 'tfn1'),
(232, 10, 'Dhimas', 'tfn1'),
(233, 10, 'Dhimas', 'tfn1'),
(234, 10, 'Dhimas', 'tfn1'),
(235, 10, 'Dhimas', 'tfn1'),
(236, 10, 'Dhimas', 'tfn1'),
(253, 13, 'Yasir', 'tfn1'),
(254, 13, 'Yasir', 'tfn1'),
(255, 13, 'Yasir', 'tfn1'),
(256, 13, 'Yasir', 'tfn1'),
(257, 13, 'Yasir', 'tfn1'),
(258, 13, 'Yasir', 'tfn1'),
(259, 13, 'Yasir', 'tfn1'),
(260, 13, 'Yasir', 'tfn1'),
(261, 13, 'Yasir', 'tfn1'),
(262, 13, 'Yasir', 'tfn1'),
(263, 13, 'Yasir', 'tfn1'),
(264, 13, 'Yasir', 'tfn1'),
(265, 13, 'Yasir', 'tfn1'),
(266, 13, 'Yasir', 'tfn1'),
(267, 13, 'Yasir', 'tfn1'),
(268, 13, 'Yasir', 'tfn1'),
(269, 18, 'Eko', 'tfn1'),
(270, 18, 'Eko', 'tfn1'),
(271, 18, 'Eko', 'tfn1'),
(272, 18, 'Eko', 'tfn1'),
(273, 18, 'Eko', 'tfn1'),
(274, 18, 'Eko', 'tfn1'),
(275, 18, 'Eko', 'tfn1'),
(276, 18, 'Eko', 'tfn1'),
(277, 18, 'Eko', 'tfn1'),
(278, 18, 'Eko', 'tfn1'),
(279, 18, 'Eko', 'tfn1'),
(280, 18, 'Eko', 'tfn1'),
(281, 18, 'Eko', 'tfn1'),
(282, 18, 'Eko', 'tfn1'),
(283, 18, 'Eko', 'tfn1'),
(284, 18, 'Eko', 'tfn1'),
(285, 12, 'Prasasti', 'tfn1'),
(286, 12, 'Prasasti', 'tfn1'),
(287, 12, 'Prasasti', 'tfn1'),
(288, 12, 'Prasasti', 'tfn1'),
(289, 12, 'Prasasti', 'tfn1'),
(290, 12, 'Prasasti', 'tfn1'),
(291, 12, 'Prasasti', 'tfn1'),
(292, 12, 'Prasasti', 'tfn1'),
(293, 12, 'Prasasti', 'tfn1'),
(294, 12, 'Prasasti', 'tfn1'),
(295, 12, 'Prasasti', 'tfn1'),
(296, 12, 'Prasasti', 'tfn1'),
(297, 12, 'Prasasti', 'tfn1'),
(298, 12, 'Prasasti', 'tfn1'),
(299, 12, 'Prasasti', 'tfn1'),
(300, 12, 'Prasasti', 'tfn1'),
(301, 14, 'udin', 'tfn1'),
(302, 14, 'udin', 'tfn1'),
(303, 14, 'udin', 'tfn1'),
(304, 14, 'udin', 'tfn1'),
(305, 14, 'udin', 'tfn1'),
(306, 14, 'udin', 'tfn1'),
(307, 14, 'udin', 'tfn1'),
(308, 14, 'udin', 'tfn1'),
(309, 14, 'udin', 'tfn1'),
(310, 14, 'udin', 'tfn1'),
(311, 14, 'udin', 'tfn1'),
(312, 14, 'udin', 'tfn1'),
(313, 14, 'udin', 'tfn1'),
(314, 14, 'udin', 'tfn1'),
(315, 14, 'udin', 'tfn1'),
(316, 14, 'udin', 'tfn1'),
(341, 19, 'Dhimas', 'tfn1'),
(349, 1, 'Fany', 'tfn1'),
(350, 1, 'Fany', 'tfn1'),
(351, 1, 'Fany', 'tfn1'),
(352, 1, 'Fany', 'tfn1'),
(353, 1, 'Fany', 'tfn1'),
(354, 1, 'Fany', 'tfn1'),
(355, 1, 'Fany', 'tfn1'),
(356, 1, 'Fany', 'tfn1'),
(357, 1, 'Fany', 'tfn1'),
(358, 1, 'Fany', 'tfn1'),
(359, 1, 'Fany', 'tfn1'),
(360, 1, 'Fany', 'tfn1'),
(361, 1, 'Fany', 'tfn1'),
(362, 1, 'Fany', 'tfn1'),
(363, 1, 'Fany', 'tfn1'),
(364, 1, 'Fany', 'tfn1'),
(365, 2, 'Dita', 'tfn3'),
(366, 2, 'Dita', 'tfn2'),
(367, 2, 'Dita', 'tfn2'),
(368, 2, 'Dita', 'tfn2'),
(369, 2, 'Dita', 'tfn2'),
(370, 2, 'Dita', 'tfn2'),
(371, 2, 'Dita', 'tfn3'),
(372, 2, 'Dita', 'tfn2'),
(373, 2, 'Dita', 'tfn3'),
(374, 2, 'Dita', 'tfn3'),
(375, 2, 'Dita', 'tfn3'),
(376, 2, 'Dita', 'tfn3'),
(377, 2, 'Dita', 'tfn3'),
(378, 2, 'Dita', 'tfn2'),
(379, 2, 'Dita', 'tfn2'),
(380, 2, 'Dita', 'tfn2'),
(381, 7, 'Rizal', 'tfn1'),
(382, 7, 'Rizal', 'tfn1'),
(383, 7, 'Rizal', 'tfn1'),
(384, 7, 'Rizal', 'tfn1'),
(385, 7, 'Rizal', 'tfn1'),
(386, 7, 'Rizal', 'tfn1'),
(387, 7, 'Rizal', 'tfn1'),
(388, 7, 'Rizal', 'tfn1'),
(389, 7, 'Rizal', 'tfn1'),
(390, 7, 'Rizal', 'tfn1'),
(391, 7, 'Rizal', 'tfn1'),
(392, 7, 'Rizal', 'tfn1'),
(393, 7, 'Rizal', 'tfn1'),
(394, 7, 'Rizal', 'tfn1'),
(395, 7, 'Rizal', 'tfn1'),
(396, 7, 'Rizal', 'tfn1'),
(397, 15, 'Dinda', 'tfn1'),
(398, 15, 'Dinda', 'tfn1'),
(399, 15, 'Dinda', 'tfn1'),
(400, 15, 'Dinda', 'tfn1'),
(401, 15, 'Dinda', 'tfn1'),
(402, 15, 'Dinda', 'tfn1'),
(403, 15, 'Dinda', 'tfn1'),
(404, 15, 'Dinda', 'tfn1'),
(405, 15, 'Dinda', 'tfn1'),
(406, 15, 'Dinda', 'tfn1'),
(407, 15, 'Dinda', 'tfn1'),
(408, 15, 'Dinda', 'tfn1'),
(409, 15, 'Dinda', 'tfn1'),
(410, 15, 'Dinda', 'tfn1'),
(411, 15, 'Dinda', 'tfn1'),
(412, 15, 'Dinda', 'tfn1'),
(429, 16, 'Astri', 'tfn2'),
(430, 16, 'Astri', 'tfn2'),
(431, 16, 'Astri', 'tfn2'),
(432, 16, 'Astri', 'tfn2'),
(433, 16, 'Astri', 'tfn2'),
(434, 16, 'Astri', 'tfn2'),
(435, 16, 'Astri', 'tfn2'),
(436, 16, 'Astri', 'tfn2'),
(437, 16, 'Astri', 'tfn1'),
(438, 16, 'Astri', 'tfn1'),
(439, 16, 'Astri', 'tfn1'),
(440, 16, 'Astri', 'tfn1'),
(441, 16, 'Astri', 'tfn1'),
(442, 16, 'Astri', 'tfn1'),
(443, 16, 'Astri', 'tfn1'),
(444, 16, 'Astri', 'tfn1'),
(445, 17, 'aci', 'tfn1'),
(446, 17, 'aci', 'tfn1'),
(447, 17, 'aci', 'tfn1'),
(448, 17, 'aci', 'tfn1'),
(449, 17, 'aci', 'tfn1'),
(450, 17, 'aci', 'tfn1'),
(451, 17, 'aci', 'tfn1'),
(452, 17, 'aci', 'tfn1'),
(453, 17, 'aci', 'tfn1'),
(454, 17, 'aci', 'tfn1'),
(455, 17, 'aci', 'tfn1'),
(456, 17, 'aci', 'tfn1'),
(457, 17, 'aci', 'tfn1'),
(458, 17, 'aci', 'tfn1'),
(459, 17, 'aci', 'tfn1'),
(460, 17, 'aci', 'tfn1'),
(477, 20, 'tuan guru', 'tfn1'),
(478, 20, 'tuan guru', 'tfn1'),
(479, 20, 'tuan guru', 'tfn1'),
(480, 20, 'tuan guru', 'tfn1'),
(481, 20, 'tuan guru', 'tfn1'),
(482, 20, 'tuan guru', 'tfn1'),
(483, 20, 'tuan guru', 'tfn1'),
(484, 20, 'tuan guru', 'tfn1'),
(485, 20, 'tuan guru', 'tfn1'),
(486, 20, 'tuan guru', 'tfn1'),
(487, 20, 'tuan guru', 'tfn1'),
(488, 20, 'tuan guru', 'tfn1'),
(489, 20, 'tuan guru', 'tfn1'),
(490, 20, 'tuan guru', 'tfn1'),
(491, 20, 'tuan guru', 'tfn1'),
(492, 20, 'tuan guru', 'tfn1'),
(493, 21, 'ivan', 'tfn1'),
(494, 21, 'ivan', 'tfn3'),
(495, 21, 'ivan', 'tfn1'),
(496, 21, 'ivan', 'tfn2'),
(497, 21, 'ivan', 'tfn3'),
(498, 21, 'ivan', 'tfn1'),
(499, 21, 'ivan', 'tfn2'),
(500, 21, 'ivan', 'tfn1'),
(501, 21, 'ivan', 'tfn1'),
(502, 21, 'ivan', 'tfn1'),
(503, 21, 'ivan', 'tfn1'),
(504, 21, 'ivan', 'tfn1'),
(505, 21, 'ivan', 'tfn1'),
(506, 21, 'ivan', 'tfn1'),
(507, 21, 'ivan', 'tfn1'),
(508, 21, 'ivan', 'tfn1');

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
  MODIFY `id_rating_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
