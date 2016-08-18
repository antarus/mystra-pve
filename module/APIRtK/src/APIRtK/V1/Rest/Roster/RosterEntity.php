<?php

namespace APIRtK\V1\Rest\Roster;

class RosterEntity extends \Core\Model\AbstractModel {

    /**
     *
     * @var $items string
     */
    public $nom;

    /**
     * @var $items array
     */
    public $roles;

    /**
     * Retourne la valeur $nom.
     *
     * @return string
     */
    public function getNom() {
        return strval($this->nom);
    }

    /**
     * Définit la valeur pour $nom
     *
     * @param string
     */
    public function setNom($value) {
        $this->nom = $value;
    }

    /**
     * Retourne la valeur roles.
     *
     * @return array
     */
    public function getRoles() {
        return $this->roles;
    }

    /**
     * Définit la valeur pour roles
     *
     * @param array
     */
    public function setRoles($value) {
        $this->roles = $value;
    }

}
