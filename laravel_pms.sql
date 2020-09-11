-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 07:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doc_id`, `doc_name`, `department`, `patient_id`, `patient_name`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Mahakal', 'Neurology', 2, 'Harry', '2020-09-08', '14:51:00', '2020-09-08 03:52:02', '2020-09-08 03:52:02'),
(5, NULL, 'Dr Mike', 'Cardiology', 5, 'Moon', '2020-09-12', '18:10:00', '2020-09-10 07:10:23', '2020-09-10 07:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_08_27_151209_create_roles_table', 1),
(32, '2014_10_12_000000_create_users_table', 2),
(69, '2020_08_26_081752_create_patients_table', 3),
(70, '2020_08_26_081820_create_wards_table', 3),
(71, '2020_08_26_081857_create_appointments_table', 3),
(72, '2020_08_27_154236_create_permissions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bharti@gmail.com', 'tvmOjMS6QtwX1H58hzan8mx5ENIoSt', '2020-09-10 09:18:42'),
('bharti@gmail.com', 'YK0gYmSdnfwGVXL9RrYhwC28gdE30n', '2020-09-10 09:20:01'),
('bharti@gmail.com', 'PnEAO1dTNzqd7GaXBVBz8tqJxmuGME', '2020-09-10 09:21:14'),
('bharti@gmail.com', 'zCuUpTzYdWdMxjtFUgCje6Gr6YBNTc', '2020-09-10 09:23:59'),
('bharti@gmail.com', 'ifW96e9G2mdZShxkKUtL24b4d9YzwK', '2020-09-10 09:26:31'),
('bharti@gmail.com', 'lUU1Vp5GPZRLI7ne1BUaYMQb4HWL5T', '2020-09-10 09:32:37'),
('bharti@gmail.com', 'jSmm5WwQql3Scf6xDitCGVwqH1W6xQ', '2020-09-10 09:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `blood_grp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `phone_no`, `address`, `gender`, `age`, `blood_grp`, `dob`, `created_at`, `updated_at`) VALUES
(1, 'Light', 'light@gmail.com', '917892341542', 'Lighthouse', 'male', 20, 'O postive', '2020-09-07', '2020-09-07 02:49:18', '2020-09-07 02:49:18'),
(2, 'Harry', 'harry@gmail.com', '917991234561', 'London', 'male', 40, 'A negative', '1980-09-08', '2020-09-08 03:52:02', '2020-09-08 03:52:02'),
(3, 'Riya', 'riya@gmail.com', '917890986543', 'Somewhere on earth', 'female', 50, 'A positive', '1970-01-08', '2020-09-08 04:16:27', '2020-09-08 04:16:27'),
(5, 'Moon', 'moon@gmail.com', '917890986780', 'Space', 'female', 22, 'AB positive', '1999-09-10', '2020-09-10 06:49:35', '2020-09-10 06:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `discription`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'The admin', '2020-08-27 15:54:49', '2020-08-27 15:54:49'),
(2, 'doctor', 'The doctor', '2020-08-27 15:54:49', '2020-08-27 15:54:49'),
(3, 'staff', 'The Staff', '2020-08-27 15:55:59', '2020-08-27 15:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `consultancy_fee` int(11) DEFAULT NULL,
  `consultancy_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `phone_no`, `department`, `time_from`, `time_to`, `consultancy_fee`, `consultancy_days`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Ayush', 'ayush@gmail.com', NULL, '$2y$10$/X4lBOQ.RGGzvinXEP3qte51FH2fY4GgN1m3Xh8lmdQrLds3kw7H6', 'Kotafactory', 918907990808, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-03 03:08:47', '2020-09-03 03:08:47', 1),
(2, 'Bharti', 'bharti@gmail.com', NULL, '$2y$10$wO3IdXAk1JJKE5bYPSnOa.sTyO3cdZpyjBOo1pBGeWeNQeIazqKv6', 'Patna', 916870998907, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-03 03:12:20', '2020-09-03 03:12:20', 1),
(3, 'Mahakal', 'mahakal@gmail.com', NULL, '$2y$10$suBTNwlrUkpFgrcW8PjKb.n7Id9v8.3gQYssy6CyU7cwlioW88J2a', 'Himalayas', 917899078906, 'Neurology', '09:00:00', '18:00:00', 600, 'Monday, Wednesday, Friday', NULL, '2020-09-03 03:14:14', '2020-09-03 03:14:14', 2),
(4, 'Doremon', 'doremon@gmail.com', NULL, '$2y$10$YjiYdHp8q.vPE7kj9y5f7OEANqvCKm3QY8pfYG5zZdsCMG/FZLJ4K', 'Lucknow', 918007096323, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-03 03:15:59', '2020-09-03 03:15:59', 3),
(7, 'Pikachu', 'pikachu@gmail.com', NULL, '$2y$10$KwgZdT59.M5JezFbDy/84Oj5RC08jnbsyz/QoZAJMaV2QutOaoE2C', 'Pallete town', 918932165543, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-08 05:40:28', '2020-09-10 08:11:41', 3),
(10, 'Mike', 'drmike@gmail.com', NULL, '$2y$10$lIwh5tjmzEWtfFShl58b5.6gzd4UasfX4xZWs.8S0F2WPvFTSnncC', 'London', 917891234321, 'Cardiology', '20:00:00', '23:00:00', 2000, 'Monday, Wednesday, Thursday', NULL, '2020-09-10 08:58:04', '2020-09-10 08:58:04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `No_of_days` int(11) DEFAULT NULL,
  `bed_no` int(11) NOT NULL,
  `charges` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `patient_id`, `patient_name`, `doc_id`, `doc_name`, `department`, `ward_type`, `No_of_days`, `bed_no`, `charges`, `status`, `date`, `created_at`, `updated_at`) VALUES
(4, NULL, 'Harry', NULL, 'Mahakal', 'Neurology', 'general', 2, 5, 2000, 1, '2020-09-11', '2020-09-10 03:00:29', '2020-09-10 03:00:29'),
(5, NULL, 'Harry', NULL, 'Mahakal', 'Neurology', 'private', NULL, 3, NULL, 0, '2020-09-10', '2020-09-10 06:41:52', '2020-09-10 07:27:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doc_id_foreign` (`doc_id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wards_patient_id_foreign` (`patient_id`),
  ADD KEY `wards_doc_id_foreign` (`doc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wards_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
