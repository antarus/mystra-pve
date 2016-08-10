-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 18 Février 2016 à 20:36
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET FOREIGN_KEY_CHECKS=0;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mystra_pve`
--
USE `raid_tracker`;

--
-- Vider la table avant d'insérer `bosses`
--

TRUNCATE TABLE `bosses`;
--
-- Vider la table avant d'insérer `bosses_has_npc`
--

TRUNCATE TABLE `bosses_has_npc`;
--
-- Vider la table avant d'insérer `classes`
--

TRUNCATE TABLE `classes`;
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

--
-- Vider la table avant d'insérer `evenements`
--

TRUNCATE TABLE `evenements`;
--
-- Vider la table avant d'insérer `evenements_personnage`
--

TRUNCATE TABLE `evenements_personnage`;
--
-- Vider la table avant d'insérer `evenements_roles`
--

TRUNCATE TABLE `evenements_roles`;
--
-- Vider la table avant d'insérer `evenements_template`
--

TRUNCATE TABLE `evenements_template`;
--
-- Vider la table avant d'insérer `evenements_template_roles`
--

TRUNCATE TABLE `evenements_template_roles`;
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

--
-- Vider la table avant d'insérer `guildes`
--

TRUNCATE TABLE `guildes`;
--
-- Vider la table avant d'insérer `items`
--

TRUNCATE TABLE `items`;
--
-- Vider la table avant d'insérer `item_personnage_raid`
--

TRUNCATE TABLE `item_personnage_raid`;
--
-- Vider la table avant d'insérer `mode_difficulte`
--

TRUNCATE TABLE `mode_difficulte`;
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

--
-- Vider la table avant d'insérer `npc`
--

TRUNCATE TABLE `npc`;
--
-- Vider la table avant d'insérer `personnages`
--

TRUNCATE TABLE `personnages`;
--
-- Vider la table avant d'insérer `personnages_has_specialisation`
--

TRUNCATE TABLE `personnages_has_specialisation`;
--
-- Vider la table avant d'insérer `race`
--

TRUNCATE TABLE `race`;
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

--
-- Vider la table avant d'insérer `raids`
--

TRUNCATE TABLE `raids`;
--
-- Vider la table avant d'insérer `raid_personnage`
--

TRUNCATE TABLE `raid_personnage`;
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

--
-- Vider la table avant d'insérer `roster`
--

TRUNCATE TABLE `roster`;
--
-- Vider la table avant d'insérer `roster_has_personnage`
--

TRUNCATE TABLE `roster_has_personnage`;
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

--
-- Vider la table avant d'insérer `users`
--

TRUNCATE TABLE `users`;
--
-- Vider la table avant d'insérer `zone`
--

TRUNCATE TABLE `zone`;
--
-- Vider la table avant d'insérer `zone_has_bosses`
--

TRUNCATE TABLE `zone_has_bosses`;
--
-- Vider la table avant d'insérer `zone_has_mode_diffculte`
--

TRUNCATE TABLE `zone_has_mode_diffculte`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
SET FOREIGN_KEY_CHECKS=1;