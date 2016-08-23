<?php

namespace APIBlizzard\V1\Rest\Character;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Application\Service\LogService;

class CharacterResource extends AbstractResourceListener {
    /* @var $_service */

    private $_service;


    /* @var $_tableRace \Commun\Table\RaceTable  */
    private $_tableRace;

    /* @var $_tableClasses \Commun\Table\ClassesTable  */
    private $_tableClasses;

    /* @var $_tablePersonnage \Commun\Table\PersonnagesTable  */
    private $_tablePersonnage;

    /* @var $cache StorageInterface    */
    private $cache;

    /**
     * Authentification zend.
     */
    private $auth;

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
     *
     * @param $services
     */
    public function __construct($services) {
        $this->_service = $services;
        $this->_tableRace = $this->_service->get('\Commun\Table\RaceTable');
        $this->_tableClasses = $this->_service->get('\Commun\Table\ClassesTable');
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
        $this->auth = $this->service->get('zfcuser_auth_service');
        $tag = ($this->auth->hasIdentity()) ?
                $this->auth->getIdentity()->getId() . ':' . $this->auth->getIdentity()->getUsername() : "undefined";
        $this->cache->addItem($key, $data);
        $this->cache->setTags($key, array($tag));
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id) {
        try {
            $sNom = $this->getEvent()->getRouteParam('character_id');
            $sServer = $this->getEvent()->getRouteParam('api-character-server');

            $key = $this->getRequestKey('APIBlizzard-character', array($sNom, $sServer));

            if ($this->cache->hasItem($key) === true) {
                return $this->cache->getItem($key);
            }

            $aPost = array(
                'serveur' => $sServer,
                'nom' => $sNom
            );
            $aOptionBnet = array();

            $oPersonnage = $this->getTablePersonnage()->importPersonnage($aPost, null, $aOptionBnet);
            $oReturn = $oPersonnage->jsonSerialize();

            $oReturn['race'] = $this->_tableRace->findRow($oReturn['race'])->getNom();
            $oReturn['class'] = $this->_tableClasses->findRow($oReturn['class'])->getNom();
            $oReturn['gender'] = $oReturn['gender'] == 0 ? "Male" : "Female";

            $this->addItem($key, $oReturn);

            return $oReturn;
        } catch (\Exception $ex) {
            $this->_service->get('LogService')->log(LogService::ERR, $ex->getMessage(), LogService::LOGICIEL);
            return \Core\Util\ParseException::tranformeExceptionToApiProblem($ex);
        }
    }

}
