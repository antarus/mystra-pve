<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class RosterHasPersonnageTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'roster_has_personnage';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\RosterHasPersonnage
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\RosterHasPersonnage';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRoster';


}

