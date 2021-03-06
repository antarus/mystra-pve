<?php

namespace APIRtK\V1\Rest\Roster;

use Commun\Model\LogApiProblem;
use ZF\Rest\AbstractResourceListener;

class RosterResource extends AbstractResourceListener {

    private $_tableRoster;
    private $_tableRole;
    private $_tableRosterHasPersonnage;
    private $_servTranslator;
    /* @var $_service */
    private $_service;
    /* @var $cache StorageInterface    */
    private $cache;

    /**
     * Authentification zend.
     */
    private $auth;

    /**
     * Retourne la table RosterTable.
     * @return \Commun\Table\RosterTable
     */
    private function getTableRoster() {
        if (!$this->_tableRoster) {
            $this->_tableRoster = $this->_service->get('Commun\Table\RosterTable');
        }
        return $this->_tableRoster;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\RoleTable
     */
    public function getTableRole() {
        if (!$this->_tableRole) {
            $this->_tableRole = $this->_service->get('\Commun\Table\RoleTable');
        }
        return $this->_tableRole;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\RosterHasPersonnageTable
     */
    public function getTableRosterHasPersonnage() {
        if (!$this->_tableRosterHasPersonnage) {
            $this->_tableRosterHasPersonnage = $this->_service->get('\Commun\Table\RosterHasPersonnageTable');
        }
        return $this->_tableRosterHasPersonnage;
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
     * @param  mixed $id
     * @return LogApiProblem|mixed
     */
    public function fetch($id) {
        try {
            $sNom = $this->getEvent()->getRouteParam('roster_name');
            $key = $this->getRequestKey('APIRtK-roster', array($sNom));

            if ($this->cache->hasItem($key) === true) {
                return $this->cache->getItem($key);
            }
            /* @var $oTabRoster \Commun\Model\Roster  */
            $oTabRoster = $this->getTableRoster()->selectBy(
                    array(
                        "nom" => $sNom));
            if (!$oTabRoster) {
                return new LogApiProblem(404, sprintf($this->_getServTranslator()->translate("Le roster [ %s ] demandé n'a pas été trouvé."), $sNom), $this->_getServTranslator()->translate("Not Found"), $this->_getServTranslator()->translate("Roster inconnu"), array('nomRoster' => $sNom), $this->_service);
            }

            $aRoles = $this->getTableRole()->fetchAll()->toArray();
            $oResult = new RosterEntity();
            $oResult->setNom($sNom);
            $aRoleModifie = array();
            foreach ($aRoles as $aRole) {
                $aLstPerso = $this->getTableRosterHasPersonnage()->getListePersonnage($aRole['idRole'], $oTabRoster->getIdRoster());
                $aRole["personnages"] = $aLstPerso;
                $aRoleModifie[] = $aRole;
            }
            $oResult->setRoles($aRoleModifie);


            $this->addItem($key, $oResult);
            return $oResult;
        } catch (\Exception $ex) {
            return \Core\Util\ParseException::tranformeExceptionToApiProblem($ex, $this->_service);
        }
    }

}
