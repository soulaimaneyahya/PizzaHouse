-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2021 at 10:57 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzahouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `base`
--

DROP TABLE IF EXISTS `base`;
CREATE TABLE IF NOT EXISTS `base` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `base`
--

INSERT INTO `base` (`id`, `base`) VALUES
(1, 'Thick'),
(2, 'Thin & Crispy'),
(3, 'Cheese Crust'),
(4, 'Garlic Crust');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(51, '2014_10_12_000000_create_users_table', 1),
(52, '2014_10_12_100000_create_password_resets_table', 1),
(53, '2019_08_19_000000_create_failed_jobs_table', 1),
(54, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(55, '2021_11_19_230757_create_pizzahouses_table', 1),
(56, '2021_11_21_111814_create_type_table', 2),
(57, '2021_11_21_112140_create_base_table', 3),
(61, '2021_11_21_120737_add_column_payment_ecoms', 4),
(62, '2021_11_21_145925_add_column_fulfilled_ecoms', 5),
(63, '2021_11_21_214746_add_column_cancel_ecoms', 6),
(64, '2021_11_21_225325_create_toppings_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pizzahouses`
--

DROP TABLE IF EXISTS `pizzahouses`;
CREATE TABLE IF NOT EXISTS `pizzahouses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL,
  `base` int NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toppings` json DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT '0',
  `fulfilled` tinyint(1) NOT NULL DEFAULT '0',
  `cancel` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizzahouses`
--

INSERT INTO `pizzahouses` (`id`, `type`, `base`, `name`, `city`, `state`, `phone`, `toppings`, `price`, `deleted_at`, `created_at`, `updated_at`, `payment`, `fulfilled`, `cancel`) VALUES
(1, 2, 1, 'Yahya Soulaimane', 'Tétouan', 'Tanger - Tétouan', '0767673189', NULL, '120.00', NULL, '2021-11-20 12:52:51', '2021-11-21 19:15:33', 1, 1, 1),
(2, 2, 1, 'yahya soulaimane', 'Tétouan', 'tetouan', '0767673189', '[\"1\", \"2\", \"3\", \"4\"]', '120.00', NULL, '2021-11-20 12:52:58', '2021-11-20 12:52:58', 1, 1, 0),
(3, 2, 1, 'yahya soulaimane', 'Tétouan', 'tetouan', '0767673189', '[\"2\", \"3\"]', '120.00', NULL, '2021-11-20 12:54:39', '2021-11-20 12:54:39', 0, 0, 0),
(4, 3, 1, 'yahya soulaimane', 'Tétouan', 'tetouan', '0767673189', '[\"2\"]', '150.00', NULL, '2021-11-20 12:55:45', '2021-11-20 12:55:45', 0, 0, 0),
(5, 1, 4, 'Omnia El Fadili', 'Jorf', 'Sidi Kasem - Fes', '0667473169', '[\"1\", \"3\", \"4\"]', '100.00', NULL, '2021-11-21 09:08:03', '2021-11-21 20:36:04', 0, 0, 0),
(6, 3, 4, 'ahmed yahya', 'Tétouan', 'tetouan', '0679435271', '[\"1\", \"2\", \"3\", \"4\"]', '150.00', NULL, '2021-11-21 13:29:16', '2021-11-21 13:29:16', 1, 1, 0),
(7, 1, 1, 'asmae ouhabi', 'Tétouan', 'tetouan', '0566477748', '[\"1\"]', '100.00', NULL, '2021-11-21 13:33:22', '2021-11-21 13:33:22', 1, 1, 0),
(8, 1, 2, 'alae eddine elkbair', 'Tétouan', 'tetouan', '0667473169', '[\"3\"]', '100.00', NULL, '2021-11-21 14:46:09', '2021-11-21 14:46:09', 0, 0, 0),
(9, 1, 3, 'zakaria yahya', 'Tétouan', 'tetouan', '0669610260', NULL, '100.00', NULL, '2021-11-21 14:46:24', '2021-11-21 14:46:24', 0, 0, 0),
(10, 3, 3, 'badredine yahya', 'Benslimane', 'rabat - kenitra', '0767673189', '[\"1\", \"2\", \"3\", \"4\"]', '150.00', NULL, '2021-11-21 14:47:00', '2021-11-21 14:47:00', 0, 0, 0),
(11, 1, 3, 'karim oulmaati', 'Tétouan', 'tetouan', '0767673189', NULL, '100.00', NULL, '2021-11-21 14:47:51', '2021-11-21 14:47:51', 0, 0, 0),
(12, 1, 3, 'karim oulmaati', 'Tétouan', 'tetouan', '0767673189', NULL, '100.00', NULL, '2021-11-21 14:47:52', '2021-11-21 14:47:52', 0, 0, 0),
(13, 3, 2, 'mohamed yahya', 'rabat', 'rabat sale', '0564646464', NULL, '150.00', NULL, '2021-11-21 14:48:26', '2021-11-21 14:48:26', 0, 0, 0),
(14, 3, 2, 'mohamed yahya', 'rabat', 'rabat sale', '0564646464', NULL, '150.00', NULL, '2021-11-21 14:48:27', '2021-11-21 14:48:27', 0, 0, 0),
(15, 3, 3, 'yahya soulaimane', 'Tétouan', 'tetouan', '0767673189', '[\"1\", \"2\", \"3\", \"4\"]', '150.00', NULL, '2021-11-21 16:52:08', '2021-11-21 16:52:08', 1, 1, 0),
(16, 2, 1, 'Oussama Yahya', 'Rabat', 'Rabat - Sale', '0767673189', '[\"3\"]', '120.00', NULL, '2021-11-21 19:44:43', '2021-11-21 20:33:22', 0, 0, 1),
(17, 3, 4, 'yahya soulaimane', 'casablanca', 'casablanca', '0767673189', '[\"1\", \"2\", \"3\", \"4\"]', '150.00', NULL, '2021-11-21 21:26:21', '2021-11-21 21:26:21', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

DROP TABLE IF EXISTS `toppings`;
CREATE TABLE IF NOT EXISTS `toppings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `toppings` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`id`, `toppings`) VALUES
(1, 'Mushrooms'),
(2, 'Peppers'),
(3, 'Garlic'),
(4, 'Olives');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'small'),
(2, 'medium'),
(3, 'large');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'soulaimaneyh07@gmail.com', NULL, '$2y$10$X2A0wNiB6KM.X75HmmS/zOFpJnRLBmTz3Gx4jXQmyI8xcAC73Pwiy', 'wzG0ZdCQSa22WdC1fKzwe0LO8lSge4RVs88Ev3cfg5Mh3QYhVkgGBvDtkzCI', '2021-11-21 07:39:15', '2021-11-21 07:39:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
