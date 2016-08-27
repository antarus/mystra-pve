<?php

namespace Frontend\Controller;

use Zend\View\Model\ViewModel;
use Application\Service\LogService;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidsController extends FrontController {

    private $_tableRaid;
    private $_tableRaidPersonnage;

    /**
     * Returne une instance de la table Raid en lazy.
     *
     * @return \Commun\Table\RaidsTable
     */
    public function getTableRaid() {
        if (!$this->_tableRaid) {
            $this->_tableRaid = $this->getServiceLocator()->get('\Commun\Table\RaidsTable');
        }
        return $this->_tableRaid;
    }

    /**
     * Returne une instance de la table Raid en lazy.
     *
     * @return \Commun\Table\RaidPersonnageTable
     */
    public function getTableRaidPersonnage() {
        if (!$this->_tableRaidPersonnage) {
            $this->_tableRaidPersonnage = $this->getServiceLocator()->get('\Commun\Table\RaidPersonnageTable');
        }
        return $this->_tableRaidPersonnage;
    }

    /**
     * Retourne l'ecran de liste.
     * Affiche uniquement la page. Les données sont chargées via ajax plus tard.
     *
     * @return le template de la page liste.
     */
    public function listAction() {
        $oRoster = $this->valideKey();
        if (!$oRoster) {
            return $this->redirect()->toRoute('home');
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('frontend/raids/list');
        $oViewModel->setVariable('key', $oRoster->getKey());
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oRoster = $this->valideKey();
        if (!$oRoster) {
            return $this->redirect()->toRoute('home');
        }
        $oTable = new \Frontend\Grid\RaidsGrid($this->getServiceLocator(), $this->getPluginManager(), $oRoster->getKey());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTableRaid()->getBaseQueryFrontend($oRoster->getIdRoster()))
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
    }

    /**
     * Retourne l'ecran de detail d'un raid.
     *
     * @return le template de la page detail.
     */
    public function detailAction() {
        $oRoster = $this->valideKey();
        if (!$oRoster) {
            return $this->redirect()->toRoute('home');
        }
        $aRaid = $this->getTableRaid()->select(array('idRosterTmp' => $oRoster->getIdRoster()))->toArray();
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('frontend/raids/detail');
        $oViewModel->setVariable('key', $oRoster->getKey());
        return $oViewModel;
    }

    /**
     * Retourne l'a liste des personnage ayant particpé a un raid.
     *
     * @return le template de la page detail.
     */
    public function ajaxDetailAction() {
        $oRoster = $this->valideKey();
        if (!$oRoster) {
            return $this->redirect()->toRoute('home');
        }
        $oTable = new \Frontend\Grid\RaidsGrid($this->getServiceLocator(), $this->getPluginManager(), $oRoster->getKey());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTableRaid()->getBaseQueryFrontend($oRoster->getIdRoster()))
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
    }

}
