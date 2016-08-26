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
        ),
    ),
    'service_manager' => array(
        // navigation
        'factories' => array(
            'FrontendNavigation' => 'Commun\Service\FrontendNavigationFactory'
        ),
    ),
    'navigation' => require 'frontend.navigation.config.php',
);
