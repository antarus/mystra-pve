<?php

namespace Frontend\Grid;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Mvc\Controller\PluginManager;
use \Zend\Mvc\Controller\Plugin\Url;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidsGrid extends \ZfTable\AbstractTable {

    /**
     * @var ServiceLocatorInterface
     */
    private $_serviceLocator = null;

    /**
     * @var \Zend\Mvc\Controller\PluginManager
     */
    private $_pluginManager = null;

    /**
     * @var \Zend\Mvc\Controller\Plugin\Url
     */
    private $_url = null;

    /**
     * @var \Zend\I18n\Translator\Translator
     */
    private $_servTranslator = null;
    private $_key;
    protected $config = array(
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 20,
        'showColumnFilters' => true,
    );
    protected $headers = array(
        'date' => array(
            'title' => 'Date',
            'width' => '100',
            'filters' => 'text',
        ),
        'note' => array(
            'title' => 'Nom',
            'width' => '100',
            'filters' => 'text',
        ),
    );

    /**
     * Constructeur du tableau.
     *
     * @param ServiceLocatorInterface
     * @param PluginManager
     */
    public function __construct(ServiceLocatorInterface $oServiceLocator, PluginManager $oPluginManager, $key = '') {
        $this->_serviceLocator = $oServiceLocator;
        $this->_pluginManager = $oPluginManager;
        $this->_key = $key;
    }

    /**
     * Retourne le plugin url.
     *
     * @var \Zend\Mvc\Controller\PluginManager
     */
    public function url() {
        if (!$this->_url) {
            $this->_url = $this->_pluginManager->get('url');
        }
        return $this->_url;
    }

    /**
     * Retourne le translator.
     *
     * @var \Zend\I18n\Translator\Translator
     */
    public function _getServTranslator() {
        if (!$this->_servTranslator) {
            $this->_servTranslator = $this->_serviceLocator->get('translator');
        }
        return $this->_servTranslator;
    }

    function get_key() {
        return $this->_key;
    }

    public function init() {
        
        $this->getHeader("date")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                $date = new \dateTime($record['date']);
                return "<a class='' href='".$this->url()->fromRoute('front-raid-detail', array('key' => $this->get_key(), 
                                                                                               'idRaid' => $record['idRaid'])) 
                        . "'><div style='height:100%;width:100%'> "
                        . "{$date->format(' d/m/Y à h:i:s')}"
                        . "</div></a>";
            }
         ));
        
        $this->getHeader("note")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                //<a href=" $this->url('front-raid-detail', array('key' => $key, 'idRaid' => $aRaid['idRaid']));"><?php $this->escapeHtml($aRaid['note']); </a>
                return "<a class='' href='".$this->url()->fromRoute('front-raid-detail', array('key' => $this->get_key(), 
                                                                                               'idRaid' => $record['idRaid'])) 
                        . "'><div style='height:100%;width:100%'> "
                        . "{$record['note']}"
                        . "</div></a>";
            }
         ));
            
                
    }

    /**
     *
     * @param \Zend\Db\Sql\Select $query
     */
    protected function initFilters($query) {


        $value = $this->getParamAdapter()->getValueOfFilter('date');
        if ($value != null) {
            $query->where("date like '%" . $value . "%' ");
        }

        $value = $this->getParamAdapter()->getValueOfFilter('note');
        if ($value != null) {
            $query->where("note like '%" . $value . "%' ");
        }
    }

}
