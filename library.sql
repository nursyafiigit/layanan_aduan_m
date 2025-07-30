-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 08:20 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `available` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category_id`, `isbn`, `published_at`, `pages`, `available`, `created_at`, `updated_at`) VALUES
(2, 'dawd', 'www', 1, NULL, NULL, NULL, 2, '2025-07-29 12:41:22', '2025-07-30 02:43:11'),
(3, 'dawda', '1231', 1, '1231', '2025-07-08', 2000, 0, '2025-07-29 12:45:25', '2025-07-29 12:45:25'),
(4, 'ioidf', 'laldha', 1, 'wqe123', '2025-07-01', 2312, 0, '2025-07-29 12:48:04', '2025-07-29 12:48:04'),
(5, 'sdadwa', 'dqeww', 1, '123133', '2025-07-01', 231, 0, '2025-07-29 12:48:55', '2025-07-29 14:07:44'),
(6, 'kkahds', 'asdawq', 1, '3123', '2025-07-10', 21, 127, '2025-07-29 12:50:30', '2025-07-30 03:07:40'),
(7, 'eqwe', '123wq', 2, '13', '2025-07-01', 3232, 125, '2025-07-29 13:03:50', '2025-07-30 04:22:35'),
(8, 'kkkn', 'gugyg', 3, '77', '2025-07-02', 6866, 687, '2025-07-29 13:04:29', '2025-07-30 02:32:01'),
(9, 'SSSS', 'EEEE', 4, '1222', '2233-02-12', 332, 22, '2025-07-30 09:59:39', '2025-07-30 09:59:39'),
(10, 'weqe', '12qwe', 2, '213', '3323-03-12', 123, 222, '2025-07-30 10:00:30', '2025-07-30 10:00:30');

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ududud', 'buku anu', '0000-00-00 00:00:00', '2025-07-29 12:55:51'),
(2, 'dawd', 'fesd', '2025-07-29 12:36:44', '2025-07-29 12:36:44'),
(3, 'dawa', 'wadas', '2025-07-29 12:55:00', '2025-07-29 12:55:00'),
(4, 'ngene', 'buku anu', '2025-07-29 13:22:23', '2025-07-29 13:22:23'),
(5, 'ngene', 'buku anu', '2025-07-29 13:22:23', '2025-07-29 13:22:23'),
(6, 'brike', 'askhdkj', '2025-07-30 01:32:24', '2025-07-30 01:32:24'),
(7, 'anu', '123', '2025-07-30 10:01:16', '2025-07-30 10:01:16');

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
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date NOT NULL,
  `actual_return_date` date DEFAULT NULL,
  `status` enum('borrowed','returned','late') NOT NULL DEFAULT 'borrowed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `book_id`, `member_id`, `loan_date`, `return_date`, `actual_return_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2025-07-02', '2025-07-14', NULL, 'late', '2025-07-29 13:58:03', '2025-07-29 13:58:44'),
(2, 2, 1, '2025-07-23', '2025-07-30', NULL, '', '2025-07-29 13:59:26', '2025-07-29 13:59:26'),
(3, 5, 2, '2025-07-01', '2025-08-01', NULL, '', '2025-07-29 14:00:09', '2025-07-29 14:00:09'),
(4, 7, 1, '2025-07-23', '2025-07-30', NULL, 'returned', '2025-07-29 14:14:32', '2025-07-30 02:28:27'),
(5, 2, 2, '2025-07-16', '2025-07-30', NULL, 'returned', '2025-07-29 14:16:02', '2025-07-30 02:31:52'),
(6, 6, 1, '2025-07-24', '2025-07-29', NULL, 'returned', '2025-07-29 14:21:12', '2025-07-30 02:32:19'),
(7, 7, 1, '2025-07-28', '2025-07-31', NULL, 'returned', '2025-07-29 14:40:52', '2025-07-30 02:31:54'),
(8, 6, 1, '2025-07-11', '2025-07-18', NULL, 'returned', '2025-07-30 01:53:39', '2025-07-30 02:31:56'),
(9, 8, 2, '2025-06-30', '2025-07-01', NULL, 'returned', '2025-07-30 01:54:42', '2025-07-30 02:32:01'),
(10, 6, 1, '2025-07-09', '2025-07-01', '2025-07-22', 'returned', '2025-07-30 02:39:12', '2025-07-30 02:44:04'),
(11, 6, 1, '2025-07-09', '2025-07-24', '2025-07-16', 'returned', '2025-07-30 02:39:21', '2025-07-30 03:07:40'),
(12, 2, 1, '2025-07-02', '2025-07-31', '2025-07-01', 'returned', '2025-07-30 02:43:01', '2025-07-30 02:43:11'),
(13, 7, 1, '2025-07-17', '2025-07-24', '2025-07-01', 'returned', '2025-07-30 04:20:15', '2025-07-30 04:22:35'),
(14, 6, 2, '2025-07-09', '2025-07-10', NULL, 'borrowed', '2025-07-30 04:26:30', '2025-07-30 04:26:30'),
(15, 2, 1, '2025-07-31', '2025-07-25', NULL, 'borrowed', '2025-07-30 04:26:47', '2025-07-30 04:26:47'),
(26, 6, 1, '2122-02-21', '2322-12-22', NULL, 'borrowed', '2025-07-30 08:32:59', '2025-07-30 08:32:59'),
(27, 6, 2, '2222-02-21', '0333-02-12', NULL, 'borrowed', '2025-07-30 08:52:14', '2025-07-30 08:52:14'),
(28, 6, 2, '2222-02-21', '0333-02-12', NULL, 'borrowed', '2025-07-30 09:01:00', '2025-07-30 09:01:00'),
(29, 6, 2, '2222-02-21', '0333-02-28', NULL, 'borrowed', '2025-07-30 09:01:15', '2025-07-30 09:01:15'),
(30, 7, 1, '2022-02-21', '2022-02-22', NULL, 'borrowed', '2025-07-30 09:08:32', '2025-07-30 09:08:32'),
(31, 2, 1, '2222-02-21', '2333-02-22', NULL, 'borrowed', '2025-07-30 09:11:50', '2025-07-30 09:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'Nursda', 'pekber@sdfs', '344242', '2025-07-29 13:57:07', '2025-07-29 13:57:07'),
(2, 'kumir', 'kumir@ljej', '77733', '2025-07-29 13:57:25', '2025-07-29 13:57:25'),
(3, 'Ikhsan Petuk', 'ikhga@gmails.com', '123313', '2025-07-30 09:58:19', '2025-07-30 09:58:19');

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
(4, '2025_07_29_181003_create_members_table', 1),
(5, '2025_07_29_185048_create_categories_table', 2),
(6, '2025_07_29_185150_create_books_table', 3),
(10, '2025_07_29_192615_create_loans_table', 4),
(11, '2025_07_29_201107_add_return_columns_to_loans_table', 4),
(12, '2025_07_29_203831_alter_members_table', 5),
(13, '2025_07_29_211058_alter_status_column_in_loans_table', 6);

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
('AKdmYKMq5buZMNigIuha2lhUdH7DgGCCMn4Hvj9t', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGVZVjBqZktIeUFRWVpweldFa1JBZ2FVMnlzNkhFVlR4OElqV2k4aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2Fucy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753894991);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_book_id_foreign` (`book_id`),
  ADD KEY `loans_member_id_foreign` (`member_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
