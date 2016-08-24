<?php

namespace Commun\Model;

use Application\Service\LogService;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class LogApiProblem extends \ZF\ApiProblem\ApiProblem {

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

    /**
     * Constructor
     *
     * Create an instance using the provided information. If nothing is
     * provided for the type field, the class default will be used;
     * if the status matches any known, the title field will be selected
     * from $problemStatusTitles as a result.
     *
     * @param int    $status
     * @param string $detail
     * @param string $type
     * @param string $title
     * @param array  $additional
     *  @param \Zend\service  $oService
     */
    public function __construct($status, $detail, $type = null, $title = null, array $additional = [], $oService = null) {

        parent::__construct($status, $detail, $type, $title, $additional);
        $this->_oService = $oService;

        $additional['status'] = $status;
        $additional['type'] = $type;
        $additional['title'] = $title;
        $this->_getLogService()->log(LogService::ERR, $detail, LogService::LOGICIEL, $additional);
    }

}
