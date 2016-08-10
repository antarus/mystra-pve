<?php

namespace APIBlizzard\V1\Rest\Character;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use \Bnet\Region;
use \Bnet\ClientFactory;

class CharacterResource extends AbstractResourceListener {
    /* @var $_servBnet \Bnet\ClientFactory */

    private $_servBnet;

    /* @var $_tableRace \Commun\Table\RaceTable  */
    private $_tableRace;

    /* @var $_tableClasses \Commun\Table\ClassesTable  */
    private $_tableClasses;

    /**
     *
     * @param $services
     */
    public function __construct($services) {
        $this->_servBnet = $services->get('\Bnet\ClientFactory');
        $this->_tableRace = $services->get('\Commun\Table\RaceTable');
        $this->_tableClasses = $services->get('\Commun\Table\ClassesTable');
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
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id) {
        $sNom = $this->getEvent()->getRouteParam('character_id');
        $sServer = $this->getEvent()->getRouteParam('api-character-server');
        $personnageBnet = $this->_servBnet->warcraft(new Region(Region::EUROPE, "en_GB"))->characters();
        $personnageBnet->on($sServer);
        $aOptionBnet = array();
        $aOptionBnet[] = 'items';
        // $personnageBnet->find($sNom);
        $oPersonnage = $personnageBnet->find($sNom, $aOptionBnet);
        $oPersonnage['race'] = $this->_tableRace->findRow($oPersonnage['race'])->getNom();
        $oPersonnage['class'] = $this->_tableClasses->findRow($oPersonnage['class'])->getNom();
        $oPersonnage['gender'] = $oPersonnage['gender'] == 0 ? "Male" : "Femelle";
        return $oPersonnage;
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
