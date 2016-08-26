<?php

namespace Core\Table;

use Zend\Db\Adapter\Adapter;
use Core\Table\AbstractTable;

/**
 * Etend le table par défaut  pour ajouter a gestion des services
 *
 * @author Antarus
 */
class AbstractServiceTable extends AbstractTable {

    /**
     *
     * @var \Zend\ServiceManager\ServiceLocatorInterface
     */
    private $_serviceLocator;
    private $_servTranslator;

    /**
     * Retourne la table.
     * @return \Zend\ServiceManager\ServiceLocatorInterface
     */
    function _getServiceLocator() {
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
     * Retourne le service de traduction en mode lazy.
     *
     * @return
     */
    public function _getServTranslator() {
        if (!$this->_servTranslator) {
            $this->_servTranslator = $this->_serviceLocator->get('translator');
        }
        return $this->_servTranslator;
    }

}
