<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidPersonnage extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idRaid
     *
     * Reference to raids.idRaid
     *
     * @var string
     */
    public $idRaid = null;

    /**
     * Colonne: idPersonnage
     *
     * Reference to personnages.idPersonnage
     *
     * @var int
     */
    public $idPersonnage = null;

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
     * Retourne la valeur idRaid.
     *
     * @return string
     */
    public function getIdRaid()
    {
        return strval($this->idRaid);
    }

    /**
     * Définit la valeur pour idRaid
     *
     * @param string
     */
    public function setIdRaid($value)
    {
        $this->idRaid = $value;
    }

    /**
     * Retourne la valeur idPersonnage.
     *
     * @return int
     */
    public function getIdPersonnage()
    {
        return intval($this->idPersonnage);
    }

    /**
     * Définit la valeur pour idPersonnage
     *
     * @param int
     */
    public function setIdPersonnage($value)
    {
        $this->idPersonnage = $value;
    }


}

