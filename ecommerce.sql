-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2024 a las 19:41:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `blogcategoria_id` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(255) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `meta_titulo` varchar(255) DEFAULT NULL,
  `descripcion_corta` text DEFAULT NULL,
  `meta_descripcion` text DEFAULT NULL,
  `meta_p_clave` varchar(1000) DEFAULT NULL,
  `total_vistas` tinyint(4) NOT NULL DEFAULT 0,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `titulo`, `slug`, `blogcategoria_id`, `nombre_imagen`, `descripcion`, `meta_titulo`, `descripcion_corta`, `meta_descripcion`, `meta_p_clave`, `total_vistas`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'E-commerce Laravel 10', 'e-commerce-laravel-10', 5, 'bvfslnftk55zzoa82hxg.jpg', '<p><span style=\"font-family: &quot;Courier New&quot;;\">E-commerce Laravel 10, E-commerce Laravel 10,&nbsp;E-commerce Laravel 10,&nbsp;</span><span style=\"font-family: &quot;Courier New&quot;; font-size: 1rem;\">E-commerce Laravel 10</span><br></p>', 'E-commerce Laravel 10', 'E-commerce Laravel 10, E-commerce Laravel 10, xd', '', '', 33, 0, 0, '2024-05-14 16:40:37', '2024-05-19 02:57:35'),
(2, 'E-commerce con java EE', 'e-commerce-con-java-ee', 3, 'yyq8hczbeoq0ifd6d4wi.jpg', '<p><span style=\"font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif; font-size: 26px;\"><font color=\"#000000\" style=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</font></span><br></p>', 'E-commerce con java EE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '', '', 3, 0, 0, '2024-05-15 15:30:13', '2024-05-19 02:57:39'),
(3, 'E-commerce django', 'e-commerce-django', 6, 'aynjthjaaimajd18vcgr.jpg', '<p>E-commerce django<br></p>', 'E-commerce django', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', 2, 0, 0, '2024-05-15 15:30:55', '2024-05-17 14:59:27'),
(4, 'E-commerce PHP', 'e-commerce-php', 1, 'vjgx61h87nmzhf9fk0fj.webp', '<p>E-commerce PHP<br></p>', 'E-commerce PHP', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', 12, 0, 0, '2024-05-15 15:31:24', '2024-05-17 19:35:34'),
(5, 'Calculadora en JavaScript', 'calculadora-en-javascript', 2, 's2wyrcclcd6busopyaba.png', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', 'Calculadora en JavaScript', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', 1, 0, 0, '2024-05-15 17:26:47', '2024-05-17 14:45:08'),
(6, 'Calculadora en Python', 'calculadora-en-python', 4, 'whkrjtqwx5uax0zdxe9g.webp', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', 'Calculadora en Python', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', 0, 0, 0, '2024-05-15 17:28:20', '2024-05-17 14:45:50'),
(7, 'Calculadora en PHP', 'calculadora-en-php', 1, '0oru9zaz9cukhtssqpta.jpg', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', 'Calculadora en PHP', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', 11, 0, 0, '2024-05-15 17:30:31', '2024-05-17 14:57:35'),
(8, 'Calculadora en Java', 'calculadora-en-java', 3, 'j7o5voovltn5hjdmgvlu.webp', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', 'Calculadora en Java', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', 4, 0, 0, '2024-05-15 17:31:49', '2024-05-19 02:14:13'),
(9, 'Calculadora en Kotlin', 'calculadora-en-kotlin', 7, 'plnc6heqx3frfx1gtrju.png', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</span><br></p>', 'Calculadora en Kotlin', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', 18, 0, 0, '2024-05-15 17:33:31', '2024-05-17 14:46:04'),
(10, 'Calculadora en C++', 'calculadora-en-c', 8, 'p1zf388b9rep93hbci3v.webp', '<p>Calculadora en c++, desarrollada en Youtube, me robe la imagen :D</p>', 'Calculadora en C++', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', 2, 0, 0, '2024-05-16 14:18:32', '2024-05-19 02:57:55'),
(11, 'Paquete php', 'paquete-php', 1, '9w0ccit9ttv4i0m4xcqg.png', '<p><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.</span><br></p>', 'Paquete php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', 10, 0, 0, '2024-05-17 14:49:03', '2024-05-19 02:57:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_categoria`
--

CREATE TABLE `blog_categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_titulo` varchar(255) DEFAULT NULL,
  `meta_descripcion` text DEFAULT NULL,
  `meta_p_clave` varchar(1000) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog_categoria`
--

INSERT INTO `blog_categoria` (`id`, `nombre`, `slug`, `meta_titulo`, `meta_descripcion`, `meta_p_clave`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 'php', 'PHP', '', '', 0, 0, '2024-05-13 15:16:10', '2024-05-13 15:22:08'),
(2, 'JavaScript', 'javascript', 'JavaScript', '', '', 0, 0, '2024-05-14 16:00:01', '2024-05-14 16:00:01'),
(3, 'Java', 'java', 'Java', '', '', 0, 0, '2024-05-14 16:00:24', '2024-05-14 16:00:24'),
(4, 'Python', 'python', 'Python', '', '', 0, 0, '2024-05-14 16:00:39', '2024-05-14 16:00:39'),
(5, 'Laravel', 'laravel', 'Laravel', '', '', 0, 0, '2024-05-14 16:17:46', '2024-05-14 16:17:46'),
(6, 'DJango', 'django', 'DJango', '', '', 0, 0, '2024-05-15 15:26:32', '2024-05-15 15:26:32'),
(7, 'Kotlin', 'kotlin', 'Kotlin', '', '', 0, 0, '2024-05-15 17:32:18', '2024-05-15 17:32:18'),
(8, 'C++', 'c', 'C++', '', '', 0, 0, '2024-05-16 14:16:42', '2024-05-16 14:16:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_comentarios`
--

CREATE TABLE `blog_comentarios` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog_comentarios`
--

INSERT INTO `blog_comentarios` (`id`, `user_id`, `blog_id`, `comentario`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'ok', '2024-05-17 19:35:33', '2024-05-17 19:35:33'),
(2, 1, 11, 'Ok', '2024-05-17 19:39:23', '2024-05-17 19:39:23'),
(3, 1, 1, 'Es un buen ecommerce hasta ahora', '2024-05-17 20:27:06', '2024-05-17 20:27:06'),
(4, 1, 1, 'Tiene administracion de sliders :D', '2024-05-17 20:29:26', '2024-05-17 20:29:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_productos`
--

CREATE TABLE `calificacion_productos` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `opinion` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificacion_productos`
--

INSERT INTO `calificacion_productos` (`id`, `producto_id`, `pedido_id`, `user_id`, `rating`, `opinion`, `created_at`, `updated_at`) VALUES
(1, 22, 1, 1, 3, 'Muy bueno el arroz :D', '2024-04-22 20:01:28', '2024-04-22 20:01:28'),
(2, 22, 6, 17, 4, 'Que haya otra presentacion :\'v', '2024-04-22 20:10:07', '2024-04-22 20:10:07'),
(3, 15, 7, 17, 4, 'Al comienzo la tablet es buena, despues de tiempo se vuelve lente :\'c', '2024-04-23 16:22:18', '2024-04-23 16:22:18'),
(4, 3, 8, 17, 1, 'No me gustó', '2024-04-23 19:05:22', '2024-04-23 19:05:22'),
(5, 23, 18, 1, 5, 'Muy bueno la verdad', '2024-05-10 14:52:43', '2024-05-10 14:52:43'),
(6, 24, 2, 1, 1, 'No me gustó', '2024-05-12 19:01:27', '2024-05-12 19:01:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `nombre_imagen` varchar(255) DEFAULT NULL,
  `nombre_button` varchar(255) NOT NULL,
  `esta_inicio` tinyint(4) NOT NULL DEFAULT 0,
  `meta_titulo` varchar(255) DEFAULT NULL,
  `meta_descripcion` text DEFAULT NULL,
  `meta_p_clave` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`, `nombre_imagen`, `nombre_button`, `esta_inicio`, `meta_titulo`, `meta_descripcion`, `meta_p_clave`, `created_by`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'Tecnología', 'tecnologia', 'fx7tt9jbkxczaffoprun.jpg', 'Comprar', 1, 'Tecnología', 'Tecnología', 'Tecnología', 1, 0, 0, '2024-01-29 20:58:12', '2024-05-08 14:22:45'),
(2, 'Moda', 'moda', '2ekjdg8ov5w694qef9t9.png', 'Comprar', 1, 'Moda', 'Moda', 'Moda', 1, 0, 0, '2024-01-30 14:34:06', '2024-05-08 14:23:50'),
(3, 'Muebles del hogar', 'muebles-del-hogar', NULL, '', 0, 'Muebles del hogar', 'Muebles del hogar', 'Muebles del hogar', 1, 0, 0, '2024-01-31 04:42:24', '2024-02-05 04:26:43'),
(4, 'Belleza y cuidado', 'belleza-cuidado', NULL, '', 0, 'Belleza y cuidado', 'Belleza y cuidado', 'Belleza y cuidado', 1, 0, 0, '2024-02-05 04:27:45', '2024-02-05 04:30:10'),
(5, 'Libros, películas y música', 'libros-peliculas-musica', NULL, '', 0, 'Libros, películas y música', 'Libros, películas y música', 'Libros, películas y música', 1, 0, 0, '2024-02-05 04:28:53', '2024-02-06 13:48:55'),
(6, 'Juguetes y juegos', 'juguetes-juegos', 'kie1vibezcnao7krhcxf.webp', 'Comprar', 0, 'Juguetes y juegos', 'Juguetes y juegos', 'Juguetes y juegos', 1, 0, 0, '2024-02-05 04:30:00', '2024-05-12 18:06:41'),
(7, 'Deportes', 'deportes', NULL, '', 0, 'Deportes', 'Deportes', 'Deportes', 1, 0, 0, '2024-02-05 04:30:56', '2024-02-05 04:30:56'),
(8, 'Joyas y relojes', 'joyas-relojes', NULL, '', 0, 'Joyas y relojes', 'Joyas y relojes', 'Joyas y relojes', 1, 0, 0, '2024-02-05 04:31:50', '2024-04-01 19:52:45'),
(9, 'Abarrotes', 'abarrotes', 'zox3niahxoi4bieqna7j.webp', 'Comprar', 0, 'Abarrotes', 'Abarrotes', 'Abarrotes', 1, 0, 0, '2024-03-18 17:31:02', '2024-05-12 14:04:26'),
(10, 'Limpieza', 'limpieza', 'la1auz2ctntwpypm4sqh.webp', 'Comprar', 0, 'Limpieza', 'Limpieza', 'Limpieza', 1, 0, 0, '2024-05-08 14:35:44', '2024-05-12 14:04:34'),
(11, 'Embutidos', 'embutidos', 'gsujqglsg9nzwf4qfwc6.jpg', 'Comprar', 1, 'Embutidos', 'Embutidos', 'Embutidos', 1, 0, 0, '2024-05-08 14:38:28', '2024-05-12 18:06:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_descuento`
--

CREATE TABLE `codigo_descuento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `porcentaje_cantidad` varchar(255) DEFAULT NULL,
  `fecha_expiracion` date DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codigo_descuento`
--

INSERT INTO `codigo_descuento` (`id`, `nombre`, `tipo`, `porcentaje_cantidad`, `fecha_expiracion`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'sa', 'Porcentaje', '50', '2024-05-11', 0, 0, '2024-04-02 18:42:50', '2024-05-10 15:28:22'),
(2, 'xd', 'Cantidad', '50', '2024-04-25', 0, 0, '2024-04-04 16:08:47', '2024-04-04 16:08:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `nombre`, `codigo`, `creado_por`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'Rojo', '#ff0000', 1, 0, 0, '2024-02-02 04:25:46', '2024-02-02 04:25:46'),
(2, 'Azul', '#0211de', 1, 0, 0, '2024-02-02 04:26:53', '2024-02-02 04:36:24'),
(3, 'Verde', '#1bff0a', 1, 0, 0, '2024-02-02 04:27:42', '2024-02-02 04:35:21'),
(4, 'Amarillo', '#f5e000', 1, 0, 0, '2024-02-02 20:36:12', '2024-02-09 20:10:57'),
(5, 'Negro', '#000000', 1, 0, 0, '2024-02-09 20:12:11', '2024-02-09 20:12:11'),
(6, 'Rosado', '#fc0394', 1, 0, 0, '2024-02-09 20:12:33', '2024-02-09 20:12:33'),
(7, 'Marron', '#9f5000', 1, 0, 0, '2024-02-12 16:39:36', '2024-02-12 16:39:36'),
(8, 'Beige', '#D9BFA9', 1, 0, 0, '2024-02-12 16:42:35', '2024-02-12 16:42:35'),
(9, 'Gris', '#b3b2b2', 1, 0, 0, '2024-02-17 17:01:16', '2024-02-17 17:01:16'),
(10, 'Blanco', '#ffffff', 1, 0, 0, '2024-02-17 17:18:57', '2024-02-17 17:18:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_inicio`
--

CREATE TABLE `configuracion_inicio` (
  `id` int(11) NOT NULL,
  `productos_tendencia_titulo` varchar(255) DEFAULT NULL,
  `comprar_por_categorias_titulo` varchar(255) DEFAULT NULL,
  `recien_agregados_tiutlo` varchar(255) DEFAULT NULL,
  `nuestro_blog_titulo` varchar(255) DEFAULT NULL,
  `pago_entrega_titulo` varchar(255) DEFAULT NULL,
  `pago_entrega_descripcion` varchar(255) DEFAULT NULL,
  `pago_entrega_imagen` varchar(255) DEFAULT NULL,
  `reembolso_titulo` varchar(255) DEFAULT NULL,
  `reembolso_descripcion` varchar(255) DEFAULT NULL,
  `reembolso_imagen` varchar(255) DEFAULT NULL,
  `soporte_titulo` varchar(255) DEFAULT NULL,
  `soporte_descripcion` varchar(255) DEFAULT NULL,
  `soporte_imagen` varchar(255) DEFAULT NULL,
  `signup_titulo` varchar(255) DEFAULT NULL,
  `signup_descripcion` varchar(255) DEFAULT NULL,
  `signup_imagen` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion_inicio`
--

INSERT INTO `configuracion_inicio` (`id`, `productos_tendencia_titulo`, `comprar_por_categorias_titulo`, `recien_agregados_tiutlo`, `nuestro_blog_titulo`, `pago_entrega_titulo`, `pago_entrega_descripcion`, `pago_entrega_imagen`, `reembolso_titulo`, `reembolso_descripcion`, `reembolso_imagen`, `soporte_titulo`, `soporte_descripcion`, `soporte_imagen`, `signup_titulo`, `signup_descripcion`, `signup_imagen`, `created_at`, `updated_at`) VALUES
(1, 'Productos en tedencia', 'Comprar por categorías', 'Recién agregados', 'De nuestro blog', 'Pago y entrega', 'Envío gratis para pedidos superiores a s/. 150.00', 's8adcjlqjv.png', 'Reembolso de vuelta', 'Garantía de devolución de dinero 100% gratis', 'rkmh1wgosy.png', 'Soporte de calidad', 'Siempre retroalimentación en línea 24/7', 'jebisxrtwm.png', 'Regístrese y obtenga un 10 % de descuento', 'Este e-commerce ofrece los mejores productos', 't563lqg8tm.jpg', NULL, '2024-05-20 17:04:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_sistema`
--

CREATE TABLE `configuracion_sistema` (
  `id` int(11) NOT NULL,
  `nombre_sitioweb` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `descripcion_pie_pagina` text DEFAULT NULL,
  `pie_pagina_pagos_icono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `telefono_dos` varchar(255) DEFAULT NULL,
  `enviar_email` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_dos` varchar(255) DEFAULT NULL,
  `hora_trabajo` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `github_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion_sistema`
--

INSERT INTO `configuracion_sistema` (`id`, `nombre_sitioweb`, `logo`, `favicon`, `descripcion_pie_pagina`, `pie_pagina_pagos_icono`, `direccion`, `telefono`, `telefono_dos`, `enviar_email`, `email`, `email_dos`, `hora_trabajo`, `facebook_link`, `twitter_link`, `instagram_link`, `github_link`, `linkedin_link`, `created_at`, `updated_at`) VALUES
(1, 'rico\'s', '5ewmorvjhy.png', 'iimzembpmj.ico', 'Bienvenido a nuestro e-commerce, tu destino en línea para descubrir una amplia gama de productos de alta calidad que satisfacen todas tus necesidades.', 'nkbrky2pk2.png', 'Lima', '924575577', '12345', 'ricoabraham879@gmail.com', 'abrahamrico546@gmail.com', 'abrahamrico546@gmail.com', 'Lunes - sábado \r\n4PM - 8PM', 'https://www.facebook.com/ab.rico.05/?locale=es_LA', 'https://twitter.com/rico_a_2005', 'https://www.instagram.com/a.rico_20/', 'https://github.com/cueva-r', 'https://www.linkedin.com/in/abrahamrico/', NULL, '2024-05-03 02:02:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactenos`
--

CREATE TABLE `contactenos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `subjeto` varchar(255) NOT NULL,
  `mensaje` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactenos`
--

INSERT INTO `contactenos` (`id`, `user_id`, `nombre`, `email`, `telefono`, `subjeto`, `mensaje`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test', 'test@gmail.com', '12345', 'test', 'test', '2024-05-01 18:52:25', '2024-05-01 18:52:25'),
(3, NULL, 'test', 'test@gmail.com', '12345', 'test', 'alaaaa', '2024-05-01 20:10:08', '2024-05-01 20:10:08'),
(4, 1, 'xd', 'xdd@gmail.com', 'xd', 'xd', 'xdddd', '2024-05-02 20:25:30', '2024-05-02 20:25:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo_envio`
--

CREATE TABLE `costo_envio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `costo_envio`
--

INSERT INTO `costo_envio` (`id`, `nombre`, `precio`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'Envío gratis', '0', 0, 0, '2024-03-22 16:38:43', '2024-03-22 16:38:43'),
(2, 'Estándar', '15', 0, 0, '2024-03-22 16:38:59', '2024-03-22 16:38:59'),
(3, 'Especial', '20', 0, 0, '2024-03-22 16:39:12', '2024-03-22 16:39:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `item_pedido`
--

CREATE TABLE `item_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `precio` varchar(25) NOT NULL DEFAULT '0',
  `nombre_color` varchar(255) DEFAULT NULL,
  `nombre_tamano` varchar(255) DEFAULT NULL,
  `cantidad_tamano` varchar(25) NOT NULL DEFAULT '0',
  `precio_total` varchar(25) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `item_pedido`
--

INSERT INTO `item_pedido` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio`, `nombre_color`, `nombre_tamano`, `cantidad_tamano`, `precio_total`, `created_at`, `updated_at`) VALUES
(1, 1, 22, 1, '29.2', 'Blanco', '2', '2', '29.2', '2024-05-10 15:28:38', '2024-05-10 15:28:38'),
(2, 2, 24, 1, '5.4', 'Rosado', '1.8', '2', '5.4', '2024-05-12 19:00:07', '2024-05-12 19:00:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_de_deseos`
--

CREATE TABLE `lista_de_deseos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_titulo` varchar(255) DEFAULT NULL,
  `meta_descripcion` varchar(500) DEFAULT NULL,
  `meta_p_clave` varchar(255) DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `slug`, `meta_titulo`, `meta_descripcion`, `meta_p_clave`, `creado_por`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'nike', 'Nike', 'Nike', 'Nike', 1, 0, 0, '2024-02-01 19:54:35', '2024-02-01 19:54:35'),
(2, 'Adidas', 'adidas', 'Adidas', 'Adidas', 'Adidas', 1, 0, 0, '2024-02-01 20:00:51', '2024-02-01 20:07:27'),
(3, 'Samsung', 'samsung', 'Samsung', 'Samsung', 'Samsung', 1, 0, 0, '2024-02-07 18:07:55', '2024-02-07 18:07:55'),
(4, 'Apple', 'apple', 'Apple', 'Apple', 'Apple', 1, 0, 0, '2024-02-12 20:04:38', '2024-02-12 20:04:38'),
(5, 'HP', 'hp', 'HP', 'HP', 'HP', 1, 0, 0, '2024-02-12 20:14:44', '2024-02-12 20:14:44'),
(6, 'Redmi', 'redmi', 'Redmi', 'Redmi', 'Redmi', 1, 0, 0, '2024-02-17 16:50:37', '2024-02-17 16:50:37'),
(7, 'Motorola', 'motorola', 'Motorola', 'Motorola', 'Motorola', 1, 0, 0, '2024-02-17 16:53:50', '2024-02-17 16:53:50'),
(8, 'Laminar Research', 'laminar-research', 'Laminar Research', 'Laminar Research', 'Laminar Research', 1, 0, 0, '2024-02-17 17:03:01', '2024-02-17 17:03:01'),
(9, 'Microsoft', 'microsoft', 'Microsoft', 'Microsoft', 'Microsoft', 1, 0, 0, '2024-02-17 17:11:17', '2024-02-17 17:11:17'),
(10, 'Faraón', 'faraon', 'Faraón', 'Faraón', 'Faraón', 1, 0, 0, '2024-03-18 17:32:54', '2024-03-18 17:32:54'),
(11, 'Primor', 'primor', 'Primor', '', '', 1, 0, 0, '2024-05-10 14:43:41', '2024-05-10 14:43:41'),
(12, 'Suiza', 'suiza', 'Suiza', '', '', 1, 0, 0, '2024-05-12 18:02:34', '2024-05-12 18:02:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `nombre_imagen` varchar(255) NOT NULL,
  `meta_titulo` varchar(255) NOT NULL,
  `meta_descripcion` text NOT NULL,
  `meta_p_clave` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id`, `nombre`, `slug`, `titulo`, `descripcion`, `nombre_imagen`, `meta_titulo`, `meta_descripcion`, `meta_p_clave`, `created_at`, `updated_at`) VALUES
(1, 'Sobre nosotros', 'sobre-nosotros', 'Sobre nosotros', '<p><font color=\"#000000\" style=\"\"><b style=\"\"><span style=\"font-family: &quot;Comic Sans MS&quot;; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">Lorem ipsum dolo</span><span style=\"font-family: &quot;Comic Sans MS&quot;; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">r </span></b></font><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Comic Sans MS&quot;; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">sit amet consectetur adipiscing elit iaculis donec, lectus gravida metus fames vestibulum vel parturient porta, hendrerit ultrices feugiat himenaeos nisl enim maecenas pulvinar. Euismod netus ornare vehicula venenatis ultricies accumsan lacinia mus eleifend sagittis, convallis ante proin porta scelerisque molestie volutpat morbi class, habitant lobortis facilisi nullam fermentum himenaeos nostra sociosqu vestibulum. Felis blandit libero gravida enim id dictum curae magnis volutpat habitasse, suscipit cras sodales pellentesque hendrerit turpis molestie ante fusce, viverra nibh feugiat mus urna condimentum tempor pulvinar netus.</span><br></p>', '1snijee886kdmdwyvpj1w.jpg', 'Sobre nosotros', '', '', '2024-04-25 22:30:19', '2024-05-05 00:04:57'),
(2, 'Preguntas frecuentes', 'faq', 'Preguntas frecuentes', '<p><font color=\"#000000\"><span style=\"font-weight: bolder;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">Lorem ipsum dolo</span><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">r&nbsp;</span></span></font><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">sit amet consectetur adipiscing elit iaculis donec, lectus gravida metus fames vestibulum vel parturient porta, hendrerit ultrices feugiat himenaeos nisl enim maecenas pulvinar. Euismod netus ornare vehicula venenatis ultricies accumsan lacinia mus eleifend sagittis, convallis ante proin porta scelerisque molestie volutpat morbi class, habitant lobortis facilisi nullam fermentum himenaeos nostra sociosqu vestibulum. Felis blandit libero gravida enim id dictum curae magnis volutpat habitasse, suscipit cras sodales pellentesque hendrerit turpis molestie ante fusce, viverra nibh feugiat mus urna condimentum tempor pulvinar netus.</span><br></p>', '2cwzuuxw4gnhloexvejvr.jpg', 'Preguntas frecuentes', '', '', '2024-04-25 22:31:05', '2024-04-27 19:55:31'),
(3, 'Contáctenos', 'contactenos', 'Contáctenos', '<p><font color=\"#000000\"><span style=\"font-weight: bolder;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">Lorem ipsum dolo</span><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">r&nbsp;</span></span></font><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">sit amet consectetur adipiscing elit iaculis donec, lectus gravida metus fames vestibulum vel parturient porta, hendrerit ultrices feugiat himenaeos nisl enim maecenas pulvinar. Euismod netus ornare vehicula venenatis ultricies accumsan lacinia mus eleifend sagittis, convallis ante proin porta scelerisque molestie volutpat morbi class, habitant lobortis facilisi nullam fermentum himenaeos nostra sociosqu vestibulum.</span><br></p>', '3z0vblwmelygc4g1pgtds.jpg', 'Contáctenos', '', '', '2024-04-25 22:31:05', '2024-04-27 20:44:35'),
(4, 'Métodos de pago', 'metodo-pago', 'Métodos de pago', '<p><font color=\"#000000\"><span style=\"font-weight: bolder;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">Lorem ipsum dolo</span><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">r&nbsp;</span></span></font><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">sit amet consectetur adipiscing elit iaculis donec, lectus gravida metus fames vestibulum vel parturient porta, hendrerit ultrices feugiat himenaeos nisl enim maecenas pulvinar. Euismod netus ornare vehicula venenatis ultricies accumsan lacinia mus eleifend sagittis, convallis ante proin porta scelerisque molestie volutpat morbi class, habitant lobortis facilisi nullam fermentum himenaeos nostra sociosqu vestibulum. Felis blandit libero gravida enim id dictum curae magnis volutpat habitasse, suscipit cras sodales pellentesque hendrerit turpis molestie ante fusce, viverra nibh feugiat mus urna condimentum tempor pulvinar netus.</span><br></p>', '44kwinr5kz3lemhk0gemb.jpg', 'Métodos de pago', '', '', '2024-04-25 22:31:53', '2024-04-27 20:04:34'),
(5, 'Garantía de devolución del dinero', 'garantias', 'Garantía de devolución del dinero', '<p><font color=\"#000000\"><span style=\"font-weight: bolder;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">Lorem ipsum dolo</span><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">r&nbsp;</span></span></font><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">sit amet consectetur adipiscing elit iaculis donec, lectus gravida metus fames vestibulum vel parturient porta, hendrerit ultrices feugiat himenaeos nisl enim maecenas pulvinar. Euismod netus ornare vehicula venenatis ultricies accumsan lacinia mus eleifend sagittis, convallis ante proin porta scelerisque molestie volutpat morbi class, habitant lobortis facilisi nullam fermentum himenaeos nostra sociosqu vestibulum. Felis blandit libero gravida enim id dictum curae magnis volutpat habitasse, suscipit cras sodales pellentesque hendrerit turpis molestie ante fusce, viverra nibh feugiat mus urna condimentum tempor pulvinar netus.</span><br></p>', '5ek9pfbaql7kjt87l5uuv.jpg', 'Garantía de devolución del dinero', '', '', '2024-04-25 22:31:53', '2024-04-27 20:04:43'),
(6, 'Devoluciones', 'devoluciones', 'Devoluciones', '<p><font color=\"#000000\"><span style=\"font-weight: bolder;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">Lorem ipsum dolo</span><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">r&nbsp;</span></span></font><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">sit amet consectetur adipiscing elit iaculis donec, lectus gravida metus fames vestibulum vel parturient porta, hendrerit ultrices feugiat himenaeos nisl enim maecenas pulvinar. Euismod netus ornare vehicula venenatis ultricies accumsan lacinia mus eleifend sagittis, convallis ante proin porta scelerisque molestie volutpat morbi class, habitant lobortis facilisi nullam fermentum himenaeos nostra sociosqu vestibulum. Felis blandit libero gravida enim id dictum curae magnis volutpat habitasse, suscipit cras sodales pellentesque hendrerit turpis molestie ante fusce, viverra nibh feugiat mus urna condimentum tempor pulvinar netus.</span><br></p>', '6w3xbg1yb0ttmamsafujk.jpg', 'Devoluciones', '', '', '2024-04-25 22:32:17', '2024-04-27 20:05:22'),
(7, 'Envíos', 'envios', 'Envíos', '<p><font color=\"#000000\"><span style=\"font-weight: bolder;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">Lorem ipsum dolo</span><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">r&nbsp;</span></span></font><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">sit amet consectetur adipiscing elit iaculis donec, lectus gravida metus fames vestibulum vel parturient porta, hendrerit ultrices feugiat himenaeos nisl enim maecenas pulvinar. Euismod netus ornare vehicula venenatis ultricies accumsan lacinia mus eleifend sagittis, convallis ante proin porta scelerisque molestie volutpat morbi class, habitant lobortis facilisi nullam fermentum himenaeos nostra sociosqu vestibulum. Felis blandit libero gravida enim id dictum curae magnis volutpat habitasse, suscipit cras sodales pellentesque hendrerit turpis molestie ante fusce, viverra nibh feugiat mus urna condimentum tempor pulvinar netus.</span><br></p>', '7cru7ox2kfr6xp6xt4kxs.jpg', 'Envíos', '', '', '2024-04-25 22:32:17', '2024-04-27 20:06:39'),
(8, 'Términos y condiciones', 'terminos-condiciones', 'Términos y condiciones', '', '8kz1ybothizlgukzlkcfe.webp', 'Términos y condiciones', '', '', '2024-04-25 22:32:58', '2024-04-27 20:07:39'),
(9, 'Política y privacidad', 'politica-privacidad', 'Política y privacidad', '<p><font color=\"#000000\" style=\"\"><span style=\"font-weight: bolder;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\"><u>Lorem ipsum dolo</u></span><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\"><u>r</u>&nbsp;</span></span></font><span style=\"text-align: justify;\"><font color=\"#000000\">sit amet consectetur adipiscing elit iaculis donec, lectus gravida metus fames vestibulum vel parturient porta, hendrerit ultrices feugiat himenaeos nisl enim maecenas pulvinar. Euismod netus ornare vehicula venenatis ultricies accumsan lacinia mus eleifend sagittis, convallis ante proin porta scelerisque molestie volutpat morbi class, habitant lobortis facilisi nullam fermentum himenaeos nostra sociosqu vestibulum. Felis blandit libero gravida enim id dictum curae magnis volutpat habitasse, suscipit cras sodales pellentesque hendrerit turpis molestie ante fusce, viverra nibh feugiat mus urna condimentum tempor pulvinar netus.</font></span><br></p>', '9w5ggvknzicbvu9xdys5z.webp', 'Política y privacidad', '', '', '2024-04-25 22:32:58', '2024-05-03 02:05:07'),
(10, 'Inicio', 'inicio', 'Inicio', '<p><font color=\"#000000\"><span style=\"font-weight: bolder;\"><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">Lorem ipsum dolo</span><span style=\"font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">r&nbsp;</span></span></font><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\">sit amet consectetur adipiscing elit iaculis donec, lectus gravida metus fames vestibulum vel parturient porta, hendrerit ultrices feugiat himenaeos nisl enim maecenas pulvinar. Euismod netus ornare vehicula venenatis ultricies accumsan lacinia mus eleifend sagittis, convallis ante proin porta scelerisque molestie volutpat morbi class, habitant lobortis facilisi nullam fermentum himenaeos nostra sociosqu vestibulum. Felis blandit libero gravida enim id dictum curae magnis volutpat habitasse, suscipit cras sodales pellentesque hendrerit turpis molestie ante fusce, viverra nibh feugiat mus urna condimentum tempor pulvinar netus.</span><br></p>', '9w5ggvknzicbvu9xdys5z.webp', 'Inicio', '', '', '2024-04-25 22:32:58', '2024-04-27 20:57:47'),
(11, 'Blog', 'blog', 'Nuestro blog', '', '', 'Nuestro blog', '', '', '2024-05-15 16:02:03', '2024-05-19 02:48:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `transaccion_id` varchar(255) DEFAULT NULL,
  `stripe_session_id` varchar(255) DEFAULT NULL,
  `numero_pedido` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `nombre_compania` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `primera_direccion` varchar(255) DEFAULT NULL,
  `segunda_direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `distrito` varchar(255) DEFAULT NULL,
  `codigo_postal` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  `codigo_descuento` varchar(255) DEFAULT NULL,
  `cantidad_descuento` varchar(25) DEFAULT '0',
  `envio_id` int(11) DEFAULT NULL,
  `cantidad_envio` varchar(25) NOT NULL DEFAULT '0',
  `cantidad_total` varchar(25) NOT NULL DEFAULT '0',
  `metodo_pago` varchar(25) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = Pendiente\r\n1 = En progreso\r\n2 = Entregado\r\n3 = Completado\r\n4 = Cancelado',
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `esta_pagado` tinyint(4) NOT NULL DEFAULT 0,
  `pago_data` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `transaccion_id`, `stripe_session_id`, `numero_pedido`, `user_id`, `nombres`, `apellidos`, `nombre_compania`, `pais`, `primera_direccion`, `segunda_direccion`, `ciudad`, `distrito`, `codigo_postal`, `telefono`, `email`, `notas`, `codigo_descuento`, `cantidad_descuento`, `envio_id`, `cantidad_envio`, `cantidad_total`, `metodo_pago`, `estado`, `esta_eliminado`, `esta_pagado`, `pago_data`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '710511966', 1, 'Abraham Elias', 'Cueva Rico', 'rico\'s', 'Perú', 'Hefestos', '404', 'Lima', 'Ate', '15022', '924575577', 'ricoabraham879@gmail.com', 'Q', 'sa', '14.6', 3, '20', '15.4', 'stripe', 3, 0, 1, NULL, '2024-05-10 15:28:38', '2024-05-10 15:31:20'),
(2, NULL, NULL, '684893833', 1, 'Abraham Elias', 'Cueva Rico', 'rico\'s', 'Perú', 'Hefestos', '404', 'Lima', 'Ate', '15022', '924575577', 'ricoabraham879@gmail.com', 'zzz', '', '0', 1, '0', '5.4', 'cash', 3, 0, 1, NULL, '2024-05-12 19:00:07', '2024-05-12 19:00:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `precio_anterior` double NOT NULL DEFAULT 0,
  `precio` double NOT NULL DEFAULT 0,
  `descripcion_corta` text DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `informacion_adicional` text DEFAULT NULL,
  `envios_devoluciones` text DEFAULT NULL,
  `es_tendencia` tinyint(4) NOT NULL DEFAULT 0,
  `estado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: activo, 1: inactivo',
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: no eliminado, 1: eliminado',
  `creado_por` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `slug`, `sku`, `categoria_id`, `subcategoria_id`, `marca_id`, `precio_anterior`, `precio`, `descripcion_corta`, `descripcion`, `informacion_adicional`, `envios_devoluciones`, `es_tendencia`, `estado`, `esta_eliminado`, `creado_por`, `created_at`, `updated_at`) VALUES
(1, 'Falda lápiz marrón con cintura paperbag', 'falda-lapiz-marron-con-cintura-paperbag', 'FLMMCCP', 2, 13, 2, 220, 200, '<p>Falda lápiz marrón con cintura paperbag<br></p>', '<p>Falda lápiz marrón con cintura paperbag<br></p>', '<p>Falda lápiz marrón con cintura paperbag<br></p>', '<p>xd</p>', 1, 0, 0, 1, '2024-02-01 01:52:02', '2024-02-07 22:45:12'),
(2, 'Vestido con vuelo y abertura de encaje amarillo oscuro', 'vestido-con-vuelo-y-abertura-de-encaje-amarillo-oscuro', 'VCVADEAO', 2, 13, 1, 220, 200, '<p>Vestido con vuelo y abertura de encaje amarillo oscuro</p>', '<p>Vestido con vuelo y abertura de encaje amarillo oscuro</p>', '<p>Vestido con vuelo y abertura de encaje amarillo oscuro</p>', '<p>xd</p>', 1, 0, 0, 1, '2024-02-02 10:08:57', '2024-02-07 22:49:48'),
(3, 'Nunc dignissim risus', 'nunc-dignissim-risus', 'NDR', 2, 13, 1, 12, 10, '<p style=\"text-align: justify;\"><font color=\"#0000ff\">Nunc dignissim risus</font><br></p>', '<ol><li style=\"text-align: justify;\"><font color=\"rgba(0, 0, 0, 0.8)\" face=\"Source Sans Pro, sans-serif\"><span style=\"font-size: 16.2px; letter-spacing: -0.0486px;\">Nunc dignissim risus</span></font><br></li></ol>', '<ul><li style=\"text-align: justify; \"><font color=\"rgba(0, 0, 0, 0.8)\" face=\"Source Sans Pro, sans-serif\"><span style=\"font-size: 16.2px; letter-spacing: -0.0486px;\">Nunc dignissim risus</span></font><br></li></ul>', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\"><b>xd</b></span><br></p>', 1, 0, 0, 1, '2024-02-02 10:11:07', '2024-02-07 22:53:38'),
(4, 'Aliquam tincidunt mauris', 'aliquam-tincidunt-mauris', 'ATM', 2, 13, 2, 220, 200, '<p>Aliquam tincidunt mauris<br></p>', '<p>Aliquam tincidunt mauris<br></p>', '<p>Aliquam tincidunt mauris<br></p>', '<p>xd</p>', 1, 0, 0, 1, '2024-02-07 22:55:59', '2024-02-07 22:58:31'),
(5, 'Top de té con botones delanteros amarillos', 'top-de-te-con-botones-delanteros-amarillos', 'TDTBDA', 2, 13, 2, 220, 200, '<p>Top de té con botones delanteros amarillos<br></p>', '<p>Top de té con botones delanteros amarillos<br></p>', '<p>Top de té con botones delanteros amarillos<br></p>', '<p>xd</p>', 1, 0, 0, 1, '2024-02-07 22:59:23', '2024-02-07 23:00:02'),
(6, 'Beige knitted elastic runner shoes', 'beige-knitted-elastic-runner-shoes', 'BKERS', 2, 13, 1, 220, 200, '<h3 class=\"product-title\" style=\"margin-bottom: 0.2rem; line-height: 1.25; font-size: 1.6rem; color: rgb(51, 51, 51); letter-spacing: -0.01em; font-family: Poppins, sans-serif;\"><a href=\"file:///C:/xampp/htdocs/molla-eCommerce-html-template/product.html\" style=\"color: inherit; transition: color 0.3s ease 0s; font-family: Poppins;\">Beige knitted elastic runner shoes</a></h3>', '<h3 class=\"product-title\" style=\"margin-bottom: 0.2rem; line-height: 1.25; font-size: 1.6rem; color: rgb(51, 51, 51); letter-spacing: -0.01em; font-family: Poppins, sans-serif;\"><a href=\"file:///C:/xampp/htdocs/molla-eCommerce-html-template/product.html\" style=\"color: inherit; transition: color 0.3s ease 0s; font-family: Poppins;\">Beige knitted elastic runner shoes</a></h3>', '<h3 class=\"product-title\" style=\"margin-bottom: 0.2rem; line-height: 1.25; font-size: 1.6rem; color: rgb(51, 51, 51); letter-spacing: -0.01em; font-family: Poppins, sans-serif;\"><a href=\"file:///C:/xampp/htdocs/molla-eCommerce-html-template/product.html\" style=\"color: inherit; transition: color 0.3s ease 0s; font-family: Poppins;\">Beige knitted elastic runner shoes</a></h3>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-07 23:02:40', '2024-02-07 23:03:22'),
(7, 'Cuñas anchas marrón claro con tachuelas', 'cunas-anchas-marron-claro-con-tachuelas', 'CAMCCT', 2, 13, 1, 220, 200, '<p>Cuñas anchas marrón claro con tachuelas<br></p>', '<p>Cuñas anchas marrón claro con tachuelas<br></p>', '<p>Cuñas anchas marrón claro con tachuelas<br></p>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-07 23:04:07', '2024-02-07 23:04:45'),
(8, 'Bolsa de viaje de fin de semana RI suave negra', 'bolsa-de-viaje-de-fin-de-semana-ri-suave-negra', 'BDVDFDSRISN', 2, 13, 2, 220, 200, '<p>Bolsa de viaje de fin de semana RI suave negra<br></p>', '<p>Bolsa de viaje de fin de semana RI suave negra<br></p>', '<p>Bolsa de viaje de fin de semana RI suave negra<br></p>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-07 23:06:14', '2024-02-07 23:06:55'),
(9, 'Celular Galaxy S24 Ultra 512GB', 'celular-galaxy-s24-ultra-512gb', 'CGSU', 1, 2, 3, 6199, 5699, '<p>Celular Galaxy S24 Ultra 512GB<br></p>', '<p>Celular Galaxy S24 Ultra 512GB<br></p>', '<p>Celular Galaxy S24 Ultra 512GB<br></p>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-07 23:09:44', '2024-02-07 23:10:41'),
(10, 'iPhone 15 Plus - 256GB - Negro', 'iphone-15-plus-256gb-negro', 'IPGBN', 1, 2, 4, 6299, 5999, '<h1 class=\"page-title\" style=\"line-height: normal; font-size: 24px; margin-top: -13px; margin-bottom: 10px; font-family: &quot;Montserrat Medium&quot;; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\" style=\"font-family: Arial;\">iPhone 15 Plus - 256GB&nbsp;- Negro</span></h1>', '<h1 class=\"page-title\" style=\"line-height: normal; font-size: 24px; margin-top: -13px; margin-bottom: 10px; font-family: &quot;Montserrat Medium&quot;; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\" style=\"font-family: Arial;\">iPhone 15 Plus - 256GB&nbsp;- Negro</span></h1>', '<h1 class=\"page-title\" style=\"line-height: normal; font-size: 24px; margin-top: -13px; margin-bottom: 10px; font-family: &quot;Montserrat Medium&quot;; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\" style=\"font-family: Arial;\">iPhone 15 Plus - 256GB&nbsp;- Negro</span></h1>', '<p>xd</p>', 1, 0, 0, 1, '2024-02-13 01:05:14', '2024-05-12 23:56:15'),
(11, 'HP OMEN 16 Gaming, Core i7-13620H, 6GB RTX4050, 16GB RAM, 1TB SSD, 16.1″ FHD 144Hz', 'hp-omen-16-gaming-core-i7-13620h-6gb-rtx4050-16gb-ram-1tb-ssd-161″-fhd-144hz', 'HPOGCI', 1, 14, 5, 8389, 6799, '<p>HP OMEN 16 Gaming, Core i7-13620H, 6GB RTX4050, 16GB RAM, 1TB SSD, 16.1″ FHD 144Hz<br></p>', '<p>HP OMEN 16 Gaming, Core i7-13620H, 6GB RTX4050, 16GB RAM, 1TB SSD, 16.1″ FHD 144Hz<br></p>', '<p>HP OMEN 16 Gaming, Core i7-13620H, 6GB RTX4050, 16GB RAM, 1TB SSD, 16.1″ FHD 144Hz<br></p>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-13 01:12:17', '2024-02-13 01:16:43'),
(12, 'Celular Xiaomi Redmi Note 13 256GB 8GB 108MP 8MP - Negro', 'celular-xiaomi-redmi-note-13-256gb-8gb-108mp-8mp-negro', 'CXRNN', 1, 2, 6, 1299, 829, '<p>Celular Xiaomi Redmi Note 13 256GB 8GB 108MP 8MP - Negro<br></p>', '<p>Celular Xiaomi Redmi Note 13 256GB 8GB 108MP 8MP - Negro<br></p>', '<p>Celular Xiaomi Redmi Note 13 256GB 8GB 108MP 8MP - Negro<br></p>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-17 21:49:51', '2024-02-17 21:51:47'),
(13, 'Celular Motorola Edge 40 8gb + 256gb', 'celular-motorola-edge-40-8gb-256gb', 'CME', 1, 2, 7, 1299, 829, '<h1 data-name=\"Celular Motorola Edge 40 8gb + 256gb\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Celular Motorola Edge 40 8gb + 256gb</h1>', '<h1 data-name=\"Celular Motorola Edge 40 8gb + 256gb\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Celular Motorola Edge 40 8gb + 256gb</h1>', '<h1 data-name=\"Celular Motorola Edge 40 8gb + 256gb\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Celular Motorola Edge 40 8gb + 256gb</h1>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-17 21:54:41', '2024-02-17 21:55:41'),
(14, 'Tablet Samsung Galaxy Tab A9 Plus 11\" 64GB 4GB RAM Graphite', 'tablet-samsung-galaxy-tab-a9-plus-11-64gb-4gb-ram-graphite', 'TSGT', 1, 15, 3, 899, 799, '<h1 class=\"page-title\" style=\"font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 600; line-height: 1.22; font-size: 27px; margin: 15px 0px; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\">Tablet Samsung Galaxy Tab A9 Plus 11\" 64GB 4GB RAM Graphite</span></h1>', '<h1 class=\"page-title\" style=\"font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 600; line-height: 1.22; font-size: 27px; margin: 15px 0px; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\">Tablet Samsung Galaxy Tab A9 Plus 11\" 64GB 4GB RAM Graphite</span></h1>', '<h1 class=\"page-title\" style=\"font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 600; line-height: 1.22; font-size: 27px; margin: 15px 0px; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\">Tablet Samsung Galaxy Tab A9 Plus 11\" 64GB 4GB RAM Graphite</span></h1>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-17 21:57:59', '2024-02-17 21:58:39'),
(15, 'Xiaomi Redmi Pad SE (256 GB + 8 GB) Wi-Fi solo 11\" 90Hz 4 altavoces 8000mAh NUEVO', 'xiaomi-redmi-pad-se-256-gb-8-gb-wi-fi-solo-11-90hz-4-altavoces-8000mah-nuevo', 'XRPSE', 1, 15, 6, 999, 859, '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Xiaomi Redmi Pad SE (256 GB + 8 GB) Wi-Fi solo 11\" 90Hz 4 altavoces 8000mAh NUEVO</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Xiaomi Redmi Pad SE (256 GB + 8 GB) Wi-Fi solo 11\" 90Hz 4 altavoces 8000mAh NUEVO</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Xiaomi Redmi Pad SE (256 GB + 8 GB) Wi-Fi solo 11\" 90Hz 4 altavoces 8000mAh NUEVO</span><br></p>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-17 21:59:53', '2024-02-17 22:00:54'),
(16, 'Juego de 8 DVD X Plane 11 edición global', 'juego-de-8-dvd-x-plane-11-edicion-global', 'XRPSE', 6, 12, 8, 200, 150, '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Juego de 8 DVD X Plane 11 edición global</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Juego de 8 DVD X Plane 11 edición global</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Juego de 8 DVD X Plane 11 edición global</span><br></p>', '<p>xd</p><p><br></p>', 0, 0, 0, 1, '2024-02-17 22:03:35', '2024-02-17 22:05:17'),
(17, 'Juego de 8 DVD X Plane 12 edición global', 'dvd-x-plane-12-global', 'DVDPG', 6, 12, 8, 300, 250, '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">DVD X Plane 12 Global</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">DVD X Plane 12 Global</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">DVD X Plane 12 Global</span><br></p>', '<p>XD</p>', 0, 0, 0, 1, '2024-02-17 22:06:07', '2024-02-17 22:08:13'),
(18, 'Microsoft Flight Simulator 2020', 'microsoft-flight-simulator-2020', 'MFS', 6, 12, 9, 200, 120, '<p>Microsoft Flight Simulator 2020<br></p>', '<p>Microsoft Flight Simulator 2020<br></p>', '<p>Microsoft Flight Simulator 2020<br></p>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-17 22:10:51', '2024-02-17 22:14:18'),
(19, 'Galaxy Buds FE', 'galaxy-buds-fe', 'CBFE', 1, 16, 3, 350, 349, '<h2 class=\"pd-info__title\" style=\"margin: 1.11111vw 0px 0px; padding: 0px 2.5vw 0px 0px; vertical-align: top; font-size: 1.66667vw; font-family: SamsungSharpSans, arial, sans-serif; color: rgb(0, 0, 0);\">Galaxy Buds FE</h2>', '<h2 class=\"pd-info__title\" style=\"margin: 1.11111vw 0px 0px; padding: 0px 2.5vw 0px 0px; vertical-align: top; font-size: 1.66667vw; font-family: SamsungSharpSans, arial, sans-serif; color: rgb(0, 0, 0);\">Galaxy Buds FE</h2>', '<h2 class=\"pd-info__title\" style=\"margin: 1.11111vw 0px 0px; padding: 0px 2.5vw 0px 0px; vertical-align: top; font-size: 1.66667vw; font-family: SamsungSharpSans, arial, sans-serif; color: rgb(0, 0, 0);\">Galaxy Buds FE</h2>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-17 22:16:05', '2024-02-17 22:17:13'),
(20, 'AirPods 3era Generación', 'airpods-3era-generacion', 'APG', 1, 16, 4, 799, 749, '<p>AirPods 3era Generación<br></p>', '<p>AirPods 3era Generación<br></p>', '<p>AirPods 3era Generación<br></p>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-17 22:18:18', '2024-02-17 22:19:45'),
(21, 'Redmi Airdots Wireless Earbuds 5.0 TWS Earphone Noise Cancelling Mic for Xiaomi', 'redmi-airdots-wireless-earbuds-50-tws-earphone-noise-cancelling-mic-for-xiaomi', 'RAWET', 1, 16, 6, 200, 150, '<p><span style=\"color: inherit; font-family: inherit; font-weight: inherit;\">Redmi Airdots Wireless Earbuds 5.0 TWS Earphone Noise Cancelling Mic for Xiaomi</span><a class=\"detail-title\" href=\"https://www.alibaba.com/product-detail/A6S-BT-Headsets-VS-for-Redmi_1600070709202.html?spm=a2700.pccps_detail.0.0.308013a0hgIUBl\" target=\"_blank\" rel=\"noreferrer\" data-spm-anchor-id=\"a2700.pccps_detail.0.0\" style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgb(51, 51, 51); text-decoration-line: underline; margin: 0px 0px 20px; padding: 0px 0px 0px 17px; display: inline-block; font-family: Roboto, Helvetica, Tahoma, Arial, &quot;Microsoft YaHei&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\"></a></p>', '<p><span style=\"color: inherit; font-family: inherit; font-weight: inherit;\">Redmi Airdots Wireless Earbuds 5.0 TWS Earphone Noise Cancelling Mic for Xiaomi</span><a class=\"detail-title\" href=\"https://www.alibaba.com/product-detail/A6S-BT-Headsets-VS-for-Redmi_1600070709202.html?spm=a2700.pccps_detail.0.0.308013a0hgIUBl\" target=\"_blank\" rel=\"noreferrer\" data-spm-anchor-id=\"a2700.pccps_detail.0.0\" style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgb(51, 51, 51); text-decoration-line: underline; margin: 0px 0px 20px; padding: 0px 0px 0px 17px; display: inline-block; font-family: Roboto, Helvetica, Tahoma, Arial, &quot;Microsoft YaHei&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\"></a></p>', '<p><span style=\"color: inherit; font-family: inherit; font-weight: inherit;\">Redmi Airdots Wireless Earbuds 5.0 TWS Earphone Noise Cancelling Mic for Xiaomi</span><a class=\"detail-title\" href=\"https://www.alibaba.com/product-detail/A6S-BT-Headsets-VS-for-Redmi_1600070709202.html?spm=a2700.pccps_detail.0.0.308013a0hgIUBl\" target=\"_blank\" rel=\"noreferrer\" data-spm-anchor-id=\"a2700.pccps_detail.0.0\" style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgb(51, 51, 51); text-decoration-line: underline; margin: 0px 0px 20px; padding: 0px 0px 0px 17px; display: inline-block; font-family: Roboto, Helvetica, Tahoma, Arial, &quot;Microsoft YaHei&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\"></a></p>', '<p>xd</p>', 0, 0, 0, 1, '2024-02-17 22:21:04', '2024-02-17 22:22:06'),
(22, 'Arroz Extra Faraón de 5 Kg', 'arroz-extra-faraon-de-5-kg', 'AEF', 9, 17, 10, 27.9, 27.2, '<h1 data-name=\"Arroz Extra Faraón de 5 Kg\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Arroz Extra Faraón de 5 Kg</h1>', '<h1 data-name=\"Arroz Extra Faraón de 5 Kg\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Arroz Extra Faraón de 5 Kg</h1>', '<h1 data-name=\"Arroz Extra Faraón de 5 Kg\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Arroz Extra Faraón de 5 Kg</h1>', '<h1 data-name=\"Arroz Extra Faraón de 5 Kg\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">xd</h1>', 0, 0, 0, 1, '2024-03-18 22:32:11', '2024-03-18 22:34:52'),
(23, 'Aceite Vegetal PRIMOR Clásico Botella 900ml', 'aceite-vegetal-primor-clasico-botella-900ml', 'AVPCB', 9, 18, 11, 12, 10, '<p>Aceite Vegetal PRIMOR Clásico Botella 900ml<br></p>', '<p>Aceite Vegetal PRIMOR Clásico Botella 900ml<br></p>', '<p>Aceite Vegetal PRIMOR Clásico Botella 900ml<br></p>', '<p>XD</p>', 0, 0, 0, 1, '2024-05-10 19:44:15', '2024-05-10 19:46:40'),
(24, 'Chicharrón De Prensa Suiza Pqte. 85 g', 'chicharron-de-prensa-suiza-pqte-85-g', 'AVPCB', 11, 19, 12, 3.5, 3.4, '<p>Chicharrón De Prensa Suiza Pqte. 85 g<br></p>', '<p>Chicharrón De Prensa Suiza Pqte. 85 g<br></p>', '<p>Chicharrón De Prensa Suiza Pqte. 85 g<br></p>', '<p>XD</p>', 0, 0, 0, 1, '2024-05-12 23:03:18', '2024-05-12 23:05:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_colores`
--

CREATE TABLE `productos_colores` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_colores`
--

INSERT INTO `productos_colores` (`id`, `producto_id`, `color_id`, `created_at`, `updated_at`) VALUES
(35, 3, 2, '2024-02-07 17:53:38', '2024-02-07 17:53:38'),
(44, 8, 5, '2024-02-12 16:38:37', '2024-02-12 16:38:37'),
(45, 4, 7, '2024-02-12 16:39:53', '2024-02-12 16:39:53'),
(46, 5, 4, '2024-02-12 16:40:41', '2024-02-12 16:40:41'),
(47, 1, 7, '2024-02-12 16:40:57', '2024-02-12 16:40:57'),
(48, 7, 7, '2024-02-12 16:41:16', '2024-02-12 16:41:16'),
(51, 9, 5, '2024-02-12 16:48:11', '2024-02-12 16:48:11'),
(52, 6, 8, '2024-02-12 16:51:09', '2024-02-12 16:51:09'),
(54, 11, 5, '2024-02-12 20:16:43', '2024-02-12 20:16:43'),
(55, 12, 5, '2024-02-17 16:51:47', '2024-02-17 16:51:47'),
(56, 13, 5, '2024-02-17 16:55:41', '2024-02-17 16:55:41'),
(57, 14, 5, '2024-02-17 16:58:39', '2024-02-17 16:58:39'),
(59, 15, 9, '2024-02-17 17:01:26', '2024-02-17 17:01:26'),
(60, 16, 2, '2024-02-17 17:05:17', '2024-02-17 17:05:17'),
(63, 17, 2, '2024-02-17 17:08:13', '2024-02-17 17:08:13'),
(64, 17, 3, '2024-02-17 17:08:13', '2024-02-17 17:08:13'),
(65, 18, 2, '2024-02-17 17:14:18', '2024-02-17 17:14:18'),
(66, 19, 5, '2024-02-17 17:17:13', '2024-02-17 17:17:13'),
(67, 20, 10, '2024-02-17 17:19:46', '2024-02-17 17:19:46'),
(68, 21, 5, '2024-02-17 17:22:07', '2024-02-17 17:22:07'),
(70, 2, 4, '2024-02-19 14:27:56', '2024-02-19 14:27:56'),
(71, 22, 10, '2024-03-18 17:34:52', '2024-03-18 17:34:52'),
(72, 23, 3, '2024-05-10 14:46:40', '2024-05-10 14:46:40'),
(73, 24, 6, '2024-05-12 18:05:20', '2024-05-12 18:05:20'),
(78, 10, 5, '2024-05-12 18:56:15', '2024-05-12 18:56:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_imagen`
--

CREATE TABLE `producto_imagen` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(255) DEFAULT NULL,
  `imagen_extension` varchar(255) DEFAULT NULL,
  `ordenar_por` int(11) NOT NULL DEFAULT 100,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_imagen`
--

INSERT INTO `producto_imagen` (`id`, `producto_id`, `nombre_imagen`, `imagen_extension`, `ordenar_por`, `created_at`, `updated_at`) VALUES
(8, 1, '1ayrt7yxubiqh03j36sdu.jpg', 'jpg', 100, '2024-02-07 17:44:48', '2024-02-07 17:44:48'),
(9, 2, '2ji8hu40f6hqoab0ymwhz.jpg', 'jpg', 100, '2024-02-07 17:49:49', '2024-02-07 17:49:49'),
(10, 3, '3yyioxoo05fydnka3ozvl.jpg', 'jpg', 100, '2024-02-07 17:53:39', '2024-02-07 17:53:39'),
(11, 4, '4vditzsnoaasbakdsvmcz.jpg', 'jpg', 100, '2024-02-07 17:58:31', '2024-02-07 17:58:31'),
(12, 5, '5pgp2ryxjc14fxjiwinmk.jpg', 'jpg', 100, '2024-02-07 18:00:02', '2024-02-07 18:00:02'),
(13, 6, '6uk3fs0k5foh2obijbxq9.jpg', 'jpg', 100, '2024-02-07 18:03:22', '2024-02-07 18:03:22'),
(14, 7, '7x0m85mffd7xnsia6lxqo.jpg', 'jpg', 100, '2024-02-07 18:04:45', '2024-02-07 18:04:45'),
(15, 8, '8bghehzjfmzymjrdeemr7.jpg', 'jpg', 100, '2024-02-07 18:06:55', '2024-02-07 18:06:55'),
(16, 9, '9trgvfw8w9ivwmbjlzsx8.jfif', 'jfif', 100, '2024-02-07 18:10:41', '2024-02-07 18:10:41'),
(17, 6, '6cwvjufz8sumq6g4arxlr.jpg', 'jpg', 100, '2024-02-12 16:51:10', '2024-02-12 16:51:10'),
(18, 10, '103kveen7tdwmgojulp3ix.webp', 'webp', 100, '2024-02-12 20:06:34', '2024-02-12 20:06:34'),
(19, 11, '11hgaddqwuqixvt15qudaf.jpg', 'jpg', 100, '2024-02-12 20:16:43', '2024-02-12 20:16:43'),
(20, 12, '12wh1s1sbeml8cg2sm3hzd.webp', 'webp', 100, '2024-02-17 16:51:47', '2024-02-17 16:51:47'),
(21, 13, '13wfcrxgfnfuckd60hgriu.jfif', 'jfif', 100, '2024-02-17 16:55:42', '2024-02-17 16:55:42'),
(22, 14, '14h8fo9a53opa46ot34y1f.webp', 'webp', 100, '2024-02-17 16:58:40', '2024-02-17 16:58:40'),
(23, 15, '15trnvpna7xbem8pvhnvty.jpg', 'jpg', 100, '2024-02-17 17:00:54', '2024-02-17 17:00:54'),
(24, 16, '16p0jkeu72mikrcikvvdcd.jpg', 'jpg', 100, '2024-02-17 17:05:17', '2024-02-17 17:05:17'),
(25, 17, '17pmk4sandrvdrq2igv3pa.jpg', 'jpg', 100, '2024-02-17 17:07:33', '2024-02-17 17:07:33'),
(26, 18, '18c4978smlcu4i9yuihzd3.png', 'png', 100, '2024-02-17 17:14:18', '2024-02-17 17:14:18'),
(27, 19, '19avmglrouknqof0w0ebeh.avif', 'avif', 100, '2024-02-17 17:17:13', '2024-02-17 17:17:13'),
(28, 20, '20pbhbztdmbznj3xwbiqf5.jfif', 'jfif', 100, '2024-02-17 17:19:46', '2024-02-17 17:19:46'),
(29, 21, '21jwuwe6oymrgb4asrduqt.webp', 'webp', 100, '2024-02-17 17:22:07', '2024-02-17 17:22:07'),
(30, 2, '2ue5fltoslzh9rfhoefeo.jpg', 'jpg', 100, '2024-02-19 14:27:56', '2024-02-19 14:27:56'),
(32, 2, '2vyjyyqcqejgebyuttcs1.jpg', 'jpg', 100, '2024-02-19 14:27:56', '2024-02-19 14:27:56'),
(33, 2, '2abylrtfbfcq4whfp1lip.jpg', 'jpg', 100, '2024-02-19 14:27:57', '2024-02-19 14:27:57'),
(34, 22, '22tvr10pdpxrwy3v8gkux7.jfif', 'jfif', 100, '2024-03-18 17:34:52', '2024-03-18 17:34:52'),
(35, 23, '23jykxakgaugaqmftubq1i.webp', 'webp', 100, '2024-05-10 14:46:40', '2024-05-10 14:46:40'),
(36, 24, '248mvndxp0i0yn772wnwcb.jpg', 'jpg', 100, '2024-05-12 18:05:20', '2024-05-12 18:05:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_tamano`
--

CREATE TABLE `producto_tamano` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_tamano`
--

INSERT INTO `producto_tamano` (`id`, `producto_id`, `nombre`, `precio`, `created_at`, `updated_at`) VALUES
(38, 3, '1.8', 20, '2024-02-07 17:53:39', '2024-02-07 17:53:39'),
(47, 8, '1.8', 20, '2024-02-12 16:38:37', '2024-02-12 16:38:37'),
(48, 4, '1.8', 20, '2024-02-12 16:39:53', '2024-02-12 16:39:53'),
(49, 5, '1.8', 20, '2024-02-12 16:40:41', '2024-02-12 16:40:41'),
(50, 1, '1.8', 2, '2024-02-12 16:40:57', '2024-02-12 16:40:57'),
(51, 7, '1.8', 20, '2024-02-12 16:41:16', '2024-02-12 16:41:16'),
(54, 9, '1.8', 20, '2024-02-12 16:48:11', '2024-02-12 16:48:11'),
(55, 6, '1.8', 20, '2024-02-12 16:51:10', '2024-02-12 16:51:10'),
(57, 11, '2.0', 2, '2024-02-12 20:16:43', '2024-02-12 20:16:43'),
(58, 12, '1.8', 2, '2024-02-17 16:51:47', '2024-02-17 16:51:47'),
(59, 13, '1.8', 2, '2024-02-17 16:55:42', '2024-02-17 16:55:42'),
(60, 14, '1.8', 2, '2024-02-17 16:58:40', '2024-02-17 16:58:40'),
(62, 15, '1.8', 2, '2024-02-17 17:01:27', '2024-02-17 17:01:27'),
(63, 16, '1.8', 2, '2024-02-17 17:05:17', '2024-02-17 17:05:17'),
(65, 17, '1.8', 2, '2024-02-17 17:08:13', '2024-02-17 17:08:13'),
(66, 18, '1.8', 2, '2024-02-17 17:14:18', '2024-02-17 17:14:18'),
(67, 19, '1.8', 2, '2024-02-17 17:17:13', '2024-02-17 17:17:13'),
(68, 20, '1.8', 2, '2024-02-17 17:19:46', '2024-02-17 17:19:46'),
(69, 21, '1.8', 2, '2024-02-17 17:22:07', '2024-02-17 17:22:07'),
(72, 2, 'SM', 5, '2024-02-19 14:27:56', '2024-02-19 14:27:56'),
(73, 2, 'LM', 7, '2024-02-19 14:27:56', '2024-02-19 14:27:56'),
(74, 22, '2', 2, '2024-03-18 17:34:52', '2024-03-18 17:34:52'),
(75, 23, '1.8', 2, '2024-05-10 14:46:40', '2024-05-10 14:46:40'),
(76, 24, '1.8', 2, '2024-05-12 18:05:20', '2024-05-12 18:05:20'),
(81, 10, '1.8', 2, '2024-05-12 18:56:16', '2024-05-12 18:56:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `nombre_imagen` varchar(255) DEFAULT NULL,
  `nombre_button` varchar(255) DEFAULT NULL,
  `link_button` text DEFAULT NULL,
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `titulo`, `nombre_imagen`, `nombre_button`, `link_button`, `esta_eliminado`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'A340-600 Lufthansa', '3i6hvwcmkfatekdidazy.jpg', 'Ver', 'https://www.facebook.com/', 0, 0, '2024-05-03', '2024-05-06 19:19:01'),
(2, 'A350-900 Turkish airlines', '3xn10hfaspugxm36posd.jpg', 'Ver', 'https://www.instagram.com/a.rico_20/', 0, 0, '2024-05-03', '2024-05-05 19:26:30'),
(3, 'B777-300ER Turkish airlines', 'aopn6te84fhwy4lsyhix.jpg', 'Ver', 'https://www.tiktok.com/foryou', 0, 0, '2024-05-03', '2024-05-06 19:20:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) DEFAULT NULL,
  `link_button` varchar(255) DEFAULT NULL,
  `esta_eliminado` tinyint(4) DEFAULT 0,
  `estado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombre_imagen`, `link_button`, `esta_eliminado`, `estado`, `created_at`, `updated_at`) VALUES
(1, '1vr8usiyfshvddrbl7ac.png', 'http://localhost/ecommerce/', 0, 0, '2024-05-06 19:25:54', '2024-05-06 19:29:36'),
(2, 'ulznslkv0aa75q88mlot.png', 'http://localhost/ecommerce/', 0, 0, '2024-05-06 19:26:39', '2024-05-06 19:26:39'),
(3, 'vnoqmcpulk4njb7ad1yx.png', 'http://localhost/ecommerce/', 0, 0, '2024-05-06 19:26:50', '2024-05-06 19:27:10'),
(4, 'fxpnqsgwxwkp2rjgauia.png', 'http://localhost/ecommerce/', 0, 0, '2024-05-06 19:26:58', '2024-05-06 19:27:04'),
(5, 'llnxxteylsdxyd4scrcf.png', 'http://localhost/ecommerce/', 0, 0, '2024-05-06 19:27:19', '2024-05-06 19:27:19'),
(6, '9lodx5cnnseymgifmtx0.png', 'http://localhost/ecommerce/', 0, 0, '2024-05-06 19:28:28', '2024-05-06 19:28:28'),
(7, 'xyvbhoz5k3ejvxy5xpkq.png', 'http://localhost/ecommerce/', 0, 0, '2024-05-06 19:44:06', '2024-05-06 19:44:06'),
(8, 'k2igsdn0j7txqpl83fct.png', 'http://localhost/ecommerce/', 0, 0, '2024-05-06 19:44:18', '2024-05-06 19:44:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_titulo` varchar(255) DEFAULT NULL,
  `meta_descripcion` text DEFAULT NULL,
  `meta_p_clave` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `categoria_id`, `nombre`, `slug`, `meta_titulo`, `meta_descripcion`, `meta_p_clave`, `created_by`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 2, 'Pantalones y camisas', 'pantalones-camisas', 'Pantalones y camisas', 'Pantalones y camisas', 'Pantalones y camisas', 1, 0, 0, '2024-01-29 20:58:12', '2024-04-01 19:58:50'),
(2, 1, 'Celulares', 'celulares', 'Celulares', 'Celulares', 'Celulares', 1, 0, 0, '2024-01-30 14:34:06', '2024-02-07 20:34:17'),
(3, 2, 'Polos y medias', 'polos-medias', 'Polos y medias', 'Polos y medias', 'Polos y medias', 1, 0, 0, '2024-01-31 04:21:00', '2024-02-05 04:36:18'),
(4, 3, 'Sofás y sillas', 'sofas-sillas', 'Sofás y sillas', 'Sofás y sillas', 'Sofás y sillas', 1, 0, 0, '2024-01-31 04:43:02', '2024-02-05 20:16:25'),
(5, 2, 'Boxers y calzones', 'boxers-calzones', 'Boxers y calzones', 'Boxers y calzones', 'Boxers y calzones', 1, 0, 0, '2024-02-02 20:19:22', '2024-02-05 04:45:11'),
(6, 7, 'Camisetas y shorts', 'camisetas-shorts', 'Camisetas y shorts', 'Camisetas y shorts', 'Camisetas y shorts', 1, 0, 0, '2024-02-05 04:39:58', '2024-02-05 04:39:58'),
(7, 8, 'Collares y rolex', 'collares-rolex', 'Collares y rolex', 'Collares y rolex', 'Collares y rolex', 1, 0, 0, '2024-02-05 04:46:06', '2024-02-05 04:46:06'),
(8, 6, 'Transformers y GTAV', 'transformers-gtav', 'Transformers y GTAV', 'Transformers y GTAV', 'Transformers y GTAV', 1, 0, 0, '2024-02-05 04:58:36', '2024-02-05 04:58:36'),
(9, 4, 'Labiales y Bloqueadores', 'labiales-bloqueadores', 'Labiales y Bloqueadores', 'Labiales y Bloqueadores', 'Labiales y Bloqueadores', 1, 0, 0, '2024-02-05 04:59:19', '2024-02-05 04:59:19'),
(10, 5, 'Cien años de soledad, top gun maveric, esclava remix', 'cien-anos-de-soledad-top-gun-maveric-esclava-remix', 'Cien años de soledad, top gun maveric, esclava remix', 'Cien años de soledad, top gun maveric, esclava remix', 'Cien años de soledad, top gun maveric, esclava remix', 1, 0, 0, '2024-02-05 05:01:41', '2024-04-01 20:43:59'),
(11, 2, 'Zapatillas y sandalias', 'zapatillas-sandalias', 'Zapatillas y sandalias', 'Zapatillas y sandalias', 'Zapatillas y sandalias', 1, 0, 0, '2024-02-05 05:07:17', '2024-02-05 05:07:17'),
(12, 6, 'Simuladores', 'simuladores', 'Simuladores', 'Simuladores', 'Simuladores', 1, 0, 0, '2024-02-05 05:53:38', '2024-03-15 02:54:13'),
(13, 2, 'Moda mujer', 'moda-mujer', 'Moda mujer', 'Moda mujer', 'Moda mujer', 1, 0, 0, '2024-02-07 17:42:55', '2024-02-07 17:42:55'),
(14, 1, 'Laptops', 'laptops', 'Laptops', 'Laptops', 'Laptops', 1, 0, 0, '2024-02-12 20:11:13', '2024-02-12 20:11:13'),
(15, 1, 'Tablets', 'tablets', 'Tablets', 'Tablets', 'Tablets', 1, 0, 0, '2024-02-17 16:57:21', '2024-02-17 16:57:21'),
(16, 1, 'Audífonos', 'audifonos', 'Audífonos', 'Audífonos', 'Audífonos', 1, 0, 0, '2024-02-17 17:15:54', '2024-02-17 17:15:54'),
(17, 9, 'Arroz', 'arroz', 'Arroz', 'Arroz', 'Arroz', 1, 0, 0, '2024-03-18 17:31:33', '2024-03-18 17:31:33'),
(18, 9, 'Aceites', 'aceites', 'Aceites', '', '', 1, 0, 0, '2024-05-10 14:43:18', '2024-05-10 14:43:18'),
(19, 11, 'Chicharrones', 'chicharrones', 'Chicharrones', '', '', 1, 0, 0, '2024-05-12 18:04:29', '2024-05-12 18:04:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `nombre_compania` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `primera_direccion` varchar(255) DEFAULT NULL,
  `segunda_direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `distrito` varchar(200) DEFAULT NULL,
  `codigo_postal` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `es_admin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: cliente, 1: Administrador',
  `estado` int(11) NOT NULL DEFAULT 0 COMMENT '0: activo, 1: inactivo',
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: no, 1: eliminado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellidos`, `email`, `email_verified_at`, `password`, `remember_token`, `nombre_compania`, `pais`, `primera_direccion`, `segunda_direccion`, `ciudad`, `distrito`, `codigo_postal`, `telefono`, `es_admin`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'Abraham Elias', 'Cueva Rico', 'ricoabraham879@gmail.com', '2024-03-17 20:13:42', '$2y$12$teqAlxN7bszkF5PLf8IMn.EgGlIID8nI0pRiFKNIAfDT0bXwzsMNi', 'SSATl9QETz4hvuZ5PEVAdXNMBzmd6tJiw1yg9dHZmxyekgvKcUoN9QD5swmV', 'rico\'s', 'Perú', 'Hefestos', '404', 'Lima', 'Ate', '15022', '924575577', 1, 0, 0, '2024-01-28 15:23:20', '2024-04-19 01:11:45'),
(2, 'test', NULL, 'test@gmail.com', NULL, '$2y$12$ohGsPlzjAJYcQ0l14K0FoO0A/QnDNK8aNUJe4kwhJDzmQZCWsVeD.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-01-29 03:46:12', '2024-04-02 00:39:09'),
(3, 'prueba', NULL, 'prueba@gmail.com', NULL, '$2y$12$K84E6xDH5pPrV/BYwaNzVOZaEAEmHK7l1Nb4rpK1LUAb5/kXcR0ru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-01-29 03:56:58', '2024-04-02 00:39:34'),
(4, 'xdd', NULL, 'xdd@gmail.com', NULL, '$2y$12$O0waTN9YyZSDX7SQplwU6OPWVY51OA1jcJSYPIy2ERDSb6my7MTIO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-01-29 04:00:36', '2024-01-29 06:38:30'),
(5, 'as', NULL, 'abrahamrico272@gmail.com', '2024-03-17 09:36:31', '$2y$12$WUtvcxr7/5qrBnI07wDB9etDE96Meyec0XcfM4j0gXJqSZPaQVmvy', 'gMxuT4UBN7NiikYblOMIEoQglR0gMr3oV6p8y4FnnLbDIgaVO8UtrhgxJZlP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-01-29 07:47:25', '2024-03-17 09:36:31'),
(6, 'xd', NULL, 'xd@gmail.com', '2024-03-16 21:34:15', '$2y$12$pQObCCsZMYTAVrgp7.y15e.bGkrUpzr5HeJYxyRsPFzuq4AST7QJ6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-13 00:53:27', '2024-04-12 00:46:08'),
(7, 'Abraham', NULL, 'abraham272@gmail.com', NULL, '$2y$12$oz6KPpNeThQxnC9U3izMXuYkJh7mF3H1M7ki2MwBETY6Z4lew5022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-13 20:21:31', '2024-04-12 00:46:10'),
(8, 'Abraham', NULL, 'abrahamrico559@gmail.com', NULL, '$2y$12$xo6bx.hyzBkFg1zzKhCUVe6qF5krP0YP6mlblUES7HuaQQ1RrcWse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-13 20:39:03', '2024-03-13 20:39:03'),
(9, 'Abraham', NULL, 'abrahamrico879@gmail.com', NULL, '$2y$12$KiNyi9byEu052BbRAIu6Mu2GIglB.7fV.N6DRRdlgL8M6wIqCrGy.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-13 20:50:19', '2024-03-13 20:50:19'),
(10, 'zd', NULL, 'zd@gmail.com', NULL, '$2y$12$ZofQGyw7WwdAHDlO5mrp0e5EJvdg7ZaNe2Qz9c9VivZJTQHPB9M8q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-13 20:51:44', '2024-03-13 20:51:44'),
(11, 'sano', NULL, 'sano@gmail.com', NULL, '$2y$12$D2VMIIdQnjn0PYNM8XbEbOobHJ4m7nimWdoH4LKhoVNLKOJyDADLW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-13 20:57:59', '2024-03-13 20:57:59'),
(12, 'ala', NULL, 'ala@gmail.com', '2024-03-13 21:10:30', '$2y$12$YrxHNpujrduHWqZU8dizoOHGRguYW/Xg0NzTMXz8Vo50gCUB8SBqe', 'wh9x8n8MwBxscu9ajCkh4fesfmv8QN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-13 20:59:31', '2024-03-17 09:25:14'),
(13, 'Abraham', NULL, 'abrahamrico546@gmail.com', '2024-03-17 09:42:21', '$2y$12$KuvSpBjoAFqjSDBL5tbSZ.8cSSNlb1XiT/ZBcFBOwGdUIllmOwEPe', 'fOp4tJOjSm0l6FI0Nlgvc7kpWLKD7Z', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-16 21:36:44', '2024-03-17 09:42:21'),
(14, 'alan', NULL, 'alan@gmail.com', NULL, '$2y$12$KkwywVJq9uISHUwUcL7SYeHg5jbwG8TqZQVVZcXnLR8MsWCitvgEy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-03-18 06:59:46', '2024-04-02 00:50:44'),
(15, 'x', NULL, 'x@gmail.com', '2024-04-10 19:58:59', '$2y$12$pSiUIbnpbfkUZTsraPbaIu5tUvgnc6A26plagqUly4RSJeLb39huu', 'rVkPER1Brs82CvvZETjs0FCyIjM5sinqgSAZCLd5P02pdwuDkCiLrQGE8s84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-26 22:07:09', '2024-04-10 19:58:59'),
(16, 'x', NULL, 'xd2@gmail.com', '2024-03-27 01:25:40', '$2y$12$9J6OagsBuJegI9VYnpv89uILrQ7bJJ40vHXltPst6wuBZ8nhRzV3C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-03-27 01:21:17', '2024-03-27 01:25:40'),
(17, 'Sofía', NULL, 'sofia@gmail.com', '2024-04-13 23:08:49', '$2y$12$fKg2ROLeo/QoccYEcjhv6.oSVLoOO7Q9nHV3fPMl/2pvZMfYBvav6', 'wnrJmjbqTpicoqEF4zY4TEfrhFss37V3LE9qfxx8SuV8qiiEA1mcy7WWz1Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-04-13 22:34:17', '2024-04-13 23:11:52'),
(18, 'Gustavo', NULL, 'gustavo@gmail.com', '2024-04-23 21:25:43', '$2y$12$hwucRpS31IZfjfUFOTkSIuPPf7Kgm6M/B8OWwKSse5y.4fHBPruqS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-04-23 21:25:18', '2024-04-23 21:25:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blog_categoria`
--
ALTER TABLE `blog_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blog_comentarios`
--
ALTER TABLE `blog_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificacion_productos`
--
ALTER TABLE `calificacion_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `codigo_descuento`
--
ALTER TABLE `codigo_descuento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion_inicio`
--
ALTER TABLE `configuracion_inicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion_sistema`
--
ALTER TABLE `configuracion_sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactenos`
--
ALTER TABLE `contactenos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `costo_envio`
--
ALTER TABLE `costo_envio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_de_deseos`
--
ALTER TABLE `lista_de_deseos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_colores`
--
ALTER TABLE `productos_colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_imagen`
--
ALTER TABLE `producto_imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_tamano`
--
ALTER TABLE `producto_tamano`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `blog_categoria`
--
ALTER TABLE `blog_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `blog_comentarios`
--
ALTER TABLE `blog_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `calificacion_productos`
--
ALTER TABLE `calificacion_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `codigo_descuento`
--
ALTER TABLE `codigo_descuento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `configuracion_inicio`
--
ALTER TABLE `configuracion_inicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `configuracion_sistema`
--
ALTER TABLE `configuracion_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contactenos`
--
ALTER TABLE `contactenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `costo_envio`
--
ALTER TABLE `costo_envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lista_de_deseos`
--
ALTER TABLE `lista_de_deseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `productos_colores`
--
ALTER TABLE `productos_colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `producto_imagen`
--
ALTER TABLE `producto_imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `producto_tamano`
--
ALTER TABLE `producto_tamano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
