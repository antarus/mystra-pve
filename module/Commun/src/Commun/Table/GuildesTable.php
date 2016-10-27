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
class GuildesTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'guildes';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Guildes
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Guildes';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idGuildes';
    /*  @var $_servBnet \Bnet\ClientFactory */
    private $_servBnet;
    /*  @var $_tablePersonnage \Commun\Table\PersonnagesTable */
    private $_tablePersonnage;

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
     * import une guilde depuis un tableau.
     * @param \Commun\Model\Guildes
     */
    public function importGuilde($aPost) {
        try {
            // TODO ajouter dans l'ecran ou user language region
            $guild = $this->_getServBnet()->warcraft(new Region(Region::EUROPE, "fr_FR"))->guilds();
            $guild->on($aPost['serveur']);
            $aOptionBnet = array();
            if ($aPost['imp-membre'] == "Oui") {
                $aOptionBnet[] = 'members';
            }
            $aGuildeBnet = $guild->find($aPost['guilde'], $aOptionBnet);
            if (!$aGuildeBnet) {
                $aError = array();
                $aError[] = $aPost['serveur'];
                $aError[] = $aPost['guilde'];
                $aError[] = $aPost['imp-membre'];
                throw new BnetException(199, $this->_getServiceLocator(), $aError);
            }

            $aOptionFiltre = array();
            if (isset($aPost['lvlMin'])) {
                $aOptionFiltre = array('lvlMin' => $aPost['lvlMin']);
            }
            $oGuilde = \Core\Util\ParserWow::extraitGuildeDepuisBnetGuilde($aGuildeBnet);
            $oGuilde = $this->saveOrUpdateGuilde($oGuilde);
            if ($aPost['imp-membre'] == "Oui") {
                $aMembreGuilde = \Core\Util\ParserWow::extraitMembreDepuisBnetGuilde($aGuildeBnet, $oGuilde, $aOptionFiltre);
            } else {
                $aMembreGuilde = array();
            }

            foreach ($aMembreGuilde as $oPersonnage) {
                $this->_getTablePersonnage()->saveOrUpdatePersonnage($oPersonnage, $oGuilde);
            }
            return $oGuilde;
        } catch (\Exception $ex) {
            throw new \Commun\Exception\LogException("Erreur lors de l'import de guilde", 0, $this->_getServiceLocator(), $ex, $aPost);
        }
    }

    /**
     * Sauvegarde ou met a jour la guilde passée.
     * @param \Commun\Model\Guildes $oGuilde
     * @return \Commun\Model\Guildes
     */
    public function saveOrUpdateGuilde($oGuilde) {

        $oGuilde->setNom(strtolower($oGuilde->getNom()));
        try {
            $oTabGuilde = $this->selectBy(
                    array(
                        "idGuildes" => $oGuilde->getIdGuildes()));
            if (!$oTabGuilde) {
                $oTabGuilde = $this->selectBy(
                        array(
                            "nom" => $oGuilde->getNom(),
                            "serveur" => $oGuilde->getServeur(),
                            "idFaction" => $oGuilde->getIdFaction()));
            }
        } catch (\Exception $exc) {
            throw new DatabaseException(1000, 4, $this->_getServiceLocator(), $oGuilde->getArrayCopy(), $exc);
        }
        // si n'existe pas on insert
        if (!$oTabGuilde) {
            try {
                $this->insert($oGuilde);
                $oGuilde->setIdGuildes($this->lastInsertValue);
            } catch (\Exception $exc) {
                throw new DatabaseException(1000, 2, $this->_getServiceLocator(), $oGuilde->getArrayCopy(), $exc);
            }
        } else {
            try {
                // sinon on update
                $oGuilde->setIdGuildes($oTabGuilde->getIdGuildes());
                $this->update($oGuilde);
            } catch (\Exception $exc) {
                throw new DatabaseException(1000, 1, $this->_getServiceLocator(), $oGuilde->getArrayCopy(), $exc);
            }
        }
        return $oGuilde;
    }

}
