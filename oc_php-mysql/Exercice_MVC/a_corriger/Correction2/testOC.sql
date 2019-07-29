-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 17 mai 2018 à 04:36
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test2`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(63, 18, 'moi', 'woof', '2018-05-16 18:10:52'),
(64, 18, 'qwfqwf', 'mais pourquoi ?', '2018-05-16 18:12:46'),
(65, 17, 'Patrick', 'je suis une etoile de mer', '2018-05-16 18:14:40'),
(66, 17, 'BOB', 'eponge', '2018-05-16 18:14:51'),
(67, 17, 'Carlo', 'calamar', '2018-05-17 09:13:37'),
(62, 18, 'Thomas', 'nouveau commentaire', '2018-05-16 17:08:12'),
(61, 18, 'tata', 'encore un commentaire', '2018-05-16 17:05:17'),
(60, 18, 'Toto', 'ce commentaire a été modifié', '2018-05-16 17:05:43'),
(59, 18, 'Nicolas', 'premier commentaire', '2018-05-16 17:04:55');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(18, 'Nam dignissim cursus leo, nec gravida diam porta ut. ', 'Suspendisse rutrum viverra condimentum. Fusce semper velit enim, sed varius ipsum pretium semper. Vivamus iaculis enim risus, non volutpat nisl accumsan ornare. Morbi pharetra ut odio id euismod. Integer condimentum, ex non feugiat sagittis, nisi dui posuere mi, non condimentum velit risus et magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque bibendum nisi non efficitur maximus. Mauris congue ex massa, sit amet feugiat dui vehicula et. Nulla pulvinar, arcu eget pellentesque ullamcorper, dolor sem gravida augue, volutpat elementum risus felis et elit.\r\n', '2018-05-16 09:47:19'),
(17, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', ' Sed scelerisque condimentum eros, eu efficitur mauris tempus et. Nulla facilisi. Donec et felis tortor. Integer posuere massa ac purus pretium, ac efficitur mi elementum. Phasellus non nisi ut est posuere volutpat eu ut magna. Suspendisse vel volutpat est. Sed cursus erat ut volutpat egestas. Phasellus ut luctus ligula. Quisque volutpat purus ante, id aliquam diam accumsan in. Cras at laoreet nisi. Cras quis massa ut nisi commodo lacinia. Duis hendrerit, tellus vitae hendrerit efficitur, mi purus sodales purus, et porta velit ipsum vel sapien. Curabitur volutpat dui sit amet volutpat venenatis.\r\n\r\nAenean molestie pharetra gravida. Donec in nisi non nunc viverra gravida non id sapien. Ut luctus nibh at semper porta. Donec nec tristique est. Duis condimentum eget quam et semper. Duis at tortor lacus. Sed id neque sed nunc mollis finibus sed vel lorem', '2018-05-16 09:46:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
