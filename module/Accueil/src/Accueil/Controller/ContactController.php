<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAccueil for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Accueil\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Service\LogService;

class ContactController extends AbstractActionController
{
    private $_logService;
    private $_config;
    /**
     * Lazy getter pour le service de logs
     * @return service Le service de logs
     */
    private function _getLogService() {
        return  $this->_logService ?
                $this->_logService :
                $this->_logService = $this->getServiceLocator()->get('LogService');
    }
    private function _getServConfig()
    {
        if(!$this->_config)
        {
            $this->_config = $this->getServiceLocator()->get('config');
        }
        return $this->_config;
    }
    public function indexAction()
    {
          // Log de l'update
//        $this->_getLogService()->log(LogService::NOTICE, "test de log user", LogService::USER);
//        $this->_getLogService()->log(LogService::NOTICE, "test de log RTK", LogService::LOGICIEL);
//        $this->_getLogService()->log(LogService::NOTICE, "test de log RTK", LogService::DEBUG);
        
        $oViewModel = new ViewModel();
        $publicKey = $this->_getServConfig()['google']['publicKey'];
        $privateKey = $this->_getServConfig()['google']['privateKey'];
        $oViewModel->setVariable('publicKey', $publicKey);
        $oViewModel->setVariable('privateKey', $privateKey);
        $oViewModel->setTemplate('accueil/contact/index');
        return $oViewModel;
    }
}
