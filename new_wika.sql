-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for wika_intern
CREATE DATABASE IF NOT EXISTS `wika_intern` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `wika_intern`;

-- Dumping structure for table wika_intern.akses
CREATE TABLE IF NOT EXISTS `akses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wika_intern.akses: ~3 rows (approximately)
REPLACE INTO `akses` (`id`, `role`) VALUES
	(1, 'administrator'),
	(2, 'operator'),
	(3, 'user');

-- Dumping structure for table wika_intern.answer
CREATE TABLE IF NOT EXISTS `answer` (
  `id_ans` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_quest` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ans`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table wika_intern.answer: ~0 rows (approximately)

-- Dumping structure for table wika_intern.divisi
CREATE TABLE IF NOT EXISTS `divisi` (
  `idDivisi` int NOT NULL AUTO_INCREMENT,
  `namaDivisi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lokasiDivisi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idDivisi`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wika_intern.divisi: ~7 rows (approximately)
REPLACE INTO `divisi` (`idDivisi`, `namaDivisi`, `lokasiDivisi`) VALUES
	(1, 'KP', 'Office 1'),
	(2, 'SS', 'Office 2'),
	(3, 'SHE', 'Jalur 1'),
	(4, 'Belum Terdaftar', '-'),
	(5, '-', '-'),
	(6, 'Software and Enginering', 'Kantor Pusat Lantai 2'),
	(14, 'Personalia', 'Kantor Pusat');

-- Dumping structure for table wika_intern.jobdesc
CREATE TABLE IF NOT EXISTS `jobdesc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `judul_job` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status_job` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `progresDeskripsi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`) USING BTREE,
  CONSTRAINT `jobdesc_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wika_intern.jobdesc: ~2 rows (approximately)
REPLACE INTO `jobdesc` (`id`, `id_user`, `judul_job`, `deskripsi`, `status_job`, `progresDeskripsi`, `evaluasi`, `created_at`, `update_at`) VALUES
	(10, 29, 'Menambahkan Features CRUD', 'CRUD', 'Done', 'llll', NULL, '2023-11-04 00:00:00', '2023-11-04 19:41:06'),
	(11, 33, 'Menambahkan Features CRUD Pada CI 3', 'd', 'Progres', 'Mulai Mengerjakan', NULL, '2023-11-04 00:00:00', '2023-11-04 21:15:13');

-- Dumping structure for table wika_intern.kehadiran
CREATE TABLE IF NOT EXISTS `kehadiran` (
  `id_kehadiran` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hadir` int NOT NULL,
  `tidakHadir` int NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id_kehadiran`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wika_intern.kehadiran: ~4 rows (approximately)
REPLACE INTO `kehadiran` (`id_kehadiran`, `id_user`, `status`, `alasan`, `hadir`, `tidakHadir`, `created_at`, `update_at`) VALUES
	(5, 29, 'Hadir', '', 3, 1, '2023-10-28 16:34:18', '2023-10-28 20:07:56'),
	(6, 30, 'Hadir', '', 1, 1, '2023-10-28 16:46:44', '2023-10-30 04:44:06'),
	(7, 32, 'Hadir', '', 1, 0, '2023-10-30 14:33:19', '2023-10-30 14:33:19'),
	(8, 33, 'Hadir', '', 1, 1, '2023-10-31 12:00:39', '2023-10-31 12:01:09');

-- Dumping structure for table wika_intern.penilaian
CREATE TABLE IF NOT EXISTS `penilaian` (
  `id_penilaian` int NOT NULL AUTO_INCREMENT,
  `no_surat_penilaian` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idUser` int NOT NULL,
  `kedisiplinan` double NOT NULL,
  `tanggung_jawab` double NOT NULL,
  `kerapihan` double NOT NULL,
  `komunikasi` double NOT NULL,
  `pemahaman_pekerjaan` double NOT NULL,
  `manajemen_waktu` double NOT NULL,
  `kerjasama_tim` double NOT NULL,
  `tgl_dibuat` date NOT NULL,
  PRIMARY KEY (`id_penilaian`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wika_intern.penilaian: ~0 rows (approximately)
REPLACE INTO `penilaian` (`id_penilaian`, `no_surat_penilaian`, `idUser`, `kedisiplinan`, `tanggung_jawab`, `kerapihan`, `komunikasi`, `pemahaman_pekerjaan`, `manajemen_waktu`, `kerjasama_tim`, `tgl_dibuat`) VALUES
	(1, 'PU.09.01/WIK.MJK.00341/2023', 33, 3.4, 3, 1, 3, 3, 3, 3, '2023-11-23');

-- Dumping structure for table wika_intern.quesioner
CREATE TABLE IF NOT EXISTS `quesioner` (
  `id_quest` int NOT NULL AUTO_INCREMENT,
  `quest` varchar(255) DEFAULT NULL,
  `text_bebas` int DEFAULT NULL,
  `ganda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lainnya` int DEFAULT NULL,
  `tgl_dibuat` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_quest`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table wika_intern.quesioner: ~3 rows (approximately)
REPLACE INTO `quesioner` (`id_quest`, `quest`, `text_bebas`, `ganda`, `lainnya`, `tgl_dibuat`, `updated`) VALUES
	(9, 'Pertanyaan?', 1, '[]', NULL, '2024-12-25 14:41:27', NULL),
	(10, 'Pertanyaan Ganda', 0, '["1","2","3","4","",""]', 2, '2024-12-25 14:41:55', '2024-12-25 15:04:34'),
	(12, 'Pilihan Bebas?', 0, '["1","2","34","55","",""]', 2, '2024-12-25 14:42:43', NULL);

-- Dumping structure for table wika_intern.suratbalasan
CREATE TABLE IF NOT EXISTS `suratbalasan` (
  `idSurat` int NOT NULL AUTO_INCREMENT,
  `nomorSuratBalasan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `asalSekolahPemohon` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tglDibuat` date NOT NULL,
  `nomorSuratMou` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tglSuratMou` date NOT NULL,
  `statusPemohon` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlahPemohon` int NOT NULL,
  `namaPemohon1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nim1` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jurusan1` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `namaPemohon2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nim2` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jurusan2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `namaPemohon3` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nim3` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jurusan3` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `namaPemohon4` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nim4` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jurusan4` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `namaPemohon5` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nim5` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jurusan5` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statusSurat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  `divisi` int NOT NULL,
  `namaPembimbing` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ttd_digital` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idSurat`),
  UNIQUE KEY `nomorSuratBalasan` (`nomorSuratBalasan`),
  KEY `divisi` (`divisi`),
  KEY `divisi_2` (`divisi`),
  CONSTRAINT `suratbalasan_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`idDivisi`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wika_intern.suratbalasan: ~4 rows (approximately)
REPLACE INTO `suratbalasan` (`idSurat`, `nomorSuratBalasan`, `asalSekolahPemohon`, `tglDibuat`, `nomorSuratMou`, `tglSuratMou`, `statusPemohon`, `jumlahPemohon`, `namaPemohon1`, `nim1`, `jurusan1`, `namaPemohon2`, `nim2`, `jurusan2`, `namaPemohon3`, `nim3`, `jurusan3`, `namaPemohon4`, `nim4`, `jurusan4`, `namaPemohon5`, `nim5`, `jurusan5`, `statusSurat`, `tglMulai`, `tglAkhir`, `divisi`, `namaPembimbing`, `ttd_digital`) VALUES
	(8, ' SE.01.01/WIK.C.MJK.KP.00030/2023 ', 'Rektor Sekolah Tinggi Teknologi Mandala ', '2023-11-02', '718/ITPB/FS/KP/X/2023', '2023-10-29', 'Mahasiswa', 1, 'Rizkan Ramdani', '2043055', 'Teknik Informatika', '', '', '', '', '', '', '', '', '', '', '', '', 'Belum Bisa Kami Terima', '2023-11-09', '2023-10-11', 5, '-', 'Personalia.png'),
	(9, ' SE.01.01/WIK.C.MJK.KP.00031/2023 ', 'Rektor Sekolah Tinggi Teknologi Mandala ', '2023-11-01', '719/ITPB/FS/KP/X/2023', '2023-10-30', 'Mahasiswa', 2, 'Aldian Hamid Maro', '2043088', 'Teknik Informatika', 'Arkharega', '204399', 'Teknik Informatika', '', '', '', '', '', '', '', '', '', 'Telah Kami Terima', '2023-11-30', '2024-01-30', 3, 'Bpk.Rijal Suhendra', 'Personalia.png'),
	(10, ' SE.01.01/WIK.C.MJK.KP.00032/2023 ', 'Rektor ', '2023-11-03', '937/UNINUS/FS/KP/X/2023', '2023-10-29', 'Mahasiswa', 5, 'Ajie Pangestu', '0983748', 'Teknik Informatika', 'Sopiana Marlina', '0098732', 'Teknik Informatika', 'Nabila Auliya', '3984777', 'Teknik Informatika', 'Zamzam Hamid', '2235438', 'Teknik Informatika', 'Yossandi Imran', '0987384', 'Teknik Informatika', 'Telah Kami Terima', '2023-12-07', '2024-02-07', 3, 'Bpk. Aldian Hamid Maro', 'Personalia1.png'),
	(11, ' SE.01.01/WIK.C.MJK.KP.00999/2023 ', 'Rektor Sekolah Tinggi Teknologi Mandala ', '2023-11-24', '718/ITPB/STT/KP/X/2023', '2023-11-09', 'Mahasiswa', 1, 'Arroyan', '99999', 'Teknik Informatika', '', '', '', '', '', '', '', '', '', '', '', '', 'Telah Kami Terima', '2023-11-08', '2023-12-08', 2, 'Bpk. Rijal Suhendra', 'Personalia11.png');

-- Dumping structure for table wika_intern.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` int NOT NULL,
  `namaLengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `noTelp` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamatRumah` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `asalSekolah` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jurusan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `divisi` int DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `roleId` tinyint(1) NOT NULL,
  `statusUser` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.png',
  `created_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`),
  UNIQUE KEY `email` (`email`),
  KEY `divisi` (`divisi`),
  KEY `roleId` (`roleId`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`idDivisi`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table wika_intern.user: ~9 rows (approximately)
REPLACE INTO `user` (`id`, `nim`, `namaLengkap`, `email`, `noTelp`, `password`, `alamatRumah`, `asalSekolah`, `jurusan`, `divisi`, `kehadiran`, `roleId`, `statusUser`, `isActive`, `profile`, `created_at`, `update_at`) VALUES
	(29, 99999, 'Aroyyan', 'aroy@gmail.com', '089273847323', '$2y$10$ybieB4Bixd6ZtI0BJ.pzj.YayZVgYpkit4ZKNqLUBIWWcuoRaYYdK', 'Cimahi', 'STT Mandala', 'Teknik Yang Pernah Ada', 1, 0, 3, NULL, 1, 'Screenshot_(1).png', '2023-10-28', '2023-11-04 18:24:40'),
	(30, 11111, 'Tono Sukaesih', 'tono@gmail.com', '08273647098', '$2y$10$JHQootDl915PLH35LEvX/uHjCf3ANHorw9HpmjR5Km0xybzRe.7ga', 'Cimahi', 'STT Mandala', 'Teknik Informatika', 1, 0, 3, NULL, 1, 'default.png', '2023-10-28', '2023-10-28 14:43:34'),
	(31, 7778383, 'Administrator', 'administrator@gmail.com', '082177777', '$2y$10$QXvaHOXVWvRRxlBb5SlL1OQeHpG6C1Z6e2OCnGjUfYx9He8ZzgAsG', '-', 'Office 1', 'HRD', 14, 0, 1, NULL, 1, 'default.png', '2023-10-28', '2023-11-05 05:58:29'),
	(32, 990, 'Boby Simanjuntak', 'boby@gmail.com', '098484', '$2y$10$usjnuO781xgmtRzZ9slpYu9.gKh9mAtDRZwPKx0/HhkR0lKlnB96i', 'NTT', 'UNINUS', 'Management', 3, 0, 3, NULL, 1, 'images.jpg', '2023-10-30', '2024-12-17 06:31:52'),
	(33, 99977, 'Lely', 'lely@gmail.com', '0988488', '$2y$10$NMkskgKKMnLVZSRSbfJ.j.XPUWvQWiBgtBuX6YBMGet31HH8jqMDe', 'Mandala', 'STT MANDALA', 'Informatika', 2, 0, 3, NULL, 1, 'default.png', '2023-10-31', '2023-10-31 10:59:31'),
	(36, 1102738411, 'Rizkan Ramdani', 'rizkan@gmail.com', '089273847388', '$2y$10$3Ouv0JBTl9EGHxnAs6rQ1OOz/goDwCL09KCBFos/4UJvyiHFfNq6i', 'Jl. Babakan Jati', '', '', 2, 0, 2, NULL, 1, 'default.png', '2023-11-05', '2023-11-05 05:50:37'),
	(38, 22222333, 'Anto', 'anto@gmail.com', '0896677', '$2y$10$HuGdtTbkJzIumBP3em0P.uC.AqX9AM4ZPnrzA7Qqj7KCsavXrpeOK', '', '', '', 3, NULL, 2, NULL, 1, 'default.png', '0000-00-00', '2023-11-05 07:29:01'),
	(39, 898989, 'IO', 'ui@gmail.com', '', '$2y$10$D372Oum4hM787Z15xUbYjOihR1rltTjeGMXvaxko4jsVLvU.Cpzle', '', '', '', 1, NULL, 2, NULL, 1, 'default.png', '0000-00-00', '2023-11-05 08:35:07'),
	(40, 2147483647, 'Devi Ajeng Witono Putri', 'devi@gmail.com', '085624432695', '$2y$10$czYiymumTQjyRG5wXQDgle/TozFAY6Iv8LRHXHgKpvbElEZD0Pdwm', 'Tangerang Selatan', 'Universitas Teknik Nusantara', '', 3, 0, 3, 'Mahasiswa', 1, 'images.jpg', '2024-12-17', '2024-12-17 06:32:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
