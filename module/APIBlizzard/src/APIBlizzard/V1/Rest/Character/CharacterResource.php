<?php

namespace APIBlizzard\V1\Rest\Character;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use \Bnet\Region;
use \Bnet\ClientFactory;

class CharacterResource extends AbstractResourceListener {
    /* @var $_service */

    private $_service;


    /* @var $_tableRace \Commun\Table\RaceTable  */
    private $_tableRace;

    /* @var $_tableClasses \Commun\Table\ClassesTable  */
    private $_tableClasses;

    /* @var $_tablePersonnage \Commun\Table\PersonnagesTable  */
    private $_tablePersonnage;

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
        $this->_tableRace = $services->get('\Commun\Table\RaceTable');
        $this->_tableClasses = $services->get('\Commun\Table\ClassesTable');
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
            $aPost = array(
                'serveur' => $sServer,
                'nom' => $sNom
            );
            $aOptionBnet = array();
//            try {
            $oPersonnage = $this->getTablePersonnage()->importPersonnage($aPost, null, $aOptionBnet);
            $oReturn = $oPersonnage->jsonSerialize();

            $oReturn['race'] = $this->_tableRace->findRow($oReturn['race'])->getNom();
            $oReturn['class'] = $this->_tableClasses->findRow($oReturn['class'])->getNom();
            $oReturn['gender'] = $oReturn['gender'] == 0 ? "Male" : "Female";
            return $oReturn;
//            } catch (\Exception $ex) {
//                $aAjaxEx = \Core\Util\ParseException::tranformeExceptionToArray($ex);
//                if ($aAjaxEx["code"] == 299) {
//                    return new ApiProblem(404, sprintf($this->_getServTranslator()->translate("Le personnage [ %s ] sur le serveur [ %s ] n'a pas été trouvé."), $sNom, $sServer), $this->_getServTranslator()->translate("Not Found"), $this->_getServTranslator()->translate("Personnage / Serveur inconnu"));
//                }
//                return new ApiProblem(500, $aAjaxEx['msg'], $this->_getServTranslator()->translate("Erreur interne"), $this->_getServTranslator()->translate("Erreur interne du serveur"));
//            }
        } catch (\Exception $ex) {

            return \Core\Util\ParseException::tranformeExceptionToApiProblem($ex);
        }
    }

}
