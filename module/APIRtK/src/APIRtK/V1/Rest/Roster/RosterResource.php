<?php

namespace APIRtK\V1\Rest\Roster;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class RosterResource extends AbstractResourceListener {

    private $_tableRoster;
    private $_tableRole;
    private $_tableRosterHasPersonnage;
    private $_servTranslator;
    /* @var $_service */
    private $_service;

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
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id) {
        try {
            $sNom = $this->getEvent()->getRouteParam('roster_name');

            /* @var $oTabRoster \Commun\Model\Roster  */
            $oTabRoster = $this->getTableRoster()->selectBy(
                    array(
                        "nom" => $sNom));
            if (!$oTabRoster) {
                return new ApiProblem(404, sprintf($this->_getServTranslator()->translate("Le roster [ %s ] demandé n'a pas été trouvé."), $sNom), $this->_getServTranslator()->translate("Not Found"), $this->_getServTranslator()->translate("Roster inconnu"));
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
            return $oResult;
        } catch (\Exception $ex) {
            return \Core\Util\ParseException::tranformeExceptionToApiProblem($ex);
        }
    }

}
