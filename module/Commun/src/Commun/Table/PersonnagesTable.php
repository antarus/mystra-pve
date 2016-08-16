<?php

namespace Commun\Table;

use \Bnet\Region;
use \Bnet\ClientFactory;
use \Commun\Exception\BnetException;
use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Mystra
 */
class PersonnagesTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'personnages';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Personnages
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Personnages';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idPersonnage';
    private $_servBnet;

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
     * Retourne la query de base pour l'affichage de la liste des personnages.
     * @return Zend\Db\Sql\Select
     */
    function getQueryAjaxListe() {
//        select p.id, p.nom, p.niveau, c.nom as classe, r.nom as race, f.nom as faction, p.genre, p.royaume, g.nom from personnages p
//        inner join classes c
//        on c.idClasses = p.idClasses
//        inner join race r
//        on r.idRace = p.idRace
//        inner join faction f
//        on f.idFaction = p.idFaction
//        left join guildes g
//        on g.idGuildes = p.idGuildes
        //  $this->getAdapter()->getDriver()->getConnection()->execute($sql)
        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $query = $sql->select();

        $query->columns(array(
                    'idPersonnage',
                    'nom',
                    'niveau',
                    'royaume',
                    'miniature',
                    'genre'
                ))
                ->from(array('p' => 'personnages'))
                ->join(array('c' => 'classes'), 'c.idClasses = p.idClasses', array('classe' => 'nom',
                    'c_classeId' => 'idClasses'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('r' => 'race'), 'r.idRace = p.idRace', array('race' => 'nom',
                    'r_raceId' => 'idRace'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('f' => 'faction'), 'f.idFaction = p.idFaction', array('faction' => 'nom',
                    'r_factionId' => 'idFaction'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('g' => 'guildes'), 'g.idGuildes = p.idGuildes', array('guilde' => 'nom',
                    'g_guildeId' => 'idGuildes'), \Zend\Db\Sql\Select::JOIN_LEFT);
        ;

        // $this->debug($query);
        return $query;
    }

    /**
     * import un personnage depuis un tableau.
     * @param array $aPost
     * @param \Commun\Model\Guildes $oGuilde
     * @return  \Commun\Model\Personnages
     */
    public function importPersonnage($aPost, $oGuilde = null) {
        try {
            $oTabPersonnage = $this->selectBy(
                    array(
                        "nom" => $aPost['nom'],
                        "royaume" => $aPost['serveur']));
// si n'existe pas on importe
            if (!$oTabPersonnage) {
                $personnageBnet = $this->_getServBnet()->warcraft(new Region(Region::EUROPE, "en_GB"))->characters();
                $personnageBnet->on($aPost['serveur']);

                $aPersoBnet = $personnageBnet->find($aPost['nom']);
                if (!$aPersoBnet) {
                    throw new BnetException(299, $this->_getServiceLocator()->get('translator'));
                }


                $oPersonnage = \Core\Util\ParserWow::extraitPersonnageDepuisBnet($aPersoBnet);
                return $this->saveOrUpdatePersonnage($oPersonnage, $oGuilde);
            }
            return $oTabPersonnage;
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de l'import de personnage", 0, $ex);
        }
    }

    /**
     * Sauvegarde ou met a jour le personnage passé.
     * @param \Commun\Model\Personnages $oPersonnage
     * @param \Commun\Model\Guildes $oGuilde
     * @return  \Core\Model\Personnages
     */
    public function saveOrUpdatePersonnage($oPersonnage, $oGuilde = null) {
        try {
            $oPersonnage->setNom(strtolower($oPersonnage->getNom()));
            //recherche si le personnage existe
            try {
                $oTabPersonnage = $this->selectBy(
                        array(
                            "nom" => $oPersonnage->getNom(),
                            "royaume" => $oPersonnage->getRoyaume(),
                            "idFaction" => $oPersonnage->getIdFaction()));
            } catch (\Exception $exc) {
                throw new DatabaseException(2000, 4, $this->_getServiceLocator()->get('translator'));
            }
            // si n'existe pas on insert
            if (!$oTabPersonnage) {
                try {
                    if (!empty($oGuilde)) {
                        $oPersonnage->setIdGuildes($oGuilde->getIdGuildes());
                        $oPersonnage->setIdFaction($oGuilde->getIdFaction());
                    }
                    $this->insert($oPersonnage);
                    $oPersonnage->setIdPersonnage($this->lastInsertValue);
                } catch (\Exception $exc) {
                    throw new DatabaseException(2000, 2, $this->_getServiceLocator()->get('translator'));
                }
            } else {
                try {
                    // sinon on update
                    if (!empty($oGuilde)) {
                        $oPersonnage->setIdGuildes($oGuilde->getIdGuildes());
                        $oPersonnage->setIdFaction($oGuilde->getIdFaction());
                    }
                    $oPersonnage->setIdPersonnage($oTabPersonnage->getIdPersonnage());
                    $this->update($oPersonnage);
                } catch (\Exception $exc) {
                    throw new DatabaseException(2000, 1, $this->_getServiceLocator()->get('translator'));
                }
            }
            return $oPersonnage;
        } catch (Exception $ex) {
            var_dump($ex);
            throw new \Exception("Erreur lors de l'import de guilde", 0, $ex);
        }
    }

}
