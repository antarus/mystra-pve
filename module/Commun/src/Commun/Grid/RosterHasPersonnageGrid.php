<?php

namespace Commun\Grid;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Mvc\Controller\PluginManager;
use \Zend\Mvc\Controller\Plugin\Url;

/**
 * @author Antarus
 * @project Mystra
 */
class RosterHasPersonnageGrid extends \ZfTable\AbstractTable {

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
        'name' => '',
        'showPagination' => true,
        'showQuickSearch' => false,
        'showItemPerPage' => true,
        'itemCountPerPage' => 20,
        'showColumnFilters' => true,
    );
    protected $headers = array(
//        'idRoster' => array(
//            'title' => 'IdRoster',
//            'width' => '100',
//            'filters' => 'text',
//        ),
        'nom' => array(
            'title' => 'Nom',
            'width' => '100',
            'filters' => 'text',
        ),
//        'idRole' => array(
//            'title' => 'IdRole',
//            'width' => '100',
//            'filters' => 'text',
//        ),
        'isApply' => array(
            'title' => 'Apply',
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
        $this->getHeader("isApply")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                return $record["isApply"] == 0 ? 'Non' : 'Oui';
            }
        ));

        $this->getHeader("nom")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                return "<span class='m-nom' style=\"color:" . $record['couleur'] . "\" >" . $record['nom'] . "</span>";
            }
        ));

        $this->getHeader("edit")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record) {
                return sprintf("<a class=\"btn btn-info\" href=\"" . $this->url()->fromRoute('backend-roster-has-personnage-update', array('id' => $record["idPersonnage"])) . "\"><span class=\"glyphicon glyphicon-pencil \"></span>&nbsp;" . $this->_getServTranslator()->translate("Modifier") . "</a>", $record["idPersonnage"]);
            }
                ));

                $this->getHeader("delete")->getCell()->addDecorator("callable", array(
                    "callable" => function($context, $record) {
                        return sprintf("<a class=\"btn btn-danger\" href=\"" . $this->url()->fromRoute('backend-roster-has-personnage-delete', array('id' => $record["idPersonnage"])) . "\" onclick=\"if (confirm('" . $this->_getServTranslator()->translate("Etes vous sur?") . "')) {document.location = this.href;} return false;\"><span class=\"glyphicon glyphicon-trash \"></span>&nbsp;" . $this->_getServTranslator()->translate("Supprimer") . "</a>", $record["idPersonnage"]);
                    }
                        ));
                    }

                    /**
                     *
                     * @param \Zend\Db\Sql\Select $query
                     */
                    protected function initFilters($query) {
                        $value = $this->getParamAdapter()->getValueOfFilter('idRoster');
                        if ($value != null) {
                            $query->where("idRoster = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('idPersonnage');
                        if ($value != null) {
                            $query->where("idPersonnage = '" . $value . "' ");
                        }


                        $value = $this->getParamAdapter()->getValueOfFilter('idRole');
                        if ($value != null) {
                            $query->where("idRole = '" . $value . "' ");
                        }
                    }

                }
