<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAccueil for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Accueil\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public $_servTranslator = null;
    public $_userTable = null;
    public $_pagesTable = null;
    public $_ContentTable = null;


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
    
    public function indexAction()
    {
        $idPage = $this->_getPagesId('home');
        $oViewModel = new ViewModel();
        $aListeArticles = array();
        $aAccueilAction = array();
        try {
            
            
            if($this->getContentTable()->fetchAllWhere(array('type' => 'article')))
            {
                $aAccueilAction = $this->getContentTable()->fetchAllWhere(array('type' => 'article'))->toArray();
                foreach($aAccueilAction as $article)
                {
                    $dateUpdate = new \DateTime($article['lastUpdate']);

                    $writeBy = $this->getUsersTable()->selectby(array('id'=>$article['writeBy']));
                    $updateBy = $this->getUsersTable()->selectby(array('id'=>$article['updateBy'])); 

                    $article['writeBy'] = $writeBy->username;
                    $article['updateBy'] = $updateBy->username;
                    $article['lastUpdate'] = $dateUpdate->format('d/m/Y à H:i:s');
                    $aListeArticles[] = $article;
                }

                $oViewModel->setVariable("listeArticles", $aListeArticles);
            }
           
        } catch (Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Problème(s) lors du chargement des informations de la page: " . $ex->getMessage()), 'error');
            return $this->redirect()->toRoute('home');
        }
        $oViewModel->setVariable("idPages", $idPage);
        $oViewModel->setTemplate('accueil/index/index');
        return $oViewModel;
    }
    
    private function _getPagesId($name) {
        $oPagetable = $this->getTablePages();
        $aPage = $oPagetable->selectBy(array('name' => $name));

        return $aPage->idPages;
    }
}
