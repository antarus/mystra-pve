<?php

namespace Core\JQueryValidator\Validateur;

use Core\JQueryValidator\AbstractValidateur;

/**
 * Implementation du validateur requis.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class Requis extends AbstractValidateur {

    /**
     * @see \Core\JQueryValidator\AbstractValidateur::getRegle()
     */
    public function getRegle() {
        return 'required: ' . $this->valeur . ', ' . PHP_EOL;
    }

}
