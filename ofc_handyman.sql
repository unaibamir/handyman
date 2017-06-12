-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2017 at 09:37 AM
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
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `username`, `email`, `password`, `fname`, `lname`, `latitude`, `longitude`, `user_image`, `bio`, `address`, `state`, `country`, `zipcode`, `is_active`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'client', 'client@client.com', '$2y$10$AzAiyXtcLUgybW9HjNbMm.S1S4XAHFG8GHH8YW7pp8cwt3mXs1HSy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '6e5GofaJSxq3FMsdp7Q8cNRr0XQY0RMua7gHD1MVPpbpxpLDxnKamRxdy19e', '2017-06-07 05:49:06', '2017-06-07 05:49:06'),
(4, 'hlittel', 'qmccullough@hotmail.com', '$2y$10$mnESmqrE6BK4mMC5BC8.ze8N.V1FDx.Khe/sFsQKf1qC9f8f9ckmG', 'Marilyne', 'Lemke', 67.65529100, 98.96904100, 'clients/images/default.jpg', 'Quod sunt eaque molestiae eum distinctio totam dolores. Neque est voluptas voluptas. Expedita et ab aut aut autem id.', NULL, 'Arizona', 'Sudan', '71204-4768', 1, 0, NULL, '2017-06-12 02:35:36', '2017-06-12 02:35:36'),
(5, 'velva34', 'douglas.joannie@hotmail.com', '$2y$10$v9V9Ez2MeYGxGetrccJx7.2kwEA2AzHHp/naV9XZWv9WwNQ4dzTZi', 'Callie', 'Gutkowski', -10.41949400, -114.21765200, 'clients/images/default.jpg', 'Ipsam ex iure voluptates nobis minima blanditiis. Quo in iure quia minus blanditiis nesciunt veniam minus. Suscipit qui architecto dolor delectus quibusdam.', NULL, 'Maryland', 'Saint Barthelemy', '08123-7839', 1, 0, NULL, '2017-06-12 02:35:36', '2017-06-12 02:35:36'),
(6, 'stoltenberg.cheyanne', 'klemke@hotmail.com', '$2y$10$0BzHyx98B789as16A9tngem6Lv1kkW65ote3cFYleLVHruwVZTnWy', 'Drew', 'Powlowski', 62.51098900, 46.63916700, 'clients/images/default.jpg', 'Impedit quidem fuga animi omnis. Nesciunt temporibus quo rerum placeat. Minima enim delectus molestias voluptatem est harum.', NULL, 'Arkansas', 'Mauritania', '87665-5766', 1, 0, NULL, '2017-06-12 02:35:36', '2017-06-12 02:35:36'),
(7, 'schiller.teresa', 'mcdermott.gretchen@monahan.com', '$2y$10$EuSlB1RimmFacJN8K/CBs.rf3X7uHHZYG3SFiYBbNCxz8hiPwUCpC', 'Toney', 'Morissette', -84.99534800, 53.16282300, 'clients/images/default.jpg', 'Nihil sit quis dolorum minus qui quia eaque dolore. Laboriosam ea nobis omnis iste. Eaque non et sed at rerum nulla qui. Sit praesentium qui assumenda earum quam qui libero vel.', NULL, 'Massachusetts', 'Maldives', '52700-9843', 1, 0, NULL, '2017-06-12 02:35:36', '2017-06-12 02:35:36'),
(8, 'ward.toni', 'sadie.johns@lynch.biz', '$2y$10$UYdRrrLIzBR4dknD6PeVLe3yU1k.bQZkUSwfZZnVyaY4Q/2YwB33i', 'Delilah', 'Frami', 70.32229900, -97.91845300, 'clients/images/default.jpg', 'Omnis assumenda et neque. Est excepturi ea rerum reiciendis magni sint.', NULL, 'North Carolina', 'Cocos (Keeling) Islands', '24774-2057', 1, 0, NULL, '2017-06-12 02:35:36', '2017-06-12 02:35:36'),
(9, 'carleton97', 'jenifer70@hotmail.com', '$2y$10$PdDrRxvogYftvk29ia5KNOq.Q9oGJKmpKn4G2Qg/6ITl7AqTO8Qte', 'Ludie', 'Nienow', 77.88224900, -125.03422200, 'clients/images/default.jpg', 'Et quam sint inventore amet cupiditate beatae facere est. Rerum totam cumque pariatur consequatur autem. Dolores aut exercitationem aut. Et officia pariatur error molestiae expedita.', NULL, 'Georgia', 'Morocco', '93077-8729', 1, 0, NULL, '2017-06-12 02:35:37', '2017-06-12 02:35:37'),
(10, 'jbeatty', 'waters.lilian@gmail.com', '$2y$10$u9et7OGIEEsiDOdSEsOc8u906R2yvM47DbClr3MF0GgtxzViIVzra', 'Brent', 'Spinka', -15.53582300, -102.99984900, 'clients/images/default.jpg', 'Consequuntur aut voluptatibus repellendus rerum sit iusto. Unde ullam aut voluptatem veritatis delectus animi enim repellat. Sed nemo quia delectus repudiandae.', NULL, 'Florida', 'Ireland', '31752', 1, 0, NULL, '2017-06-12 02:35:37', '2017-06-12 02:35:37'),
(11, 'alisha.huels', 'ttowne@feest.com', '$2y$10$EeneHFXtmr8Qs0OkV01CCuBOifNQb98LIT6I6EZZDuZs0wrZRTtOO', 'Dejuan', 'Marks', 3.26688400, -125.10584000, 'clients/images/default.jpg', 'Praesentium adipisci laboriosam nam quae aut. Modi et dicta fugit voluptatem similique voluptate. Quia rerum explicabo corrupti repudiandae eos nihil.', NULL, 'Wisconsin', 'Mauritania', '58523-7950', 1, 0, NULL, '2017-06-12 02:35:37', '2017-06-12 02:35:37'),
(12, 'elyse26', 'sam48@tromp.com', '$2y$10$xpG2YK.1awORI9kE5w680.fzSm/tNyREuEuICXrwnw8Ng5JLm05BK', 'Joel', 'Bode', -46.06066400, -174.67655000, 'clients/images/default.jpg', 'Inventore fugiat rerum voluptas quasi facere. Consequatur similique et quod sapiente non. Aut cupiditate laborum aut aliquam vel. Quia aliquid molestiae rerum quos quasi necessitatibus.', NULL, 'Kansas', 'Jamaica', '66563-1624', 1, 0, NULL, '2017-06-12 02:35:37', '2017-06-12 02:35:37'),
(13, 'lweissnat', 'xtowne@hotmail.com', '$2y$10$Zsz1AjcQwbAWbF/Xf5QPlem9i7vz.MpiHNhcDMCm/fUDBnUEu2TlO', 'Clifford', 'Funk', 60.66477200, 143.40495400, 'clients/images/default.jpg', 'Nam ut aut neque. Enim soluta eum odit ut. Et consectetur odio iusto doloribus. Voluptas nam laudantium atque odit maiores dolorem minima quod.', NULL, 'New Jersey', 'Palau', '79576', 1, 0, NULL, '2017-06-12 02:35:37', '2017-06-12 02:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `clients_table`
--

CREATE TABLE `clients_table` (
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
(14, '2017_06_12_070236_create_providers_meta_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
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
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `providers` (`id`, `username`, `email`, `password`, `fname`, `lname`, `latitude`, `longitude`, `user_image`, `bio`, `address`, `state`, `country`, `zipcode`, `is_active`, `is_approved`, `is_available`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'provider', 'provider@provider.com', '$2y$10$qMabM7E7Or9mYU/CzHCyVOj0dqAqe78LHhjgpHeK/TZ3sJl6wj0Qq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 'S0XW326d50d9XYniJETv9aI2jHzOkamT31CbWGpyxZ3n6v3e5scNovgC9dPV', '2017-06-08 01:15:30', '2017-06-08 01:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `providers_table`
--

CREATE TABLE `providers_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `clients_table`
--
ALTER TABLE `clients_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_table_client_id_index` (`client_id`),
  ADD KEY `clients_table_key_index` (`key`);

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
-- Indexes for table `providers_table`
--
ALTER TABLE `providers_table`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `clients_table`
--
ALTER TABLE `clients_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `providers_table`
--
ALTER TABLE `providers_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients_table`
--
ALTER TABLE `clients_table`
  ADD CONSTRAINT `clients_table_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `providers_table`
--
ALTER TABLE `providers_table`
  ADD CONSTRAINT `providers_table_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
