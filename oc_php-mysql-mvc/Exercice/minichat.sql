-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 25 avr. 2018 à 08:57
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE `minichat` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`, `date_post`) VALUES
(1, 'peter', 'Bonjour !', '0000-00-00 00:00:00'),
(2, 'Tom', 'Bonjour :)', '0000-00-00 00:00:00'),
(3, 'Bob', 'Je suis là', '0000-00-00 00:00:00'),
(4, 'peter', 'ça fonctionne', '0000-00-00 00:00:00'),
(5, 'Tom', 'oui', '0000-00-00 00:00:00'),
(6, 'Bob', 'Yes', '0000-00-00 00:00:00'),
(7, 'Peter', 'blabla', '2018-04-23 12:13:08'),
(8, 'Peter', 'Hello', '2018-04-23 15:31:38'),
(9, 'peter', 'hi', '2018-04-23 15:33:42'),
(10, 'peter', 'fi', '2018-04-23 15:37:36'),
(11, 'toto', 'toto', '2018-04-23 15:49:57'),
(12, 'Peter', 'Alors ce $_SESSION ?', '2018-04-23 15:50:51'),
(13, 'Peter', 'hi', '2018-04-24 08:53:27'),
(14, '', 'lkfjqmsejfiqmslfijqsmfijmqslfjimqslifjqsmlfijqsmlfijqsmlifjmsqlifjmqslifjmsqlifjmqslifjmslifjmsqlifjmqslfijmqslifjmsqijfmlseqijfmsiqljeflkfjqmsejfiqmslfijqsmfijmqslfjimqslifjqsmlfijqsmlfijqsmlifjmsqlifjmqslifjmsqlifjmqslifjmslifjmsqlifjmqslfijmqslifjmsqij', '2018-04-24 09:28:55'),
(15, '', 'fesqfqefqe', '2018-04-24 09:30:03'),
(16, '', 'fesqfef', '2018-04-24 09:30:08'),
(17, '', 'feqsf', '2018-04-24 09:30:37'),
(18, '', 'efqs\r\n', '2018-04-24 09:35:48'),
(19, 'Eqdq', 'DZQDQ', '2018-04-24 09:39:27'),
(20, 'Peter', 'Hello', '2018-04-24 10:08:41'),
(21, 'Tom', 'mon message', '2018-04-24 10:21:41'),
(22, 'Max', 'Hello', '2018-04-24 10:28:13'),
(23, 'Tom', 'Yes', '2018-04-24 15:37:32'),
(24, 'Peter', 'No', '2018-04-24 15:37:56'),
(25, 'Tom', 'No', '2018-04-24 15:38:46'),
(26, 'Tom', 'Message', '2018-04-24 15:42:24'),
(27, 'Peter', 'OK ?', '2018-04-24 15:48:54'),
(28, 'Peter', 'Mon message', '2018-04-24 15:50:05'),
(29, 'fesqfsqf', 'feqsfeqsf', '2018-04-24 15:50:21'),
(30, 'Peter', 'test', '2018-04-24 20:26:58'),
(31, 'Peter', 'session pseudo', '2018-04-24 20:28:02'),
(32, 'Peter', 'session destroy', '2018-04-24 20:29:30'),
(33, '', '', '2018-04-25 09:49:19'),
(34, '', '', '2018-04-25 09:49:30'),
(35, '', '', '2018-04-25 09:49:46'),
(36, 'Peter', 'SESSION pseudo', '2018-04-25 09:50:44'),
(37, '', '', '2018-04-25 09:50:58'),
(38, '/', '', '2018-04-25 10:00:48'),
(39, 'Peter', 'Teste message d\'eerue', '2018-04-25 10:30:36'),
(40, 'Peter', 're', '2018-04-25 10:31:15'),
(41, 'Peter', 'Champs rempli', '2018-04-25 10:31:34'),
(42, 'Tom', 'Message d\'erreur disparait', '2018-04-25 10:34:27'),
(43, ' ', ' ', '2018-04-25 10:34:42'),
(44, 'Peter', 'pseudo peter', '2018-04-25 10:54:41'),
(45, 'Peter', 'teste logout puis message Tom', '2018-04-25 10:54:55'),
(46, 'Tom', 'Logout OK', '2018-04-25 10:55:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
