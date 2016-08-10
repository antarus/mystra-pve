<?php

namespace Core\JQueryValidator\Validateur;

use Core\JQueryValidator\AbstractValidateur;

/**
 * Implementation du validateur Max.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class Max extends AbstractValidateur {

    /**
     * @see \Core\JQueryValidator\AbstractValidateur::getRegle()
     */
    public function getRegle() {
        $sRetour = '';
        $oValidateur = $this->getValidateurZend();
        if ($oValidateur->getMax()) {
            $sRetour .= 'max: ' . $oValidateur->getMax() . ', ' . PHP_EOL;
        }
        return $sRetour;
    }

}
