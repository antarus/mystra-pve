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
        10000 => "pallier",
        11000 => "user"
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

    /**
     *
     * @param type $code
     * @param type $erreurType
     * @param type $oService
     * @param type $aParam
     * @param \Exception $previous
     */
    public function __construct($code = 5000, $erreurType = 0, $oService = null, $aParam = array(), \Exception $previous = null) {
        $this->setService($oService);


        if (isset($this->message[$code + $erreurType])) {
            $msg = $this->message[$code + $erreurType];
            $codeErreur = $code + $erreurType;
        } else {
            $msg = $this->message[5000];
            $codeErreur = 5000;
        }
        
        if ($this->_getTranslator() != null) {
            $msg = $this->_getTranslator()->translate($msg);
        }
        parent::__construct($msg, $codeErreur, $oService, $previous, $aParam);
    }

    protected $message = array(
        5000 => 'Erreur incconue',
        // guilde
        1001 => "Erreur lors la mise à jour de la guilde",
        1002 => "Erreur lors la création de la guilde",
        1003 => "Erreur lors de la suppression de la guilde",
        1004 => "Erreur lors du listing des guildes",
        // personnage
        2001 => "Erreur lors la mise à jour du personnage",
        2002 => "Erreur lors la création du personnage",
        2003 => "Erreur lors de la suppression du personnage",
        2004 => "Erreur lors du listing des personnages",
        // item
        3001 => "Erreur lors la mise à jour de l'item",
        3002 => "Erreur lors la création de l'item",
        3003 => "Erreur lors de la suppression de l'item ",
        3004 => "Erreur lors du listing des items",
        // raid
        4001 => "Erreur lors la mise à jour du raid",
        4002 => "Erreur lors la création du raid",
        4003 => "Erreur lors de la suppression du raid",
        4004 => "Erreur lors du listing du raid",
        // roster/personnage/role
        5001 => "Erreur lors la mise à jour du lien roster-personnage]",
        5002 => "Erreur lors la création du lien roster-personnage",
        5003 => "Erreur lors de la suppression du lien roster-personnage",
        5004 => "Erreur lors du listing du lien roster-personnage",
        // roster
        6001 => "Erreur lors la mise à jour du roster",
        6002 => "Erreur lors la création du roster",
        6003 => "Erreur lors de la suppression du roster",
        6004 => "Erreur lors du listing du roster",
        6005 => "Le nom du roster est déjà utilisé",
        // zone
        7001 => "Erreur lors la mise à jour de la zone",
        7002 => "Erreur lors la création de la zone",
        7003 => "Erreur lors de la suppression de la zone",
        7004 => "Erreur lors du listing de la zone",
        // item/raid/personnage/boss
        8001 => "Erreur lors la mise à jour du lien item-raid-personnage-boss",
        8002 => "Erreur lors la création du lien item-raid-personnage-boss",
        8003 => "Erreur lors de la suppression du lien item-raid-personnage-boss",
        8004 => "Erreur lors du listing du lien item-raid-personnage-boss",
        // boss
        9001 => "Erreur lors la mise à jour du boss.",
        9002 => "Erreur lors la création du boss.",
        9003 => "Erreur lors de la suppression du boss.",
        9004 => "Erreur lors du listing du boss.",
        9006 => "Erreur lors de la recherche du boss.",
        // pallier
        10001 => "Erreur lors la mise à jour du pallier.",
        10002 => "Erreur lors la création du pallier. ",
        10003 => "Erreur lors de la suppression du pallier. ",
        10004 => "Erreur lors du listing du pallier.",
        10006 => "Erreur lors de la recherche du pallier.",
        10007 => "Vous avez atteinte le nombre maximal de pallier pouvant être créer.",
        // usager
        11006 => "Usager inconnue.",
        11001 => "Erreur lors de la mise à jour de l'usager.",
    );

}
