-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Février 2015 à 08:38
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `teamshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE IF NOT EXISTS `groupes` (
  `id_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_groupe` varchar(32) NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membres_taches`
--

CREATE TABLE IF NOT EXISTS `membres_taches` (
  `id_util` int(11) NOT NULL,
  `id_tache` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `heures_estim` float NOT NULL,
  `responsable` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_groupe` (`id_groupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
  `id_user` int(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `color` int(255) NOT NULL,
  `droits_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `prenom`, `nom_user`, `username`, `mail`, `pass`, `color`, `droits_admin`) VALUES
(0, 'alexis', 'barny', 'alexrider45', 'barny.alexis@gmail.com', '1d220268dba9d114e4c1b0f833041feb', 1, 0),
(2, 'Lilith', 'Godspell', 'LightAndDarkness', 'Lillith@Etherval.fr', 'dragon', 2, 0),
(3, 'Ike', 'SouthIsland', 'Soldier-Monk', 'Ike@Etherval.fr', 'lover', 3, 0),
(4, 'Sherenne', 'Capitale', 'Archer', 'Sherenne@Etherval.fr', 'firingshot', 4, 0),
(5, 'Ilo', 'Capitale', 'Kaisether', 'Ilo@Etherval.fr', 'ether', 5, 0),
(6, 'Tom', 'Veldyon', 'Chimera', 'Tom.Veldyon@Gaïa.fr', 'gunblade', 6, 0),
(7, 'Naïl', 'Unknown', 'Smémancien', 'Naïl@Etherval.fr', 'rock', 7, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
