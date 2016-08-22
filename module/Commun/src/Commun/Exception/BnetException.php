<?php

namespace Commun\Exception;

class BnetException extends LogException {

    protected $ERROR = [
        500 => "Erreur inconnue [ %s ]",
        199 => "Guilde ou Serveur inconnue [ %s ].",
        299 => "Personnage ou Serveur inconnu [ %s ].",
        399 => "Item inconnu [ %s ]",
        499 => "Zone inconnu [ %s ]"
    ];

    public function __construct($code = 500, $oService, $aData = array()) {
        $this->setService($oService);
        if (isset($this->ERROR[$code])) {
            $msg = $this->ERROR[$code];
        } else {
            $msg = $this->ERROR[500];
            $code = 500;
        }

        $msg = vsprintf($this->_getTranslator()->translate($msg), implode(', ', $aData));
        parent::__construct($msg, $code, $oService, null);
    }

}
