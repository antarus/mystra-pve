<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class Personnages extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idPersonnage
     *
     * @var int
     */
    public $idPersonnage = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: niveau
     *
     * @var string
     */
    public $niveau = null;

    /**
     * Colonne: idFaction
     *
     * Reference to faction.idFaction
     *
     * @var int
     */
    public $idFaction = null;

    /**
     * Colonne: idClasses
     *
     * Reference to classes.idClasses
     *
     * @var int
     */
    public $idClasses = null;

    /**
     * Colonne: idRace
     *
     * Reference to race.idRace
     *
     * @var int
     */
    public $idRace = null;

    /**
     * Colonne: idGuildes
     *
     * Reference to guildes.idGuildes
     *
     * @var int
     */
    public $idGuildes = null;

    /**
     * Colonne: idUsers
     *
     * Reference to users.idUsers
     *
     * @var int
     */
    public $idUsers = null;

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
     * Retourne la valeur niveau.
     *
     * @return string
     */
    public function getNiveau()
    {
        return strval($this->niveau);
    }

    /**
     * Définit la valeur pour niveau
     *
     * @param string
     */
    public function setNiveau($value)
    {
        $this->niveau = $value;
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
     * Retourne la valeur idClasses.
     *
     * @return int
     */
    public function getIdClasses()
    {
        return intval($this->idClasses);
    }

    /**
     * Définit la valeur pour idClasses
     *
     * @param int
     */
    public function setIdClasses($value)
    {
        $this->idClasses = $value;
    }

    /**
     * Retourne la valeur idRace.
     *
     * @return int
     */
    public function getIdRace()
    {
        return intval($this->idRace);
    }

    /**
     * Définit la valeur pour idRace
     *
     * @param int
     */
    public function setIdRace($value)
    {
        $this->idRace = $value;
    }

    /**
     * Retourne la valeur idGuildes.
     *
     * @return int
     */
    public function getIdGuildes()
    {
        return intval($this->idGuildes);
    }

    /**
     * Définit la valeur pour idGuildes
     *
     * @param int
     */
    public function setIdGuildes($value)
    {
        $this->idGuildes = $value;
    }

    /**
     * Retourne la valeur idUsers.
     *
     * @return int
     */
    public function getIdUsers()
    {
        return intval($this->idUsers);
    }

    /**
     * Définit la valeur pour idUsers
     *
     * @param int
     */
    public function setIdUsers($value)
    {
        $this->idUsers = $value;
    }


}

