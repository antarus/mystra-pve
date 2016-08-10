<?php

namespace Commun\Grid;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Mvc\Controller\PluginManager;
use \Zend\Mvc\Controller\Plugin\Url;

/**
 * @author Antarus
 * @project Mystra
 */
class EvenementsGrid extends \ZfTable\AbstractTable {

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
        'idEvenements' => array(
            'title' => 'IdEvenements',
            'width' => '100',
            'filters' => 'text',
        ),
        'nom' => array(
            'title' => 'Nom',
            'width' => '100',
            'filters' => 'text',
        ),
        'description' => array(
            'title' => 'Description',
            'width' => '100',
            'filters' => 'text',
        ),
        'dateHeureDebutInvitation' => array(
            'title' => 'DateHeureDebutInvitation',
            'width' => '100',
            'filters' => 'text',
        ),
        'dateHeureDebutEvenement' => array(
            'title' => 'DateHeureDebutEvenement',
            'width' => '100',
            'filters' => 'text',
        ),
        'dateHeureFinInscription' => array(
            'title' => 'DateHeureFinInscription',
            'width' => '100',
            'filters' => 'text',
        ),
        'lvlMin' => array(
            'title' => 'LvlMin',
            'width' => '100',
            'filters' => 'text',
        ),
        'ouvertATous' => array(
            'title' => 'OuvertATous',
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
        'idDonjon' => array(
            'title' => 'IdDonjon',
            'width' => '100',
            'filters' => 'text',
        ),
        'idUsers' => array(
            'title' => 'IdUsers',
            'width' => '100',
            'filters' => 'text',
        ),
        'idGuildes' => array(
            'title' => 'IdGuildes',
            'width' => '100',
            'filters' => 'text',
        ),
        'idRoster' => array(
            'title' => 'IdRoster',
            'width' => '100',
            'filters' => 'text',
        ),
        'idEvenements_template' => array(
            'title' => 'IdEvenements template',
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
                return sprintf("<a class=\"btn btn-info\" href=\"" . $this->url()->fromRoute('backend-evenements-update', array('id' => $record["idEvenements"])) . "\"><span class=\"glyphicon glyphicon-pencil \"></span>&nbsp;" . $this->_getServTranslator()->translate("Modifier") . "</a>", $record["idEvenements"]);
            }
                ));

                $this->getHeader("delete")->getCell()->addDecorator("callable", array(
                    "callable" => function($context, $record) {
                        return sprintf("<a class=\"btn btn-danger\" href=\"" . $this->url()->fromRoute('backend-evenements-delete', array('id' => $record["idEvenements"])) . "\" onclick=\"if (confirm('" . $this->_getServTranslator()->translate("Etes vous sur?") . "')) {document.location = this.href;} return false;\"><span class=\"glyphicon glyphicon-trash \"></span>&nbsp;" . $this->_getServTranslator()->translate("Supprimer") . "</a>", $record["idEvenements"]);
                    }
                        ));
                    }

                    /**
                     *
                     * @param \Zend\Db\Sql\Select $query
                     */
                    protected function initFilters($query) {
                        $value = $this->getParamAdapter()->getValueOfFilter('idEvenements');
                        if ($value != null) {
                            $query->where("idEvenements = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('nom');
                        if ($value != null) {
                            $query->where("nom like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('description');
                        if ($value != null) {
                            $query->where("description like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('dateHeureDebutInvitation');
                        if ($value != null) {
                            $query->where("dateHeureDebutInvitation like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('dateHeureDebutEvenement');
                        if ($value != null) {
                            $query->where("dateHeureDebutEvenement like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('dateHeureFinInscription');
                        if ($value != null) {
                            $query->where("dateHeureFinInscription like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('lvlMin');
                        if ($value != null) {
                            $query->where("lvlMin like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('ouvertATous');
                        if ($value != null) {
                            $query->where("ouvertATous = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('dateCreation');
                        if ($value != null) {
                            $query->where("dateCreation like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('dateModification');
                        if ($value != null) {
                            $query->where("dateModification like '%" . $value . "%' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('idDonjon');
                        if ($value != null) {
                            $query->where("idDonjon = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('idUsers');
                        if ($value != null) {
                            $query->where("idUsers = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('idGuildes');
                        if ($value != null) {
                            $query->where("idGuildes = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('idRoster');
                        if ($value != null) {
                            $query->where("idRoster = '" . $value . "' ");
                        }

                        $value = $this->getParamAdapter()->getValueOfFilter('idEvenements_template');
                        if ($value != null) {
                            $query->where("idEvenements_template = '" . $value . "' ");
                        }
                    }

                }
