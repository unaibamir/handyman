-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2017 at 09:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofc_handyman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@admin.com', '$2y$10$6d1w6/iLxkCfbJAmxLagf.orO5aEd8oQ1TjdFgB0zyEXpgMEV5c1e', 'Di9pcuYoWj5J03SlXQiLxQZR2wrHFVbBDi0C3VfVF4CMTDTno9YQD9dMW1kj', '2017-06-08 03:58:31', '2017-06-08 03:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double(15,8) DEFAULT NULL,
  `longitude` double(15,8) DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `username`, `email`, `password`, `fname`, `lname`, `latitude`, `longitude`, `user_image`, `bio`, `location`, `address`, `phone`, `city`, `state`, `country`, `postcode`, `is_active`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'client', 'client@client.com', '$2y$10$AzAiyXtcLUgybW9HjNbMm.S1S4XAHFG8GHH8YW7pp8cwt3mXs1HSy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'j9N8iFdPwf2paMUVV2WdSZicas6bZCMZRDQGJJVQLzc6mwjJ6qXUqk76aISV', '2017-06-07 05:49:06', '2017-06-07 05:49:06'),
(4, 'hlittel', 'qmccullough@hotmail.com', '$2y$10$mnESmqrE6BK4mMC5BC8.ze8N.V1FDx.Khe/sFsQKf1qC9f8f9ckmG', 'Marilyne', 'Lemke', 67.65529100, 98.96904100, 'clients/images/default.jpg', 'Quod sunt eaque molestiae eum distinctio totam dolores. Neque est voluptas voluptas. Expedita et ab aut aut autem id.', NULL, NULL, NULL, NULL, 'Arizona', 'Sudan', '71204-4768', 0, 0, NULL, '2017-06-12 02:35:36', '2017-06-13 07:18:51'),
(6, 'stoltenberg.cheyanne', 'klemke@hotmail.com', '$2y$10$0BzHyx98B789as16A9tngem6Lv1kkW65ote3cFYleLVHruwVZTnWy', 'Drew', 'Powlowski', 62.51098900, 46.63916700, 'clients/images/default.jpg', 'Impedit quidem fuga animi omnis. Nesciunt temporibus quo rerum placeat. Minima enim delectus molestias voluptatem est harum.', NULL, NULL, NULL, NULL, 'Arkansas', 'Mauritania', '87665-5766', 0, 0, NULL, '2017-06-12 02:35:36', '2017-06-13 07:18:59'),
(7, 'schiller.teresa', 'mcdermott.gretchen@monahan.com', '$2y$10$EuSlB1RimmFacJN8K/CBs.rf3X7uHHZYG3SFiYBbNCxz8hiPwUCpC', 'Toney', 'Morissette', -84.99534800, 53.16282300, 'clients/images/default.jpg', 'Nihil sit quis dolorum minus qui quia eaque dolore. Laboriosam ea nobis omnis iste. Eaque non et sed at rerum nulla qui. Sit praesentium qui assumenda earum quam qui libero vel.', NULL, NULL, NULL, NULL, 'Massachusetts', 'Maldives', '52700-9843', 1, 0, NULL, '2017-06-12 02:35:36', '2017-06-13 07:24:27'),
(10, 'jbeatty', 'waters.lilian@gmail.com', '$2y$10$u9et7OGIEEsiDOdSEsOc8u906R2yvM47DbClr3MF0GgtxzViIVzra', 'Brent', 'Spinka', -15.53582300, -102.99984900, 'clients/images/default.jpg', 'Consequuntur aut voluptatibus repellendus rerum sit iusto. Unde ullam aut voluptatem veritatis delectus animi enim repellat. Sed nemo quia delectus repudiandae.', NULL, NULL, NULL, NULL, 'Florida', 'Ireland', '31752', 1, 0, NULL, '2017-06-12 02:35:37', '2017-06-12 02:35:37'),
(11, 'alisha.huels', 'ttowne@feest.com', '$2y$10$EeneHFXtmr8Qs0OkV01CCuBOifNQb98LIT6I6EZZDuZs0wrZRTtOO', 'Dejuan', 'Marks', 3.26688400, -125.10584000, 'clients/images/default.jpg', 'Praesentium adipisci laboriosam nam quae aut. Modi et dicta fugit voluptatem similique voluptate. Quia rerum explicabo corrupti repudiandae eos nihil.', NULL, NULL, NULL, NULL, 'Wisconsin', 'Mauritania', '58523-7950', 1, 0, NULL, '2017-06-12 02:35:37', '2017-06-12 02:35:37'),
(14, 'unaibamir', 'u.amir@smartbaba.com', '$2y$10$CJy6rxFWGk.tKEwrigKxsep4zRMyQ9q0/T7lL8g8D3P7vBzypOnVK', 'Unaib', 'Amir', 33.56255630, 73.14997640, NULL, 'Test Bio', 'Street # 1, C Block Soan Gardens', 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', '3216646236', 'Dallas', 'Taxas', 'United States of America', '75001', 0, 0, 'soPtoU6GTnC9C6u9WmSdJs205Z0y2Dt7tJLNjKRm1JqcEZXQND1Dcg7Gj5hq', '2017-06-13 05:25:09', '2017-06-13 05:25:09'),
(15, 'unaibamiraziz@gmail.com', 'unaibamiraziz@gmail.com', '$2y$10$1Ag5Gi3pVOZW039g.9TXHObaJ41Ah81NRIfYTr5FZVmmDxp7th7oq', 'Unaib', 'Amir', NULL, NULL, NULL, NULL, NULL, 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', '3216646236', NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-07-04 01:46:56', '2017-07-04 01:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `clients_meta`
--

CREATE TABLE `clients_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE `jobtype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`id`, `name`, `status`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Plumber', 1, NULL, 'plumber working people at lower rates', '2017-07-04 01:50:57', '2017-07-04 01:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `jobtype_provider`
--

CREATE TABLE `jobtype_provider` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2017_06_07_092636_create_client_table', 1),
(11, '2017_06_07_093412_create_providers_table', 1),
(12, '2017_06_08_063121_create_admin_users_table', 2),
(13, '2017_06_12_070108_create_clients_meta_table', 3),
(14, '2017_06_12_070236_create_providers_meta_table', 4),
(15, '2017_06_12_113036_alter_names_client_providers_meta_table', 5),
(16, '2017_06_12_113156_add_city_clients_table', 6),
(17, '2017_06_12_113230_add_city_providers_table', 7),
(18, '2017_06_12_115048_change_zipcode_postcode_clients_table', 8),
(19, '2017_06_12_115108_change_zipcode_postcode_providers_table', 8),
(20, '2017_06_12_115324_add_phone_column_client_table', 9),
(21, '2017_06_12_115346_add_phone_column_provider_table', 9),
(22, '2017_06_13_081643_add_location_column_clients_table', 10),
(23, '2017_06_13_081722_add_location_column_providers_table', 10),
(24, '2017_06_30_092647_create_job_type_table', 11),
(25, '2017_06_30_094842_create_job_type_provier_pivot_table', 11),
(26, '2017_07_04_130154_add_jobtype_id_column_to_providers_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('unaibamiraziz@gmail.com', '$2y$10$DpOWZpSAnAorCP/ylUFf6eNU8mqPs0MxezDPOXbyOm7kE1Y8vnRMy', '2017-07-05 01:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobtype_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double(15,8) DEFAULT NULL,
  `longitude` double(15,8) DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `is_available` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `jobtype_id`, `username`, `email`, `password`, `fname`, `lname`, `latitude`, `longitude`, `user_image`, `bio`, `location`, `address`, `phone`, `city`, `state`, `country`, `postcode`, `is_active`, `is_approved`, `is_available`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'provider', 'provider@provider.com', '$2y$10$qMabM7E7Or9mYU/CzHCyVOj0dqAqe78LHhjgpHeK/TZ3sJl6wj0Qq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 'mQPBiPVTTsq3lQdVTsmL6flrSayrWrLVdgDFLOXfjtrhmWB1OziH8JFXcR30', '2017-06-08 01:15:30', '2017-06-08 01:15:30'),
(6, '1', 'unaibamiraziz@gmail.com', 'unaibamiraziz@gmail.com', '$2y$10$zNGSFmWDFoKY8/ZjBRESPOi213s.GgocGORSgkn5Hw3o3K29wPUBK', 'Unaib', 'Amir', 40.72822390, -73.79485160, NULL, NULL, 'Queens, NY, United States', 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', NULL, NULL, NULL, 'us', NULL, 0, 0, 0, NULL, '2017-07-04 08:13:08', '2017-07-04 08:13:08'),
(8, '1', 'unaibamiraziz@gmail.comm', 'unaibamiraziz@gmail.comm', '$2y$10$zNGSFmWDFoKY8/ZjBRESPOi213s.GgocGORSgkn5Hw3o3K29wPUBK', 'Unaib', 'Amir', 40.72822390, -73.79485160, NULL, NULL, 'Queens, NY, United States', 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', NULL, NULL, NULL, 'us', NULL, 0, 0, 0, NULL, '2017-07-04 08:13:08', '2017-07-04 08:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `providers_meta`
--

CREATE TABLE `providers_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers_meta`
--

INSERT INTO `providers_meta` (`id`, `provider_id`, `type`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 6, 'string', 'bank_account', '00000-000', '2017-07-04 08:13:08', '2017-07-04 08:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Unaib Amir', 'unaibamiraziz@gmail.com', '$2y$10$38fNCOiTnoABOYm2aDAEVeJve8HRyQVC2Ku8bLYNHaXuQhEBEULNi', '7EJru9UZ97SZUsCZ4LXGUutUeYcA3Gp2qv5TPBcWlhENCHeHBXj1p0lgBtKm', '2017-06-08 01:18:46', '2017-06-08 01:18:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_username_unique` (`username`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `clients_meta`
--
ALTER TABLE `clients_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_table_client_id_index` (`client_id`),
  ADD KEY `clients_table_key_index` (`key`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtype_provider`
--
ALTER TABLE `jobtype_provider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobtype_provider_job_id_foreign` (`job_id`),
  ADD KEY `jobtype_provider_provider_id_foreign` (`provider_id`);

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
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `providers_username_unique` (`username`),
  ADD UNIQUE KEY `providers_email_unique` (`email`);

--
-- Indexes for table `providers_meta`
--
ALTER TABLE `providers_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `providers_table_provider_id_index` (`provider_id`),
  ADD KEY `providers_table_key_index` (`key`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `clients_meta`
--
ALTER TABLE `clients_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobtype_provider`
--
ALTER TABLE `jobtype_provider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `providers_meta`
--
ALTER TABLE `providers_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients_meta`
--
ALTER TABLE `clients_meta`
  ADD CONSTRAINT `clients_table_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobtype_provider`
--
ALTER TABLE `jobtype_provider`
  ADD CONSTRAINT `jobtype_provider_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobtype` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobtype_provider_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `providers_meta`
--
ALTER TABLE `providers_meta`
  ADD CONSTRAINT `providers_table_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
