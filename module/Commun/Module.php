<?php

namespace Commun;

/**
 * Module de classe Standard
 *
 * @
 *
 *         author Antarus Capi
 * @ project  Mystra
 */
class Module {

    /**
     * Méthode standard de bootstrap
     *
     * @param \Zend\Mvc\MvcEvent $e
     */
    public function onBootstrap(\Zend\Mvc\MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new \Zend\Mvc\ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    /**
     * Configuration des modules a charger
     */
    public function getConfig() {
        $config = require __DIR__ . '/config/module.config.php';
        return $config;
    }

    /**
     * autoloader configuration
     *
     * Utiliser pour charger les classes
     */
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
        );
    }

    /**
     * Configuration des services.
     */
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Commun\Table\BossesTable' => function($sm) {
                    $oTable = new \Commun\Table\BossesTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\BossesHasNpcTable' => function($sm) {
                    $oTable = new \Commun\Table\BossesHasNpcTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\ClassesTable' => function($sm) {
                    $oTable = new \Commun\Table\ClassesTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\EvenementsTable' => function($sm) {
                    $oTable = new \Commun\Table\EvenementsTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\EvenementsPersonnageTable' => function($sm) {
                    $oTable = new \Commun\Table\EvenementsPersonnageTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\EvenementsRolesTable' => function($sm) {
                    $oTable = new \Commun\Table\EvenementsRolesTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\EvenementsTemplateTable' => function($sm) {
                    $oTable = new \Commun\Table\EvenementsTemplateTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\EvenementsTemplateRolesTable' => function($sm) {
                    $oTable = new \Commun\Table\EvenementsTemplateRolesTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\FactionTable' => function($sm) {
                    $oTable = new \Commun\Table\FactionTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\GuildesTable' => function($sm) {
                    $oTable = new \Commun\Table\GuildesTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\ItemPersonnageRaidTable' => function($sm) {
                    $oTable = new \Commun\Table\ItemPersonnageRaidTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\ItemsTable' => function($sm) {
                    $oTable = new \Commun\Table\ItemsTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\ModeDifficulteTable' => function($sm) {
                    $oTable = new \Commun\Table\ModeDifficulteTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\NpcTable' => function($sm) {
                    $oTable = new \Commun\Table\NpcTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\ItemPersonnageRaidTable' => function($sm) {
                    $oTable = new \Commun\Table\ItemPersonnageRaidTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\PallierAfficherTable' => function($sm) {
                    $oTable = new \Commun\Table\PallierAfficherTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\PersonnagesTable' => function($sm) {
                    $oTable = new \Commun\Table\PersonnagesTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\PersonnagesHasSpecialisationTable' => function($sm) {
                    $oTable = new \Commun\Table\PersonnagesHasSpecialisationTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\RaceTable' => function($sm) {
                    $oTable = new \Commun\Table\RaceTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\RaidPersonnageTable' => function($sm) {
                    $oTable = new \Commun\Table\RaidPersonnageTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\RaidsTable' => function($sm) {
                    $oTable = new \Commun\Table\RaidsTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\RoleTable' => function($sm) {
                    $oTable = new \Commun\Table\RoleTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\RosterTable' => function($sm) {
                    $oTable = new \Commun\Table\RosterTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\RosterHasPersonnageTable' => function($sm) {
                    $oTable = new \Commun\Table\RosterHasPersonnageTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\SpecialisationTable' => function($sm) {
                    $oTable = new \Commun\Table\SpecialisationTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\UsersTable' => function($sm) {
                    $oTable = new \Commun\Table\UsersTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\ZoneTable' => function($sm) {
                    $oTable = new \Commun\Table\ZoneTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\ZoneHasBossesTable' => function($sm) {
                    $oTable = new \Commun\Table\ZoneHasBossesTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\ZoneHasModeDiffculteTable' => function($sm) {
                    $oTable = new \Commun\Table\ZoneHasModeDiffculteTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\ContentTable' => function($sm) {
                    $oTable = new \Commun\Table\ContentTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
                'Commun\Table\PagesTable' => function($sm) {
                    $oTable = new \Commun\Table\PagesTable($sm->get("\Zend\Db\Adapter\Adapter"));
                    $oTable->setServiceLocator($sm);
                    return $oTable;
                },
            )
        );
    }

}
