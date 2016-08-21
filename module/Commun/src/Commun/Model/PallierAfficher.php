<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class PallierAfficher extends \Core\Model\AbstractModel {

    /**
     * Colonne: idPallierAffiche
     *
     * @var int
     */
    public $idPallierAffiche = null;

    /**
     * Colonne: idModeDifficulte
     *
     * Reference to mode_difficulte.idMode
     *
     * @var string
     */
    public $idModeDifficulte = null;

    /**
     * Colonne: idZone
     *
     * Reference to zone.idZone
     *
     * @var int
     */
    public $idZone = null;

    /**
     * Colonne: idRoster
     *
     * Reference to roster.idRoster
     *
     * @var int
     */
    public $idRoster = null;
    public $roster;
    public $zone;
    public $mode;

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre insertion.
     *
     * @param EventManagerInterface
     */
    public function preInsert(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post insertion.
     *
     * @param EventManagerInterface
     */
    public function postInsert(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre mise à jour.
     *
     * @param EventManagerInterface
     */
    public function preUpdate(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post mise à jour.
     *
     * @param EventManagerInterface
     */
    public function postUpdate(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre suppression.
     *
     * @param EventManagerInterface
     */
    public function preDelete(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post suppression.
     *
     * @param EventManagerInterface
     */
    public function postDelete(EventManagerInterface $oEventManager) {

    }

//    /**
//     * Returne un array représentant l'objet.
//     *
//     * @return array
//     */
    public function getArrayCopySauvegarde() {

        $array = array();

        $array["idPallierAffiche"] = $this->idPallierAffiche;
        $array["idModeDifficulte"] = $this->idModeDifficulte;
        $array["idZone"] = $this->idZone;
        $array["idRoster"] = $this->idRoster;
        return $array;
    }

    function getIdPallierAffiche() {
        return intval($this->idPallierAffiche);
    }

    function getIdModeDifficulte() {
        return intval($this->idModeDifficulte);
    }

    function getIdZone() {
        return intval($this->idZone);
    }

    function getIdRoster() {
        return intval($this->idRoster);
    }

    function setIdPallierAffiche($idPallierAffiche) {
        $this->idPallierAffiche = $idPallierAffiche;
    }

    function setIdModeDifficulte($idModeDifficulte) {
        $this->idModeDifficulte = $idModeDifficulte;
    }

    function setIdZone($idZone) {
        $this->idZone = $idZone;
    }

    function setIdRoster($idRoster) {
        $this->idRoster = $idRoster;
    }

    function getRoster() {
        return $this->roster;
    }

    function getZone() {
        return $this->zone;
    }

    function getMode() {
        return $this->mode;
    }

    function setRoster($roster) {
        $this->roster = $roster;
    }

    function setZone($zone) {
        $this->zone = $zone;
    }

    function setMode($mode) {
        $this->mode = $mode;
    }

}
