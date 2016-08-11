<?php

namespace Commun\Exception;

class DatabaseException extends \Exception {

    protected $ERROR = [
        0 => "Erreur inconnue",
        1 => "Erreur lors de la mise à jour de la guilde",
        2 => "Erreur lors de la mise à jour du personnage",
        3 => "Erreur lors de la mise à jour de l(item"
    ];

    public function __construct($code = 0, Exception $previous = null) {
        parent::__construct($this->ERROR[$code], $code, $previous);
    }

}
