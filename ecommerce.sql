-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2024 a las 20:44:28
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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
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
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`, `meta_titulo`, `meta_descripcion`, `meta_p_clave`, `created_by`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'Tecnología', 'tecnologia', 'Tecnología', 'Tecnología', 'Tecnología', 1, 0, 0, '2024-01-29 20:58:12', '2024-02-07 20:33:43'),
(2, 'Moda', 'moda', 'Moda', 'Moda', 'Moda', 1, 0, 0, '2024-01-30 14:34:06', '2024-02-05 04:25:27'),
(3, 'Muebles del hogar', 'muebles-del-hogar', 'Muebles del hogar', 'Muebles del hogar', 'Muebles del hogar', 1, 0, 0, '2024-01-31 04:42:24', '2024-02-05 04:26:43'),
(4, 'Belleza y cuidado', 'belleza-cuidado', 'Belleza y cuidado', 'Belleza y cuidado', 'Belleza y cuidado', 1, 0, 0, '2024-02-05 04:27:45', '2024-02-05 04:30:10'),
(5, 'Libros, películas y música', 'libros-peliculas-musica', 'Libros, películas y música', 'Libros, películas y música', 'Libros, películas y música', 1, 0, 0, '2024-02-05 04:28:53', '2024-02-06 13:48:55'),
(6, 'Juguetes y juegos', 'juguetes-juegos', 'Juguetes y juegos', 'Juguetes y juegos', 'Juguetes y juegos', 1, 0, 0, '2024-02-05 04:30:00', '2024-02-05 04:30:00'),
(7, 'Deportes', 'deportes', 'Deportes', 'Deportes', 'Deportes', 1, 0, 0, '2024-02-05 04:30:56', '2024-02-05 04:30:56'),
(8, 'Joyas y relojes', 'joyas-relojes', 'Joyas y relojes', 'Joyas y relojes', 'Joyas y relojes', 1, 0, 0, '2024-02-05 04:31:50', '2024-02-05 04:31:50'),
(9, 'Abarrotes', 'abarrotes', 'Abarrotes', 'Abarrotes', 'Abarrotes', 1, 0, 0, '2024-03-18 17:31:02', '2024-03-18 17:31:02');

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
(1, 'Hola', 'Cantidad', '25', '2024-03-08', 0, 0, '2024-03-07 16:31:42', '2024-03-07 16:45:45'),
(2, 'XD', 'Porcentaje', '10', '2024-03-13', 0, 0, '2024-03-08 16:23:56', '2024-03-08 16:39:50'),
(3, 'SAS', 'Cantidad', '45', '2024-03-28', 0, 0, '2024-03-18 03:07:01', '2024-03-18 03:07:01');

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
(1, 'Envío gratis', '0', 0, 0, '2024-03-10 21:44:39', '2024-03-10 21:47:26'),
(2, 'Estándar', '15', 0, 0, '2024-03-10 21:45:34', '2024-03-10 21:49:37'),
(3, 'Especial', '30', 0, 0, '2024-03-11 16:20:20', '2024-03-11 16:20:20');

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
(10, 'Faraón', 'faraon', 'Faraón', 'Faraón', 'Faraón', 1, 0, 0, '2024-03-18 17:32:54', '2024-03-18 17:32:54');

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
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `estado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: activo, 1: inactivo',
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: no eliminado, 1: eliminado',
  `creado_por` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `slug`, `sku`, `categoria_id`, `subcategoria_id`, `marca_id`, `precio_anterior`, `precio`, `descripcion_corta`, `descripcion`, `informacion_adicional`, `envios_devoluciones`, `estado`, `esta_eliminado`, `creado_por`, `created_at`, `updated_at`) VALUES
(1, 'Falda lápiz marrón con cintura paperbag', 'falda-lapiz-marron-con-cintura-paperbag', 'FLMMCCP', 2, 13, 2, 220, 200, '<p>Falda lápiz marrón con cintura paperbag<br></p>', '<p>Falda lápiz marrón con cintura paperbag<br></p>', '<p>Falda lápiz marrón con cintura paperbag<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-01 01:52:02', '2024-02-07 22:45:12'),
(2, 'Vestido con vuelo y abertura de encaje amarillo oscuro', 'vestido-con-vuelo-y-abertura-de-encaje-amarillo-oscuro', 'VCVADEAO', 2, 13, 1, 220, 200, '<p>Vestido con vuelo y abertura de encaje amarillo oscuro</p>', '<p>Vestido con vuelo y abertura de encaje amarillo oscuro</p>', '<p>Vestido con vuelo y abertura de encaje amarillo oscuro</p>', '<p>xd</p>', 0, 0, 1, '2024-02-02 10:08:57', '2024-02-07 22:49:48'),
(3, 'Nunc dignissim risus', 'nunc-dignissim-risus', 'NDR', 2, 13, 1, 12, 10, '<p style=\"text-align: justify;\"><font color=\"#0000ff\">Nunc dignissim risus</font><br></p>', '<ol><li style=\"text-align: justify;\"><font color=\"rgba(0, 0, 0, 0.8)\" face=\"Source Sans Pro, sans-serif\"><span style=\"font-size: 16.2px; letter-spacing: -0.0486px;\">Nunc dignissim risus</span></font><br></li></ol>', '<ul><li style=\"text-align: justify; \"><font color=\"rgba(0, 0, 0, 0.8)\" face=\"Source Sans Pro, sans-serif\"><span style=\"font-size: 16.2px; letter-spacing: -0.0486px;\">Nunc dignissim risus</span></font><br></li></ul>', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;\"><b>xd</b></span><br></p>', 0, 0, 1, '2024-02-02 10:11:07', '2024-02-07 22:53:38'),
(4, 'Aliquam tincidunt mauris', 'aliquam-tincidunt-mauris', 'ATM', 2, 13, 2, 220, 200, '<p>Aliquam tincidunt mauris<br></p>', '<p>Aliquam tincidunt mauris<br></p>', '<p>Aliquam tincidunt mauris<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-07 22:55:59', '2024-02-07 22:58:31'),
(5, 'Top de té con botones delanteros amarillos', 'top-de-te-con-botones-delanteros-amarillos', 'TDTBDA', 2, 13, 2, 220, 200, '<p>Top de té con botones delanteros amarillos<br></p>', '<p>Top de té con botones delanteros amarillos<br></p>', '<p>Top de té con botones delanteros amarillos<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-07 22:59:23', '2024-02-07 23:00:02'),
(6, 'Beige knitted elastic runner shoes', 'beige-knitted-elastic-runner-shoes', 'BKERS', 2, 13, 1, 220, 200, '<h3 class=\"product-title\" style=\"margin-bottom: 0.2rem; line-height: 1.25; font-size: 1.6rem; color: rgb(51, 51, 51); letter-spacing: -0.01em; font-family: Poppins, sans-serif;\"><a href=\"file:///C:/xampp/htdocs/molla-eCommerce-html-template/product.html\" style=\"color: inherit; transition: color 0.3s ease 0s; font-family: Poppins;\">Beige knitted elastic runner shoes</a></h3>', '<h3 class=\"product-title\" style=\"margin-bottom: 0.2rem; line-height: 1.25; font-size: 1.6rem; color: rgb(51, 51, 51); letter-spacing: -0.01em; font-family: Poppins, sans-serif;\"><a href=\"file:///C:/xampp/htdocs/molla-eCommerce-html-template/product.html\" style=\"color: inherit; transition: color 0.3s ease 0s; font-family: Poppins;\">Beige knitted elastic runner shoes</a></h3>', '<h3 class=\"product-title\" style=\"margin-bottom: 0.2rem; line-height: 1.25; font-size: 1.6rem; color: rgb(51, 51, 51); letter-spacing: -0.01em; font-family: Poppins, sans-serif;\"><a href=\"file:///C:/xampp/htdocs/molla-eCommerce-html-template/product.html\" style=\"color: inherit; transition: color 0.3s ease 0s; font-family: Poppins;\">Beige knitted elastic runner shoes</a></h3>', '<p>xd</p>', 0, 0, 1, '2024-02-07 23:02:40', '2024-02-07 23:03:22'),
(7, 'Cuñas anchas marrón claro con tachuelas', 'cunas-anchas-marron-claro-con-tachuelas', 'CAMCCT', 2, 13, 1, 220, 200, '<p>Cuñas anchas marrón claro con tachuelas<br></p>', '<p>Cuñas anchas marrón claro con tachuelas<br></p>', '<p>Cuñas anchas marrón claro con tachuelas<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-07 23:04:07', '2024-02-07 23:04:45'),
(8, 'Bolsa de viaje de fin de semana RI suave negra', 'bolsa-de-viaje-de-fin-de-semana-ri-suave-negra', 'BDVDFDSRISN', 2, 13, 2, 220, 200, '<p>Bolsa de viaje de fin de semana RI suave negra<br></p>', '<p>Bolsa de viaje de fin de semana RI suave negra<br></p>', '<p>Bolsa de viaje de fin de semana RI suave negra<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-07 23:06:14', '2024-02-07 23:06:55'),
(9, 'Celular Galaxy S24 Ultra 512GB', 'celular-galaxy-s24-ultra-512gb', 'CGSU', 1, 2, 3, 6199, 5699, '<p>Celular Galaxy S24 Ultra 512GB<br></p>', '<p>Celular Galaxy S24 Ultra 512GB<br></p>', '<p>Celular Galaxy S24 Ultra 512GB<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-07 23:09:44', '2024-02-07 23:10:41'),
(10, 'iPhone 15 Plus - 256GB - Negro', 'iphone-15-plus-256gb-negro', 'IPGBN', 1, 2, 4, 6299, 5999, '<h1 class=\"page-title\" style=\"line-height: normal; font-size: 24px; margin-top: -13px; margin-bottom: 10px; font-family: &quot;Montserrat Medium&quot;; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\" style=\"font-family: Arial;\">iPhone 15 Plus - 256GB&nbsp;- Negro</span></h1>', '<h1 class=\"page-title\" style=\"line-height: normal; font-size: 24px; margin-top: -13px; margin-bottom: 10px; font-family: &quot;Montserrat Medium&quot;; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\" style=\"font-family: Arial;\">iPhone 15 Plus - 256GB&nbsp;- Negro</span></h1>', '<h1 class=\"page-title\" style=\"line-height: normal; font-size: 24px; margin-top: -13px; margin-bottom: 10px; font-family: &quot;Montserrat Medium&quot;; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\" style=\"font-family: Arial;\">iPhone 15 Plus - 256GB&nbsp;- Negro</span></h1>', '<p>xd</p>', 0, 0, 1, '2024-02-13 01:05:14', '2024-02-13 01:06:34'),
(11, 'HP OMEN 16 Gaming, Core i7-13620H, 6GB RTX4050, 16GB RAM, 1TB SSD, 16.1″ FHD 144Hz', 'hp-omen-16-gaming-core-i7-13620h-6gb-rtx4050-16gb-ram-1tb-ssd-161″-fhd-144hz', 'HPOGCI', 1, 14, 5, 8389, 6799, '<p>HP OMEN 16 Gaming, Core i7-13620H, 6GB RTX4050, 16GB RAM, 1TB SSD, 16.1″ FHD 144Hz<br></p>', '<p>HP OMEN 16 Gaming, Core i7-13620H, 6GB RTX4050, 16GB RAM, 1TB SSD, 16.1″ FHD 144Hz<br></p>', '<p>HP OMEN 16 Gaming, Core i7-13620H, 6GB RTX4050, 16GB RAM, 1TB SSD, 16.1″ FHD 144Hz<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-13 01:12:17', '2024-02-13 01:16:43'),
(12, 'Celular Xiaomi Redmi Note 13 256GB 8GB 108MP 8MP - Negro', 'celular-xiaomi-redmi-note-13-256gb-8gb-108mp-8mp-negro', 'CXRNN', 1, 2, 6, 1299, 829, '<p>Celular Xiaomi Redmi Note 13 256GB 8GB 108MP 8MP - Negro<br></p>', '<p>Celular Xiaomi Redmi Note 13 256GB 8GB 108MP 8MP - Negro<br></p>', '<p>Celular Xiaomi Redmi Note 13 256GB 8GB 108MP 8MP - Negro<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-17 21:49:51', '2024-02-17 21:51:47'),
(13, 'Celular Motorola Edge 40 8gb + 256gb', 'celular-motorola-edge-40-8gb-256gb', 'CME', 1, 2, 7, 1299, 829, '<h1 data-name=\"Celular Motorola Edge 40 8gb + 256gb\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Celular Motorola Edge 40 8gb + 256gb</h1>', '<h1 data-name=\"Celular Motorola Edge 40 8gb + 256gb\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Celular Motorola Edge 40 8gb + 256gb</h1>', '<h1 data-name=\"Celular Motorola Edge 40 8gb + 256gb\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Celular Motorola Edge 40 8gb + 256gb</h1>', '<p>xd</p>', 0, 0, 1, '2024-02-17 21:54:41', '2024-02-17 21:55:41'),
(14, 'Tablet Samsung Galaxy Tab A9 Plus 11\" 64GB 4GB RAM Graphite', 'tablet-samsung-galaxy-tab-a9-plus-11-64gb-4gb-ram-graphite', 'TSGT', 1, 15, 3, 899, 799, '<h1 class=\"page-title\" style=\"font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 600; line-height: 1.22; font-size: 27px; margin: 15px 0px; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\">Tablet Samsung Galaxy Tab A9 Plus 11\" 64GB 4GB RAM Graphite</span></h1>', '<h1 class=\"page-title\" style=\"font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 600; line-height: 1.22; font-size: 27px; margin: 15px 0px; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\">Tablet Samsung Galaxy Tab A9 Plus 11\" 64GB 4GB RAM Graphite</span></h1>', '<h1 class=\"page-title\" style=\"font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 600; line-height: 1.22; font-size: 27px; margin: 15px 0px; font-stretch: normal; color: rgb(0, 0, 0);\"><span class=\"base\" data-ui-id=\"page-title-wrapper\" itemprop=\"name\">Tablet Samsung Galaxy Tab A9 Plus 11\" 64GB 4GB RAM Graphite</span></h1>', '<p>xd</p>', 0, 0, 1, '2024-02-17 21:57:59', '2024-02-17 21:58:39'),
(15, 'Xiaomi Redmi Pad SE (256 GB + 8 GB) Wi-Fi solo 11\" 90Hz 4 altavoces 8000mAh NUEVO', 'xiaomi-redmi-pad-se-256-gb-8-gb-wi-fi-solo-11-90hz-4-altavoces-8000mah-nuevo', 'XRPSE', 1, 15, 6, 999, 859, '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Xiaomi Redmi Pad SE (256 GB + 8 GB) Wi-Fi solo 11\" 90Hz 4 altavoces 8000mAh NUEVO</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Xiaomi Redmi Pad SE (256 GB + 8 GB) Wi-Fi solo 11\" 90Hz 4 altavoces 8000mAh NUEVO</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Xiaomi Redmi Pad SE (256 GB + 8 GB) Wi-Fi solo 11\" 90Hz 4 altavoces 8000mAh NUEVO</span><br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-17 21:59:53', '2024-02-17 22:00:54'),
(16, 'Juego de 8 DVD X Plane 11 edición global', 'juego-de-8-dvd-x-plane-11-edicion-global', 'XRPSE', 6, 12, 8, 200, 150, '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Juego de 8 DVD X Plane 11 edición global</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Juego de 8 DVD X Plane 11 edición global</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">Juego de 8 DVD X Plane 11 edición global</span><br></p>', '<p>xd</p><p><br></p>', 0, 0, 1, '2024-02-17 22:03:35', '2024-02-17 22:05:17'),
(17, 'Juego de 8 DVD X Plane 12 edición global', 'dvd-x-plane-12-global', 'DVDPG', 6, 12, 8, 300, 250, '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">DVD X Plane 12 Global</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">DVD X Plane 12 Global</span><br></p>', '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 22px; font-weight: 700;\">DVD X Plane 12 Global</span><br></p>', '<p>XD</p>', 0, 0, 1, '2024-02-17 22:06:07', '2024-02-17 22:08:13'),
(18, 'Microsoft Flight Simulator 2020', 'microsoft-flight-simulator-2020', 'MFS', 6, 12, 9, 200, 120, '<p>Microsoft Flight Simulator 2020<br></p>', '<p>Microsoft Flight Simulator 2020<br></p>', '<p>Microsoft Flight Simulator 2020<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-17 22:10:51', '2024-02-17 22:14:18'),
(19, 'Galaxy Buds FE', 'galaxy-buds-fe', 'CBFE', 1, 16, 3, 350, 349, '<h2 class=\"pd-info__title\" style=\"margin: 1.11111vw 0px 0px; padding: 0px 2.5vw 0px 0px; vertical-align: top; font-size: 1.66667vw; font-family: SamsungSharpSans, arial, sans-serif; color: rgb(0, 0, 0);\">Galaxy Buds FE</h2>', '<h2 class=\"pd-info__title\" style=\"margin: 1.11111vw 0px 0px; padding: 0px 2.5vw 0px 0px; vertical-align: top; font-size: 1.66667vw; font-family: SamsungSharpSans, arial, sans-serif; color: rgb(0, 0, 0);\">Galaxy Buds FE</h2>', '<h2 class=\"pd-info__title\" style=\"margin: 1.11111vw 0px 0px; padding: 0px 2.5vw 0px 0px; vertical-align: top; font-size: 1.66667vw; font-family: SamsungSharpSans, arial, sans-serif; color: rgb(0, 0, 0);\">Galaxy Buds FE</h2>', '<p>xd</p>', 0, 0, 1, '2024-02-17 22:16:05', '2024-02-17 22:17:13'),
(20, 'AirPods 3era Generación', 'airpods-3era-generacion', 'APG', 1, 16, 4, 799, 749, '<p>AirPods 3era Generación<br></p>', '<p>AirPods 3era Generación<br></p>', '<p>AirPods 3era Generación<br></p>', '<p>xd</p>', 0, 0, 1, '2024-02-17 22:18:18', '2024-02-17 22:19:45'),
(21, 'Redmi Airdots Wireless Earbuds 5.0 TWS Earphone Noise Cancelling Mic for Xiaomi', 'redmi-airdots-wireless-earbuds-50-tws-earphone-noise-cancelling-mic-for-xiaomi', 'RAWET', 1, 16, 6, 200, 150, '<p><span style=\"color: inherit; font-family: inherit; font-weight: inherit;\">Redmi Airdots Wireless Earbuds 5.0 TWS Earphone Noise Cancelling Mic for Xiaomi</span><a class=\"detail-title\" href=\"https://www.alibaba.com/product-detail/A6S-BT-Headsets-VS-for-Redmi_1600070709202.html?spm=a2700.pccps_detail.0.0.308013a0hgIUBl\" target=\"_blank\" rel=\"noreferrer\" data-spm-anchor-id=\"a2700.pccps_detail.0.0\" style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgb(51, 51, 51); text-decoration-line: underline; margin: 0px 0px 20px; padding: 0px 0px 0px 17px; display: inline-block; font-family: Roboto, Helvetica, Tahoma, Arial, &quot;Microsoft YaHei&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\"></a></p>', '<p><span style=\"color: inherit; font-family: inherit; font-weight: inherit;\">Redmi Airdots Wireless Earbuds 5.0 TWS Earphone Noise Cancelling Mic for Xiaomi</span><a class=\"detail-title\" href=\"https://www.alibaba.com/product-detail/A6S-BT-Headsets-VS-for-Redmi_1600070709202.html?spm=a2700.pccps_detail.0.0.308013a0hgIUBl\" target=\"_blank\" rel=\"noreferrer\" data-spm-anchor-id=\"a2700.pccps_detail.0.0\" style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgb(51, 51, 51); text-decoration-line: underline; margin: 0px 0px 20px; padding: 0px 0px 0px 17px; display: inline-block; font-family: Roboto, Helvetica, Tahoma, Arial, &quot;Microsoft YaHei&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\"></a></p>', '<p><span style=\"color: inherit; font-family: inherit; font-weight: inherit;\">Redmi Airdots Wireless Earbuds 5.0 TWS Earphone Noise Cancelling Mic for Xiaomi</span><a class=\"detail-title\" href=\"https://www.alibaba.com/product-detail/A6S-BT-Headsets-VS-for-Redmi_1600070709202.html?spm=a2700.pccps_detail.0.0.308013a0hgIUBl\" target=\"_blank\" rel=\"noreferrer\" data-spm-anchor-id=\"a2700.pccps_detail.0.0\" style=\"border: 0px solid rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgb(51, 51, 51); text-decoration-line: underline; margin: 0px 0px 20px; padding: 0px 0px 0px 17px; display: inline-block; font-family: Roboto, Helvetica, Tahoma, Arial, &quot;Microsoft YaHei&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 255);\"></a></p>', '<p>xd</p>', 0, 0, 1, '2024-02-17 22:21:04', '2024-02-17 22:22:06'),
(22, 'Arroz Extra Faraón de 5 Kg', 'arroz-extra-faraon-de-5-kg', 'AEF', 9, 17, 10, 27.9, 27.2, '<h1 data-name=\"Arroz Extra Faraón de 5 Kg\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Arroz Extra Faraón de 5 Kg</h1>', '<h1 data-name=\"Arroz Extra Faraón de 5 Kg\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Arroz Extra Faraón de 5 Kg</h1>', '<h1 data-name=\"Arroz Extra Faraón de 5 Kg\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">Arroz Extra Faraón de 5 Kg</h1>', '<h1 data-name=\"Arroz Extra Faraón de 5 Kg\" class=\"jsx-1680787435 product-name fa--product-name false\" style=\"border: 0px; overflow-wrap: break-word; margin-right: 15px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 20px; line-height: normal; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-family: Lato, sans-serif; -webkit-font-smoothing: antialiased; vertical-align: baseline; -webkit-tap-highlight-color: transparent; color: rgb(51, 51, 51); letter-spacing: -0.3px;\">xd</h1>', 0, 0, 1, '2024-03-18 22:32:11', '2024-03-18 22:34:52');

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
(53, 10, 5, '2024-02-12 20:06:34', '2024-02-12 20:06:34'),
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
(71, 22, 10, '2024-03-18 17:34:52', '2024-03-18 17:34:52');

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
(34, 22, '22tvr10pdpxrwy3v8gkux7.jfif', 'jfif', 100, '2024-03-18 17:34:52', '2024-03-18 17:34:52');

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
(56, 10, '1.8', 2, '2024-02-12 20:06:34', '2024-02-12 20:06:34'),
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
(74, 22, '2', 2, '2024-03-18 17:34:52', '2024-03-18 17:34:52');

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
(1, 2, 'Pantalones y camisas', 'pantalones-camisas', 'Pantalones y camisas', 'Pantalones y camisas', 'Pantalones y camisas', 1, 0, 0, '2024-01-29 20:58:12', '2024-02-05 20:49:43'),
(2, 1, 'Celulares', 'celulares', 'Celulares', 'Celulares', 'Celulares', 1, 0, 0, '2024-01-30 14:34:06', '2024-02-07 20:34:17'),
(3, 2, 'Polos y medias', 'polos-medias', 'Polos y medias', 'Polos y medias', 'Polos y medias', 1, 0, 0, '2024-01-31 04:21:00', '2024-02-05 04:36:18'),
(4, 3, 'Sofás y sillas', 'sofas-sillas', 'Sofás y sillas', 'Sofás y sillas', 'Sofás y sillas', 1, 0, 0, '2024-01-31 04:43:02', '2024-02-05 20:16:25'),
(5, 2, 'Boxers y calzones', 'boxers-calzones', 'Boxers y calzones', 'Boxers y calzones', 'Boxers y calzones', 1, 0, 0, '2024-02-02 20:19:22', '2024-02-05 04:45:11'),
(6, 7, 'Camisetas y shorts', 'camisetas-shorts', 'Camisetas y shorts', 'Camisetas y shorts', 'Camisetas y shorts', 1, 0, 0, '2024-02-05 04:39:58', '2024-02-05 04:39:58'),
(7, 8, 'Collares y rolex', 'collares-rolex', 'Collares y rolex', 'Collares y rolex', 'Collares y rolex', 1, 0, 0, '2024-02-05 04:46:06', '2024-02-05 04:46:06'),
(8, 6, 'Transformers y GTAV', 'transformers-gtav', 'Transformers y GTAV', 'Transformers y GTAV', 'Transformers y GTAV', 1, 0, 0, '2024-02-05 04:58:36', '2024-02-05 04:58:36'),
(9, 4, 'Labiales y Bloqueadores', 'labiales-bloqueadores', 'Labiales y Bloqueadores', 'Labiales y Bloqueadores', 'Labiales y Bloqueadores', 1, 0, 0, '2024-02-05 04:59:19', '2024-02-05 04:59:19'),
(10, 5, 'Cien años de soledad, top gun maveric, esclava remix', 'cien-anos-de-soledad-top-gun-maveric-esclava-remix', 'Cien años de soledad, top gun maveric, esclava remix', 'Cien años de soledad, top gun maveric, esclava remix', 'Cien años de soledad, top gun maveric, esclava remix', 1, 0, 0, '2024-02-05 05:01:41', '2024-02-06 13:48:03'),
(11, 2, 'Zapatillas y sandalias', 'zapatillas-sandalias', 'Zapatillas y sandalias', 'Zapatillas y sandalias', 'Zapatillas y sandalias', 1, 0, 0, '2024-02-05 05:07:17', '2024-02-05 05:07:17'),
(12, 6, 'Simuladores', 'simuladores', 'Simuladores', 'Simuladores', 'Simuladores', 1, 0, 0, '2024-02-05 05:53:38', '2024-03-15 02:54:13'),
(13, 2, 'Moda mujer', 'moda-mujer', 'Moda mujer', 'Moda mujer', 'Moda mujer', 1, 0, 0, '2024-02-07 17:42:55', '2024-02-07 17:42:55'),
(14, 1, 'Laptops', 'laptops', 'Laptops', 'Laptops', 'Laptops', 1, 0, 0, '2024-02-12 20:11:13', '2024-02-12 20:11:13'),
(15, 1, 'Tablets', 'tablets', 'Tablets', 'Tablets', 'Tablets', 1, 0, 0, '2024-02-17 16:57:21', '2024-02-17 16:57:21'),
(16, 1, 'Audífonos', 'audifonos', 'Audífonos', 'Audífonos', 'Audífonos', 1, 0, 0, '2024-02-17 17:15:54', '2024-02-17 17:15:54'),
(17, 9, 'Arroz', 'arroz', 'Arroz', 'Arroz', 'Arroz', 1, 0, 0, '2024-03-18 17:31:33', '2024-03-18 17:31:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `es_admin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: cliente, 1: Administrador',
  `estado` int(11) NOT NULL DEFAULT 0 COMMENT '0: activo, 1: inactivo',
  `esta_eliminado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: no, 1: eliminado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `es_admin`, `estado`, `esta_eliminado`, `created_at`, `updated_at`) VALUES
(1, 'Abraham', 'ricoabraham879@gmail.com', '2024-03-17 20:13:42', '$2y$12$8UleidFm9iBHJO/ramkqSeTJn69ZxVWwBUtev0mPYmpQ/njkIuu0S', '7npIKd8NSKKpNry2b5ivsATxqdoX5eU3pnKXyag1tWmd8p5188A8pY0VAWpU', 1, 0, 0, '2024-01-28 15:23:20', '2024-03-17 20:13:42'),
(2, 'test', 'test@gmail.com', NULL, '$2y$12$ohGsPlzjAJYcQ0l14K0FoO0A/QnDNK8aNUJe4kwhJDzmQZCWsVeD.', NULL, 1, 0, 0, '2024-01-29 03:46:12', '2024-01-29 03:46:12'),
(3, 'prueba', 'prueba@gmail.com', NULL, '$2y$12$K84E6xDH5pPrV/BYwaNzVOZaEAEmHK7l1Nb4rpK1LUAb5/kXcR0ru', NULL, 1, 0, 0, '2024-01-29 03:56:58', '2024-01-29 03:56:58'),
(4, 'xdd', 'xdd@gmail.com', NULL, '$2y$12$O0waTN9YyZSDX7SQplwU6OPWVY51OA1jcJSYPIy2ERDSb6my7MTIO', NULL, 1, 0, 0, '2024-01-29 04:00:36', '2024-01-29 06:38:30'),
(5, 'as', 'abrahamrico272@gmail.com', '2024-03-17 09:36:31', '$2y$12$WUtvcxr7/5qrBnI07wDB9etDE96Meyec0XcfM4j0gXJqSZPaQVmvy', 'gMxuT4UBN7NiikYblOMIEoQglR0gMr3oV6p8y4FnnLbDIgaVO8UtrhgxJZlP', 1, 0, 0, '2024-01-29 07:47:25', '2024-03-17 09:36:31'),
(6, 'xd', 'xd@gmail.com', '2024-03-16 21:34:15', '$2y$12$pQObCCsZMYTAVrgp7.y15e.bGkrUpzr5HeJYxyRsPFzuq4AST7QJ6', NULL, 0, 0, 0, '2024-03-13 00:53:27', '2024-03-16 21:34:15'),
(7, 'Abraham', 'abraham272@gmail.com', NULL, '$2y$12$oz6KPpNeThQxnC9U3izMXuYkJh7mF3H1M7ki2MwBETY6Z4lew5022', NULL, 0, 0, 0, '2024-03-13 20:21:31', '2024-03-13 20:21:31'),
(8, 'Abraham', 'abrahamrico559@gmail.com', NULL, '$2y$12$xo6bx.hyzBkFg1zzKhCUVe6qF5krP0YP6mlblUES7HuaQQ1RrcWse', NULL, 0, 0, 0, '2024-03-13 20:39:03', '2024-03-13 20:39:03'),
(9, 'Abraham', 'abrahamrico879@gmail.com', NULL, '$2y$12$KiNyi9byEu052BbRAIu6Mu2GIglB.7fV.N6DRRdlgL8M6wIqCrGy.', NULL, 0, 0, 0, '2024-03-13 20:50:19', '2024-03-13 20:50:19'),
(10, 'zd', 'zd@gmail.com', NULL, '$2y$12$ZofQGyw7WwdAHDlO5mrp0e5EJvdg7ZaNe2Qz9c9VivZJTQHPB9M8q', NULL, 0, 0, 0, '2024-03-13 20:51:44', '2024-03-13 20:51:44'),
(11, 'sano', 'sano@gmail.com', NULL, '$2y$12$D2VMIIdQnjn0PYNM8XbEbOobHJ4m7nimWdoH4LKhoVNLKOJyDADLW', NULL, 0, 0, 0, '2024-03-13 20:57:59', '2024-03-13 20:57:59'),
(12, 'ala', 'ala@gmail.com', '2024-03-13 21:10:30', '$2y$12$YrxHNpujrduHWqZU8dizoOHGRguYW/Xg0NzTMXz8Vo50gCUB8SBqe', 'wh9x8n8MwBxscu9ajCkh4fesfmv8QN', 0, 0, 0, '2024-03-13 20:59:31', '2024-03-17 09:25:14'),
(13, 'Abraham', 'abrahamrico546@gmail.com', '2024-03-17 09:42:21', '$2y$12$KuvSpBjoAFqjSDBL5tbSZ.8cSSNlb1XiT/ZBcFBOwGdUIllmOwEPe', 'fOp4tJOjSm0l6FI0Nlgvc7kpWLKD7Z', 0, 0, 0, '2024-03-16 21:36:44', '2024-03-17 09:42:21'),
(14, 'alan', 'alan@gmail.com', NULL, '$2y$12$KkwywVJq9uISHUwUcL7SYeHg5jbwG8TqZQVVZcXnLR8MsWCitvgEy', NULL, 1, 0, 0, '2024-03-18 06:59:46', '2024-03-18 06:59:46');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `codigo_descuento`
--
ALTER TABLE `codigo_descuento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos_colores`
--
ALTER TABLE `productos_colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `producto_imagen`
--
ALTER TABLE `producto_imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `producto_tamano`
--
ALTER TABLE `producto_tamano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
