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
    private $_tableItems;

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
     * Retourne le service de la table boss.
     * @return \Commun\Table\BossesTable
     */
    private function _getTableBoss() {
        if (!$this->_tableBoss) {
            $this->_tableBoss = $this->_getServiceLocator()->get('Commun\Table\BossesTable');
        }
        return $this->_tableBoss;
    }

    /**
     * Retourne le service de la table items.
     * @return \Commun\Table\BossesTable
     */
    private function getTableItems() {
        if (!$this->_tableItems) {
            $this->_tableItems = $this->_getServiceLocator()->get('Commun\Table\ItemsTable');
        }
        return $this->_tableItems;
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
     * Convertit le retour de getQueryBaseLoot (id entre autre) en version lisible
     * @param type $aAllItemPersonnage
     * @return \Commun\Table\LogApiProblem
     */
    public function traiterItemsLoot($aAllItemPersonnage, $bWithId = false) {
        $aReturn = array();
        foreach ($aAllItemPersonnage as $item) {
            $oTabItem = $this->getTableItems()->selectBy(
                    array(
                        "idItem" => $item['idItem']));
            if (!$oTabItem) {
                return new LogApiProblem(404, sprintf($this->_getServTranslator()->translate("L'item [ %s ] n'a pas été trouvé.")), $this->_getServTranslator()->translate("Non trouvé"), $this->_getServTranslator()->translate("Personnage / Serveur inconnu"), array(
                    "idItem" => $item['idItem']), $this->_service);
            }

            $aLien = array();
            $aLien['idBnet'] = $oTabItem->getIdBnet();
            $aLien['bonus'] = $item['bonus'];
            $aItem = array();
            $aItem['nom'] = $oTabItem->getNom();
            $aItem['lien'] = \Core\Util\ParserWow::genereLienItemWowHead($aLien);
            $aItem['date'] = $item['date'];
            $aItem['roster'] = $item['roster'];
            $aItem['zone'] = $item['zone'];
            $aItem['boss'] = $item['boss'];
            $aItem['nom_personnage'] = $item['nom_personnage'];
            $aItem['royaume_personnage'] = $item['royaume_personnage'];
            if ($bWithId) {
                $aItem['ids']['idItem'] = $item['idItem'];
                $aItem['ids']['idRaid'] = $item['idRaid'];
                $aItem['ids']['idPersonnage'] = $item['idPersonnage'];
                $aItem['ids']['idBosses'] = $item['idBosses'];
                $aItem['ids']['idZone'] = $item['idZone'];
                $aItem['ids']['idMode'] = $item['idMode'];
                $aItem['ids']['idRoster'] = $item['idRoster'];
            }
            $aReturn[] = $aItem;
        }

        return $aReturn;
    }

    /**
     * Retourne les loots du personnage appartenant au roster donné
     * @param string $sRoster
     * @param string $sNom
     * @param string $sRoyaume
     * @return \Zend\Db\Sql\Sql
     */
    public function getLootDuRoster($sRoster, $sNom, $sRoyaume, $bWithId = false) {

        try {
            $oQuery = $this->getQueryBaseLoot();
            if (isset($sNom) && isset($sRoyaume)) {
                $oQuery = $this->getQueryAddNomPersonnageEtNomServeur($oQuery, $sNom, $sRoyaume);
            }
            $oQuery->AND->NEST
                    ->NEST->equalTo("m.idMode", 14)->AND->equalTo("z.idZone", 7545)->AND->equalTo("ro.idRoster", 1)->UNNEST
                    ->OR
                    ->NEST->equalTo("m.idMode", 15)->AND->equalTo("z.idZone", 6967)->AND->equalTo("ro.idRoster", 1)->UNNEST
                    ->UNNEST;
            //  $this->debug($oQuery);
            return $this->traiterItemsLoot($this->fetchAllArray($oQuery), $bWithId);
        } catch (\Exception $ex) {
            throw new DatabaseException(8000, 2, $this->_getServiceLocator(), array($sRoster, $sNom, $sRoyaume), $ex);
        }
    }

    /**
     * Retourne les loots du personnage limité au 20 derniers.
     * @param string $sNom
     * @param string $sRoyaume
     * @return \Zend\Db\Sql\Sql
     */
    public function getLootPersonnage($sNom, $sRoyaume, $bWithId = false) {

        try {
            $oQuery = $this->getQueryBaseLoot();
            $oQuery->limit(20);
            $this->getQueryAddNomPersonnageEtNomServeur($oQuery, $sNom, $sRoyaume);

            return $this->traiterItemsLoot($this->fetchAllArray($oQuery), $bWithId);
        } catch (\Exception $ex) {
            throw new DatabaseException(8000, 2, $this->_getServiceLocator(), array($sNom, $sRoyaume), $ex);
        }
    }

    /**
     * Fonction commune au loot d'un personnage et un personnage par roster
     * @return \Zend\Db\Sql\Sql
     */
    function getQueryBaseLoot() {

        //  $this->getAdapter()->getDriver()->getConnection()->execute($sql)
        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();

        $oQuery->columns(array(
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
                ->join(array('b' => 'bosses'), 'ipr.idBosses=b.idBosses', array('idBosses', "boss" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('p' => 'personnages'), 'p.idPersonnage=ipr.idPersonnage', array('nom_personnage' => 'nom', 'royaume_personnage' => 'royaume'), \Zend\Db\Sql\Select::JOIN_INNER);


        $oQuery->order('r.date');


        //   $query->order(array('nom'));
        // $this->debug($query);

        return $oQuery;
    }

    function getQueryAddNomPersonnageEtNomServeur($oQuery, $sNom, $sRoyaume) {
        return $oQuery->where->NEST->equalTo("p.nom", $sNom)->AND->equalTo("p.royaume", $sRoyaume)->UNNEST;
    }

}
