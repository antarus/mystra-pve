<?php

namespace Commun\Table;

use \Commun\Exception\DatabaseException;
use \Zend\Db\Sql\Expression;

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
    private $_tablePallier;
    private $_servTranslator;

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
     * Retourne le service de traduction en mode lazy.
     *
     * @return
     */
    public function _getServTranslator() {
        if (!$this->_servTranslator) {
            $this->_servTranslator = $this->_getServiceLocator()->get('translator');
        }
        return $this->_servTranslator;
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

            switch ($item['valeur']) {
                case 0.00:
                    $aItem['spe'] = $this->_getServTranslator()->translate('principal');
                    break;
                case 1.00:
                    $aItem['spe'] = $this->_getServTranslator()->translate('secondaire');
                    break;
                case 2.00:
                    $aItem['spe'] = $this->_getServTranslator()->translate('3');
                    break;
                case 3.00:
                    $aItem['spe'] = $this->_getServTranslator()->translate('4');
                    break;
                default:
                    $aItem['spe'] = $this->_getServTranslator()->translate('principal');
                    break;
            }

            if ($bWithId) {
                $this->ajouteIds($aItem, $item);
            }
            $aReturn[] = $aItem;
        }

        return $aReturn;
    }

    public function ajouteIds($aItem, $item) {
        if ($bWithId) {
            $aItem['ids']['idItem'] = $item['idItem'];
            $aItem['ids']['idRaid'] = $item['idRaid'];
            $aItem['ids']['idPersonnage'] = $item['idPersonnage'];
            $aItem['ids']['idBosses'] = $item['idBosses'];
            $aItem['ids']['idZone'] = $item['idZone'];
            $aItem['ids']['idMode'] = $item['idMode'];
            $aItem['ids']['idRoster'] = $item['idRoster'];
        }
    }

    /**
     * Convertit le retour de getQueryBaseLoot (id entre autre) en version lisible
     * @param type $aAllItemPersonnage
     * @return \Commun\Table\LogApiProblem
     */
    public function traiterItemsLootStat($aAllItemPersonnage, $bWithId = false) {
        $aReturn = array();
        foreach ($aAllItemPersonnage as $item) {

            $aItem = array();
            $aItem['nbItem'] = $item['nbItem'];
            $aItem['lastDateLoot'] = $item['lastDateLoot'];
            if ($bWithId) {
                $aItem['idPersonnage'] = $item['idPersonnage'];
            }
            $aItem['nom_personnage'] = $item['nom_personnage'];

            $aReturn[] = $aItem;
        }

        return $aReturn;
    }

    /**
     * Retourne le nombre de loot du roster regroupé par personnage, ainsi que la derniere date de loot du joueur.
     * @param string $sRoster
     * @return \Zend\Db\Sql\Sql
     */
    public function getLootStatDuRoster($sRoster, $bWithId = false, $iSpe = -1) {

        try {
            $oQuery = $this->getQueryBaseLootStat($iSpe);

            $aPalliers = $this->getTablePallier()->getPallierPourNomRoster($sRoster);
            if (!$aPalliers) {
                $msg = sprintf($this->_getServTranslator()->translate("Aucun palier définit pour le roster [ %s ].", $sRoster));
                throw new \Commun\Exception\LogException($msg, 499, $this->_getServiceLocator(), null, $sRoster);
            }
            $predicateGlobal = new \Zend\Db\Sql\Where();


            $predicatePallierGlobal = new \Zend\Db\Sql\Where();


            foreach ($aPalliers as $key => $aPallier) {

                $predicatePallier = new \Zend\Db\Sql\Where();
                $predicatePallier->NEST->equalTo("m.idMode", $aPallier['idModeDifficulte'])->AND->equalTo("z.idZone", $aPallier['idZone'])->AND->equalTo("ro.idRoster", $aPallier['idRoster'])->UNNEST;

                if ($key == 1) {
                    $predicatePallierGlobal->addPredicate($predicatePallier, 'OR');
                } else {
                    $predicatePallierGlobal->addPredicate($predicatePallier);
                }
            }

            $predicateGlobal->NEST->addPredicate($predicatePallierGlobal)->UNNEST;
            if (isset($predicatePersonnage)) {
                $predicateGlobal->addPredicate($predicatePersonnage, 'AND');
            }
            $oQuery->where($predicateGlobal);

            //   $this->debug($oQuery);
            return $this->traiterItemsLootStat($this->fetchAllArray($oQuery), $bWithId);
        } catch (\Exception $ex) {
            throw new DatabaseException(8000, 2, $this->_getServiceLocator(), array($sRoster), $ex);
        }
    }

    /**
     * Retourne les loots du personnage ou du roster complet appartenant au roster donné.
     * TODO ANTA preparer pour la vue.
     * @param string $sRoster
     * @param string $sNom
     * @param string $sRoyaume
     * @return \Zend\Db\Sql\Sql
     */
    public function getLootDuRoster($sRoster, $sNom, $sRoyaume, $bWithId = false, $iSpe = -1) {

        try {
            $oQuery = $this->getQueryBaseLoot($iSpe);

            if (isset($sNom) && isset($sRoyaume)) {
                $predicatePersonnage = $this->getPredicateAddNomPersonnageEtNomServeur($sNom, $sRoyaume);
            }

            $aPalliers = $this->getTablePallier()->getPallierPourNomRoster($sRoster);
            if (!$aPalliers) {
                $msg = sprintf($this->_getServTranslator()->translate("Aucun palier définit pour le roster [ %s ].", $sRoster));
                throw new \Commun\Exception\LogException($msg, 499, $this->_getServiceLocator(), null, $sRoster);
            }
            $predicateGlobal = new \Zend\Db\Sql\Where();


            $predicatePallierGlobal = new \Zend\Db\Sql\Where();


            foreach ($aPalliers as $key => $aPallier) {

                $predicatePallier = new \Zend\Db\Sql\Where();
                $predicatePallier->NEST->equalTo("m.idMode", $aPallier['idModeDifficulte'])->AND->equalTo("z.idZone", $aPallier['idZone'])->AND->equalTo("ro.idRoster", $aPallier['idRoster'])->UNNEST;

                if ($key == 1) {
                    $predicatePallierGlobal->addPredicate($predicatePallier, 'OR');
                } else {
                    $predicatePallierGlobal->addPredicate($predicatePallier);
                }
            }

            $predicateGlobal->NEST->addPredicate($predicatePallierGlobal)->UNNEST;
            if (isset($predicatePersonnage)) {
                $predicateGlobal->addPredicate($predicatePersonnage, 'AND');
            }
            $oQuery->where($predicateGlobal);

            //   $this->debug($oQuery);
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
    public function getLootPersonnage($sNom, $sRoyaume, $bWithId = false, $iSpe = -1) {

        try {
            $oQuery = $this->getQueryBaseLoot($iSpe);
            $oQuery->limit(20);
            $predicate = $this->getPredicateAddNomPersonnageEtNomServeur($sNom, $sRoyaume);
            $oQuery->where($predicate);
            return $this->traiterItemsLoot($this->fetchAllArray($oQuery), $bWithId);
        } catch (\Exception $ex) {
            throw new DatabaseException(8000, 2, $this->_getServiceLocator(), array($sNom, $sRoyaume), $ex);
        }
    }

    /**
     * Fonction commune au loot d'un personnage et un personnage par roster
     * @return \Zend\Db\Sql\Sql
     */
    function getQueryBaseLoot($iSpe) {

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();

        $oQuery->columns(array(
                    'idItem',
                    'idRaid',
                    'idPersonnage',
                    'idBosses',
                    'bonus',
                    'valeur'
                ))
                ->from(array('ipr' => 'item_personnage_raid'))
                ->join(array('r' => 'raids'), 'r.idRaid=ipr.idRaid', array('date'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('z' => 'zone'), 'z.idZone=r.idZoneTmp', array('idZone', "zone" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('m' => 'mode_difficulte'), 'm.idMode=r.idMode', array('idMode', "mode" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('ro' => 'roster'), 'ro.idRoster=r.idRosterTmp', array('idRoster', "roster" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('i' => 'items'), 'ipr.idItem=i.idItem', array('idItem', "item" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('b' => 'bosses'), 'ipr.idBosses=b.idBosses', array('idBosses', "boss" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('p' => 'personnages'), 'p.idPersonnage=ipr.idPersonnage', array('nom_personnage' => 'nom', 'royaume_personnage' => 'royaume'), \Zend\Db\Sql\Select::JOIN_INNER);
        switch ($iSpe) {
            //spé 1
            case 0:
                $oQuery->where->equalTo("ipr.valeur", 0.00);
                break;
            //spé 2
            case 1:
                $oQuery->where->equalTo("ipr.valeur", 1.00);
                break;
            //spé 3
            case 2:
                $oQuery->where->equalTo("ipr.valeur", 2.00);
                break;
            //spé 4
            case 3:
                $oQuery->where->equalTo("ipr.valeur", 3.00);
                break;
            default:
                break;
        }


        $oQuery->order('r.date');


        //   $query->order(array('nom'));
        // $this->debug($oQuery);

        return $oQuery;
    }

    /**
     * Fonction commune pour les stats de loot
     * @return \Zend\Db\Sql\Sql
     */
    function getQueryBaseLootStat($iSpe) {

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();

        $oQuery->columns(array(
                    'nbItem' => new Expression('COUNT(ipr.idItem)'),
                    'idPersonnage'
                ))
                ->from(array('ipr' => 'item_personnage_raid'))
                ->join(array('r' => 'raids'), 'r.idRaid=ipr.idRaid', array('lastDateLoot' => new Expression('MAX(r.date)')), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('z' => 'zone'), 'z.idZone=r.idZoneTmp', array('idZone', "zone" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('m' => 'mode_difficulte'), 'm.idMode=r.idMode', array('idMode', "mode" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('ro' => 'roster'), 'ro.idRoster=r.idRosterTmp', array('idRoster', "roster" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('i' => 'items'), 'ipr.idItem=i.idItem', array('idItem', "item" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('b' => 'bosses'), 'ipr.idBosses=b.idBosses', array('idBosses', "boss" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('p' => 'personnages'), 'p.idPersonnage=ipr.idPersonnage', array('nom_personnage' => 'nom', 'royaume_personnage' => 'royaume'), \Zend\Db\Sql\Select::JOIN_INNER);
        switch ($iSpe) {
            //spé 1
            case 0:
                $oQuery->where->equalTo("ipr.valeur", 0.00);
                break;
            //spé 2
            case 1:
                $oQuery->where->equalTo("ipr.valeur", 1.00);
                break;
            //spé 3
            case 2:
                $oQuery->where->equalTo("ipr.valeur", 2.00);
                break;
            //spé 4
            case 3:
                $oQuery->where->equalTo("ipr.valeur", 3.00);
                break;
            default:
                break;
        }

        $oQuery->group("ipr.idPersonnage");
        $oQuery->order('r.date');


        //   $query->order(array('nom'));
        // $this->debug($oQuery);

        return $oQuery;
    }

    function getPredicateAddNomPersonnageEtNomServeur($sNom, $sRoyaume) {
        $predicate = new \Zend\Db\Sql\Where();
        return $predicate->NEST->equalTo("p.nom", $sNom)->AND->equalTo("p.royaume", $sRoyaume)->UNNEST;
    }

}
