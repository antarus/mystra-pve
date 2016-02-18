<?php

namespace Commun\Grid;

use \Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Mvc\Controller\PluginManager;
use \Zend\Mvc\Controller\Plugin\Url;

/**
 * @author Antarus
 * @project Mystra
 */
class EvenementsTemplateRolesGrid extends \ZfTable\AbstractTable
{

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
        'idEvenements_template_roles' => array(
            'title' => 'IdEvenements template roles',
            'width' => '100',
            'filters' => 'text',
        ),
        'nombre' => array(
            'title' => 'Nombre',
            'width' => '100',
            'filters' => 'text',
        ),
        'ordre' => array(
            'title' => 'Ordre',
            'width' => '100',
            'filters' => 'text',
        ),
        'idEvenements_template' => array(
            'title' => 'IdEvenements template',
            'width' => '100',
            'filters' => 'text',
        ),
        'idRoles' => array(
            'title' => 'IdRoles',
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
    public function __construct(ServiceLocatorInterface $oServiceLocator, PluginManager $oPluginManager)
    {
        $this->_serviceLocator = $oServiceLocator;
        $this->_pluginManager = $oPluginManager;
    }

    /**
     * Retourne le plugin url.
     *
     * @var \Zend\Mvc\Controller\PluginManager
     */
    public function url()
    {
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
    public function _getServTranslator()
    {
        if (!$this->_servTranslator) {
            $this->_servTranslator = $this->_serviceLocator->get('translator');
        }
        return $this->_servTranslator;
    }

    public function init()
    {
        $this->getHeader("edit")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record){
                return sprintf("<a class=\"btn btn-info\" href=\"". $this->url()->fromRoute('commun-evenements_template_roles-update', array('id' => $record["idEvenements_template_roles"]))."\"><span class=\"glyphicon glyphicon-pencil \"></span>&nbsp;" . $this->_getServTranslator()->translate("Modifier") . "</a>", $record["idEvenements_template_roles"]);
            }
        ));

        $this->getHeader("delete")->getCell()->addDecorator("callable", array(
            "callable" => function($context, $record){
                return sprintf("<a class=\"btn btn-danger\" href=\"".$this->url()->fromRoute('commun-evenements_template_roles-delete', array('id' => $record["idEvenements_template_roles"]))."\" onclick=\"if (confirm('" . $this->_getServTranslator()->translate("Etes vous sur?") . "')) {document.location = this.href;} return false;\"><span class=\"glyphicon glyphicon-trash \"></span>&nbsp;" . $this->_getServTranslator()->translate("Supprimer") . "</a>", $record["idEvenements_template_roles"]);
            }
        ));
    }

    protected function initFilters(\Zend\Db\Sql\Select $query)
    {
        $value = $this->getParamAdapter()->getValueOfFilter('idEvenements_template_roles');
        if ($value != null) {
            $query->where("idEvenements_template_roles = '".$value."' ");
        }

        $value = $this->getParamAdapter()->getValueOfFilter('nombre');
        if ($value != null) {
            $query->where("nombre like '%".$value."%' ");
        }

        $value = $this->getParamAdapter()->getValueOfFilter('ordre');
        if ($value != null) {
            $query->where("ordre like '%".$value."%' ");
        }

        $value = $this->getParamAdapter()->getValueOfFilter('idEvenements_template');
        if ($value != null) {
            $query->where("idEvenements_template = '".$value."' ");
        }

        $value = $this->getParamAdapter()->getValueOfFilter('idRoles');
        if ($value != null) {
            $query->where("idRoles = '".$value."' ");
        }
    }


}

