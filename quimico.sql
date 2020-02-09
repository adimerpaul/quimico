-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2020 a las 07:10:55
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quimico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `idkardex` int(11) NOT NULL,
  `stdinicio` decimal(11,2) NOT NULL,
  `ingreso` int(11) NOT NULL,
  `salida` int(11) NOT NULL,
  `stdfinal` decimal(11,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` varchar(55) NOT NULL,
  `responsable` varchar(155) NOT NULL,
  `dia` date NOT NULL,
  `turno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kardex`
--

INSERT INTO `kardex` (`idkardex`, `stdinicio`, `ingreso`, `salida`, `stdfinal`, `idusuario`, `fecha`, `tipo`, `responsable`, `dia`, `turno`) VALUES
(1, '0.00', 0, 0, '220.00', 1, '2020-02-09 02:53:21', 'CAL HIDRATADA', 'Adminitrador', '2020-01-31', '22 a 06'),
(2, '0.00', 0, 0, '5.50', 1, '2020-02-09 02:53:54', 'FLOCULANTE 933', 'Administrador', '2020-01-31', '22 a 06'),
(3, '0.00', 0, 0, '27.90', 1, '2020-02-09 02:54:43', 'COAGULANTE 958', 'Administrador', '2020-01-31', '22 a 06'),
(4, '0.00', 0, 0, '123.30', 1, '2020-02-09 02:55:39', 'ACIDO SULFURICO', 'Administrador', '2020-01-31', '22 a 06'),
(5, '0.00', 0, 0, '0.00', 1, '2020-02-09 02:55:39', 'SAL', 'Administrador', '2020-01-31', '22 a 06'),
(10, '220.00', 0, 20, '200.00', 1, '2020-02-09 03:23:15', 'CAL HIDRATADA', 'Administrador', '2020-02-08', '22 a 06'),
(11, '5.50', 0, 0, '5.50', 1, '2020-02-09 03:25:24', 'FLOCULANTE 933', 'Administrador', '2020-02-08', '22 a 06'),
(13, '0.00', 0, 0, '0.00', 1, '2020-02-09 03:48:51', 'SAL', 'Administrador', '2020-02-08', '22 a 06'),
(14, '200.00', 0, 0, '200.00', 3, '2020-02-09 05:02:08', 'CAL HIDRATADA', 'maria jose', '2020-02-09', '06 a 14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `usuario` varchar(55) NOT NULL,
  `clave` varchar(55) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'ACTIVO',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `turno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `usuario`, `clave`, `tipo`, `estado`, `fecha`, `turno`) VALUES
(1, 'Administrador', 'admin', '123456', 'admin', 'ACTIVO', '2020-02-09 01:49:15', '22 a 06'),
(3, 'maria jose', 'maria', 'maria', 'trabajador', 'ACTIVO', '2020-02-09 04:31:43', '06 a 14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`idkardex`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `idkardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `kardex_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
