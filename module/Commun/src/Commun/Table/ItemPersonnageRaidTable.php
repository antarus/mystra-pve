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
     * Retourne le service de la table pallier.
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
     * @param date $dDateLoot date du loot
     * @return  \Core\Model\RaidPersonnage
     */
    public function saveOrUpdateItemPersonnageRaid($oPersonnage, $oRaids, $oItems, $sNomBoss, $sBonus, $sNote, $dDateLoot) {
        try {
            $oItemPersonnageRaid = new \Commun\Model\ItemPersonnageRaid();
            $oItemPersonnageRaid->setIdItem($oItems->getIdItem());
            $oItemPersonnageRaid->setIdRaid($oRaids->getIdRaid());
            $oItemPersonnageRaid->setIdPersonnage($oPersonnage->getIdPersonnage());
            $oItemPersonnageRaid->setBonus($sBonus);
            $oItemPersonnageRaid->setDate($dDateLoot);

            $oBoss = $this->_getTableBoss()->selectBy(array('nom' => strtolower($sNomBoss)));
            if (!$oBoss) {
                throw new DatabaseException(9000, 6, $this->_getServiceLocator(), array(strtolower($sNomBoss)));
            }
            $oItemPersonnageRaid->setIdBosses($oBoss->getIdBosses());


            $oItemPersonnageRaid->setNote($sNote);
            $this->insert($oItemPersonnageRaid);
            return $oItemPersonnageRaid;
        } catch (\Exception $ex) {
            throw new DatabaseException(8000, 2, $this->_getServiceLocator(), array($oPersonnage, $oRaids, $oItems, $sNomBoss, $sBonus, $sNote, $dDateLoot), $ex);
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
        $aItem['ids']['idItem'] = $item['idItem'];
        $aItem['ids']['idRaid'] = $item['idRaid'];
        $aItem['ids']['idPersonnage'] = $item['idPersonnage'];
        $aItem['ids']['idBosses'] = $item['idBosses'];
        $aItem['ids']['idZone'] = $item['idZone'];
        $aItem['ids']['idMode'] = $item['idMode'];
        $aItem['ids']['idRoster'] = $item['idRoster'];
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
            $oQuery = $this->getQueryBaseLootStat();
            $oQuery->join(array('rhp' => 'roster_has_personnage'), 'rhp.idRoster = r.idRosterTmp AND rhp.idPersonnage = rp.idPersonnage', array(), \Zend\Db\Sql\Select::JOIN_INNER);
            $predicateSpe = $this->getPredicateSpe($iSpe);
            /* @var $predicateGlobal \Zend\Db\Sql\Where() */
            $predicateGlobal = $this->getTablePallier()->getPredicate($sRoster);
            $predicateGlobal->addPredicate($predicateSpe);
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
            $oQuery = $this->getQueryBaseLoot();
            $oQuery->join(array('rhp' => 'roster_has_personnage'), 'rhp.idRoster = r.idRosterTmp AND rhp.idPersonnage = ipr.idPersonnage', array(), \Zend\Db\Sql\Select::JOIN_INNER);
            $predicateSpe = $this->getPredicateSpe($iSpe);
            if (isset($sNom) && isset($sRoyaume)) {
                $predicatePersonnage = $this->getPredicateAddNomPersonnageEtNomServeur($sNom, $sRoyaume);
            }
            /* @var $predicateGlobal \Zend\Db\Sql\Where() */
            $predicateGlobal = $this->getTablePallier()->getPredicate($sRoster);
            $predicateGlobal->addPredicate($predicateSpe);
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
            $oQuery = $this->getQueryBaseLoot();
            $predicateSpe = $this->getPredicateSpe($iSpe);

            $oQuery->limit(20);
            $predicate = $this->getPredicateAddNomPersonnageEtNomServeur($sNom, $sRoyaume);
            $predicate->addPredicate($predicateSpe);
            $oQuery->where($predicate);
            //   $this->debug($oQuery);
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

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();

        $oQuery->columns(array(
                    'idItem',
                    'idRaid',
                    'idPersonnage',
                    'idBosses',
                    'bonus',
                    'valeur',
                    'note',
                    'item_date' => 'date'
                ))
                ->from(array('ipr' => 'item_personnage_raid'))
                ->join(array('r' => 'raids'), 'r.idRaid=ipr.idRaid', array('date'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('z' => 'zone'), 'z.idZone=r.idZoneTmp', array('idZone', "zone" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('m' => 'mode_difficulte'), 'm.idMode=r.idMode', array('idMode', "mode" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('ro' => 'roster'), 'ro.idRoster=r.idRosterTmp', array('idRoster', "roster" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('i' => 'items'), 'ipr.idItem=i.idItem', array('idItem', "item" => "nom", "idBnet", 'icon'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('b' => 'bosses'), 'ipr.idBosses=b.idBosses', array('idBosses', "boss" => "nom"), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('p' => 'personnages'), 'p.idPersonnage=ipr.idPersonnage', array('nom_personnage' => 'nom', 'royaume_personnage' => 'royaume'), \Zend\Db\Sql\Select::JOIN_INNER);

        $oQuery->order('r.date');
        return $oQuery;
    }

    /**
     * Retourne le nombre de loot par type de note pour l'id roster
     * @return \Zend\Db\Sql\Sql
     */
    function getLootPallierRoster($idRoster) {

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQueryPallier = $sql->select();
        $oQuery = $sql->select();
        try {
            $oQueryPallier->from(array('pa' => 'pallierAfficher'))
                    ->order('idModeDifficulte')
            ->where->equalTo("idRoster", $idRoster);
            $aPallierAfficheRoster = $this->fetchAllArray($oQueryPallier);
        } catch (\Exception $exc) {
            throw new DatabaseException(10000, 4, $this->_getServiceLocator(), $idRoster, $exc);
        }
        
        $oQuery->columns(array(
                    'note',
                    'nbLoot' => new Expression('COUNT(*)')
                ))
                ->from(array('ipr' => 'item_personnage_raid'))
                ->join(array('r' => 'raids'), 'r.idRaid=ipr.idRaid', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('z' => 'zone'), 'z.idZone=r.idZoneTmp', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('m' => 'mode_difficulte'), 'm.idMode=r.idMode', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('ro' => 'roster'), 'ro.idRoster=r.idRosterTmp', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('i' => 'items'), 'ipr.idItem=i.idItem', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('b' => 'bosses'), 'ipr.idBosses=b.idBosses', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('p' => 'personnages'), 'p.idPersonnage=ipr.idPersonnage', array(), \Zend\Db\Sql\Select::JOIN_INNER);

        foreach ($aPallierAfficheRoster as $pallierAffiche) {
            $oQuery->where->NEST()->equalTo('r.idZoneTmp',$pallierAffiche['idZone'])->AND->equalTo('r.idMode', $pallierAffiche['idModeDifficulte'])->UNNEST()->OR;
        }

        
        $oQuery->group('note');

        return $this->fetchAllArray($oQuery);
    }
    /**
     * Retourne le nombre de loot par type de note pour l'id roster et l'id raid renseigné
     * @return \Zend\Db\Sql\Sql
     */
    function getLootRosterRaid($idRoster, $idRaid) {

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQueryPallier = $sql->select();
        $oQuery = $sql->select();
        try {
            $oQueryPallier->from(array('pa' => 'pallierAfficher'))
                    ->order('idModeDifficulte')
            ->where->equalTo("idRoster", $idRoster);
            $aPallierAfficheRoster = $this->fetchAllArray($oQueryPallier);
        } catch (\Exception $exc) {
            throw new DatabaseException(10000, 4, $this->_getServiceLocator(), $idRoster, $exc);
        }
        
        $oQuery->columns(array(
                    'note',
                    'nbLoot' => new Expression('COUNT(*)')
                ))
                ->from(array('ipr' => 'item_personnage_raid'))
                ->join(array('r' => 'raids'), 'r.idRaid=ipr.idRaid', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('z' => 'zone'), 'z.idZone=r.idZoneTmp', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('m' => 'mode_difficulte'), 'm.idMode=r.idMode', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('ro' => 'roster'), 'ro.idRoster=r.idRosterTmp', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('i' => 'items'), 'ipr.idItem=i.idItem', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('b' => 'bosses'), 'ipr.idBosses=b.idBosses', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('p' => 'personnages'), 'p.idPersonnage=ipr.idPersonnage', array(), \Zend\Db\Sql\Select::JOIN_INNER);

        foreach ($aPallierAfficheRoster as $pallierAffiche) {
            $oQuery->where->NEST()->equalTo('r.idRaid',$idRaid)->AND->equalTo('r.idZoneTmp',$pallierAffiche['idZone'])->AND->equalTo('r.idMode', $pallierAffiche['idModeDifficulte'])->UNNEST()->OR;
        }
        
        
        $oQuery->group('note');
        
        return $this->fetchAllArray($oQuery);
    }
    /**
     * Fonction commune pour les stats de loot
     * @return \Zend\Db\Sql\Sql
     */
    function getQueryBaseLootStat() {

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

    /**
     * Retourne le predicate correspondant a la spé désiré.
     * @param type $iSpe
     */
    function getPredicateSpe($iSpe = -1) {
        $predicateSpe = new \Zend\Db\Sql\Where();
        switch ($iSpe) {
            //spé 1
            case 0:
                $predicateSpe->equalTo("ipr.valeur", 0.00);
                break;
            //spé 2
            case 1:
                $predicateSpe->equalTo("ipr.valeur", 1.00);
                break;
            //spé 3
            case 2:
                $predicateSpe->equalTo("ipr.valeur", 2.00);
                break;
            //spé 4
            case 3:
                $predicateSpe->equalTo("ipr.valeur", 3.00);
                break;
            default:
                $predicateSpe->in("ipr.valeur", array(0.00, 1.00, 2.00, 3.00));
                break;
        }
        return $predicateSpe;
    }

    /**
     * Retourne le nombre total de loot du roster.(hors pallier)
     * @param int $iIdRoster
     */
    function getNbTotalLootRoster($iIdRoster, $iSpe) {
        try {
            $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
            $oQuery = $sql->select();
            $oQuery->columns(array(
                        'totalItem' => new Expression('COUNT(ipr.idItem)')
                    ))
                    ->from(array('ipr' => 'item_personnage_raid'))
                    ->join(array('r' => 'raids'), 'r.idRaid=ipr.idRaid', array(), \Zend\Db\Sql\Select::JOIN_INNER);
            // spé
            /* @var $predicateSpe \Zend\Db\Sql\Where() */
            $predicateSpe = $this->getPredicateSpe($iSpe);
            // palllier
            /* @var $predicateGlobal \Zend\Db\Sql\Where() */
            $predicateGlobal = new \Zend\Db\Sql\Where();
            $predicateGlobal->equalTo("idRosterTmp", $iIdRoster);
            $predicateGlobal->addPredicate($predicateSpe, 'AND');
            $oQuery->where($predicateGlobal);

            return $this->fetchAllArray($oQuery)[0]['totalItem'];
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRoster, $exc);
        }
    }

    /**
     * Retourne le nombre total de loot du roster.(hors pallier)
     * @param int $iIdRoster
     */
    function getNbTotalLootRosterPallier($iIdRoster, $iSpe) {
        try {
            $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
            $oQuery = $sql->select();
            $oQuery->columns(array(
                        'totalItemPallier' => new Expression('COUNT(ipr.idItem)')
                    ))
                    ->from(array('ipr' => 'item_personnage_raid'))
                    ->join(array('r' => 'raids'), 'r.idRaid=ipr.idRaid', array(), \Zend\Db\Sql\Select::JOIN_INNER);
            // spé
            /* @var $predicateSpe \Zend\Db\Sql\Where() */
            $predicateSpe = $this->getPredicateSpe($iSpe);
            // palllier
            try {
                $predicatePallier = $this->getTablePallier()->getPredicate($iIdRoster);
                $oQuery->where->addPredicate($predicatePallier);
            } catch (\Commun\Exception\LogException $exc) {
                return null;
            }

            /* @var $predicateGlobal \Zend\Db\Sql\Where() */
            $predicateGlobal = $this->getTablePallier()->getPredicate($iIdRoster);
            $predicateGlobal->addPredicate($predicateSpe, 'AND');
            $oQuery->where($predicateGlobal);

            return $this->fetchAllArray($oQuery)[0]['totalItemPallier'];
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRoster, $exc);
        }
    }

    /**
     * Retourne les loots du raid.
     * @param type $iIdRaid
     */
    public function getLootRaid($iIdRaid) {
        $oQuery = $this->getQueryBaseLoot();
        $oQuery->order('item_date');
        //   $oQuery->join(array('rhp' => 'roster_has_personnage'), 'rhp.idRoster = r.idRosterTmp AND rhp.idPersonnage = ipr.idPersonnage', array(), \Zend\Db\Sql\Select::JOIN_INNER);
        $predicate = new \Zend\Db\Sql\Where();
        $predicate->equalTo("r.idRaid", $iIdRaid);
        $oQuery->where($predicate);
        $aLoots = $this->fetchAllArray($oQuery);
        foreach ($aLoots as $key => $loot) {
            switch ($loot['valeur']) {
                //spé
                case 0:
                    $aLoots[$key]['spe'] = 'spé 1';
                    break;
                //spé
                case 1:
                    $aLoots[$key]['spe'] = 'spé 2';
                    break;
                //spé
                case 2:
                    $aLoots[$key]['spe'] = 'spé 3';
                    break;
                //spé
                case 3:
                    $aLoots[$key]['spe'] = 'spé 4';
                    break;
                default;
                    $aLoots[$key]['spe'] = 'spé 1';
                    break;
            }
        }
        return $aLoots;
    }

}
