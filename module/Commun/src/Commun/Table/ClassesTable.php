<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class ClassesTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Classes
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Classes';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idClasses';


}

