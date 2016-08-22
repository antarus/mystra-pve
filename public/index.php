<?php

use Zend\Console\Console;

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

// Setup autoloading
require 'init_autoloader.php';

//apigility
if (!defined('APPLICATION_PATH')) {
    define('APPLICATION_PATH', realpath(__DIR__ . '/../'));
}

$appConfig = include APPLICATION_PATH . '/config/application.config.php';

if (file_exists(APPLICATION_PATH . '/config/development.config.php')) {
    $appConfig = Zend\Stdlib\ArrayUtils::merge($appConfig, include APPLICATION_PATH . '/config/development.config.php');
}
//fin apigility
if (Console::isConsole()) {
    // pas besoin d'authorization en console
    array_splice($appConfig['modules'], array_search('BjyAuthorize', $appConfig['modules']), 1);
} else {
    $appConfig['module_listener_options']['config_glob_paths'][] = 'config/autoload/module.bjyauthorize.optional.php';
}
// Run the application!
Zend\Mvc\Application::init($appConfig)->run();
