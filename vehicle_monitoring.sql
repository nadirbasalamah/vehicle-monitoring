-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2022 at 07:14 AM
-- Server version: 10.6.4-MariaDB-log
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 'App\\Models\\Vehicle', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"truk besar\",\"vehicle_type\":\"barang\",\"fuel_consumption\":120,\"service_schedule\":\"2023-01-01\",\"vehicle_ownership_type\":\"perusahaan\"}}', NULL, '2022-04-04 23:50:50', '2022-04-04 23:50:50'),
(2, 'default', 'updated', 'App\\Models\\Vehicle', 'updated', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"truk besar banget\",\"vehicle_type\":\"barang\",\"fuel_consumption\":1200,\"service_schedule\":\"2023-01-01\",\"vehicle_ownership_type\":\"perusahaan\"},\"old\":{\"name\":\"truk besar\",\"vehicle_type\":\"barang\",\"fuel_consumption\":120,\"service_schedule\":\"2023-01-01\",\"vehicle_ownership_type\":\"perusahaan\"}}', NULL, '2022-04-04 23:55:51', '2022-04-04 23:55:51'),
(3, 'default', 'updated', 'App\\Models\\Vehicle', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"minibus besar\",\"vehicle_type\":\"angkutan\",\"fuel_consumption\":15,\"service_schedule\":\"2022-04-05\",\"vehicle_ownership_type\":\"sewa\"},\"old\":{\"name\":\"minibus\",\"vehicle_type\":\"angkutan\",\"fuel_consumption\":12,\"service_schedule\":\"2022-04-05\",\"vehicle_ownership_type\":\"sewa\"}}', NULL, '2022-04-05 00:01:26', '2022-04-05 00:01:26'),
(4, 'default', 'created', 'App\\Models\\Pool', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"vehicle_id\":2,\"driver\":\"jacques\",\"agreement_id\":3,\"start_date\":\"2023-01-01\",\"finish_date\":\"2023-01-02\",\"status\":\"Menunggu Persetujuan\"}}', NULL, '2022-04-05 00:06:47', '2022-04-05 00:06:47'),
(5, 'default', 'updated', 'App\\Models\\Pool', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"vehicle_id\":2,\"driver\":\"jacques\",\"agreement_id\":3,\"start_date\":\"2023-01-01\",\"finish_date\":\"2023-01-02\",\"status\":\"Ditolak oleh pihakdua, truk masih dalam perbaikan\"},\"old\":{\"vehicle_id\":2,\"driver\":\"jacques\",\"agreement_id\":3,\"start_date\":\"2023-01-01\",\"finish_date\":\"2023-01-02\",\"status\":\"Menunggu Persetujuan\"}}', NULL, '2022-04-05 00:07:28', '2022-04-05 00:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2021_08_17_020119_create_vehicles_table', 1),
(14, '2021_08_17_020646_create_pools_table', 1),
(15, '2022_04_05_064309_create_activity_log_table', 2),
(16, '2022_04_05_064310_add_event_column_to_activity_log_table', 2),
(17, '2022_04_05_064311_add_batch_uuid_column_to_activity_log_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pools`
--

CREATE TABLE `pools` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finish_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pools`
--

INSERT INTO `pools` (`id`, `vehicle_id`, `driver`, `agreement_id`, `start_date`, `finish_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ridan', 2, '2022-01-01', '2023-01-01', 'Disetujui oleh pihaksatu, bisa dilanjut', '2022-04-04 23:24:01', '2022-04-04 23:32:02'),
(2, 1, 'jackson', 2, '2022-09-09', '2022-09-10', 'Disetujui oleh pihaksatu, setuju', '2022-04-04 23:36:17', '2022-04-04 23:36:44'),
(3, 2, 'jacques', 3, '2023-01-01', '2023-01-02', 'Ditolak oleh pihakdua, truk masih dalam perbaikan', '2022-04-05 00:06:47', '2022-04-05 00:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$6RV654MXGDEZRoOTd6uU3urQPZBE57jmzH4cmnCyz4qBLak57pNh6', 'admin', NULL, '2022-04-04 22:53:41', '2022-04-04 22:53:41'),
(2, 'pihaksatu', 'test@test.com', '$2y$10$bP0Owa8OTkHZ4ftXzUK1Yu1JZ4Gur/3mAaViMXZC//9y/N47PWUZC', 'agreement', NULL, '2022-04-04 23:11:19', '2022-04-04 23:11:19'),
(3, 'pihakdua', 'pihakdua@mail.com', '$2y$10$FIZCAlpDhQDWnkqtBRfr6.hd.fa6sZ1nm1l6GEn28wAk4Oc2ox/dW', 'agreement', NULL, '2022-04-04 23:35:45', '2022-04-04 23:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_consumption` int(11) NOT NULL,
  `service_schedule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_ownership_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `vehicle_type`, `fuel_consumption`, `service_schedule`, `vehicle_ownership_type`, `created_at`, `updated_at`) VALUES
(1, 'minibus besar', 'angkutan', 15, '2022-04-05', 'sewa', '2022-04-04 22:55:40', '2022-04-05 00:01:26'),
(2, 'truk besar banget', 'barang', 1200, '2023-01-01', 'perusahaan', '2022-04-04 23:50:50', '2022-04-04 23:55:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `pools`
--
ALTER TABLE `pools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pools_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pools`
--
ALTER TABLE `pools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pools`
--
ALTER TABLE `pools`
  ADD CONSTRAINT `pools_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
