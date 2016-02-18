<?php

namespace Commun\Filter;

/**
 * @author Antarus
 * @project Mystra
 */
class UsersFilter extends \Core\Filter\AbstractFilter
{

    public function __construct()
    {
        $inputFilter = $this->getInputFilter();
        $factory = $this->getInputFactory();

        $inputFilter->add($factory->createInput(array(
               'name' => 'idUsers',
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
               'name' => 'login',
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
                           'max' => '15'
                       )
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'pwd',
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
                           'max' => '150'
                       )
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'pseudo',
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
                           'max' => '150'
                       )
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'email',
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
                           'max' => '250'
                       )
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'avatar',
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
                           'max' => '150'
                       )
                   ),
               )
        )));

        $inputFilter->add($factory->createInput(array(
               'name' => 'admin',
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
               'name' => 'forgetPass',
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
                           'max' => '500'
                       )
                   ),
               )
        )));
    }


}

