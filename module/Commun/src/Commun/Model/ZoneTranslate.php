<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ZoneTranslate extends \Core\Model\AbstractModel {

    /**
     * Colonne: idZoneTranslate
     *
     * @var int
     */
    public $idZoneTranslate = null;

    /**
     * Colonne: idZone
     *
     * @var int
     */
    public $idZone = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: locale
     *
     * @var string
     */
    public $locale = null;

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
     * Retourne la valeur idZone.
     *
     * @return int
     */
    public function getIdZone() {
        return intval($this->idZone);
    }

    /**
     * Définit la valeur pour idZone
     *
     * @param int
     */
    public function setIdZone($value) {
        $this->idZone = $value;
    }

    function getNom() {
        return $this->nom;
    }

    function getLocale() {
        return $this->locale;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setLocale($locale) {
        $this->locale = $locale;
    }

    function getIdZoneTranslate() {
        return intval($this->idZoneTranslate);
    }

    function setIdZoneTranslate($idZoneTranslate) {
        $this->idZoneTranslate = $idZoneTranslate;
    }

}
