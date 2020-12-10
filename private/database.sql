-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `aelpp`;
CREATE DATABASE `aelpp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `aelpp`;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `html_content` longtext NOT NULL,
  `id_author` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_staff` (`id_author`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `person` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `article` (`id`, `title`, `html_content`, `id_author`) VALUES
(1,	'Mon premier article',	'<h1>Partie de l\'article</h1>\r\n<p>Contenu de l\'article</p>',	1);

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `object` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `contact` (`id`, `surname`, `name`, `phone`, `object`, `message`, `date`) VALUES
(1,	'Hoareau',	'Quentin',	'0606060606',	'Mon premier contact',	'Ma première description',	'2020-12-06 20:40:46');

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `predicted_date` date NOT NULL,
  `id_creator` int(11) NOT NULL,
  `num_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_creator` (`id_creator`),
  KEY `num_project` (`num_project`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_creator`) REFERENCES `person` (`id`),
  CONSTRAINT `event_ibfk_2` FOREIGN KEY (`num_project`) REFERENCES `project` (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `event` (`id`, `title`, `date_creation`, `predicted_date`, `id_creator`, `num_project`) VALUES
(1,	'Mon premier évent',	'2020-12-06 19:48:10',	'2020-12-06',	1,	1);

DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `group` (`id`, `name`, `description`) VALUES
(1,	'Mon premier groupe',	'Ma description de groupe');

DROP TABLE IF EXISTS `group_person`;
CREATE TABLE `group_person` (
  `id_pers` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  PRIMARY KEY (`id_pers`,`id_group`),
  KEY `id_group` (`id_group`),
  CONSTRAINT `group_person_ibfk_1` FOREIGN KEY (`id_pers`) REFERENCES `person` (`id`),
  CONSTRAINT `group_person_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `group_project`;
CREATE TABLE `group_project` (
  `id_group` int(11) NOT NULL,
  `num_project` int(11) NOT NULL,
  PRIMARY KEY (`id_group`,`num_project`),
  KEY `num_project` (`num_project`),
  CONSTRAINT `group_project_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `group` (`id`),
  CONSTRAINT `group_project_ibfk_2` FOREIGN KEY (`num_project`) REFERENCES `project` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `role_code` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_code` (`role_code`),
  CONSTRAINT `person_ibfk_1` FOREIGN KEY (`role_code`) REFERENCES `role` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `person` (`id`, `name`, `surname`, `email`, `phone`, `role_code`) VALUES
(1,	'Benoit',	'BO',	'b.test@gmail.com',	'0606060606',	'EL');

DROP TABLE IF EXISTS `plant`;
CREATE TABLE `plant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `size` float DEFAULT NULL,
  `description` text DEFAULT NULL,
  `code_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code_type` (`code_type`),
  CONSTRAINT `plant_ibfk_1` FOREIGN KEY (`code_type`) REFERENCES `plant_type` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `plant` (`id`, `name`, `size`, `description`, `code_type`) VALUES
(1,	'Camomille',	500,	'La camomille calme et facilite le sommeil',	1);

DROP TABLE IF EXISTS `plant_type`;
CREATE TABLE `plant_type` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(150) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `plant_type` (`code`, `label`) VALUES
(1,	'Arbre'),
(2,	'Fleure'),
(3,	'Tisane');

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `project` (`num`, `name`, `description`, `date_creation`) VALUES
(1,	'Mon premier groupe',	'Ma description de groupe',	'2020-12-06 19:40:14');

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `code` varchar(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` (`code`, `type`) VALUES
('EL',	'Elève'),
('EN',	'Enseignant ');

-- 2020-12-10 17:54:05
