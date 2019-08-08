--
-- Base de données :  `oc_courses`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE IF NOT EXISTS `personnages` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `forcePerso` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `degats` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `niveau` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `experience` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `lastConnect` datetime NOT NULL,
  `kicksDay` tinyint(4) NOT NULL DEFAULT '0',
  `lastKick` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`, `forcePerso`, `degats`, `niveau`, `experience`, `lastConnect`, `kicksDay`, `lastKick`) VALUES
(01, 'Ryu', 5, 0, 1, 0, NOW(), 0, NOW()),
(02, 'Ken', 5, 0, 1, 0, NOW(), 0, NOW()),
(03, 'Chun-Li', 5, 0, 1, 0, NOW(), 0, NOW()),
(04, 'Bison', 5, 0, 1, 0, NOW(), 0, NOW()),
(05, 'Vega', 5, 0, 1, 0, NOW(), 0, NOW()),
(06, 'Cammy', 5, 0, 1, 0, NOW(), 0, NOW()),
(07, 'Honda', 5, 0, 1, 0, NOW(), 0, NOW()),
(08, 'Blanka', 5, 0, 1, 0, NOW(), 0, NOW()),
