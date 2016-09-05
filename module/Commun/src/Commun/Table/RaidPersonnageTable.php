<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidPersonnageTable extends \Core\Table\AbstractServiceTable {

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

    /**
     * Retourne les particpants d'un raid.
     * @param type $iIdRaid
     */
    function getParticipantRaid($iIdRaid) {
        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();
        $oQuery->from(array('rp' => 'raid_personnage'))
                ->join(array('r' => 'raids'), 'r.idRaid=rp.idRaid', array(), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('p' => 'personnages'), 'p.idPersonnage=rp.idPersonnage', array('personnage_nom' => 'nom', 'personnage_royaume' => 'royaume'), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('c' => 'classes'), 'c.idClasses=p.idClasses', array('classe_nom' => 'nom', 'classe_couleur' => 'couleur',), \Zend\Db\Sql\Select::JOIN_INNER)
                ->join(array('rac' => 'race'), 'rac.idRace=p.idRace', array('race_nom' => 'nom'), \Zend\Db\Sql\Select::JOIN_INNER);
        $where = new \Zend\Db\Sql\Where();
        $where->equalTo("rp.idRaid", $iIdRaid);
        $oQuery->where($where);
        $oQuery->order('p.nom');

        $aAllParticpantTmp = $this->fetchAllArray($oQuery);
        foreach ($aAllParticpantTmp as $aValue) {
            $aValue['roster'] = 0;
            $aValue['apply'] = null;
            $aAllParticpant[$aValue['idPersonnage']] = $aValue;
            
        }
        
        $oQuery->join(array('rhp' => 'roster_has_personnage'),
                            'rhp.idRoster = r.idRosterTmp AND rhp.idPersonnage = rp.idPersonnage', 
                            array('apply'=>'isApply'), \Zend\Db\Sql\Select::JOIN_INNER);

        $aMembreRosterTmp = $this->fetchAllArray($oQuery);

        foreach ($aMembreRosterTmp as $aValue) {
            $aMembreRoster[$aValue['idPersonnage']] = $aValue;
        }
        if (isset($aMembreRoster)) {
            $aParticipantRoster = array_intersect_key($aAllParticpant, $aMembreRoster);
            foreach ($aParticipantRoster as $key => $value) {
                $aAllParticpant[$key]['roster'] = 1;
                $aAllParticpant[$key]['apply'] = $aMembreRoster[$key]['apply'];
            }
        }
        return $aAllParticpant;
    }

}
