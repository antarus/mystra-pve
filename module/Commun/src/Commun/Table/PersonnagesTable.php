<?php

namespace Commun\Table;

use \Bnet\Region;
use \Bnet\ClientFactory;

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
//recherche si le personnage existe
        $oTabPersonnage = $this->selectBy(
                array(
                    "nom" => $oPersonnage->getNom(),
                    "royaume" => $oPersonnage->getRoyaume(),
                    "idFaction" => $oPersonnage->getIdFaction()));
// si n'existe pas on insert
        if (!$oTabPersonnage) {
            if (!empty($oGuilde)) {
                $oPersonnage->setIdGuildes($oGuilde->getIdGuildes());
                $oPersonnage->setIdFaction($oGuilde->getIdFaction());
            }
            $this->insert($oPersonnage);
            $oPersonnage->setIdPersonnage($this->lastInsertValue);
        } else {
// sinon on update
            if (!empty($oGuilde)) {
                $oPersonnage->setIdGuildes($oGuilde->getIdGuildes());
                $oPersonnage->setIdFaction($oGuilde->getIdFaction());
            }
            $oPersonnage->setIdPersonnage($oTabPersonnage->getIdPersonnage());
            $this->update($oPersonnage);
        }
        return $oPersonnage;
    }

}
