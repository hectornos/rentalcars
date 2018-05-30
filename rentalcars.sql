-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2018 a las 21:42:25
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rentalcars`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `averias`
--

CREATE TABLE `averias` (
  `id` int(11) NOT NULL,
  `vehiculo_id` int(11) NOT NULL,
  `tipoaveria_id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `averias`
--

INSERT INTO `averias` (`id`, `vehiculo_id`, `tipoaveria_id`, `descripcion`, `fecha`) VALUES
(2, 14, 2, 'afd', '2018-04-18'),
(3, 14, 3, 'Toqucito en luna delantera', '2018-04-25'),
(4, 1, 4, 'Pinchazo, rueda conductor', '2018-04-27'),
(5, 1, 4, 'Pinchazo', '2018-04-05'),
(6, 1, 4, 'Pinchazo', '2018-04-05'),
(7, 7, 2, 'Gripado', '2018-04-08'),
(8, 7, 2, 'Gripado', '2018-04-08'),
(9, 8, 3, 'Picazo', '2018-05-25'),
(10, 3, 3, 'Luna rota', '2018-05-17'),
(11, 1, 2, 'adfadfadsf', '2018-05-31'),
(12, 1, 1, 'adfadf', '2018-05-04'),
(13, 5, 4, 'adfadf', '2018-05-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios`
--

CREATE TABLE `cambios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cambios`
--

INSERT INTO `cambios` (`id`, `nombre`) VALUES
(1, 'manual'),
(2, 'automatico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(5) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `f_nac` date NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `telefono` int(15) DEFAULT NULL,
  `rol` varchar(11) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `dni`, `f_nac`, `ciudad`, `telefono`, `rol`) VALUES
(1, 'Hector', 'Tornos', 'Z0932539D', '2018-04-18', 'Zaragoza', 637861254, 'admin'),
(2, 'Fulanita', 'DeTal', '47951375D', '1986-04-01', 'Zaragoza', 636421756, 'user'),
(3, 'Mengano', 'Garcia', '95477215Y', '2018-05-02', 'Zaragoza', 637889787, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_vehiculo`
--

CREATE TABLE `cliente_vehiculo` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `vehiculo_id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente_vehiculo`
--

INSERT INTO `cliente_vehiculo` (`id`, `cliente_id`, `vehiculo_id`, `fecha`) VALUES
(3, 1, 8, '2018-04-20'),
(4, 2, 2, '2018-04-17'),
(5, 1, 1, '2018-04-19'),
(6, 2, 7, '2018-04-19'),
(7, 1, 1, '2018-04-18'),
(8, 2, 6, '2018-04-24'),
(9, 1, 5, '2018-04-19'),
(10, 1, 16, '2018-04-11'),
(11, 2, 15, '2018-04-19'),
(14, 1, 4, '2018-05-07'),
(15, 1, 4, '2018-05-09'),
(16, 2, 4, '2018-05-10'),
(17, 1, 4, '2018-05-10'),
(18, 1, 3, '2018-05-10'),
(19, 1, 4, '2018-05-10'),
(20, 3, 5, '2018-05-27'),
(21, 2, 7, '2018-05-27'),
(22, 2, 14, '2018-05-27'),
(23, 2, 16, '2018-05-27'),
(24, 2, 20, '2018-05-27'),
(25, 2, 10, '2018-05-27'),
(26, 2, 1, '2018-05-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `nombre`) VALUES
(1, 'azul'),
(2, 'verde'),
(3, 'amarillo'),
(4, 'rojo'),
(5, 'blanco'),
(6, 'negro'),
(7, 'gris');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustibles`
--

CREATE TABLE `combustibles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `combustibles`
--

INSERT INTO `combustibles` (`id`, `nombre`) VALUES
(1, 'diesel'),
(2, 'gasolina'),
(3, 'electrico'),
(4, 'hibrido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `alquiler_id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `resuelto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `alquiler_id`, `descripcion`, `resuelto`) VALUES
(3, 10, 'Algo que se te ocurra', 1),
(4, 4, 'asdfadsf', 0),
(5, 3, 'No funciona la tarjeta', 0),
(6, 8, 'No funciona tarjeta', 1),
(7, 9, 'wefwefsad', 1),
(8, 3, 'sdfadf', 0),
(9, 3, 'sdfsdfds', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`) VALUES
(1, 'seat'),
(2, 'opel'),
(3, 'peugeot'),
(4, 'citroen'),
(5, 'renault');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoaverias`
--

CREATE TABLE `tipoaverias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoaverias`
--

INSERT INTO `tipoaverias` (`id`, `nombre`) VALUES
(1, 'carroceria'),
(2, 'motor'),
(3, 'lunas'),
(4, 'ruedas'),
(5, 'tapiceria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`) VALUES
(1, 'comercial'),
(2, 'compacto'),
(3, 'berlina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(5) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `tipo_id` int(2) NOT NULL,
  `color_id` int(2) NOT NULL,
  `combustible_id` int(1) NOT NULL,
  `cambio_id` int(1) NOT NULL,
  `marca_id` int(2) NOT NULL,
  `modelo` varchar(10) NOT NULL,
  `matricula` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `disponible`, `tipo_id`, `color_id`, `combustible_id`, `cambio_id`, `marca_id`, `modelo`, `matricula`) VALUES
(1, 0, 2, 5, 1, 1, 4, 'Berlingo', '4444JKG'),
(2, 0, 1, 7, 1, 1, 5, 'kangoo', '1234JKD'),
(3, 0, 1, 5, 1, 1, 4, 'Berlingo', '1238ZSD'),
(4, 0, 1, 5, 1, 1, 3, 'partner', '3234ADT'),
(5, 0, 1, 7, 1, 1, 5, 'kangoo', '2457ADR'),
(6, 1, 1, 5, 4, 1, 3, 'partner', '2547YRY'),
(7, 0, 2, 3, 1, 1, 4, 'c4', '7856JHG'),
(8, 1, 2, 5, 1, 1, 3, '308', '7856ADR'),
(9, 1, 2, 3, 1, 1, 4, 'c4', '7856JHO'),
(10, 0, 2, 6, 1, 2, 1, 'leon', '7847TRA'),
(14, 0, 2, 4, 3, 1, 3, '308', '7896ARI'),
(15, 1, 2, 5, 3, 1, 4, 'c3', '4527FGE'),
(16, 0, 3, 4, 2, 1, 4, 'c6', '4589ADT'),
(17, 1, 3, 5, 3, 2, 1, 'toledo', '4563PDT'),
(18, 1, 3, 1, 3, 2, 2, 'meriva', '4578ADF'),
(19, 1, 3, 2, 1, 1, 2, 'insgnia', '1457HYT'),
(20, 0, 2, 2, 3, 1, 3, '507', '4588FRT'),
(21, 0, 3, 2, 1, 1, 2, 'zafira', '1245DFD'),
(22, 0, 3, 4, 1, 1, 2, 'insignia', '1234jbk'),
(23, 0, 1, 3, 2, 2, 3, '307', '1234JPK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `averias`
--
ALTER TABLE `averias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehiculos` (`vehiculo_id`),
  ADD KEY `fk_tipoaverias` (`tipoaveria_id`);

--
-- Indices de la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `cliente_vehiculo`
--
ALTER TABLE `cliente_vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pivot_clientes` (`cliente_id`),
  ADD KEY `pivot_vehiculos` (`vehiculo_id`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `combustibles`
--
ALTER TABLE `combustibles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alquiler_id` (`alquiler_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `tipoaverias`
--
ALTER TABLE `tipoaverias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cambios` (`cambio_id`),
  ADD KEY `fk_colors` (`color_id`),
  ADD KEY `fk_combustibles` (`combustible_id`),
  ADD KEY `fk_marcas` (`marca_id`),
  ADD KEY `fk_tipos` (`tipo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `averias`
--
ALTER TABLE `averias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cambios`
--
ALTER TABLE `cambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente_vehiculo`
--
ALTER TABLE `cliente_vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `combustibles`
--
ALTER TABLE `combustibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipoaverias`
--
ALTER TABLE `tipoaverias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `averias`
--
ALTER TABLE `averias`
  ADD CONSTRAINT `fk_tipoaverias` FOREIGN KEY (`tipoaveria_id`) REFERENCES `tipoaverias` (`id`),
  ADD CONSTRAINT `fk_vehiculos` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_vehiculo`
--
ALTER TABLE `cliente_vehiculo`
  ADD CONSTRAINT `pivot_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pivot_vehiculos` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`alquiler_id`) REFERENCES `cliente_vehiculo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_cambios` FOREIGN KEY (`cambio_id`) REFERENCES `cambios` (`id`),
  ADD CONSTRAINT `fk_colors` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `fk_combustibles` FOREIGN KEY (`combustible_id`) REFERENCES `combustibles` (`id`),
  ADD CONSTRAINT `fk_marcas` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `fk_tipos` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
