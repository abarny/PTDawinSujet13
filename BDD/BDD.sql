-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: info-arie.iut.bx1
-- Généré le: Ven 06 Février 2015 à 16:37
-- Version du serveur: 5.5.41
-- Version de PHP: 5.4.36-0+deb7u3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `info_hatran`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE IF NOT EXISTS `groupes` (
  `id_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_groupe` varchar(32) NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membres_taches`
--

CREATE TABLE IF NOT EXISTS `membres_taches` (
  `id_util` int(11) NOT NULL,
  `id_tache` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `description` text NOT NULL,
  `heures_estim` float NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_groupe` (`id_groupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`id`, `title`, `start`, `end`, `description`, `heures_estim`, `responsable`, `id_groupe`) VALUES
(1, 'test 1', '2015-02-04', '2015-02-06', 'je fais de la merde', 0, '', 0),
(2, 'acheter des jeux', '2015-02-12', '2015-02-20', 'j''ai pas de sous', 0, '', 0),
(3, 'test 2', '2015-02-04', '2015-02-06', 'test2', 0, '', 0),
(4, 'test 3', '2015-02-04', '2015-02-07', 'je sais pas quoi mettre', 0, '', 0),
(5, 'test 4', '2015-02-04', '2015-02-08', '', 0, '', 0),
(6, 'pet odorant', '2015-03-12', '2015-03-17', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `color` int(255) NOT NULL,
  `droits_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = Admin ; 0 = Membre',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `prenom`, `nom_user`, `username`, `mail`, `pass`, `color`, `droits_admin`) VALUES
(1, 'Naro', 'Vagrant', 'LeVagabond', 'Naro.Vagrant@Etherval.fr', 'splitworld', 1, 1),
(2, 'Lilith', 'Godspell', 'LightAndDarkness', 'Lillith@Etherval.fr', 'dragon', 2, 0),
(3, 'Ike', 'SouthIsland', 'Soldier-Monk', 'Ike@Etherval.fr', 'lover', 3, 0),
(4, 'Sherenne', 'Capitale', 'Archer', 'Sherenne@Etherval.fr', 'firingshot', 4, 0),
(5, 'Ilo', 'Capitale', 'Kaisether', 'Ilo@Etherval.fr', 'ether', 5, 0),
(6, 'Tom', 'Veldyon', 'Chimera', 'Tom.Veldyon@Gaïa.fr', 'gunblade', 6, 0),
(7, 'Naïl', 'Unknown', 'Smémancien', 'Naïl@Etherval.fr', 'rock', 7, 0),
(8, 'Elise', 'Tesaross', 'ChainChimera', 'Elise.Tesaross@Gaïa.fr', 'Tom<3', 8, 0),
(9, 'Test', 'Test', 'Test', 'test.test@test.fr', '098f6bcd4621d373cade4e832627b4f6', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
