<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class UsersTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Users
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Users';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idUsers';


}

