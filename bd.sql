-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 02-07-2018 a las 04:53:30
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `db_univer_mipc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_alumno`
--

CREATE TABLE `cat_alumno` (
  `iCodigoAlumno` int(11) NOT NULL,
  `vchNombres` varchar(50) NOT NULL,
  `vchApellidos` varchar(50) NOT NULL,
  `dtFechaNac` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_alumno`
--

INSERT INTO `cat_alumno` (`iCodigoAlumno`, `vchNombres`, `vchApellidos`, `dtFechaNac`) VALUES
(1, 'Juan Jose', 'Perez Sanchez', '1986-09-05 00:00:00'),
(2, 'Luis Mario', 'Lopez Garcia', '1990-01-13 00:00:00'),
(3, 'Juan Jose', 'Perez Oleguer', '1998-05-11 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_materia`
--

CREATE TABLE `cat_materia` (
  `vchCodigoMateria` varchar(5) NOT NULL,
  `vchMateria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_materia`
--

INSERT INTO `cat_materia` (`vchCodigoMateria`, `vchMateria`) VALUES
('CS', 'CIENCIAS SOCIALES'),
('ESP', 'ESPAÑOL'),
('HST', 'HISTORIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_rel_alumno_materia`
--

CREATE TABLE `cat_rel_alumno_materia` (
  `iCodigoAlumno` int(11) NOT NULL,
  `vchCodigoMateria` varchar(45) NOT NULL,
  `fCalificacion` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_rel_alumno_materia`
--

INSERT INTO `cat_rel_alumno_materia` (`iCodigoAlumno`, `vchCodigoMateria`, `fCalificacion`) VALUES
(1, 'CS', 7.7),
(1, 'HST', NULL),
(2, 'ESP', 8.9),
(3, 'ESP', 9.7),
(3, 'HST', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_alumno`
--
ALTER TABLE `cat_alumno`
  ADD PRIMARY KEY (`iCodigoAlumno`);

--
-- Indices de la tabla `cat_materia`
--
ALTER TABLE `cat_materia`
  ADD PRIMARY KEY (`vchCodigoMateria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_alumno`
--
ALTER TABLE `cat_alumno`
  MODIFY `iCodigoAlumno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;