<?php

namespace Frontend\Controller;

use Application\Service\LogService;

/**
 * Controller de base pour pour la partie frontend.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class FrontController extends \Zend\Mvc\Controller\AbstractActionController {

    private $_servTranslator;
    private $_logService;
    private $_cache;
    private $_tableRoster;

    /**
     * Returne une instance de la table Roster en lazy.
     *
     * @return \Commun\Table\RosterTable
     */
    public function getTableRoster() {
        if (!$this->_tableRoster) {
            $this->_tableRoster = $this->getServiceLocator()->get('\Commun\Table\RosterTable');
        }
        return $this->_tableRoster;
    }

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
     * Lazy getter pour le service de cache
     * @return \Application\Service\CacheApi
     */
    protected function _getCacheService() {
        return $this->_cache ?
                $this->_cache :
                $this->_cache = $this->getServiceLocator()->get('CacheRtk');
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
     * Valide la clé est retourne le roster associé.
     * @return \Commun\Model\Roster
     */
    protected function valideKey() {
        $rosterKey = $this->params()->fromRoute('key', 1);

        $cacheKey = $this->getCacheKey('APIRtK-roster', array($rosterKey));
        // recherche dans le cache
        if ($this->_getCacheService()->hasItem($cacheKey) === true) {
            $oRoster = new \Commun\Model\Roster();
            $aCache = (array) $this->_getCacheService()->getItem($cacheKey);
            $oRoster->exchangeArray($aCache);
            return $oRoster;
        }

        $oRoster = $this->getTableRoster()->selectBy(array("key" => $rosterKey));
        if (!$oRoster) {
            $msg = $this->_getServTranslator()->translate("La clé fournit est invalide.");
            $this->_getLogService()->log(LogService::ERR, $msg, LogService::USER, $this->getRequest()->getPost());
            $this->flashMessenger()->addMessage($msg, 'error');
            $this->getResponse()->setStatusCode(500);
            return null;
        } else {
            // Ajoute au cache
            $aRoster = $oRoster->getArrayCopy();
            $this->_getCacheService()->addItem($cacheKey, $aRoster);
            return $oRoster;
        }
    }

    /**
     * Retourne la clé utilisé par le systeme de cache.
     * @param string $url
     * @param array $options
     *
     * @return string
     */
    protected function getCacheKey($url, array $options) {
        return hash_hmac('md5', $url, serialize($options));
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
