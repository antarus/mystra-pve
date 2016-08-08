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

}
