<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class Roster extends \Core\Model\AbstractModel {

    /**
     * Colonne: idRoster
     *
     * @var int
     */
    public $idRoster = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: key
     *
     * @var string
     */
    public $key = null;

    function getKey() {
        return $this->key;
    }

    function setKey($key) {
        $this->key = $key;
    }

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
     * Retourne la valeur nom.
     *
     * @return string
     */
    public function getNom() {
        return strval($this->nom);
    }

    /**
     * Définit la valeur pour nom
     *
     * @param string
     */
    public function setNom($value) {
        $this->nom = strtolower($value);
    }

}
