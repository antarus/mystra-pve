<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class ZoneTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'zone';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Zone
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Zone';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idZone';


}

