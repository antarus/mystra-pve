<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class RaidsTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'raids';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Raids
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Raids';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRaid';


}

