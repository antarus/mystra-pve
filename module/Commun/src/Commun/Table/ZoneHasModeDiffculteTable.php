<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ZoneHasModeDiffculteTable extends \Core\Table\AbstractServiceTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'zone_has_mode_diffculte';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\ZoneHasModeDiffculte
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\ZoneHasModeDiffculte';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idZone';


}

