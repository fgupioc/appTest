-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-12-2016 a las 12:14:50
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `code`, `name`, `stock`, `description`, `image`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, '279345', 'leche', 3, 'de la leche', '', 1, NULL, NULL),
(2, 2, '34523', 'gaceosa', 34, 'de la gaceosa', '', 1, NULL, NULL),
(3, 6, '12311', 'articulo test', 100, 'nueva descripcion', '', 1, '2016-12-19 21:23:13', '2016-12-19 21:23:13'),
(4, 4, '0001', 'producto 1', 100, 'Praesent ac sem', '1482165094_Base_de_Datos.png', 1, '2016-12-19 21:31:34', '2016-12-19 21:31:34'),
(5, 14, '0003', 'chelas', 100, 'Praesent nec nisl a purus blandit viverra. Suspendisse eu ligula. In hac habitasse platea dictumst.', '1482165170_activar_rewrite.png', 1, '2016-12-19 21:32:50', '2016-12-19 21:32:50');

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
(15, 'nuevo test', 'descricpion', 1, '2016-12-19 08:49:10', '2016-12-19 08:49:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2016_12_16_043728_create_noticias_table', 1),
(7, '2016_12_17_035359_create_categories_table', 2),
(9, '2016_12_19_021150_create_articles_table', 3);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
