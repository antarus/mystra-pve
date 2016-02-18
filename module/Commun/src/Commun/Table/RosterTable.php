<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class RosterTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'roster';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Roster
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Roster';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRoster';


}

