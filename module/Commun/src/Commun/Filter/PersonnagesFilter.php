<?php

namespace Commun\Filter;

/**
 * @author Antarus
 * @project Mystra
 */
class PersonnagesFilter extends \Core\Filter\AbstractFilter
{

    public function __construct()
    {
        $inputFilter = $this->getInputFilter();
        $factory = $this->getInputFactory();

        $inputFilter->add($factory->createInput(array(
               'name' => 'idPersonnage',
               'required' => true,
               'filters' => array(
                   array('name'=>'Int')
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
                           'max' => '255'
                       )
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'niveau',
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
               'name' => 'genre',
               'required' => false,
               'filters' => array(
                   array('name'=>'Int')
               ),
               'validators' => array(
                   array(
                       'name' => 'Digits'
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'mignature',
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
                           'max' => '100'
                       )
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'royaume',
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
                           'max' => '100'
                       )
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'idFaction',
               'required' => true,
               'filters' => array(
                   array('name'=>'Int')
               ),
               'validators' => array(
                   array(
                       'name' => 'Digits'
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'idClasses',
               'required' => true,
               'filters' => array(
                   array('name'=>'Int')
               ),
               'validators' => array(
                   array(
                       'name' => 'Digits'
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'idRace',
               'required' => true,
               'filters' => array(
                   array('name'=>'Int')
               ),
               'validators' => array(
                   array(
                       'name' => 'Digits'
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'idGuildes',
               'required' => false,
               'filters' => array(
                   array('name'=>'Int')
               ),
               'validators' => array(
                   array(
                       'name' => 'Digits'
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'idUsers',
               'required' => false,
               'filters' => array(
                   array('name'=>'Int')
               ),
               'validators' => array(
                   array(
                       'name' => 'Digits'
                   ),
               )
        )));
    }


}

