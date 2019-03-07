-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 07 Mars 2019 à 11:46
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `games`
--

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `descr` longtext,
  `dev` varchar(255) DEFAULT NULL,
  `dat` datetime DEFAULT NULL,
  `plat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `games`
--

INSERT INTO `games` (`id`, `titre`, `img`, `descr`, `dev`, `dat`, `plat_id`) VALUES
(1, 'Cyberpunk 2077', './img/game/A-mercenary-on-the-rise-en.jpg', 'Cyberpunk 2077 is a neon cyberpunk game that has The Witcher 3 developer CD Projekt Red moving from a gritty, high fantasy world of an equally gritty, science fiction word metropolis. It''s based off the pen-and-paper RPG of the same name, but plays a heckuva lot like The Matrix game we''ve always wanted.', 'CD Project Red', '2019-03-03 19:35:21', 4),
(2, 'God Of War', './img/game/god-of-war-4-2018-oo.jpg', 'God of War is a mythology-based action-adventure video game franchise. Created by David Jaffe at Sony''s Santa Monica Studio, the series debuted in 2005 on the PlayStation 2 (PS2) video game console, and has become a flagship title for the PlayStation brand, consisting of eight games across multiple platforms.', 'SIE Santa Monica Studio', '2019-03-03 19:30:26', 3),
(4, 'Red Dead Redemption 2', './img/game/red-dead-redemption-2-4k-8d.jpg', 'Red Dead Redemption 2 is a Western action-adventure game developed and published by Rockstar Games. It was released on October 26, 2018, for the PlayStation 4 and Xbox One consoles. The third entry in the Red Dead series, it is a prequel to the 2010 game Red Dead Redemption.', 'Rockstar Games', '2019-03-03 19:34:28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--

CREATE TABLE IF NOT EXISTS `platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `platforms`
--

INSERT INTO `platforms` (`id`, `nom`, `img`) VALUES
(1, 'XBOX', './img/plat/xbox.jpg'),
(3, 'PS4', './img/plat/ps.jpg'),
(4, 'PC', './img/plat/pc.jpg'),
(11, 'Nintendo', './img/plat/nintendo-2-logo-png-transparent.png'),
(12, 'Switch', './img/plat/Nintendo_switch_logo.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
