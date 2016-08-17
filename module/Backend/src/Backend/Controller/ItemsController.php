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
class ItemsController extends \Zend\Mvc\Controller\AbstractActionController {

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
     * @return \Commun\Table\ItemsTable
     */
    public function getTable() {
        if (!$this->_table) {
            $this->_table = $this->getServiceLocator()->get('\Commun\Table\ItemsTable');
        }
        return $this->_table;
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
        $oViewModel->setTemplate('backend/items/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oTable = new \Commun\Grid\ItemsGrid($this->getServiceLocator(), $this->getPluginManager());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTable()->getBaseQuery())
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
    }

    /**
     * Action pour la création.
     *
     * @return array
     */
    public function createAction() {
        $oForm = new \Commun\Form\ItemsForm(); //new \Commun\Form\ItemsForm($this->getServiceLocator());
        $oRequest = $this->getRequest();

        $oFiltre = new \Commun\Filter\ItemsFilter();
        $oForm->setInputFilter($oFiltre->getInputFilter());

        if ($oRequest->isPost()) {
            $oEntite = new \Commun\Model\Items();

            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $oEntite->exchangeArray($oForm->getData());
                $this->getTable()->insert($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La items a été créé avec succès."), 'success');
                return $this->redirect()->toRoute('backend-items-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/items/create');
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
            $oEntite = $this->getTable()->findRow($id);
            if (!$oEntite) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de items inconnu."), 'error');
                return $this->redirect()->toRoute('backend-items-list');
            }
        } catch (Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la items."), 'error');
            return $this->redirect()->toRoute('backend-items-list');
        }
        $oForm = new \Commun\Form\ItemsForm(); //new \Commun\Form\ItemsForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\ItemsFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);

        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $this->getTable()->update($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La items a été modifié avec succès."), 'success');
                return $this->redirect()->toRoute('backend-items-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/items/update');
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
            return $this->redirect()->toRoute('backend-items-list');
        }
        $oTable = $this->getTable();
        $oEntite = $oTable->findRow($id);
        $oTable->delete($oEntite);
        $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La items a été supprimé avec succès."), 'success');
        return $this->redirect()->toRoute('backend-items-list');
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
        $aOptItem = array(
            'id' => '');

        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/items/import/import');
        $oViewModel->setVariable("item", $aOptItem);
        return $oViewModel;
    }

    /**
     * Traitement de l'import Bnet.
     *
     * @return array
     */
    public function importTraitementAction() {
        $aOptItem = array(
            'id' => '');

        $this->layout('layout/ajax');
        //$this->layout('backend/layout');
        $oRequest = $this->getRequest();

        if ($oRequest->isPost()) {
            $aPost = $oRequest->getPost();
            $this->getTable()->beginTransaction();
            try {
                $this->getTable()->importItem($aPost);
                $this->getTable()->commit();
            } catch (\Exception $ex) {
                // on rollback en cas d'erreur
                $this->getTable()->rollback();
                $aAjaxEx = \Core\Util\ParseException::tranformeExceptionToAjax($ex);
                $result = new JsonModel(array(
                    'error' => $aAjaxEx
                ));
                return $result;
            }
        }
        $result = new JsonModel(array(
            'success' => array(
                'msg' => $this->_getServTranslator()->translate('Item importé avec succès')
            )
        ));
        return $result;
    }

}
