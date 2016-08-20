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
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /Accueil/:controller/:action
            'Accueil' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/accueil',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Accueil\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'contact' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/contact',
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
