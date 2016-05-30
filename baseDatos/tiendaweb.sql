-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2016 a las 19:40:46
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `contiene` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nombre`, `contiene`) VALUES
(1, 'mangas', 10),
(2, 'dc', 10),
(3, 'marvel', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(4) NOT NULL,
  `id_producto` int(6) NOT NULL,
  `idusuario` int(3) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(6) NOT NULL,
  `id_cat` int(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_cat`, `nombre`, `precio`, `imagen`, `descripcion`) VALUES
(1, 1, 'Blue Exorcist 4', '53.00', 'blueExorcist_4.jpg', 'Volúmen 4 de Blue Exorcist también conocido como Ao no Exorcist.'),
(2, 1, 'Air Gear 29', '70.00', 'airGear_29.jpg', 'Volúmen 29 de Air Gear'),
(3, 1, 'Del Cielo Al Infierno 19', '52.00', 'delCieloAlInfierno_19.jpg', 'Volúmen 19 de la serie Del cielo al infierno'),
(4, 2, 'Batman 433', '85.00', 'batman_433.jpg', 'Batman comic 433'),
(5, 2, 'Kingdom Come 4', '62.00', 'kingdomCome_4.jpg', 'Cuarto comic de Kingdom Come'),
(6, 2, 'Aquaman 62', '43.00', 'aquaman_62.jpg', 'Cómic 62 de la serie Aquaman'),
(7, 3, 'Caballero Luna 17', '93.00', 'caballeroLuna_17.jpg', 'Cómic 17 de Caballero Luna'),
(8, 3, 'Punisher 3 Limited Series', '159.00', 'thePunisherLimitedSeries_3.jpg', 'Cómic 3 de Punisher Limited Series'),
(9, 3, 'Deadpool 56', '90.00', 'deadpool_56.jpg', 'Cómic 56 de la serie Deadpool'),
(10, 3, 'Capitán América 321', '260.00', 'capitanAmerica_321.jpg', 'Cómic 321 del Capitán América');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(3) NOT NULL,
  `tipoUsuario` int(1) NOT NULL,
  `nickname` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `fechaingreso` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `tipoUsuario`, `nickname`, `nombre`, `apellido`, `pais`, `ciudad`, `contrasena`, `fechaingreso`) VALUES
(1, 1, 'Mikasa', 'Esteban', 'Kuh', 'México', 'Mérida', '1234', '2016-05-13'),
(2, 0, 'Admin', 'Administrador', 'Administrador', 'Admin', 'Admin', 'admin1234', '2016-05-13'),
(60, 1, 'Zero', 'Angel', 'Lizarraga', 'Mexico', 'Mérida', 'angel12', '2016-05-24'),
(59, 1, 'Goliat', 'Alejandro', 'Reyna', 'Mexico', 'Merida', 'goliat', '2016-05-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria` (`id_cat`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
