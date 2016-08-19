<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'APIBlizzard\\V1\\Rest\\Character\\CharacterResource' => 'APIBlizzard\\V1\\Rest\\Character\\CharacterResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'api-blizzard.rest.character' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/character/:api-character-server/:character_id',
                    'defaults' => array(
                        'controller' => 'APIBlizzard\\V1\\Rest\\Character\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'api-blizzard.rest.character',
        ),
    ),
    'zf-rest' => array(
        'APIBlizzard\\V1\\Rest\\Character\\Controller' => array(
            'listener' => 'APIBlizzard\\V1\\Rest\\Character\\CharacterResource',
            'route_name' => 'api-blizzard.rest.character',
            'route_identifier_name' => 'api-character-server',
            'collection_name' => 'character',
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
            'entity_class' => 'APIBlizzard\\V1\\Rest\\Character\\CharacterEntity',
            'collection_class' => 'APIBlizzard\\V1\\Rest\\Character\\CharacterCollection',
            'service_name' => 'character',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'APIBlizzard\\V1\\Rest\\Character\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'APIBlizzard\\V1\\Rest\\Character\\Controller' => array(
                0 => 'application/vnd.api-blizzard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
                3 => 'application/x-www-form-urlencoded',
            ),
        ),
        'content_type_whitelist' => array(
            'APIBlizzard\\V1\\Rest\\Character\\Controller' => array(
                0 => 'application/vnd.api-blizzard.v1+json',
                1 => 'application/json',
                2 => 'application/x-www-form-urlencoded',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'APIBlizzard\\V1\\Rest\\Character\\CharacterEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api-blizzard.rest.character',
                'route_identifier_name' => 'api-character-server',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'APIBlizzard\\V1\\Rest\\Character\\CharacterCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api-blizzard.rest.character',
                'route_identifier_name' => 'api-character-server',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'APIBlizzard\\V1\\Rest\\Character\\Controller' => array(
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
