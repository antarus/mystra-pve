<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;
use Zend\Crypt\Password\Bcrypt;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class UsersController extends \Zend\Mvc\Controller\AbstractActionController
{

    public $_servTranslator = null;

    public $_table = null;

    /**
     * Retourne le service de traduction en mode lazy.
     *
     * @return
     */
    public function _getServTranslator()
    {
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
    public function getTable()
    {
        if (!$this->_table) {
            $this->_table = $this->getServiceLocator()->get('\Commun\Table\UsersTable');
        }
        return $this->_table;
    }

    /**
     * Retourne l'ecran de liste.
     * Affiche uniquement la page. Les données sont chargées via ajax plus tard.
     *
     * @return le template de la page liste.
     */
    public function listAction()
    {
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/users/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction()
    {
        $oTable = new \Commun\Grid\UsersGrid($this->getServiceLocator(),$this->getPluginManager());
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
    public function createAction()
    {
        $oForm = new \Commun\Form\UsersForm();//new \Commun\Form\UsersForm($this->getServiceLocator());
        $oRequest = $this->getRequest();
        
        $oFiltre = new \Commun\Filter\UsersFilter();
        $oForm->setInputFilter($oFiltre->getInputFilter());
        
        if ($oRequest->isPost()) {
            $oEntite = new \Commun\Model\Users();
            
            $aPost = $oRequest->getPost();
            $bcrypt = new Bcrypt();
            $bcrypt->setCost(14); 
            $aPost['password'] = $bcrypt->create($aPost['password']);
            
            $oForm->setData($aPost);
            if ($oForm->isValid()) {
                $oEntite->exchangeArray($oForm->getData());

                $this->getTable()->insert($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La users a été créé avec succès."), 'success');
                return $this->redirect()->toRoute('backend-users-list');
            }
            else {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Formulaire non valid."), 'error');
                return $this->redirect()->toRoute('backend-users-create');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/users/create');
        return $oViewModel->setVariables(array('form' => $oForm));
    }

    /**
     * Action pour la mise à jour.
     *
     * @return array
     */
    public function updateAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        try {
            $oEntite = $this->getTable()->findRow($id);
            if (!$oEntite) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de users inconnu."), 'error');
                return $this->redirect()->toRoute('backend-users-list');
            }
        } catch (\Exception $ex) {
           $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la users."), 'error');
           return $this->redirect()->toRoute('backend-users-list');
        }
        $oForm = new \Commun\Form\UsersForm();//new \Commun\Form\UsersForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\UsersFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);
        
        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());
        
            if ($oForm->isValid()) {
                $this->getTable()->update($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La users a été modifié avec succès."), 'success');
                return $this->redirect()->toRoute('backend-users-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/users/update');
        return $oViewModel->setVariables(array('id' => $id, 'form' => $oForm));
    }

    /**
     * Action pour la suppression.
     *
     * @return redirection vers la liste
     */
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('backend-users-list');
        }
        $oTable = $this->getTable();
        $oEntite = $oTable->findRow($id);
        $oTable->delete($oEntite);
        $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La users a été supprimé avec succès."), 'success');
        return $this->redirect()->toRoute('backend-users-list');
    }

    /**
     * Retourne l'adapter associé a ce modèle.
     *
     * @return \Zend\Db\Adapter\Adapter
     */
    public function getAdapter()
    {
        return $this->getServiceLocator()->get('\Zend\Db\Adapter\Adapter');
    }

    /**
     * Retourne une response en tant que html.
     *
     * @return page html
     */
    public function htmlResponse($html)
    {
        $response = $this->getResponse()
        ->setStatusCode(200)
        ->setContent($html);
        return $response;
    }


}

