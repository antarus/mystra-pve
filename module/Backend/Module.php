<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Backend;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Loader;
use Zend\ModuleManager\Feature;
use Zend\Console\Adapter\AdapterInterface as Console;

class Module {

    private $app;
    private $serviceManager;

    public function init(\Zend\ModuleManager\ModuleManager $mm) {
        $mm->getEventManager()->getSharedManager()->attach(__NAMESPACE__, 'dispatch', function($e) {
            $e->getTarget()->layout('backend/layout');
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
            __DIR__ . '/config/route.console.config.php',
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

    public function getConsoleUsage(Console $console) {
        $oTranslator = $this->serviceManager->get('translator');
        $usage = array(
            $oTranslator->translate('Suppression'),
            'cache --flush [--force|-f] [<name>]' => $oTranslator->translate('Flush completement le cache'),
            'cache --clear [--force|-f] [<name>] --expired|-e' => $oTranslator->translate('Supprime le cache expiré'),
            'cache --clear [--force|-f] [<name>] --by-namespace=' => $oTranslator->translate('Supprime le cache par namespace'),
            'cache --clear [--force|-f] [<name>] --by-prefix=' => $oTranslator->translate('Supprime le cache par prefix'),
            array('<name>', $oTranslator->translate('Nom optionel du service de cache')),
            array('--expired|-e', $oTranslator->translate('Supprime tous les éléments expirés du cache')),
            array('--by-namespace=', $oTranslator->translate('Supprime tous les éléments du cache ayant le namespace donné')),
            array('--by-prefix=', $oTranslator->translate('Supprime tous les éléments du cache ayant le préfixe donné')),
            array('--force|-f', $oTranslator->translate('Force la suppression sans demandé de confirmation')),
            $oTranslator->translate('Optimisation'),
            'cache --optimize [<name>]' => $oTranslator->translate('Optimise le cache'),
            array('<name>', $oTranslator->translate('Nom optionel du service de cache')),
            $oTranslator->translate('Information'),
            'cache --status [<name>] [-h]' => $oTranslator->translate('Affiche les informations concernant le cache'),
            array('<name>', $oTranslator->translate('Nom optionel du service de cache')),
            array('-h', $oTranslator->translate('Affiche les information de manière lisible')),
            $oTranslator->translate('Fichier de configuration applicative'),
            'cache --clear-config' => $oTranslator->translate('Supprime le fichier de configuration fusionné'),
            'cache --clear-module-map' => $oTranslator->translate('Supprime le fichier de mappage de module'),
        );


        return $usage;
    }

}
