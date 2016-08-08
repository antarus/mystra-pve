-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 08 Août 2016 à 22:26
-- Version du serveur: 5.5.50-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.19

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(1, '#C69B6D', 'Guerrier', NULL),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `guildes`
--

INSERT INTO `guildes` (`idGuildes`, `nom`, `serveur`, `niveau`, `miniature`, `idFaction`) VALUES
(1, 'Mystra', 'Garona', 25, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `idItem` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ajouterPar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `majPar` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `idBnet` int(10) DEFAULT NULL,
  `couleur` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `items`
--

INSERT INTO `items` (`idItem`, `nom`, `ajouterPar`, `majPar`, `idBnet`, `couleur`, `icon`) VALUES
(1, 'Remnant of Chaos', 'Import murloc', '', 133762, '', 'ability_felarakkoa_feldetonation_red'),
(2, 'Edict of Argus', 'Import murloc', '', 124382, '', 'inv_staff_2h_felfireraid_d_03'),
(3, 'Demon Prince''s Ascendant Crown', 'Import murloc', '', 124159, '', 'inv_helm_plate_archimonde_d_01'),
(4, 'Badge of Hellfire''s Conqueror', 'Import murloc', '', 127969, '', 'inv_jewelry_talisman_01'),
(5, 'Badge of Hellfire''s Protector', 'Import murloc', '', 127970, '', 'inv_jewelry_talisman_01'),
(6, 'Eredar Fel-Chain Gloves', 'Import murloc', '', 124291, '', 'inv_glove_mail_raidhunter_p_01'),
(7, 'Flickering Felspark', 'Import murloc', '', 124231, '', 'spell_fire_ragnaros_molteninfernogreen'),
(8, 'Felgrease-Smudged Robes', 'Import murloc', '', 124168, '', 'inv_cloth_raidmage_p_01robe'),
(9, 'Smoldercore Bulwark', 'Import murloc', '', 124356, '', 'inv_shield_1h_felfireraid_d_01'),
(10, 'Hand Loader Gauntlets', 'Import murloc', '', 124289, '', 'inv_glove_mail_raidhunter_p_01'),
(11, 'Voltage Regulation Diode', 'Import murloc', '', 124213, '', 'inv_6_2raid_necklace_1b'),
(12, 'Pedal-Pushing Sandals', 'Import murloc', '', 124148, '', 'inv_cloth_raidmage_p_01boot'),
(13, 'Pilot''s Pauldrons', 'Import murloc', '', 124174, '', 'inv_cloth_raidmage_p_01shoulder'),
(14, 'Iron Skullcrusher', 'Import murloc', '', 124373, '', 'inv_mace_1h_felfireraid_d_01'),
(15, 'Spiked Bloodstone Pendant', 'Import murloc', '', 124220, '', 'inv_6_0raid_necklace_4b'),
(16, 'Gurtogg''s Discarded Hood', 'Import murloc', '', 124258, '', 'inv_leather_raidrogue_p_01helm'),
(17, 'Bloody Berserker''s Bracers', 'Import murloc', '', 124312, '', 'inv_bracer_mail_raidhunter_p_01'),
(18, 'Ancient Gorestained Wrap', 'Import murloc', '', 124169, '', 'inv_robe_cloth_raidwarlock_p_01'),
(19, 'Shawl of Sanguinary Ritual', 'Import murloc', '', 124137, '', 'inv_cape_felfire_raid_d_01'),
(20, 'Toxicologist''s Treated Boots', 'Import murloc', '', 124250, '', 'inv_leather_raidrogue_p_01boots'),
(21, 'Congealed Globule Loop', 'Import murloc', '', 124197, '', 'inv_6_2raid_ring_4c'),
(22, 'Soulwarped Tower Shield', 'Import murloc', '', 124357, '', 'inv_shield_1h_felfireraid_d_02'),
(23, 'Chain Wristguards of the Stricken', 'Import murloc', '', 124313, '', 'inv_bracer_mail_raidshaman_p_01'),
(24, 'Casque of Foul Concentration', 'Import murloc', '', 124331, '', 'inv_plate_raidpaladin_p_01helm'),
(25, 'Gauntlets of Hellfire''s Protector', 'Import murloc', '', 127964, '', 'inv_gauntlets_29'),
(26, 'Satin Gloves of Injustice', 'Import murloc', '', 124153, '', 'inv_glove_cloth_raidpriest_p_01'),
(27, 'Oppressor''s Merciless Treads', 'Import murloc', '', 124251, '', 'inv_boot_leather_raidmonk_p_01'),
(28, 'Pauldrons of Contempt', 'Import murloc', '', 124306, '', 'inv_shoulder_mail_raidhunter_p_01'),
(29, 'Malicious Censer', 'Import murloc', '', 124226, '', 'inv_guild_cauldron_b'),
(30, 'Unstable Felshadow Emulsion', 'Import murloc', '', 124234, '', 'inv_misc_endlesspotion'),
(31, 'Shoulders of Hellfire''s Protector', 'Import murloc', '', 127967, '', 'inv_shoulder_22');

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
  `bonus` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idItemRaidPersonnage`),
  KEY `fk_item_personnage_raid_raids1_idx` (`idRaid`),
  KEY `fk_item_personnage_raid_items1_idx` (`idItem`),
  KEY `fk_item_personnage_raid_personnages1_idx` (`idPersonnage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `item_personnage_raid`
--

INSERT INTO `item_personnage_raid` (`idItemRaidPersonnage`, `idRaid`, `idItem`, `idPersonnage`, `valeur`, `bonus`) VALUES
(1, 1, 1, 59, 0.00, ':::'),
(2, 1, 1, 98, 0.00, ':::'),
(3, 1, 1, 324, 0.00, ':::'),
(5, 1, 1, 105, 0.00, ':::'),
(7, 1, 3, 174, 0.00, '1798:1487:529:'),
(8, 1, 4, 62, 0.00, '570:::'),
(9, 1, 1, 130, 0.00, ':::'),
(10, 1, 4, 230, 0.00, '570:::'),
(11, 1, 5, 350, 0.00, '570:::'),
(12, 1, 6, 165, 0.00, '1798:41:1492:'),
(13, 2, 7, 174, 0.00, '1798:1492:3441:'),
(18, 2, 12, 101, 0.00, '1798:1487:529:'),
(22, 2, 16, 353, 0.00, '1798:1487:529:'),
(25, 2, 19, 105, 0.00, '1798:1487:529:'),
(26, 2, 20, 324, 0.00, '1798:1487:529:'),
(28, 2, 22, 166, 0.00, '1798:1487:529:'),
(29, 2, 23, 354, 0.00, '1798:1487:529:'),
(31, 2, 25, 249, 0.00, '570:::'),
(33, 2, 26, 59, 0.00, '1798:1487:529:'),
(34, 2, 27, 220, 0.00, '1798:1487:529:'),
(36, 2, 29, 98, 0.00, '1798:1487:529:'),
(37, 2, 30, 62, 0.00, '1798:42:1487:'),
(38, 2, 30, 130, 0.00, '1798:1497:3441:'),
(39, 2, 31, 350, 0.00, '570:::');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=361 ;

--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`idPersonnage`, `nom`, `niveau`, `genre`, `miniature`, `royaume`, `idFaction`, `idClasses`, `idRace`, `idGuildes`, `idUsers`) VALUES
(1, 'Ironkain', 100, 0, 'garona/172/1659564-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(2, 'Océannia', 100, 1, 'garona/104/1813864-avatar.jpg', 'Garona', 0, 1, 4, 1, NULL),
(3, 'Matéus', 100, 0, 'garona/121/1859705-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(4, 'Zatoichy', 100, 0, 'garona/104/2021992-avatar.jpg', 'Garona', 0, 5, 4, 1, NULL),
(5, 'Mordrède', 100, 0, 'garona/30/2636318-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(6, 'Lagaboulette', 100, 1, 'garona/223/2676447-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(7, 'Yarixa', 100, 1, 'garona/70/2711622-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(8, 'Prony', 100, 0, 'garona/83/2803795-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(9, 'Octo', 100, 0, 'garona/230/5208038-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(10, 'Kerimaa', 100, 1, 'garona/125/5767549-avatar.jpg', 'Garona', 0, 3, 11, 1, NULL),
(11, 'Capikaze', 100, 0, 'garona/170/9321898-avatar.jpg', 'Garona', 0, 1, 11, 1, NULL),
(12, 'Bøubøule', 100, 0, 'garona/79/9410383-avatar.jpg', 'Garona', 0, 3, 3, 1, NULL),
(13, 'Sadday', 100, 1, 'garona/46/9553198-avatar.jpg', 'Garona', 0, 5, 1, 1, NULL),
(14, 'Falinns', 100, 0, 'garona/234/9607402-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(15, 'Myna', 100, 1, 'garona/161/9657249-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(16, 'Reve', 100, 1, 'garona/148/9673876-avatar.jpg', 'Garona', 0, 9, 7, 1, NULL),
(17, 'Cely', 100, 1, 'garona/113/9790833-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(18, 'Alandrys', 100, 0, 'garona/58/9801530-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(19, 'Elirys', 100, 1, 'garona/137/10309257-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(20, 'Parlama', 100, 1, 'garona/143/10635151-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(21, 'Alax', 100, 0, 'garona/54/11104054-avatar.jpg', 'Garona', 0, 2, 3, 1, NULL),
(22, 'Acronomicon', 100, 0, 'garona/76/12192588-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(23, 'Lhilhi', 100, 1, 'garona/209/12288465-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(24, 'Arthyss', 100, 0, 'garona/109/12343149-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(25, 'Apisto', 100, 0, 'garona/199/12419527-avatar.jpg', 'Garona', 0, 1, 4, 1, NULL),
(26, 'Nryan', 100, 0, 'garona/87/12421719-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(27, 'Karabistouil', 100, 1, 'garona/66/13559106-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(28, 'Ptitepoucett', 100, 1, 'garona/237/13613805-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(29, 'Healsangel', 100, 1, 'garona/226/14281954-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(30, 'Kiev', 100, 0, 'garona/212/14996436-avatar.jpg', 'Garona', 0, 5, 1, 1, NULL),
(31, 'Nisya', 100, 1, 'garona/34/15257378-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(32, 'Waly', 100, 0, 'garona/223/16120287-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(33, 'Kaarapital', 100, 1, 'garona/134/16132486-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(34, 'Poupoucetire', 100, 1, 'garona/234/16132842-avatar.jpg', 'Garona', 0, 3, 11, 1, NULL),
(35, 'Arcalyne', 100, 1, 'garona/244/17042164-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(36, 'Kaarabine', 100, 1, 'garona/170/17945514-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(37, 'Lisys', 100, 1, 'garona/178/18159538-avatar.jpg', 'Garona', 0, 5, 1, 1, NULL),
(38, 'Bogossa', 100, 1, 'garona/71/19291463-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(39, 'Nostalgie', 100, 1, 'garona/25/19346713-avatar.jpg', 'Garona', 0, 5, 11, 1, NULL),
(40, 'Rurú', 100, 1, 'garona/200/19821000-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(41, 'Heresânkh', 100, 1, 'garona/158/20167326-avatar.jpg', 'Garona', 0, 5, 11, 1, NULL),
(42, 'Antarus', 100, 0, 'garona/146/21289874-avatar.jpg', 'Garona', 0, 5, 4, 1, NULL),
(43, 'Laetitiaa', 100, 1, 'garona/203/22083275-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(44, 'Khronøs', 100, 0, 'garona/125/23517053-avatar.jpg', 'Garona', 0, 6, 1, 1, NULL),
(45, 'Karalich', 100, 1, 'garona/26/23697690-avatar.jpg', 'Garona', 0, 6, 4, 1, NULL),
(46, 'Poulich', 100, 1, 'garona/109/23709549-avatar.jpg', 'Garona', 0, 6, 1, 1, NULL),
(47, 'Prozzak', 100, 0, 'garona/42/26734122-avatar.jpg', 'Garona', 0, 5, 3, 1, NULL),
(48, 'Bigbeer', 100, 0, 'garona/255/28860159-avatar.jpg', 'Garona', 0, 3, 3, 1, NULL),
(49, 'Redoot', 100, 1, 'garona/254/29159934-avatar.jpg', 'Garona', 0, 6, 1, 1, NULL),
(50, 'Byluna', 100, 1, 'garona/220/29529308-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(51, 'Plateùs', 100, 0, 'garona/10/30977034-avatar.jpg', 'Garona', 0, 2, 11, 1, NULL),
(52, 'Dooc', 100, 1, 'garona/2/33189122-avatar.jpg', 'Garona', 0, 5, 1, 1, NULL),
(53, 'Shynzu', 100, 1, 'garona/149/34208149-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(54, 'Lylybelle', 100, 1, 'garona/99/34321507-avatar.jpg', 'Garona', 0, 6, 1, 1, NULL),
(55, 'Ilidøs', 100, 0, 'garona/9/34456073-avatar.jpg', 'Garona', 0, 6, 4, 1, NULL),
(56, 'Tÿra', 100, 0, 'garona/57/35029305-avatar.jpg', 'Garona', 0, 6, 1, 1, NULL),
(57, 'Xcalibur', 100, 0, 'garona/24/35030552-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(58, 'Auron', 100, 0, 'garona/61/35204669-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(59, 'Tikchbila', 100, 0, 'garona/154/36140954-avatar.jpg', 'Garona', 0, 8, 22, 1, NULL),
(60, 'Harigston', 100, 1, 'garona/119/37148279-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(61, 'Aeoline', 100, 1, 'garona/61/37618237-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(62, 'Olare', 100, 0, 'garona/10/37762058-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(63, 'Bachantes', 100, 0, 'garona/49/39400497-avatar.jpg', 'Garona', 0, 1, 3, 1, NULL),
(64, 'Capï', 100, 1, 'garona/40/40891944-avatar.jpg', 'Garona', 0, 3, 25, 1, NULL),
(65, 'Pléco', 100, 1, 'garona/225/40947937-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(66, 'Dootty', 100, 1, 'garona/247/43145207-avatar.jpg', 'Garona', 0, 3, 1, 1, NULL),
(67, 'Cellesta', 100, 1, 'garona/19/43252755-avatar.jpg', 'Garona', 0, 5, 11, 1, NULL),
(68, 'Laugan', 100, 0, 'garona/23/45220631-avatar.jpg', 'Garona', 0, 5, 3, 1, NULL),
(69, 'Ptitelouve', 100, 1, 'garona/123/45595259-avatar.jpg', 'Garona', 0, 4, 22, 1, NULL),
(70, 'Talisia', 100, 1, 'garona/12/46258956-avatar.jpg', 'Garona', 0, 8, 7, 1, NULL),
(71, 'Spoiler', 100, 0, 'garona/31/46725407-avatar.jpg', 'Garona', 0, 7, 3, 1, NULL),
(72, 'Kalamïty', 100, 1, 'garona/195/48465859-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(73, 'Aelyne', 100, 1, 'garona/116/48794484-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(74, 'Félicias', 100, 1, 'garona/137/49561225-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(75, 'Iriséa', 100, 1, 'garona/60/49766972-avatar.jpg', 'Garona', 0, 8, 4, 1, NULL),
(76, 'Rapiou', 100, 0, 'garona/76/50125388-avatar.jpg', 'Garona', 0, 4, 22, 1, NULL),
(77, 'Ächille', 100, 0, 'garona/21/50140693-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(78, 'Thusùxx', 100, 0, 'garona/97/50817121-avatar.jpg', 'Garona', 0, 11, 22, 1, NULL),
(79, 'Cartam', 100, 0, 'garona/135/50938503-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(80, 'Mâjuscule', 100, 1, 'garona/85/51698517-avatar.jpg', 'Garona', 0, 8, 11, 1, NULL),
(81, 'Cartmân', 100, 0, 'garona/100/51740004-avatar.jpg', 'Garona', 0, 6, 1, 1, NULL),
(82, 'Deathinition', 100, 0, 'garona/206/52678862-avatar.jpg', 'Garona', 0, 6, 11, 1, NULL),
(83, 'Mérys', 100, 1, 'garona/141/52905101-avatar.jpg', 'Garona', 0, 4, 1, 1, NULL),
(84, 'Cartmän', 100, 0, 'garona/102/53301094-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(85, 'Jðe', 100, 0, 'garona/8/53700616-avatar.jpg', 'Garona', 0, 7, 3, 1, NULL),
(86, 'Gøuma', 100, 0, 'garona/116/54341236-avatar.jpg', 'Garona', 0, 8, 3, 1, NULL),
(87, 'Gøuminette', 100, 1, 'garona/120/54341240-avatar.jpg', 'Garona', 0, 7, 3, 1, NULL),
(88, 'Sømetimes', 100, 1, 'garona/74/54789706-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(89, 'Odreth', 100, 0, 'garona/231/55060199-avatar.jpg', 'Garona', 0, 2, 11, 1, NULL),
(90, 'Nydelia', 100, 1, 'garona/51/55169843-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(91, 'Valyanas', 100, 1, 'garona/30/55325214-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(92, 'Lønï', 100, 1, 'garona/254/55326462-avatar.jpg', 'Garona', 0, 8, 7, 1, NULL),
(93, 'Crysista', 100, 1, 'garona/148/55543956-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(94, 'Rylia', 100, 1, 'garona/83/55557203-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(95, 'Oriane', 100, 1, 'garona/205/55836621-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(96, 'Swanya', 100, 1, 'garona/7/56419335-avatar.jpg', 'Garona', 0, 3, 22, 1, NULL),
(97, 'Zazagentil', 100, 0, 'garona/46/56717358-avatar.jpg', 'Garona', 0, 5, 7, 1, NULL),
(98, 'Ðeltasu', 100, 0, 'garona/144/56734608-avatar.jpg', 'Garona', 0, 3, 1, 1, NULL),
(99, 'Nayka', 100, 1, 'garona/75/56993099-avatar.jpg', 'Garona', 0, 3, 1, 1, NULL),
(100, 'Galiowyn', 100, 0, 'garona/12/57240076-avatar.jpg', 'Garona', 0, 11, 22, 1, NULL),
(101, 'Philémons', 100, 0, 'garona/186/57348538-avatar.jpg', 'Garona', 0, 9, 7, 1, NULL),
(102, 'Smado', 100, 0, 'garona/114/57897330-avatar.jpg', 'Garona', 0, 10, 7, 1, NULL),
(103, 'Thyios', 100, 1, 'garona/106/57899626-avatar.jpg', 'Garona', 0, 10, 25, 1, NULL),
(104, 'Unnder', 100, 0, 'garona/253/58228221-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(105, 'Coonta', 100, 1, 'garona/127/59596159-avatar.jpg', 'Garona', 0, 9, 7, 1, NULL),
(106, 'Kâlia', 100, 1, 'garona/223/59663071-avatar.jpg', 'Garona', 0, 10, 25, 1, NULL),
(107, 'Jesuisblonde', 100, 1, 'garona/179/59805875-avatar.jpg', 'Garona', 0, 4, 1, 1, NULL),
(108, 'Olaf', 100, 0, 'garona/235/59918571-avatar.jpg', 'Garona', 0, 6, 3, 1, NULL),
(109, 'Aygul', 100, 1, 'garona/229/59934181-avatar.jpg', 'Garona', 0, 3, 1, 1, NULL),
(110, 'Thynael', 100, 1, 'garona/112/60011888-avatar.jpg', 'Garona', 0, 6, 22, 1, NULL),
(111, 'Drethz', 100, 0, 'garona/61/60030013-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(112, 'Amnésiâ', 100, 1, 'garona/24/60044568-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(113, 'Aryaa', 100, 1, 'garona/119/60073847-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(114, 'Ciryaliel', 100, 1, 'garona/237/60352493-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(115, 'Kâdyll', 100, 1, 'garona/244/60942836-avatar.jpg', 'Garona', 0, 3, 1, 1, NULL),
(116, 'Kàdyll', 100, 1, 'garona/85/61138261-avatar.jpg', 'Garona', 0, 5, 1, 1, NULL),
(117, 'Ivøri', 100, 1, 'garona/232/61292008-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(118, 'Deathss', 100, 0, 'garona/187/61502395-avatar.jpg', 'Garona', 0, 6, 22, 1, NULL),
(119, 'Angelÿn', 100, 1, 'garona/15/61609999-avatar.jpg', 'Garona', 0, 8, 25, 1, NULL),
(120, 'Yoshino', 100, 1, 'garona/60/61798972-avatar.jpg', 'Garona', 0, 1, 4, 1, NULL),
(121, 'Baêlle', 100, 1, 'garona/214/62194646-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(122, 'Suyon', 100, 1, 'garona/141/62668429-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(123, 'Yukïno', 100, 1, 'garona/164/62752932-avatar.jpg', 'Garona', 0, 6, 11, 1, NULL),
(124, 'Samisa', 100, 1, 'garona/43/62753835-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(125, 'Jisun', 100, 1, 'garona/42/63894058-avatar.jpg', 'Garona', 0, 3, 1, 1, NULL),
(126, 'Ayumu', 100, 1, 'garona/202/63920074-avatar.jpg', 'Garona', 0, 2, 11, 1, NULL),
(127, 'Mickie', 100, 1, 'garona/119/65614711-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(128, 'Minji', 100, 1, 'garona/115/65681011-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(129, 'Acta', 100, 1, 'garona/92/65854812-avatar.jpg', 'Ner''zhul', 0, 3, 11, 1, NULL),
(130, 'Nathe', 100, 1, 'garona/77/65920589-avatar.jpg', 'Ner''zhul', 0, 5, 1, NULL, NULL),
(131, 'Kréa', 100, 1, 'garona/121/65934969-avatar.jpg', 'Ner''zhul', 0, 7, 11, 1, NULL),
(132, 'Eclypse', 100, 1, 'garona/179/66122931-avatar.jpg', 'Ner''zhul', 0, 3, 22, 1, NULL),
(133, 'Healle', 100, 1, 'garona/96/66131296-avatar.jpg', 'Ner''zhul', 0, 5, 4, 1, NULL),
(134, 'Emac', 100, 1, 'garona/218/66211802-avatar.jpg', 'Ner''zhul', 0, 1, 22, 1, NULL),
(135, 'Dìgg', 100, 0, 'garona/173/66213549-avatar.jpg', 'Ner''zhul', 0, 8, 11, 1, NULL),
(136, 'Wumbat', 100, 0, 'garona/180/66235060-avatar.jpg', 'Ner''zhul', 0, 11, 22, 1, NULL),
(137, 'Lnaudru', 100, 1, 'garona/232/66251496-avatar.jpg', 'Ner''zhul', 0, 11, 22, 1, NULL),
(138, 'Alwynn', 100, 0, 'garona/253/66481661-avatar.jpg', 'Garona', 0, 5, 4, 1, NULL),
(139, 'Baldar', 100, 0, 'garona/61/66540093-avatar.jpg', 'Ner''zhul', 0, 2, 1, 1, NULL),
(140, 'Xylomi', 100, 1, 'garona/185/66549177-avatar.jpg', 'Ner''zhul', 0, 7, 11, 1, NULL),
(141, 'Hassakura', 100, 0, 'garona/104/66554472-avatar.jpg', 'Ner''zhul', 0, 7, 11, 1, NULL),
(142, 'Bellame', 100, 1, 'garona/86/67268182-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(143, 'Karacast', 100, 1, 'garona/89/67511385-avatar.jpg', 'Garona', 0, 9, 7, 1, NULL),
(144, 'Kaara', 100, 1, 'garona/152/67514776-avatar.jpg', 'Garona', 0, 8, 7, 1, NULL),
(145, 'Cøcalight', 100, 1, 'garona/69/67702597-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(146, 'Karaoutai', 100, 1, 'garona/10/67769098-avatar.jpg', 'Garona', 0, 5, 7, 1, NULL),
(147, 'Zygore', 100, 0, 'garona/94/67822686-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(148, 'Kimtan', 100, 1, 'garona/37/68474149-avatar.jpg', 'Garona', 0, 10, 4, 1, NULL),
(149, 'Jiwon', 100, 1, 'garona/83/68678739-avatar.jpg', 'Garona', 0, 6, 4, 1, NULL),
(150, 'Okarin', 100, 0, 'garona/37/69615909-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(151, 'Mûrmûr', 100, 1, 'garona/95/69866079-avatar.jpg', 'Garona', 0, 9, 22, 1, NULL),
(152, 'Cøcazerø', 100, 0, 'garona/86/70524502-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(153, 'Graalimpie', 100, 0, 'garona/192/71505600-avatar.jpg', 'Ner''zhul', 0, 6, 4, 1, NULL),
(154, 'Kadyl', 100, 1, 'garona/31/71591199-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(155, 'Mizutani', 100, 1, 'garona/21/72120085-avatar.jpg', 'Garona', 0, 10, 1, 1, NULL),
(156, 'Jevo', 100, 0, 'garona/124/73588092-avatar.jpg', 'Garona', 0, 8, 7, 1, NULL),
(157, 'Yùkinà', 100, 1, 'garona/1/73646593-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(158, 'Hayes', 100, 1, 'garona/99/73668963-avatar.jpg', 'Garona', 0, 6, 1, 1, NULL),
(159, 'Timelord', 100, 0, 'garona/53/73684021-avatar.jpg', 'Ner''zhul', 0, 1, 4, 1, NULL),
(160, 'Niylla', 100, 1, 'garona/133/73691781-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(161, 'Destinee', 100, 1, 'garona/76/73718092-avatar.jpg', 'Garona', 0, 8, 25, 1, NULL),
(162, 'Tîmelord', 100, 0, 'garona/38/73722406-avatar.jpg', 'Ner''zhul', 0, 3, 4, 1, NULL),
(163, 'Yùkinø', 100, 1, 'garona/144/73912720-avatar.jpg', 'Garona', 0, 5, 1, 1, NULL),
(164, 'Belleange', 100, 1, 'garona/253/73919997-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(165, 'Antaruss', 100, 1, 'garona/10/74018058-avatar.jpg', 'Garona', 0, 10, 1, 1, NULL),
(166, 'Christange', 100, 1, 'garona/87/74051159-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(167, 'Lenøre', 100, 1, 'garona/130/74374274-avatar.jpg', 'Garona', 0, 3, 1, 1, NULL),
(168, 'Bloodynight', 100, 1, 'garona/213/74478293-avatar.jpg', 'Garona', 0, 2, 11, 1, NULL),
(169, 'Xeralynn', 100, 1, 'garona/191/75077567-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(170, 'Lishaoran', 100, 0, 'garona/128/75897728-avatar.jpg', 'Garona', 0, 2, 11, 1, NULL),
(171, 'Zantell', 100, 1, 'garona/147/75911571-avatar.jpg', 'Garona', 0, 1, 4, 1, NULL),
(172, 'Benjiwars', 100, 0, 'garona/232/75921640-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(173, 'Kashyk', 100, 1, 'garona/172/75924396-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(174, 'Sfy', 100, 0, 'garona/77/77472589-avatar.jpg', 'Ner''zhul', 0, 8, 1, NULL, NULL),
(175, 'Jevy', 100, 0, 'garona/192/78349504-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(176, 'Nosfia', 100, 1, 'garona/196/78395588-avatar.jpg', 'Garona', 0, 1, 25, 1, NULL),
(177, 'Ewanaelle', 100, 1, 'garona/83/84882771-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(178, 'Miks', 100, 1, 'garona/106/89038442-avatar.jpg', 'Sargeras', 0, 9, 1, 1, NULL),
(179, 'Balrog', 100, 0, 'garona/68/89081924-avatar.jpg', 'Sargeras', 0, 1, 22, 1, NULL),
(180, 'Dogua', 100, 0, 'garona/166/89086886-avatar.jpg', 'Sargeras', 0, 9, 1, 1, NULL),
(181, 'Ildriar', 100, 0, 'garona/166/89091494-avatar.jpg', 'Sargeras', 0, 2, 1, 1, NULL),
(182, 'Misswow', 100, 1, 'garona/195/89097923-avatar.jpg', 'Sargeras', 0, 4, 1, 1, NULL),
(183, 'Azalaïs', 100, 1, 'garona/66/89184834-avatar.jpg', 'Sargeras', 0, 5, 4, 1, NULL),
(184, 'Drahas', 100, 0, 'garona/63/89275455-avatar.jpg', 'Sargeras', 0, 6, 11, 1, NULL),
(185, 'Chlöre', 100, 1, 'garona/96/89276000-avatar.jpg', 'Sargeras', 0, 6, 4, 1, NULL),
(186, 'Pushup', 100, 1, 'garona/20/89295892-avatar.jpg', 'Sargeras', 0, 8, 1, 1, NULL),
(187, 'Belnadifia', 100, 1, 'garona/228/89356004-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(188, 'Tohetta', 100, 1, 'garona/252/89367292-avatar.jpg', 'Sargeras', 0, 6, 1, 1, NULL),
(189, 'Damnetus', 100, 0, 'garona/24/89529880-avatar.jpg', 'Sargeras', 0, 11, 22, 1, NULL),
(190, 'Trinquette', 100, 1, 'garona/139/89549707-avatar.jpg', 'Sargeras', 0, 1, 1, 1, NULL),
(191, 'Parlevent', 100, 1, 'garona/9/89552649-avatar.jpg', 'Sargeras', 0, 7, 11, 1, NULL),
(192, 'Asharaak', 100, 0, 'garona/151/89552791-avatar.jpg', 'Sargeras', 0, 4, 22, 1, NULL),
(193, 'Drèams', 100, 1, 'garona/86/89564502-avatar.jpg', 'Sargeras', 0, 9, 1, 1, NULL),
(194, 'Ango', 100, 1, 'garona/73/89630537-avatar.jpg', 'Sargeras', 0, 5, 11, 1, NULL),
(195, 'Tifettes', 100, 1, 'garona/175/89636527-avatar.jpg', 'Sargeras', 0, 8, 4, 1, NULL),
(196, 'Riddick', 100, 0, 'garona/193/89665985-avatar.jpg', 'Sargeras', 0, 4, 1, 1, NULL),
(197, 'Lotùs', 100, 1, 'garona/240/89688304-avatar.jpg', 'Sargeras', 0, 4, 4, 1, NULL),
(198, 'Maenira', 100, 1, 'garona/18/89702930-avatar.jpg', 'Sargeras', 0, 5, 1, 1, NULL),
(199, 'Nynja', 100, 0, 'garona/150/89718422-avatar.jpg', 'Sargeras', 0, 10, 25, 1, NULL),
(200, 'Xàe', 100, 1, 'garona/27/89733403-avatar.jpg', 'Sargeras', 0, 8, 1, 1, NULL),
(201, 'Feniks', 100, 1, 'garona/78/89738318-avatar.jpg', 'Sargeras', 0, 10, 1, 1, NULL),
(202, 'Azhrei', 100, 0, 'garona/22/89739798-avatar.jpg', 'Sargeras', 0, 2, 1, 1, NULL),
(203, 'Fenixia', 100, 1, 'garona/178/89743282-avatar.jpg', 'Sargeras', 0, 8, 1, 1, NULL),
(204, 'Omezaroth', 100, 0, 'garona/19/89854483-avatar.jpg', 'Sargeras', 0, 3, 4, 1, NULL),
(205, 'Gromack', 100, 0, 'garona/112/90017136-avatar.jpg', 'Sargeras', 0, 1, 1, 1, NULL),
(206, 'Zephyel', 100, 0, 'garona/38/90068262-avatar.jpg', 'Sargeras', 0, 9, 22, 1, NULL),
(207, 'Spartìate', 100, 1, 'garona/25/92064537-avatar.jpg', 'Sargeras', 0, 1, 4, 1, NULL),
(208, 'Üther', 100, 0, 'garona/154/93266586-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(209, 'Nebutron', 100, 0, 'garona/80/93613392-avatar.jpg', 'Garona', 0, 8, 7, 1, NULL),
(210, 'Midoru', 100, 0, 'garona/174/93614510-avatar.jpg', 'Garona', 0, 3, 22, 1, NULL),
(211, 'Prédictrice', 100, 1, 'garona/236/93673708-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(212, 'Xinding', 100, 1, 'garona/38/93801510-avatar.jpg', 'Garona', 0, 4, 1, 1, NULL),
(213, 'Timelôrd', 100, 0, 'garona/61/93863997-avatar.jpg', 'Ner''zhul', 0, 11, 4, 1, NULL),
(214, 'Titepoucette', 100, 1, 'garona/69/94163269-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(215, 'Nokitsune', 100, 1, 'garona/242/94319090-avatar.jpg', 'Garona', 0, 10, 25, 1, NULL),
(216, 'Xäntra', 100, 1, 'garona/175/94611375-avatar.jpg', 'Garona', 0, 1, 4, 1, NULL),
(217, 'Zélya', 100, 1, 'garona/179/94718131-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(218, 'Seyer', 100, 0, 'garona/86/94837334-avatar.jpg', 'Sargeras', 0, 2, 1, 1, NULL),
(219, 'Kàdyl', 100, 1, 'garona/110/95004270-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(220, 'Wochifan', 100, 0, 'garona/245/95029749-avatar.jpg', 'Garona', 0, 10, 25, 1, NULL),
(221, 'Orophinae', 100, 1, 'garona/236/95043564-avatar.jpg', 'Garona', 0, 5, 11, 1, NULL),
(222, 'Eiziah', 100, 1, 'garona/93/95045213-avatar.jpg', 'Garona', 0, 5, 1, 1, NULL),
(223, 'Raenis', 100, 0, 'garona/229/95116261-avatar.jpg', 'Sargeras', 0, 3, 4, 1, NULL),
(224, 'Zoar', 100, 0, 'garona/228/95148004-avatar.jpg', 'Sargeras', 0, 9, 7, 1, NULL),
(225, 'Anyra', 100, 1, 'garona/232/95432936-avatar.jpg', 'Sargeras', 0, 3, 1, 1, NULL),
(226, 'Eon', 100, 1, 'garona/17/95441937-avatar.jpg', 'Garona', 0, 2, 11, 1, NULL),
(227, 'Nøsfé', 100, 0, 'garona/244/95503092-avatar.jpg', 'Garona', 0, 10, 1, 1, NULL),
(228, 'Irginwor', 100, 0, 'garona/62/95794238-avatar.jpg', 'Ner''zhul', 0, 9, 1, 1, NULL),
(229, 'Ayshell', 100, 1, 'garona/62/96186942-avatar.jpg', 'Sargeras', 0, 4, 1, 1, NULL),
(230, 'Kâdyl', 100, 1, 'garona/25/96249369-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(231, 'Elyä', 100, 1, 'garona/84/96272212-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(232, 'Galérius', 100, 0, 'garona/235/96323819-avatar.jpg', 'Garona', 0, 11, 22, 1, NULL),
(233, 'Amassis', 100, 0, 'garona/105/96431465-avatar.jpg', 'Sargeras', 0, 8, 11, 1, NULL),
(234, 'Lèvy', 100, 1, 'garona/246/96557046-avatar.jpg', 'Garona', 0, 2, 11, 1, NULL),
(235, 'Märgâlärds', 100, 0, 'garona/13/96674829-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(236, 'Kidipet', 100, 0, 'garona/169/96749993-avatar.jpg', 'Garona', 0, 7, 3, 1, NULL),
(237, 'Myllenia', 100, 1, 'garona/149/96820373-avatar.jpg', 'Sargeras', 0, 5, 1, 1, NULL),
(238, 'Kidisparai', 100, 0, 'garona/183/96877239-avatar.jpg', 'Garona', 0, 1, 3, 1, NULL),
(239, 'Ida', 100, 1, 'garona/80/96981584-avatar.jpg', 'Garona', 0, 4, 3, 1, NULL),
(240, 'Anÿ', 100, 1, 'garona/13/96982797-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(241, 'Belanima', 100, 1, 'garona/41/97195305-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(242, 'Hibe', 100, 0, 'garona/193/97235905-avatar.jpg', 'Sargeras', 0, 2, 3, 1, NULL),
(243, 'Kâdyll', 100, 1, 'garona/146/97287058-avatar.jpg', 'Ner''zhul', 0, 4, 1, 1, NULL),
(244, 'Myllé', 100, 1, 'garona/75/97468747-avatar.jpg', 'Sargeras', 0, 8, 1, 1, NULL),
(245, 'Cëly', 100, 1, 'garona/12/98057228-avatar.jpg', 'Garona', 0, 5, 1, 1, NULL),
(246, 'Kuramì', 100, 1, 'garona/5/98185477-avatar.jpg', 'Garona', 0, 7, 25, 1, NULL),
(247, 'Chandrak', 100, 1, 'garona/19/98205971-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(248, 'Kazathwin', 100, 0, 'garona/77/98251853-avatar.jpg', 'Garona', 0, 7, 3, 1, NULL),
(249, 'Commonbaby', 100, 0, 'garona/125/98300541-avatar.jpg', 'Sargeras', 0, 1, 1, 1, NULL),
(250, 'Luminara', 100, 1, 'garona/112/98507376-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(251, 'Tatoon', 100, 1, 'garona/148/98531988-avatar.jpg', 'Garona', 0, 5, 4, 1, NULL),
(252, 'Løuu', 100, 1, 'garona/65/98663233-avatar.jpg', 'Garona', 0, 10, 25, 1, NULL),
(253, 'Shaölin', 100, 0, 'garona/158/98933406-avatar.jpg', 'Garona', 0, 10, 1, 1, NULL),
(254, 'Rénovatrice', 100, 1, 'garona/53/99038261-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(255, 'Protectrice', 100, 1, 'garona/68/99038276-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(256, 'Ragnfrid', 100, 1, 'garona/113/99224689-avatar.jpg', 'Ner''zhul', 0, 2, 11, 1, NULL),
(257, 'Lorelaïs', 100, 1, 'garona/190/99256766-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(258, 'Nénuphar', 100, 1, 'garona/198/99263174-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(259, 'Frizzy', 100, 1, 'garona/151/99375255-avatar.jpg', 'Garona', 0, 8, 11, 1, NULL),
(260, 'Ashéron', 100, 0, 'garona/8/99442440-avatar.jpg', 'Garona', 0, 1, 4, 1, NULL),
(261, 'Equinoc', 100, 0, 'garona/198/99486150-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(262, 'Gàdock', 100, 0, 'garona/67/99504451-avatar.jpg', 'Garona', 0, 2, 3, 1, NULL),
(263, 'Kïkï', 100, 1, 'garona/18/99551250-avatar.jpg', 'Garona', 0, 1, 11, 1, NULL),
(264, 'Darthvicious', 100, 0, 'garona/134/99609478-avatar.jpg', 'Ner''zhul', 0, 6, 1, 1, NULL),
(265, 'Kadyll', 100, 0, 'garona/208/99687376-avatar.jpg', 'Sargeras', 0, 1, 1, 1, NULL),
(266, 'Daxou', 100, 0, 'garona/164/99707812-avatar.jpg', 'Garona', 0, 3, 3, 1, NULL),
(267, 'Jolarson', 100, 0, 'garona/15/99708175-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(268, 'Dameos', 100, 0, 'garona/170/99708330-avatar.jpg', 'Garona', 0, 1, 4, 1, NULL),
(269, 'Nawamoon', 100, 1, 'garona/146/99708562-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(270, 'Isyama', 100, 1, 'garona/185/99710649-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(271, 'Syriana', 100, 1, 'garona/215/99710935-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(272, 'Drassien', 100, 0, 'garona/204/99721420-avatar.jpg', 'Garona', 0, 9, 22, 1, NULL),
(273, 'Potak', 100, 0, 'garona/141/99785101-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(274, 'Chëësycrüst', 100, 1, 'garona/59/99807035-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(275, 'Zekee', 100, 0, 'garona/209/99812817-avatar.jpg', 'Garona', 0, 4, 22, 1, NULL),
(276, 'Pixie', 100, 1, 'garona/51/99822899-avatar.jpg', 'Garona', 0, 11, 22, 1, NULL),
(277, 'Kälïndrä', 100, 1, 'garona/126/99853694-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(278, 'Dürkor', 100, 0, 'garona/3/100087043-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(279, 'Nourslaouf', 100, 1, 'garona/50/100186162-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(280, 'Iphigénias', 100, 1, 'garona/223/100218335-avatar.jpg', 'Garona', 0, 3, 11, 1, NULL),
(281, 'Persefal', 100, 0, 'garona/7/100224775-avatar.jpg', 'Garona', 0, 11, 22, 1, NULL),
(282, 'Tiliön', 100, 0, 'garona/250/100260346-avatar.jpg', 'Sargeras', 0, 3, 4, 1, NULL),
(283, 'Farramirht', 100, 0, 'garona/201/100285641-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(284, 'Byx', 100, 1, 'garona/224/100363488-avatar.jpg', 'Garona', 0, 10, 1, 1, NULL),
(285, 'Dhämey', 100, 1, 'garona/15/100442127-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(286, 'Myllénième', 100, 1, 'garona/83/100450643-avatar.jpg', 'Sargeras', 0, 10, 1, 1, NULL),
(287, 'Arrowdiac', 100, 0, 'garona/132/100508036-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(288, 'Yükinø', 100, 1, 'garona/239/100547311-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(289, 'Saggitarius', 100, 0, 'garona/97/100550241-avatar.jpg', 'Sargeras', 0, 9, 22, 1, NULL),
(290, 'Redd', 100, 0, 'garona/205/100577741-avatar.jpg', 'Garona', 0, 4, 22, 1, NULL),
(291, 'Melyria', 100, 1, 'garona/128/100578688-avatar.jpg', 'Garona', 0, 5, 22, 1, NULL),
(292, 'Bonobo', 100, 1, 'garona/151/100625815-avatar.jpg', 'Garona', 0, 10, 4, 1, NULL),
(293, 'Neeli', 100, 1, 'garona/92/100661340-avatar.jpg', 'Garona', 0, 1, 11, 1, NULL),
(294, 'Edmun', 100, 0, 'garona/120/100721784-avatar.jpg', 'Ner''zhul', 0, 11, 22, 1, NULL),
(295, 'Cøuette', 100, 1, 'garona/153/100756889-avatar.jpg', 'Garona', 0, 2, 11, 1, NULL),
(296, 'Thoby', 100, 0, 'garona/105/100765545-avatar.jpg', 'Garona', 0, 6, 22, 1, NULL),
(297, 'Naïntuable', 100, 0, 'garona/231/100769255-avatar.jpg', 'Garona', 0, 2, 11, 1, NULL),
(298, 'Trìs', 100, 1, 'garona/82/100809554-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(299, 'Gadounette', 100, 1, 'garona/115/100829043-avatar.jpg', 'Garona', 0, 5, 11, 1, NULL),
(300, 'Nowek', 100, 1, 'garona/232/100914408-avatar.jpg', 'Sargeras', 0, 4, 1, 1, NULL),
(301, 'Ptibouldpoil', 100, 0, 'garona/214/100969686-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(302, 'Natundra', 100, 1, 'garona/42/100976170-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(303, 'Seiily', 100, 1, 'garona/21/101098773-avatar.jpg', 'Sargeras', 0, 4, 1, 1, NULL),
(304, 'Chamyfou', 100, 0, 'garona/92/101108828-avatar.jpg', 'Sargeras', 0, 7, 25, 1, NULL),
(305, 'Dayia', 100, 1, 'garona/66/101109314-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(306, 'Elenorias', 100, 1, 'garona/106/101133674-avatar.jpg', 'Sargeras', 0, 9, 1, 1, NULL),
(307, 'Ankôu', 100, 0, 'garona/8/101351432-avatar.jpg', 'Garona', 0, 6, 1, 1, NULL),
(308, 'Marlöw', 100, 0, 'garona/143/101380751-avatar.jpg', 'Garona', 0, 1, 11, 1, NULL),
(309, 'Woôd', 100, 0, 'garona/231/101402599-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(310, 'Lania', 100, 1, 'garona/137/101420169-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(311, 'Pesthys', 100, 1, 'garona/128/101501824-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(312, 'Mîou', 100, 1, 'garona/212/101528788-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(313, 'Mîû', 100, 1, 'garona/116/101539700-avatar.jpg', 'Sargeras', 0, 8, 1, 1, NULL),
(314, 'Noriah', 100, 1, 'garona/204/101565388-avatar.jpg', 'Garona', 0, 7, 3, 1, NULL),
(315, 'Copaincochon', 100, 0, 'garona/146/101653394-avatar.jpg', 'Garona', 0, 3, 4, 1, NULL),
(316, 'Myurogue', 100, 1, 'garona/24/101660696-avatar.jpg', 'Sargeras', 0, 4, 3, 1, NULL),
(317, 'Myû', 100, 1, 'garona/72/101688136-avatar.jpg', 'Sargeras', 0, 3, 1, 1, NULL),
(318, 'Miöü', 100, 1, 'garona/52/101781300-avatar.jpg', 'Sargeras', 0, 2, 1, 1, NULL),
(319, 'Myouu', 100, 1, 'garona/46/101840174-avatar.jpg', 'Sargeras', 0, 6, 11, 1, NULL),
(320, 'Zigloo', 100, 0, 'garona/80/102043984-avatar.jpg', 'Sargeras', 0, 6, 1, 1, NULL),
(321, 'Jðke', 100, 0, 'garona/178/102047666-avatar.jpg', 'Garona', 0, 3, 1, 1, NULL),
(322, 'Myumonk', 100, 1, 'garona/62/102097726-avatar.jpg', 'Sargeras', 0, 10, 1, 1, NULL),
(323, 'Shapodpaille', 100, 1, 'garona/227/102107107-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(324, 'Féniks', 100, 1, 'garona/225/102218721-avatar.jpg', 'Sargeras', 0, 4, 1, 1, NULL),
(325, 'Miucham', 100, 0, 'garona/134/102253446-avatar.jpg', 'Sargeras', 0, 7, 11, 1, NULL),
(326, 'Myuwar', 100, 1, 'garona/29/102320925-avatar.jpg', 'Sargeras', 0, 1, 7, 1, NULL),
(327, 'Myupriest', 100, 1, 'garona/26/102329114-avatar.jpg', 'Sargeras', 0, 5, 1, 1, NULL),
(328, 'Myudemo', 100, 1, 'garona/33/102329121-avatar.jpg', 'Sargeras', 0, 9, 7, 1, NULL),
(329, 'Garfunk', 100, 1, 'garona/164/102413220-avatar.jpg', 'Garona', 0, 8, 4, 1, NULL),
(330, 'Escaheris', 100, 0, 'garona/44/102492716-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(331, 'Gothmog', 100, 0, 'garona/138/102506122-avatar.jpg', 'Ner''zhul', 0, 9, 1, 1, NULL),
(332, 'Capiana', 100, 1, 'garona/70/102515782-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(333, 'Myllésime', 100, 1, 'garona/36/102587940-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(334, 'Sâber', 100, 1, 'garona/145/102615441-avatar.jpg', 'Garona', 0, 1, 11, 1, NULL),
(335, 'Peckeur', 100, 0, 'garona/69/102676293-avatar.jpg', 'Garona', 0, 9, 7, 1, NULL),
(336, 'Balcmeg', 100, 0, 'garona/226/102748898-avatar.jpg', 'Garona', 0, 3, 22, 1, NULL),
(337, 'Orgäna', 100, 1, 'garona/124/102948732-avatar.jpg', 'Garona', 0, 5, 4, 1, NULL),
(338, 'Yooda', 100, 0, 'garona/147/102948755-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(339, 'Amidalä', 100, 1, 'garona/0/102993152-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(340, 'Watto', 100, 0, 'garona/127/102993791-avatar.jpg', 'Garona', 0, 1, 1, 1, NULL),
(341, 'Fréya', 100, 1, 'garona/87/103414103-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(342, 'Belami', 100, 0, 'garona/252/103604476-avatar.jpg', 'Garona', 0, 9, 1, 1, NULL),
(343, 'Malonys', 100, 1, 'garona/120/103699320-avatar.jpg', 'Ner''zhul', 0, 11, 4, 1, NULL),
(344, 'Keldrys', 100, 0, 'garona/179/103814579-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(345, 'Subkryss', 100, 0, 'garona/234/103856874-avatar.jpg', 'Garona', 0, 6, 4, 1, NULL),
(346, 'Mîôû', 100, 1, 'garona/238/103861998-avatar.jpg', 'Sargeras', 0, 11, 4, 1, NULL),
(347, 'Akakaros', 100, 0, 'garona/39/103966759-avatar.jpg', 'Garona', 0, 8, 1, 1, NULL),
(348, 'Storran', 100, 0, 'garona/127/104337279-avatar.jpg', 'Garona', 0, 2, 1, 1, NULL),
(349, 'Jeanluc', 100, 0, 'garona/199/104374983-avatar.jpg', 'Garona', 0, 10, 1, 1, NULL),
(350, 'Gârfunk', 100, 1, 'garona/181/104378805-avatar.jpg', 'Garona', 0, 10, 11, 1, NULL),
(351, 'Justyce', 100, 1, 'garona/167/104588455-avatar.jpg', 'Sargeras', 0, 5, 1, 1, NULL),
(352, 'Trìskel', 100, 1, 'garona/26/104911642-avatar.jpg', 'Garona', 0, 5, 1, 1, NULL),
(353, 'Xântra', 100, 1, 'garona/23/104968727-avatar.jpg', 'Garona', 0, 11, 4, 1, NULL),
(354, 'Faïlly', 100, 0, 'garona/74/104989514-avatar.jpg', 'Garona', 0, 5, 3, 1, NULL),
(355, 'Nïcky', 100, 1, 'garona/67/105019459-avatar.jpg', 'Garona', 0, 7, 11, 1, NULL),
(356, 'Liköpi', 100, 0, 'garona/255/90054655-avatar.jpg', 'Sargeras', 0, 7, 11, 1, NULL),
(357, 'Haknarion', 100, 0, 'garona/136/90073736-avatar.jpg', 'Sargeras', 0, 1, 1, 1, NULL),
(358, 'Alys', 100, 1, 'garona/216/61403608-avatar.jpg', 'Garona', 0, 10, 1, 1, NULL),
(359, 'Sloveyn', 100, 1, 'garona/172/105300908-avatar.jpg', 'Garona', 0, 7, 25, 1, NULL),
(360, 'Mÿsti', 100, 1, 'internal-record-3714/139/105779083-avatar.jpg', 'Kirin Tor', 0, 11, 22, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `raids`
--

INSERT INTO `raids` (`idRaid`, `idEvenements`, `date`, `note`, `valeur`, `ajoutePar`, `majPar`) VALUES
(1, NULL, '2016-08-03 21:16:10', 'Hellfire Citadel - flex HM', 0.00, 'Import murloc', ''),
(2, NULL, '2016-08-03 18:50:10', 'Hellfire Citadel - flex HM', 0.00, 'Import murloc', '');

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

--
-- Contenu de la table `raid_personnage`
--

INSERT INTO `raid_personnage` (`idRaid`, `idPersonnage`) VALUES
(1, 59),
(1, 62),
(1, 64),
(1, 81),
(1, 98),
(1, 101),
(1, 105),
(1, 130),
(1, 138),
(1, 165),
(1, 166),
(1, 174),
(1, 220),
(1, 230),
(1, 249),
(1, 262),
(1, 324),
(1, 350),
(1, 352),
(1, 353),
(1, 354),
(1, 360),
(2, 59),
(2, 62),
(2, 64),
(2, 81),
(2, 98),
(2, 101),
(2, 105),
(2, 130),
(2, 138),
(2, 166),
(2, 174),
(2, 220),
(2, 230),
(2, 249),
(2, 262),
(2, 324),
(2, 350),
(2, 352),
(2, 353),
(2, 354),
(2, 360);

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
