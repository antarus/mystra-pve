<?php

namespace APIRtK\V1\Rest\Loot;

class LootEntity extends \Core\Model\AbstractModel {

    /**
     *
     * @var $items string
     */
    public $nom;

    /**
     *
     * @var $items string
     */
    public $serveur;

    /**
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
     * Retourne la valeur items.
     *
     * @return array
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * Définit la valeur pour items
     *
     * @param array
     */
    public function setItems($value) {
        $this->items = $value;
    }

    /**
     * Retourne la valeur serveur.
     *
     * @return string
     */
    function getServeur() {
        return $this->serveur;
    }

    /**
     * Définit la valeur pour serveur
     *
     * @param string
     */
    function setServeur($serveur) {
        $this->serveur = $serveur;
    }

}
