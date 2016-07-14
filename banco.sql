CREATE DATABASE  IF NOT EXISTS `warehouse_system` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `warehouse_system`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: warehouse_system
-- ------------------------------------------------------
-- Server version	5.0.41-community-nt

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `imei`
--

DROP TABLE IF EXISTS `imei`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imei` (
  `id` int(11) NOT NULL auto_increment,
  `warehouse_current` int(11) NOT NULL,
  `warehouse_destiny` int(11) default NULL,
  `master_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `code` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  KEY `master_id` (`master_id`),
  KEY `product_id` (`product_id`),
  KEY `status_id` (`status_id`),
  KEY `warehouse_destiny` (`warehouse_destiny`),
  KEY `warehouse_current` (`warehouse_current`),
  CONSTRAINT `imei_ibfk_1` FOREIGN KEY (`master_id`) REFERENCES `master` (`id`),
  CONSTRAINT `imei_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `imei_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `imei_ibfk_4` FOREIGN KEY (`warehouse_destiny`) REFERENCES `warehouse` (`id`),
  CONSTRAINT `imei_ibfk_5` FOREIGN KEY (`warehouse_current`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imei`
--

LOCK TABLES `imei` WRITE;
/*!40000 ALTER TABLE `imei` DISABLE KEYS */;
INSERT INTO `imei` VALUES (1,13,14,1,1,1,'4987302156'),(2,13,14,1,2,1,'9451807236'),(3,13,14,1,3,1,'5293708146'),(4,13,14,1,4,1,'8249305671'),(5,13,14,1,5,1,'6031578294'),(6,13,14,2,6,1,'3147528960'),(7,13,14,2,7,1,'8126495073'),(8,13,14,2,8,1,'2740389165'),(9,13,14,2,9,1,'1583024679'),(10,13,14,2,10,1,'9450267318'),(11,13,14,3,11,1,'9271804653'),(12,13,14,3,12,1,'9235716804'),(13,13,14,3,13,1,'8061423597'),(14,13,14,3,14,1,'5468320917'),(15,13,14,3,15,1,'8470916523'),(16,13,14,4,16,1,'9107546283'),(17,13,14,4,17,1,'3952104687'),(18,13,14,4,18,1,'8054172639'),(19,13,14,4,19,1,'0869415723'),(20,13,14,4,20,1,'1285904637'),(21,13,14,5,21,1,'6079423158'),(22,13,14,5,22,1,'2657834190'),(23,13,14,5,23,1,'3154768029'),(24,13,14,5,24,1,'2873619504'),(25,13,14,5,25,1,'8910457236'),(26,13,14,6,26,1,'4720963815'),(27,13,14,6,27,1,'3501864729'),(28,13,14,6,28,1,'9150376824'),(29,13,14,6,29,1,'4560381927'),(30,13,14,6,30,1,'9453726108'),(31,13,14,7,31,1,'6983751042'),(32,13,14,7,32,1,'7845012693'),(33,13,14,7,33,1,'6371458902'),(34,13,14,7,34,1,'4827963150'),(35,13,14,7,35,1,'5943617802'),(36,13,14,8,36,1,'7189035426'),(37,13,14,8,37,1,'6129375408'),(38,13,14,8,38,1,'4801673529'),(39,13,14,8,39,1,'8652390471'),(40,13,14,8,40,1,'1298763504'),(41,13,14,9,41,1,'0821657934'),(42,13,14,9,42,1,'5691482703'),(43,13,14,9,43,1,'1794306285'),(44,13,14,9,44,1,'0785214396'),(45,13,14,9,45,1,'5924738601'),(46,13,14,10,46,1,'0132867945'),(47,13,14,10,47,1,'8972306514'),(48,13,14,10,48,1,'0834217956'),(49,13,14,10,49,1,'5387921604'),(50,13,14,10,50,1,'7549082163'),(51,13,14,11,51,1,'3674581029'),(52,13,14,11,52,1,'2498750136'),(53,13,14,11,53,1,'4681325079'),(54,13,14,11,54,1,'3408176295'),(55,13,14,11,55,1,'7634089512'),(56,13,14,12,56,1,'1902365874'),(57,13,14,12,57,1,'1570469328'),(58,13,14,12,58,1,'1370824695'),(59,13,14,12,59,1,'7206583941'),(60,13,14,12,60,1,'5123974806'),(61,13,14,13,61,1,'3814260759'),(62,13,14,13,62,1,'0452879631'),(63,13,14,13,63,1,'4985607231'),(64,13,14,13,64,1,'3892450671'),(65,13,14,13,65,1,'3480975216'),(66,13,14,14,66,1,'4902658731'),(67,13,14,14,67,1,'3140579862'),(68,13,14,14,68,1,'1204689375'),(69,13,14,14,69,1,'7951684032'),(70,13,14,14,70,1,'8453671920'),(71,13,14,15,71,1,'2967310458'),(72,13,14,15,72,1,'4502168379'),(73,13,14,15,73,1,'8401623975'),(74,13,14,15,74,1,'1069834572'),(75,13,14,15,75,1,'0942736815'),(76,13,14,16,76,1,'0174269538'),(77,13,14,16,77,1,'7496813250'),(78,13,14,16,78,1,'2540163798'),(79,13,14,16,79,1,'4571620389'),(80,13,14,16,80,1,'3671084259'),(81,13,14,17,81,1,'9301564728'),(82,13,14,17,82,1,'6482530971'),(83,13,14,17,83,1,'5694832701'),(84,13,14,17,84,1,'6502318749'),(85,13,14,17,85,1,'0715346829'),(86,13,14,18,86,1,'2784936105'),(87,13,14,18,87,1,'2349785601'),(88,13,14,18,88,1,'6982015473'),(89,13,14,18,89,1,'5734681092'),(90,13,14,18,90,1,'8124975603'),(91,13,14,19,91,1,'8963152047'),(92,13,14,19,92,1,'8493725016'),(93,13,14,19,93,1,'9358674210'),(94,13,14,19,94,1,'9260851473'),(95,13,14,19,95,1,'7120396458'),(96,13,14,20,96,1,'0735694821'),(97,13,14,20,97,1,'1240967385'),(98,13,14,20,98,1,'7426138950'),(99,13,14,20,99,1,'5731684920'),(100,13,14,20,100,1,'9280746351'),(101,22,NULL,21,101,2,'2501678349'),(102,22,NULL,21,102,2,'7368290154'),(103,22,NULL,21,103,2,'4691320758'),(104,22,NULL,21,104,2,'9760582314'),(105,22,NULL,21,105,2,'1732056489'),(106,22,NULL,22,106,2,'9367458021'),(107,22,NULL,22,107,2,'2367815940'),(108,22,NULL,22,108,2,'5861920473'),(109,22,NULL,22,109,2,'1852934760'),(110,22,NULL,22,110,2,'7803942561'),(111,22,NULL,23,111,2,'7328190456'),(112,22,NULL,23,112,2,'3987410562'),(113,22,NULL,23,113,2,'1649357280'),(114,22,NULL,23,114,2,'8150937642'),(115,22,NULL,23,115,2,'3651029748'),(116,22,NULL,24,116,2,'1950367482'),(117,22,NULL,24,117,2,'8043125697'),(118,22,NULL,24,118,2,'4270153986'),(119,22,NULL,24,119,2,'1432857690'),(120,22,NULL,24,120,2,'1793542608'),(121,22,NULL,25,121,2,'3019546728'),(122,22,NULL,25,122,2,'1708395264'),(123,22,NULL,25,123,2,'3467958120'),(124,22,NULL,25,124,2,'4703692518'),(125,22,NULL,25,125,2,'5037469128'),(126,22,NULL,26,126,2,'1956247830'),(127,22,NULL,26,127,2,'0836145729'),(128,22,NULL,26,128,2,'3125074698'),(129,22,NULL,26,129,2,'0385429167'),(130,22,NULL,26,130,2,'4351072896'),(131,22,NULL,27,131,2,'8140532976'),(132,22,NULL,27,132,2,'0476593281'),(133,22,NULL,27,133,2,'7239610458'),(134,22,NULL,27,134,2,'6543890721'),(135,22,NULL,27,135,2,'7543106829'),(136,22,NULL,28,136,2,'7201846593'),(137,22,NULL,28,137,2,'7802354196'),(138,22,NULL,28,138,2,'7415693208'),(139,22,NULL,28,139,2,'2063894751'),(140,22,NULL,28,140,2,'7420631895'),(141,22,NULL,29,141,2,'6245318790'),(142,22,NULL,29,142,2,'4058176392'),(143,22,NULL,29,143,2,'6014273985'),(144,22,NULL,29,144,2,'4309617852'),(145,22,NULL,29,145,2,'3609578241'),(146,22,NULL,30,146,2,'8679054123'),(147,22,NULL,30,147,2,'7639401528'),(148,22,NULL,30,148,2,'1578249306'),(149,22,NULL,30,149,2,'6953470182'),(150,22,NULL,30,150,2,'7938610254'),(151,22,NULL,31,151,2,'1657240398'),(152,22,NULL,31,152,2,'7904621358'),(153,22,NULL,31,153,2,'1543890276'),(154,22,NULL,31,154,2,'3241690875'),(155,22,NULL,31,155,2,'9257431608'),(156,22,NULL,32,156,2,'2674581093'),(157,22,NULL,32,157,2,'8514732960'),(158,22,NULL,32,158,2,'6530481279'),(159,22,NULL,32,159,2,'4932168507'),(160,22,NULL,32,160,2,'3728194506'),(161,22,NULL,33,161,2,'4269703185'),(162,22,NULL,33,162,2,'3762051498'),(163,22,NULL,33,163,2,'6318470925'),(164,22,NULL,33,164,2,'3019547682'),(165,22,NULL,33,165,2,'3059682417'),(166,22,NULL,34,166,2,'5769043821'),(167,22,NULL,34,167,2,'1703264598'),(168,22,NULL,34,168,2,'6540893271'),(169,22,NULL,34,169,2,'6953402718'),(170,22,NULL,34,170,2,'0275436819'),(171,22,NULL,35,171,2,'7658430219'),(172,22,NULL,35,172,2,'9360751248'),(173,22,NULL,35,173,2,'5189702634'),(174,22,NULL,35,174,2,'3571890642'),(175,22,NULL,35,175,2,'5642730189'),(176,22,NULL,36,176,2,'4258109736'),(177,22,NULL,36,177,2,'0754829136'),(178,22,NULL,36,178,2,'7385691042'),(179,22,NULL,36,179,2,'3704985162'),(180,22,NULL,36,180,2,'6851307924'),(181,22,NULL,37,181,2,'2394815760'),(182,22,NULL,37,182,2,'8627541930'),(183,22,NULL,37,183,2,'9143678502'),(184,22,NULL,37,184,2,'0714382956'),(185,22,NULL,37,185,2,'4015983762'),(186,22,NULL,38,186,2,'3517642089'),(187,22,NULL,38,187,2,'7291538406'),(188,22,NULL,38,188,2,'7380519462'),(189,22,NULL,38,189,2,'6518932470'),(190,22,NULL,38,190,2,'5426387091'),(191,22,NULL,39,191,2,'8052314769'),(192,22,NULL,39,192,2,'0896751432'),(193,22,NULL,39,193,2,'4715369820'),(194,22,NULL,39,194,2,'7694285013'),(195,22,NULL,39,195,2,'7315069428'),(196,22,NULL,40,196,2,'3109526478'),(197,22,NULL,40,197,2,'5403172986'),(198,22,NULL,40,198,2,'8609127543'),(199,22,NULL,40,199,2,'6485371092'),(200,22,NULL,40,200,2,'4829560371'),(201,22,NULL,41,201,2,'9468325710'),(202,22,NULL,41,202,2,'4806913725'),(203,22,NULL,41,203,2,'6082357194'),(204,22,NULL,41,204,2,'5307846912'),(205,22,NULL,41,205,2,'6253789014'),(206,22,NULL,42,206,2,'5379281640'),(207,22,NULL,42,207,2,'1609528347'),(208,22,NULL,42,208,2,'6285394017'),(209,22,NULL,42,209,2,'7913846520'),(210,22,NULL,42,210,2,'3826945017'),(211,22,NULL,43,211,2,'1062849753'),(212,22,NULL,43,212,2,'6472195083'),(213,22,NULL,43,213,2,'5830192746'),(214,22,NULL,43,214,2,'9274315806'),(215,22,NULL,43,215,2,'6749102835'),(216,22,NULL,44,216,2,'9354261087'),(217,22,NULL,44,217,2,'4130765829'),(218,22,NULL,44,218,2,'2845719630'),(219,22,NULL,44,219,2,'5064273198'),(220,22,NULL,44,220,2,'4392801765'),(221,22,NULL,45,221,2,'3186052749'),(222,22,NULL,45,222,2,'8176354092'),(223,22,NULL,45,223,2,'6138795024'),(224,22,NULL,45,224,2,'2714963085'),(225,22,NULL,45,225,2,'0572918364'),(226,22,NULL,46,226,2,'5204168397'),(227,22,NULL,46,227,2,'5869314072'),(228,22,NULL,46,228,2,'1759430628'),(229,22,NULL,46,229,2,'1397485062'),(230,22,NULL,46,230,2,'0568472391'),(231,22,NULL,47,231,2,'4216593078'),(232,22,NULL,47,232,2,'8371296054'),(233,22,NULL,47,233,2,'6390125478'),(234,22,NULL,47,234,2,'2534760198'),(235,22,NULL,47,235,2,'3960541872'),(236,22,NULL,48,236,2,'8943157620'),(237,22,NULL,48,237,2,'5043891627'),(238,22,NULL,48,238,2,'8039654172'),(239,22,NULL,48,239,2,'5281637940'),(240,22,NULL,48,240,2,'6820731495'),(241,22,NULL,49,241,2,'7340985261'),(242,22,NULL,49,242,2,'3174529068'),(243,22,NULL,49,243,2,'7645291308'),(244,22,NULL,49,244,2,'9875123406'),(245,22,NULL,49,245,2,'3165247908'),(246,22,NULL,50,246,2,'6173954208'),(247,22,NULL,50,247,2,'7046281395'),(248,22,NULL,50,248,2,'6085493712'),(249,22,NULL,50,249,2,'7586401293'),(250,22,NULL,50,250,2,'1430765289');
/*!40000 ALTER TABLE `imei` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master`
--

DROP TABLE IF EXISTS `master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master` (
  `id` int(11) NOT NULL auto_increment,
  `warehouse_current` int(11) NOT NULL,
  `warehouse_destiny` int(11) default NULL,
  `pallet_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `code` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  KEY `pallet_id` (`pallet_id`),
  KEY `status_id` (`status_id`),
  KEY `warehouse_destiny` (`warehouse_destiny`),
  KEY `warehouse_current` (`warehouse_current`),
  CONSTRAINT `master_ibfk_1` FOREIGN KEY (`pallet_id`) REFERENCES `pallet` (`id`),
  CONSTRAINT `master_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `master_ibfk_3` FOREIGN KEY (`warehouse_destiny`) REFERENCES `warehouse` (`id`),
  CONSTRAINT `master_ibfk_4` FOREIGN KEY (`warehouse_current`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master`
--

LOCK TABLES `master` WRITE;
/*!40000 ALTER TABLE `master` DISABLE KEYS */;
INSERT INTO `master` VALUES (1,13,14,1,1,'5260371948'),(2,13,14,1,1,'9862531470'),(3,13,14,1,1,'0632794815'),(4,13,14,1,1,'6748502931'),(5,13,14,1,1,'7240359186'),(6,13,14,1,1,'1503492786'),(7,13,14,1,1,'9845360271'),(8,13,14,1,1,'3068241957'),(9,13,14,1,1,'4293860571'),(10,13,14,1,1,'4780965132'),(11,13,14,2,1,'4305219678'),(12,13,14,2,1,'6201935748'),(13,13,14,2,1,'7251439680'),(14,13,14,2,1,'5396704182'),(15,13,14,2,1,'6803741592'),(16,13,14,2,1,'8604293157'),(17,13,14,2,1,'4092781365'),(18,13,14,2,1,'0368752194'),(19,13,14,2,1,'1586732940'),(20,13,14,2,1,'2389460751'),(21,22,NULL,3,2,'7832916054'),(22,22,NULL,3,2,'9871602453'),(23,22,NULL,3,2,'5092174863'),(24,22,NULL,3,2,'9658107342'),(25,22,NULL,3,2,'2174085396'),(26,22,NULL,3,2,'8463751902'),(27,22,NULL,3,2,'2315768940'),(28,22,NULL,3,2,'8703624195'),(29,22,NULL,3,2,'8937520416'),(30,22,NULL,3,2,'6921534780'),(31,22,NULL,4,2,'9615723048'),(32,22,NULL,4,2,'4068972135'),(33,22,NULL,4,2,'9042867315'),(34,22,NULL,4,2,'3562018974'),(35,22,NULL,4,2,'1346598270'),(36,22,NULL,4,2,'6502873491'),(37,22,NULL,4,2,'5813206794'),(38,22,NULL,4,2,'8652039147'),(39,22,NULL,4,2,'3246519807'),(40,22,NULL,4,2,'6058943271'),(41,22,NULL,5,2,'0839165274'),(42,22,NULL,5,2,'6780529134'),(43,22,NULL,5,2,'7195802436'),(44,22,NULL,5,2,'3567129048'),(45,22,NULL,5,2,'9025671348'),(46,22,NULL,5,2,'3975806412'),(47,22,NULL,5,2,'0875463129'),(48,22,NULL,5,2,'5392108746'),(49,22,NULL,5,2,'2178369450'),(50,22,NULL,5,2,'5240168739');
/*!40000 ALTER TABLE `master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pallet`
--

DROP TABLE IF EXISTS `pallet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pallet` (
  `id` int(11) NOT NULL auto_increment,
  `warehouse_current` int(11) NOT NULL,
  `warehouse_destiny` int(11) default NULL,
  `status_id` int(11) NOT NULL,
  `code` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  KEY `status_id` (`status_id`),
  KEY `warehouse_destiny` (`warehouse_destiny`),
  KEY `warehouse_current` (`warehouse_current`),
  CONSTRAINT `pallet_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `pallet_ibfk_2` FOREIGN KEY (`warehouse_destiny`) REFERENCES `warehouse` (`id`),
  CONSTRAINT `pallet_ibfk_3` FOREIGN KEY (`warehouse_current`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pallet`
--

LOCK TABLES `pallet` WRITE;
/*!40000 ALTER TABLE `pallet` DISABLE KEYS */;
INSERT INTO `pallet` VALUES (1,13,14,1,'9167058243'),(2,13,14,1,'5437109286'),(3,22,NULL,2,'9780162345'),(4,22,NULL,2,'3862740195'),(5,22,NULL,2,'6317240958');
/*!40000 ALTER TABLE `pallet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(50) default NULL,
  `comercial_name` varchar(100) default NULL,
  `unitary_price` decimal(10,3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'3702849516','Galaxy Y',2062.000),(2,'8657029431','Galaxy s5',1577.000),(3,'2159306874','Galaxy s6',1518.000),(4,'7251340896','Galaxy s4',1464.000),(5,'5016983472','Galaxy s3',2297.000),(6,'7281530694','Galaxy s3 mini',679.000),(7,'6208371495','Galaxy s4 mini',1159.000),(8,'9452036718','Samsung Note 4',2993.000),(9,'9548126730','Samsung Note 5',2125.000),(10,'4869732051','Galaxy Y',1901.000),(11,'4019532786','Galaxy s5',1230.000),(12,'2617403895','Galaxy s6',1972.000),(13,'6325940781','Galaxy s4',931.000),(14,'4187650329','Galaxy s3',1673.000),(15,'0674813259','Galaxy s3 mini',1250.000),(16,'0315729648','Galaxy s4 mini',590.000),(17,'1357268409','Samsung Note 4',889.000),(18,'7842135690','Samsung Note 5',2210.000),(19,'8472653091','Galaxy Y',1982.000),(20,'9185024673','Galaxy s5',2222.000),(21,'4620793158','Galaxy s6',633.000),(22,'8913742065','Galaxy s4',2288.000),(23,'5047396812','Galaxy s3',1203.000),(24,'3472098561','Galaxy s3 mini',2428.000),(25,'9618054372','Galaxy s4 mini',1689.000),(26,'9017854623','Samsung Note 4',735.000),(27,'7495238610','Samsung Note 5',541.000),(28,'4351072986','Galaxy Y',2287.000),(29,'1502348679','Galaxy s5',2386.000),(30,'1548627093','Galaxy s6',1527.000),(31,'9475860312','Galaxy s4',2772.000),(32,'5904178632','Galaxy s3',2526.000),(33,'7691205438','Galaxy s3 mini',2335.000),(34,'7654809312','Galaxy s4 mini',1230.000),(35,'4807965123','Samsung Note 4',1111.000),(36,'3548719602','Samsung Note 5',1115.000),(37,'2548916307','Galaxy Y',2616.000),(38,'4583279106','Galaxy s5',723.000),(39,'3792850146','Galaxy s6',837.000),(40,'8619743520','Galaxy s4',2317.000),(41,'6081372549','Galaxy s3',2643.000),(42,'0753921684','Galaxy s3 mini',2686.000),(43,'0725483169','Galaxy s4 mini',1826.000),(44,'2874093651','Samsung Note 4',580.000),(45,'4367850291','Samsung Note 5',2018.000),(46,'0597318642','Galaxy Y',1729.000),(47,'2746981350','Galaxy s5',2111.000),(48,'6437801592','Galaxy s6',2519.000),(49,'8749635012','Galaxy s4',2335.000),(50,'5387210694','Galaxy s3',2091.000),(51,'7083619425','Galaxy s3 mini',2345.000),(52,'7539682410','Galaxy s4 mini',2602.000),(53,'7362954810','Samsung Note 4',2201.000),(54,'5061879342','Samsung Note 5',2466.000),(55,'3720691854','Galaxy Y',2603.000),(56,'6751083942','Galaxy s5',1522.000),(57,'4306971258','Galaxy s6',1033.000),(58,'0698452713','Galaxy s4',1324.000),(59,'5326014897','Galaxy s3',1489.000),(60,'0349812765','Galaxy s3 mini',2727.000),(61,'1837659204','Galaxy s4 mini',2085.000),(62,'7813062945','Samsung Note 4',1712.000),(63,'2893071645','Samsung Note 5',740.000),(64,'3042589167','Galaxy Y',2289.000),(65,'0872943561','Galaxy s5',800.000),(66,'9126740358','Galaxy s6',910.000),(67,'9216507348','Galaxy s4',1511.000),(68,'1347095682','Galaxy s3',2324.000),(69,'7964823510','Galaxy s3 mini',1741.000),(70,'1478693520','Galaxy s4 mini',1197.000),(71,'3968051472','Samsung Note 4',2372.000),(72,'4579803126','Samsung Note 5',2307.000),(73,'2759486301','Galaxy Y',2951.000),(74,'1580793462','Galaxy s5',1721.000),(75,'4267830591','Galaxy s6',794.000),(76,'9780461253','Galaxy s4',845.000),(77,'9241380756','Galaxy s3',972.000),(78,'5864029371','Galaxy s3 mini',1996.000),(79,'8147365902','Galaxy s4 mini',1603.000),(80,'8250736419','Samsung Note 4',1465.000),(81,'9260417358','Samsung Note 5',705.000),(82,'7306849125','Galaxy Y',1885.000),(83,'0571243689','Galaxy s5',1333.000),(84,'6284390517','Galaxy s6',763.000),(85,'5039827614','Galaxy s4',2585.000),(86,'4631270895','Galaxy s3',1328.000),(87,'2963584701','Galaxy s3 mini',1919.000),(88,'9276354801','Galaxy s4 mini',2840.000),(89,'7829601354','Samsung Note 4',1075.000),(90,'9761084352','Samsung Note 5',1029.000),(91,'1096458732','Galaxy Y',2087.000),(92,'2708349561','Galaxy s5',2949.000),(93,'6592341087','Galaxy s6',887.000),(94,'5478960321','Galaxy s4',1914.000),(95,'7243986051','Galaxy s3',1172.000),(96,'1792304856','Galaxy s3 mini',2357.000),(97,'5946071283','Galaxy s4 mini',1849.000),(98,'2714506893','Samsung Note 4',2355.000),(99,'5920481376','Samsung Note 5',2656.000),(100,'6924107358','Galaxy Y',2390.000),(101,'5107483926','Galaxy s5',2830.000),(102,'8963214705','Galaxy s6',1101.000),(103,'8267954310','Galaxy s4',1594.000),(104,'5079641382','Galaxy s3',2352.000),(105,'2563804971','Galaxy s3 mini',1123.000),(106,'5326894107','Galaxy s4 mini',2556.000),(107,'9048657123','Samsung Note 4',991.000),(108,'5876041329','Samsung Note 5',2184.000),(109,'7610934285','Galaxy Y',2735.000),(110,'0976835214','Galaxy s5',1289.000),(111,'9083176254','Galaxy s6',1559.000),(112,'2081546937','Galaxy s4',1330.000),(113,'4267901583','Galaxy s3',2833.000),(114,'1328064597','Galaxy s3 mini',2473.000),(115,'3465801729','Galaxy s4 mini',1044.000),(116,'1957280643','Samsung Note 4',1714.000),(117,'5763982014','Samsung Note 5',1493.000),(118,'5198432760','Galaxy Y',2916.000),(119,'8912457036','Galaxy s5',941.000),(120,'6051794382','Galaxy s6',2264.000),(121,'7194068352','Galaxy s4',2398.000),(122,'6438571092','Galaxy s3',855.000),(123,'1359602748','Galaxy s3 mini',1806.000),(124,'6701549238','Galaxy s4 mini',2516.000),(125,'2358904671','Samsung Note 4',1824.000),(126,'5270836149','Samsung Note 5',2983.000),(127,'5064218739','Galaxy Y',1291.000),(128,'7936518204','Galaxy s5',1381.000),(129,'9853716042','Galaxy s6',1570.000),(130,'4793201865','Galaxy s4',1599.000),(131,'8952746310','Galaxy s3',2846.000),(132,'0389576241','Galaxy s3 mini',2177.000),(133,'1692347805','Galaxy s4 mini',1014.000),(134,'2307486195','Samsung Note 4',2480.000),(135,'5821476039','Samsung Note 5',963.000),(136,'3579206814','Galaxy Y',1360.000),(137,'6253480917','Galaxy s5',2887.000),(138,'8730462519','Galaxy s6',2581.000),(139,'4190672835','Galaxy s4',2121.000),(140,'0173684952','Galaxy s3',1793.000),(141,'9485613027','Galaxy s3 mini',2903.000),(142,'0819637524','Galaxy s4 mini',2796.000),(143,'3695708124','Samsung Note 4',2957.000),(144,'7246109358','Samsung Note 5',2367.000),(145,'5827460391','Galaxy Y',962.000),(146,'1864052739','Galaxy s5',1848.000),(147,'1649275038','Galaxy s6',1279.000),(148,'3695428017','Galaxy s4',1515.000),(149,'2594761083','Galaxy s3',2593.000),(150,'4182796053','Galaxy s3 mini',2847.000),(151,'6305417289','Galaxy s4 mini',2862.000),(152,'2347801659','Samsung Note 4',510.000),(153,'3869754210','Samsung Note 5',673.000),(154,'5201468739','Galaxy Y',1616.000),(155,'9504267183','Galaxy s5',1169.000),(156,'4125396078','Galaxy s6',2386.000),(157,'2685719304','Galaxy s4',2629.000),(158,'5268497103','Galaxy s3',1745.000),(159,'9463028751','Galaxy s3 mini',1708.000),(160,'0913247685','Galaxy s4 mini',2030.000),(161,'0324867195','Samsung Note 4',1264.000),(162,'9435867210','Samsung Note 5',1837.000),(163,'0275618934','Galaxy Y',2328.000),(164,'2690718534','Galaxy s5',2172.000),(165,'2819035647','Galaxy s6',1309.000),(166,'1348675209','Galaxy s4',1373.000),(167,'1639480275','Galaxy s3',2511.000),(168,'4026751389','Galaxy s3 mini',1797.000),(169,'8793142056','Galaxy s4 mini',2381.000),(170,'9162845037','Samsung Note 4',881.000),(171,'5134069287','Samsung Note 5',2088.000),(172,'5738142096','Galaxy Y',1524.000),(173,'2184790356','Galaxy s5',2029.000),(174,'4013952876','Galaxy s6',1711.000),(175,'5046187932','Galaxy s4',2622.000),(176,'1250349786','Galaxy s3',2784.000),(177,'6987421350','Galaxy s3 mini',751.000),(178,'1745036982','Galaxy s4 mini',2397.000),(179,'5473021689','Samsung Note 4',2038.000),(180,'5074683219','Samsung Note 5',905.000),(181,'1429730685','Galaxy Y',2834.000),(182,'4259871036','Galaxy s5',2069.000),(183,'5138402796','Galaxy s6',2276.000),(184,'2701683495','Galaxy s4',2736.000),(185,'8203916547','Galaxy s3',2606.000),(186,'9253714860','Galaxy s3 mini',1615.000),(187,'9734821650','Galaxy s4 mini',2352.000),(188,'3190482675','Samsung Note 4',1042.000),(189,'3682410759','Samsung Note 5',679.000),(190,'9584671203','Galaxy Y',2100.000),(191,'3246091578','Galaxy s5',1001.000),(192,'8045376291','Galaxy s6',974.000),(193,'9401623875','Galaxy s4',570.000),(194,'8270394561','Galaxy s3',2744.000),(195,'3159062874','Galaxy s3 mini',1262.000),(196,'7314265809','Galaxy s4 mini',2869.000),(197,'9418270365','Samsung Note 4',2312.000),(198,'1862043795','Samsung Note 5',2736.000),(199,'9815320467','Galaxy Y',804.000),(200,'9845306127','Galaxy s5',1967.000),(201,'6852713904','Galaxy s6',905.000),(202,'1493280756','Galaxy s4',1484.000),(203,'5093672418','Galaxy s3',979.000),(204,'0659873214','Galaxy s3 mini',2076.000),(205,'9023486157','Galaxy s4 mini',1497.000),(206,'6873124905','Samsung Note 4',2326.000),(207,'4719253608','Samsung Note 5',2736.000),(208,'7246109583','Galaxy Y',1584.000),(209,'1753098426','Galaxy s5',2298.000),(210,'1825074693','Galaxy s6',934.000),(211,'1036892457','Galaxy s4',1617.000),(212,'7653428190','Galaxy s3',2406.000),(213,'7362180495','Galaxy s3 mini',2092.000),(214,'7061423958','Galaxy s4 mini',1093.000),(215,'5342910687','Samsung Note 4',1056.000),(216,'3768042159','Samsung Note 5',654.000),(217,'8691274530','Galaxy Y',2369.000),(218,'6315704982','Galaxy s5',1876.000),(219,'6820934175','Galaxy s6',2839.000),(220,'4321685097','Galaxy s4',1236.000),(221,'4892613057','Galaxy s3',1313.000),(222,'1934078265','Galaxy s3 mini',1999.000),(223,'4835170962','Galaxy s4 mini',2814.000),(224,'1687324095','Samsung Note 4',1908.000),(225,'2964715380','Samsung Note 5',849.000),(226,'5836271940','Galaxy Y',2968.000),(227,'5260174983','Galaxy s5',673.000),(228,'9561370842','Galaxy s6',1777.000),(229,'8245031796','Galaxy s4',2677.000),(230,'2568714903','Galaxy s3',1772.000),(231,'6532179084','Galaxy s3 mini',2494.000),(232,'6723408951','Galaxy s4 mini',2765.000),(233,'1450873629','Samsung Note 4',643.000),(234,'1734290586','Samsung Note 5',2019.000),(235,'6192350784','Galaxy Y',877.000),(236,'0932571468','Galaxy s5',1766.000),(237,'2189345067','Galaxy s6',2650.000),(238,'3927048561','Galaxy s4',1288.000),(239,'3480527691','Galaxy s3',1811.000),(240,'3487206591','Galaxy s3 mini',2543.000),(241,'1782406359','Galaxy s4 mini',2659.000),(242,'1408523769','Samsung Note 4',2202.000),(243,'9862301745','Samsung Note 5',584.000),(244,'6581934270','Galaxy Y',1427.000),(245,'7852490361','Galaxy s5',1140.000),(246,'2567091834','Galaxy s6',2048.000),(247,'0619738452','Galaxy s4',797.000),(248,'2658719340','Galaxy s3',2908.000),(249,'2379416580','Galaxy s3 mini',2743.000),(250,'8094536712','Galaxy s4 mini',1047.000);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL auto_increment,
  `label` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'in transit'),(2,'in stock');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_log`
--

DROP TABLE IF EXISTS `transfer_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_log` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `descricao` varchar(140) default NULL,
  `acao` varchar(100) default NULL,
  `id_origem` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_origem` (`id_origem`),
  KEY `id_destino` (`id_destino`),
  CONSTRAINT `transfer_log_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  CONSTRAINT `transfer_log_ibfk_2` FOREIGN KEY (`id_origem`) REFERENCES `warehouse` (`id`),
  CONSTRAINT `transfer_log_ibfk_3` FOREIGN KEY (`id_destino`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_log`
--

LOCK TABLES `transfer_log` WRITE;
/*!40000 ALTER TABLE `transfer_log` DISABLE KEYS */;
INSERT INTO `transfer_log` VALUES (1,1,'2016-07-14 00:00:00','Log para teste itriad system','Transferencia de carga',13,14),(2,1,'2016-07-14 00:00:00','Log para teste itriad system','Transferencia de carga',13,14);
/*!40000 ALTER TABLE `transfer_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_log_imei`
--

DROP TABLE IF EXISTS `transfer_log_imei`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_log_imei` (
  `id` int(11) NOT NULL auto_increment,
  `id_log_master` int(11) NOT NULL,
  `id_imei` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_log_master` (`id_log_master`),
  KEY `id_imei` (`id_imei`),
  CONSTRAINT `transfer_log_imei_ibfk_1` FOREIGN KEY (`id_log_master`) REFERENCES `transfer_log_master` (`id`),
  CONSTRAINT `transfer_log_imei_ibfk_2` FOREIGN KEY (`id_imei`) REFERENCES `imei` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_log_imei`
--

LOCK TABLES `transfer_log_imei` WRITE;
/*!40000 ALTER TABLE `transfer_log_imei` DISABLE KEYS */;
INSERT INTO `transfer_log_imei` VALUES (1,1,1,'2016-07-14 00:00:00'),(2,1,2,'2016-07-14 00:00:00'),(3,1,3,'2016-07-14 00:00:00'),(4,1,4,'2016-07-14 00:00:00'),(5,1,5,'2016-07-14 00:00:00'),(6,2,6,'2016-07-14 00:00:00'),(7,2,7,'2016-07-14 00:00:00'),(8,2,8,'2016-07-14 00:00:00'),(9,2,9,'2016-07-14 00:00:00'),(10,2,10,'2016-07-14 00:00:00'),(11,3,11,'2016-07-14 00:00:00'),(12,3,12,'2016-07-14 00:00:00'),(13,3,13,'2016-07-14 00:00:00'),(14,3,14,'2016-07-14 00:00:00'),(15,3,15,'2016-07-14 00:00:00'),(16,4,16,'2016-07-14 00:00:00'),(17,4,17,'2016-07-14 00:00:00'),(18,4,18,'2016-07-14 00:00:00'),(19,4,19,'2016-07-14 00:00:00'),(20,4,20,'2016-07-14 00:00:00'),(21,5,21,'2016-07-14 00:00:00'),(22,5,22,'2016-07-14 00:00:00'),(23,5,23,'2016-07-14 00:00:00'),(24,5,24,'2016-07-14 00:00:00'),(25,5,25,'2016-07-14 00:00:00'),(26,6,26,'2016-07-14 00:00:00'),(27,6,27,'2016-07-14 00:00:00'),(28,6,28,'2016-07-14 00:00:00'),(29,6,29,'2016-07-14 00:00:00'),(30,6,30,'2016-07-14 00:00:00'),(31,7,31,'2016-07-14 00:00:00'),(32,7,32,'2016-07-14 00:00:00'),(33,7,33,'2016-07-14 00:00:00'),(34,7,34,'2016-07-14 00:00:00'),(35,7,35,'2016-07-14 00:00:00'),(36,8,36,'2016-07-14 00:00:00'),(37,8,37,'2016-07-14 00:00:00'),(38,8,38,'2016-07-14 00:00:00'),(39,8,39,'2016-07-14 00:00:00'),(40,8,40,'2016-07-14 00:00:00'),(41,9,41,'2016-07-14 00:00:00'),(42,9,42,'2016-07-14 00:00:00'),(43,9,43,'2016-07-14 00:00:00'),(44,9,44,'2016-07-14 00:00:00'),(45,9,45,'2016-07-14 00:00:00'),(46,10,46,'2016-07-14 00:00:00'),(47,10,47,'2016-07-14 00:00:00'),(48,10,48,'2016-07-14 00:00:00'),(49,10,49,'2016-07-14 00:00:00'),(50,10,50,'2016-07-14 00:00:00'),(51,11,51,'2016-07-14 00:00:00'),(52,11,52,'2016-07-14 00:00:00'),(53,11,53,'2016-07-14 00:00:00'),(54,11,54,'2016-07-14 00:00:00'),(55,11,55,'2016-07-14 00:00:00'),(56,12,56,'2016-07-14 00:00:00'),(57,12,57,'2016-07-14 00:00:00'),(58,12,58,'2016-07-14 00:00:00'),(59,12,59,'2016-07-14 00:00:00'),(60,12,60,'2016-07-14 00:00:00'),(61,13,61,'2016-07-14 00:00:00'),(62,13,62,'2016-07-14 00:00:00'),(63,13,63,'2016-07-14 00:00:00'),(64,13,64,'2016-07-14 00:00:00'),(65,13,65,'2016-07-14 00:00:00'),(66,14,66,'2016-07-14 00:00:00'),(67,14,67,'2016-07-14 00:00:00'),(68,14,68,'2016-07-14 00:00:00'),(69,14,69,'2016-07-14 00:00:00'),(70,14,70,'2016-07-14 00:00:00'),(71,15,71,'2016-07-14 00:00:00'),(72,15,72,'2016-07-14 00:00:00'),(73,15,73,'2016-07-14 00:00:00'),(74,15,74,'2016-07-14 00:00:00'),(75,15,75,'2016-07-14 00:00:00'),(76,16,76,'2016-07-14 00:00:00'),(77,16,77,'2016-07-14 00:00:00'),(78,16,78,'2016-07-14 00:00:00'),(79,16,79,'2016-07-14 00:00:00'),(80,16,80,'2016-07-14 00:00:00'),(81,17,81,'2016-07-14 00:00:00'),(82,17,82,'2016-07-14 00:00:00'),(83,17,83,'2016-07-14 00:00:00'),(84,17,84,'2016-07-14 00:00:00'),(85,17,85,'2016-07-14 00:00:00'),(86,18,86,'2016-07-14 00:00:00'),(87,18,87,'2016-07-14 00:00:00'),(88,18,88,'2016-07-14 00:00:00'),(89,18,89,'2016-07-14 00:00:00'),(90,18,90,'2016-07-14 00:00:00'),(91,19,91,'2016-07-14 00:00:00'),(92,19,92,'2016-07-14 00:00:00'),(93,19,93,'2016-07-14 00:00:00'),(94,19,94,'2016-07-14 00:00:00'),(95,19,95,'2016-07-14 00:00:00'),(96,20,96,'2016-07-14 00:00:00'),(97,20,97,'2016-07-14 00:00:00'),(98,20,98,'2016-07-14 00:00:00'),(99,20,99,'2016-07-14 00:00:00'),(100,20,100,'2016-07-14 00:00:00');
/*!40000 ALTER TABLE `transfer_log_imei` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_log_master`
--

DROP TABLE IF EXISTS `transfer_log_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_log_master` (
  `id` int(11) NOT NULL auto_increment,
  `id_log_pallet` int(11) default NULL,
  `id_master` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `id_log` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `id_master` (`id_master`),
  KEY `transfer_log_master_ibfk_2` (`id_log_pallet`),
  CONSTRAINT `transfer_log_master_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `master` (`id`),
  CONSTRAINT `transfer_log_master_ibfk_2` FOREIGN KEY (`id_log_pallet`) REFERENCES `transfer_log_pallet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_log_master`
--

LOCK TABLES `transfer_log_master` WRITE;
/*!40000 ALTER TABLE `transfer_log_master` DISABLE KEYS */;
INSERT INTO `transfer_log_master` VALUES (1,1,1,'2016-07-14 00:00:00',1),(2,1,2,'2016-07-14 00:00:00',1),(3,1,3,'2016-07-14 00:00:00',1),(4,1,4,'2016-07-14 00:00:00',1),(5,1,5,'2016-07-14 00:00:00',1),(6,1,6,'2016-07-14 00:00:00',1),(7,1,7,'2016-07-14 00:00:00',1),(8,1,8,'2016-07-14 00:00:00',1),(9,1,9,'2016-07-14 00:00:00',1),(10,1,10,'2016-07-14 00:00:00',1),(11,2,11,'2016-07-14 00:00:00',2),(12,2,12,'2016-07-14 00:00:00',2),(13,2,13,'2016-07-14 00:00:00',2),(14,2,14,'2016-07-14 00:00:00',2),(15,2,15,'2016-07-14 00:00:00',2),(16,2,16,'2016-07-14 00:00:00',2),(17,2,17,'2016-07-14 00:00:00',2),(18,2,18,'2016-07-14 00:00:00',2),(19,2,19,'2016-07-14 00:00:00',2),(20,2,20,'2016-07-14 00:00:00',2);
/*!40000 ALTER TABLE `transfer_log_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_log_pallet`
--

DROP TABLE IF EXISTS `transfer_log_pallet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_log_pallet` (
  `id` int(11) NOT NULL auto_increment,
  `created_at` datetime NOT NULL,
  `id_log` int(11) NOT NULL,
  `id_pallet` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_pallet` (`id_pallet`),
  KEY `id_log` (`id_log`),
  CONSTRAINT `transfer_log_pallet_ibfk_1` FOREIGN KEY (`id_pallet`) REFERENCES `pallet` (`id`),
  CONSTRAINT `transfer_log_pallet_ibfk_2` FOREIGN KEY (`id_log`) REFERENCES `transfer_log` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_log_pallet`
--

LOCK TABLES `transfer_log_pallet` WRITE;
/*!40000 ALTER TABLE `transfer_log_pallet` DISABLE KEYS */;
INSERT INTO `transfer_log_pallet` VALUES (1,'2016-07-14 00:00:00',1,1),(2,'2016-07-14 00:00:00',2,2);
/*!40000 ALTER TABLE `transfer_log_pallet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transporter`
--

DROP TABLE IF EXISTS `transporter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transporter` (
  `id` int(11) NOT NULL auto_increment,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transporter`
--

LOCK TABLES `transporter` WRITE;
/*!40000 ALTER TABLE `transporter` DISABLE KEYS */;
/*!40000 ALTER TABLE `transporter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(100) NOT NULL,
  `perfil` enum('ADM','USER') default NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'usuario adm','ADM','adm@itriad.com','202cb962ac59075b964b07152d234b70'),(2,'usuario comum','USER','user@itriad.com','202cb962ac59075b964b07152d234b70');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL auto_increment,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse`
--

LOCK TABLES `warehouse` WRITE;
/*!40000 ALTER TABLE `warehouse` DISABLE KEYS */;
INSERT INTO `warehouse` VALUES (13,'armazem manaus'),(14,'armazem sao paulo'),(15,'armazem fortaleza'),(16,'armazem rio de janeiro'),(17,'armazem curitiba'),(18,'warehouse number'),(19,'warehouse number'),(20,'warehouse number'),(21,'warehouse number'),(22,'warehouse number');
/*!40000 ALTER TABLE `warehouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_limits`
--

DROP TABLE IF EXISTS `warehouse_limits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_limits` (
  `id` int(11) NOT NULL auto_increment,
  `warehouse_origin_id` int(11) NOT NULL,
  `warehouse_target_id` int(11) default NULL,
  `limite` decimal(10,3) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `warehouse_origin_id` (`warehouse_origin_id`),
  KEY `warehouse_target_id` (`warehouse_target_id`),
  CONSTRAINT `warehouse_limits_ibfk_1` FOREIGN KEY (`warehouse_origin_id`) REFERENCES `warehouse` (`id`),
  CONSTRAINT `warehouse_limits_ibfk_2` FOREIGN KEY (`warehouse_target_id`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_limits`
--

LOCK TABLES `warehouse_limits` WRITE;
/*!40000 ALTER TABLE `warehouse_limits` DISABLE KEYS */;
INSERT INTO `warehouse_limits` VALUES (12,13,14,2753672.000),(13,13,15,8000.000),(14,13,16,19000.000),(15,13,17,85000.000),(16,18,NULL,7944.000),(17,19,NULL,3108.000),(18,20,NULL,9214.000),(19,21,NULL,5040.000),(20,22,NULL,6899.000);
/*!40000 ALTER TABLE `warehouse_limits` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-14  2:16:53
