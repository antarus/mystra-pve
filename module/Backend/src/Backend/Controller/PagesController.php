<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;

/**
 * Controller pour la vue.
 *
 * @author Capi
 * @project Raid-TracKer
 */
class PagesController extends \Zend\Mvc\Controller\AbstractActionController {

    public $_servTranslator = null;
    public $_userTable = null;
    public $_pagesTable = null;
    public $_userId = null;
    public $_ContentTable = null;

    /**
     * Retourne le userID en mode lazy.
     *
     * @return
     */
    private function _getUserId() {

        $sm = $this->getServiceLocator();
        $auth = $sm->get('zfcuser_auth_service');
        return $this->_userId ?
                $this->_userId :
                $this->_userId = ($auth->hasIdentity()) ?
                $auth->getIdentity()->getId() : "undefined";
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
     * Returne une instance de la table Content en lazy.
     *
     * @return
     */
    public function getContentTable() {
        if (!$this->_ContentTable) {
            $this->_ContentTable = $this->getServiceLocator()->get('\Commun\Table\ContentTable');
        }
        return $this->_ContentTable;
    }

    /**
     * Returne une instance de la table Pages en lazy
     *
     * @return
     */
    public function getTablePages() {
        if (!$this->_pagesTable) {
            $this->_pagesTable = $this->getServiceLocator()->get('\Commun\Table\PagesTable');
        }
        return $this->_pagesTable;
    }

    /**
     * Returne une instance de la table Users en lazy
     *
     * @return
     */
    public function getUsersTable() {
        if (!$this->_userTable) {
            $this->_userTable = $this->getServiceLocator()->get('\Commun\Table\UsersTable');
        }
        return $this->_userTable;
    }

    public function indexAction() {
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/pages/home');
        return $oViewModel;
    }

    public function aproposAction() {
        $idPage = $this->_getPagesId('apropos');
        try {
            $oApropoAction = $this->getContentTable()->selectby(array('idPages' => $idPage,
                'type' => 'page'));
            $dateUpdate = new \DateTime($oApropoAction->lastUpdate);
            $writeBy = $this->getUsersTable()->selectby(array('id'=>$oApropoAction->writeBy));
            $updateBy = $this->getUsersTable()->selectby(array('id'=>$oApropoAction->updateBy));
        } catch (Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Problème(s) lors du chargement des informations de la page: " . $ex->getMessage()), 'error');
            return $this->redirect()->toRoute('backend-pages');
        }

        $oViewModel = new ViewModel();
        $oViewModel->setVariable("idPages", $idPage);
        $oViewModel->setVariable("writeBy", $writeBy->username);
        $oViewModel->setVariable("updateBy", $updateBy->username);
        $oViewModel->setVariable("dateUpdate", $dateUpdate->format('d/m/Y à H:i:s'));
        $oViewModel->setVariable("content", $oApropoAction->content);
        $oViewModel->setTemplate('backend/pages/apropos');
        return $oViewModel;
    }

    public function discordbotAction() {
        $idPage = $this->_getPagesId('discordbot');
        var_dump($idPage);
        try {
            $oDiscordbotAction = $this->getContentTable()->selectby(array('idPages' => $idPage,
                'type' => 'page'));
            $dateUpdate = new \DateTime($oDiscordbotAction->lastUpdate);
            $writeBy = $this->getUsersTable()->selectby(array('id'=>$oDiscordbotAction->writeBy));
            $updateBy = $this->getUsersTable()->selectby(array('id'=>$oDiscordbotAction->updateBy));
        } catch (Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Problème(s) lors du chargement des informations de la page: " . $ex->getMessage()), 'error');
            return $this->redirect()->toRoute('backend-pages');
        }
        
        $oViewModel = new ViewModel();
        $oViewModel->setVariable("idPages", $idPage);
        $oViewModel->setVariable("writeBy", $writeBy->username);
        $oViewModel->setVariable("updateBy", $updateBy->username);
        $oViewModel->setVariable("dateUpdate", $dateUpdate->format('d/m/Y à H:i:s'));
        $oViewModel->setVariable("content", $oDiscordbotAction->content);
        $oViewModel->setTemplate('backend/pages/discordbot');
        return $oViewModel;
    }

    public function teamAction() {
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/pages/apropos');
        return $oViewModel;
    }

    public function savepageAction() {
        $oRequest = $this->getRequest();

        if ($oRequest->isPost()) {
            $aPost = $oRequest->getPost();
            try {
                $this->getContentTable()->savePage($aPost['idPages'], $aPost['content'], $this->_getUserId());
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Enregistrement de la page effectuée avec succes."), 'success');
                return $this->redirect()->toRoute('backend-pages', array('action' => $aPost['action']));
            } catch (\Exception $ex) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Soucit lors de la sauvagarde de la page: " . $ex->getMessage()), 'error');
                return $this->redirect()->toRoute('backend-pages', array('action' => $aPost['action']));
            }
        } else {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Soucit lors de la sauvagarde de la page."), 'error');
            return $this->redirect()->toRoute('backend-pages', array('action' => $aPost['action']));
        }
    }

    private function _getPagesId($name) {
        $oPagetable = $this->getTablePages();
        $aPage = $oPagetable->selectBy(array('name' => $name));

        return $aPage->idPages;
    }

}
