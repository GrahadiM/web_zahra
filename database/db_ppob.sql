-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 08:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppob`
--

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
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2019_08_19_000000_create_failed_jobs_table', 1),
(32, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(33, '2020_10_03_125517_create_table_nominal', 1),
(34, '2020_10_03_125541_create_table_pulsa', 1),
(35, '2020_10_03_125555_create_table_kategori', 1),
(36, '2020_10_03_125611_create_table_data', 1),
(37, '2020_10_03_125622_create_table_paket_data', 1),
(38, '2020_10_03_125637_create_table_pln', 1),
(39, '2020_10_03_125655_create_table_nominal_pln', 1),
(40, '2020_10_03_133410_create_table_provider', 1),
(41, '2020_10_04_054139_create_table_pln_customer', 1),
(42, '2021_11_21_172516_create_riwayat_saldos_table', 1),
(43, '2021_11_24_182147_create_request_saldos_table', 1),
(44, '2021_12_11_065435_create_setting_websites_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_saldos`
--

CREATE TABLE `request_saldos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_saldos`
--

CREATE TABLE `riwayat_saldos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `saldoAfter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldoPlus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldoNow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_saldos`
--

INSERT INTO `riwayat_saldos` (`id`, `user_id`, `saldoAfter`, `saldoPlus`, `saldoNow`, `created_at`, `updated_at`) VALUES
(4, 3, '0', '1000000', '1000000', '2021-12-24 18:51:39', '2021-12-24 18:51:39'),
(5, 4, '0', '1000000', '1000000', '2021-12-24 18:52:16', '2021-12-24 18:52:16'),
(6, 5, '0', '1000000', '1000000', '2021-12-24 18:52:20', '2021-12-24 18:52:20'),
(7, 6, '0', '1000000', '1000000', '2021-12-24 18:52:25', '2021-12-24 18:52:25'),
(8, 7, '0', '1000000', '1000000', '2021-12-24 18:52:32', '2021-12-24 18:52:32'),
(9, 8, '0', '1000000', '1000000', '2021-12-24 18:52:35', '2021-12-24 18:52:35'),
(10, 9, '0', '1000000', '1000000', '2021-12-24 18:52:38', '2021-12-24 18:52:38'),
(11, 10, '0', '1000000', '1000000', '2021-12-24 18:52:41', '2021-12-24 18:52:41'),
(12, 11, '0', '1000000', '1000000', '2021-12-24 18:52:44', '2021-12-24 18:52:44'),
(13, 12, '0', '1000000', '1000000', '2021-12-24 18:52:47', '2021-12-24 18:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `setting_websites`
--

CREATE TABLE `setting_websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_websites`
--

INSERT INTO `setting_websites` (`id`, `favicon`, `logo`, `app_name`, `footer_name`, `created_at`, `updated_at`) VALUES
(1, '', '', 'PT Hana Patria Sejati', 'PT Hana Patria Sejati', '2021-12-24 18:42:47', '2021-12-24 18:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `table_kategori`
--

CREATE TABLE `table_kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_kategori`
--

INSERT INTO `table_kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Pulsa', NULL, NULL),
(2, 'Paket Data', NULL, NULL),
(3, 'PLN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_nominal_data`
--

CREATE TABLE `table_nominal_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_provider` int(11) NOT NULL,
  `fixed_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_nominal_data`
--

INSERT INTO `table_nominal_data` (`id`, `nama_paket`, `id_provider`, `fixed_price`, `created_at`, `updated_at`) VALUES
(1, 'Paket 25 GB 1 Bulan', 2, 100000, '2020-10-03 19:56:45', '2020-10-03 19:56:45'),
(2, '1 GB 1 minggu', 1, 20000, '2020-10-03 19:56:45', '2020-10-03 19:56:45'),
(3, '1.5 GB 1 Minggu', 3, 10000, '2020-10-03 20:33:18', '2020-10-03 20:33:18'),
(4, '3 GB 1 Bulan Unlimited Social Media', 2, 25000, '2020-10-03 20:33:18', '2020-10-03 20:33:18'),
(7, '3 GB 1 Bulan', 1, 25000, '2020-10-03 21:48:11', '2020-10-03 21:48:11'),
(8, '7 GB 1 Bulan', 1, 50000, '2020-10-03 21:48:11', '2020-10-03 21:48:11'),
(9, '10 GB & Unlimited Social Media', 2, 50000, '2020-10-03 21:50:54', '2020-10-03 21:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `table_nominal_pln`
--

CREATE TABLE `table_nominal_pln` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paket_pln` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed_price` int(11) NOT NULL,
  `daya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_nominal_pln`
--

INSERT INTO `table_nominal_pln` (`id`, `paket_pln`, `fixed_price`, `daya`, `created_at`, `updated_at`) VALUES
(1, '20Rb', 20200, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(2, '50Rb', 50200, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(3, '100Rb', 100200, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(4, '200Rb', 200200, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(5, '500Rb', 500200, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(6, '1Jt', 1000200, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `table_nominal_pulsa`
--

CREATE TABLE `table_nominal_pulsa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nominal` int(11) NOT NULL,
  `fixed_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_nominal_pulsa`
--

INSERT INTO `table_nominal_pulsa` (`id`, `nominal`, `fixed_price`, `created_at`, `updated_at`) VALUES
(1, 5000, 5200, '2020-10-03 09:24:19', '2020-10-03 09:24:19'),
(2, 10000, 10200, '2020-10-03 09:24:19', '2020-10-03 09:24:19'),
(3, 20000, 20200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 15000, 15200, '2020-10-03 07:51:55', '2020-10-03 07:51:55'),
(5, 25000, 252000, '2020-10-03 09:52:41', '2020-10-03 09:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `table_paket_data`
--

CREATE TABLE `table_paket_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_paket_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_paket_data`
--

INSERT INTO `table_paket_data` (`id`, `nomor_hp`, `id_paket_data`, `id_provider`, `price`, `created_at`, `updated_at`) VALUES
(1, '123456789', '3', '3', '10000', '2021-12-24 19:17:23', '2021-12-24 19:17:23'),
(2, '123456789', '2', '3', '10000', '2021-12-24 19:17:23', '2021-12-24 19:17:23'),
(3, '123456789', '1', '3', '10000', '2021-12-24 19:17:23', '2021-12-24 19:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `table_pln`
--

CREATE TABLE `table_pln` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_paket_pln` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `informasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_pln`
--

INSERT INTO `table_pln` (`id`, `id_customer`, `id_paket_pln`, `price`, `informasi`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 200200, 'pembayaran masuk 1 jam setelah checkout!', '2021-12-24 19:17:44', '2021-12-24 19:17:44'),
(2, 1, 4, 200200, 'pembayaran masuk 1 jam setelah checkout!', '2021-12-24 19:17:44', '2021-12-24 19:17:44'),
(3, 3, 4, 200200, 'pembayaran masuk 1 jam setelah checkout!', '2021-12-24 19:17:44', '2021-12-24 19:17:44'),
(4, 4, 4, 200200, 'pembayaran masuk 1 jam setelah checkout!', '2021-12-24 19:17:44', '2021-12-24 19:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `table_pln_customer`
--

CREATE TABLE `table_pln_customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_meteran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_daya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_pln_customer`
--

INSERT INTO `table_pln_customer` (`id`, `nama`, `id_pelanggan`, `no_meteran`, `batas_daya`, `created_at`, `updated_at`) VALUES
(1, 'Andhika', '434234324234', '111212454', '400 VA', '2020-10-03 22:50:14', NULL),
(2, 'Arda', '465467867', '555222111', '1200 VA', '2020-10-03 23:21:22', NULL),
(3, 'Yanto', '46464546456', '888777999', '450 VA', '2020-10-03 23:21:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_provider`
--

CREATE TABLE `table_provider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_provider`
--

INSERT INTO `table_provider` (`id`, `nama_provider`, `kode_provider`, `created_at`, `updated_at`) VALUES
(1, 'Telkom', '001', '2020-10-03 09:17:48', '2020-10-03 09:17:48'),
(2, 'Indosat Oredooo', '002', '2020-10-03 09:17:48', '2020-10-03 09:17:48'),
(3, 'Tree', '003', '2020-10-03 09:17:48', '2020-10-03 09:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `table_pulsa`
--

CREATE TABLE `table_pulsa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nominal` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_pulsa`
--

INSERT INTO `table_pulsa` (`id`, `nomor_hp`, `id_nominal`, `id_provider`, `price`, `created_at`, `updated_at`) VALUES
(1, '123456789', 5, 1, 252000, '2021-12-24 19:16:53', '2021-12-24 19:16:53'),
(2, '123456789', 4, 2, 15200, '2021-12-24 19:17:09', '2021-12-24 19:17:09'),
(3, '123456789', 5, 1, 252000, '2021-12-24 19:16:53', '2021-12-24 19:16:53'),
(4, '123456789', 4, 2, 15200, '2021-12-24 19:17:09', '2021-12-24 19:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `gender`, `phone`, `address`, `avatar`, `status`, `saldo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '-', '-', NULL, 'admin.jpg', 'active', 0, 'admin@test.com', '2021-07-09 13:19:13', '$2y$10$AnAye3y4J7Zi/GePCiPam.hf7hZ6YldhXFJ30gpn7pbAE3Ki3HpIi', '9bgXyBWPQw14u9qz7kj1bH1rJCcq9y0RDg3vepdov55RmmCpVXYzBGc8h3kg', '2021-12-24 18:42:49', '2021-12-24 18:42:49'),
(2, 'Operator', 'operator', 'Pria', '085767113554', NULL, 'operator.jpg', 'active', 0, 'operator@test.com', '2021-07-09 13:19:13', '$2y$10$buRcpFN2SDzQx37a6uAN7.rT4ELZ6fVl5Y7ta2lnfc2NYPJNh6.za', 'Gz5nd2Bua0WmboQmjI0ESeiGbEtdZse5XucaMT7YnsbsNrbEd1tWTEg1ecza', '2021-12-24 18:42:49', '2021-12-24 18:42:49'),
(3, 'Outlet', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 522600, 'outlet@test.com', '2021-07-09 13:19:13', '$2y$10$.rxL0X3I4hWl3qflR/TmeujO2OvQlmiTpDfpoNbtBDR.dqGHJs7.q', 'FbhOxL49eGSNIMgE0M2UtDZqhRr0oaK4Vcy5kMP1c3OFZ5rIk2IuVGi8jFSB', '2021-12-24 18:42:49', '2021-12-24 19:17:44'),
(4, 'Outlet2', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet2@test.com', '2021-07-09 13:19:13', '$2y$10$rw8DUaRRL3/aJ1djjpiVhOxeKkSMx6C.qrqX2tKWpkkEunYEMSiVG', 'Ru2OlaPD3OHS4P116KEyIgRBrNjdRPqAWwURdDWVxHxSotaquSSQTqWjhwBF', '2021-12-24 18:42:49', '2021-12-24 18:52:16'),
(5, 'Outlet3', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet3@test.com', '2021-07-09 13:19:13', '$2y$10$tFMco/.QSsGTEf8euGEX7erGGUBA.rEg1KYTwkbQrS1Vywspz.Er.', 'Uuu9kiCjILR0sH66qjiiFhy29PGhSb5Imq1OdyanFH4gL2RJ0hSC4g5QTULJ', '2021-12-24 18:42:49', '2021-12-24 18:52:20'),
(6, 'Outlet4', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet4@test.com', '2021-07-09 13:19:13', '$2y$10$K3bnhrKUCbV3jjJgbgT7Ie/ei8iuTy8K/1LKfvpBjUo15lmrfTfjy', '5QcN7tj16EqgBOmwH9Wkf4OhR4bVAZ7Nn2RwJIFRUqKJfEqXjpJ3kHpvY8w1', '2021-12-24 18:42:49', '2021-12-24 18:52:26'),
(7, 'Outlet5', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet5@test.com', '2021-07-09 13:19:13', '$2y$10$zy7VaCvHZGkyT/T4VOA91usfB9H03qb7QM0MntcWuKOtHMmKHNeX6', 'UiXeKLjAYtDq1T5eYf9XP40sQhMEAakXk1pwGJ5OZ1KkZBD8AQkoKHWJB9jN', '2021-12-24 18:42:49', '2021-12-24 18:52:32'),
(8, 'Outlet6', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet6@test.com', '2021-07-09 13:19:13', '$2y$10$ilmwBZsyX9m66tT4ws5Y2OJ/364g6WhgSepuB/VkYY4iHVs9AN83O', '0c2cqgnYsSoEvRaFpLWhUNR2wxETQHe9u6OrdLF6VI45xjlKXGpz6u1nLkGV', '2021-12-24 18:42:49', '2021-12-24 18:52:35'),
(9, 'Outlet7', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet7@test.com', '2021-07-09 13:19:13', '$2y$10$II/2.pmbzMP5.bPDHgZdB.ngqi5PgTwME8cOB4r8OR3GVBwM5R20m', 'XRjZHKOg59PmpwCu8CMacLabC1x9cf7XlgPxjiQn9FpZBEVSHQfPsfESS69E', '2021-12-24 18:42:49', '2021-12-24 18:52:39'),
(10, 'Outlet8', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet8@test.com', '2021-07-09 13:19:13', '$2y$10$mKjlPuAHyaqCCT2zjdYCKem1G7tH1lewpjCQ85qmKnrumP7iEimCq', 'K6wd4QG3I9ad5z1NziHVpLa95TWnA52wJfnFnkS7epxDCcIu8PvmI7CtR9OG', '2021-12-24 18:42:49', '2021-12-24 18:52:41'),
(11, 'Outlet9', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet9@test.com', '2021-07-09 13:19:13', '$2y$10$9wygq7kAXl71iT2htTKyX.wk.cca8E5fMQdjGPI80NJP3E5glqsFG', 'Epq8yLi6X3URnBGh9Xuv4Skywt1VntH8DZkJ2OwkrQc0mvPMZXzSWNTsS9z2', '2021-12-24 18:42:49', '2021-12-24 18:52:44'),
(12, 'Outlet10', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet10@test.com', '2021-07-09 13:19:13', '$2y$10$RYJDGIZtW/CYpB4TMxiVW.ubH/vfefLu5drYHvjzV68NSjNcBiQ8O', 'DElN6zhY7lqd7ypBdZ9HkBM0tZCjkRFDSjQyI8z5eLFQ4Z4T7d8NT4JfiCCw', '2021-12-24 18:42:49', '2021-12-24 18:52:47');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `request_saldos`
--
ALTER TABLE `request_saldos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_saldos`
--
ALTER TABLE `riwayat_saldos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_websites`
--
ALTER TABLE `setting_websites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_kategori`
--
ALTER TABLE `table_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_nominal_data`
--
ALTER TABLE `table_nominal_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_nominal_pln`
--
ALTER TABLE `table_nominal_pln`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_nominal_pulsa`
--
ALTER TABLE `table_nominal_pulsa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_paket_data`
--
ALTER TABLE `table_paket_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_pln`
--
ALTER TABLE `table_pln`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_pln_customer`
--
ALTER TABLE `table_pln_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_provider`
--
ALTER TABLE `table_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_pulsa`
--
ALTER TABLE `table_pulsa`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_saldos`
--
ALTER TABLE `request_saldos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_saldos`
--
ALTER TABLE `riwayat_saldos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `setting_websites`
--
ALTER TABLE `setting_websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_kategori`
--
ALTER TABLE `table_kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_nominal_data`
--
ALTER TABLE `table_nominal_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_nominal_pln`
--
ALTER TABLE `table_nominal_pln`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_nominal_pulsa`
--
ALTER TABLE `table_nominal_pulsa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_paket_data`
--
ALTER TABLE `table_paket_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_pln`
--
ALTER TABLE `table_pln`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_pln_customer`
--
ALTER TABLE `table_pln_customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_provider`
--
ALTER TABLE `table_provider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_pulsa`
--
ALTER TABLE `table_pulsa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
