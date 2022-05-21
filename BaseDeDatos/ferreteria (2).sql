-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2022 a las 09:35:48
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ferreteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio` int(10) NOT NULL,
  `id_provedor` int(11) NOT NULL,
  `unidades` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `id_provedor`, `unidades`) VALUES
(1, 'Martillo', 100, 1, 17),
(2, 'Paq 50piezas Tornillos 5mm', 150, 2, 35),
(3, 'Cruzeta', 250, 4, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE `provedores` (
  `id_provedor` int(10) NOT NULL,
  `empresa` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `producto_id` int(10) NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`id_provedor`, `empresa`, `direccion`, `correo`, `producto_id`, `telefono`) VALUES
(1, 'heltek', 'Av.Israel Cavazos #1237', 'heltek@gmail.com', 1, '8123095531'),
(2, 'truper', 'Av.Madero #2345', 'truper23@gmail.com', 2, '8123094462'),
(3, 'Xokas', 'Av.Industrial #2456', 'IntXokas@gmail.com', 2, '8123094462');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(50) NOT NULL,
  `producto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `precio` int(10) NOT NULL,
  `Compra_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `producto`, `producto_id`, `cantidad`, `precio`, `Compra_total`) VALUES
(1, 'Martillo', 1, 8, 100, 800),
(2, 'Paq 50piezas Tornillos 5mm', 2, 4, 150, 600);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD PRIMARY KEY (`id_provedor`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD CONSTRAINT `provedores_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
