<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RaceTable extends \Core\Table\AbstractServiceTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'race';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Race
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Race';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRace';


}

