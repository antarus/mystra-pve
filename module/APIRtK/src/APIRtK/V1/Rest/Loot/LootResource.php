<?php

namespace APIRtK\V1\Rest\Loot;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class LootResource extends AbstractResourceListener {
    /* @var $_service */

    private $_service;


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
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data) {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id) {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data) {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id nom du personnage dont on veut le loot
     * @return ApiProblem|mixed
     */
    public function fetch($id) {
        $sServer = $this->getEvent()->getRouteParam('loot_server');
        $sNom = $this->getEvent()->getRouteParam('loot_name');
        $oTabPersonnage = $this->getTablePersonnage()->selectBy(
                array(
                    "nom" => $sNom,
                    "royaume" => $sServer));
        if (!$oTabPersonnage) {
            throw new \Exception("le personnage " . $sNom . " n'existe pas en base de donnée.");
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
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array()) {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data) {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data) {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data) {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }

}
