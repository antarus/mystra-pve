<?php

namespace Frontend\Service;

/**
 * Frontend navigation factory.
 */
class FrontendNavigationFactory extends \Zend\Navigation\Service\AbstractNavigationFactory {

    /**
     * @return string
     */
    protected function getName() {
        return 'frontend-nav';
    }

}
