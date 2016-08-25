<?php

namespace APIRtK\V1\Rest\LootRoster;

class LootRosterEntity extends \Core\Model\AbstractModel {

    /**
     *
     * @var int $id
     */
    public $id;

    /**
     *
     * @var string $nom
     */
    public $nom;

    /**
     *
     * @var array $items
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
     * Retourne la valeur id.
     *
     * @return int
     */
    function getId() {
        return $this->id;
    }

    /**
     * Définit la valeur pour id
     *
     * @param int
     */
    function setId($id) {
        $this->id = $id;
    }

}
