<?php

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Cache\Storage\ClearExpiredInterface;
use Zend\Cache\Storage\ClearByNamespaceInterface;
use Zend\Cache\Storage\ClearByPrefixInterface;
use Zend\Cache\Storage\OptimizableInterface;
use Zend\Cache\Storage\AvailableSpaceCapableInterface;
use Zend\Cache\Storage\TotalSpaceCapableInterface;
use Zend\Cache\Storage\TaggableInterface;
use Zend\Cache\Storage\StorageInterface;
use Zend\Console\ColorInterface as Color;
use Zend\Console\Prompt\Select as ConsoleSelect;
use Zend\Console\Prompt\Confirm as ConsoleConfirm;

class CacheController extends AbstractActionController {

    public function listAction() {
        $console = $this->getConsole();
        $caches = array_keys($this->getCaches());

        $request = $this->getRequest();


        foreach ($caches as $cache) {
            if ($request instanceof ConsoleRequest) {
                $console->writeLine($cache);
            }
        }
    }

    public function statusAction() {
        $cache = $this->getCache();
        $console = $this->getConsole();

        $console->writeLine('Cache space for selected cache:');
        $this->writeCacheStatus($cache);
    }

    public function statusListAction() {
        $console = $this->getConsole();
        $caches = array_keys($this->getcaches());

        foreach ($caches as $name) {
            $console->writeLine('Status information for ' . $name);

            $cache = $this->getServiceLocator()->get($name);
            $this->writeCacheStatus($cache);

            $console->writeLine('');
        }
    }

    protected function writeCacheStatus(StorageInterface $cache) {
        $console = $this->getConsole();
        $human = $this->params('h');

        if ($cache instanceof TotalSpaceCapableInterface) {
            $space = $cache->getTotalSpace();
            $space = $human ? $this->convertToHumanSpace($space) : $space;

            $console->writeLine(sprintf(
                            '%s total space', $space
            ));
        } else {
            $console->writeLine('Cache adapter does not provide information about the total space of this cache');
        }

        if ($cache instanceof AvailableSpaceCapableInterface) {
            $space = $cache->getAvailableSpace();
            $space = $human ? $this->convertToHumanSpace($space) : $space;

            $console->writeLine(sprintf(
                            '%s available', $space
            ));
        } else {
            $console->writeLine('Cache adapter does not provide information about the available space of this cache');
        }
    }

    protected function convertToHumanSpace($space) {
        $unit = 'B';
        if ($space > 1024) {
            $space = $space / 1024;
            $unit = 'KB';
        }
        if ($space > 1024) {
            $space = $space / 1024;
            $unit = 'MB';
        }
        if ($space > 1024) {
            $space = $space / 1024;
            $unit = 'GB';
        }

        return sprintf('%d%s', $space, $unit);
    }

    public function clearAction() {
        $cache = $this->getCache();
        $console = $this->getConsole();

        $clear = $this->params('clear');
        $flush = $this->params('flush');
        $force = $this->params('force') || $this->params('f');

        if ($flush === true) {
            if (!$force) {
                if (!ConsoleConfirm::prompt('Are you sure to flush the cache? [y/n] ')) {
                    $console->writeLine('Not flushing cache');
                    return;
                }
            }

            $cache->flush();
            $console->writeLine('Cache flushed');
            return;
        }

        if ($clear === true) {
            if (!$force) {
                if (!ConsoleConfirm::prompt('Are you sure to clear the cache? [y/n] ')) {
                    $console->writeLine('Not clearing cache');
                    return;
                }
            }

            if ($this->params('expired') || $this->params('e')) {
                if (!$cache instanceof ClearExpiredInterface) {
                    $console->writeLine(sprintf('Cache does not support to clear expired items'), Color::WHITE, Color::RED);
                    return;
                }

                $cache->clearExpired();
                $console->writeLine('Cache cleared from expired items');
                return;
            }

            $namespace = $this->params('by-namespace', false);
            if ($namespace) {
                if (!$cache instanceof ClearByNamespaceInterface) {
                    $console->writeLine(sprintf('Cache does not support to clear by namespace'), Color::WHITE, Color::RED);
                    return;
                }

                $cache->clearByNamespace($namespace);
                $console->writeLine('Cache cleared all items namespaced with ' . $namespace);
                return;
            }

            $prefix = $this->params('by-prefix', false);
            if ($prefix) {
                if (!$cache instanceof ClearByPrefixInterface) {
                    $console->writeLine(sprintf('Cache does not support to clear by prefix'), Color::WHITE, Color::RED);
                    return;
                }

                $cache->clearByPrefix($prefix);
                $console->writeLine('Cache cleared all items prefixed with ' . $prefix);
                return;
            }

            $tag = $this->params('by-tag', false);
            if ($tag) {
                //  $console->writeLine(var_dump($cache));
                if (!$cache instanceof TaggableInterface) {
                    $console->writeLine(sprintf('Cache does not support to clear by tag'), Color::WHITE, Color::RED);
                    return;
                }

                $cache->clearByTags(array($tag));
                $console->writeLine('Cache cleared all items tag with ' . $prefix);
                return;
            }
        }
    }

    public function optimizeAction() {
        $cache = $this->getCache();
        if (!$cache instanceof OptimizableInterface) {
            $type = get_class($cache);
            $type = substr($type, strrpos($type, '\\') + 1);
            throw new \Exception(sprintf(
                    'The cache type %s does not support optimizing', strtolower($type)
            ));
        }

        $result = $cache->optimize();
        $console = $this->getConsole();

        if ($result) {
            $console->writeLine('Optimized cache successfully', Color::BLACK, Color::GREEN);
        } else {
            $console->writeLine('Could not optimize cache', Color::WHITE, Color::RED);
        }
    }

    protected function getCache() {
        $name = $this->params('name');

        if (null === $name) {
            $name = $this->getCacheName();
        }

        $cache = $this->getServiceLocator()->get($name);
        if (!$cache instanceof StorageInterface) {
            throw new \Exception('Cache is not a cache storage');
        }

        return $cache;
    }

    protected function getCacheName() {
        $caches = $this->getCaches();
        if (count($caches) === 0) {
            throw new \Exception('No abstract caches registerd to select');
        }

        if (count($caches) === 1) {
            return key($caches);
        }

        $options = array_keys($caches);

        // Increase the keys by 1 since arrays are zero-based keys
        array_unshift($options, null);
        unset($options[0]);

        $answer = ConsoleSelect::prompt(
                        'You have multiple caches defined, please select one', $options
        );

        return $options[$answer];
    }

    protected function getCaches() {
        $config = $this->getServiceLocator()->get('Config');
        if (!array_key_exists('caches', $config)) {
            throw new \Exception('No abstract caches registerd to select');
        }

        return $config['caches'];
    }

    protected function getConsole() {
        return $this->getServiceLocator()->get('console');
    }

}
