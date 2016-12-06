-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2016 at 11:01 PM
-- Server version: 5.7.13
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whatsthescoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
DROP TABLE IF EXISTS `ingredients`;

CREATE TABLE `ingredients` (
  `id` int(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` integer(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `perBox` int(64) NOT NULL,
  `onHand` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=16;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`name`, `price`, `type`, `perBox`, `onHand`) VALUES
('Waffle Cone', '50', 'container', '60', '10'),
('Regular Cone', '25', 'container', '60', '10'),
('Plastic Cup', '15', 'container', '50', '10'),
('Vanilla', '20', 'icecream', '45', '10'),
('Strawberry', '20', 'icecream', '45', '10'),
('Chocolate', '20', 'icecream', '45', '10'),
('Mint', '25', 'icecream', '45', '10'),
('Maple', '25', 'icecream', '45', '10'),
('Orange', '25', 'icecream', '45', '10'),
('Sprinkles', '18', 'garnish', '120', '10'),
('Walnuts', '35', 'garnish', '85', '0'),
('Chocolate Chips', '13', 'garnish', '100', '10');
-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--
DROP TABLE IF EXISTS `recipes`;

CREATE TABLE `recipes` (
  `id` int(16) NOT NULL,
  `code` varchar(32) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `code`, `description`) VALUES
('0', 'Child Cone','One small scoop of vanilla, perfect for a child!'),
('1', 'Large Vanilla', 'Two scoops of vanilla goodness'),
('2', 'Small Chocolate', 'One scoop of chocolate, just enough to make you want more!'),
('3', 'Large Chocolate', 'Two scoops of chocolate, we won''t tell if you don''t!'),
('4', 'Chocolate Extreme', 'Two scoops of chocolate, plus toppings, everyone loves chocolate!'),
('5', 'Napolean', 'One scoop of vanilla, chocolate, and strawberry!'),
('6', 'Feeling Nutty', 'One scoop of maple, with lots of walnuts for a topping!'),
('7', 'Minty Fresh', 'One scoop of mint ice cream.'),
('8', 'Oh Canada', 'Two scoops of maple ice cream.'),
('9', 'Attempted Rainbow', 'One scoop of strawberry, orange, vanilla, and chocolate!'),
('10', 'I can''t Choose', 'One scoop of each ice cream with all of the toppings!'),
('11', 'Forgetting Something', 'Hmm is something missing?');

-- --------------------------------------------------------

--
-- Table structure for table `recipeingredients`
--

DROP TABLE IF EXISTS `recipeingredients`;

CREATE TABLE `recipeingredients` (
  `id` int(16) NOT NULL,
  `recipeid` int(16) NOT NULL,
  `ingredientid` int(16) NOT NULL,
  `quantity` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `recipeingredients` (`recipeid`, `ingredientid`, `quantity`) VALUES 
('0', '1', '1'),
('0', '3', '1'),
('1', '0', '1'),
('1', '3', '2'),
('2', '1', '1'),
('2', '5', '2'),
('3', '0', '1'),
('3', '5', '2'),
('4', '2', '1'),
('4', '5', '2'),
('4', '11', '1'),
('5', '0', '1'),
('5', '5', '1'),
('5', '3', '1'),
('5', '4', '1'),
('6', '0', '1'),
('6', '7', '1'),
('6', '10', '1'),
('7', '1', '1'),
('7', '6', '1'),
('8', '0', '1'),
('8', '7', '2'),
('9', '2', '1'),
('9', '3', '1'),
('9', '4', '3'),
('9', '8', '1'),
('9', '5', '1'),
('9', '9', '1'),
('10', '2', '1'),
('10', '3', '1'),
('10', '4', '3'),
('10', '8', '1'),
('10', '5', '1'),
('10', '6', '1'),
('10', '7', '1'),
('10', '9', '1'),
('10', '10', '1'),
('10', '11', '1'),
('11', '0', '1'),
('11', '9', '1'),
('11', '10', '1'),
('11', '11', '1');


-- --------------------------------------------------------