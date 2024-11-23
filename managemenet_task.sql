-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 23, 2024 at 08:11 AM
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
-- Database: `managemenet_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name`, `instansi`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'budiganteng', 'universitas terbuka', 'bodibudi@gmail.com', '$2y$12$ZRqE5uWB3564lMcLDhrjKOHLfsUoenroek/m.AgJ5nrJReMyc3B/a', NULL, NULL, '2024-11-12 22:12:49', '2024-11-16 09:41:08', NULL),
(2, 'rangga simajuntak', 'universitas terbuka', 'ranggaganteng@gmail.com', '$2y$12$h4KmxvFjjVfHjHuKPWaamulYw2nXWw2XBAQZnHwxgau5uhY.85MdS', NULL, NULL, '2024-11-12 22:14:39', '2024-11-12 22:14:39', NULL),
(4, 'azharaja', 'universitas terbuka', 'azharaja@gmail.com', '$2y$12$VDk8nuGvNTGzEWF/b56vPu051vLY8EZQEL/h6fXHr1BLZv52n3PKC', NULL, NULL, '2024-11-12 22:26:20', '2024-11-12 22:26:20', NULL),
(5, 'demonic', 'universitas terbuka', 'demonicaja@gmail.com', '$2y$12$NplO26u4jqRfTIJxyN7yBOqz/u6jigM3eX6c4FeTR15xBYXS7AUIy', NULL, NULL, '2024-11-12 22:45:41', '2024-11-12 22:45:41', NULL),
(6, 'devaja', 'universitas terbuka', 'devaaja@gmail.com', '$2y$12$9StCmggSpy8sDFpPiHKoleDd6OlCSQq8nfIBpexAQ9i0DdHqHKIE2', NULL, NULL, '2024-11-15 08:35:43', '2024-11-15 08:35:43', NULL),
(7, 'iamramon', 'universitas terbuka', 'ramonaja@gmail.com', '$2y$12$K7f5iqiSfdWf9b5Mp/mFIeWn60P8WOBznXe..9NebTJH.pQL4ekh.', NULL, NULL, '2024-11-16 02:47:16', '2024-11-16 02:47:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authdashboards`
--

CREATE TABLE `authdashboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authdashboards`
--

INSERT INTO `authdashboards` (`id`, `name`, `email`, `password`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin123', 'adminaja@gmail.com', '$2y$12$D.tDbRcwrin.CG0BfzM2LOENizjul1sP/0pRHso12Gj1Y.cOpAcHu', NULL, '2024-11-15 02:27:13', '2024-11-15 02:27:13', NULL),
(2, 'rangga simajuntak', 'ranggaja@gmail.com', '$2y$12$WXdefifwcU8BgXyJNbmuT.Amd4XC6625MQA/bCFOhRmm1QYRvV6xC', NULL, '2024-11-15 07:46:28', '2024-11-15 07:46:28', NULL),
(3, 'devonsaya', 'devonaja@gmail.com', '$2y$12$9WxHw/qaUfvOyP274xOUiusgTUYSsQmPJeHQOaYLE7ibJ6mLTtNam', NULL, '2024-11-15 07:47:05', '2024-11-15 07:47:05', NULL),
(4, 'ambasing', 'saeja@gmail.com', '$2y$12$W2STPvQHCGT3dwfLpK5zFOt0/0GZCuKsYcqgJmCpyFAvU3coEwiTm', NULL, '2024-11-15 07:59:22', '2024-11-15 07:59:22', NULL),
(5, 'azharkhaibar', 'azharkhaibar@gmail.com', '$2y$12$timpBDxKxxhkYag0bNI8zup5pDJGdHZaW8sEy7l8D2jM1SytnV0UG', NULL, '2024-11-15 08:29:44', '2024-11-15 08:29:44', NULL),
(6, 'azharoiii', 'devaaja@gmail.com', '$2y$12$3oijISCS4DhZRn1u1bTy4.WbJaVGz1IW1sgNzlgsmLrZA9.tXR41W', NULL, '2024-11-15 08:32:27', '2024-11-15 08:32:27', NULL),
(7, 'adminkece', 'adminbaru@gmail.com', '$2y$12$8QEPcGWtWJbvFUZlO0p/2udAkerV1p/6rgwFhDMPTQcElLl2yhOQu', NULL, '2024-11-15 08:59:43', '2024-11-15 08:59:43', NULL),
(8, 'iamramon', 'ramonaja@gmail.com', '$2y$12$47PZuxCbwX3Wk7opHl6r6O8kV3piR78quspZZXRBkkKAC.cyQvODu', NULL, '2024-11-16 09:38:59', '2024-11-16 09:38:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_10_092020_create_instansi_table', 2),
(5, '2024_11_10_092134_add_instansi_to_users_table', 2),
(6, '2024_11_13_044949_create_auth_table', 3),
(18, '2024_11_13_055854_create_project_table', 4),
(19, '2024_11_13_060827_create_tugas_table', 4),
(20, '2024_11_13_061352_update_tugas_table', 4),
(21, '2024_11_13_061808_create_project_tugas_table', 5),
(24, '2024_11_14_070156_create_authdashboard_table', 6),
(25, '2024_11_15_092252_update_authdashboard_table', 6),
(27, '2024_11_15_092638_rename_authdashboard_to_authdashboards', 7),
(28, '2024_11_15_103047_add_document_path_to_tugas_table', 7);

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
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('belum dikerjakan','sedang dikerjakan','selesai') NOT NULL,
  `kategori_tugas` enum('web','design','maintance') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `projectname`, `description`, `status`, `kategori_tugas`, `created_at`, `updated_at`) VALUES
(13, 'Website Portofolio Personal', 'apa aja deh', 'belum dikerjakan', 'design', '2024-11-22 20:47:44', '2024-11-22 20:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `project_tugas`
--

CREATE TABLE `project_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `tugas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DJq2IOvJ280VUwxS7vD2Nxv0wgG7wSarUU9iJwvd', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidWtmR2xJVGR4RnlXQlprNTJnQkdtRFNleGJBYkVtTlpWY3NhWnNiSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvdHVnYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1732345835);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taskname` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('belum dikerjakan','sedang dikerjakan','selesai') NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `taskname`, `description`, `status`, `project_id`, `created_at`, `updated_at`, `document_path`) VALUES
(19, 'Desain Halaman Beranda Deskripsi: Membuat desain halaman beranda yang bersih dan modern, dengan fokus pada navigasi yang mudah dan presentasi portofolio yang jelas.', 'apa aja deh', 'belum dikerjakan', 13, '2024-11-22 20:47:44', '2024-11-22 20:47:44', NULL);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `instansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `instansi`) VALUES
(1, 'ranggasimanjuntak', 'ranggaaja@gmail.com', NULL, 'ranggaaja8989', NULL, NULL, NULL, 'universitas respati indonesia'),
(2, 'radendra', 'rajadendra@gmail.com', NULL, 'rajadendra89', NULL, NULL, NULL, 'universitas respati indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_email_unique` (`email`);

--
-- Indexes for table `authdashboards`
--
ALTER TABLE `authdashboards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authdashboard_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tugas`
--
ALTER TABLE `project_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_tugas_project_id_foreign` (`project_id`),
  ADD KEY `project_tugas_tugas_id_foreign` (`tugas_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_project_id_foreign` (`project_id`);

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
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `authdashboards`
--
ALTER TABLE `authdashboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project_tugas`
--
ALTER TABLE `project_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_tugas`
--
ALTER TABLE `project_tugas`
  ADD CONSTRAINT `project_tugas_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_tugas_tugas_id_foreign` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
