<?php
return array(
    'APIRtK\\V1\\Rest\\LootRoster\\Controller' => array(
        'description' => 'retourne la liste des loot du roster

/api/loot-roster/mystra?withids=1&spe=-1

withids : ajoute différent Id a la réponse

spe=-1 toute spé confondu
spe=0 spé principal
spe=1 spé secondaire',
        'entity' => array(
            'GET' => array(
                'response' => '{
  "nom": "mystra",
  "items": [
    {
      "nbItem": "1",
      "lastDateLoot": "2016-07-30 19:55:35",
      "idPersonnage": "46",
      "nom_personnage": "byzzih"
    },
    {
      "nbItem": "1",
      "lastDateLoot": "2016-07-30 19:55:35",
      "idPersonnage": "44",
      "nom_personnage": "ambroqme"
    },
     {
      "nbItem": "1",
      "lastDateLoot": "2016-07-30 19:55:35",
      "idPersonnage": "47",
      "nom_personnage": "capï"
    }
  ],
  "id": 1,
  "_links": {
    "self": {
      "href": "http://localhost:48081/api/loot-roster/1"
    }
  }
}',
            ),
        ),
    ),
    'APIRtK\\V1\\Rest\\Loot\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'response' => '{
  "nom": "antaruss",
  "items": [
    {
      "nom": "eredar fel-chain gloves",
      "lien": "http://www.wowhead.com/?item=124291&bonus=1798:41:1492:",
      "date": "2016-08-03 23:16:10",
      "roster": "mystra",
      "zone": "hellfire citadel",
      "boss": "archimonde",
      "nom_personnage": "antaruss",
      "royaume_personnage": "garona",
      "spe": "principal"
    },
    {
      "nom": "voracious souleater",
      "lien": "http://www.wowhead.com/?item=124359&bonus=1798:1487:529:",
      "date": "2016-08-17 20:44:49",
      "roster": "mystra",
      "zone": "hellfire citadel",
      "boss": "gorefiend",
      "nom_personnage": "antaruss",
      "royaume_personnage": "garona",
      "spe": "principal"
    },
    {
      "nom": "badge of hellfire\'s vanquisher",
      "lien": "http://www.wowhead.com/?item=127968&bonus=:::",
      "date": "2016-08-19 23:28:32",
      "roster": "mystra",
      "zone": "hellfire citadel",
      "boss": "archimonde",
      "nom_personnage": "antaruss",
      "royaume_personnage": "garona",
      "spe": "principal"
    }
  ],
  "serveur": "garona",
  "id": 166,
  "_links": {
    "self": {
      "href": "http://dev.raid-tracker.com/api/loot/garona/antaruss"
    }
  }
}',
                'description' => '',
            ),
        ),
        'description' => 'retourne la liste des loot d\'un personnage.

Limité au 20 dernier loot
/api/loot/garona/antaruss?withids=1&spe=-1

withids : ajoute différent Id a la réponse

spe=-1 toute spé confondu
spe=0 spé principal
spe=1 spé secondaire
spe=2 spé 3
spe=3 spé 4',
    ),
    'APIRtK\\V1\\Rest\\Roster\\Controller' => array(
        'description' => 'Retourne le roster demandé

/api/roster/mystra

withids : ajoute différent Id a la réponse

spe=-1 toute spé confondu
spe=0 spé principal
spe=1 spé secondaire',
        'entity' => array(
            'GET' => array(
                'description' => '',
                'response' => '{
  "nom": "mystra",
  "roles": [
    {
      "idRole": 1,
      "nom": "tank",
      "personnages": []
    },
    {
      "idRole": 2,
      "nom": "soigneur",
      "personnages": []
    },
    {
      "idRole": 3,
      "nom": "dps cac",
      "personnages": []
    },
    {
      "idRole": 4,
      "nom": "dps distant",
      "personnages": []
    }
  ],
  "_links": {
    "self": {
      "href": "http://localhost:48081/api/roster/mystra"
    }
  }
}',
            ),
        ),
    ),
    'APIRtK\\V1\\Rest\\RosterStat\\Controller' => array(
        'description' => 'Retourne les stats du roster.

/api/roster-stat/mystra?withids=0&spe=-1

withids : ajoute différent Id a la réponse

spe=-1 toute spé confondu
spe=0 spé principal
spe=1 spé secondaire',
        'entity' => array(
            'GET' => array(
                'response' => '{
  "idRoster": 1,
  "nom": "mystra",
  "nbTotalRaid": "0",
  "nbTotalRaidPallier": "1",
  "nbItem": "22",
  "nbItemPallier": "20",
  "participation": [
    {
      "nbRaid": "1",
      "idPersonnage": "43",
      "nom_personnage": "alexior",
      "royaume_personnage": "rashgarroth",
      "nbRaidPallier": "1",
      "presenceGlobal": 0,
      "presencePallier": 100
    },
    {
      "nbRaid": "1",
      "idPersonnage": "44",
      "nom_personnage": "ambroqme",
      "royaume_personnage": "dalaran",
      "nbRaidPallier": "1",
      "presenceGlobal": 0,
      "presencePallier": 100
    },
    {
      "nbRaid": "1",
      "idPersonnage": "81",
      "nom_personnage": "antaruss",
      "royaume_personnage": "garona",
      "presenceGlobal": 0,
      "presencePallier": 0
    },
    {
      "nbRaid": "1",
      "idPersonnage": "88",
      "nom_personnage": "antarüs",
      "royaume_personnage": "garona",
      "presenceGlobal": 0,
      "presencePallier": 0
    }

  ],
  "_links": {
    "self": {
      "href": "http://localhost:48081/api/roster-stat/mystra"
    }
  }
}',
            ),
        ),
    ),
    'APIRtK\\V1\\Rest\\LootRosterPersonnage\\Controller' => array(
        'description' => 'retourne la liste des loot d\'un personnage du roster

/api/loot-roster-personnage/mystra/garona/antaruss?withids=1&spe=-1

withids : ajoute différent Id a la réponse

spe=-1 toute spé confondu
spe=0 spé principal
spe=1 spé secondaire',
        'entity' => array(
            'GET' => array(
                'response' => '{
  "nom": "trìs",
  "items": [
    {
      "nom": "xu\'tenash, glaive of ruin",
      "lien": "http://www.wowhead.com/?item=124378&bonus=1801:1472:529:",
      "date": "2016-07-30 19:55:35",
      "roster": "mystra",
      "zone": "hellfire citadel",
      "boss": "mannoroth",
      "nom_personnage": "trìs",
      "royaume_personnage": "garona",
      "spe": "principal"
    }
  ],
  "id": 66,
  "_links": {
    "self": {
      "href": "http://localhost:48081/api/loot-roster-personnage/mystra/garona/66"
    }
  }
}',
            ),
        ),
    ),
);
