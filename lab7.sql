-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2024 a las 22:38:28
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
-- Base de datos: `lab7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Cod_cli` int(10) NOT NULL,
  `nombreC` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Cod_cli`, `nombreC`, `email`, `direccion`) VALUES
(1, 'Alex Carnelli', 'agcarnelli4324@mail.com', 'Washington 1234'),
(2, 'Alex Carnelli', 'agcarnelli4324@mail.com', 'Washington 1234'),
(3, 'Alex Carnelli', 'agcarnelli4324@mail.com', 'Washington 1234'),
(4, 'AA CC', 'CC', 'CC 22'),
(5, 'dsfdsf Carnelli', 'agcarnelli4324@mail.com', 'dee 3333'),
(6, 'aaaa aa', 'aa', 'Washington 22'),
(7, 'ale cccc', 'awdsa', 'dsas 222'),
(8, 'ceci wilkinson', 'hjbjhkb', 'g 77');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `cod_cli` int(11) NOT NULL,
  `cod_prod` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`cod_cli`, `cod_prod`, `fecha`) VALUES
(2, 3, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `Cod` int(10) NOT NULL,
  `Cod_P` int(10) NOT NULL,
  `Origen` varchar(200) NOT NULL,
  `Descripcion` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`Cod`, `Cod_P`, `Origen`, `Descripcion`) VALUES
(1, 1, 'Paysandú', 'De plastico refinado'),
(2, 4, 'Montevideo', 'Es de madera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Cod_p` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Cod_p`, `nombre`, `precio`) VALUES
(1, 'Botella', 0),
(2, 'Botella', 300),
(3, 'Botella', 300),
(4, 'ewe', 343),
(5, 'armario', 200),
(6, '', 0),
(7, '', 0),
(8, '', 0),
(9, '', 0),
(10, 'vfev', 3444),
(11, 'dd', 2147483647),
(12, 'a', 0),
(13, 'PC', 20000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Cod_cli`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`Cod`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Cod_p`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Cod_cli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `Cod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Cod_p` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
