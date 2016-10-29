-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 27 Octobre 2016 à 17:13
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

--
-- Vider la table avant d'insérer `bosses`
--

TRUNCATE TABLE `bosses`;
--
-- Contenu de la table `bosses`
--

INSERT INTO `bosses` (`idBosses`, `nom`, `level`, `vie`, `idBosseBnet`, `locale`) VALUES
(-1, 'trash mob', 0, 0, NULL, '');

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

--
-- Vider la table avant d'insérer `content`
--

TRUNCATE TABLE `content`;
--
-- Contenu de la table `content`
--

INSERT INTO `content` (`idContent`, `type`, `idPages`, `titleArticle`, `content`, `writeBy`, `updateBy`, `lastUpdate`) VALUES
(1, 'page', 2, '', '<p>Vous jouez &agrave; World of Warcraft, vous &ecirc;tes une guilde avec au moins un roster raid actif. Vous souhaiteriez savoir qui loot quoi et quand , le taux de pr&eacute;sence de vos membres, les boss que vous avez tomb&eacute;s, etc...&nbsp;</p>\r\n\r\n<p><strong><span style="color:#9acd32">Raid</span> <span style="color:#191919">TracKer</span></strong> est un outils fait pour vous !</p>\r\n\r\n<p>Pour faire simple, <strong><span style="color:#9acd32">R</span><span style="color:#191919">TK</span></strong> offre de nombreuses facilit&eacute;s de gestion de donn&eacute;es de raid d&#39;un ou plusieurs rosters d&#39;une guilde.<br />\r\n<br />\r\nGr&acirc;ce &agrave; la cr&eacute;ation d&#39;un compte, vous acc&eacute;dez &agrave; la gestion d&#39;un ou plusieurs rosters selon vos besoins.<br />\r\n<br />\r\nVous pouvez visualiser les membres composants votre roster, leur r&ocirc;le (tank , heal dps cac ou distant), les membres en apply ...<br />\r\n<br />\r\nLe grand + de <strong><span style="color:#9acd32">R</span><span style="color:#191919">TK</span></strong> , il offre la possibilit&eacute; d&#39;importer vos donn&eacute;es de raid :</p>\r\n\r\n<p>- &nbsp;Logs de vos sorties ( source: <a href="https://www.warcraftlogs.com/">warcraftLogs</a>)&nbsp;<br />\r\n- Taux de pr&eacute;sence des membres<br />\r\n- Attributions de loot<br />\r\n- Boss tomb&eacute;s et progress</p>\r\n', 2, 3, '2016-09-20 12:16:43'),
(2, 'page', 4, '', '<p><em><strong>Nous sommes une &eacute;quipe constitu&eacute;e de profils divers (cr&eacute;atif, technique) mais avec la m&ecirc;me passion pour les jeux vid&eacute;os. </strong></em></p>\r\n\r\n<p>Chacun d&#39;entres nous &agrave; une exp&eacute;rience bien diff&eacute;rente dans le monde du web et du&nbsp;Gaming,&nbsp;ce qui fait la force de notre &eacute;quipe.&nbsp;<strong><span style="color:#9acd32">R</span><span style="color:#191919">TK</span></strong>&nbsp;est n&eacute; d&#39;un besoin pour notre guilde&nbsp;World&nbsp;Of&nbsp;Warcraft,&nbsp;le&nbsp;besoin d&#39;avoir un&nbsp;outil de suivi&nbsp;de raid performant, qui puissent nous donner des statistiques&nbsp;sur le court et long&nbsp;therme.&nbsp;</p>\r\n\r\n<p>Et&nbsp;<strong>Captain&nbsp;Chaton</strong>?&nbsp;il est n&eacute; d&#39;un besoin de consulter ces statistiques directement sur notre vocal de guilde (Discord). Pourquoi&nbsp;Captain&nbsp;chaton?&nbsp;Nous n&#39;avions pas envie d&#39;avoir un simple bot, sans personnalit&eacute;, alors avec l&#39;aide de notre entourage nous avons donn&eacute; vie &agrave;&nbsp;Captain&nbsp;Chaton, un chaton qui ne manque pas de personnalit&eacute;.&nbsp;</p>\r\n', 1, 3, '2016-09-20 12:17:03'),
(5, 'page', 3, '', '<p><strong>Le petit plus de <span style="color:#9acd32">R</span><span style="color:#191919">TK</span>...</strong></p>\r\n\r\n<p>Une guilde active en PVE se doit d&#39;avoir un vocal. L&#39;&eacute;quipe de<strong> <span style="color:#9acd32">R</span><span style="color:#191919">TK</span> </strong>a rapidement opt&eacute; pour le vocal Discord. Outre ces chans vocaux et &eacute;crits ( ce qui est un petit + bien sympa), c&#39;est bien la possibilit&eacute; d&#39;importer des BOT (musique etc...) qui nous &agrave; s&eacute;duits.</p>\r\n\r\n<p>Nous aimons utiliser <strong><span style="color:#9acd32">R</span><span style="color:#191919">TK</span></strong> et nous aimons &eacute;galement utiliser Discord, alors nous avons d&eacute;velopp&eacute; le BOT Cap&#39;tain Chaton. Ce petit BOT sait marier l&#39;utile au fun.</p>\r\n\r\n<p>Mais alors, qu&#39;est ce que le BOT Capt&#39;ain Chaton, et bien, c&#39;est simplement un distributeur d&#39;informations ! Plus besoin de chercher partout, il vous permet d&#39;acc&eacute;der directement sur Discord &agrave; informations ! Plus besoin de chercher partout, il vous permet &nbsp;d&#39;acc&eacute;der &nbsp;directement sur Discord &agrave; vos donn&eacute;es stock&eacute;es sur <strong><span style="color:#9acd32">R</span><span style="color:#191919">TK</span></strong>, il vous link vos derniers logs, le progress de votre guilde, la composition de votre roster, et bien d&#39;autres choses plus ou moins fun. il suffit de lui demander !</p>\r\n', 1, 3, '2016-09-20 13:37:24'),
(6, 'page', 1, '', '<p>Vous jouez &agrave; World of Warcraft, vous &ecirc;tes une guilde avec au moins un roster raid actif. Vous souhaiteriez savoir qui loot quoi et quand , le taux de pr&eacute;sence de vos membres, les boss que vous avez tomb&eacute;s, etc...&nbsp;</p>\r\n\r\n<p><strong><span style="color:#9acd32">Raid</span> <span style="color:#191919">TracKer</span></strong><span style="color:#191919">&nbsp;</span>est un outils fait pour vous !</p>\r\n\r\n<p>- Importer vos donn&eacute;es de raid<br />\r\n- &nbsp;Logs de vos sorties ( source:&nbsp;<a href="https://www.warcraftlogs.com/">warcraftLogs</a>)&nbsp;<br />\r\n- Taux de pr&eacute;sence des membres<br />\r\n- Attributions de loot<br />\r\n- Boss tomb&eacute;s et progress<br />\r\n- Un bot Discord de consultation des donn&eacute;es.<br />\r\n<br />\r\nLe tout consultable par vos guildeux &agrave; partir d&#39;un simple liens personnel ! Chez nous la cr&eacute;ation de compte n&#39;est pas obligatoire pour vos joueurs !&nbsp;</p>\r\n', 1, 3, '2016-09-20 12:12:09'),
(7, 'article', 1, 'Raid TracKer en béta !', '<p><span style="font-size:18px"><img alt="Achievement-alpha" src="https://s3.amazonaws.com/achgenwow/t/n_YadKM7xN.png" style="float:right; height:90px; width:320px" />Bonjour &agrave; tous,&nbsp;</span></p>\r\n\r\n<p><span style="font-size:18px">Et voila <strong><span style="color:#9acd32">R</span><span style="color:#191919">TK</span> </strong>est en b&eacute;ta ferm&eacute;e&nbsp;! Pour le moment seulement utilisable par la guilde Mystra sur Garona, si les tests sont concluant, <strong><span style="color:#9acd32">R</span><span style="color:#191919">TK</span> </strong>sera bient&ocirc;t accessible &agrave; tous !<br />\r\n<br />\r\nN&#39;h&eacute;siter pas &agrave; nous contacter pour plus d&#39;informations !<br />\r\n<br />\r\nDes bisous les World Of &nbsp;Warcrafistes !</span></p>\r\n\r\n<p><span style="font-size:18px">Capi</span></p>\r\n', 1, 1, '2016-09-20 14:48:19');

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

TRUNCATE TABLE `locale`;

INSERT INTO `locale` (`idLocale`, `region`, `locale`) VALUES
(1, 'EUROPE', 'en_GB'),
(2, 'EUROPE', 'es_ES'),
(3, 'EUROPE', 'fr_FR'),
(4, 'EUROPE', 'ru_RU'),
(5, 'EUROPE', 'pt_PT'),
(6, 'EUROPE', 'de_DE'),
(7, 'EUROPE', 'it_IT');

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

--
-- Vider la table avant d'insérer `npc`
--

TRUNCATE TABLE `npc`;
--
-- Vider la table avant d'insérer `pages`
--

TRUNCATE TABLE `pages`;
--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`idPages`, `name`) VALUES
(1, 'home'),
(2, 'apropos'),
(3, 'discordbot'),
(4, 'team');

--
-- Vider la table avant d'insérer `pallierAfficher`
--

TRUNCATE TABLE `pallierAfficher`;
--
-- Vider la table avant d'insérer `personnages`
--

TRUNCATE TABLE `personnages`;
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
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `display_name`, `password`, `state`, `lastConnection`, `lastUpdate`, `keyValidMail`, `forgetpass`) VALUES
(1, 'capi', 'capi@raid-tracker.com', 'capi', '$2y$14$0tqFA6/YrHNyOOW9npmPde0ErTKZ2zSxuJNvk.zh1d0Lpg0xFjWUm', 1, '0000-00-00 00:00:00', '2016-10-27 15:46:09', NULL, NULL),
(2, 'antarus', 'antarus74@gmail.com', 'antarus', '$2y$14$LGzQvjtuiGVzwNd.hkchH.FUN4/aqz00GsR3UgVsXJOUDfNhjJfby', 1, '0000-00-00 00:00:00', '2016-10-27 15:46:09', NULL, NULL),
(3, 'kadyll', 'Kadyll@raid-tracker.com', 'Kadyll', '$2y$14$lNwq73CC6IwKswrOYGVHu.MaKd9MDbI.Rllj4b.sKZP16fdcGKLPK', 1, '0000-00-00 00:00:00', '2016-10-27 15:46:09', NULL, NULL);

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

TRUNCATE TABLE `zone_has_mode_diffculte`;SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
