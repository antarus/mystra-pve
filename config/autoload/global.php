<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\\Db\\Adapter\\Adapter' => 'Zend\\Db\\Adapter\\AdapterServiceFactory',
            'Zend\Cache\Storage\Filesystem' => function($sm) {
                $cache = Zend\Cache\StorageFactory::factory(array(
                            'adapter' => 'filesystem',
                            'plugins' => array(
                                'exception_handler' => array('throw_exceptions' => false),
                                'serializer'
                            )
                ));

                $cache->setOptions(array(
                    'cache_dir' => __DIR__ . '/../../data/cache',
                    'ttl' => 180
                ));

                return $cache;
        }),
            'abstract_factories' => array(
                0 => 'Zend\\Log\\LoggerAbstractServiceFactory',
            ),
        ),
        'aliases' => array(
            'cache' => 'Zend\Cache\Storage\Filesystem',
        ),
        'db' => array(
            'driver' => 'pdo',
            'dsn' => 'mysql:dbname=raid_tracker;host=localhost',
            'database' => 'raid_tracker',
            'username' => 'raid_tracker',
            'password' => 'R@id-Tr@ck3r!321',
            'hostname' => 'localhost',
            'driver_options' => array(
                1002 => 'SET NAMES \'UTF8\'',
            ),
        ),
        'urlProjet' => 'dev.Raid-TracKer.com',
        'zf-mvc-auth' => array(
            'authentication' => array(
                'adapters' => array(
                    'blizzard' => array(
                        'adapter' => 'ZF\\MvcAuth\\Authentication\\HttpAdapter',
                        'options' => array(
                            'accept_schemes' => array(
                                0 => 'basic',
                            ),
                            'realm' => 'api',
                            'htpasswd' => 'data/htpasswd',
                        ),
                    ),
                    'rtk' => array(
                        'adapter' => 'ZF\\MvcAuth\\Authentication\\HttpAdapter',
                        'options' => array(
                            'accept_schemes' => array(
                                0 => 'basic',
                            ),
                            'realm' => 'api',
                            'htpasswd' => 'data/htpasswd',
                        ),
                    ),
                ),
                'map' => array(
                    'APIrTk\\V1' => 'rtk',
                    'APIBlizzard\\V1' => 'blizzard',
                    'APIRtK\\V1' => 'rtk',
                ),
            ),
        ),
         // Infos sur les logs. \Log pour les log utilisateur, et \Log-logiciel pour les log applicatif.
        'log' => array(
            '\Log-user' => array(
                'writers' => array(
                    array(
                        'name' => 'stream',
                        'priority' => 1000,
                        'options' => array(
                            'stream' => 'log/users.log',),
                    ),
                ),
            ),
            '\Log-logiciel' => array(
                'writers' => array(
                    array(
                        'name' => 'stream',
                        'priority' => 1000,
                        'options' => array(
                            'stream' => 'log/raid-tracker.log',),
                    ),
                ),
            ),
        ),
    );
