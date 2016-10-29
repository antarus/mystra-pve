<?php

namespace Core\Util;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ParserWow {

    /**
     * Génèrer un lien d'item vers wowhead.
     * exemple :
     * <code>http://www.wowhead.com/?item=124382&bonus=1798:564:1492:3441:529:::</code>
     *
     * $aItem doit contenir <code>idBnet</code> et <code>bonus</code>,
     * @param array $aItem
     */
    public static function genereLienItemWowHead(array $aItem) {
        return "http://www.wowhead.com/?item=" . $aItem['idBnet'] . "&bonus=" . $aItem['bonus'];
    }

    /**
     * Génèrer un lien de zone vers wowhead.
     * exemple :
     * <code>http://www.wowhead.com/?zone=6967</code>

     * @param int $iIdZone
     */
    public static function genereLienZoneWowHead(array $iIdZone) {
        return "http://www.wowhead.com/?zone=" . $iIdZone;
    }

    /**
     * Génèrer un lien NPC vers wowhead.
     * exemple :
     * <code>http://www.wowhead.com/?npc=90284</code>

     * @param int $iIdNpc
     */
    public static function genereLienNbcWowHead(array $iIdNpc) {
        return "http://www.wowhead.com/?npc=" . $iIdNpc;
    }

    /**
     * Extrait les membre des donnes de battlnet et et les transforme en objet utilisable de notre coté.
     * @param type $aDataGuildeBnet
     * @param \Core\Model\Guildes $oGuilde
     * @param array $aOptionFiltre lvlMin|
     * @return array de \Core\Model\Personnages
     * @throws Exception
     */
    public static function extraitMembreDepuisBnetGuilde($aDataGuildeBnet, \Commun\Model\Guildes $oGuilde, array $aOptionFiltre) {

        if (!isset($aDataGuildeBnet)) {
            throw new Exception("Les datas pour l'extraction de membres issues de bnet ne peuvent être vide.");
        }
        $aPersonnage = array();
        $lvlMin = 0;
        if (isset($aOptionFiltre)) {
            if (isset($aOptionFiltre['lvlMin'])) {
                $lvlMin = $aOptionFiltre['lvlMin'];
            }
        }

        if (isset($aDataGuildeBnet['members'])) {
            foreach ($aDataGuildeBnet['members'] as $aCharacter) {
                if ($aCharacter['character']['level'] >= $lvlMin) {

//                    $oPersonnage = new \Commun\Model\Personnages();
//                    $oPersonnage->setNom($aCharacter['character']['name']);
//                    $oPersonnage->setNiveau($aCharacter['character']['level']);
//                    $oPersonnage->setIdGuildes($oGuilde->getIdGuildes());
//                    $oPersonnage->setIdClasses($aCharacter['character']['class']);
//                    //$oPersonnage->setIdFaction($aCharacter['character']['faction']);
//                    $oPersonnage->setIdFaction($oGuilde->getIdFaction());
//                    $oPersonnage->setIdRace($aCharacter['character']['race']);
//                    $oPersonnage->setGenre($aCharacter['character']['gender']);
//                    $oPersonnage->setRoyaume($aCharacter['character']['realm']);
//                    $oPersonnage->setminiature($aCharacter['character']['thumbnail']);
//                    $aPersonnage[] = $oPersonnage;
                    $oPersonnage = \Core\Util\ParserWow::extraitPersonnageDepuisBnet($aCharacter['character']);
                    $oPersonnage->setIdGuildes($oGuilde->getIdGuildes());
                    $oPersonnage->setIdFaction($oGuilde->getIdFaction());
                    $aPersonnage[] = $oPersonnage;
                }
            }
            return $aPersonnage;
        }
    }

    /**
     * Extrait les informations du personnagee des donnes de battlnet et et les transforme en objet utilisable de notre coté.
     * Manque la faction qui n'est pas disponible
     * @param type $aDataPersonnageBnet
     * @return  \Core\Model\Personnages
     * @throws Exception
     */
    public static function extraitPersonnageDepuisBnet($aDataPersonnageBnet) {

        if (!isset($aDataPersonnageBnet)) {
            throw new \Exception('Les datas personnages issues de bnet ne peuvent être vide.');
        }
        $oPersonnage = new \Commun\Model\Personnages();
        $oPersonnage->setNom($aDataPersonnageBnet['name']);
        $oPersonnage->setNiveau($aDataPersonnageBnet['level']);
        $oPersonnage->setIdClasses($aDataPersonnageBnet['class']);
        if (isset($aDataPersonnageBnet['faction'])) {
            $oPersonnage->setIdFaction($aDataPersonnageBnet['faction']);
        }
        $oPersonnage->setIdRace($aDataPersonnageBnet['race']);
        $oPersonnage->setGenre($aDataPersonnageBnet['gender']);
        $oPersonnage->setRoyaume($aDataPersonnageBnet['realm']);
        $oPersonnage->setminiature($aDataPersonnageBnet['thumbnail']);
        $oPersonnage->setIsTech(false);
        if (isset($aDataPersonnageBnet['items'])) {
            $oPersonnage->setIlvl($aDataPersonnageBnet['items']['averageItemLevelEquipped']);
        }

        return $oPersonnage;
    }

    /**
     * Extrait les informations du personnagee des donnes de battlnet et et les transforme en objet utilisable de notre coté.
     * Manque la faction qui n'est pas disponible
     * @param array $aDataItemBnet
     * @return  \Core\Model\Items
     * @throws Exception
     */
    public static function extraitItemDepuisBnet($aDataItemBnet) {

        if (!isset($aDataItemBnet)) {
            throw new \Exception('Les datas personnages issues de bnet ne peuvent être vide.');
        }
        $oItem = new \Commun\Model\Items();
        $oItem->setIdBnet($aDataItemBnet['id']);
        $oItem->setNom($aDataItemBnet['name']);
        $oItem->setIcon($aDataItemBnet['icon']);
        return $oItem;
    }

    /**
     * Extrait les information de la guilde des donnes de battlnet et et les transforme en objet utilisable de notre coté.
     * @param type $aDataGuildeBnet
     * @return  \Core\Model\Guilde
     * @throws Exception
     */
    public static function extraitGuildeDepuisBnetGuilde($aDataGuildeBnet) {

        if (!isset($aDataGuildeBnet)) {
            throw new \Exception("Les datas pour l'extraction de guilde issues de bnet ne peuvent être vide.");
        }
        $oGuilde = new \Commun\Model\Guildes();
        $oGuilde->setNom($aDataGuildeBnet['name']);
        $oGuilde->setServeur($aDataGuildeBnet['realm']);
        $oGuilde->setIdFaction($aDataGuildeBnet['side']);
        $oGuilde->setminiature($aDataGuildeBnet['thumbnail']);
        $oGuilde->setNiveau($aDataGuildeBnet['level']);
        $oGuilde->setServeur($aDataGuildeBnet['realm']);
        return $oGuilde;
    }

    /**
     *
     * @param type $sString
     * @return array
     */
    public static function importEqdkp($sString) {
        $reader = new \Zend\Config\Reader\Xml();
        $data = $reader->fromString($sString);
        return $data;
    }

    /**
     * Extrait les information de la guilde des donnes de battlnet et et les transforme en objet utilisable de notre coté.
     * @param type $aDataZoneBnet
     * @return  \Core\Model\Zone
     * @throws Exception
     */
    public static function extraitZoneDepuisBnetZone($aDataZoneBnet, $locale = "fr_FR") {

        if (!isset($aDataZoneBnet)) {
            throw new \Exception("Les datas pour l'extraction de zone issues de bnet ne peuvent être vide.");
        }
        $oZone = new \Commun\Model\Zone();
        $oZone->setIdZone($aDataZoneBnet['id']);
        $oZone->setIsDonjon($aDataZoneBnet['isDungeon']);
        $oZone->setIsRaid($aDataZoneBnet['isRaid']);
        $oZone->setLvlMax($aDataZoneBnet['advisedMinLevel']);
        $oZone->setLvlMin($aDataZoneBnet['advisedMaxLevel']);
        $oZone->setPatch($aDataZoneBnet['patch']);
        $oZone->setModeDifficulte($aDataZoneBnet['availableModes']);

        $aTaille = explode('-', $aDataZoneBnet['numPlayers']);
        if (count($aTaille) == 1) {
            $iTailleMin = $iTailleMax = $aDataZoneBnet['numPlayers'];
        } else {
            $iTailleMin = $aTaille[0];
            $iTailleMax = $aTaille[1];
        }
        $oZone->setTailleMin($iTailleMin);
        $oZone->setTailleMax($iTailleMax);

        // temporaire pour translate
        $oZone->setLocale($locale);
        $oZone->setNom($aDataZoneBnet['name']);

        return $oZone;
    }

    /**
     * Extrait les bosses des donnes de battlnet et les transforme en objet utilisable de notre coté.
     * @param type $aDataZoneBnet
     * @param \Core\Model\Zone $oZone
     * @param array $aOptionFiltre lvlMin|
     * @return array de \Core\Model\Personnages
     * @throws Exception
     */
    public static function extraitBossDepuisBnetZone($aDataZoneBnet, \Commun\Model\Zone $oZone, $locale = "fr_FR") {

        if (!isset($aDataZoneBnet)) {
            throw new Exception("Les datas pour l'extraction de zone issues de bnet ne peuvent être vide.");
        }
        $aBoss = array();

        if (isset($aDataZoneBnet['bosses'])) {
            foreach ($aDataZoneBnet['bosses'] as $aBosse) {

                $oBoss = new \Commun\Model\Bosses();
                $oBoss->setIdBosses($aBosse['id']);

                $oBoss->setLevel($aBosse['level']);
                $oBoss->setVie($aBosse['health']);
                // temporaire pour translate
                $oBoss->setLocale($locale);
                $oBoss->setNom($aBosse['name']);
                $aNpc = array();
                if (isset($aBosse['npcs'])) {
                    foreach ($aBosse['npcs'] as $aNpcBnet) {
                        $oNpc = new \Commun\Model\Npc();
                        $oNpc->setIdNpc($aNpcBnet['id']);
                        $oNpc->setIdNpcBidon($aNpcBnet['id']);
                        // temporaire pour translate
                        $oNpc->setNom($aNpcBnet['name']);
                        $oNpc->setLocale($locale);
                        $aNpc[] = $oNpc;
                    }
                }
                $oBoss->setNpc($aNpc);
                $aBoss[] = $oBoss;
            }
            return $aBoss;
        }
    }

}
