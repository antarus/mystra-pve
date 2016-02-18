<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Mystra
 */
class EvenementsPersonnageForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('evenements_personnage');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idEvenement_personnage',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
            'name' => 'status',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Status',
            ),
        ));

        $this->add(array(
            'name' => 'dateCreation',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'DateCreation',
            ),
        ));

        $this->add(array(
            'name' => 'dateModification',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'DateModification',
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
            'name' => 'idPersonnage',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdPersonnage',
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

