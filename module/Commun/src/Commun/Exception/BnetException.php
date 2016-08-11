<?php

namespace Commun\Exception;

class BnetException extends \Exception {

    protected $ERROR = [
        0 => "Erreur inconnue",
        1 => "Guilde ou Serveur inconnue",
        2 => "Personnage inconnu",
        3 => "Item inconnu"
    ];

    public function __construct($code = 0) {
        parent::__construct($this->ERROR[$code], $code, null);
    }

}
