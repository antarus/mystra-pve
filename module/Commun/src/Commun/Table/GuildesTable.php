<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class GuildesTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'guildes';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Guildes
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Guildes';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idGuildes';


}

