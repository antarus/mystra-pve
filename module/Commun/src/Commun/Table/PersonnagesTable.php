<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class PersonnagesTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'personnages';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Personnages
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Personnages';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idPersonnage';


}

