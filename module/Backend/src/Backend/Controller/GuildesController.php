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
class GuildesController extends \Zend\Mvc\Controller\AbstractActionController {

    private $_servBnet;
    public $_servTranslator = null;
    public $_tableGuilde = null;
    public $_tablePersonnage = null;

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
     * Returne une instance de la table en lazy.
     *
     * @return
     */
    public function getTableGuilde() {
        if (!$this->_tableGuilde) {
            $this->_tableGuilde = $this->getServiceLocator()->get('\Commun\Table\GuildesTable');
        }
        return $this->_tableGuilde;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Core\Table\GuildesTable
     */
    public function getTablePersonnage() {
        if (!$this->_tablePersonnage) {
            $this->_tablePersonnage = $this->getServiceLocator()->get('\commun\Table\PersonnagesTable');
        }
        return $this->_tablePersonnage;
    }

    /**
      /**
     * Retourne l'ecran de liste.
     * Affiche uniquement la page. Les données sont chargées via ajax plus tard.
     *
     * @return le template de la page liste.
     */
    public function listAction() {
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/guildes/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oTable = new \Commun\Grid\GuildesGrid($this->getServiceLocator(), $this->getPluginManager());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTableGuilde()->getBaseQuery())
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
    }

    /**
     * Action pour la création.
     *
     * @return array
     */
    public function createAction() {
        $oForm = new \Commun\Form\GuildesForm(); //new \Commun\Form\GuildesForm($this->getServiceLocator());
        $oRequest = $this->getRequest();

        $oFiltre = new \Commun\Filter\GuildesFilter();
        $oForm->setInputFilter($oFiltre->getInputFilter());

        if ($oRequest->isPost()) {
            $oEntite = new \Backend\Model\Guildes();

            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $oEntite->exchangeArray($oForm->getData());
                $this->getTableGuilde()->insert($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La guilde a été créée avec succès."), 'success');
                return $this->redirect()->toRoute('backend-guildes-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/guildes/create');
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
            $oEntite = $this->getTableGuilde()->findRow($id);
            if (!$oEntite) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de guilde inconnu."), 'error');
                return $this->redirect()->toRoute('backend-guildes-list');
            }
        } catch (Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la guilde."), 'error');
            return $this->redirect()->toRoute('backend-guildes-list');
        }
        $oForm = new \Commun\Form\GuildesForm(); //new \Commun\Form\GuildesForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\GuildesFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);

        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $this->getTableGuilde()->update($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La guilde a été modifiée avec succès."), 'success');
                return $this->redirect()->toRoute('backend-guildes-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/guildes/update');
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
            return $this->redirect()->toRoute('backend-guildes-list');
        }
        $oTable = $this->getTableGuilde();
        $oEntite = $oTable->findRow($id);
        $oTable->delete($oEntite);
        $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La guilde a été supprimée avec succès."), 'success');
        return $this->redirect()->toRoute('backend-guildes-list');
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
        $aOptGuilde = array(
            'nom' => '',
            'serveur' => '', //TODO extrait les information dans la colonne Data
            'lvlMin' => '',
            'imp-membre' => 'Oui',
        );

        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/guildes/import/import');
        $oViewModel->setVariable("guilde", $aOptGuilde);
        return $oViewModel;
    }

    /**
     * Traitement de l'import Bnet.
     *
     * @return array
     */
    public function importTraitementAction() {
        $aOptGuilde = array(
            'nom' => '',
            'serveur' => '', //TODO extrait les information dans la colonne Data
            'lvlMin' => '',
            'imp-membre' => 'Oui',
        );
        $this->layout('layout/ajax');
        //$this->layout('backend/layout');
        $oRequest = $this->getRequest();

        if ($oRequest->isPost()) {
            $aPost = $oRequest->getPost();
            $this->getTableGuilde()->beginTransaction();
            try {
                $guild = $this->_getServBnet()->warcraft(new Region(Region::EUROPE))->guilds();
                $guild->on($aPost['nomServeur']);
                $aOptionBnet = array();
                if ($aPost['imp-membre'] == "Oui") {
                    $aOptionBnet[] = 'members';
                }
                $aGuildeBnet = $guild->find($aPost['nomGuilde'], $aOptionBnet);

                $aOptionFiltre = array();
                if (isset($aPost['lvlMin'])) {
                    $aOptionFiltre = array('lvlMin' => $aPost['lvlMin']);
                }
                $oGuilde = \Core\Util\ParserWow::extraitGuildeDepuisBnetGuilde($aGuildeBnet);
                $oTabGuilde = $this->getTableGuilde()->selectBy(
                        array(
                            "nom" => $oGuilde->getNom(),
                            "serveur" => $oGuilde->getServeur(),
                            "idFaction" => $oGuilde->getIdFaction()));
                // si n'existe pas on insert
                if (!$oTabGuilde) {
                    $this->getTableGuilde()->insert($oGuilde);
                    $oGuilde->setIdGuildes($this->getTableGuilde()->lastInsertValue);
                } else {
                    // sinon on update
                    $oGuilde->setIdGuildes($oTabGuilde->getIdGuildes());
                    $this->getTableGuilde()->update($oGuilde);
                }
                //$aOptGuilde['bnetData'] = $aGuilde->getData();
                if ($aPost['imp-membre'] == "Oui") {
                    $aMembreGuilde = \Core\Util\ParserWow::extraitMembreDepuisBnetGuilde($aGuildeBnet, $oGuilde, $aOptionFiltre);
                } else {
                    $aMembreGuilde = array();
                }

                foreach ($aMembreGuilde as $oPersonnage) {
                    // TODO gerer les changement possible de guilde
                    $oTabPersonnage = $this->getTablePersonnage()->selectBy(
                            array(
                                "nom" => $oPersonnage->getNom()));
                    // si n'existe pas on insert
                    if (!$oTabPersonnage) {
                        $this->getTablePersonnage()->insert($oPersonnage);
                        $oPersonnage->setIdPersonnage($this->getTablePersonnage()->lastInsertValue);
                    } else {
                        // sinon on update
                        $oPersonnage->setIdPersonnage($oTabPersonnage->getIdPersonnage());
                        $this->getTablePersonnage()->update($oPersonnage);
                    }
                }

                $this->getTableGuilde()->commit();
            } catch (\Exception $ex) {
                // on rollback en cas d'erreur
                $this->getTableGuilde()->rollback();
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la guilde."), 'error');
//
//                $oViewModel = new ViewModel();
//                $oViewModel->setTemplate('Backend/guildes/import/import');
//                $oViewModel->setVariable("guilde", $aOptGuilde);
//
//                return $oViewModel;
                return null;
            }
        }
        // Pour optimiser le rendu

        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('Backend/guildes/import/import');
        $oViewModel->setVariable("guilde", $aOptGuilde);
        //$oViewModel->setVariable("id", $iId);
        return $oViewModel;
    }

    /**
     * Affiche la fenetre d'import Bnet.
     *
     * @return array
     */
    public function import2Action() {
        $aOptGuilde = array(
            'nom' => '',
            'serveur' => '', //TODO extrait les information dans la colonne Data
            'lvlMin' => '',
            'imp-membre' => 'Oui',
        );

        $this->layout('layout/ajax');
        // Pour optimiser le rendu
        //$oViewModel = new ViewModel();

        $oViewModel = new \Zend\View\Model\JsonModel();
        $oViewModel->setTemplate('Backend/guildes/import2/import-frame');
        $oViewModel->setVariable("guilde", $aOptGuilde);
        //$oViewModel->setVariable("id", $iId);
        return $oViewModel;
    }

    /**
     * Traitement de l'import Bnet.
     *
     * @return array
     */
    public function importTraitement2Action() {
        $aOptGuilde = array(
            'nom' => '',
            'serveur' => '', //TODO extrait les information dans la colonne Data
            'lvlMin' => '',
            'imp-membre' => 'Oui',
        );
        $this->layout('layout/ajax');
        //$this->layout('backend/layout');
        $oRequest = $this->getRequest();

        if ($oRequest->isPost()) {
            $aPost = $oRequest->getPost();
            $this->getTableGuilde()->beginTransaction();
            try {
                $guild = $this->_getServBnet()->warcraft(new Region(Region::EUROPE))->guilds();
                $guild->on($aPost['nomServeur']);
                $aOptionBnet = array();
                if ($aPost['imp-membre'] == "Oui") {
                    $aOptionBnet[] = 'members';
                }
                $aGuildeBnet = $guild->find($aPost['nomGuilde'], $aOptionBnet);

                $aOptionFiltre = array();
                if (isset($aPost['lvlMin'])) {
                    $aOptionFiltre = array('lvlMin' => $aPost['lvlMin']);
                }
                $oGuilde = \Core\Util\ParserWow::extraitGuildeDepuisBnetGuilde($aGuildeBnet);
                $oTabGuilde = $this->getTableGuilde()->selectBy(
                        array(
                            "nom" => $oGuilde->getNom(),
                            "serveur" => $oGuilde->getServeur(),
                            "idFaction" => $oGuilde->getIdFaction()));
                // si n'existe pas on insert
                if (!$oTabGuilde) {
                    $this->getTableGuilde()->insert($oGuilde);
                    $oGuilde->setIdGuildes($this->getTableGuilde()->lastInsertValue);
                } else {
                    // sinon on update
                    $oGuilde->setIdGuildes($oTabGuilde->getIdGuildes());
                    $this->getTableGuilde()->update($oGuilde);
                }
                //$aOptGuilde['bnetData'] = $aGuilde->getData();
                if ($aPost['imp-membre'] == "Oui") {
                    $aMembreGuilde = \Core\Util\ParserWow::extraitMembreDepuisBnetGuilde($aGuildeBnet, $oGuilde, $aOptionFiltre);
                } else {
                    $aMembreGuilde = array();
                }

                $adapter = new \Zend\ProgressBar\Adapter\JsPush();
                //$adapter = new \Core\Adapter\JsPush();
                // $adapter = new \Core\Adapter\AjaxPush();
                $adapter->setUpdateMethodName('progressImportPersonnage');

                // $adapter->setFinishMethodName('progressImportPersonnageFin');
                $progressBar = new \Zend\ProgressBar\ProgressBar($adapter, 0, count($aMembreGuilde), 'importWow');
                $iCpt = 1;
                //     $tabPersonnage = /* new \Core\Table\PersonnagesTable(); */ $this->getServiceLocator()->get('\Commun\Table\PersonnagesTable');
                foreach ($aMembreGuilde as $oPersonnage) {
                    // TODO gerer les changement possible de guilde
                    $oTabPersonnage = $this->getTablePersonnage()->selectBy(
                            array(
                                "nom" => $oPersonnage->getNom()));
                    // si n'existe pas on insert
                    if (!$oTabPersonnage) {
                        $this->getTablePersonnage()->insert($oPersonnage);
                        $oPersonnage->setIdPersonnage($this->getTablePersonnage()->lastInsertValue);
                    } else {
                        // sinon on update
                        $oPersonnage->setIdPersonnage($oTabPersonnage->getIdPersonnage());
                        $this->getTablePersonnage()->update($oPersonnage);
                    }
                    $progressBar->update($iCpt, $oPersonnage->getNom());
                    $iCpt++;
                }
                $progressBar->finish();
                $this->getTableGuilde()->commit();
            } catch (\Exception $ex) {
                // on rollback en cas d'erreur
                $this->getTableGuilde()->rollback();
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la guilde."), 'error');
                return $this->redirect()->toRoute('backend-guildes-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new \Zend\View\Model\JsonModel();
        $oViewModel->setTemplate('Backend/guildes/import2/import');
        $oViewModel->setVariable("guilde", $aOptGuilde);
        //$oViewModel->setVariable("id", $iId);
        return $oViewModel;
    }

}
