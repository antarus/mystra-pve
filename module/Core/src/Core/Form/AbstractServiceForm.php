<?php

namespace Core\Form;

/**
 * Etend le form par défaut de Zend pour gérer JQuery Validator.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
abstract class AbstractServiceForm extends AbstractForm {

    /**
     *
     * @var \Zend\ServiceManager\ServiceLocatorInterface
     */
    private $_serviceLocator;
    private $translator;

    /**
     * Constructeur.
     * @param string $sNom
     * @param  \Zend\ServiceManager\ServiceLocatorInterface $oServLocat
     * @param array $options
     */
    function __construct($sNom, \Zend\ServiceManager\ServiceLocatorInterface $oServLocat = null, $options = array()) {
        parent::__construct($sNom, $options);
        $this->_serviceLocator = $oServLocat;
        $this->translator = $this->_serviceLocator->get('translator');
    }

    /**
     * Retourne la table.
     * @return \Zend\ServiceManager\ServiceLocatorInterface
     */
    function getServiceLocator() {
        return $this->_serviceLocator;
    }

    /**
     * Définit le service locatorassocié.
     * @param  \Zend\ServiceManager\ServiceLocatorInterface
     */
    function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $oServLocat) {
        $this->_serviceLocator = $oServLocat;
    }

    /**
     * Retourne le translator.
     * @return translator
     */
    function getTranslator() {
        return $this->translator;
    }

    /**
     * Définit le translator
     * @param type $oTranslator
     */
    protected function setTranslator($oTranslator) {
        $this->translator = $oTranslator;
    }

}
