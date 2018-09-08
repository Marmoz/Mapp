-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 31 juil. 2018 à 16:33
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `myschoolapp_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `acl`
--

DROP TABLE IF EXISTS `acl`;
CREATE TABLE IF NOT EXISTS `acl` (
  `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `action_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`ai`),
  KEY `action_id` (`action_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `acl_actions`
--

DROP TABLE IF EXISTS `acl_actions`;
CREATE TABLE IF NOT EXISTS `acl_actions` (
  `action_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `action_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `action_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  `category_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`action_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `acl_categories`
--

DROP TABLE IF EXISTS `acl_categories`;
CREATE TABLE IF NOT EXISTS `acl_categories` (
  `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `category_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_code` (`category_code`),
  UNIQUE KEY `category_desc` (`category_desc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idAdministrator` int(11) NOT NULL AUTO_INCREMENT,
  `prenomAdministrator` varchar(100) NOT NULL,
  `nomAdministrator` varchar(100) NOT NULL,
  `emailAdministrator` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fonctionAdmin` varchar(100) NOT NULL,
  PRIMARY KEY (`idAdministrator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `anneescolaire`
--

DROP TABLE IF EXISTS `anneescolaire`;
CREATE TABLE IF NOT EXISTS `anneescolaire` (
  `annee` int(11) NOT NULL,
  PRIMARY KEY (`annee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `anneescolaire`
--

INSERT INTO `anneescolaire` (`annee`) VALUES
(2017),
(2018);

-- --------------------------------------------------------

--
-- Structure de la table `auth_sessions`
--

DROP TABLE IF EXISTS `auth_sessions`;
CREATE TABLE IF NOT EXISTS `auth_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auth_sessions`
--

INSERT INTO `auth_sessions` (`id`, `user_id`, `login_time`, `modified_at`, `ip_address`, `user_agent`) VALUES
('fhvulcb0g0rpnh9q0ao3npf9u2nj2gp2', 954949785, '2018-07-31 01:22:38', '2018-07-31 01:22:38', '::1', 'Firefox 61.0 on Windows 10');

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comporte`
--

DROP TABLE IF EXISTS `comporte`;
CREATE TABLE IF NOT EXISTS `comporte` (
  `idMatiere` int(11) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  `coeff` int(11) NOT NULL,
  PRIMARY KEY (`idMatiere`,`idFiliere`),
  KEY `Comporte_Filiere0_FK` (`idFiliere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comporte`
--

INSERT INTO `comporte` (`idMatiere`, `idFiliere`, `coeff`) VALUES
(1, 1, 2),
(1, 2, 10),
(1, 3, 4),
(2, 1, 3),
(2, 2, 66),
(2, 4, 12),
(3, 1, 5),
(3, 4, 22),
(4, 3, 60),
(5, 3, 99),
(6, 2, 1111);

-- --------------------------------------------------------

--
-- Structure de la table `denied_access`
--

DROP TABLE IF EXISTS `denied_access`;
CREATE TABLE IF NOT EXISTS `denied_access` (
  `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) UNSIGNED DEFAULT '0',
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `idTeacher` int(11) NOT NULL AUTO_INCREMENT,
  `prenomTeacher` varchar(100) NOT NULL,
  `nomTeacher` varchar(100) NOT NULL,
  `emailTeacher` varchar(100) NOT NULL,
  `naissanceTeacher` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`idTeacher`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`idTeacher`, `prenomTeacher`, `nomTeacher`, `emailTeacher`, `naissanceTeacher`, `user_id`) VALUES
(1, 'Francois', 'Francois', 'Francois@gm.co', '1970-02-01', 748279962),
(2, 'Max', 'Max', 'Max@gm.co', '1970-02-01', 2147483647),
(3, 'Mertens', 'Mertens', 'Mertens@gm.co', '1970-02-01', 954949785),
(4, 'Ruth', 'Ruth', 'Ruth@m.co', '1970-02-01', 2007815847);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `idStudent` int(11) NOT NULL AUTO_INCREMENT,
  `prenomStudent` varchar(100) NOT NULL,
  `nomStudent` varchar(100) NOT NULL,
  `emailStudent` varchar(100) NOT NULL,
  `naissanceStudent` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`idStudent`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idStudent`, `prenomStudent`, `nomStudent`, `emailStudent`, `naissanceStudent`, `user_id`) VALUES
(1, 'Hamza', 'Hamza', 'Hamza@gm.co', '1991-05-03', 879489822),
(2, 'Sara', 'Sara', 'Sara@gm.co', '1991-08-03', 0),
(3, 'Amine', 'Amine', 'Amine@gm.co', '1991-05-03', 0),
(4, 'Yasmine', 'Yasmine', 'Yasmine@gm.co', '1991-08-07', 0),
(5, 'Fouad', 'Fouad', 'Fouad@gm.co', '1991-08-07', 0),
(6, 'Momo', 'Momo', 'Momo@gm.co', '1991-05-08', 0),
(7, 'Lisa', 'Lisa', 'Lisa@gm.co', '1991-05-03', 0),
(8, 'Alex', 'Alex', 'Alex@gm.co', '1995-11-02', 0);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `idFiliere` int(11) NOT NULL AUTO_INCREMENT,
  `nomFiliere` varchar(100) NOT NULL,
  PRIMARY KEY (`idFiliere`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`idFiliere`, `nomFiliere`) VALUES
(1, 'Web Master'),
(2, 'Finance'),
(3, 'Marketing International'),
(4, 'Info/Reseaux');

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

DROP TABLE IF EXISTS `inscrit`;
CREATE TABLE IF NOT EXISTS `inscrit` (
  `idStudent` int(11) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `numInscription` int(11) NOT NULL,
  PRIMARY KEY (`idStudent`,`idFiliere`,`annee`),
  KEY `Inscrit_Filiere0_FK` (`idFiliere`),
  KEY `Inscrit_anneescolaire1_FK` (`annee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscrit`
--

INSERT INTO `inscrit` (`idStudent`, `idFiliere`, `annee`, `numInscription`) VALUES
(1, 4, 2017, 0),
(2, 1, 2018, 0),
(3, 4, 2018, 0),
(4, 1, 2018, 0),
(5, 2, 2018, 0),
(6, 2, 2018, 0),
(7, 1, 2018, 0),
(8, 3, 2018, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ips_on_hold`
--

DROP TABLE IF EXISTS `ips_on_hold`;
CREATE TABLE IF NOT EXISTS `ips_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `login_errors`
--

DROP TABLE IF EXISTS `login_errors`;
CREATE TABLE IF NOT EXISTS `login_errors` (
  `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login_errors`
--

INSERT INTO `login_errors` (`ai`, `username_or_email`, `ip_address`, `time`) VALUES
(43, 'Student0', '::1', '2018-07-31 01:35:49'),
(42, 'Student0', '::1', '2018-07-31 01:35:39');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `idMatiere` int(11) NOT NULL AUTO_INCREMENT,
  `nomMatiere` varchar(100) NOT NULL,
  PRIMARY KEY (`idMatiere`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`idMatiere`, `nomMatiere`) VALUES
(1, 'Anglais'),
(2, 'Culture Gle'),
(3, 'Dev Web'),
(4, 'Logistique'),
(5, 'Marketing Op'),
(6, 'Comptabilité');

-- --------------------------------------------------------

--
-- Structure de la table `notedby`
--

DROP TABLE IF EXISTS `notedby`;
CREATE TABLE IF NOT EXISTS `notedby` (
  `idTeacher` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `note_S1` int(11) NOT NULL,
  `note_S2` int(11) NOT NULL,
  `note_Finale` int(11) NOT NULL,
  PRIMARY KEY (`idTeacher`,`idMatiere`,`idStudent`,`annee`),
  KEY `Notedby_Matiere0_FK` (`idMatiere`),
  KEY `Notedby_Etudiant1_FK` (`idStudent`),
  KEY `Notedby_anneescolaire2_FK` (`annee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notedby`
--

INSERT INTO `notedby` (`idTeacher`, `idMatiere`, `idStudent`, `annee`, `note_S1`, `note_S2`, `note_Finale`) VALUES
(4, 1, 1, 2018, 15, 15, 15);

-- --------------------------------------------------------

--
-- Structure de la table `teach`
--

DROP TABLE IF EXISTS `teach`;
CREATE TABLE IF NOT EXISTS `teach` (
  `idTeacher` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  `nb_heures` int(11) NOT NULL,
  PRIMARY KEY (`idTeacher`,`idMatiere`,`annee`,`idFiliere`),
  KEY `teach_Matiere0_FK` (`idMatiere`),
  KEY `teach_anneescolaire1_FK` (`annee`),
  KEY `teach_Filiere2_FK` (`idFiliere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `teach`
--

INSERT INTO `teach` (`idTeacher`, `idMatiere`, `annee`, `idFiliere`, `nb_heures`) VALUES
(1, 3, 2017, 1, 100),
(1, 3, 2017, 4, 45),
(1, 3, 2018, 1, 70),
(2, 2, 2018, 1, 6),
(2, 2, 2018, 2, 20),
(2, 4, 2018, 2, 9),
(3, 6, 2018, 3, 5),
(4, 1, 2018, 1, 5),
(4, 1, 2018, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `username_or_email_on_hold`
--

DROP TABLE IF EXISTS `username_or_email_on_hold`;
CREATE TABLE IF NOT EXISTS `username_or_email_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) UNSIGNED NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `created_at`, `modified_at`) VALUES
(748279962, 'Teacher0', 'Francois@gm.co', 6, '0', '$2y$11$WMKU.Oy/iulXvmP/QouaX.GNr3xOQsP.Pnvmw5.jLDZa1x/NE1cnu', NULL, NULL, NULL, '2018-07-31 15:11:04', '2018-07-30 12:48:35', '2018-07-31 15:11:04'),
(879489822, 'Student0', 'Hamza@gm.co', 1, '0', '$2y$11$Aqye/e3NAhpnzNaoriwVcukqGyUDhCqPdpJFubMrwNJ4rVBCjwqum', NULL, NULL, NULL, '2018-07-31 15:39:24', '2018-07-31 12:40:38', '2018-07-31 15:39:24'),
(954949785, NULL, 'Mertens@gm.co', 6, '0', '$2y$11$7vWtS3T5S5JENj6UsA6p9uzhMn9jB0leBXnmpJwcAAF09JpWgekF2', NULL, NULL, NULL, '2018-07-31 01:26:11', '2018-07-30 12:48:12', '2018-07-31 01:26:11'),
(1927415761, 'User0', 'User0@example.com', 9, '0', '$2y$11$8ctDNBKk2phPSFNyEcsOY.OZSqeES47E5RobdZVF5XPTJswRLvCYe', NULL, NULL, NULL, '2018-07-31 16:11:00', '2018-07-21 04:39:10', '2018-07-31 16:11:00'),
(2007815847, NULL, 'Ruth@m.co', 6, '0', '$2y$11$7s6RYxeBIbR.dohCoJ7rPuSuTBhdT5KWSlDtfQ8ji4I1NpezjteC2', NULL, NULL, NULL, '2018-07-31 01:20:16', '2018-07-30 12:48:43', '2018-07-31 01:20:16'),
(2147484848, NULL, 'Max@gm.co', 6, '0', '$2y$11$QmqkE1sLFL4F7FYrkpJOouVvUyZGei1w3bMxhuvrIBsjz/Jx.cJfa', NULL, NULL, NULL, '2018-07-31 15:11:38', '2018-07-30 12:48:27', '2018-07-31 15:11:38');

--
-- Déclencheurs `users`
--
DROP TRIGGER IF EXISTS `ca_passwd_trigger`;
DELIMITER $$
CREATE TRIGGER `ca_passwd_trigger` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    IF ((NEW.passwd <=> OLD.passwd) = 0) THEN
        SET NEW.passwd_modified_at = NOW();
    END IF;
END
$$
DELIMITER ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acl`
--
ALTER TABLE `acl`
  ADD CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `acl_actions` (`action_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD CONSTRAINT `acl_actions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `acl_categories` (`category_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comporte`
--
ALTER TABLE `comporte`
  ADD CONSTRAINT `Comporte_Filiere0_FK` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`idFiliere`),
  ADD CONSTRAINT `Comporte_Matiere_FK` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`);

--
-- Contraintes pour la table `inscrit`
--
ALTER TABLE `inscrit`
  ADD CONSTRAINT `Inscrit_Etudiant_FK` FOREIGN KEY (`idStudent`) REFERENCES `etudiant` (`idStudent`),
  ADD CONSTRAINT `Inscrit_Filiere0_FK` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`idFiliere`),
  ADD CONSTRAINT `Inscrit_anneescolaire1_FK` FOREIGN KEY (`annee`) REFERENCES `anneescolaire` (`annee`);

--
-- Contraintes pour la table `notedby`
--
ALTER TABLE `notedby`
  ADD CONSTRAINT `Notedby_Enseignant_FK` FOREIGN KEY (`idTeacher`) REFERENCES `enseignant` (`idTeacher`),
  ADD CONSTRAINT `Notedby_Etudiant1_FK` FOREIGN KEY (`idStudent`) REFERENCES `etudiant` (`idStudent`),
  ADD CONSTRAINT `Notedby_Matiere0_FK` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`),
  ADD CONSTRAINT `Notedby_anneescolaire2_FK` FOREIGN KEY (`annee`) REFERENCES `anneescolaire` (`annee`);

--
-- Contraintes pour la table `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `teach_Enseignant_FK` FOREIGN KEY (`idTeacher`) REFERENCES `enseignant` (`idTeacher`),
  ADD CONSTRAINT `teach_Filiere2_FK` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`idFiliere`),
  ADD CONSTRAINT `teach_Matiere0_FK` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`idMatiere`),
  ADD CONSTRAINT `teach_anneescolaire1_FK` FOREIGN KEY (`annee`) REFERENCES `anneescolaire` (`annee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
