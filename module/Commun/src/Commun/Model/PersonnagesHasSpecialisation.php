<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class PersonnagesHasSpecialisation extends \Core\Model\AbstractModel
{

    /**
     * Colonne: specialisation_idSpecialisation
     *
     * Reference to specialisation.idSpecialisation
     *
     * @var int
     */
    public $specialisationIdSpecialisation = null;

    /**
     * Colonne: personnages_idPersonnage
     *
     * Reference to personnages.idPersonnage
     *
     * @var int
     */
    public $personnagesIdPersonnage = null;

    /**
     * Colonne: isPrincipal
     *
     * @var int
     */
    public $isPrincipal = null;

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
     * Retourne la valeur specialisationIdSpecialisation.
     *
     * @return int
     */
    public function getSpecialisationIdSpecialisation()
    {
        return intval($this->specialisationIdSpecialisation);
    }

    /**
     * Définit la valeur pour specialisationIdSpecialisation
     *
     * @param int
     */
    public function setSpecialisationIdSpecialisation($value)
    {
        $this->specialisationIdSpecialisation = $value;
    }

    /**
     * Retourne la valeur personnagesIdPersonnage.
     *
     * @return int
     */
    public function getPersonnagesIdPersonnage()
    {
        return intval($this->personnagesIdPersonnage);
    }

    /**
     * Définit la valeur pour personnagesIdPersonnage
     *
     * @param int
     */
    public function setPersonnagesIdPersonnage($value)
    {
        $this->personnagesIdPersonnage = $value;
    }

    /**
     * Retourne la valeur isPrincipal.
     *
     * @return int
     */
    public function getIsPrincipal()
    {
        return intval($this->isPrincipal);
    }

    /**
     * Définit la valeur pour isPrincipal
     *
     * @param int
     */
    public function setIsPrincipal($value)
    {
        $this->isPrincipal = $value;
    }


}

