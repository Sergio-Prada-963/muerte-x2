-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2023 at 01:07 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alquiler`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `documento` int DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `correo` varchar(80) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `documento` int DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `correo` varchar(80) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `salario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obra`
--

CREATE TABLE `obra` (
  `id_obra` int NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `constructora` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `terreno_metros` int DEFAULT NULL,
  `id_cliente` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_producto` int NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `precio_unitario` int DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `id_proveedor` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `encargado` varchar(50) DEFAULT NULL,
  `sector` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salida`
--

CREATE TABLE `salida` (
  `id_salida` int NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` int DEFAULT NULL,
  `subtotal_peso` int DEFAULT NULL,
  `placa_transporte` varchar(50) DEFAULT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  `id_empleado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salida_detalle`
--

CREATE TABLE `salida_detalle` (
  `cantidad_salida` int DEFAULT NULL,
  `cantidad_propia` int DEFAULT NULL,
  `cantidad_subalquilada` int DEFAULT NULL,
  `valor_unidad` int DEFAULT NULL,
  `fecha_standBy` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `valorTotal` int DEFAULT NULL,
  `id_salida` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `id_obra` int DEFAULT NULL,
  `id_empleado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indexes for table `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id_obra`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indexes for table `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indexes for table `salida_detalle`
--
ALTER TABLE `salida_detalle`
  ADD KEY `id_salida` (`id_salida`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_obra` (`id_obra`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obra`
--
ALTER TABLE `obra`
  MODIFY `id_obra` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salida`
--
ALTER TABLE `salida`
  MODIFY `id_salida` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `obra_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Constraints for table `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `salida_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Constraints for table `salida_detalle`
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
