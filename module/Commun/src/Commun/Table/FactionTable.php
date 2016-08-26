<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class FactionTable extends \Core\Table\AbstractServiceTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'faction';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Faction
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Faction';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idFaction';


}

