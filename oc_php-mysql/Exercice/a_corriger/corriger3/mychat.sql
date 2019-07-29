-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 25 avr. 2018 à 07:13
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mychat`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat_tp4`
--

DROP TABLE IF EXISTS `chat_tp4`;
CREATE TABLE IF NOT EXISTS `chat_tp4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `message` text NOT NULL,
  `date_publi` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat_tp4`
--

INSERT INTO `chat_tp4` (`id`, `pseudo`, `message`, `date_publi`) VALUES
(1, 'delphine', 'Hello tout le monde !', '2018-04-25 08:34:51'),
(4, 'Jean', 'Bonjour delphine, bienvenue', '2018-04-25 08:45:06'),
(5, 'Martine', 'Coucou', '2018-04-25 08:51:56'),
(6, 'delphine', 'Quel accueil chaleureux', '2018-04-25 08:59:25'),
(7, 'Martine', 'C\'est normal entre nous !', '2018-04-25 09:04:00'),
(8, 'Martine', 'Tu habites oÃ¹?', '2018-04-25 09:05:15'),
(9, 'delphine', 'A Paris et toi?', '2018-04-25 09:05:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
