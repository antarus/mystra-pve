<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class RaidPersonnageTable extends \Core\Table\AbstractTable
{

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


}

