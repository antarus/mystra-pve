<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class NpcTranslate extends \Core\Model\AbstractModel {

    /**
     * Colonne: idZoneTranslate
     *
     * @var int
     */
    public $idNpcTranslate = null;

    /**
     * Colonne: idZone
     *
     * @var int
     */
    public $idNpc = null;

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

    function getIdNpcTranslate() {
        return intval($this->idNpcTranslate);
    }

    function getIdNpc() {
        return intval($this->idNpc);
    }

    function setIdNpcTranslate($idNpcTranslate) {
        $this->idNpcTranslate = $idNpcTranslate;
    }

    function setIdNpc($idNpc) {
        $this->idNpc = $idNpc;
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

}
