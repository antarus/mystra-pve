<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class PagesTable extends \Core\Table\AbstractServiceTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Classes
     */
    protected $arrayObjectPrototypeClass = '\Commun\Model\Pages';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idPages';


    
}

