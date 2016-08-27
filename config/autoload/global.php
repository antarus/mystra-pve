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
        ),
        'CacheRtk' => array(
            'adapter' => array(
                'name' => 'filesystem',
            ),
            'plugins' => array(
                'exception_handler' => array('throw_exceptions' => false),
                'serializer'
            ),
            'options' => array(
                'cache_dir' => __DIR__ . '/../../data/cache/rtk',
                'ttl' => 720,
                'namespace' => 'rtk-cache'
            )
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\\Db\\Adapter\\Adapter' => 'Zend\\Db\\Adapter\\AdapterServiceFactory'
        ),
        'abstract_factories' => array(
            'Zend\Log\LoggerAbstractServiceFactory',
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory'
        ),
    ),
    //Auth
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
    'log' => array(
        '\Log-logiciel' => array(
            'writers' => array(
                array(
                    'name' => 'stream',
                    'priority' => 1000,
                    'options' => array(
                        'stream' => 'data/log/rtk.log',),
                ),
            ),
        ),
        '\Log-debug' => array(
            'writers' => array(
                array(
                    'name' => 'stream',
                    'priority' => 1000,
                    'options' => array(
                        'stream' => 'data/log/debug.log',),
                ),
            ),
        ),
    ),
);
