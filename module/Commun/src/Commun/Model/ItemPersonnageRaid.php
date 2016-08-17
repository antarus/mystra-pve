<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ItemPersonnageRaid extends \Core\Model\AbstractModel {

    /**
     * Colonne: idItemRaidPersonnage
     *
     * @var int
     */
    public $idItemRaidPersonnage = null;

    /**
     * Colonne: idRaid
     *
     * Reference to raids.idRaid
     *
     * @var string
     */
    public $idRaid = null;

    /**
     * Colonne: idItem
     *
     * Reference to items.idItem
     *
     * @var int
     */
    public $idItem = null;

    /**
     * Colonne: idPersonnage
     *
     * Reference to personnages.idPersonnage
     *
     * @var int
     */
    public $idPersonnage = null;

    /**
     * Colonne: valeur
     *
     * @var float
     */
    public $valeur = null;

    /**
     * Colonne: bonus
     *
     * @var string
     */
    public $bonus = null;

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
     * Retourne la valeur idItemRaidPersonnage.
     *
     * @return int
     */
    public function getIdItemRaidPersonnage() {
        return intval($this->idItemRaidPersonnage);
    }

    /**
     * Définit la valeur pour idItemRaidPersonnage
     *
     * @param int
     */
    public function setIdItemRaidPersonnage($value) {
        $this->idItemRaidPersonnage = $value;
    }

    /**
     * Retourne la valeur idRaid.
     *
     * @return string
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
     * Retourne la valeur idItem.
     *
     * @return int
     */
    public function getIdItem() {
        return intval($this->idItem);
    }

    /**
     * Définit la valeur pour idItem
     *
     * @param int
     */
    public function setIdItem($value) {
        $this->idItem = $value;
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
     * @param string
     */
    public function setBonus($value) {
        $this->bonus = strval($value);
    }

    /**
     * Retourne la valeur valeur.
     *
     * @return string
     */
    public function getBonus() {
        return strval($this->bonus);
    }

    /**
     * Définit la valeur pour valeur
     *
     * @param float
     */
    public function setValeur($value) {
        $this->valeur = $value;
    }

}
