-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2018 a las 16:35:19
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `torneo`
--
CREATE DATABASE IF NOT EXISTS `torneo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `torneo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registers`
--

CREATE TABLE `registers` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `n_participants` int(11) NOT NULL,
  `category` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teamname` varchar(32) NOT NULL,
  `short_name` varchar(16) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(64) NOT NULL DEFAULT 'no address',
  `email` varchar(32) NOT NULL,
  `website` varchar(32) NOT NULL DEFAULT 'no website'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
