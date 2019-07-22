-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2019 a las 20:27:37
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portafolio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion`
--

CREATE TABLE `aplicacion` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `link` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aplicacion`
--

INSERT INTO `aplicacion` (`id`, `titulo`, `foto`, `descripcion`, `link`, `fecha`) VALUES
(32, 'Portafolio', 'frontend/assets/aplicacion/portafolio.png', 'Blog digital para subir links de descargas de documentos y aplicaciones realizadas.', 'http://localhost/Estructura/', '2019-07-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciontecnologia`
--

CREATE TABLE `aplicaciontecnologia` (
  `id` int(11) NOT NULL,
  `aplicacion` int(11) NOT NULL,
  `tecnologia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aplicaciontecnologia`
--

INSERT INTO `aplicaciontecnologia` (`id`, `aplicacion`, `tecnologia`) VALUES
(90, 32, 1),
(91, 32, 3),
(92, 32, 9),
(93, 32, 10),
(94, 32, 13),
(95, 32, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`) VALUES
(1, 'Análisis y Diseño'),
(2, 'Ingenieria de Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `link` varchar(300) NOT NULL,
  `archivo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id`, `titulo`, `link`, `archivo`, `fecha`, `nombre`, `descripcion`, `curso`) VALUES
(29, 'Taller 1', 'https://pilar1.surveykiwi.com/diagnosticodebd', 6, '2019-02-20', 'Diagnóstico', 'REALIZAR un diagnóstico de sus conceptos en BD y en Sistemas de Información.', 1),
(30, 'Taller 2', 'https://drive.google.com/file/d/1ctcIFyIrzHVz0Dygqk9C2gAGPEdWUFgc/view?usp=sharing', 1, '2019-02-23', 'Ficha bibliográfica', 'La importancia que tienen las referencias Bibliográfica y la utilización de los libros en el curso de Análisis y Desarrollo de Sistemas.', 1),
(31, 'Taller 3', 'https://drive.google.com/file/d/1LsDjAEZYLEd_pKjcznOp5yj7FPO-rrX7/view?usp=sharing', 1, '2019-02-23', 'Los Sistemas de información', 'Analizar y discutir al interior del grupo la importancia que tienen los Sistemas de Información en las Organzaciones.', 1),
(32, 'Taller 4', 'https://drive.google.com/file/d/18lMv1ajiMrfyjVcXj5vHqW04IK4QT3B_/view?usp=sharing', 1, '2019-02-25', 'Modelo de ciclo de vida del software', 'Conocer los diferentes ciclos de vida para el desarrollo de software.', 1),
(33, 'Ensayo', 'https://drive.google.com/file/d/1ZevuPax_926holfwXOYxCOci5NdaLSjV/view?usp=sharing', 1, '2019-03-03', 'Requisitos', 'De acuerdo a lo visto en clases, se debe realizar un ensayo sobre Requerimientos, para ello debe consultar en la Revista de ACM.', 1),
(34, 'Taller individual', 'https://drive.google.com/file/d/1OZfQ5BBuQlz_nziQYx7gQiq01vyx8IJo/view?usp=sharing', 1, '2019-03-26', 'Diagrama de Actividades', 'Conocer Articulos 55 al 66 del acuerdo 065 de 1996 del estatuto estudiantil.', 1),
(35, 'Trabajo grupal', 'https://drive.google.com/file/d/1I6ymA-3Hre1dCN0y4TlP8-AeEgpg63xt/view?usp=sharing', 1, '2019-04-12', 'Requisitos, casos de uso e interfaces del proyecto', 'Coordinar con los lideres de cada modulo de proyecto para realizar los requerimientos, casos de uso y las interfaces del proyecto asignado.', 1),
(36, 'Primer informe', 'https://docs.google.com/document/d/1_u0ThThqJwJAhLRRTr21VuiosryhgtwhaXFS6lyb-CE/edit', 1, '2019-04-12', 'Modelo de análisis', 'Informe modelo de análisis sobre aplicación web BOUTIQUESW.', 1),
(37, 'Taller grupal', 'https://drive.google.com/file/d/1BKrbXqeiRakaTk-8jyvkLJ0YlvH5Ao8W/view?usp=sharing', 1, '2019-05-03', 'Capitulos Diseño de Sistemas', 'Dinámica sobre los capitulos 6 y 7 del libro sobre Diseño de Sistemas.', 1),
(38, 'Segundo informe', 'https://docs.google.com/document/d/1lZKYhLzba-g8mnDA-bL_l1a_Gsm80EfWskCkcOmgZKQ/edit', 1, '2019-05-30', 'Modelo de diseño', 'Informe modelo de diseño sobre aplicación web BOUTIQUESW.', 1),
(39, 'Manual de usuario', 'https://drive.google.com/file/d/15MzrMg7agpyrH-iYmC606qiN2-5o2txe/view', 1, '2019-06-12', 'Manual de Usuario', 'Especificaciones tecnicas y explicación de los modulos y submodulos de la aplicación web BOUTIQUESW.', 1),
(40, 'Código del proyecto', 'https://drive.google.com/file/d/1f3XpscDvcq6KuwoNQ3-CSTqOsbsSYpvs/view', 3, '2019-06-12', 'Código aplicación web BoutiqueSW', 'Código frotend y backend de la aplicación BoutiqueSW y su correspondiente script .sql de la base de datos.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologia`
--

CREATE TABLE `tecnologia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tecnologia`
--

INSERT INTO `tecnologia` (`id`, `nombre`, `foto`, `color`) VALUES
(1, 'PHP', 'fab fa-php', 'info'),
(2, 'NODEJS', 'fab fa-node-js', 'success'),
(3, 'BASE DE DATOS', 'fas fa-database', 'dark'),
(4, 'PYTHON', 'fab fa-python', 'warning'),
(5, 'REACT', 'fab fa-react', 'dark'),
(6, 'SPRING', 'fab fa-envira', 'success'),
(7, 'SASS', 'fab fa-sass', 'danger'),
(8, 'VUEJ JS', 'fab fa-vuejs', 'primary'),
(9, 'JAVASCRIPT', 'fab fa-js', 'warning'),
(10, 'ANGULAR', 'fab fa-angular', 'danger'),
(11, 'LARAVEL', 'fab fa-laravel', 'dark'),
(12, 'JAVA', 'fab fa-java', 'info'),
(13, 'HTML', 'fab fa-html5', 'danger'),
(14, 'CSS', 'fab fa-css3-alt', 'warning');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `extension` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `extension`, `foto`) VALUES
(1, 'WORD', 'frontend/assets/archivo/word.jpg'),
(2, 'PDF', 'frontend/assets/archivo/pdf.png'),
(3, 'RAR', 'frontend/assets/archivo/rar.jpg'),
(4, 'EXCEL', 'frontend/assets/archivo/excel.jpg'),
(5, 'POWER POINT', 'frontend/assets/archivo/power.jpg'),
(6, 'PRUEBA', 'frontend/assets/archivo/prueba.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `documento`, `correo`, `contrasenia`) VALUES
(1, 'Alexander', 'Peñaloza', '1090494143', 'alexanderpenaloza3@gmail.com', 'Realmadrid94');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuariorol` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuariorol`
--

INSERT INTO `usuariorol` (`id`, `usuario`, `rol`) VALUES
(2, 1, 2),
(5, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aplicacion`
--
ALTER TABLE `aplicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aplicaciontecnologia`
--
ALTER TABLE `aplicaciontecnologia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aplicaciontecnologia_ibfk_1` (`aplicacion`),
  ADD KEY `aplicaciontecnologia_ibfk_2` (`tecnologia`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso`),
  ADD KEY `archivo` (`archivo`);

--
-- Indices de la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aplicacion`
--
ALTER TABLE `aplicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `aplicaciontecnologia`
--
ALTER TABLE `aplicaciontecnologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aplicaciontecnologia`
--
ALTER TABLE `aplicaciontecnologia`
  ADD CONSTRAINT `aplicaciontecnologia_ibfk_1` FOREIGN KEY (`aplicacion`) REFERENCES `aplicacion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aplicaciontecnologia_ibfk_2` FOREIGN KEY (`tecnologia`) REFERENCES `tecnologia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `taller`
--
ALTER TABLE `taller`
  ADD CONSTRAINT `taller_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `taller_ibfk_2` FOREIGN KEY (`archivo`) REFERENCES `tipo` (`id`);

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD CONSTRAINT `usuariorol_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
