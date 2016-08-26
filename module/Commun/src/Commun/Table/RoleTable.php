<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class RoleTable extends \Core\Table\AbstractServiceTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'role';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Role
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Role';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idRole';


}

