<?php

return array(
    'router' =>
    array(
        'routes' => array(
            'front-raid-list' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/frontend/roster/:key/raid/list/',
                    'constraints' => array(
                        'key' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Frontend\Controller\Raids',
                        'action' => 'list',
                    ),
                ),
            ),
            'front-raid-ajax-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/frontend/roster/:key/raid/ajaxlist/',
                    'constraints' =>
                    array(
                        'key' => '[a-zA-Z0-9_-]+',
                        'idRaid' => '[0-9]*',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Frontend\Controller\Raids',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'front-raid-detail' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/frontend/roster/:key/raid/detail/:idRaid/',
                    'constraints' => array(
                        'page' => '[0-9]*',
                        'key' => '[a-zA-Z0-9_-]+',
                        'idRaid' => '[0-9]*',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Frontend\Controller\Raids',
                        'action' => 'detail',
                    ),
                ),
            ),
        ),
    )
);
