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
    public $nbItem;
    public $nbItemPallier;
    public $participation;

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

    function getNbItem() {
        return $this->nbItem;
    }

    function getNbItemPallier() {
        return $this->nbItemPallier;
    }

    function setNbItem($nbItem) {
        $this->nbItem = $nbItem;
    }

    function setNbItemPallier($nbItemPallier) {
        $this->nbItemPallier = $nbItemPallier;
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

    function getParticipation() {
        return $this->participation;
    }

    function setParticipation($participation) {
        $this->participation = $participation;
    }

}
