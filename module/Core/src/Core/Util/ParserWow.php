<?php

namespace Core\Util;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ParserWow {

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
            throw new Exception('Les datas issues de bnet ne peuvent être vide.');
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
                    $oPersonnage = new \Commun\Model\Personnages();
                    $oPersonnage->setNom($aCharacter['character']['name']);
                    $oPersonnage->setNiveau($aCharacter['character']['level']);
                    $oPersonnage->setIdGuildes($oGuilde->getIdGuildes());
                    $oPersonnage->setIdClasses($aCharacter['character']['class']);
                    //$oPersonnage->setIdFaction($aCharacter['character']['faction']);
                    $oPersonnage->setIdFaction($oGuilde->getIdFaction());
                    $oPersonnage->setIdRace($aCharacter['character']['race']);
                    $oPersonnage->setGenre($aCharacter['character']['gender']);
                    $oPersonnage->setRoyaume($aCharacter['character']['realm']);
                    $oPersonnage->setMignature($aCharacter['character']['thumbnail']);
                    $aPersonnage[] = $oPersonnage;
                }
            }
            return $aPersonnage;
        }
    }

    /**
     * Extrait les information de la guilde des donnes de battlnet et et les transforme en objet utilisable de notre coté.
     * @param type $aDataGuildeBnet
     * @return  \Core\Model\Guilde
     * @throws Exception
     */
    public static function extraitGuildeDepuisBnetGuilde($aDataGuildeBnet) {

        if (!isset($aDataGuildeBnet)) {
            throw new \Exception('Les datas issues de bnet ne peuvent être vide.');
        }
        $oGuilde = new \Commun\Model\Guildes();
        $oGuilde->setNom($aDataGuildeBnet['name']);
        $oGuilde->setServeur($aDataGuildeBnet['realm']);
        $oGuilde->setIdFaction($aDataGuildeBnet['side']);
        $oGuilde->setMignature($aDataGuildeBnet['thumbnail']);
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
    public static function extraitZoneDepuisBnetZone($aDataZoneBnet) {

        if (!isset($aDataZoneBnet)) {
            throw new \Exception('Les datas issues de bnet ne peuvent être vide.');
        }
        $oZone = new \Commun\Model\Zone();
        $oZone->setIdZone($aDataZoneBnet['id']);
        $oZone->setNom($aDataZoneBnet['name']);
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
    public static function extraitBossDepuisBnetZone($aDataZoneBnet, \Commun\Model\Zone $oZone) {

        if (!isset($aDataZoneBnet)) {
            throw new Exception('Les datas issues de bnet ne peuvent être vide.');
        }
        $aBoss = array();

        if (isset($aDataZoneBnet['bosses'])) {
            foreach ($aDataZoneBnet['bosses'] as $aBosse) {

                $oBoss = new \Commun\Model\Bosses();
                $oBoss->setIdBosses($aBosse['id']);
                $oBoss->setNom($aBosse['name']);
                $oBoss->setLevel($aBosse['level']);
                $oBoss->setVie($aBosse['health']);
                $aNpc = array();
                if (isset($aBosse['npcs'])) {
                    foreach ($aBosse['npcs'] as $aNpcBnet) {
                        $oNpc = new \Commun\Model\Npc();
                        $oNpc->setIdNpc($aNpcBnet['id']);
                        $oNpc->setNom($aNpcBnet['name']);
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
