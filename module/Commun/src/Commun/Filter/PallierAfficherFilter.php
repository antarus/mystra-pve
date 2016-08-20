<?php

namespace Commun\Filter;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class PallierAfficherFilter extends \Core\Filter\AbstractFilter {

    public function __construct() {
        $inputFilter = $this->getInputFilter();
        $factory = $this->getInputFactory();

        $inputFilter->add($factory->createInput(array(
                    'name' => 'idPallierAffiche',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'Int')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Digits'
                        ),
                    )
        )));

        $inputFilter->add($factory->createInput(array(
                    'name' => 'idModeDifficulte',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'Int')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Digits'
                        ),
                    )
        )));

        $inputFilter->add($factory->createInput(array(
                    'name' => 'idZone',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'Int')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Digits'
                        ),
                    )
        )));

        $inputFilter->add($factory->createInput(array(
                    'name' => 'idRoster',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'Int')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Digits'
                        ),
                    )
        )));
    }

}
