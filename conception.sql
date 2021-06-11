-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 11 juin 2021 à 14:57
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `conception`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_10_161921_create_shops_table', 1),
(5, '2021_06_10_161932_create_produits_table', 1),
(6, '2021_06_11_051649_create_shop_produits_table', 1),
(7, '2021_06_10_162022_create_user_shops_table', 1),
(8, '2021_06_11_100138_create_ventes_table', 2),
(9, '2021_06_11_100157_create_vente_produits_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `name`, `description`, `unite`, `prix`, `created_at`, `updated_at`) VALUES
(1, 'Pâtes', 'Les pâtes alimentaires sont des aliments fabriqués à partir d\'un mélange pétri de farine, de semoule de blé dur, d\'épeautre, de blé noir, de riz, de maïs ou d\'autres types de céréales, d\'eau et parfois d\'œuf et de sel', '250g', '20000', '2021-06-11 02:14:38', '2021-06-11 02:14:38'),
(2, 'Huile Soja', 'L\'huile de soja est une huile végétale extraite du soja par trituration, et utilisée dans l\'alimentation. Depuis quelques années, elle est aussi utilisée dans la production de biodiesel.', '1 L', '5000', '2021-06-11 02:15:25', '2021-06-11 02:15:25');

-- --------------------------------------------------------

--
-- Structure de la table `shops`
--

DROP TABLE IF EXISTS `shops`;
CREATE TABLE IF NOT EXISTS `shops` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Score', 'Akoor\'digue', NULL, NULL),
(2, 'Supermaki', 'Itaosy', NULL, NULL),
(3, 'Jumbo Score', 'Itaosy', '2021-06-11 02:02:15', '2021-06-11 02:02:15');

-- --------------------------------------------------------

--
-- Structure de la table `shop_produits`
--

DROP TABLE IF EXISTS `shop_produits`;
CREATE TABLE IF NOT EXISTS `shop_produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produit_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_produits`
--

INSERT INTO `shop_produits` (`id`, `produit_id`, `shop_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '57', '2021-06-11 02:14:38', '2021-06-11 09:06:49'),
(2, '1', '2', '5', '2021-06-11 02:14:38', '2021-06-11 03:19:36'),
(3, '1', '3', '20', '2021-06-11 02:14:38', '2021-06-11 03:19:41'),
(4, '2', '1', '20', '2021-06-11 02:15:25', '2021-06-11 10:23:58'),
(5, '2', '2', '200', '2021-06-11 02:15:25', '2021-06-11 03:19:49'),
(6, '2', '3', '150', '2021-06-11 02:15:25', '2021-06-11 03:19:52');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nomenarisoa', 'nomenarisoa.hajalalaina@gmail.com', '1', NULL, '$2y$10$rTTxlE2Fb1iBQiCL6kxwBev.pWmfnHX.bx6rS7djsJBetoQcElbfe', NULL, '2021-06-10 13:35:12', '2021-06-10 13:35:12'),
(2, 'marielle', 'raveloarisoa.marielle@gmail.com', '3', NULL, '$2y$10$rcQjsZ8eDpxPj4QsKTmQnutJ1jcLZujHwJ4w2V8.DRErP8SeXU4Ha', NULL, '2021-06-11 01:37:34', '2021-06-11 01:37:34'),
(4, 'Rindrarisoa', 'nomenajah@yahoo.fr', '2', NULL, '$2y$10$10oGo7yMNNDi.6OOHwp5zu/TI9EzlB6wLVIoDTM0tWAbNJERh5u5u', NULL, '2021-06-11 01:48:20', '2021-06-11 01:48:20'),
(5, 'Haja', 'bainjohraks@gmail.com', '3', NULL, '$2y$10$WRlwquqaIiF0bkaNH9/NyeYBXjdDavQgdKqyNg6NQQIb1dxrsSpFm', NULL, '2021-06-11 10:11:30', '2021-06-11 10:11:30');

-- --------------------------------------------------------

--
-- Structure de la table `user_shops`
--

DROP TABLE IF EXISTS `user_shops`;
CREATE TABLE IF NOT EXISTS `user_shops` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_shops`
--

INSERT INTO `user_shops` (`id`, `shop_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2021-06-11 01:37:34', '2021-06-11 01:37:34'),
(2, '1', '4', '2021-06-11 01:48:20', '2021-06-11 01:48:20'),
(3, '2', '4', '2021-06-11 01:48:20', '2021-06-11 01:48:20'),
(4, '3', '5', '2021-06-11 01:48:20', '2021-06-11 01:48:20');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

DROP TABLE IF EXISTS `ventes`;
CREATE TABLE IF NOT EXISTS `ventes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventes_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id`, `user_id`, `shop_id`, `montant_total`, `created_at`, `updated_at`) VALUES
(16, '1', '1', '25000', '2021-06-11 08:21:30', '2021-06-11 08:21:30'),
(15, '1', '1', '25000', '2021-06-11 08:21:21', '2021-06-11 08:21:21'),
(14, '1', '1', '105000', '2021-06-11 07:59:06', '2021-06-11 07:59:06'),
(13, '1', '1', '125000', '2021-06-11 07:41:27', '2021-06-11 07:41:27'),
(12, '1', '1', '100000', '2021-06-11 07:40:07', '2021-06-11 07:40:07'),
(11, '1', '1', '25000', '2021-06-11 07:40:00', '2021-06-11 07:40:00'),
(17, '1', '1', '45000', '2021-06-11 08:22:07', '2021-06-11 08:22:07'),
(18, '1', '1', '45000', '2021-06-11 08:26:54', '2021-06-11 08:26:54'),
(19, '1', '1', '25000', '2021-06-11 08:30:44', '2021-06-11 08:30:44'),
(20, '1', '1', '25000', '2021-06-11 08:33:44', '2021-06-11 08:33:44'),
(21, '1', '1', '50000', '2021-06-11 08:49:54', '2021-06-11 08:49:54'),
(22, '1', '1', '65000', '2021-06-11 08:51:33', '2021-06-11 08:51:33'),
(23, '1', '1', '105000', '2021-06-11 08:51:58', '2021-06-11 08:51:58'),
(24, '1', '1', '95000', '2021-06-11 08:53:12', '2021-06-11 08:53:12'),
(25, '1', '1', '130000', '2021-06-11 08:54:19', '2021-06-11 08:54:19'),
(26, '1', '1', '120000', '2021-06-11 08:56:33', '2021-06-11 08:56:33'),
(27, '1', '1', '135000', '2021-06-11 08:57:25', '2021-06-11 08:57:25'),
(28, '1', '1', '70000', '2021-06-11 09:06:49', '2021-06-11 09:06:49'),
(29, '5', '3', '80000', '2021-06-11 11:50:34', '2021-06-11 11:50:34');

-- --------------------------------------------------------

--
-- Structure de la table `vente_produits`
--

DROP TABLE IF EXISTS `vente_produits`;
CREATE TABLE IF NOT EXISTS `vente_produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produit_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantiter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vente_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vente_produits_produit_id_index` (`produit_id`),
  KEY `vente_produits_vente_id_index` (`vente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vente_produits`
--

INSERT INTO `vente_produits` (`id`, `produit_id`, `quantiter`, `vente_id`, `created_at`, `updated_at`) VALUES
(16, '2', '5', '13', '2021-06-11 07:41:27', '2021-06-11 07:41:27'),
(15, '1', '5', '13', '2021-06-11 07:41:27', '2021-06-11 07:41:27'),
(14, '1', '4', '12', '2021-06-11 07:40:07', '2021-06-11 07:40:07'),
(13, '2', '4', '12', '2021-06-11 07:40:07', '2021-06-11 07:40:07'),
(12, '2', '1', '11', '2021-06-11 07:40:00', '2021-06-11 07:40:00'),
(11, '1', '1', '11', '2021-06-11 07:40:00', '2021-06-11 07:40:00'),
(17, '1', '4', '14', '2021-06-11 07:59:06', '2021-06-11 07:59:06'),
(18, '2', '5', '14', '2021-06-11 07:59:06', '2021-06-11 07:59:06'),
(19, '1', '1', '15', '2021-06-11 08:21:21', '2021-06-11 08:21:21'),
(20, '1', '1', '16', '2021-06-11 08:21:30', '2021-06-11 08:21:30'),
(21, '1', '2', '17', '2021-06-11 08:22:07', '2021-06-11 08:22:07'),
(22, '1', '2', '18', '2021-06-11 08:26:54', '2021-06-11 08:26:54'),
(23, '1', '1', '19', '2021-06-11 08:30:44', '2021-06-11 08:30:44'),
(24, '1', '1', '20', '2021-06-11 08:33:44', '2021-06-11 08:33:44'),
(25, '1', '2', '21', '2021-06-11 08:49:54', '2021-06-11 08:49:54'),
(26, '1', '2', '22', '2021-06-11 08:51:33', '2021-06-11 08:51:33'),
(27, '2', '5', '22', '2021-06-11 08:51:33', '2021-06-11 08:51:33'),
(28, '1', '4', '23', '2021-06-11 08:51:58', '2021-06-11 08:51:58'),
(29, '2', '5', '23', '2021-06-11 08:51:58', '2021-06-11 08:51:58'),
(30, '1', '4', '24', '2021-06-11 08:53:12', '2021-06-11 08:53:12'),
(31, '2', '3', '24', '2021-06-11 08:53:12', '2021-06-11 08:53:12'),
(32, '1', '5', '25', '2021-06-11 08:54:19', '2021-06-11 08:54:19'),
(33, '2', '6', '25', '2021-06-11 08:54:19', '2021-06-11 08:54:19'),
(34, '1', '5', '26', '2021-06-11 08:56:33', '2021-06-11 08:56:33'),
(35, '2', '4', '26', '2021-06-11 08:56:33', '2021-06-11 08:56:33'),
(36, '1', '6', '27', '2021-06-11 08:57:25', '2021-06-11 08:57:25'),
(37, '2', '3', '27', '2021-06-11 08:57:25', '2021-06-11 08:57:25'),
(38, '1', '3', '28', '2021-06-11 09:06:49', '2021-06-11 09:06:49'),
(39, '2', '2', '28', '2021-06-11 09:06:49', '2021-06-11 09:06:49'),
(40, '1', '3', '29', '2021-06-11 11:50:34', '2021-06-11 11:50:34'),
(41, '2', '4', '29', '2021-06-11 11:50:34', '2021-06-11 11:50:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
