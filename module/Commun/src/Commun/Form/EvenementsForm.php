<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('evenements');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idEvenements',
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
            'name' => 'description',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Description',
            ),
        ));

        $this->add(array(
            'name' => 'dateHeureDebutInvitation',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'DateHeureDebutInvitation',
            ),
        ));

        $this->add(array(
            'name' => 'dateHeureDebutEvenement',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'DateHeureDebutEvenement',
            ),
        ));

        $this->add(array(
            'name' => 'dateHeureFinInscription',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'DateHeureFinInscription',
            ),
        ));

        $this->add(array(
            'name' => 'lvlMin',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'LvlMin',
            ),
        ));

        $this->add(array(
            'name' => 'ouvertATous',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'OuvertATous',
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
            'name' => 'idDonjon',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdDonjon',
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
            'name' => 'idRoster',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdRoster',
            ),
        ));

        $this->add(array(
            'name' => 'idEvenements_template',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IdEvenements template',
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

