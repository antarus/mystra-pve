<?php

namespace Commun\Table;

use \Bnet\Region;
use \Bnet\ClientFactory;
use \Commun\Exception\BnetException;
use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ZoneTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'zone';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Zone
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Zone';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idZone';

    /*  @var $_servBnet \Bnet\ClientFactory */
    private $_servBnet;
    /*  @var $_tablePersonnage \Commun\Table\PersonnagesTable */
    private $_tablePersonnage;
    private $_tableBoss = null;
    private $_tableNpc = null;
    private $_tableBossesHasNpc = null;
    private $_tableZoneHasBosses = null;
    private $_tableZoneHasModeDiffculte = null;
    private $_tableModeDifficulte = null;

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\PersonnagesTable
     */
    public function _getTablePersonnage() {
        if (!$this->_tablePersonnage) {
            $this->_tablePersonnage = $this->_getServiceLocator()->get('\Commun\Table\PersonnagesTable');
        }
        return $this->_tablePersonnage;
    }

    /**
     * Retourne le service de battlnet.
     * @return \Bnet\ClientFactory
     */
    private function _getServBnet() {
        if (!$this->_servBnet) {
            $this->_servBnet = $this->_getServiceLocator()->get('Bnet\ClientFactory');
        }
        return $this->_servBnet;
    }

    /**
     * Returne une instance de la table szone  en lazy.
     *
     * @return \Commun\Table\BossesTable
     */
    public function _getTableBoss() {
        if (!$this->_tableBoss) {
            $this->_tableBoss = $this->_getServiceLocator()->get('\Commun\Table\BossesTable');
        }
        return $this->_tableBoss;
    }

    /**
     * Returne une instance de la table npc  en lazy.
     *
     * @return \Commun\Table\NpcTable
     */
    public function _getTableNpc() {
        if (!$this->_tableNpc) {
            $this->_tableNpc = $this->_getServiceLocator()->get('\Commun\Table\NpcTable');
        }
        return $this->_tableNpc;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\BossesHasNpcTable
     */
    public function _getTableBossesHasNpc() {
        if (!$this->_tableBossesHasNpc) {
            $this->_tableBossesHasNpc = $this->_getServiceLocator()->get('\Commun\Table\BossesHasNpcTable');
        }
        return $this->_tableBossesHasNpc;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\ZoneHasBossesTable
     */
    public function _getTableZoneHasBosses() {
        if (!$this->_tableZoneHasBosses) {
            $this->_tableZoneHasBosses = $this->_getServiceLocator()->get('\Commun\Table\ZoneHasBossesTable');
        }
        return $this->_tableZoneHasBosses;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\ZoneHasModeDiffculteTable
     */
    public function _getTableZoneHasModeDiffculte() {
        if (!$this->_tableZoneHasModeDiffculte) {
            $this->_tableZoneHasModeDiffculte = $this->_getServiceLocator()->get('\Commun\Table\ZoneHasModeDiffculteTable');
        }
        return $this->_tableZoneHasModeDiffculte;
    }

    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\ModeDifficulteTable
     */
    public function _getTableModeDifficulte() {
        if (!$this->_tableModeDifficulte) {
            $this->_tableModeDifficulte = $this->_getServiceLocator()->get('\Commun\Table\ModeDifficulteTable');
        }
        return $this->_tableModeDifficulte;
    }

    public function importZone($aPost) {
        try {
            $zone = $this->_getServBnet()->warcraft(new Region(Region::EUROPE, "en_GB"))->zones();
            $aZoneBnet = $zone->find($aPost['idZone']);
            if (!$aZoneBnet) {
                throw new BnetException(499, $this->_getServiceLocator()->get('translator'));
            }
            $oZone = \Core\Util\ParserWow::extraitZoneDepuisBnetZone($aZoneBnet);
            $oZone = $this->saveOrUpdateZone($oZone);
            //mode de difficulté
            //supprime toutes les clé correpsondnat au boss dans la table BossesHasModeDifficulté
            $oTabZoneHasDifficulte = $this->_getTableZoneHasModeDiffculte()->selectBy(
                    array("idZone" => $oZone->getIdZone()));
            if ($oTabZoneHasDifficulte) {
                if (is_array($oTabZoneHasDifficulte)) {
                    foreach ($oTabZoneHasDifficulte as $oDiff) {
                        $this->_getTableZoneHasModeDiffculte()->delete($oDiff);
                    }
                } else {
                    $this->_getTableZoneHasModeDiffculte()->delete($oTabZoneHasDifficulte);
                }
            }
            foreach ($oZone->getModeDifficulte() as $oDiff) {
                $oTabModeDifficulte = $this->_getTableModeDifficulte()->selectBy(
                        array("nom_bnet" => $oDiff));
                $oZoneHasModeDiff = new \Commun\Model\ZoneHasModeDiffculte();
                $oZoneHasModeDiff->setIdZone($oZone->getIdZone());
                $oZoneHasModeDiff->setIdMode($oTabModeDifficulte->getIdMode());
                $this->_getTableZoneHasModeDiffculte()->insert($oZoneHasModeDiff);
            }

            if ($aPost['imp-boss'] == "Oui") {
                $aBossZone = \Core\Util\ParserWow::extraitBossDepuisBnetZone($aZoneBnet, $oZone);
            } else {
                $aBossZone = array();
            }
            //supprime toutes les clé correpsondnat au zone dans la table ZoneHasBosses
//            $oTabZoneHasBoss = $this->_getTableZoneHasBosses()->selectBy(
//                    array("idZone" => $oZone->getIdZone()));
//            if ($oTabZoneHasBoss) {
//                if (is_array($oTabZoneHasBoss)) {
//                    foreach ($oTabZoneHasBoss as $oZoneHasBoss) {
//                        $this->_getTableZoneHasBosses()->delete($oZoneHasBoss);
//                    }
//                } else {
//                    $this->_getTableZoneHasBosses()->delete($oTabZoneHasBoss);
//                }
//            }
            foreach ($aBossZone as $oBoss) {
                // table boss
                $oTabBoss = $this->_getTableBoss()->selectBy(
                        array("idBosses" => $oBoss->getIdBosses()));
                // si n'existe pas on insert
                if (!$oTabBoss) {
                    $this->_getTableBoss()->insert($oBoss);
                } else {
                    // sinon on update
                    $this->_getTableBoss()->update($oBoss);
                }

                // table npc
//                //supprime toutes les clé correspondant au boss dans la table BossesHasNpc
//                $oTabBossHasNpc = $this->_getTableBossesHasNpc()->selectBy(
//                        array("idBosses" => $oBoss->getIdBosses()));
//                if ($oTabBossHasNpc) {
//                    if (is_array($oTabBossHasNpc)) {
//                        foreach ($oTabBossHasNpc as $oNpc) {
//                            $this->_getTableBossesHasNpc()->delete($oNpc);
//                        }
//                    } else {
//                        $this->_getTableBossesHasNpc()->delete($oTabBossHasNpc);
//                    }
//                }

                foreach ($oBoss->getNpc() as $oNpc) {
                    $oTabNpc = $this->_getTableNpc()->selectBy(
                            array("idNpc" => $oNpc->getIdNpc()));
                    // si n'existe pas on insert
                    if (!$oTabNpc) {
                        $this->_getTableNpc()->insert($oNpc);
                    } else {
                        // sinon on update
                        $this->_getTableNpc()->update($oNpc);
                    }
                    $oBossHasNpc = new \Commun\Model\BossesHasNpc();
                    $oBossHasNpc->setIdBosses($oBoss->getIdBosses());
                    $oBossHasNpc->setIdNpc($oNpc->getIdNpc());

                    $oTabBossANpc = $this->_getTableBossesHasNpc()->selectBy(
                            array("idNpc" => $oBossHasNpc->getIdNpc(),
                                'idBosses' => $oBossHasNpc->getIdBosses()));
                    // si le lien boss / npc n'existe pas on le cree
                    if (!$oTabBossANpc) {
                        $this->_getTableBossesHasNpc()->insert($oBossHasNpc);
                    }
                }
                $oZoneHasBoss = new \Commun\Model\ZoneHasBosses();
                $oZoneHasBoss->setIdBosses($oBoss->getIdBosses());
                $oZoneHasBoss->setIdZone($oZone->getIdZone());
                $oTabZoneABoss = $this->_getTableZoneHasBosses()->selectBy(
                        array("idZone" => $oZoneHasBoss->getIdZone(),
                            'idBosses' => $oZoneHasBoss->getIdBosses()));
                // si le lien zone / boss n'existe pas on le cree
                if (!$oTabZoneABoss) {
                    $this->_getTableZoneHasBosses()->insert($oZoneHasBoss);
                }
            }
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de l'import de zone", 0, $ex);
        }
    }

    /**
     * Sauvegarde ou met a jour la guilde passée.
     * @param \Commun\Model\Zone $oZone
     * @return \Commun\Model\Zone
     */
    public function saveOrUpdateZone($oZone) {
        try {
            try {
                $oTabZone = $this->selectBy(
                        array(
                            "idZone" => $oZone->getIdZone()));
                if (!$oTabZone) {
                    $oTabZone = $this->selectBy(
                            array(
                                "nom" => $oZone->getNom()));
                }
            } catch (\Exception $exc) {
                throw new DatabaseException(7000, 4, $this->_getServiceLocator()->get('translator'));
            }

            // si n'existe pas on insert
            if (!$oTabZone) {
                try {
                    $this->insert($oZone);
                    $oZone->setIdZone($this->lastInsertValue);
                } catch (\Exception $exc) {
                    throw new DatabaseException(7000, 2, $this->_getServiceLocator()->get('translator'));
                }
            } else {
                try {
                    // sinon on update
                    $this->update($oZone);
                } catch (\Exception $exc) {
                    throw new DatabaseException(7000, 1, $this->_getServiceLocator()->get('translator'));
                }
            }
            return $oZone;
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de la sauvegarde de la zone", 0, $ex);
        }
    }

}
