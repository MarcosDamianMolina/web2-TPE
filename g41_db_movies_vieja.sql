-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2024 a las 22:59:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `g41_db_movies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genre`
--

INSERT INTO `genre` (`id`, `genre`) VALUES
(5, 'Accion'),
(6, 'Aventura'),
(7, 'Comedia'),
(8, 'Crimen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `director` varchar(30) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movie`
--

INSERT INTO `movie` (`id`, `title`, `director`, `id_genre`, `description`, `img`) VALUES
(7, 'El padrino', 'Francis Ford Coppola', 8, 'Don Vito Corleone es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York en los años 40. El hombre tiene cuatro hijos: Connie, Sonny, Fredo y Michael, que no quiere saber nada de los negocios sucios de su padre. Cuando otro capo, Sollozzo, intenta asesinar a Corleone, empieza una cruenta lucha entre los distintos clanes.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdohemWWsH0BxkyIhJwlmTJmBK1Ix2jCXntg&s'),
(8, 'Kill bill', 'Quentin Tarantino', 5, 'Mamba Negra es una asesina que, el día de su boda, es atacada por los miembros de la banda de su jefe, Bill. Sin embargo consigue sobrevivir, aunque queda en coma. Cinco años después despierta, con un deseo de venganza.', 'https://clarovideocdn8.clarovideo.net/PARAMOUNT/PELICULAS/HDPSFF1744S1SDM/EXPORTACION_WEB/STILLS/HDPSFF1744S1SDM-STILL-02.jpg'),
(9, 'Jurassic Park', 'Steven Spielberg', 6, 'El multimillonario John Hammond hace realidad su sueño de clonar dinosaurios del Jurásico y crear con ellos un parque temático en una isla. Antes de abrir el parque al público general, Hammond invita a una pareja de científicos y a un matemático para que comprueben la viabilidad del proyecto. Sin embargo, el sistema de seguridad falla y los dinosaurios se escapan.\r\n', 'https://www.clarin.com/img/2021/05/21/wJI65YJFm_1200x0__1.jpg'),
(10, 'Rapido y furioso', 'Rob Cohen', 5, 'Cada noche, Los Ángeles es testigo de alguna carrera de coches. Últimamente ha aparecido un nuevo corredor, todos saben que es duro y que es rápido, pero lo que no saben es que es un detective con la determinación de salir victorioso.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7z1e4lie-fI0BKNJUgVEz2eALOzXVHbVLpg&s'),
(11, 'Son como niños', 'Dennis Dugan', 7, 'La muerte de su entrenador de baloncesto durante su infancia provoca la reunión de algunos viejos amigos, quienes se ven en el lugar en el que celebraron un campeonato años atrás. Los compañeros hablan sobre sus esposas y sus hijos, y descubren que la edad no necesariamente va de la mano con la madurez.', 'https://vanguardia.com.mx/binrepository/1152x750/0c51/1152d648/down-right/11604/DODC/son-como-ninos-3423_VG2735374_MG6836601.jpg'),
(12, 'La familia de mi novia', 'Jay Roach', 7, 'Greg Focker quiere casarse con su novia, Pam, pero antes de proponerle matrimonio, debe ganarse a su formidable padre, Jack Byrnes, un ex agente de la CIA sin ningún sentido del humor, en el casamiento de la hermana de Pam. Greg hace lo imposible por causar una buena impresión, pero su visita a la casa de los Byrnes resulta una hilarante serie de desastres en donde todo lo que puede salir mal sale mal, bajo la mirada crítica y desafiante de Jack.', 'https://http2.mlstatic.com/D_NQ_NP_659174-MLA74061994547_012024-B.webp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genre` (`id_genre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `id_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
