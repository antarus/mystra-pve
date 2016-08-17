<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ZoneHasModeDiffculteForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('zone_has_mode_diffculte');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idZone',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
           'name' => 'idMode',
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

