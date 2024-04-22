-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2024 a las 16:50:41
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
(1, 18, 3, 1, 5, 'oooo', '2024-04-22 14:21:24', '2024-04-22 14:21:24'),
(2, 18, 3, 1, 5, 'aaaa', '2024-04-22 14:22:56', '2024-04-22 14:22:56'),
(3, 1, 1, 1, 4, 'Good', '2024-04-22 14:40:10', '2024-04-22 14:40:10'),
(4, 22, 1, 1, 4, 'Muy bueno el producto para comer :\'v', '2024-04-22 14:40:32', '2024-04-22 14:40:32'),
(5, 22, 6, 17, 4, 'Good', '2024-04-22 14:50:00', '2024-04-22 14:50:00');

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
(8, 'Joyas y relojes', 'joyas-relojes', 'Joyas y relojes', 'Joyas y relojes', 'Joyas y relojes', 1, 0, 0, '2024-02-05 04:31:50', '2024-04-01 19:52:45'),
(9, 'Abarrotes', 'abarrotes', 'Abarrotes', 'Abarrotes', 'Abarrotes', 1, 0, 0, '2024-03-18 17:31:02', '2024-04-01 19:51:40');

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
(1, 'sa', 'Porcentaje', '50', '2024-04-26', 0, 0, '2024-04-02 18:42:50', '2024-04-14 02:06:16'),
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
(1, 1, 1, 1, '202', 'Marron', '1.8', '2', '202', '2024-04-17 21:58:26', '2024-04-17 21:58:26'),
(2, 1, 22, 1, '29.2', 'Blanco', '2', '2', '29.2', '2024-04-17 21:58:26', '2024-04-17 21:58:26'),
(3, 2, 18, 1, '122', 'Azul', '1.8', '2', '122', '2024-04-18 20:17:19', '2024-04-18 20:17:19'),
(4, 3, 18, 1, '122', 'Azul', '1.8', '2', '122', '2024-04-18 20:18:42', '2024-04-18 20:18:42'),
(5, 4, 22, 1, '29.2', 'Blanco', '2', '2', '29.2', '2024-04-22 14:47:24', '2024-04-22 14:47:24'),
(6, 5, 22, 1, '29.2', 'Blanco', '2', '2', '29.2', '2024-04-22 14:47:46', '2024-04-22 14:47:46'),
(7, 6, 22, 1, '29.2', 'Blanco', '2', '2', '29.2', '2024-04-22 14:48:01', '2024-04-22 14:48:01');

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
(1, 'cs_test_a1AgWPCR8BVJkWfyeE5vAzmhqxvSkD5EWAVJeczM8hL3ULb99pwVhiVg0m', 'cs_test_a1AgWPCR8BVJkWfyeE5vAzmhqxvSkD5EWAVJeczM8hL3ULb99pwVhiVg0m', '464483417', 1, 'Abraham Elias', 'Cueva Rico', 'rico\'s', 'Perú', 'Lima', 'Lima', 'LIMA', 'Ate', '15021', '924575577', 'ricoabraham879@gmail.com', 'zzzz', 'sa', '115.6', 3, '20', '95.6', 'stripe', 3, 0, 1, '{\"id\":\"cs_test_a1AgWPCR8BVJkWfyeE5vAzmhqxvSkD5EWAVJeczM8hL3ULb99pwVhiVg0m\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2569,\"amount_total\":2569,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/ecommerce\\/pagar\",\"client_reference_id\":null,\"client_secret\":null,\"consent\":null,\"consent_collection\":null,\"created\":1713391107,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"PE\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"ricoabraham879@gmail.com\",\"name\":\"1111\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":\"ricoabraham879@gmail.com\",\"expires_at\":1713477506,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3P6gUy071tYYB9Py0IAMLLTx\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/ecommerce\\/stripe\\/payment-success\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null}', '2024-04-17 21:58:25', '2024-04-17 21:59:39'),
(2, NULL, 'cs_test_a1DdYJcjPmiy2eHpcRXVgY2di0uX9hAxxqD8XNpnvcoqhwxqjTQgAUxzGg', '635942052', 1, 'Abraham Elias', 'Cueva Rico', 'rico\'s', 'Perú', 'Hefestos', '404', 'Lima', 'Ate', '15022', '924575577', 'ricoabraham879@gmail.com', 'xddd', 'sa', '61', 3, '20', '41', 'stripe', 3, 0, 1, NULL, '2024-04-18 20:17:19', '2024-04-22 14:42:35'),
(3, '7JE35513JV461833J', NULL, '641643414', 1, 'Abraham Elias', 'Cueva Rico', 'rico\'s', 'Perú', 'Hefestos', '404', 'Lima', 'Ate', '15022', '924575577', 'ricoabraham879@gmail.com', '', 'sa', '61', 3, '20', '41', 'paypal', 3, 0, 1, '{\"PayerID\":\"5JT8MGVM5R8SS\",\"st\":\"Completed\",\"tx\":\"7JE35513JV461833J\",\"cc\":\"USD\",\"amt\":\"11.02\",\"payer_email\":\"sb-pazhd25352612@business.example.com\",\"payer_id\":\"5JT8MGVM5R8SS\",\"payer_status\":\"VERIFIED\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"txn_id\":\"7JE35513JV461833J\",\"mc_currency\":\"USD\",\"mc_fee\":\"0.73\",\"mc_gross\":\"11.02\",\"protection_eligibility\":\"ELIGIBLE\",\"payment_fee\":\"0.73\",\"payment_gross\":\"11.02\",\"payment_status\":\"Completed\",\"payment_type\":\"instant\",\"handling_amount\":\"0.00\",\"shipping\":\"0.00\",\"item_name\":\"E-commerce\",\"item_number\":\"3\",\"quantity\":\"1\",\"txn_type\":\"web_accept\",\"payment_date\":\"2024-04-18T20:18:43Z\",\"receiver_id\":\"85UBVEVAEQXA2\",\"notify_version\":\"UNVERSIONED\",\"verify_sign\":\"A7lRxa76xmHCL33PX02qN6zIbG7iA3BwxmhZIEihMzZABFaUuk3frr0l\"}', '2024-04-18 20:18:42', '2024-04-21 20:08:53'),
(4, NULL, NULL, '646174706', 17, 'Sofía', 'zz', 'zz', 'z', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'sofia@gmail.com', 'zz', 'sa', '14.6', 3, '20', '-5.4', 'stripe', 0, 0, 0, NULL, '2024-04-22 14:47:24', '2024-04-22 14:47:24'),
(5, NULL, NULL, '834349467', 17, 'Sofía', 'zz', 'zz', 'z', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'sofia@gmail.com', 'zz', 'sa', '14.6', 3, '20', '-5.4', 'stripe', 0, 0, 0, NULL, '2024-04-22 14:47:46', '2024-04-22 14:47:46'),
(6, 'cs_test_a1FLexr4GLUHnsfxqghOxYO7G5YQ7BgIZWaQi8v2YRAvD1PypdJdRL3km6', 'cs_test_a1FLexr4GLUHnsfxqghOxYO7G5YQ7BgIZWaQi8v2YRAvD1PypdJdRL3km6', '833934621', 17, 'Sofía', 'zz', 'zz', 'z', 'zz', 'zz', 'zz', 'zz', 'zz', 'zz', 'sofia@gmail.com', 'zz', 'sa', '14.6', 1, '0', '14.6', 'stripe', 3, 0, 1, '{\"id\":\"cs_test_a1FLexr4GLUHnsfxqghOxYO7G5YQ7BgIZWaQi8v2YRAvD1PypdJdRL3km6\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":392,\"amount_total\":392,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/ecommerce\\/pagar\",\"client_reference_id\":null,\"client_secret\":null,\"consent\":null,\"consent_collection\":null,\"created\":1713797280,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"PE\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"sofia@gmail.com\",\"name\":\"1111\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":\"sofia@gmail.com\",\"expires_at\":1713883680,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3P8OAL071tYYB9Py1KpRzexV\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/ecommerce\\/stripe\\/payment-success\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null}', '2024-04-22 14:48:01', '2024-04-22 14:49:20');

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
(17, 9, 'Arroz', 'arroz', 'Arroz', 'Arroz', 'Arroz', 1, 0, 0, '2024-03-18 17:31:33', '2024-03-18 17:31:33');

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
(1, 'Abraham Elias', 'Cueva Rico', 'ricoabraham879@gmail.com', '2024-03-17 20:13:42', '$2y$12$teqAlxN7bszkF5PLf8IMn.EgGlIID8nI0pRiFKNIAfDT0bXwzsMNi', 'NxNE3JeJ15vrIzglLdlHnb6YpLZz5U3Rm8npOUbFnQOD0jQR5bXfbcW4fSrk', 'rico\'s', 'Perú', 'Hefestos', '404', 'Lima', 'Ate', '15022', '924575577', 1, 0, 0, '2024-01-28 15:23:20', '2024-04-19 01:11:45'),
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
(17, 'Sofía', NULL, 'sofia@gmail.com', '2024-04-13 23:08:49', '$2y$12$fKg2ROLeo/QoccYEcjhv6.oSVLoOO7Q9nHV3fPMl/2pvZMfYBvav6', '5yB4j4bzWjyYH3jKsHn4Hbv8YQLYVVv1vBkkXqF1ZbRrJ1AkjLMNDAFaq9H5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2024-04-13 22:34:17', '2024-04-13 23:11:52');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `calificacion_productos`
--
ALTER TABLE `calificacion_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `lista_de_deseos`
--
ALTER TABLE `lista_de_deseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
