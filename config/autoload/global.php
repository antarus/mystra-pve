<?php

return array(
    'caches' => array(
        'CacheBnet' => array(
            'adapter' => array(
                'name' => 'filesystem',
            ),
            'plugins' => array(
                'exception_handler' => array('throw_exceptions' => false),
                'serializer'
            ),
            'options' => array(
                'cache_dir' => __DIR__ . '/../../data/cache/bnet',
                'ttl' => 180,
                'namespace' => 'bnet-cache'
            )
        ),
        'CacheApi' => array(
            'adapter' => array(
                'name' => 'filesystem',
            ),
            'plugins' => array(
                'exception_handler' => array('throw_exceptions' => false),
                'serializer'
            ),
            'options' => array(
                'cache_dir' => __DIR__ . '/../../data/cache/api',
                'ttl' => 720,
                'namespace' => 'api-cache'
            )
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\\Db\\Adapter\\Adapter' => 'Zend\\Db\\Adapter\\AdapterServiceFactory'
        ),
        'abstract_factories' => array(
            'Zend\\Log\\LoggerAbstractServiceFactory',
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory'
        ),
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
            ),
        ),
    ),
);
