-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `menu_en`;
CREATE TABLE `menu_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `starter` varchar(255) DEFAULT NULL,
  `starter_description` varchar(255) DEFAULT NULL,
  `dish` varchar(255) DEFAULT NULL,
  `dish_description` varchar(255) DEFAULT NULL,
  `dessert` varchar(255) DEFAULT NULL,
  `dessert_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu_en` (`id`, `menu_name`, `starter`, `starter_description`, `dish`, `dish_description`, `dessert`, `dessert_description`) VALUES
(1,	'My menuname test ',	'My menu  lol ',	'My menu descriptio, ok ok ',	'dish dish',	'dish_description dishdish',	'dessert  dessert',	'dessert_description  dessertdessert');

DROP TABLE IF EXISTS `menu_fr`;
CREATE TABLE `menu_fr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `starter` char(255) DEFAULT NULL,
  `starter_description` varchar(255) DEFAULT NULL,
  `dish` varchar(255) DEFAULT NULL,
  `dish_description` varchar(255) DEFAULT NULL,
  `dessert` varchar(255) DEFAULT NULL,
  `dessert_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu_fr` (`id`, `menu_name`, `starter`, `starter_description`, `dish`, `dish_description`, `dessert`, `dessert_description`) VALUES
(1,	'Mon menu FR',	'Mon menu FR',	'Mon menu FR',	'plat fr',	'description plat fr',	'dessert fr',	'description plat fr');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1,	'kevin.mougammadaly@gmail.com',	'$2y$10$uNWt/fI7o2bm27GzaYKRnuuLLBsXb5doj/zCyRu/KwkpsFIZbtAGu');

-- 2018-06-17 15:37:40
