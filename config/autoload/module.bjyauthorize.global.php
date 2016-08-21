<?php
/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'bjyauthorize' => array(
        // default role for unauthenticated users
        'default_role'          => 'guest',

        // identity provider service name
        'identity_provider'     => 'BjyAuthorize\Provider\Identity\ZfcUserZendDb',

        // Role providers to be used to load all available roles into Zend\Permissions\Acl\Acl
        // Keys are the provider service names, values are the options to be passed to the provider
        'role_providers' => array(
            'BjyAuthorize\Provider\Role\ZendDb' => array(
                'table' => 'user_role',
                'role_id_field' => 'role_id',
                'parent_role_field' => 'parent'
            )
        ),

        // Resource providers to be used to load all available resources into Zend\Permissions\Acl\Acl
        // Keys are the provider service names, values are the options to be passed to the provider
        'resource_providers'    => array(
                'BjyAuthorize\Provider\Resource\Config' => array(
        'menu' => array(),
    ),
        ),

        // Rule providers to be used to load all available rules into Zend\Permissions\Acl\Acl
        // Keys are the provider service names, values are the options to be passed to the provider
        'rule_providers'        => array(   
            'BjyAuthorize\Provider\Rule\Config' => array(
                'allow' => array(
                    array(array('admin'), 'menu', 'menu_admin')
                ),
                'deny' => array(
                ),
            ),
        ),

        // Guard listeners to be attached to the application event manager
        'guards'                => array(
            'BjyAuthorize\Guard\Route' => array(
                array('route' => 'zfcuser', 'roles' => array('user','guest','admin')),
                array('route' => 'zfcuser/logout', 'roles' => array('user','admin')),
                array('route' => 'zfcuser/login', 'roles' => array('guest')),
                array('route' => 'zfcuser/register', 'roles' => array('guest')),
                
                array('route' => 'home', 'roles' => array('guest','user','admin')),
                array('route' => 'contact', 'roles' => array('guest', 'user','admin')),
                array('route' => 'apropos', 'roles' => array('guest', 'user','admin')),
                array('route' => 'discordbot', 'roles' => array('guest', 'user','admin')),
                
                array('route' => 'api-blizzard.rest.character', 'roles' => array('guest', 'user','admin')),
                
                array('route' => 'api-rt-k.rest.loot', 'roles' => array('guest', 'user','admin')),
                array('route' => 'api-rt-k.rest.roster', 'roles' => array('guest', 'user','admin')),
                
                array('route' => 'backend-index', 'roles' => array('admin')),
                array('route' => 'backend-bosses-list', 'roles' => array('admin')),
                array('route' => 'backend-bosses-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-bosses-create', 'roles' => array('admin')),
                array('route' => 'backend-bosses-update', 'roles' => array('admin')),
                array('route' => 'backend-bosses-delete', 'roles' => array('admin')),
                array('route' => 'backend-bosses_has_npc-list', 'roles' => array('admin')),
                array('route' => 'backend-bosses_has_npc-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-bosses_has_npc-create', 'roles' => array('admin')),
                array('route' => 'backend-bosses_has_npc-update', 'roles' => array('admin')),
                array('route' => 'backend-bosses_has_npc-delete', 'roles' => array('admin')),
                array('route' => 'backend-classes-list', 'roles' => array('admin')),
                array('route' => 'backend-classes-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-classes-create', 'roles' => array('admin')),
                array('route' => 'backend-classes-update', 'roles' => array('admin')),
                array('route' => 'backend-classes-delete', 'roles' => array('admin')),
                array('route' => 'backend-evenements-list', 'roles' => array('admin')),
                array('route' => 'backend-evenements-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-evenements-create', 'roles' => array('admin')),
                array('route' => 'backend-evenements-update', 'roles' => array('admin')),
                array('route' => 'backend-evenements-delete', 'roles' => array('admin')),
                array('route' => 'backend-evenements_personnage-list', 'roles' => array('admin')),
                array('route' => 'backend-evenements_personnage-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-evenements_personnage-create', 'roles' => array('admin')),
                array('route' => 'backend-evenements_personnage-update', 'roles' => array('admin')),
                array('route' => 'backend-evenements_personnage-delete', 'roles' => array('admin')),
                array('route' => 'backend-evenements_roles-list', 'roles' => array('admin')),
                array('route' => 'backend-evenements_roles-create', 'roles' => array('admin')),
                array('route' => 'backend-evenements_roles-update', 'roles' => array('admin')),
                array('route' => 'backend-evenements_roles-delete', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template-list', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template-create', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template-update', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template-delete', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template_roles-list', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template_roles-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template_roles-create', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template_roles-update', 'roles' => array('admin')),
                array('route' => 'backend-evenements_template_roles-delete', 'roles' => array('admin')),
                array('route' => 'backend-faction-list', 'roles' => array('admin')),
                array('route' => 'backend-faction-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-faction-create', 'roles' => array('admin')),
                array('route' => 'backend-faction-update', 'roles' => array('admin')),
                array('route' => 'backend-faction-delete', 'roles' => array('admin')),
                array('route' => 'backend-guildes-list', 'roles' => array('admin')),
                array('route' => 'backend-guildes-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-guildes-create', 'roles' => array('admin')),
                array('route' => 'backend-guildes-update', 'roles' => array('admin')),
                array('route' => 'backend-guildes-delete', 'roles' => array('admin')),
                array('route' => 'backend-item-personnage-raid-list', 'roles' => array('admin')),
                array('route' => 'backend-item-personnage-raid-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-item-personnage-raid-create', 'roles' => array('admin')),
                array('route' => 'backend-item-personnage-raid-update', 'roles' => array('admin')),
                array('route' => 'backend-item-personnage-raid-delete', 'roles' => array('admin')),
                array('route' => 'backend-items-list', 'roles' => array('admin')),
                array('route' => 'backend-items-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-items-create', 'roles' => array('admin')),
                array('route' => 'backend-items-update', 'roles' => array('admin')),
                array('route' => 'backend-items-delete', 'roles' => array('admin')),
                array('route' => 'backend-mode_difficulte-list', 'roles' => array('admin')),
                array('route' => 'backend-mode_difficulte-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-mode_difficulte-create', 'roles' => array('admin')),
                array('route' => 'backend-mode_difficulte-update', 'roles' => array('admin')),
                array('route' => 'backend-mode_difficulte-delete', 'roles' => array('admin')),
                array('route' => 'backend-npc-list', 'roles' => array('admin')),
                array('route' => 'backend-npc-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-npc-create', 'roles' => array('admin')),
                array('route' => 'backend-npc-update', 'roles' => array('admin')),
                array('route' => 'backend-npc-delete', 'roles' => array('admin')),
                array('route' => 'backend-personnages-list', 'roles' => array('admin')),
                array('route' => 'backend-personnages-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-personnages-create', 'roles' => array('admin')),
                array('route' => 'backend-personnages-update', 'roles' => array('admin')),
                array('route' => 'backend-personnages-delete', 'roles' => array('admin')),
                array('route' => 'backend-personnage-autocomplete', 'roles' => array('admin')),
                array('route' => 'backend-race-list', 'roles' => array('admin')),
                array('route' => 'backend-race-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-race-create', 'roles' => array('admin')),
                array('route' => 'backend-race-update', 'roles' => array('admin')),
                array('route' => 'backend-race-delete', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-list', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-create', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-update', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-delete', 'roles' => array('admin')),
                array('route' => 'backend-raids-list', 'roles' => array('admin')),
                array('route' => 'backend-raids-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-raids-create', 'roles' => array('admin')),
                array('route' => 'backend-raids-update', 'roles' => array('admin')),
                array('route' => 'backend-raids-delete', 'roles' => array('admin')),
                array('route' => 'backend-role-list', 'roles' => array('admin')),
                array('route' => 'backend-role-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-role-create', 'roles' => array('admin')),
                array('route' => 'backend-race-list', 'roles' => array('admin')),
                array('route' => 'backend-race-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-race-create', 'roles' => array('admin')),
                array('route' => 'backend-race-update', 'roles' => array('admin')),
                array('route' => 'backend-race-delete', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-list', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-create', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-update', 'roles' => array('admin')),
                array('route' => 'backend-raid_personnage-delete', 'roles' => array('admin')),
                array('route' => 'backend-raids-list', 'roles' => array('admin')),
                array('route' => 'backend-raids-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-raids-create', 'roles' => array('admin')),
                array('route' => 'backend-raids-update', 'roles' => array('admin')),
                array('route' => 'backend-raids-delete', 'roles' => array('admin')),
                array('route' => 'backend-role-list', 'roles' => array('admin')),
                array('route' => 'backend-role-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-role-create', 'roles' => array('admin')),
                array('route' => 'backend-role-update', 'roles' => array('admin')),
                array('route' => 'backend-role-delete', 'roles' => array('admin')),
                array('route' => 'backend-roster-list', 'roles' => array('admin')),
                array('route' => 'backend-roster-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-roster-create', 'roles' => array('admin')),
                array('route' => 'backend-roster-update', 'roles' => array('admin')),
                array('route' => 'backend-roster-delete', 'roles' => array('admin')),
                array('route' => 'backend-roster-autocomplete', 'roles' => array('admin')),
                array('route' => 'backend-roster-has-personnage-list', 'roles' => array('admin')),
                array('route' => 'backend-roster-has-personnage-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-roster-has-personnage-add', 'roles' => array('admin')),
                array('route' => 'backend-roster-has-personnage-maj', 'roles' => array('admin')),
                array('route' => 'backend-roster-has-personnage-update', 'roles' => array('admin')),
                array('route' => 'backend-roster-has-personnage-delete', 'roles' => array('admin')),
                array('route' => 'backend-specialisation-list', 'roles' => array('admin')),
                array('route' => 'backend-specialisation-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-specialisation-create', 'roles' => array('admin')),
                array('route' => 'backend-specialisation-update', 'roles' => array('admin')),
                array('route' => 'backend-specialisation-delete', 'roles' => array('admin')),
                array('route' => 'backend-users-list', 'roles' => array('admin')),
                array('route' => 'backend-users-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-users-create', 'roles' => array('admin')),
                array('route' => 'backend-users-update', 'roles' => array('admin')),
                array('route' => 'backend-users-delete', 'roles' => array('admin')),
                array('route' => 'backend-zone-list', 'roles' => array('admin')),
                array('route' => 'backend-zone-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-zone-create', 'roles' => array('admin')),
                array('route' => 'backend-zone-update', 'roles' => array('admin')),
                array('route' => 'backend-zone-delete', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_bosses-list', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_bosses-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_bosses-create', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_bosses-update', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_bosses-delete', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_mode_diffculte-list', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_mode_diffculte-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_mode_diffculte-create', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_mode_diffculte-update', 'roles' => array('admin')),
                array('route' => 'backend-zone_has_mode_diffculte-delete', 'roles' => array('admin')),
                array('route' => 'backend-guildes-import', 'roles' => array('admin')),
                array('route' => 'backend-guildes-import-traitement', 'roles' => array('admin')),
                array('route' => 'backend-zone-import', 'roles' => array('admin')),
                array('route' => 'backend-zone-import-traitement', 'roles' => array('admin')),
                array('route' => 'backend-raids-import', 'roles' => array('admin')),
                array('route' => 'backend-raids-import-traitement', 'roles' => array('admin')),
                array('route' => 'backend-personnages-import', 'roles' => array('admin')),
                array('route' => 'backend-personnages-importtraitement', 'roles' => array('admin')),
                array('route' => 'backend-items-import', 'roles' => array('admin')),
                array('route' => 'backend-items-import-traitement', 'roles' => array('admin')),
                array('route' => 'backend-pallier-afficher-list', 'roles' => array('admin')),
                array('route' => 'backend-pallier-afficher-ajaxList', 'roles' => array('admin')),
                array('route' => 'backend-pallier-afficher-create', 'roles' => array('admin')),
                array('route' => 'backend-pallier-afficher-update', 'roles' => array('admin')),
                array('route' => 'backend-pallier-afficher-delete', 'roles' => array('admin')),
                array('route' => 'backend-zone-autocomplete', 'roles' => array('admin')),
                array('route' => 'backend-mode-autocomplete', 'roles' => array('admin')),
                
                
            ),
        ),

        // strategy service name for the strategy listener to be used when permission-related errors are detected
        'unauthorized_strategy' => 'BjyAuthorize\View\UnauthorizedStrategy',

        // Template name for the unauthorized strategy
        'template'              => 'error/403',

        // cache options have to be compatible with Zend\Cache\StorageFactory::factory
        'cache_options'         => array(
            'adapter'   => array(
                'name' => 'memory',
            ),
            'plugins'   => array(
                'serializer',
            )
        ),

        // Key used by the cache for caching the acl
        'cache_key'             => 'bjyauthorize_acl'
    ),

    'service_manager' => array(
        'factories' => array(
            'BjyAuthorize\Cache'                    => 'BjyAuthorize\Service\CacheFactory',
            'BjyAuthorize\CacheKeyGenerator'        => 'BjyAuthorize\Service\CacheKeyGeneratorFactory',
            'BjyAuthorize\Config'                   => 'BjyAuthorize\Service\ConfigServiceFactory',
            'BjyAuthorize\Guards'                   => 'BjyAuthorize\Service\GuardsServiceFactory',
            'BjyAuthorize\RoleProviders'            => 'BjyAuthorize\Service\RoleProvidersServiceFactory',
            'BjyAuthorize\ResourceProviders'        => 'BjyAuthorize\Service\ResourceProvidersServiceFactory',
            'BjyAuthorize\RuleProviders'            => 'BjyAuthorize\Service\RuleProvidersServiceFactory',
            'BjyAuthorize\Guard\Controller'         => 'BjyAuthorize\Service\ControllerGuardServiceFactory',
            'BjyAuthorize\Guard\Route'              => 'BjyAuthorize\Service\RouteGuardServiceFactory',
            'BjyAuthorize\Provider\Role\Config'     => 'BjyAuthorize\Service\ConfigRoleProviderServiceFactory',
            'BjyAuthorize\Provider\Role\ZendDb'     => 'BjyAuthorize\Service\ZendDbRoleProviderServiceFactory',
            'BjyAuthorize\Provider\Rule\Config'     => 'BjyAuthorize\Service\ConfigRuleProviderServiceFactory',
            'BjyAuthorize\Provider\Resource\Config' => 'BjyAuthorize\Service\ConfigResourceProviderServiceFactory',
            'BjyAuthorize\Service\Authorize'        => 'BjyAuthorize\Service\AuthorizeFactory',
            'BjyAuthorize\Provider\Identity\ProviderInterface'
                => 'BjyAuthorize\Service\IdentityProviderServiceFactory',
            'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider'
                => 'BjyAuthorize\Service\AuthenticationIdentityProviderServiceFactory',
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider'
                => 'BjyAuthorize\Service\ObjectRepositoryRoleProviderFactory',
            'BjyAuthorize\Collector\RoleCollector'  => 'BjyAuthorize\Service\RoleCollectorServiceFactory',
            'BjyAuthorize\Provider\Identity\ZfcUserZendDb'
                => 'BjyAuthorize\Service\ZfcUserZendDbIdentityProviderServiceFactory',
            'BjyAuthorize\View\UnauthorizedStrategy'
                => 'BjyAuthorize\Service\UnauthorizedStrategyServiceFactory',
            'BjyAuthorize\Service\RoleDbTableGateway' => 'BjyAuthorize\Service\UserRoleServiceFactory',
        ),
        'invokables'  => array(
            'BjyAuthorize\View\RedirectionStrategy' => 'BjyAuthorize\View\RedirectionStrategy',
        ),
        'aliases'     => array(
            'bjyauthorize_zend_db_adapter' => 'Zend\Db\Adapter\Adapter',
        ),
        'initializers' => array(
            'BjyAuthorize\Service\AuthorizeAwareServiceInitializer'
                => 'BjyAuthorize\Service\AuthorizeAwareServiceInitializer'
        ),
    ),
    'view_manager' => array(
    'template_map' => array(
        'error/403' => realpath('./module/Application/view/error/403.phtml'),
        'zend-developer-tools/toolbar/bjy-authorize-role' => __DIR__ . '/../view/zend-developer-tools/toolbar/bjy-authorize-role.phtml'
        )
    ),

    'zenddevelopertools' => array(
        'profiler' => array(
            'collectors' => array(
                'bjy_authorize_role_collector' => 'BjyAuthorize\\Collector\\RoleCollector',
            ),
        ),
        'toolbar' => array(
            'entries' => array(
                'bjy_authorize_role_collector' => 'zend-developer-tools/toolbar/bjy-authorize-role',
            ),
        ),
    ),
);