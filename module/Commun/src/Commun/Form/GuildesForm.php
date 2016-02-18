<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Mystra
 */
class GuildesForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('guildes');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idGuildes',
           'attributes' => array(
               'type'  => 'hidden',
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
            'name' => 'serveur',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Serveur',
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

