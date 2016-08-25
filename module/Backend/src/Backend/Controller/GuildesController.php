<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Application\Service\LogService;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class GuildesController extends \Zend\Mvc\Controller\AbstractActionController {

    private $_servTranslator = null;
    private $_tableGuilde = null;
    private $_logService;

    /**
     * Lazy getter pour le service de logs
     * @return \Application\Service\LogService
     */
    protected function getLogService() {
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
     * @return \Commun\Table\GuildesTable
     */
    public function getTableGuilde() {
        if (!$this->_tableGuilde) {
            $this->_tableGuilde = $this->getServiceLocator()->get('\Commun\Table\GuildesTable');
        }
        return $this->_tableGuilde;
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
        $oViewModel->setTemplate('backend/guildes/list');
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
            'guilde' => '',
            'serveur' => '', //TODO extrait les information dans la colonne Data
            'lvlMin' => '',
            'imp-membre' => 'Oui',
        );

        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/guildes/import/import');
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
            'guilde' => '',
            'serveur' => '', //TODO extrait les information dans la colonne Data
            'lvlMin' => '',
            'imp-membre' => 'Oui',
        );
        $this->layout('layout/ajax');
        $oRequest = $this->getRequest();

        if ($oRequest->isPost()) {
            $aPost = $oRequest->getPost();

            try {
                $this->getTableGuilde()->beginTransaction();
                $this->getTableGuilde()->importGuilde($aPost);
                $this->getTableGuilde()->commit();
                $msg = $this->_getServTranslator()->translate("La guilde a été importé avec succès.");
                $this->getLogService()->log(LogService::INFO, $msg, LogService::USER, $aPost);
                // $this->flashMessenger()->addMessage($msg, 'success');
            } catch (\Exception $exc) {
                // on rollback en cas d'erreur
                $this->getTableGuilde()->rollback();

                $this->_getLogService()->log(LogService::ERR, $exc->getMessage(), LogService::USER, $aPost);

                $aAjaxEx = \Core\Util\ParseException::tranformeExceptionToArray($exc);
                $result = new JsonModel(array(
                    'error' => $aAjaxEx
                ));
                return $result;
            }
        }
        $result = new JsonModel(array(
            'success' => array(
                'msg' => $this->_getServTranslator()->translate('guilde importée avec succès')
            )
        ));
        return $result;
    }

}
