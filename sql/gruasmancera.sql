-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-06-2016 a las 00:04:04
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

--
-- Estructura de tabla para la tabla `autoridades`
--

CREATE TABLE IF NOT EXISTS `autoridades` (
  `id_autoridad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `jefe` varchar(50) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `contacto1` varchar(50) NOT NULL,
  `contacto2` varchar(50) NOT NULL,
  `contacto3` varchar(50) NOT NULL,
  `tel_jefe` varchar(13) DEFAULT NULL,
  `tel_contacto1` varchar(13) DEFAULT NULL,
  `tel_contacto2` varchar(13) DEFAULT NULL,
  `tel_contacto3` varchar(13) DEFAULT NULL,
  `tel_dependencia` varchar(13) DEFAULT NULL,
  `logo_dependencia` varchar(150) DEFAULT NULL,
  `thumbnail` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_autoridad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `autoridades`
--

INSERT INTO `autoridades` (`id_autoridad`, `nombre`, `jefe`, `puesto`, `contacto1`, `contacto2`, `contacto3`, `tel_jefe`, `tel_contacto1`, `tel_contacto2`, `tel_contacto3`, `tel_dependencia`, `logo_dependencia`, `thumbnail`, `created_at`) VALUES
(5, 'C', 'MiJefe', 'mIPuesto', 'AAAA', 'BBBB', 'CCCC', '454525', '1', '2', '333333', '54321234', 'C:/wamp22/www/Recibos_Gruas/img/subidas/logos/weather-icons-sun-cloud-thermometer.jpg', NULL, '2016-04-28 23:06:00'),
(6, 'Policia', 'Armando', 'Local', 'A', 'B', 'C', '52435524', '5243514', '5342514', '5342514', '5241526', 'C:/wamp22/www/Recibos_Gruas/img/subidas/logos/Flat-thermometerjpg.jpg', NULL, '2016-05-23 00:44:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(70) DEFAULT NULL,
  `tel_fijo` varchar(13) DEFAULT NULL,
  `tel_celular` varchar(13) DEFAULT NULL,
  `calle` varchar(40) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `codigo_postal` varchar(6) NOT NULL,
  `num_exterior` varchar(5) NOT NULL,
  `num_interior` varchar(5) DEFAULT NULL,
  `ciudad` varchar(25) NOT NULL,
  `contacto1` varchar(50) NOT NULL,
  `tel_contacto1` varchar(13) NOT NULL,
  `contacto2` varchar(50) NOT NULL,
  `tel_contacto2` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curp` varchar(20) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `correo`, `tel_fijo`, `tel_celular`, `calle`, `colonia`, `codigo_postal`, `num_exterior`, `num_interior`, `ciudad`, `contacto1`, `tel_contacto1`, `contacto2`, `tel_contacto2`, `created_at`, `curp`, `rfc`) VALUES
(1, 'Julio', 'julyuzc@gmail.com', '5244115', '4524152415', 'Rev', 'San juan', '60040', '92', '92', 'URUAPAN', 'CESAR', '5245514', 'CARLO', '5241122', '2016-04-17 19:02:24', 'AAMK922929OKLMLO00', 'SSAFOCJJDK'),
(4, 'Cesar', 'ss@s.com', '219', '224', 'er', 'ce', '32', '23', '0', 'ceec', 'ewwe3223dds11212', '2112', 'DEDE', 'WQQW2', '2016-04-25 23:11:22', 'sadadsads', 'dasdsads'),
(5, 'Cesar', 'cesar@ce', '33', '44', 'RRR', 'ttt', '5252', '666', '0', 'uuuu', 'iii', '9', 'ooo', '0', '2016-04-25 23:33:45', 'kkk', 'mmmmm'),
(6, 'A B', 'a@gs.c', '5231121', '4523321232', 'A', 'B', '60050', '90', '0', 'URUAPAN', 'Z', '1', 'X', '2', '2016-05-28 05:38:56', 'VKSDLMKALKSM', 'RGF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE IF NOT EXISTS `depositos` (
  `id_depositos` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `fechaInicial` varchar(20) DEFAULT NULL,
  `fechaFinal` varchar(20) DEFAULT NULL,
  `dias_custodiado` varchar(10) DEFAULT NULL,
  `cuotaxdia` varchar(10) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_depositos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_img` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `thumbnail` varchar(110) DEFAULT NULL,
  `placas` varchar(10) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_memoria_grafica` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `id_memoria_grafica` (`id_memoria_grafica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruas`
--

CREATE TABLE IF NOT EXISTS `gruas` (
  `id_grua` int(11) NOT NULL AUTO_INCREMENT,
  `placas` varchar(15) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_operador` int(11) NOT NULL,
  PRIMARY KEY (`id_grua`),
  UNIQUE KEY `placas` (`placas`),
  KEY `id_operador` (`id_operador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `gruas`
--

INSERT INTO `gruas` (`id_grua`, `placas`, `marca`, `modelo`, `tipo`, `numero`, `created_at`, `id_operador`) VALUES
(1, 'placas', 'marca', 'modelo', 'tipo', 0, '2016-05-30 04:08:24', 1),
(3, 'pla', 'ma', 'mod', 'ti', 0, '2016-05-30 04:08:34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `importes`
--

CREATE TABLE IF NOT EXISTS `importes` (
  `id_cliente` int(11) DEFAULT NULL,
  `salvamento` float DEFAULT NULL,
  `remolque_arrastre` float DEFAULT NULL,
  `maniobras_realizadas` varchar(200) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `imp_retenido_iva` float DEFAULT NULL,
  `importe_total` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_importe` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_importe`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memorias_graficas`
--

CREATE TABLE IF NOT EXISTS `memorias_graficas` (
  `id_memoria_grafica` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_documento` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `placas` varchar(10) NOT NULL,
  `cantidad_fotos` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_vehiculo` int(11) NOT NULL,
  PRIMARY KEY (`id_memoria_grafica`),
  KEY `id_vehiculo` (`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

CREATE TABLE IF NOT EXISTS `operadores` (
  `id_operador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `licencia` varchar(30) NOT NULL,
  `tipo_licencia` varchar(20) NOT NULL,
  `no_licencia` varchar(15) NOT NULL,
  `vigencia_licencia` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_operador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`id_operador`, `nombre`, `licencia`, `tipo_licencia`, `no_licencia`, `vigencia_licencia`, `created_at`) VALUES
(1, '$nombre22', '$licencia22', '$tipo22', '$numero22', '$vigencia22', '2016-05-29 23:05:31'),
(2, '$nomb', '$lic', '$tip', '$nu', '$vige', '2016-05-29 23:06:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_efectivo`
--

CREATE TABLE IF NOT EXISTS `recibos_efectivo` (
  `id_recibo_efectivo` int(11) NOT NULL AUTO_INCREMENT,
  `placas` varchar(10) NOT NULL,
  `cantidad_numero` varchar(50) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `cantidad_letra` varchar(250) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_documento` date NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `receptor` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_vehiculo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_recibo_efectivo`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_vehiculo`
--

CREATE TABLE IF NOT EXISTS `recibos_vehiculo` (
  `id_recibo_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `suscriptor` varchar(50) DEFAULT NULL,
  `marca` varchar(15) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_documento` date NOT NULL,
  `autoridad` varchar(50) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `placas` varchar(10) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_autoridad` int(11) NOT NULL,
  PRIMARY KEY (`id_recibo_vehiculo`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_autoridad` (`id_autoridad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resenas`
--

CREATE TABLE IF NOT EXISTS `resenas` (
  `id_resena` int(10) NOT NULL AUTO_INCREMENT,
  `folio` int(10) NOT NULL,
  `pavimento_acotamiento` varchar(2) NOT NULL,
  `fuera_camino` varchar(2) NOT NULL,
  `ubicacion` varchar(2) NOT NULL,
  `declive` varchar(2) NOT NULL,
  `profundidad` varchar(25) DEFAULT NULL,
  `longitud` varchar(25) DEFAULT NULL,
  `angulo` varchar(10) DEFAULT NULL,
  `distancia` varchar(25) DEFAULT NULL,
  `pendiente` varchar(10) DEFAULT NULL,
  `vehiculo_atascado` varchar(2) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `mts` varchar(10) DEFAULT NULL,
  `ejes_enterrados` varchar(10) DEFAULT NULL,
  `lado_izq` varchar(10) DEFAULT NULL,
  `lado_der` varchar(10) DEFAULT NULL,
  `ambos_lados` varchar(10) DEFAULT NULL,
  `roca` varchar(5) DEFAULT NULL,
  `tierra` varchar(5) DEFAULT NULL,
  `grava` varchar(5) DEFAULT NULL,
  `arena` varchar(5) DEFAULT NULL,
  `lodo` varchar(5) DEFAULT NULL,
  `malesa` varchar(5) DEFAULT NULL,
  `otros` varchar(5) DEFAULT NULL,
  `horas` varchar(20) DEFAULT NULL,
  `num_personas` varchar(5) DEFAULT NULL,
  `cambiar_llanta` varchar(5) DEFAULT NULL,
  `desajustar_frenos` varchar(5) DEFAULT NULL,
  `amarrar_mancuerna` varchar(5) DEFAULT NULL,
  `destrabar_remolque` varchar(5) DEFAULT NULL,
  `cortar_piezas` varchar(5) DEFAULT NULL,
  `retirar_piezas` varchar(5) DEFAULT NULL,
  `ubicar_muelles` varchar(5) DEFAULT NULL,
  `acomodar_carroceria` varchar(5) DEFAULT NULL,
  `amarrar_eje_delantero` varchar(5) DEFAULT NULL,
  `ronsear` varchar(5) DEFAULT NULL,
  `jalar` varchar(5) DEFAULT NULL,
  `levantar` varchar(5) DEFAULT NULL,
  `acostar` varchar(5) DEFAULT NULL,
  `desvoltear` varchar(5) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_resena`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salvamentos`
--

CREATE TABLE IF NOT EXISTS `salvamentos` (
  `id_salvamento` int(10) NOT NULL AUTO_INCREMENT,
  `folio` int(10) NOT NULL,
  `grua_de` varchar(20) NOT NULL,
  `grua_hasta` varchar(20) NOT NULL,
  `grua_total` varchar(20) NOT NULL,
  `manual_de` varchar(20) NOT NULL,
  `manual_hasta` varchar(20) NOT NULL,
  `manual_total` varchar(20) NOT NULL,
  `custodia_de` varchar(20) NOT NULL,
  `custodia_hasta` varchar(20) NOT NULL,
  `custodia_total` varchar(20) NOT NULL,
  `tipo_grua` varchar(20) NOT NULL,
  `maniobras` varchar(20) DEFAULT NULL,
  `banderazo` varchar(20) NOT NULL,
  `km_recorridos` varchar(10) NOT NULL,
  `recargo_remision` varchar(10) NOT NULL,
  `corralon_taller` varchar(20) NOT NULL,
  `servicio_particular` varchar(20) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_salvamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `Password` text COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `nombre`, `Usuario`, `Password`, `nivel`) VALUES
(5, 'gael', 'gael', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(6, 'new', 'new', '202cb962ac59075b964b07152d234b70', 2),
(9, 'pruebanew', 'prueba', '202cb962ac59075b964b07152d234b70', 1),
(13, 'mancera', 'oswaldo', '202cb962ac59075b964b07152d234b70', 1),
(16, 'prueba', 'normal', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(17, 'Administrador', 'Mancera', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(18, 'Gabriel', 'Gabriel', '2937245bfec1af56df73bac0b745061e', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE IF NOT EXISTS `vehiculos` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `placas` varchar(10) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `color` varchar(15) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `num_serie_vehiculo` varchar(30) NOT NULL,
  `num_serie_motor` varchar(30) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `autoridad_intervino` varchar(30) NOT NULL,
  `motivo` varchar(60) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `aseguradora` varchar(30) NOT NULL,
  `ajustador` varchar(30) NOT NULL,
  `tel_ajustador` varchar(13) NOT NULL,
  `num_economico` varchar(25) NOT NULL,
  `razon_social` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_cliente` int(11) NOT NULL,
  `pa` varchar(30) DEFAULT NULL,
  `ac` varchar(30) DEFAULT NULL,
  `no_siniestro` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_vehiculo`),
  UNIQUE KEY `placas` (`placas`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `placas`, `marca`, `tipo`, `color`, `modelo`, `num_serie_vehiculo`, `num_serie_motor`, `observacion`, `autoridad_intervino`, `motivo`, `fecha_ingreso`, `fecha_salida`, `aseguradora`, `ajustador`, `tel_ajustador`, `num_economico`, `razon_social`, `created_at`, `id_cliente`, `pa`, `ac`, `no_siniestro`) VALUES
(8, '$placas222', '$marca', '$tipo', '$color', '$modelo', '$num_serie_vehiculo', '$num_serie_motor', '$observacion', 'aiActualizar', '$motivo', '2016-04-27', '2016-04-28', '$aseguradora', '$ajustador', '$tel_ajustado', '$num_economico', '$razon_social', '2016-05-30 03:34:00', 6, '$pa', '$ac', '3545'),
(9, 'GTSYTY899I', 'CHEVROLET', 'GDE', 'AZUL', 'CORSA', 'MSO9D9D9DI9D', 'MOCD9DC0CDD', 'SE OBSERVO ESTO', 'AUTORIDAD', 'mo', '2016-12-01', '2016-01-30', 'cipr', 'AJUS', '5362545', '90', 'SOCIALISMO', '2016-05-30 05:12:55', 6, 'NOSE', 'NOSE NOSE', '999');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_memoria_grafica`) REFERENCES `memorias_graficas` (`id_memoria_grafica`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gruas`
--
ALTER TABLE `gruas`
  ADD CONSTRAINT `gruas_ibfk_1` FOREIGN KEY (`id_operador`) REFERENCES `operadores` (`id_operador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `importes`
--
ALTER TABLE `importes`
  ADD CONSTRAINT `importes_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `memorias_graficas`
--
ALTER TABLE `memorias_graficas`
  ADD CONSTRAINT `memorias_graficas_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibos_efectivo`
--
ALTER TABLE `recibos_efectivo`
  ADD CONSTRAINT `recibos_efectivo_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recibos_efectivo_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibos_vehiculo`
--
ALTER TABLE `recibos_vehiculo`
  ADD CONSTRAINT `recibos_vehiculo_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recibos_vehiculo_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recibos_vehiculo_ibfk_3` FOREIGN KEY (`id_autoridad`) REFERENCES `autoridades` (`id_autoridad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
