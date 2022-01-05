-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-01-2022 a las 21:53:55
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(8) NOT NULL,
  `nombre_producto` varchar(250) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `precio` int(8) DEFAULT NULL,
  `peso` int(4) DEFAULT NULL,
  `categoria` varchar(250) DEFAULT NULL,
  `stock` int(8) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha_creacion`) VALUES
(1, 'Chocolatinas', '999', 500, 1000, 'Dulces', 685, '2022-01-05'),
(2, 'Chocolate libra', 'yrtg', 5000, 500, 'Otros', 198, '2022-01-05'),
(3, 'Mantequilla', 'urt5', 7000, 500, 'Otros', 94, '2022-01-05'),
(4, 'Galletas', '436e', 1200, 200, 'Panadería', 193, '2022-01-05'),
(5, 'Tinto', '5tr', 500, 50, 'Bebidas frías o calientes', 100, '2022-01-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_productos`
--

CREATE TABLE `venta_productos` (
  `id` int(8) NOT NULL,
  `id_producto` int(8) DEFAULT NULL,
  `cantidad_venta` int(8) DEFAULT NULL,
  `valor_total` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta_productos`
--

INSERT INTO `venta_productos` (`id`, `id_producto`, `cantidad_venta`, `valor_total`) VALUES
(1, 1, 8, 4000),
(2, 2, 2, 10000),
(3, 3, 1, 7000),
(4, 4, 4, 4800),
(5, 5, 12, 6000),
(6, 4, 3, 3600),
(7, 3, 5, 35000),
(8, 1, 7, 3500),
(9, 5, 8, 4000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
