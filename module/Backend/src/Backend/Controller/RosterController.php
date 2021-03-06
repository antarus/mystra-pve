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
class RosterController extends \Zend\Mvc\Controller\AbstractActionController {

    private $_servTranslator = null;
    private $_tableRoster = null;
    private $_tableRole;

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
        $oViewModel->setTemplate('backend/roster/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oTable = new \Commun\Grid\RosterGrid($this->getServiceLocator(), $this->getPluginManager());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTableRoster()->getBaseQuery())
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
    }

    /**
     * Action pour la création.
     *
     * @return array
     */
    public function createAction() {
        $oForm = new \Commun\Form\RosterForm(); //new \Commun\Form\RosterForm($this->getServiceLocator());
        $oRequest = $this->getRequest();

        $oFiltre = new \Commun\Filter\RosterFilter();
        $oForm->setInputFilter($oFiltre->getInputFilter());

        if ($oRequest->isPost()) {
            $oEntite = new \Commun\Model\Roster();

            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $oEntite->exchangeArray($oForm->getData());
                try {
                    $this->getTableRoster()->beginTransaction();
                    $oEntite = $this->getTableRoster()->saveOrUpdateRoster($oEntite);
                    $this->getTableRoster()->commit();
                    $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Le roster a été créé avec succès."), 'success');
                    return $this->redirect()->toRoute('backend-roster-update', array('id' => $oEntite->getIdRoster()));
                } catch (\Exception $ex) {
                    // on rollback en cas d'erreur
                    $this->getTableRoster()->rollback();
                    $aAjaxEx = \Core\Util\ParseException::tranformeExceptionToArray($ex);

                    $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La création du roster a échoué."), 'error');
                    $this->flashMessenger()->addMessage($this->_getServTranslator()->translate($aAjaxEx['msg']), 'error');
                }
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/roster/create');
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
            $oEntite = $this->getTableRoster()->findRow($id);
            if (!$oEntite) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de roster inconnu."), 'error');
                return $this->redirect()->toRoute('backend-roster-list');
            }
        } catch (\Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération du roster."), 'error');
            return $this->redirect()->toRoute('backend-roster-list');
        }

        $oForm = new \Commun\Form\RosterForm(); //new \Commun\Form\RosterForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\RosterFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);
        $aOptRoster = array(
            'nom' => $oEntite->getNom(),
            'roles' => $this->getTableRole()->fetchAll()->toArray(),
            'key' => $oEntite->getKey()
        );
        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                try {
                    $this->getTableRoster()->beginTransaction();
                    $oEntite = $this->getTableRoster()->saveOrUpdateRoster($oEntite);
                    $this->getTableRoster()->commit();
                    $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Le roster a été modifié avec succès."), 'success');
                    return $this->redirect()->toRoute('backend-roster-list');
                } catch (\Exception $ex) {
                    // on rollback en cas d'erreur
                    $this->getTableRoster()->rollback();
                    $aAjaxEx = \Core\Util\ParseException::tranformeExceptionToArray($ex);

                    $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La modification du roster a échoué."), 'error');
                    $this->flashMessenger()->addMessage($this->_getServTranslator()->translate($aAjaxEx['msg']), 'error');
                }
            }
        }

        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/roster/update');
        $oViewModel->setVariables(array('id' => $id,
            'form' => $oForm,
            "roster" => $aOptRoster));
        return $oViewModel;
    }

    /**
     * Action pour la suppression.
     *
     * @return redirection vers la liste
     */
    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('backend-roster-list');
        }
        $oTable = $this->getTableRoster();
        $oEntite = $oTable->findRow($id);
        $oTable->delete($oEntite);
        $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La roster a été supprimé avec succès."), 'success');
        return $this->redirect()->toRoute('backend-roster-list');
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
     * Action pour l'autocomplete
     *
     * @return array
     */
    public function autocompleteAction() {
        $aParam = $this->params()->fromQuery();
        if (!isset($aParam["rech"])) {
            return array();
        }
        // TODO ne pas surchargé ici mais en JS
        $aParam = array(
            'rech' => $aParam["rech"],
            'champs_roster' => array(
                'idRoster',
                'nom'
            ),
            'limit' => 20
        );
        $aReturn = array(
            'rosters' => $this->getTableRoster()->getAutoComplete($aParam)
        );

        return new JsonModel($aReturn);
    }

}
