<?php

namespace Commun\Table;

use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class PallierAfficherTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'pallierAfficher';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\ItemPersonnageRaid
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\PallierAfficher';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idPallierAffiche';
    private $_config;

    /**
     * Retourne la configuration.
     * @return Config
     */
    private function _getConfig() {
        if (!$this->_config) {
            $this->_config = $this->_getServiceLocator()->get('Config');
        }
        return $this->_config['conf'];
    }

    /**
     * Retourne une ligne pour une clé donnée dépendant du prototypeClass
     *
     * @param mixed | string | int $id
     * @param null | string $protypeClass
     * @return mixed Retourne le model dépendant du prototypeClass
     */
    public function findRow($id, $prototypeClass = null) {

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();
        $oQuery->columns(array(
                    'idPallierAffiche',
                    'idModeDifficulte',
                    'idZone',
                    'idRoster'
                ))
                ->from(array('p' => 'pallierAfficher'))
                ->join(array('m' => 'mode_difficulte'), 'm.idMode = p.idModeDifficulte', array('mode' => 'nom'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('z' => 'zone'), 'z.idZone = p.idZone', array('zone' => 'nom'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('r' => 'roster'), 'r.idRoster = p.idRoster', array('roster' => 'nom'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->where(array('idPallierAffiche' => $id))
        ;

        $oRowSet = $this->selectWith($oQuery);
        $arrayObjectPrototypeClass = ($prototypeClass) ? $prototypeClass : $this->arrayObjectPrototypeClass;
        $oRowSet->setArrayObjectPrototype(new $arrayObjectPrototypeClass());
        //  $this->debug($query);
        return $oRowSet->current();
    }

    /**
     * Retourne la query de base pour l'affichage de la liste des pallier.
     * @return Zend\Db\Sql\Select
     */
    function getQueryAjaxListe() {

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $query = $sql->select();

        $query->columns(array(
                    'idPallierAffiche',
                    'idModeDifficulte',
                    'idZone',
                    'idRoster'
                ))
                ->from(array('p' => 'pallierAfficher'))
                ->join(array('m' => 'mode_difficulte'), 'm.idMode = p.idModeDifficulte', array('mode' => 'nom'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('z' => 'zone'), 'z.idZone = p.idZone', array('zone' => 'nom'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('r' => 'roster'), 'r.idRoster = p.idRoster', array('roster' => 'nom'), \Zend\Db\Sql\Select::JOIN_INNER)
        ;
        $query->order(array('zone'));
        //  $this->debug($query);
        return $query;
    }

    /**
     * Sauvegarde ou met a jour le personnage passé.
     * @param array $aPallier
     * @return  \Core\Model\PallierAfficher
     */
    public function saveOrUpdatePallier($aPallier) {
        try {
            //recherche si le lien existe
            try {

                $oTabLien = $this->selectBy(
                        array(
                            "idPallierAffiche" => $aPallier['idPallierAffiche']));
                if (!$oTabLien) {
                    $oTabLien = $this->selectBy(
                            array(
                                "idModeDifficulte" => $aPallier['idModeDifficulte'],
                                "idZone" => $aPallier['idZone'],
                                "idRoster" => $aPallier['idRoster']));
                }
            } catch (\Exception $exc) {
                throw new DatabaseException(10000, 4, $this->_getServiceLocator()->get('translator'), $aPallier, $exc);
            }
            $oPallier = new \Commun\Model\PallierAfficher();
            $oPallier->setIdModeDifficulte($aPallier['idModeDifficulte']);
            $oPallier->setIdZone($aPallier['idZone']);
            $oPallier->setIdRoster($aPallier['idRoster']);
            // si n'existe pas on insert
            if (!$oTabLien) {
                try {
                    $oTabLien = $this->select(
                            array("idRoster" => $aPallier['idRoster']));
                    if ($oTabLien->count() == $this->_getConfig()["pallier"]["max"]) {
                        throw new DatabaseException(10000, 7, $this->_getServiceLocator()->get('translator'));
                    }
                    $this->insert($oPallier->getArrayCopySauvegarde());
                    $oPallier->setIdPallierAffiche($this->lastInsertValue);
                } catch (\Exception $exc) {
                    throw new DatabaseException(10000, 2, $this->_getServiceLocator()->get('translator'), array(), $exc);
                }
            } else {
                try {
                    // sinon on update
                    $oPallier->setIdPallierAffiche($oTabLien->getIdPallierAffiche());
                    $this->update($oPallier->getArrayCopySauvegarde());
                } catch (\Exception $exc) {
                    throw new DatabaseException(10000, 1, $this->_getServiceLocator()->get('translator'), array(), $exc);
                }
            }
            return $oPallier;
        } catch (\Exception $ex) {
            throw new \Exception($this->_getServiceLocator()->get('translator')->translate("Erreur lors de la sauvegarde du pallier."), 0, $ex);
        }
    }

}
