<?php

return array(
    'console' => array(
        'router' => array(
            'routes' =>
            array(
                'cache-list' => array(
                    'options' => array(
                        'route' => 'cache --list',
                        'defaults' => array(
                            'controller' => 'Backend\\Controller\\Cache',
                            'action' => 'list'
                        ),
                    ),
                ),
                'cache-status' => array(
                    'options' => array(
                        'route' => 'cache --status [<name>] [-h]',
                        'defaults' => array(
                            'controller' => 'Backend\\Controller\\Cache',
                            'action' => 'status'
                        ),
                    ),
                ),
                'cache-status-list' => array(
                    'options' => array(
                        'route' => 'cache --status --list [-h]',
                        'defaults' => array(
                            'controller' => 'Backend\\Controller\\Cache',
                            'action' => 'status-list'
                        ),
                    ),
                ),
                'cache-clear' => array(
                    'options' => array(
                        'route' => 'cache (--clear|--flush):mode [--force|-f] [<name>] [--expired|-e] [--by-namespace=] [--by-prefix=]',
                        'defaults' => array(
                            'controller' => 'Backend\\Controller\\Cache',
                            'action' => 'clear'
                        ),
                    ),
                ),
                'cache-optimize' => array(
                    'options' => array(
                        'route' => 'cache --optimize [<name>]',
                        'defaults' => array(
                            'controller' => 'Backend\\Controller\\Cache',
                            'action' => 'optimize'
                        ),
                    ),
                ),
                'opcode-cache-clear' => array(
                    'options' => array(
                        'route' => 'cache --clear-opcode',
                        'defaults' => array(
                            'controller' => 'Backend\\Controller\\OpcodeCache',
                            'action' => 'clear',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
