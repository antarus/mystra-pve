<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ItemPersonnageRaidForm extends \Core\Form\AbstractForm {

    public function __construct() {
        parent::__construct('item_personnage_raid');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'idItemRaidPersonnage',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'idRaid',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdRaid',
            ),
        ));

        $this->add(array(
            'name' => 'idItem',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdItem',
            ),
        ));

        $this->add(array(
            'name' => 'idPersonnage',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdPersonnage',
            ),
        ));
        $this->add(array(
            'name' => 'idBosses',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'idBoss',
            ),
        ));

        $this->add(array(
            'name' => 'note',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Note',
            ),
        ));

        $this->add(array(
            'name' => 'valeur',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Valeur',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'form-control btn-success',
                'style' => 'width: 50%'
            ),
        ));
    }

}
