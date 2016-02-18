<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class SpecialisationTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'specialisation';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Specialisation
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Specialisation';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idSpecialisation';


}

