<?php

namespace Commun\Table;

use \Commun\Exception\BnetException;
use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidsTable extends \Core\Table\AbstractTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'raids';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Raids
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Raids';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRaid';

    /**
     * Sauvegarde ou met a jour le personnage passé.
     * @param \Commun\Model\Raids $oRaids
     * @return  \Core\Model\Raids
     */
    public function saveOrUpdateRaid($oRaids) {
        try {
            //recherche si le raid existe
            /* @var $oTabRaid \Commun\Model\Raids */
            $oTabRaid = $this->selectBy(
                    array(
                        "idRaid" => $oRaids->getIdRaid()));
            if (!$oTabRaid) {
                $oTabRaid = $this->selectBy(
                        array(
                            "date" => $oRaids->getDate()));
            }
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $oRaids->getArrayCopy(), $exc);
        }
        // si n'existe pas on insert
        if (!$oTabRaid) {
            try {
                $this->insert($oRaids);
                $oRaids->setIdRaid($this->lastInsertValue);
            } catch (\Exception $exc) {
                throw new DatabaseException(4000, 2, $this->_getServiceLocator(), $oRaids->getArrayCopy(), $exc);
            }
        } else {
            try {
                // sinon on update
                $oRaids->setIdRaid($oTabRaid->getIdRaid());
                $oRaids->setMajPar("Import Raid-TracKer");
                $this->update($oRaids);
            } catch (\Exception $exc) {
                throw new DatabaseException(4000, 1, $this->_getServiceLocator(), $oRaids->getArrayCopy(), $exc);
            }
        }
        return $oRaids;
    }

}
