-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 14:09:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webletras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `id` int(255) NOT NULL,
  `IDMB` varchar(255) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id`, `IDMB`, `nombre`) VALUES
(120, 'b55655ce-0ed8-41c2-85c4-38aee43747dc', 'Mikel Laboa'),
(131, 'f5d3c6c7-880e-4057-8e55-e1343839555d', 'Streetwise'),
(133, 'df26def7-fc3d-441b-babd-efb47d0aa8b8', 'Booze & Glory'),
(134, '6b37c90e-5077-4097-988f-d64f2eb42f63', 'Fermin Muguruza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `id` int(255) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `id_artista` int(255) NOT NULL,
  `anoEstreno` int(4) NOT NULL,
  `IDMB` varchar(255) NOT NULL,
  `letra` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id`, `titulo`, `id_artista`, `anoEstreno`, `IDMB`, `letra`) VALUES
(27, 'Ihesa zilegi balitz', 120, 2006, 'ab237e7b-ce54-4cbe-9b9c-0e1882c30866', 1),
(28, 'Iluntasunaren Ihesean', 131, 2022, '6a53195b-e2f0-480c-8937-a333b6f37cc3', 0),
(29, 'Amaiera', 131, 2021, 'dcee3739-1fbe-4d38-b9ea-6f0a7c23c51d', 0),
(30, 'London Skinhead Crew', 133, 2019, '1041e97b-2f70-46a3-8418-8735c61e079f', 0),
(31, 'Ihesa zilegi balitz', 134, 2022, '8be2274b-e3e9-47ae-b36e-f43a9ad91448', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `letra`
--

CREATE TABLE `letra` (
  `id` int(11) NOT NULL,
  `id_cancion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `letra_txt` varchar(30) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `letra`
--

INSERT INTO `letra` (`id`, `id_cancion`, `fecha`, `letra_txt`, `idioma`, `id_usuario`) VALUES
(1, 28, '2024-10-30', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','usuario') NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `username`, `email`, `password`, `role`) VALUES
(1, 'Oroitz', 'oroitz', 'oroitz@correo.eus', '12345', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IDMB` (`IDMB`) USING BTREE;

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_musicbrainz` (`IDMB`),
  ADD KEY `id_artista` (`id_artista`);

--
-- Indices de la tabla `letra`
--
ALTER TABLE `letra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cancion` (`id_cancion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `USER` (`username`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `letra`
--
ALTER TABLE `letra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `letra`
--
ALTER TABLE `letra`
  ADD CONSTRAINT `letra_ibfk_1` FOREIGN KEY (`id_cancion`) REFERENCES `cancion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `letra_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
