<?php

namespace Commun\Grid;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Mvc\Controller\PluginManager;
use \Zend\Mvc\Controller\Plugin\Url;

/**
 * @author Antarus
 * @project Mystra
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
        'idUsers' => array(
            'title' => 'IdUsers',
            'width' => '100',
            'filters' => 'text',
        ),
        'login' => array(
            'title' => 'Login',
            'width' => '100',
            'filters' => 'text',
        ),
        'pwd' => array(
            'title' => 'Pwd',
            'width' => '100',
            'filters' => 'text',
        ),
        'pseudo' => array(
            'title' => 'Pseudo',
            'width' => '100',
            'filters' => 'text',
        ),
        'email' => array(
            'title' => 'Email',
            'width' => '100',
            'filters' => 'text',
        ),
        'avatar' => array(
            'title' => 'Avatar',
            'width' => '100',
            'filters' => 'text',
        ),
        'admin' => array(
            'title' => 'Admin',
            'width' => '100',
            'filters' => 'text',
        ),
        'forgetPass' => array(
            'title' => 'ForgetPass',
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
                return sprintf("<a class=\"btn btn-info\" href=\"" . $this->url()->fromRoute('backend-users-update', array('id' => $record["idUsers"])) . "\"><span class=\"glyphicon glyphicon-pencil \"></span>&nbsp;" . $this->_getServTranslator()->translate("Modifier") . "</a>", $record["idUsers"]);
            }
                ));

                $this->getHeader("delete")->getCell()->addDecorator("callable", array(
                    "callable" => function($context, $record) {
                        return sprintf("<a class=\"btn btn-danger\" href=\"" . $this->url()->fromRoute('backend-users-delete', array('id' => $record["idUsers"])) . "\" onclick=\"if (confirm('" . $this->_getServTranslator()->translate("Etes vous sur?") . "')) {document.location = this.href;} return false;\"><span class=\"glyphicon glyphicon-trash \"></span>&nbsp;" . $this->_getServTranslator()->translate("Supprimer") . "</a>", $record["idUsers"]);
                    }
                        ));
                    }

                    /**
                     *
                     * @param \Zend\Db\Sql\Select $query
                     */
                    protected function initFilters($query) {
                        $value = $this->getParamAdapter()->getValueOfFilter('idUsers');
                        if ($value != null) {
                            $query->where("idUsers = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('login');
                        if ($value != null) {
                            $query->where("login like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('pwd');
                        if ($value != null) {
                            $query->where("pwd like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('pseudo');
                        if ($value != null) {
                            $query->where("pseudo like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('email');
                        if ($value != null) {
                            $query->where("email like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('avatar');
                        if ($value != null) {
                            $query->where("avatar like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('admin');
                        if ($value != null) {
                            $query->where("admin = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('forgetPass');
                        if ($value != null) {
                            $query->where("forgetPass like '%" . $value . "%' ");
                        }
                    }

                }
