<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Mystra
 */
class PersonnagesHasSpecialisationForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('personnages_has_specialisation');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'specialisation_idSpecialisation',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
           'name' => 'personnages_idPersonnage',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
            'name' => 'isPrincipal',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IsPrincipal',
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

