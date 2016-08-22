<?php

namespace Commun\Exception;

use Application\Service\LogService;

class LogException extends \Exception {

    private $_oService;
    private $_translator;
    private $_logService;

    /**
     * Lazy getter pour le service de logs
     * @return \Application\Service\LogService
     */
    protected function _getLogService() {
        return $this->_logService ?
                $this->_logService :
                $this->_logService = $this->_oService->get('LogService');
    }

    /**
     * Lazy getter pour le service de logs
     * @return service Le service de logs
     */
    protected function _getTranslator() {
        return $this->_translator ?
                $this->_translator :
                $this->_translator = $this->_oService->get('translator');
    }

    public function __construct($message, $code = 500, $oService = null, \Exception $previous = null) {
        $this->_oService = $oService;
        $this->_getLogService()->log(LogService::ERR, $message, LogService::LOGICIEL);
        if (isset($previous)) {
            $this->_getLogService()->log(LogService::ERR, $previous->getMessage(), LogService::LOGICIEL);
        }
        parent::__construct($message, $code, $previous);
    }

    protected function setService($_oService) {
        $this->_oService = $_oService;
    }

}
