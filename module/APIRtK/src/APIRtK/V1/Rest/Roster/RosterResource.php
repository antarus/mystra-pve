<?php

namespace APIRtK\V1\Rest\Roster;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class RosterResource extends AbstractResourceListener {

    private $_tableRoster;
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
            $oTabRoster = $this->getTableRoster()->selectBy(
                    array(
                        "nom" => $sNom));
            if (!$oTabRoster) {
                return new ApiProblem(404, sprintf($this->_getServTranslator()->translate("Le roster [ %s ] demandé n'a pas été trouvé."), $sNom), $this->_getServTranslator()->translate("Not Found"), $this->_getServTranslator()->translate("Roster inconnu"));
            }

//            $oResult = new RosterEntity();
//            $oResult->setNom($oTabRoster->getNom());
//            $oTabItemPersonnageRaid = $this->getTableItemPersonnageRaid()->fetchAllWhere(
//                            array(
//                                "idPersonnage" => $oTabRoster->getIdPersonnage()))->toArray();
//            $aItemsPersonnage = array();
//            foreach ($oTabItemPersonnageRaid as $item) {
//                $oTabItem = $this->getTableItems()->selectBy(
//                        array(
//                            "idItem" => $item['idItem']));
//
//                $aLien = array();
//                $aLien['idBnet'] = $oTabItem->getIdBnet();
//                $aLien['bonus'] = $item['bonus'];
//                $aItem = array();
//                $aItem['nom'] = $oTabItem->getNom();
//                $aItem['lien'] = \Core\Util\ParserWow::genereLienItemWowHead($aLien);
//                $aItemsPersonnage[] = $aItem;
//            }
//            $oResult->setItems($aItemsPersonnage);

            return $oTabRoster;
        } catch (\Exception $ex) {

            return \Core\Util\ParseException::tranformeExceptionToApiProblem($ex);
        }
    }

}
