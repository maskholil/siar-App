-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 04:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL DEFAULT 'pdf',
  `letter_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `path`, `filename`, `extension`, `letter_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, '1700906356-Timeline.pdf', 'pdf', 1, 1, '2023-11-25 10:59:16', '2023-11-25 10:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`id`, `code`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'A001', 'Undangan', 'jenis undangan', '2023-11-25 10:55:24', '2023-11-25 10:55:24'),
(2, 'B001', 'Rapat', 'jenis rapat', '2023-11-25 10:56:05', '2023-11-25 10:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `code`, `value`, `created_at`, `updated_at`) VALUES
(1, 'default_password', 'admin', NULL, NULL),
(2, 'page_size', '5', NULL, NULL),
(3, 'app_name', 'Aplikasi Surat Menyurat', NULL, NULL),
(4, 'institution_name', '404nfid', NULL, NULL),
(5, 'institution_address', 'Jl. Padat Karya', NULL, NULL),
(6, 'institution_phone', '082121212121', NULL, NULL),
(7, 'institution_email', 'admin@admin.com', NULL, NULL),
(8, 'language', 'id', NULL, NULL),
(9, 'pic', 'M. Iqbal Effendi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dispositions`
--

CREATE TABLE `dispositions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `content` text NOT NULL,
  `note` text DEFAULT NULL,
  `letter_status` bigint(20) UNSIGNED NOT NULL,
  `letter_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispositions`
--

INSERT INTO `dispositions` (`id`, `to`, `due_date`, `content`, `note`, `letter_status`, `letter_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'kaprodi', '2023-11-24', 'surat rapat', 'segera dibuka', 1, 1, 1, '2023-11-25 11:02:02', '2023-11-25 11:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_number` varchar(255) NOT NULL COMMENT 'Nomor Surat',
  `agenda_number` varchar(255) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `letter_date` date DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'incoming' COMMENT 'Surat Masuk (incoming)/Surat Keluar (outgoing)',
  `classification_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`id`, `reference_number`, `agenda_number`, `from`, `to`, `letter_date`, `received_date`, `description`, `note`, `type`, `classification_code`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '001', '012523', 'kepala dinas', NULL, '2023-11-23', '2023-11-25', 'acara rapat paripurna', NULL, 'incoming', 'B001', 1, '2023-11-25 10:59:15', '2023-11-25 10:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `letter_statuses`
--

CREATE TABLE `letter_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `letter_statuses`
--

INSERT INTO `letter_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'penting', '2023-11-25 11:01:04', '2023-11-25 11:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_05_081849_create_configs_table', 1),
(7, '2022_12_05_083409_create_letter_statuses_table', 1),
(8, '2022_12_05_083945_create_classifications_table', 1),
(9, '2022_12_05_084544_create_letters_table', 1),
(10, '2022_12_05_092303_create_dispositions_table', 1),
(11, '2022_12_05_093329_create_attachments_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(13, '2023_12_13_033627_create_table_surat_masuk', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk_table_kaprodi`
--

CREATE TABLE `surat_masuk_table_kaprodi` (
  `id` int(5) NOT NULL,
  `surat_masuk_id` int(5) NOT NULL,
  `kaprodi_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surat_masuk_table_kaprodi`
--

INSERT INTO `surat_masuk_table_kaprodi` (`id`, `surat_masuk_id`, `kaprodi_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-12-18 07:16:41', '2023-12-18 13:19:41'),
(2, 2, 1, '2023-12-18 11:16:41', '2023-12-18 11:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `table_kaprodi`
--

CREATE TABLE `table_kaprodi` (
  `id` int(11) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `nama_kaprodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_kaprodi`
--

INSERT INTO `table_kaprodi` (`id`, `fakultas`, `nama_kaprodi`) VALUES
(1, 'Fmikom', 'TI'),
(2, 'Fmikom', 'SI'),
(3, 'Fmikom', 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `table_peserta_rapat`
--

CREATE TABLE `table_peserta_rapat` (
  `id` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `rapat_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_rapat`
--

CREATE TABLE `table_rapat` (
  `id` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `dipimpin` varchar(255) NOT NULL,
  `sekertaris` varchar(255) NOT NULL,
  `jabatan_sekertaris` varchar(255) NOT NULL,
  `jabatan_pimpinan` varchar(255) NOT NULL,
  `rapat_dibuka` time NOT NULL,
  `rapat_ditutup` time NOT NULL,
  `hasil` text NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_rapat`
--

INSERT INTO `table_rapat` (`id`, `tanggal`, `tempat`, `judul`, `agenda`, `dipimpin`, `sekertaris`, `jabatan_sekertaris`, `jabatan_pimpinan`, `rapat_dibuka`, `rapat_ditutup`, `hasil`, `file`, `created_at`, `updated_at`) VALUES
(1, '2023-12-06', 'Ruang A1', 'Penyusunan Panitia Wisuda', 'coba', 'Bpk Budi', 'ibu sri', 'kaprodi', '', '00:00:00', '00:00:00', 'ksndajsndas', '', '2023-12-13 23:25:35', '2023-12-21 23:25:35'),
(2, '2023-12-01', 'gdug', 'abc', 'scas', 'asas', 'ddd', 'dddf', 'aaa', '01:19:00', '02:19:00', 'csdsds', '', '2023-12-18 17:19:59', '2023-12-18 17:19:59'),
(3, '2023-12-20', 'ruang rapat unugha', 'pembentukan panitia', 'panitia wisuda', 'Bapak Edi', 'Bu Ayu', 'Staff', 'Dekan', '09:15:00', '12:00:00', 'menghasilkan panitia yang jujur', '', '2023-12-19 17:11:21', '2023-12-19 17:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `table_surat_masuk`
--

CREATE TABLE `table_surat_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_agenda` varchar(255) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `kaprodi_id` int(25) NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_surat_masuk`
--

INSERT INTO `table_surat_masuk` (`id`, `nomor_agenda`, `nomor_surat`, `tanggal_surat`, `tanggal_masuk`, `pengirim`, `kaprodi_id`, `keterangan`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, '01', 'A01', '2023-12-01', '2023-12-05', 'dekan', 1, 'undangan', '', 0, '2023-12-11 12:38:53', '2023-12-18 08:25:33'),
(2, '02', 'A02', '2023-12-06', '2023-12-09', 'kaprodi', 2, 'undangan', '', 0, '2023-12-13 07:03:13', '2023-12-18 08:38:18'),
(3, '03', 'A03', '2023-12-15', '2023-12-15', 'kaprodi', 1, 'undangan', '1702479207_592-Article Text-2676-1-10-20220331.pdf', 0, '2023-12-13 07:53:27', '2023-12-18 08:43:06'),
(4, '04', 'A02', '2023-12-12', '2023-12-08', 'kaprodi', 3, 'undangan', '1702484274_SOP_ADMINISTRASI_SURAT_MASUK.pdf', 1, '2023-12-13 09:17:54', '2023-12-13 09:17:54'),
(5, '05', 'B5', '2023-12-12', '2023-12-15', 'dekan', 1, 'undangan', '1702492893_cupuz,+##default.groups.name.manager##,+7210-99Z_Artikel-50657-1-2-20200709.pdf', 0, '2023-12-13 11:41:34', '2023-12-18 10:30:35'),
(6, '06', 'A03', '2023-12-13', '2023-12-21', 'Dekan', 3, 'undangan', '1702909358_592-Article Text-2676-1-10-20220331.pdf', 0, '2023-12-18 07:22:38', '2023-12-18 08:38:33'),
(7, 'B001', 'B21', '2023-12-15', '2023-12-20', 'FKIP', 1, 'undangan', '1702920612_918-Article Text-3234-1-10-20210914.pdf', 1, '2023-12-18 10:30:12', '2023-12-18 10:30:12'),
(8, 'c01', 'c123', '2023-12-13', '2023-12-20', 'PT Sejahtera', 2, 'undangan', '1703005114_141-456-1-SM.pdf', 1, '2023-12-19 09:58:34', '2023-12-19 09:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'staff',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `profile_picture` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `phone`, `role`, `is_active`, `profile_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '2023-11-25 09:33:08', '$2y$10$RylbtZy2aeKgL/S2YMKzBuwGwatyocw7qAYsmZO1GfbK6Ovzc.dJu', NULL, NULL, '082121212121', 'admin', 1, 'http://127.0.0.1:8000/storage/avatars/1700906814-php952E.tmp.jpg', 'YnBaL5zvjoqoWDf4SRWbYmYn8GDC1cxQCG26nIrnrAdoropEnaTHa5IzfOht', '2023-11-25 09:33:08', '2023-11-25 11:06:54'),
(3, 'kaprodi', 'kaprodi@gmail.com', NULL, '$2y$10$zCalX96WNaIdT.TWXuT74.Oqs0jU98h4WNUBEbKg9lX/QaYEnKCXW', NULL, NULL, '08524244343', 'staff', 1, NULL, NULL, '2023-11-25 09:37:10', '2023-11-25 09:37:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_letter_id_foreign` (`letter_id`),
  ADD KEY `attachments_user_id_foreign` (`user_id`);

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classifications_code_unique` (`code`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `configs_code_unique` (`code`);

--
-- Indexes for table `dispositions`
--
ALTER TABLE `dispositions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dispositions_letter_status_foreign` (`letter_status`),
  ADD KEY `dispositions_letter_id_foreign` (`letter_id`),
  ADD KEY `dispositions_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `letters_reference_number_unique` (`reference_number`),
  ADD KEY `letters_classification_code_foreign` (`classification_code`),
  ADD KEY `letters_user_id_foreign` (`user_id`);

--
-- Indexes for table `letter_statuses`
--
ALTER TABLE `letter_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `surat_masuk_table_kaprodi`
--
ALTER TABLE `surat_masuk_table_kaprodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_kaprodi`
--
ALTER TABLE `table_kaprodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_peserta_rapat`
--
ALTER TABLE `table_peserta_rapat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_rapat`
--
ALTER TABLE `table_rapat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_surat_masuk`
--
ALTER TABLE `table_surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dispositions`
--
ALTER TABLE `dispositions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `letters`
--
ALTER TABLE `letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `letter_statuses`
--
ALTER TABLE `letter_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuk_table_kaprodi`
--
ALTER TABLE `surat_masuk_table_kaprodi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_kaprodi`
--
ALTER TABLE `table_kaprodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_peserta_rapat`
--
ALTER TABLE `table_peserta_rapat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_rapat`
--
ALTER TABLE `table_rapat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_surat_masuk`
--
ALTER TABLE `table_surat_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_letter_id_foreign` FOREIGN KEY (`letter_id`) REFERENCES `letters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attachments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dispositions`
--
ALTER TABLE `dispositions`
  ADD CONSTRAINT `dispositions_letter_id_foreign` FOREIGN KEY (`letter_id`) REFERENCES `letters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dispositions_letter_status_foreign` FOREIGN KEY (`letter_status`) REFERENCES `letter_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dispositions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `letters`
--
ALTER TABLE `letters`
  ADD CONSTRAINT `letters_classification_code_foreign` FOREIGN KEY (`classification_code`) REFERENCES `classifications` (`code`),
  ADD CONSTRAINT `letters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
