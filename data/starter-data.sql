-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: ice_cream
-- ------------------------------------------------------
-- Server version	5.7.10-log

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

use ice_cream; -- Database name goes here

--
-- Table structure for table `ci_sessions`
--
DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--


/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `id` int(64) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `price` int(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `perBox` int(64) NOT NULL,
  `onHand` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` (`name`, `price`, `type`, `perBox`, `onHand`) VALUES 
('Waffle Cone',50,'container',60,10),
('Regular Cone',25,'container',60,10),
('Plastic Cup',15,'container',50,10),
('Vanilla',20,'icecream',45,10),
('Strawberry',20,'icecream',45,10),
('Chocolate',20,'icecream',45,10),
('Mint',25,'icecream',45,10),
('Maple',25,'icecream',45,10),
('Orange',25,'icecream',45,10),
('Sprinkles',18,'garnish',120,10),
('Walnuts',35,'garnish',85,0),
('Chocolate Chips',13,'garnish',100,10);
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--
DROP TABLE IF EXISTS `recipes`;

CREATE TABLE `recipes` (
  `id` int(16) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `code` varchar(32) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;

INSERT INTO `recipes` (`code`, `description`) VALUES
('Child Cone','One small scoop of vanilla, perfect for a child!'),
('Large Vanilla', 'Two scoops of vanilla goodness'),
('Small Chocolate', 'One scoop of chocolate, just enough to make you want more!'),
('Large Chocolate', 'Two scoops of chocolate, we won''t tell if you don''t!'),
('Chocolate Extreme', 'Two scoops of chocolate, plus toppings, everyone loves chocolate!'),
('Napolean', 'One scoop of vanilla, chocolate, and strawberry!'),
('Feeling Nutty', 'One scoop of maple, with lots of walnuts for a topping!'),
('Minty Fresh', 'One scoop of mint ice cream.'),
('Oh Canada', 'Two scoops of maple ice cream.'),
('Attempted Rainbow', 'One scoop of strawberry, orange, vanilla, and chocolate!'),
('I can''t Choose', 'One scoop of each ice cream with all of the toppings!'),
('Forgetting Something', 'Hmm is something missing?');

-- --------------------------------------------------------


DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` varchar(128) NOT NULL,
  `recipeId` varchar(128) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `inStock` int(10) NOT NULL,
  `promotion` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--


LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES 
('0','0',1.00,60,1),
('1','1',2.00,20,1),
('10','10',10.00,60,1),
('11','11',5.00,70,0),
('2','2',0.35,50,0),
('3','3',0.80,10,0),
('4','4',0.50,0,0),
('5','5',0.50,30,0),
('6','6',0.20,100,1),
('7','7',0.60,8,0),
('8','8',1.20,30,0),
('9','9',30.00,50,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipeingredients`
--

DROP TABLE IF EXISTS `recipeingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipeingredients` (
  `id` int(16) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `recipeid` int(16) NOT NULL,
  `ingredientid` int(16) NOT NULL,
  `quantity` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;

--
-- Dumping data for table `recipeingredients`
--

LOCK TABLES `recipeingredients` WRITE;
/*!40000 ALTER TABLE `recipeingredients` DISABLE KEYS */;
INSERT INTO `recipeingredients` (`recipeid`, `ingredientid`, `quantity`) VALUES 
('1', '2', '1'),
('1', '4', '1'),
('2', '1', '1'),
('2', '4', '2'),
('3', '2', '1'),
('3', '6', '2'),
('4', '1', '1'),
('4', '6', '2'),
('5', '3', '1'),
('5', '6', '2'),
('5', '12', '1'),
('6', '1', '1'),
('6', '6', '1'),
('6', '4', '1'),
('6', '5', '1'),
('7', '1', '1'),
('7', '8', '1'),
('7', '11', '1'),
('8', '2', '1'),
('8', '7', '1'),
('9', '1', '1'),
('9', '8', '2'),
('10', '3', '1'),
('10', '4', '1'),
('10', '5', '3'),
('10', '9', '1'),
('10', '6', '1'),
('10', '10', '1'),
('11', '3', '1'),
('11', '4', '1'),
('11', '5', '3'),
('11', '9', '1'),
('11', '6', '1'),
('11', '7', '1'),
('11', '8', '1'),
('11', '10', '1'),
('11', '11', '1'),
('11', '12', '1'),
('12', '1', '1'),
('12', '10', '1'),
('12', '11', '1'),
('12', '12', '1');
/*!40000 ALTER TABLE `recipeingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `id` int(16) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `code` varchar(32) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` (`code`, `description`)VALUES 
('Child Cone','One small scoop of vanilla, perfect for a child!'),
('Large Vanilla','Two scoops of vanilla goodness'),
('Small Chocolate','One scoop of chocolate, just enough to make you want more!'),
('Large Chocolate','Two scoops of chocolate, we won''t tell if you don''t!'),
('Chocolate Extreme','Two scoops of chocolate, plus toppings, everyone loves chocolate!'),
('Napolean','One scoop of vanilla, chocolate, and strawberry!'),
('Feeling Nutty','One scoop of maple, with lots of walnuts for a topping!'),
('Minty Fresh','One scoop of mint ice cream.'),
('Oh Canada','Two scoops of maple ice cream.'),
('Attempted Rainbow','One scoop of strawberry, orange, vanilla, and chocolate!'),
('I can''t Choose','One scoop of each ice cream with all of the toppings!'),
('Forgetting Something','Hmm is something missing?');
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `cost` decimal(5,2) NOT NULL,
  `productSold` varchar(256) NOT NULL,
  `date` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--


-- --------------------------------------------------------

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-05 23:13:51
