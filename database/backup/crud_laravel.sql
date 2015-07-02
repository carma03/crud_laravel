-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-06-2015 a las 13:01:16
-- Versión del servidor: 5.5.37-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `crud_laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_profesor` int(10) unsigned NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `periodo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anio` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cursos_id_profesor_foreign` (`id_profesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `id_profesor`, `descripcion`, `periodo`, `anio`, `fecha_inicio`, `created_at`, `updated_at`) VALUES
(1, 'Cálculo 1', 2, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores ', '2P', '2015', '2017-03-01', '2015-06-30 07:22:37', '2015-06-30 16:25:27'),
(2, 'Teatro', 4, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', '1P', '2015', '2015-06-11', '2015-06-30 07:49:46', '2015-06-30 16:26:00'),
(4, 'Habilidades del Pensamiento', 2, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores ', '1P', '2016', '2015-07-08', '2015-06-30 16:47:01', '2015-06-30 17:04:20'),
(5, 'Física 1', 3, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores ', '2P', '2016', '2015-07-15', '2015-06-30 17:40:42', '2015-06-30 17:40:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_06_29_111854_create_profesores_table', 1),
('2015_06_29_230502_create_cursos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesors`
--

CREATE TABLE IF NOT EXISTS `profesors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `profesors_email_unique` (`email`),
  UNIQUE KEY `profesors_codigo_unique` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `profesors`
--

INSERT INTO `profesors` (`id`, `nombre`, `apellido`, `email`, `codigo`, `created_at`, `updated_at`) VALUES
(1, 'Jorge', 'Castro', 'yeimerzabaleta@hotmail.com', 'A12345', '2015-06-30 07:14:14', '2015-06-30 07:14:14'),
(2, 'Paul', 'Perez', 'katicos.store@gmail.com', 'T0004321', '2015-06-30 07:14:32', '2015-06-30 07:14:32'),
(3, 'Mario', 'Altamar', 'andres-angulo@live.com', 'T00012345', '2015-06-30 07:58:23', '2015-06-30 07:58:23'),
(4, 'Andres', 'Díaz', 'kathezm658@yahoo.es', 'T00012346', '2015-06-30 07:58:37', '2015-06-30 07:58:37');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_id_profesor_foreign` FOREIGN KEY (`id_profesor`) REFERENCES `profesors` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
