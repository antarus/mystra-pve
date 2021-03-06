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

    private $_userTable;
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
        $this->_userTable = $this->app->getServiceManager()->get('Commun\Table\UsersTable');
        
        $this->_modifyRegisterForm($e);
        $this->_afterRegister($e);
        $this->_afterLogin($e);
    }
    
    private function _modifyRegisterForm($e)
    {
        $events = $e->getApplication()->getEventManager()->getSharedManager();
        $events->attach('ZfcUser\Form\Register','init', function($e) {
            $form = $e->getTarget();     
            $form->add(array(
            'name' => 'email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'type' => 'text',
                'id' => 'gravatarEmail',
            ),
        ));
            
        });
        $events->attach('ZfcUser\Form\RegisterFilter','init', function($e) {
            $filter = $e->getTarget();
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
            
            $this->_userTable->updateLastConnection($userId);
        });
    }

    /**
     * Configuration des modules a charger
     */
    public function getConfig() {
        $config = array();
        $aFichiersConf = array(
            __DIR__ . '/config/route.config.php',
            __DIR__ . '/config/module.config.php',
        );
        foreach ($aFichiersConf as $aFichConf) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include $aFichConf);
        }

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
