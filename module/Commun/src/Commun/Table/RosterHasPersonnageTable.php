<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class RosterHasPersonnageTable extends \Core\Table\AbstractTable {

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

        $oQuery->columns(array('isApply'))
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
     * Sauvegarde ou met a jour le personnage passé.
     * @param \Commun\Model\Personnages $oPersonnage
     * @param \Commun\Model\Guildes $oGuilde
     * @return  \Core\Model\Personnages
     */
    public function saveOrUpdateRosterPersonnage($oPersonnage, $oRoster = null) {
        try {
//            $oPersonnage->setNom(strtolower($oPersonnage->getNom()));
//            $oPersonnage->setRoyaume(strtolower($oPersonnage->getRoyaume()));
//            //recherche si le personnage existe
//            try {
//                $oTabPersonnage = $this->selectBy(
//                        array(
//                            "nom" => $oPersonnage->getNom(),
//                            "royaume" => $oPersonnage->getRoyaume(),
//                            "idFaction" => $oPersonnage->getIdFaction()));
//            } catch (\Exception $exc) {
//                throw new DatabaseException(2000, 4, $this->_getServiceLocator()->get('translator'));
//            }
//            // si n'existe pas on insert
//            if (!$oTabPersonnage) {
//                try {
//                    if (!empty($oGuilde)) {
//                        $oPersonnage->setIdGuildes($oGuilde->getIdGuildes());
//                        $oPersonnage->setIdFaction($oGuilde->getIdFaction());
//                    }
//                    $this->insert($oPersonnage);
//                    $oPersonnage->setIdPersonnage($this->lastInsertValue);
//                } catch (\Exception $exc) {
//                    throw new DatabaseException(2000, 2, $this->_getServiceLocator()->get('translator'));
//                }
//            } else {
//                try {
//                    // sinon on update
//                    if (!empty($oGuilde)) {
//                        $oPersonnage->setIdGuildes($oGuilde->getIdGuildes());
//                        $oPersonnage->setIdFaction($oGuilde->getIdFaction());
//                    }
//                    $oPersonnage->setIdPersonnage($oTabPersonnage->getIdPersonnage());
//                    $this->update($oPersonnage);
//                } catch (\Exception $exc) {
//                    throw new DatabaseException(2000, 1, $this->_getServiceLocator()->get('translator'));
//                }
//            }
            return $oPersonnage;
        } catch (Exception $ex) {
            throw new \Exception("Erreur lors de l'import de guilde", 0, $ex);
        }
    }

}
