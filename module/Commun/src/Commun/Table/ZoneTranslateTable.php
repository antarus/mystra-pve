<?php

namespace Commun\Table;

use \Bnet\Region;
use \Commun\Exception\BnetException;
use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ZoneTranslateTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'zone_translate';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\ZoneTranslate
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\ZoneTranslate';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idZoneTranslate';

}
