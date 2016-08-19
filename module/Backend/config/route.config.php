<?php

return array(
    'router' =>
    array(
        'routes' =>
        array(
            'backend-bosses-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Bosses',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-index' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'backend-bosses-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Bosses',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-bosses-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Bosses',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-bosses-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Bosses',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-bosses-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Bosses',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-bosses_has_npc-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses_has_npc/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\BossesHasNpc',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-bosses_has_npc-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses_has_npc/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\BossesHasNpc',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-bosses_has_npc-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses_has_npc/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\BossesHasNpc',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-bosses_has_npc-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses_has_npc/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\BossesHasNpc',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-bosses_has_npc-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/bosses_has_npc/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\BossesHasNpc',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-classes-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/classes/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Classes',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-classes-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/classes/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Classes',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-classes-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/classes/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Classes',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-classes-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/classes/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Classes',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-classes-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/classes/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Classes',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-evenements-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Evenements',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-evenements-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Evenements',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-evenements-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Evenements',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-evenements-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Evenements',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-evenements-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Evenements',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-evenements_personnage-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_personnage/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsPersonnage',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-evenements_personnage-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_personnage/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsPersonnage',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-evenements_personnage-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_personnage/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsPersonnage',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-evenements_personnage-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_personnage/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsPersonnage',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-evenements_personnage-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_personnage/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsPersonnage',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-evenements_roles-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_roles/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsRoles',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-evenements_roles-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_roles/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsRoles',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-evenements_roles-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_roles/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsRoles',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-evenements_roles-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_roles/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsRoles',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-evenements_roles-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_roles/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsRoles',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-evenements_template-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplate',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-evenements_template-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplate',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-evenements_template-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplate',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-evenements_template-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplate',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-evenements_template-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplate',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-evenements_template_roles-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template_roles/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplateRoles',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-evenements_template_roles-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template_roles/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplateRoles',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-evenements_template_roles-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template_roles/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplateRoles',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-evenements_template_roles-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template_roles/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplateRoles',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-evenements_template_roles-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/evenements_template_roles/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\EvenementsTemplateRoles',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-faction-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/faction/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Faction',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-faction-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/faction/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Faction',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-faction-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/faction/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Faction',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-faction-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/faction/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Faction',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-faction-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/faction/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Faction',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-guildes-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/guildes/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Guildes',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-guildes-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/guildes/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Guildes',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-guildes-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/guildes/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Guildes',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-guildes-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/guildes/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Guildes',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-guildes-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/guildes/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Guildes',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-item-personnage-raid-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/item_personnage_raid/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ItemPersonnageRaid',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-item-personnage-raid-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/item_personnage_raid/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ItemPersonnageRaid',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-item-personnage-raid-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/item_personnage_raid/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ItemPersonnageRaid',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-item-personnage-raid-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/item_personnage_raid/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ItemPersonnageRaid',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-item-personnage-raid-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/item_personnage_raid/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ItemPersonnageRaid',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-items-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/items/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Items',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-items-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/items/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Items',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-items-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/items/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Items',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-items-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/items/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Items',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-items-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/items/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Items',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-mode_difficulte-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/mode_difficulte/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ModeDifficulte',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-mode_difficulte-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/mode_difficulte/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ModeDifficulte',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-mode_difficulte-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/mode_difficulte/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ModeDifficulte',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-mode_difficulte-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/mode_difficulte/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ModeDifficulte',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-mode_difficulte-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/mode_difficulte/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ModeDifficulte',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-npc-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/npc/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Npc',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-npc-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/npc/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Npc',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-npc-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/npc/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Npc',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-npc-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/npc/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Npc',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-npc-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/npc/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Npc',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-personnages-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/personnages/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Personnages',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-personnages-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/personnages/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Personnages',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-personnages-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/personnages/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Personnages',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-personnages-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/personnages/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Personnages',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-personnages-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/personnages/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Personnages',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-personnage-autocomplete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/personnage/autocomplete',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+'
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Personnages',
                        'action' => 'autocomplete',
                    ),
                ),
            ),
            'backend-race-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/race/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Race',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-race-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/race/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Race',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-race-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/race/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Race',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-race-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/race/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Race',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-race-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/race/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Race',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-raid_personnage-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raid_personnage/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RaidPersonnage',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-raid_personnage-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raid_personnage/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RaidPersonnage',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-raid_personnage-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raid_personnage/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RaidPersonnage',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-raid_personnage-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raid_personnage/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RaidPersonnage',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-raid_personnage-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raid_personnage/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RaidPersonnage',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-raids-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raids/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Raids',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-raids-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raids/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Raids',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-raids-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raids/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Raids',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-raids-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raids/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Raids',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-raids-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raids/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Raids',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-role-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/role/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Role',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-role-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/role/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Role',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-role-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/role/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Role',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-role-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/role/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Role',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-role-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/role/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Role',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-roster-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Roster',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-roster-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Roster',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-roster-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Roster',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-roster-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Roster',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-roster-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Roster',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-roster-autocomplete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/autocomplete',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+'
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Roster',
                        'action' => 'autocomplete',
                    ),
                ),
            ),
            'backend-roster-has-personnage-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster-has-personnage/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RosterHasPersonnage',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-roster-has-personnage-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/ajaxList/[:idRole]/[:idRoster]/',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'idRole' => '[0-9]+',
                        'idRoster' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RosterHasPersonnage',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-roster-has-personnage-add' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/[:id]/ajout',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RosterHasPersonnage',
                        'action' => 'add',
                    ),
                ),
            ),
            'backend-roster-has-personnage-maj' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/[:id]/maj',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RosterHasPersonnage',
                        'action' => 'maj',
                    ),
                ),
            ),
            'backend-roster-has-personnage-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster-has-personnage/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RosterHasPersonnage',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-roster-has-personnage-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/roster/[:idRoster]/joueur/[:idPerso]/delete',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'idRoster' => '[0-9]+',
                        'idPerso' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\RosterHasPersonnage',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-specialisation-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/specialisation/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Specialisation',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-specialisation-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/specialisation/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Specialisation',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-specialisation-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/specialisation/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Specialisation',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-specialisation-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/specialisation/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Specialisation',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-specialisation-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/specialisation/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Specialisation',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-users-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/users/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Users',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-users-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/users/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Users',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-users-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/users/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Users',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-users-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/users/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Users',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-users-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/users/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Users',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-zone-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Zone',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-zone-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Zone',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-zone-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Zone',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-zone-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Zone',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-zone-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Zone',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-zone_has_bosses-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_bosses/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasBosses',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-zone_has_bosses-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_bosses/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasBosses',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-zone_has_bosses-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_bosses/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasBosses',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-zone_has_bosses-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_bosses/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasBosses',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-zone_has_bosses-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_bosses/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasBosses',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-zone_has_mode_diffculte-list' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_mode_diffculte/list',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasModeDiffculte',
                        'action' => 'list',
                    ),
                ),
            ),
            'backend-zone_has_mode_diffculte-ajaxList' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_mode_diffculte/ajaxList',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasModeDiffculte',
                        'action' => 'ajaxList',
                    ),
                ),
            ),
            'backend-zone_has_mode_diffculte-create' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_mode_diffculte/create',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasModeDiffculte',
                        'action' => 'create',
                    ),
                ),
            ),
            'backend-zone_has_mode_diffculte-update' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_mode_diffculte/update/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasModeDiffculte',
                        'action' => 'update',
                    ),
                ),
            ),
            'backend-zone_has_mode_diffculte-delete' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone_has_mode_diffculte/delete/[:id]',
                    'constraints' =>
                    array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                        'id' => '[0-9]+',
                    ),
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\ZoneHasModeDiffculte',
                        'action' => 'delete',
                    ),
                ),
            ),
            'backend-guildes-import' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/guilde/import/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Guildes',
                        'action' => 'import',
                    ),
                ),
            ),
            'backend-guildes-import-traitement' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/guilde/import/traitement/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Guildes',
                        'action' => 'importTraitement',
                    ),
                ),
            ),
            'backend-zone-import' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone/import/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Zone',
                        'action' => 'import',
                    ),
                ),
            ),
            'backend-zone-import-traitement' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/zone/import/traitement/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Zone',
                        'action' => 'importTraitement',
                    ),
                ),
            ),
            'backend-raids-import' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raid/import/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Raids',
                        'action' => 'import',
                    ),
                ),
            ),
            'backend-raids-import-traitement' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/raid/import/traitement/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Raids',
                        'action' => 'importTraitement',
                    ),
                ),
            ),
            'backend-personnages-import' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/personnages/import/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Personnages',
                        'action' => 'import',
                    ),
                ),
            ),
            'backend-personnages-importtraitement' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/personnages/import/traitement/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Personnages',
                        'action' => 'importTraitement',
                    ),
                ),
            ),
            'backend-items-import' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/item/import/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Items',
                        'action' => 'import',
                    ),
                ),
            ),
            'backend-items-import-traitement' =>
            array(
                'type' => 'segment',
                'options' =>
                array(
                    'route' => '/backend/item/import/traitement/',
                    'defaults' =>
                    array(
                        'controller' => 'Backend\\Controller\\Items',
                        'action' => 'importTraitement',
                    ),
                ),
            ),
        ),
    ),
);
