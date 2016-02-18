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
//    'view_manager' => array(
//        'display_not_found_reason' => true,
//        'display_exceptions' => true,
//        'doctype' => 'HTML5',
//        'not_found_template' => 'error/404',
//        'exception_template' => 'error/index',
//        'template_map' => array(
//            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
//            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
//            'error/404' => __DIR__ . '/../view/error/404.phtml',
//            'error/index' => __DIR__ . '/../view/error/index.phtml',
//        ),
//        'template_path_stack' => array(
//            __DIR__ . '/../view',
//        ),
//    ),
//      // View manager : template map, pour optimiser les temps de chargements.
//    'view_manager' => array(
//        'display_exceptions' => true,
//        'template_map' => array(
//            'backend/layout' => __DIR__ . '/../view/layout/layout_1.phtml',
//        ),
//        'template_path_stack' => array(
//            __DIR__ . '/../view',
//        ),
//        'strategies' => array(
//            'ViewJsonStrategy',
//        ),
//    ),
    'view_manager' =>
    array(
        'template_path_stack' =>
        array(
            0 => __DIR__ . '/../view',
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
