<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class PersonnagesHasSpecialisationTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'personnages_has_specialisation';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\PersonnagesHasSpecialisation
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\PersonnagesHasSpecialisation';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'specialisation_idSpecialisation';


}

