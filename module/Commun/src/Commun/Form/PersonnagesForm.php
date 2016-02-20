<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Mystra
 */
class PersonnagesForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('personnages');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idPersonnage',
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
            'name' => 'niveau',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Niveau',
            ),
        ));

        $this->add(array(
            'name' => 'genre',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Genre',
            ),
        ));

        $this->add(array(
            'name' => 'mignature',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Mignature',
            ),
        ));

        $this->add(array(
            'name' => 'royaume',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Royaume',
            ),
        ));

        $this->add(array(
            'name' => 'idFaction',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdFaction',
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
            'name' => 'idRace',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdRace',
            ),
        ));

        $this->add(array(
            'name' => 'idGuildes',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdGuildes',
            ),
        ));

        $this->add(array(
            'name' => 'idUsers',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdUsers',
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

