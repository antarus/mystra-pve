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

    public function init(\Zend\ModuleManager\ModuleManager $mm) {
        $mm->getEventManager()->getSharedManager()->attach(__NAMESPACE__, 'dispatch', function($e) {
            $e->getTarget()->layout('backend/layout');
        });
    }

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
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
        $usage = array(
            'Suppression',
            'cache --flush [--force|-f] [<name>]' => 'Flush completement le cache',
            'cache --clear [--force|-f] [<name>] --expired|-e' => 'Supprime le cache expiré',
            'cache --clear [--force|-f] [<name>] --by-namespace=' => 'Supprime le cache par namespace',
            'cache --clear [--force|-f] [<name>] --by-prefix=' => 'Supprime le cache par prefix',
            array('<name>', 'Nom optionel du service de cache'),
            array('--expired|-e', 'Supprime tous les éléments expirés du cache'),
            array('--by-namespace=', 'Supprime tous les éléments du cache ayant le namespace donné'),
            array('--by-prefix=', 'Supprime tous les éléments du cache ayant le préfixe donné'),
            array('--force|-f', 'Force la suppression sans demandé de confirmation'),
            'Optimisation',
            'cache --optimize [<name>]' => 'Optimise le cache',
            array('<name>', 'Nom optionel du service de cache'),
            'Information',
            'cache --status [<name>] [-h]' => 'Affiche les informations concernant le cache',
            array('<name>', 'Nom optionel du service de cache'),
            array('-h', 'Affiche les information de manière lisible'),
            'Fichier de configuration applicative',
            'cache --clear-config' => 'Supprime le fichier de configuration fusionné',
            'cache --clear-module-map' => 'Supprime le fichier de mappage de module',
        );


        return $usage;
    }

}
