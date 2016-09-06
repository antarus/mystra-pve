<?php

namespace Commun\Table;

use \Commun\Exception\BnetException;
use \Commun\Exception\DatabaseException;
use \Zend\Db\Sql\Expression;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidsTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'raids';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Raids
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Raids';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRaid';
    private $_tablePallier;

    /**
     * Retourne le service de la table items.
     * @return \Commun\Table\PallierAfficherTable
     */
    private function getTablePallier() {
        if (!$this->_tablePallier) {
            $this->_tablePallier = $this->_getServiceLocator()->get('Commun\Table\PallierAfficherTable');
        }
        return $this->_tablePallier;
    }

    /**
     * Sauvegarde ou met a jour le personnage passé.
     * @param \Commun\Model\Raids $oRaids
     * @return  \Core\Model\Raids
     */
    public function saveOrUpdateRaid($oRaids) {
        try {
            //recherche si le raid existe
            /* @var $oTabRaid \Commun\Model\Raids */
            $oTabRaid = $this->selectBy(
                    array(
                        "idRaid" => $oRaids->getIdRaid()));
            if (!$oTabRaid) {
                $oTabRaid = $this->selectBy(
                        array(
                            "date" => $oRaids->getDate()));
            }
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $oRaids->getArrayCopy(), $exc);
        }
        // si n'existe pas on insert
        if (!$oTabRaid) {
            try {
                $this->insert($oRaids);
                $oRaids->setIdRaid($this->lastInsertValue);
            } catch (\Exception $exc) {
                throw new DatabaseException(4000, 2, $this->_getServiceLocator(), $oRaids->getArrayCopy(), $exc);
            }
        } else {
            try {
                // sinon on update
                $oRaids->setIdRaid($oTabRaid->getIdRaid());
                $oRaids->setMajPar("Import Raid-TracKer");
                $this->update($oRaids);
            } catch (\Exception $exc) {
                throw new DatabaseException(4000, 1, $this->_getServiceLocator(), $oRaids->getArrayCopy(), $exc);
            }
        }
        return $oRaids;
    }

    /**
     * Retourne le nombre total de raid du roster.
     * @param int $iIdRaid
     */
    public function getNombreRaidRoster($iIdRaid) {
        try {
            $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
            $oQuery = $sql->select();
            $oQuery->columns(array(
                        'totalRaid' => new Expression('COUNT(r.idRaid)')
                    ))
                    ->from(array('r' => 'raids'))
                    ->order('idMode')
            ->where->equalTo("idRosterTmp", $iIdRaid);
            // $this->debug($oQuery);
            return $this->fetchAllArray($oQuery)[0]['totalRaid'];
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRaid, $exc);
        }
    }

    /**
     * Retourne le nombre de raid du roster sur les palliers configuré.
     * @param int $iIdRoster
     */
    public function getNombreRaidRosterPallier($iIdRoster) {
        try {
            $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
            $oQuery = $sql->select();
            $oQuery->columns(array(
                        'totalRaidPallier' => new Expression('COUNT(r.idRaid)')
                    ))
                    ->from(array('r' => 'raids'))
                    ->order('idMode');
            try {

                $predicatePallier = $this->getTablePallier()->getPredicate($iIdRoster);
//            $predicatePallier->AND->equalTo("idRosterTmp", $iIdRoster);

                $oQuery->where->addPredicate($predicatePallier);
            } catch (\Commun\Exception\LogException $exc) {
                return null;
            }

            return $this->fetchAllArray($oQuery)[0]['totalRaidPallier'];
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRoster, $exc);
        }
    }

    /**
     * Retourne le nombre de raid du roster pour chaque personnage.
     * @param int $iIdRoster
     */
    public function getNombreRaidPersonnageRoster($iIdRoster) {
        try {
            $oQuery = $this->getBaseQueryNbRaid($iIdRoster)->columns(array(
                        'nbRaid' => new Expression('COUNT(rp.idRaid)'),
                        'idPersonnage'
                    ))
                    ->group("nom_personnage")
                    ->order('nom_personnage');
            $where = new \Zend\Db\Sql\Where();
            $where->equalTo("idRosterTmp", $iIdRoster);
            $oQuery->where($where);

            // $this->debug($oQuery);
            return $this->fetchAllArray($oQuery);
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRoster, $exc);
        }
    }

    /**
     * Retourne le nombre de raid du roster pour chaque personnage.
     * @param int $iIdRoster
     */
    public function getNombreRaidPersonnageRosterPallier($iIdRoster) {
        try {
            $oQuery = $this->getBaseQueryNbRaid($iIdRoster)->
                    columns(array(
                'nbRaidPallier' => new Expression('COUNT(rp.idRaid)'),
                'idPersonnage'
            ));
            try {

                $predicatePallier = $this->getTablePallier()->getPredicate($iIdRoster);
                $oQuery->where->addPredicate($predicatePallier);
            } catch (\Commun\Exception\LogException $exc) {
                return array();
            }


            $oQuery->group("nom_personnage")
                    ->order('nom_personnage');
            // $this->debug($oQuery);
            return $this->fetchAllArray($oQuery);
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRoster, $exc);
        }
    }

    /**
     * retourne la base query pour le calcul du nombre de raid.
     * @param int $iIdRoster
     * @return \Zend\Db\Sql\Sql
     * @throws DatabaseException
     */
    public function getBaseQueryNbRaid($iIdRoster) {
        try {
            $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
            $oQuery = $sql->select();
            $oQuery->from(array('rp' => 'raid_personnage'))
                    ->join(array('r' => 'raids'), 'r.idRaid=rp.idRaid', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                    ->join(array('p' => 'personnages'), 'p.idPersonnage=rp.idPersonnage', array('nom_personnage' => 'nom', 'royaume_personnage' => 'royaume'), \Zend\Db\Sql\Select::JOIN_INNER)
                    ->join(array('rhp' => 'roster_has_personnage'), 'rhp.idRoster = r.idRosterTmp AND rhp.idPersonnage = rp.idPersonnage', array(), \Zend\Db\Sql\Select::JOIN_INNER);


            return $oQuery;
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRoster, $exc);
        }
    }

    /**
     * Retourne le select query deja configuré par l'adapter et le nom de la table pour le frontend
     *
     * @return Zend\Db\Sql\Select
     */
    public function getBaseQueryFrontend($iIdRoster) {
        try {
            $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
            $query = $sql->select();
            $query->from($this->table)->columns(array(
                '*'
            ));
            $where = new \Zend\Db\Sql\Where();
            $where->equalTo("idRosterTmp", $iIdRoster);
            $query->where($where);
            $query->order('date DESC');
            return $query;
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRoster, $exc);
        }
    }

    public function getRaid($iIdRaid) {
        try {
            return $this->select(array('idRaid' => $iIdRaid))->toArray()[0];
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRaid, $exc);
        }
    }

}
