<?php

/**
 * @author Capi
 * @project Raid-TracKer
 * @license MIT
 * @copyright Mystra - Antarus & Capi
 */
return array(
     // Controllers utilisable par le module Application.
    'controllers' => array(
        'invokables' => array(
            'Users\Controller\Register' => 'Users\Controller\RegisterController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'users' => __DIR__ . '/../view',
            'zfc-user' => __DIR__ . '/../view',
        ),
    ),
);
