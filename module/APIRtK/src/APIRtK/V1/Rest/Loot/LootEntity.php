<?php

namespace APIRtK\V1\Rest\Loot;

class LootEntity extends \Core\Model\AbstractModel {

    /**
     *
     * @var $items string
     */
    public $nom;/**
     *
     * @var $items array
     */
    public $items;

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
     * Retourne la valeur $nom.
     *
     * @return string
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * Définit la valeur pour $nom
     *
     * @param string
     */
    public function setItems($value) {
        $this->items = $value;
    }

}
