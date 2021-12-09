-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 10:45 AM
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
(43, '2021_11_24_182147_create_request_saldos_table', 1);

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

--
-- Dumping data for table `request_saldos`
--

INSERT INTO `request_saldos` (`id`, `user_id`, `bukti`, `nominal`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '20211209_134542_Outlet.png', 1000000, 'sukses', '2021-12-09 06:45:42', '2021-12-09 06:45:42');

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
(1, 3, '0', '1000000', '1000000', '2021-12-09 06:44:10', '2021-12-09 06:44:10');

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
(1, '20Rb', 25000, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(2, '50Rb', 55000, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(3, '100Rb', 105000, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(4, '200Rb', 205000, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(5, '500Rb', 505000, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41'),
(6, '1Jt', 1005000, 0, '2020-10-03 22:29:41', '2020-10-03 22:29:41');

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
(1, 5000, 6500, '2020-10-03 09:24:19', '2020-10-03 09:24:19'),
(2, 10000, 11500, '2020-10-03 09:24:19', '2020-10-03 09:24:19'),
(3, 20000, 21500, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 15000, 16500, '2020-10-03 07:51:55', '2020-10-03 07:51:55'),
(5, 25000, 26000, '2020-10-03 09:52:41', '2020-10-03 09:52:41');

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
(1, '085111222333', '1', '2', '100000', '2020-10-03 21:17:44', '2020-10-03 21:17:44'),
(2, '083555444777', '3', '3', '10000', '2020-10-03 21:51:50', '2020-10-03 21:51:50'),
(3, '087555444111', '3', '3', '10000', '2020-10-03 21:53:59', '2020-10-03 21:53:59'),
(4, '085654785215', '3', '3', '10000', '2020-10-03 21:54:25', '2020-10-03 21:54:25'),
(5, '085654785215', '1', '3', '10000', '2020-10-03 21:56:44', '2020-10-03 21:56:44'),
(6, '085888999777', '7', '3', '10000', '2020-10-03 21:58:15', '2020-10-03 21:58:15'),
(7, '085654785215', '1', '3', '10000', '2020-10-03 22:01:16', '2020-10-03 22:01:16'),
(8, '08565478544', '9', '3', '50000', '2020-10-03 22:06:29', '2020-10-03 22:06:29'),
(9, '085111222333', '9', '3', '50000', '2020-10-04 01:20:36', '2020-10-04 01:20:36');

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
(1, 3, 1, 20000, 'pembayaran masuk 1 jam setelah checkout!', '2020-10-03 23:24:00', '2020-10-03 23:24:00'),
(2, 2, 2, 50000, 'pembayaran masuk 1 jam setelah checkout!', '2020-10-03 23:30:42', '2020-10-03 23:30:42'),
(3, 1, 4, 200000, 'pembayaran masuk 1 jam setelah checkout!', '2020-10-03 23:39:25', '2020-10-03 23:39:25'),
(4, 6, 2, 50000, 'pembayaran masuk 1 jam setelah checkout!', '2020-10-04 01:21:53', '2020-10-04 01:21:53');

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
(1, 'Andhika', '434234324234', '111212454', '400 VA', '2020-10-03 22:50:14', '2020-10-03 22:50:14'),
(2, 'Arda', '465467867', '555222111', '1200 VA', '2020-10-03 23:21:22', '2020-10-03 23:21:22'),
(3, 'Yanto', '46464546456', '888777999', '450 VA', '2020-10-03 23:21:22', '2020-10-03 23:21:22'),
(4, 'Yudha', '11133366699', '46464648', '1200 VA', '2020-10-04 01:09:50', '2020-10-04 01:09:50'),
(5, 'Budi santoso', '123454656', '444777888', '450 VA', '2020-10-04 01:10:23', '2020-10-04 01:10:23'),
(6, 'Lathifa', '423443444555', '43432434', '1200 VA', '2020-10-04 01:14:19', '2020-10-04 01:14:19');

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
(1, '0645645645654', 2, 1, 11500, '2020-10-03 10:04:57', '2020-10-03 10:04:57'),
(10, '085654785215', 2, 2, 11500, '2020-10-03 10:35:45', '2020-10-03 10:35:45'),
(11, '085654785215', 1, 2, 6500, '2020-10-03 10:38:50', '2020-10-03 10:38:50'),
(12, '085654785215', 2, 1, 11500, '2020-10-03 19:44:13', '2020-10-03 19:44:13'),
(13, '085888999777', 5, 2, 26000, '2020-10-03 20:52:29', '2020-10-03 20:52:29'),
(14, '08565478544', 5, 2, 26000, '2020-10-03 22:06:58', '2020-10-03 22:06:58'),
(15, '083555444777', 5, 3, 26000, '2020-10-03 22:07:24', '2020-10-03 22:07:24'),
(16, '085654785215', 2, 2, 11500, '2020-10-03 22:07:50', '2020-10-03 22:07:50'),
(17, '085654785215', 5, 2, 26000, '2020-10-04 01:16:05', '2020-10-04 01:16:05');

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
(1, 'Admin', 'admin', '-', '-', NULL, 'admin.jpg', 'active', 0, 'admin@test.com', '2021-07-09 13:19:13', '$2y$10$kbBS8Ayc8zmmIKx6YpIEFOoCaXX7r0dF2u1scA24s25ukxcnvWh0K', 'S1EmHTymYjkBMMgztcy8VrDVRm0qwaKBFF7snUKlFiceoGrrdaDiFx0bVhi4', '2021-12-09 06:12:55', '2021-12-09 06:12:55'),
(2, 'Operator', 'operator', 'Pria', '085767113554', NULL, 'operator.jpg', 'active', 0, 'operator@test.com', '2021-07-09 13:19:13', '$2y$10$3NFMIwO79ez2nZF3LtCfZupUTbZO6n7olUV0c1Uyhro.GgB0TrTa2', 'QhjVwI7NnJqQfof7uysZwkzyuTd0EN4hmia9MIlbBEegLiyA5eF8jHT7WkBy', '2021-12-09 06:12:55', '2021-12-09 06:12:55'),
(3, 'Outlet', 'outlet', 'Pria', '085767113554', NULL, 'outlet.jpg', 'non-active', 1000000, 'outlet@test.com', '2021-07-09 13:19:13', '$2y$10$4Kc5icchVITQ3WNze7dNvuaTw8yshvGYrK2bwNt.BPHtheDSnBZ3G', 'CFkquveBi7bFNDFyqHyQqRou5fIWwS1Eljjxda72G3Bl8Yo61XDctohQZV7G', '2021-12-09 06:12:55', '2021-12-09 06:44:11');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_saldos`
--
ALTER TABLE `request_saldos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayat_saldos`
--
ALTER TABLE `riwayat_saldos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_kategori`
--
ALTER TABLE `table_kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_pln`
--
ALTER TABLE `table_pln`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
