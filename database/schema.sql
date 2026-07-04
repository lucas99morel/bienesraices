-- Bienes Raices MVC - Esquema de base de datos
-- Generado a partir de exports de MySQL Workbench

CREATE DATABASE IF NOT EXISTS `bienesraices_crud` CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `bienesraices_crud`;

SET FOREIGN_KEY_CHECKS = 0;

-- --------------------------------------------------------
-- Tabla: vendedores
-- --------------------------------------------------------

DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
-- Datos de ejemplo: vendedores
-- --------------------------------------------------------

INSERT INTO `vendedores` (`nombre`, `apellido`, `telefono`) VALUES
('Carlos', 'Gómez', '0981123456'),
('Laura', 'Benítez', '0982234567'),
('Diego', 'Fernández', '0983345678');

-- --------------------------------------------------------
-- Tabla: propiedades
-- --------------------------------------------------------

DROP TABLE IF EXISTS `propiedades`;
CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedores_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedores_id`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
-- Datos de ejemplo: propiedades
-- --------------------------------------------------------

INSERT INTO `propiedades` (`titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores_id`) VALUES
('Casa moderna en zona residencial', 185000.00, 'anuncio4.jpg', 'Amplia casa de dos plantas con jardín y espacio para asador.', 3, 2, 2, '2026-01-15', 1),
('Departamento céntrico', 95000.00, 'anuncio5.jpg', 'Departamento a estrenar, cerca de centros comerciales y transporte público.', 2, 1, 1, '2026-02-10', 1),
('Casa quinta con piscina', 240000.00, 'anuncio3.jpg', 'Propiedad amplia ideal para descanso familiar, con piscina y quincho.', 4, 3, 3, '2026-03-05', 2);

-- --------------------------------------------------------
-- Tabla: usuarios
-- --------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `passw` char(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
-- Datos de ejemplo: usuarios
-- --------------------------------------------------------
-- Contraseña de prueba para ambos usuarios: "password"
-- (hasheada con bcrypt / password_hash() de PHP)

INSERT INTO `usuarios` (`email`, `passw`) VALUES
('admin@bienesraices.com', '$2y$10$BG4iuCXs.DzFhR7qb0g8Fuu9YWQgFAhCDNA1C97FhpUu203A5/98y');

SET FOREIGN_KEY_CHECKS = 1;