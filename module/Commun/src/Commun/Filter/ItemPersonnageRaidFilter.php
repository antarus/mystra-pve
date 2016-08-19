<?php

namespace Commun\Filter;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ItemPersonnageRaidFilter extends \Core\Filter\AbstractFilter {

    public function __construct() {
        $inputFilter = $this->getInputFilter();
        $factory = $this->getInputFactory();

        $inputFilter->add($factory->createInput(array(
                    'name' => 'idItemRaidPersonnage',
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
                    'name' => 'idRaid',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => '1',
                                'max' => '255'
                            )
                        ),
                    )
        )));

        $inputFilter->add($factory->createInput(array(
                    'name' => 'idItem',
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
                    'name' => 'idPersonnage',
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
                    'name' => 'idBosses',
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
                    'name' => 'note',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => '1',
                                'max' => '255'
                            )
                        ),
                    )
        )));
        $inputFilter->add($factory->createInput(array(
                    'name' => 'valeur',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'Float')
                    ),
                    'validators' => array(
                    )
        )));
    }

}
