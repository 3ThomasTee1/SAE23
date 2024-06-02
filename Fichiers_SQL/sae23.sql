-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 02 Juin 2024 à 23:34
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
  `type_capteur` varchar(6) DEFAULT NULL,
  `unite` varchar(6) DEFAULT NULL,
  `nom_salle` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Capteur`
--

INSERT INTO `Capteur` (`nom_capteur`, `type_capteur`, `unite`, `nom_salle`) VALUES
('AM107-13', 'AM107', 'lux', 'B105'),
('AM107-35', 'AM107', 'lux', 'E105'),
('AM107-38', 'AM107', 'lux', 'E208'),
('AM107-6', 'AM107', 'lux', 'B203');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Contenu de la table `Mesure`
--

INSERT INTO `Mesure` (`id_mesure`, `date`, `horaire`, `valeur`, `nom_capteur`) VALUES
(20, '2024-06-01', '18:50:26', 1, 'AM107-35'),
(21, '2024-06-01', '18:51:14', 18, 'AM107-13'),
(22, '2024-06-02', '14:46:51', 51, 'AM107-6'),
(23, '2024-06-02', '14:50:26', 7, 'AM107-35'),
(24, '2024-06-02', '14:51:14', 21, 'AM107-13'),
(25, '2024-06-02', '14:56:51', 47, 'AM107-6'),
(26, '2024-06-02', '15:00:26', 11, 'AM107-35'),
(27, '2024-06-02', '15:01:14', 15, 'AM107-13'),
(28, '2024-06-02', '15:05:17', 21, 'AM107-38'),
(29, '2024-06-02', '15:06:52', 42, 'AM107-6'),
(30, '2024-06-02', '15:10:27', 7, 'AM107-35'),
(31, '2024-06-02', '15:11:13', 16, 'AM107-13'),
(32, '2024-06-02', '15:15:17', 18, 'AM107-38'),
(33, '2024-06-02', '15:16:51', 41, 'AM107-6'),
(34, '2024-06-02', '15:20:26', 7, 'AM107-35'),
(35, '2024-06-02', '15:21:14', 16, 'AM107-13'),
(36, '2024-06-02', '15:25:17', 20, 'AM107-38'),
(37, '2024-06-02', '15:26:51', 39, 'AM107-6'),
(38, '2024-06-02', '15:30:26', 7, 'AM107-35'),
(39, '2024-06-02', '15:31:14', 13, 'AM107-13'),
(40, '2024-06-02', '15:35:18', 14, 'AM107-38'),
(41, '2024-06-02', '15:36:51', 35, 'AM107-6'),
(42, '2024-06-02', '15:40:27', 5, 'AM107-35'),
(43, '2024-06-02', '15:41:13', 12, 'AM107-13'),
(44, '2024-06-02', '15:45:17', 16, 'AM107-38'),
(45, '2024-06-02', '15:46:52', 39, 'AM107-6'),
(46, '2024-06-02', '15:51:14', 18, 'AM107-13'),
(47, '2024-06-02', '15:55:17', 20, 'AM107-38'),
(48, '2024-06-02', '15:56:51', 39, 'AM107-6'),
(49, '2024-06-02', '16:01:14', 18, 'AM107-13'),
(50, '2024-06-02', '16:05:18', 20, 'AM107-38'),
(51, '2024-06-02', '16:06:51', 42, 'AM107-6'),
(52, '2024-06-02', '16:10:27', 9, 'AM107-35'),
(53, '2024-06-02', '16:11:14', 16, 'AM107-13'),
(54, '2024-06-02', '16:15:17', 23, 'AM107-38'),
(55, '2024-06-02', '16:16:52', 44, 'AM107-6'),
(56, '2024-06-02', '16:20:27', 7, 'AM107-35'),
(57, '2024-06-02', '16:21:13', 17, 'AM107-13'),
(58, '2024-06-02', '16:25:17', 20, 'AM107-38'),
(59, '2024-06-02', '16:26:52', 40, 'AM107-6'),
(60, '2024-06-02', '16:30:26', 6, 'AM107-35'),
(61, '2024-06-02', '16:31:14', 16, 'AM107-13'),
(62, '2024-06-02', '16:35:17', 14, 'AM107-38'),
(63, '2024-06-02', '16:36:51', 34, 'AM107-6'),
(64, '2024-06-02', '16:40:26', 4, 'AM107-35'),
(65, '2024-06-02', '16:41:14', 14, 'AM107-13'),
(66, '2024-06-02', '16:45:17', 18, 'AM107-38'),
(67, '2024-06-02', '16:46:51', 39, 'AM107-6'),
(68, '2024-06-02', '16:50:27', 6, 'AM107-35'),
(69, '2024-06-02', '16:51:13', 18, 'AM107-13'),
(70, '2024-06-02', '16:55:17', 20, 'AM107-38'),
(71, '2024-06-02', '16:56:52', 37, 'AM107-6'),
(72, '2024-06-02', '17:00:26', 5, 'AM107-35'),
(73, '2024-06-02', '17:01:14', 20, 'AM107-13'),
(74, '2024-06-02', '17:05:17', 22, 'AM107-38'),
(75, '2024-06-02', '17:06:51', 47, 'AM107-6'),
(76, '2024-06-02', '17:10:26', 5, 'AM107-35'),
(77, '2024-06-02', '17:11:14', 19, 'AM107-13'),
(78, '2024-06-02', '17:15:18', 18, 'AM107-38'),
(79, '2024-06-02', '17:16:51', 40, 'AM107-6'),
(80, '2024-06-02', '17:20:27', 6, 'AM107-35'),
(81, '2024-06-02', '17:21:13', 16, 'AM107-13'),
(82, '2024-06-02', '17:25:17', 13, 'AM107-38'),
(83, '2024-06-02', '17:26:51', 31, 'AM107-6'),
(84, '2024-06-02', '17:30:27', 1, 'AM107-35'),
(85, '2024-06-02', '17:31:13', 13, 'AM107-13'),
(86, '2024-06-02', '17:35:17', 18, 'AM107-38'),
(87, '2024-06-02', '17:36:52', 37, 'AM107-6'),
(88, '2024-06-02', '17:40:29', 2, 'AM107-35'),
(89, '2024-06-02', '17:41:14', 16, 'AM107-13'),
(90, '2024-06-02', '17:45:18', 16, 'AM107-38'),
(91, '2024-06-02', '17:46:51', 39, 'AM107-6'),
(92, '2024-06-02', '17:50:26', 2, 'AM107-35'),
(93, '2024-06-02', '17:51:14', 18, 'AM107-13'),
(94, '2024-06-02', '17:55:18', 14, 'AM107-38'),
(95, '2024-06-02', '17:56:51', 37, 'AM107-6'),
(96, '2024-06-02', '18:00:27', 2, 'AM107-35'),
(97, '2024-06-02', '18:01:13', 18, 'AM107-13'),
(98, '2024-06-02', '18:05:17', 14, 'AM107-38'),
(99, '2024-06-02', '18:06:52', 35, 'AM107-6'),
(100, '2024-06-02', '18:10:26', 1, 'AM107-35'),
(101, '2024-06-02', '18:11:14', 16, 'AM107-13'),
(102, '2024-06-02', '18:15:17', 16, 'AM107-38'),
(103, '2024-06-02', '18:16:52', 34, 'AM107-6'),
(104, '2024-06-02', '18:20:26', 1, 'AM107-35'),
(105, '2024-06-02', '18:21:14', 14, 'AM107-13'),
(106, '2024-06-02', '18:25:18', 16, 'AM107-38'),
(107, '2024-06-02', '18:26:51', 34, 'AM107-6'),
(108, '2024-06-02', '18:30:27', 1, 'AM107-35'),
(109, '2024-06-02', '18:31:13', 18, 'AM107-13'),
(110, '2024-06-02', '18:35:17', 13, 'AM107-38'),
(111, '2024-06-02', '18:36:51', 32, 'AM107-6'),
(112, '2024-06-02', '18:40:26', 1, 'AM107-35'),
(113, '2024-06-02', '18:41:14', 16, 'AM107-13'),
(114, '2024-06-02', '18:45:17', 11, 'AM107-38'),
(115, '2024-06-02', '18:46:52', 30, 'AM107-6'),
(116, '2024-06-02', '18:50:26', 1, 'AM107-35'),
(117, '2024-06-02', '18:51:14', 16, 'AM107-13'),
(118, '2024-06-02', '18:55:18', 13, 'AM107-38'),
(119, '2024-06-02', '18:56:51', 34, 'AM107-6');

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
('B105', 'TP', '15', 'B'),
('B203', 'TP', '10', 'B'),
('E105', 'TP', '15', 'E'),
('E208', 'TP', '20', 'E');

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
MODIFY `id_mesure` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
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
