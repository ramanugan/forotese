-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: ForoTese
-- ------------------------------------------------------
-- Server version	5.1.49-3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ForoTese`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ForoTese` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ForoTese`;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_del_evento` varchar(254) NOT NULL,
  `fecha_del_evento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'test','2012-04-09');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registroasistentes`
--

DROP TABLE IF EXISTS `registroasistentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registroasistentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evento_id` int(11) NOT NULL,
  `tipo_asistente` enum('interno','externo') NOT NULL DEFAULT 'interno',
  `nombre_completo` varchar(254) NOT NULL,
  `semestre` tinyint(4) NOT NULL,
  `foto` varchar(254) NOT NULL,
  `fecha_registro` date NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registrotese_evento` (`evento_id`),
  CONSTRAINT `fk_registrotese_evento0` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registroasistentes`
--

LOCK TABLES `registroasistentes` WRITE;
/*!40000 ALTER TABLE `registroasistentes` DISABLE KEYS */;
INSERT INTO `registroasistentes` VALUES (1,1,'interno','Alex',2,'foto.jpg','2012-04-10','alex@gmail.com'),(2,1,'interno','Alex2',2,'foto.jpg','2012-04-10','alex2@gmail.com'),(3,1,'externo','Alex3',3,'foto.jpg','2012-04-10','alex3@gmail.com'),(4,1,'interno','Ian Test',2,'CH.jpg','2012-04-26','iantest@test.com'),(5,1,'interno','Ian Test',1,'CH.jpg','2012-04-26','alex2@gmail.com'),(6,1,'interno','Ian Test',1,'mountain_forest_3-wallpaper-2560x1600.jpg','2012-04-26','alex2@gmail.com'),(7,1,'interno','Ian Test',1,'foro_tese4f9a1da333d19CH.jpg','2012-04-26','alex2@gmail.com'),(8,1,'interno','Alex',1,'asistente_4f9a1dd3dfac6CH.jpg','2012-04-26','alex2@gmail.com'),(9,1,'interno','Ian Test',1,'asistente_4f9a1e3521dbf_CH.jpg','2012-04-26','iantest@test.com'),(10,1,'interno','Ian Test',1,'asistente_4f9cd0cb6aca8_CH.jpg','2012-04-29','iantest@test.com'),(11,1,'interno','Ian Test',1,'asistente_4f9cd1065e5d7_CH.jpg','2012-04-29','iantest@test.com'),(12,1,'interno','Ian Test',1,'asistente_4f9cd117d5488_CH.jpg','2012-04-29','iantest@test.com'),(13,1,'interno','Ian Test',1,'asistente_4f9cd151e2930_CH.jpg','2012-04-29','iantest@test.com'),(14,1,'interno','Ian Test',1,'asistente_4f9cd1ec980d6_CH.jpg','2012-04-29','iantest@test.com'),(15,1,'interno','Ian Test',1,'asistente_4f9cd23336f2d_fly_agaric_mushrooms-wallpaper-1366x768.jpg','2012-04-29','iantest@test.com'),(16,1,'interno','Ian Test',1,'asistente_4f9cd3a8b4422_CH.jpg','2012-04-29','iantest@test.com'),(17,1,'interno','Ian Test',1,'asistente_4f9cd42a6f610_CH.jpg','2012-04-29','alex2@gmail.com'),(18,1,'interno','Ian Test',1,'asistente_4f9cd5d06cd34_CH.jpg','2012-04-29','alex2@gmail.com'),(19,1,'interno','Ian Test',1,'asistente_4f9cd5f49700b_CH.jpg','2012-04-29','alex2@gmail.com');
/*!40000 ALTER TABLE `registroasistentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registroponentes`
--

DROP TABLE IF EXISTS `registroponentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registroponentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evento_id` int(11) NOT NULL,
  `tipo_ponente` enum('interno','externo') NOT NULL DEFAULT 'interno',
  `nombre_completo` varchar(254) NOT NULL,
  `nombre_proyecto` varchar(254) NOT NULL,
  `semestre` tinyint(4) NOT NULL,
  `foto` varchar(254) NOT NULL,
  `fecha_registro` date NOT NULL,
  `proyecto_pdf` varchar(254) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registrotese_evento` (`evento_id`),
  CONSTRAINT `fk_registrotese_evento` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registroponentes`
--

LOCK TABLES `registroponentes` WRITE;
/*!40000 ALTER TABLE `registroponentes` DISABLE KEYS */;
INSERT INTO `registroponentes` VALUES (1,1,'interno','erika ramirez','foro',4,'foto.jpg','2012-04-09','foro1.pdf','eri@hotmail.com'),(2,1,'interno','alex','projecttest',2,'foto.jpg','2012-04-10','foro1.pdf','alex@hotmail.com'),(3,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'CH.jpg','2012-04-26','escanear0001.pdf','test_1@hotmail.com'),(4,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a27c4ac48c_tree_tops-wallpaper-1366x768.jpg','2012-04-26','ponente_pdf_4f9a27c4ac48c_COTIZACION  CSI 240309.pdf','ponente_1@hotmail.com'),(5,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a31152e068_orvalho-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a31152e068_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(9,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a33bd62d14_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a33bd62d14_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(10,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a341c91be7_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a341c91be7_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(11,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a3460e9aa3_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a3460e9aa3_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(12,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a347df415a_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a347df415a_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(13,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a34d2bc1e3_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a34d2bc1e3_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(14,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a350c6b752_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a350c6b752_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(15,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a351fcc44c_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a351fcc44c_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(16,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a35385136a_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a35385136a_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(17,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a35b662675_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a35b662675_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(18,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a35c0de0ce_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a35c0de0ce_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(19,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a3609a625b_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a3609a625b_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(20,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a361f4dead_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a361f4dead_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(21,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a362ab1056_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a362ab1056_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(22,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a3733b9cb3_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a3733b9cb3_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(23,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a390563941_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a390563941_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(24,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a394b8ee5d_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a394b8ee5d_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(25,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a3cc9ca257_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a3cc9ca257_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(26,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9a3daf8286b_bamboo_3-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a3daf8286b_CV_ALEXREYES.pdf','ponente_1@hotmail.com'),(27,1,'interno','Ponente test 2','Proyecto Ponente test 2',1,'ponente_foto_4f9a3e6477b3f_fly_agaric_mushrooms-wallpaper-1366x768.jpg','2012-04-27','ponente_pdf_4f9a3e6477b3f_2011-11-30-Suma.pdf','ponente_2@hotmail.com'),(28,1,'interno','Ponente test 1','Proyecto Ponente test 1',1,'ponente_foto_4f9cd81fe77f1_fly_agaric_mushrooms-wallpaper-1366x768.jpg','2012-04-29','ponente_pdf_4f9cd81fe77f1_CV_ALEXREYES.pdf','ponente_1@hotmail.com');
/*!40000 ALTER TABLE `registroponentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revisionproyectos`
--

DROP TABLE IF EXISTS `revisionproyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revisionproyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registroponentes_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `estatus` enum('aceptado','no aceptado') NOT NULL,
  `comentarios_profesor` tinytext NOT NULL,
  `fecha_exposicion` date NOT NULL,
  `hora_exposicion` time NOT NULL,
  `lugar` varchar(254) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_revisionproyecto_registroponentes1` (`registroponentes_id`),
  KEY `fk_revisionproyectos_users1` (`users_id`),
  CONSTRAINT `fk_revisionproyectos_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_revisionproyecto_registroponentes1` FOREIGN KEY (`registroponentes_id`) REFERENCES `registroponentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revisionproyectos`
--

LOCK TABLES `revisionproyectos` WRITE;
/*!40000 ALTER TABLE `revisionproyectos` DISABLE KEYS */;
INSERT INTO `revisionproyectos` VALUES (1,26,4,'no aceptado','','2032-01-01','00:00:00',''),(2,27,2,'no aceptado','','0000-00-00','00:00:00',''),(3,28,2,'no aceptado','','0000-00-00','00:00:00','');
/*!40000 ALTER TABLE `revisionproyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','profesor') NOT NULL DEFAULT 'admin',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','c94967e45ddb21bfa3b9a6d40e1cebd7e11e21c8','admin','2012-04-09 17:53:33','2012-04-09 17:53:33'),(2,'user1','user1','ec936dc87700a798cd058048ccd2bb4b603c0659','admin','2012-04-09 17:52:23','2012-04-09 17:52:23'),(3,'erika','ramirez','f3d47260e645d235833e099d6a9f1a9c18d3a343','admin','2012-04-09 18:52:38','2012-04-09 18:52:38'),(4,'user3','user3','8dfdce90630efb1e24c8024a3d339bc32c157624','admin','2012-04-12 14:49:32','2012-04-12 14:49:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-04-30 18:25:55
