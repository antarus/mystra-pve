<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class RosterHasPersonnage extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idRoster
     *
     * Reference to roster.idRoster
     *
     * @var int
     */
    public $idRoster = null;

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
     * Retourne la valeur idRoster.
     *
     * @return int
     */
    public function getIdRoster()
    {
        return intval($this->idRoster);
    }

    /**
     * Définit la valeur pour idRoster
     *
     * @param int
     */
    public function setIdRoster($value)
    {
        $this->idRoster = $value;
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

