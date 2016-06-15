-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2016 a las 00:19:15
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gruasmancera`
--

-- --------------------------------------------------------

-- --------------------------------------------------------

--------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruas`
--

CREATE TABLE IF NOT EXISTS `gruas` (
  `id_grua` int(11) NOT NULL AUTO_INCREMENT,
  `placas` varchar(15) NOT NULL UNIQUE,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_operador` int(11) NOT NULL,
  PRIMARY KEY (`id_grua`),
  FOREIGN KEY (`id_operador`) REFERENCES operadores(`id_operador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gruas`
--

INSERT INTO `gruas` (`placas`, `marca`, `modelo`, `tipo`, `numero`, `created_at`,) VALUES
('placas', 'marca22              \r\n       ', 'modelo22', 'tipo22', 22, '2016-04-26 23:06:32',1)

INSERT INTO `gruas` (`placas`, `marca`, `modelo`, `tipo`, `numero`, `created_at`) 
('placas11', 'marca11', 'modelo11', 'tipo11', 0, '2016-04-26 23:06:56', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `importes`
--
-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

--
-- Estructura de tabla para la tabla `recibos_efectivo`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_vehiculo`
--

--
-- Volcado de datos para la tabla `recibos_vehiculo`
--

INSERT INTO `recibos_vehiculo` (`id_recibo_vehiculo`, `suscriptor`, `marca`, `tipo`, `modelo`, `color`, `fecha_ingreso`, `fecha_documento`, `autoridad`, `nombre_cliente`, `created_at`, `placas`) VALUES
(2, 'Julio', 'VW', 'Carro', 'Bora', 'Azul', '2015-12-31', '2016-10-30', 'A', 'Cesar', '2016-05-03 22:46:18', 'A232WS12W1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `id` int(11) NOT NULL,
  `nservicio` text COLLATE utf8_spanish_ci NOT NULL,
  `ninventario` text COLLATE utf8_spanish_ci NOT NULL,
  `noperador` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `placas` text COLLATE utf8_spanish_ci NOT NULL,
  `marca` text COLLATE utf8_spanish_ci NOT NULL,
  `color` text COLLATE utf8_spanish_ci NOT NULL,
  `modelo` text COLLATE utf8_spanish_ci NOT NULL,
  `motivo` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `autoridad` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechasalida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `nservicio`, `ninventario`, `noperador`, `fecha`, `placas`, `marca`, `color`, `modelo`, `motivo`, `imagen`, `observaciones`, `autoridad`, `created_at`, `fechasalida`) VALUES
(1, '1', '1', '', '2015-04-11', 'MICH', 'REMOSA', '', '12.20 KTS PLATAFORMA (8-27-85)', '', '614136_20150320_222252.jpg', 'PLATAFORMA CON REDILAS DE 3 EJES COLOR ROJO', '', '2016-03-12 02:45:30', '0000-00-00'),
(2, '2', '2', '', '2014-02-02', 'PHB 29-05 MICH', 'VOLKSWAGEN GOLF 4 PUER ', 'COLOR NEGRO ', '1993', '', '585693_4914_default.png', 'C/INVENTARIO', 'Federal', '2016-03-12 02:45:30', '0000-00-00'),
(3, '3', '3', '', '2015-04-11', 'TEXAS 814 WJ', 'NISSAN', 'COLOR AZUL', 'PICK UP', '', '657226_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(4, '4', '4', '', '2015-04-11', '', 'NISSAN TSURU', '', 'SEDAN 4 PUERTAS 1992', '', '514435_default.png', 'TAXI TARASE S/PLACAS CALCOMANIA 9157 LCT', '', '2016-03-12 02:45:30', '0000-00-00'),
(5, '5', '5', '', '0000-00-00', 'NK-13234 MICH', 'NISSAN', 'COLOR GRIS ', 'PICK UP', '', '534790_default.png', 'DOBLE CABINA', '', '2016-03-12 02:45:30', '0000-00-00'),
(6, '6', '6', '', '2015-04-11', 'PGS 89-49 MICH', 'CHEVROLET', 'COLOR BLANCO', 'SEDAN CHEVY 2 PUERTAS', '', '356354_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(7, '7', '7', '', '0000-00-00', '19179', 'DODGE', '', 'GRAND CHEROKEE 4 PUERTAS', '', '891174_default.png', 'LA TRAIA ENRIQUE', '', '2016-03-12 02:45:30', '0000-00-00'),
(8, '8', '8', '', '2015-04-11', '414 VVY DISTRITO FEDERAL', 'CHEVROLET', 'COLOR GRIS', 'SEDAN CHEVY  2 PUERTAS', '', '483490_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(9, '9', '9', '', '0000-00-00', '666 BYM DISTRITO FEDERAL', 'BMW', 'BLANCO', 'X5 2005', '', '405274_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(10, '10', '10', '', '2015-04-11', '832 WLG DISTRITO FEDERAL', 'VOLKSWAGEN', 'COLOR AZUL CLARO', 'SEDAN 2 PUERTAS BEETLE 2003', '', '51545_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(11, '11', '11', '', '2015-04-11', 'PSS 25-02 MICH', 'FORD', 'COLOR GUINDA ', 'MUSTANG', '', '229431_default.png', 'CONVERTIBLE', '', '2016-03-12 02:45:30', '0000-00-00'),
(12, '12', '12', '', '2015-04-11', 'PRZ 43-07 MICH', 'VOLKSWAGEN', 'COLOR AZUL MARINO', 'SEDAN 4 PUER. JETTA', '', '665985_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(13, '13', '13', '', '0000-00-00', 'PRD 27-94 MICH', 'FORD', 'GRIS', 'SEDAN 2 PUER. KA', '', '684509_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(14, '14', '14', '', '2015-04-11', 'PGC 3374 MICH', 'CHRYSLER', 'ROJO', 'SEDAN 2 PUER. CAVALIER', '', '269501_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(15, '15', '15', '', '2015-04-11', '', 'CHEVROLET', '', 'GRUA COMANDO', '', '142945_default.png', 'GRUA', '', '2016-03-12 02:45:30', '0000-00-00'),
(16, '16', '16', '', '2015-04-11', 'NP 60860 MICH', 'NISSAN', 'VERDE', 'PICK-UP TITAN V8', '', '270172_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(17, '17', '17', '', '0000-00-00', 'PGT 7537 MICH', 'NISSAN', 'BLANCO', 'SEDAN 4 PUER TSURU', '', '622375_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(18, '18', '18', '', '2015-04-11', '83-23 LCT MICH', 'NISSAN', 'BLANCO', 'SEDAN 4 PUER TSURU', '', '809417_default.png', 'TAXI ', '', '2016-03-12 02:45:30', '0000-00-00'),
(19, '19', '19', '', '2015-04-11', 'PGS 95-37 MICH', 'NISSAN', 'BLANCO', 'SEDAN 4 PUER TSURU', '', '56397_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(20, '20', '20', '', '0000-00-00', '15-22 LCH', 'DODGE', '', 'SEDAN 4 PUER ATOS', '', '648956_default.png', 'TAXI V. GUERRERO', '', '2016-03-12 02:45:30', '0000-00-00'),
(21, '21', '21', '', '0000-00-00', 'PFH 58-31 MICH', 'DODGE', 'VERDE', 'GRAND CHEROKEE 4 PUERTAS', '', '472351_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(22, '22', '22', '', '0000-00-00', 'NO TRAE', 'NISSAN', 'AZUL', 'SEDAN 4 PUER TSURU', '', '769256_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(23, '23', '23', '', '0000-00-00', 'PHZ 46-07', 'DODGE', 'GRIS', 'SEDAN 4 PUER PATRIOT 2009', '', '741333_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(24, '24', '24', '', '0000-00-00', 'PHU 20-75 MICH', 'BUICK', '', 'SEDAN 4 PUER', '', '119538_default.png', 'ARENA', '', '2016-03-12 02:45:30', '0000-00-00'),
(25, '25', '25', '', '0000-00-00', 'GH 53-044 GUANAJUATO', 'TOYOTA', 'ROJO', 'PICK-UP', '', '328186_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(26, '26', '26', '', '0000-00-00', 'NO TRAE', 'NISSAN', 'BLANCO', 'SEDAN 4 PUER', '', '367767_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(27, '27', '27', '', '0000-00-00', 'NO TRAE', 'CHEVROLET', 'BLANCO', 'PICK-UP SILVERADO', '', '41504_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(28, '28', '28', '', '0000-00-00', 'JP 46-327 MEXICO', 'FORD', 'NEGRO', 'PICK-UP LOBO', '', '650665_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(29, '29', '29', '', '0000-00-00', 'MU 01-465 MICH', 'FORD', 'ROJO', 'DOBLE RODADO', '', '783630_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(30, '30', '30', '', '0000-00-00', '', 'AVIONETA', 'BLANCA', '', '', '323700_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(31, '31', '31', '', '0000-00-00', 'PFJ 42-62 MICH', 'CHEVROLET', 'AZUL', 'SEDAN 4 PUER CORSICA', '', '300659_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(32, '32', '32', '', '0000-00-00', 'MX 38-809 MICH', 'FORD', 'GRIS', 'PICK-UP RANGER XLT', '', '711090_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(33, '33', '33', '', '2015-04-11', 'MX 15-528', 'FORD', 'BLANCO/VERDE RECICLADO MAT', 'PICK-UP', '', '932434_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(34, '34', '34', '', '2015-04-11', 'NO TRAE', 'FORD', 'GRIS ', 'EXPLORER', '', '855804_default.png', 'AMERICANA', '', '2016-03-12 02:45:30', '0000-00-00'),
(35, '35', '35', '', '2015-04-11', 'MT 55-933 MICH', 'NISSAN', 'GRIS', 'PICK-UP', '', '362549_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(36, '36', '36', '', '2015-04-11', ' ND 17-022 MICH', 'CHEVROLET', 'VERDE', 'PICK-UP', '', '269562_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(37, '37', '37', '', '2015-04-11', 'PGP 70-35 MICH', 'DODGE', 'GRIS', 'SEDAN 4 PUERTAS STRATUS', '', '368347_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(38, '38', '38', '', '2015-04-11', 'NO TRAE', 'CHEVROLET', 'BLANCO/NEGRO', 'SEDAN 4 PUER CAVALIER', '', '682831_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(39, '39', '39', '', '2015-04-11', 'NO TRAE', 'GMC', 'VERDE ', 'PICK-UP', '', '570923_default.png', 'DOBLE CABINA', '', '2016-03-12 02:45:30', '0000-00-00'),
(40, '40', '40', '', '2015-04-11', 'UWW 99-72 CAROLINA', 'CHEVROLET', 'NEGRO DOBLE CABINA', 'PICK-UP SILVERADO', '', '794830_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(41, '41', '41', '', '2015-04-11', 'PSS 25-94 MICH', 'NISSAN', 'BLANCO', 'SEDAN 4 PUER', '', '185120_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(42, '42', '42', '', '2015-04-11', 'PPC 15-71 MICH', 'NISSAN', 'BLANCO', 'SEDAN 4 PUER 1995', '', '23530_default.png', 'TIPO VAGONETA', '', '2016-03-12 02:45:30', '0000-00-00'),
(43, '43', '43', '', '2015-04-11', 'PSL-6578 MICH', 'SEAT', 'GRIS', 'SEDAN 2 PUERTAS IBIZA', '', '769531_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(44, '44', '44', '', '2015-04-11', 'BM-04-328 BAJA CALIFORNIA', 'CHEVROLET', 'COLOR ROJO ', 'PICK-UP', '', '255646_default.png', '(PERDIDA TOTAL)', '', '2016-03-12 02:45:30', '0000-00-00'),
(45, '45', '45', '', '2015-04-11', '', 'EQUIPO DE GRUA', '', '', '', '976501_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(46, '46', '46', '', '2015-04-11', 'PND- 2976 MICH', 'CHEVROLET', 'AZUL VERDE', 'CHEVY VAN 20', '', '596649_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(47, '47', '47', '', '2015-04-11', 'PHJ-8035 MICH', 'DODGE', 'VERDE', 'GRAN CHEROKEE', '', '302124_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(48, '48', '48', '', '2015-04-11', 'NO TRAE', 'DODGE', 'AZUL', 'GRAND CARAVAN', '', '120758_default.png', '(PERDIDA TOTAL)', '', '2016-03-12 02:45:30', '0000-00-00'),
(49, '49', '49', '', '0000-00-00', 'PJG-6510 MICH', '', 'ROJO', 'LINCON', '', '130249_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(50, '50', '50', '', '0000-00-00', 'JBT-2263 MEXICO', 'FORD', 'ROJO', 'FIESTA SEDAN 4 PUERTAS', '', '386383_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(51, '51', '51', '', '0000-00-00', 'TL-48068 SAN LUIS P.', 'CHEVROLET', '', 'DOBLE RODADO', '', '789367_default.png', 'BLANCO', '', '2016-03-12 02:45:30', '0000-00-00'),
(52, '52', '52', '', '0000-00-00', 'S/P', 'NISSAN', '', 'TSURU', '', '511566_default.png', 'TAXI MORELIA', '', '2016-03-12 02:45:30', '0000-00-00'),
(53, '53', '53', '', '0000-00-00', '03472', 'GMC PICK UP 2500', 'ROJA', '', '', '90577_default.png', 'UNION CAMPESINA DEMOCRATICA', '', '2016-03-12 02:45:30', '0000-00-00'),
(54, '54', '54', '', '0000-00-00', 'MX-35934 MICH', 'FORD', 'AZUL', 'F 250', '', '874542_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(55, '55', '55', '', '0000-00-00', 'S/P', 'FORD', 'PLATA', 'FOCUS', '', '561218_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(56, '56', '56', '', '0000-00-00', 'PMP-9320 MICH', 'VOLKSWAGEN', 'COBRE', 'SEDAN', '', '955780_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(57, '57', '57', '', '0000-00-00', '42QD564 CALIFORNIA', 'HONDA', 'VERDE', 'CIVIC', '', '572388_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(58, '58', '58', '', '0000-00-00', 'S/P', 'NISSAN', '', 'SENTRA', '', '204499_default.png', 'TAXI VIP', '', '2016-03-12 02:45:30', '0000-00-00'),
(59, '59', '59', '', '0000-00-00', 'S/P', 'NISSAN', '', 'TSURU', '', '88929_default.png', 'TAXI VICENTE GUERRERO', '', '2016-03-12 02:45:30', '0000-00-00'),
(60, '60', '60', '', '0000-00-00', 'S/P', 'NISSAN', '', 'TSURU', '', '788665_default.png', 'TAXI ALFA', '', '2016-03-12 02:45:30', '0000-00-00'),
(61, '61', '61', '', '0000-00-00', 'S/P', 'DODGE', 'BLANCO', 'RAM', '', '419434_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(62, '62', '62', '', '0000-00-00', 'GSB-8176 GUANAJUATO', 'VOLKSWAGEN', 'GUINDA', 'BORA', '', '345001_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(63, '63', '63', '', '0000-00-00', 'MX-36006 MICH', 'FORD', 'NEGRO', 'F150', '', '966247_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(64, '64', '64', '', '0000-00-00', 'GZN-2167 GUERRERO', 'VOLKSWAGEN', 'BLANCO', 'POLO', '', '728973_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(65, '65', '65', '', '0000-00-00', 'P062UK TEXAS', 'MERCURY', 'VERDE', 'VILLAGER', '', '975463_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(66, '66', '66', '', '0000-00-00', '3WLD486 CALIFORNIA', 'FORD', 'NEGRO', 'EXPEDITION', '', '764801_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(67, '67', '67', '', '0000-00-00', 'S/P', 'NISSAN', '', 'SENTRA', '', '671020_default.png', 'TAXI MAQUINAS ROJAS', '', '2016-03-12 02:45:30', '0000-00-00'),
(68, '68', '68', '', '0000-00-00', 'PJB-8007 MICH', 'CHEVROLET', 'GRIS', 'CAVALIER', '', '836242_default.png', 'TAXI MAQUINAS ROJAS', '', '2016-03-12 02:45:30', '0000-00-00'),
(69, '69', '69', '', '0000-00-00', '4219-LCT', 'NISSAN', '', 'TSURU', '', '620941_default.png', 'TAXI MIRINDA', '', '2016-03-12 02:45:30', '0000-00-00'),
(70, '70', '70', '', '0000-00-00', 'PSM-5928', 'NISSAN', 'AZUL', 'TSURU', '', '12452_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(71, '71', '71', '', '0000-00-00', 'MY-14985 MICH', 'FORD', '', 'F250 CUSTOM', '', '358917_default.png', 'DESPINTADO', '', '2016-03-12 02:45:30', '0000-00-00'),
(73, '73', '73', '', '0000-00-00', 'PSF 8887', 'NISSAN', 'BLANCO', 'SENTRA', '', '455475_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(74, '74', '74', '', '0000-00-00', 'S/P', 'CHEVROLET', 'PLATA', 'CAPTIVA', '', '271149_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(75, '75', '75', '', '0000-00-00', 'S/P', 'BMW', 'PLATA', 'X5', '', '228821_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(76, '76', '76', '', '0000-00-00', 'S/P', 'GMC', 'GUINDA', '3500', '', '284699_default.png', 'DOBLE RODADO', '', '2016-03-12 02:45:30', '0000-00-00'),
(77, '77', '77', '', '0000-00-00', 'PHT-2173', 'DODGE', '', 'ATOS', '', '286926_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(78, '78', '78', '', '0000-00-00', 'S/P', 'CHEVROLLETE', 'BLANCO', 'S10', '', '995452_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(79, '79', '79', '', '0000-00-00', 'S/P', 'FORD', 'NEGRO', 'LOBO 4 PUERTAS', '', '84229_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(80, '80', '80', '', '0000-00-00', 'S/P', 'TOYOTA', 'BLANCO', 'TACOMA', '', '432648_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(81, '81', '81', '', '0000-00-00', 'S/P', 'FORD', 'BLANCO', 'F250 4 PUERTAS', '', '644714_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(82, '82', '82', '', '0000-00-00', 'S/P', 'HONDA', 'VERDE', 'CIVIC', '', '359741_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(83, '83', '83', '', '0000-00-00', 'S/P', 'HONDA', 'VERDE', 'ACCORD', '', '901031_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(84, '84', '84', '', '0000-00-00', 'S/P', 'VOLKSWAGEN', 'GRIS', 'GOLF 4 PUERTAS', '', '386047_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(85, '85', '85', '', '0000-00-00', 'S/P', 'TOYOTA', 'PLATA', 'CAMBRY', '', '49653_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(86, '86', '86', '', '0000-00-00', 'PRD-3249 MICH', 'NISSAN', 'ROJO', 'TSURU', '', '306854_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(87, '87', '87', '', '0000-00-00', 'PRY-9118 MICH', 'NISSAN', 'GRIS', 'TSURU', '', '89478_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(88, '88', '88', '', '0000-00-00', 'S/P', 'MINI COOPER', 'GRIS/NEGRO', 'SEDAN 2 PUERTAS', '', '144623_default.png', 'POLARIZADO', '', '2016-03-12 02:45:30', '2015-05-08'),
(89, '89', '89', '', '0000-00-00', 'ULZ 61-68 QUERETARO', 'CHEVY', '', 'SEDAN 2 PUERTAS', '', '209442_default.png', 'CHOCADO TRASERO', '', '2016-03-12 02:45:30', '0000-00-00'),
(90, '90', '90', '', '0000-00-00', 'S/P', 'CHEVROLET', 'GRIS PLATA ', 'PICK-UP CAMIONETA', '', '346558_default.png', 'GOLPE DEL CHOFER', '', '2016-03-12 02:45:30', '0000-00-00'),
(91, '91', '91', '', '0000-00-00', 'MT-92065', 'CHEVROLET', 'AZUL Y BLANCO ', 'PICK-UP CAMIONETA', '', '805816_default.png', 'MALTRATADA Y CARGADA CON MADERA, PESIMAS CONDICIONES', '', '2016-03-12 02:45:30', '0000-00-00'),
(92, '92', '92', '', '0000-00-00', 'MT-048049', 'FORD', 'GUINDA ', 'PICK-UP CAMIONETA', '', '757629_default.png', 'C/TRONCOS MALAS CONDICIONES', '', '2016-03-12 02:45:30', '0000-00-00'),
(93, '93', '93', '', '0000-00-00', 'S/P', 'YAMAHA', 'ROJO ', 'MOTOCICLETA', '', '302094_default.png', 'MALAS CONDICIONES', '', '2016-03-12 02:45:30', '0000-00-00'),
(94, '94', '94', '', '0000-00-00', 'S/P', 'CUATRIMOTO', '', '', '', '508057_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(95, '95', '95', '', '0000-00-00', '', '5 CONTENEDORES PARA AGUA', 'NARANJA/BLANCO', '', '', '629913_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(96, '96', '96', '', '0000-00-00', 'S/P', 'NISSAN', 'ROJO ', 'MARCH SEDAN 4 PUERTAS', '', '968750_default.png', 'CHOCADO DEL LADO DEL CHOFER', '', '2016-03-12 02:45:30', '0000-00-00'),
(97, '97', '97', '', '0000-00-00', '', 'GRUA GMC', '', '', '', '4914_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(98, '98', '98', '', '0000-00-00', 'PJK-3147 MICH', 'CHEVROLET', 'AZUL ', 'TRACKER 4 PUERTAS', '', '21668_default.png', 'GOLPE TRASERO LADO IZQ PINTURA MALTRATADA LLANTA DE REF. TRASERA', '', '2016-03-12 02:45:30', '0000-00-00'),
(99, '99', '99', '', '0000-00-00', 'MX-85573 MICH', 'FORD', 'BLANCA', 'COURIER CAMIONETA 2 PUERTAS', '', '394745_default.png', 'GOLPE PARTE TRASERA Y COFRE', '', '2016-03-12 02:45:30', '2015-05-15'),
(100, '100', '100', '', '2015-04-11', 'PHF--6510 MICH', 'PLYMOUTH', 'GUINDA', '4 PUERTAS', '', '19745_default.png', 'C/RAYONES Y PINTURA DETERIORADA', '', '2016-03-12 02:45:30', '0000-00-00'),
(101, '101', '101', '', '0000-00-00', 'S/P', 'DODGE', '', 'VAN 2 PUERTAS', '', '794555_default.png', 'AMBULANCIA CRUZ AMBAR MALTRATADA', '', '2016-03-12 02:45:30', '0000-00-00'),
(102, '102', '102', '', '0000-00-00', 'PSJ-1974 MORELIA MICH', 'NISSAN', 'BLANCO ', 'TSURU 4 PUERTAS', '', '670807_default.png', 'GOLPES LADO DEL CHOFER', '', '2016-03-12 02:45:30', '0000-00-00'),
(103, '103', '103', '', '0000-00-00', 'JM-57-668 JALISCO', 'FRIGHTLINER', 'BLANCO ', 'CAMION', '', '113465_default.png', 'C/CAJA Y LLANTA DE REFACCION', '', '2016-03-12 02:45:30', '2015-05-20'),
(104, '104', '104', '', '0000-00-00', 'MX-14-621 MICH', '', '', 'CAMIONETA PICK-UP', '', '166565_default.png', 'RIN SALIDO LADO DERECHO', '', '2016-03-12 02:45:30', '0000-00-00'),
(105, '105', '105', '', '0000-00-00', '267--AF-6 CARGA MEXICO', 'GMS', '', 'TRACTOR VOLVO', '', '501068_default.png', 'CHOCADO LADO DERECHO', '', '2016-03-12 02:45:30', '0000-00-00'),
(106, '106', '106', '', '0000-00-00', '6A-20-735 PRIVADO GUANAJUATO', 'CAMION CON REDILAS', '', '', '', '970489_default.png', 'PESIMAS CONDICIONES S/ COFRE Y ASIENTOS', '', '2016-03-12 02:45:30', '0000-00-00'),
(107, '107', '107', '', '0000-00-00', 'PMW-90-77 MICH', 'FORD', 'AZUL MARINO', 'GRAND MARQUIS', '', '894470_default.png', 'LIMOUSINA COFRE LEVANTADO', '', '2016-03-12 02:45:30', '0000-00-00'),
(108, '108', '108', '', '0000-00-00', '157CY3', '', 'BLANCO', 'CAMION CHATO', '', '655243_default.png', 'CHOCADO SERVICIO PUBLICO DE CARGA', '', '2016-03-12 02:45:30', '0000-00-00'),
(109, '109', '109', '', '0000-00-00', '', 'FORD', 'BLANCO', 'CAMIONETA PICK-UP', '', '688843_default.png', 'CHOCADA', 'POLICIA DE URUAPAN ', '2016-03-12 02:45:30', '0000-00-00'),
(110, '110', '110', '', '0000-00-00', 'S/P', 'PLYMOUTH', 'AZUL', 'SEDAN 2 PUERTAS', '', '273102_default.png', 'MALAS CONDICIONES Y OXIDADO', '', '2016-03-12 02:45:30', '0000-00-00'),
(111, '111', '111', '', '0000-00-00', 'PJH.69-88', 'FORD', '', 'CAMIONETA EXPEDITION', '', '441711_default.png', 'CHOCADO LADO IZQUIERDO', '', '2016-03-12 02:45:30', '0000-00-00'),
(112, '112', '112', '', '2014-06-09', 'PPL-55-89 MICH', 'VOLKSWAGEN', '', 'GRUA', '', '669555_default.png', 'MO TIENE LLANTAS NI LUCES FRONTALES', '', '2016-03-12 02:45:30', '0000-00-00'),
(113, '113', '113', '', '0000-00-00', '', 'FORD', '', 'F-150 CAMIONETA PICK-UP', '', '321289_default.png', 'COLOR BLANCA CHOCADA', '', '2016-03-12 02:45:30', '0000-00-00'),
(114, '114', '114', '', '0000-00-00', 'S/P', 'FORD', '', 'CAMIONETA PICK-UP', '', '897247_default.png', 'CHOCADA', '', '2016-03-12 02:45:30', '0000-00-00'),
(115, '115', '115', '', '0000-00-00', 'PJB-57-54', 'NISSAN', '', 'SEDAN 4 PUERTAS', '', '214020_default.png', 'SIN LLANTAS DELANTERAS', '', '2016-03-12 02:45:30', '0000-00-00'),
(116, '116', '116', '', '0000-00-00', 'S/P', 'VOLKSWAGEN', 'BLANCA', 'COMBI', '', '251770_default.png', 'CHOCADA', '', '2016-03-12 02:45:30', '0000-00-00'),
(117, '117', '117', '', '0000-00-00', 'S/P', 'FORD', 'AZUL', 'CaMIONETA 4 PUERTAS', '', '163422_default.png', 'CHOCADA', '', '2016-03-12 02:45:30', '0000-00-00'),
(118, '118', '118', '', '0000-00-00', 'S/P', 'PONTIAC', 'CAFÃƒâ?° OSCURO', 'GRAN PRIX 4 PUERTAS', '', '392822_default.png', 'PARABRISAS DICE TANCITARO', '', '2016-03-12 02:45:30', '0000-00-00'),
(119, '119', '119', '', '0000-00-00', 'S/P', 'FORD', 'BLANCO', 'FIESTA SEDAN 4 PUERTAS', '', '69367_default.png', 'CHOCADO CON FECHA 27/07/14', '', '2016-03-12 02:45:30', '0000-00-00'),
(120, '120', '120', '', '0000-00-00', 'PRZ-13-88', 'CHEVROLET', '', 'SEDAN 4 PUERTAS', '', '400604_default.png', 'CON INVENTARIO PEGADO CHOCADO FECHA 28/MAYO/14', '', '2016-03-12 02:45:30', '0000-00-00'),
(121, '121', '121', '', '0000-00-00', 'PHZ-57-72 MICH', 'NISSAN', '', '', '', '308228_default.png', 'CHOCADO FECHA 26/12/12', '', '2016-03-12 02:45:30', '0000-00-00'),
(122, '122', '122', '', '0000-00-00', '', 'CAMIONETA REDILAS', 'BLANCA', '', '', '661041_default.png', 'MALAS CONDICIONES', '', '2016-03-12 02:45:30', '0000-00-00'),
(123, '123', '123', '', '0000-00-00', '', '', '', 'CARROS TIPO SEDAN', '', '411072_default.png', 'RESTOS ENCIMADOS', '', '2016-03-12 02:45:30', '0000-00-00'),
(124, '124', '124', '', '0000-00-00', '', '', '', 'CARRO', '', '464813_default.png', 'QUEMADO U OXIDADO ARRIBA', '', '2016-03-12 02:45:30', '0000-00-00'),
(125, '125', '125', '', '0000-00-00', 'MY-80-772', 'GMC', '', 'CAMIONETA PICK-UP', '', '432007_default.png', 'PESIMAS CONDICIONES C/INVENTARIO PEGADO', 'ESTATAL', '2016-03-12 02:45:30', '0000-00-00'),
(126, '126', '126', '', '0000-00-00', '', 'DODGE', 'BLANCA', 'CAMIONETA ', '', '777984_default.png', 'MALAS CONDICIONES Y ENCIMADA', '', '2016-03-12 02:45:30', '0000-00-00'),
(127, '127', '127', '', '0000-00-00', '258-UES D.F.', '', 'BLANCA', 'CAMIONETA WAGONER 4 PUERTAS', '', '617035_default.png', 'MALAS CONDICIONES', '', '2016-03-12 02:45:30', '0000-00-00'),
(128, '128', '128', '', '0000-00-00', '', '', 'VERDE', 'SEDAN 4 PUERTAS', '', '102112_default.png', 'MALAS CONDICIONES', '', '2016-03-12 02:45:30', '0000-00-00'),
(129, '129', '129', '', '0000-00-00', 'PFV 20 96 MICH', 'JEEP', 'GRIS', 'CHEROKEE', '', '45807_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(130, '130', '130', '', '0000-00-00', '', 'Chato ', 'BLANCO CON RAYAS VERDES', 'Tracto CamiÃƒÂ³n', '', '320069_default.png', 'PESIMAS CONDICIONES, TIENE 2 NO. 433 Y 104 SIN MOTOR', '', '2016-03-12 02:45:30', '0000-00-00'),
(131, '131', '131', '', '0000-00-00', '', 'Camioneta ', 'AZUL MARINO', 'PICK UP ', '', '389191_default.png', 'con inventario pegado DEL 11 DE ABRIL 2014', '', '2016-03-12 02:45:30', '0000-00-00'),
(132, '132', '132', '', '0000-00-00', 'GH-41-469  GTO', 'NISSAN', 'GRIS', 'TOYOTA 4 PUERTAS', '', '157898_default.png', 'CUIDADA SIN GOLPES', '', '2016-03-12 02:45:30', '0000-00-00'),
(133, '133', '133', '', '0000-00-00', '', 'MOTO', '', 'CUATRIMOTO', '', '493866_default.png', 'PESIMAS CONDICIONES', '', '2016-03-12 02:45:30', '0000-00-00'),
(134, '134', '134', '', '0000-00-00', 'S/P', 'GMC', 'ROJA', '', '', '203522_default.png', 'CHOCADA DEL FRENTE', '', '2016-03-12 02:45:30', '0000-00-00'),
(135, '135', '135', '', '0000-00-00', 'NM-9784', 'NISSAN  PICK UP', 'ROJO', '', '', '891113_default.png', '4X4', '', '2016-03-12 02:45:30', '0000-00-00'),
(136, '136', '136', '', '0000-00-00', 'NK-90048', 'TOYOYA', 'AZUL / FRANJAS GRISES', 'PICK UP', '', '690338_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(137, '137', '137', '', '0000-00-00', 'PPA-15-93', 'FORD', 'BLANCO', 'WINDSTAR', '', '245362_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(138, '138', '138', '', '0000-00-00', 'PHZ-80-67', 'VOLSWAGEN', 'PLATA', 'BORA GLI', '', '496124_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(139, '139', '139', '', '0000-00-00', 'PHC-3416', 'VOLSWAGEN', 'BLANCO', 'JETTA', '', '211182_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(140, '140', '140', '', '0000-00-00', '45-73-LCT', 'NISSAN', '', 'TSURU', '', '270539_default.png', 'RADIO TAXI LA MISION', '', '2016-03-12 02:45:30', '0000-00-00'),
(141, '141', '141', '', '0000-00-00', '4M74520', 'NISSAN', 'BLANCO', 'PICK UP', '', '974792_default.png', 'AMERICANA', '', '2016-03-12 02:45:30', '0000-00-00'),
(142, '142', '142', '', '0000-00-00', '50-72-LCH ', 'NISSAN', '', 'TSURU', '', '136048_default.png', 'TAXI MORELIA ', '', '2016-03-12 02:45:30', '0000-00-00'),
(143, '143', '143', '', '0000-00-00', 'PHX-42-88', 'HONDA', 'GRIS OSCURO', 'CAMIONETA PILOT', '', '295471_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(144, '144', '144', '', '0000-00-00', 'DPH-22-45', 'JEEP LIMITE', 'GRIS', 'CAMIONETA', '', '551849_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(145, '145', '145', '', '0000-00-00', 'S/PLACAS', 'NISSAN SENTRA', 'BLANCO CON VERDE', '', '', '856445_default.png', 'TAXI VICENTE GUERRERO ', '', '2016-03-12 02:45:30', '0000-00-00'),
(146, '146', '146', '', '0000-00-00', 'BXEN515', 'FORD', 'VINO', 'CAMIONETA EDGE', '', '229279_default.png', 'AMERICANA', '', '2016-03-12 02:45:30', '0000-00-00'),
(147, '147', '147', '', '0000-00-00', 'PFF-61-69', 'VOLSWAGEN', 'VINO', 'JETTA', '', '602478_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(148, '148', '148', '', '0000-00-00', 'MZ26-134', 'CHEVROLET', 'GRIS OSCURO', 'SILVERADO PICK UP', '', '328095_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(149, '149', '149', '', '0000-00-00', 'GPJZ200', 'ACURA TSX', 'VINO', 'CARRO', '', '529663_default.png', 'AMERICANA', '', '2016-03-12 02:45:30', '0000-00-00'),
(150, '150', '150', '', '0000-00-00', '710-TWG', 'NISSAN', 'NEGRO', 'X-TRAIL', '', '422516_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(151, '151', '151', '', '0000-00-00', '845-XCR', 'MERCEDEZ BENZ', 'NEGRO', ' C280', '', '258087_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(152, '152', '152', '', '0000-00-00', 'MX-36-006', 'FORD ', 'NEGRO', 'EFI PICK UP ', '', '992614_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(153, '153', '153', '', '0000-00-00', 'PO6ZVK', 'MERCURY ', 'VERDE', 'VILLAGER VAN', '', '102997_default.png', 'AMERICANA', '', '2016-03-12 02:45:30', '0000-00-00'),
(154, '154', '154', '', '0000-00-00', 'PJB-80-07', 'CHEVROLET ', 'GRIS', 'CORSICA', '', '244019_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(155, '155', '155', '', '0000-00-00', 'PFX-83-95', 'NISSAN', 'BLANCO', 'TSURU', '', '537262_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(156, '156', '156', '', '0000-00-00', 'PJK-92-20', 'CHRYSLER', 'GRIS', 'VOYAGER PLIMOUTH', '', '985168_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(157, '157', '157', '', '0000-00-00', '42-19-LCT', 'NISSAN', '', 'TSURU', '', '799652_default.png', 'RADIO TAXI', '', '2016-03-12 02:45:30', '0000-00-00'),
(158, '158', '158', '', '0000-00-00', 'NK-93-836', 'FORD', 'ARENA', 'CAMIUONETA F 350', '', '227845_default.png', 'SIN CAJA', '', '2016-03-12 02:45:30', '0000-00-00'),
(159, '159', '159', '', '0000-00-00', '', 'DODGE', 'NEGRO', 'NITRO', '', '63660_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(160, '160', '160', '', '0000-00-00', 'MT-46-423', 'NISSAN', 'ROJO', 'PICK UP', '', '86457_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(161, '161', '161', '', '0000-00-00', 'S/P', 'FORD', 'AZUL MARINO', 'ECO SPORT', '', '991943_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(162, '162', '162', '', '0000-00-00', 'NP 33 372', 'NISSAN', 'VERDE OBSCURO', 'PICK UP', '', '623566_default.png', '', '', '2016-03-12 02:45:30', '0215-05-11'),
(163, '163', '163', '', '0000-00-00', 'PLR-8328', 'CHEVROLET', 'BLANCA', 'BLAZER', '', '704773_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(164, '164', '164', '', '0000-00-00', 'HW-8289', 'FORD', '', 'F-100', '', '103241_default.png', 'REDILAS, AMARILLO (CBINA DE TRAILER)', '', '2016-03-12 02:45:30', '0000-00-00'),
(165, '165', '165', '', '0000-00-00', 'S/P', 'CONTINENTAL ', 'BLANCO', 'SRS', '', '145630_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(166, '166', '166', '', '0000-00-00', 'MX-11-190', 'TOYOTA', 'ROJO', 'PICK UP', '', '187897_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(167, '167', '167', '', '0000-00-00', 'PMP 1751', 'CHEVROLET', 'VERDE', 'CARRO IMPALA', '', '779358_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(168, '168', '168', '', '0000-00-00', 'MV 80490', 'MAZDA', 'NEGRO CON ROJO', 'PICK UP   V2-200', '', '545502_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(169, '169', '169', '', '0000-00-00', 'ING 22 496', 'FORD', 'ROJA', 'RANGER PICK UP', '', '414551_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(170, '170', '170', '', '0000-00-00', 'NV 91508', 'TOYOTA PICK UP', ' AZUL PALIDO', ' ', '', '312775_default.png', 'CON MADERA', '', '2016-03-12 02:45:30', '0000-00-00'),
(171, '171', '171', '', '0000-00-00', 'D09VR', 'DINAMO', 'NEGRO', 'MOTO DE CARRERA', '', '159851_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(172, '172', '172', '', '0000-00-00', 'PHF 2455', 'NISSAN', 'VERDE', 'TSURU', '', '706756_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(173, '173', '173', '', '0000-00-00', 'PRS 3012', 'NISSAN', 'BLANCO', 'TSURU', '', '928833_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(174, '174', '174', '', '0000-00-00', 'HFA 5223', 'VOLKSWAGEN', 'BLANCO', 'BORA', '', '603851_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(175, '175', '175', '', '0000-00-00', 'PPX 8156', 'VOLKSWAGEN', 'BLANCO', 'SEDAN', '', '899658_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(176, '176', '176', '', '0000-00-00', 'JHL 1296', 'FORD', 'BLANCO', 'EXPLORER', '', '814483_default.png', 'POLLOS LA JOYITA', '', '2016-03-12 02:45:30', '0000-00-00'),
(177, '177', '177', '', '0000-00-00', 'MX 22159', 'NISSAN O DATSUN', 'NEGRA', 'PICK UP', '', '764831_default.png', 'SIN CAJA', '', '2016-03-12 02:45:30', '0000-00-00'),
(178, '178', '178', '', '0000-00-00', 'S/P', 'NISSAN', '', 'TSURU', '', '899627_default.png', 'TAXI ALFA No Eco 174', '', '2016-03-12 02:45:30', '0000-00-00'),
(179, '179', '179', '', '0000-00-00', 'PJN 1548', 'VOLKSWAGEN', 'NEGRO', 'CARRO', '', '201783_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(180, '180', '180', '', '0000-00-00', '58 76 LCT', 'NISSAN', '', 'CARRO', '', '805511_default.png', 'TAXI TARASE ', '', '2016-03-12 02:45:30', '0000-00-00'),
(181, '181', '181', '', '0000-00-00', 'PJA 3158', 'DODGE', 'GRIS', 'STRATUS', '', '557037_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(182, '182', '182', '', '0000-00-00', 'S/P', 'CARABELA', 'VERDE', 'MOTONETA', '', '15687_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(183, '183', '183', '', '0000-00-00', 'S/P', 'BMW', 'NEGRO CON CALCOMANIAS', 'MOTONETA', '', '285370_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(184, '183', '183', '', '0000-00-00', 'S/P', 'ITALICA', 'NEGRO', 'MOTO DE TRABAJO', '', '747680_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(185, '184', '184', '', '0000-00-00', 'S/P', 'ITALICA', 'NEGRO', 'MOTONETA', '', '561432_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(186, '185', '185', '', '0000-00-00', 'S/P', 'KURAZAI', 'ROJO', 'MOTONETA', '', '244690_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(187, '187', '187', '', '0000-00-00', 'S/P', 'CARABELA', 'AZUL', 'MOTONETA', '', '630615_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(188, '188', '188', '', '0000-00-00', 'S/P', 'ITALICA', 'NEGRO', 'MOTONETA', '', '238800_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(189, '189', '189', '', '0000-00-00', 'S/P', 'ITALICA', 'NEGRO CON ROJAS', 'MOTONETA  FT125', '', '765320_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(190, '190', '190', '', '0000-00-00', 'S/P', 'GALAXY KURAZAI', 'NEGRO', 'MOTONETA ', '', '702850_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(191, '191', '191', '', '0000-00-00', 'S/P', 'DINAMO', 'NEGRO', 'MOTO DE TRABAJO', '', '503052_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(192, '192', '192', '', '0000-00-00', 'S/P', 'ISLO', 'GRIS', 'MOTO DE TRABAJO', '', '146881_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(193, '193', '193', '', '0000-00-00', '', 'REVOLVEDORA', '', '', '', '16694_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(194, '194', '194', '', '0000-00-00', 'K062F', 'BENTO', 'PARTES GRISES', 'MOTONETA', '', '524414_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(195, '195', '195', '', '0000-00-00', 'S/P', 'CRIPTON', 'ROJO', 'MOTONETA', '', '37873_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(196, '196', '196', '', '0000-00-00', 'S/P', 'HONDA', 'AZUL', 'MOTONETA', '', '739197_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(197, '197', '197', '', '0000-00-00', 'S/P', 'YAMAHA', 'NEGRO', 'MOTONETA', '', '230439_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(198, '198', '198', '', '0000-00-00', 'J743X', 'ZUZUKI', 'NEGRO', 'MOTONETA', '', '885131_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(199, '199', '199', '', '0000-00-00', 'J001G', 'CARABELA', 'BLANCO', 'MOTONETA', '', '168610_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(200, '200', '200', '', '0000-00-00', 'S/P', 'YAMAHA', 'ROJO', 'MOTONETA', '', '552063_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(201, '201', '201', '', '0000-00-00', 'K316F', 'HONDA ', 'GRIS', 'ELITE SR MOTONETA', '', '145356_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(202, '202', '202', '', '0000-00-00', 'S/P', 'HAHRA', 'GRIS', 'MOTONETA', '', '673584_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(203, '203', '203', '', '0000-00-00', 'S/P', 'HONDA  ', 'ROJA', 'MOTONETA', '', '922393_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(204, '204', '204', '', '0000-00-00', 'S/P', 'CARABELA', 'AZUL', 'MOTONETA', '', '277039_default.png', 'COMITÃƒâ?° PROVIALIDAD', '', '2016-03-12 02:45:30', '0000-00-00'),
(205, '205', '205', '', '0000-00-00', 'K738F', 'YAMAHA', 'MORADO', 'MOTONETA', '', '480194_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(206, '206', '206', '', '0000-00-00', 'S/P', 'APRISSA', 'NEGRO', 'MOTONETA', '', '233521_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(207, '207', '207', '', '0000-00-00', 'S/P', 'HALDRA', 'AMARILLO', 'MOTONETA', '', '767975_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(208, '208', '208', '', '0000-00-00', 'S/P', 'VIASO ', 'NEGRO', 'R3 MOTONETA', '', '7874_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(209, '209', '209', '', '0000-00-00', 'S/P', 'SUPERKAN', 'AMARILLO', 'MOTONETA', '', '953552_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(210, '210', '210', '', '0000-00-00', 'S/P', 'SPARHN', 'NEGRO', 'MOTONETA', '', '845184_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(211, '211', '211', '', '0000-00-00', '', '20 MOTOS ', '', '', '', '305268_default.png', 'INSERVIBLES Y DESVALIJADAS', '', '2016-03-12 02:45:30', '0000-00-00'),
(212, '212', '212', '', '0000-00-00', 'S/P', 'VOLKSWAGEN', 'AZUL MARINO', 'BEATLE', '', '229004_default.png', 'INSERVIBLES Y DESVALIJADAS', '', '2016-03-12 02:45:30', '0000-00-00'),
(213, '213', '213', '', '0000-00-00', 'MY 96908', 'CHEVROLET', 'AZUL CIELO', 'PICK UP', '', '308655_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(214, '214', '214', '', '0000-00-00', 'S/P', 'FORD', 'BLANCO', 'PICK UP', '', '238861_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(215, '215', '215', '', '0000-00-00', '', '2 AUTOS AMONTONADOS SIN DATOS', '', '', '', '471893_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(216, '216', '216', '', '0000-00-00', '', '2 CAMIONETAS AMONTONADAS SIN DATOS', '', '', '', '578735_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(217, '217', '217', '', '0000-00-00', '', 'UNA COMPRESORA DE AIRE', '', '', '', '646393_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(218, '218', '218', '', '0000-00-00', '', 'UN MOTOR NISAN', '', '', '', '5433_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(219, '219', '219', '', '0000-00-00', '', '1 DEPOSITO DE AGUA DE METAL', '', '', '', '437592_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(220, '220', '220', '', '0000-00-00', '304 DE-7', 'INTERNATIONAL', 'AZUL', 'TRACTOR', '', '902343_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(221, '221', '221', '', '0000-00-00', 'PGU 6521', 'NISSAN', 'BLANCA', 'QUEST', '', '142456_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(222, '222', '222', '', '0000-00-00', 'S/P', 'TOYOTA', 'GUINDA', 'COROLLA', '', '466949_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(223, '223', '223', '', '0000-00-00', 'PHN-16-85', 'NISSAN', 'ROJO', 'TSURU 1992', '', '321106_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(224, '224', '224', '', '0000-00-00', 'S/P', 'NISSAN', 'BLANCO', 'TSURU 2001', '', '221039_default.png', 'TAXI MI LINEA URUAPAN', '', '2016-03-12 02:45:30', '0000-00-00'),
(225, '225', '225', '', '0000-00-00', 'JJC 77-14', 'NISSAN TSURU', 'BLANCO', '2001', '', '173096_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(226, '226', '226', '', '0000-00-00', 'PFD 3463', 'NISSAN TSUBAME', 'VINO', '2001', '', '619171_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(227, '277', '277', '', '2012-08-20', 'MKB 7835', 'NISSAN TSURU', 'GRIS', '2001', '', '475769_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(228, '228', '228', '', '2012-04-14', 'PFU 77-84', 'NISSAN TSURU', 'ROJO Y GRIS', '2001', '', '391815_default.png', 'DESPINTADO PARTES EN GRIS Y ROJO', '', '2016-03-12 02:45:30', '0000-00-00'),
(229, '229', '229', '', '0000-00-00', 'PRN 8346', 'NISSAN TSURU', 'BLANCO', '', '', '850219_default.png', 'CANASTILLA AZUL', '', '2016-03-12 02:45:30', '0000-00-00'),
(230, '230', '230', '', '0000-00-00', 'S/P', 'NISSAN', 'BLANCO CON VERDE', 'SEDAN', '', '238190_default.png', 'TAXI LINEA VICENTE GUERRERO NO. ECO 211', '', '2016-03-12 02:45:30', '0000-00-00'),
(231, '231', '231', '', '2013-12-06', 'S/P', 'NISSAN TSURU ', 'BLANCO', '1999', '', '511291_default.png', 'TAXI CHARAPAN NUMERO ECO 13 ', '', '2016-03-12 02:45:30', '0000-00-00'),
(232, '232', '232', '', '0000-00-00', 'S/PLACAS', 'HONDA CRV ', 'GUINDA', '', '', '576263_default.png', 'GOLPEADA DEL FRENTE', '', '2016-03-12 02:45:30', '0000-00-00'),
(233, '233', '233', '', '0000-00-00', 'WH77 75', '', 'BLANCA CON CAJA GRIS', 'CAMIONETA CAJA GRIS 1991', '', '558502_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(234, '234', '234', '', '0000-00-00', 'PFP 1751', 'VOLKSWAGEN POINTER ', 'VINO', '2001', '', '88166_default.png', 'GOLPE DEL LADO DEL CHOFER', '', '2016-03-12 02:45:30', '0000-00-00'),
(235, '235', '235', '', '0000-00-00', '180 FGP', 'CHEVROLET SUBURBAN', 'AZUL', '', '', '471130_default.png', 'SOLO TIENE PLACA ATRAS', '', '2016-03-12 02:45:30', '0000-00-00'),
(236, '236', '236', '', '0000-00-00', 'PPC 5371', 'HONDA', 'BLANCO', 'CIVIC', '', '261200_default.png', 'SE ENTREGO  LA 13:45 ', '', '2016-03-12 02:45:30', '0000-00-00'),
(237, '237', '237', '', '2014-02-11', 'PHE 7450', 'VOLKSWAGEN JETTA', 'ROJO', '', '', '732208_default.png', 'PLACAS VIEJITAS', '', '2016-03-12 02:45:30', '0000-00-00'),
(238, '238', '238', '', '0000-00-00', 'MU 62860', 'CHEVROLET TORNADO', '', '', '', '921814_default.png', 'PLACAS VIEJITAS', '', '2016-03-12 02:45:30', '0000-00-00'),
(239, '239', '239', '', '2014-09-13', 'PSF 9128', 'DATSUN SEDAN 4 PUERTAS', 'ROJO DESPINTADO', '', '', '425354_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(240, '240', '240', '', '2014-10-19', 'PGG 1976', 'FORD CONTOUR', 'ARENA', '', '', '635712_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(241, '241', '241', '', '2014-02-18', '03486', 'NISSAN TSURU II', 'GRIS', '', '', '559936_default.png', 'PLACA DE UNION CAMPESINA', '', '2016-03-12 02:45:30', '0000-00-00'),
(242, '242', '242', '', '0000-00-00', 'CM 17574', 'NISSAN', 'BLANCA ', 'FRONTIER', '', '222321_default.png', 'DE REDILAS', '', '2016-03-12 02:45:30', '0000-00-00'),
(243, '243', '243', '', '0000-00-00', 'S/P', 'CHEVROLET', 'BLANCO', 'TORNADO', '', '906555_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(244, '244', '244', '', '0000-00-00', 'PGC 8705', 'FORD', 'ROJO', 'IKON', '', '285004_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(245, '245', '244', '', '0000-00-00', '', 'MONTON DE MOTORES', '', '', '', '286469_21668_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(246, '246', '246', '', '2015-04-11', 'NP 01914', 'FORD', 'VERDE', 'PICK UP', '', '128418_default.png', '', 'PF', '2016-03-12 02:45:30', '0000-00-00'),
(247, '247', '247', '', '2015-03-06', 'NP 01914', 'NISSAN', 'ROJO', 'MARCH', '', '907775_default.png', '', 'PF', '2016-03-12 02:45:30', '0000-00-00'),
(248, '248', '248', '', '2015-04-09', 'PSF 1974', 'NISSAN', 'BLANCO', 'TSURU', '', '384369_default.png', '', 'PF', '2016-03-12 02:45:30', '2016-04-16'),
(249, '249', '249', '', '2015-04-10', 'PFK 3147', 'CHEVROLET', 'AZUL', 'TRACKER', '', '351074_default.png', '', 'PF', '2016-03-12 02:45:30', '0000-00-00'),
(250, '250', '250', '', '2015-04-18', 'NM 09351', 'CHEVROLET', 'BLANCO', 'PICK UP', '', '893829_default.png', '', 'PF', '2016-03-12 02:45:30', '0000-00-00'),
(251, '251', '251', '', '2015-03-06', '', 'CHEVROLET', 'BLANCO', 'CHEVY', '', '788513_default.png', '', 'PF', '2016-03-12 02:45:30', '2015-03-22'),
(252, '252', '252', '', '2015-04-24', 'MU 98205', 'FORD', 'AZUL', 'RANGER PICK', '', '624298_default.png', '', 'PF', '2016-03-12 02:45:30', '0000-00-00'),
(253, '253', '253', '', '0000-00-00', 'PTP 5860', 'RENAULT', 'GRIS', 'SENDERO', '', '409607_default.png', '', 'PF', '2016-03-12 02:45:30', '0000-00-00'),
(254, '254', '254', '', '2015-04-25', 'PTP 3860', 'RENAULT', 'GRIS', 'SENDERO 2015', '', '55146_default.png', '', 'PF', '2016-03-12 02:45:30', '2015-04-26'),
(255, '255', '255', '', '2015-04-26', '9816 LCT', 'NISSAN', '', 'TSURU 2015', '', '355927_default.png', 'entregado', 'PF', '2016-03-12 02:45:30', '2015-04-27'),
(256, '256', '256', '', '2015-04-24', 'MU 98205', 'FORD', 'AZUL', 'RANGER ', '', '191742_default.png', '', 'PF', '2016-03-12 02:45:30', '2015-04-27'),
(257, '1234567', '7654321', 'Genaro', '2015-07-17', 'pgz419', 'nissan', 'negro', '1972', 'ACCIDENTE', '981170_164582_Kevin 14 jun 15.jpg', 'lo que sea', 'MUNICIPAL', '2016-03-12 02:45:30', '0000-00-00'),
(258, '100', '', '', '2015-05-09', 'S/PLACAS', 'VOLSWAGEN BETLE', 'AMARILLO', '', '', '597473_45807_default.png', '', 'FEDERAL', '2016-03-12 02:45:30', '2015-05-11'),
(259, '101', '', '', '2015-05-09', 'S/PLACAS', 'CHEVROLET CHEVY', 'NEGRO', '', '', '756561_5433_default.png', '', 'FEDERAL', '2016-03-12 02:45:30', '2015-05-11'),
(260, '102', '', '', '2015-05-10', 'S/PLACAS', 'NISSAN TSURU ', 'GUINDA', '', '', '845062_7874_default.png', '', '', '2016-03-12 02:45:30', '2015-05-11'),
(261, '103', '', 'MORRO', '2015-05-10', 'MX 79228', 'CHEVROLET PICK UP', 'VERDE', '', 'ACCIDENTE', '973632_4914_default.png', 'ACCIDENTE CONTRA EL SEMAFORO', 'FEDERAL', '2016-03-12 02:45:30', '0000-00-00'),
(262, '104', '', 'JORGE', '2015-05-10', 'PPN 3081', 'HONDA ACORD', 'GRIS', '', 'ACCIDENTE', '2717_12452_default.png', 'ACCIDENTE CONTRA EL SEMAFORO', 'FEDERAL', '2016-03-12 02:45:30', '0000-00-00'),
(263, '105', '', '', '2015-05-10', 'HCEM 5389', 'CHEVROLET SUBURBAN', 'GUINDA', '', '', '696411_15687_default.png', '', 'FEDERAL', '2016-03-12 02:45:30', '2015-05-12'),
(264, '106', '', 'JORGE Y MORRO', '2015-05-11', 'GRS 2206', 'CHEVROLET CRUZIER', 'GRIS', '', '', '223053_15687_default.png', '', 'FEDERAL', '2016-03-12 02:45:30', '2015-05-15'),
(265, '107', '', '', '2015-05-16', 'NL68996', 'MITSUBISCHI PICK UP', 'BLANCA', '', '', '696716_12452_default.png', '', '', '2016-03-12 02:45:30', '2015-05-16'),
(266, '', '', '', '0000-00-00', '', '', '', '', '', '521851_5433_default.png', '', '', '2016-03-12 02:45:30', '0000-00-00'),
(267, '106', '', '', '2015-06-02', 'PTB4335', 'CHEVROLET SPARK', 'VERDE', '', '', '911132_5433_default.png', '', 'FEDERAL', '2016-03-12 02:45:30', '0000-00-00'),
(268, '107', '', '', '2015-06-03', 'NN69806', 'NISSAN PICK UP', 'ROJO', '', '', '190216_41504_default.png', '', 'FEDERAL', '2016-03-12 02:45:30', '0000-00-00'),
(269, '108', '', '', '2015-06-04', 'RRD1354', 'VOLSWAGEN JETTA', 'ROJO', '', '', '344666_15687_default.png', '', 'FEDERAL', '2016-03-12 02:45:30', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remolques`
--

CREATE TABLE IF NOT EXISTS `remolques` (
  `id_remolque` int(10) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `capacidad` varchar(5) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `tipo_carroceria` varchar(20) NOT NULL,
  `pa` varchar(20) NOT NULL,
  `ac` varchar(20) NOT NULL,
  `no_siniestro` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_remolque`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Volcado de datos para la tabla `remolques`
--

INSERT INTO `remolques` (`id_remolque`, `tipo`, `marca`, `modelo`, `capacidad`, `serie`, `tipo_carroceria`, `pa`, `ac`, `no_siniestro`, `created_at`) VALUES
(2, 'Doble', 'Remol', 'Cuarto', '4', '10029001', 'Alta', 'aa', '11', 122, '2016-04-26 22:57:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resenas`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salvamentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--



--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `importes`
--
ALTER TABLE `importes`
  ADD CONSTRAINT `importes_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
