<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class BossesHasNpcForm extends \Core\Form\AbstractForm
{

    public function __construct()
    {
        parent::__construct('bosses_has_npc');
        $this->setAttribute('method', 'post');

        $this->add(array(
           'name' => 'idBosses',
           'attributes' => array(
               'type'  => 'hidden',
           ),
        ));

        $this->add(array(
           'name' => 'idNpc',
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

