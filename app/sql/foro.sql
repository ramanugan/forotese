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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registroasistentes`
--

LOCK TABLES `registroasistentes` WRITE;
/*!40000 ALTER TABLE `registroasistentes` DISABLE KEYS */;
INSERT INTO `registroasistentes` VALUES (1,1,'interno','Alex',2,'foto.jpg','2012-04-10','alex@gmail.com'),(2,1,'interno','Alex2',2,'foto.jpg','2012-04-10','alex2@gmail.com'),(3,1,'externo','Alex3',3,'foto.jpg','2012-04-10','alex3@gmail.com');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registroponentes`
--

LOCK TABLES `registroponentes` WRITE;
/*!40000 ALTER TABLE `registroponentes` DISABLE KEYS */;
INSERT INTO `registroponentes` VALUES (1,1,'interno','erika ramirez','foro',4,'foto.jpg','2012-04-09','foro1.pdf','eri@hotmail.com'),(2,1,'interno','alex','projecttest',2,'foto.jpg','2012-04-10','foro1.pdf','alex@hotmail.com');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revisionproyectos`
--

LOCK TABLES `revisionproyectos` WRITE;
/*!40000 ALTER TABLE `revisionproyectos` DISABLE KEYS */;
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

-- Dump completed on 2012-04-13 12:31:47
