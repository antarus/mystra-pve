<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Frontend;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module {

    private $app;
    private $serviceManager;

    public function init(\Zend\ModuleManager\ModuleManager $mm) {
        $mm->getEventManager()->getSharedManager()->attach(__NAMESPACE__, 'dispatch', function($e) {
            $e->getTarget()->layout('application/layout');
        });
    }

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $this->app = $e->getApplication();
        $this->serviceManager = $this->app->getServiceManager();
    }

    public function getConfig() {
        $config = array();
        $aFichiersConf = array(
            __DIR__ . '/config/module.config.php',
            __DIR__ . '/config/route.config.php',
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
