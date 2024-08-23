-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 07:35 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `day` int(10) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `approved` enum('Yes','No','Pending') NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `from`, `to`, `day`, `reason`, `approved`, `uid`, `created_at`, `updated_at`) VALUES
(1, '2024-08-21', '2024-08-23', 2, 'Sick leave', 'Yes', 3, '2024-08-21 03:04:42', '2024-08-21 03:04:42'),
(3, '2024-08-22', '2024-08-23', 1, 'Bike repair', 'No', 2, '2024-08-21 15:01:59', '2024-08-21 15:01:59'),
(4, '2024-08-28', '2024-08-29', 1, 'Health check-up', 'Yes', 7, '2024-08-21 21:03:40', '2024-08-21 21:03:40'),
(5, '2024-09-04', '2024-09-05', 1, 'Bike repair', 'No', 7, '2024-08-21 21:50:01', '2024-08-21 21:50:01'),
(7, '2024-09-03', '2024-09-08', 5, 'Personal reasons', 'Pending', 4, '2024-08-21 21:59:03', '2024-08-21 21:59:03');

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
(4, '2024_08_20_163455_create_applications_table', 1);

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
('dHfMOM1D2Gc1UT82kkuMDoRRWQvVHlFTEONBFdok', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGFoNDlYcmVhZXp5eWd4bmk4WHE4UjRRckg4VXdLS3lPYmo4Qnd4OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NvdW50L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1724433792),
('p3hWOuoYrNhYskLS2snkNQ4FYoFNlbZicTK4CHlq', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOEtXNWRjYXZxTXVyVU9YcEVpVWIyaHdtckN2OFlWbVpBQ2tlTTFkdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NvdW50L2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1724301674);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dept` enum('Information Technology','Sales & Marketing','Finance & Accounting','Human Resources') NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` enum('Employee','HR') NOT NULL DEFAULT 'Employee',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `gender`, `address`, `dept`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(1, 'S. Mitra', 'tempcode1260@gmail.com', '$2y$12$oPwFELe7r0cRwzAPUr2HrOrANJGiH2FhKRm0b86GEvdMeBU0R2e6G', NULL, 'Female', 'Kolkata', 'Human Resources', NULL, 'HR', '2024-08-20 17:13:00', NULL),
(2, 'D. Dey', 'dd@gmail.com', '$2y$12$0lXqmqAxm/MztxKvmSubB.Va1L6QwwTO02ZnoHam0rZOpMIZKUbWy', NULL, 'Female', 'Howrah', 'Finance & Accounting', '20_08_2024_17_21_46.jpeg', 'Employee', '2024-08-20 11:51:46', '2024-08-20 11:51:46'),
(3, 'R. Roy', 'rr@gmail.com', '$2y$12$iH0HTpUfm8N4xmaqqqSB6.18lfdPj3s7rMGM41fOxoalkY/PQ0Noy', NULL, 'Female', 'Baruipur', 'Finance & Accounting', '20_08_2024_17_22_36.jpeg', 'Employee', '2024-08-20 11:52:36', '2024-08-20 11:52:36'),
(4, 'A. Das', 'ad@gmail.com', '$2y$12$X5wCCyo3Tr7GXKJLbiQgteR1iN9hudzxwqqGldqqiqcUVZCw.rNZi', NULL, 'Male', 'Ranaghat', 'Sales & Marketing', '20_08_2024_17_23_23.jpeg', 'Employee', '2024-08-20 11:53:23', '2024-08-23 11:52:33'),
(5, 'A. Paul', 'ap@gmail.com', '$2y$12$v2SSoxpCfw2Z0g.CvirVK..ZhC3H815FsMLJCAw2YDuBjqMj4Tfx.', NULL, 'Female', 'Dum Dum', 'Sales & Marketing', '20_08_2024_17_24_10.jpeg', 'Employee', '2024-08-20 11:54:10', '2024-08-20 11:54:10'),
(6, 'S. Sarma', 'ss@gmail.com', '$2y$12$gQomFsi8EngtLQsKppSVxuqxrJJfD3fo2PHmZccXW8rokzgsBZXmS', NULL, 'Female', 'Barrackpur', 'Information Technology', '20_08_2024_17_25_20.jpeg', 'Employee', '2024-08-20 11:55:20', '2024-08-20 11:55:20'),
(7, 'S. Mali', 'shirsendu1260@gmail.com', '$2y$12$6lXyz001PZL.4ofQc9u.qeGkJlhYEaamJftPFPoVKNCjb0Bg1Xlz2', NULL, 'Male', 'Kolkata', 'Information Technology', '20_08_2024_17_25_56.jpeg', 'Employee', '2024-08-20 11:55:56', '2024-08-20 11:55:56'),
(8, 'C. Das', 'cd@gmail.com', '$2y$12$A0OD.uLncRlTjIi7kvU3NumjQb/Fj1OQhdu4RFENGT0WO43HD3efO', NULL, 'Male', 'Hooghly', 'Finance & Accounting', '20_08_2024_17_27_09.jpeg', 'Employee', '2024-08-20 11:57:09', '2024-08-20 11:57:09'),
(9, 'B. Manna', 'bm@gmail.com', '$2y$12$pmfdV8xxCD7dYtba4uD3ruqwsRaN/1iE7.K7ssiiFIIJrUfcvYBKq', NULL, 'Female', 'Kolkata', 'Sales & Marketing', '20_08_2024_17_28_30.jpeg', 'Employee', '2024-08-20 11:58:30', '2024-08-20 11:58:30'),
(10, 'N. Ghosh', 'ng@gmail.com', '$2y$12$Sj8yjw.dB2ja2NdIPiKMUO9nAnHiSz/tMYYdnD4iIUmiMPtMm2Tle', NULL, 'Male', 'Kolkata', 'Finance & Accounting', '20_08_2024_17_30_04.jpeg', 'Employee', '2024-08-20 12:00:04', '2024-08-20 12:00:04'),
(11, 'P. Saha', 'ps@gmail.com', '$2y$12$/icLVxTlzHLJDvyIh4ZZZ.1y90xNYIA6mpw3On3hqBpHPd889KkMO', NULL, 'Male', 'Dum Dum', 'Information Technology', '20_08_2024_17_31_36.jpeg', 'Employee', '2024-08-20 12:01:36', '2024-08-20 12:01:36'),
(12, 'K. Rahman', 'kr@gmail.com', '$2y$12$egjzGmudsDNcfZ3aLs3AL.VIW7JTZb4cpVwZHZzm2WIyo3iBFYV6C', NULL, 'Female', 'Howrah', 'Information Technology', '21_08_2024_07_59_33.jpeg', 'Employee', '2024-08-21 02:29:33', '2024-08-21 02:29:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_uid_foreign` (`uid`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
