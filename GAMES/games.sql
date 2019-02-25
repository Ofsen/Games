-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 25 Février 2019 à 19:48
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
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `contenu` longtext,
  `date` datetime DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `img`, `contenu`, `date`, `categorie_id`) VALUES
(1, 'Premier article', './img/cyberpunk.jpg', 'Nam vitae ipsum et ex dapibus elementum eget nec tellus. Suspendisse eleifend libero eu lacinia mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla sit amet massa arcu. Proin dolor eros, consequat sed elit eu, facilisis tristique leo. Suspendisse tincidunt augue dui, sit amet semper ex faucibus ac. Nullam aliquam turpis vitae libero fringilla, vel gravida metus aliquam. Pellentesque in ipsum vel sem euismod tempor sit amet maximus ligula. Sed vestibulum tincidunt pretium. Praesent nec ligula suscipit, faucibus augue in, semper metus. Aenean sem velit, egestas quis sapien ac, eleifend fringilla lorem.\nNam vitae ipsum et ex dapibus elementum eget nec tellus. Suspendisse eleifend libero eu lacinia mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla sit amet massa arcu. Proin dolor eros, consequat sed elit eu, facilisis tristique leo. Suspendisse tincidunt augue dui, sit amet semper ex faucibus ac. Nullam aliquam turpis vitae libero fringilla, vel gravida metus aliquam. Pellentesque in ipsum vel sem euismod tempor sit amet maximus ligula. Sed vestibulum tincidunt pretium. Praesent nec ligula suscipit, faucibus augue in, semper metus. Aenean sem velit, egestas quis sapien ac, eleifend fringilla lorem.\nNam vitae ipsum et ex dapibus elementum eget nec tellus. Suspendisse eleifend libero eu lacinia mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla sit amet massa arcu. Proin dolor eros, consequat sed elit eu, facilisis tristique leo. Suspendisse tincidunt augue dui, sit amet semper ex faucibus ac. Nullam aliquam turpis vitae libero fringilla, vel gravida metus aliquam. Pellentesque in ipsum vel sem euismod tempor sit amet maximus ligula. Sed vestibulum tincidunt pretium. Praesent nec ligula suscipit, faucibus augue in, semper metus. Aenean sem velit, egestas quis sapien ac, eleifend fringilla lorem.', '2019-02-25 16:28:11', 1),
(2, 'Mon Titre', './img/cyberpunk.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus maximus dui sed feugiat. Mauris consequat, nisl ac convallis dapibus, enim urna ullamcorper sapien, porttitor lobortis mauris diam a elit. Curabitur in ligula fringilla, iaculis metus nec, tempor ex. Etiam in suscipit lectus. Mauris vehicula feugiat lorem, tempor volutpat nunc consequat ac. Quisque quis dui ex. Nulla ac metus mattis sapien malesuada feugiat vel id leo. Duis vel eros ornare, gravida nibh nec, pharetra est.\n\nNam vitae ipsum et ex dapibus elementum eget nec tellus. Suspendisse eleifend libero eu lacinia mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla sit amet massa arcu. Proin dolor eros, consequat sed elit eu, facilisis tristique leo. Suspendisse tincidunt augue dui, sit amet semper ex faucibus ac. Nullam aliquam turpis vitae libero fringilla, vel gravida metus aliquam. Pellentesque in ipsum vel sem euismod tempor sit amet maximus ligula. Sed vestibulum tincidunt pretium. Praesent nec ligula suscipit, faucibus augue in, semper metus. Aenean sem velit, egestas quis sapien ac, eleifend fringilla lorem.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus maximus dui sed feugiat. Mauris consequat, nisl ac convallis dapibus, enim urna ullamcorper sapien, porttitor lobortis mauris diam a elit. Curabitur in ligula fringilla, iaculis metus nec, tempor ex. Etiam in suscipit lectus. Mauris vehicula feugiat lorem, tempor volutpat nunc consequat ac. Quisque quis dui ex. Nulla ac metus mattis sapien malesuada feugiat vel id leo. Duis vel eros ornare, gravida nibh nec, pharetra est.\n', '2019-02-25 15:38:53', 3),
(4, 'Hello', './img/cyberpunk.jpg', 'Hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi hi ', '2019-02-25 16:28:21', 4);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `img`) VALUES
(1, 'XBOX', './img/cat/xbox.jpg'),
(3, 'PS4', './img/cat/ps.jpg'),
(4, 'PC', './img/cat/pc.jpg');

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
