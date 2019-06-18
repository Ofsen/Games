-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 17 juin 2019 à 21:36
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `games`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_game` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gamekey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`id`, `id_game`, `id_user`, `gamekey`) VALUES
(23, 8, 1, 'fab19abfc186474354d059987002dfd06da3ddce'),
(24, 6, 1, '999bda026be38397da36b3a974e7ba9f40275f69');

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `descr` text,
  `dev` varchar(255) DEFAULT NULL,
  `dat` datetime DEFAULT NULL,
  `plat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `titre`, `img`, `descr`, `dev`, `dat`, `plat_id`) VALUES
(2, 'God Of War', './img/game/god-of-war-4-2018-oo.jpg', '&lt;p&gt;God of War is a mythology-based action-adventure video game franchise. Created by David Jaffe at Sony\'s Santa Monica Studio, the series debuted in 2005 on the PlayStation 2 (PS2) video game console, and has become a flagship title for the PlayStation brand, consisting of eight games across multiple platforms.&lt;/p&gt;\r\n&lt;p&gt;Kratos est Ã  l\'origine un brillant et brutal capitaine de l\'armÃ©e spartiate. Sa rÃ©putation de meneur d\'hommes et de conquÃ©rant lui permet rapidement de passer de capitaine d\'une cinquantaine d\'hommes Ã  gÃ©nÃ©ral d\'une armÃ©e de milliers de Spartiates. Mais alors qu\'il enchaÃ®ne les campagnes victorieuses, Kratos doit affronter une armÃ©e de barbares venus de l\'Est. La bataille est sanglante et son armÃ©e de Sparte est balayÃ©e. Alors que le chef barbare est sur le point de mettre fin Ã  la vie de Kratos, ce dernier implore ArÃ¨s, le dieu de la Guerre et de la Destruction, de le sauver.&lt;/p&gt;', 'SIE Santa Monica Studio', '2019-06-17 20:58:41', 3),
(4, 'Red Dead Redemption 2', './img/game/red-dead-redemption-2-4k-8d.jpg', '&lt;p&gt;Red Dead Redemption 2 is a Western action-adventure game developed and published by Rockstar Games. It was released on October 26, 2018, for the PlayStation 4 and Xbox One consoles. The third entry in the Red Dead series, it is a prequel to the 2010 game Red Dead Redemption.&lt;/p&gt;', 'Rockstar Games', '2019-06-17 21:52:41', 1),
(6, 'tina', './img/game/eoLsBkHKu3Ceaq2zn3HpgiCUoAIjLLwjH3tHViEJrSM.png', '&lt;p&gt;bonjour le monde, bonjour l&apos;humanitÃ© Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illum tenetur ut, debitis officiis aperiam dolores? Officiis iste quidem voluptate ratione impedit atque temporibus adipisci qui tempora, voluptatibus quam ex.&lt;/p&gt;', 'by me', '2019-06-17 22:59:11', 1),
(7, 'Cyberpunk 2077', './img/game/CP77-KV-Wallpaper-2560x1080_EN_r9wgz78r118ba423.jpg', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illum tenetur ut, debitis officiis aperiam dolores? Officiis iste quidem voluptate ratione impedit atque temporibus adipisci qui tempora, voluptatibus quam ex.&lt;/p&gt;', 'CD PROJECT RED', '2019-06-17 22:59:37', 1),
(8, 'zvf', './img/game/wallhaven-766099.jpg', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illum tenetur ut, debitis officiis aperiam dolores? Officiis iste quidem voluptate ratione impedit atque temporibus adipisci qui tempora, voluptatibus quam ex.&lt;/p&gt;', 'zdvzdv', '2019-06-17 21:57:16', 1);

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--

DROP TABLE IF EXISTS `platforms`;
CREATE TABLE IF NOT EXISTS `platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `platforms`
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

DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `img`, `email`, `nom`, `prenom`, `adresse`, `admin`) VALUES
(1, 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', './img/user/2bffc66e750ce60107ae3a529ebcf1163f7414e29e38e8270b265758e50ebac2.jpg', 'ofsensmailbox@gmail.com', 'Ouerdane', 'Yanis', 'CitÃ© 150 logement, batiment G, nÂ°113', 1),
(2, 'Ofsen', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', './img/user/default.jpg', 'damogenya@gmail.com', NULL, NULL, NULL, 0),
(3, 'tina', '1afb4e7d8f1d28d3945bfed25cb6f71e8bf9ecd5', './img/user/default.jpg', 'aaa@gmail.com', NULL, NULL, NULL, 0),
(6, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', './img/user/default.jpg', 'a@a', NULL, NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
