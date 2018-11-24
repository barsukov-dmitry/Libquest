-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.61-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema library
--

CREATE DATABASE IF NOT EXISTS library;
USE library;

--
-- Definition of table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `Book_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Autor_name` varchar(45) NOT NULL,
  `Book_name` varchar(45) NOT NULL,
  `Book_genre` varchar(45) NOT NULL,
  `T_Id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Book_id`),
  CONSTRAINT `T_id` FOREIGN KEY (`Book_id`) REFERENCES `taken` (`T_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` (`Book_id`,`Autor_name`,`Book_name`,`Book_genre`,`T_Id`) VALUES 
 (1,'Dostoevski','Bratya Karamazovi','Novel',3),
 (2,'Dostoevski','Idiot','Novel',2),
 (3,'Dostoevski','Prestuplenie i nakazanie','Novel',5),
 (4,'Pruss','Pharaon','Novel',4),
 (5,'Pushkin','Liric','Poem',7),
 (6,'Franclin','Benjamin Franclin','Autobiography',7),
 (7,'Esenin','Liric','Poem',0),
 (8,'Dostoevski','Flowers to Eldgernon','Novel',3),
 (9,'Stivenson','Pohishenniy','Novel',2),
 (10,'Bunin','Temnie allei','Story',6),
 (11,'Tolstoy','War and Peace','Epic novel',4),
 (12,'Jack London','Martin Iden','Novel',3),
 (13,'Wells','Mashina vremeni','Story',7),
 (14,'Bulgakov','Maser i Margarita','Novel',3),
 (15,'Gogol','Mertvie dushi','Novel',7),
 (16,'Petrov Ilf','12 stuliev','Story',4),
 (17,'Pushkin','Evgeny Onegin','Poem',4),
 (18,'Remark','Tri tovarisha','Story',2),
 (19,'Lermontov','Geroi nashego vremeni','Story',2),
 (20,'Griboedov','Gore ot uma','Poem',4),
 (21,'Doil','Sherlock Holms','Story',3),
 (22,'Sholohov','Tihiy Don','Novel',1),
 (24,'Heminguey','Staric i more','Story',4),
 (25,'Bredberry','451 po Farengeytu','Fantasic story',7),
 (26,'Defo','Robinzon Cruzo','Story',5),
 (27,'Gogol','Taras Bulba','Novel',6),
 (28,'Dostoevski','Podrostok','Novel',3),
 (29,'Hugo','Sobor','Novel',2);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;


--
-- Definition of table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `Del_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Del_date` date NOT NULL DEFAULT '0000-00-00',
  `Del_cost` float NOT NULL,
  `Pub_id` int(10) unsigned NOT NULL,
  `Updating` tinyint(1) NOT NULL,
  PRIMARY KEY (`Del_id`),
  CONSTRAINT `Pub_id` FOREIGN KEY (`Del_id`) REFERENCES `pubhouse` (`Pub_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` (`Del_id`,`Del_date`,`Del_cost`,`Pub_id`,`Updating`) VALUES 
 (1,'2017-03-20',12000,2,0),
 (2,'2017-03-20',50000,1,1),
 (3,'2017-03-20',62000,3,0),
 (4,'2017-03-20',150,1,0),
 (5,'2017-03-20',120,5,0),
 (6,'2017-03-20',60000,12,0),
 (7,'2017-03-20',40000,13,0),
 (8,'2017-03-20',200,14,0),
 (9,'2017-03-10',400,3,0),
 (10,'2014-01-01',500,4,0),
 (11,'2017-03-01',1000,2,0),
 (12,'2017-03-03',2000,16,0),
 (13,'2017-03-09',230,18,0),
 (14,'2017-03-05',300,7,0),
 (15,'2017-03-08',400,20,0),
 (16,'2017-09-01',340,9,0),
 (17,'2017-10-01',250,10,0),
 (18,'2017-03-04',450,11,0),
 (19,'2017-03-01',111,6,0),
 (20,'2017-03-01',120,5,0),
 (21,'2017-03-01',204,2,0);
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;


--
-- Definition of table `list`
--

DROP TABLE IF EXISTS `list`;
CREATE TABLE `list` (
  `List_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Copies_number` int(10) unsigned NOT NULL,
  `Is_year` int(10) unsigned NOT NULL,
  `Copy_price` float NOT NULL,
  `Book_id` int(10) unsigned NOT NULL,
  `Del_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`List_id`),
  CONSTRAINT `Book_id` FOREIGN KEY (`List_id`) REFERENCES `book` (`Book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Del_id` FOREIGN KEY (`List_id`) REFERENCES `delivery` (`Del_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list`
--

/*!40000 ALTER TABLE `list` DISABLE KEYS */;
INSERT INTO `list` (`List_id`,`Copies_number`,`Is_year`,`Copy_price`,`Book_id`,`Del_id`) VALUES 
 (1,15,2010,120,2,1),
 (2,10,1984,150,4,1),
 (3,1,2016,3000,6,1),
 (4,100,2017,40,1,2),
 (5,20,2015,2000,19,3),
 (6,120,2017,500,5,4),
 (7,115,2000,250,16,5),
 (8,2,2001,400,7,6),
 (9,5,2000,350,9,3),
 (10,10,2012,470,8,11),
 (11,20,2014,500,4,12),
 (12,30,2002,600,6,5),
 (13,40,2000,200,5,1),
 (14,20,2001,340,7,14),
 (15,3,2009,305,17,13),
 (16,30,2010,120,11,14),
 (17,20,2005,100,12,20),
 (18,45,1990,200,13,8),
 (19,10,2000,10,18,16),
 (20,20,2001,23,14,21),
 (21,1,1,1,2,21);
/*!40000 ALTER TABLE `list` ENABLE KEYS */;


--
-- Definition of table `pubhouse`
--

DROP TABLE IF EXISTS `pubhouse`;
CREATE TABLE `pubhouse` (
  `Pub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pub_name` varchar(45) NOT NULL,
  `Adress` varchar(45) NOT NULL,
  `Contact_name` varchar(45) NOT NULL,
  `Number` int(10) unsigned NOT NULL,
  `Foundation_year` int(10) unsigned NOT NULL,
  `Contract_date` date NOT NULL,
  PRIMARY KEY (`Pub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pubhouse`
--

/*!40000 ALTER TABLE `pubhouse` DISABLE KEYS */;
INSERT INTO `pubhouse` (`Pub_id`,`Pub_name`,`Adress`,`Contact_name`,`Number`,`Foundation_year`,`Contract_date`) VALUES 
 (1,'Pushkina','Melnikova','Frolov',1124014,2015,'2000-00-00'),
 (2,'Vereshagina','Pobedi','Ivanov',1212124,2016,'2001-00-00'),
 (3,'Novoe','Taganka','Panichev',3455235,2013,'2003-00-00'),
 (4,'Almaz','Volokolamka','Petrov',124124,2000,'2014-00-00'),
 (5,'Kopirka','Lyki','Popov',14214241,2011,'2000-00-00'),
 (6,'Purga','Ryazanskiy prospect','Malkin',121212456,2011,'2009-00-22'),
 (7,'Lermontovka','Malaya Pochtovaya','Bormin',23452,2017,'2014-00-00'),
 (8,'Horizont','Chehova','Podskazkin',234,2017,'0000-00-00'),
 (9,'Koleydoskop','Tverskaya','Fedorov',222,2014,'2001-05-05'),
 (10,'Maloe','Nagatinskaya','Berezkin',220,2001,'2002-04-04'),
 (11,'Perlamutr','Pospelova','Kreopalov',300,2015,'2002-09-08'),
 (12,'Kapika','Nelsona','Ramonov',20,2016,'2003-09-09'),
 (13,'Pano','8 marta','Papirosov',4000,2016,'2002-10-10'),
 (14,'Moslit','Hlebnikova','Markov',2352,2011,'2006-04-03'),
 (15,'Kopna','9 maya','Sablev',3251,2006,'2007-05-09'),
 (16,'Pravda','Nahimova','Alieva',3242,2008,'2015-04-03'),
 (17,'Globus','Molodejnaya','Kiselev',3211,2009,'2017-03-05'),
 (18,'Martinson','Rastorgueva','Pospelov',32513,2010,'2009-04-05'),
 (19,'Mandelshtampost','Parkovaya','Tregubov',33321,2000,'2010-01-01'),
 (20,'Perekrestok','Yralskaya','Pravdin',325,2007,'2016-01-01'),
 (21,'Kraft','Novaya','Dobrov',32,2000,'2000-01-01');
/*!40000 ALTER TABLE `pubhouse` ENABLE KEYS */;


--
-- Definition of table `readers`
--

DROP TABLE IF EXISTS `readers`;
CREATE TABLE `readers` (
  `R_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Number` int(10) unsigned NOT NULL,
  `T1_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`R_id`),
  CONSTRAINT `T1_id` FOREIGN KEY (`R_id`) REFERENCES `taken` (`T_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `readers`
--

/*!40000 ALTER TABLE `readers` DISABLE KEYS */;
INSERT INTO `readers` (`R_id`,`Name`,`Number`,`T1_id`) VALUES 
 (1,'Dima',892643805,0),
 (2,'Oleg',892658392,0),
 (3,'Vlad',892634902,0),
 (4,'Vitaliy',892644792,0),
 (5,'',0,0);
/*!40000 ALTER TABLE `readers` ENABLE KEYS */;


--
-- Definition of table `rechall`
--

DROP TABLE IF EXISTS `rechall`;
CREATE TABLE `rechall` (
  `Rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Same_id_cost` float NOT NULL,
  `Same_id_number` int(10) unsigned NOT NULL,
  `Books_id` int(10) unsigned NOT NULL,
  `In stock` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Rec_id`),
  CONSTRAINT `Books_id` FOREIGN KEY (`Rec_id`) REFERENCES `book` (`Book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rechall`
--

/*!40000 ALTER TABLE `rechall` DISABLE KEYS */;
INSERT INTO `rechall` (`Rec_id`,`Same_id_cost`,`Same_id_number`,`Books_id`,`In stock`) VALUES 
 (1,4000,100,1,100),
 (2,0,0,3,0),
 (3,0,0,2,0),
 (4,0,0,9,0),
 (5,0,0,6,0),
 (6,0,0,5,0),
 (7,0,0,7,0),
 (8,0,0,10,0),
 (9,0,0,4,0),
 (10,0,0,15,0),
 (11,0,0,10,0),
 (12,0,0,15,0),
 (13,0,0,11,0),
 (14,0,0,12,0),
 (15,0,0,8,0),
 (16,0,0,14,0),
 (17,0,0,13,0),
 (18,0,0,18,0),
 (19,0,0,21,0),
 (20,0,0,19,0),
 (21,0,0,22,0),
 (22,0,0,23,0),
 (24,0,0,26,0),
 (25,0,0,27,0),
 (26,0,0,28,0);
/*!40000 ALTER TABLE `rechall` ENABLE KEYS */;


--
-- Definition of table `taken`
--

DROP TABLE IF EXISTS `taken`;
CREATE TABLE `taken` (
  `T_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Book1_id` int(10) unsigned NOT NULL,
  `Deadline` varchar(45) NOT NULL,
  `R_id` varchar(45) NOT NULL,
  `Complete` int(10) unsigned NOT NULL,
  PRIMARY KEY (`T_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taken`
--

/*!40000 ALTER TABLE `taken` DISABLE KEYS */;
INSERT INTO `taken` (`T_id`,`Book1_id`,`Deadline`,`R_id`,`Complete`) VALUES 
 (0,0,'','2',0),
 (1,0,'2017-03-20','1',0),
 (2,0,'2017-03-20','2',0),
 (3,0,'2017-03-20','4',0),
 (4,0,'2017-03-20','3',0),
 (5,0,'2017-03-20','5',0),
 (6,0,'2017-03-20','1',0),
 (7,0,'2017-03-20','2',0),
 (8,0,'2017-03-20','1',0),
 (9,0,'2017-03-20','3',0),
 (10,0,'2017-03-20','4',0),
 (11,0,'2017-03-20','2',0),
 (12,0,'2017-03-20','3',0),
 (13,0,'2017-03-20','1',0),
 (14,0,'2017-03-20','3',0),
 (15,0,'2017-03-20','3',0),
 (16,0,'2017-03-20','2',0),
 (17,0,'2017-03-20','2',0),
 (18,0,'','1',0),
 (19,0,'','3',0),
 (20,0,'2017-03-20','5',0),
 (21,0,'','6',0),
 (22,0,'2017-03-20','5',0),
 (23,0,'','4',0),
 (24,0,'2017-03-20','3',0),
 (25,0,'','6',0),
 (26,0,'2017-03-20','4',0),
 (27,0,'2017-03-20','3',0),
 (28,0,'','2',0),
 (29,0,'2017-03-20','4',0),
 (30,0,'2017-03-20','5',0),
 (31,0,'2017-03-20','2',0),
 (32,0,'','3',0),
 (33,0,'2018-04-05','2',0),
 (34,0,'','2',0);
/*!40000 ALTER TABLE `taken` ENABLE KEYS */;


--
-- Definition of procedure `book_order`
--

DROP PROCEDURE IF EXISTS `book_order`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `book_order`()
BEGIN

INSERT INTO taken (T_id, deadline, Read_id, Rechall_id)
VALUES (5,2018-09-09 , 2, 10);

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `rechall_update`
--

DROP PROCEDURE IF EXISTS `rechall_update`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `rechall_update`(cur_del_id INTEGER)
BEGIN

DECLARE cur_copies_cost FLOAT DEFAULT 0;
DECLARE cur_copies_number INTEGER DEFAULT 0;
DECLARE cur_book_id INTEGER DEFAULT 0;
DECLARE done INTEGER DEFAULT 0;

DECLARE C1 CURSOR FOR
SELECT Book_id, Copies_number, Copy_price
FROM `list` 
WHERE Del_id = cur_del_id;

DECLARE EXIT HANDLER FOR SQLSTATE '02000'
SET done = 1;

SELECT Updating INTO done
FROM `delivery`
WHERE Del_id = cur_del_id;

UPDATE delivery SET Updating = 1
WHERE Del_id = cur_del_id;

OPEN C1;

WHILE done = 0 DO
FETCH C1 INTO cur_book_id, cur_copies_number, cur_copies_cost;
UPDATE rechall SET Same_id_number = Same_id_number + cur_copies_number
WHERE Books_id = cur_book_id;
UPDATE rechall SET Same_id_cost = Same_id_cost + cur_copies_cost * cur_copies_number
WHERE Books_id = cur_book_id;
END WHILE;

CLOSE C1;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
