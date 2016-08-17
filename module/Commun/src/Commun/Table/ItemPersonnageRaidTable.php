<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ItemPersonnageRaidTable extends \Core\Table\AbstractTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'item_personnage_raid';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\ItemPersonnageRaid
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\ItemPersonnageRaid';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idItemRaidPersonnage';

    /**
     * Supprime tous les items du personnage pour le raid.
     * @param \Commun\Model\Personnages $oPersonnage
     * @param \Commun\Model\Raids $oRaids
     */
    public function removeAllItemForRaidAndPersonnage($oPersonnage, $oRaids) {
        try {
            //supprime toutes les clés correpsondnat au personnage et au raid
            $oTabPersoRaidItems = $this->selectBy(
                    array(
                        "idPersonnage" => $oPersonnage->getIdPersonnage(),
                        "idRaid" => $oRaids->getIdRaid(),
            ));
            if ($oTabPersoRaidItems) {
                if (is_array($oTabPersoRaidItems)) {
                    foreach ($oTabPersoRaidItems as $oItemPersonnageRaid) {
                        $this->delete($oItemPersonnageRaid);
                    }
                } else {
                    $this->delete($oTabPersoRaidItems);
                }
            }
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de la suppressions des items pour le personnage dans le raid.", 0, $ex);
        }
    }

    /**
     * Sauvegarde ou met a jour le personnage et le raid passé.
     * @param \Commun\Model\Personnages $oPersonnage
     * @param \Commun\Model\Raids $oRaids
     * @param \Commun\Model\Items $oItems
     * @return  \Core\Model\RaidPersonnage
     */
    public function saveOrUpdateItemPersonnageRaid($oPersonnage, $oRaids, $oItems, $sBonus) {
        try {
            $oItemPersonnageRaid = new \Commun\Model\ItemPersonnageRaid();
            $oItemPersonnageRaid->setIdItem($oItems->getIdItem());
            $oItemPersonnageRaid->setIdRaid($oRaids->getIdRaid());
            $oItemPersonnageRaid->setIdPersonnage($oPersonnage->getIdPersonnage());
            $oItemPersonnageRaid->setBonus($sBonus);
            $this->insert($oItemPersonnageRaid);
            return $oItemPersonnageRaid;
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de la mise a jour/sauvegarde des items pour le personnage dans le raid.", 0, $ex);
        }
    }

}
