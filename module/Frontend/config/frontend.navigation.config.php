<?php

// TODO revoir la traduction
$translator = new \Zend\I18n\Translator\Translator();
return array(
    'frontend' => array(
        array(
            'label' => $translator->translate('Accueil'),
            'route' => 'home',
            'action' => 'index',
        ),
        array(
            'label' => $translator->translate('Raid'),
            'route' => 'raid-list',
            'action' => 'index',
        ),
    )
);
