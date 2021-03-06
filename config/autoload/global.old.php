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
                'username' => 'root',
                'password' => 'root',
                'hostname' => 'localhost',
                'driver_options' => array(
                    1002 => 'SET NAMES \'UTF8\'',
                ),
            ),
            'urlProjet' => 'dev.raid-tracker.com',
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
                    ),
                ),
            ),
        );
