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
class PersonnageController extends FrontController {

    private $_tablePallier;

    /**
     * Returne une instance de la table PallierAfficher en lazy.
     *
     * @return \Commun\Table\PallierAfficherTable
     */
    public function getTablePallier() {
        if (!$this->_tablePallier) {
            $this->_tablePallier = $this->getServiceLocator()->get('\Commun\Table\PallierAfficherTable');
        }
        return $this->_tablePallier;
    }

    /**
     * Retourne l'ecran de detail d'un raid pur un personnage
     *
     * @return le template de la page detail.
     */
    public function detailAction() {
        $oRoster = $this->valideKey();
        if (!$oRoster) {
            return $this->redirect()->toRoute('home');
        }
        $key = $oRoster->getKey();
        $iIdPers = $this->params()->fromRoute('idPers');
        $iIdRaid = $this->params()->fromRoute('idRaid');
        try {
            $aRaid = array();
            $aParticipants = array();
            $aLoots = array();
            $aRoster = $oRoster->getArrayCopy();
            // TODO Anta
            // loot dans le raid
            // nombre de raid effectué dans ce raid
            // nombre des loots de la soirée
            // liste des loots de la soirée
            // nombre de boss tué
            // TODO Anta fin
        } catch (\Exception $exc) {
            $msg = $this->_getServTranslator()->translate("Une erreur est survenue lors de l'affichage du détail du raid.");
            $this->_getLogService()->log(LogService::ERR, $exc->getMessage(), LogService::USER, $this->getRequest()->getPost());
            $this->flashMessenger()->addMessage($msg, 'error');
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('frontend/personnage/detail');
        $oViewModel->setVariable('key', $key);
        $oViewModel->setVariable('idRaid', $key);
        $oViewModel->setVariable('idPers', $iIdPers);
        $oViewModel->setVariable('roster', $aRoster);
//        $oViewModel->setVariable('raid', $aRaid);
//        $oViewModel->setVariable('participants', $aParticipants);
//        $oViewModel->setVariable('loots', $aLoots);
        return $oViewModel;
    }

    /**
     * Retourne l'ecran de stats global d'un personnage
     *
     * @return le template de la page detail.
     */
    public function statsAction() {
        $oRoster = $this->valideKey();
        if (!$oRoster) {
            return $this->redirect()->toRoute('home');
        }
        $key = $oRoster->getKey();

        $iIdPers = $this->params()->fromRoute('idPers');
        try {
            $aStat = array();

            $aRoster = $oRoster->getArrayCopy();
            // TODO Anta
            // liste des roster auquel il appartient
            // nombre de raid complet
            // nombre de raid par roster
            // nombre de boss tués
            // nombre des loots
            // liste des loots
            // presence moyenne
            // presence X dernier raid
            // TODO Anta fin
        } catch (\Exception $exc) {
            $msg = $this->_getServTranslator()->translate('Une erreur est survenue lors de l\'affichage du détail du raid.');
            $this->_getLogService()->log(LogService::ERR, $exc->getMessage(), LogService::USER, $this->getRequest()->getPost());
            $this->flashMessenger()->addMessage($msg, 'error');
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('frontend/personnage/stats');
        $oViewModel->setVariable('key', $key);
        $oViewModel->setVariable('roster', $aRoster);
//        $oViewModel->setVariable('stats', $aStat);
//        $oViewModel->setVariable('palliers', $aPallier);
        return $oViewModel;
    }

}
