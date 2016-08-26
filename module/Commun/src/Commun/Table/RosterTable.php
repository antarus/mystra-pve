<?php

namespace Commun\Table;

use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RosterTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'roster';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Roster
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Roster';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRoster';
    private $_servTranslator;
    /* @var $_tablePersonnage \Commun\Table\PersonnagesTable */
    private $_tablePersonnage;

    /* @var $_tableRaid \Commun\Table\RaidsTable */
    private $_tableRaid;
    /* @var $_tableItemPersonnageRaid \Commun\Table\ItemsTable */
    private $_tableItemPersonnageRaid;
    private $_config;

    /**
     * Retourne le service de battlnet.
     * @return \Commun\Table\PersonnagesTable
     */
    private function _getTablePersonnage() {
        if (!$this->_tablePersonnage) {
            $this->_tablePersonnage = $this->_getServiceLocator()->get('Commun\Table\PersonnagesTable');
        }
        return $this->_tablePersonnage;
    }

    /**
     * Retourne le service table raid.
     * @return \Commun\Table\RaidsTable
     */
    private function getTableRaid() {
        if (!$this->_tableRaid) {
            $this->_tableRaid = $this->_getServiceLocator()->get('Commun\Table\RaidsTable');
        }
        return $this->_tableRaid;
    }

    /**
     * Retourne le service table item-personnage-raid.
     * @return \Commun\Table\ItemPersonnageRaidTable
     */
    private function getTableItemPersonnageRaidTable() {
        if (!$this->_tableItemPersonnageRaid) {
            $this->_tableItemPersonnageRaid = $this->_getServiceLocator()->get('Commun\Table\ItemPersonnageRaidTable');
        }
        return $this->_tableItemPersonnageRaid;
    }

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
     * Sauvegarde ou met a jour le lien roster /opersonnage/role passé.
     * @param \Commun\Model\Roster $oRoster
     * @return  \Core\Model\Roster
     */
    public function saveOrUpdateRoster(\Commun\Model\Roster $oRoster) {
        try {
            // mise en minuscule pour faciliter les rechecrhe et uniformisé les données
            $oRoster->setNom(strtolower($oRoster->getNom()));
            //recherche si le roster existe
            try {
                $oTabRoster = $this->selectBy(
                        array(
                            "idRoster" => $oRoster->getIdRoster()));
            } catch (\Exception $exc) {
                throw new DatabaseException(6000, 4, $this->_getServiceLocator(), $oRoster->getArrayCopy(), $exc);
            }
            //si l'e nom existe et que c'est le meme id'identifiant existe,
            if ($oTabRoster) {
                try {
                    $oRosterTmp = $this->selectBy(
                            array(
                                "nom" => $oRoster->getNom()));
                } catch (\Exception $exc) {
                    throw new DatabaseException(6000, 4, $this->_getServiceLocator(), $oRoster->getNom(), $exc);
                }
                //si le nom existe
                if ($oRosterTmp) {
                    // on leve un exception de contrainte unique
                    throw new DatabaseException(6000, 5, $this->_getServiceLocator(), $oRoster->getNom());
                }


                //on met a jour
                try {
                    $this->update($oRoster);
                    // on recupere les anciens personnage bank et disenchant
                    $oOldBank = $this->_getTablePersonnage()->selectBy(array('nom' => strtolower($oTabRoster->getNom() . $this->_getConfig()["roster"]["suffixe"]["bank"])));
                    $oOldDisenchant = $this->_getTablePersonnage()->selectBy(array('nom' => strtolower($oTabRoster->getNom() . $this->_getConfig()["roster"]["suffixe"]["disenchant"])));
                    // on met a jour leur nom
                    $oOldBank->setNom($oRoster->getNom() . $this->_getConfig()["roster"]["suffixe"]["bank"]);
                    $oOldDisenchant->setNom($oRoster->getNom() . $this->_getConfig()["roster"]["suffixe"]["disenchant"]);
                    // on met a jour en base
                    $this->_getTablePersonnage()->saveOrUpdatePersonnage($oOldBank);
                    $this->_getTablePersonnage()->saveOrUpdatePersonnage($oOldDisenchant);
                } catch (\Exception $exc) {
                    throw new DatabaseException(6000, 1, $this->_getServiceLocator(), $oRoster->getArrayCopy(), $exc);
                }
            }
            try {
                $oTabRoster = $this->selectBy(
                        array(
                            "nom" => $oRoster->getNom()));
            } catch (\Exception $exc) {
                throw new DatabaseException(6000, 4, $this->_getServiceLocator(), $oRoster->getArrayCopy(), $exc);
            }

            //si le nom existe et que les id sont differents
            if ($oTabRoster && $oTabRoster->getIdRoster() != $oRoster->getIdRoster()) {
                // on leve un exception de contrainte unique
                throw new DatabaseException(6000, 5, $this->_getServiceLocator(), $oRoster->getArrayCopy());
            }

            // si n'existe pas on insert
            if (!$oTabRoster) {
                try {
                    $this->insert($oRoster);
                    $oRoster->setIdRoster($this->lastInsertValue);
                    // on cree les deux personnage lié au roster
                    $oRosterBank = new \Commun\Model\Personnages();
                    $oRosterBank->setNom($oRoster->getNom() . $this->_getConfig()["roster"]["suffixe"]["bank"]);
                    $oRosterBank->setIsTech(true);
                    $oRosterBank->setGenre(1);
                    $oRosterBank->setIdClasses(1);
                    $oRosterBank->setIdRace(1);
                    $oRosterBank->setIdFaction(1);
                    $oRosterBank->setNiveau(0);
                    $oRosterBank->setRoyaume("bank");
                    $oRosterDisenchant = new \Commun\Model\Personnages();
                    $oRosterDisenchant->setNom($oRoster->getNom() . $this->_getConfig()["roster"]["suffixe"]["disenchant"]);
                    $oRosterDisenchant->setIsTech(true);
                    $oRosterDisenchant->setGenre(1);
                    $oRosterDisenchant->setIdClasses(1);
                    $oRosterDisenchant->setIdRace(1);
                    $oRosterDisenchant->setIdFaction(1);
                    $oRosterDisenchant->setNiveau(0);
                    $oRosterDisenchant->setRoyaume("disenchant");
                    // on sauvegarde en base
                    $this->_getTablePersonnage()->saveOrUpdatePersonnage($oRosterBank);
                    $this->_getTablePersonnage()->saveOrUpdatePersonnage($oRosterDisenchant);
                } catch (\Exception $exc) {
                    $aError = array();
                    $aError[] = $oRoster->getArrayCopy();
                    $aError[] = $oRosterBank->getArrayCopy();
                    $aError[] = $oRosterDisenchant->getArrayCopy();
                    throw new DatabaseException(6000, 2, $this->_getServiceLocator(), $aError, $exc);
                }
            }
            return $oRoster;
        } catch (\Exception $ex) {
            throw new \Commun\Exception\LogException("Erreur lors de la sauvegarde ou mise à jour du roster", 0, $this->_getServiceLocator(), $ex);
        }
    }

    /**
     *  Retourne une liste des roster avec les paramêtres passé.
     * Les paramatres par defaut sont:
     * $aParam = array(
     *       'rech' => $aParam["rech"],
     *        'champs_roster' => array(
     *            'idRoster',
     *            'nom'
     *        ),
     *        'limit' => 20
     *    );
     *
     * @param type $aParam
     * @return array
     */
    function getAutoComplete($aParam) {
        if (!isset($aParam)) {
            $aParam = array(
                'rech' => $aParam["rech"],
                'champs_roster' => array(
                    'idRoster',
                    'nom'
                ),
                'limit' => 20
            );
        }
        if (!isset($aParam['champs_roster'])) {
            $aParam['champs_roster'] = array(
                'idRoster',
                'nom'
            );
        }

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();

        $oQuery->columns($aParam['champs_roster'])
                ->from(array('r' => 'roster'));

        if (isset($aParam['rech'])) {
            $oQuery->where("r.nom like '%" . strtolower($aParam['rech']) . "%' ");
        }
        if (isset($aParam['limit'])) {
            $oQuery->limit($aParam['limit']);
        }
        $oQuery->order(array('nom'));
        //$this->debug($oQuery);
        $aReturn = $this->fetchAllArray($oQuery);

        return $aReturn;
    }

    /**
     * Retourne les stats du roster.
     * @param type $sNom
     */
    public function getStatRoster($sNom, $iSpe) {
        try {
            $oReturn = new \Commun\Model\RosterStat();
            // retourne le roster
            $oRoster = $this->getRosterParNom($sNom);
            if (!$oRoster) {
                throw new \Commun\Exception\LogException(sprintf($this->_getServTranslator()->translate("le roster [ %s ] n'existe pas."), $sNom), 500, $this->_getServiceLocator(), null, $sNom);
            }
            $oReturn->setIdRoster($oRoster->getIdRoster());
            $oReturn->setNom($oRoster->getNom());
            // raid
            // nb total de raid du roster
            $oReturn->setNbTotalRaid($this->getTableRaid()->getNombreRaidRoster($oRoster->getNom()));
            // nb total de raid du roster sur les pallier visible
            $oReturn->setNbTotalRaidPallier($this->getTableRaid()->getNombreRaidRosterPallier($oRoster->getIdRoster()));

            // nb de raid par joueur total
            $aNbTotalRaidJoueur = $this->getTableRaid()->getNombreRaidPersonnageRoster($oRoster->getIdRoster());

            $aCvtNbTotalRaidJoueur = array();

            foreach ($aNbTotalRaidJoueur as $aValue) {
                $aCvtNbTotalRaidJoueur[$aValue['idPersonnage']] = $aValue;
            }

            // nb de raid par joueur sur les palliers configuré
            $aNbTotalRaidJoueurPallier = $this->getTableRaid()->getNombreRaidPersonnageRosterPallier($oRoster->getIdRoster());
            $aCvtNbTotalRaidJoueurPallier = array();

            foreach ($aNbTotalRaidJoueurPallier as $aValue) {
                $aCvtNbTotalRaidJoueurPallier[$aValue['idPersonnage']] = $aValue;
            }

            $PlayerAttende = \Zend\Stdlib\ArrayUtils::merge($aCvtNbTotalRaidJoueur, $aCvtNbTotalRaidJoueurPallier, true);
            //$PlayerAttende = array_merge($aNbTotalRaidJoueur, $aNbTotalRaidJoueurPallier);

            $aParticipationJoueur = array();
            foreach ($PlayerAttende as $key => $aStatPlayer) {
                $iPresGlobal = isset($aStatPlayer['nbRaid']) ? $aStatPlayer['nbRaid'] : 0;
                $iPresPallier = isset($aStatPlayer['nbRaidPallier']) ? $aStatPlayer['nbRaidPallier'] : 0;

                if ($oReturn->getNbTotalRaid() != 0) {
                    $aStatPlayer['presenceGlobal'] = round(100 * $iPresGlobal / $oReturn->getNbTotalRaid(), 2);
                    $aStatPlayer['presencePallier'] = round(100 * $iPresPallier / $oReturn->getNbTotalRaidPallier(), 2);
                } else {
                    $aStatPlayer['presenceGlobal'] = 0;
                    $aStatPlayer['presencePallier'] = 0;
                }
                $aParticipationJoueur[] = $aStatPlayer;
            }
            $oReturn->setParticipation($aParticipationJoueur);

            //loot
            // loot du roster
            $oReturn->setNbItem($this->getTableItemPersonnageRaidTable()->getNbTotalLootRoster($oRoster->getIdRoster(), $iSpe));
            // loot du roster limité au pallier
            $oReturn->setNbItemPallier($this->getTableItemPersonnageRaidTable()->getNbTotalLootRosterPallier($oRoster->getIdRoster(), $iSpe));

            return $oReturn;

            //calcul des stats
        } catch (\Exception $exc) {
            throw new DatabaseException(6000, 6, $this->_getServiceLocator(), array('nom' => $sNom), $exc);
        }
    }

    /**
     * Retourne le roster correspondant au nom.
     * @param string $sNomRoster
     * @return array
     */
    public function getRosterParNom($sNomRoster) {
        try {
            return $this->selectBy(array('nom' => $sNomRoster));
        } catch (\Exception $exc) {
            throw new DatabaseException(6000, 4, $this->_getServiceLocator(), array('nom' => $sNomRoster), $exc);
        }
    }

    /**
     * Retourne le roster correspondant a son identifiant.
     * @param int $iIdRoster
     * @return array
     */
    public function getRosterParId($iIdRoster) {
        try {
            return $this->selectBy(array('idRoster' => $iIdRoster));
        } catch (\Exception $exc) {
            throw new DatabaseException(6000, 4, $this->_getServiceLocator(), array('id' => $iIdRoster), $exc);
        }
    }

}
