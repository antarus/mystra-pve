<?php

namespace Core\Util;

use ZF\ApiProblem\ApiProblem;

class ParseException {

    /**
     * Retourne la première erreur de la chaine d'exception.
     * @param \Exception $oException
     * @return \Exception
     */
    public static function getCause($oException) {
        $oExTmp = $oException;
        while (!empty($oExTmp->getPrevious())) {
            $oExTmp = $oExTmp->getPrevious();
        }
        return $oExTmp;
    }

    /**
     * Retourne la premièere erreur de la chaine d'exception.
     * @param \Exception $oException
     * @return \Exception
     */
    public static function tranformeExceptionToArray($oException) {
        $aReturn = array();

        $oExTmp = ParseException::getCause($oException);
        $aReturn['msg'] = $oExTmp->getMessage();
        switch ($oExTmp) {
            case $oExTmp instanceof \Commun\Exception\BnetException;
                $aReturn['code'] = $oExTmp->getCode();
                $aReturn['type'] = 'BnetException';
                break;
            case $oExTmp instanceof \Commun\Exception\DatabaseException;
                $aReturn['code'] = $oExTmp->getCode();
                $aReturn['type'] = 'DatabaseException';
                break;
            case $oExTmp instanceof \Zend\Http\Client\Adapter\Exception\RuntimeException;
                $aReturn['code'] = 504;
                $aReturn['type'] = 'TimeoutException';
                $aReturn['msg'] = 'Timeout';
                break;
            default:
                $aReturn['code'] = 500;
                $aReturn['type'] = 'Erreur interne';
        }

        return $aReturn;
    }

    /**
     * Retourne la première erreur de la chaine d'exception au format ApiProblem.
     * @param \Exception $oException
     * @return \ZF\ApiProblem\ApiProblem
     */
    public static function tranformeExceptionToApiProblem($oException) {
        $aReturn = ParseException::tranformeExceptionToArray($oException);
        // le code si supperieur a 599 est remplacer par 500.
        // pour plus de detail on met le code erreur original dans le type
        return new ApiProblem($aReturn["code"], $aReturn['msg'], $aReturn['code'], $aReturn['type']);
    }

}
