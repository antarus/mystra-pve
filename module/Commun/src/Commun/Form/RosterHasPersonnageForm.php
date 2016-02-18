<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Mystra
 */
class RosterHasPersonnageForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('roster_has_personnage');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idRoster',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
           'name' => 'idPersonnage',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'form-control btn-success',
                'style' => 'width: 50%'
            ),
        ));
    }


}

