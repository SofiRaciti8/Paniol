-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2019 a las 16:08:24
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stockk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codArt` int(11) NOT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `idTipoA` int(11) NOT NULL,
  `Stock` decimal(10,2) NOT NULL,
  `idUnidad` varchar(10) NOT NULL,
  `idDeposito` int(11) DEFAULT NULL,
  `idEstanteria` int(11) DEFAULT NULL,
  `Estado` int(11) NOT NULL DEFAULT '1',
  `FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codArt`, `Descripcion`, `idTipoA`, `Stock`, `idUnidad`, `idDeposito`, `idEstanteria`, `Estado`, `FechaRegistro`) VALUES
(1234, 'Destornillador', 1, '45.00', 'bl', 3, 10, 1, '2019-10-23 13:14:49'),
(2345, 'Zapatillas', 1, '30.00', 'bl', 1, 11, 1, '2019-10-23 13:15:15'),
(3456, 'Pinzas', 1, '100.00', 'uni', 3, 12, 1, '2019-10-23 13:15:52'),
(4567, 'Arena', 2, '50.00', 'k', 4, 13, 1, '2019-10-23 13:16:58'),
(5678, 'Tornillos', 1, '100.00', 'uni', 3, 14, 1, '2019-10-23 13:19:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE `depositos` (
  `idDeposito` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `depositos`
--

INSERT INTO `depositos` (`idDeposito`, `Descripcion`) VALUES
(1, 'IPP'),
(2, 'Quimica'),
(3, 'Electro'),
(4, 'MMO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `iddevolucion` int(11) NOT NULL,
  `idMovimiento` int(11) NOT NULL,
  `codArt` int(11) NOT NULL,
  `iDtipo` varchar(3) NOT NULL,
  `CantidBE` decimal(10,2) NOT NULL,
  `CantidME` decimal(10,2) DEFAULT NULL,
  `FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanterias`
--

CREATE TABLE `estanterias` (
  `idEstanteria` int(11) NOT NULL,
  `fila` int(11) DEFAULT NULL,
  `columna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estanterias`
--

INSERT INTO `estanterias` (`idEstanteria`, `fila`, `columna`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 1, 2),
(4, 1, 4),
(5, 1, 4),
(6, 1, 4),
(7, 1, 3),
(8, 3, 3),
(9, 1, 2),
(10, 1, 2),
(11, 1, 5),
(12, 3, 4),
(13, 1, 2),
(14, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacioes`
--

CREATE TABLE `modificacioes` (
  `idModificacion` int(11) NOT NULL,
  `codArt` int(11) DEFAULT NULL,
  `iDtipo` varchar(3) DEFAULT NULL,
  `CantidadM` decimal(10,2) NOT NULL,
  `Motivo` varchar(255) NOT NULL,
  `Observaciones` varchar(255) DEFAULT NULL,
  `FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idMovimiento` int(11) NOT NULL,
  `idPrestamo` int(11) NOT NULL,
  `codArt` int(11) NOT NULL,
  `iDtipo` varchar(3) NOT NULL,
  `Cantid` decimal(10,2) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'pres',
  `FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idProfesor` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idProfesor`, `Nombre`, `estado`) VALUES
(1, 'Fernanda Sobrino', 1),
(2, 'Paulina Goyeneche', 1),
(3, 'Gisela Brassesco', 1),
(4, 'Leticia Colas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `idRegistro` int(11) NOT NULL,
  `Usuario` varchar(255) DEFAULT NULL,
  `FechaYHoraLogeo` datetime NOT NULL,
  `FechaYHoraDeslogeo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroprestamos`
--

CREATE TABLE `registroprestamos` (
  `idPrestamo` int(11) NOT NULL,
  `idProfesor` int(11) DEFAULT NULL,
  `Alumno` varchar(255) NOT NULL,
  `CantidadArt` int(11) NOT NULL,
  `FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoarticulo`
--

CREATE TABLE `tipoarticulo` (
  `idTipoA` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoarticulo`
--

INSERT INTO `tipoarticulo` (`idTipoA`, `Descripcion`) VALUES
(1, 'Herramental'),
(2, 'Insumo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposmov`
--

CREATE TABLE `tiposmov` (
  `iDtipo` varchar(3) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposmov`
--

INSERT INTO `tiposmov` (`iDtipo`, `Descripcion`) VALUES
('B', 'Baja'),
('D', 'Devolucion'),
('I', 'Ingreso'),
('P', 'Prestamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `idUnidad` varchar(3) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idUnidad`, `Descripcion`) VALUES
('bl', 'bolsas'),
('k', 'kilos'),
('l', 'litros'),
('mt', 'metros'),
('uni', 'unidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `Clave`) VALUES
(1, 'UsuarioPrueba', 'Usuario123'),
(2, 'SofiaRaciti', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codArt`),
  ADD KEY `idTipoA` (`idTipoA`),
  ADD KEY `idUnidad` (`idUnidad`),
  ADD KEY `idDeposito` (`idDeposito`),
  ADD KEY `idEstanteria` (`idEstanteria`);

--
-- Indices de la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`idDeposito`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`iddevolucion`),
  ADD KEY `idMovimiento` (`idMovimiento`),
  ADD KEY `codArt` (`codArt`),
  ADD KEY `iDtipo` (`iDtipo`);

--
-- Indices de la tabla `estanterias`
--
ALTER TABLE `estanterias`
  ADD PRIMARY KEY (`idEstanteria`);

--
-- Indices de la tabla `modificacioes`
--
ALTER TABLE `modificacioes`
  ADD PRIMARY KEY (`idModificacion`),
  ADD KEY `codArt` (`codArt`),
  ADD KEY `iDtipo` (`iDtipo`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idMovimiento`),
  ADD KEY `idPrestamo` (`idPrestamo`),
  ADD KEY `codArt` (`codArt`),
  ADD KEY `iDtipo` (`iDtipo`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idProfesor`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`idRegistro`);

--
-- Indices de la tabla `registroprestamos`
--
ALTER TABLE `registroprestamos`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `idProfesor` (`idProfesor`);

--
-- Indices de la tabla `tipoarticulo`
--
ALTER TABLE `tipoarticulo`
  ADD PRIMARY KEY (`idTipoA`);

--
-- Indices de la tabla `tiposmov`
--
ALTER TABLE `tiposmov`
  ADD PRIMARY KEY (`iDtipo`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`idUnidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `depositos`
--
ALTER TABLE `depositos`
  MODIFY `idDeposito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `iddevolucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estanterias`
--
ALTER TABLE `estanterias`
  MODIFY `idEstanteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `modificacioes`
--
ALTER TABLE `modificacioes`
  MODIFY `idModificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idMovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registroprestamos`
--
ALTER TABLE `registroprestamos`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoarticulo`
--
ALTER TABLE `tipoarticulo`
  MODIFY `idTipoA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`idTipoA`) REFERENCES `tipoarticulo` (`idTipoA`),
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`idUnidad`) REFERENCES `unidad` (`idUnidad`),
  ADD CONSTRAINT `articulos_ibfk_3` FOREIGN KEY (`idDeposito`) REFERENCES `depositos` (`idDeposito`),
  ADD CONSTRAINT `articulos_ibfk_4` FOREIGN KEY (`idEstanteria`) REFERENCES `estanterias` (`idEstanteria`);

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`idMovimiento`) REFERENCES `prestamos` (`idMovimiento`),
  ADD CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`codArt`) REFERENCES `articulos` (`codArt`),
  ADD CONSTRAINT `devolucion_ibfk_3` FOREIGN KEY (`iDtipo`) REFERENCES `tiposmov` (`iDtipo`);

--
-- Filtros para la tabla `modificacioes`
--
ALTER TABLE `modificacioes`
  ADD CONSTRAINT `modificacioes_ibfk_1` FOREIGN KEY (`codArt`) REFERENCES `articulos` (`codArt`),
  ADD CONSTRAINT `modificacioes_ibfk_2` FOREIGN KEY (`iDtipo`) REFERENCES `tiposmov` (`iDtipo`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`idPrestamo`) REFERENCES `registroprestamos` (`idPrestamo`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`codArt`) REFERENCES `articulos` (`codArt`),
  ADD CONSTRAINT `prestamos_ibfk_3` FOREIGN KEY (`iDtipo`) REFERENCES `tiposmov` (`iDtipo`);

--
-- Filtros para la tabla `registroprestamos`
--
ALTER TABLE `registroprestamos`
  ADD CONSTRAINT `registroprestamos_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`idProfesor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
