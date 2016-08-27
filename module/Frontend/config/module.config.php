<?php

return array(
    'controllers' =>
    array(
        'invokables' =>
        array(
            'Frontend\Controller\Raids' => 'Frontend\Controller\RaidsController',
        ),
    ),
    'service_manager' => array(
        // navigation
        'factories' => array(
            'FrontendNavigation' => 'Commun\Service\FrontendNavigationFactory'
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'PaginationHelper' => 'Frontend\View\Helper\PaginationHelper')
    ),
    'navigation' => require 'frontend.navigation.config.php',
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
