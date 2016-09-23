<?php

namespace Frontend\Controller;

use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
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
    private $_tableItemPersonnageRaid;
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
     * Returne une instance de la table Raid en lazy.
     *
     * @return \Commun\Table\ItemPersonnageRaidTable
     */
    public function getTableItemPersonnageRaid() {
        if (!$this->_tableItemPersonnageRaid) {
            $this->_tableItemPersonnageRaid = $this->getServiceLocator()->get('\Commun\Table\ItemPersonnageRaidTable');
        }
        return $this->_tableItemPersonnageRaid;
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
        $key = $oRoster->getKey();
        try {
            $aStat = array();
            $aPallier = array();
            $aRoster = $oRoster->getArrayCopy();

            $aStat = $this->getTableRoster()->getStatRoster($oRoster->getNom())->getArrayCopy();
            $aPallier = $this->getTablePallier()->getPallierFrontend($oRoster->getIdRoster());

        } catch (\Exception $exc) {
            
            $this->_getLogService()->log(LogService::ERR, $exc->getMessage(), LogService::USER, $this->getRequest()->getPost());
            $this->flashMessenger()->addMessage($exc->getMessage(), 'error');
        }
        
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('frontend/raids/list');
        $oViewModel->setVariable('key', $oRoster->getKey());
        $oViewModel->setVariable('roster', $aRoster);
        $oViewModel->setVariable('stats', $aStat);
        $oViewModel->setVariable('palliers', $aPallier);
        return $oViewModel;
    }
    
    public function  ajaxLootDonationTiersAction()
    {
        $oRoster = $this->valideKey();
        $aLootRosterFormat = array();
        if (!$oRoster) {
            return $this->redirect()->toRoute('home');
        }      
        try{
            $aLootRoster = $this->getTableItemPersonnageRaid()->getLootPallierRoster($oRoster->getIdRoster());
            foreach ($aLootRoster as $lootRoster)
            {
                $aLootRosterFormat[$lootRoster['note']]= $lootRoster['nbLoot'];
            }
            
        } catch (Exception $exc) {
            $this->_getLogService()->log(LogService::ERR, $exc->getMessage(), LogService::USER, $this->getRequest()->getPost());
            $this->flashMessenger()->addMessage($exc->getMessage(), 'error');
        }
        return new JsonModel($aLootRosterFormat);
    }
    
    public function  ajaxLootDonationRaidAction()
    {
        $oRoster = $this->valideKey();
        $aLootRaidFormat = array();
        $aRequest = $this->getRequest();
        $aPost = $aRequest->getPost();
        if($aPost['idRaid'])
        {
            $iIdRaid = $aPost['idRaid'];
            
            if (!$oRoster) {
                return $this->redirect()->toRoute('home');
            }      
            try{
                $aLootRaid = $this->getTableItemPersonnageRaid()->getLootRosterRaid($oRoster->getIdRoster(),$iIdRaid);
                foreach ($aLootRaid as $lootRaid)
                {
                    $aLootRaidFormat[$lootRaid['note']]= $lootRaid['nbLoot'];
                }

            } catch (Exception $exc) {
                $this->_getLogService()->log(LogService::ERR, $exc->getMessage(), LogService::USER, $this->getRequest()->getPost());
                $this->flashMessenger()->addMessage($exc->getMessage(), 'error');
            }
            return new JsonModel($aLootRaidFormat);
        }
        return new JsonModel();
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
        $key = $oRoster->getKey();
        $iIdRaid = $this->params()->fromRoute('idRaid');
        try {
            $aRaid = array();
            $aParticipants = array();
            $aLoots = array();
            $aRoster = $oRoster->getArrayCopy();
            $nbrRosterABS = 0;

            $aRaid = $this->getTableRaid()->getRaid($iIdRaid);
            $dformated = new \DateTime($aRaid['date']);
            $aRaid['date'] = $dformated->format('d/m/Y à H:i:s');
            
            $aParticipants = $this->getTableRaidPersonnage()->getParticipantRaid($aRaid['idRaid']);
            $aLootNotri = $this->addLienWowHeadItem($this->getTableItemPersonnageRaid()->getLootRaid($aRaid['idRaid']));

            $aRosterList = $this->getTableRosterHasPersonnage()->getListePersonnage(null,$aRoster['idRoster']);

            $nbrRoster = array_count_values(array_map(function($aParticipants){
                      return $aParticipants['roster'];
                   },$aParticipants));
                      
            foreach ($aRosterList as $r)
            {
                $abs = true;
                foreach ( $aParticipants as $p)
                    if($r['idPersonnage'] == $p['idPersonnage']) $abs = false;
                
                if($abs)
                {
                    $nbrRosterABS ++;
                    $aParticipants[] = array(
                        'idRaid' => $aRoster['idRoster'],
                        'idPersonnage' => $r['idPersonnage'],
                        'personnage_nom' =>$r['nom'],
                        'personnage_royaume' =>$r['royaume'],
                        'ilvl' => $r['ilvl'],
                        'classe_couleur' => $r['couleur'],
                        'roster' => 1,
                        'apply' => $r['isApply'],
                        'abs' => true,
                    );
                }
            }
            
            // formatage d'un tableau de couleur par participants.
            $aCouleur = array_map(function($aParticipants){
             return  $aParticipants['classe_couleur'];
            },$aParticipants);
            
            // tri par boss et reformat bank / disenchant
            foreach($aLootNotri as $l)
            {
                if($l['royaume_personnage'] === 'bank')
                {
                    $l['nom_personnage'] = $this->_getServTranslator()->translate('Mis en Banque de guilde');
                    $l['spe'] ='';
                }
                if($l['royaume_personnage'] === 'disenchant')
                {
                    $l['nom_personnage'] = $this->_getServTranslator()->translate('Envoyé pour désenchantement');
                    $l['spe'] ='';
                }
                $aLoots[$l['boss']][] = $l;
            }
        } catch (\Exception $exc) {
            $msg = $this->_getServTranslator()->translate("Une erreur est survenue lors de l'affichage du détail du raid.");
            $this->_getLogService()->log(LogService::ERR, $exc->getMessage(), LogService::USER, $this->getRequest()->getPost());
            $this->flashMessenger()->addMessage($msg, 'error');
        }
        
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('frontend/raids/detail');
        $oViewModel->setVariable('key', $key);
        $oViewModel->setVariable('roster', $aRoster);
        $oViewModel->setVariable('raid', $aRaid);
        $oViewModel->setVariable('nbrRosterPresent', (isset($nbrRoster[1]))?$nbrRoster[1]:0);
        $oViewModel->setVariable('nbrNonRoster', (isset($nbrRoster[0]))?$nbrRoster[0]:0);
        $oViewModel->setVariable('nbrRoster', count($aRosterList));
        $oViewModel->setVariable('participants', $aParticipants);
        $oViewModel->setVariable('loots', $aLoots);
        $oViewModel->setVariable('couleur', $aCouleur);
        $oViewModel->setVariable('nbrRosterABS', $nbrRosterABS);
        return $oViewModel;
    }

    /**
     * Ajoute les liens wowhead au loots.
     * @param array $aLoots
     * @return array
     */
    private function addLienWowHeadItem($aLoots) {
        foreach ($aLoots as $key => $loot) {
            $wowhead['idBnet'] = $loot['idBnet'];
            $wowhead['bonus'] = $loot['bonus'];
            $aLoots[$key]['wowHead'] = \Core\Util\ParserWow::genereLienItemWowHead($wowhead);
        }
        return $aLoots;
    }

}
