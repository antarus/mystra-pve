<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsPersonnage extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idEvenement_personnage
     *
     * @var int
     */
    public $idEvenementPersonnage = null;

    /**
     * Colonne: status
     *
     * @var string
     */
    public $status = null;

    /**
     * Colonne: dateCreation
     *
     * @var string
     */
    public $dateCreation = null;

    /**
     * Colonne: dateModification
     *
     * @var string
     */
    public $dateModification = null;

    /**
     * Colonne: idEvenements
     *
     * Reference to evenements.idEvenements
     *
     * @var int
     */
    public $idEvenements = null;

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
     * Retourne la valeur idEvenementPersonnage.
     *
     * @return int
     */
    public function getIdEvenementPersonnage()
    {
        return intval($this->idEvenementPersonnage);
    }

    /**
     * Définit la valeur pour idEvenementPersonnage
     *
     * @param int
     */
    public function setIdEvenementPersonnage($value)
    {
        $this->idEvenementPersonnage = $value;
    }

    /**
     * Retourne la valeur status.
     *
     * @return string
     */
    public function getStatus()
    {
        return strval($this->status);
    }

    /**
     * Définit la valeur pour status
     *
     * @param string
     */
    public function setStatus($value)
    {
        $this->status = $value;
    }

    /**
     * Retourne la valeur dateCreation.
     *
     * @return string
     */
    public function getDateCreation()
    {
        return strval($this->dateCreation);
    }

    /**
     * Définit la valeur pour dateCreation
     *
     * @param string
     */
    public function setDateCreation($value)
    {
        $this->dateCreation = $value;
    }

    /**
     * Retourne la valeur dateModification.
     *
     * @return string
     */
    public function getDateModification()
    {
        return strval($this->dateModification);
    }

    /**
     * Définit la valeur pour dateModification
     *
     * @param string
     */
    public function setDateModification($value)
    {
        $this->dateModification = $value;
    }

    /**
     * Retourne la valeur idEvenements.
     *
     * @return int
     */
    public function getIdEvenements()
    {
        return intval($this->idEvenements);
    }

    /**
     * Définit la valeur pour idEvenements
     *
     * @param int
     */
    public function setIdEvenements($value)
    {
        $this->idEvenements = $value;
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

