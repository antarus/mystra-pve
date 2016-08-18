<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class Bosses extends \Core\Model\AbstractModel {

    /**
     * Colonne: idBosses
     *
     * @var int
     */
    public $idBosses = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: level
     *
     * @var int
     */
    public $level = null;

    /**
     * Colonne: vie
     *
     * @var int
     */
    public $vie = null;

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
     * Retourne la valeur idBosses.
     *
     * @return int
     */
    public function getIdBosses() {
        return intval($this->idBosses);
    }

    /**
     * Définit la valeur pour idBosses
     *
     * @param int
     */
    public function setIdBosses($value) {
        $this->idBosses = $value;
    }

    /**
     * Retourne la valeur nom.
     *
     * @return string
     */
    public function getNom() {
        return ucfirst(strval($this->nom));
    }

    /**
     * Définit la valeur pour nom
     *
     * @param string
     */
    public function setNom($value) {
        $this->nom = strtolower($value);
    }

    /**
     * Retourne la valeur level.
     *
     * @return int
     */
    public function getLevel() {
        return intval($this->level);
    }

    /**
     * Définit la valeur pour level
     *
     * @param int
     */
    public function setLevel($value) {
        $this->level = $value;
    }

    /**
     * Retourne la valeur vie.
     *
     * @return int
     */
    public function getVie() {
        return intval($this->vie);
    }

    /**
     * Définit la valeur pour vie
     *
     * @param int
     */
    public function setVie($value) {
        $this->vie = $value;
    }

}
