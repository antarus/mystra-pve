<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class BossesController extends \Zend\Mvc\Controller\AbstractActionController {

    public $_servTranslator = null;
    public $_table = null;
    private $_logService;

    /**
     * Lazy getter pour le service de logs
     * @return \Application\Service\LogService
     */
    protected function _getLogService() {
        return $this->_logService ?
                $this->_logService :
                $this->_logService = $this->getServiceLocator()->get('LogService');
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
    public function getTable() {
        if (!$this->_table) {
            $this->_table = $this->getServiceLocator()->get('\Commun\Table\BossesTable');
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
        $oViewModel->setTemplate('backend/bosses/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oTable = new \Commun\Grid\BossesGrid($this->getServiceLocator(), $this->getPluginManager());
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
        $oForm = new \Commun\Form\BossesForm(); //new \Commun\Form\BossesForm($this->getServiceLocator());
        $oRequest = $this->getRequest();

        $oFiltre = new \Commun\Filter\BossesFilter();
        $oForm->setInputFilter($oFiltre->getInputFilter());

        if ($oRequest->isPost()) {
            $oEntite = new \Commun\Model\Bosses();

            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $oEntite->exchangeArray($oForm->getData());
                $this->getTable()->insert($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La bosses a été créé avec succès."), 'success');
                return $this->redirect()->toRoute('backend-bosses-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/bosses/create');
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
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de bosses inconnu."), 'error');
                return $this->redirect()->toRoute('backend-bosses-list');
            }
        } catch (\Exception $ex) {

            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la bosses."), 'error');
            return $this->redirect()->toRoute('backend-bosses-list');
        }
        $oForm = new \Commun\Form\BossesForm(); //new \Commun\Form\BossesForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\BossesFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);

        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $this->getTable()->update($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La bosses a été modifié avec succès."), 'success');
                return $this->redirect()->toRoute('backend-bosses-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/bosses/update');
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
            return $this->redirect()->toRoute('backend-bosses-list');
        }
        $oTable = $this->getTable();
        $oEntite = $oTable->findRow($id);
        $oTable->delete($oEntite);
        $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La bosses a été supprimé avec succès."), 'success');
        return $this->redirect()->toRoute('backend-bosses-list');
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
