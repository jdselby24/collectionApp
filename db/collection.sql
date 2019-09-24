# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: joshCollectionApp
# Generation Time: 2019-09-23 12:28:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT '',
  `manufacturer` varchar(255) NOT NULL DEFAULT '',
  `model` varchar(255) NOT NULL DEFAULT '',
  `year` year(4) NOT NULL,
  `regNo` varchar(16) NOT NULL DEFAULT '',
  `color` varchar(255) NOT NULL DEFAULT '',
  `fuel` varchar(128) NOT NULL DEFAULT '',
  `engineLayout` varchar(4) NOT NULL DEFAULT '',
  `engineDisplacement` int(5) unsigned NOT NULL,
  `driveTrain` enum('FWD','RWD','AWD','4WD') DEFAULT 'FWD',
  `accel` float unsigned NOT NULL,
  `power` int(16) unsigned NOT NULL,
  `torque` int(16) unsigned NOT NULL,
  `numberOfDoors` int(16) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;

INSERT INTO `cars` (`id`, `type`, `manufacturer`, `model`, `year`, `regNo`, `color`, `fuel`, `engineLayout`, `engineDisplacement`, `driveTrain`, `accel`, `power`, `torque`, `numberOfDoors`)
VALUES
	(1,'Hatchback','Volkswagen','Golf Mk4 V5','1999','V610 EDX','Blue','Petrol','VR5',2324,'FWD',8.5,150,205,5),
	(2,'Station Wagon','Land Rover','110 V8 SW','1990','G291 HOB','White','Petrol','V8',3528,'4WD',14.4,136,253,5),
	(3,'Hatchback','Volkswagen','Golf Mk6 TDI BlueMotion','2012','WG12 DWL','White','Diesel','I4',1598,'FWD',10.1,105,250,5),
	(4,'Roadster','Mazda','MX-5 (NA) 1.8i','1994','M420 AHW','Red','Petrol','I4',1839,'RWD',8.3,128,149,2),
	(5,'Pickup','Nissan','Navara (D22) Outlaw 2.5dCi','2005','VN05 GJE','Silver','Diesel','I4',2488,'4WD',15.1,132,304,4),
	(6,'Hatchback','Ford','Focus Mk1','2004','DE04 ZPG','Dark Blue','Petrol','I4',1596,'FWD',10.9,101,145,3);

/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
