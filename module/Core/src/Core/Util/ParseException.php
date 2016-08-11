<?php

namespace Core\Util;

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
    public static function tranformeExceptionToAjax($oException) {
        $aReturn = array();

        $oExTmp = ParseException::getCause($oException);
        switch ($oExTmp) {
            case $oExTmp instanceof \Commun\Exception\BnetException;
                $aReturn['code'] = 201;
                break;
            case $oExTmp instanceof \Commun\Exception\DatabaseException;
                $aReturn['code'] = 301;
                echo "ground request";
                break;
            case $oExTmp instanceof \Zend\Http\Client\Adapter\Exception\RuntimeException;
                $aReturn['code'] = 401;
                break;
            default:
                $aReturn['code'] = 500;
        }
        $aReturn['msg'] = $oExTmp->getMessage();
        return $aReturn;
    }

}
