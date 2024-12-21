-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 10:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wika_intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'operator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `idDivisi` int(11) NOT NULL,
  `namaDivisi` varchar(100) NOT NULL,
  `lokasiDivisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`idDivisi`, `namaDivisi`, `lokasiDivisi`) VALUES
(1, 'KP', 'Office 1'),
(2, 'SS', 'Office 2'),
(3, 'SHE', 'Jalur 1'),
(4, 'Belum Terdaftar', '-'),
(5, '-', '-'),
(6, 'Software and Enginering', 'Kantor Pusat Lantai 2'),
(14, 'Personalia', 'Kantor Pusat');

-- --------------------------------------------------------

--
-- Table structure for table `jobdesc`
--

CREATE TABLE `jobdesc` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_job` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status_job` varchar(255) NOT NULL,
  `progresDeskripsi` varchar(255) DEFAULT NULL,
  `evaluasi` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobdesc`
--

INSERT INTO `jobdesc` (`id`, `id_user`, `judul_job`, `deskripsi`, `status_job`, `progresDeskripsi`, `evaluasi`, `created_at`, `update_at`) VALUES
(10, 29, 'Menambahkan Features CRUD', 'CRUD', 'Done', 'llll', NULL, '2023-11-04 00:00:00', '2023-11-04 19:41:06'),
(11, 33, 'Menambahkan Features CRUD Pada CI 3', 'd', 'Progres', 'Mulai Mengerjakan', NULL, '2023-11-04 00:00:00', '2023-11-04 21:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `hadir` int(50) NOT NULL,
  `tidakHadir` int(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `id_user`, `status`, `alasan`, `hadir`, `tidakHadir`, `created_at`, `update_at`) VALUES
(5, 29, 'Hadir', '', 3, 1, '2023-10-28 16:34:18', '2023-10-28 20:07:56'),
(6, 30, 'Hadir', '', 1, 1, '2023-10-28 16:46:44', '2023-10-30 04:44:06'),
(7, 32, 'Hadir', '', 1, 0, '2023-10-30 14:33:19', '2023-10-30 14:33:19'),
(8, 33, 'Hadir', '', 1, 1, '2023-10-31 12:00:39', '2023-10-31 12:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `no_surat_penilaian` varchar(255) NOT NULL,
  `idUser` int(30) NOT NULL,
  `kedisiplinan` double NOT NULL,
  `tanggung_jawab` double NOT NULL,
  `kerapihan` double NOT NULL,
  `komunikasi` double NOT NULL,
  `pemahaman_pekerjaan` double NOT NULL,
  `manajemen_waktu` double NOT NULL,
  `kerjasama_tim` double NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `no_surat_penilaian`, `idUser`, `kedisiplinan`, `tanggung_jawab`, `kerapihan`, `komunikasi`, `pemahaman_pekerjaan`, `manajemen_waktu`, `kerjasama_tim`, `tgl_dibuat`) VALUES
(1, 'PU.09.01/WIK.MJK.00341/2023', 33, 3.4, 3, 1, 3, 3, 3, 3, '2023-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `suratbalasan`
--

CREATE TABLE `suratbalasan` (
  `idSurat` int(11) NOT NULL,
  `nomorSuratBalasan` varchar(255) NOT NULL,
  `asalSekolahPemohon` varchar(100) NOT NULL,
  `tglDibuat` date NOT NULL,
  `nomorSuratMou` varchar(255) NOT NULL,
  `tglSuratMou` date NOT NULL,
  `statusPemohon` varchar(10) NOT NULL,
  `jumlahPemohon` int(11) NOT NULL,
  `namaPemohon1` varchar(100) DEFAULT NULL,
  `nim1` varchar(11) DEFAULT NULL,
  `jurusan1` varchar(30) DEFAULT NULL,
  `namaPemohon2` varchar(100) DEFAULT NULL,
  `nim2` varchar(30) DEFAULT NULL,
  `jurusan2` varchar(100) DEFAULT NULL,
  `namaPemohon3` varchar(100) DEFAULT NULL,
  `nim3` varchar(30) DEFAULT NULL,
  `jurusan3` varchar(100) DEFAULT NULL,
  `namaPemohon4` varchar(100) DEFAULT NULL,
  `nim4` varchar(30) DEFAULT NULL,
  `jurusan4` varchar(100) DEFAULT NULL,
  `namaPemohon5` varchar(100) DEFAULT NULL,
  `nim5` varchar(30) DEFAULT NULL,
  `jurusan5` varchar(100) DEFAULT NULL,
  `statusSurat` varchar(50) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  `divisi` int(11) NOT NULL,
  `namaPembimbing` varchar(100) NOT NULL,
  `ttd_digital` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suratbalasan`
--

INSERT INTO `suratbalasan` (`idSurat`, `nomorSuratBalasan`, `asalSekolahPemohon`, `tglDibuat`, `nomorSuratMou`, `tglSuratMou`, `statusPemohon`, `jumlahPemohon`, `namaPemohon1`, `nim1`, `jurusan1`, `namaPemohon2`, `nim2`, `jurusan2`, `namaPemohon3`, `nim3`, `jurusan3`, `namaPemohon4`, `nim4`, `jurusan4`, `namaPemohon5`, `nim5`, `jurusan5`, `statusSurat`, `tglMulai`, `tglAkhir`, `divisi`, `namaPembimbing`, `ttd_digital`) VALUES
(8, ' SE.01.01/WIK.C.MJK.KP.00030/2023 ', 'Rektor Sekolah Tinggi Teknologi Mandala ', '2023-11-02', '718/ITPB/FS/KP/X/2023', '2023-10-29', 'Mahasiswa', 1, 'Rizkan Ramdani', '2043055', 'Teknik Informatika', '', '', '', '', '', '', '', '', '', '', '', '', 'Belum Bisa Kami Terima', '2023-11-09', '2023-10-11', 5, '-', 'Personalia.png'),
(9, ' SE.01.01/WIK.C.MJK.KP.00031/2023 ', 'Rektor Sekolah Tinggi Teknologi Mandala ', '2023-11-01', '719/ITPB/FS/KP/X/2023', '2023-10-30', 'Mahasiswa', 2, 'Aldian Hamid Maro', '2043088', 'Teknik Informatika', 'Arkharega', '204399', 'Teknik Informatika', '', '', '', '', '', '', '', '', '', 'Telah Kami Terima', '2023-11-30', '2024-01-30', 3, 'Bpk.Rijal Suhendra', 'Personalia.png'),
(10, ' SE.01.01/WIK.C.MJK.KP.00032/2023 ', 'Rektor ', '2023-11-03', '937/UNINUS/FS/KP/X/2023', '2023-10-29', 'Mahasiswa', 5, 'Ajie Pangestu', '0983748', 'Teknik Informatika', 'Sopiana Marlina', '0098732', 'Teknik Informatika', 'Nabila Auliya', '3984777', 'Teknik Informatika', 'Zamzam Hamid', '2235438', 'Teknik Informatika', 'Yossandi Imran', '0987384', 'Teknik Informatika', 'Telah Kami Terima', '2023-12-07', '2024-02-07', 3, 'Bpk. Aldian Hamid Maro', 'Personalia1.png'),
(11, ' SE.01.01/WIK.C.MJK.KP.00999/2023 ', 'Rektor Sekolah Tinggi Teknologi Mandala ', '2023-11-24', '718/ITPB/STT/KP/X/2023', '2023-11-09', 'Mahasiswa', 1, 'Arroyan', '99999', 'Teknik Informatika', '', '', '', '', '', '', '', '', '', '', '', '', 'Telah Kami Terima', '2023-11-08', '2023-12-08', 2, 'Bpk. Rijal Suhendra', 'Personalia11.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` int(15) NOT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamatRumah` varchar(255) NOT NULL,
  `asalSekolah` varchar(255) NOT NULL,
  `jurusan` varchar(200) NOT NULL,
  `divisi` int(10) DEFAULT NULL,
  `kehadiran` int(11) DEFAULT NULL,
  `roleId` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'default.png',
  `created_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `namaLengkap`, `email`, `noTelp`, `password`, `alamatRumah`, `asalSekolah`, `jurusan`, `divisi`, `kehadiran`, `roleId`, `isActive`, `profile`, `created_at`, `update_at`) VALUES
(29, 99999, 'Aroyyan', 'aroy@gmail.com', '089273847323', '$2y$10$ybieB4Bixd6ZtI0BJ.pzj.YayZVgYpkit4ZKNqLUBIWWcuoRaYYdK', 'Cimahi', 'STT Mandala', 'Teknik Yang Pernah Ada', 1, 0, 3, 1, 'Screenshot_(1).png', '2023-10-28', '2023-11-04 18:24:40'),
(30, 11111, 'Tono Sukaesih', 'tono@gmail.com', '08273647098', '$2y$10$JHQootDl915PLH35LEvX/uHjCf3ANHorw9HpmjR5Km0xybzRe.7ga', 'Cimahi', 'STT Mandala', 'Teknik Informatika', 1, 0, 3, 1, 'default.png', '2023-10-28', '2023-10-28 14:43:34'),
(31, 7778383, 'Administrator', 'administrator@gmail.com', '082177777', '$2y$10$QXvaHOXVWvRRxlBb5SlL1OQeHpG6C1Z6e2OCnGjUfYx9He8ZzgAsG', '-', 'Office 1', 'HRD', 14, 0, 1, 1, 'default.png', '2023-10-28', '2023-11-05 05:58:29'),
(32, 990, 'Boby Simanjuntak', 'boby@gmail.com', '098484', '$2y$10$usjnuO781xgmtRzZ9slpYu9.gKh9mAtDRZwPKx0/HhkR0lKlnB96i', 'NTT', 'UNINUS', 'Management', 3, 0, 3, 1, 'default.png', '2023-10-30', '2023-10-30 13:32:49'),
(33, 99977, 'Lely', 'lely@gmail.com', '0988488', '$2y$10$NMkskgKKMnLVZSRSbfJ.j.XPUWvQWiBgtBuX6YBMGet31HH8jqMDe', 'Mandala', 'STT MANDALA', 'Informatika', 2, 0, 3, 1, 'default.png', '2023-10-31', '2023-10-31 10:59:31'),
(36, 1102738411, 'Rizkan Ramdani', 'rizkan@gmail.com', '089273847388', '$2y$10$3Ouv0JBTl9EGHxnAs6rQ1OOz/goDwCL09KCBFos/4UJvyiHFfNq6i', 'Jl. Babakan Jati', '', '', 2, 0, 2, 1, 'default.png', '2023-11-05', '2023-11-05 05:50:37'),
(38, 22222333, 'Anto', 'anto@gmail.com', '0896677', '$2y$10$HuGdtTbkJzIumBP3em0P.uC.AqX9AM4ZPnrzA7Qqj7KCsavXrpeOK', '', '', '', 3, NULL, 2, 1, 'default.png', '0000-00-00', '2023-11-05 07:29:01'),
(39, 898989, 'IO', 'ui@gmail.com', '', '$2y$10$D372Oum4hM787Z15xUbYjOihR1rltTjeGMXvaxko4jsVLvU.Cpzle', '', '', '', 1, NULL, 2, 1, 'default.png', '0000-00-00', '2023-11-05 08:35:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`idDivisi`);

--
-- Indexes for table `jobdesc`
--
ALTER TABLE `jobdesc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `suratbalasan`
--
ALTER TABLE `suratbalasan`
  ADD PRIMARY KEY (`idSurat`),
  ADD UNIQUE KEY `nomorSuratBalasan` (`nomorSuratBalasan`),
  ADD KEY `divisi` (`divisi`),
  ADD KEY `divisi_2` (`divisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `divisi` (`divisi`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `idDivisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobdesc`
--
ALTER TABLE `jobdesc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suratbalasan`
--
ALTER TABLE `suratbalasan`
  MODIFY `idSurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobdesc`
--
ALTER TABLE `jobdesc`
  ADD CONSTRAINT `jobdesc_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Constraints for table `suratbalasan`
--
ALTER TABLE `suratbalasan`
  ADD CONSTRAINT `suratbalasan_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`idDivisi`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`idDivisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
