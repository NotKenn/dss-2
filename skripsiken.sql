-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 03:20 PM
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
-- Database: `skripsiken`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `namaKandidat` varchar(225) NOT NULL,
  `c1raw` float NOT NULL,
  `c2raw` float NOT NULL,
  `c3raw` float NOT NULL,
  `c4raw` float NOT NULL,
  `c5raw` float NOT NULL,
  `c6raw` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `namaKandidat`, `c1raw`, `c2raw`, `c3raw`, `c4raw`, `c5raw`, `c6raw`) VALUES
(3, 'Univ A, Prodi A', 1, 0.5, 0.5, 0.75, 1, 0.25),
(4, 'Univ A, Prodi C', 0.5, 0.5, 0.5, 0.25, 0.67, 0.75);

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `code` varchar(225) NOT NULL,
  `criteria` varchar(225) NOT NULL,
  `weight` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `code`, `criteria`, `weight`, `type`, `status`) VALUES
(1, 'C1', 'Peluang Karir', '25', 'Benefit', 'True'),
(2, 'C2', 'Biaya', '15', 'Cost', 'True'),
(3, 'C3', 'Minat', '20', 'Benefit', 'True'),
(4, 'C4', 'Materi', '12', 'Benefit', 'True'),
(5, 'C5', 'Kualitas Program', '13', 'Benefit', 'True'),
(6, 'C6', 'Jarak Kampus', '15', 'Benefit', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `criteriadetail`
--

CREATE TABLE `criteriadetail` (
  `id` int(11) NOT NULL,
  `code` varchar(225) NOT NULL,
  `criteria` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `value` float NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteriadetail`
--

INSERT INTO `criteriadetail` (`id`, `code`, `criteria`, `category`, `value`, `status`) VALUES
(1, 'C1', 'Peluang Karir', 'Sangat Rendah', 0.1, 'True'),
(2, 'C1', 'Peluang Karir', 'Rendah', 0.25, 'True'),
(3, 'C1', 'Peluang Karir', 'Netral', 0.5, 'True'),
(4, 'C1', 'Peluang Karir', 'Tinggi', 0.75, 'True'),
(5, 'C1', 'Peluang Karir', 'Sangat Tinggi', 1, 'True'),
(6, 'C2', 'Biaya', 'Rendah', 1, 'True'),
(7, 'C2', 'Biaya', 'Sesuai', 0.75, 'True'),
(8, 'C2', 'Biaya', 'Sedikit TInggi', 0.5, 'True'),
(9, 'C2', 'Biaya', 'Tinggi', 0.25, 'True'),
(10, 'C3', 'Minat', 'Sangat Rendah', 0.1, 'True'),
(11, 'C3', 'Minat', 'Rendah', 0.25, 'True'),
(12, 'C3', 'Minat', 'Netral', 0.5, 'True'),
(13, 'C3', 'Minat', 'Tinggi', 0.75, 'True'),
(14, 'C3', 'Minat', 'Sangat Tinggi', 1, 'True'),
(15, 'C4', 'Materi', 'Sangat Tidak Cocok', 0.1, 'True'),
(16, 'C4', 'Materi', 'Tidak Cocok', 0.25, 'True'),
(17, 'C4', 'Materi', 'Netral', 0.5, 'True'),
(18, 'C4', 'Materi', 'Cocok', 0.75, 'True'),
(19, 'C4', 'Materi', 'Sangat Cocok', 1, 'True'),
(20, 'C5', 'Kualitas Program', 'Cukup', 0.33, 'True'),
(21, 'C5', 'Kualitas Program', 'Baik', 0.67, 'True'),
(22, 'C5', 'Kualitas Program', 'Sangat Baik', 1, 'True'),
(23, 'C6', 'Lokasi Kampus', 'Sangat Jauh', 0.1, 'True'),
(24, 'C6', 'Lokasi Kampus', 'Jauh', 0.25, 'True'),
(25, 'C6', 'Lokasi Kampus', 'Netral', 0.5, 'True'),
(26, 'C6', 'Lokasi Kampus', 'Dekat', 0.75, 'True'),
(27, 'C6', 'Lokasi Kampus', 'Sangat Dekat', 1, 'True');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(225) NOT NULL,
  `C1normal` float NOT NULL,
  `C2normal` float NOT NULL,
  `C3normal` float NOT NULL,
  `C4normal` float NOT NULL,
  `C5normal` float NOT NULL,
  `c6normal` float NOT NULL,
  `total` float NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `jurusan`, `C1normal`, `C2normal`, `C3normal`, `C4normal`, `C5normal`, `c6normal`, `total`, `ranking`) VALUES
(2, 'Univ A, Prodi A', 1, 1, 1, 1, 1, 0.333333, 90, 1),
(4, 'Univ A, Prodi C', 0.5, 1, 1, 0.333333, 0.67, 1, 75.21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `location`, `about_me`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@softui.com', '$2y$10$PVSmXAX57YbjgXRiSB0mw.E6GybP1ySGysDlIUJ8Oeyj0G.WjH2IW', NULL, NULL, NULL, NULL, '2024-11-01 08:03:33', '2024-11-01 08:03:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteriadetail`
--
ALTER TABLE `criteriadetail`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
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
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `criteriadetail`
--
ALTER TABLE `criteriadetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
