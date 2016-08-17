<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class ClassesController extends \Zend\Mvc\Controller\AbstractActionController {

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
            $this->_table = $this->getServiceLocator()->get('\Commun\Table\ClassesTable');
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
        $oViewModel->setTemplate('backend/classes/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oTable = new \Commun\Grid\ClassesGrid($this->getServiceLocator(), $this->getPluginManager());
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
        $oForm = new \Commun\Form\ClassesForm(); //new \Commun\Form\ClassesForm($this->getServiceLocator());
        $oRequest = $this->getRequest();

        $oFiltre = new \Commun\Filter\ClassesFilter();
        $oForm->setInputFilter($oFiltre->getInputFilter());

        if ($oRequest->isPost()) {
            $oEntite = new \Commun\Model\Classes();

            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $oEntite->exchangeArray($oForm->getData());
                $this->getTable()->insert($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La classe a été créée avec succès."), 'success');
                return $this->redirect()->toRoute('backend-classes-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/classes/create');
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
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de classe inconnue."), 'error');
                return $this->redirect()->toRoute('backend-classes-list');
            }
        } catch (Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la classes."), 'error');
            return $this->redirect()->toRoute('backend-classes-list');
        }
        $oForm = new \Commun\Form\ClassesForm(); //new \Commun\Form\ClassesForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\ClassesFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);

        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $this->getTable()->update($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La classe a été modifiée avec succès."), 'success');
                return $this->redirect()->toRoute('backend-classes-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/classes/update');
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
            return $this->redirect()->toRoute('backend-classes-list');
        }
        $oTable = $this->getTable();
        $oEntite = $oTable->findRow($id);
        $oTable->delete($oEntite);
        $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La classe a été supprimée avec succès."), 'success');
        return $this->redirect()->toRoute('backend-classes-list');
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
