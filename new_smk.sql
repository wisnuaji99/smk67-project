-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 08:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-09-22-074153', 'App\\Database\\Migrations\\UsersTable', 'default', 'App', 1601449073, 1),
(2, '2020-09-30-061734', 'App\\Database\\Migrations\\UserRoles', 'default', 'App', 1601449129, 2),
(3, '2020-09-30-062549', 'App\\Database\\Migrations\\Roles', 'default', 'App', 1601449175, 3),
(4, '2020-09-30-063150', 'App\\Database\\Migrations\\SuratBackup', 'default', 'App', 1601449207, 4),
(5, '2020-09-30-063625', 'App\\Database\\Migrations\\SuratMasuk', 'default', 'App', 1601449231, 5),
(6, '2020-09-30-063935', 'App\\Database\\Migrations\\SuratUser', 'default', 'App', 1601449243, 6),
(7, '2020-09-30-064225', 'App\\Database\\Migrations\\Template', 'default', 'App', 1601449252, 7),
(8, '2020-09-30-064636', 'App\\Database\\Migrations\\UserSmk', 'default', 'App', 1601449260, 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name_role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name_role`) VALUES
(1, 'Operator'),
(2, 'Kepala Sekolah'),
(3, 'Guru'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `surat_backup`
--

CREATE TABLE `surat_backup` (
  `id` int(11) UNSIGNED NOT NULL,
  `nomor` varchar(100) DEFAULT NULL,
  `judul` varchar(45) NOT NULL,
  `file` text NOT NULL,
  `tgl_simpan` date NOT NULL,
  `disimpan_oleh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_backup`
--

INSERT INTO `surat_backup` (`id`, `nomor`, `judul`, `file`, `tgl_simpan`, `disimpan_oleh`) VALUES
(1, '12131hj23987i', 'surat izin cuti', 'surat cuti.pdf', '2019-03-12', 'staff tata usaha'),
(2, '12131hj82374i', 'surat kpk', 'surat kpk.pdf', '2020-04-05', 'kepala TU'),
(3, '1282374131hji', 'staff tata usaha', 'surat1.pdf', '2020-07-05', 'kepala sekolah'),
(4, '122398748131hji', ' tes11', 'surat11.pdf', '2011-11-11', '11');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `nomor` varchar(100) DEFAULT NULL,
  `judul` varchar(45) NOT NULL,
  `file` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `nomor`, `judul`, `file`, `status`) VALUES
(32, 'test1', 'surat permintaan', '2-932-1437 - Penyampaian SK No 429 ttg Kalender Akademik 2020-2021.pdf', 0),
(33, 'test2', 'surat untuk guru agama', '09 - Surat Edaran ttg Petunjuk Pelaksanaan PJJ di UNJ.pdf', 0),
(34, 'test3', 'surat untuk guru bahasa ', 'Buku_Pedoman PKL UNJ 2020_final.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `surat_user`
--

CREATE TABLE `surat_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `surat_id` int(11) NOT NULL,
  `tgl_kirim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pengirim` varchar(45) NOT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_user`
--

INSERT INTO `surat_user` (`id`, `user_id`, `surat_id`, `tgl_kirim`, `pengirim`, `status`) VALUES
(2, 15, 33, '2020-11-02 08:16:34', 'Dina', 2),
(3, 14, 32, '2020-11-02 07:35:49', 'Dina', 1),
(4, 15, 34, '2020-11-02 08:16:58', 'Dina', 3);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) UNSIGNED NOT NULL,
  `nomor` varchar(200) NOT NULL,
  `sifat` varchar(45) NOT NULL,
  `lampiran` varchar(45) NOT NULL,
  `hal` varchar(45) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jabatan_penulis` varchar(45) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `created_by` varchar(12) DEFAULT NULL,
  `isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `nomor`, `sifat`, `lampiran`, `hal`, `tgl_keluar`, `jabatan_penulis`, `user_id`, `created_by`, `isi`) VALUES
(4, '4', 'test2', 'TESTTEST2', 'pengetesan surat2', '2020-11-20', 'testdummy2', 15, 'Dina', '<p>pengetesan surat 2</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_tel` varchar(12) NOT NULL,
  `role_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `email`, `password`, `no_tel`, `role_id`) VALUES
(14, '35345678567', 'Wisnu', 'snuaji89@gmail.com', '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK', '083312093832', 3),
(15, '2343534645745', 'irvan', 'asisten91@gmail.com', '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK', '083312093832', 3),
(16, '96756565756', 'Dina', 'snuaji99@gmail.com', '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK', '083312093832', 1),
(17, '987654321', 'Lala', 'snuaji99@gmail.com', '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK', '083312093832', 2),
(18, '123456654321', 'Agung', 'snuaji99@gmail.com', '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK', '083312093832', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users_smk`
--

CREATE TABLE `users_smk` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `no_tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(100) NOT NULL,
  `role_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 4),
(4, 2, 3),
(5, 3, 1),
(6, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `surat_backup`
--
ALTER TABLE `surat_backup`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `surat_user`
--
ALTER TABLE `surat_user`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_user_surat` (`user_id`),
  ADD KEY `fk_surat_masuk` (`surat_id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `users_smk`
--
ALTER TABLE `users_smk`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_backup`
--
ALTER TABLE `surat_backup`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `surat_user`
--
ALTER TABLE `surat_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_smk`
--
ALTER TABLE `users_smk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_user`
--
ALTER TABLE `surat_user`
  ADD CONSTRAINT `fk_surat_masuk` FOREIGN KEY (`surat_id`) REFERENCES `surat_masuk` (`id`),
  ADD CONSTRAINT `fk_user_surat` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
