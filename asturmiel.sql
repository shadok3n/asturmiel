-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2018 a las 13:03:28
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asturmiel`
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
(5, 2, 'Miel de Somiedu', 'Miel de Eucalipto procedente del concejo de Somiedu.\r\nCantidad: 1kg.', '8.00', 138, '../imagenes/5_140539.jpg'),
(6, 1, 'Miel de Ayer', 'Miel de Romero procedente del concejo de Ayer.\r\nCantidad: 1kg.\r\n', '8.00', 150, '../imagenes/6_140558.jpg'),
(7, 1, 'Miel de Ponga', 'Miel de Romero procedente del concejo de Ponga.\r\nCantidad: 1kg.\r\n', '8.00', 134, '../imagenes/7_140545.jpg'),
(8, 1, 'Miel de Ibias', 'Miel de Romero procedente del concejo de Ibias.\r\nCantidad: 1kg.\r\n', '8.00', 133, '../imagenes/8_140508.jpg'),
(9, 2, 'Miel de Teberga', 'Miel de Eucalipto procedente del concejo de Teberga.\r\nCantidad: 1kg.', '8.00', 89, '../imagenes/9_140539.jpg'),
(10, 2, 'Miel de QuirÃ³s', 'Miel de Eucalipto procedente del concejo de QuirÃ³s.\r\nCantidad: 1kg.', '8.00', 124, '../imagenes/10_140535.jpg'),
(11, 1, 'Miel de Ayande', 'Miel de Romero procedente del concejo de Ayande.\r\nCantidad: 1kg.', '8.00', 165, '../imagenes/11_140555.jpg'),
(12, 3, 'Caramelos macizos de miel', 'Caramelos elaborados totalmente con miel selecta caramelizada.\r\n\r\n24 caramelos/unidad', '2.00', 500, '../imagenes/12_140544.jpg'),
(13, 3, 'Caramelos con miel y propÃ³leo', 'Caramelos elaborados con miel seleccionada de primera clase y propÃ³leo de abejas.\r\n\r\n24 caramelos/unidad', '2.15', 500, '../imagenes/gem-3261338_640.jpg'),
(14, 4, 'Cacahuetes con miel', 'Exquisito producto hecho de los mejores cacahuetes seleccionados, horneados a fuego lento con miel natural de primera clase.', '4.50', 600, '../imagenes/14_140500.jpg'),
(15, 4, 'Almendras garrapiÃ±adas', 'RiquÃ­simas almendras de primera clase, tostadas a fuego lento con azÃºcar y miel caramelizada. Estupendas para aperitivos y acompaÃ±amientos.', '5.80', 600, '../imagenes/15_110500.jpg'),
(16, 5, 'Crema hidratante corporal con jalea real', 'Evita las asperezas y las grietas dejando la piel suave y fina. Por su textura no deja efecto graso, lo que permite utilizarla en cualquier momento del dÃ­a.\r\n\r\nPresentaciÃ³n: Envase de 200 ml.', '9.80', 500, '../imagenes/16_110518.jpg'),
(17, 5, 'Leche corporal con Zanahoria y Jalea Real', 'Leche corporal bronceadora y con protector solar a base de extractos de zanahoria y jalea Real. No grasa, de fÃ¡cil extensiÃ³n y rÃ¡pida absorciÃ³n. No es para tomar el sol, sino para protegerse de Ã©l.\r\n\r\nPresentaciÃ³n: Envase de 500 ml.', '8.50', 600, '../imagenes/17_110507.jpg'),
(18, 5, 'JabÃ³n de propÃ³leo y lavanda', 'JabÃ³n elaborado con lavanda y propÃ³leo de abejas, especial para la piel seca y para la limpieza Ã­ntima. Tiene un marcado carÃ¡cter antisÃ©ptico.\r\n\r\nPresentaciÃ³n: Pastilla de 150 gr.', '3.50', 400, '../imagenes/18_110558.jpg'),
(19, 6, 'Polen natural', 'Modo de empleo: tomar en el desayuno una cucharada colmada. Contraindicado en las alergias a las abejas y sus productos.\r\n\r\nPresentaciÃ³n: Tarro de 240 gr.', '4.80', 500, '../imagenes/19_130525.jpg'),
(20, 6, 'Jalea Real fresca', 'La Jalea Real fresca es el mejor complemento nutritivo y energÃ©tico que tiene todas las vitaminas, minerales, proteÃ­nas, aminoÃ¡cidos y oligoelementos necesarios para la vida, armÃ³nica y naturalmente dispuestos. \r\n\r\nPRESENTACIÃ“N: Tarro 30 gr.', '5.85', 600, '../imagenes/20_130543.jpg');

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
(1, 'Mieles', 'Diferentes mieles naturales elaboradas en Asturias'),
(2, 'Delicias', 'Diferentes dulces artesanales elaborados con miel regional y otros ingredientes naturales'),
(3, 'Otros productos', 'Diferentes productos artesanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaspedidos`
--

CREATE TABLE `lineaspedidos` (
  `idPedido` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lineaspedidos`
--

INSERT INTO `lineaspedidos` (`idPedido`, `idArticulo`, `Cantidad`, `Precio`) VALUES
(1, 12, 1, 2),
(1, 13, 1, 2),
(1, 16, 1, 10),
(1, 18, 1, 4),
(2, 6, 1, 8),
(2, 8, 1, 8),
(2, 11, 1, 8),
(2, 19, 1, 5),
(2, 20, 3, 6),
(3, 12, 1, 2),
(3, 13, 1, 2),
(3, 14, 1, 5),
(3, 15, 1, 6),
(4, 6, 1, 8),
(4, 11, 1, 8),
(4, 12, 1, 2),
(4, 13, 1, 2),
(4, 19, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `horaPedido` time NOT NULL,
  `TotalPedido` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `fechaPedido`, `horaPedido`, `TotalPedido`) VALUES
(1, 1, '2018-05-23', '14:29:41', '17.45'),
(2, 1, '2018-05-24', '11:13:42', '46.35'),
(3, 1, '2018-05-24', '11:15:25', '14.45'),
(4, 1, '2018-05-25', '12:49:15', '24.95');

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
(1, 'Miel de Romero', 'Diferentes mieles producidas mediante la libaciÃ³n de la flor del romero', 1),
(2, 'Miel de Eucalipto', 'La miel de romero es muy suave y equilibrada. Tiene color claro y aroma delicado. Es indicada para infusiones.Tradicionalmente usada, junto con la manzanilla para hacer la digestiÃ³n. Es una de las mi', 1),
(3, 'Caramelos', 'Caramelos elaborados con miel seleccionada de primera clase.', 2),
(4, 'Frutos secos', 'Exquisitos productos hechos de miel y los mejores frutos secos seleccionados.', 2),
(5, 'CosmÃ©tica', 'Diferentes cosmÃ©ticos naturales.', 3),
(6, 'DietÃ©tica', 'Complementos alimenticios y otros productos.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `apellidosUsuario` varchar(50) NOT NULL,
  `direccionUsuario` varchar(50) NOT NULL,
  `cpUsuario` varchar(15) NOT NULL,
  `telefonoUsuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `clave`, `nombreUsuario`, `apellidosUsuario`, `direccionUsuario`, `cpUsuario`, `telefonoUsuario`) VALUES
(1, 'fran.ast@hotmail.com', '4b805c919e55af262c73f0d4ccfe64bbcc9518b5', '', '', '', '', '');

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
  ADD PRIMARY KEY (`idPedido`,`idArticulo`);

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
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `idSubcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
