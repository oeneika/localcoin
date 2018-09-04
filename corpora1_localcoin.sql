-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 11:31 PM
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
(3, 1789261732456173562, NULL, NULL, NULL, 3, 1, 0);

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
(1, '2018_09_04_192357_create_notifications_table', 1);

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
('b6cc946b-18a8-45d0-9c95-af75ffcb27e8', 'CorpBinary\\Notifications\\approvedTransaction', 'CorpBinary\\User', 2, '{\"id_transaction\":2,\"price\":2000,\"quantity\":9,\"message\":\"La transacción 2 ha sido aprovada\"}', NULL, '2018-09-05 00:29:16', '2018-09-05 00:29:16'),
('d796d869-3439-4c78-b206-be2f271a99e5', 'CorpBinary\\Notifications\\approvedTransaction', 'CorpBinary\\User', 1, '{\"id_transaction\":2,\"price\":2000,\"quantity\":9,\"message\":\"La transacción 2 ha sido aprovada\"}', NULL, '2018-09-05 00:29:16', '2018-09-05 00:29:16');

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
(1, 3),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` bigint(255) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `quantity` float NOT NULL,
  `id_currency` bigint(255) UNSIGNED NOT NULL,
  `id_submitting_account` bigint(255) UNSIGNED DEFAULT NULL,
  `id_receiving_account` bigint(255) UNSIGNED DEFAULT NULL,
  `type` tinyint(2) UNSIGNED NOT NULL COMMENT '0:compra/buy,1:venta/sell',
  `status` int(2) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0:open;1:pending;2:processed',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `price`, `quantity`, `id_currency`, `id_submitting_account`, `id_receiving_account`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, 1, 0, '2018-09-04 03:24:39', '2018-09-04 03:24:39'),
(2, 2000, 9, 1, 2, 1, 0, 2, '2018-09-04 03:35:49', '2018-09-04 20:29:16'),
(3, 1, 1, 1, 3, 2, 1, 1, '2018-09-04 18:40:58', '2018-09-04 18:42:20'),
(4, 2, 0.0009, 1, 3, NULL, 1, 0, '2018-09-04 18:41:11', '2018-09-04 18:41:11'),
(5, 1, 1, 2, 3, 2, 0, 1, '2018-09-04 18:41:26', '2018-09-04 18:43:12'),
(6, 2, 2, 1, 3, NULL, 0, 0, '2018-09-04 18:41:34', '2018-09-04 18:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` tinyint(2) DEFAULT '0' COMMENT '0: normal user, 1: admin',
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `identification` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `name`, `lastname`, `gender`, `passport`, `identification`, `phone`, `mobile`, `fax`, `address`, `country`, `city`, `state`, `birthday`, `user`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'deadgreen_spk@hotmail.com', 0, 'Antonio', 'Gúzman', 'm', 'passport/BMvzEBMmuE8743hTYN2DYnBTjuvxGfmG4cHx15FW.jpeg', NULL, '021235562718', NULL, NULL, 'En la esquina', 'Venezuela', 'Caracas', 'Dto Capital', '1986-09-24', 'presidente', '$2y$10$xagW3M0YIL9l1Vh9VbrKhub8v3GpnkkOyP/SSNbvZMKO543SL..Fi', '2018-09-01 22:19:21', '2018-09-01 22:19:21', 'q3lordGDDmD71ESh7r7Et4nSv8fK5lzopre9ijokqa3nr8WwFMWMeDbSC5HZ'),
(2, 'admin@gmail.com', 1, 'Sergio', 'García', 'm', 'passport/rmhrjgAdn69GD2BLvG6sn5LwEZ2AnWnQZQriHDnu.jpeg', NULL, '04241844847', NULL, NULL, 'En la esquina', 'Venezuela', 'Caracas', 'Dto Capital', '1995-03-14', 'sergio', '$2y$10$vvgVRsgiKMwGxauCsVqUhe05N28JLvy7h7FhLQZn.BAPGumpofd32', '2018-09-03 21:39:40', '2018-09-03 21:41:25', 'lNVRM7VOGW9VeTpfacWZy7xMRoconfzsZjTFUgCTW73YNgaM9xzJ89M0XziU'),
(3, 'salazarseijas@gmail.com', 0, 'Marcos', 'Seijas', 'm', 'passport/pDjrqNEOKgbFo10mm0Bqo0mdWmgMzHVRZBBPZig4.png', NULL, '042412343212', NULL, NULL, 'Bello Monte', 'Venezuela', 'Caracas', 'Dto Capital', '1971-01-01', 'marcos', '$2y$10$SSvjZdFdNb2y50tAw4wTKuQ1xc6aC6XOQOuAR5FRWaeU4VtClKFui', '2018-09-04 18:36:14', '2018-09-04 18:36:31', 'dKrrcYTi0ueUD1xetDkTEZSYgrZ0sU84ERq7b5Zeq3UatjsRpioqWpZ7xd0P');

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
(3, '1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX', 3, 'Label');

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
  ADD KEY `id_seller_transaction` (`id_receiving_account`),
  ADD KEY `id_seller_transaction1` (`id_submitting_account`),
  ADD KEY `id_buyer_transaction1` (`id_receiving_account`);

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
  MODIFY `id_bank_account` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id_currency` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id_wallet` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `reputation`
--
ALTER TABLE `reputation`
  ADD CONSTRAINT `reputation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_5` FOREIGN KEY (`id_currency`) REFERENCES `currency` (`id_currency`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_7` FOREIGN KEY (`id_submitting_account`) REFERENCES `bank_account` (`id_bank_account`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_8` FOREIGN KEY (`id_receiving_account`) REFERENCES `bank_account` (`id_bank_account`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
