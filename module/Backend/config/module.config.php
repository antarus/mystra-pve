<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'controllers' =>
    array(
        'invokables' =>
        array(
            'Backend\\Controller\\Bosses' => 'Backend\\Controller\\BossesController',
            'Backend\\Controller\\BossesHasNpc' => 'Backend\\Controller\\BossesHasNpcController',
            'Backend\\Controller\\Classes' => 'Backend\\Controller\\ClassesController',
            'Backend\\Controller\\Evenements' => 'Backend\\Controller\\EvenementsController',
            'Backend\\Controller\\EvenementsPersonnage' => 'Backend\\Controller\\EvenementsPersonnageController',
            'Backend\\Controller\\EvenementsRoles' => 'Backend\\Controller\\EvenementsRolesController',
            'Backend\\Controller\\EvenementsTemplate' => 'Backend\\Controller\\EvenementsTemplateController',
            'Backend\\Controller\\EvenementsTemplateRoles' => 'Backend\\Controller\\EvenementsTemplateRolesController',
            'Backend\\Controller\\Faction' => 'Backend\\Controller\\FactionController',
            'Backend\\Controller\\Guildes' => 'Backend\\Controller\\GuildesController',
            'Backend\\Controller\\ItemPersonnageRaid' => 'Backend\\Controller\\ItemPersonnageRaidController',
            'Backend\\Controller\\Items' => 'Backend\\Controller\\ItemsController',
            'Backend\\Controller\\ModeDifficulte' => 'Backend\\Controller\\ModeDifficulteController',
            'Backend\\Controller\\Npc' => 'Backend\\Controller\\NpcController',
            'Backend\\Controller\\Personnages' => 'Backend\\Controller\\PersonnagesController',
            'Backend\\Controller\\PersonnagesHasSpecialisation' => 'Backend\\Controller\\PersonnagesHasSpecialisationController',
            'Backend\\Controller\\Race' => 'Backend\\Controller\\RaceController',
            'Backend\\Controller\\RaidPersonnage' => 'Backend\\Controller\\RaidPersonnageController',
            'Backend\\Controller\\Raids' => 'Backend\\Controller\\RaidsController',
            'Backend\\Controller\\Role' => 'Backend\\Controller\\RoleController',
            'Backend\\Controller\\Roster' => 'Backend\\Controller\\RosterController',
            'Backend\\Controller\\RosterHasPersonnage' => 'Backend\\Controller\\RosterHasPersonnageController',
            'Backend\\Controller\\Specialisation' => 'Backend\\Controller\\SpecialisationController',
            'Backend\\Controller\\Users' => 'Backend\\Controller\\UsersController',
            'Backend\\Controller\\Zone' => 'Backend\\Controller\\ZoneController',
            'Backend\\Controller\\ZoneHasBosses' => 'Backend\\Controller\\ZoneHasBossesController',
            'Backend\\Controller\\ZoneHasModeDiffculte' => 'Backend\\Controller\\ZoneHasModeDiffculteController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'backend' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'backend/layout' => __DIR__ . '/../view/layout/backend.phtml',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'service_manager' => array(
        // navigation
        'factories' => array(
            'DefaultNavigation' => 'Zend\Navigation\Service\DefaultNavigationFactory'
        ),
    ),
    'navigation' => require 'navigation.config.php',
);
