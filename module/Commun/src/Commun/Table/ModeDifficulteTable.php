<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class ModeDifficulteTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'mode_difficulte';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\ModeDifficulte
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\ModeDifficulte';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idMode';


}

