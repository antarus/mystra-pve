<?php

namespace Commun\Table;

use \Commun\Exception\BnetException;
use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Mystra
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

        //recherche si le raid existe
        /* @var $oTabRaid \Commun\Model\Raids */
        $oTabRaid = $this->selectBy(
                array(
                    "date" => $oRaids->getDate()));
        // si n'existe pas on insert
        if (!$oTabRaid) {
            $this->insert($oRaids);
            $oRaids->setIdRaid($this->lastInsertValue);
        } else {
            // sinon on update
            $oRaids->setIdRaid($oTabRaid->getIdRaid());
            $oRaids->setMajPar("Import Raid-TracKer");
            $this->update($oRaids);
        }
        return $oRaids;
    }

}
