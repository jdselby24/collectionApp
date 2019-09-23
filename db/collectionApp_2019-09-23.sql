# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: collectionApp
# Generation Time: 2019-09-23 11:59:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table collection
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collection`;

CREATE TABLE `collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(255) DEFAULT NULL,
  `manufacturer` char(255) DEFAULT NULL,
  `model` char(255) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `regNo` char(16) DEFAULT NULL,
  `color` char(255) DEFAULT NULL,
  `fuel` char(128) DEFAULT NULL,
  `engineLayout` char(4) DEFAULT NULL,
  `engineDisplacement` int(5) DEFAULT NULL,
  `accel` float DEFAULT NULL,
  `power` int(16) DEFAULT NULL,
  `torque` int(16) DEFAULT NULL,
  `driveTrain` char(255) DEFAULT NULL,
  `numberOfDoors` int(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `collection` WRITE;
/*!40000 ALTER TABLE `collection` DISABLE KEYS */;

INSERT INTO `collection` (`id`, `type`, `manufacturer`, `model`, `year`, `regNo`, `color`, `fuel`, `engineLayout`, `engineDisplacement`, `accel`, `power`, `torque`, `driveTrain`, `numberOfDoors`)
VALUES
	(1,'Hatchback','Volkswagen','Golf Mk4 V5',1999,'V610 EDX','Blue','Petrol','VR5',2324,8.5,150,205,'FWD',5),
	(2,'Station Wagon','Land Rover','110 V8 SW',1990,'G291 HOB','White','Petrol','V8',3528,14.4,136,253,'4WD',5),
	(3,'Hatchback','Volkswagen','Golf Mk6 TDI BlueMotion',2012,'WG12 DWL','White','Diesel','I4',1598,10.1,105,250,'FWD',5),
	(4,'Roadster','Mazda','MX-5 (NA) 1.8i',1994,'M420 AHW','Red','Petrol','I4',1839,8.3,128,149,'RWD',2),
	(5,'Pickup','Nissan','Navara (D22) Outlaw 2.5dCi',2005,'VN05 GJE','Silver','Diesel','I4',2488,15.1,132,304,'4WD',4),
	(6,'Hatchback','Ford','Focus Mk1',2004,'DE04 ZPG','Dark Blue','Petrol','I4',1596,10.9,101,145,'FWD',3);

/*!40000 ALTER TABLE `collection` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
