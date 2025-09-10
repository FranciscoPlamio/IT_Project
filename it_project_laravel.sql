-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2025 at 03:01 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_project_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form101_applicant_details`
--

DROP TABLE IF EXISTS `form101_applicant_details`;
CREATE TABLE IF NOT EXISTS `form101_applicant_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_attended` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_taken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_graduated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form101_applicant_details_form_token_index` (`form_token`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form101_applicant_details`
--

INSERT INTO `form101_applicant_details` (`id`, `form_token`, `last_name`, `first_name`, `middle_name`, `dob`, `sex`, `nationality`, `unit`, `street`, `barangay`, `city`, `province`, `zip_code`, `contact_number`, `email`, `school_attended`, `course_taken`, `year_graduated`, `created_at`, `updated_at`) VALUES
(3, 'c14ebda9-4fdf-4af5-aac3-1bf041bb2d3b', 'Plamio', 'Francisco', 'Jugo', '2025-09-10', 'male', 'Filipino', '64', 'Dispo Street', 'Bakakeng', 'Baguio City', 'Benguet', '2600', '09876543211', 'example@slu.edu.ph', 'SLU', 'BSIT', '2026', '2025-09-10 05:22:44', '2025-09-10 05:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `form101_application_details`
--

DROP TABLE IF EXISTS `form101_application_details`;
CREATE TABLE IF NOT EXISTS `form101_application_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtg` json DEFAULT NULL,
  `amateur` json DEFAULT NULL,
  `rphn` json DEFAULT NULL,
  `rroc` json DEFAULT NULL,
  `date_of_exam` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form101_application_details_form_token_index` (`form_token`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form101_application_details`
--

INSERT INTO `form101_application_details` (`id`, `form_token`, `rtg`, `amateur`, `rphn`, `rroc`, `date_of_exam`, `created_at`, `updated_at`) VALUES
(3, 'c14ebda9-4fdf-4af5-aac3-1bf041bb2d3b', '[\"1rtg_e1256_code25\"]', '[\"class_a_e8910_code5\"]', '[\"1phn_e1234\"]', '[\"rroc_aircraft_e1\"]', '2025-09-11', '2025-09-10 05:22:44', '2025-09-10 05:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `form101_declaration`
--

DROP TABLE IF EXISTS `form101_declaration`;
CREATE TABLE IF NOT EXISTS `form101_declaration` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_accomplished` date DEFAULT NULL,
  `or_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or_date` date DEFAULT NULL,
  `or_amount` decimal(10,2) DEFAULT NULL,
  `admit_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailing_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_exam` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `time_of_exam` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form101_declaration_form_token_index` (`form_token`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form101_declaration`
--

INSERT INTO `form101_declaration` (`id`, `form_token`, `signature_name`, `date_accomplished`, `or_no`, `or_date`, `or_amount`, `admit_name`, `mailing_address`, `exam_for`, `place_of_exam`, `admission_date`, `time_of_exam`, `created_at`, `updated_at`) VALUES
(3, 'c14ebda9-4fdf-4af5-aac3-1bf041bb2d3b', 'Plamio Francisco', '2025-09-11', '1234567890', '2025-09-10', 0.07, 'Plamio', 'mailing@example.com', 'Webtech Exam', 'Baguio', '2025-09-10', '10:31am', '2025-09-10 05:22:44', '2025-09-10 05:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `form101_request_assistance`
--

DROP TABLE IF EXISTS `form101_request_assistance`;
CREATE TABLE IF NOT EXISTS `form101_request_assistance` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `needs` tinyint(1) DEFAULT NULL,
  `needs_details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form101_request_assistance_form_token_index` (`form_token`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form101_request_assistance`
--

INSERT INTO `form101_request_assistance` (`id`, `form_token`, `needs`, `needs_details`, `created_at`, `updated_at`) VALUES
(3, 'c14ebda9-4fdf-4af5-aac3-1bf041bb2d3b', 0, NULL, '2025-09-10 05:22:44', '2025-09-10 05:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '2025_09_09_133457_form_1-01_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mmkdDDuXmw8Qro5I4Q4lkNSeAfJyGLf87qukF1hn', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkVpM1NYQ0ZRZXdqeXlhVG1hZ1IyY3Z2VGRJUG1SaTBrZVRwU1NaSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHA6Ly9sb2NhbGhvc3QvaXQtcHJvamVjdC9JVC1QUk9KRUNUX2xhcmF2ZWwvcHVibGljL2FkbWluc2lkZS9jZXJ0LXJlcXVlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757516449);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
