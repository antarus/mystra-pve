<?php

namespace Backend\Service;

/**
 * Backend navigation factory.
 */
class BackendNavigationFactory extends \Zend\Navigation\Service\AbstractNavigationFactory {

    /**
     * @return string
     */
    protected function getName() {
        return 'backend-nav';
    }

}
