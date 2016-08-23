<?php

namespace Commun\Table;

use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RosterHasPersonnageTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'roster_has_personnage';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\RosterHasPersonnage
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\RosterHasPersonnage';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRoster';

    /**
     * Retourne une liste de personnage correspondant au roles et au roster.
     * @param type $idRole
     * @param type $idRoster
     * @return type
     */
    function getListePersonnage($idRole, $idRoster) {


        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();

        $oQuery->columns(array('isApply', 'idRoster'))
                ->from(array('rhp' => 'roster_has_personnage'));

        $oQuery->join(array('p' => 'personnages'), 'rhp.idPersonnage = p.idPersonnage', array('nom',
            'idPersonnage', 'royaume'), \Zend\Db\Sql\Select::JOIN_INNER);

        $oQuery->join(array('c' => 'classes'), 'c.idClasses = p.idClasses', array('classe' => 'nom',
            'idClasses', 'couleur'), \Zend\Db\Sql\Select::JOIN_INNER);

        $oQuery->join(array('r' => 'role'), 'rhp.idRole = r.idRole', array('role' => 'nom',
            'idRole'), \Zend\Db\Sql\Select::JOIN_INNER);


        $oQuery->join(array('g' => 'guildes'), 'g.idGuildes = p.idGuildes', array('guilde' => 'nom',
            'idGuildes'), \Zend\Db\Sql\Select::JOIN_LEFT);



        $oQuery->where("rhp.idRole= '" . $idRole . "' and rhp.idRoster = '" . $idRoster . "'");
        $oQuery->order('nom');
        // $this->debug($oQuery);
        $aReturn = $this->fetchAllArray($oQuery);
        return $aReturn;
    }

    /**
     * Supprime un joueur du roster.
     * @param type $idRoster
     * @param type $idPerso
     */
    public function supprimerRosterPersonnage($idRoster, $idPerso) {
        //recherche si le personnage existe dans le roster
        try {
            $aRech = array(
                "idRoster" => $idRoster,
                "idPersonnage" => $idPerso);
            $oTabRosterPersonnage = $this->selectBy($aRech);
        } catch (\Exception $exc) {
            throw new DatabaseException(5000, 4, $this->_getServiceLocator(), $aRech, $exc);
        }
        if ($oTabRosterPersonnage) {
            try {
                $cleCompose = array(
                    "idRoster" => $idRoster,
                    "idPersonnage" => $idPerso
                );

                $this->delete($cleCompose);
            } catch (\Exception $exc) {
                throw new DatabaseException(5000, 3, $this->_getServiceLocator(), $cleCompose, $exc);
            }
        }
    }

    /**
     * Sauvegarde ou met a jour le lien roster /opersonnage/role passé.
     * @param \Commun\Model\RosterHasPersonnage $oLienRosterPers
     * @return  \Core\Model\RosterHasPersonnage
     */
    public function saveOrUpdateRosterPersonnage(\Commun\Model\RosterHasPersonnage $oLienRosterPers) {
        try {

            //recherche si le personnage existe
            try {
                $aRech = array(
                    "idRoster" => $oLienRosterPers->getIdRoster(),
                    "idPersonnage" => $oLienRosterPers->getIdPersonnage());
                $oTabRosterPersonnage = $this->selectBy($aRech);
            } catch (\Exception $exc) {
                throw new DatabaseException(5000, 4, $this->_getServiceLocator(), $aRech, $exc);
            }
            // si n'existe pas on insert
            if (!$oTabRosterPersonnage) {
                try {
                    $this->insert($oLienRosterPers);
                } catch (\Exception $exc) {
                    throw new DatabaseException(5000, 2, $this->_getServiceLocator(), $aRech, $exc);
                }
            } else {
                try {
                    $this->update($oLienRosterPers, array('idRoster' => $oLienRosterPers->getIdRoster(), 'idPersonnage' => $oLienRosterPers->getIdPersonnage()));
                } catch (\Exception $exc) {
                    throw new DatabaseException(5000, 1, $this->_getServiceLocator(), $aRech, $exc);
                }
            }
            return $oLienRosterPers;
        } catch (\Exception $ex) {
            throw new \Commun\Exception\LogException("Erreur lors de l'import de guilde", 0, $this->_getServiceLocator(), $ex);
        }
    }

}
