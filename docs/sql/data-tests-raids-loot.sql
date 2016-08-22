-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 22 Août 2016 à 09:31
-- Version du serveur: 5.5.50-0ubuntu0.14.04.1
-- Version de PHP: 5.6.23-1+deprecated+dontuse+deb.sury.org~trusty+1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `raid_tracker`
--
CREATE DATABASE IF NOT EXISTS `raid_tracker` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `raid_tracker`;

-- --------------------------------------------------------

--
-- Structure de la table `bosses`
--

DROP TABLE IF EXISTS `bosses`;
CREATE TABLE IF NOT EXISTS `bosses` (
  `idBosses` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id battlenet',
  `nom` varchar(155) NOT NULL,
  `level` int(11) NOT NULL,
  `vie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBosses`),
  UNIQUE KEY `nom_UNIQUE` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93069 ;

--
-- Vider la table avant d'insérer `bosses`
--

TRUNCATE TABLE `bosses`;
--
-- Contenu de la table `bosses`
--

INSERT INTO `bosses` (`idBosses`, `nom`, `level`, `vie`) VALUES
(-1, 'trash mob', 0, 0),
(76809, 'blast furnace', 102, 523590),
(76814, 'flamebender ka''graz', 102, 1633600),
(76865, 'beastlord darmac', 103, 4738267),
(76877, 'gruul', 103, 32498400),
(76906, 'operator thogar', 101, 60738),
(76974, 'hans''gar & franzok', 103, 35504504),
(77182, 'oregorger the devourer', 103, 27298656),
(77557, 'the iron maidens', 101, 101230),
(77692, 'kromog, legend of the mountain', 103, 31956760),
(87420, 'blackhand', 102, 29907),
(89890, 'fel lord zakuun', 103, 43331200),
(90199, 'gorefiend', 103, 62396928),
(90269, 'tyrant velhari', 103, 61002424),
(90284, 'iron reaver', 103, 42247920),
(90296, 'socrethar the eternal', 103, 17900120),
(90316, 'shadow-lord iskar', 103, 45497760),
(90378, 'kilrogg deadeye', 103, 57197184),
(90435, 'kormrok', 103, 31198464),
(91331, 'archimonde', 103, 68149144),
(91349, 'mannoroth', 103, 64281836),
(92146, 'hellfire high council', 103, 17931318),
(93023, 'hellfire assault', 103, 7582960),
(93068, 'xhul''horac', 103, 58497120);

-- --------------------------------------------------------

--
-- Structure de la table `bosses_has_npc`
--

DROP TABLE IF EXISTS `bosses_has_npc`;
CREATE TABLE IF NOT EXISTS `bosses_has_npc` (
  `idBosses` int(11) NOT NULL,
  `idNpc` int(11) NOT NULL,
  PRIMARY KEY (`idBosses`,`idNpc`),
  KEY `fk_bosses_has_npc_npc1_idx` (`idNpc`),
  KEY `fk_bosses_has_npc_bosses1_idx` (`idBosses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `bosses_has_npc`
--

TRUNCATE TABLE `bosses_has_npc`;
--
-- Contenu de la table `bosses_has_npc`
--

INSERT INTO `bosses_has_npc` (`idBosses`, `idNpc`) VALUES
(76814, 76794),
(76809, 76806),
(76809, 76809),
(76814, 76814),
(76809, 76815),
(76809, 76821),
(76865, 76865),
(76865, 76874),
(76877, 76877),
(76865, 76884),
(76906, 76906),
(76865, 76945),
(76865, 76946),
(76974, 76973),
(76974, 76974),
(77182, 77182),
(77557, 77231),
(76814, 77337),
(87420, 77342),
(77557, 77477),
(77557, 77557),
(76906, 77560),
(87420, 77665),
(77692, 77692),
(77557, 78341),
(77557, 78343),
(77557, 78347),
(77557, 78351),
(77557, 78352),
(76809, 78463),
(76906, 80791),
(76906, 81197),
(76906, 81315),
(76906, 81318),
(76906, 81612),
(87420, 87420),
(76906, 87841),
(76809, 88818),
(76809, 88820),
(76809, 88821),
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

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `idClasses` int(11) NOT NULL AUTO_INCREMENT,
  `couleur` varchar(7) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idClasses`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Vider la table avant d'insérer `classes`
--

TRUNCATE TABLE `classes`;
--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`idClasses`, `couleur`, `nom`, `icon`) VALUES
(1, '#C69B6D', 'Warrior', NULL),
(2, '#F48CBA', 'Paladin', NULL),
(3, '#AAD372', 'Hunter', NULL),
(4, '#FFF468', 'Rogue', NULL),
(5, '#AAAAAA', 'Priest', NULL),
(6, '#C41E3B', 'Death Knight', NULL),
(7, '#2359FF', 'Shaman', NULL),
(8, '#68CCEF', 'Mage', NULL),
(9, '#9382C9', 'Warlock', NULL),
(10, '#008467', 'Monk', NULL),
(11, '#FF7C0A', 'Druid', NULL),
(12, '#A330C9', 'Demon Hunter', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
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
  `idGuildes` int(11) DEFAULT NULL,
  `idRoster` int(11) DEFAULT NULL,
  `idEvenements_template` int(11) DEFAULT NULL,
  `idUsers` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idEvenements`),
  KEY `fk_evenements_donjon1_idx` (`idDonjon`),
  KEY `fk_evenements_guildes1_idx` (`idGuildes`),
  KEY `fk_evenements_roster1_idx` (`idRoster`),
  KEY `fk_evenements_evenements_template1_idx` (`idEvenements_template`),
  KEY `fk_evenements_user1_idx` (`idUsers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `evenements`
--

TRUNCATE TABLE `evenements`;
-- --------------------------------------------------------

--
-- Structure de la table `evenements_personnage`
--

DROP TABLE IF EXISTS `evenements_personnage`;
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

--
-- Vider la table avant d'insérer `evenements_personnage`
--

TRUNCATE TABLE `evenements_personnage`;
-- --------------------------------------------------------

--
-- Structure de la table `evenements_roles`
--

DROP TABLE IF EXISTS `evenements_roles`;
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

--
-- Vider la table avant d'insérer `evenements_roles`
--

TRUNCATE TABLE `evenements_roles`;
-- --------------------------------------------------------

--
-- Structure de la table `evenements_template`
--

DROP TABLE IF EXISTS `evenements_template`;
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

--
-- Vider la table avant d'insérer `evenements_template`
--

TRUNCATE TABLE `evenements_template`;
-- --------------------------------------------------------

--
-- Structure de la table `evenements_template_roles`
--

DROP TABLE IF EXISTS `evenements_template_roles`;
CREATE TABLE IF NOT EXISTS `evenements_template_roles` (
  `idEvenements_template_roles` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` mediumint(9) DEFAULT NULL,
  `ordre` mediumint(9) DEFAULT NULL,
  `idEvenements_template` int(11) NOT NULL,
  `idRoles` int(11) NOT NULL,
  PRIMARY KEY (`idEvenements_template_roles`),
  KEY `fk_evenements_template_roles_evenements_template1_idx` (`idEvenements_template`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `evenements_template_roles`
--

TRUNCATE TABLE `evenements_template_roles`;
-- --------------------------------------------------------

--
-- Structure de la table `faction`
--

DROP TABLE IF EXISTS `faction`;
CREATE TABLE IF NOT EXISTS `faction` (
  `idFaction` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idFaction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vider la table avant d'insérer `faction`
--

TRUNCATE TABLE `faction`;
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

DROP TABLE IF EXISTS `guildes`;
CREATE TABLE IF NOT EXISTS `guildes` (
  `idGuildes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `serveur` varchar(150) NOT NULL,
  `niveau` mediumint(9) DEFAULT NULL,
  `miniature` varchar(100) DEFAULT NULL,
  `idFaction` int(11) NOT NULL,
  PRIMARY KEY (`idGuildes`),
  KEY `fk_guildes_faction1_idx` (`idFaction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vider la table avant d'insérer `guildes`
--

TRUNCATE TABLE `guildes`;
--
-- Contenu de la table `guildes`
--

INSERT INTO `guildes` (`idGuildes`, `nom`, `serveur`, `niveau`, `miniature`, `idFaction`) VALUES
(1, 'wrath of god', 'Garona', 25, '', 0),
(2, 'mystra', 'Garona', 25, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `idItem` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ajouterPar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `majPar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `idBnet` int(10) DEFAULT NULL,
  `couleur` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=143 ;

--
-- Vider la table avant d'insérer `items`
--

TRUNCATE TABLE `items`;
--
-- Contenu de la table `items`
--

INSERT INTO `items` (`idItem`, `nom`, `ajouterPar`, `majPar`, `idBnet`, `couleur`, `icon`) VALUES
(23, 'antarus-roster1-raid1', 'Import Raid-TracKer', '', 124336, '', ''),
(24, 'antarus-roster1-raid2', 'Import Raid-TracKer', '', 124224, '', ''),
(119, 'antarus-roster2-raid3', 'Import Raid-TracKer', '', 124359, '', ''),
(137, 'antarus-roster1-raid4', 'Import Raid-TracKer', '', 124360, '', ''),
(138, 'antarus-roster2-raid5', 'Import Raid-TracKer', '', 124361, '', ''),
(139, 'antarus-roster2-raid6', 'Import Raid-TracKer', '', 124362, '', ''),
(140, 'capi-roster1-raid1', 'Import Raid-TracKer', '', 124362, '', ''),
(141, 'capi-roster1-raid4', 'Import Raid-TracKer', '', 124362, '', ''),
(142, 'capi-roster2-raid3', 'Import Raid-TracKer', '', 124362, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `item_personnage_raid`
--

DROP TABLE IF EXISTS `item_personnage_raid`;
CREATE TABLE IF NOT EXISTS `item_personnage_raid` (
  `idItemRaidPersonnage` int(11) NOT NULL AUTO_INCREMENT,
  `idRaid` mediumint(8) NOT NULL,
  `idItem` int(10) NOT NULL,
  `idPersonnage` int(11) DEFAULT NULL,
  `valeur` float(10,2) DEFAULT NULL,
  `bonus` varchar(150) DEFAULT NULL,
  `idBosses` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idItemRaidPersonnage`),
  KEY `fk_item_personnage_raid_raids1_idx` (`idRaid`),
  KEY `fk_item_personnage_raid_items1_idx` (`idItem`),
  KEY `fk_item_personnage_raid_personnages1_idx` (`idPersonnage`),
  KEY `fk_item_personnage_raid_bosses1_idx` (`idBosses`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=428 ;

--
-- Vider la table avant d'insérer `item_personnage_raid`
--

TRUNCATE TABLE `item_personnage_raid`;
--
-- Contenu de la table `item_personnage_raid`
--

INSERT INTO `item_personnage_raid` (`idItemRaidPersonnage`, `idRaid`, `idItem`, `idPersonnage`, `valeur`, `bonus`, `idBosses`, `note`) VALUES
(399, 21, 24, 179, 0.00, '1798:1487:529:', 90199, ''),
(420, 16, 23, 179, 0.00, '1801:1472:529:', 92146, ''),
(421, 22, 119, 179, 0.00, '1801:1472:529:', 92146, ''),
(422, 23, 137, 179, 0.00, '1801:1472:529:', 92146, ''),
(423, 24, 138, 179, 0.00, '1801:1472:529:', 92146, ''),
(424, 25, 139, 179, 0.00, '1801:1472:529:', 92146, ''),
(425, 16, 140, 73, 0.00, '1801:1472:529:', 92146, ''),
(426, 23, 141, 73, 0.00, '1801:1472:529:', 92146, ''),
(427, 22, 142, 73, 0.00, '1801:1472:529:', 92146, '');

-- --------------------------------------------------------

--
-- Structure de la table `mode_difficulte`
--

DROP TABLE IF EXISTS `mode_difficulte`;
CREATE TABLE IF NOT EXISTS `mode_difficulte` (
  `idMode` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `nom_bnet` varchar(100) DEFAULT NULL COMMENT 'nom battle net',
  PRIMARY KEY (`idMode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Vider la table avant d'insérer `mode_difficulte`
--

TRUNCATE TABLE `mode_difficulte`;
--
-- Contenu de la table `mode_difficulte`
--

INSERT INTO `mode_difficulte` (`idMode`, `nom`, `nom_bnet`) VALUES
(1, 'Raid LFR', 'RAID_FLEX_LFR'),
(5, 'Donjon NM', 'DUNGEON_NORMAL'),
(6, 'Donjon HM', 'DUNGEON_HEROIC'),
(7, 'Donjon MM', 'DUNGEON_MYTHIC'),
(14, 'Raid NM', 'RAID_FLEX_NORMAL'),
(15, 'Raid HM', 'RAID_FLEX_HEROIC'),
(16, 'Raid MM', 'RAID_MYTHIC');

-- --------------------------------------------------------

--
-- Structure de la table `npc`
--

DROP TABLE IF EXISTS `npc`;
CREATE TABLE IF NOT EXISTS `npc` (
  `idNpc` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id battlenet',
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idNpc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93069 ;

--
-- Vider la table avant d'insérer `npc`
--

TRUNCATE TABLE `npc`;
--
-- Contenu de la table `npc`
--

INSERT INTO `npc` (`idNpc`, `nom`) VALUES
(76794, 'cinder wolf'),
(76806, 'heart of the mountain'),
(76809, 'foreman feldspar'),
(76814, 'flamebender ka''graz'),
(76815, 'primal elementalist'),
(76821, 'firecaller'),
(76865, 'beastlord darmac'),
(76874, 'dreadwing'),
(76877, 'gruul'),
(76884, 'cruelfang'),
(76906, 'operator thogar'),
(76945, 'ironcrusher'),
(76946, 'faultline'),
(76973, 'hans''gar'),
(76974, 'franzok'),
(77182, 'oregorger'),
(77231, 'enforcer sorka'),
(77337, 'aknor steelbringer'),
(77342, 'siegemaker'),
(77477, 'marak the blooded'),
(77557, 'admiral gar''an'),
(77560, 'obliterator cannon'),
(77665, 'iron soldier'),
(77692, 'kromog'),
(78341, 'uk''urogg'),
(78343, 'gorak'),
(78347, 'iron eviscerator'),
(78351, 'uktar'),
(78352, 'battle medic rogg'),
(78463, 'slag elemental'),
(80791, 'grom''kar man-at-arms'),
(81197, 'iron raider'),
(81315, 'iron crack-shot'),
(81318, 'iron gunnery sergeant'),
(81612, 'deforester'),
(87420, 'blackhand'),
(87841, 'grom''kar firemender'),
(88818, 'security guard'),
(88820, 'furnace engineer'),
(88821, 'bellows operator'),
(89890, 'fel lord zakuun'),
(90018, 'hellfire cannon'),
(90199, 'gorefiend'),
(90269, 'tyrant velhari'),
(90284, 'iron reaver'),
(90296, 'soulbound construct'),
(90316, 'shadow-lord iskar'),
(90378, 'kilrogg deadeye'),
(90435, 'kormrok'),
(91331, 'archimonde'),
(91349, 'mannoroth'),
(92142, 'blademaster jubei''thos'),
(92144, 'dia darkwhisper'),
(92146, 'gurtogg bloodboil'),
(93023, 'siegemaster mar''tak'),
(93068, 'xhul''horac');

-- --------------------------------------------------------

--
-- Structure de la table `pallier`
--

DROP TABLE IF EXISTS `pallier`;
CREATE TABLE IF NOT EXISTS `pallier` (
  `idPallier` int(11) NOT NULL AUTO_INCREMENT,
  `idZone` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `tiers` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPallier`),
  KEY `fk_pallier_zone1_idx` (`idZone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `pallier`
--

TRUNCATE TABLE `pallier`;
-- --------------------------------------------------------

--
-- Structure de la table `pallierAfficher`
--

DROP TABLE IF EXISTS `pallierAfficher`;
CREATE TABLE IF NOT EXISTS `pallierAfficher` (
  `idPallierAffiche` int(11) NOT NULL AUTO_INCREMENT,
  `idModeDifficulte` int(11) NOT NULL,
  `idZone` int(11) NOT NULL,
  `idRoster` int(11) NOT NULL,
  PRIMARY KEY (`idPallierAffiche`),
  KEY `fk_pallier_mode_idx` (`idModeDifficulte`),
  KEY `fk_pallier_zone_idx` (`idZone`),
  KEY `fk_pallier_roster_idx` (`idRoster`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Vider la table avant d'insérer `pallierAfficher`
--

TRUNCATE TABLE `pallierAfficher`;
--
-- Contenu de la table `pallierAfficher`
--

INSERT INTO `pallierAfficher` (`idPallierAffiche`, `idModeDifficulte`, `idZone`, `idRoster`) VALUES
(1, 14, 7545, 1),
(2, 15, 6967, 1),
(3, 14, 7545, 2),
(4, 15, 7545, 2);

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

DROP TABLE IF EXISTS `personnages`;
CREATE TABLE IF NOT EXISTS `personnages` (
  `idPersonnage` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `niveau` mediumint(9) NOT NULL,
  `genre` tinyint(1) DEFAULT NULL COMMENT 'id battlenet\n1 femme\n0 homme',
  `miniature` varchar(100) DEFAULT NULL,
  `royaume` varchar(100) DEFAULT NULL,
  `ilvl` int(11) DEFAULT NULL,
  `idFaction` int(11) NOT NULL,
  `idClasses` int(11) NOT NULL,
  `idRace` int(11) NOT NULL,
  `idGuildes` int(11) DEFAULT NULL,
  `idUsers` int(10) unsigned DEFAULT NULL,
  `isTech` tinyint(1) DEFAULT '0' COMMENT 'personnage dit technique. utiliser lors de la creation du roster. bank et disenchant',
  PRIMARY KEY (`idPersonnage`),
  KEY `fk_personnage_guildes1_idx` (`idGuildes`),
  KEY `fk_personnages_faction1_idx` (`idFaction`),
  KEY `fk_personnages_classes1_idx` (`idClasses`),
  KEY `fk_personnages_race1_idx` (`idRace`),
  KEY `fk_personnages_user1_idx` (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=578 ;

--
-- Vider la table avant d'insérer `personnages`
--

TRUNCATE TABLE `personnages`;
--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`idPersonnage`, `nom`, `niveau`, `genre`, `miniature`, `royaume`, `ilvl`, `idFaction`, `idClasses`, `idRace`, `idGuildes`, `idUsers`, `isTech`) VALUES
(1, 'akirian', 100, 0, 'garona/41/3881769-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(2, 'xéres', 100, 0, 'garona/5/22519557-avatar.jpg', 'garona', 708, 0, 2, 1, NULL, NULL, 0),
(3, 'octav', 100, 0, 'garona/90/23131738-avatar.jpg', 'garona', 0, 0, 3, 3, 1, NULL, 0),
(4, 'arkös', 100, 0, 'garona/22/28675094-avatar.jpg', 'garona', 0, 0, 6, 11, 1, NULL, 0),
(5, 'wôlff', 100, 0, 'garona/11/49420299-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(6, 'Àbigaëlle', 100, 1, 'garona/178/53469618-avatar.jpg', 'garona', 0, 0, 8, 4, 1, NULL, 0),
(7, 'chomano', 100, 0, 'garona/175/57910447-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(8, 'prôzzak', 100, 0, 'garona/177/103369649-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(9, 'ironkain', 100, 0, 'garona/172/1659564-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(10, 'océannia', 100, 1, 'garona/104/1813864-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(11, 'matéus', 100, 0, 'garona/121/1859705-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(12, 'zatoichy', 100, 0, 'garona/104/2021992-avatar.jpg', 'garona', 0, 0, 5, 4, 2, NULL, 0),
(13, 'mordrède', 100, 0, 'garona/30/2636318-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(14, 'lagaboulette', 100, 1, 'garona/223/2676447-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(15, 'yarixa', 100, 1, 'garona/70/2711622-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(16, 'prony', 100, 0, 'garona/83/2803795-avatar.jpg', 'garona', 717, 0, 11, 4, NULL, NULL, 0),
(17, 'octo', 100, 0, 'garona/230/5208038-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(18, 'kerimaa', 100, 1, 'garona/125/5767549-avatar.jpg', 'garona', 0, 0, 3, 11, 2, NULL, 0),
(19, 'wolfmann', 100, 0, 'garona/13/5841165-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(20, 'capikaze', 100, 0, 'garona/170/9321898-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(21, 'bøubøule', 100, 0, 'garona/79/9410383-avatar.jpg', 'garona', 0, 0, 3, 3, 2, NULL, 0),
(22, 'sadday', 100, 1, 'garona/46/9553198-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(23, 'falinns', 100, 0, 'garona/234/9607402-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(24, 'myna', 100, 1, 'garona/161/9657249-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(25, 'reve', 100, 1, 'garona/148/9673876-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(26, 'cely', 100, 1, 'garona/113/9790833-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(27, 'alandrys', 100, 0, 'garona/58/9801530-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(28, 'elirys', 100, 1, 'garona/137/10309257-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(29, 'parlama', 100, 1, 'garona/143/10635151-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(30, 'alax', 100, 0, 'garona/54/11104054-avatar.jpg', 'garona', 0, 0, 2, 3, 2, NULL, 0),
(31, 'acronomicon', 100, 0, 'garona/76/12192588-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(32, 'lhilhi', 100, 1, 'garona/209/12288465-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(33, 'arthyss', 100, 0, 'garona/109/12343149-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(34, 'apisto', 100, 0, 'garona/199/12419527-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(35, 'nryan', 100, 0, 'garona/87/12421719-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(36, 'karabistouil', 100, 1, 'garona/66/13559106-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(37, 'ptitepoucett', 100, 1, 'garona/237/13613805-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(38, 'healsangel', 100, 1, 'garona/226/14281954-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(39, 'kiev', 100, 0, 'garona/212/14996436-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(40, 'nisya', 100, 1, 'garona/34/15257378-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(41, 'kaarapital', 100, 1, 'garona/134/16132486-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(42, 'poupoucetire', 100, 1, 'garona/234/16132842-avatar.jpg', 'garona', 0, 0, 3, 11, 2, NULL, 0),
(43, 'arcalyne', 100, 1, 'garona/244/17042164-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(44, 'kaarabine', 100, 1, 'garona/170/17945514-avatar.jpg', 'garona', 709, 0, 3, 4, NULL, NULL, 0),
(45, 'lisys', 100, 1, 'garona/178/18159538-avatar.jpg', 'garona', 722, 0, 5, 1, NULL, NULL, 0),
(46, 'bogossa', 100, 1, 'garona/71/19291463-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(47, 'nostalgie', 100, 1, 'garona/25/19346713-avatar.jpg', 'garona', 0, 0, 5, 11, 2, NULL, 0),
(48, 'rurú', 100, 1, 'garona/200/19821000-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(49, 'heresânkh', 100, 1, 'garona/158/20167326-avatar.jpg', 'garona', 0, 0, 5, 11, 2, NULL, 0),
(50, 'antarus', 100, 0, 'garona/146/21289874-avatar.jpg', 'garona', 0, 0, 5, 4, 2, NULL, 0),
(51, 'laetitiaa', 100, 1, 'garona/203/22083275-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(52, 'khronøs', 100, 0, 'garona/125/23517053-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(53, 'karalich', 100, 1, 'garona/26/23697690-avatar.jpg', 'garona', 0, 0, 6, 4, 2, NULL, 0),
(54, 'poulich', 100, 1, 'garona/109/23709549-avatar.jpg', 'garona', 712, 0, 6, 1, NULL, NULL, 0),
(55, 'prozzak', 100, 0, 'garona/42/26734122-avatar.jpg', 'garona', 0, 0, 5, 3, 2, NULL, 0),
(56, 'bigbeer', 100, 0, 'garona/255/28860159-avatar.jpg', 'garona', 0, 0, 3, 3, 2, NULL, 0),
(57, 'redoot', 100, 1, 'garona/254/29159934-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(58, 'byluna', 100, 1, 'garona/220/29529308-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(59, 'plateùs', 100, 0, 'garona/10/30977034-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(60, 'dooc', 100, 1, 'garona/2/33189122-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(61, 'shynzu', 100, 1, 'garona/149/34208149-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(62, 'lylybelle', 100, 1, 'garona/99/34321507-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(63, 'ilidøs', 100, 0, 'garona/9/34456073-avatar.jpg', 'garona', 0, 0, 6, 4, 2, NULL, 0),
(64, 'tÿra', 100, 0, 'garona/57/35029305-avatar.jpg', 'garona', 727, 0, 6, 1, NULL, NULL, 0),
(65, 'xcalibur', 100, 0, 'garona/24/35030552-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(66, 'auron', 100, 0, 'garona/61/35204669-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(67, 'tikchbila', 100, 0, 'garona/154/36140954-avatar.jpg', 'garona', 712, 0, 8, 22, NULL, NULL, 0),
(68, 'magerie', 100, 1, 'garona/241/36358385-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(69, 'harigston', 100, 1, 'garona/119/37148279-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(70, 'aeoline', 100, 1, 'garona/61/37618237-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(71, 'olare', 100, 0, 'garona/10/37762058-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(72, 'bachantes', 100, 0, 'garona/49/39400497-avatar.jpg', 'garona', 0, 0, 1, 3, 2, NULL, 0),
(73, 'capï', 100, 1, 'garona/40/40891944-avatar.jpg', 'garona', 727, 0, 3, 25, NULL, NULL, 0),
(74, 'pléco', 100, 1, 'garona/225/40947937-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(75, 'dootty', 100, 1, 'garona/247/43145207-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(76, 'cellesta', 100, 1, 'garona/19/43252755-avatar.jpg', 'garona', 0, 0, 5, 11, 2, NULL, 0),
(77, 'laugan', 100, 0, 'garona/23/45220631-avatar.jpg', 'garona', 0, 0, 5, 3, 2, NULL, 0),
(78, 'ptitelouve', 100, 1, 'garona/123/45595259-avatar.jpg', 'garona', 0, 0, 4, 22, 2, NULL, 0),
(79, 'talisia', 100, 1, 'garona/12/46258956-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(80, 'spoiler', 100, 0, 'garona/31/46725407-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(81, 'kalamïty', 100, 1, 'garona/195/48465859-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(82, 'aelyne', 100, 1, 'garona/116/48794484-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(83, 'félicias', 100, 1, 'garona/137/49561225-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(84, 'iriséa', 100, 1, 'garona/60/49766972-avatar.jpg', 'garona', 0, 0, 8, 4, 2, NULL, 0),
(85, 'rapiou', 100, 0, 'garona/76/50125388-avatar.jpg', 'garona', 0, 0, 4, 22, 2, NULL, 0),
(86, 'Ächille', 100, 0, 'garona/21/50140693-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(87, 'thusùxx', 100, 0, 'garona/97/50817121-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(88, 'cartam', 100, 0, 'garona/135/50938503-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(89, 'mâjuscule', 100, 1, 'garona/85/51698517-avatar.jpg', 'garona', 0, 0, 8, 11, 2, NULL, 0),
(90, 'cartmân', 100, 0, 'garona/100/51740004-avatar.jpg', 'garona', 733, 0, 6, 1, NULL, NULL, 0),
(91, 'deathinition', 100, 0, 'garona/206/52678862-avatar.jpg', 'garona', 0, 0, 6, 11, 2, NULL, 0),
(92, 'mérys', 100, 1, 'garona/141/52905101-avatar.jpg', 'garona', 0, 0, 4, 1, 2, NULL, 0),
(93, 'cartmän', 100, 0, 'garona/102/53301094-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(94, 'jðe', 100, 0, 'garona/8/53700616-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(95, 'gøuma', 100, 0, 'garona/116/54341236-avatar.jpg', 'garona', 0, 0, 8, 3, 2, NULL, 0),
(96, 'gøuminette', 100, 1, 'garona/120/54341240-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(97, 'sømetimes', 100, 1, 'garona/74/54789706-avatar.jpg', 'garona', 705, 0, 7, 11, NULL, NULL, 0),
(98, 'odreth', 100, 0, 'garona/231/55060199-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(99, 'nydelia', 100, 1, 'garona/51/55169843-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(100, 'valyanas', 100, 1, 'garona/30/55325214-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(101, 'lønï', 100, 1, 'garona/254/55326462-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(102, 'crysista', 100, 1, 'garona/148/55543956-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(103, 'rylia', 100, 1, 'garona/83/55557203-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(104, 'oriane', 100, 1, 'garona/205/55836621-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(105, 'swanya', 100, 1, 'garona/7/56419335-avatar.jpg', 'garona', 0, 0, 3, 22, 2, NULL, 0),
(106, 'menora', 100, 1, 'garona/97/56565857-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(107, 'zazagentil', 100, 0, 'garona/46/56717358-avatar.jpg', 'garona', 0, 0, 5, 7, 2, NULL, 0),
(108, 'Ðeltasu', 100, 0, 'garona/144/56734608-avatar.jpg', 'garona', 718, 0, 3, 1, NULL, NULL, 0),
(109, 'nayka', 100, 1, 'garona/75/56993099-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(110, 'wartax', 100, 0, 'garona/125/57239933-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(111, 'galiowyn', 100, 0, 'garona/12/57240076-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(112, 'philémons', 100, 0, 'garona/186/57348538-avatar.jpg', 'garona', 712, 0, 9, 7, NULL, NULL, 0),
(113, 'smado', 100, 0, 'garona/114/57897330-avatar.jpg', 'garona', 0, 0, 10, 7, 2, NULL, 0),
(114, 'thyios', 100, 1, 'garona/106/57899626-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(115, 'unnder', 100, 0, 'garona/253/58228221-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(116, 'coonta', 100, 1, 'garona/127/59596159-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(117, 'kâlia', 100, 1, 'garona/223/59663071-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(118, 'jesuisblonde', 100, 1, 'garona/179/59805875-avatar.jpg', 'garona', 0, 0, 4, 1, 2, NULL, 0),
(119, 'olaf', 100, 0, 'garona/235/59918571-avatar.jpg', 'garona', 0, 0, 6, 3, 2, NULL, 0),
(120, 'aygul', 100, 1, 'garona/229/59934181-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(121, 'thynael', 100, 1, 'garona/112/60011888-avatar.jpg', 'garona', 0, 0, 6, 22, 2, NULL, 0),
(122, 'drethz', 100, 0, 'garona/61/60030013-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(123, 'amnésiâ', 100, 1, 'garona/24/60044568-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(124, 'aryaa', 100, 1, 'garona/119/60073847-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(125, 'ciryaliel', 100, 1, 'garona/237/60352493-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(126, 'heldin', 100, 0, 'garona/80/60588112-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(127, 'kâdyll', 100, 1, 'garona/244/60942836-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(128, 'kàdyll', 100, 1, 'garona/85/61138261-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(129, 'ivøri', 100, 1, 'garona/232/61292008-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(130, 'alys', 100, 1, 'garona/216/61403608-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(131, 'deathss', 100, 0, 'garona/187/61502395-avatar.jpg', 'garona', 0, 0, 6, 22, 2, NULL, 0),
(132, 'angelÿn', 100, 1, 'garona/15/61609999-avatar.jpg', 'garona', 0, 0, 8, 25, 2, NULL, 0),
(133, 'yoshino', 100, 1, 'garona/60/61798972-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(134, 'baêlle', 100, 1, 'garona/214/62194646-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(135, 'suyon', 100, 1, 'garona/141/62668429-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(136, 'yukïno', 100, 1, 'garona/164/62752932-avatar.jpg', 'garona', 0, 0, 6, 11, 2, NULL, 0),
(137, 'samisa', 100, 1, 'garona/43/62753835-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(138, 'jisun', 100, 1, 'garona/42/63894058-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(139, 'ayumu', 100, 1, 'garona/202/63920074-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(140, 'mickie', 100, 1, 'garona/119/65614711-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(141, 'minji', 100, 1, 'garona/115/65681011-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(142, 'acta', 100, 1, 'nerzhul/92/65854812-avatar.jpg', 'ner''zhul', 0, 0, 3, 11, 2, NULL, 0),
(143, 'nathe', 100, 1, 'nerzhul/77/65920589-avatar.jpg', 'ner''zhul', 0, 0, 5, 1, 2, NULL, 0),
(144, 'kréa', 100, 1, 'nerzhul/121/65934969-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 2, NULL, 0),
(145, 'eclypse', 100, 1, 'nerzhul/179/66122931-avatar.jpg', 'ner''zhul', 0, 0, 3, 22, 2, NULL, 0),
(146, 'healle', 100, 1, 'nerzhul/96/66131296-avatar.jpg', 'ner''zhul', 0, 0, 5, 4, 2, NULL, 0),
(147, 'emac', 100, 1, 'nerzhul/218/66211802-avatar.jpg', 'ner''zhul', 0, 0, 1, 22, 2, NULL, 0),
(148, 'dìgg', 100, 0, 'nerzhul/173/66213549-avatar.jpg', 'ner''zhul', 0, 0, 8, 11, 2, NULL, 0),
(149, 'wumbat', 100, 0, 'nerzhul/180/66235060-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 2, NULL, 0),
(150, 'lnaudru', 100, 1, 'nerzhul/232/66251496-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 2, NULL, 0),
(151, 'alwynn', 100, 0, 'garona/253/66481661-avatar.jpg', 'garona', 728, 0, 5, 4, NULL, NULL, 0),
(152, 'särãh', 100, 1, 'nerzhul/90/66518106-avatar.jpg', 'ner''zhul', 0, 0, 3, 1, 2, NULL, 0),
(153, 'baldar', 100, 0, 'nerzhul/61/66540093-avatar.jpg', 'ner''zhul', 0, 0, 2, 1, 2, NULL, 0),
(154, 'xylomi', 100, 1, 'nerzhul/185/66549177-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 2, NULL, 0),
(155, 'hassakura', 100, 0, 'nerzhul/104/66554472-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 2, NULL, 0),
(156, 'bellame', 100, 1, 'garona/86/67268182-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(157, 'karacast', 100, 1, 'garona/89/67511385-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(158, 'kaara', 100, 1, 'garona/152/67514776-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(159, 'cøcalight', 100, 1, 'garona/69/67702597-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(160, 'karaoutai', 100, 1, 'garona/10/67769098-avatar.jpg', 'garona', 0, 0, 5, 7, 2, NULL, 0),
(161, 'zygore', 100, 0, 'garona/94/67822686-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(162, 'kimtan', 100, 1, 'garona/37/68474149-avatar.jpg', 'garona', 0, 0, 10, 4, 2, NULL, 0),
(163, 'jiwon', 100, 1, 'garona/83/68678739-avatar.jpg', 'garona', 0, 0, 6, 4, 2, NULL, 0),
(164, 'okarin', 100, 0, 'garona/37/69615909-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(165, 'mûrmûr', 100, 1, 'garona/95/69866079-avatar.jpg', 'garona', 0, 0, 9, 22, 2, NULL, 0),
(166, 'cøcazerø', 100, 0, 'garona/86/70524502-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(167, 'graalimpie', 100, 0, 'nerzhul/192/71505600-avatar.jpg', 'ner''zhul', 0, 0, 6, 4, 2, NULL, 0),
(168, 'kadyl', 100, 1, 'garona/31/71591199-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(169, 'mizutani', 100, 1, 'garona/21/72120085-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(170, 'jevo', 100, 0, 'garona/124/73588092-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(171, 'yùkinà', 100, 1, 'garona/1/73646593-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(172, 'hayes', 100, 1, 'garona/99/73668963-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(173, 'timelord', 100, 0, 'nerzhul/53/73684021-avatar.jpg', 'ner''zhul', 0, 0, 1, 4, 2, NULL, 0),
(174, 'niylla', 100, 1, 'garona/133/73691781-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(175, 'destinee', 100, 1, 'garona/76/73718092-avatar.jpg', 'garona', 0, 0, 8, 25, 2, NULL, 0),
(176, 'tîmelord', 100, 0, 'nerzhul/38/73722406-avatar.jpg', 'ner''zhul', 0, 0, 3, 4, 2, NULL, 0),
(177, 'yùkinø', 100, 1, 'garona/144/73912720-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(178, 'belleange', 100, 1, 'garona/253/73919997-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(179, 'antaruss', 100, 1, 'garona/10/74018058-avatar.jpg', 'garona', 726, 0, 10, 1, NULL, NULL, 0),
(180, 'christange', 100, 1, 'garona/87/74051159-avatar.jpg', 'garona', 698, 0, 2, 1, NULL, NULL, 0),
(181, 'minianta', 100, 1, 'garona/159/74222495-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(182, 'lenøre', 100, 1, 'garona/130/74374274-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(183, 'bloodynight', 100, 1, 'garona/213/74478293-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(184, 'xeralynn', 100, 1, 'garona/191/75077567-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(185, 'lishaoran', 100, 0, 'garona/128/75897728-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(186, 'benjiwars', 100, 0, 'garona/232/75921640-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(187, 'kashyk', 100, 1, 'garona/172/75924396-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(188, 'angelicka', 100, 1, 'garona/205/77464525-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(189, 'sfy', 100, 0, 'nerzhul/77/77472589-avatar.jpg', 'ner''zhul', 717, 0, 8, 1, NULL, NULL, 0),
(190, 'jevy', 100, 0, 'garona/192/78349504-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(191, 'nosfia', 100, 1, 'garona/196/78395588-avatar.jpg', 'garona', 0, 0, 1, 25, 2, NULL, 0),
(192, 'ewanaelle', 100, 1, 'garona/83/84882771-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(193, 'aldure', 100, 0, 'sargeras/154/89034650-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(194, 'miks', 100, 1, 'sargeras/106/89038442-avatar.jpg', 'sargeras', 722, 0, 9, 1, NULL, NULL, 0),
(195, 'balrog', 100, 0, 'sargeras/68/89081924-avatar.jpg', 'sargeras', 0, 0, 1, 22, 2, NULL, 0),
(196, 'dogua', 100, 0, 'sargeras/166/89086886-avatar.jpg', 'sargeras', 0, 0, 9, 1, 2, NULL, 0),
(197, 'ildriar', 100, 0, 'sargeras/166/89091494-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(198, 'misswow', 100, 1, 'sargeras/195/89097923-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(199, 'azalaïs', 100, 1, 'sargeras/66/89184834-avatar.jpg', 'sargeras', 0, 0, 5, 4, 2, NULL, 0),
(200, 'drahas', 100, 0, 'sargeras/63/89275455-avatar.jpg', 'sargeras', 0, 0, 6, 11, 2, NULL, 0),
(201, 'chlöre', 100, 1, 'sargeras/96/89276000-avatar.jpg', 'sargeras', 0, 0, 6, 4, 2, NULL, 0),
(202, 'sealyna', 100, 1, 'sargeras/85/89280341-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(203, 'pushup', 100, 1, 'sargeras/20/89295892-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(204, 'belnadifia', 100, 1, 'sargeras/228/89356004-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(205, 'tohetta', 100, 1, 'sargeras/252/89367292-avatar.jpg', 'sargeras', 0, 0, 6, 1, 2, NULL, 0),
(206, 'damnetus', 100, 0, 'sargeras/24/89529880-avatar.jpg', 'sargeras', 0, 0, 11, 22, 2, NULL, 0),
(207, 'trinquette', 100, 1, 'sargeras/139/89549707-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(208, 'parlevent', 100, 1, 'sargeras/9/89552649-avatar.jpg', 'sargeras', 0, 0, 7, 11, 2, NULL, 0),
(209, 'asharaak', 100, 0, 'sargeras/151/89552791-avatar.jpg', 'sargeras', 0, 0, 4, 22, 2, NULL, 0),
(210, 'drèams', 100, 1, 'sargeras/86/89564502-avatar.jpg', 'sargeras', 0, 0, 9, 1, 2, NULL, 0),
(211, 'kimaria', 100, 1, 'sargeras/20/89609748-avatar.jpg', 'sargeras', 0, 0, 9, 1, 2, NULL, 0),
(212, 'ango', 100, 1, 'sargeras/73/89630537-avatar.jpg', 'sargeras', 0, 0, 5, 11, 2, NULL, 0),
(213, 'tifettes', 100, 1, 'sargeras/175/89636527-avatar.jpg', 'sargeras', 0, 0, 8, 4, 2, NULL, 0),
(214, 'riddick', 100, 0, 'sargeras/193/89665985-avatar.jpg', 'sargeras', 705, 0, 4, 1, NULL, NULL, 0),
(215, 'lotùs', 100, 1, 'sargeras/240/89688304-avatar.jpg', 'sargeras', 0, 0, 4, 4, 2, NULL, 0),
(216, 'maenira', 100, 1, 'sargeras/18/89702930-avatar.jpg', 'sargeras', 0, 0, 5, 1, 2, NULL, 0),
(217, 'nynja', 100, 0, 'sargeras/150/89718422-avatar.jpg', 'sargeras', 0, 0, 10, 25, 2, NULL, 0),
(218, 'xàe', 100, 1, 'sargeras/27/89733403-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(219, 'feniks', 100, 1, 'sargeras/78/89738318-avatar.jpg', 'sargeras', 0, 0, 10, 1, 2, NULL, 0),
(220, 'azhrei', 100, 0, 'sargeras/22/89739798-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(221, 'fenixia', 100, 1, 'sargeras/178/89743282-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(222, 'omezaroth', 100, 0, 'sargeras/19/89854483-avatar.jpg', 'sargeras', 0, 0, 3, 4, 2, NULL, 0),
(223, 'gromack', 100, 0, 'sargeras/112/90017136-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(224, 'liköpi', 100, 0, 'sargeras/255/90054655-avatar.jpg', 'sargeras', 718, 0, 7, 11, NULL, NULL, 0),
(225, 'zephyel', 100, 0, 'sargeras/38/90068262-avatar.jpg', 'sargeras', 0, 0, 9, 22, 2, NULL, 0),
(226, 'haknarion', 100, 0, 'sargeras/136/90073736-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(227, 'spartìate', 100, 1, 'sargeras/25/92064537-avatar.jpg', 'sargeras', 0, 0, 1, 4, 2, NULL, 0),
(228, 'Üther', 100, 0, 'garona/154/93266586-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(229, 'nebutron', 100, 0, 'garona/80/93613392-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(230, 'midoru', 100, 0, 'garona/174/93614510-avatar.jpg', 'garona', 0, 0, 3, 22, 2, NULL, 0),
(231, 'prédictrice', 100, 1, 'garona/236/93673708-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(232, 'xinding', 100, 1, 'garona/38/93801510-avatar.jpg', 'garona', 0, 0, 4, 1, 2, NULL, 0),
(233, 'timelôrd', 100, 0, 'nerzhul/61/93863997-avatar.jpg', 'ner''zhul', 0, 0, 11, 4, 2, NULL, 0),
(234, 'titepoucette', 100, 1, 'garona/69/94163269-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(235, 'madiran', 100, 1, 'garona/244/94179572-avatar.jpg', 'garona', 708, 0, 8, 1, NULL, NULL, 0),
(236, 'nokitsune', 100, 1, 'garona/242/94319090-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(237, 'xäntra', 100, 1, 'garona/175/94611375-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(238, 'zélya', 100, 1, 'sargeras/179/94718131-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(239, 'seyer', 100, 0, 'sargeras/86/94837334-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(240, 'kàdyl', 100, 1, 'garona/110/95004270-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(241, 'wochifan', 100, 0, 'garona/245/95029749-avatar.jpg', 'garona', 719, 0, 10, 25, NULL, NULL, 0),
(242, 'orophinae', 100, 1, 'garona/236/95043564-avatar.jpg', 'garona', 0, 0, 5, 11, 2, NULL, 0),
(243, 'eiziah', 100, 1, 'garona/93/95045213-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(244, 'raenis', 100, 0, 'sargeras/229/95116261-avatar.jpg', 'sargeras', 0, 0, 3, 4, 2, NULL, 0),
(245, 'zoar', 100, 0, 'sargeras/228/95148004-avatar.jpg', 'sargeras', 0, 0, 9, 7, 2, NULL, 0),
(246, 'eon', 100, 1, 'garona/17/95441937-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(247, 'nøsfé', 100, 0, 'garona/244/95503092-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(248, 'irginwor', 100, 0, 'nerzhul/62/95794238-avatar.jpg', 'ner''zhul', 0, 0, 9, 1, 2, NULL, 0),
(249, 'ayshell', 100, 1, 'sargeras/62/96186942-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(250, 'kâdyl', 100, 1, 'garona/25/96249369-avatar.jpg', 'garona', 728, 0, 9, 1, NULL, NULL, 0),
(251, 'elyä', 100, 1, 'garona/84/96272212-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(252, 'galérius', 100, 0, 'garona/235/96323819-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(253, 'amassis', 100, 0, 'sargeras/105/96431465-avatar.jpg', 'sargeras', 0, 0, 8, 11, 2, NULL, 0),
(254, 'lèvy', 100, 1, 'garona/246/96557046-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(255, 'märgâlärds', 100, 0, 'garona/13/96674829-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(256, 'kidipet', 100, 0, 'garona/169/96749993-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(257, 'myllenia', 100, 1, 'sargeras/149/96820373-avatar.jpg', 'sargeras', 0, 0, 5, 1, 2, NULL, 0),
(258, 'kidisparai', 100, 0, 'garona/183/96877239-avatar.jpg', 'garona', 0, 0, 1, 3, 2, NULL, 0),
(259, 'ida', 100, 1, 'garona/80/96981584-avatar.jpg', 'garona', 0, 0, 4, 3, 2, NULL, 0),
(260, 'anÿ', 100, 1, 'garona/13/96982797-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(261, 'belanima', 100, 1, 'garona/41/97195305-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(262, 'hibe', 100, 0, 'sargeras/193/97235905-avatar.jpg', 'sargeras', 0, 0, 2, 3, 2, NULL, 0),
(263, 'kâdyll', 100, 1, 'nerzhul/146/97287058-avatar.jpg', 'ner''zhul', 0, 0, 4, 1, 2, NULL, 0),
(264, 'myllé', 100, 1, 'sargeras/75/97468747-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(265, 'cëly', 100, 1, 'garona/12/98057228-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(266, 'kuramì', 100, 1, 'garona/5/98185477-avatar.jpg', 'garona', 0, 0, 7, 25, 2, NULL, 0),
(267, 'chandrak', 100, 1, 'garona/19/98205971-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(268, 'kazathwin', 100, 0, 'garona/77/98251853-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(269, 'commonbaby', 100, 0, 'sargeras/125/98300541-avatar.jpg', 'sargeras', 705, 0, 1, 1, NULL, NULL, 0),
(270, 'luminara', 100, 1, 'garona/112/98507376-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(271, 'tatoon', 100, 1, 'garona/148/98531988-avatar.jpg', 'garona', 0, 0, 5, 4, 2, NULL, 0),
(272, 'løuu', 100, 1, 'garona/65/98663233-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(273, 'shaölin', 100, 0, 'garona/158/98933406-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(274, 'rénovatrice', 100, 1, 'garona/53/99038261-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(275, 'protectrice', 100, 1, 'garona/68/99038276-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(276, 'ragnfrid', 100, 1, 'nerzhul/113/99224689-avatar.jpg', 'ner''zhul', 0, 0, 2, 11, 2, NULL, 0),
(277, 'lorelaïs', 100, 1, 'sargeras/190/99256766-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(278, 'nénuphar', 100, 1, 'sargeras/198/99263174-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(279, 'frizzy', 100, 1, 'garona/151/99375255-avatar.jpg', 'garona', 0, 0, 8, 11, 2, NULL, 0),
(280, 'equinoc', 100, 0, 'garona/198/99486150-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(281, 'gàdock', 100, 0, 'garona/67/99504451-avatar.jpg', 'garona', 730, 0, 2, 3, NULL, NULL, 0),
(282, 'kïkï', 100, 1, 'garona/18/99551250-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(283, 'darthvicious', 100, 0, 'nerzhul/134/99609478-avatar.jpg', 'ner''zhul', 0, 0, 6, 1, 2, NULL, 0),
(284, 'kadyll', 100, 0, 'sargeras/208/99687376-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(285, 'daxou', 100, 0, 'garona/164/99707812-avatar.jpg', 'garona', 0, 0, 3, 3, 2, NULL, 0),
(286, 'jolarson', 100, 0, 'garona/15/99708175-avatar.jpg', 'garona', 728, 0, 2, 1, NULL, NULL, 0),
(287, 'dameos', 100, 0, 'garona/170/99708330-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(288, 'nawamoon', 100, 1, 'garona/146/99708562-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(289, 'isyama', 100, 1, 'garona/185/99710649-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(290, 'syriana', 100, 1, 'garona/215/99710935-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(291, 'drassien', 100, 0, 'garona/204/99721420-avatar.jpg', 'garona', 0, 0, 9, 22, 2, NULL, 0),
(292, 'potak', 100, 0, 'garona/141/99785101-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(293, 'zekee', 100, 0, 'garona/209/99812817-avatar.jpg', 'garona', 0, 0, 4, 22, 2, NULL, 0),
(294, 'pixie', 100, 1, 'garona/51/99822899-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(295, 'kälïndrä', 100, 1, 'garona/126/99853694-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(296, 'dürkor', 100, 0, 'garona/3/100087043-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(297, 'nourslaouf', 100, 1, 'sargeras/50/100186162-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(298, 'iphigénias', 100, 1, 'garona/223/100218335-avatar.jpg', 'garona', 0, 0, 3, 11, 2, NULL, 0),
(299, 'persefal', 100, 0, 'garona/7/100224775-avatar.jpg', 'garona', 710, 0, 11, 22, NULL, NULL, 0),
(300, 'tiliön', 100, 0, 'sargeras/250/100260346-avatar.jpg', 'sargeras', 0, 0, 3, 4, 2, NULL, 0),
(301, 'farramirht', 100, 0, 'garona/201/100285641-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(302, 'byx', 100, 1, 'garona/224/100363488-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(303, 'dhämey', 100, 1, 'garona/15/100442127-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(304, 'myllénième', 100, 1, 'sargeras/83/100450643-avatar.jpg', 'sargeras', 0, 0, 10, 1, 2, NULL, 0),
(305, 'arrowdiac', 100, 0, 'garona/132/100508036-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(306, 'yükinø', 100, 1, 'garona/239/100547311-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(307, 'saggitarius', 100, 0, 'sargeras/97/100550241-avatar.jpg', 'sargeras', 0, 0, 9, 22, 2, NULL, 0),
(308, 'redd', 100, 0, 'garona/205/100577741-avatar.jpg', 'garona', 0, 0, 4, 22, 2, NULL, 0),
(309, 'melyria', 100, 1, 'garona/128/100578688-avatar.jpg', 'garona', 0, 0, 5, 22, 2, NULL, 0),
(310, 'bonobo', 100, 1, 'garona/151/100625815-avatar.jpg', 'garona', 0, 0, 10, 4, 2, NULL, 0),
(311, 'neeli', 100, 1, 'garona/92/100661340-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(312, 'edmun', 100, 0, 'nerzhul/120/100721784-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 2, NULL, 0),
(313, 'cøuette', 100, 1, 'garona/153/100756889-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(314, 'thoby', 100, 0, 'garona/105/100765545-avatar.jpg', 'garona', 0, 0, 6, 22, 2, NULL, 0),
(315, 'naïntuable', 100, 0, 'garona/231/100769255-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(316, 'trìs', 100, 1, 'garona/82/100809554-avatar.jpg', 'garona', 723, 0, 11, 4, NULL, NULL, 0),
(317, 'gadounette', 100, 1, 'garona/115/100829043-avatar.jpg', 'garona', 0, 0, 5, 11, 2, NULL, 0),
(318, 'nowek', 100, 1, 'sargeras/232/100914408-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(319, 'ptibouldpoil', 100, 0, 'garona/214/100969686-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(320, 'natundra', 100, 1, 'sargeras/42/100976170-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(321, 'seiily', 100, 1, 'sargeras/21/101098773-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(322, 'chamyfou', 100, 0, 'sargeras/92/101108828-avatar.jpg', 'sargeras', 706, 0, 7, 25, NULL, NULL, 0),
(323, 'dayia', 100, 1, 'garona/66/101109314-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(324, 'elenorias', 100, 1, 'sargeras/106/101133674-avatar.jpg', 'sargeras', 0, 0, 9, 1, 2, NULL, 0),
(325, 'marlöw', 100, 0, 'garona/143/101380751-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(326, 'woôd', 100, 0, 'garona/231/101402599-avatar.jpg', 'garona', 723, 0, 11, 4, NULL, NULL, 0),
(327, 'lania', 100, 1, 'sargeras/137/101420169-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(328, 'pesthys', 100, 1, 'garona/128/101501824-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(329, 'mîou', 100, 1, 'sargeras/212/101528788-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(330, 'mîû', 100, 1, 'sargeras/116/101539700-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(331, 'noriah', 100, 1, 'garona/204/101565388-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(332, 'copaincochon', 100, 0, 'garona/146/101653394-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(333, 'myurogue', 100, 1, 'sargeras/24/101660696-avatar.jpg', 'sargeras', 0, 0, 4, 3, 2, NULL, 0),
(334, 'myû', 100, 1, 'sargeras/72/101688136-avatar.jpg', 'sargeras', 0, 0, 3, 1, 2, NULL, 0),
(335, 'miöü', 100, 1, 'sargeras/52/101781300-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(336, 'myouu', 100, 1, 'sargeras/46/101840174-avatar.jpg', 'sargeras', 0, 0, 6, 11, 2, NULL, 0),
(337, 'zigloo', 100, 0, 'sargeras/80/102043984-avatar.jpg', 'sargeras', 0, 0, 6, 1, 2, NULL, 0),
(338, 'jðke', 100, 0, 'garona/178/102047666-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(339, 'myumonk', 100, 1, 'sargeras/62/102097726-avatar.jpg', 'sargeras', 0, 0, 10, 1, 2, NULL, 0),
(340, 'shapodpaille', 100, 1, 'garona/227/102107107-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(341, 'féniks', 100, 1, 'sargeras/225/102218721-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(342, 'miucham', 100, 0, 'sargeras/134/102253446-avatar.jpg', 'sargeras', 0, 0, 7, 11, 2, NULL, 0),
(343, 'myuwar', 100, 1, 'sargeras/29/102320925-avatar.jpg', 'sargeras', 0, 0, 1, 7, 2, NULL, 0),
(344, 'myupriest', 100, 1, 'sargeras/26/102329114-avatar.jpg', 'sargeras', 0, 0, 5, 1, 2, NULL, 0),
(345, 'myudemo', 100, 1, 'sargeras/33/102329121-avatar.jpg', 'sargeras', 0, 0, 9, 7, 2, NULL, 0),
(346, 'garfunk', 100, 1, 'garona/164/102413220-avatar.jpg', 'garona', 0, 0, 8, 4, 2, NULL, 0),
(347, 'escaheris', 100, 0, 'garona/44/102492716-avatar.jpg', 'garona', 689, 0, 8, 1, NULL, NULL, 0),
(348, 'gothmog', 100, 0, 'nerzhul/138/102506122-avatar.jpg', 'ner''zhul', 0, 0, 9, 1, 2, NULL, 0),
(349, 'capiana', 100, 1, 'garona/70/102515782-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(350, 'myllésime', 100, 1, 'sargeras/36/102587940-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(351, 'sâber', 100, 1, 'garona/145/102615441-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(352, 'peckeur', 100, 0, 'garona/69/102676293-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(353, 'balcmeg', 100, 0, 'garona/226/102748898-avatar.jpg', 'garona', 0, 0, 3, 22, 2, NULL, 0),
(354, 'orgäna', 100, 1, 'garona/124/102948732-avatar.jpg', 'garona', 0, 0, 5, 4, 2, NULL, 0),
(355, 'yooda', 100, 0, 'garona/147/102948755-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(356, 'amidalä', 100, 1, 'garona/0/102993152-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(357, 'watto', 100, 0, 'garona/127/102993791-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(358, 'fréya', 100, 1, 'garona/87/103414103-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(359, 'belami', 100, 0, 'garona/252/103604476-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(360, 'malonys', 100, 1, 'nerzhul/120/103699320-avatar.jpg', 'ner''zhul', 0, 0, 11, 4, 2, NULL, 0),
(361, 'cavina', 100, 1, 'garona/174/103755438-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(362, 'keldrys', 100, 0, 'garona/179/103814579-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(363, 'mjøllnïr', 100, 0, 'garona/17/103854865-avatar.jpg', 'garona', 707, 0, 1, 3, NULL, NULL, 0),
(364, 'subkryss', 100, 0, 'garona/234/103856874-avatar.jpg', 'garona', 705, 0, 6, 4, NULL, NULL, 0),
(365, 'mîôû', 100, 1, 'sargeras/238/103861998-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(366, 'akakaros', 100, 0, 'garona/39/103966759-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(367, 'greey', 100, 0, 'garona/65/104301633-avatar.jpg', 'garona', 0, 0, 7, 25, 2, NULL, 0),
(368, 'storran', 100, 0, 'garona/127/104337279-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(369, 'jeanluc', 100, 0, 'garona/199/104374983-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(370, 'gârfunk', 100, 1, 'garona/181/104378805-avatar.jpg', 'garona', 723, 0, 10, 11, NULL, NULL, 0),
(371, 'justyce', 100, 1, 'sargeras/167/104588455-avatar.jpg', 'sargeras', 0, 0, 5, 1, 2, NULL, 0),
(372, 'castharian', 100, 0, 'garona/38/104878630-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(373, 'kadeska', 100, 1, 'sargeras/250/104889082-avatar.jpg', 'sargeras', 0, 0, 8, 11, 2, NULL, 0),
(374, 'trìskel', 100, 1, 'garona/26/104911642-avatar.jpg', 'garona', 722, 0, 5, 1, NULL, NULL, 0),
(375, 'xântra', 100, 1, 'garona/23/104968727-avatar.jpg', 'garona', 713, 0, 11, 4, NULL, NULL, 0),
(376, 'faïlly', 100, 0, 'garona/74/104989514-avatar.jpg', 'garona', 717, 0, 5, 3, NULL, NULL, 0),
(377, 'nïcky', 100, 1, 'garona/67/105019459-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(378, 'kimiia', 100, 1, 'sargeras/134/105146758-avatar.jpg', 'sargeras', 0, 0, 3, 1, 2, NULL, 0),
(379, 'petifour', 100, 0, 'garona/199/105203655-avatar.jpg', 'garona', 707, 0, 3, 11, NULL, NULL, 0),
(380, 'redo', 100, 0, 'garona/6/105300230-avatar.jpg', 'garona', 0, 0, 1, 22, 2, NULL, 0),
(381, 'sloveyn', 100, 1, 'garona/172/105300908-avatar.jpg', 'garona', 0, 0, 7, 25, 2, NULL, 0),
(382, 'eskrasi', 100, 0, 'garona/70/105370694-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(383, 'mallidan', 100, 0, 'sargeras/107/105375595-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(384, 'lunafreya', 100, 1, 'garona/209/105382865-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(385, 'yujimbo', 100, 0, 'nerzhul/18/105385746-avatar.jpg', 'ner''zhul', 665, 0, 12, 4, NULL, NULL, 0),
(386, 'tulimanu', 100, 1, 'garona/162/105395618-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(387, 'vorpile', 100, 1, 'sargeras/111/105395823-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(388, 'mîôöu', 100, 1, 'sargeras/32/105412896-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(389, 'alyssia', 100, 1, 'garona/243/105439987-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(390, 'damillie', 100, 1, 'garona/88/105447256-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(391, 'demonføu', 100, 0, 'sargeras/199/105448903-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(392, 'kadyll', 100, 1, 'garona/27/105453339-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(393, 'hestïä', 100, 1, 'garona/238/105454062-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(394, 'sentiel', 100, 0, 'garona/57/105479993-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(395, 'chlorée', 100, 1, 'sargeras/133/105497989-avatar.jpg', 'sargeras', 666, 0, 12, 4, NULL, NULL, 0),
(396, 'akoonette', 100, 1, 'garona/171/105514667-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(397, 'trìskali', 100, 1, 'garona/79/105527631-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(398, 'néréha', 100, 1, 'garona/240/105538800-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(399, 'doomscham', 100, 1, 'garona/32/105545504-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(400, 'succubi', 100, 1, 'nerzhul/174/105554606-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 2, NULL, 0),
(401, 'mesrïne', 100, 0, 'sargeras/200/105556424-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(402, 'kryonos', 100, 0, 'garona/193/105560513-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(403, 'alyss', 100, 1, 'garona/226/105563618-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(404, 'darmalma', 100, 0, 'garona/212/105570516-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(405, 'aerria', 100, 1, 'sargeras/178/105571762-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(406, 'diäblar', 100, 0, 'garona/100/105587044-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(407, 'dhärmey', 100, 0, 'garona/141/105611149-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(408, 'morgorth', 100, 0, 'garona/175/105613999-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(409, 'daénérys', 100, 1, 'garona/53/105617973-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(410, 'malania', 100, 1, 'garona/117/105619829-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(411, 'wochini', 100, 0, 'garona/166/105674150-avatar.jpg', 'garona', 0, 0, 1, 25, 2, NULL, 0),
(412, 'antarüs', 100, 1, 'garona/44/105677612-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(413, 'lizis', 100, 0, 'nerzhul/232/105677800-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 2, NULL, 0),
(414, 'cèly', 100, 1, 'garona/246/105677814-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(415, 'nolane', 100, 1, 'sargeras/131/89576835-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(416, 'chasøu', 100, 0, 'garona/48/42388272-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(417, 'jugar', 100, 1, 'sargeras/136/89644168-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(418, 'kîmy', 100, 1, 'sargeras/221/101268189-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(419, 'sallanaeth', 100, 1, 'sargeras/254/105403134-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(420, 'katlynna', 100, 1, 'garona/96/93569376-avatar.jpg', 'garona', 0, 0, 8, 11, 2, NULL, 0),
(421, 'nabetse', 100, 1, 'garona/129/96775809-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(422, 'mystra_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(423, 'mystra_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(424, 'mystra_1_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(425, 'mystra_1_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(562, 'alexior', 100, 0, 'rashgarroth/188/67662268-avatar.jpg', 'rashgarroth', 718, 0, 5, 1, NULL, NULL, 0),
(563, 'ambroqme', 100, 0, 'dalaran/253/117303549-avatar.jpg', 'dalaran', 705, 0, 1, 11, NULL, NULL, 0),
(564, 'bottm', 100, 1, 'aegwynn/155/120400795-avatar.jpg', 'aegwynn', 716, 0, 3, 4, NULL, NULL, 0),
(565, 'byzzih', 100, 1, 'hyjal/198/139945414-avatar.jpg', 'hyjal', 714, 0, 7, 3, NULL, NULL, 0),
(566, 'gintam', 100, 0, 'pozzo-delleternita/251/78135803-avatar.jpg', 'pozzo dell''eternità', 700, 0, 1, 1, NULL, NULL, 0),
(567, 'hellting', 100, 0, 'archimonde/132/139806084-avatar.jpg', 'archimonde', 700, 0, 6, 1, NULL, NULL, 0),
(568, 'magow', 100, 0, 'kirin-tor/216/105736664-avatar.jpg', 'kirin tor', 718, 0, 8, 22, NULL, NULL, 0),
(569, 'maltrina', 100, 1, 'tarren-mill/65/120683585-avatar.jpg', 'tarren mill', 702, 0, 8, 1, NULL, NULL, 0),
(570, 'mÿsti', 100, 1, 'kirin-tor/139/105779083-avatar.jpg', 'kirin tor', 734, 0, 11, 22, NULL, NULL, 0),
(571, 'nèphael', 100, 1, 'khaz-modan/104/115829352-avatar.jpg', 'khaz modan', 736, 0, 8, 25, NULL, NULL, 0),
(572, 'roxira', 100, 1, 'la-croisade-ecarlate/201/30653641-avatar.jpg', 'la croisade écarlate', 713, 0, 11, 4, NULL, NULL, 0),
(573, 'saera', 100, 1, 'garona/112/94568304-avatar.jpg', 'garona', 703, 0, 8, 1, NULL, NULL, 0),
(574, 'yamitatsu', 100, 0, 'hyjal/187/139667899-avatar.jpg', 'hyjal', 711, 0, 11, 22, NULL, NULL, 0),
(577, 'rappaden', 100, 0, 'hyjal/192/137266368-avatar.jpg', 'hyjal', 726, 0, 10, 25, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
  `idRace` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idRace`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Vider la table avant d'insérer `race`
--

TRUNCATE TABLE `race`;
--
-- Contenu de la table `race`
--

INSERT INTO `race` (`idRace`, `nom`, `icon`) VALUES
(1, 'Human', NULL),
(2, 'Orc', NULL),
(3, 'Dwarf', NULL),
(4, 'Night Elf', NULL),
(5, 'Undead', NULL),
(6, 'Tauren', NULL),
(7, 'Gnome', NULL),
(8, 'Troll', NULL),
(9, 'Goblin', NULL),
(10, 'Blood Elf', NULL),
(11, 'Draeneï', NULL),
(22, 'Worgen', NULL),
(24, 'Pandaren', NULL),
(25, 'Pandaren', NULL),
(26, 'Pandaren', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `raids`
--

DROP TABLE IF EXISTS `raids`;
CREATE TABLE IF NOT EXISTS `raids` (
  `idRaid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `idEvenements` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_bin,
  `valeur` float(6,2) DEFAULT '0.00',
  `ajoutePar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `majPar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `idRosterTmp` int(11) NOT NULL COMMENT 'A virer une fois le lien vers evenement codé',
  `idZoneTmp` int(11) NOT NULL COMMENT 'A virer une fois le lien vers evenement codé',
  `idMode` int(11) NOT NULL COMMENT 'A virer une fois le lien vers evenement codé',
  PRIMARY KEY (`idRaid`),
  KEY `fk_raids_evenements1_idx` (`idEvenements`),
  KEY `fk_raids_roster1_idx` (`idRosterTmp`),
  KEY `fk_raids_zone1_idx` (`idZoneTmp`),
  KEY `fk_raids_mode_difficulte1_idx` (`idMode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Vider la table avant d'insérer `raids`
--

TRUNCATE TABLE `raids`;
--
-- Contenu de la table `raids`
--

INSERT INTO `raids` (`idRaid`, `idEvenements`, `date`, `note`, `valeur`, `ajoutePar`, `majPar`, `idRosterTmp`, `idZoneTmp`, `idMode`) VALUES
(16, NULL, '2016-07-30 19:55:35', 'raid 1', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 1, 7545, 14),
(21, NULL, '2016-08-17 18:44:49', 'raid 2', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 1, 7545, 15),
(22, NULL, '2015-08-17 18:44:49', 'raid 3', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 2, 7545, 15),
(23, NULL, '2015-08-17 18:44:49', 'raid 4', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 1, 6967, 15),
(24, NULL, '2015-08-17 18:44:49', 'raid 5', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 2, 6967, 15),
(25, NULL, '2015-08-17 18:44:49', 'raid 6', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 2, 7545, 14);

-- --------------------------------------------------------

--
-- Structure de la table `raid_personnage`
--

DROP TABLE IF EXISTS `raid_personnage`;
CREATE TABLE IF NOT EXISTS `raid_personnage` (
  `idRaid` mediumint(8) NOT NULL,
  `idPersonnage` int(11) NOT NULL,
  PRIMARY KEY (`idRaid`,`idPersonnage`),
  KEY `fk_raid_personnage_raids1_idx` (`idRaid`),
  KEY `fk_raid_personnage_personnages1_idx` (`idPersonnage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `raid_personnage`
--

TRUNCATE TABLE `raid_personnage`;
--
-- Contenu de la table `raid_personnage`
--

INSERT INTO `raid_personnage` (`idRaid`, `idPersonnage`) VALUES
(16, 179),
(21, 179),
(22, 179),
(23, 179),
(24, 179),
(25, 179);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Vider la table avant d'insérer `role`
--

TRUNCATE TABLE `role`;
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

DROP TABLE IF EXISTS `roster`;
CREATE TABLE IF NOT EXISTS `roster` (
  `idRoster` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`idRoster`),
  UNIQUE KEY `nom_UNIQUE` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vider la table avant d'insérer `roster`
--

TRUNCATE TABLE `roster`;
--
-- Contenu de la table `roster`
--

INSERT INTO `roster` (`idRoster`, `nom`) VALUES
(1, 'mystra'),
(2, 'mystra_1');

-- --------------------------------------------------------

--
-- Structure de la table `roster_has_personnage`
--

DROP TABLE IF EXISTS `roster_has_personnage`;
CREATE TABLE IF NOT EXISTS `roster_has_personnage` (
  `idRoster` int(11) NOT NULL,
  `idPersonnage` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `isApply` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idRoster`,`idPersonnage`,`idRole`),
  KEY `fk_roster_has_personnage_personnage1_idx` (`idPersonnage`),
  KEY `fk_roster_has_personnage_roster1_idx` (`idRoster`),
  KEY `fk_roster_has_personnage_role1_idx` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `roster_has_personnage`
--

TRUNCATE TABLE `roster_has_personnage`;
--
-- Contenu de la table `roster_has_personnage`
--

INSERT INTO `roster_has_personnage` (`idRoster`, `idPersonnage`, `idRole`, `isApply`) VALUES
(1, 179, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `specialisation`
--

DROP TABLE IF EXISTS `specialisation`;
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
-- Vider la table avant d'insérer `specialisation`
--

TRUNCATE TABLE `specialisation`;
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
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `state` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `display_name`, `password`, `state`) VALUES
(1, 'capi', 'capi@raid-tracker.com', 'capi', '$2y$14$0tqFA6/YrHNyOOW9npmPde0ErTKZ2zSxuJNvk.zh1d0Lpg0xFjWUm', NULL),
(2, 'antarus', 'antarus74@gmail.com', 'antarus', '$2y$14$LGzQvjtuiGVzwNd.hkchH.FUN4/aqz00GsR3UgVsXJOUDfNhjJfby', NULL),
(3, 'Kadyll', 'Kadyll@raid-tracker.com', 'Kadyll', '$2y$14$lNwq73CC6IwKswrOYGVHu.MaKd9MDbI.Rllj4b.sKZP16fdcGKLPK', NULL);

--
-- Déclencheurs `user`
--
DROP TRIGGER IF EXISTS `add_role_user`;
DELIMITER //
CREATE TRIGGER `add_role_user` AFTER INSERT ON `user`
 FOR EACH ROW insert into user_role_linker (user_id,role_id) values (new.id, 10)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
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

--
-- Vider la table avant d'insérer `users`
--

TRUNCATE TABLE `users`;
-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_role` (`role_id`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Vider la table avant d'insérer `user_role`
--

TRUNCATE TABLE `user_role`;
--
-- Contenu de la table `user_role`
--

INSERT INTO `user_role` (`id`, `role_id`, `is_default`, `parent_id`) VALUES
(9, 'guest', 1, NULL),
(10, 'user', 0, 9),
(11, 'admin', 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `user_role_linker`
--

DROP TABLE IF EXISTS `user_role_linker`;
CREATE TABLE IF NOT EXISTS `user_role_linker` (
  `user_id` int(11) unsigned NOT NULL,
  `role_id` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `user_role_linker`
--

TRUNCATE TABLE `user_role_linker`;
--
-- Contenu de la table `user_role_linker`
--

INSERT INTO `user_role_linker` (`user_id`, `role_id`) VALUES
(3, '10'),
(1, '11'),
(2, '11');

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

DROP TABLE IF EXISTS `zone`;
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
-- Vider la table avant d'insérer `zone`
--

TRUNCATE TABLE `zone`;
--
-- Contenu de la table `zone`
--

INSERT INTO `zone` (`idZone`, `nom`, `lvlMin`, `lvlMax`, `tailleMin`, `tailleMax`, `patch`, `isDonjon`, `isRaid`) VALUES
(6967, 'blackrock foundry', 100, 100, 10, 30, '6.0', 0, 1),
(7545, 'hellfire citadel', 100, 100, 10, 30, '6.2', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `zone_has_bosses`
--

DROP TABLE IF EXISTS `zone_has_bosses`;
CREATE TABLE IF NOT EXISTS `zone_has_bosses` (
  `idZone` int(11) NOT NULL,
  `idBosses` int(11) NOT NULL,
  PRIMARY KEY (`idZone`,`idBosses`),
  KEY `fk_zone_has_bosses_bosses1_idx` (`idBosses`),
  KEY `fk_zone_has_bosses_zone1_idx` (`idZone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `zone_has_bosses`
--

TRUNCATE TABLE `zone_has_bosses`;
--
-- Contenu de la table `zone_has_bosses`
--

INSERT INTO `zone_has_bosses` (`idZone`, `idBosses`) VALUES
(6967, 76809),
(6967, 76814),
(6967, 76865),
(6967, 76877),
(6967, 76906),
(6967, 76974),
(6967, 77182),
(6967, 77557),
(6967, 77692),
(6967, 87420),
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

DROP TABLE IF EXISTS `zone_has_mode_diffculte`;
CREATE TABLE IF NOT EXISTS `zone_has_mode_diffculte` (
  `idZone` int(11) NOT NULL,
  `idMode` int(11) NOT NULL,
  PRIMARY KEY (`idZone`,`idMode`),
  KEY `fk_mode_difficulte_has_zone_zone1_idx` (`idZone`),
  KEY `fk_mode_difficulte_has_zone_mode_difficulte1_idx` (`idMode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `zone_has_mode_diffculte`
--

TRUNCATE TABLE `zone_has_mode_diffculte`;
--
-- Contenu de la table `zone_has_mode_diffculte`
--

INSERT INTO `zone_has_mode_diffculte` (`idZone`, `idMode`) VALUES
(6967, 1),
(6967, 14),
(6967, 15),
(6967, 16),
(7545, 1),
(7545, 14),
(7545, 15),
(7545, 16);

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
  ADD CONSTRAINT `fk_evenements_user1` FOREIGN KEY (`idUsers`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_donjon1` FOREIGN KEY (`idDonjon`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_evenements_template1` FOREIGN KEY (`idEvenements_template`) REFERENCES `evenements_template` (`idEvenements_template`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_item_personnage_raid_personnages1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_bosses1` FOREIGN KEY (`idBosses`) REFERENCES `bosses` (`idBosses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_items1` FOREIGN KEY (`idItem`) REFERENCES `items` (`idItem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_raids1` FOREIGN KEY (`idRaid`) REFERENCES `raids` (`idRaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pallier`
--
ALTER TABLE `pallier`
  ADD CONSTRAINT `fk_pallier_zone1` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pallierAfficher`
--
ALTER TABLE `pallierAfficher`
  ADD CONSTRAINT `fk_roster_loot_mode_difficulte1` FOREIGN KEY (`idModeDifficulte`) REFERENCES `mode_difficulte` (`idMode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_loot_zone1` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_loot_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD CONSTRAINT `fk_personnages_user1` FOREIGN KEY (`idUsers`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_classes1` FOREIGN KEY (`idClasses`) REFERENCES `classes` (`idClasses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_faction1` FOREIGN KEY (`idFaction`) REFERENCES `faction` (`idFaction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_race1` FOREIGN KEY (`idRace`) REFERENCES `race` (`idRace`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnage_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `raids`
--
ALTER TABLE `raids`
  ADD CONSTRAINT `fk_raids_mode` FOREIGN KEY (`idMode`) REFERENCES `mode_difficulte` (`idMode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raids_evenements1` FOREIGN KEY (`idEvenements`) REFERENCES `evenements` (`idEvenements`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raids_roster1` FOREIGN KEY (`idRosterTmp`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raids_zone1` FOREIGN KEY (`idZoneTmp`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_roster_has_personnage_role1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_has_personnage_personnage1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_has_personnage_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `specialisation`
--
ALTER TABLE `specialisation`
  ADD CONSTRAINT `fk_specialisation_classes1` FOREIGN KEY (`idClasses`) REFERENCES `classes` (`idClasses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_specialisation_role1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `user_role` (`id`) ON DELETE SET NULL;

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
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
