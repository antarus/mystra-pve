<?php

namespace APIRtK\V1\Rest\RosterStat;

use Commun\Model\LogApiProblem;
use ZF\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class RosterStatResource extends AbstractResourceListener {
    /* @var $_service */

    private $_service;
    private $_servTranslator;

    /* @var $_tableRoster \Commun\Table\PersonnagesTable */
    private $_tableRoster;

    /* @var $_tablePersonnage \Commun\Table\PersonnagesTable */
    private $_tablePersonnage;


    /* @var $cache StorageInterface    */
    private $cache;

    /**
     * Authentification zend.
     */
    private $auth;

    /**
     * Retourne le service de traduction en mode lazy.
     *
     * @return
     */
    public function _getServTranslator() {
        if (!$this->_servTranslator) {
            $this->_servTranslator = $this->_service->get('translator');
        }
        return $this->_servTranslator;
    }

    /**
     * Retourne la table PersonnagesTable.
     * @return \Commun\Table\PersonnagesTable
     */
    private function getTablePersonnage() {
        if (!$this->_tablePersonnage) {
            $this->_tablePersonnage = $this->_service->get('Commun\Table\PersonnagesTable');
        }
        return $this->_tablePersonnage;
    }

    /**
     * Retourne la table PersonnagesTable.
     * @return \Commun\Table\RosterTable
     */
    private function getTableRoster() {
        if (!$this->_tableRoster) {
            $this->_tableRoster = $this->_service->get('Commun\Table\RosterTable');
        }
        return $this->_tableRoster;
    }

    /**
     * Constructeur.
     * @param $services
     */
    public function __construct($services) {
        $this->_service = $services;
        $this->cache = $this->_service->get('CacheApi');
        $this->auth = $this->_service->get('zfcuser_auth_service');
    }

    /**
     * @param string $url
     * @param array $options
     *
     * @return string
     */
    protected function getRequestKey($url, array $options) {
        $options[] = ($this->auth->hasIdentity()) ?
                $this->auth->getIdentity()->getId() . ':' . $this->auth->getIdentity()->getUsername() : "undefined";
        return hash_hmac('md5', $url, serialize($options));
    }

    /**
     * Ajoute un item au cache et le tag avec "id:nomId" de l'utilisateur connecté.
     * @param type $key
     * @param type $data
     */
    protected function addItem($key, $data) {
        $this->auth = $this->_service->get('zfcuser_auth_service');
        $tag = ($this->auth->hasIdentity()) ?
                $this->auth->getIdentity()->getId() . ':' . $this->auth->getIdentity()->getUsername() : "undefined";
        $this->cache->addItem($key, $data);
        $this->cache->setTags($key, array($tag));
    }

    /**
     * Fetch a resource
     * Paramètre supplémentaire :
     * ?withids=<code>0</code> pas d'id superflus,<code>1</code> ajout des differents ID.
     * ?spe=<code>-1</code> toutes les spés,<code>0</code> spé 1, <code>1</code> spé 2, <code>2</code> spé 3,<code>3</code> spé 4  .
     * @param  mixed $id nom du personnage dont on veut le loot
     * @return ApiProblem|mixed
     */
    public function fetch($sRoster) {
        try {
            $sRoster = $this->getEvent()->getRouteParam('nom_roster');
            $iSpe = $this->getEvent()->getQueryParam('spe', -1);
            $key = $this->getRequestKey('APIRtK-loot', array($sRoster, $iSpe));

            if ($this->cache->hasItem($key) === true) {
                return $this->cache->getItem($key);
            }
            $oResult = $this->getTableRoster()->getStatRoster($sRoster, $iSpe);
            $this->addItem($key, $oResult);
            return $oResult;
        } catch (\Exception $ex) {
            return \Core\Util\ParseException::tranformeExceptionToApiProblem($ex, $this->_service);
        }
    }

}
