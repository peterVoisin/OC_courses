CREATE TABLE IF NOT EXISTS `personnages` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `degats` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `experience` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `niveau` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `forcePerso` tinyint(3) unsigned NOT NULL DEFAULT '5',
  `kickOfDay` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `lastConnect` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `personnages` (`id`, `nom`, `forcePerso`, `lastConnect`) VALUES (NULL, 'Ryu', '5', NOW()), (NULL, 'Ken', '5', NOW()), (NULL, 'Chun-Li', '5', NOW()), (NULL, 'Bison', '5', NOW()), (NULL, 'Vega', '5', NOW()), (NULL, 'Cammy', '5', NOW()), (NULL, 'Honda', '5', NOW()), (NULL, 'Blanka', '5', NOW());
