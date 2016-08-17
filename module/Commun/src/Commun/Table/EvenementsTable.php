<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'evenements';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Evenements
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Evenements';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idEvenements';


}

