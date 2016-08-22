<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Service\LogService;

class IndexController extends AbstractActionController {

    private $_servTranslator;
    private $_logService;
    
    /**
     * Retourne le service de traduction en mode lazy.
     *
     * @return
     */
    public function _getServTranslator()
    {
        if (!$this->_servTranslator) {
            $this->_servTranslator = $this->getServiceLocator()->get('translator');
        }
        return $this->_servTranslator;
    }
    
        /**
     * Lazy getter pour le service de logs
     * @return service Le service de logs
     */
    private function _getLogService() {
        return  $this->_logService ?
                    $this->_logService :
                    $this->_logService = $this->getServiceLocator()->get('LogService');
    }
    
    
    public function indexAction() {
        return new ViewModel();
    }

    public function resetcacheAction() {
        
        exec('php public/index.php cache CacheBnet --flush -f',$outputBnet);
        exec('php public/index.php cache CacheApi --flush -f',$outputApi);
        
        if($outputBnet =="Cache flushed" && $outputApi=="Cache flushed")
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Le cache à été reset avec succès."), 'success');
            $this->_getLogService()->log(LogService::NOTICE, "Cache supprimer", LogService::LOGICIEL);
        }
        else
        {            
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Le cache n'a put être supprimer ( voir droit www-data)."), 'erreur');
            $this->_getLogService()->log(LogService::ALERT, "Cache non supprimer , erreur lors de la demande.", LogService::LOGICIEL);
        }
        
        return $this->redirect()->toRoute('backend-index');
    }
}
