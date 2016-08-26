<?php

namespace Commun\Model;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RosterStat extends \Core\Model\AbstractModel {

    public $idRoster = null;
    public $nom = null;
    public $nbTotalRaid;
    public $nbTotalRaidPallier;

    public function exchangeArray($aData) {
        $oHydrator = new \Zend\Stdlib\Hydrator\ClassMethods();
        $oHydrator->hydrate($aData, $this);
    }

    /**
     * Returne un array représentant l'objet.
     *
     * @return array
     */
    public function getArrayCopy() {
        $hydrator = new \Zend\Stdlib\Hydrator\ClassMethods();
        return $hydrator->extract($this);
    }

    function getIdRoster() {
        return $this->idRoster;
    }

    function getNbTotalRaidPallier() {
        return $this->nbTotalRaidPallier;
    }

    function setNbTotalRaidPallier($nbTotalRaidPallier) {
        $this->nbTotalRaidPallier = $nbTotalRaidPallier;
    }

    function getNom() {
        return $this->nom;
    }

    function getNbTotalRaid() {
        return $this->nbTotalRaid;
    }

    function setIdRoster($idRoster) {
        $this->idRoster = $idRoster;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setNbTotalRaid($nbTotalRaid) {
        $this->nbTotalRaid = $nbTotalRaid;
    }

}
