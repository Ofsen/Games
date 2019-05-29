-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 30 Mai 2019 à 00:11
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
-- Structure de la table `achat`
--

CREATE TABLE IF NOT EXISTS `achat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_game` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gamekey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `achat`
--

INSERT INTO `achat` (`id`, `id_game`, `id_user`, `gamekey`) VALUES
(12, 6, 1, '38c07d9eb6f585cb2e363aa8d83443b1b9fcc722');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `games`
--

INSERT INTO `games` (`id`, `titre`, `img`, `descr`, `dev`, `dat`, `plat_id`) VALUES
(2, 'God Of War', './img/game/god-of-war-4-2018-oo.jpg', 'God of War is a mythology-based action-adventure video game franchise. Created by David Jaffe at Sony''s Santa Monica Studio, the series debuted in 2005 on the PlayStation 2 (PS2) video game console, and has become a flagship title for the PlayStation brand, consisting of eight games across multiple platforms.', 'SIE Santa Monica Studio', '2019-03-03 19:30:26', 3),
(4, 'Red Dead Redemption 2', './img/game/red-dead-redemption-2-4k-8d.jpg', 'Red Dead Redemption 2 is a Western action-adventure game developed and published by Rockstar Games. It was released on October 26, 2018, for the PlayStation 4 and Xbox One consoles. The third entry in the Red Dead series, it is a prequel to the 2010 game Red Dead Redemption.', 'Rockstar Games', '2019-03-03 19:34:28', 1),
(6, 'tina', './img/game/eoLsBkHKu3Ceaq2zn3HpgiCUoAIjLLwjH3tHViEJrSM.png', 'bonjour le monde, bonjour l''humanitÃ©', 'by me', '2019-05-29 12:15:02', 1);

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
  `img` varchar(255) NOT NULL DEFAULT './img/user/default.jpg',
  `email` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse` text,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `img`, `email`, `nom`, `prenom`, `adresse`, `admin`) VALUES
(1, 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', './img/user/2bffc66e750ce60107ae3a529ebcf1163f7414e29e38e8270b265758e50ebac2.jpg', 'ofsensmailbox@gmail.com', 'Ouerdane', 'Yanis', 'CitÃ© 150 logement, batiment G, nÂ°113', 1),
(2, 'Ofsen', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', './img/user/default.jpg', 'damogenya@gmail.com', NULL, NULL, NULL, 0),
(3, 'tina', '1afb4e7d8f1d28d3945bfed25cb6f71e8bf9ecd5', './img/user/default.jpg', 'aaa@gmail.com', NULL, NULL, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
