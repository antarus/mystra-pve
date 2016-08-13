<?php

namespace Commun\Exception;

class BnetException extends \Exception {

    protected $ERROR = [
        500 => "Erreur inconnue",
        100 => "Guilde ou Serveur inconnue",
        200 => "Personnage inconnu",
        300 => "Item inconnu"
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
