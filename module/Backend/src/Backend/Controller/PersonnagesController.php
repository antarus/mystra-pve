<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Mystra
 */
class PersonnagesController extends \Zend\Mvc\Controller\AbstractActionController {

    private $_servTranslator = null;
    private $_table = null;

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
     * @return \Commun\Table\PersonnagesTable
     */
    public function getTablePersonnage() {
        if (!$this->_table) {
            $this->_table = $this->getServiceLocator()->get('\Commun\Table\PersonnagesTable');
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
        $oViewModel->setTemplate('backend/personnages/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oTable = new \Commun\Grid\PersonnagesGrid($this->getServiceLocator(), $this->getPluginManager());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTablePersonnage()->getBaseQuery())
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
    }

    /**
     * Action pour la création.
     *
     * @return array
     */
    public function createAction() {
        $oForm = new \Commun\Form\PersonnagesForm(); //new \Commun\Form\PersonnagesForm($this->getServiceLocator());
        $oRequest = $this->getRequest();

        $oFiltre = new \Commun\Filter\PersonnagesFilter();
        $oForm->setInputFilter($oFiltre->getInputFilter());

        if ($oRequest->isPost()) {
            $oEntite = new \Backend\Model\Personnages();

            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $oEntite->exchangeArray($oForm->getData());
                $this->getTablePersonnage()->insert($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La personnages a été créé avec succès."), 'success');
                return $this->redirect()->toRoute('backend-personnages-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/personnages/create');
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
            $oEntite = $this->getTablePersonnage()->findRow($id);
            if (!$oEntite) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de personnages inconnu."), 'error');
                return $this->redirect()->toRoute('backend-personnages-list');
            }
        } catch (Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la personnages."), 'error');
            return $this->redirect()->toRoute('backend-personnages-list');
        }
        $oForm = new \Commun\Form\PersonnagesForm(); //new \Commun\Form\PersonnagesForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\PersonnagesFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);

        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $this->getTablePersonnage()->update($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La personnages a été modifié avec succès."), 'success');
                return $this->redirect()->toRoute('backend-personnages-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/personnages/update');
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
            return $this->redirect()->toRoute('backend-personnages-list');
        }
        $oTable = $this->getTablePersonnage();
        $oEntite = $oTable->findRow($id);
        $oTable->delete($oEntite);
        $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La personnages a été supprimé avec succès."), 'success');
        return $this->redirect()->toRoute('backend-personnages-list');
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
        $aOptPersonnage = array(
            'nom' => '',
            'serveur' => '',
        );

        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/personnages/import/import');
        $oViewModel->setVariable("perso", $aOptPersonnage);
        return $oViewModel;
    }

    /**
     * Traitement de l'import Bnet.
     *
     * @return array
     */
    public function importTraitementAction() {
        $aOptPersonnage = array(
            'nom' => '',
            'serveur' => '',
        );
        $this->layout('layout/ajax');
        //$this->layout('backend/layout');
        $oRequest = $this->getRequest();

        if ($oRequest->isPost()) {
            $aPost = $oRequest->getPost();
            $this->getTablePersonnage()->beginTransaction();
            try {
                $this->getTablePersonnage()->importPersonnage($aPost);
                $this->getTablePersonnage()->commit();
            } catch (\Exception $ex) {
                // on rollback en cas d'erreur
                $this->getTablePersonnage()->rollback();
                $aAjaxEx = \Core\Util\ParseException::tranformeExceptionToAjax($ex);
                $result = new JsonModel(array(
                    'error' => $aAjaxEx
                ));
                return $result;
            }
        }
        $result = new JsonModel(array(
            'success' => array(
                'msg' => $this->_getServTranslator()->translate('Personnage importé avec succès')
            )
        ));
        return $result;
    }

}
