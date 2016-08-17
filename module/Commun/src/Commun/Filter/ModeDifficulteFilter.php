<?php

namespace Commun\Filter;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ModeDifficulteFilter extends \Core\Filter\AbstractFilter
{

    public function __construct()
    {
        $inputFilter = $this->getInputFilter();
        $factory = $this->getInputFactory();

        $inputFilter->add($factory->createInput(array(
               'name' => 'idMode',
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
                           'max' => '100'
                       )
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'nom_bnet',
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
    }


}

