<?php

namespace Core\Form\Element;

use Core\Form\Element\Proxy;
use Zend\Form\Element\Select as SelectElement;
use Zend\Form\Form;
use Zend\Stdlib\ArrayUtils;

/**
 * Créé un selecteur d'objet accèdant ala base de donnée.
 *
 * inspire du objectSelect de doctrine.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class ObjectSelect extends SelectElement {

    /**
     * @var Proxy
     */
    protected $proxy;

    /**
     * @return Proxy
     */
    public function getProxy() {
        if (null === $this->proxy) {
            $this->proxy = new Proxy();
        }
        return $this->proxy;
    }

    /**
     * @param  array|\Traversable $options
     * @return self
     */
    public function setOptions($options) {
        $this->getProxy()->setOptions($options);
        return parent::setOptions($options);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function setOption($key, $value) {
        $this->getProxy()->setOptions(array($key => $value));
        return parent::setOption($key, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function setValue($value) {
        $multiple = $this->getAttribute('multiple');

        if (true === $multiple || 'multiple' === $multiple) {
            if ($value instanceof \Traversable) {
                $value = ArrayUtils::iteratorToArray($value);
            } elseif ($value == null) {
                return parent::setValue(array());
            } elseif (!is_array($value)) {
                $value = (array) $value;
            }

            return parent::setValue(array_map(array($this->getProxy(), 'getValue'), $value));
        }

        return parent::setValue($this->getProxy()->getValue($value));
    }

    /**
     * {@inheritDoc}
     */
    public function getValueOptions() {
        if (!empty($this->valueOptions)) {
            return $this->valueOptions;
        }

        $proxyValueOptions = $this->getProxy()->getValueOptions();

        if (!empty($proxyValueOptions)) {
            $this->setValueOptions($proxyValueOptions);
        }

        return $this->valueOptions;
    }

}
