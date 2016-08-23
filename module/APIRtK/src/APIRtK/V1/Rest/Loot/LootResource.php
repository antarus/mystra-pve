<?php

namespace APIRtK\V1\Rest\Loot;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Application\Service\LogService;

class LootResource extends AbstractResourceListener {
    /* @var $_service */

    private $_service;
    private $_servTranslator;

    /* @var $_tablePersonnage \Commun\Table\PersonnagesTable */
    private $_tablePersonnage;

    /* @var $_tableItemPersonnageRaid \Commun\Table\ItemPersonnageRaidTable */
    private $_tableItemPersonnageRaid;

    /* @var $_tableItems \Commun\Table\ItemsTable */
    private $_tableItems;
    /* @var $cache StorageInterface    */
    private $cache;

    /**
     * Authentification zend.
     */
    private $auth;

    /**
     * Retourne la table ItemsTable.
     * @return \Commun\Table\ItemsTable
     */
    private function getTableItems() {
        if (!$this->_tableItems) {
            $this->_tableItems = $this->_service->get('Commun\Table\ItemsTable');
        }
        return $this->_tableItems;
    }

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
     * Retourne la table ItemPersonnageRaidTable.
     * @return \Commun\Table\ItemPersonnageRaidTable
     */
    private function getTableItemPersonnageRaid() {
        if (!$this->_tableItemPersonnageRaid) {
            $this->_tableItemPersonnageRaid = $this->_service->get('Commun\Table\ItemPersonnageRaidTable');
        }
        return $this->_tableItemPersonnageRaid;
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
     *
     * @param  mixed $id nom du personnage dont on veut le loot
     * @return ApiProblem|mixed
     */
    public function fetch($id) {
        try {
            $sServer = $this->getEvent()->getRouteParam('loot_server');
            $sNom = $this->getEvent()->getRouteParam('loot_name');
            $key = $this->getRequestKey('APIRtK-loot', array($sNom, $sServer));

            if ($this->cache->hasItem($key) === true) {
                return $this->cache->getItem($key);
            }

            $oTabPersonnage = $this->getTablePersonnage()->selectBy(
                    array(
                        "nom" => $sNom,
                        "royaume" => $sServer));
            if (!$oTabPersonnage) {
                return new ApiProblem(404, sprintf($this->_getServTranslator()->translate("Le personnage [ %s ] sur le serveur [ %s ] n'a pas été trouvé."), $sNom, $sServer), $this->_getServTranslator()->translate("Not Found"), $this->_getServTranslator()->translate("Personnage / Serveur inconnu"));
            }

            $oResult = new LootEntity();
            $oResult->setNom($oTabPersonnage->getNom());
//            $oTabItemPersonnageRaid = $this->getTableItemPersonnageRaid()->fetchAllWhere(
//                            array(
//                                "idPersonnage" => $oTabPersonnage->getIdPersonnage()))->toArray();

            $oTabItemPersonnageRaid = $this->getTableItemPersonnageRaid()->getLootDuRoster(1, "antaruss", "garona");

            $aItemsPersonnage = array();
            foreach ($oTabItemPersonnageRaid as $item) {
                $oTabItem = $this->getTableItems()->selectBy(
                        array(
                            "idItem" => $item['idItem']));
                if (!$oTabItem) {
                    return new ApiProblem(404, sprintf($this->_getServTranslator()->translate("L'item [ %s ] n'a pas été trouvé.")), $this->_getServTranslator()->translate("Non trouvé"), $this->_getServTranslator()->translate("Personnage / Serveur inconnu"), array(
                        "idItem" => $item['idItem']));
                }

                $aLien = array();
                $aLien['idBnet'] = $oTabItem->getIdBnet();
                $aLien['bonus'] = $item['bonus'];
                $aItem = array();
                $aItem['nom'] = $oTabItem->getNom();
                $aItem['lien'] = \Core\Util\ParserWow::genereLienItemWowHead($aLien);
                $aItemsPersonnage[] = $aItem;
            }
            $oResult->setItems($aItemsPersonnage);

            $this->addItem($key, $oResult);
            return $oResult;
        } catch (\Exception $ex) {
            $this->_service->get('LogService')->log(LogService::ERR, $ex->getMessage(), LogService::LOGICIEL);
            return \Core\Util\ParseException::tranformeExceptionToApiProblem($ex);
        }
    }

}
