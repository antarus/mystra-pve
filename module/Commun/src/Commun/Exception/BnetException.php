<?php

namespace Commun\Exception;

class BnetException extends \Exception {

    protected $ERROR = [
        500 => "Erreur inconnue",
        199 => "Guilde ou Serveur inconnue",
        299 => "Personnage ou Serveur inconnu",
        399 => "Item inconnu",
        499 => "Zone inconnu"
    ];

    public function __construct($code = 500, $oTranslator) {
        if (isset($this->ERROR[$code])) {
            $msg = $this->ERROR[$code];
        } else {
            $msg = $this->ERROR[500];
            $code = 500;
        }
        parent::__construct($oTranslator->translate($msg), $code, null);
    }

}
