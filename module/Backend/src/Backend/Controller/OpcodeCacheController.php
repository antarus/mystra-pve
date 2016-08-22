<?php

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\ColorInterface as Color;
use Zend\Console\Prompt\Select as ConsoleSelect;
use Zend\Console\Prompt\Confirm as ConsoleConfirm;

class OpcodeCacheController extends AbstractActionController {

    public function clearAction() {
        if (PHP_VERSION_ID < 50500) {
            $this->clearApc();
        } else {
            $this->clearOpcache();
        }
    }

    protected function clearOpcache() {
        $console = $this->getConsole();

        if (!(bool) ini_get('opcache.enable_cli')) {
            $console->writeLine('You must enable opcache in CLI before clearing opcode cache', Color::RED);
            $console->writeLine('Check the "opcache.enable_cli" setting in your php.ini (see http://www.php.net/opcache.configuration)');
            return;
        }

        $scripts = opcache_get_status(true)['scripts'];

        if (count($scripts) === 0) {
            $console->writeLine('No files cached in OPcache, aborting', Color::RED);
            return;
        }

        foreach (array_keys($scripts) as $file) {
            $result = opcache_invalidate($file, true);
            if (!$result) {
                $console->writeLine('Failed to clear opcode cache for ' . $file, Color::RED);
            }
        }

        $console->writeLine(sprintf('%s OPcache files cleared', count($scripts)), Color::GREEN);
    }

    protected function clearApc() {
        $console = $this->getConsole();

        if (!(bool) ini_get('apc.enable_cli')) {
            $console->writeLine('You must enable APC in CLI before clearing APC cache', Color::RED);
            $console->writeLine('Check the "apc.enable_cli" setting in your php.ini (see http://www.php.net/apc.configuration)');
            return;
        }

        $info = array_keys(apc_cache_info());
        $scripts = $info['cache_list'];

        if (count($scripts) === 0) {
            $console->writeLine('No files cached in APC, aborting', Color::RED);
            return;
        }

        array_map(function($value) {
            return $value['filename'];
        }, $scripts);

        $results = apc_delete_file($scripts);

        foreach ($results as $result) {
            $console->writeLine('Failed to clear opcode cache for ' . $result, Color::RED);
        }

        $console->writeLine(sprintf('%s APC files cleared', count($scripts)), Color::GREEN);
    }

    protected function getConsole() {
        return $this->getServiceLocator()->get('console');
    }

}
