<?php
/**
 * @author Antarus
 * @project Mystra
 * @license MIT
 * @copyright Mystra - Antarus & Capi
 */


return array (
  'controllers' => 
  array (
    'invokables' => 
    array (
      'Commun\\Controller\\Bosses' => 'Commun\\Controller\\BossesController',
      'Commun\\Controller\\BossesHasNpc' => 'Commun\\Controller\\BossesHasNpcController',
      'Commun\\Controller\\Classes' => 'Commun\\Controller\\ClassesController',
      'Commun\\Controller\\Evenements' => 'Commun\\Controller\\EvenementsController',
      'Commun\\Controller\\EvenementsPersonnage' => 'Commun\\Controller\\EvenementsPersonnageController',
      'Commun\\Controller\\EvenementsRoles' => 'Commun\\Controller\\EvenementsRolesController',
      'Commun\\Controller\\EvenementsTemplate' => 'Commun\\Controller\\EvenementsTemplateController',
      'Commun\\Controller\\EvenementsTemplateRoles' => 'Commun\\Controller\\EvenementsTemplateRolesController',
      'Commun\\Controller\\Faction' => 'Commun\\Controller\\FactionController',
      'Commun\\Controller\\Guildes' => 'Commun\\Controller\\GuildesController',
      'Commun\\Controller\\ItemPersonnageRaid' => 'Commun\\Controller\\ItemPersonnageRaidController',
      'Commun\\Controller\\Items' => 'Commun\\Controller\\ItemsController',
      'Commun\\Controller\\ModeDifficulte' => 'Commun\\Controller\\ModeDifficulteController',
      'Commun\\Controller\\Npc' => 'Commun\\Controller\\NpcController',
      'Commun\\Controller\\Personnages' => 'Commun\\Controller\\PersonnagesController',
      'Commun\\Controller\\PersonnagesHasSpecialisation' => 'Commun\\Controller\\PersonnagesHasSpecialisationController',
      'Commun\\Controller\\Race' => 'Commun\\Controller\\RaceController',
      'Commun\\Controller\\RaidPersonnage' => 'Commun\\Controller\\RaidPersonnageController',
      'Commun\\Controller\\Raids' => 'Commun\\Controller\\RaidsController',
      'Commun\\Controller\\Role' => 'Commun\\Controller\\RoleController',
      'Commun\\Controller\\Roster' => 'Commun\\Controller\\RosterController',
      'Commun\\Controller\\RosterHasPersonnage' => 'Commun\\Controller\\RosterHasPersonnageController',
      'Commun\\Controller\\Specialisation' => 'Commun\\Controller\\SpecialisationController',
      'Commun\\Controller\\Users' => 'Commun\\Controller\\UsersController',
      'Commun\\Controller\\Zone' => 'Commun\\Controller\\ZoneController',
      'Commun\\Controller\\ZoneHasBosses' => 'Commun\\Controller\\ZoneHasBossesController',
      'Commun\\Controller\\ZoneHasModeDiffculte' => 'Commun\\Controller\\ZoneHasModeDiffculteController',
    ),
  ),
  'router' => 
  array (
    'routes' => 
    array (
      'commun-bosses-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Bosses',
            'action' => 'list',
          ),
        ),
      ),
      'commun-bosses-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Bosses',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-bosses-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Bosses',
            'action' => 'create',
          ),
        ),
      ),
      'commun-bosses-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Bosses',
            'action' => 'update',
          ),
        ),
      ),
      'commun-bosses-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Bosses',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-bosses_has_npc-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses_has_npc/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\BossesHasNpc',
            'action' => 'list',
          ),
        ),
      ),
      'commun-bosses_has_npc-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses_has_npc/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\BossesHasNpc',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-bosses_has_npc-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses_has_npc/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\BossesHasNpc',
            'action' => 'create',
          ),
        ),
      ),
      'commun-bosses_has_npc-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses_has_npc/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\BossesHasNpc',
            'action' => 'update',
          ),
        ),
      ),
      'commun-bosses_has_npc-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/bosses_has_npc/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\BossesHasNpc',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-classes-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/classes/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Classes',
            'action' => 'list',
          ),
        ),
      ),
      'commun-classes-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/classes/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Classes',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-classes-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/classes/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Classes',
            'action' => 'create',
          ),
        ),
      ),
      'commun-classes-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/classes/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Classes',
            'action' => 'update',
          ),
        ),
      ),
      'commun-classes-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/classes/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Classes',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-evenements-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Evenements',
            'action' => 'list',
          ),
        ),
      ),
      'commun-evenements-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Evenements',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-evenements-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Evenements',
            'action' => 'create',
          ),
        ),
      ),
      'commun-evenements-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Evenements',
            'action' => 'update',
          ),
        ),
      ),
      'commun-evenements-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Evenements',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-evenements_personnage-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_personnage/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsPersonnage',
            'action' => 'list',
          ),
        ),
      ),
      'commun-evenements_personnage-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_personnage/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsPersonnage',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-evenements_personnage-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_personnage/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsPersonnage',
            'action' => 'create',
          ),
        ),
      ),
      'commun-evenements_personnage-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_personnage/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsPersonnage',
            'action' => 'update',
          ),
        ),
      ),
      'commun-evenements_personnage-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_personnage/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsPersonnage',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-evenements_roles-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_roles/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsRoles',
            'action' => 'list',
          ),
        ),
      ),
      'commun-evenements_roles-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_roles/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsRoles',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-evenements_roles-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_roles/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsRoles',
            'action' => 'create',
          ),
        ),
      ),
      'commun-evenements_roles-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_roles/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsRoles',
            'action' => 'update',
          ),
        ),
      ),
      'commun-evenements_roles-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_roles/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsRoles',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-evenements_template-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplate',
            'action' => 'list',
          ),
        ),
      ),
      'commun-evenements_template-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplate',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-evenements_template-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplate',
            'action' => 'create',
          ),
        ),
      ),
      'commun-evenements_template-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplate',
            'action' => 'update',
          ),
        ),
      ),
      'commun-evenements_template-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplate',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-evenements_template_roles-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template_roles/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplateRoles',
            'action' => 'list',
          ),
        ),
      ),
      'commun-evenements_template_roles-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template_roles/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplateRoles',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-evenements_template_roles-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template_roles/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplateRoles',
            'action' => 'create',
          ),
        ),
      ),
      'commun-evenements_template_roles-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template_roles/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplateRoles',
            'action' => 'update',
          ),
        ),
      ),
      'commun-evenements_template_roles-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/evenements_template_roles/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\EvenementsTemplateRoles',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-faction-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/faction/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Faction',
            'action' => 'list',
          ),
        ),
      ),
      'commun-faction-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/faction/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Faction',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-faction-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/faction/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Faction',
            'action' => 'create',
          ),
        ),
      ),
      'commun-faction-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/faction/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Faction',
            'action' => 'update',
          ),
        ),
      ),
      'commun-faction-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/faction/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Faction',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-guildes-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/guildes/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Guildes',
            'action' => 'list',
          ),
        ),
      ),
      'commun-guildes-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/guildes/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Guildes',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-guildes-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/guildes/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Guildes',
            'action' => 'create',
          ),
        ),
      ),
      'commun-guildes-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/guildes/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Guildes',
            'action' => 'update',
          ),
        ),
      ),
      'commun-guildes-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/guildes/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Guildes',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-item_personnage_raid-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/item_personnage_raid/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ItemPersonnageRaid',
            'action' => 'list',
          ),
        ),
      ),
      'commun-item_personnage_raid-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/item_personnage_raid/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ItemPersonnageRaid',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-item_personnage_raid-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/item_personnage_raid/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ItemPersonnageRaid',
            'action' => 'create',
          ),
        ),
      ),
      'commun-item_personnage_raid-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/item_personnage_raid/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ItemPersonnageRaid',
            'action' => 'update',
          ),
        ),
      ),
      'commun-item_personnage_raid-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/item_personnage_raid/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ItemPersonnageRaid',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-items-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/items/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Items',
            'action' => 'list',
          ),
        ),
      ),
      'commun-items-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/items/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Items',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-items-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/items/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Items',
            'action' => 'create',
          ),
        ),
      ),
      'commun-items-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/items/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Items',
            'action' => 'update',
          ),
        ),
      ),
      'commun-items-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/items/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Items',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-mode_difficulte-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/mode_difficulte/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ModeDifficulte',
            'action' => 'list',
          ),
        ),
      ),
      'commun-mode_difficulte-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/mode_difficulte/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ModeDifficulte',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-mode_difficulte-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/mode_difficulte/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ModeDifficulte',
            'action' => 'create',
          ),
        ),
      ),
      'commun-mode_difficulte-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/mode_difficulte/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ModeDifficulte',
            'action' => 'update',
          ),
        ),
      ),
      'commun-mode_difficulte-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/mode_difficulte/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ModeDifficulte',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-npc-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/npc/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Npc',
            'action' => 'list',
          ),
        ),
      ),
      'commun-npc-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/npc/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Npc',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-npc-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/npc/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Npc',
            'action' => 'create',
          ),
        ),
      ),
      'commun-npc-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/npc/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Npc',
            'action' => 'update',
          ),
        ),
      ),
      'commun-npc-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/npc/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Npc',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-personnages-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Personnages',
            'action' => 'list',
          ),
        ),
      ),
      'commun-personnages-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Personnages',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-personnages-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Personnages',
            'action' => 'create',
          ),
        ),
      ),
      'commun-personnages-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Personnages',
            'action' => 'update',
          ),
        ),
      ),
      'commun-personnages-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Personnages',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-personnages_has_specialisation-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages_has_specialisation/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\PersonnagesHasSpecialisation',
            'action' => 'list',
          ),
        ),
      ),
      'commun-personnages_has_specialisation-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages_has_specialisation/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\PersonnagesHasSpecialisation',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-personnages_has_specialisation-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages_has_specialisation/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\PersonnagesHasSpecialisation',
            'action' => 'create',
          ),
        ),
      ),
      'commun-personnages_has_specialisation-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages_has_specialisation/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\PersonnagesHasSpecialisation',
            'action' => 'update',
          ),
        ),
      ),
      'commun-personnages_has_specialisation-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/personnages_has_specialisation/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\PersonnagesHasSpecialisation',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-race-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/race/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Race',
            'action' => 'list',
          ),
        ),
      ),
      'commun-race-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/race/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Race',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-race-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/race/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Race',
            'action' => 'create',
          ),
        ),
      ),
      'commun-race-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/race/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Race',
            'action' => 'update',
          ),
        ),
      ),
      'commun-race-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/race/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Race',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-raid_personnage-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raid_personnage/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RaidPersonnage',
            'action' => 'list',
          ),
        ),
      ),
      'commun-raid_personnage-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raid_personnage/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RaidPersonnage',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-raid_personnage-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raid_personnage/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RaidPersonnage',
            'action' => 'create',
          ),
        ),
      ),
      'commun-raid_personnage-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raid_personnage/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RaidPersonnage',
            'action' => 'update',
          ),
        ),
      ),
      'commun-raid_personnage-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raid_personnage/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RaidPersonnage',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-raids-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raids/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Raids',
            'action' => 'list',
          ),
        ),
      ),
      'commun-raids-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raids/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Raids',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-raids-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raids/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Raids',
            'action' => 'create',
          ),
        ),
      ),
      'commun-raids-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raids/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Raids',
            'action' => 'update',
          ),
        ),
      ),
      'commun-raids-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/raids/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Raids',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-role-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/role/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Role',
            'action' => 'list',
          ),
        ),
      ),
      'commun-role-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/role/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Role',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-role-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/role/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Role',
            'action' => 'create',
          ),
        ),
      ),
      'commun-role-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/role/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Role',
            'action' => 'update',
          ),
        ),
      ),
      'commun-role-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/role/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Role',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-roster-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Roster',
            'action' => 'list',
          ),
        ),
      ),
      'commun-roster-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Roster',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-roster-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Roster',
            'action' => 'create',
          ),
        ),
      ),
      'commun-roster-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Roster',
            'action' => 'update',
          ),
        ),
      ),
      'commun-roster-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Roster',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-roster_has_personnage-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster_has_personnage/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RosterHasPersonnage',
            'action' => 'list',
          ),
        ),
      ),
      'commun-roster_has_personnage-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster_has_personnage/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RosterHasPersonnage',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-roster_has_personnage-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster_has_personnage/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RosterHasPersonnage',
            'action' => 'create',
          ),
        ),
      ),
      'commun-roster_has_personnage-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster_has_personnage/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RosterHasPersonnage',
            'action' => 'update',
          ),
        ),
      ),
      'commun-roster_has_personnage-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/roster_has_personnage/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\RosterHasPersonnage',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-specialisation-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/specialisation/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Specialisation',
            'action' => 'list',
          ),
        ),
      ),
      'commun-specialisation-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/specialisation/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Specialisation',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-specialisation-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/specialisation/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Specialisation',
            'action' => 'create',
          ),
        ),
      ),
      'commun-specialisation-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/specialisation/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Specialisation',
            'action' => 'update',
          ),
        ),
      ),
      'commun-specialisation-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/specialisation/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Specialisation',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-users-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/users/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Users',
            'action' => 'list',
          ),
        ),
      ),
      'commun-users-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/users/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Users',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-users-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/users/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Users',
            'action' => 'create',
          ),
        ),
      ),
      'commun-users-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/users/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Users',
            'action' => 'update',
          ),
        ),
      ),
      'commun-users-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/users/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Users',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-zone-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Zone',
            'action' => 'list',
          ),
        ),
      ),
      'commun-zone-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Zone',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-zone-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Zone',
            'action' => 'create',
          ),
        ),
      ),
      'commun-zone-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Zone',
            'action' => 'update',
          ),
        ),
      ),
      'commun-zone-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\Zone',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-zone_has_bosses-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_bosses/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasBosses',
            'action' => 'list',
          ),
        ),
      ),
      'commun-zone_has_bosses-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_bosses/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasBosses',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-zone_has_bosses-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_bosses/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasBosses',
            'action' => 'create',
          ),
        ),
      ),
      'commun-zone_has_bosses-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_bosses/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasBosses',
            'action' => 'update',
          ),
        ),
      ),
      'commun-zone_has_bosses-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_bosses/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasBosses',
            'action' => 'delete',
          ),
        ),
      ),
      'commun-zone_has_mode_diffculte-list' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_mode_diffculte/list',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasModeDiffculte',
            'action' => 'list',
          ),
        ),
      ),
      'commun-zone_has_mode_diffculte-ajaxList' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_mode_diffculte/ajaxList',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasModeDiffculte',
            'action' => 'ajaxList',
          ),
        ),
      ),
      'commun-zone_has_mode_diffculte-create' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_mode_diffculte/create',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasModeDiffculte',
            'action' => 'create',
          ),
        ),
      ),
      'commun-zone_has_mode_diffculte-update' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_mode_diffculte/update/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasModeDiffculte',
            'action' => 'update',
          ),
        ),
      ),
      'commun-zone_has_mode_diffculte-delete' => 
      array (
        'type' => 'segment',
        'options' => 
        array (
          'route' => '/commun/zone_has_mode_diffculte/delete/[:id]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Commun\\Controller\\ZoneHasModeDiffculte',
            'action' => 'delete',
          ),
        ),
      ),
    ),
  ),
  'view_manager' => 
  array (
    'template_path_stack' => 
    array (
      0 => __DIR__ . '/../view',
    ),
  ),
);