<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class ItemsTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Items
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Items';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idItem';


}

