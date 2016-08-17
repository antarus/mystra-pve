<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsRoles extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idEvenements_roles
     *
     * @var int
     */
    public $idEvenementsRoles = null;

    /**
     * Colonne: nombre
     *
     * @var string
     */
    public $nombre = null;

    /**
     * Colonne: ordre
     *
     * @var string
     */
    public $ordre = null;

    /**
     * Colonne: idEvenements
     *
     * Reference to evenements.idEvenements
     *
     * @var int
     */
    public $idEvenements = null;

    /**
     * Colonne: idRole
     *
     * Reference to role.idRole
     *
     * @var int
     */
    public $idRole = null;

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
     * Retourne la valeur idEvenementsRoles.
     *
     * @return int
     */
    public function getIdEvenementsRoles()
    {
        return intval($this->idEvenementsRoles);
    }

    /**
     * Définit la valeur pour idEvenementsRoles
     *
     * @param int
     */
    public function setIdEvenementsRoles($value)
    {
        $this->idEvenementsRoles = $value;
    }

    /**
     * Retourne la valeur nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return strval($this->nombre);
    }

    /**
     * Définit la valeur pour nombre
     *
     * @param string
     */
    public function setNombre($value)
    {
        $this->nombre = $value;
    }

    /**
     * Retourne la valeur ordre.
     *
     * @return string
     */
    public function getOrdre()
    {
        return strval($this->ordre);
    }

    /**
     * Définit la valeur pour ordre
     *
     * @param string
     */
    public function setOrdre($value)
    {
        $this->ordre = $value;
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
     * Retourne la valeur idRole.
     *
     * @return int
     */
    public function getIdRole()
    {
        return intval($this->idRole);
    }

    /**
     * Définit la valeur pour idRole
     *
     * @param int
     */
    public function setIdRole($value)
    {
        $this->idRole = $value;
    }


}

