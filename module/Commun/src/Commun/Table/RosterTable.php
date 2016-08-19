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

    /* @var $_tablePersonnage \Commun\Table\PersonnagesTable */
    private $_tablePersonnage;

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
                throw new DatabaseException(6000, 4, $this->_getServiceLocator()->get('translator'));
            }
            //si l'e nom existe et que c'est le meme id'identifiant existe,
            if ($oTabRoster) {
                try {
                    $oRosterTmp = $this->selectBy(
                            array(
                                "nom" => $oRoster->getNom()));
                } catch (\Exception $exc) {
                    throw new DatabaseException(6000, 4, $this->_getServiceLocator()->get('translator'));
                }
                //si le nom existe
                if ($oRosterTmp) {
                    // on leve un exception de contrainte unique
                    throw new DatabaseException(6000, 5, $this->_getServiceLocator()->get('translator'));
                }


                //on met a jour
                try {
                    // on recherche l'identifiant du roster pour avoir l'ancien nom
//                      $oTabAncienRoster = $this->selectBy(
//                        array(
//                            "idRoster" => $oRoster->getIdRoster()));
//                    if ($oTabAncienRoster){
//                    }

                    $this->update($oRoster);
                    // on recupere les anciens personnage bank et disenchant
                    $oOldBank = $this->_getTablePersonnage()->selectBy(array('nom' => strtolower($oTabRoster->getNom() . "-bank")));
                    $oOldDisenchant = $this->_getTablePersonnage()->selectBy(array('nom' => strtolower($oTabRoster->getNom() . "-disenchant")));
                    // on met a jour leur nom
                    $oOldBank->setNom($oRoster->getNom() . "-bank");
                    $oOldDisenchant->setNom($oRoster->getNom() . "-disenchant");
                    // on met a jour en base
                    $this->_getTablePersonnage()->saveOrUpdatePersonnage($oOldBank);
                    $this->_getTablePersonnage()->saveOrUpdatePersonnage($oOldDisenchant);
                } catch (\Exception $exc) {
                    throw new DatabaseException(6000, 1, $this->_getServiceLocator()->get('translator'));
                }
            }
            try {
                $oTabRoster = $this->selectBy(
                        array(
                            "nom" => $oRoster->getNom()));
            } catch (\Exception $exc) {
                throw new DatabaseException(6000, 4, $this->_getServiceLocator()->get('translator'));
            }

            //si le nom existe et que les id sont differents
            if ($oTabRoster && $oTabRoster->getIdRoster() != $oRoster->getIdRoster()) {
                // on leve un exception de contrainte unique
                throw new DatabaseException(6000, 5, $this->_getServiceLocator()->get('translator'));
            }

            // si n'existe pas on insert
            if (!$oTabRoster) {
                try {
                    $this->insert($oRoster);
                    $oRoster->setIdRoster($this->lastInsertValue);
                    // on cree les deux personnage lié au roster
                    $oRosterBank = new \Commun\Model\Personnages();
                    $oRosterBank->setNom($oRoster->getNom() . "-bank");
                    $oRosterBank->setIsTech(true);
                    $oRosterBank->setGenre(1);
                    $oRosterBank->setIdClasses(1);
                    $oRosterBank->setIdRace(1);
                    $oRosterBank->setIdFaction(1);
                    $oRosterBank->setRoyaume("bank");
                    $oRosterDisenchant = new \Commun\Model\Personnages();
                    $oRosterDisenchant->setNom($oRoster->getNom() . "-disenchant");
                    $oRosterDisenchant->setIsTech(true);
                    $oRosterDisenchant->setGenre(1);
                    $oRosterDisenchant->setIdClasses(1);
                    $oRosterDisenchant->setIdRace(1);
                    $oRosterDisenchant->setIdFaction(1);
                    $oRosterDisenchant->setRoyaume("disenchant");
                    // on sauvegarde en base
                    $this->_getTablePersonnage()->saveOrUpdatePersonnage($oRosterBank);
                    $this->_getTablePersonnage()->saveOrUpdatePersonnage($oRosterDisenchant);
                } catch (\Exception $exc) {
                    throw new DatabaseException(6000, 2, $this->_getServiceLocator()->get('translator'));
                }
            }
            return $oRoster;
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de la sauvegarde ou mise à jour du roster", 0, $ex);
        }
    }

}
