<?php

namespace Commun\Exception;

class DatabaseException extends \Commun\Exception\LogException {

    protected $ERREUR_PRINC = [
        5000 => "Erreur inconnue",
        1000 => "guilde",
        2000 => "personnage",
        3000 => "item",
        4000 => "raid",
        5000 => "roster/personnage",
        6000 => "roster",
        7000 => "zone",
        8000 => "item/raid/personnage/boss",
        9000 => "boss",
        10000 => "pallier"
    ];
    protected $ERREUR_TYPE = [
        0 => "inconnu",
        1 => "update",
        2 => "create",
        3 => "delete",
        4 => "list",
        5 => "contrainte unique",
        6 => 'recherche',
        7 => 'limite',
    ];

    public function __construct($code = 5000, $erreurType = 0, $oService = null, $aParam = array(), \Exception $previous = null) {
        $this->setService($oService);


        if (isset($this->message[$code + $erreurType])) {
            $msg = $this->message[$code + $erreurType];
            $codeErreur = $code + $erreurType;
        } else {
            $msg = $this->message[5000];
            $codeErreur = 5000;
        }
        if (isset($this->_getTranslator())) {
            if (substr_count($msg, '%s') == count($aParam)) {
                $msg = vsprintf($this->_getTranslator()->translate($msg), $aParam);
            } else if (substr_count($msg, '%s') < count($aParam)) {
                $msg = vsprintf($this->_getTranslator()->translate($msg), implode(', ', $aParam));
            } else if (substr_count($msg, '%s') == 0) {
                $msg = $this->_getTranslator()->translate($msg) . ' [ ' . implode(', ', $aParam) . ' ] ';
            } else {
                $msg = $this->_getTranslator()->translate($msg);
            }
        } else {
            if (substr_count($msg, '%s') == count($aParam)) {
                $msg = vsprintf($msg, $aParam);
            } else if (substr_count($msg, '%s') < count($aParam)) {
                $msg = vsprintf($msg, implode(', ', $aParam));
            } else if (substr_count($msg, '%s') == 0) {
                $msg = $msg . ' [ ' . implode(', ', $aParam) . ' ] ';
            }
        }

        parent::__construct($msg, $codeErreur, $oService, $previous, $aParam);
    }

    protected $message = array(
        5000 => 'Erreur incconue [%s]',
        // guilde
        1001 => "Erreur lors la mise à jour de la guilde [%s]",
        1002 => "Erreur lors la création de la guilde [%s]",
        1003 => "Erreur lors de la suppression de la guilde [%s]",
        1004 => "Erreur lors du listing des guildes [%s]",
        // personnage
        2001 => "Erreur lors la mise à jour du personnage [%s]",
        2002 => "Erreur lors la création du personnage [%s]",
        2003 => "Erreur lors de la suppression du personnage [%s]",
        2004 => "Erreur lors du listing des personnages [%s]",
        // item
        3001 => "Erreur lors la mise à jour de l'item [%s]",
        3002 => "Erreur lors la création de l'item [%s]",
        3003 => "Erreur lors de la suppression de l'item [%s]",
        3004 => "Erreur lors du listing des items [%s]",
        // raid
        4001 => "Erreur lors la mise à jour du raid [%s]",
        4002 => "Erreur lors la création du raid [%s]",
        4003 => "Erreur lors de la suppression du raid [%s]",
        4004 => "Erreur lors du listing du raid [%s]",
        // roster/personnage/role
        5001 => "Erreur lors la mise à jour du lien roster-personnage [%s]",
        5002 => "Erreur lors la création du lien roster-personnage [%s]",
        5003 => "Erreur lors de la suppression du lien roster-personnage [%s]",
        5004 => "Erreur lors du listing du lien roster-personnage [%s]",
        // roster
        6001 => "Erreur lors la mise à jour du roster [%s]",
        6002 => "Erreur lors la création du roster [%s]",
        6003 => "Erreur lors de la suppression du roster [%s]",
        6004 => "Erreur lors du listing du roster [%s]",
        6005 => "Le nom du roster est déjà utilisé [%s]",
        // zone
        7001 => "Erreur lors la mise à jour de la zone [%s]",
        7002 => "Erreur lors la création de la zone [%s]",
        7003 => "Erreur lors de la suppression de la zone [%s]",
        7004 => "Erreur lors du listing de la zone [%s]",
        // item/raid/personnage/boss
        8001 => "Erreur lors la mise à jour du lien item-raid-personnage-boss [%s]",
        8002 => "Erreur lors la création du lien item-raid-personnage-boss [%s]",
        8003 => "Erreur lors de la suppression du lien item-raid-personnage-boss [%s]",
        8004 => "Erreur lors du listing du lien item-raid-personnage-boss [%s]",
        // boss
        9001 => "Erreur lors la mise à jour du boss [%s].",
        9002 => "Erreur lors la création du boss [%s].",
        9003 => "Erreur lors de la suppression du boss [%s].",
        9004 => "Erreur lors du listing du boss [%s].",
        9006 => "Erreur lors de la recherche du boss [%s].",
        // pallier
        10001 => "Erreur lors la mise à jour du pallier. [%s]",
        10002 => "Erreur lors la création du pallier. [%s]",
        10003 => "Erreur lors de la suppression du pallier. [%s]",
        10004 => "Erreur lors du listing du pallier. [%s]",
        10006 => "Erreur lors de la recherche du pallier. [%s]",
        10007 => "Vous avez atteinte le nombre maximal de pallier pouvant être créer. [%s]",
    );

}
