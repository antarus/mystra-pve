<?php

namespace Commun\Filter;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidsFilter extends \Core\Filter\AbstractFilter {

    public function __construct() {
        $inputFilter = $this->getInputFilter();
        $factory = $this->getInputFactory();

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
                    'name' => 'idEvenements',
                    'required' => false,
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
                    'name' => 'idRosterTmp',
                    'required' => false,
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
                    'name' => 'idMode',
                    'required' => false,
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
                    'name' => 'date',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => '0',
                                'max' => '255'
                            )
                        ),
                    )
        )));

        $inputFilter->add($factory->createInput(array(
                    'name' => 'note',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => '0',
                                'max' => '65535'
                            )
                        ),
                    )
        )));

        $inputFilter->add($factory->createInput(array(
                    'name' => 'valeur',
                    'required' => false,
                    'filters' => array(
//                        array('name' => '\Zend\Filter\Float')
                    ),
                    'validators' => array(
                    )
        )));

        $inputFilter->add($factory->createInput(array(
                    'name' => 'ajoutePar',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => '0',
                                'max' => '30'
                            )
                        ),
                    )
        )));

        $inputFilter->add($factory->createInput(array(
                    'name' => 'majPar',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => '0',
                                'max' => '30'
                            )
                        ),
                    )
        )));
    }

}
