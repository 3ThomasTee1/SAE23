-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 13 Juin 2024 à 20:16
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sae23`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administration`
--

CREATE TABLE IF NOT EXISTS `Administration` (
  `login` varchar(10) DEFAULT NULL,
  `mdp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Administration`
--

INSERT INTO `Administration` (`login`, `mdp`) VALUES
('admin', 'passadmin');

-- --------------------------------------------------------

--
-- Structure de la table `Batiment`
--

CREATE TABLE IF NOT EXISTS `Batiment` (
  `id_batiment` varchar(1) NOT NULL,
  `nom` varchar(4) DEFAULT NULL,
  `login` varchar(10) DEFAULT NULL,
  `mdp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Batiment`
--

INSERT INTO `Batiment` (`id_batiment`, `nom`, `login`, `mdp`) VALUES
('B', 'INFO', 'gestINFO', 'passINFO'),
('E', 'RT', 'gestRT', 'passRT');

-- --------------------------------------------------------

--
-- Structure de la table `Capteur`
--

CREATE TABLE IF NOT EXISTS `Capteur` (
  `nom_capteur` varchar(9) NOT NULL,
  `type_capteur` varchar(11) DEFAULT NULL,
  `unite` varchar(6) DEFAULT NULL,
  `nom_salle` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Capteur`
--

INSERT INTO `Capteur` (`nom_capteur`, `type_capteur`, `unite`, `nom_salle`) VALUES
('AM107-13', 'luminosité', 'lux', 'B105'),
('AM107-35', 'luminosité', 'lux', 'E105'),
('AM107-38', 'luminosité', 'lux', 'E208'),
('AM107-6', 'luminosité', 'lux', 'B203');

-- --------------------------------------------------------

--
-- Structure de la table `Mesure`
--

CREATE TABLE IF NOT EXISTS `Mesure` (
`id_mesure` int(4) unsigned NOT NULL,
  `date` date DEFAULT NULL,
  `horaire` time DEFAULT NULL,
  `valeur` int(4) DEFAULT NULL,
  `nom_capteur` varchar(9) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Contenu de la table `Mesure`
--

INSERT INTO `Mesure` (`id_mesure`, `date`, `horaire`, `valeur`, `nom_capteur`) VALUES
(119, '2024-06-07', '11:25:23', 5, 'AM107-38'),
(120, '2024-06-07', '11:26:38', 13, 'AM107-6'),
(121, '2024-06-07', '11:35:24', 4, 'AM107-38'),
(122, '2024-06-07', '11:36:37', 11, 'AM107-6'),
(123, '2024-06-07', '11:40:33', 4, 'AM107-35'),
(124, '2024-06-07', '11:45:23', 4, 'AM107-38'),
(125, '2024-06-07', '11:46:38', 11, 'AM107-6'),
(126, '2024-06-07', '11:50:33', 3, 'AM107-35'),
(127, '2024-06-07', '11:55:30', 6, 'AM107-38'),
(128, '2024-06-07', '11:56:38', 13, 'AM107-6'),
(129, '2024-06-07', '12:00:42', 5, 'AM107-35'),
(130, '2024-06-12', '22:05:51', 24, 'AM107-35'),
(131, '2024-06-13', '12:55:30', 11, 'AM107-38'),
(132, '2024-06-13', '12:56:42', 1, 'AM107-6'),
(133, '2024-06-13', '13:00:26', 1, 'AM107-35'),
(134, '2024-06-13', '13:01:27', 36, 'AM107-13'),
(135, '2024-06-13', '14:35:22', 14, 'AM107-38'),
(136, '2024-06-13', '14:36:44', 45, 'AM107-6'),
(137, '2024-06-13', '14:40:28', 10, 'AM107-35'),
(138, '2024-06-13', '14:41:27', 1, 'AM107-13'),
(139, '2024-06-13', '14:45:30', 12, 'AM107-38'),
(140, '2024-06-13', '14:46:42', 45, 'AM107-6'),
(141, '2024-06-13', '14:50:27', 10, 'AM107-35'),
(142, '2024-06-13', '14:51:27', 1, 'AM107-13'),
(143, '2024-06-13', '14:55:31', 12, 'AM107-38'),
(144, '2024-06-13', '14:56:42', 43, 'AM107-6'),
(145, '2024-06-13', '15:00:28', 10, 'AM107-35'),
(146, '2024-06-13', '15:01:27', 1, 'AM107-13'),
(147, '2024-06-13', '15:05:31', 12, 'AM107-38'),
(148, '2024-06-13', '15:06:43', 45, 'AM107-6'),
(149, '2024-06-13', '15:10:28', 8, 'AM107-35'),
(150, '2024-06-13', '15:11:27', 1, 'AM107-13'),
(151, '2024-06-13', '15:15:31', 12, 'AM107-38'),
(152, '2024-06-13', '15:16:43', 45, 'AM107-6'),
(153, '2024-06-13', '15:20:28', 8, 'AM107-35'),
(154, '2024-06-13', '15:21:27', 1, 'AM107-13'),
(155, '2024-06-13', '15:25:38', 14, 'AM107-38'),
(156, '2024-06-13', '15:26:42', 43, 'AM107-6'),
(157, '2024-06-13', '15:30:28', 8, 'AM107-35'),
(158, '2024-06-13', '15:31:32', 1, 'AM107-13'),
(159, '2024-06-13', '15:35:53', 14, 'AM107-38'),
(160, '2024-06-13', '15:36:42', 43, 'AM107-6'),
(161, '2024-06-13', '15:40:35', 7, 'AM107-35'),
(162, '2024-06-13', '15:41:27', 1, 'AM107-13'),
(163, '2024-06-13', '15:45:37', 14, 'AM107-38'),
(164, '2024-06-13', '15:46:46', 40, 'AM107-6'),
(165, '2024-06-13', '15:50:31', 8, 'AM107-35'),
(166, '2024-06-13', '15:51:26', 1, 'AM107-13'),
(167, '2024-06-13', '15:55:30', 16, 'AM107-38'),
(168, '2024-06-13', '15:56:42', 44, 'AM107-6'),
(169, '2024-06-13', '16:01:14', 10, 'AM107-35'),
(170, '2024-06-13', '16:01:27', 1, 'AM107-13'),
(171, '2024-06-13', '16:05:31', 15, 'AM107-38'),
(172, '2024-06-13', '16:06:43', 45, 'AM107-6'),
(173, '2024-06-13', '16:10:28', 8, 'AM107-35'),
(174, '2024-06-13', '16:11:33', 1, 'AM107-13'),
(175, '2024-06-13', '16:15:33', 15, 'AM107-38'),
(176, '2024-06-13', '16:16:43', 45, 'AM107-6'),
(177, '2024-06-13', '16:20:30', 10, 'AM107-35'),
(178, '2024-06-13', '16:21:28', 1, 'AM107-13'),
(179, '2024-06-13', '16:25:30', 17, 'AM107-38'),
(180, '2024-06-13', '16:26:43', 45, 'AM107-6'),
(181, '2024-06-13', '16:30:28', 42, 'AM107-35'),
(182, '2024-06-13', '16:31:27', 1, 'AM107-13'),
(183, '2024-06-13', '16:35:30', 12, 'AM107-38'),
(184, '2024-06-13', '16:36:42', 45, 'AM107-6'),
(185, '2024-06-13', '16:40:30', 55, 'AM107-35'),
(186, '2024-06-13', '16:41:35', 1, 'AM107-13'),
(187, '2024-06-13', '16:45:42', 12, 'AM107-38'),
(188, '2024-06-13', '16:46:51', 43, 'AM107-6'),
(189, '2024-06-13', '16:50:36', 55, 'AM107-35'),
(190, '2024-06-13', '16:51:38', 1, 'AM107-13'),
(191, '2024-06-13', '16:55:30', 17, 'AM107-38'),
(192, '2024-06-13', '16:56:43', 45, 'AM107-6'),
(193, '2024-06-13', '17:00:28', 58, 'AM107-35'),
(194, '2024-06-13', '17:02:09', 1, 'AM107-13'),
(195, '2024-06-13', '17:05:30', 19, 'AM107-38'),
(196, '2024-06-13', '17:06:42', 45, 'AM107-6'),
(197, '2024-06-13', '17:10:28', 58, 'AM107-35'),
(198, '2024-06-13', '17:11:27', 1, 'AM107-13'),
(199, '2024-06-13', '17:15:30', 16, 'AM107-38'),
(200, '2024-06-13', '17:16:42', 45, 'AM107-6'),
(201, '2024-06-13', '17:20:27', 55, 'AM107-35'),
(202, '2024-06-13', '17:21:27', 1, 'AM107-13'),
(203, '2024-06-13', '17:25:30', 14, 'AM107-38'),
(204, '2024-06-13', '17:26:42', 45, 'AM107-6'),
(205, '2024-06-13', '17:30:28', 55, 'AM107-35'),
(206, '2024-06-13', '17:31:27', 1, 'AM107-13'),
(207, '2024-06-13', '17:35:30', 17, 'AM107-38'),
(208, '2024-06-13', '17:36:43', 43, 'AM107-6'),
(209, '2024-06-13', '17:40:28', 59, 'AM107-35'),
(210, '2024-06-13', '17:41:27', 1, 'AM107-13'),
(211, '2024-06-13', '17:45:30', 19, 'AM107-38'),
(212, '2024-06-13', '17:46:42', 0, 'AM107-6'),
(213, '2024-06-13', '17:50:28', 53, 'AM107-35'),
(214, '2024-06-13', '17:51:27', 1, 'AM107-13'),
(215, '2024-06-13', '17:55:31', 16, 'AM107-38'),
(216, '2024-06-13', '17:56:42', 0, 'AM107-6'),
(217, '2024-06-13', '18:00:28', 54, 'AM107-35'),
(218, '2024-06-13', '18:01:26', 1, 'AM107-13'),
(219, '2024-06-13', '18:05:30', 14, 'AM107-38'),
(220, '2024-06-13', '18:06:42', 0, 'AM107-6'),
(221, '2024-06-13', '18:10:28', 50, 'AM107-35'),
(222, '2024-06-13', '18:11:26', 1, 'AM107-13'),
(223, '2024-06-13', '18:15:30', 14, 'AM107-38'),
(224, '2024-06-13', '18:16:42', 0, 'AM107-6'),
(225, '2024-06-13', '18:20:28', 54, 'AM107-35'),
(226, '2024-06-13', '18:21:27', 1, 'AM107-13'),
(227, '2024-06-13', '18:25:30', 14, 'AM107-38'),
(228, '2024-06-13', '18:26:42', 0, 'AM107-6'),
(229, '2024-06-13', '18:31:26', 1, 'AM107-13'),
(230, '2024-06-13', '18:35:30', 16, 'AM107-38'),
(231, '2024-06-13', '18:36:42', 0, 'AM107-6'),
(232, '2024-06-13', '18:40:28', 53, 'AM107-35'),
(233, '2024-06-13', '18:41:26', 1, 'AM107-13'),
(234, '2024-06-13', '18:45:30', 11, 'AM107-38'),
(235, '2024-06-13', '18:46:42', 0, 'AM107-6'),
(236, '2024-06-13', '18:50:28', 56, 'AM107-35'),
(237, '2024-06-13', '18:51:26', 1, 'AM107-13'),
(238, '2024-06-13', '18:55:30', 11, 'AM107-38'),
(239, '2024-06-13', '18:56:42', 0, 'AM107-6');

-- --------------------------------------------------------

--
-- Structure de la table `Salle`
--

CREATE TABLE IF NOT EXISTS `Salle` (
  `nom_salle` varchar(4) NOT NULL,
  `type_salle` varchar(2) DEFAULT NULL,
  `capacite` varchar(2) DEFAULT NULL,
  `id_batiment` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Salle`
--

INSERT INTO `Salle` (`nom_salle`, `type_salle`, `capacite`, `id_batiment`) VALUES
('B105', 'TP', '89', 'B'),
('B203', 'TP', '21', 'B'),
('E105', 'TD', '17', 'E'),
('E208', 'TD', '1', 'E');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Batiment`
--
ALTER TABLE `Batiment`
 ADD PRIMARY KEY (`id_batiment`);

--
-- Index pour la table `Capteur`
--
ALTER TABLE `Capteur`
 ADD PRIMARY KEY (`nom_capteur`), ADD KEY `fk_capteur` (`nom_salle`);

--
-- Index pour la table `Mesure`
--
ALTER TABLE `Mesure`
 ADD PRIMARY KEY (`id_mesure`), ADD KEY `fk_mesure` (`nom_capteur`);

--
-- Index pour la table `Salle`
--
ALTER TABLE `Salle`
 ADD PRIMARY KEY (`nom_salle`), ADD KEY `fk_salle` (`id_batiment`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Mesure`
--
ALTER TABLE `Mesure`
MODIFY `id_mesure` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Capteur`
--
ALTER TABLE `Capteur`
ADD CONSTRAINT `fk_capteur` FOREIGN KEY (`nom_salle`) REFERENCES `Salle` (`nom_salle`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Mesure`
--
ALTER TABLE `Mesure`
ADD CONSTRAINT `fk_mesure` FOREIGN KEY (`nom_capteur`) REFERENCES `Capteur` (`nom_capteur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Salle`
--
ALTER TABLE `Salle`
ADD CONSTRAINT `fk_salle` FOREIGN KEY (`id_batiment`) REFERENCES `Batiment` (`id_batiment`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
