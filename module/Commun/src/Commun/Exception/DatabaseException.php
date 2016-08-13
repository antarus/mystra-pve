<?php

namespace Commun\Exception;

class DatabaseException extends \Exception {

    protected $ERREUR_CAT = [
        5000 => "Erreur inconnue",
        1000 => "guilde",
        2000 => "personnage",
        3000 => "item"
    ];
    protected $ERREUR_TYPE = [
        0 => "inconnu",
        1 => "update",
        2 => "create",
        3 => "delete",
        4 => "list"
    ];
    private $categorie;

    public function __construct($code = 5000, $erreurType = 0, $oTanslator, Exception $previous = null) {
        if (isset($this->message[$code + $erreurType])) {
            $msg = $this->message[$code + $erreurType];
            $codeErreur = $code + $erreurType;
        } else {
            $msg = $this->message[5000];
            $codeErreur = 5000;
        }
        if (isset($this->ERREUR_CAT[$erreurType])) {
            $this->categorie = $this->ERREUR_CAT[$erreurType];
        } else {
            $this->categorie = $this->ERREUR_CAT[0];
        }
        parent::__construct($oTranslator->translate($msg), $codeErreur, $previous);
    }

    /**
     * Getter de la catégorie.
     * @return string
     */
    function getCategorie() {
        return $this->categorie;
    }

    /**
     * Setter de la catégorie.
     * @param string $categorie
     */
    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    protected $message = array(
        5000 => 'Erreur incconue',
        // guilde
        1001 => "Erreur lors la mise à jour de la guilde",
        1002 => "Erreur lors la création de la guilde",
        1003 => "Erreur lors de la suppression de la guilde",
        1004 => "Erreur lors du listing des guildes",
        // personnage
        2001 => "Erreur lors la mise à jour du personnage",
        2002 => "Erreur lors la création du personnage",
        2003 => "Erreur lors de la suppression du personnage",
        2004 => "Erreur lors du listing des personnages",
        // item
        3001 => "Erreur lors la mise à jour de l'item",
        3002 => "Erreur lors la création de l'item",
        3003 => "Erreur lors de la suppression de l'item",
        3004 => "Erreur lors du listing des items",
    );

}
