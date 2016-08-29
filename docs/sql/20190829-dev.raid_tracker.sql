-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 29 Août 2016 à 22:33
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113535 ;

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
(93068, 'xhul''horac', 103, 58497120),
(100497, 'ursoc', 113, 308304544),
(102679, 'dragons of nightmare', 113, 356076832),
(103160, 'nythendra', 113, 638809216),
(103769, 'xavius', 110, 824291),
(105393, 'il''gynoth, the heart of corruption', 111, 1279095),
(111000, 'elerethe renferal', 113, 220541280),
(113534, 'cenarius', 113, 214639904);

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
(93068, 93068),
(100497, 100497),
(102679, 102679),
(103160, 103160),
(103769, 103694),
(103769, 103695),
(103769, 103769),
(103769, 104592),
(105393, 105304),
(105393, 105322),
(103769, 105343),
(105393, 105383),
(105393, 105393),
(105393, 105591),
(103769, 105611),
(105393, 105721),
(113534, 106482),
(111000, 111000),
(113534, 113534);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Vider la table avant d'insérer `guildes`
--

TRUNCATE TABLE `guildes`;
--
-- Contenu de la table `guildes`
--

INSERT INTO `guildes` (`idGuildes`, `nom`, `serveur`, `niveau`, `miniature`, `idFaction`) VALUES
(1, 'wrath of god', 'Garona', 25, '', 0),
(2, 'mystra', 'Garona', 25, '', 0),
(3, 'la cuvée des trolls', 'Hyjal', 25, '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=160 ;

--
-- Vider la table avant d'insérer `items`
--

TRUNCATE TABLE `items`;
--
-- Contenu de la table `items`
--

INSERT INTO `items` (`idItem`, `nom`, `ajouterPar`, `majPar`, `idBnet`, `couleur`, `icon`) VALUES
(1, 'champion''s medallion', 'Import Raid-TracKer', '', 113598, '', 'inv_6_0raid_necklace_4a'),
(2, 'casque of the iron bomber', 'Import Raid-TracKer', '', 113600, '', 'inv_plate_raiddeathknight_o_01helm'),
(3, 'gorebound wristguards', 'Import Raid-TracKer', '', 124278, '', 'inv_leather_raidrogue_p_01bracer'),
(4, 'powder-singed bracers', 'Import Raid-TracKer', '', 124183, '', 'inv_bracer_cloth_raidpriest_p_01'),
(5, 'blastproof legguards', 'Import Raid-TracKer', '', 124335, '', 'inv_plate_raidwarrior_p_01pants'),
(6, 'voltage regulation diode', 'Import Raid-TracKer', '', 124213, '', 'inv_6_2raid_necklace_1b'),
(7, 'felforged aegis', 'Import Raid-TracKer', '', 124354, '', 'inv_shield_1h_felfireraid_d_01'),
(8, 'ironthread greatcloak', 'Import Raid-TracKer', '', 124145, '', 'inv_cape_felfireraid_d_04'),
(9, 'pilot''s pauldrons', 'Import Raid-TracKer', '', 124174, '', 'inv_cloth_raidmage_p_01shoulder'),
(10, 'oathclaw helm', 'Import Raid-TracKer', '', 124261, '', 'inv_helm_leather_raiddruid_p_01'),
(11, 'tunic of reformative runes', 'Import Raid-TracKer', '', 124243, '', 'inv_chest_leather_raidmonk_p_01'),
(12, 'pious cowl', 'Import Raid-TracKer', '', 124161, '', 'inv_helm_cloth_raidpriest_p_01'),
(13, 'sludge-soaked waistband', 'Import Raid-TracKer', '', 124180, '', 'inv_belt_cloth_raidpriest_p_01'),
(14, 'polymorphic cloak of absorption', 'Import Raid-TracKer', '', 124139, '', 'inv_cape_felfireraid_d_02'),
(15, 'dessicated soulrender slippers', 'Import Raid-TracKer', '', 124150, '', 'inv_boot_cloth_raidwarlock_p_01'),
(16, 'blood-tanned pauldrons', 'Import Raid-TracKer', '', 124271, '', 'inv_leather_raidrogue_p_01shoulders'),
(17, 'spiked bloodstone pendant', 'Import Raid-TracKer', '', 124220, '', 'inv_6_0raid_necklace_4b'),
(18, 'cursed blood bracers', 'Import Raid-TracKer', '', 124184, '', 'inv_bracer_cloth_raidwarlock_p_01'),
(19, 'acid-etched legplates', 'Import Raid-TracKer', '', 124336, '', 'inv_pant_plate_raiddeathknight_p_01'),
(20, 'mirror of the blademaster', 'Import Raid-TracKer', '', 124224, '', 'spell_nature_mirrorimage'),
(21, 'helm of precognition', 'Import Raid-TracKer', '', 124330, '', 'inv_plate_raidwarrior_p_01helm'),
(22, 'ancient gorestained wrap', 'Import Raid-TracKer', '', 124169, '', 'inv_robe_cloth_raidwarlock_p_01'),
(23, 'shawl of sanguinary ritual', 'Import Raid-TracKer', '', 124137, '', 'inv_cape_felfire_raid_d_01'),
(24, 'heartseeking skull pendant', 'Import Raid-TracKer', '', 124208, '', 'inv_6_2raid_necklace_2a'),
(25, 'velvet bloodweaver gloves', 'Import Raid-TracKer', '', 124152, '', 'inv_glove_cloth_raidwarlock_p_01'),
(26, 'drape of gluttony', 'Import Raid-TracKer', '', 124146, '', 'inv_cape_felfireraid_d_04'),
(27, 'choker of forbidden indulgence', 'Import Raid-TracKer', '', 124391, '', 'inv_6_2raid_necklace_4d'),
(28, 'pantaloons of the arcanic conclave', 'Import Raid-TracKer', '', 124165, '', 'inv_cloth_raidmage_p_01pant'),
(29, 'gibbering madness', 'Import Raid-TracKer', '', 124205, '', 'inv_offhand_1h_felfireraid_d_01'),
(30, 'tunic of the soulbinder', 'Import Raid-TracKer', '', 124245, '', 'inv_chest_leather_raiddruid_p_01'),
(31, 'drape of beckoned souls', 'Import Raid-TracKer', '', 124141, '', 'inv_cape_felfireraid_d_02'),
(32, 'oathclaw gauntlets', 'Import Raid-TracKer', '', 124255, '', 'inv_glove_leather_raiddruid_p_01'),
(33, 'gauntlets of the ceaseless vigil', 'Import Raid-TracKer', '', 124328, '', 'inv_plate_raidpaladin_p_01glove'),
(34, 'seal of the traitorous councilor', 'Import Raid-TracKer', '', 124191, '', 'inv_6_2raid_ring_1b'),
(35, 'malicious censer', 'Import Raid-TracKer', '', 124226, '', 'inv_guild_cauldron_b'),
(36, 'pompous ceremonial ring', 'Import Raid-TracKer', '', 124195, '', 'inv_6_2raid_ring_2d'),
(37, 'satin gloves of injustice', 'Import Raid-TracKer', '', 124153, '', 'inv_glove_cloth_raidpriest_p_01'),
(38, 'zakuun''s signet of command', 'Import Raid-TracKer', '', 124203, '', 'inv_6_2raid_ring_1a'),
(39, 'legguards of grievous consonances', 'Import Raid-TracKer', '', 124337, '', 'inv_plate_raidpaladin_p_01pant'),
(40, 'choker of whispered promises', 'Import Raid-TracKer', '', 124214, '', 'inv_6_2raid_necklace_4a'),
(41, 'oathclaw mantle', 'Import Raid-TracKer', '', 124272, '', 'inv_shoulder_leather_raiddruid_p_01'),
(42, 'pauldrons of the living mountain', 'Import Raid-TracKer', '', 124308, '', 'inv_shoulder_mail_raidshaman_p_01'),
(43, 'countenance of the revenant', 'Import Raid-TracKer', '', 124158, '', 'inv_cloth_raidmage_p_01helm'),
(44, 'breach-scarred wristplates', 'Import Raid-TracKer', '', 124353, '', 'inv_plate_raidpaladin_p_01bracer'),
(45, 'robe of the arcanic conclave', 'Import Raid-TracKer', '', 124171, '', 'inv_cloth_raidmage_p_01robe'),
(46, 'leggings of the iron summoner', 'Import Raid-TracKer', '', 124164, '', 'inv_cloth_raidmage_p_01pant'),
(47, 'xu''tenash, glaive of ruin', 'Import Raid-TracKer', '', 124378, '', 'inv_polearm_1h_felfireraid_d_02'),
(48, 'bleeding hollow toxin vessel', 'Import Raid-TracKer', '', 124520, '', 'spell_deathvortex'),
(49, 'repudiation of war', 'Import Raid-TracKer', '', 124519, '', 'ability_priest_pathofthedevout'),
(50, 'waistwrap of banishment', 'Import Raid-TracKer', '', 124276, '', 'inv_belt_leather_raidmonk_p_01'),
(51, 'talisman of the master tracker', 'Import Raid-TracKer', '', 124515, '', 'inv_shoulder_mail_raidhunter_l_01'),
(52, 'worldbreaker''s resolve', 'Import Raid-TracKer', '', 124523, '', 'ability_fomor_boss_pillar02'),
(53, 'edict of argus', 'Import Raid-TracKer', '', 124382, '', 'inv_staff_2h_felfireraid_d_03'),
(54, 'felfinger runegloves', 'Import Raid-TracKer', '', 124254, '', 'inv_glove_leather_raidmonk_p_01'),
(55, 'demonbuckle sash of argus', 'Import Raid-TracKer', '', 124200, '', 'inv_buckle_plate_archimonde_d_01'),
(56, 'shell-resistant stompers', 'Import Raid-TracKer', '', 124320, '', 'inv_plate_raidwarrior_p_01boots'),
(57, 'forward observer''s camouflage cloak', 'Import Raid-TracKer', '', 124132, '', 'inv_cape_felfireraid_d_03'),
(58, 'sparkburnt welder''s cloak', 'Import Raid-TracKer', '', 124136, '', 'inv_cape_felfire_raid_d_01'),
(59, 'sootstained felsworn signet', 'Import Raid-TracKer', '', 124190, '', 'inv_6_2raid_ring_2b'),
(60, 'die-cast ringmail sabatons', 'Import Raid-TracKer', '', 124285, '', 'inv_boot_mail_raidhunter_p_01'),
(61, 'spiked irontoe slippers', 'Import Raid-TracKer', '', 124249, '', 'inv_boot_leather_raiddruid_p_01'),
(62, 'pedal-pushing sandals', 'Import Raid-TracKer', '', 124148, '', 'inv_cloth_raidmage_p_01boot'),
(63, 'flanged gasket', 'Import Raid-TracKer', '', 124196, '', 'inv_6_2raid_ring_4b'),
(64, 'iron reaver piston', 'Import Raid-TracKer', '', 124227, '', 'inv_misc_enggizmos_14'),
(65, 'helm of hellfire''s vanquisher', 'Import Raid-TracKer', '', 127959, '', 'inv_helmet_24'),
(66, 'fel-inscribed shoulderplates', 'Import Raid-TracKer', '', 124341, '', 'inv_plate_raidwarrior_p_01shoulders'),
(67, 'imbued stone sigil', 'Import Raid-TracKer', '', 124239, '', 'inv_misc_rune_05'),
(68, 'craggy gloves of grasping', 'Import Raid-TracKer', '', 124151, '', 'inv_cloth_raidmage_p_01glove'),
(69, 'glowing firestone', 'Import Raid-TracKer', '', 124211, '', 'inv_6_2raid_necklace_1c'),
(70, 'dia''s nightmarish leggings', 'Import Raid-TracKer', '', 124163, '', 'inv_pant_cloth_raidwarlock_p_01'),
(71, 'mindbender''s flameblade', 'Import Raid-TracKer', '', 124383, '', 'inv_sword_1h_felfireraid_d_01'),
(72, 'bloody berserker''s bracers', 'Import Raid-TracKer', '', 124312, '', 'inv_bracer_mail_raidhunter_p_01'),
(73, 'gurtogg''s discarded hood', 'Import Raid-TracKer', '', 124258, '', 'inv_leather_raidrogue_p_01helm'),
(74, 'toxicologist''s treated boots', 'Import Raid-TracKer', '', 124250, '', 'inv_leather_raidrogue_p_01boots'),
(75, 'bite of the bleeding hollow', 'Import Raid-TracKer', '', 124379, '', 'inv_staff_2h_felfireraid_d_04'),
(76, 'intuition''s gift', 'Import Raid-TracKer', '', 124232, '', 'spell_mage_presenceofmind'),
(77, 'mitts of eternal famishment', 'Import Raid-TracKer', '', 124290, '', 'inv_glove_mail_raidshaman_p_01'),
(78, 'soulgorged pauldrons', 'Import Raid-TracKer', '', 124342, '', 'inv_shoulder_plate_raiddeathknight_p_01'),
(79, 'ravenous girdle', 'Import Raid-TracKer', '', 124348, '', 'inv_belt_plate_raiddeathknight_p_01'),
(80, 'leggings of hellfire''s vanquisher', 'Import Raid-TracKer', '', 127960, '', 'inv_misc_desecrated_platepants'),
(81, 'leggings of hellfire''s protector', 'Import Raid-TracKer', '', 127965, '', 'inv_misc_desecrated_platepants'),
(82, 'chain wristguards of the stricken', 'Import Raid-TracKer', '', 124313, '', 'inv_bracer_mail_raidshaman_p_01'),
(83, 'soulwarped tower shield', 'Import Raid-TracKer', '', 124357, '', 'inv_shield_1h_felfireraid_d_02'),
(84, 'contained fel orb locket', 'Import Raid-TracKer', '', 124221, '', 'inv_6_0raid_necklace_2a'),
(85, 'saber of twisted virtue', 'Import Raid-TracKer', '', 124384, '', 'inv_sword_1h_felfireraid_d_03'),
(86, 'gauntlets of hellfire''s protector', 'Import Raid-TracKer', '', 127964, '', 'inv_gauntlets_29'),
(87, 'gauntlets of hellfire''s vanquisher', 'Import Raid-TracKer', '', 127958, '', 'inv_gauntlets_29'),
(88, 'tyrant''s decree', 'Import Raid-TracKer', '', 124242, '', 'inv_holiday_tow_spicebandage'),
(89, 'oppressor''s merciless treads', 'Import Raid-TracKer', '', 124251, '', 'inv_boot_leather_raidmonk_p_01'),
(90, 'contemptuous wristguards', 'Import Raid-TracKer', '', 124186, '', 'inv_cloth_raidmage_p_01bracer'),
(91, 'choker of sneering superiority', 'Import Raid-TracKer', '', 124219, '', 'inv_6_2raid_necklace_2c'),
(92, 'gauntlets of derision', 'Import Raid-TracKer', '', 124326, '', 'inv_glove_plate_raiddeathknight_p_01'),
(93, 'shoulders of hellfire''s conqueror', 'Import Raid-TracKer', '', 127957, '', 'inv_shoulder_22'),
(94, 'shoulders of hellfire''s protector', 'Import Raid-TracKer', '', 127967, '', 'inv_shoulder_22'),
(95, 'fiendsbreath warmace', 'Import Raid-TracKer', '', 124374, '', 'inv_mace_1h_felfireraid_d_02'),
(96, 'portal key signet', 'Import Raid-TracKer', '', 124189, '', 'inv_6_2raid_ring_1d'),
(97, 'voidcore greatstaff', 'Import Raid-TracKer', '', 124381, '', 'inv_staff_2h_felfireraid_d_02'),
(98, 'sinister felborne helmet', 'Import Raid-TracKer', '', 124295, '', 'inv_helm_mail_raidshaman_p_01'),
(99, 'flickering felspark', 'Import Raid-TracKer', '', 124231, '', 'spell_fire_ragnaros_molteninfernogreen'),
(100, 'felgrease-smudged robes', 'Import Raid-TracKer', '', 124168, '', 'inv_cloth_raidmage_p_01robe'),
(101, 'smoldercore bulwark', 'Import Raid-TracKer', '', 124356, '', 'inv_shield_1h_felfireraid_d_01'),
(102, 'hand loader gauntlets', 'Import Raid-TracKer', '', 124289, '', 'inv_glove_mail_raidhunter_p_01'),
(103, 'iron skullcrusher', 'Import Raid-TracKer', '', 124373, '', 'inv_mace_1h_felfireraid_d_01'),
(104, 'congealed globule loop', 'Import Raid-TracKer', '', 124197, '', 'inv_6_2raid_ring_4c'),
(105, 'casque of foul concentration', 'Import Raid-TracKer', '', 124331, '', 'inv_plate_raidpaladin_p_01helm'),
(106, 'pauldrons of contempt', 'Import Raid-TracKer', '', 124306, '', 'inv_shoulder_mail_raidhunter_p_01'),
(107, 'unstable felshadow emulsion', 'Import Raid-TracKer', '', 124234, '', 'inv_misc_endlesspotion'),
(108, 'remnant of chaos', 'Import Raid-TracKer', '', 133762, '', 'ability_felarakkoa_feldetonation_red'),
(109, 'demon prince''s ascendant crown', 'Import Raid-TracKer', '', 124159, '', 'inv_helm_plate_archimonde_d_01'),
(110, 'badge of hellfire''s conqueror', 'Import Raid-TracKer', '', 127969, '', 'inv_jewelry_talisman_01'),
(111, 'badge of hellfire''s protector', 'Import Raid-TracKer', '', 127970, '', 'inv_jewelry_talisman_01'),
(112, 'eredar fel-chain gloves', 'Import Raid-TracKer', '', 124291, '', 'inv_glove_mail_raidhunter_p_01'),
(113, 'chest of hellfire''s conqueror', 'Import Raid-TracKer', '', 127953, '', 'inv_chest_chain_10'),
(114, 'chest of hellfire''s protector', 'Import Raid-TracKer', '', 127963, '', 'inv_chest_chain_10'),
(115, 'locket of unholy reconstitution', 'Import Raid-TracKer', '', 124215, '', 'inv_6_2raid_necklace_2b'),
(116, 'cursed demonbone longbow', 'Import Raid-TracKer', '', 124361, '', 'inv_bow_1h_felfireraid_d_01'),
(117, 'world ender''s gorget', 'Import Raid-TracKer', '', 124222, '', 'inv_6_0raid_necklace_1b'),
(118, 'doomcrier''s shoulderplates', 'Import Raid-TracKer', '', 124343, '', 'inv_plate_raidpaladin_p_01shoulder'),
(119, 'calamity''s edge', 'Import Raid-TracKer', '', 124389, '', 'inv_sword_2h_felfireraid_d_01'),
(120, 'badge of hellfire''s vanquisher', 'Import Raid-TracKer', '', 127968, '', 'inv_jewelry_talisman_01'),
(121, 'flamebelcher''s insulated mitts', 'Import Raid-TracKer', '', 124324, '', 'inv_plate_raidwarrior_p_01gloves'),
(122, 'bolt-latched felsteel gorget', 'Import Raid-TracKer', '', 124216, '', 'inv_6_2raid_necklace_1a'),
(123, 'torch-brazed waistguard', 'Import Raid-TracKer', '', 124309, '', 'inv_belt_mail_raidshaman_p_01'),
(124, 'rune infused spear', 'Import Raid-TracKer', '', 124377, '', 'inv_polearm_2h_felfireraid_d_01'),
(125, 'shadowgorged iron choker', 'Import Raid-TracKer', '', 124217, '', 'inv_6_2raid_necklace_3c'),
(126, 'runic magnaron tooth', 'Import Raid-TracKer', '', 124363, '', 'inv_knife_1h_felfireraid_d_03'),
(127, 'helm of hellfire''s conqueror', 'Import Raid-TracKer', '', 127956, '', 'inv_helmet_24'),
(128, 'windswept wanderer''s drape', 'Import Raid-TracKer', '', 124133, '', 'inv_cape_felfireraid_d_03'),
(129, 'kilt of self-reflection', 'Import Raid-TracKer', '', 124299, '', 'inv_robe_mail_raidshaman_p_01'),
(130, 'girdle of savage resolve', 'Import Raid-TracKer', '', 124347, '', 'inv_plate_raidpaladin_p_01buckle'),
(131, 'blazing demonhilt sword', 'Import Raid-TracKer', '', 124385, '', 'inv_sword_1h_felfireraid_d_01'),
(132, 'fallen warlord''s mindcarver', 'Import Raid-TracKer', '', 124364, '', 'inv_knife_1h_felfireraid_d_02'),
(133, 'serrated demontooth ring', 'Import Raid-TracKer', '', 124188, '', 'inv_6_2raid_ring_3d'),
(134, 'chestguard of gnawing desire', 'Import Raid-TracKer', '', 124244, '', 'inv_leather_raidrogue_p_01chest'),
(135, 'voracious souleater', 'Import Raid-TracKer', '', 124359, '', 'inv_axe_1h_felfireraid_d_02'),
(136, 'leggings of hellfire''s conqueror', 'Import Raid-TracKer', '', 127955, '', 'inv_misc_desecrated_platepants'),
(137, 'demonic phylactery', 'Import Raid-TracKer', '', 124233, '', 'inv_6_2raid_trinket_1a'),
(138, 'felcrystal impaler', 'Import Raid-TracKer', '', 124362, '', 'inv_bow_2h_crossbow_felfireraid_d_01'),
(139, 'gauntlets of hellfire''s conqueror', 'Import Raid-TracKer', '', 127954, '', 'inv_gauntlets_29'),
(140, 'shoulders of hellfire''s vanquisher', 'Import Raid-TracKer', '', 127961, '', 'inv_shoulder_22'),
(141, 'loop of beckoned shadows', 'Import Raid-TracKer', '', 124199, '', 'inv_6_2raid_ring_3a'),
(142, 'mindscythe of the legion', 'Import Raid-TracKer', '', 124369, '', 'inv_hand_1h_felfireraid_d_01'),
(143, 'manacles of the multitudes', 'Import Raid-TracKer', '', 124280, '', 'inv_bracer_leather_raiddruid_p_01'),
(144, 'ringmail of madness accordant', 'Import Raid-TracKer', '', 124283, '', 'inv_chest_mail_raidshaman_p_01'),
(145, 'felfire munitions launcher', 'Import Raid-TracKer', '', 124370, '', 'inv_firearm_2h_felfireraid_d_01'),
(146, 'jungle assassin''s footpads', 'Import Raid-TracKer', '', 124252, '', 'inv_leather_raidrogue_p_01boots'),
(147, 'helm of hellfire''s protector', 'Import Raid-TracKer', '', 127966, '', 'inv_helmet_24'),
(148, 'pit-extracted stone signet', 'Import Raid-TracKer', '', 124187, '', 'inv_6_2raid_ring_2c'),
(149, 'fel-burning blade', 'Import Raid-TracKer', '', 124388, '', 'inv_sword_2h_felfireraid_d_02'),
(150, 'pristine man''ari cuffs', 'Import Raid-TracKer', '', 124185, '', 'inv_bracer_cloth_raidpriest_p_01'),
(151, 'maul of tyranny', 'Import Raid-TracKer', '', 124375, '', 'inv_mace_2h_felfireraid_d_01'),
(152, 'belt of misconceived loyalty', 'Import Raid-TracKer', '', 124275, '', 'inv_belt_leather_raiddruid_p_01'),
(153, 'shadowrend talonblade', 'Import Raid-TracKer', '', 124387, '', 'inv_sword_1h_felfireraid_d_02'),
(154, 'surefooted chain treads', 'Import Raid-TracKer', '', 124286, '', 'inv_boot_mail_raidshaman_p_01'),
(155, 'bloody dagger-heeled pumps', 'Import Raid-TracKer', '', 124149, '', 'inv_boot_cloth_raidpriest_p_01'),
(156, 'girdle of the legion general', 'Import Raid-TracKer', '', 124310, '', 'inv_belt_mail_raidhunter_p_01'),
(157, 'vial of immiscible liquid', 'Import Raid-TracKer', '', 124212, '', 'inv_6_2raid_necklace_3d'),
(158, 'void lord''s wizened cloak', 'Import Raid-TracKer', '', 124147, '', 'inv_cape_felfireraid_d_04'),
(159, 'annihilan''s waistplate', 'Import Raid-TracKer', '', 124349, '', 'inv_plate_raidwarrior_p_01belt');

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
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idItemRaidPersonnage`),
  KEY `fk_item_personnage_raid_raids1_idx` (`idRaid`),
  KEY `fk_item_personnage_raid_items1_idx` (`idItem`),
  KEY `fk_item_personnage_raid_personnages1_idx` (`idPersonnage`),
  KEY `fk_item_personnage_raid_bosses1_idx` (`idBosses`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=594 ;

--
-- Vider la table avant d'insérer `item_personnage_raid`
--

TRUNCATE TABLE `item_personnage_raid`;
--
-- Contenu de la table `item_personnage_raid`
--

INSERT INTO `item_personnage_raid` (`idItemRaidPersonnage`, `idRaid`, `idItem`, `idPersonnage`, `valeur`, `bonus`, `idBosses`, `note`, `date`) VALUES
(1, 4, 1, 475, 0.00, '567:::', 87444, '', NULL),
(2, 4, 2, 248, 0.00, '565:567::', 87444, '', NULL),
(20, 5, 19, 2, 0.00, '1801:1472:529:', 92146, '', NULL),
(30, 5, 29, 40, 0.00, '1801:1472:529:', 90199, '', NULL),
(36, 5, 34, 318, 0.00, '1801:1472:529:', 90296, '', NULL),
(40, 5, 37, 485, 0.00, '1801:41:1477:', 90269, '', NULL),
(42, 5, 38, 167, 0.00, '1801:41:1487:', 89890, '', NULL),
(43, 5, 39, 481, 0.00, '1801:1472:529:', 89890, '', NULL),
(46, 5, 41, 486, 0.00, '1801:1472:529:', 93068, '', NULL),
(47, 5, 42, 479, 0.00, '1801:1472:529:', 93068, '', NULL),
(49, 5, 44, 248, 0.00, '1801:1472:529:', 93068, '', NULL),
(51, 5, 46, 348, 0.00, '1801:563:1472:', 91349, '', NULL),
(52, 5, 47, 291, 0.00, '1801:1472:529:', 91349, '', NULL),
(53, 5, 48, 201, 0.00, '1801:1472:529:', 91331, '', NULL),
(54, 5, 49, 346, 0.00, '1801:1472:529:', 91331, '', NULL),
(55, 5, 50, 342, 0.00, '1801:1472:529:', 91331, '', NULL),
(56, 5, 51, 65, 0.00, '1801:1472:529:', 91331, '', NULL),
(57, 5, 52, 477, 0.00, '1801:1482:3441:', 91331, '', NULL),
(58, 5, 53, 100, 0.00, '1801:1472:529:', 91331, '', NULL),
(59, 5, 53, 59, 0.00, '1801:1472:529:', 91331, '', NULL),
(60, 5, 54, 484, 0.00, '1801:563:1472:', 91331, '', NULL),
(61, 5, 55, 487, 0.00, '1801:1472:529:', 91331, '', NULL),
(228, 13, 145, 97, 0.00, '1801:1477:3441:', -1, '', NULL),
(238, 13, 23, 347, 0.00, '1801:1477:3441:', 90378, '', NULL),
(248, 13, 151, 13, 0.00, '1801:1472:529:', 90269, '', NULL),
(254, 13, 156, 346, 0.00, '1801:563:1472:', 89890, '', NULL),
(255, 13, 157, 100, 0.00, '1801:1472:529:', 93068, '', NULL),
(259, 13, 159, 352, 0.00, '1801:40:1472:', 91349, '', NULL),
(261, 13, 118, 386, 0.00, '1801:43:1472:', 91331, '', NULL),
(262, 13, 120, 166, 0.00, ':::', 91331, '', NULL),
(263, 13, 110, 369, 0.00, ':::', 91331, '', NULL),
(365, 11, 126, 456, 0.00, '1798:1487:529:', 90435, '', NULL),
(380, 11, 133, 457, 0.00, '1798:1487:529:', 90199, '', NULL),
(443, 11, 118, 259, 0.00, '1798:1502:3442:', 91349, '', '2016-08-17 19:21:02'),
(446, 11, 101, 209, 0.00, '1798:1487:529:', 91349, '', '2016-08-17 19:36:14'),
(465, 11, 130, 336, 0.00, '1798:1487:529:', 92146, '', '2016-08-17 20:03:37'),
(469, 11, 132, 276, 0.00, '1798:1487:529:', 90378, '', '2016-08-17 20:14:11'),
(470, 11, 24, 369, 0.00, '1798:1492:3441:', 90378, '', '2016-08-17 20:14:23'),
(472, 11, 25, 222, 0.00, '1798:1487:529:', 90378, '', '2016-08-17 20:14:53'),
(473, 11, 21, 346, 0.00, '1798:40:1487:', 90378, '', '2016-08-17 20:15:23'),
(475, 11, 134, 342, 0.00, '1798:42:1487:', 90199, '', '2016-08-17 20:37:34'),
(477, 11, 135, 166, 0.00, '1798:1487:529:', 90199, '', '2016-08-17 20:38:47'),
(478, 11, 80, 176, 0.00, '570:::', 90199, '', '2016-08-17 20:40:42'),
(479, 11, 136, 351, 0.00, '570:::', 90199, '', '2016-08-17 20:40:50'),
(481, 11, 137, 89, 0.00, '1798:1492:3441:', 90296, '', '2016-08-17 20:52:29'),
(482, 11, 138, 39, 0.00, '1798:1487:529:', 90296, '', '2016-08-17 20:52:56'),
(483, 11, 34, 100, 0.00, '1798:1492:3441:', 90296, '', '2016-08-17 20:53:19'),
(484, 11, 87, 13, 0.00, '570:::', 90296, '', '2016-08-17 20:53:29'),
(486, 11, 139, 231, 0.00, '570:::', 90296, '', '2016-08-17 20:54:16'),
(487, 11, 93, 181, 0.00, '570:::', 93068, '', '2016-08-17 21:07:25'),
(488, 11, 94, 335, 0.00, '570:::', 93068, '', '2016-08-17 21:07:39'),
(491, 11, 44, 263, 0.00, '1798:1492:3441:', 93068, '', '2016-08-17 21:08:20'),
(493, 11, 95, 48, 0.00, '1798:1487:529:', 93068, '', '2016-08-17 21:09:11'),
(494, 11, 107, 139, 0.00, '1798:41:1487:', 93068, '', '2016-08-17 21:09:21'),
(495, 11, 142, 347, 0.00, '1798:1487:529:', 89890, '', '2016-08-17 21:17:52'),
(496, 11, 143, 453, 0.00, '1798:41:1487:', 89890, '', '2016-08-17 21:18:07'),
(497, 11, 144, 357, 0.00, '1798:1487:529:', 89890, '', '2016-08-17 21:18:39'),
(498, 8, 108, 59, 0.00, ':::', 91331, '', '2016-08-03 21:29:23'),
(499, 8, 108, 97, 0.00, ':::', 91331, '', '2016-08-03 21:29:29'),
(500, 8, 108, 312, 0.00, ':::', 91331, '', '2016-08-03 21:29:33'),
(502, 8, 108, 104, 0.00, ':::', 91331, '', '2016-08-03 21:30:19'),
(504, 8, 109, 176, 0.00, '1798:1487:529:', 91331, '', '2016-08-03 21:32:13'),
(505, 8, 110, 63, 0.00, '570:::', 91331, '', '2016-08-03 21:32:24'),
(506, 8, 108, 132, 0.00, ':::', 91331, '', '2016-08-03 21:32:40'),
(507, 8, 110, 231, 0.00, '570:::', 91331, '', '2016-08-03 21:32:58'),
(508, 8, 111, 342, 0.00, '570:::', 91331, '', '2016-08-03 21:33:03'),
(509, 8, 112, 166, 0.00, '1798:41:1492:', 91331, '', '2016-08-03 21:33:30'),
(519, 6, 63, 336, 0.00, '1798:564:1487:', 90284, '', '2016-07-31 19:15:52'),
(520, 6, 64, 59, 0.00, '1798:1487:529:', 90284, '', '2016-07-31 19:16:08'),
(527, 6, 69, 100, 0.00, '1798:1487:529:', 90435, '', '2016-07-31 19:27:39'),
(532, 6, 73, 332, 0.00, '1798:564:1502:', 92146, '', '2016-07-31 19:36:12'),
(536, 6, 25, 183, 0.00, '1798:1487:529:', 90378, '', '2016-07-31 19:47:12'),
(537, 6, 75, 227, 0.00, '1798:1487:529:', 90378, '', '2016-07-31 19:48:15'),
(538, 6, 76, 137, 0.00, '1798:1507:3442:', 90378, '', '2016-07-31 19:48:40'),
(545, 6, 80, 486, 0.00, '570:::', 90199, '', '2016-07-31 20:01:05'),
(546, 6, 81, 248, 0.00, '570:::', 90199, '', '2016-07-31 20:01:12'),
(552, 6, 87, 176, 0.00, '570:::', 90296, '', '2016-07-31 20:26:50'),
(553, 6, 87, 347, 0.00, '570:::', 90296, '', '2016-07-31 20:27:02'),
(555, 6, 89, 342, 0.00, '1798:1517:3442:', 90269, '', '2016-07-31 20:54:10'),
(556, 6, 90, 226, 0.00, '1798:1487:529:', 90269, '', '2016-07-31 20:54:23'),
(558, 6, 91, 2, 0.00, '1798:1487:529:', 90269, '', '2016-07-31 20:54:56'),
(559, 6, 92, 249, 0.00, '1798:564:1487:', 90269, '', '2016-07-31 20:55:09'),
(560, 6, 93, 63, 0.00, '570:::', 93068, '', '2016-07-31 21:28:37'),
(561, 6, 94, 97, 0.00, '570:::', 93068, '', '2016-07-31 21:28:44'),
(563, 6, 95, 167, 0.00, '1798:43:1487:', 93068, '', '2016-07-31 21:28:59'),
(564, 6, 96, 312, 0.00, '1798:1487:529:', 93068, '', '2016-07-31 21:29:11'),
(565, 6, 97, 348, 0.00, '1798:564:1487:', 93068, '', '2016-07-31 21:29:25'),
(566, 6, 98, 72, 0.00, '1798:1487:529:', 93068, '', '2016-07-31 21:29:36'),
(567, 7, 99, 176, 0.00, '1798:1492:3441:', -1, '', '2016-08-03 19:17:06'),
(572, 7, 62, 100, 0.00, '1798:1487:529:', 90284, '', '2016-08-03 19:22:06'),
(576, 7, 73, 347, 0.00, '1798:1487:529:', 92146, '', '2016-08-03 19:43:31'),
(579, 7, 23, 104, 0.00, '1798:1487:529:', 90378, '', '2016-08-03 19:51:54'),
(580, 7, 74, 312, 0.00, '1798:1487:529:', 90378, '', '2016-08-03 19:51:59'),
(582, 7, 83, 167, 0.00, '1798:1487:529:', 90296, '', '2016-08-03 20:11:09'),
(583, 7, 82, 348, 0.00, '1798:1487:529:', 90296, '', '2016-08-03 20:11:16'),
(585, 7, 86, 248, 0.00, '570:::', 90296, '', '2016-08-03 20:11:33'),
(587, 7, 37, 59, 0.00, '1798:1487:529:', 90269, '', '2016-08-03 20:42:08'),
(588, 7, 89, 227, 0.00, '1798:1487:529:', 90269, '', '2016-08-03 20:42:12'),
(590, 7, 35, 97, 0.00, '1798:1487:529:', 90269, '', '2016-08-03 20:43:00'),
(591, 7, 107, 63, 0.00, '1798:42:1487:', 93068, '', '2016-08-03 20:55:55'),
(592, 7, 107, 132, 0.00, '1798:1497:3441:', 93068, '', '2016-08-03 20:56:03'),
(593, 7, 94, 342, 0.00, '570:::', 93068, '', '2016-08-03 20:56:11');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113535 ;

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
(93068, 'xhul''horac'),
(100497, 'ursoc'),
(102679, 'ysondre'),
(103160, 'nythendra'),
(103694, 'lurking terror'),
(103695, 'corruption horror'),
(103769, 'xavius'),
(104592, 'nightmare tentacle'),
(105304, 'dominator tentacle'),
(105322, 'deathglare tentacle'),
(105343, 'dread abomination'),
(105383, 'corruptor tentacle'),
(105393, 'il''gynoth'),
(105591, 'nightmare horror'),
(105611, 'inconceivable horror'),
(105721, 'nightmare ichor'),
(106482, 'malfurion stormrage'),
(111000, 'elerethe renferal'),
(113534, 'cenarius');

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
  `idUsers` int(10) unsigned DEFAULT NULL,
  `isTech` tinyint(1) DEFAULT '0' COMMENT 'personnage dit technique. utiliser lors de la creation du roster. bank et disenchant',
  PRIMARY KEY (`idPersonnage`),
  KEY `fk_personnage_guildes1_idx` (`idGuildes`),
  KEY `fk_personnages_faction1_idx` (`idFaction`),
  KEY `fk_personnages_classes1_idx` (`idClasses`),
  KEY `fk_personnages_race1_idx` (`idRace`),
  KEY `fk_personnages_user1_idx` (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=504 ;

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
(9, 'océannia', 100, 1, 'garona/104/1813864-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(10, 'mordrède', 100, 0, 'garona/30/2636318-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(11, 'lagaboulette', 100, 1, 'garona/223/2676447-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(12, 'yarixa', 100, 1, 'garona/70/2711622-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(13, 'prony', 100, 0, 'garona/83/2803795-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(14, 'octo', 100, 0, 'garona/230/5208038-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(15, 'kerimaa', 100, 1, 'garona/125/5767549-avatar.jpg', 'garona', 0, 0, 3, 11, 2, NULL, 0),
(16, 'wolfmann', 100, 0, 'garona/13/5841165-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(17, 'capikaze', 100, 0, 'garona/170/9321898-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(18, 'bøubøule', 100, 0, 'garona/79/9410383-avatar.jpg', 'garona', 0, 0, 3, 3, 2, NULL, 0),
(19, 'sadday', 100, 1, 'garona/46/9553198-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(20, 'falinns', 100, 0, 'garona/234/9607402-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(21, 'cely', 100, 1, 'garona/113/9790833-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(22, 'alandrys', 100, 0, 'garona/58/9801530-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(23, 'elirys', 100, 1, 'garona/137/10309257-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(24, 'parlama', 100, 1, 'garona/143/10635151-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(25, 'alax', 100, 0, 'garona/54/11104054-avatar.jpg', 'garona', 0, 0, 2, 3, 2, NULL, 0),
(27, 'lhilhi', 100, 1, 'garona/209/12288465-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(28, 'arthyss', 100, 0, 'garona/109/12343149-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(29, 'apisto', 100, 0, 'garona/199/12419527-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(30, 'nryan', 100, 0, 'garona/87/12421719-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(31, 'karabistouil', 100, 1, 'garona/66/13559106-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(32, 'ptitepoucett', 100, 1, 'garona/237/13613805-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(33, 'healsangel', 100, 1, 'garona/226/14281954-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(34, 'kiev', 100, 0, 'garona/212/14996436-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(35, 'nisya', 100, 1, 'garona/34/15257378-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(36, 'kaarapital', 100, 1, 'garona/134/16132486-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(37, 'poupoucetire', 100, 1, 'garona/234/16132842-avatar.jpg', 'garona', 0, 0, 3, 11, 2, NULL, 0),
(38, 'arcalyne', 100, 1, 'garona/244/17042164-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(39, 'kaarabine', 100, 1, 'garona/170/17945514-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(40, 'lisys', 100, 1, 'garona/178/18159538-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(41, 'bogossa', 100, 1, 'garona/71/19291463-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(42, 'rurú', 100, 1, 'garona/200/19821000-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(43, 'heresânkh', 100, 1, 'garona/158/20167326-avatar.jpg', 'garona', 0, 0, 5, 11, 2, NULL, 0),
(44, 'antarus', 100, 0, 'garona/146/21289874-avatar.jpg', 'garona', 0, 0, 5, 4, 2, NULL, 0),
(45, 'laetitiaa', 100, 1, 'garona/203/22083275-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(46, 'khronøs', 100, 0, 'garona/125/23517053-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(47, 'karalich', 100, 1, 'garona/26/23697690-avatar.jpg', 'garona', 0, 0, 6, 4, 2, NULL, 0),
(48, 'poulich', 100, 1, 'garona/109/23709549-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(49, 'prozzak', 100, 0, 'garona/42/26734122-avatar.jpg', 'garona', 0, 0, 5, 3, 2, NULL, 0),
(50, 'bigbeer', 100, 0, 'garona/255/28860159-avatar.jpg', 'garona', 0, 0, 3, 3, 2, NULL, 0),
(51, 'redoot', 100, 1, 'garona/254/29159934-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(52, 'plateùs', 100, 0, 'garona/10/30977034-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(53, 'shynzu', 100, 1, 'garona/149/34208149-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(54, 'lylybelle', 100, 1, 'garona/99/34321507-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(55, 'ilidøs', 100, 0, 'garona/9/34456073-avatar.jpg', 'garona', 0, 0, 6, 4, 2, NULL, 0),
(56, 'tÿra', 100, 0, 'garona/57/35029305-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(57, 'xcalibur', 100, 0, 'garona/24/35030552-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(58, 'auron', 100, 0, 'garona/61/35204669-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(59, 'tikchbila', 100, 0, 'garona/154/36140954-avatar.jpg', 'garona', 0, 0, 8, 22, 2, NULL, 0),
(60, 'magerie', 100, 1, 'garona/241/36358385-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(61, 'harigston', 100, 1, 'garona/119/37148279-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(62, 'aeoline', 100, 1, 'garona/61/37618237-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(63, 'olare', 100, 0, 'garona/10/37762058-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(64, 'bachantes', 100, 0, 'garona/49/39400497-avatar.jpg', 'garona', 0, 0, 1, 3, 2, NULL, 0),
(65, 'capï', 100, 1, 'garona/40/40891944-avatar.jpg', 'garona', 0, 0, 3, 25, 2, NULL, 0),
(66, 'pléco', 100, 1, 'garona/225/40947937-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(67, 'chasøu', 100, 0, 'garona/48/42388272-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(68, 'cellesta', 100, 1, 'garona/19/43252755-avatar.jpg', 'garona', 0, 0, 5, 11, 2, NULL, 0),
(69, 'laugan', 100, 0, 'garona/23/45220631-avatar.jpg', 'garona', 0, 0, 5, 3, 2, NULL, 0),
(70, 'ptitelouve', 100, 1, 'garona/123/45595259-avatar.jpg', 'garona', 0, 0, 4, 22, 2, NULL, 0),
(71, 'talisia', 100, 1, 'garona/12/46258956-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(72, 'spoiler', 100, 0, 'garona/31/46725407-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(73, 'kalamïty', 100, 1, 'garona/195/48465859-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(74, 'félicias', 100, 1, 'garona/137/49561225-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(75, 'iriséa', 100, 1, 'garona/60/49766972-avatar.jpg', 'garona', 0, 0, 8, 4, 2, NULL, 0),
(76, 'rapiou', 100, 0, 'garona/76/50125388-avatar.jpg', 'garona', 0, 0, 4, 22, 2, NULL, 0),
(77, 'Ächille', 100, 0, 'garona/21/50140693-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(78, 'thusùxx', 100, 0, 'garona/97/50817121-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(79, 'cartam', 100, 0, 'garona/135/50938503-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(80, 'mâjuscule', 100, 1, 'garona/85/51698517-avatar.jpg', 'garona', 0, 0, 8, 11, 2, NULL, 0),
(81, 'cartmân', 100, 0, 'garona/100/51740004-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(82, 'kægan', 100, 1, 'garona/202/51949770-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(83, 'deathinition', 100, 0, 'garona/206/52678862-avatar.jpg', 'garona', 0, 0, 6, 11, 2, NULL, 0),
(84, 'mérys', 100, 1, 'garona/141/52905101-avatar.jpg', 'garona', 0, 0, 4, 1, 2, NULL, 0),
(85, 'cartmän', 100, 0, 'garona/102/53301094-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(86, 'jðe', 100, 0, 'garona/8/53700616-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(87, 'gøuma', 100, 0, 'garona/116/54341236-avatar.jpg', 'garona', 0, 0, 8, 3, 2, NULL, 0),
(88, 'gøuminette', 100, 1, 'garona/120/54341240-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(89, 'sømetimes', 100, 1, 'garona/74/54789706-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(90, 'nydelia', 100, 1, 'garona/51/55169843-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(91, 'valyanas', 100, 1, 'garona/30/55325214-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(92, 'lønï', 100, 1, 'garona/254/55326462-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(93, 'crysista', 100, 1, 'garona/148/55543956-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(94, 'oriane', 100, 1, 'garona/205/55836621-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(95, 'swanya', 100, 1, 'garona/7/56419335-avatar.jpg', 'garona', 0, 0, 3, 22, 2, NULL, 0),
(96, 'menora', 100, 1, 'garona/97/56565857-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(97, 'Ðeltasu', 100, 0, 'garona/144/56734608-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(98, 'nayka', 100, 1, 'garona/75/56993099-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(99, 'wartax', 100, 0, 'garona/125/57239933-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(100, 'philémons', 100, 0, 'garona/186/57348538-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(101, 'smado', 100, 0, 'garona/114/57897330-avatar.jpg', 'garona', 0, 0, 10, 7, 2, NULL, 0),
(102, 'thyios', 100, 1, 'garona/106/57899626-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(103, 'unnder', 100, 0, 'garona/253/58228221-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(104, 'coonta', 100, 1, 'garona/127/59596159-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(105, 'kâlia', 100, 1, 'garona/223/59663071-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(106, 'jesuisblonde', 100, 1, 'garona/179/59805875-avatar.jpg', 'garona', 0, 0, 4, 1, 2, NULL, 0),
(107, 'olaf', 100, 0, 'garona/235/59918571-avatar.jpg', 'garona', 0, 0, 6, 3, 2, NULL, 0),
(108, 'aygul', 100, 1, 'garona/229/59934181-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(109, 'thynael', 100, 1, 'garona/112/60011888-avatar.jpg', 'garona', 0, 0, 6, 22, 2, NULL, 0),
(110, 'drethz', 100, 0, 'garona/61/60030013-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(111, 'amnésiâ', 100, 1, 'garona/24/60044568-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(112, 'aryaa', 100, 1, 'garona/119/60073847-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(113, 'ciryaliel', 100, 1, 'garona/237/60352493-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(114, 'amélianne', 100, 1, 'garona/168/60363688-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(115, 'heldin', 100, 0, 'garona/80/60588112-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(116, 'kâdyll', 100, 1, 'garona/244/60942836-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(117, 'kàdyll', 100, 1, 'garona/85/61138261-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(118, 'ivøri', 100, 1, 'garona/232/61292008-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(119, 'alys', 100, 1, 'garona/216/61403608-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(120, 'deathss', 100, 0, 'garona/187/61502395-avatar.jpg', 'garona', 0, 0, 6, 22, 2, NULL, 0),
(121, 'angelÿn', 100, 1, 'garona/15/61609999-avatar.jpg', 'garona', 0, 0, 8, 25, 2, NULL, 0),
(122, 'yoshino', 100, 1, 'garona/60/61798972-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(123, 'baêlle', 100, 1, 'garona/214/62194646-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(124, 'suyon', 100, 1, 'garona/141/62668429-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(125, 'yukïno', 100, 1, 'garona/164/62752932-avatar.jpg', 'garona', 0, 0, 6, 11, 2, NULL, 0),
(126, 'samisa', 100, 1, 'garona/43/62753835-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(127, 'jisun', 100, 1, 'garona/42/63894058-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(128, 'ayumu', 100, 1, 'garona/202/63920074-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(129, 'mickie', 100, 1, 'garona/119/65614711-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(130, 'minji', 100, 1, 'garona/115/65681011-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(132, 'nathe', 100, 1, 'nerzhul/77/65920589-avatar.jpg', 'ner''zhul', 0, 0, 5, 1, 2, NULL, 0),
(133, 'kréa', 100, 1, 'nerzhul/121/65934969-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 2, NULL, 0),
(134, 'eclypse', 100, 1, 'nerzhul/179/66122931-avatar.jpg', 'ner''zhul', 0, 0, 3, 22, 2, NULL, 0),
(135, 'healle', 100, 1, 'nerzhul/96/66131296-avatar.jpg', 'ner''zhul', 0, 0, 5, 4, 2, NULL, 0),
(136, 'emac', 100, 1, 'nerzhul/218/66211802-avatar.jpg', 'ner''zhul', 0, 0, 1, 22, 2, NULL, 0),
(137, 'wumbat', 100, 0, 'nerzhul/180/66235060-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 2, NULL, 0),
(138, 'lnaudru', 100, 1, 'nerzhul/232/66251496-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 2, NULL, 0),
(139, 'alwynn', 100, 0, 'garona/253/66481661-avatar.jpg', 'garona', 0, 0, 5, 4, 2, NULL, 0),
(140, 'särãh', 100, 1, 'nerzhul/90/66518106-avatar.jpg', 'ner''zhul', 0, 0, 3, 1, 2, NULL, 0),
(141, 'baldar', 100, 0, 'nerzhul/61/66540093-avatar.jpg', 'ner''zhul', 0, 0, 2, 1, 2, NULL, 0),
(142, 'xylomi', 100, 1, 'nerzhul/185/66549177-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 2, NULL, 0),
(143, 'hassakura', 100, 0, 'nerzhul/104/66554472-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 2, NULL, 0),
(144, 'bellame', 100, 1, 'garona/86/67268182-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(145, 'karacast', 100, 1, 'garona/89/67511385-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(146, 'kaara', 100, 1, 'garona/152/67514776-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(147, 'cøcalight', 100, 1, 'garona/69/67702597-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(148, 'karaoutai', 100, 1, 'garona/10/67769098-avatar.jpg', 'garona', 0, 0, 5, 7, 2, NULL, 0),
(149, 'zygore', 100, 0, 'garona/94/67822686-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(150, 'kimtan', 100, 1, 'garona/37/68474149-avatar.jpg', 'garona', 0, 0, 10, 4, 2, NULL, 0),
(151, 'jiwon', 100, 1, 'garona/83/68678739-avatar.jpg', 'garona', 0, 0, 6, 4, 2, NULL, 0),
(152, 'okarin', 100, 0, 'garona/37/69615909-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(153, 'mûrmûr', 100, 1, 'garona/95/69866079-avatar.jpg', 'garona', 0, 0, 9, 22, 2, NULL, 0),
(154, 'cøcazerø', 100, 0, 'garona/86/70524502-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(155, 'graalimpie', 100, 0, 'nerzhul/192/71505600-avatar.jpg', 'ner''zhul', 0, 0, 6, 4, 2, NULL, 0),
(156, 'kadyl', 100, 1, 'garona/31/71591199-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(157, 'mizutani', 100, 1, 'garona/21/72120085-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(158, 'jevo', 100, 0, 'garona/124/73588092-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(159, 'yùkinà', 100, 1, 'garona/1/73646593-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(160, 'hayes', 100, 1, 'garona/99/73668963-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(161, 'timelord', 100, 0, 'nerzhul/53/73684021-avatar.jpg', 'ner''zhul', 0, 0, 1, 4, 2, NULL, 0),
(162, 'destinee', 100, 1, 'garona/76/73718092-avatar.jpg', 'garona', 0, 0, 8, 25, 2, NULL, 0),
(163, 'tîmelord', 100, 0, 'nerzhul/38/73722406-avatar.jpg', 'ner''zhul', 0, 0, 3, 4, 2, NULL, 0),
(164, 'yùkinø', 100, 1, 'garona/144/73912720-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(165, 'belleange', 100, 1, 'garona/253/73919997-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(166, 'antaruss', 100, 1, 'garona/10/74018058-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(167, 'christange', 100, 1, 'garona/87/74051159-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(168, 'minianta', 100, 1, 'garona/159/74222495-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(169, 'lenøre', 100, 1, 'garona/130/74374274-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(170, 'bloodynight', 100, 1, 'garona/213/74478293-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(171, 'xeralynn', 100, 1, 'garona/191/75077567-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(172, 'lishaoran', 100, 0, 'garona/128/75897728-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(173, 'benjiwars', 100, 0, 'garona/232/75921640-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(174, 'kashyk', 100, 1, 'garona/172/75924396-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(175, 'angelicka', 100, 1, 'garona/205/77464525-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(176, 'sfy', 100, 0, 'nerzhul/77/77472589-avatar.jpg', 'ner''zhul', 0, 0, 8, 1, 2, NULL, 0),
(177, 'jevy', 100, 0, 'garona/192/78349504-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(178, 'nosfia', 100, 1, 'garona/196/78395588-avatar.jpg', 'garona', 0, 0, 1, 25, 2, NULL, 0),
(179, 'ewanaelle', 100, 1, 'garona/83/84882771-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(180, 'aldure', 100, 0, 'sargeras/154/89034650-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(181, 'miks', 100, 1, 'sargeras/106/89038442-avatar.jpg', 'sargeras', 0, 0, 9, 1, 2, NULL, 0),
(182, 'balrog', 100, 0, 'sargeras/68/89081924-avatar.jpg', 'sargeras', 0, 0, 1, 22, 2, NULL, 0),
(183, 'dogua', 100, 0, 'sargeras/166/89086886-avatar.jpg', 'sargeras', 0, 0, 9, 1, 2, NULL, 0),
(184, 'ildriar', 100, 0, 'sargeras/166/89091494-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(185, 'taïmana', 100, 1, 'sargeras/100/89091684-avatar.jpg', 'sargeras', 0, 0, 9, 1, 2, NULL, 0),
(186, 'misswow', 100, 1, 'sargeras/195/89097923-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(187, 'drahas', 100, 0, 'sargeras/63/89275455-avatar.jpg', 'sargeras', 0, 0, 6, 11, 2, NULL, 0),
(188, 'chlöre', 100, 1, 'sargeras/96/89276000-avatar.jpg', 'sargeras', 0, 0, 6, 4, 2, NULL, 0),
(189, 'sealyna', 100, 1, 'sargeras/85/89280341-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(190, 'pushup', 100, 1, 'sargeras/20/89295892-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(191, 'belnadifia', 100, 1, 'sargeras/228/89356004-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(192, 'damnetus', 100, 0, 'sargeras/24/89529880-avatar.jpg', 'sargeras', 0, 0, 11, 22, 2, NULL, 0),
(193, 'trinquette', 100, 1, 'sargeras/139/89549707-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(194, 'parlevent', 100, 1, 'sargeras/9/89552649-avatar.jpg', 'sargeras', 0, 0, 7, 11, 2, NULL, 0),
(195, 'asharaak', 100, 0, 'sargeras/151/89552791-avatar.jpg', 'sargeras', 0, 0, 4, 22, 2, NULL, 0),
(196, 'drèams', 100, 1, 'sargeras/86/89564502-avatar.jpg', 'sargeras', 0, 0, 9, 1, 2, NULL, 0),
(197, 'nolane', 100, 1, 'sargeras/131/89576835-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(198, 'kimaria', 100, 1, 'sargeras/20/89609748-avatar.jpg', 'sargeras', 0, 0, 9, 1, 2, NULL, 0),
(199, 'ango', 100, 1, 'sargeras/73/89630537-avatar.jpg', 'sargeras', 0, 0, 5, 11, 2, NULL, 0),
(200, 'jugar', 100, 1, 'sargeras/136/89644168-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(201, 'riddick', 100, 0, 'sargeras/193/89665985-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(202, 'lotùs', 100, 1, 'sargeras/240/89688304-avatar.jpg', 'sargeras', 0, 0, 4, 4, 2, NULL, 0),
(203, 'xàe', 100, 1, 'sargeras/27/89733403-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(204, 'feniks', 100, 1, 'sargeras/78/89738318-avatar.jpg', 'sargeras', 0, 0, 10, 1, 2, NULL, 0),
(205, 'azhrei', 100, 0, 'sargeras/22/89739798-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(206, 'fenixia', 100, 1, 'sargeras/178/89743282-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(207, 'omezaroth', 100, 0, 'sargeras/19/89854483-avatar.jpg', 'sargeras', 0, 0, 3, 4, 2, NULL, 0),
(208, 'gromack', 100, 0, 'sargeras/112/90017136-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(209, 'liköpi', 100, 0, 'sargeras/255/90054655-avatar.jpg', 'sargeras', 0, 0, 7, 11, 2, NULL, 0),
(210, 'piliko', 100, 0, 'sargeras/209/90058961-avatar.jpg', 'sargeras', 0, 0, 1, 3, 2, NULL, 0),
(211, 'zephyel', 100, 0, 'sargeras/38/90068262-avatar.jpg', 'sargeras', 0, 0, 9, 22, 2, NULL, 0),
(212, 'haknarion', 100, 0, 'sargeras/136/90073736-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(213, 'spartìate', 100, 1, 'sargeras/25/92064537-avatar.jpg', 'sargeras', 0, 0, 1, 4, 2, NULL, 0),
(214, 'Üther', 100, 0, 'garona/154/93266586-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(215, 'katlynna', 100, 1, 'garona/96/93569376-avatar.jpg', 'garona', 0, 0, 8, 11, 2, NULL, 0),
(216, 'nebutron', 100, 0, 'garona/80/93613392-avatar.jpg', 'garona', 0, 0, 8, 7, 2, NULL, 0),
(217, 'midoru', 100, 0, 'garona/174/93614510-avatar.jpg', 'garona', 0, 0, 3, 22, 2, NULL, 0),
(218, 'prédictrice', 100, 1, 'garona/236/93673708-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(219, 'xinding', 100, 1, 'garona/38/93801510-avatar.jpg', 'garona', 0, 0, 4, 1, 2, NULL, 0),
(220, 'timelôrd', 100, 0, 'nerzhul/61/93863997-avatar.jpg', 'ner''zhul', 0, 0, 11, 4, 2, NULL, 0),
(221, 'titepoucette', 100, 1, 'garona/69/94163269-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(222, 'madiran', 100, 1, 'garona/244/94179572-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(223, 'nokitsune', 100, 1, 'garona/242/94319090-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(224, 'xäntra', 100, 1, 'garona/175/94611375-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(225, 'seyer', 100, 0, 'sargeras/86/94837334-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(226, 'kàdyl', 100, 1, 'garona/110/95004270-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(227, 'wochifan', 100, 0, 'garona/245/95029749-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(228, 'raenis', 100, 0, 'sargeras/229/95116261-avatar.jpg', 'sargeras', 0, 0, 3, 4, 2, NULL, 0),
(229, 'eon', 100, 1, 'garona/17/95441937-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(230, 'ayshell', 100, 1, 'sargeras/62/96186942-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(231, 'kâdyl', 100, 1, 'garona/25/96249369-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(232, 'galérius', 100, 0, 'garona/235/96323819-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(234, 'lèvy', 100, 1, 'garona/246/96557046-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(235, 'märgâlärds', 100, 0, 'garona/13/96674829-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(236, 'kidipet', 100, 0, 'garona/169/96749993-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(237, 'nabetse', 100, 1, 'garona/129/96775809-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(238, 'myllenia', 100, 1, 'sargeras/149/96820373-avatar.jpg', 'sargeras', 0, 0, 5, 1, 2, NULL, 0),
(239, 'kidisparai', 100, 0, 'garona/183/96877239-avatar.jpg', 'garona', 0, 0, 1, 3, 2, NULL, 0),
(240, 'ida', 100, 1, 'garona/80/96981584-avatar.jpg', 'garona', 0, 0, 4, 3, 2, NULL, 0),
(241, 'belanima', 100, 1, 'garona/41/97195305-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(242, 'kâdyll', 100, 1, 'nerzhul/146/97287058-avatar.jpg', 'ner''zhul', 0, 0, 4, 1, 2, NULL, 0),
(243, 'myllé', 100, 1, 'sargeras/75/97468747-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(244, 'cëly', 100, 1, 'garona/12/98057228-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(245, 'kuramì', 100, 1, 'garona/5/98185477-avatar.jpg', 'garona', 0, 0, 7, 25, 2, NULL, 0),
(246, 'chandrak', 100, 1, 'garona/19/98205971-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(247, 'kazathwin', 100, 0, 'garona/77/98251853-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(248, 'commonbaby', 100, 0, 'sargeras/125/98300541-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(249, 'luminara', 100, 1, 'garona/112/98507376-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(250, 'tatoon', 100, 1, 'garona/148/98531988-avatar.jpg', 'garona', 0, 0, 5, 4, 2, NULL, 0),
(251, 'løuu', 100, 1, 'garona/65/98663233-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(252, 'shaölin', 100, 0, 'garona/158/98933406-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(253, 'rénovatrice', 100, 1, 'garona/53/99038261-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(254, 'protectrice', 100, 1, 'garona/68/99038276-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(255, 'ragnfrid', 100, 1, 'nerzhul/113/99224689-avatar.jpg', 'ner''zhul', 0, 0, 2, 11, 2, NULL, 0),
(256, 'nénuphar', 100, 1, 'sargeras/198/99263174-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(257, 'frizzy', 100, 1, 'garona/151/99375255-avatar.jpg', 'garona', 0, 0, 8, 11, 2, NULL, 0),
(258, 'equinoc', 100, 0, 'garona/198/99486150-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(259, 'gàdock', 100, 0, 'garona/67/99504451-avatar.jpg', 'garona', 0, 0, 2, 3, 2, NULL, 0),
(260, 'kïkï', 100, 1, 'garona/18/99551250-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(261, 'kadyll', 100, 0, 'sargeras/208/99687376-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(262, 'daxou', 100, 0, 'garona/164/99707812-avatar.jpg', 'garona', 0, 0, 3, 3, 2, NULL, 0),
(263, 'jolarson', 100, 0, 'garona/15/99708175-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(264, 'dameos', 100, 0, 'garona/170/99708330-avatar.jpg', 'garona', 0, 0, 1, 4, 2, NULL, 0),
(265, 'nawamoon', 100, 1, 'garona/146/99708562-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(266, 'isyama', 100, 1, 'garona/185/99710649-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(267, 'syriana', 100, 1, 'garona/215/99710935-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(268, 'drassien', 100, 0, 'garona/204/99721420-avatar.jpg', 'garona', 0, 0, 9, 22, 2, NULL, 0),
(269, 'potak', 100, 0, 'garona/141/99785101-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(270, 'zekee', 100, 0, 'garona/209/99812817-avatar.jpg', 'garona', 0, 0, 4, 22, 2, NULL, 0),
(271, 'pixie', 100, 1, 'garona/51/99822899-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(272, 'syssi', 100, 1, 'sargeras/124/99828092-avatar.jpg', 'sargeras', 0, 0, 5, 1, 2, NULL, 0),
(273, 'dürkor', 100, 0, 'garona/3/100087043-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(274, 'nourslaouf', 100, 1, 'sargeras/50/100186162-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(275, 'iphigénias', 100, 1, 'garona/223/100218335-avatar.jpg', 'garona', 0, 0, 3, 11, 2, NULL, 0),
(276, 'persefal', 100, 0, 'garona/7/100224775-avatar.jpg', 'garona', 0, 0, 11, 22, 2, NULL, 0),
(277, 'kazuki', 100, 1, 'garona/165/100227237-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(278, 'tiliön', 100, 0, 'sargeras/250/100260346-avatar.jpg', 'sargeras', 0, 0, 3, 4, 2, NULL, 0),
(279, 'farramirht', 100, 0, 'garona/201/100285641-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(280, 'dhämey', 100, 1, 'garona/15/100442127-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(281, 'myllénième', 100, 1, 'sargeras/83/100450643-avatar.jpg', 'sargeras', 0, 0, 10, 1, 2, NULL, 0),
(282, 'arrowdiac', 100, 0, 'garona/132/100508036-avatar.jpg', 'garona', 0, 0, 3, 4, 2, NULL, 0),
(283, 'yükinø', 100, 1, 'garona/239/100547311-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(284, 'saggitarius', 100, 0, 'sargeras/97/100550241-avatar.jpg', 'sargeras', 0, 0, 9, 22, 2, NULL, 0),
(285, 'melyria', 100, 1, 'garona/128/100578688-avatar.jpg', 'garona', 0, 0, 5, 22, 2, NULL, 0),
(286, 'bonobo', 100, 1, 'garona/151/100625815-avatar.jpg', 'garona', 0, 0, 10, 4, 2, NULL, 0),
(287, 'neeli', 100, 1, 'garona/92/100661340-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(288, 'edmun', 100, 0, 'nerzhul/120/100721784-avatar.jpg', 'ner''zhul', 0, 0, 11, 22, 2, NULL, 0),
(289, 'cøuette', 100, 1, 'garona/153/100756889-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(290, 'thoby', 100, 0, 'garona/105/100765545-avatar.jpg', 'garona', 0, 0, 6, 22, 2, NULL, 0),
(291, 'trìs', 100, 1, 'garona/82/100809554-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(292, 'gadounette', 100, 1, 'garona/115/100829043-avatar.jpg', 'garona', 0, 0, 5, 11, 2, NULL, 0),
(293, 'nowek', 100, 1, 'sargeras/232/100914408-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(294, 'ptibouldpoil', 100, 0, 'garona/214/100969686-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(295, 'natundra', 100, 1, 'sargeras/42/100976170-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(296, 'seiily', 100, 1, 'sargeras/21/101098773-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(297, 'chamyfou', 100, 0, 'sargeras/92/101108828-avatar.jpg', 'sargeras', 0, 0, 7, 25, 2, NULL, 0),
(298, 'dayia', 100, 1, 'garona/66/101109314-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(299, 'kîmy', 100, 1, 'sargeras/221/101268189-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(300, 'marlöw', 100, 0, 'garona/143/101380751-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(301, 'woôd', 100, 0, 'garona/231/101402599-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(302, 'pesthys', 100, 1, 'garona/128/101501824-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(303, 'mîou', 100, 1, 'sargeras/212/101528788-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(304, 'mîû', 100, 1, 'sargeras/116/101539700-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(305, 'noriah', 100, 1, 'garona/204/101565388-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(306, 'myurogue', 100, 1, 'sargeras/24/101660696-avatar.jpg', 'sargeras', 0, 0, 4, 3, 2, NULL, 0),
(307, 'myû', 100, 1, 'sargeras/72/101688136-avatar.jpg', 'sargeras', 0, 0, 3, 1, 2, NULL, 0),
(308, 'zigloo', 100, 0, 'sargeras/80/102043984-avatar.jpg', 'sargeras', 0, 0, 6, 1, 2, NULL, 0),
(309, 'jðke', 100, 0, 'garona/178/102047666-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(310, 'myumonk', 100, 1, 'sargeras/62/102097726-avatar.jpg', 'sargeras', 0, 0, 10, 1, 2, NULL, 0),
(311, 'shapodpaille', 100, 1, 'garona/227/102107107-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(312, 'féniks', 100, 1, 'sargeras/225/102218721-avatar.jpg', 'sargeras', 0, 0, 4, 1, 2, NULL, 0),
(313, 'miucham', 100, 0, 'sargeras/134/102253446-avatar.jpg', 'sargeras', 0, 0, 7, 11, 2, NULL, 0),
(314, 'myuwar', 100, 1, 'sargeras/29/102320925-avatar.jpg', 'sargeras', 0, 0, 1, 7, 2, NULL, 0),
(315, 'myupriest', 100, 1, 'sargeras/26/102329114-avatar.jpg', 'sargeras', 0, 0, 5, 1, 2, NULL, 0),
(316, 'myudemo', 100, 1, 'sargeras/33/102329121-avatar.jpg', 'sargeras', 0, 0, 9, 7, 2, NULL, 0),
(317, 'garfunk', 100, 1, 'garona/164/102413220-avatar.jpg', 'garona', 0, 0, 8, 4, 2, NULL, 0),
(318, 'escaheris', 100, 0, 'garona/44/102492716-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(319, 'gothmog', 100, 0, 'nerzhul/138/102506122-avatar.jpg', 'ner''zhul', 0, 0, 9, 1, 2, NULL, 0),
(320, 'capiana', 100, 1, 'garona/70/102515782-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(321, 'myllésime', 100, 1, 'sargeras/36/102587940-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(322, 'sâber', 100, 1, 'garona/145/102615441-avatar.jpg', 'garona', 0, 0, 1, 11, 2, NULL, 0),
(323, 'peckeur', 100, 0, 'garona/69/102676293-avatar.jpg', 'garona', 0, 0, 9, 7, 2, NULL, 0),
(324, 'balcmeg', 100, 0, 'garona/226/102748898-avatar.jpg', 'garona', 0, 0, 3, 22, 2, NULL, 0),
(325, 'orgäna', 100, 1, 'garona/124/102948732-avatar.jpg', 'garona', 0, 0, 5, 4, 2, NULL, 0),
(326, 'yooda', 100, 0, 'garona/147/102948755-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(327, 'amidalä', 100, 1, 'garona/0/102993152-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(328, 'watto', 100, 0, 'garona/127/102993791-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(329, 'fréya', 100, 1, 'garona/87/103414103-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(330, 'dhïmey', 100, 1, 'garona/47/103604015-avatar.jpg', 'garona', 0, 0, 5, 11, 2, NULL, 0),
(331, 'belami', 100, 0, 'garona/252/103604476-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(332, 'malonys', 100, 1, 'nerzhul/120/103699320-avatar.jpg', 'ner''zhul', 0, 0, 11, 4, 2, NULL, 0),
(333, 'cavina', 100, 1, 'garona/174/103755438-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(334, 'keldrys', 100, 0, 'garona/179/103814579-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(335, 'mjøllnïr', 100, 0, 'garona/17/103854865-avatar.jpg', 'garona', 0, 0, 1, 3, 2, NULL, 0),
(336, 'subkryss', 100, 0, 'garona/234/103856874-avatar.jpg', 'garona', 0, 0, 6, 4, 2, NULL, 0),
(337, 'mîôû', 100, 1, 'sargeras/238/103861998-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(338, 'akakaros', 100, 0, 'garona/39/103966759-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(339, 'greey', 100, 0, 'garona/65/104301633-avatar.jpg', 'garona', 0, 0, 7, 25, 2, NULL, 0),
(340, 'storran', 100, 0, 'garona/127/104337279-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(341, 'jeanluc', 100, 0, 'garona/199/104374983-avatar.jpg', 'garona', 0, 0, 10, 1, 2, NULL, 0),
(342, 'gârfunk', 100, 1, 'garona/181/104378805-avatar.jpg', 'garona', 0, 0, 10, 11, 2, NULL, 0),
(343, 'justyce', 100, 1, 'sargeras/167/104588455-avatar.jpg', 'sargeras', 0, 0, 5, 1, 2, NULL, 0),
(344, 'castharian', 100, 0, 'garona/38/104878630-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(345, 'kadeska', 100, 1, 'sargeras/250/104889082-avatar.jpg', 'sargeras', 0, 0, 8, 11, 2, NULL, 0),
(346, 'trìskel', 100, 1, 'garona/26/104911642-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(347, 'xântra', 100, 1, 'garona/23/104968727-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(348, 'faïlly', 100, 0, 'garona/74/104989514-avatar.jpg', 'garona', 0, 0, 5, 3, 2, NULL, 0),
(349, 'nïcky', 100, 1, 'garona/67/105019459-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(350, 'kimiia', 100, 1, 'sargeras/134/105146758-avatar.jpg', 'sargeras', 0, 0, 3, 1, 2, NULL, 0),
(351, 'petifour', 100, 0, 'garona/199/105203655-avatar.jpg', 'garona', 0, 0, 3, 11, 2, NULL, 0),
(352, 'redo', 100, 0, 'garona/6/105300230-avatar.jpg', 'garona', 0, 0, 1, 22, 2, NULL, 0),
(353, 'sloveyn', 100, 1, 'garona/172/105300908-avatar.jpg', 'garona', 0, 0, 7, 25, 2, NULL, 0),
(354, 'eskrasi', 100, 0, 'garona/70/105370694-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(355, 'mallidan', 100, 0, 'sargeras/107/105375595-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(356, 'lunafreya', 100, 1, 'garona/209/105382865-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(357, 'yujimbo', 100, 0, 'nerzhul/18/105385746-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 2, NULL, 0),
(358, 'tulimanu', 100, 1, 'garona/162/105395618-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(359, 'vorpile', 100, 1, 'sargeras/111/105395823-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(360, 'sallanaeth', 100, 1, 'sargeras/254/105403134-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(361, 'mîôöu', 100, 1, 'sargeras/32/105412896-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(362, 'moonty', 100, 0, 'garona/198/105433798-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(363, 'alyssia', 100, 1, 'garona/243/105439987-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(364, 'damillie', 100, 1, 'garona/88/105447256-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(365, 'demonføu', 100, 0, 'sargeras/199/105448903-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(366, 'kadyll', 100, 1, 'garona/27/105453339-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(367, 'hestïä', 100, 1, 'garona/238/105454062-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(368, 'sentiel', 100, 0, 'garona/57/105479993-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(369, 'chlorée', 100, 1, 'sargeras/133/105497989-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(370, 'akoonette', 100, 1, 'garona/171/105514667-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(371, 'trìskali', 100, 1, 'garona/79/105527631-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(372, 'néréha', 100, 1, 'garona/240/105538800-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(373, 'doomscham', 100, 1, 'garona/32/105545504-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(374, 'succubi', 100, 1, 'nerzhul/174/105554606-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 2, NULL, 0),
(375, 'mesrïne', 100, 0, 'sargeras/200/105556424-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(376, 'kryonos', 100, 0, 'garona/193/105560513-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(377, 'alyss', 100, 1, 'garona/226/105563618-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(378, 'darmalma', 100, 0, 'garona/212/105570516-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(380, 'diäblar', 100, 0, 'garona/100/105587044-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(381, 'dhärmey', 100, 0, 'garona/141/105611149-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(382, 'morgorth', 100, 0, 'garona/175/105613999-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(383, 'daénérys', 100, 1, 'garona/53/105617973-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(384, 'malania', 100, 1, 'garona/117/105619829-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(385, 'chloëa', 100, 1, 'garona/222/105666526-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(386, 'wochini', 100, 0, 'garona/166/105674150-avatar.jpg', 'garona', 0, 0, 1, 25, 2, NULL, 0),
(387, 'antarüs', 100, 1, 'garona/44/105677612-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(388, 'lizis', 100, 0, 'nerzhul/232/105677800-avatar.jpg', 'ner''zhul', 0, 0, 12, 4, 2, NULL, 0),
(389, 'cèly', 100, 1, 'garona/246/105677814-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(390, 'lanadelreich', 100, 1, 'sargeras/185/105920697-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(391, 'shefirius', 100, 0, 'garona/149/56895125-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(392, 'hazeman', 100, 0, 'garona/75/100328523-avatar.jpg', 'garona', 0, 0, 1, 22, 2, NULL, 0),
(393, 'lydriana', 100, 1, 'nerzhul/231/65779687-avatar.jpg', 'ner''zhul', 0, 0, 5, 1, 2, NULL, 0),
(394, 'mâ', 100, 1, 'garona/190/106000830-avatar.jpg', 'garona', 0, 0, 12, 4, 2, NULL, 0),
(395, 'mortyma', 90, 1, 'garona/136/23652232-avatar.jpg', 'garona', 0, 0, 6, 1, 2, NULL, 0),
(396, 'kiney', 93, 1, 'garona/53/25844021-avatar.jpg', 'garona', 0, 0, 7, 11, 2, NULL, 0),
(397, 'dihyaré', 31, 0, 'garona/91/51509083-avatar.jpg', 'garona', 0, 0, 3, 22, 2, NULL, 0),
(398, 'säfty', 96, 1, 'garona/228/61017828-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(399, 'luxanna', 85, 1, 'garona/169/61167529-avatar.jpg', 'garona', 0, 0, 4, 4, 2, NULL, 0),
(400, 'nøbuta', 90, 1, 'garona/14/63914510-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(401, 'rùalifp', 90, 1, 'nerzhul/209/65915345-avatar.jpg', 'ner''zhul', 0, 0, 2, 1, 2, NULL, 0),
(402, 'nerzhell', 90, 1, 'nerzhul/158/65975710-avatar.jpg', 'ner''zhul', 0, 0, 7, 11, 2, NULL, 0),
(403, 'sÿnapse', 90, 1, 'nerzhul/214/66212310-avatar.jpg', 'ner''zhul', 0, 0, 8, 1, 2, NULL, 0),
(404, 'bathilda', 93, 1, 'garona/145/74173329-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(405, 'maïnoa', 100, 1, 'sargeras/245/89101557-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(406, 'mokette', 90, 1, 'sargeras/101/89368933-avatar.jpg', 'sargeras', 0, 0, 6, 4, 2, NULL, 0),
(407, 'mchou', 100, 1, 'sargeras/183/89374391-avatar.jpg', 'sargeras', 0, 0, 7, 11, 2, NULL, 0),
(408, 'daraïss', 91, 0, 'sargeras/120/89533816-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(409, 'kaeina', 91, 1, 'garona/199/93885383-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(410, 'Éxistenz', 97, 0, 'garona/237/94386413-avatar.jpg', 'garona', 0, 0, 4, 1, 2, NULL, 0),
(411, 'fïora', 95, 1, 'garona/239/94975727-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(412, 'weakie', 78, 1, 'garona/81/99560017-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(413, 'antärus', 11, 1, 'garona/2/99835906-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(414, 'bellanimale', 40, 1, 'garona/60/99992380-avatar.jpg', 'garona', 0, 0, 4, 7, 2, NULL, 0),
(415, 'choupât', 96, 1, 'garona/222/99994590-avatar.jpg', 'garona', 0, 0, 4, 1, 2, NULL, 0),
(416, 'belanimal', 83, 0, 'garona/96/100052576-avatar.jpg', 'garona', 0, 0, 10, 25, 2, NULL, 0),
(417, 'dært', 43, 0, 'garona/13/100185869-avatar.jpg', 'garona', 0, 0, 4, 4, 2, NULL, 0),
(418, 'farramirrh', 78, 0, 'garona/0/100249600-avatar.jpg', 'garona', 0, 0, 2, 1, 2, NULL, 0),
(419, 'lhorreur', 4, 1, 'nerzhul/7/100942855-avatar.jpg', 'ner''zhul', 0, 0, 10, 3, 2, NULL, 0),
(420, 'dancarter', 94, 0, 'garona/115/101020275-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(421, 'exhost', 98, 0, 'garona/27/101086235-avatar.jpg', 'garona', 0, 0, 3, 1, 2, NULL, 0),
(422, 'ruhuhe', 54, 0, 'sargeras/49/101153329-avatar.jpg', 'sargeras', 0, 0, 8, 7, 2, NULL, 0),
(423, 'marc', 80, 0, 'sargeras/5/101730309-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(424, 'herminê', 53, 0, 'garona/80/101734992-avatar.jpg', 'garona', 0, 0, 2, 11, 2, NULL, 0),
(425, 'halista', 43, 1, 'sargeras/82/101844562-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(426, 'lyonnai', 61, 0, 'garona/90/101893466-avatar.jpg', 'garona', 0, 0, 5, 1, 2, NULL, 0),
(427, 'razordiad', 73, 0, 'garona/33/102294305-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(428, 'azûrmiël', 71, 0, 'garona/126/102312062-avatar.jpg', 'garona', 0, 0, 8, 1, 2, NULL, 0),
(429, 'myllai', 85, 1, 'sargeras/5/102588421-avatar.jpg', 'sargeras', 0, 0, 2, 1, 2, NULL, 0),
(430, 'byrön', 92, 0, 'nerzhul/143/103586959-avatar.jpg', 'ner''zhul', 0, 0, 1, 3, 2, NULL, 0),
(431, 'adrir', 63, 0, 'garona/118/103790966-avatar.jpg', 'garona', 0, 0, 8, 11, 2, NULL, 0),
(432, 'mystinette', 10, 1, 'garona/114/103801202-avatar.jpg', 'garona', 0, 0, 8, 11, 2, NULL, 0),
(433, 'millédie', 55, 1, 'sargeras/176/103835568-avatar.jpg', 'sargeras', 0, 0, 6, 1, 2, NULL, 0),
(434, 'cedca', 100, 0, 'garona/192/104462016-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(435, 'deflagration', 20, 0, 'sargeras/141/104591245-avatar.jpg', 'sargeras', 0, 0, 8, 7, 2, NULL, 0),
(436, 'equimos', 97, 0, 'sargeras/247/104679159-avatar.jpg', 'sargeras', 0, 0, 11, 4, 2, NULL, 0),
(437, 'sëra', 72, 1, 'sargeras/187/104889019-avatar.jpg', 'sargeras', 0, 0, 8, 1, 2, NULL, 0),
(438, 'kiimaria', 65, 1, 'sargeras/140/105033100-avatar.jpg', 'sargeras', 0, 0, 5, 1, 2, NULL, 0),
(439, 'sensie', 56, 1, 'garona/134/105230726-avatar.jpg', 'garona', 0, 0, 6, 7, 2, NULL, 0),
(440, 'wawaføu', 91, 0, 'sargeras/161/105274785-avatar.jpg', 'sargeras', 0, 0, 1, 3, 2, NULL, 0),
(441, 'evilelsa', 51, 1, 'garona/139/105294987-avatar.jpg', 'garona', 0, 0, 4, 4, 2, NULL, 0),
(442, 'evilanna', 50, 1, 'garona/142/105294990-avatar.jpg', 'garona', 0, 0, 4, 4, 2, NULL, 0),
(443, 'kaskada', 42, 1, 'sargeras/206/105943758-avatar.jpg', 'sargeras', 0, 0, 5, 25, 2, NULL, 0),
(444, 'acta', 100, 1, 'nerzhul/92/65854812-avatar.jpg', 'ner''zhul', 0, 0, 3, 11, 2, NULL, 0),
(445, 'amassis', 100, 0, 'sargeras/105/96431465-avatar.jpg', 'sargeras', 0, 0, 8, 11, 2, NULL, 0),
(446, 'aerria', 100, 1, 'sargeras/178/105571762-avatar.jpg', 'sargeras', 0, 0, 12, 4, 2, NULL, 0),
(447, 'mystramythiquebro0k_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(448, 'mystramythiquebro0k_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(449, 'antarus_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(450, 'antarus_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(451, 'prozzok', 100, 0, 'hyjal/250/126197754-avatar.jpg', 'hyjal', 0, 0, 2, 11, 3, NULL, 0),
(452, 'capï', 100, 0, 'hyjal/150/137227926-avatar.jpg', 'hyjal', 0, 0, 4, 7, 3, NULL, 0),
(453, 'rappaden', 100, 0, 'hyjal/192/137266368-avatar.jpg', 'hyjal', 726, 0, 10, 25, NULL, NULL, 0),
(454, 'feromil', 100, 0, 'hyjal/193/137416385-avatar.jpg', 'hyjal', 0, 0, 6, 1, 3, NULL, 0),
(455, 'madryade', 100, 1, 'garona/181/16490933-avatar.jpg', 'garona', 0, 0, 11, 4, 2, NULL, 0),
(456, 'mystra_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(457, 'mystra_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(470, 'argausse', 100, 0, 'chants-eternels/6/96764166-avatar.jpg', 'chants éternels', 717, 0, 2, 11, NULL, NULL, 0),
(471, 'chacra', 100, 0, 'elune/91/96831835-avatar.jpg', 'elune', 729, 0, 1, 1, NULL, NULL, 0),
(472, 'druideep', 100, 0, 'nerzhul/153/99633817-avatar.jpg', 'ner''zhul', 710, 0, 11, 4, NULL, NULL, 0),
(473, 'paladee', 100, 0, 'nerzhul/222/99702494-avatar.jpg', 'ner''zhul', 705, 0, 2, 1, NULL, NULL, 0),
(474, 'rhokk', 100, 0, 'amanthul/33/99993121-avatar.jpg', 'aman''thul', 732, 0, 1, 3, NULL, NULL, 0),
(475, 'rist', 100, 0, 'voljin/173/73802157-avatar.jpg', 'vol''jin', 697, 0, 2, 1, NULL, NULL, 0),
(476, 'alexior', 100, 0, 'rashgarroth/188/67662268-avatar.jpg', 'rashgarroth', 719, 0, 5, 1, NULL, NULL, 0),
(477, 'ambroqme', 100, 0, 'dalaran/253/117303549-avatar.jpg', 'dalaran', 705, 0, 1, 11, NULL, NULL, 0),
(478, 'bottm', 100, 1, 'aegwynn/155/120400795-avatar.jpg', 'aegwynn', 716, 0, 3, 4, NULL, NULL, 0),
(479, 'byzzih', 100, 1, 'hyjal/198/139945414-avatar.jpg', 'hyjal', 714, 0, 7, 3, NULL, NULL, 0),
(480, 'gintam', 100, 0, 'pozzo-delleternita/251/78135803-avatar.jpg', 'pozzo dell''eternità', 705, 0, 1, 1, NULL, NULL, 0),
(481, 'hellting', 100, 0, 'archimonde/132/139806084-avatar.jpg', 'archimonde', 700, 0, 6, 1, NULL, NULL, 0),
(482, 'magow', 100, 0, 'kirin-tor/216/105736664-avatar.jpg', 'kirin tor', 718, 0, 8, 22, NULL, NULL, 0),
(483, 'maltrina', 100, 1, 'tarren-mill/65/120683585-avatar.jpg', 'tarren mill', 702, 0, 8, 1, NULL, NULL, 0),
(484, 'mÿsti', 100, 1, 'kirin-tor/139/105779083-avatar.jpg', 'kirin tor', 734, 0, 11, 22, NULL, NULL, 0),
(485, 'nèphael', 100, 1, 'khaz-modan/104/115829352-avatar.jpg', 'khaz modan', 736, 0, 8, 25, NULL, NULL, 0),
(486, 'roxira', 100, 1, 'la-croisade-ecarlate/201/30653641-avatar.jpg', 'la croisade écarlate', 723, 0, 11, 4, NULL, NULL, 0),
(487, 'saera', 100, 1, 'garona/112/94568304-avatar.jpg', 'garona', 703, 0, 8, 1, NULL, NULL, 0),
(488, 'yamitatsu', 100, 0, 'hyjal/187/139667899-avatar.jpg', 'hyjal', 711, 0, 11, 22, NULL, NULL, 0),
(489, 'andreäne', 100, 1, 'les-clairvoyants/232/73330408-avatar.jpg', 'les clairvoyants', 707, 0, 10, 4, NULL, NULL, 0),
(490, 'garfunnk', 100, 1, 'conseil-des-ombres/201/97153993-avatar.jpg', 'conseil des ombres', 710, 0, 7, 11, NULL, NULL, 0),
(491, 'roster_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(492, 'roster_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(493, 'test_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(494, 'test_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(495, 'sdqsdqs_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(496, 'sdqsdqs_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(497, 'mystra_pve_bank', 0, 1, '', 'bank', 0, 1, 1, 1, NULL, NULL, 1),
(498, 'mystra_pve_disenchant', 0, 1, '', 'disenchant', 0, 1, 1, 1, NULL, NULL, 1),
(499, 'acronomicon', 100, 0, 'garona/76/12192588-avatar.jpg', 'garona', 0, 0, 9, 1, 2, NULL, 0),
(500, 'azülà', 100, 1, 'garona/38/35107110-avatar.jpg', 'garona', 0, 0, 7, 3, 2, NULL, 0),
(501, 'ambiorixx', 100, 0, 'garona/36/60381988-avatar.jpg', 'garona', 0, 0, 1, 1, 2, NULL, 0),
(502, 'ruhter', 100, 0, 'sargeras/177/100970929-avatar.jpg', 'sargeras', 0, 0, 1, 1, 2, NULL, 0),
(503, 'bjårnheïm', 100, 0, 'garona/189/105817789-avatar.jpg', 'garona', 0, 0, 3, 3, 2, NULL, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Vider la table avant d'insérer `raids`
--

TRUNCATE TABLE `raids`;
--
-- Contenu de la table `raids`
--

INSERT INTO `raids` (`idRaid`, `idEvenements`, `date`, `note`, `valeur`, `ajoutePar`, `majPar`, `idRosterTmp`, `idZoneTmp`, `idMode`) VALUES
(4, NULL, '2016-07-30 19:03:09', 'Cognefort - raid MM', 0.00, 'Import Raid-TracKer', '', 3, 6996, 16),
(5, NULL, '2016-07-30 19:55:35', 'Hellfire Citadel - flex NM', 0.00, 'Import Raid-TracKer', '', 3, 7545, 14),
(6, NULL, '2016-07-31 18:31:38', 'Hellfire Citadel - flex HM', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 3, 7545, 15),
(7, NULL, '2016-08-03 18:50:10', 'Hellfire Citadel - flex HM', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 3, 7545, 15),
(8, NULL, '2016-08-03 21:16:10', 'Hellfire Citadel - flex HM', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 3, 7545, 15),
(9, NULL, '2016-08-14 18:43:35', 'Hellfire Citadel - flex HM', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 3, 7545, 15),
(10, NULL, '2016-08-14 21:16:09', 'Hellfire Citadel - flex HM', 0.00, 'Import Raid-TracKer', '', 3, 7545, 15),
(11, NULL, '2016-08-17 18:44:49', 'Hellfire Citadel - flex HM', 0.00, 'Import Raid-TracKer', 'Import Raid-TracKer', 3, 7545, 15),
(13, NULL, '2016-08-19 21:28:32', 'Hellfire Citadel - flex NM', 0.00, 'Import Raid-TracKer', '', 3, 7545, 14);

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
(4, 2),
(4, 40),
(4, 59),
(4, 65),
(4, 100),
(4, 166),
(4, 201),
(4, 248),
(4, 318),
(4, 342),
(4, 346),
(4, 348),
(4, 470),
(4, 471),
(4, 472),
(4, 473),
(4, 474),
(4, 475),
(5, 2),
(5, 40),
(5, 59),
(5, 65),
(5, 100),
(5, 167),
(5, 201),
(5, 248),
(5, 291),
(5, 297),
(5, 318),
(5, 342),
(5, 346),
(5, 348),
(5, 476),
(5, 477),
(5, 478),
(5, 479),
(5, 480),
(5, 481),
(5, 482),
(5, 483),
(5, 484),
(5, 485),
(5, 486),
(5, 487),
(5, 488),
(6, 2),
(6, 59),
(6, 63),
(6, 65),
(6, 72),
(6, 81),
(6, 97),
(6, 100),
(6, 137),
(6, 139),
(6, 167),
(6, 176),
(6, 183),
(6, 193),
(6, 226),
(6, 227),
(6, 242),
(6, 248),
(6, 249),
(6, 259),
(6, 262),
(6, 263),
(6, 312),
(6, 332),
(6, 336),
(6, 342),
(6, 346),
(6, 347),
(6, 348),
(6, 484),
(6, 486),
(7, 59),
(7, 63),
(7, 65),
(7, 81),
(7, 97),
(7, 100),
(7, 104),
(7, 132),
(7, 139),
(7, 167),
(7, 176),
(7, 227),
(7, 231),
(7, 248),
(7, 259),
(7, 312),
(7, 342),
(7, 346),
(7, 347),
(7, 348),
(7, 484),
(8, 59),
(8, 63),
(8, 65),
(8, 81),
(8, 97),
(8, 100),
(8, 104),
(8, 132),
(8, 139),
(8, 166),
(8, 167),
(8, 176),
(8, 227),
(8, 231),
(8, 248),
(8, 259),
(8, 312),
(8, 342),
(8, 346),
(8, 347),
(8, 348),
(8, 484),
(9, 13),
(9, 56),
(9, 100),
(9, 176),
(9, 181),
(9, 209),
(9, 227),
(9, 231),
(9, 276),
(9, 312),
(9, 336),
(9, 346),
(9, 349),
(9, 362),
(9, 369),
(9, 387),
(10, 13),
(10, 56),
(10, 97),
(10, 100),
(10, 137),
(10, 166),
(10, 176),
(10, 181),
(10, 209),
(10, 227),
(10, 231),
(10, 276),
(10, 312),
(10, 336),
(10, 346),
(10, 349),
(10, 362),
(10, 369),
(10, 486),
(10, 489),
(11, 13),
(11, 39),
(11, 48),
(11, 56),
(11, 81),
(11, 89),
(11, 97),
(11, 100),
(11, 139),
(11, 166),
(11, 176),
(11, 181),
(11, 209),
(11, 222),
(11, 227),
(11, 231),
(11, 259),
(11, 263),
(11, 276),
(11, 301),
(11, 335),
(11, 336),
(11, 342),
(11, 346),
(11, 347),
(11, 348),
(11, 351),
(11, 357),
(11, 369),
(11, 453),
(11, 484),
(13, 13),
(13, 42),
(13, 65),
(13, 97),
(13, 100),
(13, 166),
(13, 346),
(13, 347),
(13, 348),
(13, 352),
(13, 369),
(13, 373),
(13, 386),
(13, 490);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Vider la table avant d'insérer `roster`
--

TRUNCATE TABLE `roster`;
--
-- Contenu de la table `roster`
--

INSERT INTO `roster` (`idRoster`, `nom`, `key`) VALUES
(1, 'mystramythiquebro0k', 'a6ee421e696666060fbf988ea33a833c'),
(2, 'antarus', 'a6ee421e696556060fbf988ea33a833c'),
(3, 'mystra', 'bnee421e692146060fbf988ea33a83fx'),
(5, 'test', 'thee421e791046060fbf988ea33a83gs'),
(6, 'sdqsdqs', 'thee421e791015679fbf988ea33a83gs'),
(7, 'mystra_pve', '1c24c167c14cee8b8f8a87676c3320db');

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
(1, 13, 4, NULL),
(1, 42, 4, NULL),
(1, 56, 3, NULL),
(1, 63, 2, NULL),
(1, 72, 2, NULL),
(1, 81, 3, NULL),
(1, 97, 4, NULL),
(1, 100, 4, 1),
(1, 166, 1, NULL),
(1, 231, 4, NULL),
(1, 243, 4, NULL),
(1, 247, 4, NULL),
(1, 248, 3, 1),
(1, 263, 3, NULL),
(1, 312, 3, NULL),
(1, 342, 3, NULL),
(1, 346, 4, NULL),
(1, 386, 1, NULL),
(1, 453, 2, NULL),
(1, 455, 2, NULL),
(2, 166, 1, NULL),
(3, 21, 4, NULL),
(3, 40, 2, NULL),
(3, 65, 4, NULL),
(3, 81, 3, NULL),
(3, 166, 1, NULL),
(3, 386, 1, NULL),
(3, 453, 2, NULL),
(7, 42, 4, NULL),
(7, 72, 2, NULL),
(7, 81, 3, NULL),
(7, 166, 1, NULL),
(7, 231, 4, NULL),
(7, 248, 3, 1),
(7, 263, 3, NULL),
(7, 312, 3, NULL),
(7, 336, 3, NULL),
(7, 347, 4, 1),
(7, 348, 2, NULL),
(7, 357, 3, NULL),
(7, 369, 3, NULL),
(7, 386, 1, NULL);

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
  `state` smallint(5) unsigned DEFAULT '0',
  `lastConnection` datetime NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keyValidMail` varchar(500) DEFAULT NULL,
  `forgetpass` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `display_name`, `password`, `state`, `lastConnection`, `lastUpdate`, `keyValidMail`, `forgetpass`) VALUES
(1, 'capi', 'capi@raid-tracker.com', 'Capi', '$2y$14$y5nJ6Aa.gSFYQ6Si0Fr0quaZ4wvhaShQr3qDkete/.s9GV4fw8L4u', 1, '2016-08-29 20:51:54', '0000-00-00 00:00:00', NULL, ''),
(2, 'antarus', 'antarus74@gmail.com', 'Antarus', '$2y$14$LGzQvjtuiGVzwNd.hkchH.FUN4/aqz00GsR3UgVsXJOUDfNhjJfby', 1, '2016-08-29 14:57:23', '0000-00-00 00:00:00', NULL, NULL),
(3, 'kadyll', 'kadyll@raid-tracker.com', 'Kadyll', '$2y$14$lNwq73CC6IwKswrOYGVHu.MaKd9MDbI.Rllj4b.sKZP16fdcGKLPK', 1, '2016-08-29 22:31:48', '0000-00-00 00:00:00', NULL, NULL),
(4, 'test', 'test@raid-tracker.com', 'test client normal 2', '$2y$14$SNxtDZgzXYH2xKZ2BdHBleBP9XLz2CkRPrdZtTpVzhzDwHfYRn.GK', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(5, 'oOBro0kOo', 'maritan.paul@gmail.com', 'oOBro0kOo', '$2y$14$8LbptKg/TU/I8.Q4feInTuWywFRsIPu0NYlcWLClt.y5wlng6CvC2', 1, '2016-08-29 20:52:16', '2016-08-25 19:02:53', NULL, NULL),
(6, 'efsefse', 'simoncreationweb@gmail.com', 'haha', '$2y$14$ArgqgD7WihAN.Ff0pTWkROrS9f1tqVO/OaPAIHnfuSvLjR0N4wF7O', 0, '0000-00-00 00:00:00', '2016-08-28 15:57:36', '', '');

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
(6, '10'),
(1, '11'),
(2, '11'),
(3, '11'),
(4, '11'),
(5, '11');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8027 ;

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
(7545, 'hellfire citadel', 100, 100, 10, 30, '6.2', 0, 1),
(8026, 'the emerald nightmare', 110, 110, 10, 30, '7.0', 0, 1);

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
(7545, 93068),
(8026, 100497),
(8026, 102679),
(8026, 103160),
(8026, 103769),
(8026, 105393),
(8026, 111000),
(8026, 113534);

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
(7545, 16),
(8026, 1),
(8026, 14),
(8026, 15),
(8026, 16);

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
  ADD CONSTRAINT `fk_item_personnage_raid_bosses1` FOREIGN KEY (`idBosses`) REFERENCES `bosses` (`idBosses`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_items1` FOREIGN KEY (`idItem`) REFERENCES `items` (`idItem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_personnages1` FOREIGN KEY (`idPersonnage`) REFERENCES `personnages` (`idPersonnage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_personnage_raid_raids1` FOREIGN KEY (`idRaid`) REFERENCES `raids` (`idRaid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
