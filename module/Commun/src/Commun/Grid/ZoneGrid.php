<?php

namespace Commun\Grid;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Mvc\Controller\PluginManager;
use \Zend\Mvc\Controller\Plugin\Url;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ZoneGrid extends \ZfTable\AbstractTable {

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
        'idZone' => array(
            'title' => 'IdZone',
            'width' => '100',
            'filters' => 'text',
        ),
        'nom' => array(
            'title' => 'Nom',
            'width' => '100',
            'filters' => 'text',
        ),
        'lvlMin' => array(
            'title' => 'LvlMin',
            'width' => '100',
            'filters' => 'text',
        ),
        'lvlMax' => array(
            'title' => 'LvlMax',
            'width' => '100',
            'filters' => 'text',
        ),
        'tailleMin' => array(
            'title' => 'TailleMin',
            'width' => '100',
            'filters' => 'text',
        ),
        'tailleMax' => array(
            'title' => 'TailleMax',
            'width' => '100',
            'filters' => 'text',
        ),
        'patch' => array(
            'title' => 'Patch',
            'width' => '100',
            'filters' => 'text',
        ),
        'isDonjon' => array(
            'title' => 'IsDonjon',
            'width' => '100',
            'filters' => 'text',
        ),
        'isRaid' => array(
            'title' => 'IsRaid',
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
        $this->getHeader("edit")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                return sprintf("<a class=\"btn btn-info\" href=\"" . $this->url()->fromRoute('backend-zone-update', array('id' => $record["idZone"])) . "\"><span class=\"glyphicon glyphicon-pencil \"></span>&nbsp;" . $this->_getServTranslator()->translate("Modifier") . "</a>", $record["idZone"]);
            }
                ));

                $this->getHeader("delete")->getCell()->addDecorator("callable", array(
                    "callable" => function($context, $record) {
                        return sprintf("<a class=\"btn btn-danger\" href=\"" . $this->url()->fromRoute('backend-zone-delete', array('id' => $record["idZone"])) . "\" onclick=\"if (confirm('" . $this->_getServTranslator()->translate("Etes vous sur?") . "')) {document.location = this.href;} return false;\"><span class=\"glyphicon glyphicon-trash \"></span>&nbsp;" . $this->_getServTranslator()->translate("Supprimer") . "</a>", $record["idZone"]);
                    }
                        ));
                    }

                    /**
                     *
                     * @param \Zend\Db\Sql\Select $query
                     */
                    protected function initFilters($query) {
                        $value = $this->getParamAdapter()->getValueOfFilter('idZone');
                        if ($value != null) {
                            $query->where("idZone = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('nom');
                        if ($value != null) {
                            $query->where("nom like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('lvlMin');
                        if ($value != null) {
                            $query->where("lvlMin like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('lvlMax');
                        if ($value != null) {
                            $query->where("lvlMax like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('tailleMin');
                        if ($value != null) {
                            $query->where("tailleMin like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('tailleMax');
                        if ($value != null) {
                            $query->where("tailleMax like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('patch');
                        if ($value != null) {
                            $query->where("patch like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('isDonjon');
                        if ($value != null) {
                            $query->where("isDonjon = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('isRaid');
                        if ($value != null) {
                            $query->where("isRaid = '" . $value . "' ");
                        }
                    }

                }
