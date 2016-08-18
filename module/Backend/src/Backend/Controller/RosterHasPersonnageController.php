<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class RosterHasPersonnageController extends \Zend\Mvc\Controller\AbstractActionController {

    public $_servTranslator = null;
    private $_tableRosterHasPersonnage = null;
    private $_tableRole = null;
    private $_tableRoster = null;

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
     * @return \Commun\Table\RosterHasPersonnageTable
     */
    public function getTableRosterHasPersonnage() {
        if (!$this->_tableRosterHasPersonnage) {
            $this->_tableRosterHasPersonnage = $this->getServiceLocator()->get('\Commun\Table\RosterHasPersonnageTable');
        }
        return $this->_tableRosterHasPersonnage;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\RosterTable
     */
    public function getTableRoster() {
        if (!$this->_tableRoster) {
            $this->_tableRoster = $this->getServiceLocator()->get('\Commun\Table\RosterTable');
        }
        return $this->_tableRoster;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\RoleTable
     */
    public function getTableRole() {
        if (!$this->_tableRole) {
            $this->_tableRole = $this->getServiceLocator()->get('\Commun\Table\RoleTable');
        }
        return $this->_tableRole;
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
        $oViewModel->setTemplate('backend/roster-has-personnage/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing des personnage pour un role.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $idRole = (int) $this->params()->fromRoute('idRole', 0);
        $idRoster = (int) $this->params()->fromRoute('idRoster', 0);
        $oTable = new \Commun\Grid\RosterHasPersonnageGrid($this->getServiceLocator(), $this->getPluginManager());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTableRosterHasPersonnage()->getListePersonnage($idRole, $idRoster))
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
    }

    /**
     * Action pour la création.
     *
     * @return array
     */
    public function addAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        try {
            $oEntite = $this->getTableRoster()->findRow($id);
            if (!$oEntite) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de roster inconnu."), 'error');
                return $this->redirect()->toRoute('backend-roster-list');
            }
        } catch (\Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération du roster."), 'error');
            return $this->redirect()->toRoute('backend-roster-list');
        }

        $this->layout('layout/ajax');

        $oRequest = $this->getRequest();

        $aOptAddPlayerToRoster = array(
            'nomRoster' => $oEntite->getNom(),
            'nom' => '',
            'idPerso' => 0,
            'apply' => false,
            'roles' => $this->getTableRole()->fetchAll()->toArray()
        );
        if ($oRequest->isPost()) {
            $oEntiteRhP = new \Commun\Model\RosterHasPersonnage();
            $aPost = $oRequest->getPost();

            if ($aPost["idPersonnage"] == 0) {
                return new JsonModel(array(
                    'error' => array(
                        'msg' => 'veuillez sélectionné un personnage valide.'
                    )
                ));
            }

            $oForm = new \Commun\Form\RosterHasPersonnageForm(); //new \Commun\Form\RosterHasPersonnageForm($this->getServiceLocator());
            $oFiltre = new \Commun\Filter\RosterHasPersonnageFilter();
            $oEntiteRhP->setInputFilter($oFiltre->getInputFilter());

            $oForm->setData($aPost);

            if ($oForm->isValid()) {
                $oEntiteRhP->exchangeArray($oForm->getData());
                try {
                    $this->getTableRosterHasPersonnage()->beginTransaction();
                    $this->getTableRosterHasPersonnage()->saveOrUpdateRosterPersonnage($oEntiteRhP);
                    $this->getTableRosterHasPersonnage()->commit();
                    $result = new JsonModel(array(
                        'success' => array(
                            'msg' => $this->_getServTranslator()->translate('Personnage ajouté avec succès')
                        )
                    ));
                } catch (\Exception $ex) {
                    // on rollback en cas d'erreur
                    $this->getTableRosterHasPersonnage()->rollback();
                    $aAjaxEx = \Core\Util\ParseException::tranformeExceptionToArray($ex);
                    $result = new JsonModel(array(
                        'error' => $aAjaxEx
                    ));
                }
                return $result;
            }
        }


        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        //disable layout if request by Ajax
        $oViewModel->setTerminal($oRequest->isXmlHttpRequest());
        $oViewModel->setTemplate('backend/roster-has-personnage/add');
        return $oViewModel->setVariables(array('id' => $id, 'player' => $aOptAddPlayerToRoster));
    }

    /**
     * Action pour la mise à jour.
     *
     * @return array
     */
    public function updateAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        try {
            $oEntite = $this->getTableRosterHasPersonnage()->findRow($id);
            if (!$oEntite) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de roster-has-personnage inconnu."), 'error');
                return $this->redirect()->toRoute('backend-roster-has-personnage-list');
            }
        } catch (\Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la roster-has-personnage."), 'error');
            return $this->redirect()->toRoute('backend-roster-has-personnage-list');
        }
        $oForm = new \Commun\Form\RosterHasPersonnageForm(); //new \Commun\Form\RosterHasPersonnageForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\RosterHasPersonnageFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);

        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $this->getTableRosterHasPersonnage()->update($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La roster-has-personnage a été modifié avec succès."), 'success');
                return $this->redirect()->toRoute('backend-roster-has-personnage-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/roster-has-personnage/update');
        return $oViewModel->setVariables(array('id' => $id, 'form' => $oForm));
    }

    /**
     * Action pour la suppression.
     *
     * @return redirection vers la liste
     */
    public function deleteAction() {
        $idPerso = (int) $this->params()->fromRoute('idPerso', 0);
        $idRoster = (int) $this->params()->fromRoute('idRoster', 0);


        if (!$idPerso) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Impossible de trouver le lien roster personnage a supprimer."), 'error');
            return $this->redirect()->toRoute('backend-roster-update', array('id' => $idRoster));
        }
        try {
            $this->getTableRosterHasPersonnage()->supprimerRosterPersonnage($idRoster, $idPerso);
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Le personnage a été supprimé du roster avec succès."), 'success');
        } catch (\Exception $ex) {
            // on rollback en cas d'erreur
            $this->getTableRosterHasPersonnage()->rollback();
            $aAjaxEx = \Core\Util\ParseException::tranformeExceptionToArray($ex);

            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Erreur lors de la suppression du personnage du roster."), 'error');
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate($aAjaxEx['msg']), 'error');
        }

        return $this->redirect()->toRoute('backend-roster-update', array('id' => $idRoster));
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

}
