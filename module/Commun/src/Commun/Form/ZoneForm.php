<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ZoneForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('zone');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idZone',
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
            'name' => 'lvlMax',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'LvlMax',
            ),
        ));

        $this->add(array(
            'name' => 'tailleMin',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'TailleMin',
            ),
        ));

        $this->add(array(
            'name' => 'tailleMax',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'TailleMax',
            ),
        ));

        $this->add(array(
            'name' => 'patch',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Patch',
            ),
        ));

        $this->add(array(
            'name' => 'isDonjon',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IsDonjon',
            ),
        ));

        $this->add(array(
            'name' => 'isRaid',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'IsRaid',
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

