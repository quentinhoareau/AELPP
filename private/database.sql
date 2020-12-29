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
  `author_id` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `edit_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `published` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `id_staff` (`author_id`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `person` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `article` (`id`, `title`, `html_content`, `author_id`, `publish_date`, `edit_date`, `published`) VALUES
(1,	'Mon premier article 1',	'<p>azazzzzzz</p>\r\n',	1,	'2020-12-27 21:31:34',	'2020-12-29 22:56:16',	1),
(2,	'Protéger la nature !',	'<p><strong>Partie1:</strong></p>\r\n\r\n<p>salut 1er&nbsp;texte</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Partie 2:</strong></p>\r\n\r\n<p>salut 2eme texte</p>\r\n\r\n<hr />\r\n<p>saluuuuut</p>\r\n',	1,	'2020-12-27 22:52:59',	'2020-12-28 00:26:42',	0),
(4,	'Protéger Mère nature 2',	'<p><strong><span style=\"color:#e74c3c\">Lorem ipsum</span> </strong>dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>\r\n',	2,	'2020-12-27 21:31:42',	'2020-12-28 01:38:33',	1),
(13,	'Cou article',	'<p>D&eacute;crivez le contenu de votre article</p>\r\n',	1,	'2020-12-28 01:50:25',	'2020-12-28 01:55:33',	1);

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
  `content` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `predicted_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `id_creator` int(11) NOT NULL,
  `num_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_creator` (`id_creator`),
  KEY `num_project` (`num_project`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_creator`) REFERENCES `person` (`id`),
  CONSTRAINT `event_ibfk_2` FOREIGN KEY (`num_project`) REFERENCES `project` (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `event` (`id`, `title`, `content`, `date_creation`, `predicted_date`, `id_creator`, `num_project`) VALUES
(1,	'Mon premier évent',	'<p>Aucune description</p>\r\n',	'2020-12-29 22:14:42',	'2020-12-06 06:25:00',	1,	1),
(8,	'heyy',	'<p>azaz</p>\r\n',	'2020-12-29 22:58:26',	'2020-12-25 22:02:00',	2,	1),
(9,	'azaz',	'<p>azazaz</p>\r\n',	'2020-12-29 23:00:29',	'2020-12-19 23:03:00',	3,	1),
(10,	'azaza',	'',	'2020-12-29 23:01:09',	'2020-12-26 23:01:00',	1,	NULL);

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

INSERT INTO `group_person` (`id_pers`, `id_group`) VALUES
(2,	1);

DROP TABLE IF EXISTS `group_project`;
CREATE TABLE `group_project` (
  `id_group` int(11) NOT NULL,
  `num_project` int(11) NOT NULL,
  PRIMARY KEY (`id_group`,`num_project`),
  KEY `num_project` (`num_project`),
  CONSTRAINT `group_project_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `group` (`id`),
  CONSTRAINT `group_project_ibfk_2` FOREIGN KEY (`num_project`) REFERENCES `project` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `group_project` (`id_group`, `num_project`) VALUES
(1,	1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `person` (`id`, `name`, `surname`, `email`, `phone`, `role_code`) VALUES
(1,	'Benoit',	'BO',	'b.test@gmail.com',	'0606060606',	'EL'),
(2,	'Quentin',	'HOA',	'q.test@gmail.com',	'59959595',	'EL'),
(3,	'Florent',	'DJX',	'd.test@gmail.com',	'59959595',	'EN');

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
(1,	'Mon premier projets',	'Ma description de mon projet\r\n',	'2020-12-06 19:40:14');

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `code` varchar(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` (`code`, `type`) VALUES
('EL',	'Elève'),
('EN',	'Enseignant ');

-- 2020-12-29 19:03:28
