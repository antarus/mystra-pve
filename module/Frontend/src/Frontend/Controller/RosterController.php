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
class RosterController extends FrontController {

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
     * Retourne l'ecran de detail d'un raid.
     *
     * @return le template de la page detail.
     */
    public function statsAction() {
        $oRoster = $this->valideKey();
        
        if (!$oRoster) {
            return $this->redirect()->toRoute('home');
        }
        
        $key = $oRoster->getKey();
        $iIdRaid = $this->params()->fromRoute('idRaid');
        
        try {
            $aStat = array();
            $aPallier = array();
            
            $aRoster = $oRoster->getArrayCopy();


            $aStat = $this->getTableRoster()->getStatRoster($oRoster->getNom())->getArrayCopy();
            $aPallier = $this->getTablePallier()->getPallierFrontend($oRoster->getIdRoster());
            
            // TODO Anta
            // nombre de boss tués
            // nombre des loots
            // liste des loots
            // Nombre d'objet dez
            // Nombre d'objet mis en banque
            // presence moyenne
            // presence moyenne X dernier raid
            // TODO Anta fin
        } catch (\Exception $exc) {
            $ex = \Core\Util\ParseException::getCause($exc);

            //   $msg = $this->_getServTranslator()->translate("Une erreur est survenue lors de l'affichage du détail du raid.");
            $this->_getLogService()->log(LogService::ERR, $exc->getMessage(), LogService::USER, $this->getRequest()->getPost());
            $this->flashMessenger()->addMessage($exc->getMessage(), 'error');
        }
        
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('frontend/roster/stats');
        $oViewModel->setVariable('key', $key);
        $oViewModel->setVariable('roster', $aRoster);
        $oViewModel->setVariable('stats', $aStat);
        $oViewModel->setVariable('palliers', $aPallier);
        return $oViewModel;
        
    }

}
