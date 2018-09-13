-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2018 a las 20:12:44
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis_jose`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codigo_articulo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `automovil`
--

CREATE TABLE `automovil` (
  `id_automovil` int(11) NOT NULL,
  `chapa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `anho` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_marca` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `automovil`
--

INSERT INTO `automovil` (`id_automovil`, `chapa`, `id_modelo`, `anho`, `id_marca`, `activo`) VALUES
(1, '192 nb', 2, '2015', 2, 1),
(2, '111 chk', 1, '2006', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `codigo_cliente` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `automovil` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codigo_cliente`, `nombre`, `apellido`, `cedula`, `telefono`, `correo`, `automovil`) VALUES
(1, 'Luis', 'Arandi', 123456, '987654', 'luis@luis.com', 'toyota IST 2015'),
(2, 'Osvaldo', 'Soto', 789654, '123456', 'osvaldo@osvaldo.com', 'MUNSTANG GT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_atendidos`
--

CREATE TABLE `clientes_atendidos` (
  `codigo_clientes_atendidos` int(11) NOT NULL,
  `codigo_servicio` int(11) NOT NULL,
  `codigo_cliente` int(11) NOT NULL,
  `tiempo` datetime NOT NULL,
  `tiempo_adicional` datetime DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_automoviles`
--

CREATE TABLE `clientes_automoviles` (
  `id_cliente_automovil` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_automovil` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes_automoviles`
--

INSERT INTO `clientes_automoviles` (`id_cliente_automovil`, `id_cliente`, `id_automovil`, `activo`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_en_espera`
--

CREATE TABLE `clientes_en_espera` (
  `codigo_cliente_en_espera` int(11) NOT NULL,
  `codigo_cliente` int(11) NOT NULL,
  `codigo_servicio` int(11) NOT NULL,
  `boleta` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo` time NOT NULL,
  `tiempo_adicional` time DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes_en_espera`
--

INSERT INTO `clientes_en_espera` (`codigo_cliente_en_espera`, `codigo_cliente`, `codigo_servicio`, `boleta`, `tiempo`, `tiempo_adicional`, `fecha`, `estado`) VALUES
(6, 1, 1, '', '00:02:30', NULL, '2018-09-04 20:14:36', 'A'),
(7, 1, 2, '', '00:20:30', NULL, '2018-09-04 20:14:38', 'A'),
(8, 2, 1, '', '00:20:30', NULL, '2018-09-04 20:17:58', 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_servicio`
--

CREATE TABLE `detalle_servicio` (
  `codigo_detalle_servicio` int(11) NOT NULL,
  `codigo_clientes_atendidos` int(11) NOT NULL,
  `codigo_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `descripcion`, `activo`) VALUES
(1, 'SUBARU', 1),
(2, 'TOYOTA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `id_marca`, `descripcion`, `activo`) VALUES
(1, 1, 'IMPREZA', 1),
(2, 2, 'IST 2018', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `codigo_servicio` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo_servicio` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`codigo_servicio`, `descripcion`, `tiempo_servicio`) VALUES
(1, 'Balanceo', '00:02:30'),
(2, 'Calibracion', '00:20:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_usuarios`
--

CREATE TABLE `tipos_de_usuarios` (
  `id_tipo_de_usuario` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_de_usuarios`
--

INSERT INTO `tipos_de_usuarios` (`id_tipo_de_usuario`, `descripcion`, `nivel`, `activo`) VALUES
(1, 'Administrador', 1, 1),
(2, 'Mecánico', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_de_usuario` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `pass`, `id_tipo_de_usuario`, `activo`) VALUES
(1, 'Jorge', 'Nitales', 'genita', '$2y$10$w5IBdBalqavVP8hWGec9OuuaRPb4Ndw18M4Oadp0H7pKMyzgQA06y', 2, 1),
(2, 'Chichico', 'Garmendia', 'chichimedia', '$2y$10$w5IBdBalqavVP8hWGec9OuuaRPb4Ndw18M4Oadp0H7pKMyzgQA06y', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codigo_articulo`);

--
-- Indices de la tabla `automovil`
--
ALTER TABLE `automovil`
  ADD PRIMARY KEY (`id_automovil`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_modelo` (`id_modelo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo_cliente`);

--
-- Indices de la tabla `clientes_atendidos`
--
ALTER TABLE `clientes_atendidos`
  ADD PRIMARY KEY (`codigo_clientes_atendidos`),
  ADD KEY `clientes_clientes_atendidos_fk` (`codigo_cliente`),
  ADD KEY `servicios_clientes_atendidos_fk` (`codigo_servicio`);

--
-- Indices de la tabla `clientes_automoviles`
--
ALTER TABLE `clientes_automoviles`
  ADD PRIMARY KEY (`id_cliente_automovil`),
  ADD KEY `id_automovil` (`id_automovil`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `clientes_en_espera`
--
ALTER TABLE `clientes_en_espera`
  ADD PRIMARY KEY (`codigo_cliente_en_espera`),
  ADD KEY `clientes_clientes_en_espera_fk` (`codigo_cliente`),
  ADD KEY `servicios_clientes_en_espera_fk` (`codigo_servicio`);

--
-- Indices de la tabla `detalle_servicio`
--
ALTER TABLE `detalle_servicio`
  ADD PRIMARY KEY (`codigo_detalle_servicio`),
  ADD KEY `articulos_detalle_servicio_fk` (`codigo_articulo`),
  ADD KEY `clientes_atendidos_detalle_servicio_fk` (`codigo_clientes_atendidos`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`codigo_servicio`);

--
-- Indices de la tabla `tipos_de_usuarios`
--
ALTER TABLE `tipos_de_usuarios`
  ADD PRIMARY KEY (`id_tipo_de_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_de_usuario` (`id_tipo_de_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `codigo_articulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `automovil`
--
ALTER TABLE `automovil`
  MODIFY `id_automovil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigo_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes_atendidos`
--
ALTER TABLE `clientes_atendidos`
  MODIFY `codigo_clientes_atendidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes_automoviles`
--
ALTER TABLE `clientes_automoviles`
  MODIFY `id_cliente_automovil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes_en_espera`
--
ALTER TABLE `clientes_en_espera`
  MODIFY `codigo_cliente_en_espera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detalle_servicio`
--
ALTER TABLE `detalle_servicio`
  MODIFY `codigo_detalle_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `codigo_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_de_usuarios`
--
ALTER TABLE `tipos_de_usuarios`
  MODIFY `id_tipo_de_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `automovil`
--
ALTER TABLE `automovil`
  ADD CONSTRAINT `automovil_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `automovil_ibfk_2` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`);

--
-- Filtros para la tabla `clientes_atendidos`
--
ALTER TABLE `clientes_atendidos`
  ADD CONSTRAINT `clientes_clientes_atendidos_fk` FOREIGN KEY (`codigo_cliente`) REFERENCES `clientes` (`codigo_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `servicios_clientes_atendidos_fk` FOREIGN KEY (`codigo_servicio`) REFERENCES `servicios` (`codigo_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes_automoviles`
--
ALTER TABLE `clientes_automoviles`
  ADD CONSTRAINT `clientes_automoviles_ibfk_1` FOREIGN KEY (`id_automovil`) REFERENCES `automovil` (`id_automovil`),
  ADD CONSTRAINT `clientes_automoviles_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`codigo_cliente`);

--
-- Filtros para la tabla `clientes_en_espera`
--
ALTER TABLE `clientes_en_espera`
  ADD CONSTRAINT `clientes_clientes_en_espera_fk` FOREIGN KEY (`codigo_cliente`) REFERENCES `clientes` (`codigo_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `servicios_clientes_en_espera_fk` FOREIGN KEY (`codigo_servicio`) REFERENCES `servicios` (`codigo_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_servicio`
--
ALTER TABLE `detalle_servicio`
  ADD CONSTRAINT `articulos_detalle_servicio_fk` FOREIGN KEY (`codigo_articulo`) REFERENCES `articulos` (`codigo_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clientes_atendidos_detalle_servicio_fk` FOREIGN KEY (`codigo_clientes_atendidos`) REFERENCES `clientes_atendidos` (`codigo_clientes_atendidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_de_usuario`) REFERENCES `tipos_de_usuarios` (`id_tipo_de_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
