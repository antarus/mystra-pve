<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'API\\V1\\Rest\\Hello\\HelloResource' => 'API\\V1\\Rest\\Hello\\HelloResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'api.rest.hello' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/hello[/:hello_id]',
                    'defaults' => array(
                        'controller' => 'API\\V1\\Rest\\Hello\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'api.rest.hello',
        ),
    ),
    'zf-rest' => array(
        'API\\V1\\Rest\\Hello\\Controller' => array(
            'listener' => 'API\\V1\\Rest\\Hello\\HelloResource',
            'route_name' => 'api.rest.hello',
            'route_identifier_name' => 'hello_id',
            'collection_name' => 'hello',
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
            'entity_class' => 'API\\V1\\Rest\\Hello\\HelloEntity',
            'collection_class' => 'API\\V1\\Rest\\Hello\\HelloCollection',
            'service_name' => 'hello',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'API\\V1\\Rest\\Hello\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'API\\V1\\Rest\\Hello\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'API\\V1\\Rest\\Hello\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'API\\V1\\Rest\\Hello\\HelloEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.hello',
                'route_identifier_name' => 'hello_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'API\\V1\\Rest\\Hello\\HelloCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.hello',
                'route_identifier_name' => 'hello_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'API\\V1\\Rest\\Hello\\Controller' => array(
            'input_filter' => 'API\\V1\\Rest\\Hello\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'API\\V1\\Rest\\Hello\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'message',
                'description' => 'test de message',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'API\\V1\\Rest\\Hello\\Controller' => array(
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
