-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 04:44 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `email`, `password`, `level`) VALUES
(1, 'Slamet', 'slamet@gmail.com', '12345', 'admin'),
(2, 'Riyadi', 'riyadi@gmail.com', '12345', 'admin'),
(3, 'testadmin', 'admin@gmail.com', 'admin', 'admin'),
(4, 'testsiswa', 'siswa@gmail.com', 'siswa', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `agama` varchar(16) NOT NULL,
  `sekolah_asal` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_siswa`
--

INSERT INTO `calon_siswa` (`id`, `foto`, `nama`, `alamat`, `jenis_kelamin`, `agama`, `sekolah_asal`) VALUES
(29, '22122021043041Lambang-ITS.png', 'test', 'Jl.Teknik Komputer I , Perumdos ITS Blok U-21', 'laki-laki', 'Islam', 'sma xyz');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `mata_pelajaran` varchar(200) NOT NULL,
  `hari` varchar(64) NOT NULL,
  `jam_mulai` varchar(255) NOT NULL,
  `jam_selesai` varchar(16) NOT NULL,
  `ruangan` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `mata_pelajaran`, `hari`, `jam_mulai`, `jam_selesai`, `ruangan`) VALUES
(1, 'Matematika', 'Senin', '07:00', '09:00', 'MAT 101'),
(2, 'Fisika', 'Senin', '10:00', '12:00', 'FIS 107'),
(3, 'Kimia', 'Selasa', '08:00', '10:00', 'KIM 201'),
(4, 'Biologi', 'Selasa', '13:00', '15:00', 'BIO 109'),
(5, 'Bahasa Indonesia', 'Rabu', '07:00', '09:00', 'IND 105'),
(6, 'Bahasa Inggris', 'Rabu', '11:00', '13:00', 'ENG 100'),
(7, 'Olahraga', 'Kamis', '13:00', '15:00', 'ORG 104'),
(8, 'Matematika', 'Jumat', '08:00', '10:00', 'MAT 203'),
(9, 'Fisika', 'Jumat', '13:00', '15:00', 'FIS 102');

-- --------------------------------------------------------

--
-- Table structure for table `sql_nilai`
--

CREATE TABLE `sql_nilai` (
  `Mata_Pelajaran` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `TUGAS_1` int(11) DEFAULT NULL,
  `TUGAS_2` int(11) DEFAULT NULL,
  `TUGAS_3` int(11) DEFAULT NULL,
  `TUGAS_4` int(11) DEFAULT NULL,
  `TUGAS_5` int(11) DEFAULT NULL,
  `AVG_TUGAS` decimal(4,1) DEFAULT NULL,
  `QUIZ_2` int(11) DEFAULT NULL,
  `QUIZ_3` int(11) DEFAULT NULL,
  `QUIZ_4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sql_nilai`
--

INSERT INTO `sql_nilai` (`Mata_Pelajaran`, `TUGAS_1`, `TUGAS_2`, `TUGAS_3`, `TUGAS_4`, `TUGAS_5`, `AVG_TUGAS`, `QUIZ_2`, `QUIZ_3`, `QUIZ_4`) VALUES
('Matematika', 100, 100, 100, 100, 100, '100.0', 44, 76, 60),
('Fisika', 80, 80, 80, 80, 80, '80.0', 40, 52, 55),
('Kimia', 100, 100, 100, 100, 100, '100.0', 100, 62, 87),
('Biologi', 100, 100, 100, 100, 100, '100.0', 97, 80, 87),
('Bahasa Indonesia', 100, 100, 100, 100, 100, '100.0', 95, 73, 87),
('Bahasa Inggris', 100, 100, 100, 100, 100, '100.0', 74, 84, 80),
('Olahraga', 100, 100, 100, 95, 100, '99.0', 82, 92, 83),
('Seni Budaya', 100, 88, 100, 100, 100, '97.6', 81, 68, 95),
('Kewarganegaraan', 97, 100, 100, 100, 100, '99.4', 54, 58, 57),
('Agama', 100, 100, 90, 80, 100, '94.0', 76, 84, 43),
('Bahasa Jepang', 100, 94, 100, 100, 100, '98.8', 86, 68, 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
