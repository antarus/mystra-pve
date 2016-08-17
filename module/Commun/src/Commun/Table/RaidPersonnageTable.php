<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidPersonnageTable extends \Core\Table\AbstractTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'raid_personnage';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\RaidPersonnage
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\RaidPersonnage';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRaid';

    /**
     * Sauvegarde ou met a jour le personnage et le raid passé.
     * @param \Commun\Model\Personnages $oPersonnage
     * @param \Commun\Model\Raids $oRaids
     * @return  \Core\Model\RaidPersonnage
     */
    public function saveOrUpdateRaid($oPersonnage, $oRaids) {
        try {


            //recherche si le raid existe
            /* @var $oTab \Commun\Model\Raids */
            $oTab = $this->selectBy(
                    array(
                        "idPersonnage" => $oPersonnage->getIdPersonnage(),
                        "idRaid" => $oRaids->getIdRaid(),
            ));

            $oRaidPersonnage = new \Commun\Model\RaidPersonnage();
            // coder au cas ou on rajoute d'autre info dans la table
            // si n'existe pas on insert
            if (!$oTab) {
                $oRaidPersonnage->setIdPersonnage($oPersonnage->getIdPersonnage());
                $oRaidPersonnage->setIdRaid($oRaids->getIdRaid());
                $this->insert($oRaidPersonnage);

                return $oRaidPersonnage;
            }
            // ne fonctionne pas car mon abstractTable ne gère pas les multi clé
//        else {
//            // sinon on update
//            $oTab->setIdPersonnage($oPersonnage->getIdPersonnage());
//            $oTab->setIdRaid($oRaids->getIdRaid());
//            $this->update($oTab);
//        }
            return $oTab;
        } catch (Exception $exc) {
            throw new \Exception("Erreur lors de la sauvegarde /maj du lien raid/personnage", 0, $ex);
        }
    }

}
