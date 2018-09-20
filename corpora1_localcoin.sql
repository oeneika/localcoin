-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 07:16 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corpora1_localcoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` bigint(255) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `name`) VALUES
(1, 'Banesco'),
(2, 'Venezuela');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id_bank_account` bigint(255) UNSIGNED NOT NULL,
  `number` bigint(25) UNSIGNED NOT NULL,
  `card_holder` varchar(180) DEFAULT NULL,
  `card_holder_id` int(255) UNSIGNED DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `id_user` bigint(255) UNSIGNED NOT NULL,
  `id_bank` bigint(255) UNSIGNED NOT NULL,
  `deleted` tinyint(2) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0:active,1:deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id_bank_account`, `number`, `card_holder`, `card_holder_id`, `expiration_date`, `id_user`, `id_bank`, `deleted`) VALUES
(1, 12345678900987654321, NULL, NULL, NULL, 2, 2, 0),
(2, 9876543211234567890, NULL, NULL, NULL, 1, 1, 0),
(3, 1789261732456173562, NULL, NULL, NULL, 3, 1, 0),
(4, 9877890987667898765, NULL, NULL, NULL, 6, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id_currency` bigint(255) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `abv` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id_currency`, `name`, `abv`) VALUES
(1, 'Bolivares Soberanos', 'BsS'),
(2, 'Dólar', 'Dol');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` bigint(255) UNSIGNED NOT NULL,
  `id_user` bigint(255) UNSIGNED NOT NULL,
  `id_transaction` bigint(255) UNSIGNED NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `file` varchar(180) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(1, '2018_09_19_152046_create_jobs_table', 1);

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
('300de4b8-2640-403f-86f4-7ef69438da40', 'CorpBinary\\Notifications\\approvedTransaction', 'CorpBinary\\User', 1, '{\"id_transaction\":2,\"price\":12312,\"quantity\":0.0811404,\"message\":\"La transacci\\u00f3n 2 ha sido aprobada\"}', NULL, '2018-09-20 07:56:36', '2018-09-20 07:56:36'),
('3569430e-1e4e-45a1-ae68-53fac7dbf2fc', 'CorpBinary\\Notifications\\approvedTransaction', 'CorpBinary\\User', 1, '{\"id_transaction\":2,\"price\":12312,\"quantity\":0.0811404,\"message\":\"La transacci\\u00f3n 2 ha sido aprobada\"}', NULL, '2018-09-20 08:02:02', '2018-09-20 08:02:02'),
('a747399d-6573-49c3-a8ba-8f88204c3a0b', 'CorpBinary\\Notifications\\approvedTransaction', 'CorpBinary\\User', 2, '{\"id_transaction\":2,\"price\":12312,\"quantity\":0.0811404,\"message\":\"La transacci\\u00f3n 2 ha sido aprobada\"}', NULL, '2018-09-20 07:56:36', '2018-09-20 07:56:36'),
('ad255342-6226-461f-8788-3d800ff5db31', 'CorpBinary\\Notifications\\approvedTransaction', 'CorpBinary\\User', 2, '{\"id_transaction\":2,\"price\":12312,\"quantity\":0.0811404,\"message\":\"La transacci\\u00f3n 2 ha sido aprobada\"}', NULL, '2018-09-20 08:02:02', '2018-09-20 08:02:02');

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
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id_payment_method` bigint(255) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id_payment_method`, `name`, `description`) VALUES
(1, 'Transferencia', 'Transferencia Bancaria'),
(2, 'Credito', 'Credito');

-- --------------------------------------------------------

--
-- Table structure for table `reputation`
--

CREATE TABLE `reputation` (
  `id_user` bigint(255) UNSIGNED NOT NULL,
  `reputation` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reputation`
--

INSERT INTO `reputation` (`id_user`, `reputation`) VALUES
(1, 5),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` bigint(255) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `quantity` float DEFAULT NULL,
  `id_currency` bigint(255) UNSIGNED NOT NULL,
  `id_submitting_user` bigint(255) UNSIGNED DEFAULT NULL,
  `id_receiving_user` bigint(255) UNSIGNED DEFAULT NULL,
  `type` tinyint(2) UNSIGNED NOT NULL COMMENT '0:compra/buy,1:venta/sell',
  `status` int(2) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0:open;1:pending;2:processed',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `terms` text,
  `upper_limit` float UNSIGNED NOT NULL,
  `bottom_limit` float UNSIGNED DEFAULT '1',
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_window` time DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `approved_payment` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `approved_receipt` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `price`, `quantity`, `id_currency`, `id_submitting_user`, `id_receiving_user`, `type`, `status`, `created_at`, `updated_at`, `terms`, `upper_limit`, `bottom_limit`, `payment_method`, `payment_window`, `location`, `approved_payment`, `approved_receipt`) VALUES
(1, 10000, NULL, 1, 2, NULL, 0, 0, '2018-09-18 21:18:53', '2018-09-18 21:18:53', 'lasdkajdak askdjklasjdkl', 5000, 1, 'Transferencia', NULL, 'Venezuela', 0, 0),
(2, 12312, 0.0811404, 2, 1, 2, 1, 2, '2018-09-18 21:22:54', '2018-09-20 04:02:02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras iaculis sagittis nulla quis fringilla. Nullam sit amet est nisl. Nullam id venenatis massa, eu facilisis nulla. Nunc convallis convallis est non sodales. Duis mauris justo, condimentum non nulla in, consequat condimentum ligula. Proin malesuada, urna vel dapibus rhoncus, nibh sem tempus est, eget tincidunt elit urna semper mi. Sed mattis fermentum risus, scelerisque venenatis tellus elementum eget. Etiam sit amet quam erat. Nulla ornare rutrum nibh, vitae mollis sapien interdum sit amet. Praesent condimentum viverra sapien, ut scelerisque orci rutrum non. Sed sed dapibus dolor. Suspendisse id neque faucibus, faucibus mauris at, placerat arcu. Aliquam elementum arcu et sapien semper, ornare dictum magna molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum metus sem, tempor quis mi quis, cursus vehicula risus.', 1000, 1, 'Credito', NULL, 'USA', 1, 1),
(3, 19000, NULL, 1, 7, NULL, 0, 0, '2018-09-20 15:54:47', '2018-09-20 15:54:47', 'Terminos', 19000, 5000, 'Transferencia Electronica', NULL, 'Venezuela', 0, 0),
(4, 123444, NULL, 1, 7, NULL, 0, 0, '2018-09-20 15:56:27', '2018-09-20 15:56:27', 'Compra de Prueba para Corpbinary', 10000, 4000, 'Crédito-Débito', NULL, 'Venezuela', 0, 0),
(5, 10000, NULL, 1, 7, NULL, 1, 0, '2018-09-20 15:59:14', '2018-09-20 15:59:14', 'Venta de Prueba', 10000, 500, 'Cupos Electrónicos', NULL, 'Venezuela', 0, 0),
(6, 10000, NULL, 2, 7, NULL, 1, 0, '2018-09-20 16:01:37', '2018-09-20 16:01:37', 'Otra venta de prueba', 900000, 5888, 'Intercambio', NULL, 'Canáda', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` tinyint(2) DEFAULT '0' COMMENT '0: normal user, 1: admin',
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `identification` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `name`, `lastname`, `gender`, `passport`, `identification`, `phone`, `mobile`, `address`, `country`, `city`, `state`, `birthday`, `user`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'deadgreen_spk@hotmail.com', 0, 'Antonio', 'Gúzman', 'm', 'passport/BMvzEBMmuE8743hTYN2DYnBTjuvxGfmG4cHx15FW.jpeg', NULL, '021235562718', NULL, 'En la esquina', 'Venezuela', 'Caracas', 'Dto Capital', '1986-09-24', 'presidente', '$2y$10$xagW3M0YIL9l1Vh9VbrKhub8v3GpnkkOyP/SSNbvZMKO543SL..Fi', '2018-09-01 22:19:21', '2018-09-01 22:19:21', 'KD5qf3BFAIjiE83TKNZt8jC61TFDqL8w2krHYckJGgc4BVCHB1TlY32h9wKc'),
(2, 'admin@gmail.com', 1, 'Admin', 'Admin', 'm', 'passport/rmhrjgAdn69GD2BLvG6sn5LwEZ2AnWnQZQriHDnu.jpeg', NULL, '04241844847', NULL, 'En la esquina', 'Venezuela', 'Caracas', 'Dto Capital', '1995-03-14', 'sergio', '$2y$10$vvgVRsgiKMwGxauCsVqUhe05N28JLvy7h7FhLQZn.BAPGumpofd32', '2018-09-03 21:39:40', '2018-09-03 21:41:25', 'v9LIs0ejIYlpDNHmAOJv7AUe2v2twJmbMBJJBk7X92ZeVIQjr3zyIskL8gLk'),
(3, 'salazarseijas@gmail.com', 0, 'Marcos', 'Seijas', 'm', 'passport/pDjrqNEOKgbFo10mm0Bqo0mdWmgMzHVRZBBPZig4.png', NULL, '042412343212', NULL, 'Bello Monte', 'Venezuela', 'Caracas', 'Dto Capital', '1971-01-01', 'marcos', '$2y$10$SSvjZdFdNb2y50tAw4wTKuQ1xc6aC6XOQOuAR5FRWaeU4VtClKFui', '2018-09-04 18:36:14', '2018-09-04 18:36:31', '6cNjSc7JbEpUR17Kk2VXgajfpOs3gL31mRGtymjkRyGVEl1UteadwNA8eINX'),
(4, 'w@w.com', 0, 'w', 'w', 'm', 'passport/qp4AmkAWpD9Ne4BpUJQ6cawELN36h8hR1UkC6gtR.png', NULL, 'w', NULL, 'w', 'w', 'w', 'w', '1111-11-11', '2', '$2y$10$WoefuOlQaFKhnyyD7siP1OkIpQxPhgIZv0n8L5Wi73yPRwHt1UD3C', '2018-09-05 00:49:45', '2018-09-05 00:49:45', NULL),
(5, 'email@email.com', 0, 'Wolfgang', 'Van Halen', 'm', 'passport/uppvdsaPlw6t73q6iziR4uKENDNw1fzNNIrmAZCm.jpeg', NULL, '123345657', NULL, 'adsadlkn', 'Venezuela', 'asd', 'Miranda', '2018-09-11', 'van_halen_jr', '$2y$10$DoCXHMtLozlAqaYEvZUhCOFyhAU9vvH9o5eWu51H2Bg0OTIBPKqf.', '2018-09-11 03:36:50', '2018-09-11 03:36:50', 'oChXt8ZLh9RTCzyp2pq5H6ZMqbyDgySGggGNA3UvuETCGwev22DkNs6fu4tG'),
(6, 'bonjovi@gmail.com', 0, 'John', 'Bon Jovi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bonjovi', '$2y$10$u0sqjFOJMRiIuuFr0QorzOnvndBOI10alQwNAuV1oj6BVk8peU94G', '2018-09-16 23:30:49', '2018-09-16 23:30:49', NULL),
(7, 'nuevo@gmail.com', 0, 'Nuevo', 'Usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nuevo_usuario', '$2y$10$LRG5Gym6m1p52L0/Aly.oODki/Y5k4D4YQDovSSDLCJMCyAOr6Vrm', '2018-09-20 15:47:32', '2018-09-20 15:47:32', 'Vao66eAHDRQJEYYVWyEbeoqYb5bWGpdvS6VD1Y11gQ2wZSruwxKfFqwns6tU');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id_wallet` bigint(255) UNSIGNED NOT NULL,
  `address` varchar(37) COLLATE utf8_bin NOT NULL,
  `id_user` bigint(255) UNSIGNED NOT NULL,
  `label` varchar(180) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id_wallet`, `address`, `id_user`, `label`) VALUES
(1, '1BvBMSEYstWetqTFn5Au4m4GFg7xJaNVN2', 2, NULL),
(2, '1BvBMSEYstWetqTFn5Au4m4GFg7xJaNVN0', 1, 'e'),
(3, '1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX', 3, 'Label'),
(4, '11111111111111111111111111', 6, 'BTC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id_bank_account`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id_currency`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_transaction` (`id_transaction`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `email` (`email`(191));

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id_payment_method`);

--
-- Indexes for table `reputation`
--
ALTER TABLE `reputation`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `currency_transaction` (`id_currency`),
  ADD KEY `id_seller_transaction` (`id_receiving_user`),
  ADD KEY `id_seller_transaction1` (`id_submitting_user`),
  ADD KEY `id_buyer_transaction1` (`id_receiving_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id_wallet`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id_bank_account` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id_currency` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id_payment_method` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id_wallet` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD CONSTRAINT `bank_account_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_account_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `reputation`
--
ALTER TABLE `reputation`
  ADD CONSTRAINT `reputation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_5` FOREIGN KEY (`id_currency`) REFERENCES `currency` (`id_currency`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_6` FOREIGN KEY (`id_submitting_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaction_ibfk_7` FOREIGN KEY (`id_receiving_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
