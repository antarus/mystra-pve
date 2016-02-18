-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 18 Février 2016 à 16:46
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mystra_pve`
--
CREATE DATABASE IF NOT EXISTS `mystra_pve` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mystra_pve`;

-- --------------------------------------------------------

--
-- Structure de la table `bosses`
--

CREATE TABLE IF NOT EXISTS `bosses` (
  `idBosses` int(11) NOT NULL COMMENT 'id battlenet',
  `nom` varchar(155) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `vie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBosses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bosses_has_npc`
--

CREATE TABLE IF NOT EXISTS `bosses_has_npc` (
  `idBosses` int(11) NOT NULL,
  `idNpc` int(11) NOT NULL,
  PRIMARY KEY (`idBosses`,`idNpc`),
  KEY `fk_bosses_has_npc_npc1_idx` (`idNpc`),
  KEY `fk_bosses_has_npc_bosses1_idx` (`idBosses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `idClasses` int(11) NOT NULL,
  `couleur` varchar(7) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idClasses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `idEvenements` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dateHeureDebutInvitation` datetime DEFAULT NULL,
  `dateHeureDebutEvenement` datetime DEFAULT NULL,
  `dateHeureFinInscription` datetime NOT NULL,
  `lvlMin` mediumint(9) DEFAULT NULL,
  `ouvertATous` tinyint(1) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL,
  `idDonjon` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idGuildes` int(11) DEFAULT NULL,
  `idRoster` int(11) DEFAULT NULL,
  `idEvenements_template` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEvenements`),
  KEY `fk_evenements_donjon1_idx` (`idDonjon`),
  KEY `fk_evenements_users1_idx` (`idUsers`),
  KEY `fk_evenements_guildes1_idx` (`idGuildes`),
  KEY `fk_evenements_roster1_idx` (`idRoster`),
  KEY `fk_evenements_evenements_template1_idx` (`idEvenements_template`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `evenements_personnage`
--

CREATE TABLE IF NOT EXISTS `evenements_personnage` (
  `idEvenement_personnage` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL COMMENT 'abs\nvalide\nconfirme\npresent',
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL,
  `idEvenements` int(11) NOT NULL,
  `idPersonnage` int(11) NOT NULL,
  PRIMARY KEY (`idEvenement_personnage`),
  KEY `fk_evenement_personnage_evenements1_idx` (`idEvenements`),
  KEY `fk_evenement_personnage_personnage1_idx` (`idPersonnage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `evenements_roles`
--

CREATE TABLE IF NOT EXISTS `evenements_roles` (
  `idEvenements_roles` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` mediumint(9) DEFAULT NULL,
  `ordre` mediumint(9) DEFAULT NULL,
  `idEvenements` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idEvenements_roles`),
  KEY `fk_evenements_roles_evenements1_idx` (`idEvenements`),
  KEY `fk_evenements_roles_role1_idx` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `evenements_template`
--

CREATE TABLE IF NOT EXISTS `evenements_template` (
  `idEvenements_template` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dateHeureDebutInvitation` datetime DEFAULT NULL,
  `dateHeureDebutEvenement` datetime DEFAULT NULL,
  `dateHeureFinInscription` datetime NOT NULL,
  `lvlMin` mediumint(9) DEFAULT NULL,
  `ouvertATous` tinyint(1) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL,
  `idDonjon` int(11) NOT NULL,
  `idGuildes` int(11) DEFAULT NULL,
  `idRoster` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEvenements_template`),
  KEY `fk_evenements_donjon1_idx` (`idDonjon`),
  KEY `fk_evenements_template_guildes1_idx` (`idGuildes`),
  KEY `fk_evenements_template_roster1_idx` (`idRoster`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `evenements_template_roles`
--

CREATE TABLE IF NOT EXISTS `evenements_template_roles` (
  `idEvenements_template_roles` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` mediumint(9) DEFAULT NULL,
  `ordre` mediumint(9) DEFAULT NULL,
  `idEvenements_template` int(11) NOT NULL,
  `idRoles` int(11) NOT NULL,
  PRIMARY KEY (`idEvenements_template_roles`),
  KEY `fk_evenements_template_roles_evenements_template1_idx` (`idEvenements_template`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `faction`
--

CREATE TABLE IF NOT EXISTS `faction` (
  `idFaction` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idFaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `guildes`
--

CREATE TABLE IF NOT EXISTS `guildes` (
  `idGuildes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `serveur` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idGuildes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `idItem` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ajouterPar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `majPar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `idItemJeu` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `couleur` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `item_personnage_raid`
--

CREATE TABLE IF NOT EXISTS `item_personnage_raid` (
  `idItemRaidPersonnage` int(11) NOT NULL AUTO_INCREMENT,
  `idRaid` mediumint(8) NOT NULL,
  `idItem` int(10) NOT NULL,
  `idPersonnage` int(11) NOT NULL,
  `valeur` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`idItemRaidPersonnage`),
  KEY `fk_item_personnage_raid_raids1_idx` (`idRaid`),
  KEY `fk_item_personnage_raid_items1_idx` (`idItem`),
  KEY `fk_item_personnage_raid_personnages1_idx` (`idPersonnage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mode_difficulte`
--

CREATE TABLE IF NOT EXISTS `mode_difficulte` (
  `idMode` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `nom_bnet` varchar(100) DEFAULT NULL COMMENT 'nom battle net',
  PRIMARY KEY (`idMode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `npc`
--

CREATE TABLE IF NOT EXISTS `npc` (
  `idNpc` int(11) NOT NULL COMMENT 'id battlenet',
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idNpc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE IF NOT EXISTS `personnages` (
  `idPersonnage` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `niveau` mediumint(9) DEFAULT NULL,
  `idUsers` int(11) DEFAULT NULL,
  `idJeux` int(11) NOT NULL,
  `idFaction` int(11) NOT NULL,
  `idClasses` int(11) NOT NULL,
  `idRace` int(11) NOT NULL,
  `idGuildes` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonnage`),
  KEY `fk_personnage_users1_idx` (`idUsers`),
  KEY `fk_personnage_guildes1_idx` (`idGuildes`),
  KEY `fk_personnages_faction1_idx` (`idFaction`),
  KEY `fk_personnages_classes1_idx` (`idClasses`),
  KEY `fk_personnages_race1_idx` (`idRace`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `personnages_has_specialisation`
--

CREATE TABLE IF NOT EXISTS `personnages_has_specialisation` (
  `specialisation_idSpecialisation` int(11) NOT NULL,
  `personnages_idPersonnage` int(11) NOT NULL,
  `isPrincipal` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`specialisation_idSpecialisation`,`personnages_idPersonnage`),
  KEY `fk_specialisation_has_personnages_personnages1_idx` (`personnages_idPersonnage`),
  KEY `fk_specialisation_has_personnages_specialisation1_idx` (`specialisation_idSpecialisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `idRace` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idRace`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `raids`
--

CREATE TABLE IF NOT EXISTS `raids` (
  `idRaid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `idEvenements` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_bin,
  `valeur` float(6,2) DEFAULT '0.00',
  `ajoutePar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `majPar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idRaid`),
  KEY `fk_raids_evenements1_idx` (`idEvenements`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `raid_personnage`
--

CREATE TABLE IF NOT EXISTS `raid_personnage` (
  `idRaid` mediumint(8) NOT NULL,
  `idPersonnage` int(11) NOT NULL,
  PRIMARY KEY (`idRaid`,`idPersonnage`),
  KEY `fk_raid_personnage_raids1_idx` (`idRaid`),
  KEY `fk_raid_personnage_personnages1_idx` (`idPersonnage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int(11) NOT NULL,
  `nom` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `idRoster` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idRoster`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `roster_has_personnage`
--

CREATE TABLE IF NOT EXISTS `roster_has_personnage` (
  `idRoster` int(11) NOT NULL,
  `idPersonnage` int(11) NOT NULL,
  PRIMARY KEY (`idRoster`,`idPersonnage`),
  KEY `fk_roster_has_personnage_personnage1_idx` (`idPersonnage`),
  KEY `fk_roster_has_personnage_roster1_idx` (`idRoster`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `specialisation`
--

CREATE TABLE IF NOT EXISTS `specialisation` (
  `idSpecialisation` int(11) NOT NULL,
  `idClasses` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idSpecialisation`),
  KEY `fk_specialisation_classes1_idx` (`idClasses`),
  KEY `fk_specialisation_role1_idx` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pwd` varchar(150) NOT NULL,
  `pseudo` varchar(150) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `forgetPass` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `idZone` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id battlenet',
  `nom` varchar(255) NOT NULL,
  `lvlMin` mediumint(9) DEFAULT NULL,
  `tailleMin` mediumint(9) DEFAULT NULL,
  `tailleMax` mediumint(9) DEFAULT NULL,
  `patch` varchar(45) DEFAULT NULL,
  `lvlMax` mediumint(9) DEFAULT NULL,
  `isDonjon` tinyint(1) DEFAULT NULL,
  `isRaid` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idZone`),
  UNIQUE KEY `nom_UNIQUE` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `zone_has_bosses`
--

CREATE TABLE IF NOT EXISTS `zone_has_bosses` (
  `idZone` int(11) NOT NULL,
  `idBosses` int(11) NOT NULL,
  PRIMARY KEY (`idZone`,`idBosses`),
  KEY `fk_zone_has_bosses_bosses1_idx` (`idBosses`),
  KEY `fk_zone_has_bosses_zone1_idx` (`idZone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `zone_has_mode_diffculte`
--

CREATE TABLE IF NOT EXISTS `zone_has_mode_diffculte` (
  `idZone` int(11) NOT NULL,
  `idMode` int(11) NOT NULL,
  PRIMARY KEY (`idZone`,`idMode`),
  KEY `fk_mode_difficulte_has_zone_zone1_idx` (`idZone`),
  KEY `fk_mode_difficulte_has_zone_mode_difficulte1_idx` (`idMode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bosses_has_npc`
--
ALTER TABLE `bosses_has_npc`
  ADD CONSTRAINT `fk_bosses_has_npc_bosses1` FOREIGN KEY (`idBosses`) REFERENCES `bosses` (`idBosses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bosses_has_npc_npc1` FOREIGN KEY (`idNpc`) REFERENCES `npc` (`idNpc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `fk_evenements_donjon1` FOREIGN KEY (`idDonjon`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_evenements_template1` FOREIGN KEY (`idEvenements_template`) REFERENCES `evenements_template` (`idEvenements_template`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_users1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenements_personnage`
--
ALTER TABLE `evenements_personnage`
  ADD CONSTRAINT `fk_evenement_personnage_evenements1` FOREIGN KEY (`idEvenements`) REFERENCES `evenements` (`idEvenements`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_personnage_personnage1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenements_roles`
--
ALTER TABLE `evenements_roles`
  ADD CONSTRAINT `fk_evenements_roles_role1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_roles_evenements1` FOREIGN KEY (`idEvenements`) REFERENCES `evenements` (`idEvenements`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenements_template`
--
ALTER TABLE `evenements_template`
  ADD CONSTRAINT `fk_evenements_donjon10` FOREIGN KEY (`idDonjon`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_template_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_template_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenements_template_roles`
--
ALTER TABLE `evenements_template_roles`
  ADD CONSTRAINT `fk_evenements_template_roles_evenements_template1` FOREIGN KEY (`idEvenements_template`) REFERENCES `evenements_template` (`idEvenements_template`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `item_personnage_raid`
--
ALTER TABLE `item_personnage_raid`
  ADD CONSTRAINT `fk_item_personnage_raid_items1` FOREIGN KEY (`idItem`) REFERENCES `items` (`idItem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_personnages1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_raids1` FOREIGN KEY (`idRaid`) REFERENCES `raids` (`idRaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD CONSTRAINT `fk_personnage_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnage_users1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_classes1` FOREIGN KEY (`idClasses`) REFERENCES `classes` (`idClasses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_faction1` FOREIGN KEY (`idFaction`) REFERENCES `faction` (`idFaction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_race1` FOREIGN KEY (`idRace`) REFERENCES `race` (`idRace`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `personnages_has_specialisation`
--
ALTER TABLE `personnages_has_specialisation`
  ADD CONSTRAINT `fk_specialisation_has_personnages_personnages1` FOREIGN KEY (`personnages_idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_specialisation_has_personnages_specialisation1` FOREIGN KEY (`specialisation_idSpecialisation`) REFERENCES `specialisation` (`idSpecialisation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `raids`
--
ALTER TABLE `raids`
  ADD CONSTRAINT `fk_raids_evenements1` FOREIGN KEY (`idEvenements`) REFERENCES `evenements` (`idEvenements`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `raid_personnage`
--
ALTER TABLE `raid_personnage`
  ADD CONSTRAINT `fk_raid_personnage_personnages1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raid_personnage_raids1` FOREIGN KEY (`idRaid`) REFERENCES `raids` (`idRaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `roster_has_personnage`
--
ALTER TABLE `roster_has_personnage`
  ADD CONSTRAINT `fk_roster_has_personnage_personnage1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_has_personnage_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `specialisation`
--
ALTER TABLE `specialisation`
  ADD CONSTRAINT `fk_specialisation_classes1` FOREIGN KEY (`idClasses`) REFERENCES `classes` (`idClasses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_specialisation_role1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `zone_has_bosses`
--
ALTER TABLE `zone_has_bosses`
  ADD CONSTRAINT `fk_zone_has_bosses_zone1` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zone_has_bosses_bosses1` FOREIGN KEY (`idBosses`) REFERENCES `bosses` (`idBosses`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `zone_has_mode_diffculte`
--
ALTER TABLE `zone_has_mode_diffculte`
  ADD CONSTRAINT `fk_mode_difficulte_has_zone_mode_difficulte1` FOREIGN KEY (`idMode`) REFERENCES `mode_difficulte` (`idMode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mode_difficulte_has_zone_zone1` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
