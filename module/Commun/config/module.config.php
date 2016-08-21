<?php

/**
 * @author Antarus
 * @project Raid-TracKer
 * @license MIT
 * @copyright Mystra - Antarus & Capi
 */
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'commun' => __DIR__ . '/../view',
        ),
    ),
    'conf' => array(
        'eqdkp' => array(
            // nom des personnage utilisé par le logiciel eqdkp
            'nom' => array(
                'bank' => 'bank',
                'disenchanted' => 'disenchanted',
            )
        ),
        'roster' => array(
            'suffixe' => array(
                'bank' => '_bank',
                'disenchant' => '_disenchant')
        ),
        'pallier' => array(
            // Le nombre maximal de pallier
            'max' => '2'
        ),
    ),
);
