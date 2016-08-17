<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ZoneHasBossesTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'zone_has_bosses';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\ZoneHasBosses
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\ZoneHasBosses';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idZone';


}

