-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2025 pada 19.14
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managemensurat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_surats`
--

CREATE TABLE `master_surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `id_suratkeluar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mdl_surat_keluars`
--

CREATE TABLE `mdl_surat_keluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_agenda_keluar` int(11) DEFAULT NULL,
  `tanggal_surat` datetime DEFAULT NULL,
  `tgl_surat_keluar` datetime DEFAULT NULL,
  `tujuan_surat` varchar(255) DEFAULT NULL,
  `kode_surat` varchar(255) DEFAULT NULL,
  `no_surat_keluar` varchar(255) DEFAULT NULL,
  `prihal_surat_keluar` varchar(255) DEFAULT NULL,
  `file_surat_keluar` varchar(255) DEFAULT NULL,
  `penerima_surat_keluar` varchar(255) DEFAULT NULL,
  `pengirim_keluar` varchar(255) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `deleteSts` int(11) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mdl_surat_keluars`
--

INSERT INTO `mdl_surat_keluars` (`id`, `no_agenda_keluar`, `tanggal_surat`, `tgl_surat_keluar`, `tujuan_surat`, `kode_surat`, `no_surat_keluar`, `prihal_surat_keluar`, `file_surat_keluar`, `penerima_surat_keluar`, `pengirim_keluar`, `status`, `deleteSts`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(21, 5, '2024-12-26 12:00:00', '2024-12-26 12:00:00', 'JAKARTA', 'JKT005', '1', 'SK GUBERNUR JATENG 2025', '5_JKT005_1.pdf', 'STAFF PRESIDEN', 'DEDY', 'keluar', 0, 'admin', 'Test', '2024-12-25 11:04:14', '2025-01-07 11:05:19'),
(22, 2, '2025-01-07 12:00:00', '2025-01-08 12:00:00', 'SAMARINDA', 'SMRND003', '003', 'TEST', '2_SMRND003_003.pdf', 'JESICA', 'ADMIN', 'keluar', 1, 'admin', NULL, '2025-01-07 09:13:46', '2025-01-07 10:43:10'),
(23, 3, '2025-01-08 12:00:00', '2025-01-09 12:00:00', 'JAKARTA', 'JKT004', '4', 'TEST', '3_JKT004_4.pdf', 'ADMIN JKT', 'ADMIN SMG', 'keluar', 1, 'admin', NULL, '2025-01-07 10:47:44', '2025-01-07 10:47:52'),
(24, 4, '2025-01-08 12:00:00', '2025-01-08 12:00:00', 'SEMARANG', 'SMRG004', '004', 'TEST', '4_SMRG004_004.pdf', 'TEST USER', 'USER', 'keluar', 1, 'Test', NULL, '2025-01-07 10:51:17', '2025-01-07 11:01:01'),
(25, 6, '2025-01-08 12:00:00', '2025-01-08 12:00:00', 'SEMARANG', 'SMG006', '006', 'TEST', '6_SMG006_006.pdf', 'ADMIN', 'ADMIN', 'keluar', 1, 'admin', NULL, '2025-01-07 11:02:06', '2025-01-07 11:02:14'),
(26, 6, '2025-01-08 12:00:00', '2025-01-08 12:00:00', 'SEMARANG', 'JKT003', '03', 'TEST', '6_JKT003_03.pdf', 'SEMARANG TL', 'JAKARTA TL', 'keluar', 0, 'Test', 'Test', '2025-01-07 11:05:52', '2025-01-07 11:06:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mdl_surat_masuks`
--

CREATE TABLE `mdl_surat_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_agenda` int(11) DEFAULT NULL,
  `kode_surat` varchar(255) DEFAULT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL,
  `asal_surat` varchar(255) DEFAULT NULL,
  `prihal` varchar(255) DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `deleteSts` int(10) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `updatedBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mdl_surat_masuks`
--

INSERT INTO `mdl_surat_masuks` (`id`, `no_agenda`, `kode_surat`, `nomor_surat`, `tgl_masuk`, `tgl_terima`, `asal_surat`, `prihal`, `file_surat`, `penerima`, `status`, `deleteSts`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(13, 1, 'JKT003', '1', '2024-12-26 12:00:00', '2024-12-26 12:00:00', 'SEMARANG', 'SK PRESIDEN 2025', '1_JKT003_1.pdf', 'JESICCA', 'masuk', 0, 'admin', NULL, '2024-12-25 11:02:45', '2024-12-25 11:10:24'),
(14, 4, 'SMG004', '2', '2024-12-25 11:00:00', '2024-12-29 12:00:00', 'SMG', 'TESTING', '4_SMG004_2.pdf', 'ADAM', 'masuk', 0, 'admin', NULL, '2024-12-28 20:05:38', '2025-01-07 10:45:47'),
(15, 3, 'SMRND30', '3', '2024-12-29 12:00:00', '2024-12-29 12:00:00', 'SMRND', 'TEST', '3_SMRND30_3.pdf', 'ADAM', 'masuk', 1, 'admin', NULL, '2024-12-28 20:46:52', '2024-12-28 20:49:45'),
(16, 4, 'SMGR004', '3', '2025-01-07 12:00:00', '2025-01-07 12:00:00', 'SEMARANG', 'TESTING', '4_SMGR004_3.pdf', 'Admin', 'masuk', 1, 'admin', NULL, '2025-01-07 08:19:42', '2025-01-07 10:36:14'),
(17, 3, 'SMRG003', '3', '2025-01-07 12:00:00', '2025-01-07 12:00:00', 'SEMARANG', 'TEST', '3_SMRG003_3.pdf', 'Admin', 'masuk', 1, 'admin', NULL, '2025-01-07 09:12:37', '2025-01-07 09:12:52'),
(18, 4, 'TEST333', '334', '2025-01-08 12:00:00', '2025-01-08 12:00:00', 'SEMARANG', 'TEST', '4_TEST333_334.pdf', 'TEST', 'masuk', 1, 'admin', NULL, '2025-01-07 10:36:55', '2025-01-07 10:45:40'),
(19, 5, 'KODE5', '5', '2025-01-08 12:00:00', '2025-01-08 12:00:00', 'SEMARANG', 'TEST', '5_KODE5_5.pdf', 'USER', 'masuk', 0, 'admin', NULL, '2025-01-07 10:46:33', '2025-01-07 11:00:12'),
(20, 5, 'user05', '05', '2025-01-08 12:00:00', '2025-01-08 12:00:00', 'BALI', 'TEST', '5_user05_05.pdf', 'USER', 'masuk', 1, 'Test', NULL, '2025-01-07 10:50:32', '2025-01-07 11:00:00'),
(21, 6, 'JKT6', '6', '2025-01-08 12:00:00', '2025-01-09 12:00:00', 'JKT', 'TEST', '6_JKT6_6.pdf', 'ADMIN', 'masuk', 0, 'admin', NULL, '2025-01-07 11:00:45', '2025-01-07 11:00:45'),
(22, 7, 'SMG007', '007', '2025-01-08 12:00:00', '2025-01-09 12:00:00', 'SEMARANG', 'TEST', '7_SMG007_007.pdf', 'TEST', 'masuk', 0, 'Test', NULL, '2025-01-07 11:04:49', '2025-01-07 11:05:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_24_161249_create_mdl_surat_masuks_table', 2),
(5, '2024_12_24_161807_create_mdl_surat_keluars_table', 2),
(6, '2024_12_24_162815_create_master_surats_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NdnoZCm7jSO0mbtbEG8diwl45mdYzyDGQOuNKYTW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSDdTeUo5RGtxbXlmYU9ESHVZSEJLSjA2R0kzczZaMVN2dml3M1U5MiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1736273189);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(250) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$wdnJCFwDFr4vyy6KwAcLzurSAa3hv9W56f.O/oBYpf4cGj1H6uEJa', 'admin', NULL, '2024-12-23 06:51:14', '2025-01-07 11:03:14'),
(2, 'admin', 'haris@gmail.com', NULL, '$2y$12$zHliGHleCvB8aLIIN8eFQuHG78VYARxmRhT1CyQJDZsMOpXhjEf22', 'admin', NULL, '2024-12-23 07:26:34', '2024-12-25 09:30:48'),
(4, 'Markojo', 'markojo@gmail.com', NULL, '$2y$12$zHliGHleCvB8aLIIN8eFQuHG78VYARxmRhT1CyQJDZsMOpXhjEf22', 'admin', NULL, '2024-12-25 09:30:40', '2024-12-25 09:30:40'),
(5, 'jesica', 'jesica@gmail.com', NULL, '$2y$12$zHliGHleCvB8aLIIN8eFQuHG78VYARxmRhT1CyQJDZsMOpXhjEf22', 'user', NULL, '2024-12-25 11:22:11', '2024-12-25 11:22:11'),
(6, 'celsea', 'celsea@gmail.com', NULL, '$2y$12$H84.JsVR9V2XrG4JCrf0xuCrJ3Ol.GvYaC4GZsAovsua5AYcUbAgi', 'user', NULL, '2025-01-07 09:46:54', '2025-01-07 09:46:54'),
(7, 'Test', 'test@gmail.com', NULL, '$2y$12$LLMnwSz1bbNP5L4w6lozWeGILAool1spLbY68y8rDmOKs0JWWsWhG', 'user', NULL, '2025-01-07 10:48:12', '2025-01-07 11:06:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_surats`
--
ALTER TABLE `master_surats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mdl_surat_keluars`
--
ALTER TABLE `mdl_surat_keluars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mdl_surat_masuks`
--
ALTER TABLE `mdl_surat_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_surats`
--
ALTER TABLE `master_surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mdl_surat_keluars`
--
ALTER TABLE `mdl_surat_keluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `mdl_surat_masuks`
--
ALTER TABLE `mdl_surat_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
