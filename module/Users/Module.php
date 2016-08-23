<?php

namespace Users;

/**
 * Module de classe Standard
 *
 * @
 *
 *         author Antarus
 * @ project  Mystra
 */
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Form\Form;
use Application\Service\LogService;

class Module {

    
    /**
     * Méthode standard de bootstrap
     *
     * @param \Zend\Mvc\MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e) {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        
        $this->app = $e->getApplication();
        $this->_logService = $this->app->getServiceManager()->get('LogService');
        $this->_modifyRegisterForm($e);
        $this->_afterRegister($e);
        $this->_afterLogin($e);
    }
    
    private function _modifyRegisterForm($e)
    {
        $events = $e->getApplication()->getEventManager()->getSharedManager();
        $events->attach('ZfcUser\Form\Register','init', function($e) {
            $form = $e->getTarget();
//             $form->add( array(
//                                'name' => 'captcha',
//                                'label'      => 'Please enter the 5 letters displayed below:',
//                                'required'   => true,
//                                'type' => 'Zend\Captcha\ReCaptcha',
//                                'options' => array(
//                                    'wordLen'    => 6,
//                                    'expiration' => 300,
//                                    'timeout'    => 300,
//                                ), 
//                            )
//            );         
            
        });
        $events->attach('ZfcUser\Form\RegisterFilter','init', function($e) {
            $filter = $e->getTarget();
//            $filter->add(array(
//                'username' => array(
//                    'validators' => array(
//                        array(
//                            'name' => 'alnum'
//                        ),
//                    ),
//                ),
//            ));
        });
    }
    
    private function _afterRegister($e)
    {
        $em = \Zend\EventManager\StaticEventManager::getInstance();
        $em->attach('ZfcUser\Service\User', 'register', function($e) {
            $user = $e->getParam('user');
            $this->_logService->log(LogService::NOTICE, 
                                    "Inscription de l'utilisateur: {$user->getUsername()} : {$user->getEmail()}", 
                                    LogService::LOGICIEL);
        });
    }
    
    private function _afterLogin($e)
    {
        $em = \Zend\EventManager\StaticEventManager::getInstance();
        $em->attach('ZfcUser\Authentication\Adapter\AdapterChain', 'authenticate.success', function($e) {
            $userId = $e->getIdentity();
            $this->_logService->log(LogService::NOTICE, 
                                    "Connexion de l'utilisateur: {$userId}",
                                    LogService::USER);
        });
    }

    /**
     * Configuration des modules a charger
     */
    public function getConfig() {
        $config = require __DIR__ . '/config/module.config.php';
        return $config;
    }

    /**
     * autoloader configuration
     *
     * Utiliser pour charger les classes
     */
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
        );
    }
}
