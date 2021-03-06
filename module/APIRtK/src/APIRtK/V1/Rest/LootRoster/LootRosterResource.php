<?php

namespace APIRtK\V1\Rest\LootRoster;

use Commun\Model\LogApiProblem;
use ZF\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class LootRosterResource extends AbstractResourceListener {
    /* @var $_service */

    private $_service;
    private $_servTranslator;

    /* @var $_tableRoster \Commun\Table\PersonnagesTable */
    private $_tableRoster;

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
     * @return \Commun\Table\RosterTable
     */
    private function getTableRoster() {
        if (!$this->_tableRoster) {
            $this->_tableRoster = $this->_service->get('Commun\Table\RosterTable');
        }
        return $this->_tableRoster;
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
     * Paramètre supplémentaire :
     * ?withids=<code>0</code> pas d'id superflus,<code>1</code> ajout des differents ID.
     * ?spe=<code>-1</code> toutes les spés,<code>0</code> spé 1, <code>1</code> spé 2, <code>2</code> spé 3,<code>3</code> spé 4  .
     * @param  mixed $id nom du personnage dont on veut le loot
     * @return ApiProblem|mixed
     */
    public function fetch($id) {
        try {

            $sRoster = $this->getEvent()->getRouteParam('roster_name');
            $bWithId = $this->getEvent()->getQueryParam('withids', 0);
            $iSpe = $this->getEvent()->getQueryParam('spe', -1);
            $key = $this->getRequestKey('APIRtK-loot', array($sRoster, $bWithId, $iSpe));

            if ($this->cache->hasItem($key) === true) {
                return $this->cache->getItem($key);
            }
            $oTabRoster = $this->getTableRoster()->selectBy(
                    array("nom" => $sRoster));
            if (!$oTabRoster) {
                return new LogApiProblem(404, sprintf($this->_getServTranslator()->translate("Le roster [ %s ] n'a pas été trouvé."), $sRoster), $this->_getServTranslator()->translate("Not Found"), $this->_getServTranslator()->translate("Personnage / Serveur inconnu"), array(), $this->_service);
            }

            $oResult = new LootRosterEntity();
            $oResult->setId($oTabRoster->getIdRoster());
            $oResult->setNom($sRoster);

            $aItemsPersonnage = $this->getTableItemPersonnageRaid()->getLootStatDuRoster($sRoster, $bWithId, $iSpe);

            $oResult->setItems($aItemsPersonnage);

            $this->addItem($key, $oResult);
            return $oResult;
        } catch (\Exception $ex) {
            return \Core\Util\ParseException::tranformeExceptionToApiProblem($ex, $this->_service);
        }
    }

}
