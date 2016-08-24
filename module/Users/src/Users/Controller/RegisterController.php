<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Application\Service\LogService;

class RegisterController extends AbstractActionController {

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
    
    
    public function getgravatarAction() {
        
        $aRequest = $this->getRequest();
        $aResult = $aRequest->getPost();
        
        $aSettings = array(
                    'img_size'    => 100,
                    'default_img' => \Zend\View\Helper\Gravatar::DEFAULT_MONSTERID,
                    'rating'      => \Zend\View\Helper\Gravatar::RATING_G,
                    'secure'      => null,
                    );
        $sMail = $aResult['mail'];
        
        
        
        $viewHelperManager = $this->getServiceLocator()->get('ViewHelperManager');
	$sGravatar = $viewHelperManager->get('gravatar')->__invoke($sMail,$aSettings)->__toString();
        
        
        return new jsonModel(array('gravatar'=>$sGravatar));
    }

    
}
