<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;
use \Bnet\Region;
use \Bnet\ClientFactory;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Mystra
 */
class ZoneController extends \Zend\Mvc\Controller\AbstractActionController {

    private $_servBnet;
    private $_servTranslator = null;
    private $_tableZone = null;
    private $_tableBoss = null;
    private $_tableNpc = null;
    private $_tableBossesHasNpc = null;
    private $_tableZoneHasBosses = null;
    private $_tableZoneHasModeDiffculte = null;
    private $_tableModeDifficulte = null;

    /**
     * Retourne le service de battlnet.
     * @return \Bnet\ClientFactory
     */
    private function _getServBnet() {
        if (!$this->_servBnet) {
            $this->_servBnet = $this->getServiceLocator()->get('Bnet\ClientFactory');
        }
        return $this->_servBnet;
    }

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
     * Returne une instance de la table szone  en lazy.
     *
     * @return
     */
    public function getTableZone() {
        if (!$this->_tableZone) {
            $this->_tableZone = $this->getServiceLocator()->get('\Commun\Table\ZoneTable');
        }
        return $this->_tableZone;
    }

    /**
     * Returne une instance de la table szone  en lazy.
     *
     * @return
     */
    public function getTableBoss() {
        if (!$this->_tableBoss) {
            $this->_tableBoss = $this->getServiceLocator()->get('\Commun\Table\BossesTable');
        }
        return $this->_tableBoss;
    }

    /**
     * Returne une instance de la table npc  en lazy.
     *
     * @return
     */
    public function getTableNpc() {
        if (!$this->_tableNpc) {
            $this->_tableNpc = $this->getServiceLocator()->get('\Commun\Table\NpcTable');
        }
        return $this->_tableNpc;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return
     */
    public function getTableBossesHasNpc() {
        if (!$this->_tableBossesHasNpc) {
            $this->_tableBossesHasNpc = $this->getServiceLocator()->get('\Commun\Table\BossesHasNpcTable');
        }
        return $this->_tableBossesHasNpc;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return
     */
    public function getTableZoneHasBosses() {
        if (!$this->_tableZoneHasBosses) {
            $this->_tableZoneHasBosses = $this->getServiceLocator()->get('\Commun\Table\ZoneHasBossesTable');
        }
        return $this->_tableZoneHasBosses;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return
     */
    public function getTableZoneHasModeDiffculte() {
        if (!$this->_tableZoneHasModeDiffculte) {
            $this->_tableZoneHasModeDiffculte = $this->getServiceLocator()->get('\Commun\Table\ZoneHasModeDiffculteTable');
        }
        return $this->_tableZoneHasModeDiffculte;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return
     */
    public function getTableModeDifficulte() {
        if (!$this->_tableModeDifficulte) {
            $this->_tableModeDifficulte = $this->getServiceLocator()->get('\Commun\Table\ModeDifficulteTable');
        }
        return $this->_tableModeDifficulte;
    }

    /**
     * Retourne l'ecran de liste.
     * Affiche uniquement la page. Les données sont chargées via ajax plus tard.
     *
     * @return le template de la page liste.
     */
    public function listAction() {
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/zone/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oTable = new \Commun\Grid\ZoneGrid($this->getServiceLocator(), $this->getPluginManager());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTableZone()->getBaseQuery())
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
    }

    /**
     * Action pour la création.
     *
     * @return array
     */
    public function createAction() {
        $oForm = new \Commun\Form\ZoneForm(); //new \Commun\Form\ZoneForm($this->getServiceLocator());
        $oRequest = $this->getRequest();

        $oFiltre = new \Commun\Filter\ZoneFilter();
        $oForm->setInputFilter($oFiltre->getInputFilter());

        if ($oRequest->isPost()) {
            $oEntite = new \Backend\Model\Zone();

            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $oEntite->exchangeArray($oForm->getData());
                $this->getTableZone()->insert($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La zone a été créé avec succès."), 'success');
                return $this->redirect()->toRoute('backend-zone-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/zone/create');
        return $oViewModel->setVariables(array('form' => $oForm));
    }

    /**
     * Action pour la mise à jour.
     *
     * @return array
     */
    public function updateAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        try {
            $oEntite = $this->getTableZone()->findRow($id);
            if (!$oEntite) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de zone inconnu."), 'error');
                return $this->redirect()->toRoute('backend-zone-list');
            }
        } catch (Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la zone."), 'error');
            return $this->redirect()->toRoute('backend-zone-list');
        }
        $oForm = new \Commun\Form\ZoneForm(); //new \Commun\Form\ZoneForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\ZoneFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);

        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $this->getTableZone()->update($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La zone a été modifié avec succès."), 'success');
                return $this->redirect()->toRoute('backend-zone-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/zone/update');
        return $oViewModel->setVariables(array('id' => $id, 'form' => $oForm));
    }

    /**
     * Action pour la suppression.
     *
     * @return redirection vers la liste
     */
    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('backend-zone-list');
        }
        $oTable = $this->getTableZone();
        $oEntite = $oTable->findRow($id);
        $oTable->delete($oEntite);
        $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La zone a été supprimé avec succès."), 'success');
        return $this->redirect()->toRoute('backend-zone-list');
    }

    /**
     * Retourne l'adapter associé a ce modèle.
     *
     * @return \Zend\Db\Adapter\Adapter
     */
    public function getAdapter() {
        return $this->getServiceLocator()->get('\Zend\Db\Adapter\Adapter');
    }

    /**
     * Retourne une response en tant que html.
     *
     * @return page html
     */
    public function htmlResponse($html) {
        $response = $this->getResponse()
                ->setStatusCode(200)
                ->setContent($html);
        return $response;
    }

    /**
     * Affiche la fenetre d'import Bnet.
     *
     * @return array
     */
    public function importAction() {
        $aOptZone = array(
            'id' => '',
            'imp-boss' => 'Oui',
        );

        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/zone/import/import');
        $oViewModel->setVariable("zone", $aOptZone);
        return $oViewModel;
    }

    /**
     * Traitement de l'import Bnet.
     *
     * @return array
     */
    public function importTraitementAction() {
        $aOptZone = array(
            'id' => '',
            'imp-boss' => 'Oui',
        );
        $this->layout('layout/ajax');
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/zone/import/import');
        $oViewModel->setVariable("zone", $aOptZone);

        $oRequest = $this->getRequest();

        if ($oRequest->isPost()) {
            $aPost = $oRequest->getPost();
            $this->getTableZone()->beginTransaction();
            try {
                $zone = $this->_getServBnet()->warcraft(new Region(Region::EUROPE, "fr_FR"))->zones();
                $aZoneBnet = $zone->find($aPost['idZone']);

                $oZone = \Core\Util\ParserWow::extraitZoneDepuisBnetZone($aZoneBnet);
                $oTabZone = $this->getTableZone()->selectBy(
                        array(
                            "idZone" => $oZone->getIdZone()));
                // si n'existe pas on insert
                if (!$oTabZone) {
                    $this->getTableZone()->insert($oZone);
                } else {
                    // sinon on update
                    $this->getTableZone()->update($oZone);
                }
                //mode de difficulté
                //supprime toutes les clé correpsondnat au boss dans la table BossesHasModeDifficulté
                $oTabZoneHasDifficulte = $this->getTableZoneHasModeDiffculte()->selectBy(
                        array("idZone" => $oZone->getIdZone()));
                if ($oTabZoneHasDifficulte) {
                    if (is_array($oTabZoneHasDifficulte)) {
                        foreach ($oTabZoneHasDifficulte as $oDiff) {
                            $this->getTableZoneHasModeDiffculte()->delete($oDiff);
                        }
                    } else {
                        $this->getTableZoneHasModeDiffculte()->delete($oTabZoneHasDifficulte);
                    }
                }
                foreach ($oZone->getModeDifficulte() as $oDiff) {
                    $oTabModeDifficulte = $this->getTableModeDifficulte()->selectBy(
                            array("nom_bnet" => $oDiff));
                    $oZoneHasModeDiff = new \Commun\Model\ZoneHasModeDiffculte();
                    $oZoneHasModeDiff->setIdZone($oZone->getIdZone());
                    $oZoneHasModeDiff->setIdMode($oTabModeDifficulte->getIdMode());
                    $this->getTableZoneHasModeDiffculte()->insert($oZoneHasModeDiff);
                }

                if ($aPost['imp-boss'] == "Oui") {
                    $aBossZone = \Core\Util\ParserWow::extraitBossDepuisBnetZone($aZoneBnet, $oZone);
                } else {
                    $aBossZone = array();
                }
                //supprime toutes les clé correpsondnat au zone dans la table ZoneHasBosses
                $oTabZoneHasBoss = $this->getTableZoneHasBosses()->selectBy(
                        array("idZone" => $oZone->getIdZone()));
                if ($oTabZoneHasBoss) {
                    if (is_array($oTabZoneHasBoss)) {
                        foreach ($oTabZoneHasBoss as $oZoneHasBoss) {
                            $this->getTableZoneHasBosses()->delete($oZoneHasBoss);
                        }
                    } else {
                        $this->getTableZoneHasBosses()->delete($oTabZoneHasBoss);
                    }
                }
                foreach ($aBossZone as $oBoss) {
                    // table boss
                    $oTabBoss = $this->getTableBoss()->selectBy(
                            array("idBosses" => $oBoss->getIdBosses()));
                    // si n'existe pas on insert
                    if (!$oTabBoss) {
                        $this->getTableBoss()->insert($oBoss);
                    } else {
                        // sinon on update
                        $this->getTableBoss()->update($oBoss);
                    }
                    // table npc
                    //supprime toutes les clé correpsondnat au boss dans la table BossesHasNpc
                    $oTabBossHasNpc = $this->getTableBossesHasNpc()->selectBy(
                            array("idBosses" => $oBoss->getIdBosses()));
                    if ($oTabBossHasNpc) {
                        if (is_array($oTabBossHasNpc)) {
                            foreach ($oTabBossHasNpc as $oNpc) {
                                $this->getTableBossesHasNpc()->delete($oNpc);
                            }
                        } else {
                            $this->getTableBossesHasNpc()->delete($oTabBossHasNpc);
                        }
                    }
                    foreach ($oBoss->getNpc() as $oNpc) {

                        $oTabNpc = $this->getTableNpc()->selectBy(
                                array("idNpc" => $oNpc->getIdNpc()));
                        // si n'existe pas on insert
                        if (!$oTabNpc) {
                            $this->getTableNpc()->insert($oNpc);
                        } else {
                            // sinon on update
                            $this->getTableNpc()->update($oNpc);
                        }
                        $oBossHasNpc = new \Commun\Model\BossesHasNpc();
                        $oBossHasNpc->setIdBosses($oBoss->getIdBosses());
                        $oBossHasNpc->setIdNpc($oNpc->getIdNpc());
                        $this->getTableBossesHasNpc()->insert($oBossHasNpc);
                    }
                    $oZoneHasBoss = new \Commun\Model\ZoneHasBosses();
                    $oZoneHasBoss->setIdBosses($oBoss->getIdBosses());
                    $oZoneHasBoss->setIdZone($oZone->getIdZone());
                    $this->getTableZoneHasBosses()->insert($oZoneHasBoss);
                }

                $this->getTableZone()->commit();
            } catch (\Exception $ex) {
                var_dump($ex);
                // on rollback en cas d'erreur
                $this->getTableZone()->rollback();
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la zone."), 'error');
                return null;
            }
        }

        //$oViewModel->setVariable("id", $iId);
        return $oViewModel;
    }

}
