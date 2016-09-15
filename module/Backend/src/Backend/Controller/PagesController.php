<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class PagesController extends \Zend\Mvc\Controller\AbstractActionController {

    public $_servTranslator = null;
    public $_table = null;

    /**
     * Retourne le service de traduction en mode lazy.
     *
     * @return
     */
    public function _getServTranslator() {
        if (!$this->_servTranslator) {
            $this->_servTranslator = $this->getServiceLocator()->get('translator');
        }
        return $this->_servTranslator;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return
     */
    public function getTable() {
        if (!$this->_table) {
            $this->_table = $this->getServiceLocator()->get('\Commun\Table\BossesTable');
        }
        return $this->_table;
    }

    public function aproposAction()
    {
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/pages/apropos');
        return $oViewModel;
    }

}
