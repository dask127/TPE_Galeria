-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2020 a las 04:01:28
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_arte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(20) NOT NULL,
  `nombre_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre_category`) VALUES
(1, 'Pintura'),
(2, 'Dibujo'),
(3, 'Escultura'),
(7, 'Default');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `autor` varchar(100) NOT NULL,
  `anio` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`id`, `nombre`, `descripcion`, `autor`, `anio`, `imagen`, `id_categoria`) VALUES
(24, 'La Gioconda', 'El Retrato de Lisa Gherardini, es un óleo sobre tabla de álamo de 77 × 53 cm, pintado entre 1503 y 1519, es una obra pictórica del polímata renacentista italiano Leonardo da Vinci.', 'Leonardo Da Vinci', '1503-01-01', 'https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2019/07/02/15620614058072.jpg', 1),
(25, 'El grito', 'La versión más famosa se encuentra en la Galería Nacional de Noruega y fue completada en 1893.', 'Edvard Munch', '1893-01-01', 'https://www.latercera.com/resizer/Cl0W6jWbj8PfL8U15xJWGyaTr7Q=/900x600/smart/arc-anglerfish-arc2-prod-copesa.s3.amazonaws.com/public/CXNSQYHH7FFKNJLH6SGZTZ3ABE.jpg', 1),
(26, 'David', 'El David es una escultura de mármol blanco de 5,17 metros de altura y 5572 kilogramos de masa, realizada por Miguel Ángel Buonarroti entre 1501 y 1504 por encargo de la Opera del Duomo de la catedral de Santa María del Fiore de Florencia.', 'Miguel Ángel Buonarroti', '1504-01-01', 'https://cdn.culturagenial.com/es/imagenes/escultura-david-de-miguel-angel-og.jpg', 3),
(27, 'El Pensador', 'El escultor concibió esta pieza para decorar el tímpano del conjunto escultórico La puerta del Infierno, encargado por el Ministerio de Instrucción Pública y Bellas Artes de Francia. Esto serviría como entrada para el Museo de Artes Decorativas.', 'Auguste Rodin', '1881-01-01', 'https://www.lavanguardia.com/r/GODO/LV/p7/WebSite/2020/02/13/Recortada/img_tayala_20200213-152552_imagenes_lv_terceros_pensador_4-kxUH--656x492@LaVanguardia-Web.jpg', 3),
(28, 'La persistencia de la memoria', 'Realizado mediante la técnica del óleo sobre lienzo, es de estilo surrealista y sus medidas son 24 x 33 cm. La obra fue exhibida en la primera exposición individual de Dalí en la Galerie Pierre Colle de París.', 'Salvador Dalí', '1931-01-01', 'https://10mosttoday.com/wp-content/uploads/2013/09/The_Persistence_of_Memory.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `admin_auth` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `admin_auth`, `password`) VALUES
(18, 'dask', 1, '$2y$10$6NcoM.p43KNMSioeuIcAQevNumBcR5XX9YWyWvP59wwQC3qv83UxO'),
(30, 'prueba 2', 1, '$2y$10$HKA6h/9mJoiDhViGea1VNuN8Sn1/vBBDmUriAZm2A/hpdk1e9eKee'),
(31, '123123', 0, '$2y$10$vo3H4RMq57XmONTNtKeIcutAxkyxL0sNydCKmiuoRQ4i52gdM2cfe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `obra_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
