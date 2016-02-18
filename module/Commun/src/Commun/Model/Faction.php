<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class Faction extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idFaction
     *
     * @var int
     */
    public $idFaction = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: logo
     *
     * @var string
     */
    public $logo = null;

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
     * Retourne la valeur idFaction.
     *
     * @return int
     */
    public function getIdFaction()
    {
        return intval($this->idFaction);
    }

    /**
     * Définit la valeur pour idFaction
     *
     * @param int
     */
    public function setIdFaction($value)
    {
        $this->idFaction = $value;
    }

    /**
     * Retourne la valeur nom.
     *
     * @return string
     */
    public function getNom()
    {
        return strval($this->nom);
    }

    /**
     * Définit la valeur pour nom
     *
     * @param string
     */
    public function setNom($value)
    {
        $this->nom = $value;
    }

    /**
     * Retourne la valeur logo.
     *
     * @return string
     */
    public function getLogo()
    {
        return strval($this->logo);
    }

    /**
     * Définit la valeur pour logo
     *
     * @param string
     */
    public function setLogo($value)
    {
        $this->logo = $value;
    }


}

