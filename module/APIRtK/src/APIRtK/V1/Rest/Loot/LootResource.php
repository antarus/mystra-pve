<?php

namespace APIRtK\V1\Rest\Loot;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

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
            $oTabPersonnage = $this->getTablePersonnage()->selectBy(
                    array(
                        "nom" => $sNom,
                        "royaume" => $sServer));
            if (!$oTabPersonnage) {
                return new ApiProblem(404, sprintf($this->_getServTranslator()->translate("Le personnage [ %s ] sur le serveur [ %s ] n'a pas été trouvé."), $sNom, $sServer), $this->_getServTranslator()->translate("Not Found"), $this->_getServTranslator()->translate("Personnage / Serveur inconnu"));
            }

            $oResult = new LootEntity();
            $oResult->setNom($oTabPersonnage->getNom());
            $oTabItemPersonnageRaid = $this->getTableItemPersonnageRaid()->fetchAllWhere(
                            array(
                                "idPersonnage" => $oTabPersonnage->getIdPersonnage()))->toArray();
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

            return $oResult;
        } catch (\Exception $ex) {
            return \Core\Util\ParseException::tranformeExceptionToApiProblem($ex);
        }
    }

}
