<?php

return array(
    'router' =>
    array(
        'routes' => array(
            'front-raid-list' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/frontend/roster/:key/raid/list/[:action]',
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
            'front-roster-stat' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/frontend/roster/:key/stat/[:action]',
                    'constraints' => array(
                        'key' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Frontend\Controller\Roster',
                        'action' => 'stats',
                    ),
                ),
            ),
            'front-personnage-stat' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/frontend/personnage/:key/stat/personnage/:idPers',
                    'constraints' => array(
                        'key' => '[a-zA-Z0-9_-]+',
                        'idPers' => '[0-9]*',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Frontend\Controller\Personnage',
                        'action' => 'stats',
                    ),
                ),
            ),
            'front-personnage-detail' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/frontend/roster/:key/raid/detail/:idRaid/personnage/:idPers',
                    'constraints' => array(
                        'key' => '[a-zA-Z0-9_-]+',
                        'idRaid' => '[0-9]*',
                        'idPers' => '[0-9]*',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Frontend\Controller\Personnage',
                        'action' => 'detail',
                    ),
                ),
            ),
        ),
    )
);
