-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 01:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `public_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', ' تصدير ملف PDF لبيانات الرسائل ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-17 09:33:23', '2022-11-17 09:33:23'),
(2, 'default', ' تصدير ملف PDF لبيانات الرسائل ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-17 09:33:26', '2022-11-17 09:33:26'),
(3, 'default', ' تصدير ملف PDF لبيانات الرسائل ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-17 09:33:26', '2022-11-17 09:33:26'),
(4, '1', ' تعديل الاعلان ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-17 09:34:39', '2022-11-17 09:34:39'),
(5, '1', ' تعديل الاعلان ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-17 09:34:44', '2022-11-17 09:34:44'),
(6, 'default', ' تصدير ملف إكسل لبيانات الرسائل ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-17 09:35:31', '2022-11-17 09:35:31'),
(7, 'default', 'إضافة مستخدم جديد', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-18 21:13:06', '2022-11-18 21:13:06'),
(8, 'ahmed ahmed', ' تعديل المستخدم  ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-18 21:16:50', '2022-11-18 21:16:50'),
(9, 'ahmed ahmed', ' تعديل المستخدم  ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-18 21:16:55', '2022-11-18 21:16:55'),
(10, 'saly ali', ' تعديل المستخدم  ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-28 15:16:47', '2022-11-28 15:16:47'),
(11, '2', ' تعديل الرسائل ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-28 15:48:16', '2022-11-28 15:48:16'),
(12, '2', ' تعديل الرسائل ', NULL, NULL, 'App\\Models\\Admin', 1, '[]', '2022-11-28 15:48:27', '2022-11-28 15:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'khetam Hamdy', 'admin@admin.com', '$2y$10$3HGTi0J3vT7fEq1OosdMou8S0eP1pwLNPnzcuHyXBvWJxC1GhHgsK', '1234567891', 'dcN6KMABH6wuxhp31128531668964125_3638574.png', 'active', '2022-11-14 10:48:04', '2022-11-20 15:08:45'),
(3, 'khetam Ekhleal', 'khetam@gmail.com', '$2y$10$bCzDblWprjJVO1pg/rdaZe53TyMA1OHsiLW9WKrZZIRk9HXDkU5Yu', '05922211', '', 'active', '2022-11-18 21:18:00', '2022-11-18 21:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 3, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `blockUser_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `user_id`, `blockUser_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-12-01 07:51:14', '2022-12-01 07:51:14'),
(2, 1, 3, '2022-12-01 09:56:29', '2022-11-30 22:00:00'),
(3, 2, 9, '2022-12-01 10:02:35', '2022-12-01 10:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_active',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `status`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'active', '48yiXdjTiPq48OF52867951668615401_6977331.png', '2022-11-16 12:34:45', '2022-11-25 16:36:15', NULL),
(2, 1, 'active', 'rZkUmtFeT6bsNhh11445411668615928_7016224.png', '2022-11-16 14:25:28', '2022-11-25 16:30:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'cars', '2022-11-16 12:34:46', '2022-11-16 14:16:41', NULL),
(2, 1, 'ar', 'السيارات', '2022-11-16 12:34:46', '2022-11-16 14:16:41', NULL),
(3, 2, 'en', 'products', '2022-11-16 14:25:28', '2022-11-16 14:25:28', NULL),
(4, 2, 'ar', 'المنتجات', '2022-11-16 14:25:28', '2022-11-16 14:25:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `change_prices`
--

CREATE TABLE `change_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_prices`
--

INSERT INTO `change_prices` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 9, 1, '2022-12-01 09:50:54', '2022-12-01 09:50:54'),
(3, 3, 1, '2022-12-01 09:51:04', '2022-12-01 09:51:04'),
(4, 1, 2, '2022-12-04 08:56:49', '2022-12-04 08:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 =  text , 1 = file',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `user_id`, `body`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 1, 'hi', '0', '2022-11-26 07:54:57', '2022-11-26 07:54:57', NULL),
(11, 1, 'whats your name', '0', '2022-11-26 08:17:02', '2022-11-26 08:17:02', NULL),
(12, 2, 'welcome ahmed', '0', '2022-11-26 10:22:11', '2022-11-25 22:00:00', NULL),
(13, 2, 'my name ali ', '0', '2022-11-26 10:23:28', '2022-11-26 10:23:28', NULL),
(14, 8, 'hi sara', '0', '2022-11-26 10:31:49', '2022-11-26 10:31:49', NULL),
(15, 1, 'good moring', '0', '2022-12-04 08:03:22', '2022-12-04 08:03:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_recipients`
--

CREATE TABLE `chat_recipients` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chat_message_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_recipients`
--

INSERT INTO `chat_recipients` (`user_id`, `chat_message_id`, `read_at`, `deleted_at`) VALUES
(1, 12, NULL, NULL),
(1, 13, NULL, NULL),
(2, 10, NULL, NULL),
(2, 11, NULL, NULL),
(2, 15, NULL, NULL),
(9, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'رائع جدا', '2022-11-21 11:28:05', '2022-11-20 22:00:00'),
(3, 1, 1, 'testing', '2022-11-24 07:55:00', '2022-11-24 07:55:00'),
(4, 1, 2, 'good testing', '2022-11-24 07:56:03', '2022-11-24 07:56:03'),
(5, 1, 2, 'good testing23', '2022-11-24 09:10:15', '2022-11-24 09:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `is_read`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sara ahmed', 'sara@gmail.com', '059874526', 'testing', '0', '2022-11-17 11:23:46', '2022-11-17 09:34:44', NULL),
(2, 'kh123', 'a@gmail.com', '12345678', 'testing api', '1', '2022-11-23 14:41:57', '2022-11-28 15:48:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2022-12-01 07:12:15', '2022-12-01 07:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `fqa`
--

CREATE TABLE `fqa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fqa`
--

INSERT INTO `fqa` (`id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'active', '2022-11-21 01:51:08', '2022-11-21 02:27:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fqa_translations`
--

CREATE TABLE `fqa_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fqa_id` int(10) UNSIGNED NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Q1',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fqa_translations`
--

INSERT INTO `fqa_translations` (`id`, `locale`, `fqa_id`, `order`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'en', 2, 'Q1', 'FQA (frequently questioned answers)', '<p>FQA (frequently questioned answers) are conventions or mandates scrutinized by individuals or groups who doubt...</p><p>&nbsp;</p>', '2022-11-21 01:51:08', '2022-11-21 02:21:40', NULL),
(2, 'ar', 2, 'س1', 'FQA (إجابات الأسئلة المتكررة)', '<p>FQA (إجابات الأسئلة المتكررة) هي اتفاقيات أو تفويضات يتم فحصها من قبل الأفراد أو الجماعات الذين يشكون</p>', '2022-11-21 01:51:08', '2022-11-21 01:51:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `join_requests`
--

CREATE TABLE `join_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang`, `flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'en', NULL, NULL, NULL, NULL),
(2, 'ar', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_translations`
--

CREATE TABLE `language_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_translations`
--

INSERT INTO `language_translations` (`id`, `language_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'English', NULL, NULL, NULL),
(2, 1, 'ar', 'إنجليزي', NULL, NULL, NULL),
(3, 2, 'en', 'Arabic', NULL, NULL, NULL),
(4, 2, 'ar', 'عربي', NULL, NULL, NULL);

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
(180, '2014_10_11_100000_create_password_resets_table', 1),
(181, '2014_10_12_000000_create_users_table', 1),
(205, '2014_11_7_125214_create_categories_table', 2),
(206, '2014_11_8_125336_create_category_translations_table', 2),
(207, '2014_11_9_100000_create_products_table', 2),
(208, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(209, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(210, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(211, '2016_06_01_000004_create_oauth_clients_table', 2),
(212, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(213, '2019_08_19_000000_create_failed_jobs_table', 2),
(214, '2022_012_05_115027_create_reports_table', 2),
(215, '2022_02_05_120404_create_settings_table', 2),
(216, '2022_02_06_120430_create_setting_translations_table', 2),
(217, '2022_03_04_115027_create_contacts_table', 2),
(218, '2022_03_05_115027_create_ff_table', 2),
(219, '2022_03_06_201822_create_pages_table', 2),
(220, '2022_03_07_201850_create_page_translations_table', 2),
(221, '2022_03_20_133027_create_language_translation_table', 2),
(222, '2022_03_8_132959_create_languages_table', 2),
(223, '2022_05_24_063926_create_varification_codes_table', 2),
(224, '2022_08_07_104845_create_product_images_table', 2),
(225, '2022_08_16_120915_create_promo_code_users_table', 2),
(226, '2022_08_17_085933_create_join_requests_table', 2),
(227, '2022_08_18_113139_create_user_searches_table', 2),
(228, '2022_10_01_084612_create_comment_table', 1),
(229, '2022_10_01_084612_create_favorites_table', 3),
(230, '2022_10_14_143108_create_admins_table', 4),
(231, '2022_12_06_104845_create_product_category_table', 5),
(232, '2022_012_06_115027_create_faq_translations_table', 6),
(233, '2022_11_26_090911_create_chat_messages_table', 7),
(234, '2022_11_26_091450_create_chat_recipients_table', 8),
(235, '2022_12_01_093144_create_blocks_table', 9),
(236, '2022_12_02_093144_create_blocks_table', 10),
(237, '2022_12_01_103353_create_notifications_table', 11),
(238, '2022_12_01_113443_create_change_prices_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('027ceb78-24a2-45a5-8d3d-71fd4de46704', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" New Product , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:30:24', '2022-12-01 10:30:24'),
('13d78412-8d8d-46db-8ddc-83cca3f1e6a9', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" New Product , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:34:53', '2022-12-01 10:34:53'),
('2251aac2-a5bc-409f-9bdb-07a0bc3faca3', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 1, '{\"title\":\"product9\",\"body\":\" New Product , Title :  product9 , Price :  787822\",\"icon\":\"uBuQJiXArdCwp6m73096981669898637_4465928.jpg\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/14\"}', NULL, '2022-12-01 10:43:58', '2022-12-01 10:43:58'),
('2d11ac96-4bec-499e-b1fc-dccb61a7c94c', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" New Product , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:33:56', '2022-12-01 10:33:56'),
('2d457ebe-2dbe-4f50-bc66-442d73b35814', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:39:27', '2022-12-01 10:39:27'),
('36b3c409-e294-4a16-b8d8-e01728aaf914', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:34:38', '2022-12-01 10:34:38'),
('40325be7-b30f-4772-8d16-e2765eb53638', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  2545\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:49:51', '2022-12-01 10:49:51'),
('66dbfe9b-c1df-4fa3-b606-5a8dd5c96de7', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 1, '{\"title\":\"product9\",\"body\":\" New Product , Title :  product9 , Price :  787822\",\"icon\":\"p71XxglsWx5mmuV41115231669898799_4854952.jpg\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/17\"}', NULL, '2022-12-01 10:46:39', '2022-12-01 10:46:39'),
('6b43a362-6eab-4bfc-a012-93191d68ae52', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:49:40', '2022-12-01 10:49:40'),
('6c9638ba-6dcc-49ee-a0a9-1076d52f72ce', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:38:40', '2022-12-01 10:38:40'),
('6ee1a321-6b0a-4946-affe-b359f9bc48b8', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product9\",\"body\":\" New Product , Title :  product9 , Price :  787822\",\"icon\":\"XuPQBGVS1uMaf7v78512311669898829_7589449.jpg\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/18\"}', NULL, '2022-12-01 10:47:09', '2022-12-01 10:47:09'),
('70493097-8198-4eaf-bbda-1f0748e3e2b2', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:34:38', '2022-12-01 10:34:38'),
('77318e51-2f00-4f59-bf65-1c21606b6e9c', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" New Product , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:37:06', '2022-12-01 10:37:06'),
('7bf2d855-9c46-4aaa-9b5b-4208a6afa5e4', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" New Product , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:34:53', '2022-12-01 10:34:53'),
('85d38924-d55e-4ba0-9d40-f1f3f6baf1b9', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" New Product , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:30:24', '2022-12-01 10:30:24'),
('89ecfeec-4669-43c0-967c-90c6995af1e5', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 1, '{\"title\":\"product9\",\"body\":\" New Product , Title :  product9 , Price :  787822\",\"icon\":\"1Gppd92GaiDZ4EK38325431669892691_9341936.jpg\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/13\"}', NULL, '2022-12-01 09:04:52', '2022-12-01 09:04:52'),
('94f134be-700a-44e9-8c80-0c5153892961', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  2545\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:49:51', '2022-12-01 10:49:51'),
('9dea9bdc-1902-4ed8-9471-04760c3c8ae4', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:49:40', '2022-12-01 10:49:40'),
('a0f90de2-ef3c-43fc-b0a8-f0cb4ffb9bae', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 1, '{\"title\":\"product9\",\"body\":\" New Product , Title :  product9 , Price :  787822\",\"icon\":\"wBCLdgVHbRCffTN93103391669898687_3644881.jpg\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/15\"}', NULL, '2022-12-01 10:44:47', '2022-12-01 10:44:47'),
('aaf55a9b-0c57-4797-a5d2-111da919a449', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 1, '{\"title\":\"product9\",\"body\":\" New Product , Title :  product9 , Price :  787822\",\"icon\":\"XuPQBGVS1uMaf7v78512311669898829_7589449.jpg\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/18\"}', NULL, '2022-12-01 10:47:09', '2022-12-01 10:47:09'),
('b8c86fb2-461e-4f6b-b029-79b5df2268b9', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:41:11', '2022-12-01 10:41:11'),
('c196a1ea-872e-4e35-ba1a-dd597190ff03', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 2, '{\"title\":\"product9\",\"body\":\" New Product , Title :  product9 , Price :  787822\",\"icon\":\"XuPQBGVS1uMaf7v78512311669898829_7589449.jpg\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/18\"}', NULL, '2022-12-01 10:47:09', '2022-12-01 10:47:09'),
('cae5d685-0313-495a-9eef-834a26a5e55b', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:39:27', '2022-12-01 10:39:27'),
('cba881d1-1923-45d3-b062-63bb7050a5d5', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 8, '{\"title\":\"product9\",\"body\":\" New Product , Title :  product9 , Price :  787822\",\"icon\":\"XuPQBGVS1uMaf7v78512311669898829_7589449.jpg\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/18\"}', NULL, '2022-12-01 10:47:09', '2022-12-01 10:47:09'),
('cdd41fb2-01ea-4a9e-9a1f-8be2ea53ffd1', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" New Product , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:37:06', '2022-12-01 10:37:06'),
('d2e6b846-56db-4643-ba99-e6c4ec497e69', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product9\",\"body\":\" New Product , Title :  product9 , Price :  787822\",\"icon\":\"XuPQBGVS1uMaf7v78512311669898829_7589449.jpg\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/18\"}', NULL, '2022-12-01 10:47:09', '2022-12-01 10:47:09'),
('da5700bf-ec0d-4957-bb74-b46e96871687', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:41:11', '2022-12-01 10:41:11'),
('ee7dfda7-1f63-43c2-a241-ba3470f8e962', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 3, '{\"title\":\"product 1\",\"body\":\" Price Change , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:38:40', '2022-12-01 10:38:40'),
('f4047ffb-735c-4408-8512-671bea1fe17c', 'App\\Notifications\\ProductNotification', 'App\\Models\\User', 9, '{\"title\":\"product 1\",\"body\":\" New Product , Title :  product 1 , Price :  25874\",\"icon\":\"oiqaN3FV3twMdlk17505241668616238_9809251.png\",\"url\":\"http:\\/\\/localhost:8000\\/api\\/productDetails\\/1\"}', NULL, '2022-12-01 10:33:56', '2022-12-01 10:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('157c63e4fcbbff14e84a92d8f786afcb890725d59e4d28fab2ad021e35f23b7ad449f46c6a9696b3', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-23 11:34:02', '2022-11-23 11:34:02', '2023-11-23 13:34:02'),
('25915cf74f59104e3b7806b59885e4816c5a19c642cc2bdd7fd06335d0c64b22db1d8cdcc4d7f713', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-23 12:13:23', '2022-11-23 12:13:23', '2023-11-23 14:13:23'),
('42300ace6336d9036cdd07a74a7fa554c3ea2d033a09289913c75da5385bdf5bdb5b393385b81a97', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-12-01 11:26:30', '2022-12-01 11:26:30', '2023-12-01 13:26:30'),
('43324bce952c58991ff2e568d517ac62e42cfbc7c40cb78b3c0a3a336985fb06929d22870f1bde7d', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-23 11:34:15', '2022-11-23 11:34:15', '2023-11-23 13:34:15'),
('5dcddaa3303638991143d7b47523dba7f81ba0a57f3dc90bcd1b2c8a1a554f6047de1f57610f02c4', 3, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-22 07:04:06', '2022-11-22 07:04:06', '2023-11-22 09:04:06'),
('77730a0cfcb1c44096a05f2519b6defba8d31059d3a42c8d3812f8632a412136b79148d3a4deb4cd', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-22 06:16:48', '2022-11-22 06:16:48', '2023-11-22 08:16:48'),
('780c9fab55d698c0dfdc5bf2224f17d722db08d08612e58af12dd7d22c48b5672bac45f6d9f49d25', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 1, '2022-11-22 08:50:31', '2022-11-22 08:50:31', '2023-11-22 10:50:31'),
('af85f0187f663879498fdf78fa19814755dcb9af391589c6a9f584d60f8dd4799faf26bf4eeb6f41', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-22 07:03:03', '2022-11-22 07:03:03', '2023-11-22 09:03:03'),
('b31fe67403363fbbcc4e496c69b5ee9e45c2295121b9e5f987955b257dbe836d8cae57946f3b8fcc', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-23 11:33:47', '2022-11-23 11:33:47', '2023-11-23 13:33:47'),
('c473563f8317a5cf69e38e4b3cd81f69d35bbe0ff297ba24b34bfb8faa6e6e90f15cde0ed8dd44fe', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-12-04 08:02:53', '2022-12-04 08:02:53', '2023-12-04 10:02:53'),
('c4f7fe98de5e99356909315e4a5de6bfeae0b6f8dfac1adc06712402b02042f0b3b4e65040a6656d', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-22 09:38:56', '2022-11-22 09:38:56', '2023-11-22 11:38:56'),
('dd9b527be9186bbf04ee9095a34bf0c1d8fd3b089ec858f4c5fc6fe05f7009b6cf8c241115bac2d2', 2, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-22 06:39:10', '2022-11-22 06:39:10', '2023-11-22 08:39:10'),
('e6375045d4028c86957f1a4f28af1a58c7089c6a7bca45dcb8e2e93a67beef3db8aa1e6ffd842e3e', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 1, '2022-11-23 11:34:56', '2022-11-23 11:34:56', '2023-11-23 13:34:56'),
('f0d52004b18cc424bd2c372042b76e6f6e5e4912e7f03c3bdda0998538f0f4500aa118e7fad135ac', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-23 11:23:56', '2022-11-23 11:23:56', '2023-11-23 13:23:56'),
('f9187029d04386426ad763e246f991bd76fb2bd7b5e4ec94269a3a629ce2d93652272ec807be9873', 1, '97cde07c-9706-4951-8a81-947efe6862c2', 'mobile', '[]', 0, '2022-11-23 12:00:21', '2022-11-23 12:00:21', '2023-11-23 14:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('97cde07c-9706-4951-8a81-947efe6862c2', NULL, 'Meme Personal Access Client', '1d6hCDZefbhNmNrxdXfrPdWbs9DViDZpes8YskTr', NULL, 'http://localhost', 1, 0, 0, '2022-11-22 06:15:03', '2022-11-22 06:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '97cde07c-9706-4951-8a81-947efe6862c2', '2022-11-22 06:15:03', '2022-11-22 06:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `views` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `views`, `slug`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'about-us', 'image.png', 'active', '2022-11-14 03:51:01', NULL, NULL),
(2, 1, 'privacy-policy', 'image.png', 'active', '2022-11-14 03:51:01', NULL, NULL),
(3, 1, 'terms-of-use', 'image.png', 'active', '2022-11-14 03:51:01', NULL, NULL),
(4, 1, 'return_policy_page', 'image.png', 'active', '2022-11-14 03:51:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'about us', 'description', NULL, NULL, NULL),
(2, 1, 'ar', 'من نحن', 'description', NULL, NULL, NULL),
(3, 2, 'en', 'privacy policy', 'description', NULL, NULL, NULL),
(4, 2, 'ar', 'سياسة الخصوصية', 'description', NULL, NULL, NULL),
(5, 3, 'en', 'terms of use', 'description', NULL, NULL, NULL),
(6, 3, 'ar', 'شروط الاستخدام', 'description', NULL, NULL, NULL),
(7, 4, 'en', 'return policy page', 'description', NULL, NULL, NULL),
(8, 4, 'ar', 'سياسة الارجاع', 'description', NULL, NULL, NULL);

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
('ali2@gmail.com', '$2y$10$a4l4K1szKQNP5O0XYA.Gu.R62WITXGET6/oh2YI4tmU6.ocn1NjbO', '2022-11-22 06:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mangers-show', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(2, 'mangers-create', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(3, 'mangers-edit', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(4, 'mangers-delete', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(5, 'products-show', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(6, 'products-create', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(7, 'products-edit', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(8, 'products-delete', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(9, 'users-show', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(10, 'users-create', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(11, 'users-edit', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(12, 'users-delete', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(13, 'settings-show', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(14, 'settings-create', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(15, 'settings-edit', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(16, 'settings-delete', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(17, 'roles-show', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(18, 'roles-create', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(19, 'roles-edit', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(20, 'roles-delete', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(21, 'permissions-show', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(22, 'permissions-create', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(23, 'permissions-edit', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(24, 'permissions-delete', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(25, 'pages-show', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(26, 'pages-create', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(27, 'pages-edit', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(28, 'pages-delete', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(29, 'logs-show', '2022-11-17 11:31:29', '2022-11-17 11:31:29', NULL),
(30, 'logs-create', '2022-11-17 11:31:30', '2022-11-17 11:31:30', NULL),
(31, 'logs-edit', '2022-11-17 11:31:30', '2022-11-17 11:31:30', NULL),
(32, 'logs-delete', '2022-11-17 11:31:30', '2022-11-17 11:31:30', NULL),
(33, 'contacts-show', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(34, 'contacts-create', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(35, 'contacts-edit', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(36, 'contacts-delete', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(37, 'categories-show', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(38, 'categories-create', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(39, 'categories-edit', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(40, 'categories-delete', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_translations`
--

CREATE TABLE `permission_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_translations`
--

INSERT INTO `permission_translations` (`id`, `permission_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ar', ' عرض المدارء', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(2, 1, 'en', ' Show mangers', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(3, 2, 'ar', ' اضافة المدارء', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(4, 2, 'en', ' Create mangers', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(5, 3, 'ar', ' تعديل المدارء', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(6, 3, 'en', ' Edit mangers', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(7, 4, 'ar', ' حذف المدارء', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(8, 4, 'en', ' Delete mangers', '2022-11-17 11:29:28', '2022-11-17 11:29:28', NULL),
(9, 5, 'ar', ' عرض المنتجات', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(10, 5, 'en', ' Show products', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(11, 6, 'ar', ' اضافة المنتجات', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(12, 6, 'en', ' Create products', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(13, 7, 'ar', ' تعديل المنتجات', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(14, 7, 'en', ' Edit products', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(15, 8, 'ar', ' حذف المنتجات', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(16, 8, 'en', ' Delete products', '2022-11-17 11:29:48', '2022-11-17 11:29:48', NULL),
(17, 9, 'ar', ' عرض المستخدمين', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(18, 9, 'en', ' Show users', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(19, 10, 'ar', ' اضافة المستخدمين', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(20, 10, 'en', ' Create users', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(21, 11, 'ar', ' تعديل المستخدمين', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(22, 11, 'en', ' Edit users', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(23, 12, 'ar', ' حذف المستخدمين', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(24, 12, 'en', ' Delete users', '2022-11-17 11:30:16', '2022-11-17 11:30:16', NULL),
(25, 13, 'ar', ' عرض الإعدادات', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(26, 13, 'en', ' Show settings', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(27, 14, 'ar', ' اضافة الإعدادات', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(28, 14, 'en', ' Create settings', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(29, 15, 'ar', ' تعديل الإعدادات', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(30, 15, 'en', ' Edit settings', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(31, 16, 'ar', ' حذف الإعدادات', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(32, 16, 'en', ' Delete settings', '2022-11-17 11:30:35', '2022-11-17 11:30:35', NULL),
(33, 17, 'ar', ' عرض الشروط', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(34, 17, 'en', ' Show roles', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(35, 18, 'ar', ' اضافة الشروط', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(36, 18, 'en', ' Create roles', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(37, 19, 'ar', ' تعديل الشروط', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(38, 19, 'en', ' Edit roles', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(39, 20, 'ar', ' حذف الشروط', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(40, 20, 'en', ' Delete roles', '2022-11-17 11:30:47', '2022-11-17 11:30:47', NULL),
(41, 21, 'ar', ' عرض أذونات', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(42, 21, 'en', ' Show permissions', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(43, 22, 'ar', ' اضافة أذونات', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(44, 22, 'en', ' Create permissions', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(45, 23, 'ar', ' تعديل أذونات', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(46, 23, 'en', ' Edit permissions', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(47, 24, 'ar', ' حذف أذونات', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(48, 24, 'en', ' Delete permissions', '2022-11-17 11:31:05', '2022-11-17 11:31:05', NULL),
(49, 25, 'ar', ' عرض الصفحات', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(50, 25, 'en', ' Show pages', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(51, 26, 'ar', ' اضافة الصفحات', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(52, 26, 'en', ' Create pages', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(53, 27, 'ar', ' تعديل الصفحات', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(54, 27, 'en', ' Edit pages', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(55, 28, 'ar', ' حذف الصفحات', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(56, 28, 'en', ' Delete pages', '2022-11-17 11:31:16', '2022-11-17 11:31:16', NULL),
(57, 29, 'ar', ' عرض السجلات', '2022-11-17 11:31:29', '2022-11-17 11:31:29', NULL),
(58, 29, 'en', ' Show logs', '2022-11-17 11:31:29', '2022-11-17 11:31:29', NULL),
(59, 30, 'ar', ' اضافة السجلات', '2022-11-17 11:31:30', '2022-11-17 11:31:30', NULL),
(60, 30, 'en', ' Create logs', '2022-11-17 11:31:30', '2022-11-17 11:31:30', NULL),
(61, 31, 'ar', ' تعديل السجلات', '2022-11-17 11:31:30', '2022-11-17 11:31:30', NULL),
(62, 31, 'en', ' Edit logs', '2022-11-17 11:31:30', '2022-11-17 11:31:30', NULL),
(63, 32, 'ar', ' حذف السجلات', '2022-11-17 11:31:30', '2022-11-17 11:31:30', NULL),
(64, 32, 'en', ' Delete logs', '2022-11-17 11:31:30', '2022-11-17 11:31:30', NULL),
(65, 33, 'ar', ' عرض جهات الاتصال', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(66, 33, 'en', ' Show contacts', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(67, 34, 'ar', ' اضافة جهات الاتصال', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(68, 34, 'en', ' Create contacts', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(69, 35, 'ar', ' تعديل جهات الاتصال', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(70, 35, 'en', ' Edit contacts', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(71, 36, 'ar', ' حذف جهات الاتصال', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(72, 36, 'en', ' Delete contacts', '2022-11-17 11:31:47', '2022-11-17 11:31:47', NULL),
(73, 37, 'ar', ' عرض التصنيفات', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(74, 37, 'en', ' Show categories', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(75, 38, 'ar', ' اضافة التصنيفات', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(76, 38, 'en', ' Create categories', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(77, 39, 'ar', ' تعديل التصنيفات', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(78, 39, 'en', ' Edit categories', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(79, 40, 'ar', ' حذف التصنيفات', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL),
(80, 40, 'en', ' Delete categories', '2022-11-17 11:33:54', '2022-11-17 11:33:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `count_views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `type` enum('new','old') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'old',
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `price`, `title`, `description`, `image`, `user_id`, `count_views`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2545, 'product 1', 'product 1product 1product 1product 1product 1', 'oiqaN3FV3twMdlk17505241668616238_9809251.png', 1, 54, 'new', 'active', '2022-11-16 14:30:38', '2022-12-01 10:49:40', NULL),
(2, 1233, 'products 22', '<p>testing producyt</p>', 'EoLqX03RJfCyqvh15951441668946683_9258465.png', 1, 3, 'new', 'active', '2022-11-20 10:18:04', '2022-11-25 17:05:30', NULL),
(4, 205, 'product5', 'product5product5product5product5', 'BjGbCcKVaTdujdt96782131669228766_7002512.jpg', 0, 0, 'new', 'active', '2022-11-23 16:39:26', '2022-11-23 16:39:26', NULL),
(6, 205, 'product6', 'product6product6product5product5', '8PPvL2HTZ0q4SEr56307571669279039_5680505.jpg', 0, 0, 'new', 'active', '2022-11-24 06:37:19', '2022-11-24 06:37:19', NULL),
(7, 205, 'product6', 'product6product6product5product5', '4wgxi69E5R9eqX163772521669279420_6248024.jpg', 0, 0, 'new', 'active', '2022-11-24 06:43:41', '2022-11-24 06:43:41', NULL),
(8, 7878, 'product8', 'product8product6product5product5', 'KyhatZrzJ7xWAV542856471669279470_2380738.jpg', 0, 0, 'new', 'active', '2022-11-24 06:44:30', '2022-11-24 06:44:30', NULL),
(13, 787822, 'product9', 'product8product6product5product5', '1Gppd92GaiDZ4EK38325431669892691_9341936.jpg', 0, 1, 'new', 'active', '2022-12-01 09:04:51', '2022-12-01 09:16:43', NULL),
(14, 787822, 'product9', 'product8product6product5product5', 'uBuQJiXArdCwp6m73096981669898637_4465928.jpg', 0, 0, 'new', 'active', '2022-12-01 10:43:57', '2022-12-01 10:43:57', NULL),
(15, 787822, 'product9', 'product8product6product5product5', 'wBCLdgVHbRCffTN93103391669898687_3644881.jpg', 0, 0, 'new', 'active', '2022-12-01 10:44:47', '2022-12-01 10:44:47', NULL),
(17, 787822, 'product9', 'product8product6product5product5', 'p71XxglsWx5mmuV41115231669898799_4854952.jpg', 0, 0, 'new', 'active', '2022-12-01 10:46:39', '2022-12-01 10:46:39', NULL),
(18, 787822, 'product9', 'product8product6product5product5', 'XuPQBGVS1uMaf7v78512311669898829_7589449.jpg', 0, 0, 'new', 'active', '2022-12-01 10:47:09', '2022-12-01 10:47:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 1, 1, NULL, NULL, NULL),
(10, 1, 2, NULL, NULL, NULL),
(11, 2, 1, NULL, NULL, NULL),
(12, 7, 1, NULL, NULL, NULL),
(13, 8, 1, NULL, NULL, NULL),
(14, 13, 1, NULL, NULL, NULL),
(15, 14, 1, NULL, NULL, NULL),
(16, 15, 1, NULL, NULL, NULL),
(17, 17, 1, NULL, NULL, NULL),
(18, 18, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'uploads/productImages/0fbce6c74ff376d18cb352e7fdc6273b.jpg', '2022-11-17 09:03:56', '2022-11-17 11:05:57', NULL),
(2, 1, 'uploads/productImages/e9470886ecab9743fb7ea59420c245d2.jpg', '2022-11-17 09:03:56', '2022-11-17 09:12:42', '2022-11-17 09:12:42'),
(3, 2, 'uploads/productImages/b44afe91b8a427a6be2078cc89bd6f9b.jpg', '2022-11-20 10:18:04', '2022-11-21 02:45:43', NULL),
(4, 2, 'uploads/productImages/bf56a1b37b94243486b2034f8479c475.jpg', '2022-11-20 10:18:04', '2022-11-21 02:45:56', NULL),
(5, 2, 'uploads/productImages/9547ad6b651e2087bac67651aa92cd0d.jpg', '2022-11-21 00:46:08', '2022-11-21 00:46:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo_code_users`
--

CREATE TABLE `promo_code_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promo_code_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `product_id`, `description`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'not good product', 1, '2022-11-21 10:37:22', '2022-11-21 11:30:32', NULL),
(2, 1, 'testing api 22', 1, '2022-11-24 09:45:35', '2022-11-24 09:45:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '', '2022-09-12 10:23:14', '2022-09-12 10:23:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_translations`
--

CREATE TABLE `role_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_translations`
--

INSERT INTO `role_translations` (`id`, `role_id`, `locale`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 0, 'en', 'admins', NULL, NULL, NULL),
(1, 2, 'en', 'admins', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paginateTotal` int(11) NOT NULL,
  `app_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_maintenance_mode` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0->off 1->on',
  `is_allow_register` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_allow_login` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `paginateTotal`, `app_logo`, `app_image`, `info_email`, `mobile`, `facebook`, `twitter`, `instagram`, `favicon`, `is_maintenance_mode`, `is_allow_register`, `is_allow_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 15, 'uploads/1669655043_52753.svg', 'uploads/1669655286_23145.png', 'hamdykhetam@gmail.com', '059874556', 'https://www.Facebook.com/', 'https://www.Twitter.com/', 'https://www.instagram.com/', 'uploads/1669655405_21882.svg', '0', '1', '1', NULL, '2022-11-28 15:10:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `app_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `locale`, `setting_id`, `app_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'en', 1, 'meme', NULL, '2022-11-17 10:42:49', NULL),
(2, 'ar', 1, 'ميم', NULL, '2022-11-17 10:42:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `fcm_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0->android , 1 ->ios',
  `accept` int(11) DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'ar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `fcm_token`, `device_type`, `accept`, `lang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '12345678910111213', 'postman', NULL, 'en', '2022-11-22 07:04:06', '2022-11-23 12:04:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notifications` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1->yes , 0->no',
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `date` date DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1->open , 2->crowded , 3->closed',
  `is_deleted` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `mobile`, `notifications`, `gender`, `date`, `status`, `email_verified_at`, `password`, `facebook`, `twitter`, `instagram`, `remember_token`, `image`, `opening_status`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ahmed ahmed', 'Ahmed@gamil.com', '05987452', '1', 'male', '2002-01-11', 'active', NULL, '$2y$10$KKTFGweKRK.b1WjpDmILUemlXOup5cNWcia7zlxP2O8gTq9GD8G0W', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', NULL, 'male', '1', '0', '2022-11-18 21:13:06', '2022-11-23 12:22:43', NULL),
(2, 'ali ali', 'ali2@gmail.com', '12345678', '1', 'male', NULL, 'active', NULL, '$2y$10$cajGJwniTQCc5mWMHes1nOCMTWzx9Eg.yYj/Qe/matJd6nSZKjrj6', NULL, NULL, NULL, NULL, NULL, '1', '0', '2022-11-22 06:39:10', '2022-11-22 06:39:10', NULL),
(3, 'saly ali', 'aa12@gmail.com', '12345689', '1', 'male', '2022-11-23', 'active', NULL, '$2y$10$uSvGbol9aHJAQHGvxkG7W.gALO0oBa6mOYd9itcNPqbYHyLq7XOHS', NULL, NULL, NULL, NULL, NULL, '1', '0', '2022-11-22 07:04:06', '2022-11-28 15:16:47', NULL),
(8, 'hala', 'hala@gmail.com', NULL, '1', 'male', NULL, 'active', NULL, '', NULL, NULL, NULL, NULL, NULL, '1', '0', '2022-11-26 07:48:05', '2022-11-26 10:30:06', NULL),
(9, 'sara ali', 'sara@gmail.com', NULL, '1', 'male', NULL, 'active', NULL, '', NULL, NULL, NULL, NULL, NULL, '1', '0', '2022-11-26 07:50:01', '2022-11-26 10:29:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_searches`
--

CREATE TABLE `user_searches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `fcm_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_searches`
--

INSERT INTO `user_searches` (`id`, `user_id`, `fcm_token`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, '12345678', 'product', '2022-11-23 13:37:07', '2022-12-01 13:07:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `varification_codes`
--

CREATE TABLE `varification_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `varification_codes`
--

INSERT INTO `varification_codes` (`id`, `user_id`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '6046', '2022-12-04 10:48:04', '2022-12-04 10:48:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocks_user_id_foreign` (`user_id`),
  ADD KEY `blocks_blockuser_id_foreign` (`blockUser_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `change_prices`
--
ALTER TABLE `change_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `change_prices_user_id_foreign` (`user_id`),
  ADD KEY `change_prices_product_id_foreign` (`product_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `chat_recipients`
--
ALTER TABLE `chat_recipients`
  ADD PRIMARY KEY (`user_id`,`chat_message_id`),
  ADD KEY `chat_recipients_chat_messages_id_foreign` (`chat_message_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Indexes for table `fqa`
--
ALTER TABLE `fqa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fqa_translations`
--
ALTER TABLE `fqa_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fqa_translations_locale_index` (`locale`);

--
-- Indexes for table `join_requests`
--
ALTER TABLE `join_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_translations`
--
ALTER TABLE `language_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_translations`
--
ALTER TABLE `permission_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_product_id_foreign` (`product_id`),
  ADD KEY `product_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `promo_code_users`
--
ALTER TABLE `promo_code_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_translations_locale_index` (`locale`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_searches`
--
ALTER TABLE `user_searches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `varification_codes`
--
ALTER TABLE `varification_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `change_prices`
--
ALTER TABLE `change_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fqa`
--
ALTER TABLE `fqa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fqa_translations`
--
ALTER TABLE `fqa_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `join_requests`
--
ALTER TABLE `join_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language_translations`
--
ALTER TABLE `language_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permission_translations`
--
ALTER TABLE `permission_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promo_code_users`
--
ALTER TABLE `promo_code_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_searches`
--
ALTER TABLE `user_searches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `varification_codes`
--
ALTER TABLE `varification_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_blockuser_id_foreign` FOREIGN KEY (`blockUser_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `change_prices`
--
ALTER TABLE `change_prices`
  ADD CONSTRAINT `change_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `change_prices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `chat_recipients`
--
ALTER TABLE `chat_recipients`
  ADD CONSTRAINT `chat_recipients_chat_messages_id_foreign` FOREIGN KEY (`chat_message_id`) REFERENCES `chat_messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_recipients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_category_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
