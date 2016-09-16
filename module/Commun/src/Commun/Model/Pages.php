<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Capi
 * @project Raid-TracKer
 */
class Pages extends \Core\Model\AbstractModel {

    /**
     * Colonne: idPages
     *
     * @var int
     */
    public $idPages = null;

    /**
     * Colonne: name
     *
     * @var varchar
     */
    public $name = null;


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

    public function getIdPages() {
        return $this->idPages;
    }

    public function getName() {
        return $this->name;
    }

    public function setIdPages($idPages) {
        $this->idPages = $idPages;
    }

    public function setName($name) {
        $this->name = $name;
    }


}
