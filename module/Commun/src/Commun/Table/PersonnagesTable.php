<?php

namespace Commun\Table;

use \Bnet\Region;
use \Bnet\ClientFactory;
use \Commun\Exception\BnetException;
use \Commun\Exception\DatabaseException;
use Application\Service\LogService;

/**
 * @author Antarus
 * @project Raid-TracKer
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

    private $_logService;

    /**
     * Lazy getter pour le service de logs
     * @return service Le service de logs
     */
    private function _getLogService() {
        return $this->_logService ?
                $this->_logService :
                $this->_logService = $this->_getServiceLocator()->get('LogService');
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
                    'ilvl',
                    'niveau',
                    'royaume',
                    'miniature',
                    'genre',
                    'isTech'
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
        $query->order(array('nom'));
        // $this->debug($query);
        return $query;
    }

    /**
     * import un personnage depuis un tableau.
     * @param array $aPost
     * @param \Commun\Model\Guildes $oGuilde
     * @param array $aOptionBnet
     * @return  array bnet
     */
    public function importPersonnage($aPost, $oGuilde = null, $aOptionBnet = array()) {
        try {
            $this->_getLogService()->log(LogService::NOTICE, "Début import personnage", LogService::DEBUG, $aPost);
            $aOptionBnet[] = 'items';
            $personnageBnet = $this->_getServBnet()->warcraft(new Region(Region::EUROPE, "en_GB"))->characters();
            $personnageBnet->on($aPost['serveur']);

            $aPersoBnet = $personnageBnet->find($aPost['nom'], $aOptionBnet);
            if (!$aPersoBnet) {
                throw new BnetException(299, $this->_getServiceLocator(), $aPost);
            }
            return $aPersoBnet;

//                $oPersonnage = \Core\Util\ParserWow::extraitPersonnageDepuisBnet($aPersoBnet);
//                return $this->saveOrUpdatePersonnage($oPersonnage, $oGuilde);
//            }
//            return $oTabPersonnage;
        } catch (\Exception $ex) {
            throw new \Commun\Exception\LogException("Erreur lors de l'import de personnage", 0, $this->_getServiceLocator(), $ex, $aPost);
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
            $oPersonnage->setRoyaume(strtolower($oPersonnage->getRoyaume()));
            //recherche si le personnage existe
            try {

                $oTabPersonnage = $this->selectBy(
                        array(
                            "idPersonnage" => $oPersonnage->getIdPersonnage()));
                if (!$oTabPersonnage) {
                    $oTabPersonnage = $this->selectBy(
                            array(
                                "nom" => $oPersonnage->getNom(),
                                "royaume" => $oPersonnage->getRoyaume(),
                                "idFaction" => $oPersonnage->getIdFaction()));
                }
            } catch (\Exception $exc) {
                throw new DatabaseException(2000, 4, $this->_getServiceLocator(), $oPersonnage->getArrayCopy(), $exc);
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
                    throw new DatabaseException(2000, 2, $this->_getServiceLocator(), $oPersonnage->getArrayCopy(), $exc);
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
                    throw new DatabaseException(2000, 1, $this->_getServiceLocator(), $oPersonnage->getArrayCopy(), $exc);
                }
            }
            return $oPersonnage;
        } catch (\Exception $ex) {
            throw new \Commun\Exception\LogException("Erreur lors de la sauvegarde du personnage", 0, $this->_getServiceLocator(), $ex);
        }
    }

    /**
     *  Retourne une liste de personnage avec les paramêtres passé.
     * Les paramatres par defaut sont:
     *  $aParam = array(
     *      'rech'=>'%',
     *      'champs_personnage' => array(
     *           'idPersonnage',
     *           'nom',
     *           'royaume',
     *       ),
     *       'classe' => true,
     *       'guilde' => true
     *       'limit' => 20
     *   );
     *
     * @param type $aParam
     * @return array
     */
    function getAutoComplete($aParam) {
        if (!isset($aParam)) {
            $aParam = array(
                'rech' => '%',
                'champs_personnage' => array(
                    'idPersonnage',
                    'nom',
                    'royaume'
                ),
                'classe' => true,
                'guilde' => true,
                'limit' => 20
            );
        }
        if (!isset($aParam['champs_personnage'])) {
            $aParam['champs_personnage'] = array(
                'idPersonnage',
                'nom',
                'royaume',
            );
        }

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();

        $oQuery->columns($aParam['champs_personnage'])
                ->from(array('p' => 'personnages'));
        if (isset($aParam['classe']) && $aParam['classe']) {
            $oQuery->join(array('c' => 'classes'), 'c.idClasses = p.idClasses', array('classe' => 'nom',
                'c_classeId' => 'idClasses', 'couleur'), \Zend\Db\Sql\Select::JOIN_INNER);
        }
//        $query->join(array('r' => 'race'), 'r.idRace = p.idRace', array('race' => 'nom',
//                    'r_raceId' => 'idRace'), \Zend\Db\Sql\Select::JOIN_INNER)
//                ->join(array('f' => 'faction'), 'f.idFaction = p.idFaction', array('faction' => 'nom',
//                    'r_factionId' => 'idFaction'), \Zend\Db\Sql\Select::JOIN_INNER)
        if (isset($aParam['guilde']) && $aParam['guilde']) {
            $oQuery->join(array('g' => 'guildes'), 'g.idGuildes = p.idGuildes', array('guilde' => 'nom',
                'g_guildeId' => 'idGuildes'), \Zend\Db\Sql\Select::JOIN_LEFT);
        }

        if (isset($aParam['rech'])) {
            $oQuery->where("p.nom like '%" . strtolower($aParam['rech']) . "%' ");
        }
        if (isset($aParam['limit'])) {
            $oQuery->limit($aParam['limit']);
        }
        $oQuery->order(array('nom'));
        //$this->debug($oQuery);
        $aReturn = $this->fetchAllArray($oQuery);

        return $aReturn;
    }

}
