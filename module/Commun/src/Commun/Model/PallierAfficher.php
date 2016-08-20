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

}
