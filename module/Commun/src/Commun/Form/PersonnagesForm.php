<?php

namespace Commun\Form;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class PersonnagesForm extends \Core\Form\AbstractServiceForm {

//    public function __construct()
//    {

    public function __construct(\Zend\ServiceManager\ServiceLocatorInterface $oServLocat = null) {
        parent::__construct('personnages', $oServLocat);
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'idPersonnage',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'nom',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Nom',
            ),
        ));

        $this->add(array(
            'name' => 'niveau',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Niveau',
            ),
        ));

        $this->add(array(
            'name' => 'genre',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Genre',
                'empty_option' => $this->getTranslator()->translate('---Veuillez choisir ---'),
                'value_options' => array(
                    '0' => 'Male',
                    '1' => 'Female'
                )
            ),
        ));

        $this->add(array(
            'name' => 'miniature',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'miniature',
            ),
        ));

        $this->add(array(
            'name' => 'royaume',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Royaume',
            ),
        ));

//        $this->add(array(
//            'name' => 'idFaction',
//            'attributes' => array(
//                'type' => 'text',
//                'class' => 'form-control'
//            ),
//            'options' => array(
//                'label' => 'IdFaction',
//            ),
//        ));
        $this->add(array(
            'type' => 'Core\Form\Element\ObjectSelect',
            'name' => 'idFaction',
            'attributes' => array(
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Faction',
                'service_manager' => $this->getServiceLocator(),
                'target_class' => 'Commun\Table\FactionTable',
                'property' => 'nom',
                'empty_option' => $this->getTranslator()->translate('---Veuillez choisir ---')
            ),
        ));

        $this->add(array(
            'type' => 'Core\Form\Element\ObjectSelect',
            'name' => 'idClasses',
            'attributes' => array(
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Classes',
                'service_manager' => $this->getServiceLocator(),
                'target_class' => 'Commun\Table\ClassesTable',
                'property' => 'nom',
                'empty_option' => $this->getTranslator()->translate('---Veuillez choisir ---')
            ),
        ));


//        $this->add(array(
//            'name' => 'idRace',
//            'attributes' => array(
//                'type' => 'text',
//                'class' => 'form-control'
//            ),
//            'options' => array(
//                'label' => 'IdRace',
//            ),
//        ));
        $this->add(array(
            'type' => 'Core\Form\Element\ObjectSelect',
            'name' => 'idRace',
            'attributes' => array(
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Race',
                'service_manager' => $this->getServiceLocator(),
                'target_class' => 'Commun\Table\RaceTable',
                'property' => 'nom',
                'empty_option' => $this->getTranslator()->translate('---Veuillez choisir ---')
            ),
        ));


//        $this->add(array(
//            'name' => 'idGuildes',
//            'attributes' => array(
//                'type' => 'text',
//                'class' => 'form-control'
//            ),
//            'options' => array(
//                'label' => 'IdGuildes',
//            ),
//        ));
        $this->add(array(
            'type' => 'Core\Form\Element\ObjectSelect',
            'name' => 'idGuildes',
            'attributes' => array(
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Guilde',
                'service_manager' => $this->getServiceLocator(),
                'target_class' => 'Commun\Table\GuildesTable',
                'property' => 'nom',
                'empty_option' => $this->getTranslator()->translate('---Veuillez choisir ---')
            ),
        ));
//        $this->add(array(
//            'name' => 'idUsers',
//            'attributes' => array(
//                'type' => 'text',
//                'class' => 'form-control'
//            ),
//            'options' => array(
//                'label' => 'IdUsers',
//            ),
//        ));
        $this->add(array(
            'type' => 'Core\Form\Element\ObjectSelect',
            'name' => 'idUsers',
            'attributes' => array(
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Utilisateur',
                'service_manager' => $this->getServiceLocator(),
                'target_class' => 'Commun\Table\UsersTable',
                'property' => 'nom',
                'empty_option' => $this->getTranslator()->translate('---Veuillez choisir ---')
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'form-control btn-success',
                'style' => 'width: 50%'
            ),
        ));
    }

}
