-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 24 avr. 2018 à 19:43
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `tpminichat`
--

DROP TABLE IF EXISTS `tpminichat`;
CREATE TABLE IF NOT EXISTS `tpminichat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `temps` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tpminichat`
--

INSERT INTO `tpminichat` (`id`, `pseudo`, `message`, `temps`) VALUES
(1, 'Mathieu', 'On devrait se revoir !', '2018-04-24 21:03:17'),
(2, 'Tom', 'Ben ouais, Ã§a fait un bail qu\'on s\'est pas vu!', '2018-04-24 21:22:40'),
(3, 'Mathieu', 'Ca va Tom ?', '2018-04-24 21:25:10'),
(4, 'Tom', 'Salut toi !', '2018-04-24 21:25:35'),
(5, 'Mathieu', 'Bonjour !', '2018-04-24 21:26:02'),
(6, 'Mathieu', 'J\'ai une devinette pour toi ! ', '2018-04-24 21:29:03'),
(7, 'Mathieu', 'Qu\'est ce qu\'une vache qui rit ?', '2018-04-24 21:30:01'),
(8, 'Tom', 'lol...chÃ© pas moi...un fromage', '2018-04-24 21:30:49'),
(9, 'Mathieu', 'non...Une vache a qui on a dit CHEESE !!', '2018-04-24 21:31:48'),
(10, 'Tom', 'Mdr !', '2018-04-24 21:32:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
