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

        $oQuery->join(array('r' => 'role'), 'rhp.idRole = r.idRole', array('classe' => 'nom',
            'idRole', 'r_roleNom' => 'nom'), \Zend\Db\Sql\Select::JOIN_INNER);


        $oQuery->join(array('g' => 'guildes'), 'g.idGuildes = p.idGuildes', array('guilde' => 'nom',
            'idGuildes'), \Zend\Db\Sql\Select::JOIN_LEFT);



        $oQuery->where("rhp.idRole= '" . $idRole . "' and rhp.idRoster = '" . $idRoster . "'");

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
            $oTabRosterPersonnage = $this->selectBy(
                    array(
                        "idRoster" => $idRoster,
                        "idPersonnage" => $idPerso));
        } catch (\Exception $exc) {
            throw new DatabaseException(5000, 4, $this->_getServiceLocator()->get('translator'));
        }
        if ($oTabRosterPersonnage) {
            try {
                $this->delete($oTabRosterPersonnage);
            } catch (\Exception $exc) {
                throw new DatabaseException(5000, 3, $this->_getServiceLocator()->get('translator'));
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
                $oTabRosterPersonnage = $this->selectBy(
                        array(
                            "idRoster" => $oLienRosterPers->getIdRoster(),
                            "idPersonnage" => $oLienRosterPers->getIdPersonnage()));
            } catch (\Exception $exc) {
                throw new DatabaseException(5000, 4, $this->_getServiceLocator()->get('translator'));
            }
            // si n'existe pas on insert
            if (!$oTabRosterPersonnage) {
                try {
                    $this->insert($oLienRosterPers);
                } catch (\Exception $exc) {
                    throw new DatabaseException(5000, 2, $this->_getServiceLocator()->get('translator'));
                }
            } else {
                try {
                    $this->update($oLienRosterPers, array('idRoster' => $oLienRosterPers->getIdRoster(), 'idPersonnage' => $oLienRosterPers->getIdPersonnage()));
                } catch (\Exception $exc) {
                    throw new DatabaseException(5000, 1, $this->_getServiceLocator()->get('translator'));
                }
            }
            return $oLienRosterPers;
        } catch (Exception $ex) {
            throw new \Exception("Erreur lors de l'import de guilde", 0, $ex);
        }
    }

}
