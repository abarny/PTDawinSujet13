-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 10 Février 2015 à 13:44
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `teamshare`
--
CREATE DATABASE IF NOT EXISTS `teamshare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teamshare`;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE IF NOT EXISTS `groupes` (
  `id_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_groupe` varchar(32) NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` (`id_groupe`, `nom_groupe`) VALUES
(1, 'premiergroupe'),
(2, ''),
(3, ''),
(4, 'sounb'),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, 'testouille'),
(11, '?'),
(12, ''),
(13, ''),
(14, '');

-- --------------------------------------------------------

--
-- Structure de la table `membres_taches`
--

CREATE TABLE IF NOT EXISTS `membres_taches` (
  `id_util` int(11) NOT NULL,
  `id_tache` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres_taches`
--

INSERT INTO `membres_taches` (`id_util`, `id_tache`) VALUES
(1, 1),
(1, 2),
(1, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Contenu de la table `taches`
--

INSERT INTO `taches` (`id`, `title`, `start`, `end`, `description`, `heures_estim`, `responsable`, `id_groupe`) VALUES
(1, 'test 1', '2015-02-04', '2015-02-06', 'je fais de la merde', 0, '', 0),
(2, 'acheter des jeux', '2015-02-12', '2015-02-20', 'j''ai pas de sous', 0, '', 0),
(3, 'test 2', '2015-02-04', '2015-02-06', 'test2', 0, '', 0),
(4, 'test 3', '2015-02-04', '2015-02-07', 'je sais pas quoi mettre', 0, '', 0),
(5, 'test 4', '2015-02-04', '2015-02-08', '', 0, '', 0),
(21, 'fezfez', '2015-02-14', '2015-02-17', 'regrege', 0, 'greg', 0),
(22, 'tester des jeux', '2015-02-14', '2015-02-17', 'htrhtrh', 0, 'htrhtr', 0),
(62, 'testcreationtache', '2015-02-03', '2015-02-28', 'et on test', 2, 'michelin', 0),
(64, 'testcreationtache', '2015-02-03', '2015-02-28', 'et on test', 2, 'michelin', 0),
(79, 'faire le mÃ©nage', '2015-02-03', '2015-02-13', 'serpiller', 5, 'Giovanni', 0),
(80, 'montitre', '2015-02-09', '2015-02-15', 'madescruption', 1, 'michel', 1),
(81, 'montitre', '2015-02-09', '2015-02-15', 'madescruption', 1, 'michel', 1),
(82, 'montitre', '2015-02-09', '2015-02-15', 'madescruption', 1, 'michel', 1),
(83, 'montitre', '2015-02-11', '2015-02-26', '', 0, '', 0),
(84, 'essai', '2015-02-03', '2015-02-12', '', 0, '', 0),
(85, 'gergezger', '2015-02-16', '2015-02-19', '', 0, '', 0),
(87, 'jouer avec les enfancts', '2015-02-04', '2015-02-17', 'fete des jeux', 3, 'sardine', 0),
(88, 'matroupe', '2015-02-17', '2015-02-26', '', 0, '', 0),
(89, 'Ã§amarche', '2015-02-03', '2015-02-09', '', 0, '', 0),
(90, 'ratisser', '2015-02-17', '2015-02-20', '', 0, '', 0),
(91, 'sandwich', '2015-02-03', '2015-02-12', '', 0, '', 0),
(92, 'roquette', '2015-02-18', '2015-02-22', '', 0, '', 0),
(93, 'tasser', '2015-02-09', '2015-02-19', '', 0, 'VÃ©ronique', 0),
(94, 'teztzetze', '2015-02-11', '2015-02-18', '', 0, 'micheline', 0),
(95, 'gzege', '2015-02-17', '2015-02-25', '', 0, '', 0),
(96, 'intitule', '2015-02-11', '2015-02-19', '', 0, '', 0),
(97, 'vvvvvvvvvc', '2015-02-11', '2015-02-16', '', 0, '', 0),
(98, 'qq', '2015-02-10', '2015-02-12', '', 0, '', 0),
(99, 'Ã©Ã©Ã©Ã©Ã©Ã©Ã©Ã Ã Ã Ã Ã Ã¨Ã¨Ã¨Ã¨Ã¨Ã¨', '2015-02-10', '2015-02-21', '', 0, '', 0),
(100, 'allÃ© rÃ©parer', '2015-02-11', '2015-02-20', '', 0, '', 0),
(101, 'gy©ny©ryyy©y¨', '2015-02-10', '2015-02-14', '', 0, '', 0),
(102, 'aea¨a ', '2015-02-11', '2015-02-21', '', 0, '', 0),
(103, 'allae', '2015-02-11', '2015-02-15', '', 0, '', 0),
(104, 'eeeee', '2015-02-11', '2015-02-21', '', 0, '', 0),
(105, 'eaaeeciea', '2015-02-09', '2015-02-14', '', 0, '', 0),
(106, 'ttt', '2015-02-04', '2015-02-14', '', 0, '', 0),
(107, '', '0000-00-00', '0000-00-00', '', 0, '', 0),
(108, 'test', '2015-02-17', '2015-02-18', '', 0, '', 0),
(109, 'fezgfe', '2015-02-10', '2015-02-18', '', 0, '', 0),
(110, 'gergr', '2015-02-17', '2015-02-24', '', 0, '', 0),
(111, 'inscriptions', '2015-02-03', '2015-02-13', '', 0, '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `prenom`, `nom_user`, `username`, `mail`, `pass`, `color`, `droits_admin`) VALUES
(11, 'Pierre', 'Eveno', 'test', 'test@truc.fr', '098f6bcd4621d373cade4e832627b4f6', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
