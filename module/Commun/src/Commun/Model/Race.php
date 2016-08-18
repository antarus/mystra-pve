<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class Race extends \Core\Model\AbstractModel {

    /**
     * Colonne: idRace
     *
     * @var int
     */
    public $idRace = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: icon
     *
     * @var string
     */
    public $icon = null;

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
     * Retourne la valeur idRace.
     *
     * @return int
     */
    public function getIdRace() {
        return intval($this->idRace);
    }

    /**
     * Définit la valeur pour idRace
     *
     * @param int
     */
    public function setIdRace($value) {
        $this->idRace = $value;
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
     * Retourne la valeur icon.
     *
     * @return string
     */
    public function getIcon() {
        return strval($this->icon);
    }

    /**
     * Définit la valeur pour icon
     *
     * @param string
     */
    public function setIcon($value) {
        $this->icon = $value;
    }

}
