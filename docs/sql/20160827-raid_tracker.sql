-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 27 Août 2016 à 21:56
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
(87441, 'brackenspore', 100, 146781),
(87444, 'kargath bladefist', 101, 101230),
(87445, 'ko''ragh', 103, 43331200),
(87446, 'tectus, the living mountain', 103, 828709),
(87447, 'the butcher', 102, 43331200),
(87449, 'twin ogron', 103, 36019060),
(87818, 'imperator mar''gok', 102, 125661),
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
(87818, 77809),
(87818, 77877),
(87818, 77878),
(87818, 77879),
(87818, 78121),
(87449, 78237),
(77557, 78341),
(77557, 78343),
(77557, 78347),
(77557, 78351),
(77557, 78352),
(76809, 78463),
(87818, 78549),
(87441, 78868),
(87441, 78884),
(87444, 78926),
(87444, 78954),
(87818, 79956),
(87444, 80474),
(87446, 80551),
(87446, 80557),
(76906, 80791),
(76906, 81197),
(76906, 81315),
(76906, 81318),
(76906, 81612),
(87447, 82505),
(87444, 84946),
(87441, 86611),
(87441, 86613),
(87420, 87420),
(87441, 87441),
(87444, 87444),
(87445, 87445),
(87446, 87446),
(87447, 87447),
(87449, 87449),
(87818, 87818),
(76906, 87841),
(76809, 88818),
(76809, 88820),
(76809, 88821),
(87441, 89269),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vider la table avant d'insérer `guildes`
--

TRUNCATE TABLE `guildes`;
--
-- Contenu de la table `guildes`
--

INSERT INTO `guildes` (`idGuildes`, `nom`, `serveur`, `niveau`, `miniature`, `idFaction`) VALUES
(1, 'mystra', 'Garona', 25, '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

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
(53, 'demonbuckle sash of argus', 'Import Raid-TracKer', '', 124200, '', 'inv_buckle_plate_archimonde_d_01'),
(56, 'champion''s medallion', 'Import Raid-TracKer', '', 113598, '', 'inv_6_0raid_necklace_4a'),
(57, 'casque of the iron bomber', 'Import Raid-TracKer', '', 113600, '', 'inv_plate_raiddeathknight_o_01helm');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Vider la table avant d'insérer `item_personnage_raid`
--

TRUNCATE TABLE `item_personnage_raid`;
--
-- Contenu de la table `item_personnage_raid`
--

INSERT INTO `item_personnage_raid` (`idItemRaidPersonnage`, `idRaid`, `idItem`, `idPersonnage`, `valeur`, `bonus`, `idBosses`, `note`) VALUES
(18, 4, 17, 68, 0.00, '1801:1472:529:', 92146, ''),
(28, 4, 27, 56, 0.00, '1801:1472:529:', 90199, ''),
(34, 4, 32, 51, 0.00, '1801:1472:529:', 90296, ''),
(38, 4, 35, 60, 0.00, '1801:41:1477:', 90269, ''),
(40, 4, 36, 49, 0.00, '1801:41:1487:', 89890, ''),
(41, 4, 37, 55, 0.00, '1801:1472:529:', 89890, ''),
(44, 4, 39, 63, 0.00, '1801:1472:529:', 93068, ''),
(45, 4, 40, 46, 0.00, '1801:1472:529:', 93068, ''),
(47, 4, 42, 50, 0.00, '1801:1472:529:', 93068, ''),
(49, 4, 44, 52, 0.00, '1801:563:1472:', 91349, ''),
(50, 4, 45, 66, 0.00, '1801:1472:529:', 91349, ''),
(51, 4, 46, 62, 0.00, '1801:1472:529:', 91331, ''),
(52, 4, 47, 67, 0.00, '1801:1472:529:', 91331, ''),
(53, 4, 48, 54, 0.00, '1801:1472:529:', 91331, ''),
(54, 4, 49, 47, 0.00, '1801:1472:529:', 91331, ''),
(55, 4, 50, 44, 0.00, '1801:1482:3441:', 91331, ''),
(56, 4, 51, 61, 0.00, '1801:1472:529:', 91331, ''),
(57, 4, 51, 65, 0.00, '1801:1472:529:', 91331, ''),
(58, 4, 52, 59, 0.00, '1801:563:1472:', 91331, ''),
(59, 4, 53, 64, 0.00, '1801:1472:529:', 91331, ''),
(61, 8, 56, 87, 0.00, '567:::', 87444, ''),
(62, 8, 57, 50, 0.00, '565:567::', 87444, ''),
(63, 4, 53, 81, 0.00, '1801:1472:529:', 91331, '');

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
(77809, 'arcane aberration'),
(77877, 'replicating arcane aberration'),
(77878, 'fortified arcane aberration'),
(77879, 'displacing arcane aberration'),
(78121, 'gorian warmage'),
(78237, 'phemos'),
(78341, 'uk''urogg'),
(78343, 'gorak'),
(78347, 'iron eviscerator'),
(78351, 'uktar'),
(78352, 'battle medic rogg'),
(78463, 'slag elemental'),
(78549, 'gorian reaver'),
(78868, 'rejuvenating mushroom'),
(78884, 'living mushroom'),
(78926, 'iron bomber'),
(78954, 'drunken bileslinger'),
(79956, 'volatile anomaly'),
(80474, 'ravenous bloodmaw'),
(80551, 'shard of tectus'),
(80557, 'mote of tectus'),
(80791, 'grom''kar man-at-arms'),
(81197, 'iron raider'),
(81315, 'iron crack-shot'),
(81318, 'iron gunnery sergeant'),
(81612, 'deforester'),
(82505, 'night-twisted cadaver'),
(84946, 'iron grunt'),
(86611, 'mind fungus'),
(86613, 'fungal flesh-eater'),
(87420, 'blackhand'),
(87441, 'brackenspore'),
(87444, 'kargath bladefist'),
(87445, 'ko''ragh'),
(87446, 'tectus'),
(87447, 'the butcher'),
(87449, 'pol'),
(87818, 'imperator mar''gok'),
(87841, 'grom''kar firemender'),
(88818, 'security guard'),
(88820, 'furnace engineer'),
(88821, 'bellows operator'),
(89269, 'spore shooter'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vider la table avant d'insérer `pallierAfficher`
--

TRUNCATE TABLE `pallierAfficher`;
--
-- Contenu de la table `pallierAfficher`
--

INSERT INTO `pallierAfficher` (`idPallierAffiche`, `idModeDifficulte`, `idZone`, `idRoster`) VALUES
(1, 14, 7545, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=473 ;

--
-- Vider la table avant d'insérer `personnages`
--

TRUNCATE TABLE `personnages`;
--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`idPersonnage`, `nom`, `niveau`, `genre`, `miniature`, `royaume`, `ilvl`, `idFaction`, `idClasses`, `idRace`, `idGuildes`, `idUsers`, `isTech`) VALUES
(1, 'mystra_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(2, 'mystra_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(43, 'alexior', 100, 0, 'rashgarroth/188/67662268-avatar.jpg', 'rashgarroth', 719, 0, 5, 1, NULL, NULL, 0),
(44, 'ambroqme', 100, 0, 'dalaran/253/117303549-avatar.jpg', 'dalaran', 705, 0, 1, 11, NULL, NULL, 0),
(45, 'bottm', 100, 1, 'aegwynn/155/120400795-avatar.jpg', 'aegwynn', 716, 0, 3, 4, NULL, NULL, 0),
(46, 'byzzih', 100, 1, 'hyjal/198/139945414-avatar.jpg', 'hyjal', 714, 0, 7, 3, NULL, NULL, 0),
(47, 'capï', 100, 1, 'garona/40/40891944-avatar.jpg', 'garona', 0, 0, 3, 25, 1, NULL, 0),
(48, 'chamyfou', 100, 0, 'sargeras/92/101108828-avatar.jpg', 'sargeras', 0, 0, 7, 25, 1, NULL, 0),
(49, 'christange', 100, 1, 'garona/87/74051159-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(50, 'commonbaby', 100, 0, 'sargeras/125/98300541-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(51, 'escaheris', 100, 0, 'garona/44/102492716-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(52, 'faïlly', 100, 0, 'garona/74/104989514-avatar.jpg', 'garona', 0, 0, 5, 3, 1, NULL, 0),
(53, 'gintam', 100, 0, 'pozzo-delleternita/251/78135803-avatar.jpg', 'pozzo dell''eternità', 705, 0, 1, 1, NULL, NULL, 0),
(54, 'gârfunk', 100, 1, 'garona/181/104378805-avatar.jpg', 'garona', 0, 0, 10, 11, 1, NULL, 0),
(55, 'hellting', 100, 0, 'archimonde/132/139806084-avatar.jpg', 'archimonde', 700, 0, 6, 1, NULL, NULL, 0),
(56, 'lisys', 100, 1, 'garona/178/18159538-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(57, 'magow', 100, 0, 'kirin-tor/216/105736664-avatar.jpg', 'kirin tor', 718, 0, 8, 22, NULL, NULL, 0),
(58, 'maltrina', 100, 1, 'tarren-mill/65/120683585-avatar.jpg', 'tarren mill', 702, 0, 8, 1, NULL, NULL, 0),
(59, 'mÿsti', 100, 1, 'kirin-tor/139/105779083-avatar.jpg', 'kirin tor', 734, 0, 11, 22, NULL, NULL, 0),
(60, 'nèphael', 100, 1, 'khaz-modan/104/115829352-avatar.jpg', 'khaz modan', 736, 0, 8, 25, NULL, NULL, 0),
(61, 'philémons', 100, 0, 'garona/186/57348538-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(62, 'riddick', 100, 0, 'sargeras/193/89665985-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(63, 'roxira', 100, 1, 'la-croisade-ecarlate/201/30653641-avatar.jpg', 'la croisade écarlate', 723, 0, 11, 4, NULL, NULL, 0),
(64, 'saera', 100, 1, 'garona/112/94568304-avatar.jpg', 'garona', 703, 0, 8, 1, NULL, NULL, 0),
(65, 'tikchbila', 100, 0, 'garona/154/36140954-avatar.jpg', 'garona', 0, 0, 8, 22, 1, NULL, 0),
(66, 'trìs', 100, 1, 'garona/82/100809554-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(67, 'trìskel', 100, 1, 'garona/26/104911642-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(68, 'xéres', 100, 0, 'garona/5/22519557-avatar.jpg', 'garona', 708, 0, 2, 1, NULL, NULL, 0),
(69, 'yamitatsu', 100, 0, 'hyjal/187/139667899-avatar.jpg', 'hyjal', 711, 0, 11, 22, NULL, NULL, 0),
(81, 'antaruss', 100, 1, 'garona/10/74018058-avatar.jpg', 'garona', 726, 0, 10, 1, NULL, NULL, 0),
(82, 'argausse', 100, 0, 'chants-eternels/6/96764166-avatar.jpg', 'chants éternels', 717, 0, 2, 11, NULL, NULL, 0),
(83, 'chacra', 100, 0, 'elune/91/96831835-avatar.jpg', 'elune', 729, 0, 1, 1, NULL, NULL, 0),
(84, 'druideep', 100, 0, 'nerzhul/153/99633817-avatar.jpg', 'ner''zhul', 710, 0, 11, 4, NULL, NULL, 0),
(85, 'paladee', 100, 0, 'nerzhul/222/99702494-avatar.jpg', 'ner''zhul', 705, 0, 2, 1, NULL, NULL, 0),
(86, 'rhokk', 100, 0, 'amanthul/33/99993121-avatar.jpg', 'aman''thul', 732, 0, 1, 3, NULL, NULL, 0),
(87, 'rist', 100, 0, 'voljin/173/73802157-avatar.jpg', 'vol''jin', 697, 0, 2, 1, NULL, NULL, 0),
(88, 'antarüs', 100, 1, 'garona/44/105677612-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(89, 'chlorée', 100, 1, 'sargeras/133/105497989-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(90, 'féniks', 100, 1, 'sargeras/225/102218721-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(91, 'kâdyl', 100, 1, 'garona/25/96249369-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(92, 'liköpi', 100, 0, 'sargeras/255/90054655-avatar.jpg', 'sargeras', 0, 0, 7, 11, 1, NULL, 0),
(93, 'miks', 100, 1, 'sargeras/106/89038442-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(94, 'moonty', 100, 0, 'garona/198/105433798-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(95, 'nïcky', 100, 1, 'garona/67/105019459-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(96, 'persefal', 100, 0, 'garona/7/100224775-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(97, 'prony', 100, 0, 'garona/83/2803795-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(98, 'sfy', 100, 0, 'nerzhul/77/77472589-avatar.jpg', 'ner''zhul', 0, 0, 8, 1, 1, NULL, 0),
(99, 'subkryss', 100, 0, 'garona/234/103856874-avatar.jpg', 'garona', 0, 0, 6, 4, 1, NULL, 0),
(100, 'tÿra', 100, 0, 'garona/57/35029305-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(101, 'wochifan', 100, 0, 'garona/245/95029749-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(102, 'mystra_1_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(103, 'mystra_1_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(104, 'mystra_2_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(105, 'mystra_2_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(106, 'mystra_3_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(107, 'mystra_3_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(108, 'océannia', 100, 1, 'garona/104/1813864-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(109, 'mordrède', 100, 0, 'garona/30/2636318-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(110, 'lagaboulette', 100, 1, 'garona/223/2676447-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(111, 'yarixa', 100, 1, 'garona/70/2711622-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(112, 'octo', 100, 0, 'garona/230/5208038-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(113, 'kerimaa', 100, 1, 'garona/125/5767549-avatar.jpg', 'garona', 0, 0, 3, 11, 1, NULL, 0),
(114, 'wolfmann', 100, 0, 'garona/13/5841165-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(115, 'capikaze', 100, 0, 'garona/170/9321898-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(116, 'bøubøule', 100, 0, 'garona/79/9410383-avatar.jpg', 'garona', 0, 0, 3, 3, 1, NULL, 0),
(117, 'sadday', 100, 1, 'garona/46/9553198-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(118, 'falinns', 100, 0, 'garona/234/9607402-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(119, 'cely', 100, 1, 'garona/113/9790833-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(120, 'alandrys', 100, 0, 'garona/58/9801530-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(121, 'elirys', 100, 1, 'garona/137/10309257-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(122, 'parlama', 100, 1, 'garona/143/10635151-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(123, 'alax', 100, 0, 'garona/54/11104054-avatar.jpg', 'garona', 0, 0, 2, 3, 1, NULL, 0),
(124, 'acronomicon', 100, 0, 'garona/76/12192588-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(125, 'lhilhi', 100, 1, 'garona/209/12288465-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(126, 'arthyss', 100, 0, 'garona/109/12343149-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(127, 'apisto', 100, 0, 'garona/199/12419527-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(128, 'nryan', 100, 0, 'garona/87/12421719-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(129, 'karabistouil', 100, 1, 'garona/66/13559106-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(130, 'ptitepoucett', 100, 1, 'garona/237/13613805-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(131, 'healsangel', 100, 1, 'garona/226/14281954-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(132, 'kiev', 100, 0, 'garona/212/14996436-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(133, 'nisya', 100, 1, 'garona/34/15257378-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(134, 'kaarapital', 100, 1, 'garona/134/16132486-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(135, 'poupoucetire', 100, 1, 'garona/234/16132842-avatar.jpg', 'garona', 0, 0, 3, 11, 1, NULL, 0),
(136, 'madryade', 100, 1, 'garona/181/16490933-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(137, 'arcalyne', 100, 1, 'garona/244/17042164-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(138, 'kaarabine', 100, 1, 'garona/170/17945514-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(139, 'bogossa', 100, 1, 'garona/71/19291463-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(140, 'rurú', 100, 1, 'garona/200/19821000-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(141, 'heresânkh', 100, 1, 'garona/158/20167326-avatar.jpg', 'garona', 0, 0, 5, 11, 1, NULL, 0),
(142, 'antarus', 100, 0, 'garona/146/21289874-avatar.jpg', 'garona', 0, 0, 5, 4, 1, NULL, 0),
(143, 'laetitiaa', 100, 1, 'garona/203/22083275-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(144, 'khronøs', 100, 0, 'garona/125/23517053-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(145, 'karalich', 100, 1, 'garona/26/23697690-avatar.jpg', 'garona', 0, 0, 6, 4, 1, NULL, 0),
(146, 'poulich', 100, 1, 'garona/109/23709549-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(147, 'prozzak', 100, 0, 'garona/42/26734122-avatar.jpg', 'garona', 0, 0, 5, 3, 1, NULL, 0),
(148, 'bigbeer', 100, 0, 'garona/255/28860159-avatar.jpg', 'garona', 0, 0, 3, 3, 1, NULL, 0),
(149, 'redoot', 100, 1, 'garona/254/29159934-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(150, 'plateùs', 100, 0, 'garona/10/30977034-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(151, 'shynzu', 100, 1, 'garona/149/34208149-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(152, 'lylybelle', 100, 1, 'garona/99/34321507-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(153, 'ilidøs', 100, 0, 'garona/9/34456073-avatar.jpg', 'garona', 0, 0, 6, 4, 1, NULL, 0),
(154, 'xcalibur', 100, 0, 'garona/24/35030552-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(155, 'auron', 100, 0, 'garona/61/35204669-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(156, 'magerie', 100, 1, 'garona/241/36358385-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(157, 'harigston', 100, 1, 'garona/119/37148279-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(158, 'aeoline', 100, 1, 'garona/61/37618237-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(159, 'olare', 100, 0, 'garona/10/37762058-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(160, 'bachantes', 100, 0, 'garona/49/39400497-avatar.jpg', 'garona', 0, 0, 1, 3, 1, NULL, 0),
(161, 'pléco', 100, 1, 'garona/225/40947937-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(162, 'chasøu', 100, 0, 'garona/48/42388272-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(163, 'cellesta', 100, 1, 'garona/19/43252755-avatar.jpg', 'garona', 0, 0, 5, 11, 1, NULL, 0),
(164, 'laugan', 100, 0, 'garona/23/45220631-avatar.jpg', 'garona', 0, 0, 5, 3, 1, NULL, 0),
(165, 'ptitelouve', 100, 1, 'garona/123/45595259-avatar.jpg', 'garona', 0, 0, 4, 22, 1, NULL, 0),
(166, 'talisia', 100, 1, 'garona/12/46258956-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(167, 'spoiler', 100, 0, 'garona/31/46725407-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(168, 'kalamïty', 100, 1, 'garona/195/48465859-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(169, 'félicias', 100, 1, 'garona/137/49561225-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(170, 'iriséa', 100, 1, 'garona/60/49766972-avatar.jpg', 'garona', 0, 0, 8, 4, 1, NULL, 0),
(171, 'rapiou', 100, 0, 'garona/76/50125388-avatar.jpg', 'garona', 0, 0, 4, 22, 1, NULL, 0),
(172, 'Ächille', 100, 0, 'garona/21/50140693-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(173, 'thusùxx', 100, 0, 'garona/97/50817121-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(174, 'cartam', 100, 0, 'garona/135/50938503-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(175, 'mâjuscule', 100, 1, 'garona/85/51698517-avatar.jpg', 'garona', 0, 0, 8, 11, 1, NULL, 0),
(176, 'cartmân', 100, 0, 'garona/100/51740004-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(177, 'kægan', 100, 1, 'garona/202/51949770-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(178, 'deathinition', 100, 0, 'garona/206/52678862-avatar.jpg', 'garona', 0, 0, 6, 11, 1, NULL, 0),
(179, 'mérys', 100, 1, 'garona/141/52905101-avatar.jpg', 'garona', 0, 0, 4, 1, 1, NULL, 0),
(180, 'cartmän', 100, 0, 'garona/102/53301094-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(181, 'jðe', 100, 0, 'garona/8/53700616-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(182, 'gøuma', 100, 0, 'garona/116/54341236-avatar.jpg', 'garona', 0, 0, 8, 3, 1, NULL, 0),
(183, 'gøuminette', 100, 1, 'garona/120/54341240-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(184, 'sømetimes', 100, 1, 'garona/74/54789706-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(185, 'nydelia', 100, 1, 'garona/51/55169843-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(186, 'valyanas', 100, 1, 'garona/30/55325214-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(187, 'lønï', 100, 1, 'garona/254/55326462-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(188, 'crysista', 100, 1, 'garona/148/55543956-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(189, 'oriane', 100, 1, 'garona/205/55836621-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(190, 'swanya', 100, 1, 'garona/7/56419335-avatar.jpg', 'garona', 0, 0, 3, 22, 1, NULL, 0),
(191, 'menora', 100, 1, 'garona/97/56565857-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(192, 'Ðeltasu', 100, 0, 'garona/144/56734608-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(193, 'shefirius', 100, 0, 'garona/149/56895125-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(194, 'nayka', 100, 1, 'garona/75/56993099-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(195, 'wartax', 100, 0, 'garona/125/57239933-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(196, 'smado', 100, 0, 'garona/114/57897330-avatar.jpg', 'garona', 0, 0, 10, 7, 1, NULL, 0),
(197, 'thyios', 100, 1, 'garona/106/57899626-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(198, 'unnder', 100, 0, 'garona/253/58228221-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(199, 'coonta', 100, 1, 'garona/127/59596159-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(200, 'kâlia', 100, 1, 'garona/223/59663071-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(201, 'jesuisblonde', 100, 1, 'garona/179/59805875-avatar.jpg', 'garona', 0, 0, 4, 1, 1, NULL, 0),
(202, 'olaf', 100, 0, 'garona/235/59918571-avatar.jpg', 'garona', 0, 0, 6, 3, 1, NULL, 0),
(203, 'aygul', 100, 1, 'garona/229/59934181-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(204, 'thynael', 100, 1, 'garona/112/60011888-avatar.jpg', 'garona', 0, 0, 6, 22, 1, NULL, 0),
(205, 'drethz', 100, 0, 'garona/61/60030013-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(206, 'amnésiâ', 100, 1, 'garona/24/60044568-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(207, 'aryaa', 100, 1, 'garona/119/60073847-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(208, 'ciryaliel', 100, 1, 'garona/237/60352493-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(209, 'amélianne', 100, 1, 'garona/168/60363688-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(210, 'ambiorixx', 100, 0, 'garona/36/60381988-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(211, 'heldin', 100, 0, 'garona/80/60588112-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(212, 'kâdyll', 100, 1, 'garona/244/60942836-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(213, 'kàdyll', 100, 1, 'garona/85/61138261-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(214, 'ivøri', 100, 1, 'garona/232/61292008-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(215, 'alys', 100, 1, 'garona/216/61403608-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(216, 'deathss', 100, 0, 'garona/187/61502395-avatar.jpg', 'garona', 0, 0, 6, 22, 1, NULL, 0),
(217, 'angelÿn', 100, 1, 'garona/15/61609999-avatar.jpg', 'garona', 0, 0, 8, 25, 1, NULL, 0),
(218, 'yoshino', 100, 1, 'garona/60/61798972-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(219, 'baêlle', 100, 1, 'garona/214/62194646-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(220, 'suyon', 100, 1, 'garona/141/62668429-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(221, 'yukïno', 100, 1, 'garona/164/62752932-avatar.jpg', 'garona', 0, 0, 6, 11, 1, NULL, 0),
(222, 'samisa', 100, 1, 'garona/43/62753835-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(223, 'jisun', 100, 1, 'garona/42/63894058-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(224, 'ayumu', 100, 1, 'garona/202/63920074-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(225, 'mickie', 100, 1, 'garona/119/65614711-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(226, 'minji', 100, 1, 'garona/115/65681011-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(227, 'lydriana', 100, 1, 'nerzhul/231/65779687-avatar.jpg', 'ner''zhul', 0, 0, 5, 1, 1, NULL, 0),
(228, 'acta', 100, 1, 'nerzhul/92/65854812-avatar.jpg', 'ner''zhul', 0, 0, 3, 11, 1, NULL, 0),
(229, 'nathe', 100, 1, 'nerzhul/77/65920589-avatar.jpg', 'ner''zhul', 0, 0, 5, 1, 1, NULL, 0),
(230, 'kréa', 100, 1, 'nerzhul/121/65934969-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 1, NULL, 0),
(231, 'eclypse', 100, 1, 'nerzhul/179/66122931-avatar.jpg', 'ner''zhul', 0, 0, 3, 22, 1, NULL, 0),
(232, 'healle', 100, 1, 'nerzhul/96/66131296-avatar.jpg', 'ner''zhul', 0, 0, 5, 4, 1, NULL, 0),
(233, 'emac', 100, 1, 'nerzhul/218/66211802-avatar.jpg', 'ner''zhul', 0, 0, 1, 22, 1, NULL, 0),
(234, 'wumbat', 100, 0, 'nerzhul/180/66235060-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 1, NULL, 0),
(235, 'lnaudru', 100, 1, 'nerzhul/232/66251496-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 1, NULL, 0),
(236, 'alwynn', 100, 0, 'garona/253/66481661-avatar.jpg', 'garona', 0, 0, 5, 4, 1, NULL, 0),
(237, 'särãh', 100, 1, 'nerzhul/90/66518106-avatar.jpg', 'ner''zhul', 0, 0, 3, 1, 1, NULL, 0),
(238, 'baldar', 100, 0, 'nerzhul/61/66540093-avatar.jpg', 'ner''zhul', 0, 0, 2, 1, 1, NULL, 0),
(239, 'xylomi', 100, 1, 'nerzhul/185/66549177-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 1, NULL, 0),
(240, 'hassakura', 100, 0, 'nerzhul/104/66554472-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 1, NULL, 0),
(241, 'bellame', 100, 1, 'garona/86/67268182-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(242, 'karacast', 100, 1, 'garona/89/67511385-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(243, 'kaara', 100, 1, 'garona/152/67514776-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(244, 'cøcalight', 100, 1, 'garona/69/67702597-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(245, 'karaoutai', 100, 1, 'garona/10/67769098-avatar.jpg', 'garona', 0, 0, 5, 7, 1, NULL, 0),
(246, 'zygore', 100, 0, 'garona/94/67822686-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(247, 'kimtan', 100, 1, 'garona/37/68474149-avatar.jpg', 'garona', 0, 0, 10, 4, 1, NULL, 0),
(248, 'jiwon', 100, 1, 'garona/83/68678739-avatar.jpg', 'garona', 0, 0, 6, 4, 1, NULL, 0),
(249, 'okarin', 100, 0, 'garona/37/69615909-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(250, 'mûrmûr', 100, 1, 'garona/95/69866079-avatar.jpg', 'garona', 0, 0, 9, 22, 1, NULL, 0),
(251, 'cøcazerø', 100, 0, 'garona/86/70524502-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(252, 'graalimpie', 100, 0, 'nerzhul/192/71505600-avatar.jpg', 'ner''zhul', 0, 0, 6, 4, 1, NULL, 0),
(253, 'kadyl', 100, 1, 'garona/31/71591199-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(254, 'mizutani', 100, 1, 'garona/21/72120085-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(255, 'jevo', 100, 0, 'garona/124/73588092-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(256, 'yùkinà', 100, 1, 'garona/1/73646593-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(257, 'hayes', 100, 1, 'garona/99/73668963-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(258, 'timelord', 100, 0, 'nerzhul/53/73684021-avatar.jpg', 'ner''zhul', 0, 0, 1, 4, 1, NULL, 0),
(259, 'destinee', 100, 1, 'garona/76/73718092-avatar.jpg', 'garona', 0, 0, 8, 25, 1, NULL, 0),
(260, 'tîmelord', 100, 0, 'nerzhul/38/73722406-avatar.jpg', 'ner''zhul', 0, 0, 3, 4, 1, NULL, 0),
(261, 'yùkinø', 100, 1, 'garona/144/73912720-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(262, 'belleange', 100, 1, 'garona/253/73919997-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(263, 'minianta', 100, 1, 'garona/159/74222495-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(264, 'lenøre', 100, 1, 'garona/130/74374274-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(265, 'bloodynight', 100, 1, 'garona/213/74478293-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(266, 'xeralynn', 100, 1, 'garona/191/75077567-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(267, 'lishaoran', 100, 0, 'garona/128/75897728-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(268, 'benjiwars', 100, 0, 'garona/232/75921640-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(269, 'kashyk', 100, 1, 'garona/172/75924396-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(270, 'angelicka', 100, 1, 'garona/205/77464525-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(271, 'jevy', 100, 0, 'garona/192/78349504-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(272, 'nosfia', 100, 1, 'garona/196/78395588-avatar.jpg', 'garona', 0, 0, 1, 25, 1, NULL, 0),
(273, 'ewanaelle', 100, 1, 'garona/83/84882771-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(274, 'aldure', 100, 0, 'sargeras/154/89034650-avatar.jpg', 'sargeras', 0, 0, 2, 1, 1, NULL, 0),
(275, 'balrog', 100, 0, 'sargeras/68/89081924-avatar.jpg', 'sargeras', 0, 0, 1, 22, 1, NULL, 0),
(276, 'dogua', 100, 0, 'sargeras/166/89086886-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(277, 'ildriar', 100, 0, 'sargeras/166/89091494-avatar.jpg', 'sargeras', 0, 0, 2, 1, 1, NULL, 0),
(278, 'taïmana', 100, 1, 'sargeras/100/89091684-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(279, 'misswow', 100, 1, 'sargeras/195/89097923-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(280, 'maïnoa', 100, 1, 'sargeras/245/89101557-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(281, 'drahas', 100, 0, 'sargeras/63/89275455-avatar.jpg', 'sargeras', 0, 0, 6, 11, 1, NULL, 0),
(282, 'chlöre', 100, 1, 'sargeras/96/89276000-avatar.jpg', 'sargeras', 0, 0, 6, 4, 1, NULL, 0),
(283, 'sealyna', 100, 1, 'sargeras/85/89280341-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(284, 'pushup', 100, 1, 'sargeras/20/89295892-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(285, 'belnadifia', 100, 1, 'sargeras/228/89356004-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(286, 'mchou', 100, 1, 'sargeras/183/89374391-avatar.jpg', 'sargeras', 0, 0, 7, 11, 1, NULL, 0),
(287, 'damnetus', 100, 0, 'sargeras/24/89529880-avatar.jpg', 'sargeras', 0, 0, 11, 22, 1, NULL, 0),
(288, 'trinquette', 100, 1, 'sargeras/139/89549707-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(289, 'parlevent', 100, 1, 'sargeras/9/89552649-avatar.jpg', 'sargeras', 0, 0, 7, 11, 1, NULL, 0),
(290, 'asharaak', 100, 0, 'sargeras/151/89552791-avatar.jpg', 'sargeras', 0, 0, 4, 22, 1, NULL, 0),
(291, 'drèams', 100, 1, 'sargeras/86/89564502-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(292, 'nolane', 100, 1, 'sargeras/131/89576835-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(293, 'kimaria', 100, 1, 'sargeras/20/89609748-avatar.jpg', 'sargeras', 0, 0, 9, 1, 1, NULL, 0),
(294, 'ango', 100, 1, 'sargeras/73/89630537-avatar.jpg', 'sargeras', 0, 0, 5, 11, 1, NULL, 0),
(295, 'jugar', 100, 1, 'sargeras/136/89644168-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(296, 'lotùs', 100, 1, 'sargeras/240/89688304-avatar.jpg', 'sargeras', 0, 0, 4, 4, 1, NULL, 0),
(297, 'xàe', 100, 1, 'sargeras/27/89733403-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(298, 'feniks', 100, 1, 'sargeras/78/89738318-avatar.jpg', 'sargeras', 0, 0, 10, 1, 1, NULL, 0),
(299, 'azhrei', 100, 0, 'sargeras/22/89739798-avatar.jpg', 'sargeras', 0, 0, 2, 1, 1, NULL, 0),
(300, 'fenixia', 100, 1, 'sargeras/178/89743282-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(301, 'omezaroth', 100, 0, 'sargeras/19/89854483-avatar.jpg', 'sargeras', 0, 0, 3, 4, 1, NULL, 0),
(302, 'gromack', 100, 0, 'sargeras/112/90017136-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(303, 'piliko', 100, 0, 'sargeras/209/90058961-avatar.jpg', 'sargeras', 0, 0, 1, 3, 1, NULL, 0),
(304, 'zephyel', 100, 0, 'sargeras/38/90068262-avatar.jpg', 'sargeras', 0, 0, 9, 22, 1, NULL, 0),
(305, 'haknarion', 100, 0, 'sargeras/136/90073736-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(306, 'spartìate', 100, 1, 'sargeras/25/92064537-avatar.jpg', 'sargeras', 0, 0, 1, 4, 1, NULL, 0),
(307, 'Üther', 100, 0, 'garona/154/93266586-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(308, 'katlynna', 100, 1, 'garona/96/93569376-avatar.jpg', 'garona', 0, 0, 8, 11, 1, NULL, 0),
(309, 'nebutron', 100, 0, 'garona/80/93613392-avatar.jpg', 'garona', 0, 0, 8, 7, 1, NULL, 0),
(310, 'midoru', 100, 0, 'garona/174/93614510-avatar.jpg', 'garona', 0, 0, 3, 22, 1, NULL, 0),
(311, 'prédictrice', 100, 1, 'garona/236/93673708-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(312, 'xinding', 100, 1, 'garona/38/93801510-avatar.jpg', 'garona', 0, 0, 4, 1, 1, NULL, 0),
(313, 'timelôrd', 100, 0, 'nerzhul/61/93863997-avatar.jpg', 'ner''zhul', 0, 0, 11, 4, 1, NULL, 0),
(314, 'titepoucette', 100, 1, 'garona/69/94163269-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(315, 'madiran', 100, 1, 'garona/244/94179572-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(316, 'nokitsune', 100, 1, 'garona/242/94319090-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(317, 'xäntra', 100, 1, 'garona/175/94611375-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(318, 'seyer', 100, 0, 'sargeras/86/94837334-avatar.jpg', 'sargeras', 0, 0, 2, 1, 1, NULL, 0),
(319, 'kàdyl', 100, 1, 'garona/110/95004270-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(320, 'raenis', 100, 0, 'sargeras/229/95116261-avatar.jpg', 'sargeras', 0, 0, 3, 4, 1, NULL, 0),
(321, 'eon', 100, 1, 'garona/17/95441937-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(322, 'ayshell', 100, 1, 'sargeras/62/96186942-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(323, 'galérius', 100, 0, 'garona/235/96323819-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(324, 'amassis', 100, 0, 'sargeras/105/96431465-avatar.jpg', 'sargeras', 0, 0, 8, 11, 1, NULL, 0),
(325, 'lèvy', 100, 1, 'garona/246/96557046-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(326, 'märgâlärds', 100, 0, 'garona/13/96674829-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(327, 'kidipet', 100, 0, 'garona/169/96749993-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(328, 'nabetse', 100, 1, 'garona/129/96775809-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(329, 'myllenia', 100, 1, 'sargeras/149/96820373-avatar.jpg', 'sargeras', 0, 0, 5, 1, 1, NULL, 0),
(330, 'kidisparai', 100, 0, 'garona/183/96877239-avatar.jpg', 'garona', 0, 0, 1, 3, 1, NULL, 0),
(331, 'ida', 100, 1, 'garona/80/96981584-avatar.jpg', 'garona', 0, 0, 4, 3, 1, NULL, 0),
(332, 'belanima', 100, 1, 'garona/41/97195305-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(333, 'kâdyll', 100, 1, 'nerzhul/146/97287058-avatar.jpg', 'ner''zhul', 0, 0, 4, 1, 1, NULL, 0),
(334, 'myllé', 100, 1, 'sargeras/75/97468747-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(335, 'cëly', 100, 1, 'garona/12/98057228-avatar.jpg', 'garona', 0, 0, 5, 1, 1, NULL, 0),
(336, 'kuramì', 100, 1, 'garona/5/98185477-avatar.jpg', 'garona', 0, 0, 7, 25, 1, NULL, 0),
(337, 'chandrak', 100, 1, 'garona/19/98205971-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(338, 'kazathwin', 100, 0, 'garona/77/98251853-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(339, 'luminara', 100, 1, 'garona/112/98507376-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(340, 'tatoon', 100, 1, 'garona/148/98531988-avatar.jpg', 'garona', 0, 0, 5, 4, 1, NULL, 0),
(341, 'løuu', 100, 1, 'garona/65/98663233-avatar.jpg', 'garona', 0, 0, 10, 25, 1, NULL, 0),
(342, 'shaölin', 100, 0, 'garona/158/98933406-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(343, 'rénovatrice', 100, 1, 'garona/53/99038261-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(344, 'protectrice', 100, 1, 'garona/68/99038276-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(345, 'ragnfrid', 100, 1, 'nerzhul/113/99224689-avatar.jpg', 'ner''zhul', 0, 0, 2, 11, 1, NULL, 0),
(346, 'nénuphar', 100, 1, 'sargeras/198/99263174-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(347, 'frizzy', 100, 1, 'garona/151/99375255-avatar.jpg', 'garona', 0, 0, 8, 11, 1, NULL, 0),
(348, 'equinoc', 100, 0, 'garona/198/99486150-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(349, 'gàdock', 100, 0, 'garona/67/99504451-avatar.jpg', 'garona', 0, 0, 2, 3, 1, NULL, 0),
(350, 'kïkï', 100, 1, 'garona/18/99551250-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(351, 'kadyll', 100, 0, 'sargeras/208/99687376-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(352, 'daxou', 100, 0, 'garona/164/99707812-avatar.jpg', 'garona', 0, 0, 3, 3, 1, NULL, 0),
(353, 'jolarson', 100, 0, 'garona/15/99708175-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(354, 'dameos', 100, 0, 'garona/170/99708330-avatar.jpg', 'garona', 0, 0, 1, 4, 1, NULL, 0),
(355, 'nawamoon', 100, 1, 'garona/146/99708562-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(356, 'isyama', 100, 1, 'garona/185/99710649-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(357, 'syriana', 100, 1, 'garona/215/99710935-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(358, 'drassien', 100, 0, 'garona/204/99721420-avatar.jpg', 'garona', 0, 0, 9, 22, 1, NULL, 0),
(359, 'potak', 100, 0, 'garona/141/99785101-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(360, 'zekee', 100, 0, 'garona/209/99812817-avatar.jpg', 'garona', 0, 0, 4, 22, 1, NULL, 0),
(361, 'pixie', 100, 1, 'garona/51/99822899-avatar.jpg', 'garona', 0, 0, 11, 22, 1, NULL, 0),
(362, 'syssi', 100, 1, 'sargeras/124/99828092-avatar.jpg', 'sargeras', 0, 0, 5, 1, 1, NULL, 0),
(363, 'dürkor', 100, 0, 'garona/3/100087043-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(364, 'nourslaouf', 100, 1, 'sargeras/50/100186162-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(365, 'iphigénias', 100, 1, 'garona/223/100218335-avatar.jpg', 'garona', 0, 0, 3, 11, 1, NULL, 0),
(366, 'kazuki', 100, 1, 'garona/165/100227237-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(367, 'tiliön', 100, 0, 'sargeras/250/100260346-avatar.jpg', 'sargeras', 0, 0, 3, 4, 1, NULL, 0),
(368, 'farramirht', 100, 0, 'garona/201/100285641-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(369, 'hazeman', 100, 0, 'garona/75/100328523-avatar.jpg', 'garona', 0, 0, 1, 22, 1, NULL, 0),
(370, 'dhämey', 100, 1, 'garona/15/100442127-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(371, 'myllénième', 100, 1, 'sargeras/83/100450643-avatar.jpg', 'sargeras', 0, 0, 10, 1, 1, NULL, 0),
(372, 'arrowdiac', 100, 0, 'garona/132/100508036-avatar.jpg', 'garona', 0, 0, 3, 4, 1, NULL, 0),
(373, 'yükinø', 100, 1, 'garona/239/100547311-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(374, 'saggitarius', 100, 0, 'sargeras/97/100550241-avatar.jpg', 'sargeras', 0, 0, 9, 22, 1, NULL, 0),
(375, 'melyria', 100, 1, 'garona/128/100578688-avatar.jpg', 'garona', 0, 0, 5, 22, 1, NULL, 0),
(376, 'bonobo', 100, 1, 'garona/151/100625815-avatar.jpg', 'garona', 0, 0, 10, 4, 1, NULL, 0),
(377, 'neeli', 100, 1, 'garona/92/100661340-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(378, 'edmun', 100, 0, 'nerzhul/120/100721784-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 1, NULL, 0),
(379, 'cøuette', 100, 1, 'garona/153/100756889-avatar.jpg', 'garona', 0, 0, 2, 11, 1, NULL, 0),
(380, 'thoby', 100, 0, 'garona/105/100765545-avatar.jpg', 'garona', 0, 0, 6, 22, 1, NULL, 0),
(381, 'gadounette', 100, 1, 'garona/115/100829043-avatar.jpg', 'garona', 0, 0, 5, 11, 1, NULL, 0),
(382, 'nowek', 100, 1, 'sargeras/232/100914408-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(383, 'ptibouldpoil', 100, 0, 'garona/214/100969686-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(384, 'natundra', 100, 1, 'sargeras/42/100976170-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(385, 'seiily', 100, 1, 'sargeras/21/101098773-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(386, 'dayia', 100, 1, 'garona/66/101109314-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(387, 'kîmy', 100, 1, 'sargeras/221/101268189-avatar.jpg', 'sargeras', 0, 0, 4, 1, 1, NULL, 0),
(388, 'marlöw', 100, 0, 'garona/143/101380751-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(389, 'woôd', 100, 0, 'garona/231/101402599-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(390, 'pesthys', 100, 1, 'garona/128/101501824-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(391, 'mîou', 100, 1, 'sargeras/212/101528788-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(392, 'mîû', 100, 1, 'sargeras/116/101539700-avatar.jpg', 'sargeras', 0, 0, 8, 1, 1, NULL, 0),
(393, 'noriah', 100, 1, 'garona/204/101565388-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0),
(394, 'myurogue', 100, 1, 'sargeras/24/101660696-avatar.jpg', 'sargeras', 0, 0, 4, 3, 1, NULL, 0),
(395, 'myû', 100, 1, 'sargeras/72/101688136-avatar.jpg', 'sargeras', 0, 0, 3, 1, 1, NULL, 0),
(396, 'zigloo', 100, 0, 'sargeras/80/102043984-avatar.jpg', 'sargeras', 0, 0, 6, 1, 1, NULL, 0),
(397, 'jðke', 100, 0, 'garona/178/102047666-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(398, 'myumonk', 100, 1, 'sargeras/62/102097726-avatar.jpg', 'sargeras', 0, 0, 10, 1, 1, NULL, 0),
(399, 'shapodpaille', 100, 1, 'garona/227/102107107-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(400, 'miucham', 100, 0, 'sargeras/134/102253446-avatar.jpg', 'sargeras', 0, 0, 7, 11, 1, NULL, 0),
(401, 'myuwar', 100, 1, 'sargeras/29/102320925-avatar.jpg', 'sargeras', 0, 0, 1, 7, 1, NULL, 0),
(402, 'myupriest', 100, 1, 'sargeras/26/102329114-avatar.jpg', 'sargeras', 0, 0, 5, 1, 1, NULL, 0),
(403, 'myudemo', 100, 1, 'sargeras/33/102329121-avatar.jpg', 'sargeras', 0, 0, 9, 7, 1, NULL, 0),
(404, 'garfunk', 100, 1, 'garona/164/102413220-avatar.jpg', 'garona', 0, 0, 8, 4, 1, NULL, 0),
(405, 'gothmog', 100, 0, 'nerzhul/138/102506122-avatar.jpg', 'ner''zhul', 0, 0, 9, 1, 1, NULL, 0),
(406, 'capiana', 100, 1, 'garona/70/102515782-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(407, 'myllésime', 100, 1, 'sargeras/36/102587940-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(408, 'sâber', 100, 1, 'garona/145/102615441-avatar.jpg', 'garona', 0, 0, 1, 11, 1, NULL, 0),
(409, 'peckeur', 100, 0, 'garona/69/102676293-avatar.jpg', 'garona', 0, 0, 9, 7, 1, NULL, 0),
(410, 'balcmeg', 100, 0, 'garona/226/102748898-avatar.jpg', 'garona', 0, 0, 3, 22, 1, NULL, 0),
(411, 'orgäna', 100, 1, 'garona/124/102948732-avatar.jpg', 'garona', 0, 0, 5, 4, 1, NULL, 0),
(412, 'yooda', 100, 0, 'garona/147/102948755-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(413, 'amidalä', 100, 1, 'garona/0/102993152-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(414, 'watto', 100, 0, 'garona/127/102993791-avatar.jpg', 'garona', 0, 0, 1, 1, 1, NULL, 0),
(415, 'fréya', 100, 1, 'garona/87/103414103-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(416, 'dhïmey', 100, 1, 'garona/47/103604015-avatar.jpg', 'garona', 0, 0, 5, 11, 1, NULL, 0),
(417, 'belami', 100, 0, 'garona/252/103604476-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(418, 'malonys', 100, 1, 'nerzhul/120/103699320-avatar.jpg', 'ner''zhul', 0, 0, 11, 4, 1, NULL, 0),
(419, 'cavina', 100, 1, 'garona/174/103755438-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(420, 'keldrys', 100, 0, 'garona/179/103814579-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(421, 'mjøllnïr', 100, 0, 'garona/17/103854865-avatar.jpg', 'garona', 0, 0, 1, 3, 1, NULL, 0),
(422, 'mîôû', 100, 1, 'sargeras/238/103861998-avatar.jpg', 'sargeras', 0, 0, 11, 4, 1, NULL, 0),
(423, 'akakaros', 100, 0, 'garona/39/103966759-avatar.jpg', 'garona', 0, 0, 8, 1, 1, NULL, 0),
(424, 'greey', 100, 0, 'garona/65/104301633-avatar.jpg', 'garona', 0, 0, 7, 25, 1, NULL, 0),
(425, 'storran', 100, 0, 'garona/127/104337279-avatar.jpg', 'garona', 0, 0, 2, 1, 1, NULL, 0),
(426, 'jeanluc', 100, 0, 'garona/199/104374983-avatar.jpg', 'garona', 0, 0, 10, 1, 1, NULL, 0),
(427, 'cedca', 100, 0, 'garona/192/104462016-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(428, 'justyce', 100, 1, 'sargeras/167/104588455-avatar.jpg', 'sargeras', 0, 0, 5, 1, 1, NULL, 0),
(429, 'castharian', 100, 0, 'garona/38/104878630-avatar.jpg', 'garona', 0, 0, 6, 1, 1, NULL, 0),
(430, 'kadeska', 100, 1, 'sargeras/250/104889082-avatar.jpg', 'sargeras', 0, 0, 8, 11, 1, NULL, 0),
(431, 'xântra', 100, 1, 'garona/23/104968727-avatar.jpg', 'garona', 0, 0, 11, 4, 1, NULL, 0),
(432, 'kimiia', 100, 1, 'sargeras/134/105146758-avatar.jpg', 'sargeras', 0, 0, 3, 1, 1, NULL, 0),
(433, 'petifour', 100, 0, 'garona/199/105203655-avatar.jpg', 'garona', 0, 0, 3, 11, 1, NULL, 0),
(434, 'redo', 100, 0, 'garona/6/105300230-avatar.jpg', 'garona', 0, 0, 1, 22, 1, NULL, 0),
(435, 'sloveyn', 100, 1, 'garona/172/105300908-avatar.jpg', 'garona', 0, 0, 7, 25, 1, NULL, 0),
(436, 'eskrasi', 100, 0, 'garona/70/105370694-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(437, 'mallidan', 100, 0, 'sargeras/107/105375595-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(438, 'lunafreya', 100, 1, 'garona/209/105382865-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(439, 'yujimbo', 100, 0, 'nerzhul/18/105385746-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 1, NULL, 0),
(440, 'tulimanu', 100, 1, 'garona/162/105395618-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(441, 'vorpile', 100, 1, 'sargeras/111/105395823-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(442, 'sallanaeth', 100, 1, 'sargeras/254/105403134-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(443, 'mîôöu', 100, 1, 'sargeras/32/105412896-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(444, 'alyssia', 100, 1, 'garona/243/105439987-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(445, 'damillie', 100, 1, 'garona/88/105447256-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(446, 'demonføu', 100, 0, 'sargeras/199/105448903-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(447, 'kadyll', 100, 1, 'garona/27/105453339-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(448, 'hestïä', 100, 1, 'garona/238/105454062-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(449, 'sentiel', 100, 0, 'garona/57/105479993-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(450, 'akoonette', 100, 1, 'garona/171/105514667-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(451, 'trìskali', 100, 1, 'garona/79/105527631-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(452, 'néréha', 100, 1, 'garona/240/105538800-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(453, 'doomscham', 100, 1, 'garona/32/105545504-avatar.jpg', 'garona', 0, 0, 7, 11, 1, NULL, 0),
(454, 'succubi', 100, 1, 'nerzhul/174/105554606-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 1, NULL, 0),
(455, 'mesrïne', 100, 0, 'sargeras/200/105556424-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(456, 'kryonos', 100, 0, 'garona/193/105560513-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(457, 'alyss', 100, 1, 'garona/226/105563618-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(458, 'darmalma', 100, 0, 'garona/212/105570516-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(459, 'aerria', 100, 1, 'sargeras/178/105571762-avatar.jpg', 'sargeras', 0, 0, 12, 4, 1, NULL, 0),
(460, 'diäblar', 100, 0, 'garona/100/105587044-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(461, 'dhärmey', 100, 0, 'garona/141/105611149-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(462, 'morgorth', 100, 0, 'garona/175/105613999-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(463, 'daénérys', 100, 1, 'garona/53/105617973-avatar.jpg', 'garona', 0, 0, 9, 1, 1, NULL, 0),
(464, 'malania', 100, 1, 'garona/117/105619829-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(465, 'chloëa', 100, 1, 'garona/222/105666526-avatar.jpg', 'garona', 0, 0, 3, 1, 1, NULL, 0),
(466, 'wochini', 100, 0, 'garona/166/105674150-avatar.jpg', 'garona', 0, 0, 1, 25, 1, NULL, 0),
(467, 'lizis', 100, 0, 'nerzhul/232/105677800-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 1, NULL, 0),
(468, 'cèly', 100, 1, 'garona/246/105677814-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(469, 'lanadelreich', 100, 1, 'sargeras/185/105920697-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(470, 'mâ', 100, 1, 'garona/190/106000830-avatar.jpg', 'garona', 0, 0, 12, 4, 1, NULL, 0),
(471, 'ruhter', 100, 0, 'sargeras/177/100970929-avatar.jpg', 'sargeras', 0, 0, 1, 1, 1, NULL, 0),
(472, 'azülà', 100, 1, 'garona/38/35107110-avatar.jpg', 'garona', 0, 0, 7, 3, 1, NULL, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Vider la table avant d'insérer `raids`
--

TRUNCATE TABLE `raids`;
--
-- Contenu de la table `raids`
--

INSERT INTO `raids` (`idRaid`, `idEvenements`, `date`, `note`, `valeur`, `ajoutePar`, `majPar`, `idRosterTmp`, `idZoneTmp`, `idMode`) VALUES
(4, NULL, '2016-07-30 19:55:35', 'Hellfire Citadel - flex NM', 0.00, 'Import Raid-TracKer', '', 1, 7545, 14),
(8, NULL, '2016-07-30 19:03:09', 'Cognefort - raid MM', 0.00, 'Import Raid-TracKer', '', 1, 6996, 16),
(9, NULL, '2016-08-14 18:43:35', 'Hellfire Citadel - flex HM', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 1, 7545, 15);

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
(4, 43),
(4, 44),
(4, 45),
(4, 46),
(4, 47),
(4, 48),
(4, 49),
(4, 50),
(4, 51),
(4, 52),
(4, 53),
(4, 54),
(4, 55),
(4, 56),
(4, 57),
(4, 58),
(4, 59),
(4, 60),
(4, 61),
(4, 62),
(4, 63),
(4, 64),
(4, 65),
(4, 66),
(4, 67),
(4, 68),
(4, 69),
(4, 81),
(8, 47),
(8, 50),
(8, 51),
(8, 52),
(8, 54),
(8, 56),
(8, 61),
(8, 62),
(8, 65),
(8, 67),
(8, 68),
(8, 81),
(8, 82),
(8, 83),
(8, 84),
(8, 85),
(8, 86),
(8, 87),
(9, 61),
(9, 67),
(9, 88),
(9, 89),
(9, 90),
(9, 91),
(9, 92),
(9, 93),
(9, 94),
(9, 95),
(9, 96),
(9, 97),
(9, 98),
(9, 99),
(9, 100),
(9, 101);

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
  `key` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idRoster`),
  UNIQUE KEY `nom_UNIQUE` (`nom`),
  UNIQUE KEY `key_UNIQUE` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vider la table avant d'insérer `roster`
--

TRUNCATE TABLE `roster`;
--
-- Contenu de la table `roster`
--

INSERT INTO `roster` (`idRoster`, `nom`, `key`) VALUES
(1, 'mystra', 'a6ee421e696666060fbf988ea33a833c');

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
(1, 81, 1, NULL),
(1, 88, 1, NULL);

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
  `lastConnection` date NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keyValidMail` varchar(500) DEFAULT NULL,
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

INSERT INTO `user` (`id`, `username`, `email`, `display_name`, `password`, `state`, `lastConnection`, `lastUpdate`, `keyValidMail`) VALUES
(1, 'capi', 'capi@raid-tracker.com', 'capi', '$2y$14$0tqFA6/YrHNyOOW9npmPde0ErTKZ2zSxuJNvk.zh1d0Lpg0xFjWUm', 1, '0000-00-00', '0000-00-00 00:00:00', NULL),
(2, 'antarus', 'antarus74@gmail.com', 'antarus', '$2y$14$LGzQvjtuiGVzwNd.hkchH.FUN4/aqz00GsR3UgVsXJOUDfNhjJfby', 1, '2016-08-27', '0000-00-00 00:00:00', NULL),
(3, 'kadyll', 'Kadyll@raid-tracker.com', 'Kadyll', '$2y$14$lNwq73CC6IwKswrOYGVHu.MaKd9MDbI.Rllj4b.sKZP16fdcGKLPK', 1, '0000-00-00', '0000-00-00 00:00:00', NULL);

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
(4, '10'),
(1, '11'),
(2, '11'),
(3, '11');

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
(6996, 'highmaul', 100, 100, 10, 30, '6.0', 0, 1),
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
(6996, 87441),
(6996, 87444),
(6996, 87445),
(6996, 87446),
(6996, 87447),
(6996, 87449),
(6996, 87818),
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
(6996, 1),
(6996, 14),
(6996, 15),
(6996, 16),
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
  ADD CONSTRAINT `fk_evenements_evenements_template1` FOREIGN KEY (`idEvenements_template`) REFERENCES `evenements_template` (`idEvenements_template`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_user1` FOREIGN KEY (`idUsers`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_item_personnage_raid_bosses1` FOREIGN KEY (`idBosses`) REFERENCES `bosses` (`idBosses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_items1` FOREIGN KEY (`idItem`) REFERENCES `items` (`idItem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_personnages1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_raids1` FOREIGN KEY (`idRaid`) REFERENCES `raids` (`idRaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pallierAfficher`
--
ALTER TABLE `pallierAfficher`
  ADD CONSTRAINT `fk_roster_loot_mode_difficulte1` FOREIGN KEY (`idModeDifficulte`) REFERENCES `mode_difficulte` (`idMode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_loot_roster1` FOREIGN KEY (`idRoster`) REFERENCES `roster` (`idRoster`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_loot_zone1` FOREIGN KEY (`idZone`) REFERENCES `zone` (`idZone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD CONSTRAINT `fk_personnages_classes1` FOREIGN KEY (`idClasses`) REFERENCES `classes` (`idClasses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_faction1` FOREIGN KEY (`idFaction`) REFERENCES `faction` (`idFaction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_race1` FOREIGN KEY (`idRace`) REFERENCES `race` (`idRace`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnages_user1` FOREIGN KEY (`idUsers`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnage_guildes1` FOREIGN KEY (`idGuildes`) REFERENCES `guildes` (`idGuildes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `raids`
--
ALTER TABLE `raids`
  ADD CONSTRAINT `fk_raids_evenements1` FOREIGN KEY (`idEvenements`) REFERENCES `evenements` (`idEvenements`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raids_mode` FOREIGN KEY (`idMode`) REFERENCES `mode_difficulte` (`idMode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_roster_has_personnage_personnage1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roster_has_personnage_role1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
