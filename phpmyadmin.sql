-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: REGISTRATION
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

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
-- Table structure for table `ADMIN`
--

DROP TABLE IF EXISTS `ADMIN`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ADMIN` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ADMIN`
--

LOCK TABLES `ADMIN` WRITE;
/*!40000 ALTER TABLE `ADMIN` DISABLE KEYS */;
INSERT INTO `ADMIN` VALUES ('newrajsubedi@gmail.com','MONROE');
/*!40000 ALTER TABLE `ADMIN` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STATE`
--

DROP TABLE IF EXISTS `STATE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `STATE` (
  `Statename` varchar(30) NOT NULL,
  `Lat` varchar(30) NOT NULL,
  `Lng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STATE`
--

LOCK TABLES `STATE` WRITE;
/*!40000 ALTER TABLE `STATE` DISABLE KEYS */;
INSERT INTO `STATE` VALUES ('State','32.5641645','-116.9452974'),('MS','32.3546679','-89.3985283'),('MD','39.0457549','-76.6412712'),('LA','34.0522342','-118.2436849'),('DC','38.929591','-77.0331936'),('TN','35.5174913','-86.5804473'),('FL','27.6648274','-81.5157535'),('MN','46.729553','-94.6858998'),('MD','39.0457549','-76.6412712'),('TN','35.5174913','-86.5804473'),('TX','31.9685988','-99.9018131'),('TX','31.9685988','-99.9018131'),('MO','37.9642529','-91.8318334'),('AR','35.20105','-91.8318334'),('AR','35.20105','-91.8318334'),('AR','35.20105','-91.8318334'),('AL','32.3182314','-86.902298'),('MO','37.9642529','-91.8318334'),('LA','34.0522342','-118.2436849'),('WA','47.7510741','-120.7401386'),('AR','35.20105','-91.8318334'),('PA','41.2033216','-77.1945247'),('MN','46.729553','-94.6858998'),('MS','32.3546679','-89.3985283'),('TX','31.9685988','-99.9018131'),('MO','37.9642529','-91.8318334'),('WI','43.7844397','-88.7878678'),('MI','44.3148443','-85.6023643'),('MI','44.3148443','-85.6023643'),('MN','46.729553','-94.6858998'),('VA','37.4315734','-78.6568942'),('MD','39.0457549','-76.6412712'),('VA','37.4315734','-78.6568942'),('VA','37.4315734','-78.6568942'),('IA','41.8780025','-93.097702'),('AR','35.20105','-91.8318334'),('AL','32.3182314','-86.902298'),('AL','32.3182314','-86.902298'),('GA','32.1656221','-82.9000751'),('OK','35.0077519','-97.092877'),('FL','27.6648274','-81.5157535'),('KY','37.8393332','-84.2700179'),('KS','39.011902','-98.4842465'),('FL','27.6648274','-81.5157535'),('PA','41.2033216','-77.1945247'),('WI','43.7844397','-88.7878678'),('AR','35.20105','-91.8318334'),('VA','37.4315734','-78.6568942'),('LA','34.0522342','-118.2436849'),('TX','31.9685988','-99.9018131'),('MS','32.3546679','-89.3985283'),('TX','31.9685988','-99.9018131'),('AL','32.3182314','-86.902298'),('MO','37.9642529','-91.8318334'),('NC','35.7595731','-79.0192997'),('OK','35.0077519','-97.092877'),('IL','40.6331249','-89.3985283'),('LA','34.0522342','-118.2436849'),('AR','35.20105','-91.8318334'),('IL','40.6331249','-89.3985283'),('CA','36.778261','-119.4179324'),('IA','41.8780025','-93.097702'),('FL','27.6648274','-81.5157535'),('ME','45.253783','-69.4454689'),('NC','35.7595731','-79.0192997'),('WA','47.7510741','-120.7401386'),('AR','35.20105','-91.8318334'),('CA','36.778261','-119.4179324'),('PA','41.2033216','-77.1945247'),('CA','36.778261','-119.4179324'),('MO','37.9642529','-91.8318334'),('AL','32.3182314','-86.902298'),('VA','37.4315734','-78.6568942'),('AL','32.3182314','-86.902298'),('AL','32.3182314','-86.902298'),('RI','41.5800945','-71.4774291'),('IN','37.09024','-95.712891'),('FL','27.6648274','-81.5157535'),('MS','32.3546679','-89.3985283'),('OH','40.4172871','-82.907123'),('AR','35.20105','-91.8318334'),('IN','37.09024','-95.712891'),('FL','27.6648274','-81.5157535'),('MS','32.3546679','-89.3985283'),('TX','31.9685988','-99.9018131'),('AR','35.20105','-91.8318334'),('AR','35.20105','-91.8318334'),('OH','40.4172871','-82.907123'),('AR','35.20105','-91.8318334'),('TX','31.9685988','-99.9018131'),('IA','41.8780025','-93.097702'),('TN','35.5174913','-86.5804473'),('IA','41.8780025','-93.097702'),('LA','34.0522342','-118.2436849'),('MS','32.3546679','-89.3985283'),('WV','38.5976262','-80.4549026'),('CT','41.6032207','-73.087749'),('ON','51.253775','-85.3232139'),('OK','35.0077519','-97.092877'),('AL','32.3182314','-86.902298'),('TX','31.9685988','-99.9018131'),('TX','31.9685988','-99.9018131'),('TX','31.9685988','-99.9018131'),('OR','43.8041334','-120.5542012'),('KS','39.011902','-98.4842465'),('TN','35.5174913','-86.5804473'),('KS','39.011902','-98.4842465'),('OK','35.0077519','-97.092877'),('MO','37.9642529','-91.8318334'),('MO','37.9642529','-91.8318334'),('AR','35.20105','-91.8318334'),('WI','43.7844397','-88.7878678'),('ON','51.253775','-85.3232139'),('IL','40.6331249','-89.3985283'),('GA','32.1656221','-82.9000751'),('HI','19.8967662','-155.5827818'),('FL','27.6648274','-81.5157535'),('TN','35.5174913','-86.5804473'),('ND','47.5514926','-101.0020119'),('KS','39.011902','-98.4842465'),('OH','40.4172871','-82.907123'),('LA','34.0522342','-118.2436849'),('GA','32.1656221','-82.9000751'),('NM','34.5199402','-105.8700901'),('TX','31.9685988','-99.9018131'),('TX','31.9685988','-99.9018131'),('FL','27.6648274','-81.5157535'),('MS','32.3546679','-89.3985283'),('FL','27.6648274','-81.5157535'),('AR','35.20105','-91.8318334'),('MS','32.3546679','-89.3985283'),('MO','37.9642529','-91.8318334'),('PA','41.2033216','-77.1945247'),('IN','37.09024','-95.712891'),('IL','40.6331249','-89.3985283'),('KS','39.011902','-98.4842465'),('WI','43.7844397','-88.7878678'),('TN','35.5174913','-86.5804473'),('TN','35.5174913','-86.5804473'),('OK','35.0077519','-97.092877'),('AL','32.3182314','-86.902298'),('OK','35.0077519','-97.092877'),('WI','43.7844397','-88.7878678'),('OK','35.0077519','-97.092877'),('AR','35.20105','-91.8318334'),('IA','41.8780025','-93.097702'),('WI','43.7844397','-88.7878678'),('OH','40.4172871','-82.907123'),('AL','32.3182314','-86.902298'),('CA','36.778261','-119.4179324'),('AL','32.3182314','-86.902298'),('OK','35.0077519','-97.092877'),('TX','31.9685988','-99.9018131'),('TX','31.9685988','-99.9018131'),('FL','27.6648274','-81.5157535'),('MS','32.3546679','-89.3985283'),('MI','44.3148443','-85.6023643'),('LA','34.0522342','-118.2436849'),('WI','43.7844397','-88.7878678'),('NC','35.7595731','-79.0192997'),('AR','35.20105','-91.8318334'),('OK','35.0077519','-97.092877'),('PA','41.2033216','-77.1945247'),('KY','37.8393332','-84.2700179'),('GA','32.1656221','-82.9000751'),('IN','37.09024','-95.712891'),('IL','40.6331249','-89.3985283'),('IA','41.8780025','-93.097702'),('CA','36.778261','-119.4179324'),('AZ','34.1336186','-117.9075627'),('MI','44.3148443','-85.6023643'),('MS','32.3546679','-89.3985283'),('FL','27.6648274','-81.5157535'),('AZ','34.1336186','-117.9075627'),('TX','31.9685988','-99.9018131'),('MO','37.9642529','-91.8318334'),('TX','31.9685988','-99.9018131'),('IL','40.6331249','-89.3985283'),('OH','40.4172871','-82.907123'),('FL','27.6648274','-81.5157535'),('OK','35.0077519','-97.092877'),('AZ','34.1336186','-117.9075627'),('MS','32.3546679','-89.3985283'),('OK','35.0077519','-97.092877'),('AR','35.20105','-91.8318334'),('LA','34.0522342','-118.2436849'),('CA','36.778261','-119.4179324'),('FL','27.6648274','-81.5157535'),('TN','35.5174913','-86.5804473'),('TN','35.5174913','-86.5804473'),('PA','41.2033216','-77.1945247'),('MS','32.3546679','-89.3985283'),('SC','33.836081','-81.1637245'),('OK','35.0077519','-97.092877'),('CA','36.778261','-119.4179324'),('MA','42.4072107','-71.3824374'),('MS','32.3546679','-89.3985283'),('MS','32.3546679','-89.3985283'),('MO','37.9642529','-91.8318334'),('AL','32.3182314','-86.902298'),('FL','27.6648274','-81.5157535'),('FL','27.6648274','-81.5157535'),('WA','47.7510741','-120.7401386'),('TN','35.5174913','-86.5804473'),('TX','31.9685988','-99.9018131'),('TX','31.9685988','-99.9018131'),('TX','31.9685988','-99.9018131'),('MS','32.3546679','-89.3985283'),('MS','32.3546679','-89.3985283'),('LA','34.0522342','-118.2436849'),('OK','35.0077519','-97.092877'),('TN','35.5174913','-86.5804473'),('OK','35.0077519','-97.092877'),('MD','39.0457549','-76.6412712'),('LA','34.0522342','-118.2436849'),('OK','35.0077519','-97.092877'),('OK','35.0077519','-97.092877'),('MO','37.9642529','-91.8318334'),('LA','34.0522342','-118.2436849'),('LA','34.0522342','-118.2436849'),('KS','39.011902','-98.4842465'),('AL','32.3182314','-86.902298'),('AL','32.3182314','-86.902298'),('AL','32.3182314','-86.902298'),('CA','36.778261','-119.4179324'),('VA','37.4315734','-78.6568942'),('OK','35.0077519','-97.092877'),('OK','35.0077519','-97.092877'),('AL','32.3182314','-86.902298'),('IL','40.6331249','-89.3985283'),('FL','27.6648274','-81.5157535'),('CO','39.5500507','-105.7820674'),('MI','44.3148443','-85.6023643'),('MO','37.9642529','-91.8318334'),('NC','35.7595731','-79.0192997'),('MO','37.9642529','-91.8318334'),('AL','32.3182314','-86.902298'),('OH','40.4172871','-82.907123'),('AR','35.20105','-91.8318334'),('MO','37.9642529','-91.8318334'),('OH','40.4172871','-82.907123'),('OK','35.0077519','-97.092877'),('WA','47.7510741','-120.7401386'),('LA','34.0522342','-118.2436849'),('MI','44.3148443','-85.6023643'),('IL','40.6331249','-89.3985283'),('AL','32.3182314','-86.902298'),('PA','41.2033216','-77.1945247'),('MN','46.729553','-94.6858998'),('NC','35.7595731','-79.0192997'),('AL','32.3182314','-86.902298'),('TN','35.5174913','-86.5804473'),('MO','37.9642529','-91.8318334'),('MI','44.3148443','-85.6023643'),('WI','43.7844397','-88.7878678'),('AL','32.3182314','-86.902298'),('AL','32.3182314','-86.902298'),('OK','35.0077519','-97.092877'),('GA','32.1656221','-82.9000751'),('OK','35.0077519','-97.092877'),('FL','27.6648274','-81.5157535'),('AL','32.3182314','-86.902298'),('AL','32.3182314','-86.902298'),('AR','35.20105','-91.8318334'),('AR','35.20105','-91.8318334'),('MD','39.0457549','-76.6412712'),('GA','32.1656221','-82.9000751'),('GA','32.1656221','-82.9000751'),('TX','31.9685988','-99.9018131'),('NY','40.7127837','-74.0059413'),('MO','37.9642529','-91.8318334'),('OK','35.0077519','-97.092877'),('SD','43.9695148','-99.9018131'),('MS','32.3546679','-89.3985283'),('GA','32.1656221','-82.9000751'),('PA','41.2033216','-77.1945247'),('TX','31.9685988','-99.9018131'),('NY','40.7127837','-74.0059413'),('LA','34.0522342','-118.2436849'),('LA','34.0522342','-118.2436849'),('AR','35.20105','-91.8318334'),('LA','34.0522342','-118.2436849'),('OH','40.4172871','-82.907123'),('WI','43.7844397','-88.7878678'),('TX','31.9685988','-99.9018131'),('TX','31.9685988','-99.9018131'),('MO','37.9642529','-91.8318334'),('SC','33.836081','-81.1637245'),('KY','37.8393332','-84.2700179'),('FL','27.6648274','-81.5157535'),('IN','37.09024','-95.712891'),('KY','37.8393332','-84.2700179'),('TX','31.9685988','-99.9018131'),('LA','34.0522342','-118.2436849'),('OR','43.8041334','-120.5542012'),('MS','32.3546679','-89.3985283'),('MS','32.3546679','-89.3985283'),('MS','32.3546679','-89.3985283'),('OH','40.4172871','-82.907123'),('IN','37.09024','-95.712891'),('MO','37.9642529','-91.8318334'),('OH','40.4172871','-82.907123'),('AR','35.20105','-91.8318334'),('PA','41.2033216','-77.1945247'),('MO','37.9642529','-91.8318334'),('MN','46.729553','-94.6858998'),('CO','39.5500507','-105.7820674'),('OH','40.4172871','-82.907123'),('SC','33.836081','-81.1637245'),('MS','32.3546679','-89.3985283'),('FL','27.6648274','-81.5157535'),('AL','32.3182314','-86.902298'),('AL','32.3182314','-86.902298'),('CA','36.778261','-119.4179324'),('GA','32.1656221','-82.9000751'),('','37.09024','-95.712891'),('','37.09024','-95.712891'),('','37.09024','-95.712891'),('','37.09024','-95.712891'),('','37.09024','-95.712891'),('','37.09024','-95.712891'),('','37.09024','-95.712891'),('','37.09024','-95.712891'),('','37.09024','-95.712891'),('NY','40.7127837','-74.0059413'),('OH','40.4172871','-82.907123'),('LA','34.0522342','-118.2436849'),('FL','27.6648274','-81.5157535'),('IL','40.6331249','-89.3985283'),('NC','35.7595731','-79.0192997'),('SC','33.836081','-81.1637245'),('UT','39.3209801','-111.0937311'),('TX','31.9685988','-99.9018131'),('CA','36.778261','-119.4179324'),('FL','27.6648274','-81.5157535'),('IN','37.09024','-95.712891'),('LA','34.0522342','-118.2436849'),('TN','35.5174913','-86.5804473'),('OK','35.0077519','-97.092877'),('IL','40.6331249','-89.3985283'),('MS','32.3546679','-89.3985283'),('OH','40.4172871','-82.907123'),('WI','43.7844397','-88.7878678'),('TX','31.9685988','-99.9018131'),('NM','34.5199402','-105.8700901'),('FL','27.6648274','-81.5157535'),('FL','27.6648274','-81.5157535'),('TN','35.5174913','-86.5804473'),('TN','35.5174913','-86.5804473'),('OK','35.0077519','-97.092877'),('AR','35.20105','-91.8318334'),('AR','35.20105','-91.8318334'),('NC','35.7595731','-79.0192997'),('IA','41.8780025','-93.097702'),('IN','37.09024','-95.712891'),('AR','35.20105','-91.8318334'),('AR','35.20105','-91.8318334'),('FL','27.6648274','-81.5157535'),('FL','27.6648274','-81.5157535'),('UT','39.3209801','-111.0937311'),('MS','32.3546679','-89.3985283'),('LA','34.0522342','-118.2436849'),('GA','32.1656221','-82.9000751'),('AR','35.20105','-91.8318334'),('CA','36.778261','-119.4179324'),('MS','32.3546679','-89.3985283'),('LA','34.0522342','-118.2436849'),('NH','43.1938516','-71.5723953'),('AL','32.3182314','-86.902298'),('OK','35.0077519','-97.092877'),('OK','35.0077519','-97.092877'),('AR','35.20105','-91.8318334'),('LA','34.0522342','-118.2436849'),('NC','35.7595731','-79.0192997'),('KY','37.8393332','-84.2700179'),('LA','34.0522342','-118.2436849'),('AR','35.20105','-91.8318334'),('TN','35.5174913','-86.5804473'),('IN','37.09024','-95.712891'),('TX','31.9685988','-99.9018131'),('MO','37.9642529','-91.8318334'),('TX','31.9685988','-99.9018131'),('VA','37.4315734','-78.6568942'),('VA','37.4315734','-78.6568942'),('TX','31.9685988','-99.9018131'),('TX','31.9685988','-99.9018131'),('LA','34.0522342','-118.2436849'),('TX','31.9685988','-99.9018131'),('AZ','34.1336186','-117.9075627'),('NY','40.7127837','-74.0059413'),('TX','31.9685988','-99.9018131'),('LA','34.0522342','-118.2436849'),('TN','35.5174913','-86.5804473'),('NC','35.7595731','-79.0192997'),('AL','32.3182314','-86.902298'),('NC','35.7595731','-79.0192997'),('TX','31.9685988','-99.9018131'),('TN','35.5174913','-86.5804473'),('MS','32.3546679','-89.3985283'),('LA','34.0522342','-118.2436849'),('TX','31.9685988','-99.9018131'),('MO','37.9642529','-91.8318334'),('AR','35.20105','-91.8318334'),('NE','41.4925374','-99.9018131'),('NE','41.4925374','-99.9018131'),('OK','35.0077519','-97.092877'),('IN','37.09024','-95.712891'),('LA','34.0522342','-118.2436849'),('LA','34.0522342','-118.2436849'),('LA','34.0522342','-118.2436849'),('LA','34.0522342','-118.2436849'),('LA','34.0522342','-118.2436849'),('SC','33.836081','-81.1637245'),('PA','41.2033216','-77.1945247'),('IL','40.6331249','-89.3985283');
/*!40000 ALTER TABLE `STATE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VISITOR`
--

DROP TABLE IF EXISTS `VISITOR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VISITOR` (
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `City` varchar(10) NOT NULL,
  `State` varchar(5) NOT NULL,
  `Zipcode` int(6) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `No. In Party` int(100) NOT NULL,
  `Traveling For` varchar(10) NOT NULL,
  `How did you hear about MWMC&VB ?` varchar(10) NOT NULL,
  `Did you stay in MWM hotel ?` varchar(5) NOT NULL,
  `Email` varchar(15) NOT NULL,
  `Time` datetime NOT NULL,
  `Vcount` int(100) NOT NULL,
  `Lat` varchar(30) NOT NULL,
  `Lng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VISITOR`
--

LOCK TABLES `VISITOR` WRITE;
/*!40000 ALTER TABLE `VISITOR` DISABLE KEYS */;
INSERT INTO `VISITOR` VALUES ('Raj','Subedi','Monroe','LA',71203,'US',2,'Convention','Billboard','yes','','2017-02-27 04:16:33',1,'32.5662435','-92.027319'),('Roshan','Koirala','Monroe','LA',71209,'US',3,'Convention','Billboard','yes','','2017-02-27 04:18:01',1,'32.5291557','-92.0698902'),('Pabitra ','Subedi','Chitwan','AK',71209,'NP',3,'business','Billboard','yes','','2017-02-27 06:09:23',1,'',''),('Giselle','Callahan','Covington','LA',70433,'US',4,'Others','Interstate','no','','2017-03-01 03:30:21',1,'30.4754702','-90.1009108'),('Nischal ','Basnet','Jackson','MS',39056,'US',4,'Convention','Billboard','yes','','2017-03-01 06:55:50',1,'32.3782595','-90.3560076'),('Dr Lon','Smith','Monroe','LA',71291,'US',5,'business','Billboard','yes','','2017-03-01 06:57:04',1,'32.5865718','-92.1646722'),('Roshan','Koirala','Mexico','LA',11700,'US',5,'Pleasure','Billboard','yes','','2017-03-02 01:00:50',1,'33.8508481','-118.0343147');
/*!40000 ALTER TABLE `VISITOR` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-05  6:31:08
