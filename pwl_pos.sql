-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2024 at 01:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_11_023447_create_m_level_table', 1),
(6, '2024_09_11_024444_create_m_kategori_table', 2),
(7, '2024_09_11_024500_create_m_supplier_table', 2),
(8, '2024_09_11_024906_create_m_user_table', 2),
(9, '2024_09_11_025312_create_m_barang_table', 3),
(10, '2024_09_11_025421_create_t_penjualan_table', 3),
(11, '2024_09_11_025434_create_t_stok_table', 3),
(12, '2024_09_11_025512_create_t_penjualan_detail_table', 3),
(13, '2024_09_20_042344_add_deleted_at_to_m_user_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `barang_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `barang_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 'SPORT1', 'Onitsuka Tiger', 2000000, 2500000, NULL, NULL),
(2, 1, 'SPORT2', 'Kronikel Project', 500000, 550000, NULL, NULL),
(3, 1, 'SPORT3', 'New Balance 550', 1000000, 1800000, NULL, NULL),
(4, 2, 'OBT1', 'Tempra Anak', 100000, 120000, NULL, NULL),
(5, 2, 'OBT2', 'Antasida', 100000, 130000, NULL, NULL),
(6, 2, 'OBT3', 'IPI Vit C', 5000, 8000, NULL, NULL),
(7, 3, 'FURN1', 'Sapu', 20000, 25000, NULL, NULL),
(8, 3, 'FURN2', 'Bolde Pel', 30000, 35000, NULL, NULL),
(9, 3, 'FURN3', 'Sulak', 15000, 20000, NULL, NULL),
(10, 4, 'TECH1', 'USB Cable', 20000, 30000, NULL, NULL),
(11, 4, 'TECH2', 'Logitech Mouse', 100000, 110000, NULL, NULL),
(12, 4, 'TECH3', 'Toucpen', 120000, 130000, NULL, NULL),
(13, 5, 'BABY1', 'Piyama Anak', 50000, 55000, NULL, NULL),
(14, 5, 'BABY2', 'Morinaga Platinum 1kg', 300000, 350000, NULL, NULL),
(15, 5, 'BABY3', 'Stroller Bayi', 1000000, 1500000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` bigint UNSIGNED NOT NULL,
  `kategori_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_kode`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(1, 'SPORT', 'Alat Olahraga', NULL, NULL),
(2, 'OBT', 'Obat-Obatan', NULL, NULL),
(3, 'FURN', 'Furniture', NULL, NULL),
(4, 'TECH', 'Gadget & Pc', NULL, NULL),
(5, 'BABY', 'Kebutuhan Bayi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `level_id` bigint UNSIGNED NOT NULL,
  `level_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`level_id`, `level_kode`, `level_nama`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrator', NULL, NULL),
(2, 'MNG', 'Manager', NULL, NULL),
(3, 'STF', 'Staff/Kasir', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `supplier_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`supplier_id`, `created_at`, `updated_at`, `supplier_alamat`, `supplier_nama`, `supplier_kode`) VALUES
(1, NULL, NULL, 'Surabaya', 'Sports Station', 'S1'),
(2, NULL, NULL, 'Malang', 'IKEA', 'S2'),
(3, NULL, NULL, 'Gresik', 'KIDSZONE', 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `username`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Administrator', '$2y$12$1Mp7BD6dyl5hOPzrgvsEaeghM2GpnUZWvTplJrA3BLfklyzC8z7Xe', NULL, NULL),
(2, 2, 'manager', 'Manager', '$2y$12$Hv50FmM0CoggsHOR0caBQuNmiWEa6lXq8en8Ik9ppXZAPZAaPlW0K', NULL, NULL),
(3, 3, 'staff', 'Staff/Kasir', '$2y$12$SCQANLyy15fiuolYkWhft.0L3ba7yp5Y7YA.GnFTFPD7wBybC9jga', NULL, NULL),
(18, 2, 'manager_dua', 'Manager 2', '$2y$12$n9Dw1zUwEtt0s9q3iqWeKuR6ExRNyUHrEihCObO6DCrvGOlGX6VV6', '2024-09-17 18:23:52', '2024-09-17 18:23:52'),
(23, 2, 'manager33', 'Manager Tiga Tiga', '$2y$12$P0OgL0QCpC9PFOxsyGhdcubSUgV3AXHCD0vWx1qwqfzQBW59QdgAW', '2024-09-19 09:00:42', '2024-09-19 09:00:42'),
(25, 2, 'manager56', 'Manager55', '$2y$12$FvGlDpOxNDfPryJCOig.D.0JoqnvCJwbsieYdZ263SPmqd0wznixe', '2024-09-19 09:11:15', '2024-09-19 09:11:15'),
(26, 2, 'manager12', 'Manager11', '$2y$12$sljZEbK4EhbIiPlLfkdzweHXXk62KCQsaqIt/gE5WItKCKiQanZFa', '2024-09-19 09:28:42', '2024-09-19 09:28:42'),
(38, 3, 'nanas', 'naswa', '$2y$12$kVRnqGolylxn.cjis75JqOi5jxB.A9BfP8JFVIKhE5PKawkC18uuC', '2024-09-19 12:13:58', '2024-09-19 12:13:58');

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE `t_penjualan` (
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`penjualan_id`, `user_id`, `pembeli`, `penjualan_kode`, `penjualan_tanggal`, `created_at`, `updated_at`) VALUES
(1, 3, 'Prof. Seamus Rath', 'SATU', '2024-09-09 00:00:00', NULL, NULL),
(2, 1, 'Sonia King', 'DUA', '2024-09-09 00:00:00', NULL, NULL),
(3, 1, 'Renee Streich', 'TIGA', '2024-09-09 00:00:00', NULL, NULL),
(4, 1, 'Dr. Roberta Kreiger MD', 'EMPAT', '2024-09-09 00:00:00', NULL, NULL),
(5, 1, 'Ruthe Kertzmann Sr.', 'LIMA', '2024-09-09 00:00:00', NULL, NULL),
(6, 2, 'Alden McLaughlin', 'ENAM', '2024-09-09 00:00:00', NULL, NULL),
(7, 2, 'Abdullah Kiehn', 'TUJUH', '2024-09-09 00:00:00', NULL, NULL),
(8, 3, 'Mrs. Marlene McLaughlin', 'DELAPAN', '2024-09-09 00:00:00', NULL, NULL),
(9, 3, 'Adeline Kuhic', 'SEMBILAN', '2024-09-09 00:00:00', NULL, NULL),
(10, 3, 'Mr. Ervin Muller V', 'SEPULUH', '2024-09-09 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan_detail`
--

CREATE TABLE `t_penjualan_detail` (
  `detail_id` bigint UNSIGNED NOT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan_detail`
--

INSERT INTO `t_penjualan_detail` (`detail_id`, `penjualan_id`, `barang_id`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 25000, 3, NULL, NULL),
(2, 1, 2, 5500000, 8, NULL, NULL),
(3, 1, 3, 8000000, 2, NULL, NULL),
(4, 2, 2, 5500000, 7, NULL, NULL),
(5, 2, 4, 120000, 7, NULL, NULL),
(6, 2, 6, 8000, 9, NULL, NULL),
(7, 3, 2, 5500000, 7, NULL, NULL),
(8, 3, 9, 20000, 6, NULL, NULL),
(9, 3, 12, 130000, 6, NULL, NULL),
(10, 4, 2, 5500000, 2, NULL, NULL),
(11, 4, 10, 30000, 2, NULL, NULL),
(12, 4, 14, 250000, 1, NULL, NULL),
(13, 5, 2, 5500000, 5, NULL, NULL),
(14, 5, 2, 5500000, 4, NULL, NULL),
(15, 5, 10, 30000, 2, NULL, NULL),
(16, 6, 11, 110000, 5, NULL, NULL),
(17, 6, 15, 25000, 3, NULL, NULL),
(18, 6, 13, 55000, 3, NULL, NULL),
(19, 7, 14, 250000, 5, NULL, NULL),
(20, 7, 2, 5500000, 3, NULL, NULL),
(21, 7, 9, 20000, 8, NULL, NULL),
(22, 8, 8, 25000, 5, NULL, NULL),
(23, 8, 12, 130000, 9, NULL, NULL),
(24, 8, 6, 8000, 7, NULL, NULL),
(25, 9, 10, 30000, 4, NULL, NULL),
(26, 9, 11, 110000, 3, NULL, NULL),
(27, 9, 15, 25000, 2, NULL, NULL),
(28, 10, 12, 130000, 2, NULL, NULL),
(29, 10, 15, 25000, 7, NULL, NULL),
(30, 10, 2, 5500000, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_stok`
--

CREATE TABLE `t_stok` (
  `stok_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `stok_tanggal` datetime NOT NULL,
  `stok_jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stok`
--

INSERT INTO `t_stok` (`stok_id`, `supplier_id`, `barang_id`, `user_id`, `stok_tanggal`, `stok_jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-09-09 00:00:00', 3, NULL, NULL),
(2, 1, 2, 1, '2024-09-09 00:00:00', 3, NULL, NULL),
(3, 1, 3, 1, '2024-09-09 00:00:00', 6, NULL, NULL),
(4, 1, 4, 1, '2024-09-09 00:00:00', 8, NULL, NULL),
(5, 1, 5, 2, '2024-09-09 00:00:00', 4, NULL, NULL),
(6, 1, 6, 2, '2024-09-09 00:00:00', 5, NULL, NULL),
(7, 1, 7, 2, '2024-09-09 00:00:00', 6, NULL, NULL),
(8, 1, 8, 2, '2024-09-09 00:00:00', 7, NULL, NULL),
(9, 1, 9, 2, '2024-09-09 00:00:00', 9, NULL, NULL),
(10, 1, 10, 2, '2024-09-09 00:00:00', 5, NULL, NULL),
(11, 1, 11, 3, '2024-09-09 00:00:00', 4, NULL, NULL),
(12, 1, 12, 3, '2024-09-09 00:00:00', 5, NULL, NULL),
(13, 1, 13, 3, '2024-09-09 00:00:00', 3, NULL, NULL),
(14, 1, 14, 3, '2024-09-09 00:00:00', 4, NULL, NULL),
(15, 1, 15, 3, '2024-09-09 00:00:00', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `m_barang_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `m_level_level_kode_unique` (`level_kode`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `m_user_username_unique` (`username`),
  ADD KEY `m_user_level_id_index` (`level_id`);

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
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `t_penjualan_user_id_index` (`user_id`);

--
-- Indexes for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `t_penjualan_detail_penjualan_id_index` (`penjualan_id`),
  ADD KEY `t_penjualan_detail_barang_id_index` (`barang_id`);

--
-- Indexes for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `t_stok_supplier_id_index` (`supplier_id`),
  ADD KEY `t_stok_barang_id_index` (`barang_id`),
  ADD KEY `t_stok_user_id_index` (`user_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `barang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `supplier_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `penjualan_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  MODIFY `detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_stok`
--
ALTER TABLE `t_stok`
  MODIFY `stok_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD CONSTRAINT `m_barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`);

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_levelforeign` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`),
  ADD CONSTRAINT `m_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`);

--
-- Constraints for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD CONSTRAINT `t_penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);

--
-- Constraints for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD CONSTRAINT `t_penjualan_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_penjualan_detail_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `t_penjualan` (`penjualan_id`);

--
-- Constraints for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD CONSTRAINT `t_stok_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_stok_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `m_supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stok_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
