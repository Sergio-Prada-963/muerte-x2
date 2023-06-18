-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2023 a las 02:36:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquiler`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NOT NULL,
  `documento` int(11) DEFAULT NOT NULL,
  `edad` int(11) DEFAULT NOT NULL,
  `correo` varchar(80) DEFAULT NOT NULL,
  `direccion` varchar(80) DEFAULT NOT NULL
);

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `documento`, `edad`, `correo`, `direccion`) VALUES
(1, 'pepe', 123456, 30, 'pepe@gmail.com', 'cra123'),
(2, 'Juann', 123546, 30, 'pepe@gmail.com', 'cra123'),
(3, 'Jhoan', 15487, 35, 'jhoan@gmail..com', 'cra741');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombreEmpleado` varchar(80) DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `correo` varchar(80) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombreEmpleado`, `documento`, `cargo`, `edad`, `correo`, `direccion`, `salario`) VALUES
(1, 'Juan', 10121, 'cajero', 20, 'juan@gmail.com', 'cra 123', 20),
(2, 'Marce', 123456, 'asistente', 25, 'marce@gmail.com', 'cra123', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `hora_entrada` varchar(50) DEFAULT NULL,
  `observaciones` varchar(80) DEFAULT NULL,
  `id_salida` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_detalle`
--

CREATE TABLE `entrada_detalle` (
  `entrada_cantidad` int(11) DEFAULT NULL,
  `entrada_cantidad_propia` int(11) DEFAULT NULL,
  `entrada_cantidad_subalquilada` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_entrada` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_obra` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `cantidad_inicial` int(11) DEFAULT NULL,
  `cantidad_ingresos` int(11) DEFAULT NULL,
  `cantidad_salidas` int(11) DEFAULT NULL,
  `cantidad_final` int(11) DEFAULT NULL,
  `fecha_inventario` int(11) DEFAULT NULL,
  `tipo_operacion` varchar(80) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion` (
  `id_liquidacion` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `motivo` varchar(50) DEFAULT NULL,
  `indemnizacion` varchar(50) DEFAULT NULL,
  `seguridad_social` varchar(50) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `id_obra` int(11) NOT NULL,
  `obra` varchar(50) DEFAULT NULL,
  `constructora` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `terreno_metros` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`id_obra`, `obra`, `constructora`, `tipo`, `descripcion`, `direccion`, `terreno_metros`, `id_cliente`) VALUES
(1, 'edificio zenith', 'agros', 'edificio', 'contruccion de un edificio estilo oficina', 'zona franca zantander', 1000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio_unitario`, `stock`, `id_proveedor`) VALUES
(1, 'Cierra Electrica', 150200, 20, 6),
(2, 'Martillo', 50000, 20, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombreProveedor` varchar(50) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `encargado` varchar(50) DEFAULT NULL,
  `sector` varchar(50) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombreProveedor`, `direccion`, `telefono`, `encargado`, `sector`) VALUES
(1, 'Sergio', 'cra321', 9512365, 'nadie', 'pobre'),
(2, 'Alejandro', 'cra52', 2147483647, 'si?', 'barrio la esperanzza'),
(3, 'pepe', 'En la Calle', 852741963, 'Dr nadie', 'barrio la esperanzza'),
(4, 'Luis', 'cra528', 159487263, 'si?', 'barrio bonito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` varchar(11) DEFAULT NULL,
  `subtotal_peso` int(11) DEFAULT NULL,
  `placa_transporte` varchar(50) DEFAULT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`id_salida`, `fecha_salida`, `hora_salida`, `subtotal_peso`, `placa_transporte`, `observaciones`, `id_cliente`, `id_empleado`) VALUES
(1, '2023-06-17', '07:01', 500, 'OHU94C', 'es una buena salida', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_detalle`
--

CREATE TABLE `salida_detalle` (
  `cantidad_salida` int(11) DEFAULT NULL,
  `cantidad_propia` int(11) DEFAULT NULL,
  `cantidad_subalquilada` int(11) DEFAULT NULL,
  `valor_unidad` int(11) DEFAULT NULL,
  `fecha_standBy` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `valorTotal` int(11) DEFAULT NULL,
  `id_salida` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_obra` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `salida_detalle`
--

INSERT INTO `salida_detalle` (`cantidad_salida`, `cantidad_propia`, `cantidad_subalquilada`, `valor_unidad`, `fecha_standBy`, `estado`, `valorTotal`, `id_salida`, `id_producto`, `id_obra`, `id_empleado`) VALUES
(200, 100, 100, 300000, '2023-06-15', 'bueno', 300200, 1, 8, 3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_salida` (`id_salida`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `entrada_detalle`
--
ALTER TABLE `entrada_detalle`
  ADD KEY `id_entrada` (`id_entrada`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_obra` (`id_obra`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD PRIMARY KEY (`id_liquidacion`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id_obra`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `salida_detalle`
--
ALTER TABLE `salida_detalle`
  ADD KEY `id_salida` (`id_salida`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_obra` (`id_obra`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  MODIFY `id_liquidacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`id_salida`) REFERENCES `salida` (`id_salida`),
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `entrada_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `entrada_detalle`
--
ALTER TABLE `entrada_detalle`
  ADD CONSTRAINT `entrada_detalle_ibfk_1` FOREIGN KEY (`id_entrada`) REFERENCES `entrada` (`id_entrada`),
  ADD CONSTRAINT `entrada_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `entrada_detalle_ibfk_3` FOREIGN KEY (`id_obra`) REFERENCES `obra` (`id_obra`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD CONSTRAINT `liquidacion_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `obra_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `salida_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Filtros para la tabla `salida_detalle`
--
ALTER TABLE `salida_detalle`
  ADD CONSTRAINT `salida_detalle_ibfk_1` FOREIGN KEY (`id_salida`) REFERENCES `salida` (`id_salida`),
  ADD CONSTRAINT `salida_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `salida_detalle_ibfk_3` FOREIGN KEY (`id_obra`) REFERENCES `obra` (`id_obra`),
  ADD CONSTRAINT `salida_detalle_ibfk_4` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
