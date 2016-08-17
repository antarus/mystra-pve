<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RosterHasPersonnage extends \Core\Model\AbstractModel {

    /**
     * Colonne: idRoster
     *
     * Reference to roster.idRoster
     *
     * @var int
     */
    public $idRoster = null;

    /**
     * Colonne: idPersonnage
     *
     * Reference to personnages.idPersonnage
     *
     * @var int
     */
    public $idPersonnage = null;

    /**
     * Colonne: idRole
     *
     * Reference to role.idRole
     *
     * @var int
     */
    public $idRole = null;

    /**
     * Colonne: isApply
     *
     * Reference to role.isApply
     *
     * @var int
     */
    public $isApply = false;

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

    /**
     * Retourne la valeur idRoster.
     *
     * @return int
     */
    public function getIdRoster() {
        return intval($this->idRoster);
    }

    /**
     * Définit la valeur pour idRoster
     *
     * @param int
     */
    public function setIdRoster($value) {
        $this->idRoster = $value;
    }

    /**
     * Retourne la valeur idPersonnage.
     *
     * @return int
     */
    public function getIdPersonnage() {
        return intval($this->idPersonnage);
    }

    /**
     * Définit la valeur pour idPersonnage
     *
     * @param int
     */
    public function setIdPersonnage($value) {
        $this->idPersonnage = $value;
    }

    /**
     * Retourne la valeur idRole.
     *
     * @return int
     */
    public function getIdRole() {
        return intval($this->idRole);
    }

    /**
     * Définit la valeur pour idRole
     *
     * @param int
     */
    public function setIdRole($value) {
        $this->idRole = $value;
    }

    /**
     * Retourne la valeur isApply.
     *
     * @return boolean
     */
    function getIsApply() {
        return $this->isApply;
    }

    /**
     * Définit la valeur pour isApply
     *
     * @param boolean
     */
    function setIsApply($isApply) {
        $this->isApply = $isApply;
    }

}
