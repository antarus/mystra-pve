<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsTemplate extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idEvenements_template
     *
     * @var int
     */
    public $idEvenementsTemplate = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: description
     *
     * @var string
     */
    public $description = null;

    /**
     * Colonne: dateHeureDebutInvitation
     *
     * @var string
     */
    public $dateHeureDebutInvitation = null;

    /**
     * Colonne: dateHeureDebutEvenement
     *
     * @var string
     */
    public $dateHeureDebutEvenement = null;

    /**
     * Colonne: dateHeureFinInscription
     *
     * @var string
     */
    public $dateHeureFinInscription = null;

    /**
     * Colonne: lvlMin
     *
     * @var string
     */
    public $lvlMin = null;

    /**
     * Colonne: ouvertATous
     *
     * @var int
     */
    public $ouvertATous = null;

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
     * Colonne: idDonjon
     *
     * Reference to zone.idZone
     *
     * @var int
     */
    public $idDonjon = null;

    /**
     * Colonne: idGuildes
     *
     * Reference to guildes.idGuildes
     *
     * @var int
     */
    public $idGuildes = null;

    /**
     * Colonne: idRoster
     *
     * Reference to roster.idRoster
     *
     * @var int
     */
    public $idRoster = null;

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
     * Retourne la valeur idEvenementsTemplate.
     *
     * @return int
     */
    public function getIdEvenementsTemplate()
    {
        return intval($this->idEvenementsTemplate);
    }

    /**
     * Définit la valeur pour idEvenementsTemplate
     *
     * @param int
     */
    public function setIdEvenementsTemplate($value)
    {
        $this->idEvenementsTemplate = $value;
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
     * Retourne la valeur description.
     *
     * @return string
     */
    public function getDescription()
    {
        return strval($this->description);
    }

    /**
     * Définit la valeur pour description
     *
     * @param string
     */
    public function setDescription($value)
    {
        $this->description = $value;
    }

    /**
     * Retourne la valeur dateHeureDebutInvitation.
     *
     * @return string
     */
    public function getDateHeureDebutInvitation()
    {
        return strval($this->dateHeureDebutInvitation);
    }

    /**
     * Définit la valeur pour dateHeureDebutInvitation
     *
     * @param string
     */
    public function setDateHeureDebutInvitation($value)
    {
        $this->dateHeureDebutInvitation = $value;
    }

    /**
     * Retourne la valeur dateHeureDebutEvenement.
     *
     * @return string
     */
    public function getDateHeureDebutEvenement()
    {
        return strval($this->dateHeureDebutEvenement);
    }

    /**
     * Définit la valeur pour dateHeureDebutEvenement
     *
     * @param string
     */
    public function setDateHeureDebutEvenement($value)
    {
        $this->dateHeureDebutEvenement = $value;
    }

    /**
     * Retourne la valeur dateHeureFinInscription.
     *
     * @return string
     */
    public function getDateHeureFinInscription()
    {
        return strval($this->dateHeureFinInscription);
    }

    /**
     * Définit la valeur pour dateHeureFinInscription
     *
     * @param string
     */
    public function setDateHeureFinInscription($value)
    {
        $this->dateHeureFinInscription = $value;
    }

    /**
     * Retourne la valeur lvlMin.
     *
     * @return string
     */
    public function getLvlMin()
    {
        return strval($this->lvlMin);
    }

    /**
     * Définit la valeur pour lvlMin
     *
     * @param string
     */
    public function setLvlMin($value)
    {
        $this->lvlMin = $value;
    }

    /**
     * Retourne la valeur ouvertATous.
     *
     * @return int
     */
    public function getOuvertATous()
    {
        return intval($this->ouvertATous);
    }

    /**
     * Définit la valeur pour ouvertATous
     *
     * @param int
     */
    public function setOuvertATous($value)
    {
        $this->ouvertATous = $value;
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
     * Retourne la valeur idDonjon.
     *
     * @return int
     */
    public function getIdDonjon()
    {
        return intval($this->idDonjon);
    }

    /**
     * Définit la valeur pour idDonjon
     *
     * @param int
     */
    public function setIdDonjon($value)
    {
        $this->idDonjon = $value;
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


}

