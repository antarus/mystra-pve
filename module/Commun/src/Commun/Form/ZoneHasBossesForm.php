<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Mystra
 */
class ZoneHasBossesForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('zone_has_bosses');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idZone',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
           'name' => 'idBosses',
           'attributes' => array(
               'type'  => 'hidden',
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

