<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidsForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('raids');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idRaid',
           'attributes' => array(
               'type'  => 'hidden',
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
            'name' => 'date',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Date',
            ),
        ));

        $this->add(array(
            'name' => 'note',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Note',
            ),
        ));

        $this->add(array(
            'name' => 'valeur',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Valeur',
            ),
        ));

        $this->add(array(
            'name' => 'ajoutePar',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'AjoutePar',
            ),
        ));

        $this->add(array(
            'name' => 'majPar',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'MajPar',
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

