-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 juil. 2019 à 13:58
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`id`, `id_game`, `id_user`, `gamekey`) VALUES
(30, 6, 6, '5c64cc5d7cc05237d16fa2873e58b5923c489b73'),
(31, 8, 6, 'f6b9b6ccd0440bc448ae4b0267c316b751bcf826'),
(32, 2, 6, '49e3d046636e06b2d82ee046db8e6eb9a2e11e16'),
(33, 4, 1, '867cd58f3fe352905cc5b21cb41c523ca92da469'),
(34, 2, 1, 'c6cf93cb5f3e51a3053e0c15aa871977512f3515');

-- --------------------------------------------------------

--
-- Structure de la table `cats`
--

DROP TABLE IF EXISTS `cats`;
CREATE TABLE IF NOT EXISTS `cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cats`
--

INSERT INTO `cats` (`id`, `nom`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(6, 'Sport'),
(7, 'Arcade'),
(8, 'Open-world'),
(9, 'Voiture'),
(10, 'FPS'),
(11, 'MystÃ¨re');

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
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `titre`, `img`, `descr`, `dev`, `dat`, `price`) VALUES
(2, 'God Of War', './img/game/god-of-war-4-2018-oo.jpg', '&lt;p&gt;God of War is a mythology-based action-adventure video game franchise. Created by David Jaffe at Sony&apos;s Santa Monica Studio, the series debuted in 2005 on the PlayStation 2 (PS2) video game console, and has become a flagship title for the PlayStation brand, consisting of eight games across multiple platforms.&lt;/p&gt;\r\n&lt;p&gt;Kratos est Ã  l&apos;origine un brillant et brutal capitaine de l&apos;armÃ©e spartiate. Sa rÃ©putation de meneur d&apos;hommes et de conquÃ©rant lui permet rapidement de passer de capitaine d&apos;une cinquantaine d&apos;hommes Ã  gÃ©nÃ©ral d&apos;une armÃ©e de milliers de Spartiates. Mais alors qu&apos;il enchaÃ®ne les campagnes victorieuses, Kratos doit affronter une armÃ©e de barbares venus de l&apos;Est. La bataille est sanglante et son armÃ©e de Sparte est balayÃ©e. Alors que le chef barbare est sur le point de mettre fin Ã  la vie de Kratos, ce dernier implore ArÃ¨s, le dieu de la Guerre et de la Destruction, de le sauver.&lt;/p&gt;', 'SIE Santa Monica Studio', '2019-06-25 13:21:17', 1000),
(4, 'Red Dead Redemption 2', './img/game/red-dead-redemption-2-4k-8d.jpg', '&lt;p&gt;Red Dead Redemption 2 est un jeu en solo Ã  monde ouvert, de type GTA-like, comportant Ã©galement un mode multijoueur. Il peut se jouer en vue objective ou subjective.&lt;/p&gt;\r\n\r\n&lt;p&gt;En 1899 (soit 12 ans avant les principaux Ã©vÃ©nements de Red Dead Redemption), suite Ã  un braquage qui a mal tournÃ© dans la ville de Blackwater, la bande de Dutch van der Linde est traquÃ©e par les agents fÃ©dÃ©raux et les chasseurs de primes. Prenant la fuite vers l&apos;est, le gang commet mÃ©faits sur mÃ©faits pour survivre, bien que des querelles internes menacent de le disloquer. Le bras droit de Dutch, Arthur Morgan, est lui aussi tiraillÃ© entre ses propres idÃ©aux et sa loyautÃ© envers la bande qui l&apos;a Ã©levÃ©.&lt;/p&gt;', 'Rockstar Games', '2019-06-25 13:21:32', 5),
(7, 'Cyberpunk 2077', './img/game/CP77-KV-Wallpaper-2560x1080_EN_r9wgz78r118ba423.jpg', '&lt;p&gt;Cyberpunk 2077 est un jeu vidÃ©o d&apos;action-RPG en vue Ã  la premiÃ¨re personne dÃ©veloppÃ© par CD Projekt RED, fondÃ© sur la sÃ©rie de jeu de rÃ´le sur table Cyberpunk 2020 crÃ©Ã©e par Mike Pondsmith. Il prÃ©sente un monde futuriste dystopique de type cyberpunk dans lequel la technologie coexiste avec une sociÃ©tÃ© humaine dÃ©gÃ©nÃ©rÃ©e. Le jeu est marquÃ© par un dÃ©veloppement particuliÃ¨rement long, dÃ©butÃ© en 2012, en partie parce que le studio rÃ©alise en parallÃ¨le The Witcher 3.&lt;/p&gt;\r\n\r\n&lt;p&gt;L&apos;histoire de Cyberpunk 2077 prend place sur Terre en 2077 et se dÃ©roule dans la mÃ©tropole futuriste de Night City dans lâ€™Ã‰tat libre de Californie. Dans ce monde futuriste Ã  tendance cyberpunk et dystopique oÃ¹ rÃ¨gnent la pauvretÃ© et les inÃ©galitÃ©s, l&apos;influence des mÃ©gacorporations est prÃ©pondÃ©rante â€” celles-ci ayant pris le pas sur les gouvernements et dictant leur loi â€”, ainsi que le cyberespace, la Â« Nouvelle FrontiÃ¨re Â» de cette Ã©poque.&lt;br&gt;\r\nDans cet univers, la population est influencÃ©e par l&apos;utilisation de la technologie (implants technologiques divers permettant d&apos;augmenter le corps humain), des drogues, ainsi que les braindances â€” des enregistrements qui permettent de revivre les souvenirs, expÃ©riences et sensations d&apos;une autre personne. L&apos;utilisation excessive des braindances entraÃ®ne une dÃ©pendance chez certains individus, lesquels perdent le contrÃ´le d&apos;eux-mÃªmes et deviennent agressifs. AppelÃ©s les Â« Psychos Â», ces Â« droguÃ©s Â» ont recours Ã  l&apos;implantation d&apos;amÃ©liorations technologiques et s&apos;attaquent aux Â« organiques Â». En rÃ©ponse, la force spÃ©ciale MAX-TAC est crÃ©Ã©e afin de les neutraliser.&lt;/p&gt;', 'CD PROJECT RED', '2019-06-25 13:21:44', 1000),
(10, 'The Legend of Zelda: Breath of the wild', './img/game/the-legend-of-zelda-breath-of-the-wild-switch-e793fb84.jpg', '&lt;p&gt;The Legend of Zelda: Breath of the Wild (ou simplement Breath of the Wild, parfois abrÃ©gÃ© BotW) est un jeu d&apos;action-aventure dÃ©veloppÃ© par Nintendo EPD assistÃ© par Monolith Soft et Ã©ditÃ© par Nintendo le 3 mars 2017 sur Nintendo Switch lors du lancement de la console, ainsi que sur Wii U dont il est dernier jeu produit par Nintendo. C&apos;est le dix-huitiÃ¨me jeu de la franchise The Legend of Zelda.&lt;/p&gt;\r\n&lt;p&gt;Dans un monde ouvert, Breath of the Wild propose d&apos;incarner Link, amnÃ©sique, qui est rÃ©veillÃ© aprÃ¨s un long sommeil d&apos;une centaine d&apos;annÃ©es par une mystÃ©rieuse voix qui le guide pour Ã©liminer Ganon, le FlÃ©au, et restaurer la paix dans le royaume d&apos;Hyrule. &lt;br&gt;Un des objectifs majeurs de cet Ã©pisode fixÃ© par l&apos;Ã©quipe de dÃ©veloppement est de repenser les conventions de la sÃ©rie. Le titre propose ainsi un jeu en monde ouvert avec une intrigue non-linÃ©aire, tout comme de nouvelles mÃ©caniques de gameplay avec l&apos;implÃ©mentation d&apos;un moteur physique complet pour la gestion des objets et de l&apos;environnement.&lt;/p&gt;', 'Nintendo EPD', '2019-06-25 13:21:56', 900);

-- --------------------------------------------------------

--
-- Structure de la table `game_cat`
--

DROP TABLE IF EXISTS `game_cat`;
CREATE TABLE IF NOT EXISTS `game_cat` (
  `game_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `game_cat`
--

INSERT INTO `game_cat` (`game_id`, `cat_id`) VALUES
(2, 1),
(2, 2),
(2, 8),
(4, 1),
(4, 2),
(4, 8),
(4, 10),
(7, 1),
(7, 2),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(10, 1),
(10, 2),
(10, 7),
(10, 8),
(10, 11);

-- --------------------------------------------------------

--
-- Structure de la table `game_plat`
--

DROP TABLE IF EXISTS `game_plat`;
CREATE TABLE IF NOT EXISTS `game_plat` (
  `game_id` int(11) NOT NULL,
  `plat_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`plat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `game_plat`
--

INSERT INTO `game_plat` (`game_id`, `plat_id`) VALUES
(2, 3),
(4, 1),
(4, 3),
(7, 1),
(7, 3),
(10, 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `platforms`
--

INSERT INTO `platforms` (`id`, `nom`, `img`) VALUES
(1, 'XBOX', './img/plat/xbox.jpg'),
(3, 'PS4', './img/plat/ps.jpg'),
(12, 'Switch', './img/plat/Nintendo_switch_logo.png'),
(13, 'PC', './img/plat/pc.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `img`, `email`, `nom`, `prenom`, `adresse`, `admin`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', './img/user/2bffc66e750ce60107ae3a529ebcf1163f7414e29e38e8270b265758e50ebac2.jpg', 'ofsensmailbox@gmail.com', 'Ad', 'Min', 'Inside a processor', 1),
(2, 'Ofsen', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', './img/user/default.jpg', 'damogenya@gmail.com', 'Yanis', 'Ouerdane', 'CitÃ© 150 logements, bÃ¢timent G, NÂ°113', 0),
(3, 'Moh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', './img/user/default.jpg', 'Moh@gmail.com', 'Slimi', 'Mohamed', 'Tizi Ouzou', 0),
(4, 'Mohand', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', './img/user/default.jpg', 'Mohand@gmail.com', 'Ourad', 'Mohand', 'Azazga', 0),
(5, 'Samy', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', './img/user/default.jpg', 'Samy@gmail.com', 'Boukdir', 'Samy Slimane', 'Alger', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
