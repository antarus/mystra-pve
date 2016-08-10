<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'APIRtK\\V1\\Rest\\Loot\\LootResource' => 'APIRtK\\V1\\Rest\\Loot\\LootResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'api-rt-k.rest.loot' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/loot/:loot_server/:loot_name',
                    'defaults' => array(
                        'controller' => 'APIRtK\\V1\\Rest\\Loot\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'api-rt-k.rest.loot',
        ),
    ),
    'zf-rest' => array(
        'APIRtK\\V1\\Rest\\Loot\\Controller' => array(
            'listener' => 'APIRtK\\V1\\Rest\\Loot\\LootResource',
            'route_name' => 'api-rt-k.rest.loot',
            'route_identifier_name' => 'loot_server',
            'collection_name' => 'loot',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'APIRtK\\V1\\Rest\\Loot\\LootEntity',
            'collection_class' => 'APIRtK\\V1\\Rest\\Loot\\LootCollection',
            'service_name' => 'loot',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'APIRtK\\V1\\Rest\\Loot\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'APIRtK\\V1\\Rest\\Loot\\Controller' => array(
                0 => 'application/vnd.api-rt-k.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'APIRtK\\V1\\Rest\\Loot\\Controller' => array(
                0 => 'application/vnd.api-rt-k.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'APIRtK\\V1\\Rest\\Loot\\LootEntity' => array(
                'entity_identifier_name' => 'nom',
                'route_name' => 'api-rt-k.rest.loot',
                'route_identifier_name' => 'loot_server',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'APIRtK\\V1\\Rest\\Loot\\LootCollection' => array(
                'entity_identifier_name' => 'nom',
                'route_name' => 'api-rt-k.rest.loot',
                'route_identifier_name' => 'loot_server',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'APIRtK\\V1\\Rest\\Loot\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ),
            ),
        ),
    ),
);
