<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class Classes extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idClasses
     *
     * @var int
     */
    public $idClasses = null;

    /**
     * Colonne: couleur
     *
     * @var string
     */
    public $couleur = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: icon
     *
     * @var string
     */
    public $icon = null;

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
     * Retourne la valeur couleur.
     *
     * @return string
     */
    public function getCouleur()
    {
        return strval($this->couleur);
    }

    /**
     * Définit la valeur pour couleur
     *
     * @param string
     */
    public function setCouleur($value)
    {
        $this->couleur = $value;
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
     * Retourne la valeur icon.
     *
     * @return string
     */
    public function getIcon()
    {
        return strval($this->icon);
    }

    /**
     * Définit la valeur pour icon
     *
     * @param string
     */
    public function setIcon($value)
    {
        $this->icon = $value;
    }


}

