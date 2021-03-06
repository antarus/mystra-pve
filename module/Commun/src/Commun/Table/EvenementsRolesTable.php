<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsRolesTable extends \Core\Table\AbstractServiceTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'evenements_roles';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\EvenementsRoles
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\EvenementsRoles';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idEvenements_roles';


}

