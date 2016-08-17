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
                            "nom" => $oRoster->getNom()));
            } catch (\Exception $exc) {
                throw new DatabaseException(6000, 4, $this->_getServiceLocator()->get('translator'));
            }
            //si le nom existe et que c'ets le meme id,
            if ($oTabRoster && $oTabRoster->getIdRoster() == $oRoster->getIdRoster()) {
                //on met a jour
                try {
                    $this->update($oRoster);
                } catch (\Exception $exc) {
                    throw new DatabaseException(6000, 1, $this->_getServiceLocator()->get('translator'));
                }
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
                } catch (\Exception $exc) {
                    throw new DatabaseException(6000, 2, $this->_getServiceLocator()->get('translator'));
                }
            }
            return $oRoster;
        } catch (Exception $ex) {
            throw new \Exception("Erreur lors de l'import de guilde", 0, $ex);
        }
    }

}
