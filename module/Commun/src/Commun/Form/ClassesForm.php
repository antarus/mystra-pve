<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Mystra
 */
class ClassesForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('classes');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idClasses',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
            'name' => 'couleur',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Couleur',
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

