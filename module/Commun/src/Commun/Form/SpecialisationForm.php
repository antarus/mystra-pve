<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Mystra
 */
class SpecialisationForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('specialisation');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idSpecialisation',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
            'name' => 'idClasses',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdClasses',
            ),
        ));

        $this->add(array(
            'name' => 'idRole',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdRole',
            ),
        ));

        $this->add(array(
            'name' => 'nom',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Nom',
            ),
        ));

        $this->add(array(
            'name' => 'icon',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Icon',
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

