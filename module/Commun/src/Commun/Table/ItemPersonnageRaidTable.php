<?php

namespace Commun\Table;

use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ItemPersonnageRaidTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'item_personnage_raid';
    private $_tableBoss;

    /**
     * Objet référent.
     *
     * @var \Commun\Model\ItemPersonnageRaid
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\ItemPersonnageRaid';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idItemRaidPersonnage';

    /**
     * Retourne le service de battlnet.
     * @return \Commun\Table\BossesTable
     */
    private function _getTableBoss() {
        if (!$this->_tableBoss) {
            $this->_tableBoss = $this->_getServiceLocator()->get('Commun\Table\BossesTable');
        }
        return $this->_tableBoss;
    }

    /**
     * Supprime tous les items du personnage pour le raid.
     * @param \Commun\Model\Personnages $oPersonnage
     * @param \Commun\Model\Raids $oRaids
     */
    public function removeAllItemForRaidAndPersonnage($oPersonnage, $oRaids) {
        try {
            //supprime toutes les clés correpsondnat au personnage et au raid
            $oTabPersoRaidItems = $this->selectBy(
                    array(
                        "idPersonnage" => $oPersonnage->getIdPersonnage(),
                        "idRaid" => $oRaids->getIdRaid(),
            ));
            if ($oTabPersoRaidItems) {
                if (is_array($oTabPersoRaidItems)) {
                    foreach ($oTabPersoRaidItems as $oItemPersonnageRaid) {
                        $this->delete($oItemPersonnageRaid);
                    }
                } else {
                    $this->delete($oTabPersoRaidItems);
                }
            }
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de la suppressions des items pour le personnage dans le raid.", 0, $ex);
        }
    }

    /**
     * Sauvegarde ou met a jour le personnage et le raid passé.
     * @param \Commun\Model\Personnages $oPersonnage
     * @param \Commun\Model\Raids $oRaids
     * @param \Commun\Model\Items $oItems
     * @param string $sNomBoss
     * @param string $sBonus
     * @param string $sNote
     * @return  \Core\Model\RaidPersonnage
     */
    public function saveOrUpdateItemPersonnageRaid($oPersonnage, $oRaids, $oItems, $sNomBoss, $sBonus, $sNote) {
        try {
            $oItemPersonnageRaid = new \Commun\Model\ItemPersonnageRaid();
            $oItemPersonnageRaid->setIdItem($oItems->getIdItem());
            $oItemPersonnageRaid->setIdRaid($oRaids->getIdRaid());
            $oItemPersonnageRaid->setIdPersonnage($oPersonnage->getIdPersonnage());
            $oItemPersonnageRaid->setBonus($sBonus);

            $oBoss = $this->_getTableBoss()->selectBy(array('nom' => strtolower($sNomBoss)));
            if (!$oBoss) {
                throw new DatabaseException(9000, 6, $this->_getServiceLocator(), array(strtolower($sNomBoss)));
            }
            $oItemPersonnageRaid->setIdBosses($oBoss->getIdBosses());


            $oItemPersonnageRaid->setNote($sNote);
            $this->insert($oItemPersonnageRaid);
            return $oItemPersonnageRaid;
        } catch (\Exception $ex) {
            throw new DatabaseException(8000, 2, $this->_getServiceLocator(), array($iIdRoster, $sNom, $sRoyaume), $ex);
        }
    }

    /**
     * Retourne les loots du rosters correspondnat aux pallier définit.
     */
    public function getLootDuRoster($iIdRoster, $sNom, $sRoyaume) {

        try {
            $oQuery = $this->getQueryBaseLoot($sNom, $sRoyaume);
            $oQuery->AND->NEST
                    ->NEST->equalTo("m.idMode", 14)->AND->equalTo("z.idZone", 7545)->AND->equalTo("ro.idRoster", 1)->UNNEST
                    ->OR
                    ->NEST->equalTo("m.idMode", 15)->AND->equalTo("z.idZone", 6967)->AND->equalTo("ro.idRoster", 1)->UNNEST
                    ->UNNEST;
            return $this->fetchAllArray($oQuery);
        } catch (\Exception $ex) {
            throw new DatabaseException(8000, 2, $this->_getServiceLocator(), array($iIdRoster, $sNom, $sRoyaume), $ex);
        }
    }

    /**
     * Retourne les loots du rosters correspondnat aux pallier définit.
     */
    public function getLootPersonnage($sNom, $sRoyaume) {

        try {
            $oQuery = $this->getQueryBaseLoot($sNom, $sRoyaume);
//            $oQuery->AND->NEST
//                    ->NEST->equalTo("m.idMode", 14)->AND->equalTo("z.idZone", 7545)->AND->equalTo("ro.idRoster", 1)->UNNEST
//                    ->OR
//                    ->NEST->equalTo("m.idMode", 15)->AND->equalTo("z.idZone", 6967)->AND->equalTo("ro.idRoster", 1)->UNNEST
//                    ->UNNEST;
            return $this->fetchAllArray($oQuery);
        } catch (\Exception $ex) {
            throw new DatabaseException(8000, 2, $this->_getServiceLocator(), array($iIdRoster, $sNom, $sRoyaume), $ex);
        }
    }

    /**
     * Fonction commune au loot d'un personnage et un personnage par roster
     * @param type $sNom
     * @param type $sRoyaume
     * @return \Zend\Db\Sql\Sql
     */
    function getQueryBaseLoot($sNom, $sRoyaume) {

        //  $this->getAdapter()->getDriver()->getConnection()->execute($sql)
        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $query = $sql->select();

        $query->columns(array(
                    'idItem',
                    'idRaid',
                    'idPersonnage',
                    'idBosses',
                    'bonus'
                ))
                ->from(array('ipr' => 'item_personnage_raid'))
                ->join(array('r' => 'raids'), 'r.idRaid=ipr.idRaid', array('date'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('z' => 'zone'), 'z.idZone=r.idZoneTmp', array('idZone', "zone" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('m' => 'mode_difficulte'), 'm.idMode=r.idMode', array('idMode', "mode" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('ro' => 'roster'), 'ro.idRoster=r.idRosterTmp', array('idRoster', "roster" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('i' => 'items'), 'ipr.idItem=i.idItem', array('idItem', "item" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('p' => 'personnages'), 'p.idPersonnage=ipr.idPersonnage', array(), \Zend\Db\Sql\Select::JOIN_INNER);

        $query->where->NEST->equalTo("p.nom", $sNom)->AND->equalTo("p.royaume", $sRoyaume)->UNNEST;
        $query->order('r.date');
        $query->limit(20);

        //   $query->order(array('nom'));
        // $this->debug($query);

        return $query;
    }

}
