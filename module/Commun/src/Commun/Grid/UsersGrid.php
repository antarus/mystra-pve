<?php

namespace Commun\Grid;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Mvc\Controller\PluginManager;
use \Zend\Mvc\Controller\Plugin\Url;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class UsersGrid extends \ZfTable\AbstractTable {

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
    protected $config = array(
        'name' => 'List',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 20,
        'showColumnFilters' => true,
    );
    protected $headers = array(
        'id' => array(
            'title' => 'Id',
            'width' => '100',
            'filters' => 'text',
        ),
        'username' => array(
            'title' => 'username',
            'width' => '100',
            'filters' => 'text',
        ),
        'display_name' => array(
            'title' => 'Pseudo',
            'width' => '100',
            'filters' => 'text',
        ),
        'email' => array(
            'title' => 'Email',
            'width' => '100',
            'filters' => 'text',
        ),
        'state' => array(
            'title' => 'Statuts',
            'width' => '100',
            'filters' => 'text',
        ),
        'lastConnection' => array(
            'title' => 'Last connection',
            'width' => '100',
            'filters' => 'text',
        ),
        'lastUpdate' => array(
            'title' => 'Last Update',
            'width' => '100',
            'filters' => 'text',
        ),
        'edit' => array(
            'title' => 'Modifier',
            'width' => '100',
        ),
        'delete' => array(
            'title' => 'Supprimer',
            'width' => '100',
        ),
    );

    /**
     * Constructeur du tableau.
     *
     * @param ServiceLocatorInterface
     * @param PluginManager
     */
    public function __construct(ServiceLocatorInterface $oServiceLocator, PluginManager $oPluginManager) {
        $this->_serviceLocator = $oServiceLocator;
        $this->_pluginManager = $oPluginManager;
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

    public function init() {
        
        $this->getHeader("lastConnection")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                if($record['lastConnection'] != '0000-00-00 00:00:00')
                {
                    $date = new \DateTime($record['lastConnection']);
                    return $date->format('d-m-Y H:i:s');
                }
                else return '-';
            }
        ));
        
        $this->getHeader("lastUpdate")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                if($record['lastUpdate'] != '0000-00-00 00:00:00')
                {
                    $date = new \DateTime($record['lastUpdate']);
                    return $date->format('d-m-Y H:i:s');
                }
                else return '-';
            }
        ));       
        
        $this->getHeader("edit")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                return '<a class="btn btn-info" href="' . 
                        $this->url()->fromRoute('backend-users-update', array('id' => $record["id"])) . 
                        '"><span class="glyphicon glyphicon-pencil "></span>&nbsp;'
                        . $this->_getServTranslator()->translate("Modifier") . '</a>';
            }
        ));

        $this->getHeader("delete")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                return '<a class="btn btn-danger" href="' . 
                       $this->url()->fromRoute('backend-users-delete', array('id' => $record["id"])) . 
                       '" onclick="if (confirm("'. $this->_getServTranslator()->translate("Etes vous sur?") . '")) {document.location = this.href;} return false;">
                         <span class="glyphicon glyphicon-trash "></span>&nbsp;' . $this->_getServTranslator()->translate("Supprimer") .
                        "</a>";
            }
        ));
    }

    /**
     *
     * @param \Zend\Db\Sql\Select $query
     */
    protected function initFilters($query) {
       
        $value = $this->getParamAdapter()->getValueOfFilter('id');
        if ($value != null) {
            $query->where("id = '$value'");
        }

        $value = $this->getParamAdapter()->getValueOfFilter('username');
        if ($value != null) {
            $query->where("username like '%" . $value . "%' ");
        }

        $value = $this->getParamAdapter()->getValueOfFilter('display_name');
        if ($value != null) {
            $query->where("display_name like '%" . $value . "%' ");
        }

        $value = $this->getParamAdapter()->getValueOfFilter('lastConnection');
        if ($value != null) {
            $query->where("lastConnection like '%" . $value . "%' ");
        }
        
        $value = $this->getParamAdapter()->getValueOfFilter('lastUpdate');
        if ($value != null) {
            $query->where("lastUpdate like '%" . $value . "%' ");
        }

        $value = $this->getParamAdapter()->getValueOfFilter('email');
        if ($value != null) {
            $query->where("email like '%" . $value . "%' ");
        }
        $value = $this->getParamAdapter()->getValueOfFilter('state');
        if ($value != null) {
            $query->where("state =$value");
        }


    }

}
