<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Mystra
 */
class ItemsForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('items');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idItem',
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
            'name' => 'ajouterPar',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'AjouterPar',
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
            'name' => 'idItemJeu',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdItemJeu',
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

