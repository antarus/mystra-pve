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
            'register-sendmailconfirm' =>
                array(
                    'type' => 'segment',
                    'options' =>
                    array(
                        'route' => '/register/confirm-mail/[:mail]',
                        'defaults' =>
                        array(
                            'controller' => 'Users\Controller\Register',
                            'action' => 'sendconfirmmail',
                        ),
                    ),
                ),
            'register-sendmail' =>
                array(
                    'type' => 'segment',
                    'options' =>
                    array(
                        'route' => '/register/send-mail/[:mail]',
                        'defaults' =>
                        array(
                            'controller' => 'Users\Controller\Register',
                            'action' => 'sendregistermail',
                        ),
                    ),
                ),
            'validate-mail' =>
                array(
                    'type' => 'segment',
                    'options' =>
                    array(
                        'route' => '/register/validate-mail/[:key]',
                        'defaults' =>
                        array(
                            'controller' => 'Users\Controller\Register',
                            'action' => 'validatemail',
                        ),
                    ),
                ),
            'forgetpass' =>
                array(
                    'type' => 'segment',
                    'options' =>
                    array(
                        'route' => '/users/forgetpass/[:action][/:key]',
                        'constraints' =>
                        array(
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                            'key' => '[a-zA-Z0-9_-]+',
                        ),
                        'defaults' =>
                        array(
                            'controller' => 'Users\Controller\Forgetpass',
                            'action' => 'index',
                        ),
                    ),
                ),
        ),
    ),
);
