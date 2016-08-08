-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 21 Février 2016 à 00:28
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

-- --------------------------------------------------------

--
-- Structure de la table `bosses`
--

CREATE TABLE IF NOT EXISTS `bosses` (
  `idBosses` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id battlenet',
  `nom` varchar(155) NOT NULL,
  `level` int(11) NOT NULL,
  `vie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBosses`),
  UNIQUE KEY `nom_UNIQUE` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93069 ;

--
-- Contenu de la table `bosses`
--

INSERT INTO `bosses` (`idBosses`, `nom`, `level`, `vie`) VALUES
(89890, 'Gangreseigneur Zakuun', 103, 43331200),
(90199, 'Fielsang', 103, 62396928),
(90269, 'Velhari la Despote', 103, 61002424),
(90284, 'Saccageur de Fer', 103, 42247920),
(90296, 'Socrethar l’Éternel', 103, 17900120),
(90316, 'Seigneur de l’ombre Iskar', 103, 45497760),
(90378, 'Kilrogg Oeil-Mort', 103, 57197184),
(90435, 'Kormrok', 103, 31198464),
(91331, 'Archimonde', 103, 68149144),
(91349, 'Mannoroth', 103, 64281836),
(92146, 'Haut conseil des Flammes infernales', 103, 17931318),
(93023, 'Assaut des Flammes infernales', 103, 7582960),
(93068, 'Xhul’horac', 103, 58497120);

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

--
-- Contenu de la table `bosses_has_npc`
--

INSERT INTO `bosses_has_npc` (`idBosses`, `idNpc`) VALUES
(89890, 89890),
(93023, 90018),
(90199, 90199),
(90269, 90269),
(90284, 90284),
(90296, 90296),
(90316, 90316),
(90378, 90378),
(90435, 90435),
(91331, 91331),
(91349, 91349),
(92146, 92142),
(92146, 92144),
(92146, 92146),
(93023, 93023),
(93068, 93068);

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `idClasses` int(11) NOT NULL AUTO_INCREMENT,
  `couleur` varchar(7) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idClasses`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`idClasses`, `couleur`, `nom`, `icon`) VALUES
(1, '#C69B6D', 'Guerrier', ''),
(2, '#F48CBA', 'Paladin', NULL),
(3, '#AAD372', 'Chasseur', NULL),
(4, '#FFF468', 'Voleur', NULL),
(5, '#AAAAAA', 'Prêtre', NULL),
(6, '#C41E3B', 'Chevalier de la mort', NULL),
(7, '#2359FF', 'Chaman', NULL),
(8, '#68CCEF', 'Mage', NULL),
(9, '#9382C9', 'Démoniste', NULL),
(10, '#008467', 'Moine', NULL),
(11, '#FF7C0A', 'Druide', NULL);

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
  `nombre` mediumint(9) NOT NULL,
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
  `idFaction` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idFaction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `faction`
--

INSERT INTO `faction` (`idFaction`, `nom`, `logo`) VALUES
(0, 'Alliance', NULL),
(1, 'Horde', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `guildes`
--

CREATE TABLE IF NOT EXISTS `guildes` (
  `idGuildes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `serveur` varchar(150) NOT NULL,
  `niveau` mediumint(9) DEFAULT NULL,
  `miniature` varchar(100) DEFAULT NULL,
  `idFaction` int(11) NOT NULL,
  PRIMARY KEY (`idGuildes`),
  KEY `fk_guildes_faction1_idx` (`idFaction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `guildes`
--

INSERT INTO `guildes` (`idGuildes`, `nom`, `serveur`, `niveau`, `miniature`, `idFaction`) VALUES
(18, 'Mystra', 'Garona', 25, '', 0);

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
  `idMode` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `nom_bnet` varchar(100) DEFAULT NULL COMMENT 'nom battle net',
  PRIMARY KEY (`idMode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `mode_difficulte`
--

INSERT INTO `mode_difficulte` (`idMode`, `nom`, `nom_bnet`) VALUES
(1, 'Raid LFR', 'RAID_FLEX_LFR'),
(2, 'Raid NM', 'RAID_FLEX_NORMAL'),
(3, 'Raid HM', 'RAID_FLEX_HEROIC'),
(4, 'Raid MM', 'RAID_MYTHIC'),
(5, 'Donjon NM', 'DUNGEON_NORMAL'),
(6, 'Donjon HM', 'DUNGEON_HEROIC'),
(7, 'Donjon MM', 'DUNGEON_MYTHIC');

-- --------------------------------------------------------

--
-- Structure de la table `npc`
--

CREATE TABLE IF NOT EXISTS `npc` (
  `idNpc` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id battlenet',
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idNpc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93069 ;

--
-- Contenu de la table `npc`
--

INSERT INTO `npc` (`idNpc`, `nom`) VALUES
(89890, 'Gangreseigneur Zakuun'),
(90018, 'Canon des Flammes infernales'),
(90199, 'Fielsang'),
(90269, 'Velhari la Despote'),
(90284, 'Saccageur de Fer'),
(90296, 'Assemblage spirituel'),
(90316, 'Seigneur de l’ombre Iskar'),
(90378, 'Kilrogg Oeil-Mort'),
(90435, 'Kormrok'),
(91331, 'Archimonde'),
(91349, 'Mannoroth'),
(92142, 'Maître-lame Jubei’thos'),
(92144, 'Dia Sombre-Murmure'),
(92146, 'Gurtogg Fièvresang'),
(93023, 'Maître de siège Mar’tak'),
(93068, 'Xhul’horac');

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE IF NOT EXISTS `personnages` (
  `idPersonnage` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `niveau` mediumint(9) NOT NULL,
  `genre` tinyint(1) DEFAULT NULL COMMENT 'id battlenet\n1 femme\n0 homme',
  `miniature` varchar(100) DEFAULT NULL,
  `royaume` varchar(100) DEFAULT NULL,
  `idFaction` int(11) NOT NULL,
  `idClasses` int(11) NOT NULL,
  `idRace` int(11) NOT NULL,
  `idGuildes` int(11) DEFAULT NULL,
  `idUsers` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonnage`),
  KEY `fk_personnage_users1_idx` (`idUsers`),
  KEY `fk_personnage_guildes1_idx` (`idGuildes`),
  KEY `fk_personnages_faction1_idx` (`idFaction`),
  KEY `fk_personnages_classes1_idx` (`idClasses`),
  KEY `fk_personnages_race1_idx` (`idRace`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=313 ;

--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`idPersonnage`, `nom`, `niveau`, `genre`, `miniature`, `royaume`, `idFaction`, `idClasses`, `idRace`, `idGuildes`, `idUsers`) VALUES
(18, 'Océannia', 100, 1, 'garona/104/1813864-avatar.jpg', 'Garona', 0, 1, 4, 18, NULL),
(19, 'Xiaøyøu', 100, 1, 'garona/5/1838085-avatar.jpg', 'Garona', 0, 3, 1, 18, NULL),
(20, 'Matéus', 100, 0, 'garona/121/1859705-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(21, 'Zatoichy', 100, 0, 'garona/104/2021992-avatar.jpg', 'Garona', 0, 5, 4, 18, NULL),
(22, 'Macewindou', 100, 0, 'garona/200/2185928-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(23, 'Mordrède', 100, 0, 'garona/30/2636318-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(24, 'Yarixa', 100, 1, 'garona/70/2711622-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(25, 'Prony', 100, 0, 'garona/83/2803795-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(26, 'Irisia', 100, 1, 'garona/26/5482266-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(27, 'Kerimaa', 100, 1, 'garona/125/5767549-avatar.jpg', 'Garona', 0, 3, 11, 18, NULL),
(28, 'Capikaze', 100, 0, 'garona/170/9321898-avatar.jpg', 'Garona', 0, 1, 11, 18, NULL),
(29, 'Sadday', 100, 1, 'garona/46/9553198-avatar.jpg', 'Garona', 0, 5, 1, 18, NULL),
(30, 'Falinns', 100, 0, 'garona/234/9607402-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(31, 'Myna', 100, 1, 'garona/161/9657249-avatar.jpg', 'Garona', 0, 8, 1, 18, NULL),
(32, 'Reve', 100, 1, 'garona/148/9673876-avatar.jpg', 'Garona', 0, 9, 7, 18, NULL),
(33, 'Cely', 100, 1, 'garona/113/9790833-avatar.jpg', 'Garona', 0, 8, 1, 18, NULL),
(34, 'Alandrys', 100, 0, 'garona/58/9801530-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(35, 'Parlama', 100, 1, 'garona/143/10635151-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(36, 'Acronomicon', 100, 0, 'garona/76/12192588-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(37, 'Lhilhi', 100, 1, 'garona/209/12288465-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(38, 'Arthyss', 100, 0, 'garona/109/12343149-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(39, 'Apisto', 100, 0, 'garona/199/12419527-avatar.jpg', 'Garona', 0, 1, 4, 18, NULL),
(40, 'Karabistouil', 100, 1, 'garona/66/13559106-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(41, 'Ptitepoucett', 100, 1, 'garona/237/13613805-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(42, 'Healsangel', 100, 1, 'garona/226/14281954-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(43, 'Nisya', 100, 1, 'garona/34/15257378-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(44, 'Kaarapital', 100, 1, 'garona/134/16132486-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(45, 'Poupoucetire', 100, 1, 'garona/234/16132842-avatar.jpg', 'Garona', 0, 3, 11, 18, NULL),
(46, 'Arcalyne', 100, 1, 'garona/244/17042164-avatar.jpg', 'Garona', 0, 8, 1, 18, NULL),
(47, 'Kaarabine', 100, 1, 'garona/170/17945514-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(48, 'Lisys', 100, 1, 'garona/178/18159538-avatar.jpg', 'Garona', 0, 5, 1, 18, NULL),
(49, 'Nostalgie', 100, 1, 'garona/25/19346713-avatar.jpg', 'Garona', 0, 5, 11, 18, NULL),
(50, 'Rurú', 100, 1, 'garona/200/19821000-avatar.jpg', 'Garona', 0, 8, 1, 18, NULL),
(51, 'Antarus', 100, 0, 'garona/146/21289874-avatar.jpg', 'Garona', 0, 5, 4, 18, NULL),
(52, 'Darckarthas', 100, 1, 'garona/75/23690059-avatar.jpg', 'Garona', 0, 6, 1, 18, NULL),
(53, 'Karalich', 100, 1, 'garona/26/23697690-avatar.jpg', 'Garona', 0, 6, 4, 18, NULL),
(54, 'Poulich', 100, 1, 'garona/109/23709549-avatar.jpg', 'Garona', 0, 6, 1, 18, NULL),
(55, 'Prozzak', 100, 0, 'garona/42/26734122-avatar.jpg', 'Garona', 0, 5, 3, 18, NULL),
(56, 'Bigbeer', 100, 0, 'garona/255/28860159-avatar.jpg', 'Garona', 0, 3, 3, 18, NULL),
(57, 'Redoot', 100, 1, 'garona/254/29159934-avatar.jpg', 'Garona', 0, 6, 1, 18, NULL),
(58, 'Byluna', 100, 1, 'garona/220/29529308-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(59, 'Zängetsü', 100, 1, 'garona/103/30505063-avatar.jpg', 'Garona', 0, 5, 3, 18, NULL),
(60, 'Plateùs', 100, 0, 'garona/10/30977034-avatar.jpg', 'Garona', 0, 2, 11, 18, NULL),
(61, 'Dooc', 100, 1, 'garona/2/33189122-avatar.jpg', 'Garona', 0, 5, 1, 18, NULL),
(62, 'Lylybelle', 100, 1, 'garona/99/34321507-avatar.jpg', 'Garona', 0, 6, 1, 18, NULL),
(63, 'Tÿra', 100, 0, 'garona/57/35029305-avatar.jpg', 'Garona', 0, 6, 1, 18, NULL),
(64, 'Xcalibur', 100, 0, 'garona/24/35030552-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(65, 'Auron', 100, 0, 'garona/61/35204669-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(66, 'Harigston', 100, 1, 'garona/119/37148279-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(67, 'Aeoline', 100, 1, 'garona/61/37618237-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(68, 'Bachantes', 100, 0, 'garona/49/39400497-avatar.jpg', 'Garona', 0, 1, 3, 18, NULL),
(69, 'Cavalerie', 100, 0, 'garona/88/39615576-avatar.jpg', 'Garona', 0, 1, 3, 18, NULL),
(70, 'Capï', 100, 0, 'garona/40/40891944-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(71, 'Pléco', 100, 1, 'garona/225/40947937-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(72, 'Dootty', 100, 1, 'garona/247/43145207-avatar.jpg', 'Garona', 0, 3, 1, 18, NULL),
(73, 'Laugan', 100, 0, 'garona/23/45220631-avatar.jpg', 'Garona', 0, 5, 3, 18, NULL),
(74, 'Ptitelouve', 100, 1, 'garona/123/45595259-avatar.jpg', 'Garona', 0, 4, 22, 18, NULL),
(75, 'Talisia', 100, 1, 'garona/12/46258956-avatar.jpg', 'Garona', 0, 8, 7, 18, NULL),
(76, 'Boromîr', 100, 0, 'garona/37/46650149-avatar.jpg', 'Garona', 0, 7, 3, 18, NULL),
(77, 'Kalamïty', 100, 1, 'garona/195/48465859-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(78, 'Aelyne', 100, 1, 'garona/116/48794484-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(79, 'Félicias', 100, 1, 'garona/137/49561225-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(80, 'Yla', 100, 0, 'garona/113/49757297-avatar.jpg', 'Garona', 0, 2, 3, 18, NULL),
(81, 'Iriséa', 100, 1, 'garona/60/49766972-avatar.jpg', 'Garona', 0, 8, 4, 18, NULL),
(82, 'Rapiou', 100, 0, 'garona/76/50125388-avatar.jpg', 'Garona', 0, 4, 22, 18, NULL),
(83, 'Thusùxx', 100, 0, 'garona/97/50817121-avatar.jpg', 'Garona', 0, 11, 22, 18, NULL),
(84, 'Cartam', 100, 0, 'garona/135/50938503-avatar.jpg', 'Garona', 0, 1, 1, 18, NULL),
(85, 'Mâjuscule', 100, 1, 'garona/85/51698517-avatar.jpg', 'Garona', 0, 8, 11, 18, NULL),
(86, 'Cartmân', 100, 0, 'garona/100/51740004-avatar.jpg', 'Garona', 0, 6, 1, 18, NULL),
(87, 'Alicette', 100, 1, 'garona/71/52426823-avatar.jpg', 'Garona', 0, 5, 1, 18, NULL),
(88, 'Deathinition', 100, 0, 'garona/206/52678862-avatar.jpg', 'Garona', 0, 6, 11, 18, NULL),
(89, 'Cartmän', 100, 0, 'garona/102/53301094-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(90, 'Gøuma', 100, 0, 'garona/116/54341236-avatar.jpg', 'Garona', 0, 8, 3, 18, NULL),
(91, 'Gøuminette', 100, 1, 'garona/120/54341240-avatar.jpg', 'Garona', 0, 7, 3, 18, NULL),
(92, 'Sømetimes', 100, 1, 'garona/74/54789706-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(93, 'Odreth', 100, 0, 'garona/231/55060199-avatar.jpg', 'Garona', 0, 2, 11, 18, NULL),
(94, 'Nydelia', 100, 1, 'garona/51/55169843-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(95, 'Valyanas', 100, 1, 'garona/30/55325214-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(96, 'Lønï', 100, 1, 'garona/254/55326462-avatar.jpg', 'Garona', 0, 8, 7, 18, NULL),
(97, 'Rylia', 100, 1, 'garona/83/55557203-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(98, 'Oriane', 100, 1, 'garona/205/55836621-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(99, 'Swanya', 100, 1, 'garona/7/56419335-avatar.jpg', 'Garona', 0, 3, 22, 18, NULL),
(100, 'Zazagentil', 100, 0, 'garona/46/56717358-avatar.jpg', 'Garona', 0, 5, 7, 18, NULL),
(101, 'Nayka', 100, 1, 'garona/75/56993099-avatar.jpg', 'Garona', 0, 3, 1, 18, NULL),
(102, 'Galiowyn', 100, 0, 'garona/12/57240076-avatar.jpg', 'Garona', 0, 11, 22, 18, NULL),
(103, 'Smado', 100, 0, 'garona/114/57897330-avatar.jpg', 'Garona', 0, 10, 7, 18, NULL),
(104, 'Yanarbo', 100, 0, 'garona/147/58810259-avatar.jpg', 'Garona', 0, 5, 7, 18, NULL),
(105, 'Coonta', 100, 1, 'garona/127/59596159-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(106, 'Kâlia', 100, 1, 'garona/223/59663071-avatar.jpg', 'Garona', 0, 10, 25, 18, NULL),
(107, 'Jesuisblonde', 100, 1, 'garona/179/59805875-avatar.jpg', 'Garona', 0, 4, 1, 18, NULL),
(108, 'Jorèl', 100, 0, 'garona/37/59880485-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(109, 'Olaf', 100, 0, 'garona/235/59918571-avatar.jpg', 'Garona', 0, 6, 3, 18, NULL),
(110, 'Aygul', 100, 1, 'garona/229/59934181-avatar.jpg', 'Garona', 0, 3, 1, 18, NULL),
(111, 'Thynael', 100, 1, 'garona/112/60011888-avatar.jpg', 'Garona', 0, 6, 22, 18, NULL),
(112, 'Drethz', 100, 0, 'garona/61/60030013-avatar.jpg', 'Garona', 0, 1, 1, 18, NULL),
(113, 'Amnésiâ', 100, 1, 'garona/24/60044568-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(114, 'Aryaa', 100, 1, 'garona/119/60073847-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(115, 'Kâdyll', 100, 1, 'garona/244/60942836-avatar.jpg', 'Garona', 0, 3, 1, 18, NULL),
(116, 'Sysuka', 100, 1, 'garona/198/61132486-avatar.jpg', 'Garona', 0, 4, 1, 18, NULL),
(117, 'Kàdyll', 100, 1, 'garona/85/61138261-avatar.jpg', 'Garona', 0, 5, 1, 18, NULL),
(118, 'Arfananwel', 100, 0, 'garona/130/61251714-avatar.jpg', 'Garona', 0, 3, 1, 18, NULL),
(119, 'Ivøri', 100, 1, 'garona/232/61292008-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(120, 'Deathss', 100, 0, 'garona/187/61502395-avatar.jpg', 'Garona', 0, 6, 22, 18, NULL),
(121, 'Angelÿn', 100, 1, 'garona/15/61609999-avatar.jpg', 'Garona', 0, 8, 25, 18, NULL),
(122, 'Creek', 100, 1, 'garona/82/61781586-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(123, 'Yoshino', 100, 1, 'garona/60/61798972-avatar.jpg', 'Garona', 0, 1, 4, 18, NULL),
(124, 'Yukinø', 100, 1, 'garona/69/61798981-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(125, 'Baêlle', 100, 1, 'garona/214/62194646-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(126, 'Suyon', 100, 1, 'garona/141/62668429-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(127, 'Yukïno', 100, 1, 'garona/164/62752932-avatar.jpg', 'Garona', 0, 6, 11, 18, NULL),
(128, 'Samisa', 100, 1, 'garona/43/62753835-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(129, 'Jisun', 100, 1, 'garona/42/63894058-avatar.jpg', 'Garona', 0, 3, 1, 18, NULL),
(130, 'Ayumu', 100, 1, 'garona/202/63920074-avatar.jpg', 'Garona', 0, 2, 11, 18, NULL),
(131, 'Jevi', 100, 0, 'garona/188/64233916-avatar.jpg', 'Garona', 0, 1, 4, 18, NULL),
(132, 'Mickie', 100, 1, 'garona/119/65614711-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(133, 'Minji', 100, 1, 'garona/115/65681011-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(134, 'Björka', 100, 1, 'garona/139/65899403-avatar.jpg', 'Ner''zhul', 0, 3, 11, 18, NULL),
(135, 'Décapsuleuse', 100, 1, 'garona/3/66000131-avatar.jpg', 'Ner''zhul', 0, 6, 4, 18, NULL),
(136, 'Emac', 100, 1, 'garona/218/66211802-avatar.jpg', 'Ner''zhul', 0, 1, 22, 18, NULL),
(137, 'Dìgg', 100, 0, 'garona/173/66213549-avatar.jpg', 'Ner''zhul', 0, 8, 11, 18, NULL),
(138, 'Wumbat', 100, 0, 'garona/180/66235060-avatar.jpg', 'Ner''zhul', 0, 11, 22, 18, NULL),
(139, 'Lnaudru', 100, 1, 'garona/232/66251496-avatar.jpg', 'Ner''zhul', 0, 11, 22, 18, NULL),
(140, 'Alwynn', 100, 0, 'garona/253/66481661-avatar.jpg', 'Garona', 0, 5, 4, 18, NULL),
(141, 'Baldar', 100, 0, 'garona/61/66540093-avatar.jpg', 'Ner''zhul', 0, 2, 1, 18, NULL),
(142, 'Xylomi', 100, 1, 'garona/185/66549177-avatar.jpg', 'Ner''zhul', 0, 7, 11, 18, NULL),
(143, 'Bellame', 100, 1, 'garona/86/67268182-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(144, 'Karacast', 100, 1, 'garona/89/67511385-avatar.jpg', 'Garona', 0, 9, 7, 18, NULL),
(145, 'Kaara', 100, 1, 'garona/152/67514776-avatar.jpg', 'Garona', 0, 8, 7, 18, NULL),
(146, 'Cøcalight', 100, 1, 'garona/69/67702597-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(147, 'Karaoutai', 100, 1, 'garona/10/67769098-avatar.jpg', 'Garona', 0, 5, 7, 18, NULL),
(148, 'Zygore', 100, 0, 'garona/94/67822686-avatar.jpg', 'Garona', 0, 1, 1, 18, NULL),
(149, 'Jiwon', 100, 1, 'garona/83/68678739-avatar.jpg', 'Garona', 0, 6, 4, 18, NULL),
(150, 'Okarin', 100, 0, 'garona/37/69615909-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(151, 'Mûrmûr', 100, 1, 'garona/95/69866079-avatar.jpg', 'Garona', 0, 9, 22, 18, NULL),
(152, 'Cøcazerø', 100, 0, 'garona/86/70524502-avatar.jpg', 'Garona', 0, 1, 1, 18, NULL),
(153, 'Kadyl', 100, 1, 'garona/31/71591199-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(154, 'Mizutani', 100, 1, 'garona/21/72120085-avatar.jpg', 'Garona', 0, 10, 1, 18, NULL),
(155, 'Jevo', 100, 0, 'garona/124/73588092-avatar.jpg', 'Garona', 0, 8, 7, 18, NULL),
(156, 'Yùkinà', 100, 1, 'garona/1/73646593-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(157, 'Hayes', 100, 1, 'garona/99/73668963-avatar.jpg', 'Garona', 0, 6, 1, 18, NULL),
(158, 'Timelord', 100, 0, 'garona/53/73684021-avatar.jpg', 'Ner''zhul', 0, 1, 4, 18, NULL),
(159, 'Niylla', 100, 1, 'garona/133/73691781-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(160, 'Tîmelord', 100, 0, 'garona/38/73722406-avatar.jpg', 'Ner''zhul', 0, 3, 4, 18, NULL),
(161, 'Yùkinø', 100, 1, 'garona/144/73912720-avatar.jpg', 'Garona', 0, 5, 1, 18, NULL),
(162, 'Antaruss', 100, 1, 'garona/10/74018058-avatar.jpg', 'Garona', 0, 10, 1, 18, NULL),
(163, 'Christange', 100, 1, 'garona/87/74051159-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(164, 'Oa', 100, 1, 'garona/16/74172688-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(165, 'Demnìa', 100, 1, 'garona/175/74188463-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(166, 'Hookx', 100, 0, 'garona/65/74299457-avatar.jpg', 'Garona', 0, 7, 3, 18, NULL),
(167, 'Lenøre', 100, 1, 'garona/130/74374274-avatar.jpg', 'Garona', 0, 3, 1, 18, NULL),
(168, 'Bloodynight', 100, 1, 'garona/213/74478293-avatar.jpg', 'Garona', 0, 2, 11, 18, NULL),
(169, 'Lishaoran', 100, 0, 'garona/128/75897728-avatar.jpg', 'Garona', 0, 2, 11, 18, NULL),
(170, 'Zantell', 100, 1, 'garona/147/75911571-avatar.jpg', 'Garona', 0, 1, 4, 18, NULL),
(171, 'Benjiwars', 100, 0, 'garona/232/75921640-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(172, 'Kashyk', 100, 1, 'garona/172/75924396-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(173, 'Jevy', 100, 0, 'garona/192/78349504-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(174, 'Nosfia', 100, 1, 'garona/196/78395588-avatar.jpg', 'Garona', 0, 1, 25, 18, NULL),
(175, 'Nêgêlâs', 100, 0, 'garona/138/84327818-avatar.jpg', 'Ner''zhul', 0, 6, 4, 18, NULL),
(176, 'Miks', 100, 1, 'garona/106/89038442-avatar.jpg', 'Sargeras', 0, 9, 1, 18, NULL),
(177, 'Dogua', 100, 0, 'garona/166/89086886-avatar.jpg', 'Sargeras', 0, 9, 1, 18, NULL),
(178, 'Ildriar', 100, 0, 'garona/166/89091494-avatar.jpg', 'Sargeras', 0, 2, 1, 18, NULL),
(179, 'Azalaïs', 100, 1, 'garona/66/89184834-avatar.jpg', 'Sargeras', 0, 5, 4, 18, NULL),
(180, 'Drahas', 100, 0, 'garona/63/89275455-avatar.jpg', 'Sargeras', 0, 6, 11, 18, NULL),
(181, 'Chlöre', 100, 1, 'garona/96/89276000-avatar.jpg', 'Sargeras', 0, 6, 4, 18, NULL),
(182, 'Pushup', 100, 1, 'garona/20/89295892-avatar.jpg', 'Sargeras', 0, 8, 1, 18, NULL),
(183, 'Damnetus', 100, 0, 'garona/24/89529880-avatar.jpg', 'Sargeras', 0, 11, 22, 18, NULL),
(184, 'Trinquette', 100, 1, 'garona/139/89549707-avatar.jpg', 'Sargeras', 0, 1, 1, 18, NULL),
(185, 'Kelnéa', 100, 1, 'garona/181/89552309-avatar.jpg', 'Sargeras', 0, 3, 1, 18, NULL),
(186, 'Parlevent', 100, 1, 'garona/9/89552649-avatar.jpg', 'Sargeras', 0, 7, 11, 18, NULL),
(187, 'Asharaak', 100, 0, 'garona/151/89552791-avatar.jpg', 'Sargeras', 0, 4, 22, 18, NULL),
(188, 'Wallenø', 100, 0, 'garona/96/89630048-avatar.jpg', 'Sargeras', 0, 1, 1, 18, NULL),
(189, 'Ango', 100, 1, 'garona/73/89630537-avatar.jpg', 'Sargeras', 0, 5, 11, 18, NULL),
(190, 'Tifettes', 100, 1, 'garona/175/89636527-avatar.jpg', 'Sargeras', 0, 8, 4, 18, NULL),
(191, 'Riddick', 100, 0, 'garona/193/89665985-avatar.jpg', 'Sargeras', 0, 4, 1, 18, NULL),
(192, 'Lotùs', 100, 1, 'garona/240/89688304-avatar.jpg', 'Sargeras', 0, 4, 4, 18, NULL),
(193, 'Ntex', 100, 0, 'garona/18/89698834-avatar.jpg', 'Sargeras', 0, 4, 7, 18, NULL),
(194, 'Nynja', 100, 0, 'garona/150/89718422-avatar.jpg', 'Sargeras', 0, 10, 25, 18, NULL),
(195, 'Xàe', 100, 1, 'garona/27/89733403-avatar.jpg', 'Sargeras', 0, 8, 1, 18, NULL),
(196, 'Feniks', 100, 1, 'garona/78/89738318-avatar.jpg', 'Sargeras', 0, 10, 1, 18, NULL),
(197, 'Azhrei', 100, 0, 'garona/22/89739798-avatar.jpg', 'Sargeras', 0, 2, 1, 18, NULL),
(198, 'Fenixia', 100, 1, 'garona/178/89743282-avatar.jpg', 'Sargeras', 0, 8, 1, 18, NULL),
(199, 'Omezaroth', 100, 0, 'garona/19/89854483-avatar.jpg', 'Sargeras', 0, 3, 4, 18, NULL),
(200, 'Gromack', 100, 0, 'garona/112/90017136-avatar.jpg', 'Sargeras', 0, 1, 1, 18, NULL),
(201, 'Zephyel', 100, 0, 'garona/38/90068262-avatar.jpg', 'Sargeras', 0, 9, 22, 18, NULL),
(202, 'Spartìate', 100, 1, 'garona/25/92064537-avatar.jpg', 'Sargeras', 0, 1, 4, 18, NULL),
(203, 'Nebutron', 100, 0, 'garona/80/93613392-avatar.jpg', 'Garona', 0, 8, 7, 18, NULL),
(204, 'Midoru', 100, 0, 'garona/174/93614510-avatar.jpg', 'Garona', 0, 3, 22, 18, NULL),
(205, 'Prédictrice', 100, 1, 'garona/236/93673708-avatar.jpg', 'Garona', 0, 2, 3, 18, NULL),
(206, 'Xinding', 100, 1, 'garona/38/93801510-avatar.jpg', 'Garona', 0, 4, 1, 18, NULL),
(207, 'Timelôrd', 100, 0, 'garona/61/93863997-avatar.jpg', 'Ner''zhul', 0, 11, 4, 18, NULL),
(208, 'Nokitsune', 100, 1, 'garona/242/94319090-avatar.jpg', 'Garona', 0, 10, 25, 18, NULL),
(209, 'Zélya', 100, 1, 'garona/179/94718131-avatar.jpg', 'Sargeras', 0, 11, 4, 18, NULL),
(210, 'Seyer', 100, 0, 'garona/86/94837334-avatar.jpg', 'Sargeras', 0, 2, 1, 18, NULL),
(211, 'Kàdyl', 100, 1, 'garona/110/95004270-avatar.jpg', 'Garona', 0, 8, 1, 18, NULL),
(212, 'Eiziah', 100, 1, 'garona/93/95045213-avatar.jpg', 'Garona', 0, 5, 1, 18, NULL),
(213, 'Raenis', 100, 0, 'garona/229/95116261-avatar.jpg', 'Sargeras', 0, 3, 4, 18, NULL),
(214, 'Zoar', 100, 0, 'garona/228/95148004-avatar.jpg', 'Sargeras', 0, 9, 7, 18, NULL),
(215, 'Anyra', 100, 1, 'garona/232/95432936-avatar.jpg', 'Sargeras', 0, 3, 1, 18, NULL),
(216, 'Eon', 100, 1, 'garona/17/95441937-avatar.jpg', 'Garona', 0, 2, 11, 18, NULL),
(217, 'Nøsfé', 100, 0, 'garona/244/95503092-avatar.jpg', 'Garona', 0, 10, 1, 18, NULL),
(218, 'Ayshell', 100, 1, 'garona/62/96186942-avatar.jpg', 'Sargeras', 0, 4, 1, 18, NULL),
(219, 'Kâdyl', 100, 1, 'garona/25/96249369-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(220, 'Elyä', 100, 1, 'garona/84/96272212-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(221, 'Galérius', 100, 0, 'garona/235/96323819-avatar.jpg', 'Garona', 0, 11, 22, 18, NULL),
(222, 'Massia', 100, 1, 'garona/48/96350256-avatar.jpg', 'Ner''zhul', 0, 9, 1, 18, NULL),
(223, 'Mahissia', 100, 1, 'garona/88/96350296-avatar.jpg', 'Ner''zhul', 0, 4, 4, 18, NULL),
(224, 'Repentia', 100, 1, 'garona/141/96350349-avatar.jpg', 'Ner''zhul', 0, 5, 11, 18, NULL),
(225, 'Lèvy', 100, 1, 'garona/246/96557046-avatar.jpg', 'Garona', 0, 2, 11, 18, NULL),
(226, 'Märgâlärds', 100, 0, 'garona/13/96674829-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(227, 'Kidipet', 100, 0, 'garona/169/96749993-avatar.jpg', 'Garona', 0, 7, 3, 18, NULL),
(228, 'Myllenia', 100, 1, 'garona/149/96820373-avatar.jpg', 'Sargeras', 0, 5, 1, 18, NULL),
(229, 'Kidisparai', 100, 0, 'garona/183/96877239-avatar.jpg', 'Garona', 0, 1, 3, 18, NULL),
(230, 'Ida', 100, 1, 'garona/80/96981584-avatar.jpg', 'Garona', 0, 4, 3, 18, NULL),
(231, 'Anÿ', 100, 1, 'garona/13/96982797-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(232, 'Fandehappy', 100, 1, 'garona/120/97083000-avatar.jpg', 'Garona', 0, 1, 25, 18, NULL),
(233, 'Belanima', 100, 1, 'garona/41/97195305-avatar.jpg', 'Garona', 0, 8, 1, 18, NULL),
(234, 'Hibe', 100, 0, 'garona/193/97235905-avatar.jpg', 'Sargeras', 0, 2, 3, 18, NULL),
(235, 'Myllé', 100, 1, 'garona/75/97468747-avatar.jpg', 'Sargeras', 0, 8, 1, 18, NULL),
(236, 'Colamana', 100, 1, 'garona/129/97538689-avatar.jpg', 'Garona', 0, 8, 1, 18, NULL),
(237, 'Madania', 100, 0, 'garona/125/97921917-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(238, 'Cëly', 100, 1, 'garona/12/98057228-avatar.jpg', 'Garona', 0, 5, 1, 18, NULL),
(239, 'Kuramì', 100, 1, 'garona/5/98185477-avatar.jpg', 'Garona', 0, 7, 25, 18, NULL),
(240, 'Chandrak', 100, 1, 'garona/19/98205971-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(241, 'Kazathwin', 100, 0, 'garona/77/98251853-avatar.jpg', 'Garona', 0, 7, 3, 18, NULL),
(242, 'Luminara', 100, 1, 'garona/112/98507376-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(243, 'Tatoon', 100, 1, 'garona/148/98531988-avatar.jpg', 'Garona', 0, 5, 4, 18, NULL),
(244, 'Løuu', 100, 1, 'garona/65/98663233-avatar.jpg', 'Garona', 0, 10, 25, 18, NULL),
(245, 'Shaölin', 100, 0, 'garona/158/98933406-avatar.jpg', 'Garona', 0, 10, 1, 18, NULL),
(246, 'Rabbinovich', 100, 0, 'garona/186/98935738-avatar.jpg', 'Garona', 0, 7, 25, 18, NULL),
(247, 'Rénovatrice', 100, 1, 'garona/53/99038261-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(248, 'Protectrice', 100, 1, 'garona/68/99038276-avatar.jpg', 'Garona', 0, 1, 1, 18, NULL),
(249, 'Nénuphar', 100, 1, 'garona/198/99263174-avatar.jpg', 'Sargeras', 0, 11, 4, 18, NULL),
(250, 'Frizzy', 100, 1, 'garona/151/99375255-avatar.jpg', 'Garona', 0, 8, 11, 18, NULL),
(251, 'Ashéron', 100, 0, 'garona/8/99442440-avatar.jpg', 'Garona', 0, 1, 4, 18, NULL),
(252, 'Gàdock', 100, 0, 'garona/67/99504451-avatar.jpg', 'Garona', 0, 2, 3, 18, NULL),
(253, 'ßyxx', 100, 1, 'garona/161/99535521-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(254, 'Kïkï', 100, 1, 'garona/18/99551250-avatar.jpg', 'Garona', 0, 1, 11, 18, NULL),
(255, 'Nobu', 100, 1, 'garona/162/99572642-avatar.jpg', 'Garona', 0, 1, 1, 18, NULL),
(256, 'Darthvicious', 100, 0, 'garona/134/99609478-avatar.jpg', 'Ner''zhul', 0, 6, 1, 18, NULL),
(257, 'Kadyll', 100, 0, 'garona/208/99687376-avatar.jpg', 'Sargeras', 0, 1, 1, 18, NULL),
(258, 'Daxou', 100, 0, 'garona/164/99707812-avatar.jpg', 'Garona', 0, 3, 3, 18, NULL),
(259, 'Jolarson', 100, 0, 'garona/15/99708175-avatar.jpg', 'Garona', 0, 2, 1, 18, NULL),
(260, 'Dameos', 100, 0, 'garona/170/99708330-avatar.jpg', 'Garona', 0, 1, 4, 18, NULL),
(261, 'Nawamoon', 100, 1, 'garona/146/99708562-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(262, 'Isyama', 100, 1, 'garona/185/99710649-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(263, 'Syriana', 100, 1, 'garona/215/99710935-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(264, 'Drassien', 100, 0, 'garona/204/99721420-avatar.jpg', 'Garona', 0, 9, 22, 18, NULL),
(265, 'Potak', 100, 0, 'garona/141/99785101-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(266, 'Chëësycrüst', 100, 1, 'garona/59/99807035-avatar.jpg', 'Garona', 0, 8, 1, 18, NULL),
(267, 'Zekee', 100, 0, 'garona/209/99812817-avatar.jpg', 'Garona', 0, 4, 22, 18, NULL),
(268, 'Pixie', 100, 1, 'garona/51/99822899-avatar.jpg', 'Garona', 0, 11, 22, 18, NULL),
(269, 'Kälïndrä', 100, 1, 'garona/126/99853694-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(270, 'Guiccila', 100, 1, 'garona/195/100064707-avatar.jpg', 'Garona', 0, 4, 1, 18, NULL),
(271, 'Dürkor', 100, 0, 'garona/3/100087043-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(272, 'Nourslaouf', 100, 1, 'garona/50/100186162-avatar.jpg', 'Sargeras', 0, 11, 4, 18, NULL),
(273, 'Iphigénias', 100, 1, 'garona/223/100218335-avatar.jpg', 'Garona', 0, 3, 11, 18, NULL),
(274, 'Persefal', 100, 0, 'garona/7/100224775-avatar.jpg', 'Garona', 0, 11, 22, 18, NULL),
(275, 'Tiliön', 100, 0, 'garona/250/100260346-avatar.jpg', 'Sargeras', 0, 3, 4, 18, NULL),
(276, 'Farramirht', 100, 0, 'garona/201/100285641-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(277, 'Byx', 100, 1, 'garona/224/100363488-avatar.jpg', 'Garona', 0, 10, 1, 18, NULL),
(278, 'Dhämey', 100, 1, 'garona/15/100442127-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(279, 'Myllénième', 100, 1, 'garona/83/100450643-avatar.jpg', 'Sargeras', 0, 10, 1, 18, NULL),
(280, 'Arrowdiac', 100, 0, 'garona/132/100508036-avatar.jpg', 'Garona', 0, 3, 4, 18, NULL),
(281, 'Redd', 100, 0, 'garona/205/100577741-avatar.jpg', 'Garona', 0, 4, 22, 18, NULL),
(282, 'Melyria', 100, 1, 'garona/128/100578688-avatar.jpg', 'Garona', 0, 5, 22, 18, NULL),
(283, 'Bonobo', 100, 1, 'garona/151/100625815-avatar.jpg', 'Garona', 0, 10, 4, 18, NULL),
(284, 'Edmun', 100, 0, 'garona/120/100721784-avatar.jpg', 'Ner''zhul', 0, 11, 22, 18, NULL),
(285, 'Xaoc', 100, 0, 'garona/208/100740048-avatar.jpg', 'Ner''zhul', 0, 6, 1, 18, NULL),
(286, 'Capiana', 100, 1, 'garona/153/100756889-avatar.jpg', 'Garona', 0, 2, 11, 18, NULL),
(287, 'Thoby', 100, 0, 'garona/105/100765545-avatar.jpg', 'Garona', 0, 6, 22, 18, NULL),
(288, 'Naïntuable', 100, 0, 'garona/231/100769255-avatar.jpg', 'Garona', 0, 2, 11, 18, NULL),
(289, 'Trìs', 100, 1, 'garona/82/100809554-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(290, 'Kârna', 100, 1, 'garona/74/100817738-avatar.jpg', 'Sargeras', 0, 4, 4, 18, NULL),
(291, 'Gadounette', 100, 1, 'garona/115/100829043-avatar.jpg', 'Garona', 0, 5, 11, 18, NULL),
(292, 'Nowek', 100, 1, 'garona/232/100914408-avatar.jpg', 'Sargeras', 0, 4, 1, 18, NULL),
(293, 'Natundra', 100, 1, 'garona/42/100976170-avatar.jpg', 'Sargeras', 0, 11, 4, 18, NULL),
(294, 'Poupouille', 100, 1, 'garona/169/101092265-avatar.jpg', 'Ner''zhul', 0, 7, 25, 18, NULL),
(295, 'Seiily', 100, 1, 'garona/21/101098773-avatar.jpg', 'Sargeras', 0, 4, 1, 18, NULL),
(296, 'Chamyfou', 100, 0, 'garona/92/101108828-avatar.jpg', 'Sargeras', 0, 7, 25, 18, NULL),
(297, 'Dayia', 100, 1, 'garona/66/101109314-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(298, 'Elenorias', 100, 1, 'garona/106/101133674-avatar.jpg', 'Sargeras', 0, 9, 1, 18, NULL),
(299, 'Byxxlôl', 100, 1, 'garona/83/101362515-avatar.jpg', 'Garona', 0, 7, 11, 18, NULL),
(300, 'Woôd', 100, 0, 'garona/231/101402599-avatar.jpg', 'Garona', 0, 11, 4, 18, NULL),
(301, 'Lania', 100, 1, 'garona/137/101420169-avatar.jpg', 'Sargeras', 0, 11, 4, 18, NULL),
(302, 'Pesthys', 100, 1, 'garona/128/101501824-avatar.jpg', 'Garona', 0, 9, 1, 18, NULL),
(303, 'Mîou', 100, 1, 'garona/212/101528788-avatar.jpg', 'Sargeras', 0, 11, 4, 18, NULL),
(304, 'Mîû', 100, 1, 'garona/116/101539700-avatar.jpg', 'Sargeras', 0, 8, 1, 18, NULL),
(305, 'Noriah', 100, 1, 'garona/204/101565388-avatar.jpg', 'Garona', 0, 7, 3, 18, NULL),
(306, 'Mîz', 100, 1, 'garona/24/101660696-avatar.jpg', 'Sargeras', 0, 4, 3, 18, NULL),
(307, 'Myû', 100, 1, 'garona/72/101688136-avatar.jpg', 'Sargeras', 0, 3, 1, 18, NULL),
(308, 'Miöü', 100, 1, 'garona/52/101781300-avatar.jpg', 'Sargeras', 0, 2, 1, 18, NULL),
(309, 'Myouu', 100, 1, 'garona/46/101840174-avatar.jpg', 'Sargeras', 0, 6, 11, 18, NULL),
(310, 'Zigloo', 100, 0, 'garona/80/102043984-avatar.jpg', 'Sargeras', 0, 6, 1, 18, NULL),
(311, 'Jðke', 100, 0, 'garona/178/102047666-avatar.jpg', 'Garona', 0, 3, 1, 18, NULL),
(312, 'Myumonk', 100, 1, 'garona/62/102097726-avatar.jpg', 'Sargeras', 0, 10, 1, 18, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnages_has_specialisation`
--

CREATE TABLE IF NOT EXISTS `personnages_has_specialisation` (
  `specialisation_idSpecialisation` int(11) NOT NULL,
  `personnages_idPersonnage` int(11) NOT NULL,
  `isPrincipal` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`specialisation_idSpecialisation`,`personnages_idPersonnage`),
  KEY `fk_specialisation_has_personnages_personnages1_idx` (`personnages_idPersonnage`),
  KEY `fk_specialisation_has_personnages_specialisation1_idx` (`specialisation_idSpecialisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `idRace` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idRace`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `race`
--

INSERT INTO `race` (`idRace`, `nom`, `icon`) VALUES
(1, 'Humain', NULL),
(2, 'Orc', NULL),
(3, 'Nain', NULL),
(4, 'Elfe de la nuit', NULL),
(5, 'Mort-vivant', NULL),
(6, 'Tauren', NULL),
(7, 'Gnome', NULL),
(8, 'Troll', NULL),
(9, 'Gobelin', NULL),
(10, 'Elfe de sang', NULL),
(11, 'Draeneï', NULL),
(22, 'Worgen', NULL),
(24, 'Pandaren', NULL),
(25, 'Pandaren', NULL),
(26, 'Pandaren', NULL);

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
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`idRole`, `nom`) VALUES
(1, 'Tank'),
(2, 'Soigneur'),
(3, 'DPS Cac'),
(4, 'DPS Distant');

-- --------------------------------------------------------

--
-- Structure de la table `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `idRoster` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
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
  `idSpecialisation` int(11) NOT NULL AUTO_INCREMENT,
  `idClasses` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idSpecialisation`),
  KEY `fk_specialisation_classes1_idx` (`idClasses`),
  KEY `fk_specialisation_role1_idx` (`idRole`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `specialisation`
--

INSERT INTO `specialisation` (`idSpecialisation`, `idClasses`, `idRole`, `nom`, `icon`) VALUES
(1, 1, 3, 'Armes', 'ability_warrior_savageblow'),
(2, 1, 3, 'Fureur', 'ability_warrior_innerrage'),
(3, 1, 1, 'Protection', 'ability_warrior_defensivestance'),
(4, 2, 2, 'Sacré', 'spell_holy_holybolt'),
(5, 2, 1, 'Protection', 'ability_paladin_shieldofthetemplar'),
(6, 2, 3, 'Vindicte', 'spell_holy_auraoflight'),
(7, 3, 4, 'Maîtrise des bêtes', 'ability_hunter_bestialdiscipline'),
(8, 3, 4, 'Précision', 'ability_hunter_focusedaim'),
(9, 3, 4, 'Survie', 'ability_hunter_camouflage'),
(10, 4, 3, 'Assassinat', 'ability_rogue_eviscerate'),
(11, 4, 3, 'Combat', 'ability_backstab'),
(12, 4, 3, 'Finesse', 'ability_stealth'),
(13, 5, 2, 'Discipline', 'spell_holy_powerwordshield'),
(14, 5, 2, 'Sacré', 'spell_holy_guardianspirit'),
(15, 5, 4, 'Ombre', 'spell_shadow_shadowwordpain'),
(16, 6, 1, 'Sang', 'spell_deathknight_bloodpresence'),
(17, 6, 3, 'Givre', 'spell_deathknight_frostpresence'),
(18, 6, 3, 'Impie', 'spell_deathknight_unholypresence'),
(19, 7, 4, 'Élémentaire', 'spell_nature_lightning'),
(20, 7, 3, 'Amélioration', 'spell_shaman_improvedstormstrike'),
(21, 7, 2, 'Restauration', 'spell_nature_magicimmunity'),
(22, 8, 4, 'Arcanes', 'spell_holy_magicalsentry'),
(23, 8, 4, 'Feu', 'spell_fire_firebolt02'),
(24, 8, 4, 'Givre', 'spell_frost_frostbolt02'),
(25, 9, 4, 'Affliction', 'spell_shadow_deathcoil'),
(26, 9, 4, 'Démonologie', 'spell_shadow_metamorphosis'),
(27, 9, 4, 'Destruction', 'spell_shadow_rainoffire'),
(28, 10, 1, 'Maître brasseur', 'spell_monk_brewmaster_spec'),
(29, 10, 2, 'Tisse-brume', 'spell_monk_mistweaver_spec'),
(30, 10, 3, 'Marche-vent', 'spell_monk_windwalker_spec'),
(31, 11, 4, 'Équilibre', 'spell_nature_starfall'),
(32, 11, 3, 'Farouche', 'ability_druid_catform'),
(33, 11, 1, 'Gardien', 'ability_racial_bearform'),
(34, 11, 2, 'Restauration', 'spell_nature_healingtouch');

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
  `lvlMin` mediumint(9) NOT NULL,
  `lvlMax` mediumint(9) NOT NULL,
  `tailleMin` mediumint(9) NOT NULL,
  `tailleMax` mediumint(9) NOT NULL,
  `patch` varchar(45) NOT NULL,
  `isDonjon` tinyint(1) NOT NULL,
  `isRaid` tinyint(1) NOT NULL,
  PRIMARY KEY (`idZone`),
  UNIQUE KEY `nom_UNIQUE` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7546 ;

--
-- Contenu de la table `zone`
--

INSERT INTO `zone` (`idZone`, `nom`, `lvlMin`, `lvlMax`, `tailleMin`, `tailleMax`, `patch`, `isDonjon`, `isRaid`) VALUES
(7545, 'Citadelle des Flammes infernales', 100, 100, 10, 30, '6.2', 0, 1);

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

--
-- Contenu de la table `zone_has_bosses`
--

INSERT INTO `zone_has_bosses` (`idZone`, `idBosses`) VALUES
(7545, 89890),
(7545, 90199),
(7545, 90269),
(7545, 90284),
(7545, 90296),
(7545, 90316),
(7545, 90378),
(7545, 90435),
(7545, 91331),
(7545, 91349),
(7545, 92146),
(7545, 93023),
(7545, 93068);

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
-- Contenu de la table `zone_has_mode_diffculte`
--

INSERT INTO `zone_has_mode_diffculte` (`idZone`, `idMode`) VALUES
(7545, 1),
(7545, 2),
(7545, 3),
(7545, 4);

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
  ADD CONSTRAINT `fk_evenements_roles_evenements1` FOREIGN KEY (`idEvenements`) REFERENCES `evenements` (`idEvenements`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_roles_role1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Contraintes pour la table `guildes`
--
ALTER TABLE `guildes`
  ADD CONSTRAINT `fk_guildes_faction1` FOREIGN KEY (`idFaction`) REFERENCES `faction` (`idFaction`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_personnages_classes1` FOREIGN KEY (`idClasses`) REFERENCES `classes` (`idClasses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_faction1` FOREIGN KEY (`idFaction`) REFERENCES `faction` (`idFaction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_race1` FOREIGN KEY (`idRace`) REFERENCES `race` (`idRace`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnage_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnage_users1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_zone_has_bosses_bosses1` FOREIGN KEY (`idBosses`) REFERENCES `bosses` (`idBosses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zone_has_bosses_zone1` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `zone_has_mode_diffculte`
--
ALTER TABLE `zone_has_mode_diffculte`
  ADD CONSTRAINT `fk_mode_difficulte_has_zone_mode_difficulte1` FOREIGN KEY (`idMode`) REFERENCES `mode_difficulte` (`idMode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mode_difficulte_has_zone_zone1` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
