<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsTemplateRoles extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idEvenements_template_roles
     *
     * @var int
     */
    public $idEvenementsTemplateRoles = null;

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
     * Colonne: idEvenements_template
     *
     * Reference to evenements_template.idEvenements_template
     *
     * @var int
     */
    public $idEvenementsTemplate = null;

    /**
     * Colonne: idRoles
     *
     * @var int
     */
    public $idRoles = null;

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
     * Retourne la valeur idEvenementsTemplateRoles.
     *
     * @return int
     */
    public function getIdEvenementsTemplateRoles()
    {
        return intval($this->idEvenementsTemplateRoles);
    }

    /**
     * Définit la valeur pour idEvenementsTemplateRoles
     *
     * @param int
     */
    public function setIdEvenementsTemplateRoles($value)
    {
        $this->idEvenementsTemplateRoles = $value;
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
     * Retourne la valeur idRoles.
     *
     * @return int
     */
    public function getIdRoles()
    {
        return intval($this->idRoles);
    }

    /**
     * Définit la valeur pour idRoles
     *
     * @param int
     */
    public function setIdRoles($value)
    {
        $this->idRoles = $value;
    }


}

