-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2021 a las 06:32:57
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa_multientregas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`) VALUES
(1, 'Oficina'),
(2, 'Inmuebles o propiedades'),
(3, 'Deportes'),
(4, 'Hogar'),
(5, 'Electrónica'),
(6, 'Musica'),
(7, 'Mascotas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `metodo_pago` varchar(350) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `st_cliente` char(1) DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Clientes que usaran el sitio web';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod_cliente`, `nombres`, `password`, `direccion`, `identificacion`, `correo`, `telefono`, `metodo_pago`, `created_at`, `st_cliente`) VALUES
(1, 'Cliente1', '12345', 'xxxxx', '0943836478', 'correo@correo.com', '0943836478', 'Visa', '2021-09-07 12:31:59', 'A'),
(2, 'Cliente2', '12345', 'xxxxx', '0943836460', 'correo4@correo.com', '0943836478', 'Visa', '2021-09-07 12:31:59', 'A'),
(3, 'Cliente3', '12345', 'xxxxx', '0943836461', 'correo5@correo.com', '0943836478', 'Visa', '2021-09-07 12:31:59', 'X'),
(4, 'Cliente4', '12345', 'xxxxx', '0943836462', 'correo6@correo.com', '0943836478', 'Visa', '2021-09-07 12:31:59', 'P'),
(5, 'Cliente5', '12345', 'xxxxx', '0943836463', 'correo7@correo.com', '0943836478', 'Visa', '2021-09-07 12:31:59', 'A'),
(6, 'Cliente6', '12345', 'xxxxx', '0943836479', 'correo8@correo.com', '0943836478', 'Visa', '2021-09-07 12:31:59', 'X'),
(7, 'Cliente7', '12345', 'xxxxx', '0943836560', 'correo9@correo.com', '0943836478', 'Visa', '2021-09-07 12:31:59', 'P'),
(13, 'Cristhian Baidal', '12345', 'nueva direccion', '0943836477', 'cristhian@gmail.com', '0999999', 'Visa', '2021-09-13 19:11:11', 'A'),
(15, 'Cristhian12415', '12345', 'xxxxx', '0948787878', 'correo2@gmail.com', '025454545', 'MasterCard', '2021-09-14 20:13:57', 'A'),
(16, 'Cliente8', '12345', 'xxxxx', '094383555', 'correo12@correo.com', '0943836478', 'Visa', '2021-09-14 23:11:11', 'P'),
(17, 'Cliente9', '12345', 'xxxxx', '0943836666', 'correo13@correo.com', '0943836478', 'Visa', '2021-09-14 23:11:11', 'P'),
(18, 'Cliente10', '12345', 'xxxxx', '0943837777', 'correo14@correo.com', '0943836478', 'Visa', '2021-09-14 23:11:11', 'P'),
(19, 'Cliente11', '12345', 'xxxxx', '0943838888', 'correo16@correo.com', '0943836478', 'Visa', '2021-09-14 23:11:11', 'P'),
(20, 'Cliente12', '12345', 'xxxxx', '094389999', 'correo18@correo.com', '0943836478', 'Visa', '2021-09-14 23:11:11', 'P'),
(21, 'Cliente13', '12345', 'xxxxx', '094385455', 'correo20@correo.com', '0943836478', 'Visa', '2021-09-14 23:11:11', 'P'),
(22, 'Cliente14', '12345', 'xxxxx', '094387878745', 'correo21@correo.com', '0943836478', 'Visa', '2021-09-14 23:11:12', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `cod_empresa` int(11) NOT NULL,
  `nom_empresa` varchar(250) NOT NULL,
  `ruc` varchar(50) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `formas_pago` varchar(500) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `st_empresa` char(1) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`cod_empresa`, `nom_empresa`, `ruc`, `correo`, `telefono`, `direccion`, `formas_pago`, `tipo`, `created_at`, `created_by`, `edited_at`, `edited_by`, `st_empresa`) VALUES
(1, 'CorpNovus2', '08787878787', 'empresa@empresa.com', '464646', 'noguchi y la 20', 'MasterCard, Visa, PayPal', 2, '2021-08-29 22:11:22', 1, '2021-09-11 12:12:05', 1, 'A'),
(2, 'Nueva Empresa', '87848', 'empresa@empresa.com', '8484848', 'noguchi y la 20', 'PayPal, Tarjeta de Credito', 2, '2021-08-29 22:24:22', 2, NULL, NULL, 'P'),
(3, 'Empresa 1', '0121454545', 'empresa2@empresa.com', '0808080808', 'direccion x', 'Visa, PayPal, Tarjeta de Credito', 1, '2021-09-08 20:56:47', 5, NULL, NULL, 'A'),
(4, 'Empresa nueva1', '10164121611', 'empresa3@empresa.com', '08484848', 'nueva y', 'Visa, Tarjeta de Credito, Tarjeta de Débito', 1, '2021-09-08 21:08:12', 3, NULL, NULL, 'A'),
(5, 'Empresa nueva 3', '10062191878', 'empresa4@correo.com', '789787978', 'nueva z', 'Visa, Tarjeta de Credito, American Express', 1, '2021-09-08 21:13:16', 4, NULL, NULL, 'P'),
(6, 'Rosalia Corp', '10009663318', 'empresa5@correo.com', '08487887878', 'nueva xy', 'Visa, PayPal, Tarjeta de Credito, Tarjeta de Débito, American Express', 1, '2021-09-08 21:15:12', 6, NULL, NULL, 'P'),
(9, 'ComesticosCorps', '098484848', 'empresa@empresa.com', '084087878', 'noguchi y la 19', 'MasterCard, Visa', 1, '2021-09-11 14:35:37', 8, '2021-09-11 14:36:13', 8, 'A'),
(10, 'Nueva Empresa2', '08708748', 'correo@gmail.com', '15454878', 'xxxx', 'Visa, PayPal, Tarjeta de Débito', 1, '2021-09-14 18:43:49', 9, NULL, NULL, 'A'),
(11, 'NuevoNombre', '0974878787', 'empresa3@empresa.com', '4545457878', 'xxxxxx', 'MasterCard, Visa, PayPal', 1, '2021-09-14 21:04:22', 10, '2021-09-14 21:05:46', 10, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formas_pago`
--

CREATE TABLE `formas_pago` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Las formas de pagos existentes';

--
-- Volcado de datos para la tabla `formas_pago`
--

INSERT INTO `formas_pago` (`id`, `descripcion`) VALUES
(1, 'MasterCard'),
(2, 'Visa'),
(3, 'PayPal'),
(4, 'Tarjeta de Credito'),
(5, 'Tarjeta de Débito'),
(6, 'American Express');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `dias` varchar(250) NOT NULL,
  `horas` varchar(250) NOT NULL,
  `cod_empresa` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `dias`, `horas`, `cod_empresa`, `created_at`, `created_by`, `edited_at`, `edited_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Lunes,Martes,Miercoles', '10:30 AM  - 16:00 PM ', 1, '2021-08-29 22:11:22', 1, NULL, NULL, NULL, NULL),
(2, 'Lunes,Martes,Miercoles', '7:30 AM  - 20:00 PM ', 2, '2021-08-29 22:24:22', 2, NULL, NULL, NULL, NULL),
(3, 'Martes,Miercoles,Jueves,Viernes', '7:12 AM  - 20:12 PM ', 3, '2021-09-08 20:56:47', 5, NULL, NULL, NULL, NULL),
(4, 'Martes,Miercoles,Jueves', '13:50 PM  - 22:00 PM ', 4, '2021-09-08 21:08:12', 3, NULL, NULL, NULL, NULL),
(5, 'Martes,Miercoles,Jueves', '10:50 AM  - 20:00 PM ', 5, '2021-09-08 21:13:16', 4, NULL, NULL, NULL, NULL),
(6, 'Jueves,Viernes,Sabado,Domingo', '16:50 PM  - 23:00 PM ', 6, '2021-09-08 21:15:12', 6, NULL, NULL, NULL, NULL),
(7, 'Lunes,Martes,Miercoles,Jueves,Viernes', '10:50 AM  - 20:50 PM ', 7, '2021-09-11 14:30:38', 8, NULL, NULL, NULL, NULL),
(8, 'Lunes,Martes,Miercoles,Jueves,Viernes', '10:50 AM  - 20:00 PM ', 8, '2021-09-11 14:33:06', 8, NULL, NULL, NULL, NULL),
(9, 'Lunes,Martes,Miercoles,Jueves,Viernes', '8:00 AM  - 20:00 PM ', 9, '2021-09-11 14:35:37', 8, NULL, NULL, NULL, NULL),
(10, 'Martes,Miercoles,Jueves,Viernes', '7:50 AM  - 17:00 PM ', 10, '2021-09-14 18:43:50', 9, NULL, NULL, NULL, NULL),
(11, 'Lunes,Martes,Miercoles,Jueves,Viernes', '8:00 AM  - 17:00 PM ', 11, '2021-09-14 21:04:22', 10, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `cod_empresa` int(11) NOT NULL,
  `cod_repartidor` int(11) NOT NULL,
  `fecha_envio` datetime DEFAULT NULL,
  `fecha_cancelacion` datetime DEFAULT NULL,
  `precio` decimal(6,2) NOT NULL,
  `ganancia_repartidor` decimal(6,2) NOT NULL,
  `ganancia_empresa` decimal(6,2) NOT NULL,
  `ganancia_web` decimal(6,2) NOT NULL,
  `motivo_cancelacion` varchar(250) DEFAULT NULL,
  `st_pedido` char(1) NOT NULL DEFAULT 'P',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `producto`, `cliente`, `cod_empresa`, `cod_repartidor`, `fecha_envio`, `fecha_cancelacion`, `precio`, `ganancia_repartidor`, `ganancia_empresa`, `ganancia_web`, `motivo_cancelacion`, `st_pedido`, `created_at`, `created_by`, `edited_at`, `edited_by`) VALUES
(1, 3, 1, 1, 1, '2021-09-09 15:40:30', '2021-09-11 02:48:55', '10.56', '3.17', '6.33', '1.06', 'Falta información', 'X', '2021-09-09 21:40:52', 1, NULL, NULL),
(2, 5, 1, 1, 3, '2021-09-09 16:45:30', '2021-09-11 02:49:22', '200.00', '60.00', '120.00', '20.00', 'El cliente no puede adquirir nuestros productos. Se procedera a betarlo del sistema.', 'F', '2021-09-09 21:40:52', 1, NULL, NULL),
(3, 6, 1, 3, 3, '2021-09-09 16:45:30', '2021-09-10 15:40:30', '50.00', '15.00', '30.00', '5.00', 'Solicito la cancelación del pedido pues El sistema me vendió algo que no deseaba', 'A', '2021-09-09 21:40:52', 1, NULL, NULL),
(4, 3, 5, 1, 1, '2021-09-09 16:45:30', NULL, '10.56', '3.17', '6.33', '1.06', NULL, 'P', '2021-09-09 21:40:52', 5, NULL, NULL),
(5, 5, 5, 1, 3, '2021-09-09 16:45:30', NULL, '200.00', '60.00', '120.00', '20.00', NULL, 'P', '2021-09-09 21:40:52', 5, NULL, NULL),
(6, 6, 5, 3, 1, '2021-09-09 15:40:30', '2021-09-11 02:44:19', '50.00', '15.00', '30.00', '5.00', 'Falta información', 'X', '2021-09-09 21:40:52', 5, NULL, NULL),
(7, 3, 1, 1, 1, '2021-09-10 15:40:30', '2021-09-11 10:40:30', '10.56', '3.17', '6.33', '1.06', 'Solicito la cancelación del pedido porque cambie de opinion y no me gusta', 'C', '2021-09-09 21:41:29', 1, NULL, NULL),
(8, 3, 1, 1, 1, '2021-09-10 15:40:30', NULL, '10.56', '3.17', '6.33', '1.06', NULL, 'F', '2021-09-14 23:02:37', 1, NULL, NULL),
(9, 5, 1, 1, 3, '2021-09-09 16:45:30', NULL, '200.00', '60.00', '120.00', '20.00', NULL, 'F', '2021-09-14 23:02:37', 1, NULL, NULL),
(10, 6, 1, 3, 3, '2021-09-09 16:45:30', NULL, '50.00', '15.00', '30.00', '5.00', NULL, 'F', '2021-09-14 23:02:37', 1, NULL, NULL),
(11, 3, 5, 1, 1, '2021-09-09 16:45:30', NULL, '10.56', '3.17', '6.33', '1.06', NULL, 'F', '2021-09-14 23:02:37', 5, NULL, NULL),
(12, 5, 5, 1, 3, '2021-09-09 16:45:30', NULL, '200.00', '60.00', '120.00', '20.00', NULL, 'F', '2021-09-14 23:02:37', 5, NULL, NULL),
(13, 6, 5, 3, 1, '2021-09-09 15:40:30', NULL, '50.00', '15.00', '30.00', '5.00', NULL, 'F', '2021-09-14 23:02:37', 5, NULL, NULL),
(14, 3, 1, 1, 1, '2021-09-10 15:40:30', NULL, '10.56', '3.17', '6.33', '1.06', NULL, 'P', '2021-09-14 23:19:42', 1, NULL, NULL),
(15, 5, 1, 1, 3, '2021-09-09 16:45:30', NULL, '200.00', '60.00', '120.00', '20.00', NULL, 'P', '2021-09-14 23:19:42', 1, NULL, NULL),
(16, 6, 1, 3, 3, '2021-09-09 16:45:30', NULL, '50.00', '15.00', '30.00', '5.00', NULL, 'P', '2021-09-14 23:19:42', 1, NULL, NULL),
(17, 3, 5, 1, 1, '2021-09-09 16:45:30', '2021-09-14 23:21:20', '10.56', '3.17', '6.33', '1.06', 'Falta informacion', 'C', '2021-09-14 23:19:42', 5, NULL, NULL),
(18, 5, 5, 1, 3, '2021-09-09 16:45:30', '2021-09-14 23:21:20', '200.00', '60.00', '120.00', '20.00', 'Falta informacion', 'C', '2021-09-14 23:19:42', 5, NULL, NULL),
(19, 6, 5, 3, 1, '2021-09-09 15:40:30', '2021-09-14 23:21:20', '50.00', '15.00', '30.00', '5.00', 'Falta informacion', 'C', '2021-09-14 23:19:42', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nom_producto` varchar(500) NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  `precio` decimal(6,2) NOT NULL,
  `disponibilidad` int(11) NOT NULL,
  `ofertas` int(11) NOT NULL,
  `cod_empresa` int(11) NOT NULL,
  `st_producto` char(1) NOT NULL DEFAULT 'P',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `edited_at` datetime DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nom_producto`, `categoria`, `precio`, `disponibilidad`, `ofertas`, `cod_empresa`, `st_producto`, `created_at`, `created_by`, `edited_at`, `edited_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Mainboard', 1, '52.00', 50, 12, 1, 'X', '2021-08-29 22:14:49', 1, '2021-09-11 00:23:48', 1, '2021-09-09 00:28:44', 1),
(2, 'Silla', 1, '50.00', 50, 10, 1, 'X', '2021-08-29 22:15:36', 1, NULL, NULL, '2021-09-09 00:28:50', 1),
(3, 'Silla3', 1, '12.00', 12, 12, 1, 'X', '2021-09-05 23:58:47', 1, '2021-09-14 21:02:57', 1, '2021-09-14 21:50:30', 1),
(4, 'Zapatos Nike', 3, '50.00', 200, 10, 1, 'A', '2021-09-09 02:20:09', 1, NULL, NULL, NULL, NULL),
(5, 'Cama', 2, '200.00', 500, 0, 1, 'A', '2021-09-09 02:20:20', 1, NULL, NULL, NULL, NULL),
(6, 'Nueva Silla', 1, '50.00', 500, 0, 3, 'A', '2021-09-09 02:41:37', 5, NULL, NULL, NULL, NULL),
(7, 'Modular', 4, '50.00', 500, 0, 3, 'P', '2021-09-11 03:31:27', 5, NULL, NULL, NULL, NULL),
(8, 'Maquillaje', 1, '50.00', 500, 0, 9, 'A', '2021-09-11 14:36:50', 8, '2021-09-11 21:28:46', 8, NULL, NULL),
(9, 'Maquillaje 2', 3, '20.00', 500, 10, 9, 'A', '2021-09-11 14:37:08', 8, NULL, NULL, NULL, NULL),
(10, 'Silla3', 1, '50.00', 50, 0, 9, 'A', '2021-09-11 21:29:08', 8, NULL, NULL, NULL, NULL),
(11, 'Collar Perrito', 7, '50.00', 500, 0, 1, 'A', '2021-09-14 01:35:18', 1, NULL, NULL, NULL, NULL),
(12, 'Guitarra', 6, '200.00', 500, 0, 1, 'A', '2021-09-14 01:35:29', 1, NULL, NULL, NULL, NULL),
(13, 'Sillon', 4, '200.00', 5000, 50, 1, 'A', '2021-09-14 01:35:42', 1, NULL, NULL, NULL, NULL),
(14, 'Collar', 7, '50.00', 200, 0, 10, 'A', '2021-09-14 18:44:48', 9, NULL, NULL, NULL, NULL),
(15, 'Casa', 2, '2000.00', 30, 50, 10, 'A', '2021-09-14 18:45:00', 9, NULL, NULL, NULL, NULL),
(16, 'adasdas', 2, '50.00', 500, 50, 1, 'A', '2021-09-14 20:17:26', 1, '2021-09-14 21:50:36', 1, NULL, NULL),
(17, 'Escritori02', 7, '50.00', 500, 0, 11, 'P', '2021-09-14 21:06:59', 10, '2021-09-14 21:07:25', 10, NULL, NULL),
(18, 'Save CMS Producto1', 1, '50.00', 50, 0, 4, 'P', '2021-09-14 23:15:53', 3, NULL, NULL, NULL, NULL),
(19, 'Mainboard', 5, '150.00', 500, 0, 4, 'P', '2021-09-14 23:16:10', 3, NULL, NULL, NULL, NULL),
(20, 'Meseta', 4, '20.00', 500, 0, 4, 'P', '2021-09-14 23:16:21', 3, NULL, NULL, NULL, NULL),
(21, 'Cama para perro', 7, '50.00', 500, 0, 4, 'P', '2021-09-14 23:16:33', 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidores`
--

CREATE TABLE `repartidores` (
  `cod_repartidor` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `RUC` varchar(45) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `horario_disponible` varchar(999) NOT NULL,
  `medio_transporte` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `st_repartidor` char(1) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `repartidores`
--

INSERT INTO `repartidores` (`cod_repartidor`, `cod_usuario`, `nombres`, `RUC`, `correo`, `telefono`, `horario_disponible`, `medio_transporte`, `created_at`, `st_repartidor`) VALUES
(1, 0, 'Repartidor', '10164120517', 'repartidor@correo.com', '0947787878', 'Lunes-viernes;8:00AM-16:00PM', 'Moto', '2021-09-08 00:46:07', 'A'),
(2, 0, 'Repartidor1', '10164090588', 'repartidor1@correo.com', '0947787878', 'Lunes-viernes;9:00AM-17:00PM', 'Camión', '2021-09-08 00:46:07', 'X'),
(3, 0, 'Repartidor2', '10164121611', 'repartidor2@correo.com', '0947787878', 'Lunes-viernes;10:00AM-18:00PM', 'Automóvil', '2021-09-08 00:46:07', 'A'),
(4, 0, 'Repartidor3', '10164181826', 'repartidor3@correo.com', '0947787878', 'Lunes-viernes;11:00AM-19:00PM', 'Moto', '2021-09-08 00:46:07', 'X'),
(5, 0, 'Repartidor4', '10062191878', 'repartidor4@correo.com', '0947787878', 'Lunes-viernes;12:00AM-20:00PM', 'Automóvil', '2021-09-08 00:46:07', 'X'),
(6, 0, 'Repartidor5', '10164767421', 'repartidor5@correo.com', '0947787878', 'Lunes-viernes;13:00PM-21:00PM', 'Camión', '2021-09-08 00:46:07', 'X'),
(8, 0, 'Repartidor6', '20395051939', 'repartidor6@correo.com', '0947787878', 'Lunes-viernes;8:00AM-16:00PM', 'Moto', '2021-09-08 00:47:01', 'P'),
(10, 0, 'Repartidor', '101641205172', 'repartidor@correo.com', '0947787878', 'Lunes-viernes;8:00AM-16:00PM', 'Moto', '2021-09-14 23:23:22', 'P'),
(11, 0, 'Repartidor3', '101640905882', 'repartidor1@correo.com', '0947787878', 'Lunes-viernes;9:00AM-17:00PM', 'Camión', '2021-09-14 23:23:22', 'P'),
(12, 0, 'Repartidor9', '101641216131', 'repartidor2@correo.com', '0947787878', 'Lunes-viernes;10:00AM-18:00PM', 'Automóvil', '2021-09-14 23:23:22', 'P'),
(13, 0, 'Repartidor10', '101641841826', 'repartidor3@correo.com', '0947787878', 'Lunes-viernes;11:00AM-19:00PM', 'Moto', '2021-09-14 23:23:23', 'P'),
(14, 0, 'Repartidor11', '100621591878', 'repartidor4@correo.com', '0947787878', 'Lunes-viernes;12:00AM-20:00PM', 'Automóvil', '2021-09-14 23:23:23', 'P'),
(15, 0, 'Repartidor12', '10162767421', 'repartidor5@correo.com', '0947787878', 'Lunes-viernes;13:00PM-21:00PM', 'Camión', '2021-09-14 23:23:23', 'P'),
(16, 0, 'Repartidor13', '203954051939', 'repartidor6@correo.com', '0947787878', 'Lunes-viernes;8:00AM-16:00PM', 'Moto', '2021-09-14 23:23:23', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resenia_clientes`
--

CREATE TABLE `resenia_clientes` (
  `id` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `estrellas` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empresa`
--

CREATE TABLE `tipo_empresa` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_empresa`
--

INSERT INTO `tipo_empresa` (`id`, `descripcion`) VALUES
(1, 'Pública'),
(2, 'Privada'),
(3, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cod_empresa` int(11) DEFAULT NULL,
  `tipo_usuario` char(1) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de usuarios registrados';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `cod_empresa`, `tipo_usuario`, `created_at`) VALUES
(1, 'prueba', 'prueba@gmail.com', '12345', 1, 'E', '2021-08-28 12:04:00'),
(2, 'daniela', 'daniela@gmail.com', '12345', NULL, 'A', '2021-08-28 12:05:55'),
(3, 'dayan', 'dayan@correo.com', '12345', 4, 'E', '2021-09-08 20:55:27'),
(4, 'felipe', 'felipe@correo.com', '12345', 5, 'E', '2021-09-08 20:55:27'),
(5, 'cesar', 'cesar@correo.com', '12345', 3, 'E', '2021-09-08 20:55:27'),
(6, 'rosalia', 'rosalia@correo.com', '12345', 6, 'E', '2021-09-08 20:55:27'),
(8, 'anny', 'anny@correo.com', '12345', 9, 'E', '2021-09-11 14:29:38'),
(9, 'romaria', 'romaria@correo.com', '12345', 10, 'E', '2021-09-14 18:42:41'),
(10, 'josefa', 'josefa@correo.com', '12345', 11, 'E', '2021-09-14 21:03:18'),
(11, 'prueba2', 'prueba2@correo.com', '12345', NULL, 'E', '2021-09-14 23:00:18'),
(12, 'prueba3', 'prueba3@correo.com', '12345', NULL, 'E', '2021-09-14 23:05:56'),
(13, 'prueba4', 'prueba4@correo.com', '12345', NULL, 'E', '2021-09-14 23:07:37'),
(14, 'prueba5', 'prueba5@correo.com', '12345', NULL, 'E', '2021-09-14 23:07:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD UNIQUE KEY `identificacion` (`identificacion`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`cod_empresa`);

--
-- Indices de la tabla `formas_pago`
--
ALTER TABLE `formas_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `repartidores`
--
ALTER TABLE `repartidores`
  ADD PRIMARY KEY (`cod_repartidor`),
  ADD UNIQUE KEY `RUC` (`RUC`);

--
-- Indices de la tabla `resenia_clientes`
--
ALTER TABLE `resenia_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_empresa`
--
ALTER TABLE `tipo_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `cod_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `formas_pago`
--
ALTER TABLE `formas_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `repartidores`
--
ALTER TABLE `repartidores`
  MODIFY `cod_repartidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `resenia_clientes`
--
ALTER TABLE `resenia_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_empresa`
--
ALTER TABLE `tipo_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
