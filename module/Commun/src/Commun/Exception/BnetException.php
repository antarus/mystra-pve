<?php

namespace Commun\Exception;

class BnetException extends LogException {

    protected $ERROR = [
        500 => "Erreur inconnue",
        199 => "Guilde ou Serveur inconnue.",
        299 => "Personnage ou Serveur inconnu.",
        399 => "Item inconnu",
        499 => "Zone inconnu"
    ];

    public function __construct($code = 500, $oService, $aParam = array()) {
        $this->setService($oService);
        if (isset($this->ERROR[$code])) {
            $msg = $this->ERROR[$code];
        } else {
            $msg = $this->ERROR[500];
            $code = 500;
        }
        if ($this->_getTranslator() != null) {
            $msg = $this->_getTranslator()->translate($msg);
        }

        parent::__construct($msg, $code, $oService, null, $aParam);
    }

}
