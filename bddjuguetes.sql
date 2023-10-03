# Host: localhost  (Version 5.7.19-log)
# Date: 2023-10-02 23:11:00
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "categoria"
#

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idCategoria` tinyint(4) NOT NULL AUTO_INCREMENT,
  `numeroCategoria` int(10) unsigned NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "categoria"
#

INSERT INTO `categoria` VALUES (1,150,1,'2023-10-01 15:22:34',NULL),(2,100,1,'2023-10-01 15:22:38',NULL),(3,120,1,'2023-10-01 15:22:42',NULL),(4,200,1,'2023-10-01 17:25:16',NULL),(5,60,1,'2023-10-01 17:25:24',NULL);

#
# Structure for table "marca"
#

DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `idMarca` tinyint(4) NOT NULL AUTO_INCREMENT,
  `numeroTienda` varchar(10) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "marca"
#

INSERT INTO `marca` VALUES (1,'A-25',1,'2023-10-01 15:22:59',NULL),(2,'A-26',1,'2023-10-01 15:23:04',NULL),(3,'A ASD',1,'2023-10-02 12:11:01',NULL);

#
# Structure for table "persona"
#

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `idPersona` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `primerApellido` varchar(25) NOT NULL,
  `segundoApellido` varchar(25) DEFAULT NULL,
  `numeroCelular` varchar(12) DEFAULT NULL,
  `numeroCI` varchar(15) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "persona"
#

INSERT INTO `persona` VALUES (1,'PEPITO1','1','','','1234567',1,'2023-09-14 15:18:29','2023-09-20 10:26:15'),(2,'VENDEDOR ','2','','','9876543',1,'2023-09-14 15:18:29','2023-09-20 10:02:23'),(3,'Pedro','Lopez',NULL,NULL,'4567890',1,'2023-09-14 15:18:29',NULL),(4,'SUPER USUARIO','BELEN','','','',1,'2023-09-14 15:55:56','2023-09-20 10:04:15'),(5,'MILIVOYÑ','BRAVO BECERRA','LA PAZ','79958584','6536415',1,'2023-09-28 18:52:47','2023-10-02 11:48:44'),(6,'ANA MARIA','MORATO','','','',1,'2023-09-28 19:40:58',NULL),(7,'AAA','MORATO','','','',1,'2023-09-28 19:44:42',NULL),(8,'MILIVOYAAA','PEREZ','BRAVO','79769996','8732535',1,'2023-09-28 19:46:40',NULL),(9,'AAA','SADASDASD','OREURO','','',1,'2023-09-28 19:46:55','2023-10-02 11:51:02'),(10,'EDGAR','MORATO','SUCRE','79769996','',1,'2023-09-28 19:47:27','2023-10-02 12:11:27'),(11,'RDRIGO','MAMANI','','79769996','99999999',1,'2023-10-01 17:06:19',NULL),(12,'ALEJANDO','MORATO PERES ','SANTA CRUS ','79769996','8732535',1,'2023-10-02 11:35:57',NULL),(13,'AAAA','LUIZ','LA PAZ','','787878',1,'2023-10-02 11:59:04',NULL),(14,'MARIA','ARTEAGA','LA PAZ','','969696',1,'2023-10-02 12:35:29',NULL);

#
# Structure for table "empleado"
#

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `idEmpleado` smallint(6) NOT NULL AUTO_INCREMENT,
  `idPersona` smallint(6) NOT NULL,
  `tipo` tinyint(4) NOT NULL DEFAULT '1',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEmpleado`),
  KEY `fk_empleado_persona1_idx` (`idPersona`),
  CONSTRAINT `fk_empleado_persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "empleado"
#

INSERT INTO `empleado` VALUES (1,1,1,1),(2,2,2,2),(3,4,1,2);

#
# Structure for table "cliente"
#

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idCliente` smallint(6) NOT NULL AUTO_INCREMENT,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idPersona` smallint(6) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_cliente_persona1_idx` (`idPersona`),
  CONSTRAINT `fk_cliente_persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

#
# Data for table "cliente"
#

INSERT INTO `cliente` VALUES (3,1,3),(4,1,5),(5,1,6),(6,1,7),(7,1,8),(8,1,9),(9,1,10),(10,1,11),(11,1,12),(12,1,13),(13,1,14);

#
# Structure for table "producto"
#

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idProducto` smallint(6) NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) DEFAULT 'sinImagen.jpg',
  `nombreProducto` varchar(40) NOT NULL,
  `descripcion` decimal(7,2) NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `stock` smallint(6) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idMarca` tinyint(4) NOT NULL,
  `idCategoria` tinyint(4) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fk_producto_marca1_idx` (`idMarca`),
  KEY `fk_producto_tipo1_idx` (`idCategoria`),
  CONSTRAINT `fk_producto_marca1` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`),
  CONSTRAINT `fk_producto_tipo1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "producto"
#

INSERT INTO `producto` VALUES (8,'aaaaa.jpg','AVION  AAAAAAAAAAAAAAAAAAAAAAAAAAA',35.00,40.00,'4213Fa',0,1,'2023-10-01 15:23:27','2023-10-02 09:54:09',2,2),(9,'fghfh.jpeg','SOLDADO',10.00,15.00,'4213Fd',0,1,'2023-10-01 15:53:57','2023-10-02 09:46:41',1,1),(10,'sinImagen.jpg','SUBMARINO',25.00,50.00,'4213Ft',75,1,'2023-10-02 09:43:35',NULL,1,1),(11,'fghfh.jpeg','PERRITO',43.00,50.00,'DDD',400,1,'2023-10-02 09:58:26',NULL,1,1);

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `foto` varchar(25) DEFAULT 'sinImagen.jpg',
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT 'guest',
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `error` varchar(100) DEFAULT NULL,
  `idEmpleado` smallint(6) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_usuario_empleado1_idx` (`idEmpleado`),
  CONSTRAINT `idEmpleado` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES (1,'r.jpg','VENDEDOR1','21232f297a57a5a743894a0e4a801fc3','vendedor',1,'2023-09-14 15:49:37','2023-09-20 09:57:23',NULL,1),(11,'','VENDEDOR','0407e8c8285ab85509ac2884025dcf42','vendedor',1,'2023-09-20 09:58:11',NULL,NULL,2),(12,'','admin','21232f297a57a5a743894a0e4a801fc3','admin',1,'2023-09-20 10:00:03',NULL,NULL,3);

#
# Structure for table "venta"
#

DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `idVenta` smallint(6) NOT NULL AUTO_INCREMENT,
  `idCliente` smallint(6) NOT NULL,
  `idUsuario` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaAcutalizacion` timestamp NULL DEFAULT NULL,
  `total` double(8,2) NOT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `idCliente` (`idCliente`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `fk_compra_cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

#
# Data for table "venta"
#

INSERT INTO `venta` VALUES (1,3,1,0,'2023-09-14 16:19:32',NULL,19.99),(2,3,1,1,'2023-09-14 16:37:53',NULL,19.99),(3,3,1,1,'2023-09-14 17:03:20',NULL,3120.00),(4,3,1,1,'2023-09-15 16:29:08',NULL,139.93),(7,3,1,1,'2023-09-15 17:51:10',NULL,36.00),(8,3,1,1,'2023-09-15 17:51:33',NULL,19.99),(9,3,1,1,'2023-09-15 18:15:37',NULL,19.99),(10,3,1,1,'2023-09-16 23:46:22',NULL,319.87),(11,3,1,0,'2023-09-16 23:54:21',NULL,59.97),(12,3,1,1,'2023-09-17 17:37:13',NULL,19.99),(13,3,1,1,'2023-09-17 18:32:40',NULL,69.99),(14,3,1,1,'2023-09-20 10:54:49',NULL,19.99),(15,3,12,1,'2023-09-20 20:23:51',NULL,1999.00),(16,3,11,1,'2023-09-20 20:42:33',NULL,150.00),(17,3,12,1,'2023-09-20 20:54:52',NULL,7999.00),(18,3,11,1,'2023-09-20 20:57:24',NULL,5000.00),(19,3,12,1,'2023-09-27 14:42:57',NULL,1999.00),(20,3,12,1,'2023-09-27 14:45:51',NULL,3840.00),(21,3,12,1,'2023-09-28 19:15:33',NULL,3120.00),(22,3,12,1,'2023-09-28 19:58:34',NULL,1999.00),(23,4,12,1,'2023-09-28 20:03:25',NULL,1999.00),(24,4,12,1,'2023-09-28 21:31:57',NULL,1999.00),(55,4,12,1,'2023-09-28 22:48:41',NULL,19.99),(56,4,12,1,'2023-09-28 22:49:01',NULL,1979.01),(57,4,12,1,'2023-09-28 22:54:52',NULL,1999.00),(58,4,12,1,'2023-09-28 22:55:22',NULL,1999.00),(59,3,12,1,'2023-09-28 22:55:53',NULL,999.50),(60,4,12,1,'2023-09-28 23:00:42',NULL,2600.00),(61,4,12,1,'2023-09-28 23:11:09',NULL,520.00),(62,4,12,1,'2023-10-01 15:23:54',NULL,5000.00),(63,3,12,1,'2023-10-01 15:54:36',NULL,12700.00),(64,4,12,1,'2023-10-01 17:09:40',NULL,12900.00),(82,4,12,1,'2023-10-02 10:40:30',NULL,14000.00),(83,3,12,1,'2023-10-02 10:47:02',NULL,2500.00),(84,4,12,1,'2023-10-02 12:10:16',NULL,1875.00),(85,3,11,1,'2023-10-02 12:23:01',NULL,3750.00);

#
# Structure for table "detalle"
#

DROP TABLE IF EXISTS `detalle`;
CREATE TABLE `detalle` (
  `idVenta` smallint(6) NOT NULL,
  `idProducto` smallint(6) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `precioTotal` decimal(8,2) NOT NULL,
  PRIMARY KEY (`idVenta`,`idProducto`),
  KEY `fk_compraDetalle_fideo1_idx` (`idProducto`),
  CONSTRAINT `fk_compraDetalle_compra1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compraDetalle_fideo1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "detalle"
#

INSERT INTO `detalle` VALUES (62,8,100,5000.00),(63,8,200,10000.00),(63,9,225,2700.00),(64,8,300,12000.00),(64,9,75,900.00),(82,8,400,14000.00),(83,10,100,2500.00),(84,10,75,1875.00),(85,10,150,3750.00);
