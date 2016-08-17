<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsRolesForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('evenements_roles');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idEvenements_roles',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
            'name' => 'nombre',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Nombre',
            ),
        ));

        $this->add(array(
            'name' => 'ordre',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Ordre',
            ),
        ));

        $this->add(array(
            'name' => 'idEvenements',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdEvenements',
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

