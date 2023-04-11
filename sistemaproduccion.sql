-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2023 a las 15:25:02
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaproduccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idArticulo` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idArticulo`, `descripcion`, `nivel`) VALUES
(1, 'Sint. Azul Marino', 39000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleformula`
--

CREATE TABLE `detalleformula` (
  `id` int(11) NOT NULL,
  `detalle` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalleformula`
--

INSERT INTO `detalleformula` (`id`, `detalle`, `nivel`) VALUES
(1, 'G 331', 39001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idemple` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idemple`, `nombre`) VALUES
(1, 'Alejo'),
(2, 'Tute'),
(3, 'Laura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formula`
--

CREATE TABLE `formula` (
  `id` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `idMaterial` int(11) NOT NULL,
  `idDetalle` int(11) NOT NULL,
  `solido` float NOT NULL,
  `densidad` float NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `formula`
--

INSERT INTO `formula` (`id`, `idArticulo`, `idMaterial`, `idDetalle`, `solido`, `densidad`, `cantidad`) VALUES
(1, 1, 1, 1, 3, 0.95, 180),
(2, 1, 2, 1, 2, 0.924, 65),
(3, 1, 3, 1, 1, 0.927, 0),
(4, 1, 4, 1, 1.2, 1.78, 0),
(5, 1, 5, 1, 7.1, 0.774, 20),
(6, 1, 6, 1, 9, 0.91, 5),
(7, 1, 7, 1, 4, 0.92, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `costo` float NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `indiceAcidez` int(11) NOT NULL,
  `indiceIodo` int(11) NOT NULL,
  `absorcionAceite` int(11) NOT NULL,
  `puntoAblandamiento` int(11) NOT NULL,
  `puntoFusion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `costo`, `descripcion`, `indiceAcidez`, `indiceIodo`, `absorcionAceite`, `puntoAblandamiento`, `puntoFusion`) VALUES
(1, 1.44, 'RESINA G 331', 0, 0, 0, 0, 0),
(2, 4.13, 'PIGMENTO SINT. AZUL ROJIS', 0, 0, 0, 0, 0),
(3, 3, 'PIGMENTO SINT. NEGRO     ', 0, 0, 0, 0, 0),
(4, 3, 'PIGMENTO SINT. BLANCO', 0, 0, 0, 0, 0),
(5, 1, 'AGUARRAS  PESADO', 0, 0, 0, 0, 0),
(6, 3, 'TRIMETAL', 0, 0, 0, 0, 0),
(7, 3, 'ANTICAPA                 ', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenproduccion`
--

CREATE TABLE `ordenproduccion` (
  `id` int(11) NOT NULL,
  `prioridad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idSector` int(11) NOT NULL,
  `operacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEntrega` date NOT NULL,
  `material` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tapaColor` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ordenproduccion`
--

INSERT INTO `ordenproduccion` (`id`, `prioridad`, `idSector`, `operacion`, `fechaEntrega`, `material`, `color`, `tipo`, `marca`, `tapaColor`) VALUES
(1, 'normal', 3, 'Recuperado', '2023-02-28', 'Plastico', '#ffffff', 'Tambor', 'Full Paint', '#ffdd00'),
(3, 'urgente', 1, 'Elaboracion', '2023-02-16', 'Metal', '#ff0000', 'Balde', 'Alejo', '#ff0000'),
(4, 'urgente', 1, 'Fraccionado', '2023-02-01', 'Metal', '#000000', 'Pallet', 'Pinturas Misioneras', '#098500'),
(8, 'normal', 6, 'Elaboracion', '2022-03-30', 'Plastico', '#000000', 'Balde', 'Coca Cola', '#ff0000'),
(9, 'urgente', 7, 'Recuperado', '2023-03-06', 'Metal', '#ff0000', 'Balde', 'Pinturas Misioneras', '#ffffff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renglonajuste`
--

CREATE TABLE `renglonajuste` (
  `id` int(11) NOT NULL,
  `viscocidad_c` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `brillo_c` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cubritivo_c` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `secado_c` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `solidos_c` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `color_c` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `molienda_c` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `total_c` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_ordenproduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `renglonajuste`
--

INSERT INTO `renglonajuste` (`id`, `viscocidad_c`, `brillo_c`, `cubritivo_c`, `secado_c`, `solidos_c`, `color_c`, `molienda_c`, `total_c`, `id_empleado`, `id_ordenproduccion`) VALUES
(2, '||', '', '|', '', '', '', '', '|||', 1, 3),
(6, '|', '||', '|||', '', '', '', '|', '|', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rengloncontrol`
--

CREATE TABLE `rengloncontrol` (
  `id` int(11) NOT NULL,
  `inicio` time DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fin` time DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_ordenproduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rengloncontrol`
--

INSERT INTO `rengloncontrol` (`id`, `inicio`, `fecha_inicio`, `fin`, `fecha_fin`, `id_empleado`, `id_ordenproduccion`) VALUES
(1, '12:20:00', '2023-03-08', '06:20:00', '2023-03-10', 2, 3),
(4, '12:40:00', '2023-03-08', '14:40:00', '2023-03-10', 2, 9),
(5, '12:40:00', '2023-03-08', '13:40:00', '2023-03-09', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rengloncontrolfinal`
--

CREATE TABLE `rengloncontrolfinal` (
  `id` int(11) NOT NULL,
  `inicio` time DEFAULT NULL,
  `fin` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `presentacion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `entregado` int(11) DEFAULT NULL,
  `corregido` int(11) DEFAULT NULL,
  `perdido` int(11) DEFAULT NULL,
  `litrosOkg` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_ordenproduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rengloncontrolfinal`
--

INSERT INTO `rengloncontrolfinal` (`id`, `inicio`, `fin`, `fecha`, `presentacion`, `entregado`, `corregido`, `perdido`, `litrosOkg`, `id_empleado`, `id_ordenproduccion`) VALUES
(3, '13:00:00', '13:05:00', '2022-12-19', 'bbbb', 1000, 2, 1, 'Total', 3, 3),
(4, '12:54:00', '14:54:00', '2023-03-21', 'aaa', 500, 3, 2, 'Total', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renglonelaboracion`
--

CREATE TABLE `renglonelaboracion` (
  `id` int(11) NOT NULL,
  `inicio` time DEFAULT NULL,
  `fin` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_ordenproduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `renglonelaboracion`
--

INSERT INTO `renglonelaboracion` (`id`, `inicio`, `fin`, `fecha`, `id_empleado`, `id_ordenproduccion`) VALUES
(3, '06:12:00', '12:12:00', '2023-03-09', 3, 9),
(6, '14:06:00', '15:06:00', '2023-03-07', 3, 3),
(9, '13:00:00', '15:30:00', '2023-03-08', 1, 3),
(12, '19:00:00', '20:30:00', '2023-03-08', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renglonenvasado`
--

CREATE TABLE `renglonenvasado` (
  `id` int(11) NOT NULL,
  `inicio` time DEFAULT NULL,
  `fin` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_ordenproduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `renglonenvasado`
--

INSERT INTO `renglonenvasado` (`id`, `inicio`, `fin`, `fecha`, `id_empleado`, `id_ordenproduccion`) VALUES
(5, '10:30:00', '11:35:00', '2023-03-22', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renglonespecificaciones`
--

CREATE TABLE `renglonespecificaciones` (
  `id` int(11) NOT NULL,
  `viscocidad` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `viscocidad_2` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `brillo` int(11) DEFAULT NULL,
  `solidos` int(11) DEFAULT NULL,
  `densidad` int(11) DEFAULT NULL,
  `ablandamiento` int(11) DEFAULT NULL,
  `acidez` int(11) DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_ordenproduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `renglonespecificaciones`
--

INSERT INTO `renglonespecificaciones` (`id`, `viscocidad`, `viscocidad_2`, `brillo`, `solidos`, `densidad`, `ablandamiento`, `acidez`, `id_empleado`, `id_ordenproduccion`) VALUES
(3, '2\'15\'\'', '', 90, 0, 2, 0, 0, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renglonetiquetado`
--

CREATE TABLE `renglonetiquetado` (
  `id` int(11) NOT NULL,
  `inicio` time DEFAULT NULL,
  `fin` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_ordenproduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `renglonetiquetado`
--

INSERT INTO `renglonetiquetado` (`id`, `inicio`, `fin`, `fecha`, `id_empleado`, `id_ordenproduccion`) VALUES
(2, '10:25:00', '13:25:00', '2023-03-21', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `nombre`) VALUES
(1, 'M. Prima'),
(3, 'Latex'),
(4, 'Sintetico'),
(5, 'Diluyente'),
(6, 'Molienda'),
(7, 'Resina');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indices de la tabla `detalleformula`
--
ALTER TABLE `detalleformula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idemple`);

--
-- Indices de la tabla `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idArticulo` (`idArticulo`),
  ADD KEY `idDetalle` (`idDetalle`),
  ADD KEY `idMaterial` (`idMaterial`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenproduccion`
--
ALTER TABLE `ordenproduccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSector` (`idSector`);

--
-- Indices de la tabla `renglonajuste`
--
ALTER TABLE `renglonajuste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_ordenproduccion` (`id_ordenproduccion`);

--
-- Indices de la tabla `rengloncontrol`
--
ALTER TABLE `rengloncontrol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_ordenproduccion` (`id_ordenproduccion`);

--
-- Indices de la tabla `rengloncontrolfinal`
--
ALTER TABLE `rengloncontrolfinal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_ordenproduccion` (`id_ordenproduccion`);

--
-- Indices de la tabla `renglonelaboracion`
--
ALTER TABLE `renglonelaboracion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_ordenproduccion` (`id_ordenproduccion`);

--
-- Indices de la tabla `renglonenvasado`
--
ALTER TABLE `renglonenvasado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_ordenproduccion` (`id_ordenproduccion`);

--
-- Indices de la tabla `renglonespecificaciones`
--
ALTER TABLE `renglonespecificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_ordenproduccion` (`id_ordenproduccion`);

--
-- Indices de la tabla `renglonetiquetado`
--
ALTER TABLE `renglonetiquetado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_ordenproduccion` (`id_ordenproduccion`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleformula`
--
ALTER TABLE `detalleformula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idemple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `formula`
--
ALTER TABLE `formula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ordenproduccion`
--
ALTER TABLE `ordenproduccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `renglonajuste`
--
ALTER TABLE `renglonajuste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rengloncontrol`
--
ALTER TABLE `rengloncontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rengloncontrolfinal`
--
ALTER TABLE `rengloncontrolfinal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `renglonelaboracion`
--
ALTER TABLE `renglonelaboracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `renglonenvasado`
--
ALTER TABLE `renglonenvasado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `renglonespecificaciones`
--
ALTER TABLE `renglonespecificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `renglonetiquetado`
--
ALTER TABLE `renglonetiquetado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `formula`
--
ALTER TABLE `formula`
  ADD CONSTRAINT `formula_ibfk_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formula_ibfk_2` FOREIGN KEY (`idDetalle`) REFERENCES `detalleformula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formula_ibfk_3` FOREIGN KEY (`idMaterial`) REFERENCES `material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenproduccion`
--
ALTER TABLE `ordenproduccion`
  ADD CONSTRAINT `ordenproduccion_ibfk_1` FOREIGN KEY (`idSector`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `renglonajuste`
--
ALTER TABLE `renglonajuste`
  ADD CONSTRAINT `renglonajuste_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`idemple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `renglonajuste_ibfk_2` FOREIGN KEY (`id_ordenproduccion`) REFERENCES `ordenproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rengloncontrol`
--
ALTER TABLE `rengloncontrol`
  ADD CONSTRAINT `rengloncontrol_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`idemple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rengloncontrol_ibfk_2` FOREIGN KEY (`id_ordenproduccion`) REFERENCES `ordenproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rengloncontrolfinal`
--
ALTER TABLE `rengloncontrolfinal`
  ADD CONSTRAINT `rengloncontrolfinal_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`idemple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rengloncontrolfinal_ibfk_2` FOREIGN KEY (`id_ordenproduccion`) REFERENCES `ordenproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `renglonelaboracion`
--
ALTER TABLE `renglonelaboracion`
  ADD CONSTRAINT `renglonelaboracion_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`idemple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `renglonelaboracion_ibfk_2` FOREIGN KEY (`id_ordenproduccion`) REFERENCES `ordenproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `renglonenvasado`
--
ALTER TABLE `renglonenvasado`
  ADD CONSTRAINT `renglonenvasado_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`idemple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `renglonenvasado_ibfk_2` FOREIGN KEY (`id_ordenproduccion`) REFERENCES `ordenproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `renglonespecificaciones`
--
ALTER TABLE `renglonespecificaciones`
  ADD CONSTRAINT `renglonespecificaciones_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`idemple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `renglonespecificaciones_ibfk_2` FOREIGN KEY (`id_ordenproduccion`) REFERENCES `ordenproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `renglonetiquetado`
--
ALTER TABLE `renglonetiquetado`
  ADD CONSTRAINT `renglonetiquetado_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`idemple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `renglonetiquetado_ibfk_2` FOREIGN KEY (`id_ordenproduccion`) REFERENCES `ordenproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
