<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class BossesTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'bosses';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Bosses
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Bosses';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idBosses';


}

