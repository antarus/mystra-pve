<?php

// TODO revoir la traduction
$translator = new \Zend\I18n\Translator\Translator();
return array(
    'backend-nav' => array(
        array(
            'label' => $translator->translate('Accueil'),
            'route' => 'backend-index',
            'action' => 'index',
        ),
        array(
            'label' => $translator->translate('Pages'),
            'route' => null,
            'action' => 'index',
            'pages' => array(
                array(
                'label' => $translator->translate('Home page'),
                'route' => 'backend-pages',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('A propos'),
                'route' => 'backend-pages',
                'action' => 'apropos',
                ),
                array(
                'label' => $translator->translate('Discord Bot'),
                'route' => 'backend-pages',
                'action' => 'discordbot',
                ),
                array(
                'label' => $translator->translate("l'équipe"),
                'route' => 'backend-pages',
                'action' => 'team',
                )
        )),
        array(
            'label' => $translator->translate('Personnage'),
            'route' => null,
            'action' => 'index',
            'pages' => array(
                array(
                'label' => $translator->translate('Factions'),
                'route' => 'backend-faction-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Races'),
                'route' => 'backend-race-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Classes'),
                'route' => 'backend-classes-list',
                'action' => 'index', 
                ),
                array(
                'label' => $translator->translate('Roles'),
                'route' => 'backend-role-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Spécialisations'),
                'route' => 'backend-specialisation-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Personnages'),
                'route' => 'backend-personnages-list',
                'action' => 'index',
                )
        )),
        array(
            'label' => $translator->translate('Raid'),
            'route' => null,
            'action' => 'index',
            'pages' => array(
                array(
                'label' => $translator->translate('Palliers'),
                'route' => 'backend-pallier-afficher-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Zone'),
                'route' => 'backend-zone-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Raids'),
                'route' => 'backend-raids-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Modes de difficulté'),
                'route' => 'backend-mode_difficulte-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Boss'),
                'route' => 'backend-bosses-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Items'),
                'route' => 'backend-items-list',
                'action' => 'index',
                ),
                array(
                'label' => $translator->translate('Items - pers - raid - boss'),
                'route' => 'backend-item-personnage-raid-list',
                'action' => 'index',
                )
        )),
        array(
            'label' => $translator->translate('Evenements'),
            'route' => 'backend-evenements-list',
            'action' => 'index',
        ),
        array(
            'label' => $translator->translate('Guildes'),
            'route' => 'backend-guildes-list',
            'action' => 'index',
        ),
        array(
            'label' => $translator->translate('Npc'),
            'route' => 'backend-npc-list',
            'action' => 'index',
        ), 
        array(
            'label' => $translator->translate('Roster'),
            'route' => 'backend-roster-list',
            'action' => 'index',
        ),
        array(
            'label' => $translator->translate('Utilisateurs'),
            'route' => 'backend-users-list',
            'action' => 'index',
        ), 
    )
);
