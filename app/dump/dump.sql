CREATE DATABASE `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres_usuario` varchar(150) DEFAULT NULL,
  `paterno_usuario` varchar(150) DEFAULT NULL,
  `materno_usuario` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
