<?php

namespace Frontend\Controller;

use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use \Commun\Exception\DatabaseException;
use Application\Service\LogService;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidsController extends FrontController {

    private $_tableRaid = null;

    /**
     * Returne une instance de la table Raid en lazy.
     *
     * @return \Commun\Table\RaidsTable
     */
    public function getTableRaid() {
        if (!$this->_tableRaid) {
            $this->_tableRaid = $this->getServiceLocator()->get('\Commun\Table\RaidsTable');
        }
        return $this->_tableRaid;
    }

    /**
     * Retourne l'ecran de liste.
     * Affiche uniquement la page. Les données sont chargées via ajax plus tard.
     *
     * @return le template de la page liste.
     */
    public function listAction() {
        $page = $this->params()->fromRoute('page', 1);
        $oRoster = $this->valideKey();
        if (!$oRoster) {
            return $this->redirect()->toRoute('home');
        }
        $aRaid = $this->getTableRaid()->select(array('idRosterTmp' => $oRoster->getIdRoster()));

# move to service
//        $limit = 10;
//        $offset = ($page == 0) ? 0 : ($page - 1) * $limit;
//        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
//        $pagedUsers = $em->getRepository('Application\Entity\User')->getPagedUsers($offset, $limit);
        # end move to service
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('frontend/raids/list');
        $oViewModel->setVariable('raids', $aRaid);
//        $oViewModel->setVariable('pagedUsers', $pagedUsers);
//        $oViewModel->setVariable('page', $page);
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oTable = new \Commun\Grid\RaidsGrid($this->getServiceLocator(), $this->getPluginManager());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTableRaid()->getBaseQuery())
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
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
