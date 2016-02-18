<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class RaceTable extends \Core\Table\AbstractTable
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

