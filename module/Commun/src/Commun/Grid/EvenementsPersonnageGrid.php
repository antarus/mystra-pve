<?php

namespace Commun\Grid;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Mvc\Controller\PluginManager;
use \Zend\Mvc\Controller\Plugin\Url;

/**
 * @author Antarus
 * @project Mystra
 */
class EvenementsPersonnageGrid extends \ZfTable\AbstractTable {

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
        'idEvenement_personnage' => array(
            'title' => 'IdEvenement personnage',
            'width' => '100',
            'filters' => 'text',
        ),
        'status' => array(
            'title' => 'Status',
            'width' => '100',
            'filters' => 'text',
        ),
        'dateCreation' => array(
            'title' => 'DateCreation',
            'width' => '100',
            'filters' => 'text',
        ),
        'dateModification' => array(
            'title' => 'DateModification',
            'width' => '100',
            'filters' => 'text',
        ),
        'idEvenements' => array(
            'title' => 'IdEvenements',
            'width' => '100',
            'filters' => 'text',
        ),
        'idPersonnage' => array(
            'title' => 'IdPersonnage',
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
                return sprintf("<a class=\"btn btn-info\" href=\"" . $this->url()->fromRoute('backend-evenements_personnage-update', array('id' => $record["idEvenement_personnage"])) . "\"><span class=\"glyphicon glyphicon-pencil \"></span>&nbsp;" . $this->_getServTranslator()->translate("Modifier") . "</a>", $record["idEvenement_personnage"]);
            }
                ));

                $this->getHeader("delete")->getCell()->addDecorator("callable", array(
                    "callable" => function($context, $record) {
                        return sprintf("<a class=\"btn btn-danger\" href=\"" . $this->url()->fromRoute('backend-evenements_personnage-delete', array('id' => $record["idEvenement_personnage"])) . "\" onclick=\"if (confirm('" . $this->_getServTranslator()->translate("Etes vous sur?") . "')) {document.location = this.href;} return false;\"><span class=\"glyphicon glyphicon-trash \"></span>&nbsp;" . $this->_getServTranslator()->translate("Supprimer") . "</a>", $record["idEvenement_personnage"]);
                    }
                        ));
                    }

                    /**
                     *
                     * @param \Zend\Db\Sql\Select $query
                     */
                    protected function initFilters($query) {
                        $value = $this->getParamAdapter()->getValueOfFilter('idEvenement_personnage');
                        if ($value != null) {
                            $query->where("idEvenement_personnage = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('status');
                        if ($value != null) {
                            $query->where("status like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('dateCreation');
                        if ($value != null) {
                            $query->where("dateCreation like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('dateModification');
                        if ($value != null) {
                            $query->where("dateModification like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('idEvenements');
                        if ($value != null) {
                            $query->where("idEvenements = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('idPersonnage');
                        if ($value != null) {
                            $query->where("idPersonnage = '" . $value . "' ");
                        }
                    }

                }
