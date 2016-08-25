<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'APIRtK\\V1\\Rest\\Loot\\LootResource' => 'APIRtK\\V1\\Rest\\Loot\\LootResourceFactory',
            'APIRtK\\V1\\Rest\\Roster\\RosterResource' => 'APIRtK\\V1\\Rest\\Roster\\RosterResourceFactory',
            'APIRtK\\V1\\Rest\\LootRoster\\LootRosterResource' => 'APIRtK\\V1\\Rest\\LootRoster\\LootRosterResourceFactory',
            'APIRtK\\V1\\Rest\\LootRosterPersonnage\\LootRosterPersonnageResource' => 'APIRtK\\V1\\Rest\\LootRosterPersonnage\\LootRosterPersonnageResourceFactory',
            'APIRtK\\V1\\Rest\\RosterStat\\RosterStatResource' => 'APIRtK\\V1\\Rest\\RosterStat\\RosterStatResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'api-rt-k.rest.loot' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/loot/:loot_server/:loot_name',
                    'defaults' => array(
                        'controller' => 'APIRtK\\V1\\Rest\\Loot\\Controller',
                    ),
                ),
            ),
            'api-rt-k.rest.roster' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/roster/:roster_name',
                    'defaults' => array(
                        'controller' => 'APIRtK\\V1\\Rest\\Roster\\Controller',
                    ),
                ),
            ),
            'api-rt-k.rest.loot-roster' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/loot-roster/:roster_name',
                    'defaults' => array(
                        'controller' => 'APIRtK\\V1\\Rest\\LootRoster\\Controller',
                    ),
                ),
            ),
            'api-rt-k.rest.loot-roster-personnage' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/loot-roster-personnage/:roster/:server/:nom_personnage',
                    'defaults' => array(
                        'controller' => 'APIRtK\\V1\\Rest\\LootRosterPersonnage\\Controller',
                    ),
                ),
            ),
            'api-rt-k.rest.roster-stat' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/roster-stat/:nom_roster',
                    'defaults' => array(
                        'controller' => 'APIRtK\\V1\\Rest\\RosterStat\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'api-rt-k.rest.loot',
            1 => 'api-rt-k.rest.roster',
            2 => 'api-rt-k.rest.loot-roster',
            3 => 'api-rt-k.rest.loot-roster-personnage',
            4 => 'api-rt-k.rest.roster-stat',
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
        'APIRtK\\V1\\Rest\\Roster\\Controller' => array(
            'listener' => 'APIRtK\\V1\\Rest\\Roster\\RosterResource',
            'route_name' => 'api-rt-k.rest.roster',
            'route_identifier_name' => 'roster_name',
            'collection_name' => 'roster',
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
            'entity_class' => 'APIRtK\\V1\\Rest\\Roster\\RosterEntity',
            'collection_class' => 'APIRtK\\V1\\Rest\\Roster\\RosterCollection',
            'service_name' => 'roster',
        ),
        'APIRtK\\V1\\Rest\\LootRoster\\Controller' => array(
            'listener' => 'APIRtK\\V1\\Rest\\LootRoster\\LootRosterResource',
            'route_name' => 'api-rt-k.rest.loot-roster',
            'route_identifier_name' => 'roster_name',
            'collection_name' => 'loot_roster',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'APIRtK\\V1\\Rest\\LootRoster\\LootRosterEntity',
            'collection_class' => 'APIRtK\\V1\\Rest\\LootRoster\\LootRosterCollection',
            'service_name' => 'lootRoster',
        ),
        'APIRtK\\V1\\Rest\\LootRosterPersonnage\\Controller' => array(
            'listener' => 'APIRtK\\V1\\Rest\\LootRosterPersonnage\\LootRosterPersonnageResource',
            'route_name' => 'api-rt-k.rest.loot-roster-personnage',
            'route_identifier_name' => 'nom_personnage',
            'collection_name' => 'loot_roster_personnage',
            'entity_http_methods' => array(
                0 => 'PATCH',
                1 => 'GET',
            ),
            'collection_http_methods' => array(),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'APIRtK\\V1\\Rest\\LootRosterPersonnage\\LootRosterPersonnageEntity',
            'collection_class' => 'APIRtK\\V1\\Rest\\LootRosterPersonnage\\LootRosterPersonnageCollection',
            'service_name' => 'lootRosterPersonnage',
        ),
        'APIRtK\\V1\\Rest\\RosterStat\\Controller' => array(
            'listener' => 'APIRtK\\V1\\Rest\\RosterStat\\RosterStatResource',
            'route_name' => 'api-rt-k.rest.roster-stat',
            'route_identifier_name' => 'nom_roster',
            'collection_name' => 'roster_stat',
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
            'entity_class' => 'APIRtK\\V1\\Rest\\RosterStat\\RosterStatEntity',
            'collection_class' => 'APIRtK\\V1\\Rest\\RosterStat\\RosterStatCollection',
            'service_name' => 'rosterStat',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'APIRtK\\V1\\Rest\\Loot\\Controller' => 'HalJson',
            'APIRtK\\V1\\Rest\\Roster\\Controller' => 'HalJson',
            'APIRtK\\V1\\Rest\\LootRoster\\Controller' => 'HalJson',
            'APIRtK\\V1\\Rest\\LootRosterPersonnage\\Controller' => 'HalJson',
            'APIRtK\\V1\\Rest\\RosterStat\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'APIRtK\\V1\\Rest\\Loot\\Controller' => array(
                0 => 'application/vnd.api-rt-k.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'APIRtK\\V1\\Rest\\Roster\\Controller' => array(
                0 => 'application/vnd.api-rt-k.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'APIRtK\\V1\\Rest\\LootRoster\\Controller' => array(
                0 => 'application/vnd.api-rt-k.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'APIRtK\\V1\\Rest\\LootRosterPersonnage\\Controller' => array(
                0 => 'application/vnd.api-rt-k.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'APIRtK\\V1\\Rest\\RosterStat\\Controller' => array(
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
            'APIRtK\\V1\\Rest\\Roster\\Controller' => array(
                0 => 'application/vnd.api-rt-k.v1+json',
                1 => 'application/json',
            ),
            'APIRtK\\V1\\Rest\\LootRoster\\Controller' => array(
                0 => 'application/vnd.api-rt-k.v1+json',
                1 => 'application/json',
            ),
            'APIRtK\\V1\\Rest\\LootRosterPersonnage\\Controller' => array(
                0 => 'application/vnd.api-rt-k.v1+json',
                1 => 'application/json',
            ),
            'APIRtK\\V1\\Rest\\RosterStat\\Controller' => array(
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
                'route_identifier_name' => 'loot_server, loot_name',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'APIRtK\\V1\\Rest\\Loot\\LootCollection' => array(
                'entity_identifier_name' => 'nom',
                'route_name' => 'api-rt-k.rest.loot',
                'route_identifier_name' => 'loot_server',
                'is_collection' => true,
            ),
            'APIRtK\\V1\\Rest\\Roster\\RosterEntity' => array(
                'entity_identifier_name' => 'nom',
                'route_name' => 'api-rt-k.rest.roster',
                'route_identifier_name' => 'roster_name',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'APIRtK\\V1\\Rest\\Roster\\RosterCollection' => array(
                'entity_identifier_name' => 'nom',
                'route_name' => 'api-rt-k.rest.roster',
                'route_identifier_name' => 'roster_name',
                'is_collection' => true,
            ),
            'APIRtK\\V1\\Rest\\LootRoster\\LootRosterEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api-rt-k.rest.loot-roster',
                'route_identifier_name' => 'roster_name',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'APIRtK\\V1\\Rest\\LootRoster\\LootRosterCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api-rt-k.rest.loot-roster',
                'route_identifier_name' => 'roster_name',
                'is_collection' => true,
            ),
            'APIRtK\\V1\\Rest\\LootRosterPersonnage\\LootRosterPersonnageEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api-rt-k.rest.loot-roster-personnage',
                'route_identifier_name' => 'nom_personnage',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'APIRtK\\V1\\Rest\\LootRosterPersonnage\\LootRosterPersonnageCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api-rt-k.rest.loot-roster-personnage',
                'route_identifier_name' => 'nom_personnage',
                'is_collection' => true,
            ),
            'APIRtK\\V1\\Rest\\RosterStat\\RosterStatEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api-rt-k.rest.roster-stat',
                'route_identifier_name' => 'nom_roster',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'APIRtK\\V1\\Rest\\RosterStat\\RosterStatCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api-rt-k.rest.roster-stat',
                'route_identifier_name' => 'nom_roster',
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
