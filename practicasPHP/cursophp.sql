-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-11-2019 a las 20:39:02
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 0,
  `months` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `visible`, `months`, `created_at`, `updated_at`, `logo`) VALUES
(5, 'Titulo1', 'Desc1', 0, 0, '2019-09-12 20:44:14', '2019-09-12 20:44:14', ''),
(6, 'PHP Developer', 'WOW This is amazing!!!', 0, 0, '2019-09-12 20:46:01', '2019-09-12 20:46:01', ''),
(7, 'Python dev', 'Des1', 0, 0, '2019-09-24 19:19:54', '2019-09-24 19:19:54', ''),
(8, 'Job XSS', '<script>alert(\'hello\'); </script>', 0, 0, '2019-09-25 17:03:39', '2019-09-25 17:03:39', ''),
(14, 'NodeJs Dev', 'Things!!!', 0, 0, '2019-09-26 18:38:20', '2019-09-26 18:38:20', ''),
(15, 'MI primera ruta de imagen ', 'Subir una imagen de logo. ', 0, 0, '2019-09-26 20:07:14', '2019-09-26 20:07:14', 'public/uploads/plati.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `idp` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`idp`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 't1', 'descr1', '2019-09-13 16:23:21', '2019-09-13 16:23:21'),
(3, 'Curso PHP', 'curso de librias ', '2019-09-13 17:08:58', '2019-09-13 17:08:58'),
(4, 'Desarollando con Python', 'Las diferentes librerias de Python', '2019-09-24 19:31:06', '2019-09-24 19:31:06'),
(5, 'Aplicaciones con Android', 'Se desarollaran diferentes aplicaciones en android Studio', '2019-09-26 18:45:04', '2019-09-26 18:45:04'),
(6, 'Aplicaciones con Android', 'Se desarollaran diferentes aplicaciones en android Studio', '2019-09-26 18:50:13', '2019-09-26 18:50:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'tejeda@gmail.com', '$2y$10$WaDJZ7T8FOed6MEFrK.Q4uULlw2Gifgg/xlX0Mr6qHC6iBP1CXtha', '2019-09-30 20:07:18', '2019-09-30 20:07:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`idp`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
