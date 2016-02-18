<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class NpcTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'npc';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Npc
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Npc';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idNpc';


}

