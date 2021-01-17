-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2020 a las 22:21:02
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `envios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id_banco` int(11) NOT NULL,
  `tipo_banco` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`id_banco`, `tipo_banco`) VALUES
(1, 'Banesco'),
(2, 'Mercantil'),
(4, 'Activo'),
(5, 'Agricola d'),
(6, 'Bancamiga'),
(7, 'Bancrecer'),
(8, 'Banorte'),
(9, 'Banplus'),
(10, 'BFC Fondo '),
(11, 'Bicentenar'),
(12, 'Bangente'),
(13, 'Caroni '),
(15, 'Central de'),
(16, 'Citibank N'),
(17, 'De la Fuer'),
(18, 'Del Caribe'),
(19, 'Del Sur'),
(20, 'Espirito S'),
(21, 'Exterior'),
(22, 'Guayana'),
(23, 'Instituto '),
(24, 'Internacio'),
(25, 'Mi, Desarr'),
(26, 'Nacional d'),
(27, 'Occidental'),
(28, 'Plaza'),
(29, 'Provincial'),
(30, 'Sofitasa'),
(31, 'Tesoro'),
(32, 'Venezuela'),
(33, 'Venezolano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `nombre_cliente` varchar(20) DEFAULT NULL,
  `apellido_cliente` varchar(20) DEFAULT NULL,
  `telefono_cliente` int(11) DEFAULT NULL,
  `dni` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `codigo`, `nombre_cliente`, `apellido_cliente`, `telefono_cliente`, `dni`) VALUES
(1, 'A', 'prueba', '', 111, 94451541);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_tipo_banco` int(11) DEFAULT NULL,
  `num_cuenta` varchar(255) DEFAULT NULL,
  `nombre_titular_cuenta` varchar(20) DEFAULT NULL,
  `apellido_titular_cuenta` varchar(20) DEFAULT NULL,
  `cedula_titular_cuenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `id_cliente`, `id_tipo_banco`, `num_cuenta`, `nombre_titular_cuenta`, `apellido_titular_cuenta`, `cedula_titular_cuenta`) VALUES
(1, 1, 1, '01080106130100155539', 'Prueba', 's/n', 19466295);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(11) NOT NULL,
  `fecha_gasto` date DEFAULT NULL,
  `importe_gasto` int(11) DEFAULT NULL,
  `motivo_gasto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios_de_pago`
--

CREATE TABLE `medios_de_pago` (
  `id_medios_de_pago` int(11) NOT NULL,
  `medio_de_pago` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medios_de_pago`
--

INSERT INTO `medios_de_pago` (`id_medios_de_pago`, `medio_de_pago`) VALUES
(1, 'UALA'),
(2, 'MERCADO PAGO'),
(3, 'SANTANDER'),
(4, 'BBVA'),
(5, 'EFECTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasa`
--

CREATE TABLE `tasa` (
  `id` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tasa`
--

INSERT INTO `tasa` (`id`, `valor`) VALUES
(1, 1600),
(2, 1680),
(3, 1700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencias`
--

CREATE TABLE `transferencias` (
  `id_transferencia` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `importe_titular` int(11) DEFAULT NULL,
  `id_cuenta_destino` int(11) DEFAULT NULL,
  `importe_cliente` int(11) DEFAULT NULL,
  `id_medio_pago_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `cargo` varchar(1) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `cargo`, `clave`) VALUES
(0, 'admin', 'infocompucol@gmail.com', '1', '220f7a516efaa19500349b6917dfddab');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id_banco`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD KEY `fk_cliente_id` (`id_cliente`),
  ADD KEY `fk_banco_id` (`id_tipo_banco`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `medios_de_pago`
--
ALTER TABLE `medios_de_pago`
  ADD PRIMARY KEY (`id_medios_de_pago`);

--
-- Indices de la tabla `tasa`
--
ALTER TABLE `tasa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transferencias`
--
ALTER TABLE `transferencias`
  ADD PRIMARY KEY (`id_transferencia`),
  ADD KEY `fk_cuenta_id` (`id_cuenta_destino`),
  ADD KEY `fk_medios_de_pago_id` (`id_medio_pago_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tasa`
--
ALTER TABLE `tasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transferencias`
--
ALTER TABLE `transferencias`
  MODIFY `id_transferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `fk_banco_id` FOREIGN KEY (`id_tipo_banco`) REFERENCES `banco` (`id_banco`),
  ADD CONSTRAINT `fk_cliente_id` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `transferencias`
--
ALTER TABLE `transferencias`
  ADD CONSTRAINT `fk_cuenta_id` FOREIGN KEY (`id_cuenta_destino`) REFERENCES `cuenta` (`id_cuenta`),
  ADD CONSTRAINT `fk_medios_de_pago_id` FOREIGN KEY (`id_medio_pago_cliente`) REFERENCES `medios_de_pago` (`id_medios_de_pago`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
