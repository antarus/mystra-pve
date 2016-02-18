<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class Guildes extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idGuildes
     *
     * @var int
     */
    public $idGuildes = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: serveur
     *
     * @var string
     */
    public $serveur = null;

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
     * Retourne la valeur serveur.
     *
     * @return string
     */
    public function getServeur()
    {
        return strval($this->serveur);
    }

    /**
     * Définit la valeur pour serveur
     *
     * @param string
     */
    public function setServeur($value)
    {
        $this->serveur = $value;
    }


}

