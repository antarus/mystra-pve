<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ClassesTable extends \Core\Table\AbstractServiceTable
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

