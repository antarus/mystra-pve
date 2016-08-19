<?php

namespace Commun\Grid;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Mvc\Controller\PluginManager;
use \Zend\Mvc\Controller\Plugin\Url;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class PersonnagesGrid extends \ZfTable\AbstractTable {

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
        'idPersonnage' => array(
            'title' => 'IdPersonnage',
            'width' => '100',
            'filters' => 'text',
        ),
        'nom' => array(
            'title' => 'Nom',
            'width' => '100',
            'filters' => 'text',
        ),
        'niveau' => array(
            'title' => 'Niveau',
            'width' => '100',
            'filters' => 'text',
        ),
        'genre' => array(
            'title' => 'Genre',
            'width' => '100',
            'filters' => 'text',
        ),
        'miniature' => array(
            'title' => 'miniature',
            'width' => '100',
            'filters' => 'text',
        ),
        'royaume' => array(
            'title' => 'Royaume',
            'width' => '100',
            'filters' => 'text',
        ),
        'faction' => array(
            'title' => 'Faction',
            'width' => '100',
            'filters' => 'text',
        ),
        'classe' => array(
            'title' => 'classe',
            'width' => '100',
            'filters' => 'text',
        ),
        'race' => array(
            'title' => 'Race',
            'width' => '100',
            'filters' => 'text',
        ),
        'guilde' => array(
            'title' => 'Guilde',
            'width' => '100',
            'filters' => 'text',
        ),
        'isTech' => array(
            'title' => 'isTech',
            'width' => '100',
            'filters' => 'text',
        ),
//        'idUsers' => array(
//            'title' => 'IdUsers',
//            'width' => '100',
//            'filters' => 'text',
//        ),
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
        $this->getHeader("nom")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                return ucfirst($record["nom"]);
            }
        ));
        $this->getHeader("genre")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                return $record["genre"] == 0 ? 'Male' : 'Female';
            }
        ));
        $this->getHeader("edit")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                return sprintf("<a class=\"btn btn-info\" href=\"" . $this->url()->fromRoute('backend-personnages-update', array('id' => $record["idPersonnage"])) . "\"><span class=\"glyphicon glyphicon-pencil \"></span>&nbsp;" . $this->_getServTranslator()->translate("Modifier") . "</a>", $record["idPersonnage"]);
            }
                ));

                $this->getHeader("delete")->getCell()->addDecorator("callable", array(
                    "callable" => function($context, $record) {
                        return sprintf("<a class=\"btn btn-danger\" href=\"" . $this->url()->fromRoute('backend-personnages-delete', array('id' => $record["idPersonnage"])) . "\" onclick=\"if (confirm('" . $this->_getServTranslator()->translate("Etes vous sur?") . "')) {document.location = this.href;} return false;\"><span class=\"glyphicon glyphicon-trash \"></span>&nbsp;" . $this->_getServTranslator()->translate("Supprimer") . "</a>", $record["idPersonnage"]);
                    }
                        ));
                    }

                    /**
                     *
                     * @param \Zend\Db\Sql\Select $query
                     */
                    protected function initFilters($query) {
                        $value = $this->getParamAdapter()->getValueOfFilter('idPersonnage');
                        if ($value != null) {
                            $query->where("idPersonnage = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('nom');
                        if ($value != null) {
                            $query->where("p.nom like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('niveau');
                        if ($value != null) {
                            $query->where("p.niveau = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('genre');
                        if ($value != null) {
                            if (strtolower($value) == 'female') {
                                $value = '0';
                            } else {
                                $value = '1';
                            }
                            $query->where("p.genre = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('miniature');
                        if ($value != null) {
                            $query->where("p.miniature like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('royaume');
                        if ($value != null) {
                            $query->where("p.royaume like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('faction');
                        if ($value != null) {
                            $query->where("f.nom like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('classe');
                        if ($value != null) {
                            $query->where("c.nom like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('race');
                        if ($value != null) {
                            $query->where("r.nom like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('guilde');
                        if ($value != null) {
                            $query->where("g.nom like '%" . $value . "%' ");
                        }

//                        $value = $this->getParamAdapter()->getValueOfFilter('idUsers');
//                        if ($value != null) {
//                            $query->where("idUsers = '" . $value . "' ");
//                        }
                    }

                }
