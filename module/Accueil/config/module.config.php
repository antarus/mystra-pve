<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAccueil for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Accueil;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Accueil\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'contact' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/contact[/:action]',
                    'defaults' => array(
                        'controller' => 'Accueil\Controller\Contact',
                        'action' => 'index',
                    ),
                ),
            ),
            'apropos' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/about',
                    'defaults' => array(
                        'controller' => 'Accueil\Controller\Apropos',
                        'action' => 'index',
                    ),
                ),
            ),
            'discordbot' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/discordbot',
                    'defaults' => array(
                        'controller' => 'Accueil\Controller\Discordbot',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Accueil\Controller\Index' => 'Accueil\Controller\IndexController',
            'Accueil\Controller\Contact' => 'Accueil\Controller\ContactController',
            'Accueil\Controller\Apropos' => 'Accueil\Controller\AproposController',
            'Accueil\Controller\Discordbot' => 'Accueil\Controller\DiscordbotController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
