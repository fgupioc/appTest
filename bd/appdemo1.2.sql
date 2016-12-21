-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-12-2016 a las 11:50:43
-- Versión del servidor: 5.6.33-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `appdemo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `stock` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `code`, `name`, `stock`, `description`, `image`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, '279345', 'leche', 3, 'de la leche', '', 0, NULL, '2016-12-21 21:20:46'),
(2, 2, '34523', 'gaceosa', 34, 'de la gaceosa', '1482254447_Captura_de_pantalla_de_2016-06-14_23:41:11.png', 1, NULL, '2016-12-20 22:20:47'),
(3, 6, '0012', 'articulo test', 100, 'nueva descripcion', '1482252101_Captura_de_pantalla_de_2016-07-10_23:07:43.png', 0, '2016-12-19 21:23:13', '2016-12-21 21:20:51'),
(4, 4, '0001', 'azucar', 100, 'Praesent ac sem', '1482165094_Base_de_Datos.png', 0, '2016-12-19 21:31:34', '2016-12-21 21:20:50'),
(5, 14, '0003', 'chelas', 40, 'Praesent nec nisl a purus blandit viverra. Suspendisse eu ligula. In hac habitasse platea dictumst.', '1482165170_activar_rewrite.png', 1, '2016-12-19 21:32:50', '2016-12-21 21:21:13'),
(6, 9, '33333', 'sapolio', 12, 'Fusce risus nisl viverra', '', 0, '2016-12-20 05:49:45', '2016-12-21 21:20:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `condition` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `condition`, `created_at`, `updated_at`) VALUES
(1, 'lacteos', 'todo de la leche', 1, NULL, NULL),
(2, 'licores', 'locores', 1, NULL, NULL),
(3, 'categoria 3', ' Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut  ', 0, NULL, '2016-12-19 08:49:20'),
(4, 'categoria 4', 'query', 1, NULL, NULL),
(5, 'servicos', 'servicos', 0, NULL, NULL),
(6, 'vestimenta', 'vestimenta', 1, NULL, NULL),
(7, 'comida', 'comidfa', 0, NULL, NULL),
(8, 'liquidos', 'liquidos', 0, NULL, '2016-12-18 01:25:57'),
(9, 'limpieza', 'limpieza', 1, NULL, NULL),
(10, 'utiles', 'utiles', 0, NULL, '2016-12-18 01:25:48'),
(11, 'nueva categoria', 'descripcion ', 0, '2016-12-18 00:49:11', '2016-12-18 04:17:21'),
(12, 'nueva categoria', 'sdfsdfsd', 0, '2016-12-18 00:50:20', '2016-12-18 04:17:18'),
(13, 'test nuevo', 'tesr', 0, '2016-12-18 00:52:18', '2016-12-18 01:25:41'),
(14, 'test nuevo2', 'asdfsdf', 1, '2016-12-18 04:17:34', '2016-12-18 04:17:34'),
(15, 'nuevo test', 'descricpion', 0, '2016-12-19 08:49:10', '2016-12-20 19:56:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type_document` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'dni',
  `num_document` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `type_person`, `name`, `type_document`, `num_document`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Cliente', 'franz junior gupioc', 'dni', '46588976', 'trujillo', '123456', 'dsdeg.9026@gmail.com', NULL, NULL),
(2, 'Cliente', 'maria ventura alvis', 'dni', '65438765', 'lamud', '7654876543', 'maria@hotmail.com', NULL, NULL),
(3, 'Proveedor', 'ACEPTA PERU S.A.C', 'dni', '20562999711', 'Calle Ocho N° 248 Dpto. 102 Urbanización Monterrico Norte (Av. Principal-Boulevard Cdra.1)  - San Borja - Lima', '643465756', 'wzumaeta@alfaconsult.com', NULL, '2016-12-21 01:01:30'),
(4, 'Cliente', 'gael ', 'dni', '564564', 'lamud', '876543', '', '2016-12-21 00:17:24', '2016-12-21 00:41:01'),
(5, 'Cliente', 'Horacio', 'dni', '564564', 'lima', '', 'trilce@gamil.com', '2016-12-21 00:34:28', '2016-12-21 00:41:24'),
(6, 'Proveedor', 'nuevo proveedor', 'ruc', '34567', 'test', '298765', 'test@test.com', '2016-12-21 01:02:12', '2016-12-21 01:02:23'),
(7, 'Proveedor', 'sporting cristal', 'ruc', '3456789456', 'lima peru', '00987654', 'sporting@cristal.com', '2016-12-21 21:15:28', '2016-12-21 21:15:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `type_document` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `serie_document` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `num_document` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` datetime NOT NULL,
  `tax` decimal(8,2) NOT NULL DEFAULT '0.00',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entries_customer_id_foreign` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `entries`
--

INSERT INTO `entries` (`id`, `customer_id`, `type_document`, `serie_document`, `num_document`, `date`, `tax`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 'boleta', '0002', '0023', '2016-12-28 00:00:00', 0.17, 1, NULL, NULL),
(2, 2, 'factura', '004', '0134', '2016-12-21 00:00:00', 0.17, 0, NULL, NULL),
(3, 3, 'boleta', '995', '56', '2016-12-21 08:40:18', 23.00, 1, '2016-12-21 18:40:18', '2016-12-21 18:40:18'),
(4, 3, 'factura', '005', '0002', '2016-12-21 08:44:47', 0.17, 0, '2016-12-21 18:44:47', '2016-12-21 19:25:14'),
(5, 3, 'factura', '345', '56', '2016-12-21 08:59:51', 45.00, 1, '2016-12-21 18:59:51', '2016-12-21 18:59:51'),
(6, 6, 'tiket', '232354', '45456', '2016-12-21 09:00:36', 456456.00, 0, '2016-12-21 19:00:36', '2016-12-21 19:25:08'),
(7, 3, 'tiket', '56546', '5464', '2016-12-21 09:01:40', 6.00, 1, '2016-12-21 19:01:40', '2016-12-21 19:01:40'),
(8, 7, 'factura', '00034', '111111111', '2016-12-21 11:17:41', 0.17, 1, '2016-12-21 21:17:41', '2016-12-21 21:17:41'),
(9, 6, 'tiket', '0004', '63485', '2016-12-21 11:20:32', 0.16, 1, '2016-12-21 21:20:32', '2016-12-21 21:20:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entry_details`
--

CREATE TABLE IF NOT EXISTS `entry_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price_buy` decimal(8,2) NOT NULL DEFAULT '0.00',
  `price_sale` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entry_details_entry_id_foreign` (`entry_id`),
  KEY `entry_details_article_id_foreign` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `entry_details`
--

INSERT INTO `entry_details` (`id`, `entry_id`, `article_id`, `quantity`, `price_buy`, `price_sale`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 6, 1.70, 3.00, NULL, NULL),
(2, 1, 3, 12, 34.00, 30.00, NULL, NULL),
(3, 2, 1, 10, 5.00, 6.00, NULL, NULL),
(4, 3, 1, 3, 3.00, 2.00, '2016-12-21 18:40:18', '2016-12-21 18:40:18'),
(5, 3, 3, 4, 5.00, 5.00, '2016-12-21 18:40:18', '2016-12-21 18:40:18'),
(6, 4, 3, 1, 12.00, 11.00, '2016-12-21 18:44:47', '2016-12-21 18:44:47'),
(7, 4, 5, 5, 10.00, 9.00, '2016-12-21 18:44:47', '2016-12-21 18:44:47'),
(8, 5, 3, 2, 34.00, 43.00, '2016-12-21 18:59:51', '2016-12-21 18:59:51'),
(9, 6, 2, 34, 45.00, 456.00, '2016-12-21 19:00:36', '2016-12-21 19:00:36'),
(10, 6, 3, 345, 456.00, 75.00, '2016-12-21 19:00:36', '2016-12-21 19:00:36'),
(11, 7, 3, 564, 46.00, 67.00, '2016-12-21 19:01:40', '2016-12-21 19:01:40'),
(12, 7, 5, 34, 34.00, 5.00, '2016-12-21 19:01:40', '2016-12-21 19:01:40'),
(13, 7, 2, 45, 4.00, 6.00, '2016-12-21 19:01:40', '2016-12-21 19:01:40'),
(14, 7, 6, 45, 56.00, 67.00, '2016-12-21 19:01:40', '2016-12-21 19:01:40'),
(15, 8, 5, 40, 7.00, 6.00, '2016-12-21 21:17:41', '2016-12-21 21:17:41'),
(16, 9, 4, 100, 90.00, 50.00, '2016-12-21 21:20:32', '2016-12-21 21:20:32');

--
-- Disparadores `entry_details`
--
DROP TRIGGER IF EXISTS `trUpStocIngreso`;
DELIMITER //
CREATE TRIGGER `trUpStocIngreso` AFTER INSERT ON `entry_details`
 FOR EACH ROW BEGIN
    	update articles set stock = stock + new.quantity
	where articles.id = new.article_id;
	 END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2016_12_16_043728_create_noticias_table', 1),
(7, '2016_12_17_035359_create_categories_table', 2),
(9, '2016_12_19_021150_create_articles_table', 3),
(10, '2016_12_20_172946_create_customers_table', 4),
(13, '2016_12_20_201355_create_entries_table', 5),
(14, '2016_12_20_201654_create_entry_details_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `urlImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `descripcion`, `urlImg`, `created_at`, `updated_at`) VALUES
(1, 'titulo113', 'descripcion nueva', '1481922806_15215918_698248240349071_436815899_o.jpg', '2016-12-16 23:30:57', '2016-12-17 02:14:31'),
(2, 'titulo2', '12335434', '1481922813_CYMERA_20131222_122055.jpg', '2016-12-16 23:43:25', '2016-12-17 02:13:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.com', '$2y$10$CYABzpiXOkfd64Qi9LDr6O1UHwgjAqFlV6yVqAu5mh/jCy7mS46bq', NULL, '2016-12-16 23:30:47', '2016-12-16 23:30:47');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `entries_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Filtros para la tabla `entry_details`
--
ALTER TABLE `entry_details`
  ADD CONSTRAINT `entry_details_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `entry_details_entry_id_foreign` FOREIGN KEY (`entry_id`) REFERENCES `entries` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
