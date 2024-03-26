-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: pousada
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acomodacao`
--

DROP TABLE IF EXISTS `acomodacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acomodacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `fk_img` int(11) DEFAULT NULL,
  `disponivel` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_img` (`fk_img`),
  CONSTRAINT `acomodacao_ibfk_1` FOREIGN KEY (`fk_img`) REFERENCES `imagens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acomodacao`
--

LOCK TABLES `acomodacao` WRITE;
/*!40000 ALTER TABLE `acomodacao` DISABLE KEYS */;
INSERT INTO `acomodacao` VALUES (9,'Sol Nascente',450,'Desfrute do espetáculo do amanhecer com vista para o mar nesta cabana exclusiva. Equipada com uma confortável cama queen-size, varanda privativa e decoração inspirada na natureza.',1,1),(10,'Maré Alta',550,'Localizada no ponto mais alto da pousada, a Suíte Maré Alta oferece uma vista panorâmica do oceano. Com um spa privado e janelas do chão ao teto, você terá o refúgio perfeito.',2,0),(11,'Brisa do Mar',350,'Sinta a brisa marinha neste aconchegante quarto com decoração náutica. Com acesso direto à praia e um mini-bar repleto de refrescos locais.',3,0),(12,'Pé na Areia',600,'Ideal para quem não quer perder um segundo de praia, este bungalow oferece uma experiência rústica de luxo com sua própria área de estar ao ar livre e chuveiro externo.',4,0),(13,'Retiro das Palmeiras',480,'Rodeado por palmeiras e jardins tropicais, esta suíte proporciona privacidade e tranquilidade. Relaxe na rede privativa ou aproveite o banho de lua no terraço.',5,0),(14,' Oceano Azul',700,'Elegante e espaçoso, nosso loft apresenta design contemporâneo com toques de artesanato local.',6,0),(15,'Horizonte Sereno',650,' O interior é decorado com tons suaves e materiais naturais, criando um refúgio sereno com todas as comodidades modernas, incluindo Wi-Fi, ar-condicionado e uma cama king-size. Ideal para casais em busca de uma escapada romântica.',7,0),(16,'Refúgio do Navegante',750,'O \"Refúgio do Navegante\" é uma suíte luxuosa que captura a essência da vida na praia com seu design náutico chique e vistas panorâmicas do oceano. Perfeito para quem deseja indulgência e privacidade.',8,0);
/*!40000 ALTER TABLE `acomodacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagens`
--

DROP TABLE IF EXISTS `imagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d0` varchar(200) DEFAULT NULL,
  `d1` varchar(200) DEFAULT NULL,
  `d2` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens`
--

LOCK TABLES `imagens` WRITE;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
INSERT INTO `imagens` VALUES (1,'ap-1',NULL,NULL),(2,'ap-2',NULL,NULL),(3,'ap-3',NULL,NULL),(4,'ap-4',NULL,NULL),(5,'ap-5',NULL,NULL),(6,'ap-6',NULL,NULL),(7,'ap-7',NULL,NULL),(8,'ap-8',NULL,NULL);
/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_a` int(11) DEFAULT NULL,
  `id_u` int(11) DEFAULT NULL,
  `chek_in` date DEFAULT NULL,
  `chek_out` date DEFAULT NULL,
  `pessoas` int(11) DEFAULT NULL,
  `criancas` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_a` (`id_a`),
  KEY `id_u` (`id_u`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_a`) REFERENCES `acomodacao` (`id`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_u`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,9,4,'2024-03-24','2024-03-26',1,0,'2024-03-24 15:40:13');
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `tipo` char(1) DEFAULT '1',
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'L9c25','$2y$10$bGll0BilNEuOjS4ZJ7JGU.2Rd2GoMIjSMGBpGk8CesVRGWTUsaXz.','1','2024-02-25 23:52:13'),(3,'test1','$2y$10$opnJKkeEQGI6kHv10E47beUHmze038LcSLRK9sYrR.Ku4OCEYydBq','1','2024-02-25 19:54:20'),(4,'peuzada','$2y$10$LsBB9mEJPpOBij3IHB2V1er5HQjoiQ6AI0y5WdhKZ3jV2qoMFmBvm','1','2024-02-25 20:27:32');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pousada'
--

--
-- Dumping routines for database 'pousada'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-26 10:07:03
