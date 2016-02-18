<?php

// TODO revoir la traduction
$translator = new \Zend\I18n\Translator\Translator();
return array(
    'default' => array(
        array(
            'label' => $translator->translate('Home'),
            'route' => 'home',
            'action' => 'index',
        ),
        array(
            'label' => $translator->translate('Référentiel'),
            'route' => null,
            'action' => 'index',
            'pages' => array(
                array(
                    'label' => $translator->translate('Boss'),
                    'route' => 'backend-bosses-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Classes'),
                    'route' => 'backend-classes-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Evenements'),
                    'route' => 'backend-evenements-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Faction'),
                    'route' => 'backend-faction-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Guildes'),
                    'route' => 'backend-guildes-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Items'),
                    'route' => 'backend-items-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Mode de difficulté'),
                    'route' => 'backend-mode_difficulte-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Npc'),
                    'route' => 'backend-npc-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Personnages'),
                    'route' => 'backend-personnages-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Race'),
                    'route' => 'backend-race-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Raids'),
                    'route' => 'backend-raids-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Role'),
                    'route' => 'backend-role-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Roster'),
                    'route' => 'backend-roster-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Spécialisation'),
                    'route' => 'backend-specialisation-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Utilisateurs'),
                    'route' => 'backend-users-list',
                    'action' => 'index',
                ),
                array(
                    'label' => $translator->translate('Zone'),
                    'route' => 'backend-zone-list',
                    'action' => 'index',
                )
            )
        ),
    )
);
