<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class ModeDifficulte extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idMode
     *
     * @var int
     */
    public $idMode = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: nom_bnet
     *
     * @var string
     */
    public $nomBnet = null;

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
     * Retourne la valeur nomBnet.
     *
     * @return string
     */
    public function getNomBnet()
    {
        return strval($this->nomBnet);
    }

    /**
     * Définit la valeur pour nomBnet
     *
     * @param string
     */
    public function setNomBnet($value)
    {
        $this->nomBnet = $value;
    }


}

