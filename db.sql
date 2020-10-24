-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 02:31 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2020-10-05 04:40:04', '2020-10-05 04:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '84cb17a1-6503-4076-8f1b-69d865d1e84a.gif', '2020-09-27 04:22:38', '2020-09-27 04:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `name`, `description`, `locale`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'موبايلات', 'هذا القسم خاص بالموبايلات', 'ar', 1, NULL, NULL),
(2, 'Phones', 'This Category about Phones', 'en', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `discount_type` enum('percent','fixed','free_shipping') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percent',
  `product_id` int(10) UNSIGNED NOT NULL,
  `status` enum('available','unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `min_spent` double DEFAULT NULL,
  `max_spent` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `amount`, `discount_type`, `product_id`, `status`, `start_date`, `end_date`, `min_spent`, `max_spent`, `created_at`, `updated_at`) VALUES
(1, 'Coupon1', '112233', 20, 'percent', 1, 'available', '2020-09-27 07:00:00', '2020-09-30 07:00:00', NULL, NULL, '2020-09-27 04:24:25', '2020-09-27 04:24:25'),
(2, 'Coupon2', '11223344', 10, 'percent', 1, 'available', '2020-10-04 22:00:00', '2020-10-20 22:00:00', NULL, NULL, '2020-10-05 03:51:03', '2020-10-05 03:51:03'),
(3, 'Coupon3', '1122334455', 15, 'percent', 1, 'available', '2020-10-04 22:00:00', '2020-10-13 22:00:00', NULL, NULL, '2020-10-05 03:52:51', '2020-10-05 03:52:51');

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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_06_23_123011_create_coupons_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 2),
(5, '2020_06_23_115203_create_products_table', 2),
(6, '2020_06_23_134209_create_product_comments_table', 2),
(7, '2020_06_23_143033_create_product_translations_table', 2),
(8, '2020_06_23_143742_create_category_table', 2),
(9, '2020_06_23_143814_create_category_translations_table', 2),
(10, '2020_06_23_144134_create_review_table', 2),
(11, '2020_06_23_145749_create_orders_table', 2),
(12, '2020_06_24_151830_drop_column_image', 2),
(13, '2020_06_24_152506_create_product_images_table', 2),
(14, '2020_07_21_113541_create_order_product_table', 2),
(15, '2020_07_21_130041_create_carts_table', 2),
(16, '2020_10_12_120138_create_settings_table', 3),
(18, '2020_10_12_121050_create_setting_translations_table', 4),
(19, '2020_10_13_083039_create_notifications_table', 5);

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
('12b5ab08-5c81-48b7-bbd7-e102f68c1e1c', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T08:59:31.000000Z\",\"created_at\":\"2020-10-13T08:59:31.000000Z\",\"id\":74}}', NULL, '2020-10-13 06:59:31', '2020-10-13 06:59:31'),
('3c2e6043-8fa7-459c-9ae0-30c061eb8a9b', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T09:02:22.000000Z\",\"created_at\":\"2020-10-13T09:02:22.000000Z\",\"id\":76}}', NULL, '2020-10-13 07:02:22', '2020-10-13 07:02:22'),
('402ac802-dc5a-4de4-97a9-d0d976c804c8', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T08:48:44.000000Z\",\"created_at\":\"2020-10-13T08:48:44.000000Z\",\"id\":67}}', NULL, '2020-10-13 06:48:44', '2020-10-13 06:48:44'),
('4c311f82-46be-48de-ad3f-4f48547b3de4', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T08:49:50.000000Z\",\"created_at\":\"2020-10-13T08:49:50.000000Z\",\"id\":69}}', NULL, '2020-10-13 06:49:50', '2020-10-13 06:49:50'),
('91db1ca3-571b-4a9c-9fc6-fb34dfce4a3a', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T08:49:21.000000Z\",\"created_at\":\"2020-10-13T08:49:21.000000Z\",\"id\":68}}', NULL, '2020-10-13 06:49:21', '2020-10-13 06:49:21'),
('9b20799a-f7fc-4147-8265-faece7a75442', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T08:46:04.000000Z\",\"created_at\":\"2020-10-13T08:46:04.000000Z\",\"id\":66}}', NULL, '2020-10-13 06:46:05', '2020-10-13 06:46:05'),
('a6f1fd09-cdb8-4c9a-ad9c-1a7d1e86a5a4', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T08:52:21.000000Z\",\"created_at\":\"2020-10-13T08:52:21.000000Z\",\"id\":72}}', NULL, '2020-10-13 06:52:21', '2020-10-13 06:52:21'),
('adb38302-a2ae-47ef-a942-138878d2ffd8', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T08:57:21.000000Z\",\"created_at\":\"2020-10-13T08:57:21.000000Z\",\"id\":73}}', NULL, '2020-10-13 06:57:21', '2020-10-13 06:57:21'),
('b4f00a55-d03b-40a5-a53e-da97edf32334', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T09:01:06.000000Z\",\"created_at\":\"2020-10-13T09:01:06.000000Z\",\"id\":75}}', NULL, '2020-10-13 07:01:06', '2020-10-13 07:01:06'),
('c265302d-50f5-4c03-9ffb-746289cbd8c8', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":1,\"updated_at\":\"2020-10-13T09:02:24.000000Z\",\"created_at\":\"2020-10-13T09:02:24.000000Z\",\"id\":77}}', NULL, '2020-10-13 07:02:24', '2020-10-13 07:02:24'),
('cb0a84d3-0831-4815-8480-0869960c6fd5', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T12:54:53.000000Z\",\"created_at\":\"2020-10-13T12:54:53.000000Z\",\"id\":78}}', NULL, '2020-10-13 10:54:53', '2020-10-13 10:54:53'),
('d7a62aa0-a0a4-4243-89e5-d31133740cdb', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":2,\"updated_at\":\"2020-10-13T08:45:45.000000Z\",\"created_at\":\"2020-10-13T08:45:45.000000Z\",\"id\":65}}', NULL, '2020-10-13 06:45:45', '2020-10-13 06:45:45'),
('f34b4209-7944-4079-afe1-f39f08cece23', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\User', 1, '{\"order\":{\"user_id\":1,\"billing_phone\":\"+201551677096\",\"billing_address\":\"Mansoura\",\"product_id\":1,\"updated_at\":\"2020-10-13T12:54:54.000000Z\",\"created_at\":\"2020-10-13T12:54:54.000000Z\",\"id\":79}}', NULL, '2020-10-13 10:54:54', '2020-10-13 10:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `billing_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` enum('payment','on_delivery') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on_delivery',
  `payment_status` enum('failed','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'done',
  `order_status` enum('delivered','processing','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_phone`, `billing_address`, `product_id`, `payment_method`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(78, 1, '+201551677096', 'Mansoura', 2, 'on_delivery', 'done', 'processing', '2020-10-13 10:54:53', '2020-10-13 10:54:53'),
(79, 1, '+201551677096', 'Mansoura', 1, 'on_delivery', 'done', 'processing', '2020-10-13 10:54:54', '2020-10-13 10:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(46, 78, 78, 1, 2500, NULL, NULL),
(47, 79, 79, 1, 3000, NULL, NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `production_date` timestamp NULL DEFAULT NULL,
  `expiration_date` timestamp NULL DEFAULT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `coupon_id`, `production_date`, `expiration_date`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 3000, 100, '2020-09-27 04:23:35', '2020-09-27 04:23:35'),
(2, 1, NULL, NULL, NULL, 2500, 100, '2020-10-05 04:06:45', '2020-10-05 04:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `path`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '81423a3d-31ee-4849-94ab-86e839202f5f.png', 1, '2020-09-27 04:23:36', '2020-09-27 04:23:36'),
(2, '67b65517-90a2-4420-8dd4-6d5efd5f195a.jpg', 2, '2020-10-05 04:06:47', '2020-10-05 04:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `name`, `description`, `locale`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'ريلمي 5', 'ريلمي', 'ar', 1, NULL, NULL),
(2, 'Realme 5', 'Realme', 'en', 1, NULL, NULL),
(3, 'ريلمي 3', 'هذا ريلمي 3', 'ar', 2, NULL, NULL),
(4, 'Realme 3', 'This is realme 3', 'en', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_language` enum('ar','en') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `icon`, `description`, `default_language`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'icon.png', 'Welcome to my website', 'ar', '2020-10-12 10:21:56', '2020-10-12 10:21:56'),
(2, 'logo.png', 'icon.png', 'Welcome to my website', 'ar', '2020-10-12 10:23:36', '2020-10-12 10:23:36'),
(3, 'logo.png', 'icon.png', 'Welcome to my website', 'ar', '2020-10-12 10:26:57', '2020-10-12 10:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` timestamp NULL DEFAULT NULL,
  `identify_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user','seller') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `image`, `date_birth`, `identify_card`, `gender`, `phone`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali Atef', 'ali@ali.com', NULL, '$2y$10$eDTJehSiMPkbHB994dyBzuYeftx9OcwkB/v1.Aao5QEQHqWDo9d2e', 'Mansoura', NULL, NULL, NULL, NULL, '+201551677096', 'admin', 'bWDYWKcYk4IjaDvyhW7C3Um4fBhrkq9VsanGRP9tN1xmxUgu3Sdhwdy5KAfr', '2020-09-27 04:21:33', '2020-10-12 09:19:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comments_product_id_foreign` (`product_id`),
  ADD KEY `product_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_user_id_foreign` (`user_id`),
  ADD KEY `review_product_id_foreign` (`product_id`);

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
  ADD UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  ADD KEY `setting_translations_locale_index` (`locale`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
