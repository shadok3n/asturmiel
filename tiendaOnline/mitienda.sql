-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2018 a las 12:28:32
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mitienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `idArticulo` int(11) NOT NULL,
  `idSubcat` int(11) NOT NULL,
  `nombreArticulo` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `stock` int(4) NOT NULL,
  `fotoArticulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idArticulo`, `idSubcat`, `nombreArticulo`, `descripcion`, `precio`, `stock`, `fotoArticulo`) VALUES
(3, 5, 'Vaquero Slim ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla \r\nbla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', '15.50', 10, '../imagenes/vaquero1.jpg'),
(4, 5, 'Vaquero Stl', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla \r\nbla bla bla bla bla bla bla bla bla bla bla bla bla bla bla \r\nbla bla bla bla bla bla bla bla bla bla bla bla ', '40.00', 10, '../imagenes/vaquero2.jpg'),
(5, 6, 'Vaquero verano', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla \r\nbla bla bla bla bla bla bla bla bla \r\nbla bla bla bla bla bla bla bla bla bla bla bla ', '32.50', 15, '../imagenes/vaquerom1.jpg'),
(6, 6, 'Vaquero Roto', 'bla bla bla bla bla bla bla bla bla bla bla bla \r\nbla bla bla bla bla bla bla bla bla bla bla bla bla bla bla \r\nbla bla bla bla bla bla bla bla bla bla bla bla ', '58.90', 12, '../imagenes/camiseta5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(50) NOT NULL,
  `descripcionCat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`, `descripcionCat`) VALUES
(1, 'Mujer', 'Ropa y complementos de Mujer, todas las tallas.... no se que mas poner...'),
(2, 'Hombre', 'Ropa para hombre, todas las tallas, zapatos, complementos, etc....'),
(3, 'BebÃ©', 'Esta categorÃ­a contiene todo para bebÃ©');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaspedidos`
--

CREATE TABLE `lineaspedidos` (
  `idPedido` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lineaspedidos`
--

INSERT INTO `lineaspedidos` (`idPedido`, `idArticulo`, `cantidad`, `precio`) VALUES
(6, 3, 1, '15.50'),
(6, 6, 1, '58.90');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `horaPedido` time NOT NULL,
  `totalPedido` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `fechaPedido`, `horaPedido`, `totalPedido`) VALUES
(1, 8, '2018-05-07', '01:01:11', '185.00'),
(2, 8, '2018-05-07', '13:33:40', '185.00'),
(3, 8, '2018-05-07', '13:37:12', '95.50'),
(4, 8, '2018-05-07', '13:39:39', '91.40'),
(5, 8, '2018-05-07', '13:40:30', '48.00'),
(6, 8, '2018-05-07', '13:43:55', '74.40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `idSubcat` int(11) NOT NULL,
  `nombreSubcat` varchar(50) NOT NULL,
  `descripcionSubcat` varchar(200) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`idSubcat`, `nombreSubcat`, `descripcionSubcat`, `idCategoria`) VALUES
(1, 'Blusas', 'Blusas de mujer, fresco, verano, color.... tallas especiales', 1),
(3, 'Interior', 'Bla bla vla vla vavl alv l vlavla ....', 1),
(4, 'Camisas', 'Camisa de hombre, todas las temporadas.... bla bla bla.-..', 2),
(5, 'Pantalones', 'Pantalones hombre, sport, vaqueros, vestir...', 2),
(6, 'Pantalones', 'Pantalones de mujer, todas las temporadas, todos los tipos...', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `clave`) VALUES
(3, 'manolin@gmail.com', 'e8f72930655422e65cf0f33d876e96660e97ec45'),
(7, 'mariaperez@gmail.com', 'd8913df37b24c97f28f840114d05bd110dbb2e44'),
(8, 'pepito@gmail.com', 'e8f72930655422e65cf0f33d876e96660e97ec45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `idSubcat` (`idSubcat`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `lineaspedidos`
--
ALTER TABLE `lineaspedidos`
  ADD PRIMARY KEY (`idPedido`,`idArticulo`),
  ADD KEY `idArticulo` (`idArticulo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`idSubcat`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `idSubcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`idSubcat`) REFERENCES `subcategorias` (`idSubcat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lineaspedidos`
--
ALTER TABLE `lineaspedidos`
  ADD CONSTRAINT `lineaspedidos_ibfk_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`idArticulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lineaspedidos_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
