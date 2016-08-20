<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class PallierAfficherForm extends \Core\Form\AbstractForm {

    public function __construct() {
        parent::__construct('pallierAfficher');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'idPallierAffiche',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'idModeDifficulte',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'idModeDifficulte',
            ),
        ));

        $this->add(array(
            'name' => 'idZone',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'idZone',
            ),
        ));

        $this->add(array(
            'name' => 'idRoster',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdRoster',
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
