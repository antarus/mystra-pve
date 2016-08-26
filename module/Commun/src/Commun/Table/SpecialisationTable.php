<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class SpecialisationTable extends \Core\Table\AbstractServiceTable
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

