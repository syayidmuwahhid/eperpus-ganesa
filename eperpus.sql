-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 08:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_bukus`
--

CREATE TABLE `data_bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penerbit_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `kategori_buku_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_bukus`
--

INSERT INTO `data_bukus` (`id`, `kode_buku`, `judul`, `penerbit_id`, `tahun_terbit`, `penulis`, `kategori_buku_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '99230', 'Final LAst', 1, '2000', 'me', 1, 1, '2023-03-25 07:51:48', NULL);

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
-- Table structure for table `kategori_bukus`
--

CREATE TABLE `kategori_bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_bukus`
--

INSERT INTO `kategori_bukus` (`id`, `nama_kategori`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'buku pelajaran', 1, '2023-03-25 07:40:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nama`, `nim`, `created_at`, `updated_at`) VALUES
(1, 'iki', 123, NULL, NULL),
(2, 'rahmat', 2, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_02_011454_create_kategori_bukus_table', 1),
(6, '2023_02_02_012021_create_penerbits_table', 1),
(7, '2023_02_02_020125_create_data_bukus_table', 1),
(8, '2023_02_02_020355_create_penerimaans_table', 1),
(9, '2023_02_02_020422_create_pengeluarans_table', 1),
(10, '2023_02_08_132503_create_anggotas_table', 1),
(11, '2023_02_09_130341_create_peminjamen_table', 1),
(12, '2023_03_25_142220_create_mahasiswas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerbits`
--

CREATE TABLE `penerbits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbits`
--

INSERT INTO `penerbits` (`id`, `nama_penerbit`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Airlangga', 1, '2023-03-25 07:51:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaans`
--

CREATE TABLE `penerimaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerimaans`
--

INSERT INTO `penerimaans` (`id`, `kode_buku`, `tanggal_diterima`, `jumlah`, `keterangan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '99230', '2023-03-25', 100, NULL, 1, '2023-03-25 07:52:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `tanggal_dikeluarkan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perpus_transaksi`
--

CREATE TABLE `perpus_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perpus_transaksi`
--

INSERT INTO `perpus_transaksi` (`id`, `kode_buku`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '99230', '2023-03-25', NULL, 2, 0, 2, '2023-03-25 07:52:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `finger_data` text DEFAULT NULL,
  `status_user` int(11) NOT NULL,
  `nomor_anggota` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `finger_data`, `status_user`, `nomor_anggota`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', NULL, NULL, 1, NULL, NULL, '$2y$10$GLGsa/bNyHuSwDlr9dfATe6trKsvT11K1llw5cs7tdGxs/weV.7MG', NULL, NULL, NULL),
(2, 'siswa', 'siswa', NULL, '', 3, '123', NULL, '$2y$10$zSIcnrOoBUHcw1j2CNJtyOk38kIMzLUleshZ7RQw712QcwHzoLGUq', NULL, '2023-03-25 07:47:26', NULL),
(3, 'siswa', 's', NULL, '', 2, NULL, NULL, '$2y$10$2QC3gUWy22ompMif24QjIOmgb2wZxuYng66nljGbaL.c1pNy4su6m', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bukus`
--
ALTER TABLE `data_bukus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_bukus_kode_buku_unique` (`kode_buku`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kategori_buku_id` (`kategori_buku_id`),
  ADD KEY `penerbit_id` (`penerbit_id`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori_bukus`
--
ALTER TABLE `kategori_bukus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_bukus_nama_kategori_unique` (`nama_kategori`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `penerbits`
--
ALTER TABLE `penerbits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penerbits_nama_penerbit_unique` (`nama_penerbit`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `penerimaans`
--
ALTER TABLE `penerimaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_buku` (`kode_buku`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kode_buku_2` (`kode_buku`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_buku` (`kode_buku`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `perpus_transaksi`
--
ALTER TABLE `perpus_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_buku` (`kode_buku`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_bukus`
--
ALTER TABLE `data_bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_bukus`
--
ALTER TABLE `kategori_bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penerbits`
--
ALTER TABLE `penerbits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penerimaans`
--
ALTER TABLE `penerimaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perpus_transaksi`
--
ALTER TABLE `perpus_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_bukus`
--
ALTER TABLE `data_bukus`
  ADD CONSTRAINT `data_bukus_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_bukus_ibfk_2` FOREIGN KEY (`kategori_buku_id`) REFERENCES `kategori_bukus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori_bukus`
--
ALTER TABLE `kategori_bukus`
  ADD CONSTRAINT `kategori_bukus_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penerbits`
--
ALTER TABLE `penerbits`
  ADD CONSTRAINT `penerbits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penerbits_ibfk_2` FOREIGN KEY (`id`) REFERENCES `data_bukus` (`penerbit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penerimaans`
--
ALTER TABLE `penerimaans`
  ADD CONSTRAINT `penerimaans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penerimaans_kode_buku_foreign` FOREIGN KEY (`kode_buku`) REFERENCES `data_bukus` (`kode_buku`);

--
-- Constraints for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD CONSTRAINT `pengeluarans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengeluarans_kode_buku_foreign` FOREIGN KEY (`kode_buku`) REFERENCES `data_bukus` (`kode_buku`);

--
-- Constraints for table `perpus_transaksi`
--
ALTER TABLE `perpus_transaksi`
  ADD CONSTRAINT `perpus_transaksi_ibfk_1` FOREIGN KEY (`kode_buku`) REFERENCES `data_bukus` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perpus_transaksi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
