<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class Raids extends \Core\Model\AbstractModel {

    /**
     * Colonne: idRaid
     *
     * @var string
     */
    public $idRaid = null;

    /**
     * Colonne: idEvenements
     *
     * Reference to evenements.idEvenements
     *
     * @var int
     */
    public $idEvenements = null;

    /**
     * Colonne: date
     *
     * @var string
     */
    public $date = null;

    /**
     * Colonne: note
     *
     * @var string
     */
    public $note = null;

    /**
     * Colonne: valeur
     *
     * @var float
     */
    public $valeur = null;

    /**
     * Colonne: ajoutePar
     *
     * @var string
     */
    public $ajoutePar = null;

    /**
     * Colonne: majPar
     *
     * @var string
     */
    public $majPar = null;

    /**
     * Colonne: idRosterTmp
     *
     * @var int
     */
    public $idRosterTmp = null;

    /**
     * Colonne: idZoneTmp
     *
     * @var int
     */
    public $idZoneTmp = null;

    /**
     * Colonne: idMode
     *
     * @var int
     */
    public $idMode = null;

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
     * Retourne la valeur idRaid.
     *
     * @return int
     */
    public function getIdRaid() {
        return intval($this->idRaid);
    }

    /**
     * Définit la valeur pour idRaid
     *
     * @param string
     */
    public function setIdRaid($value) {
        $this->idRaid = $value;
    }

    /**
     * Retourne la valeur idEvenements.
     *
     * @return int
     */
    public function getIdEvenements() {
        return $this->idEvenements;
    }

    /**
     * Définit la valeur pour idEvenements
     *
     * @param int
     */
    public function setIdEvenements($value) {
        $this->idEvenements = $value;
    }

    /**
     * Retourne la valeur date.
     *
     * @return string
     */
    public function getDate() {
        return strval($this->date);
    }

    /**
     * Définit la valeur pour date
     *
     * @param string
     */
    public function setDate($value) {
        $this->date = $value;
    }

    /**
     * Retourne la valeur note.
     *
     * @return string
     */
    public function getNote() {
        return strval($this->note);
    }

    /**
     * Définit la valeur pour note
     *
     * @param string
     */
    public function setNote($value) {
        $this->note = $value;
    }

    /**
     * Retourne la valeur valeur.
     *
     * @return float
     */
    public function getValeur() {
        return floatval($this->valeur);
    }

    /**
     * Définit la valeur pour valeur
     *
     * @param float
     */
    public function setValeur($value) {
        $this->valeur = $value;
    }

    /**
     * Retourne la valeur ajoutePar.
     *
     * @return string
     */
    public function getAjoutePar() {
        return strval($this->ajoutePar);
    }

    /**
     * Définit la valeur pour ajoutePar
     *
     * @param string
     */
    public function setAjoutePar($value) {
        $this->ajoutePar = $value;
    }

    /**
     * Retourne la valeur majPar.
     *
     * @return string
     */
    public function getMajPar() {
        return strval($this->majPar);
    }

    /**
     * Définit la valeur pour majPar
     *
     * @param string
     */
    public function setMajPar($value) {
        $this->majPar = $value;
    }

    /**
     * Retourne la valeur idRosterTmp.
     *
     * @return int
     */
    function getIdRosterTmp() {
        return intval($this->idRosterTmp);
    }

    /**
     * Définit la valeur pour idRosterTmp
     *
     * @param int
     */
    function setIdRosterTmp($value) {
        $this->idRosterTmp = $value;
    }

    /**
     * Retourne la valeur idZoneTmp.
     *
     * @return int
     */
    function getIdZoneTmp() {
        return intval($this->idZoneTmp);
    }

    /**
     * Définit la valeur pour idZoneTmp
     *
     * @param int
     */
    function setIdZoneTmp($value) {
        $this->idZoneTmp = $value;
    }

    /**
     * Retourne la valeur idMode.
     *
     * @return int
     */
    function getIdMode() {
        return intval($this->idMode);
    }

    /**
     * Définit la valeur pour idMode
     *
     * @param int
     */
    function setIdMode($idMode) {
        $this->idMode = $idMode;
    }

}
