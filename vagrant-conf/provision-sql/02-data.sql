--
-- Base de données: `mystra_pve`
--
use mystra_pve;
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
-- Vider la table avant d'insérer `race`
--

TRUNCATE TABLE `race`;
--
-- Contenu de la table `race`
--
INSERT INTO `race` (`idRace`, `nom`) VALUES
(1, 'Humain'),
(2, 'Orc'),
(3, 'Nain'),
(4, 'Elfe de la nuit'),
(5, 'Mort-vivant'),
(6, 'Tauren'),
(7, 'Gnome'),
(8, 'Troll'),
(9, 'Gobelin'),
(10, 'Elfe de sang'),
(11, 'Draeneï'),
(22, 'Worgen'),
(24, 'Pandaren'),-- neutre
(25, 'Pandaren'),-- alliance
(26, 'Pandaren');-- horde
--
-- Vider la table avant d'insérer `faction`
--

TRUNCATE TABLE `faction`;
--
-- Contenu de la table `faction`
--
INSERT INTO `faction` (`idFaction`, `nom`, `logo`) VALUES
(1, 'Alliance', NULL),
(2, 'Horde', NULL);


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
-- Vider la table avant d'insérer `spec`
--

TRUNCATE TABLE `specialisation`;
--
-- Contenu de la table `spec`
--

INSERT INTO `specialisation` (`idSpecialisation`, `idClasses`, `idRole`,`nom`, `icon`) VALUES
(1, 1, 3, 'Armes','ability_warrior_savageblow'),
(2, 1, 3, 'Fureur','ability_warrior_innerrage'),
(3, 1, 1, 'Protection','ability_warrior_defensivestance'),

(4, 2, 2, 'Sacré','spell_holy_holybolt'),
(5, 2, 1, 'Protection','ability_paladin_shieldofthetemplar'),
(6, 2, 3, 'Vindicte','spell_holy_auraoflight'),

(7, 3, 4, 'Maîtrise des bêtes','ability_hunter_bestialdiscipline'),
(8, 3, 4, 'Précision','ability_hunter_focusedaim'),
(9, 3, 4, 'Survie','ability_hunter_camouflage'),

(10, 4, 3, 'Assassinat','ability_rogue_eviscerate'),
(11, 4, 3, 'Combat','ability_backstab'),
(12, 4, 3, 'Finesse','ability_stealth'),

(13, 5, 2, 'Discipline','spell_holy_powerwordshield'),
(14, 5, 2, 'Sacré','spell_holy_guardianspirit'),
(15, 5, 4, 'Ombre','spell_shadow_shadowwordpain'),

(16, 6, 1, 'Sang','spell_deathknight_bloodpresence'),
(17, 6, 3, 'Givre','spell_deathknight_frostpresence'),
(18, 6, 3, 'Impie','spell_deathknight_unholypresence'),

(19, 7, 4, 'Élémentaire','spell_nature_lightning'),
(20, 7, 3, 'Amélioration','spell_shaman_improvedstormstrike'),
(21, 7, 2, 'Restauration','spell_nature_magicimmunity'),

(22, 8, 4, 'Arcanes','spell_holy_magicalsentry'),
(23, 8, 4, 'Feu','spell_fire_firebolt02'),
(24, 8, 4, 'Givre','spell_frost_frostbolt02'),

(25, 9, 4, 'Affliction','spell_shadow_deathcoil'),
(26, 9, 4, 'Démonologie','spell_shadow_metamorphosis'),
(27, 9, 4, 'Destruction','spell_shadow_rainoffire'),

(28, 10, 1, 'Maître brasseur','spell_monk_brewmaster_spec'),
(29, 10, 2, 'Tisse-brume','spell_monk_mistweaver_spec'),
(30, 10, 3, 'Marche-vent','spell_monk_windwalker_spec'),

(31, 11, 4, 'Équilibre','spell_nature_starfall'),
(32, 11, 3, 'Farouche','ability_druid_catform'),
(33, 11, 1, 'Gardien','ability_racial_bearform'),
(34, 11, 2, 'Restauration','spell_nature_healingtouch');
