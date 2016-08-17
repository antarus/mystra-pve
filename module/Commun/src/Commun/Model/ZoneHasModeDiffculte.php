<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ZoneHasModeDiffculte extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idZone
     *
     * Reference to zone.idZone
     *
     * @var int
     */
    public $idZone = null;

    /**
     * Colonne: idMode
     *
     * Reference to mode_difficulte.idMode
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
    public function preInsert(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post insertion.
     *
     * @param EventManagerInterface
     */
    public function postInsert(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre mise à jour.
     *
     * @param EventManagerInterface
     */
    public function preUpdate(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post mise à jour.
     *
     * @param EventManagerInterface
     */
    public function postUpdate(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre suppression.
     *
     * @param EventManagerInterface
     */
    public function preDelete(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post suppression.
     *
     * @param EventManagerInterface
     */
    public function postDelete(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Retourne la valeur idZone.
     *
     * @return int
     */
    public function getIdZone()
    {
        return intval($this->idZone);
    }

    /**
     * Définit la valeur pour idZone
     *
     * @param int
     */
    public function setIdZone($value)
    {
        $this->idZone = $value;
    }

    /**
     * Retourne la valeur idMode.
     *
     * @return int
     */
    public function getIdMode()
    {
        return intval($this->idMode);
    }

    /**
     * Définit la valeur pour idMode
     *
     * @param int
     */
    public function setIdMode($value)
    {
        $this->idMode = $value;
    }


}

