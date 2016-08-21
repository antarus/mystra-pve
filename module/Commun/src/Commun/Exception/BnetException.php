<?php

namespace Commun\Exception;

class BnetException extends \Exception {

    protected $ERROR = [
        500 => "Erreur inconnue [ %s ]",
        199 => "Guilde ou Serveur inconnue [ %s ].",
        299 => "Personnage ou Serveur inconnu [ %s ].",
        399 => "Item inconnu [ %s ]",
        499 => "Zone inconnu [ %s ]"
    ];

    public function __construct($code = 500, $oTranslator, $aData = array()) {
        if (isset($this->ERROR[$code])) {
            $msg = $this->ERROR[$code];
        } else {
            $msg = $this->ERROR[500];
            $code = 500;
        }
        parent::__construct(vsprintf($oTranslator->translate($msg), implode(',', $aData)), $code, null);
    }

}
