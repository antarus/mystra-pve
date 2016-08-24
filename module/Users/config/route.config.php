<?php

return array(
    'router' =>
    array(
        'routes' =>
        array(
            'register-ajax' =>
                array(
                    'type' => 'segment',
                    'options' =>
                    array(
                        'route' => '/register-ajax/[:action]',
                        'constraints' =>
                        array(
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        ),
                        'defaults' =>
                        array(
                            'controller' => 'Users\Controller\Register',
                        ),
                    ),
                ),
            
        ),
    ),
);
