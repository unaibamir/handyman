-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 04:21 PM
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
(2, 'Admin', 'admin@admin.com', '$2y$10$6d1w6/iLxkCfbJAmxLagf.orO5aEd8oQ1TjdFgB0zyEXpgMEV5c1e', '03CzIZnnK2i5SxCeXpNqvz86tjeqBRWS6DwFgHK3hrEHyIB0v57Xl1x6D1xd', '2017-06-08 03:58:31', '2017-06-08 03:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `icon_type` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `icon_type`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'General', 'general', 1, 1, 'fa-cogs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pretium at massa at sollicitudin. Donec blandit, ex egestas scelerisque sagittis, enim elit scelerisque neque, at maximus diam est eget lorem. In quis magna sed quam feugiat pellentesque in at lorem. Fusce quis pretium nibh. Sed consequat sit amet justo non porta. Etiam facilisis suscipit nisi, eu faucibus arcu facilisis sed. Proin quis nisi ac ipsum convallis eleifend. Aliquam pellentesque id leo vel tristique.', '2017-08-01 05:13:53', '2017-08-02 03:44:27'),
(3, 'Plumber', 'plumber', 1, 0, 'http://localhost/ofc/handyman/public/media/cat/1501584203-plumber-100x100.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pretium at massa at sollicitudin. Donec blandit, ex egestas scelerisque sagittis, enim elit scelerisque neque, at maximus diam est eget lorem. In quis magna sed quam feugiat pellentesque in at lorem. Fusce quis pretium nibh. Sed consequat sit amet justo non porta. Etiam facilisis suscipit nisi, eu faucibus arcu facilisis sed. Proin quis nisi ac ipsum convallis eleifend. Aliquam pellentesque id leo vel tristique.', '2017-08-01 05:43:23', '2017-08-01 05:43:23'),
(4, 'Electrician', 'electrician', 1, 1, 'fa-bolt', 'Electrician description goes here. Electrician description goes here. Electrician description goes here. Electrician description goes here. Electrician description goes here. Electrician description goes here. Electrician description goes here.', '2017-08-01 05:49:05', '2017-08-01 06:17:46'),
(5, 'A/C Technician', 'a-c-technician', 1, 1, 'fa-snowflake-o', 'Looking for a HVAC Technician? We offer a premium HVAC (Heating, Ventilation and Air Conditioning) service.  No job is too small or big for us. Our HVAC Technicians are skilled, trained and professional, and can do any kind of HVAC job for you.', '2017-08-01 06:09:01', '2017-08-01 06:09:01'),
(6, 'Painter', 'painter', 1, 1, 'fa-paint-brush', 'Looking to paint your Home or Office? We now offer Painting services. No job is too small or big for us. Our painting service is provided through partners who are skilled, and professional. We can do paint work related to new construction as well as maintenance (such as white wash).', '2017-08-01 06:09:43', '2017-08-01 06:09:43'),
(8, 'Landscapers', 'landscapers', 1, 1, 'fa-certificate', 'TEST Category desc TEST Category desc TEST Category desc TEST Category desc TEST Category desc TEST Category desc TEST Category desc TEST Category desc TEST Category desc TEST Category desc TEST Category desc TEST Category desc', '2017-08-01 06:59:24', '2017-08-02 03:53:33'),
(9, 'Pest Control Contractors', 'pest-control-contractors', 1, 1, 'fa-balance-scale', 'TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc TEST Category 2 desc', '2017-08-01 06:59:48', '2017-08-02 03:54:06'),
(10, 'Asphalt Removal', 'asphalt-removal', 1, 1, 'fa-road', 'Need help finding an asphalt and paving contractor to repair your cracked driveway? We\'ll find you a professional. From paving driveways to sealcoating and hauling gravel, asphalt and paving contractors can get the job done- whatever task that may be. Porch is the free home network that connects homeowners and renters with the right home service professionals. Find the home professionals your neighbors love with our ratings and reviews available by previous customers.', '2017-08-02 07:47:35', '2017-08-02 07:47:35');

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
  `time` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `clients` (`id`, `username`, `email`, `password`, `fname`, `lname`, `latitude`, `longitude`, `user_image`, `bio`, `time`, `location`, `address`, `phone`, `city`, `state`, `country`, `postcode`, `is_active`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'client', 'client@client.com', '$2y$10$AzAiyXtcLUgybW9HjNbMm.S1S4XAHFG8GHH8YW7pp8cwt3mXs1HSy', 'Unaib', 'Amir', NULL, NULL, 'profiles/clients/default.png', NULL, 0, NULL, NULL, NULL, NULL, 'California', 'United States of America', NULL, 1, 1, '1DiPbeV88OPRtI2zArAgtLf2XFET4HyBi9SakYeJGyKuMKbBQlA30w9n2CCV', '2017-06-07 05:49:06', '2017-06-07 05:49:06'),
(7, 'schiller.teresa', 'mcdermott.gretchen@monahan.com', '$2y$10$EuSlB1RimmFacJN8K/CBs.rf3X7uHHZYG3SFiYBbNCxz8hiPwUCpC', 'Toney', 'Morissette', 28.06230110, -80.55520590, 'profiles/clients/default.png', 'Nihil sit quis dolorum minus qui quia eaque dolore. Laboriosam ea nobis omnis iste. Eaque non et sed at rerum nulla qui. Sit praesentium qui assumenda earum quam qui libero vel.', 0, '123 6th St.  Melbourne, FL 32904', '123 6th St.  Melbourne, FL 32904', NULL, 'Melbourne', 'Florida', 'United States of America', '32904', 1, 1, NULL, '2017-06-12 02:35:36', '2017-07-24 01:22:10'),
(14, 'unaibamir', 'u.amir@smartbaba.com', '$2y$10$CJy6rxFWGk.tKEwrigKxsep4zRMyQ9q0/T7lL8g8D3P7vBzypOnVK', 'Unaib', 'Amir', 33.56255630, 73.14997640, 'profiles/clients/default.png', 'Test Bio', 0, 'Street # 1, C Block Soan Gardens', 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', '3216646236', 'Dallas', 'Texas', 'United States of America', '75001', 0, 1, 'soPtoU6GTnC9C6u9WmSdJs205Z0y2Dt7tJLNjKRm1JqcEZXQND1Dcg7Gj5hq', '2017-06-13 05:25:09', '2017-07-24 00:49:51'),
(16, 'test123', 'test123@test.com', '$2y$10$sVUZUmDDf.5FKi/eU3klG.Dcl4MkuGy206ywB8Z5zWloCylt3ItlS', 'Unaib', 'Amir', NULL, NULL, 'profiles/clients/default.png', 'TEST BIO', 0, NULL, 'house # 410, Street # 87, Sector G-11/3', '3216646236', 'Islamabad', 'Alabama', 'United States of America', '44000', 0, 0, NULL, '2017-07-25 02:57:33', '2017-07-25 02:57:33'),
(17, 'unaibamiraziz@gmail.com', 'unaibamiraziz@gmail.com', '$2y$10$wG7c09l6Nk8GFojOY6Ng0eWkHHC5Z8Aw73bBBpjXdCF.6OIeuKmh.', 'Unaib', 'Amir', NULL, NULL, 'profiles/clients/default.png', NULL, 0, NULL, 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', '3216646236', NULL, NULL, 'United States of America', NULL, 0, 0, 'JFEzpj10YeTnK4MRA2AIQGS5T2oPdW9tyYH9CNxCpvfDzephj0TBMh7hYwqf', '2017-08-03 04:39:26', '2017-08-03 04:39:26');

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

--
-- Dumping data for table `clients_meta`
--

INSERT INTO `clients_meta` (`id`, `client_id`, `type`, `key`, `value`, `created_at`, `updated_at`) VALUES
(2, 3, 'string', 'qosi', 'no, not here', '2017-07-26 06:47:55', '2017-07-26 06:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(10) UNSIGNED NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=qued|1=inpogress|2=completed',
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `proposal_id`, `client_id`, `provider_id`, `status`, `start_time`, `end_time`, `amount`, `created_at`, `updated_at`, `job_id`) VALUES
(1, 1, 3, 1, 2, '123', '123', '234', '2017-08-07 10:23:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TIMESTAMP',
  `exp_level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'any',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0-open|1=ongoing|2=closed',
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `slug`, `desc`, `cat_id`, `client_id`, `phone`, `date`, `time`, `exp_level`, `job_type`, `address`, `lat`, `lng`, `state`, `city`, `status`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Need a work to be done', 'need-a-work-to-be-done', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis interdum hendrerit. Curabitur lectus ex, egestas vitae eros eget, varius dictum elit. Ut tempor, sem consequat rutrum vehicula, sapien lacus porta neque, eu vestibulum magna sapien at sapien. In hac habitasse platea dictumst. In nisi nisi, porta et venenatis eget, venenatis non tortor. Sed posuere felis ac dapibus faucibus. Donec lacinia nunc semper bibendum finibus. Nulla malesuada, ipsum id commodo euismod, ligula ligula mattis tortor, a varius felis purus vel purus. In nec nunc nec est tristique interdum. Pellentesque turpis enim, dignissim non placerat in, posuere ac nunc. Maecenas lacinia justo ac massa hendrerit, at cursus nisl tempus. Vestibulum justo ligula, fermentum non venenatis eget, dapibus vitae diam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras tempus, magna non auctor aliquet, sem dui auctor nunc, sed auctor dolor urna eu turpis.', 1, 3, '123456789', '08/15/2017', '16:00', 'any', 'any', '10011', '40.7464969', '-74.0094471', 'New York', 'Manhattan', 2, '1503756761', '2017-08-03 05:45:29', '2017-08-03 05:45:29'),
(3, 'Need handyman', 'need-handyman', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eros velit, molestie id elit sit amet, venenatis convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris rutrum justo non neque congue, id malesuada velit convallis. Phasellus condimentum cursus ligula, eu sodales lorem elementum sed. Integer ullamcorper gravida augue et ultrices. Nunc molestie placerat turpis, id pretium lacus viverra sit amet. Morbi luctus volutpat neque sed congue.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eros velit, molestie id elit sit amet, venenatis convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris rutrum justo non neque congue, id malesuada velit convallis. Phasellus condimentum cursus ligula, eu sodales lorem elementum sed. Integer ullamcorper gravida augue et ultrices. Nunc molestie placerat turpis, id pretium lacus viverra sit amet. Morbi luctus volutpat neque sed congue.', 3, 3, '+12312312345', '08/10/2017', '17:40', 'entry', 'fixed', '38343', '35.8449956', '-88.9222277', 'Tennessee', 'Humboldt', 0, '08/22/2017', '2017-08-03 10:56:06', '2017-08-03 10:56:06'),
(5, 'Need another guy for a small job', 'need-another-guy-for-a-small-job', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eros velit, molestie id elit sit amet, venenatis convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris rutrum justo non neque congue, id malesuada velit convallis. Phasellus condimentum cursus ligula, eu sodales lorem elementum sed. Integer ullamcorper gravida augue et ultrices. Nunc molestie placerat turpis, id pretium lacus viverra sit amet. Morbi luctus volutpat neque sed congue.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eros velit, molestie id elit sit amet, venenatis convallis massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris rutrum justo non neque congue, id malesuada velit convallis. Phasellus condimentum cursus ligula, eu sodales lorem elementum sed. Integer ullamcorper gravida augue et ultrices. Nunc molestie placerat turpis, id pretium lacus viverra sit amet. Morbi luctus volutpat neque sed congue.', 5, 3, '+12342342345', '08/15/2017', '18:00', 'exp', 'hourly', '80239', '39.8086537', '-104.8337879', 'Colorado', 'Denver', 0, '08/31/2017', '2017-08-03 12:01:04', '2017-08-03 12:01:04'),
(6, 'Need andother job urgent', 'need-andother-job-urgent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis interdum hendrerit. Curabitur lectus ex, egestas vitae eros eget, varius dictum elit. Ut tempor, sem consequat rutrum vehicula, sapien lacus porta neque, eu vestibulum magna sapien at sapien. In hac habitasse platea dictumst. In nisi nisi, porta et venenatis eget, venenatis non tortor. Sed posuere felis ac dapibus faucibus. Donec lacinia nunc semper bibendum finibus. Nulla malesuada, ipsum id commodo euismod, ligula ligula mattis tortor, a varius felis purus vel purus. In nec nunc nec est tristique interdum. Pellentesque turpis enim, dignissim non placerat in, posuere ac nunc. Maecenas lacinia justo ac massa hendrerit, at cursus nisl tempus. Vestibulum justo ligula, fermentum non venenatis eget, dapibus vitae diam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras tempus, magna non auctor aliquet, sem dui auctor nunc, sed auctor dolor urna eu turpis.', 9, 3, '+12342342345', '08/14/2017', '10:30', 'entry', 'any', '90001', '33.9697897', '-118.2468148', 'California', 'Los Angeles', 0, '08/24/2017', '2017-08-03 12:03:36', '2017-08-03 12:03:36'),
(7, 'Need a plumber for work to be done - updated', 'need-a-plumber-for-work-to-be-done-updated-1', '<p><font color=\"#222222\">ASDSAD ASDAS</font></p><p><font color=\"#222222\">ASDasdasdasdasd</font></p><p><font color=\"#222222\">asdasdasdas sda asd asd asddas</font></p>', 5, 3, '+12342342345', '08/14/2017', '08:00', 'entry', 'any', '90002', '33.9511133', '-118.2497386', 'California', 'Los Angeles', 0, '08/22/2017', '2017-08-04 02:56:26', '2017-08-09 05:58:55'),
(9, 'Test Job 123', 'test-job-123-1', '<p>This is a test job description.&nbsp;</p><p>It has some HTML formats. <b>TEST</b></p><p><u>Another test.</u></p>', 8, 3, '19879789876', '08/08/2017', '14:50', 'entry', 'any', '90001', '33.9697897', '-118.2468148', 'California', 'Los Angeles', 0, '08/29/2017', '2017-08-07 08:55:28', '2017-08-09 04:48:02');

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
(26, '2017_07_31_061348_create_categories_migration_table', 11),
(27, '2017_07_31_070648_drop_job_type_table', 12),
(28, '2017_07_31_070936_drop_job_type_provider_table', 13),
(29, '2017_07_31_121357_add_column_icon_type_categories_table', 14),
(30, '2017_08_01_084249_add_column_slug_categories_table', 15),
(31, '2017_08_01_084450_alter_column_slug_categories_table', 16),
(32, '2017_08_01_085107_add_column_slug_string_categories_table', 17),
(33, '2017_08_02_125220_alter_jobtype_name_category_providers_table', 18),
(34, '2017_08_03_082944_add_column_time_clients_table', 19),
(35, '2017_08_03_083426_create_jobs_table', 20),
(36, '2017_08_03_084313_create_job_proposals_table', 21),
(37, '2017_08_03_085438_add_column_awarded_to_jobs_table', 22),
(38, '2017_08_03_091703_remove_awarded_column_from_jobs_table', 23),
(39, '2017_08_03_091838_create_contract_table', 24),
(40, '2017_08_03_092300_alter_proposal_table', 24),
(41, '2017_08_03_092550_add_foreign_keys_to_proposal_tabel', 25),
(42, '2017_08_03_093828_alter_time_column_client_table', 26),
(44, '2017_08_03_104909_alter_job_table', 27),
(45, '2017_08_03_113808_add_column_client_id_proposal_table', 27),
(46, '2017_08_03_153941_add_time_column_jobs_table', 28),
(47, '2017_08_04_071633_add_slug_column_jobs_table', 29),
(48, '2017_08_04_081154_alter_slug_column_jobs_table', 30),
(49, '2017_08_04_122513_add_job_id_column_contract_table', 31),
(50, '2017_08_04_123158_alter_job_id_column_contract_table', 32),
(51, '2017_08_06_191527_rename_providerrate_to_explevel_job_table', 33),
(52, '2017_08_06_191914_add_job_type_column_jobs_table', 34),
(53, '2017_08_06_192108_drop_job_type_column_jobs_table', 35),
(54, '2017_08_06_192147_create_job_type_column_jobs_table', 36),
(55, '2017_08_06_192730_alter_exp_level_column_jobs_table', 37),
(56, '2017_08_07_202410_alter_columns_proposals_table', 38),
(57, '2017_08_09_124120_add_column_status_contracts_table', 39),
(58, '2017_08_10_064439_add_labour_and_material_cost_columns_proposals_table', 40);

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
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `labour_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `job_id`, `client_id`, `pro_id`, `desc`, `material_cost`, `labour_cost`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 'test', '184', '50', '234', 0, '2017-08-07 05:00:00', NULL),
(5, 5, 3, 1, 'test proposal desc', '500', '50', '550', 0, '2017-08-07 11:00:00', '2017-08-09 06:24:59'),
(6, 7, 3, 1, 'This is a test desc.', '300', '100', '400', 0, '2017-08-10 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `providers` (`id`, `category_id`, `username`, `email`, `password`, `fname`, `lname`, `latitude`, `longitude`, `user_image`, `bio`, `location`, `address`, `phone`, `city`, `state`, `country`, `postcode`, `is_active`, `is_approved`, `is_available`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'provider', 'provider@provider.com', '$2y$10$qMabM7E7Or9mYU/CzHCyVOj0dqAqe78LHhjgpHeK/TZ3sJl6wj0Qq', 'Unaib', 'Amir', 33.99332570, -118.39878420, NULL, NULL, 'Culver City, CA 90230, United States', 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', NULL, NULL, NULL, 'United States', NULL, 1, 1, 0, 'mQPBiPVTTsq3lQdVTsmL6flrSayrWrLVdgDFLOXfjtrhmWB1OziH8JFXcR30', '2017-06-08 01:15:30', '2017-07-24 02:18:02'),
(21, '1', 'unaibamiraziz@gmail.comm', 'unaibamiraziz@gmail.comm', '$2y$10$pTYcc7YjjncxPFUVcRJ2te8LKVnoEIgQpQBZ8QmZZeoJrgE1tsxvu', 'Unaib', 'Amir', 33.99332570, -118.39878420, NULL, NULL, 'Culver City, CA 90230, United States', 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', NULL, NULL, NULL, 'United States', NULL, 0, 1, 0, NULL, '2017-07-24 03:51:56', '2017-07-24 03:52:15'),
(22, '6', 'unaibamiraziz@gmail.com', 'unaibamiraziz@gmail.com', '$2y$10$2kRbf2cOGEqSVLXe2b9m7.GQuh8LTT.y/yFL0YSaMa/pgMK5fzNl.', 'Unaib', 'Amir', 33.96978970, -118.24681480, NULL, NULL, 'Los Angeles, CA 90001, United States', 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', NULL, NULL, NULL, 'United States', NULL, 0, 0, 0, NULL, '2017-08-03 12:11:32', '2017-08-03 12:11:32'),
(23, '9', 'zack@btech-group.com', 'zack@btech-group.com', '$2y$10$4iTXr963HfGDfpomaMR/2./wYeo/GgfSC8X63xN4.mQVr1l3AAglS', 'Zack', 'Malik', 33.96978970, -118.24681480, NULL, NULL, 'Los Angeles, CA 90001, United States', 'house # 410, Street # 87, Sector G-11/3, house # 410, Street # 87, Sector G-11/3', NULL, NULL, NULL, 'United States', NULL, 0, 0, 0, NULL, '2017-08-03 12:19:34', '2017-08-03 12:19:34');

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
(14, 21, 'string', 'bank_account', '000', '2017-07-24 03:51:56', '2017-07-24 03:51:56'),
(15, 22, 'string', 'bank_account', '098908q321', '2017-08-03 12:11:32', '2017-08-03 12:11:32'),
(16, 23, 'string', 'bank_account', '0000000', '2017-08-03 12:19:34', '2017-08-03 12:19:34');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_job_id_index` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobs_slug_unique` (`slug`),
  ADD KEY `jobs_title_index` (`title`),
  ADD KEY `jobs_client_id_index` (`client_id`),
  ADD KEY `jobs_cat_id_index` (`cat_id`),
  ADD KEY `jobs_slug_index` (`slug`);

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
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propsals_job_id_index` (`job_id`),
  ADD KEY `propsals_pro_id_index` (`pro_id`),
  ADD KEY `proposals_client_id_index` (`client_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `clients_meta`
--
ALTER TABLE `clients_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `providers_meta`
--
ALTER TABLE `providers_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `propsals_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `propsals_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `providers_meta`
--
ALTER TABLE `providers_meta`
  ADD CONSTRAINT `providers_table_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
