<?php

namespace Commun\Filter;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RosterFilter extends \Core\Filter\AbstractFilter {

    public function __construct() {
        $inputFilter = $this->getInputFilter();
        $factory = $this->getInputFactory();

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

        $inputFilter->add($factory->createInput(array(
                    'name' => 'nom',
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
                                'max' => '100'
                            )
                        ),
                        array(
                            'name' => 'regex',
                            'options' => array(
                                'pattern' => '/^[a-zA-Z0-9_]+$/',
                                'messages' => array(
                                    \Zend\Validator\Regex::NOT_MATCH => 'Caractères autorisés : Alphanumérique et underscore'
                                ),
                            )
                        ),
                    )
        )));
    }

}
