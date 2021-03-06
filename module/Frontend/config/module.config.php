<?php

return array(
    'controllers' =>
    array(
        'invokables' =>
        array(
            'Frontend\Controller\Raids' => 'Frontend\Controller\RaidsController',
            'Frontend\Controller\Roster' => 'Frontend\Controller\RosterController',
            'Frontend\Controller\Personnage' => 'Frontend\Controller\PersonnageController',
        ),
    ),
    'service_manager' => array(
        // navigation
        'factories' => array(
            'FrontendNavigation' => 'Commun\Service\FrontendNavigationFactory'
        ),
    ),
    'navigation' => require 'frontend.navigation.config.php',
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
