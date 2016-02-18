<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class Zone extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idZone
     *
     * @var int
     */
    public $idZone = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: lvlMin
     *
     * @var string
     */
    public $lvlMin = null;

    /**
     * Colonne: tailleMin
     *
     * @var string
     */
    public $tailleMin = null;

    /**
     * Colonne: tailleMax
     *
     * @var string
     */
    public $tailleMax = null;

    /**
     * Colonne: patch
     *
     * @var string
     */
    public $patch = null;

    /**
     * Colonne: lvlMax
     *
     * @var string
     */
    public $lvlMax = null;

    /**
     * Colonne: isDonjon
     *
     * @var int
     */
    public $isDonjon = null;

    /**
     * Colonne: isRaid
     *
     * @var int
     */
    public $isRaid = null;

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
     * Retourne la valeur tailleMin.
     *
     * @return string
     */
    public function getTailleMin()
    {
        return strval($this->tailleMin);
    }

    /**
     * Définit la valeur pour tailleMin
     *
     * @param string
     */
    public function setTailleMin($value)
    {
        $this->tailleMin = $value;
    }

    /**
     * Retourne la valeur tailleMax.
     *
     * @return string
     */
    public function getTailleMax()
    {
        return strval($this->tailleMax);
    }

    /**
     * Définit la valeur pour tailleMax
     *
     * @param string
     */
    public function setTailleMax($value)
    {
        $this->tailleMax = $value;
    }

    /**
     * Retourne la valeur patch.
     *
     * @return string
     */
    public function getPatch()
    {
        return strval($this->patch);
    }

    /**
     * Définit la valeur pour patch
     *
     * @param string
     */
    public function setPatch($value)
    {
        $this->patch = $value;
    }

    /**
     * Retourne la valeur lvlMax.
     *
     * @return string
     */
    public function getLvlMax()
    {
        return strval($this->lvlMax);
    }

    /**
     * Définit la valeur pour lvlMax
     *
     * @param string
     */
    public function setLvlMax($value)
    {
        $this->lvlMax = $value;
    }

    /**
     * Retourne la valeur isDonjon.
     *
     * @return int
     */
    public function getIsDonjon()
    {
        return intval($this->isDonjon);
    }

    /**
     * Définit la valeur pour isDonjon
     *
     * @param int
     */
    public function setIsDonjon($value)
    {
        $this->isDonjon = $value;
    }

    /**
     * Retourne la valeur isRaid.
     *
     * @return int
     */
    public function getIsRaid()
    {
        return intval($this->isRaid);
    }

    /**
     * Définit la valeur pour isRaid
     *
     * @param int
     */
    public function setIsRaid($value)
    {
        $this->isRaid = $value;
    }


}

