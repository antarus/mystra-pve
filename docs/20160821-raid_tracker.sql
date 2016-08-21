-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 21 Août 2016 à 15:03
-- Version du serveur: 5.5.50-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.19

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
  `nom` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
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
  `nom` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
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
(1, 'mystra', 'Garona', 25, '', 0),
(2, 'wrath of god', 'Garona', 25, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `idItem` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `ajouterPar` varchar(30) NOT NULL,
  `majPar` varchar(30) DEFAULT NULL,
  `idBnet` int(10) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=230 ;

--
-- Vider la table avant d'insérer `items`
--

TRUNCATE TABLE `items`;
--
-- Contenu de la table `items`
--

INSERT INTO `items` (`idItem`, `nom`, `ajouterPar`, `majPar`, `idBnet`, `couleur`, `icon`) VALUES
(1, 'gorebound wristguards', 'Import Raid-TracKer', '', 124278, '', 'inv_leather_raidrogue_p_01bracer'),
(2, 'powder-singed bracers', 'Import Raid-TracKer', '', 124183, '', 'inv_bracer_cloth_raidpriest_p_01'),
(3, 'blastproof legguards', 'Import Raid-TracKer', '', 124335, '', 'inv_plate_raidwarrior_p_01pants'),
(4, 'voltage regulation diode', 'Import Raid-TracKer', '', 124213, '', 'inv_6_2raid_necklace_1b'),
(5, 'felforged aegis', 'Import Raid-TracKer', '', 124354, '', 'inv_shield_1h_felfireraid_d_01'),
(6, 'ironthread greatcloak', 'Import Raid-TracKer', '', 124145, '', 'inv_cape_felfireraid_d_04'),
(7, 'pilot''s pauldrons', 'Import Raid-TracKer', '', 124174, '', 'inv_cloth_raidmage_p_01shoulder'),
(8, 'oathclaw helm', 'Import Raid-TracKer', '', 124261, '', 'inv_helm_leather_raiddruid_p_01'),
(9, 'tunic of reformative runes', 'Import Raid-TracKer', '', 124243, '', 'inv_chest_leather_raidmonk_p_01'),
(10, 'pious cowl', 'Import Raid-TracKer', '', 124161, '', 'inv_helm_cloth_raidpriest_p_01'),
(11, 'sludge-soaked waistband', 'Import Raid-TracKer', '', 124180, '', 'inv_belt_cloth_raidpriest_p_01'),
(12, 'polymorphic cloak of absorption', 'Import Raid-TracKer', '', 124139, '', 'inv_cape_felfireraid_d_02'),
(13, 'dessicated soulrender slippers', 'Import Raid-TracKer', '', 124150, '', 'inv_boot_cloth_raidwarlock_p_01'),
(14, 'blood-tanned pauldrons', 'Import Raid-TracKer', '', 124271, '', 'inv_leather_raidrogue_p_01shoulders'),
(15, 'spiked bloodstone pendant', 'Import Raid-TracKer', '', 124220, '', 'inv_6_0raid_necklace_4b'),
(16, 'cursed blood bracers', 'Import Raid-TracKer', '', 124184, '', 'inv_bracer_cloth_raidwarlock_p_01'),
(17, 'acid-etched legplates', 'Import Raid-TracKer', '', 124336, '', 'inv_pant_plate_raiddeathknight_p_01'),
(18, 'mirror of the blademaster', 'Import Raid-TracKer', '', 124224, '', 'spell_nature_mirrorimage'),
(19, 'helm of precognition', 'Import Raid-TracKer', '', 124330, '', 'inv_plate_raidwarrior_p_01helm'),
(20, 'ancient gorestained wrap', 'Import Raid-TracKer', '', 124169, '', 'inv_robe_cloth_raidwarlock_p_01'),
(21, 'shawl of sanguinary ritual', 'Import Raid-TracKer', '', 124137, '', 'inv_cape_felfire_raid_d_01'),
(22, 'heartseeking skull pendant', 'Import Raid-TracKer', '', 124208, '', 'inv_6_2raid_necklace_2a'),
(23, 'velvet bloodweaver gloves', 'Import Raid-TracKer', '', 124152, '', 'inv_glove_cloth_raidwarlock_p_01'),
(24, 'drape of gluttony', 'Import Raid-TracKer', '', 124146, '', 'inv_cape_felfireraid_d_04'),
(25, 'choker of forbidden indulgence', 'Import Raid-TracKer', '', 124391, '', 'inv_6_2raid_necklace_4d'),
(26, 'pantaloons of the arcanic conclave', 'Import Raid-TracKer', '', 124165, '', 'inv_cloth_raidmage_p_01pant'),
(27, 'gibbering madness', 'Import Raid-TracKer', '', 124205, '', 'inv_offhand_1h_felfireraid_d_01'),
(28, 'tunic of the soulbinder', 'Import Raid-TracKer', '', 124245, '', 'inv_chest_leather_raiddruid_p_01'),
(29, 'drape of beckoned souls', 'Import Raid-TracKer', '', 124141, '', 'inv_cape_felfireraid_d_02'),
(30, 'oathclaw gauntlets', 'Import Raid-TracKer', '', 124255, '', 'inv_glove_leather_raiddruid_p_01'),
(31, 'gauntlets of the ceaseless vigil', 'Import Raid-TracKer', '', 124328, '', 'inv_plate_raidpaladin_p_01glove'),
(32, 'seal of the traitorous councilor', 'Import Raid-TracKer', '', 124191, '', 'inv_6_2raid_ring_1b'),
(33, 'malicious censer', 'Import Raid-TracKer', '', 124226, '', 'inv_guild_cauldron_b'),
(34, 'pompous ceremonial ring', 'Import Raid-TracKer', '', 124195, '', 'inv_6_2raid_ring_2d'),
(35, 'satin gloves of injustice', 'Import Raid-TracKer', '', 124153, '', 'inv_glove_cloth_raidpriest_p_01'),
(36, 'zakuun''s signet of command', 'Import Raid-TracKer', '', 124203, '', 'inv_6_2raid_ring_1a'),
(37, 'legguards of grievous consonances', 'Import Raid-TracKer', '', 124337, '', 'inv_plate_raidpaladin_p_01pant'),
(38, 'choker of whispered promises', 'Import Raid-TracKer', '', 124214, '', 'inv_6_2raid_necklace_4a'),
(39, 'oathclaw mantle', 'Import Raid-TracKer', '', 124272, '', 'inv_shoulder_leather_raiddruid_p_01'),
(40, 'pauldrons of the living mountain', 'Import Raid-TracKer', '', 124308, '', 'inv_shoulder_mail_raidshaman_p_01'),
(41, 'countenance of the revenant', 'Import Raid-TracKer', '', 124158, '', 'inv_cloth_raidmage_p_01helm'),
(42, 'breach-scarred wristplates', 'Import Raid-TracKer', '', 124353, '', 'inv_plate_raidpaladin_p_01bracer'),
(43, 'robe of the arcanic conclave', 'Import Raid-TracKer', '', 124171, '', 'inv_cloth_raidmage_p_01robe'),
(44, 'leggings of the iron summoner', 'Import Raid-TracKer', '', 124164, '', 'inv_cloth_raidmage_p_01pant'),
(45, 'xu''tenash, glaive of ruin', 'Import Raid-TracKer', '', 124378, '', 'inv_polearm_1h_felfireraid_d_02'),
(46, 'bleeding hollow toxin vessel', 'Import Raid-TracKer', '', 124520, '', 'spell_deathvortex'),
(47, 'repudiation of war', 'Import Raid-TracKer', '', 124519, '', 'ability_priest_pathofthedevout'),
(48, 'waistwrap of banishment', 'Import Raid-TracKer', '', 124276, '', 'inv_belt_leather_raidmonk_p_01'),
(49, 'talisman of the master tracker', 'Import Raid-TracKer', '', 124515, '', 'inv_shoulder_mail_raidhunter_l_01'),
(50, 'worldbreaker''s resolve', 'Import Raid-TracKer', '', 124523, '', 'ability_fomor_boss_pillar02'),
(51, 'edict of argus', 'Import Raid-TracKer', '', 124382, '', 'inv_staff_2h_felfireraid_d_03'),
(52, 'felfinger runegloves', 'Import Raid-TracKer', '', 124254, '', 'inv_glove_leather_raidmonk_p_01'),
(53, 'demonbuckle sash of argus', 'Import Raid-TracKer', '', 124200, '', 'inv_buckle_plate_archimonde_d_01');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=376 ;

--
-- Vider la table avant d'insérer `item_personnage_raid`
--

TRUNCATE TABLE `item_personnage_raid`;
--
-- Contenu de la table `item_personnage_raid`
--

INSERT INTO `item_personnage_raid` (`idItemRaidPersonnage`, `idRaid`, `idItem`, `idPersonnage`, `valeur`, `bonus`, `idBosses`, `note`) VALUES
(77, 8, 17, 428, 0.00, '1801:1472:529:', 92146, ''),
(87, 8, 27, 37, 0.00, '1801:1472:529:', 90199, ''),
(93, 8, 32, 340, 0.00, '1801:1472:529:', 90296, ''),
(97, 8, 35, 425, 0.00, '1801:41:1477:', 90269, ''),
(99, 8, 36, 172, 0.00, '1801:41:1487:', 89890, ''),
(100, 8, 37, 421, 0.00, '1801:1472:529:', 89890, ''),
(103, 8, 39, 426, 0.00, '1801:1472:529:', 93068, ''),
(104, 8, 40, 419, 0.00, '1801:1472:529:', 93068, ''),
(106, 8, 42, 261, 0.00, '1801:1472:529:', 93068, ''),
(108, 8, 44, 369, 0.00, '1801:563:1472:', 91349, ''),
(109, 8, 45, 309, 0.00, '1801:1472:529:', 91349, ''),
(110, 8, 46, 206, 0.00, '1801:1472:529:', 91331, ''),
(111, 8, 47, 367, 0.00, '1801:1472:529:', 91331, ''),
(112, 8, 48, 363, 0.00, '1801:1472:529:', 91331, ''),
(113, 8, 49, 65, 0.00, '1801:1472:529:', 91331, ''),
(114, 8, 50, 417, 0.00, '1801:1482:3441:', 91331, ''),
(115, 8, 51, 104, 0.00, '1801:1472:529:', 91331, ''),
(116, 8, 51, 59, 0.00, '1801:1472:529:', 91331, ''),
(117, 8, 52, 424, 0.00, '1801:563:1472:', 91331, ''),
(118, 8, 53, 427, 0.00, '1801:1472:529:', 91331, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `pallierAfficher`
--

TRUNCATE TABLE `pallierAfficher`;
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
  `idUsers` int(11) DEFAULT NULL,
  `isTech` tinyint(1) DEFAULT '0' COMMENT 'personnage dit technique. utiliser lors de la creation du roster. bank et disenchant',
  PRIMARY KEY (`idPersonnage`),
  KEY `fk_personnage_users1_idx` (`idUsers`),
  KEY `fk_personnage_guildes1_idx` (`idGuildes`),
  KEY `fk_personnages_faction1_idx` (`idFaction`),
  KEY `fk_personnages_classes1_idx` (`idClasses`),
  KEY `fk_personnages_race1_idx` (`idRace`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=448 ;

--
-- Vider la table avant d'insérer `personnages`
--

TRUNCATE TABLE `personnages`;
--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`idPersonnage`, `nom`, `niveau`, `genre`, `miniature`, `royaume`, `ilvl`, `idFaction`, `idClasses`, `idRace`, `idGuildes`, `idUsers`, `isTech`) VALUES
(1, 'ironkain', 100, 0, 'garona/172/1659564-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(2, 'océannia', 100, 1, 'garona/104/1813864-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(3, 'matéus', 100, 0, 'garona/121/1859705-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(4, 'zatoichy', 100, 0, 'garona/104/2021992-avatar.jpg', 'garona', 0, 0, 5, 4, 1, NULL, 0),
(5, 'mordrède', 100, 0, 'garona/30/2636318-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(6, 'lagaboulette', 100, 1, 'garona/223/2676447-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(7, 'yarixa', 100, 1, 'garona/70/2711622-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(8, 'prony', 100, 0, 'garona/83/2803795-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(9, 'octo', 100, 0, 'garona/230/5208038-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(10, 'kerimaa', 100, 1, 'garona/125/5767549-avatar.jpg', 'garona', 0, 0, 3, 11, 1, NULL, 0),
(11, 'wolfmann', 100, 0, 'garona/13/5841165-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(12, 'capikaze', 100, 0, 'garona/170/9321898-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(13, 'bøubøule', 100, 0, 'garona/79/9410383-avatar.jpg', 'garona', 0, 0, 3, 3, 1, NULL, 0),
(14, 'sadday', 100, 1, 'garona/46/9553198-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(15, 'falinns', 100, 0, 'garona/234/9607402-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(16, 'myna', 100, 1, 'garona/161/9657249-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(17, 'reve', 100, 1, 'garona/148/9673876-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(18, 'cely', 100, 1, 'garona/113/9790833-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(19, 'alandrys', 100, 0, 'garona/58/9801530-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(20, 'elirys', 100, 1, 'garona/137/10309257-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(21, 'parlama', 100, 1, 'garona/143/10635151-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(22, 'alax', 100, 0, 'garona/54/11104054-avatar.jpg', 'garona', 0, 0, 2, 3, 1, NULL, 0),
(23, 'acronomicon', 100, 0, 'garona/76/12192588-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(24, 'lhilhi', 100, 1, 'garona/209/12288465-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(25, 'arthyss', 100, 0, 'garona/109/12343149-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(26, 'apisto', 100, 0, 'garona/199/12419527-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(27, 'nryan', 100, 0, 'garona/87/12421719-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(28, 'karabistouil', 100, 1, 'garona/66/13559106-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(29, 'ptitepoucett', 100, 1, 'garona/237/13613805-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(30, 'healsangel', 100, 1, 'garona/226/14281954-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(31, 'kiev', 100, 0, 'garona/212/14996436-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(32, 'nisya', 100, 1, 'garona/34/15257378-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(33, 'kaarapital', 100, 1, 'garona/134/16132486-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(34, 'poupoucetire', 100, 1, 'garona/234/16132842-avatar.jpg', 'garona', 0, 0, 3, 11, 1, NULL, 0),
(35, 'arcalyne', 100, 1, 'garona/244/17042164-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(36, 'kaarabine', 100, 1, 'garona/170/17945514-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(37, 'lisys', 100, 1, 'garona/178/18159538-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(38, 'bogossa', 100, 1, 'garona/71/19291463-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(39, 'nostalgie', 100, 1, 'garona/25/19346713-avatar.jpg', 'garona', 0, 0, 5, 11, 1, NULL, 0),
(40, 'rurú', 100, 1, 'garona/200/19821000-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(41, 'heresânkh', 100, 1, 'garona/158/20167326-avatar.jpg', 'garona', 0, 0, 5, 11, 1, NULL, 0),
(42, 'antarus', 100, 0, 'garona/146/21289874-avatar.jpg', 'garona', 0, 0, 5, 4, 1, NULL, 0),
(43, 'laetitiaa', 100, 1, 'garona/203/22083275-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(44, 'khronøs', 100, 0, 'garona/125/23517053-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(45, 'karalich', 100, 1, 'garona/26/23697690-avatar.jpg', 'garona', 0, 0, 6, 4, 1, NULL, 0),
(46, 'poulich', 100, 1, 'garona/109/23709549-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(47, 'prozzak', 100, 0, 'garona/42/26734122-avatar.jpg', 'garona', 0, 0, 5, 3, 1, NULL, 0),
(48, 'bigbeer', 100, 0, 'garona/255/28860159-avatar.jpg', 'garona', 0, 0, 3, 3, 1, NULL, 0),
(49, 'redoot', 100, 1, 'garona/254/29159934-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(50, 'byluna', 100, 1, 'garona/220/29529308-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(51, 'plateùs', 100, 0, 'garona/10/30977034-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(52, 'dooc', 100, 1, 'garona/2/33189122-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(53, 'shynzu', 100, 1, 'garona/149/34208149-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(54, 'lylybelle', 100, 1, 'garona/99/34321507-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(55, 'ilidøs', 100, 0, 'garona/9/34456073-avatar.jpg', 'garona', 0, 0, 6, 4, 1, NULL, 0),
(56, 'tÿra', 100, 0, 'garona/57/35029305-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(57, 'xcalibur', 100, 0, 'garona/24/35030552-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(58, 'auron', 100, 0, 'garona/61/35204669-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(59, 'tikchbila', 100, 0, 'garona/154/36140954-avatar.jpg', 'garona', 0, 0, 8, 22, 1, NULL, 0),
(60, 'magerie', 100, 1, 'garona/241/36358385-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(61, 'harigston', 100, 1, 'garona/119/37148279-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(62, 'aeoline', 100, 1, 'garona/61/37618237-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(63, 'olare', 100, 0, 'garona/10/37762058-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(64, 'bachantes', 100, 0, 'garona/49/39400497-avatar.jpg', 'garona', 0, 0, 1, 3, 1, NULL, 0),
(65, 'capï', 100, 1, 'garona/40/40891944-avatar.jpg', 'garona', 0, 0, 3, 25, 1, NULL, 0),
(66, 'pléco', 100, 1, 'garona/225/40947937-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(67, 'dootty', 100, 1, 'garona/247/43145207-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(68, 'cellesta', 100, 1, 'garona/19/43252755-avatar.jpg', 'garona', 0, 0, 5, 11, 1, NULL, 0),
(69, 'laugan', 100, 0, 'garona/23/45220631-avatar.jpg', 'garona', 0, 0, 5, 3, 1, NULL, 0),
(70, 'ptitelouve', 100, 1, 'garona/123/45595259-avatar.jpg', 'garona', 0, 0, 4, 22, 1, NULL, 0),
(71, 'talisia', 100, 1, 'garona/12/46258956-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(72, 'spoiler', 100, 0, 'garona/31/46725407-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(73, 'kalamïty', 100, 1, 'garona/195/48465859-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(74, 'aelyne', 100, 1, 'garona/116/48794484-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(75, 'félicias', 100, 1, 'garona/137/49561225-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(76, 'iriséa', 100, 1, 'garona/60/49766972-avatar.jpg', 'garona', 0, 0, 8, 4, 1, NULL, 0),
(77, 'rapiou', 100, 0, 'garona/76/50125388-avatar.jpg', 'garona', 0, 0, 4, 22, 1, NULL, 0),
(78, 'Ächille', 100, 0, 'garona/21/50140693-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(79, 'thusùxx', 100, 0, 'garona/97/50817121-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(80, 'cartam', 100, 0, 'garona/135/50938503-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(81, 'mâjuscule', 100, 1, 'garona/85/51698517-avatar.jpg', 'garona', 0, 0, 8, 11, 1, NULL, 0),
(82, 'cartmân', 100, 0, 'garona/100/51740004-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(83, 'deathinition', 100, 0, 'garona/206/52678862-avatar.jpg', 'garona', 0, 0, 6, 11, 1, NULL, 0),
(84, 'mérys', 100, 1, 'garona/141/52905101-avatar.jpg', 'garona', 0, 0, 4, 1, 1, NULL, 0),
(85, 'cartmän', 100, 0, 'garona/102/53301094-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(86, 'jðe', 100, 0, 'garona/8/53700616-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(87, 'gøuma', 100, 0, 'garona/116/54341236-avatar.jpg', 'garona', 0, 0, 8, 3, 1, NULL, 0),
(88, 'gøuminette', 100, 1, 'garona/120/54341240-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(89, 'sømetimes', 100, 1, 'garona/74/54789706-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(90, 'odreth', 100, 0, 'garona/231/55060199-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(91, 'nydelia', 100, 1, 'garona/51/55169843-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(92, 'valyanas', 100, 1, 'garona/30/55325214-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(93, 'lønï', 100, 1, 'garona/254/55326462-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(94, 'crysista', 100, 1, 'garona/148/55543956-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(95, 'rylia', 100, 1, 'garona/83/55557203-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(96, 'oriane', 100, 1, 'garona/205/55836621-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(97, 'swanya', 100, 1, 'garona/7/56419335-avatar.jpg', 'garona', 0, 0, 3, 22, 1, NULL, 0),
(98, 'menora', 100, 1, 'garona/97/56565857-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(99, 'zazagentil', 100, 0, 'garona/46/56717358-avatar.jpg', 'garona', 0, 0, 5, 7, 1, NULL, 0),
(100, 'Ðeltasu', 100, 0, 'garona/144/56734608-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(101, 'nayka', 100, 1, 'garona/75/56993099-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(102, 'wartax', 100, 0, 'garona/125/57239933-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(103, 'galiowyn', 100, 0, 'garona/12/57240076-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(104, 'philémons', 100, 0, 'garona/186/57348538-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(105, 'smado', 100, 0, 'garona/114/57897330-avatar.jpg', 'garona', 0, 0, 10, 7, 1, NULL, 0),
(106, 'thyios', 100, 1, 'garona/106/57899626-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(107, 'unnder', 100, 0, 'garona/253/58228221-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(108, 'coonta', 100, 1, 'garona/127/59596159-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(109, 'kâlia', 100, 1, 'garona/223/59663071-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(110, 'jesuisblonde', 100, 1, 'garona/179/59805875-avatar.jpg', 'garona', 0, 0, 4, 1, 1, NULL, 0),
(111, 'olaf', 100, 0, 'garona/235/59918571-avatar.jpg', 'garona', 0, 0, 6, 3, 1, NULL, 0),
(112, 'aygul', 100, 1, 'garona/229/59934181-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(113, 'thynael', 100, 1, 'garona/112/60011888-avatar.jpg', 'garona', 0, 0, 6, 22, 1, NULL, 0),
(114, 'drethz', 100, 0, 'garona/61/60030013-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(115, 'amnésiâ', 100, 1, 'garona/24/60044568-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(116, 'aryaa', 100, 1, 'garona/119/60073847-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(117, 'ciryaliel', 100, 1, 'garona/237/60352493-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(118, 'heldin', 100, 0, 'garona/80/60588112-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(119, 'kâdyll', 100, 1, 'garona/244/60942836-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(120, 'kàdyll', 100, 1, 'garona/85/61138261-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(121, 'ivøri', 100, 1, 'garona/232/61292008-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(122, 'alys', 100, 1, 'garona/216/61403608-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(123, 'deathss', 100, 0, 'garona/187/61502395-avatar.jpg', 'garona', 0, 0, 6, 22, 1, NULL, 0),
(124, 'angelÿn', 100, 1, 'garona/15/61609999-avatar.jpg', 'garona', 0, 0, 8, 25, 1, NULL, 0),
(125, 'yoshino', 100, 1, 'garona/60/61798972-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(126, 'baêlle', 100, 1, 'garona/214/62194646-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(127, 'suyon', 100, 1, 'garona/141/62668429-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(128, 'yukïno', 100, 1, 'garona/164/62752932-avatar.jpg', 'garona', 0, 0, 6, 11, 1, NULL, 0),
(129, 'samisa', 100, 1, 'garona/43/62753835-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(130, 'jisun', 100, 1, 'garona/42/63894058-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(131, 'ayumu', 100, 1, 'garona/202/63920074-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(132, 'mickie', 100, 1, 'garona/119/65614711-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(133, 'minji', 100, 1, 'garona/115/65681011-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(134, 'acta', 100, 1, 'nerzhul/92/65854812-avatar.jpg', 'ner''zhul', 0, 0, 3, 11, 1, NULL, 0),
(135, 'nathe', 100, 1, 'nerzhul/77/65920589-avatar.jpg', 'ner''zhul', 0, 0, 5, 1, 1, NULL, 0),
(136, 'kréa', 100, 1, 'nerzhul/121/65934969-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 1, NULL, 0),
(137, 'eclypse', 100, 1, 'nerzhul/179/66122931-avatar.jpg', 'ner''zhul', 0, 0, 3, 22, 1, NULL, 0),
(138, 'healle', 100, 1, 'nerzhul/96/66131296-avatar.jpg', 'ner''zhul', 0, 0, 5, 4, 1, NULL, 0),
(139, 'emac', 100, 1, 'nerzhul/218/66211802-avatar.jpg', 'ner''zhul', 0, 0, 1, 22, 1, NULL, 0),
(140, 'dìgg', 100, 0, 'nerzhul/173/66213549-avatar.jpg', 'ner''zhul', 0, 0, 8, 11, 1, NULL, 0),
(141, 'wumbat', 100, 0, 'nerzhul/180/66235060-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 1, NULL, 0),
(142, 'lnaudru', 100, 1, 'nerzhul/232/66251496-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 1, NULL, 0),
(143, 'alwynn', 100, 0, 'garona/253/66481661-avatar.jpg', 'garona', 0, 0, 5, 4, 1, NULL, 0),
(144, 'särãh', 100, 1, 'nerzhul/90/66518106-avatar.jpg', 'ner''zhul', 0, 0, 3, 1, 1, NULL, 0),
(145, 'baldar', 100, 0, 'nerzhul/61/66540093-avatar.jpg', 'ner''zhul', 0, 0, 2, 1, 1, NULL, 0),
(146, 'xylomi', 100, 1, 'nerzhul/185/66549177-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 1, NULL, 0),
(147, 'hassakura', 100, 0, 'nerzhul/104/66554472-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 1, NULL, 0),
(148, 'bellame', 100, 1, 'garona/86/67268182-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(149, 'karacast', 100, 1, 'garona/89/67511385-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(150, 'kaara', 100, 1, 'garona/152/67514776-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(151, 'cøcalight', 100, 1, 'garona/69/67702597-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(152, 'karaoutai', 100, 1, 'garona/10/67769098-avatar.jpg', 'garona', 0, 0, 5, 7, 1, NULL, 0),
(153, 'zygore', 100, 0, 'garona/94/67822686-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(154, 'kimtan', 100, 1, 'garona/37/68474149-avatar.jpg', 'garona', 0, 0, 10, 4, 1, NULL, 0),
(155, 'jiwon', 100, 1, 'garona/83/68678739-avatar.jpg', 'garona', 0, 0, 6, 4, 1, NULL, 0),
(156, 'okarin', 100, 0, 'garona/37/69615909-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(157, 'mûrmûr', 100, 1, 'garona/95/69866079-avatar.jpg', 'garona', 0, 0, 9, 22, 1, NULL, 0),
(158, 'cøcazerø', 100, 0, 'garona/86/70524502-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(159, 'graalimpie', 100, 0, 'nerzhul/192/71505600-avatar.jpg', 'ner''zhul', 0, 0, 6, 4, 1, NULL, 0),
(160, 'kadyl', 100, 1, 'garona/31/71591199-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(161, 'mizutani', 100, 1, 'garona/21/72120085-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(162, 'jevo', 100, 0, 'garona/124/73588092-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(163, 'yùkinà', 100, 1, 'garona/1/73646593-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(164, 'hayes', 100, 1, 'garona/99/73668963-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(165, 'timelord', 100, 0, 'nerzhul/53/73684021-avatar.jpg', 'ner''zhul', 0, 0, 1, 4, 1, NULL, 0),
(166, 'niylla', 100, 1, 'garona/133/73691781-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(167, 'destinee', 100, 1, 'garona/76/73718092-avatar.jpg', 'garona', 0, 0, 8, 25, 1, NULL, 0),
(168, 'tîmelord', 100, 0, 'nerzhul/38/73722406-avatar.jpg', 'ner''zhul', 0, 0, 3, 4, 1, NULL, 0),
(169, 'yùkinø', 100, 1, 'garona/144/73912720-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(170, 'belleange', 100, 1, 'garona/253/73919997-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(171, 'antaruss', 100, 1, 'garona/10/74018058-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(172, 'christange', 100, 1, 'garona/87/74051159-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(173, 'minianta', 100, 1, 'garona/159/74222495-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(174, 'lenøre', 100, 1, 'garona/130/74374274-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(175, 'bloodynight', 100, 1, 'garona/213/74478293-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(176, 'xeralynn', 100, 1, 'garona/191/75077567-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(177, 'lishaoran', 100, 0, 'garona/128/75897728-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(178, 'benjiwars', 100, 0, 'garona/232/75921640-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(179, 'kashyk', 100, 1, 'garona/172/75924396-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(180, 'angelicka', 100, 1, 'garona/205/77464525-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(181, 'sfy', 100, 0, 'nerzhul/77/77472589-avatar.jpg', 'ner''zhul', 0, 0, 8, 1, 1, NULL, 0),
(182, 'jevy', 100, 0, 'garona/192/78349504-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(183, 'nosfia', 100, 1, 'garona/196/78395588-avatar.jpg', 'garona', 0, 0, 1, 25, 1, NULL, 0),
(184, 'ewanaelle', 100, 1, 'garona/83/84882771-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(185, 'aldure', 100, 0, 'sargeras/154/89034650-avatar.jpg', 'sargeras', 0, 0, 2, 1, 1, NULL, 0),
(186, 'miks', 100, 1, 'sargeras/106/89038442-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(187, 'balrog', 100, 0, 'sargeras/68/89081924-avatar.jpg', 'sargeras', 0, 0, 1, 22, 1, NULL, 0),
(188, 'dogua', 100, 0, 'sargeras/166/89086886-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(189, 'ildriar', 100, 0, 'sargeras/166/89091494-avatar.jpg', 'sargeras', 0, 0, 2, 1, 1, NULL, 0),
(190, 'misswow', 100, 1, 'sargeras/195/89097923-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(191, 'azalaïs', 100, 1, 'sargeras/66/89184834-avatar.jpg', 'sargeras', 0, 0, 5, 4, 1, NULL, 0),
(192, 'drahas', 100, 0, 'sargeras/63/89275455-avatar.jpg', 'sargeras', 0, 0, 6, 11, 1, NULL, 0),
(193, 'chlöre', 100, 1, 'sargeras/96/89276000-avatar.jpg', 'sargeras', 0, 0, 6, 4, 1, NULL, 0),
(194, 'sealyna', 100, 1, 'sargeras/85/89280341-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(195, 'pushup', 100, 1, 'sargeras/20/89295892-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(196, 'belnadifia', 100, 1, 'sargeras/228/89356004-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(197, 'tohetta', 100, 1, 'sargeras/252/89367292-avatar.jpg', 'sargeras', 0, 0, 6, 1, 1, NULL, 0),
(198, 'damnetus', 100, 0, 'sargeras/24/89529880-avatar.jpg', 'sargeras', 0, 0, 11, 22, 1, NULL, 0),
(199, 'trinquette', 100, 1, 'sargeras/139/89549707-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(200, 'parlevent', 100, 1, 'sargeras/9/89552649-avatar.jpg', 'sargeras', 0, 0, 7, 11, 1, NULL, 0),
(201, 'asharaak', 100, 0, 'sargeras/151/89552791-avatar.jpg', 'sargeras', 0, 0, 4, 22, 1, NULL, 0),
(202, 'drèams', 100, 1, 'sargeras/86/89564502-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(203, 'kimaria', 100, 1, 'sargeras/20/89609748-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(204, 'ango', 100, 1, 'sargeras/73/89630537-avatar.jpg', 'sargeras', 0, 0, 5, 11, 1, NULL, 0),
(205, 'tifettes', 100, 1, 'sargeras/175/89636527-avatar.jpg', 'sargeras', 0, 0, 8, 4, 1, NULL, 0),
(206, 'riddick', 100, 0, 'sargeras/193/89665985-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(207, 'lotùs', 100, 1, 'sargeras/240/89688304-avatar.jpg', 'sargeras', 0, 0, 4, 4, 1, NULL, 0),
(208, 'maenira', 100, 1, 'sargeras/18/89702930-avatar.jpg', 'sargeras', 0, 0, 5, 1, 1, NULL, 0),
(209, 'nynja', 100, 0, 'sargeras/150/89718422-avatar.jpg', 'sargeras', 0, 0, 10, 25, 1, NULL, 0),
(210, 'xàe', 100, 1, 'sargeras/27/89733403-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(211, 'feniks', 100, 1, 'sargeras/78/89738318-avatar.jpg', 'sargeras', 0, 0, 10, 1, 1, NULL, 0),
(212, 'azhrei', 100, 0, 'sargeras/22/89739798-avatar.jpg', 'sargeras', 0, 0, 2, 1, 1, NULL, 0),
(213, 'fenixia', 100, 1, 'sargeras/178/89743282-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(214, 'omezaroth', 100, 0, 'sargeras/19/89854483-avatar.jpg', 'sargeras', 0, 0, 3, 4, 1, NULL, 0),
(215, 'gromack', 100, 0, 'sargeras/112/90017136-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(216, 'liköpi', 100, 0, 'sargeras/255/90054655-avatar.jpg', 'sargeras', 0, 0, 7, 11, 1, NULL, 0),
(217, 'zephyel', 100, 0, 'sargeras/38/90068262-avatar.jpg', 'sargeras', 0, 0, 9, 22, 1, NULL, 0),
(218, 'haknarion', 100, 0, 'sargeras/136/90073736-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(219, 'spartìate', 100, 1, 'sargeras/25/92064537-avatar.jpg', 'sargeras', 0, 0, 1, 4, 1, NULL, 0),
(220, 'Üther', 100, 0, 'garona/154/93266586-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(221, 'nebutron', 100, 0, 'garona/80/93613392-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(222, 'midoru', 100, 0, 'garona/174/93614510-avatar.jpg', 'garona', 0, 0, 3, 22, 1, NULL, 0),
(223, 'prédictrice', 100, 1, 'garona/236/93673708-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(224, 'xinding', 100, 1, 'garona/38/93801510-avatar.jpg', 'garona', 0, 0, 4, 1, 1, NULL, 0),
(225, 'timelôrd', 100, 0, 'nerzhul/61/93863997-avatar.jpg', 'ner''zhul', 0, 0, 11, 4, 1, NULL, 0),
(226, 'titepoucette', 100, 1, 'garona/69/94163269-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(227, 'madiran', 100, 1, 'garona/244/94179572-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(228, 'nokitsune', 100, 1, 'garona/242/94319090-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(229, 'xäntra', 100, 1, 'garona/175/94611375-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(230, 'zélya', 100, 1, 'sargeras/179/94718131-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(231, 'seyer', 100, 0, 'sargeras/86/94837334-avatar.jpg', 'sargeras', 0, 0, 2, 1, 1, NULL, 0),
(232, 'kàdyl', 100, 1, 'garona/110/95004270-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(233, 'wochifan', 100, 0, 'garona/245/95029749-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(234, 'orophinae', 100, 1, 'garona/236/95043564-avatar.jpg', 'garona', 0, 0, 5, 11, 1, NULL, 0),
(235, 'eiziah', 100, 1, 'garona/93/95045213-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(236, 'raenis', 100, 0, 'sargeras/229/95116261-avatar.jpg', 'sargeras', 0, 0, 3, 4, 1, NULL, 0),
(237, 'zoar', 100, 0, 'sargeras/228/95148004-avatar.jpg', 'sargeras', 0, 0, 9, 7, 1, NULL, 0),
(238, 'eon', 100, 1, 'garona/17/95441937-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(239, 'nøsfé', 100, 0, 'garona/244/95503092-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(240, 'irginwor', 100, 0, 'nerzhul/62/95794238-avatar.jpg', 'ner''zhul', 0, 0, 9, 1, 1, NULL, 0),
(241, 'ayshell', 100, 1, 'sargeras/62/96186942-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(242, 'kâdyl', 100, 1, 'garona/25/96249369-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(243, 'elyä', 100, 1, 'garona/84/96272212-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(244, 'galérius', 100, 0, 'garona/235/96323819-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(245, 'amassis', 100, 0, 'sargeras/105/96431465-avatar.jpg', 'sargeras', 0, 0, 8, 11, 1, NULL, 0),
(246, 'lèvy', 100, 1, 'garona/246/96557046-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(247, 'märgâlärds', 100, 0, 'garona/13/96674829-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(248, 'kidipet', 100, 0, 'garona/169/96749993-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(249, 'myllenia', 100, 1, 'sargeras/149/96820373-avatar.jpg', 'sargeras', 0, 0, 5, 1, 1, NULL, 0),
(250, 'kidisparai', 100, 0, 'garona/183/96877239-avatar.jpg', 'garona', 0, 0, 1, 3, 1, NULL, 0),
(251, 'ida', 100, 1, 'garona/80/96981584-avatar.jpg', 'garona', 0, 0, 4, 3, 1, NULL, 0),
(252, 'anÿ', 100, 1, 'garona/13/96982797-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(253, 'belanima', 100, 1, 'garona/41/97195305-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(254, 'hibe', 100, 0, 'sargeras/193/97235905-avatar.jpg', 'sargeras', 0, 0, 2, 3, 1, NULL, 0),
(255, 'kâdyll', 100, 1, 'nerzhul/146/97287058-avatar.jpg', 'ner''zhul', 0, 0, 4, 1, 1, NULL, 0),
(256, 'myllé', 100, 1, 'sargeras/75/97468747-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(257, 'cëly', 100, 1, 'garona/12/98057228-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(258, 'kuramì', 100, 1, 'garona/5/98185477-avatar.jpg', 'garona', 0, 0, 7, 25, 1, NULL, 0),
(259, 'chandrak', 100, 1, 'garona/19/98205971-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(260, 'kazathwin', 100, 0, 'garona/77/98251853-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(261, 'commonbaby', 100, 0, 'sargeras/125/98300541-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(262, 'luminara', 100, 1, 'garona/112/98507376-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(263, 'tatoon', 100, 1, 'garona/148/98531988-avatar.jpg', 'garona', 0, 0, 5, 4, 1, NULL, 0),
(264, 'løuu', 100, 1, 'garona/65/98663233-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(265, 'shaölin', 100, 0, 'garona/158/98933406-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(266, 'rénovatrice', 100, 1, 'garona/53/99038261-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(267, 'protectrice', 100, 1, 'garona/68/99038276-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(268, 'ragnfrid', 100, 1, 'nerzhul/113/99224689-avatar.jpg', 'ner''zhul', 0, 0, 2, 11, 1, NULL, 0),
(269, 'lorelaïs', 100, 1, 'sargeras/190/99256766-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(270, 'nénuphar', 100, 1, 'sargeras/198/99263174-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(271, 'frizzy', 100, 1, 'garona/151/99375255-avatar.jpg', 'garona', 0, 0, 8, 11, 1, NULL, 0),
(272, 'ashéron', 100, 0, 'garona/8/99442440-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(273, 'equinoc', 100, 0, 'garona/198/99486150-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(274, 'gàdock', 100, 0, 'garona/67/99504451-avatar.jpg', 'garona', 0, 0, 2, 3, 1, NULL, 0),
(275, 'kïkï', 100, 1, 'garona/18/99551250-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(276, 'darthvicious', 100, 0, 'nerzhul/134/99609478-avatar.jpg', 'ner''zhul', 0, 0, 6, 1, 1, NULL, 0),
(277, 'kadyll', 100, 0, 'sargeras/208/99687376-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(278, 'daxou', 100, 0, 'garona/164/99707812-avatar.jpg', 'garona', 0, 0, 3, 3, 1, NULL, 0),
(279, 'jolarson', 100, 0, 'garona/15/99708175-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(280, 'dameos', 100, 0, 'garona/170/99708330-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(281, 'nawamoon', 100, 1, 'garona/146/99708562-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(282, 'isyama', 100, 1, 'garona/185/99710649-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(283, 'syriana', 100, 1, 'garona/215/99710935-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(284, 'drassien', 100, 0, 'garona/204/99721420-avatar.jpg', 'garona', 0, 0, 9, 22, 1, NULL, 0),
(285, 'potak', 100, 0, 'garona/141/99785101-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(286, 'zekee', 100, 0, 'garona/209/99812817-avatar.jpg', 'garona', 0, 0, 4, 22, 1, NULL, 0),
(287, 'pixie', 100, 1, 'garona/51/99822899-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(288, 'kälïndrä', 100, 1, 'garona/126/99853694-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(289, 'dürkor', 100, 0, 'garona/3/100087043-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(290, 'nourslaouf', 100, 1, 'sargeras/50/100186162-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(291, 'iphigénias', 100, 1, 'garona/223/100218335-avatar.jpg', 'garona', 0, 0, 3, 11, 1, NULL, 0),
(292, 'persefal', 100, 0, 'garona/7/100224775-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(293, 'tiliön', 100, 0, 'sargeras/250/100260346-avatar.jpg', 'sargeras', 0, 0, 3, 4, 1, NULL, 0),
(294, 'farramirht', 100, 0, 'garona/201/100285641-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(295, 'byx', 100, 1, 'garona/224/100363488-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(296, 'dhämey', 100, 1, 'garona/15/100442127-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(297, 'myllénième', 100, 1, 'sargeras/83/100450643-avatar.jpg', 'sargeras', 0, 0, 10, 1, 1, NULL, 0),
(298, 'arrowdiac', 100, 0, 'garona/132/100508036-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(299, 'yükinø', 100, 1, 'garona/239/100547311-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(300, 'saggitarius', 100, 0, 'sargeras/97/100550241-avatar.jpg', 'sargeras', 0, 0, 9, 22, 1, NULL, 0),
(301, 'redd', 100, 0, 'garona/205/100577741-avatar.jpg', 'garona', 0, 0, 4, 22, 1, NULL, 0),
(302, 'melyria', 100, 1, 'garona/128/100578688-avatar.jpg', 'garona', 0, 0, 5, 22, 1, NULL, 0),
(303, 'bonobo', 100, 1, 'garona/151/100625815-avatar.jpg', 'garona', 0, 0, 10, 4, 1, NULL, 0),
(304, 'neeli', 100, 1, 'garona/92/100661340-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(305, 'edmun', 100, 0, 'nerzhul/120/100721784-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 1, NULL, 0),
(306, 'cøuette', 100, 1, 'garona/153/100756889-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(307, 'thoby', 100, 0, 'garona/105/100765545-avatar.jpg', 'garona', 0, 0, 6, 22, 1, NULL, 0),
(308, 'naïntuable', 100, 0, 'garona/231/100769255-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(309, 'trìs', 100, 1, 'garona/82/100809554-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(310, 'gadounette', 100, 1, 'garona/115/100829043-avatar.jpg', 'garona', 0, 0, 5, 11, 1, NULL, 0),
(311, 'nowek', 100, 1, 'sargeras/232/100914408-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(312, 'ptibouldpoil', 100, 0, 'garona/214/100969686-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(313, 'natundra', 100, 1, 'sargeras/42/100976170-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(314, 'seiily', 100, 1, 'sargeras/21/101098773-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(315, 'chamyfou', 100, 0, 'sargeras/92/101108828-avatar.jpg', 'sargeras', 0, 0, 7, 25, 1, NULL, 0),
(316, 'dayia', 100, 1, 'garona/66/101109314-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(317, 'elenorias', 100, 1, 'sargeras/106/101133674-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(318, 'marlöw', 100, 0, 'garona/143/101380751-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(319, 'woôd', 100, 0, 'garona/231/101402599-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(320, 'lania', 100, 1, 'sargeras/137/101420169-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(321, 'pesthys', 100, 1, 'garona/128/101501824-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(322, 'mîou', 100, 1, 'sargeras/212/101528788-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(323, 'mîû', 100, 1, 'sargeras/116/101539700-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(324, 'noriah', 100, 1, 'garona/204/101565388-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(325, 'copaincochon', 100, 0, 'garona/146/101653394-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(326, 'myurogue', 100, 1, 'sargeras/24/101660696-avatar.jpg', 'sargeras', 0, 0, 4, 3, 1, NULL, 0),
(327, 'myû', 100, 1, 'sargeras/72/101688136-avatar.jpg', 'sargeras', 0, 0, 3, 1, 1, NULL, 0),
(328, 'miöü', 100, 1, 'sargeras/52/101781300-avatar.jpg', 'sargeras', 0, 0, 2, 1, 1, NULL, 0),
(329, 'myouu', 100, 1, 'sargeras/46/101840174-avatar.jpg', 'sargeras', 0, 0, 6, 11, 1, NULL, 0),
(330, 'zigloo', 100, 0, 'sargeras/80/102043984-avatar.jpg', 'sargeras', 0, 0, 6, 1, 1, NULL, 0),
(331, 'jðke', 100, 0, 'garona/178/102047666-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(332, 'myumonk', 100, 1, 'sargeras/62/102097726-avatar.jpg', 'sargeras', 0, 0, 10, 1, 1, NULL, 0),
(333, 'shapodpaille', 100, 1, 'garona/227/102107107-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(334, 'féniks', 100, 1, 'sargeras/225/102218721-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(335, 'miucham', 100, 0, 'sargeras/134/102253446-avatar.jpg', 'sargeras', 0, 0, 7, 11, 1, NULL, 0),
(336, 'myuwar', 100, 1, 'sargeras/29/102320925-avatar.jpg', 'sargeras', 0, 0, 1, 7, 1, NULL, 0),
(337, 'myupriest', 100, 1, 'sargeras/26/102329114-avatar.jpg', 'sargeras', 0, 0, 5, 1, 1, NULL, 0),
(338, 'myudemo', 100, 1, 'sargeras/33/102329121-avatar.jpg', 'sargeras', 0, 0, 9, 7, 1, NULL, 0),
(339, 'garfunk', 100, 1, 'garona/164/102413220-avatar.jpg', 'garona', 0, 0, 8, 4, 1, NULL, 0),
(340, 'escaheris', 100, 0, 'garona/44/102492716-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(341, 'gothmog', 100, 0, 'nerzhul/138/102506122-avatar.jpg', 'ner''zhul', 0, 0, 9, 1, 1, NULL, 0),
(342, 'capiana', 100, 1, 'garona/70/102515782-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(343, 'myllésime', 100, 1, 'sargeras/36/102587940-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(344, 'sâber', 100, 1, 'garona/145/102615441-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(345, 'peckeur', 100, 0, 'garona/69/102676293-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(346, 'balcmeg', 100, 0, 'garona/226/102748898-avatar.jpg', 'garona', 0, 0, 3, 22, 1, NULL, 0),
(347, 'orgäna', 100, 1, 'garona/124/102948732-avatar.jpg', 'garona', 0, 0, 5, 4, 1, NULL, 0),
(348, 'yooda', 100, 0, 'garona/147/102948755-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(349, 'amidalä', 100, 1, 'garona/0/102993152-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(350, 'watto', 100, 0, 'garona/127/102993791-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(351, 'fréya', 100, 1, 'garona/87/103414103-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(352, 'belami', 100, 0, 'garona/252/103604476-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(353, 'malonys', 100, 1, 'nerzhul/120/103699320-avatar.jpg', 'ner''zhul', 0, 0, 11, 4, 1, NULL, 0),
(354, 'cavina', 100, 1, 'garona/174/103755438-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(355, 'keldrys', 100, 0, 'garona/179/103814579-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(356, 'mjøllnïr', 100, 0, 'garona/17/103854865-avatar.jpg', 'garona', 0, 0, 1, 3, 1, NULL, 0),
(357, 'subkryss', 100, 0, 'garona/234/103856874-avatar.jpg', 'garona', 0, 0, 6, 4, 1, NULL, 0),
(358, 'mîôû', 100, 1, 'sargeras/238/103861998-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(359, 'akakaros', 100, 0, 'garona/39/103966759-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(360, 'greey', 100, 0, 'garona/65/104301633-avatar.jpg', 'garona', 0, 0, 7, 25, 1, NULL, 0),
(361, 'storran', 100, 0, 'garona/127/104337279-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(362, 'jeanluc', 100, 0, 'garona/199/104374983-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(363, 'gârfunk', 100, 1, 'garona/181/104378805-avatar.jpg', 'garona', 0, 0, 10, 11, 1, NULL, 0),
(364, 'justyce', 100, 1, 'sargeras/167/104588455-avatar.jpg', 'sargeras', 0, 0, 5, 1, 1, NULL, 0),
(365, 'castharian', 100, 0, 'garona/38/104878630-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(366, 'kadeska', 100, 1, 'sargeras/250/104889082-avatar.jpg', 'sargeras', 0, 0, 8, 11, 1, NULL, 0),
(367, 'trìskel', 100, 1, 'garona/26/104911642-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(368, 'xântra', 100, 1, 'garona/23/104968727-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(369, 'faïlly', 100, 0, 'garona/74/104989514-avatar.jpg', 'garona', 0, 0, 5, 3, 1, NULL, 0),
(370, 'nïcky', 100, 1, 'garona/67/105019459-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(371, 'kimiia', 100, 1, 'sargeras/134/105146758-avatar.jpg', 'sargeras', 0, 0, 3, 1, 1, NULL, 0),
(372, 'petifour', 100, 0, 'garona/199/105203655-avatar.jpg', 'garona', 0, 0, 3, 11, 1, NULL, 0),
(373, 'redo', 100, 0, 'garona/6/105300230-avatar.jpg', 'garona', 0, 0, 1, 22, 1, NULL, 0),
(374, 'sloveyn', 100, 1, 'garona/172/105300908-avatar.jpg', 'garona', 0, 0, 7, 25, 1, NULL, 0),
(375, 'eskrasi', 100, 0, 'garona/70/105370694-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(376, 'mallidan', 100, 0, 'sargeras/107/105375595-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(377, 'lunafreya', 100, 1, 'garona/209/105382865-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(378, 'yujimbo', 100, 0, 'nerzhul/18/105385746-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 1, NULL, 0),
(379, 'tulimanu', 100, 1, 'garona/162/105395618-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(380, 'vorpile', 100, 1, 'sargeras/111/105395823-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(381, 'mîôöu', 100, 1, 'sargeras/32/105412896-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(382, 'alyssia', 100, 1, 'garona/243/105439987-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(383, 'damillie', 100, 1, 'garona/88/105447256-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(384, 'demonføu', 100, 0, 'sargeras/199/105448903-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(385, 'kadyll', 100, 1, 'garona/27/105453339-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(386, 'hestïä', 100, 1, 'garona/238/105454062-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(387, 'sentiel', 100, 0, 'garona/57/105479993-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(388, 'chlorée', 100, 1, 'sargeras/133/105497989-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(389, 'akoonette', 100, 1, 'garona/171/105514667-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(390, 'trìskali', 100, 1, 'garona/79/105527631-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(391, 'néréha', 100, 1, 'garona/240/105538800-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(392, 'doomscham', 100, 1, 'garona/32/105545504-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(393, 'succubi', 100, 1, 'nerzhul/174/105554606-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 1, NULL, 0),
(394, 'mesrïne', 100, 0, 'sargeras/200/105556424-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(395, 'kryonos', 100, 0, 'garona/193/105560513-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(396, 'alyss', 100, 1, 'garona/226/105563618-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(397, 'darmalma', 100, 0, 'garona/212/105570516-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(398, 'aerria', 100, 1, 'sargeras/178/105571762-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(399, 'diäblar', 100, 0, 'garona/100/105587044-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(400, 'dhärmey', 100, 0, 'garona/141/105611149-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(401, 'morgorth', 100, 0, 'garona/175/105613999-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(402, 'daénérys', 100, 1, 'garona/53/105617973-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(403, 'malania', 100, 1, 'garona/117/105619829-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(404, 'wochini', 100, 0, 'garona/166/105674150-avatar.jpg', 'garona', 0, 0, 1, 25, 1, NULL, 0),
(405, 'antarüs', 100, 1, 'garona/44/105677612-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(406, 'lizis', 100, 0, 'nerzhul/232/105677800-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 1, NULL, 0),
(407, 'cèly', 100, 1, 'garona/246/105677814-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(408, 'nolane', 100, 1, 'sargeras/131/89576835-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(409, 'chasøu', 100, 0, 'garona/48/42388272-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(410, 'jugar', 100, 1, 'sargeras/136/89644168-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(411, 'kîmy', 100, 1, 'sargeras/221/101268189-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(412, 'sallanaeth', 100, 1, 'sargeras/254/105403134-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(413, 'katlynna', 100, 1, 'garona/96/93569376-avatar.jpg', 'garona', 0, 0, 8, 11, 1, NULL, 0),
(414, 'mystra_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(415, 'mystra_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(416, 'alexior', 100, 0, 'rashgarroth/188/67662268-avatar.jpg', 'rashgarroth', 718, 0, 5, 1, NULL, NULL, 0),
(417, 'ambroqme', 100, 0, 'dalaran/253/117303549-avatar.jpg', 'dalaran', 705, 0, 1, 11, NULL, NULL, 0),
(418, 'bottm', 100, 1, 'aegwynn/155/120400795-avatar.jpg', 'aegwynn', 716, 0, 3, 4, NULL, NULL, 0),
(419, 'byzzih', 100, 1, 'hyjal/198/139945414-avatar.jpg', 'hyjal', 714, 0, 7, 3, NULL, NULL, 0),
(420, 'gintam', 100, 0, 'pozzo-delleternita/251/78135803-avatar.jpg', 'pozzo dell''eternità', 700, 0, 1, 1, NULL, NULL, 0),
(421, 'hellting', 100, 0, 'archimonde/132/139806084-avatar.jpg', 'archimonde', 700, 0, 6, 1, NULL, NULL, 0),
(422, 'magow', 100, 0, 'kirin-tor/216/105736664-avatar.jpg', 'kirin tor', 718, 0, 8, 22, NULL, NULL, 0),
(423, 'maltrina', 100, 1, 'tarren-mill/65/120683585-avatar.jpg', 'tarren mill', 702, 0, 8, 1, NULL, NULL, 0),
(424, 'mÿsti', 100, 1, 'kirin-tor/139/105779083-avatar.jpg', 'kirin tor', 734, 0, 11, 22, NULL, NULL, 0),
(425, 'nèphael', 100, 1, 'khaz-modan/104/115829352-avatar.jpg', 'khaz modan', 736, 0, 8, 25, NULL, NULL, 0),
(426, 'roxira', 100, 1, 'la-croisade-ecarlate/201/30653641-avatar.jpg', 'la croisade écarlate', 713, 0, 11, 4, NULL, NULL, 0),
(427, 'saera', 100, 1, 'garona/112/94568304-avatar.jpg', 'garona', 703, 0, 8, 1, NULL, NULL, 0),
(428, 'xéres', 100, 0, 'garona/5/22519557-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(429, 'yamitatsu', 100, 0, 'hyjal/187/139667899-avatar.jpg', 'hyjal', 711, 0, 11, 22, NULL, NULL, 0),
(434, 'mystra_1_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(435, 'mystra_1_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(441, 'akirian', 100, 0, 'garona/41/3881769-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(442, 'octav', 100, 0, 'garona/90/23131738-avatar.jpg', 'garona', 0, 0, 3, 3, 2, NULL, 0),
(443, 'arkös', 100, 0, 'garona/22/28675094-avatar.jpg', 'garona', 0, 0, 6, 11, 2, NULL, 0),
(444, 'wôlff', 100, 0, 'garona/11/49420299-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(445, 'Àbigaëlle', 100, 1, 'garona/178/53469618-avatar.jpg', 'garona', 0, 0, 8, 4, 2, NULL, 0),
(446, 'chomano', 100, 0, 'garona/175/57910447-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(447, 'prôzzak', 100, 0, 'garona/177/103369649-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0);

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
  `note` text,
  `valeur` float(6,2) DEFAULT '0.00',
  `ajoutePar` varchar(30) DEFAULT NULL,
  `majPar` varchar(30) DEFAULT NULL,
  `idRosterTmp` int(11) NOT NULL COMMENT 'A virer une fois le lien vers evenement codé',
  `idZoneTmp` int(11) NOT NULL COMMENT 'A virer une fois le lien vers evenement codé',
  `idMode` int(11) NOT NULL,
  PRIMARY KEY (`idRaid`),
  KEY `fk_raids_evenements1_idx` (`idEvenements`),
  KEY `fk_raids_roster1_idx` (`idRosterTmp`),
  KEY `fk_raids_zone1_idx` (`idZoneTmp`),
  KEY `fk_raids_mode_difficulte1_idx` (`idMode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Vider la table avant d'insérer `raids`
--

TRUNCATE TABLE `raids`;
--
-- Contenu de la table `raids`
--

INSERT INTO `raids` (`idRaid`, `idEvenements`, `date`, `note`, `valeur`, `ajoutePar`, `majPar`, `idRosterTmp`, `idZoneTmp`, `idMode`) VALUES
(8, NULL, '2016-07-30 19:55:35', 'Hellfire Citadel - flex NM', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 1, 7545, 14);

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
(8, 37),
(8, 59),
(8, 65),
(8, 104),
(8, 172),
(8, 206),
(8, 261),
(8, 309),
(8, 315),
(8, 340),
(8, 363),
(8, 367),
(8, 369),
(8, 416),
(8, 417),
(8, 418),
(8, 419),
(8, 420),
(8, 421),
(8, 422),
(8, 423),
(8, 424),
(8, 425),
(8, 426),
(8, 427),
(8, 428),
(8, 429);

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
(1, 171, 1, NULL),
(2, 171, 1, NULL);

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
  ADD CONSTRAINT `fk_evenements_donjon1` FOREIGN KEY (`idDonjon`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_users1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_evenements_template1` FOREIGN KEY (`idEvenements_template`) REFERENCES `evenements_template` (`idEvenements_template`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_item_personnage_raid_raids1` FOREIGN KEY (`idRaid`) REFERENCES `raids` (`idRaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_bosses1` FOREIGN KEY (`idBosses`) REFERENCES `bosses` (`idBosses`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_personnages_classes1` FOREIGN KEY (`idClasses`) REFERENCES `classes` (`idClasses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_faction1` FOREIGN KEY (`idFaction`) REFERENCES `faction` (`idFaction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_race1` FOREIGN KEY (`idRace`) REFERENCES `race` (`idRace`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnage_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnage_users1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `raids`
--
ALTER TABLE `raids`
  ADD CONSTRAINT `fk_raids_evenements1` FOREIGN KEY (`idEvenements`) REFERENCES `evenements` (`idEvenements`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raids_roster1` FOREIGN KEY (`idRosterTmp`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raids_zone1` FOREIGN KEY (`idZoneTmp`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raids_mode` FOREIGN KEY (`idMode`) REFERENCES `mode_difficulte` (`idMode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `raid_personnage`
--
ALTER TABLE `raid_personnage`
  ADD CONSTRAINT `fk_raid_personnage_raids1` FOREIGN KEY (`idRaid`) REFERENCES `raids` (`idRaid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raid_personnage_personnages1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `roster_has_personnage`
--
ALTER TABLE `roster_has_personnage`
  ADD CONSTRAINT `fk_roster_has_personnage_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_has_personnage_personnage1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_has_personnage_role1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
