-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2021 a las 18:46:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugado`
--

CREATE TABLE `jugado` (
  `id_usuario` int(11) NOT NULL,
  `id_videojuego` int(11) NOT NULL,
  `seleccion` set('Completado','Jugando','Planeado','') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `jugado`
--

INSERT INTO `jugado` (`id_usuario`, `id_videojuego`, `seleccion`) VALUES
(32, 1, 'Jugando'),
(32, 2, 'Completado'),
(32, 3, ''),
(32, 4, ''),
(32, 5, ''),
(32, 6, ''),
(32, 7, 'Completado'),
(32, 8, ''),
(32, 9, ''),
(32, 10, 'Planeado'),
(33, 1, ''),
(33, 2, ''),
(33, 3, ''),
(33, 4, ''),
(33, 5, ''),
(33, 6, ''),
(33, 7, ''),
(33, 8, ''),
(33, 9, ''),
(33, 10, ''),
(34, 1, 'Completado'),
(34, 7, 'Completado'),
(34, 8, 'Planeado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_usuario`, `usuario`, `email`, `password`) VALUES
(32, 'Alex', 'alex@mail.com', '$2y$10$r9NxdIJm6KndTdG72HIg8eW.VKfkkcAdNg8fKwAyo70jT0Rx767z2'),
(33, 'Test', 'test', '$2y$10$U.xLWH0ydMwLbqrSNk57qOxP/YRxfnGm7UfivSTK2PlJrGMf5pL8.'),
(34, 'Link', 'linkhyrule@mail.com', '$2y$10$7i7qhnTDipqDKBpDX1mvJeHQFnoi0rR5c/dPSYYzbYzS4CTKkLvke');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videogames`
--

CREATE TABLE `videogames` (
  `id_videojuego` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `consola` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `año` int(4) NOT NULL,
  `pegi` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `videogames`
--

INSERT INTO `videogames` (`id_videojuego`, `titulo`, `consola`, `año`, `pegi`) VALUES
(1, 'The Legend of Zelda: Breath of the Wild', 'Nintendo Switch', 2017, '+12'),
(2, 'Pokemon Oro', 'Game Boy Color', 1999, '+7'),
(3, 'Fire Emblem: Three Houses', 'Nintendo Switch', 2019, '+12'),
(4, 'MediEvil', 'Play Station 1', 1998, '+12'),
(5, 'Metal Gear Solid', 'Play Station 1', 1998, '+18'),
(6, 'Halo: The Master Chief Collection', 'Xbox One', 2014, '+16'),
(7, 'Hollow Knight', 'PC', 2017, '+7'),
(8, 'The Legend of Zelda: Majora\'s Mask', 'Nintendo 64', 2000, '+12'),
(9, 'Forza Horizon 5', 'PC', 2021, '+3'),
(10, 'Yakuza Kiwami', 'Play Station 4', 2016, '+18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugado`
--
ALTER TABLE `jugado`
  ADD PRIMARY KEY (`id_usuario`,`id_videojuego`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `videogames`
--
ALTER TABLE `videogames`
  ADD PRIMARY KEY (`id_videojuego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugado`
--
ALTER TABLE `jugado`
  ADD CONSTRAINT `jugado_ibfk_2` FOREIGN KEY (`id_videojuego`) REFERENCES `videogames` (`id_videojuego`) ON DELETE CASCADE,
  ADD CONSTRAINT `jugado_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
